<?php
//**  https://github.com/chriskacerguis/codeigniter-restserver   **/
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class RestTest extends REST_Controller 
{
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Mrt_model');
	}

	public function getOP_get()
    {
		$data = $this->Mrt_model->get();
		$this->response($data);
	}
	
	public function getDB_get($number=100,$offset=1)
	{
		$query = $this->db->get('tbl_opendata_e',$number,$offset);
		$this->response($query->result_array());
	}
	
	public function deleteDB_get($SBMXADDR='臺北市松山區八德路三段12巷52弄13號1樓')
	{
		echo $SBMXADDR . "<br>\n";
		echo urldecode($SBMXADDR);
		$str = "DELETE FROM  `tbl_opendata_e` WHERE  `SBMXADDR` =  '" . urldecode($SBMXADDR) . "'";
		echo $str;
		$this->db->query($str);
		//$query = $this->db->delete('tbl_opendata_e',array('SBMXADDR' => "$SBMXADDR"));
		$this->response($this->db->affected_rows());
	}
	
	public function List_get($offset=1,$number=100)
	{
		$query = $this->db->get('tbl_opendata_e',$number,$offset);
		$this->response($query->result_array());
	}
}
?>