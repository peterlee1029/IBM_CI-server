<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Catchdata extends Rest_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		 parent::__construct();
		 $this->load->database();
		 //include('simple_html_dom.php');
	 }
	 /*public function gettool_get(){
		 			$major ='資訊管理學系';//$aRequest->major;
			switch($major){
				case "應用中文學系":
					break;
				case "觀光管理學系":
					break;
				case "服飾設計與經營學系":
					break;
				case "應用日文學系":
					break;
				case "時尚設計學系":
					$html =file_get_html('https://www.104.com.tw/jb/career/department/view?degree=3&sid=5073000000&mid=230104');
					foreach($html->find('.tag_tool_4') as $element){
						$data = array(
								'tool' => $element->innertext,
								'stutype' =>'時尚設計學系'
						);
						$this->db->insert('tool', $data);
					}
					
					
					break;
				case "資訊管理學系":
					$html =file_get_html('https://www.104.com.tw/jb/career/department/view?sid=5073000000&mid=480109&degree=3&type=5');
					foreach($html->find('.tag_tool_4') as $element){
						$data = array(
								'tool' => $element->innertext,
								'stutype' =>'資訊管理學系'
						);
						$this->db->insert('tool', $data);
					}
					foreach($html->find('.tag_tool_3') as $element){
						$data = array(
								'tool' => $element->innertext,
								'stutype' =>'資訊管理學系'
						);
						$this->db->insert('tool', $data);
					}
					foreach($html->find('.tag_tool_2') as $element){
						$data = array(
								'tool' => $element->innertext,
								'stutype' =>'資訊管理學系'
						);
						$this->db->insert('tool', $data);
					}
					
					break;
				case "資訊科技與通訊學系":
					break;
				case "國際企業管理學系":
					break;
				case "行銷管理學系":
					break;
				case "資訊模擬與設計學系":
					break;
				case "國際貿易學系":
					break;
				case "應用英文學系":
					break;
				case "會計暨稅務學系":
					break;
				case "金融管理學系":
					break;
				case "休閒產業管理學系":
					break;	
				
				
				
				
			}
		 
	 }
	 public function getskill_get(){  //從104網站抓取具備技能
		 $oPostdata = file_get_contents("php://input");
			$aRequest =json_decode($oPostdata);
			$major ='時尚設計學系';//$aRequest->major;
			switch($major){
				case "應用中文學系":
					break;
				case "觀光管理學系":
					break;
				case "服飾設計與經營學系":
					break;
				case "應用日文學系":
					break;
				case "時尚設計學系":
					$html =file_get_html('https://www.104.com.tw/jb/career/department/view?degree=3&sid=5073000000&mid=230104');
					foreach($html->find('.tag_skill_4') as $element){
						$data = array(
								'skill' => $element->innertext,
								'stutype' =>'時尚設計學系'
						);
						$this->db->insert('skill', $data);
					}
					foreach($html->find('.tag_skill_2') as $element){
						$data = array(
								'skill' => $element->innertext,
								'stutype' =>'時尚設計學系'
						);
						$this->db->insert('skill', $data);
					}
					foreach($html->find('.tag_skill_3') as $element){
						$data = array(
								'skill' => $element->innertext,
								'stutype' =>'時尚設計學系'
						);
						$this->db->insert('skill', $data);
					}
					
					
					break;
				case "資訊管理學系":
					$html =file_get_html('https://www.104.com.tw/jb/career/department/view?sid=5073000000&mid=480109&degree=3&type=5');
					foreach($html->find('.tag_skill_4') as $element){
						$data = array(
								'skill' => $element->innertext,
								'stutype' =>'資訊管理學系'
						);
						$this->db->insert('skill', $data);
					}
					foreach($html->find('.tag_skill_2') as $element){
						$data = array(
								'skill' => $element->innertext,
								'stutype' =>'資訊管理學系'
						);
						$this->db->insert('skill', $data);
					}
					foreach($html->find('.tag_skill_3') as $element){
						$data = array(
								'skill' => $element->innertext,
								'stutype' =>'資訊管理學系'
						);
						$this->db->insert('skill', $data);
					}
					
					break;
				case "資訊科技與通訊學系":
					break;
				case "國際企業管理學系":
					break;
				case "行銷管理學系":
					break;
				case "資訊模擬與設計學系":
					break;
				case "國際貿易學系":
					break;
				case "應用英文學系":
					break;
				case "會計暨稅務學系":
					break;
				case "金融管理學系":
					break;
				case "休閒產業管理學系":
					break;	
				
				
				
				
			}
		 
	 }*/
	 public function index_get(){
		 
		 echo "sss";
	 }
	 public function getback_get(){
		 $query=$this->db->get('backmanager');
		 foreach($query->result() as $row){
			 $data[]=array(
				'logintime'=>$row->logintime,
				'usemessage'=>$row->usemessage,
				'ipaddress'=>$row->ipaddress
			 );	 
		 }
		 echo "<table border=1>";
		 echo "<tr><td>時間</td><td>用戶端訊息</td><td>IP</td></tr>";
		 foreach($data as $row){
			 echo "<tr>";
			 echo "<td>".$row['logintime']."</td>";
			 echo "<td>".$row['usemessage']."</td>";
			 echo "<td>".$row['ipaddress']."</td>";
			 echo "</tr>";
		 }
		 echo "</table>";
		 
	 }
	public function ccc_get()
	{
		$query = $this->db->get('project');
		foreach ($query->result() as $row)
		{
			echo $row->p_name;
		}
	}
	public function checklogin_post(){
		$oPostdata = file_get_contents("php://input");
		$data = json_decode($oPostdata);
		$identify=$data->identify;
		$this->db->where('username', $data->name);
		$this->db->where('password', $data->password);
		$this->db->where('identify', $data->identify);
		$query = $this->db->get('login');
		$i=0;
		foreach ($query->result() as $row)
		{
			$i++;
		}
		$arr=array(
			"res"=>$i,
			"iden"=>$identify
		);
		echo json_encode($arr);
	}
	public function select_post(){
		$oPostdata = file_get_contents("php://input");
		$aRequest =json_decode($oPostdata);
		$major =$aRequest->major;
		switch($major){
			case "應用中文學系":
				break;
			case "觀光管理學系":
				break;
			case "服飾設計與經營學系":
				break;
			case "應用日文學系":
				break;
			case "時尚設計學系":
				$str=file_get_contents("http://114.35.237.112/CI/index.php/EnternalAPI/catchstudata");
				echo $str;	
				break;
			case "資訊管理學系":
				$query = $this->db->get('project');
				foreach ($query->result() as $row)
				{
					if(strstr($row->p_date, '2015')){
						 $date='2015';
					 }else if(strstr($row->p_date, '2014')){
						 $date='2015';
					 }else if(strstr($row->p_date, '2013')){
						 $date='2013';
					 }else if(strstr($row->p_date, '2012')){
						 $date='2012';
					 }
					$arr[]=array(
						'name'=>urlencode($row->p_name),
						'teacher'=>urlencode($row->p_adviser),
						'type'=>urldecode($row->p_type),
						'desc'=>urldecode($row->p_description),
						'date'=>$date
					);
				}
				echo urldecode(json_encode($arr));
				break;
			case "資訊科技與通訊學系":
				break;
			case "國際企業管理學系":
				break;
			case "行銷管理學系":
				break;
			case "資訊模擬與設計學系":
				break;
			case "國際貿易學系":
				break;
			case "應用英文學系":
				break;
			case "會計暨稅務學系":
				break;
			case "金融管理學系":
				break;
			case "休閒產業管理學系":
				break;	
			
			
			
			
		}
		
	}
	public function searchforname_post(){
		$oPostdata = file_get_contents("php://input");
		$aRequest =json_decode($oPostdata);
		$this->db->where('s_name', $aRequest->keys);
		$query=$this->db->get('member');
		foreach($query->result() as $row){
			$number=$row->s_project;
			break;
		}
		$this->db->where('s_project', $number);
		$query2=$this->db->get('member');
		foreach($query2->result() as $row){
			$id=$row->s_id;
			$this->db->where('stu_id', $id);
			$query3=$this->db->get('email');
			$email="";
			foreach($query3 -> result() as $rowinn){
				$email=$rowinn->email;
			}
			$realname=$row->s_name;
			$this->db->where('stu_id', $id);
			$query4=$this->db->get('link');
			foreach($query4->result() as $rowinn){
				$uid=$rowinn->uid;
				$this->db->where('uid', $uid);
				$query5=$this->db->get('fb');
				foreach($query5->result() as $rowinnagain){
					$group[]=array(
						"fb_name"=>$realname,
						"email"=>$email,
						"uid"=>$rowinnagain->uid
					);
					
				}
			}
			$this->db->where('p_leader_number', $id);
			$query6=$this->db->get('project');
			foreach($query6->result() as $rowinn){
				$arr[]=array(
						'name'=>urlencode($rowinn->p_name),
						'teacher'=>urlencode($rowinn->p_adviser),
						'description'=>urlencode($rowinn->p_description),
						'leader'=>urlencode($rowinn->p_leader_name)
					);
				
			}
		}
		$tot=array(
			"data"=>$arr,
			"tedata"=>$group
		);
		echo urldecode(json_encode($tot));
		
	}
	public function searchforname_get(){
		$oPostdata = file_get_contents("php://input");
		$aRequest =json_decode($oPostdata);
		$this->db->where('s_name', '林岱彥');
		$query=$this->db->get('member');
		foreach($query->result() as $row){
			$number=$row->s_project;
			break;
		}
		$this->db->where('s_project', $number);
		$query2=$this->db->get('member');
		foreach($query2->result() as $row){
			$id=$row->s_id;
			$this->db->where('stu_id', $id);
			$query3=$this->db->get('email');
			$email="";
			foreach($query3 -> result() as $rowinn){
				$email=$rowinn->email;
			}
			$realname=$row->s_name;
			$this->db->where('stu_id', $id);
			$query4=$this->db->get('link');
			foreach($query4->result() as $rowinn){
				$uid=$rowinn->uid;
				$this->db->where('uid', $uid);
				$query5=$this->db->get('fb');
				foreach($query5->result() as $rowinnagain){
					$group[]=array(
						"fb_name"=>$realname,
						"email"=>$email,
						"uid"=>$rowinnagain->uid
					);
					
				}
			}
			$this->db->where('p_leader_number', $id);
			$query6=$this->db->get('project');
			foreach($query6->result() as $rowinn){
				$arr[]=array(
						'name'=>urlencode($rowinn->p_name),
						'teacher'=>urlencode($rowinn->p_adviser),
						'description'=>urlencode($rowinn->p_description),
						'leader'=>urlencode($rowinn->p_leader_name)
					);
				
			}
		}
		$tot=array(
			"data"=>$arr,
			"tedata"=>$group
		);
		echo urldecode(json_encode($tot));
		
	}
	public function searchprojectname_post(){
		$oPostdata = file_get_contents("php://input");
		$aRequest = json_decode($oPostdata);
		$keyword=$aRequest->keys;
		$major =$aRequest->major;
		
		switch($major){
			case "應用中文學系":
				break;
			case "觀光管理學系":
				break;
			case "服飾設計與經營學系":
				break;
			case "應用日文學系":
				break;
			case "時尚設計學系":
				$query=urlencode($keyword);
				$arr=file_get_contents("http://114.35.237.112/CI/index.php/EnternalAPI/searchprojectlikename?keys=$query");
				$arr1=json_decode($arr);
				echo urldecode(json_encode($arr1));
				break;
			case "資訊管理學系":
				$this->db->like('p_name', $keyword);
				$query=$this->db->get('project');
				foreach($query->result() as $row){
					$arr[]=array(
					'projectname'=>urlencode($row->p_name)
					);
				}
				echo urldecode(json_encode($arr));
				break;
			case "資訊科技與通訊學系":
				break;
			case "國際企業管理學系":
				break;
			case "行銷管理學系":
				break;
			case "資訊模擬與設計學系":
				break;
			case "國際貿易學系":
				break;
			case "應用英文學系":
				break;
			case "會計暨稅務學系":
				break;
			case "金融管理學系":
				break;
			case "休閒產業管理學系":
				break;	
			
			
			
			
		}
		
		
		
		
	}
	public function popular_post(){     
		$oPostdata = file_get_contents("php://input");
		$aRequest =json_decode($oPostdata);
		$major =$aRequest->major;
		switch($major){
			case "應用中文學系":
				break;
			case "觀光管理學系":
				break;
			case "服飾設計與經營學系":
				break;
			case "應用日文學系":
				break;
			case "時尚設計學系":
			
				$str=file_get_contents('http://114.35.237.112/CI/index.php/EnternalAPI/sortdata');
				$str1=json_decode($str);
				echo urldecode(json_encode($str1));
			
				break;
			case "資訊管理學系":
				$this->db->limit(10);
				$this->db->order_by('p_count', 'DESC');
				$query = $this->db->get('project');
				
				foreach ($query->result() as $row){
				
						 if(strstr($row->p_date, '2015')){
						 $date='2015';
						 }else if(strstr($row->p_date, '2014')){
							 $date='2015';
						 }else if(strstr($row->p_date, '2013')){
							 $date='2013';
						 }else if(strstr($row->p_date, '2012')){
							 $date='2012';
						 }
						$arr[]=array(
							'na'=>urldecode($row->p_name),
							'p_count'=>urldecode($row->p_count),
							'type' =>urldecode($row->p_type),
							'desc' =>urldecode($row->p_description),
							'p_date'=>urldecode($date)
						);
						
					
					
					
				};
				echo json_encode($arr);
				break;
			case "資訊科技與通訊學系":
				break;
			case "國際企業管理學系":
				break;
			case "行銷管理學系":
				break;
			case "資訊模擬與設計學系":
				break;
			case "國際貿易學系":
				break;
			case "應用英文學系":
				break;
			case "會計暨稅務學系":
				break;
			case "金融管理學系":
				break;
			case "休閒產業管理學系":
				break;	
			
			
			
			
		}
		
		
	}
	public function companydetail_post(){
		$oPostdata = file_get_contents("php://input");
		$aRequest = json_decode($oPostdata);
		$count=0;
		$keys =$aRequest->keys;
		$major=$aRequest->maj;
		switch($major){
			case "應用中文學系":
				break;
			case "觀光管理學系":
				break;
			case "服飾設計與經營學系":
				break;
			case "應用日文學系":
				break;
			case "時尚設計學系":
				$query=urlencode($keys);
				$arr=file_get_contents("http://114.35.237.112/CI/index.php/EnternalAPI/catchdetail?keys=$query");
				$arr1=json_decode($arr);
				$group="";
				$tot=array(
					"data"=>$arr1,
					"tedata"=>$group
				);
				echo urldecode(json_encode($tot));
			
				break;
			case "資訊管理學系":
			
				$query=urlencode($keys);
				$this->db->where('p_name',$keys);
				$query=$this->db->get('project');
				foreach($query->result() as $row){
					$arr[]=array(
						'name'=>$row->p_name,
						'teacher'=>$row->p_adviser,
						'description'=>$row->p_description,
						'leader'=>$row->p_leader_name
					);
					$leader=$row->p_leader_name;
					$count=$row->p_count;
				}
				$this->db->where('s_name',$leader);
				$team="";
				$query2=$this->db->get('member');
				foreach($query2->result() as $row){
					$team=$row->s_project;
				}
				$this->db->where('s_project',$team);
				$query3=$this->db->get('member');
				$group[]=array();
				foreach($query3->result() as $row){
					$id=$row->s_id;
					$this->db->where('stu_id',$id);
					$query4=$this->db->get('email');
					$email="";
					foreach($query4->result() as $rowinn){
						$email=$rowinn->email;
					}
					$realname=$row->s_name;
					$this->db->where('stu_id',$id);
					$query5=$this->db->get('link');
					foreach($query5->result() as $rowinn){
						$uid=$rowinn->uid;
						$this->db->where('uid',$uid);
						$query6=$this->db->get('fb');
						foreach($query6->result() as $rowinnagain){
							$group[]=array(
								"fb_name"=>$realname,
								"email"=>$email,
								"uid"=>$rowinnagain->uid
							);
						}
					}
				}
				$tot=array(
					"data"=>$arr,
					"tedata"=>$group
				);
				$count++;
				$data = array(
					'p_count' => $count
				);
				$this->db->where('p_name',"$keys");
				$this->db->update('project', $data);
				echo json_encode($tot);
			
				break;
			case "資訊科技與通訊學系":
				break;
			case "國際企業管理學系":
				break;
			case "行銷管理學系":
				break;
			case "資訊模擬與設計學系":
				break;
			case "國際貿易學系":
				break;
			case "應用英文學系":
				break;
			case "會計暨稅務學系":
				break;
			case "金融管理學系":
				break;
			case "休閒產業管理學系":
				break;			
		}
	}
	public function companydetail_get(){
		$oPostdata = file_get_contents("php://input");
		$aRequest = json_decode($oPostdata);
		$count=0;
		$keys ='3D Animation - 草地囝仔';//$aRequest->keys;
		$major='資訊管理學系';//$aRequest->maj;
		switch($major){
			case "應用中文學系":
				break;
			case "觀光管理學系":
				break;
			case "服飾設計與經營學系":
				break;
			case "應用日文學系":
				break;
			case "時尚設計學系":
				$query=urlencode($keys);
				$arr=file_get_contents("http://114.35.237.112/CI/index.php/EnternalAPI/catchdetail?keys=$query");
				$arr1=json_decode($arr);
				$group="";
				$tot=array(
					"data"=>$arr1,
					"tedata"=>$group
				);
				echo urldecode(json_encode($tot));
			
				break;
			case "資訊管理學系":
			
				$query=urlencode($keys);
				$this->db->where('p_name',$keys);
				$query=$this->db->get('project');
				foreach($query->result() as $row){
					$arr[]=array(
						'name'=>$row->p_name,
						'teacher'=>$row->p_adviser,
						'description'=>$row->p_description,
						'leader'=>$row->p_leader_name
					);
					$leader=$row->p_leader_name;
					$count=$row->p_count;
				}
				$this->db->where('s_name',$leader);
				$team="";
				$query2=$this->db->get('member');
				foreach($query2->result() as $row){
					$team=$row->s_project;
				}
				$this->db->where('s_project',$team);
				$query3=$this->db->get('member');
				$group[]=array();
				foreach($query3->result() as $row){
					$id=$row->s_id;
					$this->db->where('stu_id',$id);
					$query4=$this->db->get('email');
					$email="";
					foreach($query4->result() as $rowinn){
						$email=$rowinn->email;
					}
					$realname=$row->s_name;
					$this->db->where('stu_id',$id);
					$query5=$this->db->get('link');
					foreach($query5->result() as $rowinn){
						$uid=$rowinn->uid;
						$this->db->where('uid',$uid);
						$query6=$this->db->get('fb');
						foreach($query6->result() as $rowinnagain){
							$group[]=array(
								"fb_name"=>$realname,
								"email"=>$email,
								"uid"=>$rowinnagain->uid
							);
						}
					}
				}
				$tot=array(
					"data"=>$arr,
					"tedata"=>$group
				);
				$count++;
				$data = array(
					'p_count' => $count
				);
				$this->db->where('p_name',"$keys");
				$this->db->update('project', $data);
				echo json_encode($tot);
			
				break;
			case "資訊科技與通訊學系":
				break;
			case "國際企業管理學系":
				break;
			case "行銷管理學系":
				break;
			case "資訊模擬與設計學系":
				break;
			case "國際貿易學系":
				break;
			case "應用英文學系":
				break;
			case "會計暨稅務學系":
				break;
			case "金融管理學系":
				break;
			case "休閒產業管理學系":
				break;			
		}
	}
	public function catchprice_post(){
		$oPostdata = file_get_contents("php://input");
		$aRequest =json_decode($oPostdata);
		$major =$aRequest->major;
		switch($major){
			case "應用中文學系":
				break;
			case "觀光管理學系":
				break;
			case "服飾設計與經營學系":
				break;
			case "應用日文學系":
				break;
			case "時尚設計學系":
				break;
			case "資訊管理學系":
			
				$query=$this->db->get('award');
				foreach($query->result() as $row){
					$id=$row->a_project;
					$this->db->where('p_id',$id);
					$query2=$this->db->get('project');
					foreach($query2->result() as $rowinn){
						$arr[]=array(
							'na'=>$rowinn->p_name,
							'price'=>$row->a_name
						);
						
					}
				}
				echo json_encode($arr);
				break;
			case "資訊科技與通訊學系":
				break;
			case "國際企業管理學系":
				break;
			case "行銷管理學系":
				break;
			case "資訊模擬與設計學系":
				break;
			case "國際貿易學系":
				break;
			case "應用英文學系":
				break;
			case "會計暨稅務學系":
				break;
			case "金融管理學系":
				break;
			case "休閒產業管理學系":
				break;		
		}	
	}
}