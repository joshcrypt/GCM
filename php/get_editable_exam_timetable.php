<?php
if(isset($_POST['getdepartment']) && isset($_POST['tdcourseSelect'])&& isset($_POST['getyearofstudy'])){
	
	$getdepartment=$_POST['getdepartment'];
	$tdcourseSelect=$_POST['tdcourseSelect'];
	$getyearofstudy=$_POST['getyearofstudy'];
	
	include_once('dbconnection.php');
	connect();

	$sql = "SELECT * FROM exam_timetable WHERE Course_Name='".$tdcourseSelect."' AND Year='".$getyearofstudy."'";
	
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
						<td>Exam Day</td>
						<td>'.$arrays["Exam_Day"].'</td>
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