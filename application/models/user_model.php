<?php

/**
* @author Sandra Rono
*/
class User_model extends CI_Model
{
	
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$p = md5($password);

		$query = $this->db->query("SELECT * FROM users WHERE username = '$username' AND passwd = '$p'");

		if ($query->num_rows()==1) {

			$result = $query->row();

			$data = array(
						'user_id' => $result->user_id,
						'username' => $result->username,
						'user_level' => $result->level,
						'logged_in' => TRUE);

			$this->session->set_userdata($data);
			
			return 1;
		} else {
			return 0;
		}
	}

	public function isExist($id)
	{
		$query = $this->db->get_where('users', array('username' => $id));
		if ($query->num_rows()==0) {
			return 1; //user does not exist
		} else {
			return 0; //user exists
		}
	}
}

?>