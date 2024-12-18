<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function create_user($username, $password, $email) {
		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,  
		);
		return $this->db->insert('users', $data);
	}
	

    public function get_user_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }
}
?>
