<?php

if(isset($_POST['idtable'])){
	
	
	$idtable=$_POST['idtable'];
	
	
	include_once('dbconnection.php');
	connect();
	
	$sql="SELECT * FROM class_timetable WHERE Class_Id='$idtable' ";
	$sql1="SELECT * FROM unit";
	
	//Unit_Name
	$query=mysql_query($sql) or die(mysql_error());
	$query1=mysql_query($sql1) or die(mysql_error());
	
	/*if($result1=mysql_num_rows($query1)>0){
		echo '1';
	}*/
	
	
	if($result=mysql_num_rows($query)>0){
		while($array = mysql_fetch_array($query))
		
		echo '<div class="modal-header edit_title">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3>Edit Content for '.$array['Course_Name'].'</h3>
					<h3>DAY:'.$array['Day'].'</h3>
					<h3>Year:'.$array['Year'].'</h3>
					<span style="display:none;" id="AlerteditTimetable"></span>
				</div>
				<div class="modal-body">
				<div id="edit_modal">
				<table>
					<tr>
						
					</tr>
					<tr>
						
						<td >Department</td>
						<td class="table_padding_top">
							<select id="edit_exam_coursedepartment" onchange="edit_examgetcourse(this)">
								<option value="0">Select Department</option>
								<option value="Mathematics And Informatics">Mathematics And Informatics</option>
								<option value="Business">Business</option>
								<option value="Mining">Mining</option>		
							</select></td>
					<tr>
						
						<td>Course</td>
						<td id="edit_tdcourseSelect">
							<select id="" disabled>
								<option value="" id=""></option>,
							</select>
						</td>		
					</tr>
					
					<tr>
						
						<td>Year of Study</td>
						<td>
							<select id="edit_exam_yearofstudy">
								<option value="0">Select Year of Study</option>
								<option value="First">First Year</option>
								<option value="Second">Second Year</option>
								<option value="Third">Third Year</option>
								<option value="Fourth">Fourth Year</option>
								<option value="Fifth">Fifth Year</option>		
							</select>
						</td>	
					</tr>	
					<tr>
						
						<td>Day</td>
						<td>
							<select id="edit_exam_day">
								<option value="0">Select Day of the Week</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>		
							</select>
						</td>	
					</tr>
					<tr>
						
						<td>Start Time</td>
						<td>
							<select id="edit_exam_starttime">
								<option value="0"> Select Start Time</option>
								<option>07 00h</option>
								<option>08 00h</option>
								<option>09 00h</option>
								<option>10 00h</option>
								<option>11 00h</option>
								<option>12 00h</option>
								<option>13 00h</option>
								<option>14 00h</option>
								<option>15 00h</option>
								<option>16 00h</option>
								<option>17 00h</option>
								<option>18 00h</option>
								<option>19 00h</option>				
							</select>
						
						</td>
					
					</tr>
					<tr>
						
						<td>Stop Time</td>
						<td>
							<select id="edit_exam_endtime">
								<option value="0"> Select Stop Time</option>
								<option>07 00h</option>
								<option>08 00h</option>
								<option>09 00h</option>
								<option>10 00h</option>
								<option>11 00h</option>
								<option>12 00h</option>
								<option>13 00h</option>
								<option>14 00h</option>
								<option>15 00h</option>
								<option>16 00h</option>
								<option>17 00h</option>
								<option>18 00h</option>
								<option>19 00h</option>	
							
							</select>
						
						</td>
					
					</tr>
					<tr>
						
						<td>Unit</td>
						<td>
							<input class="input-large" id="edit_exam_txtUnit" type="text" placeholder="Start Typing Unit Code..." data-provide="typeahead">
						</td>
					</tr>
					<tr>
						
						<td>Venue</td>
					<!--<td id="tdVenue"></td>-->
							<td id="edit_exam_tdVenue">
							<select id="exam_venue">
								<option value="" id=""></option>
							</select>
						</td>
					</tr>
					<tr>
						
						<td>Lecturer</td>
						<td><input type="text" placeholder="Type Lecturer Name" id="txtclassLecturersname">
					</tr>
					<tr>
						
						<td></td>
						<td class="table_padding_bottom"><button class="btn btn-success" id="'.$array['Class_Id'].'" type="submit" onClick="save_edit_classtimetable(this)">Save Timetable</button>
						<button type="reset" class="btn" data-dismiss="modal">Cancel</button></td>
						
					</tr>
				</table>
				</div>
					<div id="displayeditmodal">
					
					
					</div>
				
				</div>';
		
		
		
	}
	else{
		echo '2';
	}
	
}
else{
	
	echo 'Invalid File Access Method';
	
}

?>