<?php
if(isset($_POST['department'])&& isset($_POST['drpcourse'])&& isset($_POST['yearofstudy'])&& isset($_POST['day'])&& isset($_POST['starttime'])&& isset($_POST['endtime'])&& isset($_POST['txtUnit'])&& isset($_POST['drpVenue'])&& isset($_POST['txtLecturersname'])){

	$department=$_POST['department'];
	$drpcourse=$_POST['drpcourse'];
	$yearofstudy=$_POST['yearofstudy'];
	$day=$_POST['day'];
	$starttime=$_POST['starttime'];
	$endtime=$_POST['endtime'];
	$txtUnit=$_POST['txtUnit'];
	$drpVenue=$_POST['drpVenue'];
	$txtLecturersname=$_POST['txtLecturersname'];
	include_once('dbconnection.php');
	connect();
	$sql="INSERT INTO class_timetable(Department,Course_Name,Start_Time,Stop_Time,Day,Unit_Name,Year,Venue,Lecturer) VALUES('".$department."','".$drpcourse."','".$starttime."','".$endtime."','".$day."','".$txtUnit."','".$yearofstudy."','".$drpVenue."','".$txtLecturersname."')";
	$query=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()>0){
		echo'1';
	}
	else{
		echo'2';
	}
}
else{
	echo"Illegal File Access Method";
}

?>