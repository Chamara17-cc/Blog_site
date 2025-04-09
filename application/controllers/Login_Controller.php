<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class Login_Controller extends RestController

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session'); // Load session library
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function login_post()
    {
        if ($this->input->post()) {  // Ensure POST request is received
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            $user = $this->User_model->loginUser($email, $password);

            if ($user) {
                // Store user session data
                $this->session->set_userdata('userid', $user['userid']);
                print_r($this->session->userdata('userid'));
                redirect('admin/dashboard'); // Redirect to dashboard on success
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password'); // Store error message
                redirect('login/login_user'); // Redirect back to login page
            }
        } else {
            show_error("Invalid Input", 400);
        }
    }
}
