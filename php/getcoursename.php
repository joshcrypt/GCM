<?php
if(isset($_POST['deptval']) && isset($_POST['selectId']) && isset($_POST['onChange'])){	
	include_once('dbconnection.php');
	connect();
	$deptval=$_POST['deptval'];
	$selectId=$_POST['selectId'];
	$onChange=$_POST['onChange'];
	$sql="SELECT * FROM course WHERE Course_Department='".$deptval."'";
	$query=mysql_query($sql);
	
	echo'<select id="'.$selectId.'" onChange="'.$onChange.'">
			<option value="0">Select Course</option>';

	while($result=mysql_fetch_array($query)){
		echo '<option value="'.$result['Course_Name'].'" id="'.$result['Course_Code'].'">'.$result['Course_Name'].'</option>';	
	}
	echo '</select>';
}
else{
	echo 'Illegal File Access Method';
}

?>