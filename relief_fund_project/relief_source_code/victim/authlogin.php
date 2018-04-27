<?php
session_start();

	 if ( $_SESSION['victim_login'] != 1 ) {
  		$_SESSION['victimmessage'] = "You must log in before viewing your profile page!";
  		header("location: error.php"); 
  	}
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emailid']) || (trim($_SESSION['emailid']) == '')) {
		header("location: error.php");
		exit();
	}

?>