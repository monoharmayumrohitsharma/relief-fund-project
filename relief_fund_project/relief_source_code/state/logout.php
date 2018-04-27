<?php

include("auth.php");
include_once("../db.php");
$sql = "UPDATE state SET active=0 WHERE id =".$_SESSION['stateid'];
$res=$con->query($sql);
header("location: index.php");


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
          
          <a href="index.php"><button />go to Home Page</button></a>

    </div></center>
</body>
</html>