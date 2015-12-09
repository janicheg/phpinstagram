<?php

namespace phpinstagram\Instagram\Command;

abstract class AbstractCommand implements ICommand {
    /*
     * @var \phpinstagram\Instagram\Client\Communication
     */
    protected $_communication;

    /*
     * @var array
     */
    protected $_parameters = array();

    /*
     * @var array
     */
    protected $_requires = array();

    /*
     * @var array
     */
    protected $_dependsOn = array();

    /*
     * @var \phpinstagram\Instagram\Client\Response
     */
    protected $_response;

    public function exec() {
    }

    /**
     * standard behaviour for setting the _communication attribute
     * @see ICommand::setCommunication()
     */
    public function setCommunication(\phpinstagram\Instagram\Client\Communication $communication) {
        $this->_communication = $communication;
        $this->_response = new \phpinstagram\Instagram\Client\Response($this);
    }

    /**
     * standard behaviour for setting the parameter in the _parameters attribute
     * @see ICommand::setParameter()
     */
    public function setParameter($name, $value) {
        $this->_parameters[$name] = $value;
    }

    /**
     * @return \phpinstagram\Instagram\Client\Response
     */
    public function getResponse() {
        return $this->_response;
    }

    public function validate() {
        if (is_null($this->_communication)) throw new \phpinstagram\Instagram\Command\InvalidException('No communication instance!', 1);
        if (isset($this->_requires)) foreach ($this->_requires as $required) {
            if (!isset($this->_parameters[$required])) throw new \phpinstagram\Instagram\Command\InvalidException('You forgot to set required parameter ' . $required . ' for ' . get_class($this), 2);
        }
    }

    public function dependsOn() {
        return $this->_dependsOn;
    }
}