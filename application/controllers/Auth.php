<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->database();
    }



    public function login() {
        if ($this->session->userdata('user_id')) {
            redirect('task/list');
        }
        $this->load->view('auth/login');
    }
	

	public function login_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->User_model->get_user_by_username($username);
        
        if ($user && password_verify($password, $user['password'])) {

            $this->session->set_userdata('user_id', $user['id']);

            redirect('task/list');
        } else {
            echo "Invalid login!";
        }
    }



    public function register() {
        $this->load->view('auth/register');
    }

    public function register_user() {
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$email = $this->input->post('email'); 
	
		if ($this->User_model->create_user($username, $password, $email)) { 
			$this->session->set_flashdata('success', 'User Register Sucessfully.');				 
			redirect('auth/login');
		} else {
			echo "Registration failed!";
		}
	}
	


    public function logout() {
        
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('success', 'Logged out successfully');
        redirect('auth/login');
    }
}
?>
