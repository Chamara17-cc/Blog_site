<?php
class Contact_Us_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Common_model');
    }

    public function index()
    {
        $data['photolink'] = $this->Common_model->getFooterImages();
        $this->load->view('contact_us_view', $data);
    }
    public function store_user_messages()
    {
        if (!$this->session->userdata('userid')) {
            $this->session->set_flashdata('error', 'Please login to add a post');
            redirect('login/login_user'); // Redirect back to login page
        }
        $userid = $this->session->userdata('userid');

        $this->load->model('Contact_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'trim');
        if ($this->form_validation->run) {
            $this->session->set_flashdata('error', validation_errors());
            $this->index();
            return;
        } else {
            $message = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'userid' => $userid
            ];

            $result = $this->Contact_model->submit_message($message);
            if ($result) {
                $this->session->set_flashdata('success', 'Message sent successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to send message.');
            }
            $this->index();
        }
    }
}
