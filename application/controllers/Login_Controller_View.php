<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class Login_Controller_View extends CI_Controller
{

    public function index()
    {
        $this->load->view('login_view');
    }
}
