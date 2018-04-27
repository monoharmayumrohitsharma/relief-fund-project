<?php
	include("auth.php");
	if($_SESSION['active']==1){
		header("location: profile.php");
	}
	// send otp
	
   	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$otp = $con->escape_string($_POST['otp']);
		
		$sql = "SELECT * FROM funder WHERE email='".$_SESSION['email']."'" ;
		$result = $con->query($sql);//this executes the above query
		$row = $result->fetch_assoc();
			if($otp==$row['otp']){
				$sql = "UPDATE funder SET active=1 WHERE email='".$_SESSION['email']."'" ;
				$result = $con->query($sql);
				
				$_SESSION['active']=1;
				
				header("location: profile.php");
			}
			else{
				echo "<center>Inccorect Otp</center>" ;
				header("location: logout.php");

			}
		}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Account</title>
</head>
<body>
	<form action="otp.php" method="post">
		<p>The otp has been sent to <?php echo $_SESSION['phone'] ?></p>
		<label>Otp :<input type="name" name="otp"></label>
		<input type="submit" name="submit">
		
	</form>

</body>
</html>