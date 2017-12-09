<?php
/*
edit_exam_coursedepartment:edit_exam_coursedepartment,edit_exam_drpcourse:edit_exam_drpcourse,edit_exam_yearofstudy:edit_exam_yearofstudy,edit_exam_day:edit_exam_day,edit_exam_starttime:edit_exam_starttime,edit_exam_endtime:edit_exam_endtime,edit_exam_txtUnit:edit_exam_txtUnit,edit_exam_drpVenue:edit_exam_drpVenue,edit_exam_days_int:edit_exam_days_int,save_edit_id:save_edit_id*/	
if(isset($_POST['save_edit_id']) && isset($_POST['edit_exam_coursedepartment']) && isset($_POST['edit_exam_drpcourse']) && isset($_POST['edit_exam_yearofstudy']) && isset($_POST['edit_exam_day']) && isset($_POST['edit_exam_starttime']) && isset($_POST['edit_exam_endtime']) && isset($_POST['edit_exam_txtUnit']) && isset($_POST['edit_exam_drpVenue']) && isset($_POST['txtclassLecturersname'])){
	
	$save_edit_id = $_POST['save_edit_id'];
	$edit_exam_coursedepartment = $_POST['edit_exam_coursedepartment'];
	$edit_exam_drpcourse = $_POST['edit_exam_drpcourse'];
	$edit_exam_yearofstudy = $_POST['edit_exam_yearofstudy'];
	$edit_exam_day = $_POST['edit_exam_day'];
	$edit_exam_starttime = $_POST['edit_exam_starttime'];
	$edit_exam_endtime = $_POST['edit_exam_endtime'];
	$edit_exam_txtUnit = $_POST['edit_exam_txtUnit'];
	$edit_exam_drpVenue = $_POST['edit_exam_drpVenue'];
	$txtclassLecturersname = $_POST['txtclassLecturersname'];
	
	//Department,Course_Name,Start_Time,Stop_Time,Day,Unit_Name,Year,Venue,Lecturer
	//UPDATE  `ttucinfodroid`.`exam_timetable` SET  `Department` =  'Mthematics And Informatics' WHERE  `exam_timetable`.`Exam_Id` =4;
	
	include_once('dbconnection.php');
	connect();
	
	$sql = "UPDATE class_timetable SET Department='".$edit_exam_coursedepartment."',Course_Name='".$edit_exam_drpcourse."',Start_Time='".$edit_exam_starttime."',Stop_Time='".$edit_exam_endtime."',Day='".$edit_exam_day."',Unit_Name='".$edit_exam_txtUnit."',Year='".$edit_exam_yearofstudy."',Venue='".$edit_exam_drpVenue."',Lecturer='".$txtclassLecturersname."' WHERE Class_Id='$save_edit_id'";
	
	$query=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()==1){
		echo "1";
	}
	else{
		echo "2";
	}
}
else{
	echo'ILLEGAL FILE ACCESS METHOD';
	
}

?>