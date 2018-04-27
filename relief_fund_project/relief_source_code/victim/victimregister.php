<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$email = $con->escape_string($_POST['email']);
		$password = $con->escape_string($_POST['password']);
		$name = $con->escape_string($_POST['name']);
		$phone = $con->escape_string($_POST['phone']);
		$address = $con->escape_string($_POST['address']);
		$pincode = $con->escape_string($_POST['pincode']);
		$city = $con->escape_string($_POST['city']);
		$district = $con->escape_string($_POST['district']);

		//this is the query to check and login for funder
		$sql = "SELECT * FROM victim WHERE emailid='".$email."'" ;
		$result = $con->query($sql);//this executes the above query
		if($result->num_rows != 0){ //this means emailid does not exists
			//echo "<center>Email Already Exists</center>";
			echo "<script>window.alert('Email Id already Exists');</script>" ;
		} 
		else{
			$password=md5($password);
			$pin = substr($pincode, 0,2);

			$sql = "SELECT * FROM organisation where orgpincode LIKE '".$pin."%' ";
			$result = $con->query($sql);
			if($result->num_rows>0){
				$_SESSION['victim_reg'] = 1;
				$_SESSION['email'] = $email ;
				$_SESSION['password']=$password;
				$_SESSION['name'] = $name;
				$_SESSION['phone']=$phone;
				$_SESSION['address'] = $address;
				$_SESSION['pincode']=$pincode;
				$_SESSION['city']=$city;
				$_SESSION['district']=$district;
				header("location: registerorg.php");
			}
			else{
				echo "<center>Sorry No organisations near you </center>" ;
				session_unset();
				session_destroy();

			}
		}
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Victim registration</title>
</head>
<body>
<center>
	<p>This page is for Victim Registration</p>
	<div>
		<form action="victimregister.php" method="post">
		<table>
			<tr>
				<th>Email id : -</th>
				<td><input type="email" name="email" required="required"></td>
			</tr>
			<tr>
				<th>Password : -</th>
				<td><input type="password" name="password" required="required"></td>
			</tr>
			<tr>
				<th>Name : -</th>
				<td><input type="name" name="name" required="required"></td>
			</tr>
			<tr>
				<th>Phone : -</th>
				<td><input type="text" name="phone" required="required"></td>
			</tr>
			<tr>
				<th>Address : -</th>
				<td><input type="text" name="address" required="required"></td>
			</tr>
			<tr>
				<th>Pincode : -</th>
				<td><input type="text" name="pincode" required="required"></td>
			</tr>
			<tr>
				<th>City : -</th>
				<td><input type="text" name="city" required="required"></td>
			</tr>
			<tr>
				<th>District : -</th>
				<td><input type="text" name="district" required="required"></td>
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