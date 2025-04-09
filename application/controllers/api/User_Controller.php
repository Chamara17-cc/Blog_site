<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\Uploader;

require APPPATH . 'libraries/RestController.php';
require FCPATH . 'vendor/autoload.php';

defined('BASEPATH') or exit('No direct script access allowed');
class User_Controller extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');

        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dnxl5zlbm',
                'api_key'    => '445273354252121',
                'api_secret' => 'Ld8ae0fPxivA0vM4GMxLDNV1gjk'
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }

    public function success_message()
    {

        $this->load->view('success_message');  // Load the success message view
    }

    public function storeuser_post()
    {

        $this->load->model('User_model');
        $image_url = ''; // Default if no image is uploaded


        if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) {
            $this->session->set_flashdata('error', 'No file uploaded or upload error occurred.');
            redirect('user/create_user_view');
            return;
        }

        try {
            $upload = (new UploadApi())->upload(realpath($_FILES['image']['tmp_name']));
            $image_url = $upload['secure_url'];
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Cloudinary Upload Error: ' . $e->getMessage());
            redirect('user/create_user_view');
            return;
        }
        // Validate form data
        $this->form_validation->set_validation('first_name', 'First Name', 'required|alpha');
        $this->form_validation->set_validation('last_name', 'Last Name', 'required|alpha');
        $this->form_validation->set_validation('phone_number', 'Phone Number', 'required|numeric');
        $this->form_validation->set_validation('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_validation('aboutme', 'About Me');
        $this->form_validation->set_validation('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run) {
            $this->session->set_flashdata('error', validation_errors());
            return;
        } else {
            // Prepare data for database
            $register_data = [
                'first_name'        => $this->input->post('first_name'),
                'last_name'         => $this->input->post('last_name'),
                'phone_number'      => $this->input->post('phone_number'),
                'email'             => $this->input->post('email'),
                'aboutme'           => $this->input->post('aboutme'),
                'gender'            => $this->input->post('gender'),
                'state'             => $this->input->post('state'),
                'city'              => $this->input->post('city'),
                'dob'               => $this->input->post('dob'),
                'profile_photo_link' => $image_url,
                'password'          => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'userrole'          => $this->input->post('userrole')
            ];

            // Register user
            $result = $this->User_model->registerUser($register_data);
            if ($result) {
                $this->session->set_flashdata('success', 'User created successfully');
                redirect('login/login_user');
            } else {
                $this->session->set_flashdata('error', 'Failed to create user.');
                redirect('success_message');
            }
        }
    }
}
