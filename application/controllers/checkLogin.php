<?php
	$oPostdata = file_get_contents("php://input");
	$aRequest = json_decode($oPostdata);
	$name=$aRequest->name;
	$password=$aRequest->password;
	$identify=$aRequest->identify;
	$dsn = "mysql:host=mysql.hostinger.com.hk;dbname=e7822501";
	$db = new PDO($dsn,"e7822501" ,"johnn2840" );
	$count =$db->query("SELECT * FROM login where username='$name' and password='$password' and identify='$identify'");
	$i=0;
	while($count->fetch()){
		$i++;
	}
	$arr=array(
		"res"=>$i,
		"iden"=>$identify
	);
	echo json_encode($arr);
?>