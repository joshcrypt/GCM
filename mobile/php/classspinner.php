<?php
if(isset($_REQUEST['weekday'])&&isset($_REQUEST['course'])&&isset($_REQUEST['year'])){
	
		
	$weekday = $_REQUEST['weekday'];
	$course = $_REQUEST['course'];
	$year = $_REQUEST['year'];
	
	include_once('../../php/dbconnection.php');
	connect();
	
	$sql="SELECT * FROM class_timetable WHERE Course_Name='";
	
	if($course=='BIT'){
		
		$sql=$sql.'Bachelor of Science Information Technology';		
		
	}
	else if($course=='MCS'){
		
		$sql=$sql.'Bachelor of Science Mathematics and Computer Science';		
		
	}
	else if($course=='BPS'){
		
		$sql=$sql.'Bachelor of Purchase and Supplies';		
		
	}
	else if($course=='BCOM'){
		
		$sql=$sql.'Bachelor of Commerce';		
		
	}
	else if($course=='BBIT'){
		
		$sql=$sql.'Bachelor of Business Information Technology';		
		
	}
	
	$sql =$sql."' AND Year='".$year."' AND Day='".$weekday."'";
	
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
						 'Unit_Name'=>'not available','Start_Time'=>'not available','Stop_Time'=>'not available','Venue' =>'not available','Lecturer'=>'not available'));
		echo json_encode($c);
		
	}
	mysql_close();
}
?>