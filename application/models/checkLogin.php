<?php
	$oPostdata = file_get_contents("php://input");
	$aRequest = json_decode($oPostdata);
	$name=$aRequest->name;
	$password=$aRequest->password;
	$identify=$aRequest->identify;
	$dsn = "mysql:host=mysql.hostinger.com.hk;dbname=u665463047_ipush";
	$db = new PDO($dsn,"u665463047_pan" ,"oo740155" );
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