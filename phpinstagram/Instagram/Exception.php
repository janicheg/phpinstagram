<?php

namespace phpinstagram\Instagram;

class Exception extends \Exception {
    protected $_response;

    public function getResponse() {
        return $this->_response;
    }

    public function setResponse($response) {
        $this->_response = $response;
    }
}