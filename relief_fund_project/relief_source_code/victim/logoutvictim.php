<?php


	// if(isset($_SESSION['victimactive'])||(trim($_SESSION['victimactive']) != '')){
	// 	echo "<script>window.alert('".$_SESSION['victimactive']."')</script>";
	// }
	include("authlogin.php");
	session_destroy();
	session_unset(); 

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
          
          <a href="../index.html"><button />go to Home Page</button></a>

    </div></center>
</body>
</html>