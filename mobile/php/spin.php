<?php
include_once('../../php/dbconnection.php');
connect();
$sql=mysql_query("select Course_Code FROM course");
while($row=mysql_fetch_assoc($sql))
$output[]=$row;
echo json_encode($output);
mysql_close();
?>