
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {


    public function submit_message($message) {
        $query= $this->db->insert('contacts', $message);
        return  ($this->db->affected_rows()>0);
    }
}
?>