<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class opendataAPI extends REST_Controller 
{		
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Mrt_model');
	}
	
	public function List_get($offset=1,$number=10)
	{
		$this->load->database();
		$query = $this->db->get('taipei_pet_adopted',$number,$offset);
		$this->response($query->result_array());
	}
	
	public function List_post()
	{
		$field = $this->input->post('txtField2');
		$offset = $this->input->post('txtOffset2');
		$count = $this->input->post('txtCount2');
		$this->load->database();
		$this->db->select($field);
		$query = $this->db->get('taipei_pet_adopted',$count,$offset);
		$this->response($query->result_array());
		//$this->response($field);
	}

	public function Search_post()
	{
		$key = $this->input->post('txtKey3');
		$field = $this->input->post('txtField3');
		$this->load->database();

		//$this->db->select($field);		
		$this->db->where($field,$key);
		$query = $this->db->get('taipei_pet_adopted');
		$this->response($query->result_array());
		
	}
	
	public function Delete_post()
	{
		$key = $this->input->post('txtKey4');
		$field = $this->input->post('txtField4');
		$this->load->database();

		//$this->db->select($field);		
		$this->db->delete('taipei_pet_adopted',array($field=>$key));
		/*$query = $this->db->get('taipei_pet_adopted');
		$this->response($query->result_array());*/
		$this->response($this->db->affected_rows());
		
	}		
}
?>