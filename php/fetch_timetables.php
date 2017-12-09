<?php

if(isset($_POST['edittableid'])){
	
	include_once('dbconnection.php');
	connect();
	//editexamtime,editclasstime
	$edittableid=$_POST['edittableid'];
	
	if($edittableid=='editexamtime'){
		
		$sql="SELECT * FROM exam_timetable";
		
		$query=(mysql_query($sql)) or die(mysql_error());
		
		echo '
				<div id="addnewelement" style="border:6px solid #0088cc">
    			<div id="action_header">
					<label class="labelstyle">Edit Exam Timetable</label>
				</div>
				<span style="display:none; position:fixed; top:40%; left:48%;" id="AlerteditExamTimetable"></span>
				<!--<span style="display:none;" id="AlerteditExamTimetable"></span>-->

				<table class="boxshadow displaytable" border="0">
					<tr>
						<td><h3>Input the Details below to view Timetable</h3></td>
					</tr>
					<tr>
					
					<td >Department</td>
			
					<td>
						<select id="editcoursedepartment" onchange="edit_course_getcourse(this)">
							<option value="0">Select Department</option>
							<option value="Mathematics And Informatics">Mathematics And Informatics</option>
							<option value="Business">Business</option>
							<option value="Mining">Mining</option>		
						</select>
					</td>
					
					</tr>
					<tr>

						<td>Course</td>
						<td id="edit_exam_tdcourseSelect">
							<select id="" disabled>
								<option value="" id=""></option>
							</select>
						</td>		
					</tr>
					
					<tr>
						
						<td>Year of Study</td>
						<td>
							<select id="edityearofstudy" onChange="edit_examtimetable()">
								<option value="0">Select Year of Study</option>
								<option value="First">First Year</option>
								<option value="Second">Second Year</option>
								<option value="Third">Third Year</option>
								<option value="Fourth">Fourth Year</option>
								<option value="Fifth">Fifth Year</option>		
							</select>
						</td>	
					</tr>				
				
				</table>
				
				<div id="displayeditdata">
				
				
				</div>
			
			</div>';

		
	}
	else if ($edittableid=='editclasstime'){
		
		$sql="SELECT * FROM exam_timetable";
		$query=(mysql_query($sql)) or die(mysql_error());
		
		echo '
				<div id="addnewelement">
    			<div id="action_header">
					<label class="labelstyle">Edit Class Timetable</label>
				</div>
				<span style="display:none; position:fixed; top:40%; left:48%;" id="AlerteditExamTimetable"></span>
				<!--<span style="display:none;" id="AlerteditExamTimetable"></span>-->

				<table class="boxshadow displaytable" border="0">
					<tr>
						<td><h3>Input the Details below to view Timetable</h3></td>
					</tr>
					<tr>
					
					<td >Department</td>
			
					<td>
						<select id="editclasscoursedepartment" onchange="edit_class_course_getcourse(this)">
							<option value="0">Select Department</option>
							<option value="Mathematics And Informatics">Mathematics And Informatics</option>
							<option value="Business">Business</option>
							<option value="Mining">Mining</option>		
						</select>
					</td>
					
					</tr>
					<tr>

						<td>Course</td>
						<td id="edit_classs_tdcourseSelect">
							<select id="" disabled>
								<option value="" id=""></option>
							</select>
						</td>		
					</tr>
					
					<tr>
						
						<td>Year of Study</td>
						<td>
							<select id="editclassyearofstudy" onChange="edit_classtimetable()">
								<option value="0">Select Year of Study</option>
								<option value="First">First Year</option>
								<option value="Second">Second Year</option>
								<option value="Third">Third Year</option>
								<option value="Fourth">Fourth Year</option>
								<option value="Fifth">Fifth Year</option>		
							</select>
						</td>	
					</tr>				
				
				</table>
				
				<div id="displayeditdata">
				
				
				</div>
			
			</div>';
		
		
	}
	
}
else{
	
	echo 'Invalid File Access Method';
}

?>