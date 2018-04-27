<?php
session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['state']) || (trim($_SESSION['state']) == '')) {
		header("location: error.php");
		exit();
	}

?>