<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	public function index()
	{
		log_message('debug', 'this->setMessage()');
		$this->load->view('index');
	}
}
