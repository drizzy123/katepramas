<?php

/**
* @author Sandra Rono
*/
class Posting_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	//gets logged in student details
	public function get_studentpostings()
	{
		$adm = $this->session->userdata('username');
		$query = $this->db->get_where('postings', array('student_admno' => $adm));
		$result = array();
		$result = $query->row();
		return $result;
	}

	//get posted school name
	public function get_schoolname($id)
	{
		$query = $this->db->get_where('schools', array('sch_id' => $id));
		$result = $query->row();
		return $result->sch_name;
	}

	//get posted class name
	public function get_classname($id)
	{
		$query = $this->db->get_where('classes', array('class_id' => $id));
		$result = $query->row();
		return $result->class_name;
	}

	//get posted subject options
	public function get_opts($id)
	{
		$query = $this->db->get_where('opts', array('opt_id' => $id));
		$result = $query->row();
		return $result->opt_details;
	}

	//list available schools
	public function list_schools()
	{
		$this->db->where('vacancies >', 0);
		$query = $this->db->get('schools');
		return $query->result();
	}

	//list avaiable classes
	public function list_classes()
	{
		$query = $this->db->get('classes');
		return $query->result();
	}

	//public function list subject options
	public function list_options()
	{
		$query = $this->db->get('opts');
		return $query->result();
	}

	//apply tp
	public function applyTP()
	{
		$adm = $this->session->userdata('username');
		$data = array(
					'student_admno' => $adm,
					'post_classid' => $this->input->post('class'),
					'post_schid' => $this->input->post('school'),
					'post_optid' => $this->input->post('opt'),
					'postedon' => date('Y-m-d H:i:s'));

		return $this->db->insert('postings', $data);
	}

	//list postings
	public function list_postings()
	{
		$query = $this->db->get('post_details');
		return $query->result_array();
	}
}

?>