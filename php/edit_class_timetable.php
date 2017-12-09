<?php
if(isset($_POST['idtable'])){
	include_once('dbconnection.php');
	connect();
	$idtable = $_POST['idtable'];
	
	if($idtable=='classtime'){
		
		$sql = "SELECT * FROM class_timetable ";
		
		$query = mysql_query($sql) or die(mysql_error());
		
		if($result=mysql_fetch_array($query)){
			
			echo '
			<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal">×</button>
    			<h3>View Class Timetable</h3>
				<span style="display:none;" id="AlertchangeTimetable"></span>
  			</div>
			<div class="modal-body">
			
			
				<table>
					<tr>
						<td><h3>Input the Details below</h3></td>
					</tr>
					<tr>
					
					<td >Department</td>
			
					<td>
						<select id="classcoursedepartment" onchange="change_class_getcourse(this)">
							<option value="0">Select Department</option>
							<option value="Mathematics And Informatics">Mathematics And Informatics</option>
							<option value="Business">Business</option>
							<option value="Mining">Mining</option>		
						</select>
					</td>
					
					</tr>
					<tr>

						<td>Course</td>
						<td id="tdcourseSelect">
							<select id="" disabled>
								<option value="" id=""></option>
							</select>
						</td>		
					</tr>
				
					<tr>
						
						<td>Year of Study</td>
						<td>
							<select id="classyearofstudy" onChange="viewclasstimetable()">
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
				<div id="displaycontentmodal">
				
				
				</div>
			
			</div>';
			
		}
		
		
		//echo 'hello';
		
	}
	
	
}
else{
	
	echo 'Invalid file access method used';
}

?>