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
    if( isset($_SESSION['fundermessage']) AND !empty($_SESSION['fundermessage']) ): 
        echo $_SESSION['fundermessage'];    
    else:
        header( "location: ../index.html" );
    endif;
    ?>
    </p>    
    <a href="funderlogin.php"><button class="button button-block"/>Go Back</button></a>
</div></center> 
</body>
</html>
