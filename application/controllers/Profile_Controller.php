<?php
class Profile_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function myprofile()
    {
        $userid = $this->session->userdata('userid');
        if (!$userid) {
            $this->session->set_flashdata('error', 'Please login to view your profile');
            redirect('login/login_user');
        }
        $this->index($userid);
    }
    public function index($userid)
    {
        if (!is_numeric($userid)) {
            show_404();
        }
        $selecteduser = $this->User_model->getUserDetails($userid);
        $userposts = $this->Post_model->getUserPosts($userid);
        if (!$selecteduser) {
            show_404();
        }
        $profiledata = [
            'selecteduser' => $selecteduser,
            'userposts' => $userposts
        ];
        $this->load->view('profile_view', $profiledata);
    }
    public function deletePost($postid, $userid)
    {
        if (!is_numeric($postid)) {
            show_404();
        }
        $result = $this->Post_model->deletePostByid($postid);
        if ($result) {
            $this->session->set_flashdata('success', 'Post deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the post.');
        }
        redirect('profile/' . $userid);
    }
}
