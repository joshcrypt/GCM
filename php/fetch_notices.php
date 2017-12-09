<?php
//$_POST['category']='admin';
if(isset($_POST['category'])){
	include_once('dbconnection.php');
	connect();
	$category=mysql_real_escape_string(addslashes($_POST['category']));
	
	$sql="SELECT * FROM notices WHERE Notice_Category =";
	$header="";
	//'Administrative_News', Religious_News,Entertainment_News, Others, Lost_and_Found,Events
	//admin,entertainment,lostNfound,events,religious,others
	if($category=='admin' || $category=='Administrative_News'){
		$sql=$sql."'Administrative_News'";
		$header="Administrative Notices";
	} 
	else if($category=='entertainment' || $category=='Entertainment_News'){
		$sql=$sql."'Entertainment_News'";
		$header="Entertainment Notices";
	} 
	else if($category=='lostNfound' || $category=='Lost_and_Found'){
		$sql=$sql."'Lost_and_Found'";
		$header="Lost & Found Notices";
	}
	else if($category=='events' || $category=='Events'){
		$sql=$sql."'Events'";
		$header="Events Notices";
	}
	else if($category=='religious' || $category=='Religious_News'){
		$sql=$sql."'Religious_News'";
		$header="Religious Notices";
	}
	else if($category=='others'|| $category=='Others'){
		$sql=$sql."'Others'";
		$header="Other Notices";
	}
	$sql=$sql.' ORDER BY post_timestamp DESC ';
	

	$query=mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($query)>=1){
		echo'<div class="addnewNotice">
				<div id="action_header"><label class="labelstyle">'.$header.'</label></div>
				<table border="1" class="table table-striped table-bordered" style="width:99%;" id="results">
					<th align="center">No.</th>
					<th align="center">Post Date</th>
					<th align="center">Expiry Date</th>
					<th align="center">Publish</th>
					<th align="center">Notice</th>
				';
								
			//Notice_Category,Post_Date,Notices,Publish,ExpiryDate
			$counter=1;
			while($result=mysql_fetch_array($query)){
				if($result['Publish']=='yes'){
					$publishCol='<span style="color:#97C03D">Yes</span>';
				}
				else if($result['Publish']=='no'){
					$publishCol='<span style="color:#FF3300;">No</span>';
				}
				
				
				echo'<tr>
						<td width="5%" align="center">'.$counter.'</td>
						<td width="13%" align="center">'.$result['Post_Date'].'</td>
						<td width="13%" align="center">'.$result['ExpiryDate'].'</td>
						<td width="9%" align="center">'.$publishCol.'</td>
						<td class="mousetopointer noticehover" id="'.$result['Notice_Id'].'" onclick="editNotice(this)" width="60%" align="justify" style="padding:10px;" rel="tooltip" 	title="click to edit">'.$result['Notices'].'</td>
					</tr>';
				$counter+=1;
				}
				
				
		echo'	</table>
		<div id="pageNavPosition" align="center"></div>
			</div>
			<script type="text/javascript">
    var pager = new Pager("results", 7, "pager", "pageNavPosition");
    pager.init();
    pager.showPage(1);
    </script>';
	}
	else{
		
		echo'
			<div id="action_header"><label class="labelstyle">'.$header.'</label></div>
			<div style="margin:0 auto; width:50%; margin-top:10%; ">
				<span style="color:#FF3300"><h3>There are no Notices available</h3></span>
			</div>
		
		';
		
	}
}
else{
	echo'Illegal file access';
}
	

?>