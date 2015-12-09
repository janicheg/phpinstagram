<?php

namespace phpinstagram\Instagram\Feed;

class Entry {
    /*
     * @var array<\phpinstagram\Instagram\Feed\Entry>
     */
    private static $__entries = array();

    /*
     * @var string
     */
    public $code;

    /*
     * @var array<\phpinstagram\Instagram\Comment>
     */
    public $comments;

    /*
     * @var array<\phpinstagram\Instagram\User>
     */
    public $likers;

    /*
     * @var array<\phpinstagram\Instagram\Image>
     */
    public $image_versions;

    /*
     * @var int
     */
    public $filter_type;

    /*
     * @var int
     */
    public $device_timestamp;

    /*
     * @var \phpinstagram\Instagram\Location
     */
    public $location;

    /*
     * @var int
     */
    public $taken_at;

    /*
     * @var float
     */
    public $lat;

    /*
     * @var int
     */
    public $media_type;

    /*
     * @var float
     */
    public $lng;

    /*
     * primary key
     * @var int
     */
    public $pk;

    /*
     * @var \phpinstagram\Instagram\User
     */
    public $user;

    /**
     * fetches an entry from the repository according to its primary key
     * @param $entryData
     * @return mixed
     * @throws \phpinstagram\Instagram\ParseException
     */
    public static function factory($entryData) {
        if (!isset(self::$__entries[$entryData->pk])) {
            self::$__entries[$entryData->pk] = new Entry();
            self::$__entries[$entryData->pk]->pk = $entryData->pk;
            self::$__entries[$entryData->pk]->code = $entryData->code;

            self::$__entries[$entryData->pk]->comments = array();
            if (isset($entryData->comments) && is_array($entryData->comments)) foreach ($entryData->comments as $comment) {
                if (!is_object($comment)) {
                    throw new \phpinstagram\Instagram\ParseException('Error: could not translate the following into ' .
                        "an Instagram_Comment:\n" . var_export($comment, 1));
                }
                $iComment = new \phpinstagram\Instagram\Comment();
                $iComment->content_type = $comment->content_type;
                $iComment->created_at = $comment->created_at;
                $iComment->media_id = $comment->media_id;
                $iComment->text = $comment->text;
                $iComment->type = $comment->type;
                $iComment->user = \phpinstagram\Instagram\User::factory($comment->user);

                self::$__entries[$entryData->pk]->comments[] = $iComment;
            }
            self::$__entries[$entryData->pk]->device_timestamp = $entryData->device_timestamp;
            if (isset($entryData->filter_type))
                self::$__entries[$entryData->pk]->filter_type = $entryData->filter_type;

            self::$__entries[$entryData->pk]->image_versions = array();
            if (isset($entryData->image_versions) && is_array($entryData->image_versions)) foreach ($entryData->image_versions as $image) {
                if (!is_object($image)) {
                    throw new \phpinstagram\Instagram\ParseException('Error: could not translate the following into ' .
                        "an Instagram_Image:\n" . var_export($image, 1));
                }
                $iImage = new \phpinstagram\Instagram\Image();
                $iImage->height = $image->height;
                $iImage->width = $image->width;
                $iImage->url = $image->url;
                $iImage->type = $image->type;

                self::$__entries[$entryData->pk]->image_versions[] = $iImage;
            }

            self::$__entries[$entryData->pk]->likers = array();
            if (isset($entryData->likers) && is_array($entryData->likers)) foreach ($entryData->likers as $liker) {
                if (!is_object($liker)) {
                    throw new \phpinstagram\Instagram\ParseException('Error: could not translate the following into ' .
                        "an Instagram_User:\n" . var_export($liker, 1));
                    continue;
                }
                self::$__entries[$entryData->pk]->likers[] = \phpinstagram\Instagram\User::factory($liker);
            }

            if (isset($entryData->lat))
                self::$__entries[$entryData->pk]->lat = $entryData->lat;
            if (isset($entryData->lng))
                self::$__entries[$entryData->pk]->lng = $entryData->lng;

            if (isset($entryData->location))
                self::$__entries[$entryData->pk]->location = \phpinstagram\Instagram\Location::factory($entryData->location);

            self::$__entries[$entryData->pk]->media_type = $entryData->media_type;
            self::$__entries[$entryData->pk]->taken_at = $entryData->taken_at;
            self::$__entries[$entryData->pk]->user = \phpinstagram\Instagram\User::factory($entryData->user);
        }

        return self::$__entries[$entryData->pk];
    }
}