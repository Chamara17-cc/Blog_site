<?php
class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFooterImages()
    {
        $this->db->select('photolink');
        $this->db->limit(7);
        return $this->db->get('posts')->result_array();
    }
}
?>