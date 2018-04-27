<?php

	$server_name = "localhost";
	$uname="root";
	$pwd="";
	$dbname="relief_fund";
	$con = new mysqli($server_name,$uname,$pwd,$dbname);
	if($con->connect_error)
	{
		die("Could not connect");
	}
	echo "connected";
	
	

?>	