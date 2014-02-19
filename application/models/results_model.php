<?php

/**
* @author Sandra Rono
*/
class Results_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	//list results
	public function list_results()
	{
		$query = $this->db->get('result_details');
		return $query->result_array();
	}

	//list all subjects
	public function list_subjects()
	{
		$query = $this->db->get('subject');
		return $query->result_array();
	}

	//create results
	public function create_results()
	{
		$data = array(
					'student_admno' => $this->input->post('student'),
					'assessment_date' => $this->input->post('a_date'),
					'subject' => $this->input->post('subject'),
					'marks' => $this->input->post('marks'),
					'post_date' => date('Y-m-d H:i:s'),
					'posted_by' => $this->session->userdata('username'));

		return $this->db->insert('results', $data);
	}

	//get specific results entry
	public function get_results($id)
	{
		$query = $this->db->get_where('results', array('result_id' => $id));
		return $query->row();
	}

	//update results
	public function update_results()
	{
		$id = $this->input->post('result_id');
		$data = array(
					'assessment_date' => $this->input->post('a_date'),
					'marks' => $this->input->post('marks'));
		
		$this->db->where('result_id', $id);
		return $this->db->update('results', $data);
	}

	//get individual student results
	public function get_myresults($adm)
	{
		$query = $this->db->get_where('result_details', array('student_admno' => $adm));
		return $query->result();
	}

	//get summarised student results
	public function get_summaryresults($adm = "")
	{
		if ($adm == "") {
			$query = $this->db->query("SELECT SUM(marks) AS total_marks, COUNT(sub_name) AS total_subjects, student_admno FROM result_details GROUP BY student_admno");
		} else {
			$query = $this->db->query("SELECT SUM(marks) AS total_marks, COUNT(sub_name) AS total_subjects, student_admno FROM result_details WHERE student_admno = $adm GROUP BY student_admno");
		}

		return $query->result_array();
	}
}

?>