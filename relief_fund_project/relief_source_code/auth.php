<?php
session_start();

	 if ( $_SESSION['org_login'] != 1 ) {
  		$_SESSION['organisationmessage'] = "You must log in before viewing your profile page!";
  		header("location: error.php"); 
  	}
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['orgid']) || (trim($_SESSION['orgid']) == '')) {
		header("location: error.php");
		exit();
	}

?>