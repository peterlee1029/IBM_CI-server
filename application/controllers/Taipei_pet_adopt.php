<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taipei_pet_adopt extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mrt_model');
	}

	public function index()
	{
		/*$this->Pet_model->set();
		$this->load->view('welcome_message');
		$this->load->view('templates/footer');*/
	}
}
