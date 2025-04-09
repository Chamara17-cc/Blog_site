<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

class CloudinaryConfig
{
    public static function initialize()
    {
        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => 'dnxl5zlbm',
                'api_key'    => '445273354252121',
                'api_secret' => 'Ld8ae0fPxivA0vM4GMxLDNV1gjk'
            ]
        ]);
    }
}
