<?php
class Mrt_model extends CI_Model 
{

	public function __construct()
	{
			$this->load->database();
			$query_builder = TRUE;
	}
	
	public function get()
	{
		$url = 'http://data.taipei/opendata/datalist/datasetMeta/download?id=6556e1e8-c908-42d5-b984-b3f7337b139b&rid=55ec6d6e-dc5c-4268-a725-d04cc262172b';
        /*if ($url === 'nothing')
        {
			$url = "http://data.taipei/opendata/datalist/datasetMeta/download?id=6556e1e8-c908-42d5-b984-b3f7337b139b&rid=55ec6d6e-dc5c-4268-a725-d04cc262172b";
        }
		else
		{	*/		
			$data = file_get_contents($url); // 取得json字串
			$data = json_decode($data, true); // 將json字串轉成陣列
			
			return $data;
		//}
	}
	public function set($url = 'http://data.taipei/opendata/datalist/datasetMeta/download?id=6556e1e8-c908-42d5-b984-b3f7337b139b&rid=55ec6d6e-dc5c-4268-a725-d04cc262172b')
	{	
        if ($url === 'nothing')
        {
			$url = "http://data.taipei/opendata/datalist/datasetMeta/download?id=6556e1e8-c908-42d5-b984-b3f7337b139b&rid=55ec6d6e-dc5c-4268-a725-d04cc262172b";
        }
		
		$data = file_get_contents($url); // 取得json字串
		$data = json_decode($data, true); // 將json字串轉成陣列	
		
		//**     delete all first , then insert new data iin database  */
		if($this->db->count_all_results()>0)
			$this->db->empty_table('tbl_opendata');
		
		foreach($data as $value)
		{
			$this->db->insert('tbl_opendata', $value);
		}
		
		//**      confirm the data isn't already now    */
		/*foreach($data as $value) 
		{			
			//$sql = "INSERT INTO tbl_opendata (Station, Destination, UpdateTime) VALUES ('".$value['Station']."','".$value['Destination']."','". $value['UpdateTime']."')";
			$this->db->query($sql);
			echo $this->db->affected_rows();
		}*/
		$query = $this->db->get('tbl_opendata')->result();

		return $query;
		
	}
	
	public function delete()
	{
		$result = $this->db->empty_table('tbl_opendata');
		return $result ;
	}
	
	public function show()
	{
		$query = $this->db->get('tbl_opendata')->result();

		return $query;
	}
}
?>