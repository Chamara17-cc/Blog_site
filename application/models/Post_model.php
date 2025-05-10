<?php
class Post_model extends CI_Model
{

    // This function is used to add a post to the database.
    // It takes an associative array $data as input, which contains the post details.
    //This will retun true if the insertion was successful, otherwise false.
    public function addPost($data)
    {
        $this->db->insert('posts', $data);
        return ($this->db->affected_rows() > 0);
    }
    //This fuction will get random posts form the database.
    //This will return an array of posts if successful, otherwise an empty array.
    public function getRandomPosts()
    {
        $this->db->select('posts.*, users.first_name, users.last_name');
        $this->db->from('posts');
        $this->db->join('users', 'users.userid = posts.userid', 'left');
        $this->db->order_by('RAND()');
        $this->db->limit(10); // Set limit

        $query = $this->db->get(); // Execute the query

        return ($query->num_rows() > 0) ? $query->result_array() : [];
    }
    //This function will get all posts from the database that match for loggedin userid.
    //This will return an array of posts if successful, otherwise an empty array.
    public function getUserPosts($userid)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('posts.userid', $userid);

        $query = $this->db->get(); // Execute the query

        return ($query->num_rows() > 0) ? $query->result_array() : [];
    }
    public function deletePostByid($postid)
    {
        $this->db->where('postid', $postid);
        return $this->db->delete('posts');
    }
    //When user click on like or dislike button this will store its userid and postid in the database
    //If successful, it will return true, otherwise false.
    public function updateLike($data)
    {
        $this->db->where('postid', $data['postid']);
        $this->db->where('userid', $data['userid']);
        $query = $this->db->get('likes');

        if ($query->num_rows() > 0) {
            return false;
        } else {
            $this->db->insert('likes', $data);
            return ($this->db->affected_rows() > 0);
        }
    }

    //This function will get the post reactions (like and dislike counts) for a specific post.
    //It takes the post ID as input and returns an object with like_count and dislike_count properties.
    public function getPostReactions($postid)
    {
        $this->db->select("
            SUM(CASE WHEN liketype = 1 THEN 1 ELSE 0 END) AS like_count,
            SUM(CASE WHEN liketype = 2 THEN 1 ELSE 0 END) AS dislike_count
        ");
        $this->db->from('likes');
        $this->db->where('postid', $postid);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return (object) ['like_count' => 0, 'dislike_count' => 0];
        }
    }
}
