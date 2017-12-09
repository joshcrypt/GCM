<?php
if(isset($_POST['id'])){
	include_once('dbconnection.php');
	connect();
	
	$noticeId=$_POST['id'];
	$sql="SELECT * FROM notices WHERE Notice_Id ='$noticeId'";
	
	$query=mysql_query($sql) or die(mysql_error());
	if($result=mysql_fetch_array($query)){
		
		if($result['Publish']=='yes'){
			$select='<select id="newPublish">
						<option value="0">Select Option</option>
						<option selected="selected" value="yes">Yes</option>
						<option value="no">No</option>
					</select>';
		}
		else{
			$select='<select id="newPublish">
						<option value="0">Select Option</option>
						<option value="yes">Yes</option>
						<option selected="selected" value="no">No</option>
					</select>';
		}
		$countspan="editCounter";
		$currentLen=255-strlen($result['Notices']);
		
		
		echo '  			 
			<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal">×</button>
    			<h3>Edit Notice</h3>
  			</div>
			<div class="modal-body">
    			<table>
		
					<tr>
						<td>Publish</td>
						<td>
							'.$select.'
						</td>
					</tr>
					<tr>
						<td>Select New Notice Expiry Date</td>
						<td>
							<div class="input-append date" id="newExpirydate" data-date="2012-08-15" data-date-format="yyyy-mm-dd"><input style="width:183px;" id="txtNewexpirydate" type="text" value="'.$result['ExpiryDate'].'" placeholder="Expiry Date" readonly><span class="add-on"><i class="icon-th"></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Notice</td>
					
						<td><textarea onKeyUp="return MaxLength(this, 255,\'editCounter\')" id="txtewNotice">'.$result['Notices'].'</textarea><br />
						<span id="editCounter">You have '.$currentLen.' characters left.</span>
						</td>
					</tr>			
			</table>
				
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success input-large" id="'.$noticeId.'" name="'.$result['Notice_Category'].'" onClick="saveNoticeChanges(this)">Save Changes</button>
				<button type="reset" class="btn" data-dismiss="modal">Cancel</button>
				<span style="display:none;" id="addAlertSpanModal"></span>

			</div>			  
			  ';
		}
	
	 
}
else{
	echo'invalid file access';
}

?>