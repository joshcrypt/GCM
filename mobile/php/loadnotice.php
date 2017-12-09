<?php
//$_POST['cat']='admin';
if(isset($_POST['cat'])){
	include_once('dbconnection.php');
	connect();
	$cat=$_POST['cat'];
	$header='';
	$sql="SELECT * FROM notices WHERE Notice_Category='";
	if($cat=='admin'){
		$sql=$sql.'Administrative_News';
		$header='Administrative Notices';	
	}
	else if($cat=='religious'){
		$sql=$sql.'Religious_News';	
		$header='Religious Notices';		
	}
	else if($cat=='enter'){
		$sql=$sql.'Entertainment_News';
		$header='Entertainment Notices';			
	}
	else if($cat=='lostnfound'){
		$sql=$sql.'Lost_and_Found';
		$header='Lost And Found Notices';			
	}
	else if($cat=='events'){
		$sql=$sql.'Events';	
		$header='Events Notices';		
	}
	else if($cat=='others'){
		$sql=$sql.'Others';	
		$header='Other Notices';
		//post_timestamp	ExpiryDate	
	}
	$sql=$sql."' AND Publish='yes' AND ExpiryDate>= DATE(NOW())-2 ORDER BY post_timestamp DESC";
	$query=mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($query)>=1){
		$counter=1;
		echo'<div class="displaytable" data-role="collapsible" data-theme="c" data-content-theme="d" id="'.$cat.'">
		<h3>'.$header.'</h3>';
		echo'	<table class="table table-striped table-bordered" border="0" cellpadding="2" cellspacing="1">
				<tr>
					<th align="center">No</th>
					<th align="center">Post Date</th>
					<th align="center">Notice</th>
				</tr>';	
		while($result=(mysql_fetch_array($query))){
			if($result['Notices']==''){
				$result['Notices']='No Notices Available';
			}			
			echo'<tr>
					<td width="3%" align="center">'.$counter.'</td>
					<td width="40%" align="center">'.$result['Post_Date'].'</td>
					<td width="58%" align="justify">'.$result['Notices'].'</td>
				</tr>';
			$counter++;
		}
		echo'</table>';
		echo'</div>';
	}
	else{
		echo'
		<div data-role="collapsible" data-theme="b" data-content-theme="d" id="'.$cat.'">
			<h3>'.$header.'</h3>
			<div style="margin:0 auto; width:20%;">
				<table width="100%">
					<tr>
						<td style="color:#FF3300;font-size:14px; text-align:center;">There are no Notices available</td>
					</tr>
				</table>
			</div>
			</div>';
	}
	
}
else{
	echo'Illegal File Access Method';
}
?>