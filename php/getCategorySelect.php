<?php
	  include_once('dbconnection.php');
	  connect();
	  
	  $sql="SELECT * FROM notice_categories";
	  $result=mysql_query($sql) or die(mysql_error());
	  
	  echo'<select id="category">
	  			<option value="0">Select Category</option>';
	  
	  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		  echo "<option value=".$row['Notice_Name'].">".$row['Label']."</option>";
		}
	  echo'</select><br />';
?>