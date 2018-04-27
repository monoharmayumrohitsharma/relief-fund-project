<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$email = $con->escape_string($_POST['uemail']);
		$password = $con->escape_string($_POST['upassword']);

		//this is the query to check and login for funder
		$sql = "SELECT * FROM funder WHERE email='".$email."'" ;
		$result = $con->query($sql);//this executes the above query
		if($result->num_rows == 0){ //this means emailid does not exists
			echo "<center>No Email Exists</center>";
		} 
		else{
			$password=md5($password);
			$row = mysqli_fetch_array($result);
			if($password==$row['password']){
				$_SESSION['funder_login'] = 1;
				$_SESSION['email'] = $email ;
				$_SESSION['name'] = $row['Name'];
				
				$_SESSION['phone'] = $row['phone'];
				
				
				header("location: profile.php");
			}
			else{
				echo "<center>Password Incorrect</center>" ;

			}
		}
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Funder Login</title>
</head>
<body>
	<center>
		<div>
			<p>Login For Funder</p>
		</div>
		<div>
			<form action="funderlogin.php" method="post">
				<table>
					<tr>
						<th>
							Email id : - 
						</th>
						<td>
							<input type="email" name="uemail" size="20" required="required">
						</td>
					</tr>
					<tr>
						<th>
							Password : - 
						</th>
						<td>
							<input type="password" name="upassword" size="20" required="required">
						</td>
					</tr>
				</table>
				<br/>

				<input type="submit" name="submit" value="submit">
				
				<a href="../index.html"><input type="button" value="Go to Home"></a>
			</form>
		</div>
	</center>

</body>
</html>