<?php

/**
* @author Sandra Rono
*/
class Student extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
	}

	//load the student registration page
	public function index()
	{
			$this->load->view('layout/header');
			$this->load->view('register');
			$this->load->view('layout/footer');
	}

	//load student dashboard after successful login
	public function home()
	{
			$this->load->view('layout/header');
			$this->load->view('student');
			$this->load->view('layout/footer');
	}
	
	//register new student
	public function register()
	{
		$result = $this->student_model->register();
		if ($result==0) {
			redirect('/student/profile', 'refresh');;
		} elseif ($result==1) {
			$data = array('response' => 'You have already been registered');
			$this->load->view('layout/header');
			$this->load->view('register', $data);
			$this->load->view('layout/footer');
		} else {
			$data = array('response' => 'An unknown error has occured. Please try again');
			$this->load->view('layout/header');
			$this->load->view('register', $data);
			$this->load->view('layout/footer');
		}
		
	}

	//load the student profile page
	public function profile()
	{
		$adm = $this->session->userdata('username');
		$data['details'] = $this->student_model->get_studentdetails($adm);
		$this->load->view('layout/header');
		$this->load->view('student_profile', $data);
		$this->load->view('layout/footer');
	}

	//update student profile
	public function update_profile()
	{
		$result = $this->student_model->update();
		$adm = $this->session->userdata('username');
		$data['details'] = $this->student_model->get_studentdetails($adm);

		if ($result) {
			$data['response'] = "Profile updated successfully";
			redirect('student/postings', 'refresh');
		} else {
			$data['response'] = "Unable to update profile please check input and try again";
		}

		$this->load->view('layout/header');
		$this->load->view('student_profile', $data);
		$this->load->view('layout/footer');
	}

	//load student postings
	public function postings()
	{
		$level = $this->session->userdata('user_level');
		if ($level != 'student') {
			echo "This is a student's only page";
		}
		$this->load->model('posting_model');
		$data['posting'] = $this->posting_model->get_studentpostings();
		if (empty($data['posting'])) {
			$data['posting'] = array();
		} else {
			foreach ($data as $posting) {
				$data['school_name'] = $this->posting_model->get_schoolname($posting->post_schid);
				$data['class_name'] = $this->posting_model->get_classname($posting->post_classid);
				$data['opts'] = $this->posting_model->get_opts($posting->post_optid);
				$data['student'] = $this->student_model->get_studentname();
			}
		}
		$data['schools'] = $this->posting_model->list_schools();
		$data['classes'] = $this->posting_model->list_classes();
		$data['options'] = $this->posting_model->list_options();

		$this->load->view('layout/header');
		$this->load->view('student_posting', $data);
		$this->load->view('layout/footer');
	}

	//apply for tp
	public function post()
	{
		$this->load->model('posting_model');
		if ($this->posting_model->applyTP()) {
			redirect('/student/postings' , 'refresh');
		}
	}

	//student results
	public function results()
	{
		$data['results'] = $this->student_model->get_results();

		$this->load->view('layout/header');
		$this->load->view('student_results', $data);
		$this->load->view('layout/footer');
	}
}

?>