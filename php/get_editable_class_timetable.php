<?php

if(isset($_POST['getclassdepartment']) && isset($_POST['tdclasscourseSelect'])&& isset($_POST['getclassyearofstudy'])){
	
	$getclassdepartment=$_POST['getclassdepartment'];
	$tdclasscourseSelect=$_POST['tdclasscourseSelect'];
	$getclassyearofstudy=$_POST['getclassyearofstudy'];
	
	include_once('dbconnection.php');
	connect();

	$sql = "SELECT * FROM class_timetable WHERE Course_Name='".$tdclasscourseSelect."' AND Year='".$getclassyearofstudy."'";
	
	$query = mysql_query($sql) or die(mysql_error());
	
	if($result=mysql_num_rows($query)>1){
		
		while($arrays=mysql_fetch_array($query)){
			//Start_Time,Stop_Time,Unit_Name,Venue,Exam_Day
			
			echo '
			
			<div id="editexam">
				<table>
					<tr>
						<td>Day</td>			
						<td>'.$arrays["Day"].'</td>
					</tr>
					<tr>
						<td>Start Time</td>
						<td>'.$arrays["Start_Time"].'</td>
					</tr>
					<tr>
						<td>Stop Time</td>
						<td>'.$arrays["Stop_Time"].'</td>		
					</tr>
					<tr>	
						<td>Unit Name</td>	
						<td>'.$arrays["Unit_Name"].'</td>
					</tr>
					<tr>
						<td>Venue</td>
						<td>'.$arrays["Venue"].'</td>
					</tr>
					<tr>
						<td>Lecturer</td>
						<td>'.$arrays["Lecturer
						"].'</td>
					</tr>
				
				</table>
			</div>';
			
		}
		
	}
	else{
		
		echo'
			<div id="editexam">
			<table>
				<tr>
					<td>Table Selected Has Not been Added</td>
				
				</tr>
				
			</table>
			
				
			</div>';
	}
}
else{
	
	echo'Invalid Access Method';
}
?>