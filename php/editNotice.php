<?php
if(isset($_POST['id']) &&isset($_POST['publish']) &&isset($_POST['newExpiry']) &&isset($_POST['notice'])){

	include_once('dbconnection.php');
	connect();	
	$noticeId=$_POST['id'];
	$newExpiry=$_POST['newExpiry'];
	$publish=$_POST['publish'];
	$notice=$_POST['notice'];
	$sql="UPDATE  notices SET 
		
					Publish='$publish',
					ExpiryDate='$newExpiry',
					Notices =  '$notice'
					 		WHERE  Notice_Id ='$noticeId'";
	
	$query=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()==1){
		echo "1";
	}
	else{
		echo "2";
	}	
}
?>