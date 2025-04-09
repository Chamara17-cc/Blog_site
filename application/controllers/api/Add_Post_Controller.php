
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Uploader;

require APPPATH . 'libraries/RestController.php';
require FCPATH . 'vendor/autoload.php';

class Add_Post_Controller extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->library('session');
    }


    public function addpost_post()
    {
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

        if (!$this->session->userdata('userid')) {
            $this->session->set_flashdata('error', 'Please login to add a post');
            redirect('login/login_user'); // Redirect back to login page
        }
        $userid = $this->session->userdata('userid');

        if (!empty($_FILES['image']['name'])) {
            $upload = (new UploadApi())->upload($_FILES['image']['tmp_name']);

            if ($upload) {
                $image_url = $upload['secure_url'];

                $data = [
                    'userid' => $userid,
                    'photolink' => $image_url,
                    'title' => $this->input->post('title'),
                    'type' => $this->input->post('foodtype'),
                    'description' => $this->input->post('description'),
                    'ingrediants' => $this->input->post('ingrediants'),
                    'instructions' => $this->input->post('instructions'),
                    'tags' => $this->input->post('tags')
                ];

                $this->Post_model->addPost($data);

                $this->session->set_flashdata('success', 'Post added successfully!');
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Image upload failed!');
                redirect('admin/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Please select an image.');
            redirect('admin/dashboard');
        }
    }
    public function updateLike_post()
    {
        $postid = $this->input->post('postid');
        $userid = $this->input->post('userid');
        $type = $this->input->post('type');

        if (!is_numeric($postid) || !is_numeric($userid)) {
            show_404();
        }
        if ($type == 1) {
            $data = [
                'liketype' => 1,
                'userid' => $userid,
                'postid' => $postid
            ];
        } else if ($type == 2) {
            $data = [
                'liketype' => 2,
                'userid' => $userid,
                'postid' => $postid
            ];
        } else {
            show_404();
        }
        $result = $this->Post_model->updateLike($data);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Post liked successfully.']);
        } else {
            echo json_encode(['status' => 'fail', 'message' => 'Fail to like.']);
        }
    }
    // public function getPostLikes_get($postid)
    // {
    //     if (!is_numeric($postid)) {
    //         show_404();
    //     }
    //     $result = $this->Post_model->getPostReactions($postid);
    //     if ($result) {
    //         echo json_encode(['status' => 'success', 'like_count' => $result]);
    //     } else {
    //         echo json_encode(['status' => 'fail', 'like_count' => 0]);
    //     }
    // }
}
