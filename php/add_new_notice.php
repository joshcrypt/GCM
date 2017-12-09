<?php
if(isset($_POST['category']) &&isset($_POST['publish']) &&isset($_POST['duration']) &&isset($_POST['notice'])){

	include_once('dbconnection.php');
	connect();	
	$noticename=$_POST['category'];
	$publish=$_POST['publish'];
	$duration=$_POST['duration'];
	$notice=$_POST['notice'];
	$sql="INSERT INTO notices(Notice_Category,post_timestamp,Post_Date,Notices,Publish,ExpiryDate) VALUES('".$noticename."',NOW(),NOW(),'".$notice."','".$publish."','".$duration."')";
	$result=mysql_query($sql) or die(mysql_error());
	//$row=mysql_num_rows();
	if(mysql_affected_rows()==1){
		echo "1";
	}
	else{
	echo "2";
	}	
}
else{
echo 'Illegal File Access Method';
}
?>