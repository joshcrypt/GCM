<?php
echo '
	<div id="addnewelement">
		<div id="action_header">
			<label class="labelstyle">Add Course</label>
		</div>
		<span style="display:none; position:fixed; top:40%; left:48%;" id="AlertSpanShow"></span>
	<form>
		<table class="boxshadow displaytable" border="0" cellpadding="2" cellspacing="1">
			<tr>		
				<td width="20"></td>
				<td style="padding:10px;">Course Name</td>
				<td><input type="text" class="span3" placeholder="Enter Course Name" id="coursename"></td>
			</tr>
			<tr>
				<td></td>
				<td style="padding:10px;">Course Department</td>
				<td><select id="department">
					<option value="0">Select Department</option>
					<option value="Mathematics And Informatics">Mathematics And Informatics</option>
					<option value="Business">Business</option>
					<option value="Mining">Mining</option>		
				</select></td>	
			</tr>
			<tr>
				<td></td>
				<td style="padding:10px;">Course Description</td>
				<td><input type="text" class="span3" placeholder="Enter Small Course Description" id="coursedescription"></td>
			</tr>
			<tr>
				<td></td>
				<td style="padding:10px;">Course Alias</td>
				<td><input type="text" class="span3" placeholder="eg.. BscIT,BCOM" id="coursealias"></td>
			</tr>	
			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="button" class="btn btn-success input-large" id="btnSavecourse">Save</button>
					<button type="reset" class="btn" id="btnResetcourse">Cancel</button>
				</td>
			</tr>	
		</table>
	</form>
	</div>';
		
?>