<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  
</head>
<body>
    <center>
<div >
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['organisationmessage']) AND !empty($_SESSION['organisationmessage']) ): 
        echo $_SESSION['organisationmessage'];    
    else:
        header( "location: index.html" );
    endif;
    ?>
    </p>    
    <a href="index.html"><button class="button button-block"/>Go Back</button></a>
</div></center> 
</body>
</html>
