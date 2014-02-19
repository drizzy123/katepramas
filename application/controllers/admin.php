<?php

/**
* @author Sandra Rono
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$this->load->model('schools_model');
			$data['schools'] = $this->schools_model->list_schools();
			$data['locations'] = $this->schools_model->list_locations();
			$this->load->view('layout/header');
			$this->load->view('admin', $data);
			$this->load->view('layout/footer');
	}

	public function create_tutor()
	{
			$this->load->view('layout/header');
			$this->load->view('create_tutor');
			$this->load->view('layout/footer');
	}

	public function home()
	{
			redirect('admin', 'refresh');
	}

	//load tutors page
	public function tutors()
	{
		$this->load->model('tutor_model');
		$data['tutors'] = $this->tutor_model->list_tutors();
		$this->load->view('layout/header');
		$this->load->view('tutor_list', $data);
		$this->load->view('layout/footer');
	}

	//create tutor
	public function add_tutor()
	{
		$this->load->model('tutor_model');
		if ($this->tutor_model->create()) {
			redirect('admin/tutors', 'refresh');
		}
	}

	//create new school
	public function create_school()
	{
		$this->load->model('schools_model');
		if ($this->schools_model->create()) {
			redirect('admin/home', 'refresh');
		}
	}

	//load edit school form
	public function edit_school($id)
	{
		$this->load->model('schools_model');
		$data['e_school'] = $this->schools_model->get_school($id);
		$data['schools'] = $this->schools_model->list_schools();
		$data['locations'] = $this->schools_model->list_locations();
		$this->load->view('layout/header');
		$this->load->view('edit_school', $data);
		$this->load->view('layout/footer');
	}

	public function update_school()
	{
		$this->load->model('schools_model');
		if ($this->schools_model->update()) {
			redirect('admin/home', 'refresh');
		}
	}

	public function edit_tutors($id)
	{
		$this->load->model('tutor_model');
		$data['tutors'] = $this->tutor_model->list_tutors();
		$data['tutor'] = $this->tutor_model->get_tutor($id);
		$this->load->view('layout/header');
		$this->load->view('edit_tutors', $data);
		$this->load->view('layout/footer');
	}

	public function update_tutor()
	{
		$this->load->model('tutor_model');

		if ($this->tutor_model->update()) {
			redirect('admin/tutors', 'refresh');
		}
	}

	public function create_zone()
	{
		$this->load->model('schools_model');
		if ($this->schools_model->create_zone()) {
			redirect('admin/', 'refresh');
		}
	}

	public function post_tutors()
	{
		$this->load->model('schools_model');
		$this->load->model('tutor_model');
		$data['tutors'] = $this->tutor_model->list_tutors();
		$data['locations'] = $this->schools_model->list_locations();
		$this->load->view('layout/header');
		$this->load->view('post_tutor', $data);
		$this->load->view('layout/footer');

	}

}

?>