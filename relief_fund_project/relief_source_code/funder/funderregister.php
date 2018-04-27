<?php
	session_start();
	$str="";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$email = $con->escape_string($_POST['email']);
		$password = $con->escape_string($_POST['password']);
		$name = $con->escape_string($_POST['name']);
		$phone = $con->escape_string($_POST['phone']);

		//this is the query to check and login for funder
		$sql = "SELECT * FROM funder WHERE email='".$email."' OR phone='".$phone."'" ;
		$result = $con->query($sql);//this executes the above query
		if($result->num_rows != 0){ //this means emailid does not exists
			echo "<script>alert('Email Id or Phone Exists');</script>";
			
			
		} 
		else{
			$flag = 0 ;
			$password=md5($password);
			$otp=substr($email,0,2).substr($phone,0,2);

			$sql = "INSERT INTO funder(email,password,name,phone) VALUES('".$email."','".$password."','".$name."','".$phone."')";
			$result = $con->query($sql);
			
			if($result){
				$_SESSION['funder_login'] = 1;
				$_SESSION['email'] = $email ;
				$_SESSION['name'] = $name;
				
				$_SESSION['phone'] = $phone;
				
				header("location: profile.php");
			}
			else{
				echo "<center>Could not Insert</center>" ;

			}
		}
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Funder registration</title>
	<script type="text/javascript" src="validate.js"></script>
	
</head>
<body>
<center>
	<p>This page is for Funder Registration</p>
	<div>
		<form action="funderregister.php" method="post" name="funderRegister" onsubmit="return validateForm()">
		<table>
			<tr>
				<th>Email id : -</th>
				<td><input type="email" name="email" required="required"></td>
			</tr>
			<tr>
				<th>Password : -</th>
				<td><input type="password" name="password" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Should contain one upper one lower and number and should be min 8 Characters"></td>
			</tr>
			<tr>
				<th>Name : -</th>
				<td><input type="name" name="name" required="required" pattern="[a-zA-Z][a-zA-Z]+" title="Invalid Name"></td>
			</tr>
			<tr>
				<th>Phone : -</th>
				<td><input type="text" name="phone" required="required" pattern="[7-9][0-9]{9}" title="Invalid Number"></td>
			</tr>
			
		</table>
		<input type="submit" name="submit">
		<input type="reset" name="reset">
		<a href="../index.html"><input type="button" value="Go to Home"></a>
		</form>

	</div>
</center>
</body>
</html>