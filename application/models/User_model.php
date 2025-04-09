<?php

class User_model extends CI_Model
{
    public function registerUser($register_data)
    {
        $this->db->insert('users', $register_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function loginUser($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $user = $query->row_array(); // Fetch user as an array

            // If passwords are hashed, use password_verify()
            if (password_verify($password, $user['password'])) {
                return $user; // Return user data if password is correct
            }
        }
        return false; // Return false if login fails
    }
    public function getUserDetails($userid){
        $this->db->where('userid', $userid);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return user data as an array
        } else {
            return false; // Return false if user not found
        }
    }
}
