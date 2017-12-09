<?php
if(isset($_REQUEST['notice'])){
$notice = $_REQUEST['notice'];
	
	include_once('../../php/dbconnection.php');
	connect();
	$sql="SELECT * FROM notices WHERE Notice_Category='";
	
	if($notice=='administrative'){
		
		$sql=$sql.'Administrative_News';
	}
	
	else if($notice=='religious'){
		
		$sql=$sql.'Religious_News';
	}
	else if($notice=='entertainment'){
		
		$sql=$sql.'Entertainment_News';
	}
	else if($notice=='lost_n_found'){
		
		$sql=$sql.'Lost_and_Found';
	}
	else if($notice=='events'){
		
		$sql=$sql.'Events';
	}else if($notice=='others'){
		
		$sql=$sql.'Others';
	}
	$sql=$sql."' AND Publish='yes' AND ExpiryDate>= DATE(NOW())-2 ORDER BY post_timestamp DESC";
	$query = mysql_query($sql)or die(mysql_error());	
	
	
	
	//$sql=mysql_query("SELECT * FROM class_timetable WHERE Course_Name='".$course."' AND Year='".$year."' AND Day='".$weekday."'");
	$num_rows = mysql_num_rows($query);
	
	
	if($num_rows >0){
		
		while($row=mysql_fetch_assoc($query))
		
						
			/*$response["success"] = 1;
			$response["user"]["Course_Name"] = $row["Course_Name"];
			$response["user"]["Start_Time"] = $row["Start_Time"];
			$response["user"]["Stop_Time"] = $row["Stop_Time"];
			$response["user"]["Day"] = $row["Day"];	
			$response["user"]["Unit_Name"] = $row["Unit_Name"];	
			$response["user"]["Venue"] = $row["Venue"];										    		
			$response["user"]["Exam_Day"] = $row["Exam_Day"];	
			echo json_encode($response);
		}*/
		
		$output[]=$row;
		echo json_encode($output);
	
	
}
	else{
		/*$response["error"] = 1;
		$response["user"]["error_msg"] = "REQUESTED TIMETABLE DOES NOT EXIST";
		echo json_encode($response);*/
		$c = array(array('error' => 'REQUESTED TIMETABLE DOES NOT EXIST', 
						 'Post_Date'=>'not available','Notices'=>'not available'));
		echo json_encode($c);
		
	}
	mysql_close();
}


?>