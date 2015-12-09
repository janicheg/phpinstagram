<?php
namespace phpinstagram\Instagram;

class Comment {
    /*
     * @var int
     */
    public $media_id;

    /*
     * @var string
     */
    public $text;

    /*
     * @var int
     */
    public $created_at;

    /*
     * @var Instagram_User
     */
    public $user;

    /*
     * usually "comment"
     * @var string
     */
    public $content_type;

    /*
     * @var int
     */
    public $type;
}