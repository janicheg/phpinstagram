<?php

namespace phpinstagram\Instagram\Client;

class Marshaller {
    public static function marshall($data) {

    }

    public static function unmarshall($data) {
        return json_decode($data);
    }
}