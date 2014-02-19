<?php

/**
* @author Sandra Rono
*/
class Schools_model extends CI_Model
{
	
	public function create()
	{
		$data = array(
					'sch_name' => $this->input->post('sch_name'),
					'vacancies' => $this->input->post('vacancies'),
					'location' => $this->input->post('location'));

		return $this->db->insert('schools', $data);
	}

	public function list_schools()
	{
		$query = $this->db->get('schools');
		return $query->result_array();
	}

	public function list_locations()
	{
		$query = $this->db->get('zones');
		return $query->result_array();
	}

	public function get_school($id)
	{
		$query = $this->db->get_where('schools', array('sch_id' => $id));
		return $query->row();
	}

	//update school details
	public function update()
	{
		$id = $this->input->post('sch_id');
		
		$data = array(
					'sch_name' => $this->input->post('sch_name'),
					'vacancies' => $this->input->post('vacancies'),
					'location' => $this->input->post('location'));

		$this->db->where('sch_id', $id);
		return $this->db->update('schools', $data);
	}

	public function create_zone()
	{
		$zone_name = $this->input->post('location');
		$data = array('zone_name' => $zone_name);
		return $this->db->insert('zones', $data);
	}
}

?>