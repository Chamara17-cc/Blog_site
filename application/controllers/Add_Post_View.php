<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Add_Post_View extends CI_Controller {

    public function index() {
        $this->load->view('add_post_view');
    }
}
?>