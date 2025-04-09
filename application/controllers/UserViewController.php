<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserViewController extends CI_Controller
{
    public function index()
    {
        $this->load->view('create_user_view');
    }
}
