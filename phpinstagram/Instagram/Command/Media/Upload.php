<?php

namespace phpinstagram\Instagram\Command\Media;

class Upload extends \phpinstagram\Instagram\Command\AbstractCommand {
    /**
     * TODO:
     * POST /api/v1/media/upload/ HTTP/1.1\r\n
     * Content-Type: multipart/form-data; charset=utf-8; boundary=0xKhTmLbOuNdArY
     * --0xKhTmLbOuNdArY
     * Content-Disposition: form-data; name="device_timestamp"
     *
     * 0
     * --0xKhTmLbOuNdArY
     * Content-Disposition: form-data; name="lat"
     *
     * 0
     * --0xKhTmLbOuNdArY
     * Content-Disposition: form-data; name="lng"
     *
     * 0
     * --0xKhTmLbOuNdArY
     * Content-Disposition: form-data; name="photo"; filename="file"
     * Content-Type: application/octet-stream
     * .....
     * binary data
     * ...
     * {"status": "ok"}
     */

}