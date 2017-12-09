<?php
if(isset($_POST['query'])){	
	include_once('dbconnection.php');
	connect();
	$query=$_POST['query'];
	
	$sql="SELECT * FROM unit WHERE Unit_Code LIKE '%".$query."%'";
	$mysql_query=mysql_query($sql) or die(mysql_error());
	
	while($row=mysql_fetch_array($mysql_query)){
		
		$array[]=$row['Unit_Code'].' : '.$row['Unit_Name'];
	}
	echo json_encode($array);
	
}
else{
	echo 'Illegal File Access Method';
}

?>