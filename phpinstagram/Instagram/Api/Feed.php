<?php

namespace phpinstagram\Instagram\Api;

use \phpinstagram\Instagram\Api;
use \phpinstagram\Instagram\Command\Feed\Timeline;
use \phpinstagram\Instagram\Command\Feed\User;

class Feed extends Api {
    /**
     * Reads the timeline from your feed. you can provide a point of time. (format unknown atm)
     * @param String $time
     * @return \Instagram\Command\Feed\Timeline
     */
    public function timeline($time = '?') {
        $cmd = new Timeline();

        $cmd->setParameter('time', $time);

        $this->_instagram->addCommand($cmd);
        return $cmd;
    }

    /**
     * Reads the timeline from a users feed. you have to know his PK
     * you can provide a point of time. (format unknown atm)
     * @param int $pk
     * @param String $time
     * @return \Instagram\Command\Feed\User
     */
    public function user($pk, $time = '?') {
        $cmd = new User();

        $cmd->setParameter('pk', $pk);
        $cmd->setParameter('time', $time);

        $this->_instagram->addCommand($cmd);
        return $cmd;
    }
}