<?php
	function connect(){
		$hostname_localhost="127.0.0.1";
		$database_localhost="ttucinfodroid";
		$username_localhost="root";
		$password_localhost="1015";		
		$connect= mysql_connect($hostname_localhost,$username_localhost,$password_localhost);
		mysql_select_db($database_localhost);
	}

?>