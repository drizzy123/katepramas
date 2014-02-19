<?php

/**
* @author Sandra Rono
*/
class App extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('home');
		$this->load->view('layout/footer');
	}
}

?>