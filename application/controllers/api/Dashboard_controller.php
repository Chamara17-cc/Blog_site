<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class Dashboard_controller extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
    }
    public function getPosts_get()
    {
        $posts_collection['posts'] = $this->Post_model->getRandomPosts();
        return $posts_collection['posts'];
    }
    
}
