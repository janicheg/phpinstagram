<?php

namespace phpinstagram\Instagram\Client;

class Response {
    /**
     * @var \phpinstagram\Instagram\Command\ICommand
     */
    protected $_command;

    /**
     * @var mixed
     */
    protected $_response;

    public function __construct(\phpinstagram\Instagram\Command\ICommand $command) {
        $this->_command = $command;
    }

    public function setData($response) {
        $this->_response = $response;
    }

    public function getData() {
        return $this->_response;
    }
}