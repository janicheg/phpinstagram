<?php

namespace phpinstagram;

class Instagram {
	
	/*
	 * @var array
	 */
	protected $_commands = array();
	
	/*
	 * @var \phpinstagram\Instagram\Client\Communication
	 */
	protected $_communication;
	
	/*
	 * @var \phpinstagram\Instagram\Api\Feed
	 */
	public $feed;
	
	/*
	 * @var \phpinstagram\Instagram\Api\Auth
	 */
	public $auth;
	
	public function __construct() {
		$this->feed = new \phpinstagram\Instagram\Api\Feed();
		$this->feed->setInstagram($this);
		$this->auth = new \phpinstagram\Instagram\Api\Auth();
		$this->auth->setInstagram($this);
		$this->_communication = new \phpinstagram\Instagram\Client\Communication();
	}
	
	public function addCommand(\phpinstagram\Instagram\Command\ICommand $cmd) {
		$this->_commands[] = $cmd;
	}
	
	public function run() {
		$executed = array();
		//$cookieJar = null;
		foreach ($this->_commands as $utcmd) {
			if ($utcmd instanceof \phpinstagram\Instagram\Command\ICommand) {
				/*
				 * @var \phpinstagram\Instagram\Command\ICommand
				 */
				$cmd = $utcmd;
				
				//if (!is_null($cookieJar))
				//	$this->_communication->getClient()->setCookieJar($cookieJar);
				
				foreach ($cmd->dependsOn() as $dependency) {
					foreach ($executed as $previous) {
						if (get_class($previous) == '\Instagram\Command\\'.$dependency) {
							break 2;
						}
					}
					throw new \phpinstagram\Instagram\Command\DependencyException(
						'Command '.get_class($cmd)." depends on $dependency but it never was executed!\n\n"
					);
				}
				$cmd->setCommunication($this->_communication);
				
				$cmd->validate();
				
				//echo get_class($cmd)." is valid. executing...\n\n";
				$cmd->exec();
				
				$executed[] = $cmd;
				
				// reset parameters
				$this->_communication->getClient()->resetParameters();
				//$cookieJar = $this->_communication->getClient()->getCookieJar();
			} 
		}
		
		// reset commands
		$this->_commands = array();
	}
}
