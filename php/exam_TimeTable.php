<?php

include_once('dbconnection.php');
connect();

echo'
	<div id="addnewelement">
		<div id="action_header">
			<label class="labelstyle">Create Exam Timetable</label>
		</div>
		<span style="display:none; position:fixed; top:40%; left:48%;" id="AlertSpanExamTimetable"></span>
		<form>
		<table class="boxshadow displaytable" border="0" cellpadding="2" cellspacing="1">
		<tr>
			<td width="20"></td>
			<td >Department</td>
			
			<td class="table_padding_top">
				<select id="exam_coursedepartment" onchange="examgetcourse(this)">
					<option value="0">Select Department</option>
					<option value="Mathematics And Informatics">Mathematics And Informatics</option>
					<option value="Business">Business</option>
					<option value="Mining">Mining</option>		
				</select></td>
		<tr>
			<td></td>
			<td>Course</td>
			<td id="exam_tdcourseSelect">
				<select id="" disabled>
					<option value="" id=""></option>
				</select>
			</td>		
		</tr>
		
		<tr>
			<td></td>
			<td>Year of Study</td>
			<td>
				<select id="exam_yearofstudy">
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
			<td></td>
			<td>Day</td>
			<td>
				<select id="exam_day">
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
			<td></td>
			<td>Start Time</td>
			<td>
				<select id="exam_starttime">
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
			<td></td>
			<td>Stop Time</td>
			<td>
				<select id="exam_endtime">
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
			<td></td>
			<td>Unit</td>
			<td>
				<input class="input-large" id="exam_txtUnit" type="text" placeholder="Start Typing Unit Code..." data-provide="typeahead">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Venue</td>
		<!--<td id="tdVenue"></td>-->
				<td id="exam_tdVenue">
				<select id="exam_venue">
					<option value="" id=""></option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Exam Day</td>
			<td><input type="text" placeholder="Type Day e.g. Day 1" id="exam_days_int"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td class="table_padding_bottom"><button class="btn btn-success" type="submit" onClick="saveexamtimetable()">Save Timetable</button>
			<button class="btn" type="reset" id="exam_cleartable">Cancel</button></td>
			
		</tr>
		</table>
		</form>
	</div>
';
?>