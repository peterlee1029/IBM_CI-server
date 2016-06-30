<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enternal extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Enternal_model');
		$this->load->helper('url');
	}

	public function index()
	{		
		$this->load->view('controllers/start.html');
		$this->load->view('templates/footer');
	}
}
