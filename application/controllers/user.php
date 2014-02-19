<?php

/**
* @author Sandra Rono
* @copyright 2014
*/

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function login()
	{
		$result = $this->user_model->login();
		
		if ($result == 0) { //could not login
			// Error to display
			$data = array('error' => 'Incorrect credentials');
			$this->load->view('layout/header');
			$this->load->view('home', $data);
			$this->load->view('layout/footer');
		} else { //successful login
			if ($this->session->userdata('user_level')=='student') {
				redirect('/student/postings', 'refresh');
			} elseif ($this->session->userdata('user_level')=='admin') {
				redirect('/admin', 'refresh');
			} elseif ($this->session->userdata('user_level')=='tutor') {
				redirect('/tutor', 'refresh');
			} else {
				show('404');
			}
			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/app','refresh');
	}

}

?>