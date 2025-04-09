<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $data['posts'] = $this->Post_model->getRandomPosts();
        $data['photolink'] = $this->getFooterImages();

        foreach ($data['posts'] as &$post) {
            $reactions = $this->Post_model->getPostReactions($post['postid']);
            $post['like_count'] = $reactions->like_count ?? 0;
            $post['dislike_count'] = $reactions->dislike_count ?? 0;
        }

        $this->load->view('dashboard_view', $data);
    }

    public function getFooterImages()
    {
        $this->db->select('photolink');
        $this->db->limit(7);
        return $this->db->get('posts')->result_array();
    }
    public function getPostLikes($postid)
    {
        // Assuming you are using a method like this to fetch like/dislike counts
        $result = $this->Post_model->getPostReactions($postid);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'like_count' => [
                    'like_count' => $result->like_count,
                    'dislike_count' => $result->dislike_count
                ]
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Post not found or no reactions yet.'
            ]);
        }
    }
}
