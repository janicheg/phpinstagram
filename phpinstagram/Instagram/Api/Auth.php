<?php
namespace phpinstagram\Instagram\Api;

use \phpinstagram\Instagram\Api;

class Auth extends Api {
    /**
     * Logs you in
     * @param String $username
     * @param String $password
     * @param String $deviceId
     * @return \phpinstagram\Instagram\Command\Login
     */
    public function login($username, $password, $deviceId) {
        $cmd = new \Instagram\Command\Login();

        $cmd->setParameter('username', $username);
        $cmd->setParameter('password', $password);
        $cmd->setParameter('device_id', $deviceId);

        $this->_instagram->addCommand($cmd);

        return $cmd;
    }
}