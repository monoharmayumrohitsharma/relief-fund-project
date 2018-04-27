<?php
/* Log out process, unsets and destroys session variables */
session_start();
include("auth.php");
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Thank you</title>
  
</head>

<body><center>
    <div>
          <h1>You Have been Logged out</h1>
              
          <p></p>
          
          <a href="index.php"><button />go to Admin Login</button></a>

    </div></center>
</body>
</html>
