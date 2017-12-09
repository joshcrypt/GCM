<?php

include_once('../../php/dbconnection.php');
connect();
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	$Userfullname = clean($_REQUEST['regFullname']);
	$Useremail = clean($_REQUEST['regEmail']);
	$Userpassword = clean($_REQUEST['regPassword']);
	$Usercourse = clean($_REQUEST['regCourse']);
	$Useryear = clean($_REQUEST['regYear']);
	$Userregid = clean($_REQUEST['regid']);
	
$sql = "INSERT INTO register (Course_Name,Email,Password,FullName,Academic_Year,Registration_Id) VALUES ('".$Usercourse."','".$Useremail."','".$Userpassword."','".$Userfullname."'
,'".$Useryear."','".$Userregid."')";
	if(!mysql_query($sql))
{
	die('Error: ' .mysql_error());
}
else
{
    echo "1 record added";
}



?>