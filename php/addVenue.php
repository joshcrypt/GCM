<?php
//$_POST['venue']='AB1-001';
if(isset($_POST['venue']) ){
	include_once('dbconnection.php');
	connect();	
	$venue=strtoupper($_POST['venue']);
	
	$sql="SELECT * FROM venue WHERE venueName='".$venue."'";
	
	$query=mysql_query($sql) or die(mysql_error());
	
	if(mysql_num_rows($query)==0){
		
		$sql="INSERT INTO venue(id,venueName) VALUES ('','".$venue."')";
		$query=mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows()==1){
			echo "1";	// venue inserted
		}
		else{
			echo "2"; // inserting failed
		}
		
	}
	else{
		// venue already exists
		echo '3';
	}
	
	
	
	
	
}
else{
	echo "Illegal File Access Method";
}

?>