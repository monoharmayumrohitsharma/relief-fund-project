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
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>    
    <a href="index.php"><button class="button button-block"/>Go to <b>Home </b></button></a>
</div></center> 
</body>
</html>
