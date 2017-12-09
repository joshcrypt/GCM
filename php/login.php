<?php

if(isset($_POST['username']) && isset($_POST['password'])){
	
	include('dbconnection.php');
	connect();
	session_start();
	
	$username=mysql_real_escape_string(addslashes($_POST['username']));
	$password=mysql_real_escape_string(addslashes($_POST['password']));
	$entpass=md5(sha1($password));
	
	$sql="SELECT * FROM administrator WHERE username='$username' AND password='$entpass'";
	
	$query=mysql_query($sql) or die(mysql_error());
	
	
	$res=mysql_num_rows($query);
	
	if($res==1){
		// record exist
		
		//get the email address to set session
		
		$row=mysql_fetch_array($query);
		
		$_SESSION['adminusername']=$username;
		$_SESSION['adminemail']=$row['email'];
		 echo '1';
		
	}
	else{
		// record does not exist
		echo '2';
	}
	
	
}


//--------------------------------------------------------
else{
	echo 'wrong file access method';
}

?>