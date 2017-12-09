<?php

include_once('../../php/dbconnection.php');
connect();

$tag = $_POST['tag'];
$response = array("tag" => $tag, "success" >= 0, "error" => 0 );
$Loginemail = $_POST['UserEmail'];
$Loginpassword = $_REQUEST['Password'];
$sql = mysql_query("SELECT * FROM register WHERE Email = '".$Loginemail."' AND Password = '".$Loginpassword."'" );
$no_of_rows = mysql_num_rows($sql);
if($no_of_rows > 0){
	 $sql = mysql_fetch_array($sql);
	 $response["success"] = 1;
	$response["user"]["FullName"] = $sql["FullName"];
	$response["user"]["Email"] = $sql["Email"];
	$response["user"]["Password"] = $sql["Password"];
	$response["user"]["Course"] = $sql["Course_Name"];	
	echo json_encode($response);
	}
	else{
	$response["error"] = 1;
	$response["error_msg"] = "Incorrect email or password!";
	echo json_encode($response);
		
	}
/*if($sql !=false){
		 echo "User Found";

	$response["success"] = 1;
	$response["user"]["fullname"]=$sql["FullName"];
	$response["user"]["email"] = $sql["Email"];
	$response["user"]["password"] = $sql["Password"];
	$response["user"]["course"] = $sql["Course"];	
	print(json_encode($response));	
			}*/
/*else{
	$response["error"] = 0;
	$response["error_msg"] = "Incorrect email or password!";
	echo json_encode($response);
	}*/
/*while($e=mysql_fetch_assoc($sql))
$output[]=$e;
print(json_encode($output));

if($no_of_rows > 0)
{
	$sql = mysql_fetch_array($sql);
	echo "User Found";
	}
	else{
		echo "User Not Found";
				echo "User Not Found";

		}*/
mysql_close();


		
	

?>