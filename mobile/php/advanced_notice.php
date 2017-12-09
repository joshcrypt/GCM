<?php

if(isset($_REQUEST['notice']) && isset($_REQUEST['getdate'])){
	$notice = $_REQUEST['notice'];
	$getdate = $_REQUEST['getdate'];
	
	
		
	include_once('../../php/dbconnection.php');
	connect();
	$sql="SELECT * FROM notices WHERE Notice_Category='";
	
	if($notice=='administrative'){
		
		$sql=$sql.'Administrative_News';
	}
	
	else if($notice=='religious'){
		
		$sql=$sql.'Religious_News';
	}
	else if($notice=='entertainment'){
		
		$sql=$sql.'Entertainment_News';
	}
	else if($notice=='lost_n_found'){
		
		$sql=$sql.'Lost_and_Found';
	}
	else if($notice=='events'){
		
		$sql=$sql.'Events';
	}else if($notice=='others'){
		
		$sql=$sql.'Others';
	}
	$sql=$sql."' AND Publish='yes' AND ExpiryDate>= DATE(NOW())-'".$getdate."' ORDER BY post_timestamp DESC";
	
	$query=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_assoc($query))
	$output[]=$row;
	$c = array(array('notice'=>$getdate));
	echo json_encode($output);
	mysql_close();	
}


?>