<?php

if(isset($_POST['editclassdepartment']) && isset($_POST['editclasscourseSelect'])&& isset($_POST['editclassyearofstudy'])){
	
	$getdepartment=$_POST['editclassdepartment'];
	$tdcourseSelect=$_POST['editclasscourseSelect'];
	$getyearofstudy=$_POST['editclassyearofstudy'];
	
	include_once('dbconnection.php');
	connect();

	$sql = "SELECT * FROM class_timetable WHERE Course_Name='".$tdcourseSelect."' AND Year='".$getyearofstudy."'";
	
	$query = mysql_query($sql) or die(mysql_error());
	
	if($result=mysql_num_rows($query)>1){
		
		echo'
		<table border="1" class="table table-striped table-bordered" style="width:99%;" id="results">
					<th align="center">Lecturer</th>
					<th align="center">Day</th>
					<th align="center">Unit Name</th>
					<th align="center">Start Time</th>
					<th align="center">Stop Time</th>
					<th align="center">Venue</th>';
		
		while($arrays=mysql_fetch_array($query)){
			//Start_Time,Stop_Time,Unit_Name,Venue,Exam_Day<tr>
								
									
			echo '
			
						<tr class="mousetopointer noticehover" id="'.$arrays['Class_Id'].'" onclick="editclassTable(this)" width="60%" align="center" style="padding:10px;" rel="tooltip" 	title="click to edit">
						<td width="5%" align="center">'.$arrays['Lecturer'].'</td>
						<td width="10%" align="center">'.$arrays['Day'].'</td>
						<td width="30%" align="center">'.$arrays['Unit_Name'].'</td>
						<td width="9%" align="center">'.$arrays['Start_Time'].'</td>
						<td width="9%" align="center">'.$arrays['Stop_Time'].'</td>
						<td width="10%" align="center">'.$arrays['Venue'].'</td>
					</tr>
			
			';
			
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