<?php
session_start();

	 if ( $_SESSION['funder_login'] != 1 ) {
  		$_SESSION['fundermessage'] = "You must log in before viewing your profile page!";
  		header("location: error.php"); 
  	}
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['email']) || (trim($_SESSION['email']) == '')) {
		header("location: error.php");
		exit();
	}

?>