<?php

namespace phpinstagram\Instagram\Client;

class Communication {
    /**
     * @var \Zend\Http\Client
     */
    protected $_client;

    /**
     * @var array
     */
    protected $_cookies;


    public function __construct() {
        $this->_client = new \phpinstagram\Instagram\Client('http://instagr.am/api', array(
            'keepalive' => true
        ));
        $this->_client->setHeaders(['Accept' => 'application/xml']);
        //$this->_client->setCookieJar();
    }

    public function getClient() {
        return $this->_client;
    }
}