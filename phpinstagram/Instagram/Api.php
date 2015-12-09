<?php

namespace phpinstagram\Instagram;

use phpinstagram\Instagram;

class Api {
    /*
     * @var Instagram
     */
    protected $_instagram;

    public function setInstagram(Instagram $instagram) {
        $this->_instagram = $instagram;
    }
}