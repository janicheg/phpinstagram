<?php

namespace phpinstagram\Instagram;

class Location {
    /*
     * @var array<InstagramLocation>
     */
    private static $__locations = array();

    /*
     * @var string
     */
    public $external_source;

    /*
     * primary key
     * @var int
     */
    public $pk;

    /*
     * @var int
     */
    public $external_id;

    /*
     * @var string
     */
    public $name;

    /*
     * @var string
     */
    public $address;

    /*
     * @var float
     */
    public $lat;

    /*
     * @var float
     */
    public $lng;

    /**
     * fetches a location from the repository according to its primary key
     * @param \stdClass $locationData
     * @return Location
     */
    public static function factory($locationData) {
        if (!isset(self::$__locations[$locationData->pk])) {
            self::$__locations[$locationData->pk] = new User();
            self::$__locations[$locationData->pk]->pk = $locationData->pk;
            self::$__locations[$locationData->pk]->external_source = $locationData->external_source;
            self::$__locations[$locationData->pk]->external_id = $locationData->external_id;
            self::$__locations[$locationData->pk]->name = $locationData->name;
            self::$__locations[$locationData->pk]->address = $locationData->address;
            if (isset($locationData->lat))
                self::$__locations[$locationData->pk]->lat = $locationData->lat;
            if (isset($locationData->lng))
                self::$__locations[$locationData->pk]->lng = $locationData->lng;
        }

        return self::$__locations[$locationData->pk];
    }
}