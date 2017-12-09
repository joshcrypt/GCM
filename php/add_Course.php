<?php
if(isset($_POST['Coursename']) && isset($_POST['Coursedepartment']) && isset($_POST['Coursedescription']) && isset($_POST['Coursealias'])){
	include_once('dbconnection.php');
	connect();	
	$coursename=$_POST['Coursename'];
	$coursedescription=$_POST['Coursedescription'];
	$coursealias=$_POST['Coursealias'];
	$coursedepartment=$_POST['Coursedepartment'];
	$sql="INSERT INTO course(Course_Name,Course_Description,Course_Code,Course_Department) VALUES ('".$coursename."','".$coursedescription."','".$coursealias."','".$coursedepartment."')";
	$query=mysql_query($sql) or die(mysql_error());
	
	if(mysql_affected_rows()==1){
	echo "1";	
	}
	else{
	echo "2";
	}
}
else{
	echo "Illegal File Access Method";
}

?>