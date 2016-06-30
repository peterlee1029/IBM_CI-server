<?php
class Opendata extends CI_Controller 
{		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Mrt_model');
		}
			
        public function index()
        {			
			$this->load->view('templates/header','MyOpenData');
			$this->load->view('pages/Myopendata');
			$this->load->view('templates/footer');
        }
		
		public function getDataFromOpenData()
		{
			$data ['mrt']= $this->Mrt_model->get();
			$this->load->view('templates/header', $data);
			$this->load->view('pages/showData', $data);
			$this->load->view('templates/footer');
		}
		
		public function setDataToDatabase()
		{
			$data ['mrt']= $this->Mrt_model->set();
			
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/setData', $data);
			$this->load->view('templates/footer');
		}
		
		public function showDataFromDatabase()
		{
			$data ['show']= $this->Mrt_model->show();
			$this->load->view('templates/header', $data);
			$this->load->view('pages/showDatabase', $data);
			$this->load->view('templates/footer');
		}
}
?>
