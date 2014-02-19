<?php

/**
* @author Sandra Rono
*/
class Posting extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('posting_model');
	}

	public function index()
	{
		$data['posts'] = $this->posting_model->list_postings();
		
		$this->load->view('layout/header');
		$this->load->view('postings', $data);
		$this->load->view('layout/footer');
	}
}

?>