<?php
/*$_POST['selectId']='nfejk';
$_POST['onChange']='gsgsdfg';*/
if(isset($_POST['selectId']) && isset($_POST['onChange'])){	
	include_once('dbconnection.php');
	connect();

	$selectId=$_POST['selectId'];
	$onChange=$_POST['onChange'];
	$sql="SELECT * FROM venue";
	$query=mysql_query($sql);
	
	echo'<select id="'.$selectId.'" onChange="'.$onChange.'">
			<option value="0">Select Venue</option>';

	while($result=mysql_fetch_array($query)){
		echo '<option value="'.$result['venueName'].'" id="'.$result['venueName'].'">'.$result['venueName'].'</option>';	
	}
	echo '</select>';
}
else{
	echo 'Illegal File Access Method';
}

?>