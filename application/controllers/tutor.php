<?php

/**
* @author Sandra Rono
*/
class Tutor extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('tutor');
		$this->load->view('layout/footer');
	}

	public function students()
	{
		$data['students'] = $this->student_model->list_students();

		$this->load->view('layout/header');
		$this->load->view('student_list', $data);
		$this->load->view('layout/footer');
	}
}

?>