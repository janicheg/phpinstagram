<?php
namespace phpinstagram\Instagram;

use \Zend\Http\Response;

class Client extends \Zend\Http\Client {
    public function request($method = null) {
        $this->setMethod($method);
        $this->send();
        if ($this->response->getStatusCode() != 200) {
            throw new CommunicationException('HTTP-Code: ' . $this->response->getStatusCode());
        }
        return $this->response;
    }
}