<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once("../db.php");
		$email=$con->escape_string($_POST['email']);
		//$_SESSION['phone']=$con->escape_string($_POST['phone']);
		$sql = "SELECT * FROM state where email='karnataka@gmail.com'";
		$result = $con->query($sql);
		if($result){
			if($result->num_rows>0){
				$row = $result->fetch_assoc();
				$_SESSION['temail']=$row['email'];
				//$_SESSION['tphone']=$row['phone'];
				$sql = "INSERT INTO statereset values(".$row['id'].",1,'ALL RESET')";
				$res = $con->query($sql);
				if($res){
					echo "<center>Please Check your email after one day</center>";
				}


			}

		}
		else{
			//echo "<script> window.alert('No such email exits');</script>";
			$_SESSION['message']="Sorry no such email";
			header("location:error.php");
		}
	}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Forgot Page</title>
	
</head>
<body>
	<center>
		
		<p>Enter Email to Reset Your Password and UserId</p>


		
			<!-- <ul>
				<li><a href="forgot.php">Click here </a>for reset of evertything except email or phone </li>
				<li><a href="forgotemail.php">Click here </a>for reset email only</li>
			</ul> -->

		
	<div>
		<form action="forgot.php" method="post">
			<table>
				<tr>
					<th>Email : - </th>
					<td><input type="email" name="email" required="required"></td>
				</tr>
				<!-- <tr>
					<th>Phone : - </th>
					<td><input type="text" name="phone"></td>
				</tr> -->
			</table>
			<input type="submit" name="submit">


			
		</form>
	</div>
	</center>

</body>
</html>