<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

defined('BASEPATH') or exit('No direct script access allowed');
class Get_User extends RestController
{
    public function index_get()
    {
        echo "This is the get method";
    }
}
