<?php
if(isset($_POST['unitCode']) && isset($_POST['unitName'])){
	include_once('dbconnection.php');
	connect();
	$unitCode=$_POST['unitCode'];
	$unitName=$_POST['unitName'];
	$sql="INSERT INTO unit(Unit_Code,Unit_Name) VALUES ('".$unitCode."','".$unitName."')";
	$query=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()==1){
		echo"1";		
	}
	else{
		echo"2";
	}
}
else{
	echo"Illegal File Access Method";
}


?>