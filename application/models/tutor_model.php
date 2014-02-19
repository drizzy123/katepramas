<?php

/**
* @author Sandra Rono
*/
class Tutor_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	//list all tutors
	public function list_tutors()
	{
		$query = $this->db->get('tutors');
		//$result = array();
		$result = $query->result_array();
		return $result;
	}

	//get specific tutor
	public function get_tutor($id)
	{
		$query = $this->db->get_where('tutors', array('staff_no' => $id));
		return $query->row();
	}

	//create tutor
	public function create()
	{
		$no = $this->input->post('staffno');
		$passwd = md5('Tutor@'.$no);

		//tutors info to be inserted in tutors table
		$data = array(
					'staff_no' => $no,
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'dept' => $this->input->post('dept'));

		//user data for login purposes
		$u_data = array(
					'username' => $no,
					'passwd' => $passwd,
					'level' => 'tutor');

		$this->db->insert('tutors', $data); //create tutor

		return $this->db->insert('users', $u_data);
	}

	//update tutor
	public function update()
	{
		$id = $this->input->post('staff_no');
		$data = array(
					'fname' => $this->input->post('f_name'),
					'lname' => $this->input->post('l_name'),
					'dept' => $this->input->post('dept'));

		$this->db->where('staff_no', $id);
		return $this->db->update('tutors', $data);
	}
}

?>