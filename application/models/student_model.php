<?php

/**
* @author Sandra Rono
*/
class Student_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	//register new student
	public function register()
	{
		$admno = $this->input->post('admno');
		$passwd = $this->input->post('pass');

		$this->session->set_userdata('username', $admno);
		$this->session->set_userdata('user_level', 'student');

		$this->load->model('user_model');
		if ($this->user_model->isExist($admno) == 0) {
			return 1; //user exists
		} else {

			$data = array(
					'username' => $admno,
					'passwd' => md5($passwd),
					'level' => 'student');

			$query = $this->db->insert('users', $data);
			$this->db->insert('students', array('adm_no' => $admno));
			if ($query) {
				return 0;
			}
		}
	}

	//get student details
	public function get_studentdetails($adm)
	{
		$details = array();
		$query = $this->db->get_where('students', array('adm_no' => $adm));
		$details = $query->row();
		return $details;
	}

	//update student details
	public function update()
	{
		$adm = $this->session->userdata('username');
		$data = array(
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'));
		if ($this->isNew($adm)) {
			$data['adm_no'] = $adm;
			$query = $this->db->insert('students', $data);
		} else {
			$this->db->where('adm_no', $adm);
			$query = $this->db->update('students', $data);
		}

		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//check if student profile has been updated before
	public function isNew($id)
	{
		$query = $this->db->get_where('students', array('adm_no' => $id));
		if ($query->num_rows()==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//get logged in student full name
	public function get_studentname()
	{
		$adm = $this->session->userdata('username');
		$query = $this->db->query("SELECT CONCAT(fname, ' ', lname) AS name FROM students WHERE adm_no = '$adm'");
		$result = "";
		$result = $query->row();
		return $result->name;
	}

	//list all students
	public function list_students()
	{
		$query = $this->db->get('students');
		return $query->result_array();
	}

	//get logged in student results results
	public function get_results()
	{
		$adm = $this->session->userdata('username');

		$query = $this->db->get_where('result_details', array('student_admno' => $adm));

		return $query->result_array();
	}
}

?>