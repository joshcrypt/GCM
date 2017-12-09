<?php
echo '
	<div id="addnewelement">
		<div id="action_header">
			<label class="labelstyle">Add Unit</label>
		</div>
		<span style="display:none; position:fixed; top:40%; left:48%;" id="AlertSpanShow"></span>
	<form>
		<table class="boxshadow displaytable" border="0" cellpadding="2" cellspacing="1">
			<tr>
			<td width="20"></td>
				<td style="padding:10px;">Unit Code</td>
				<td><input type="text" class="span3" placeholder="Enter Unit Code" id="unitcode"></td>
			</tr>
			<tr>
				<td></td>
				<td style="padding:10px;">Unit Name</td>
				<td><input type="text" class="span3" placeholder="Enter Unit Name" id="unitname"></td>
			</tr>	
			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="button" class="btn btn-success input-large" id="btnSaveunit">Save</button>
					<button type="reset" class="btn" id="btnResetunit">Cancel</button>
				</td>
			</tr>	
		</table>
	</form>
	</div>';
		
?>