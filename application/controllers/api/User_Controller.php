<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

require APPPATH . 'libraries/RestController.php';
require FCPATH . 'vendor/autoload.php';

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
        $this->load->view('success_message'); // Load the success message view
    }

    public function storeuser_post()
    {
        $image_url = ''; // Default if no image is uploaded

        // Handle image upload
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
        $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('last_name', 'Last Name', 'alpha');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('aboutme', 'About Me'); // Optional field
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        // If validation fails, redirect with error
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/create_user_view');
            return;
        }

        // Prepare user data
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

        // Save to DB
        $result = $this->User_model->registerUser($register_data);

        if ($result) {
            $this->session->set_flashdata('success', 'User created successfully');
            redirect('login/login_user');
        } else {
            $this->session->set_flashdata('error', 'Failed to create user.');
            redirect('user/create_user_view');
        }
    }
}
