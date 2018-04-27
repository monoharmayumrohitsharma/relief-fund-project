<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$email = $con->escape_string($_POST['uemail']);
		$password = $con->escape_string($_POST['upassword']);

		//this is the query to check and login for funder
		$sql = "SELECT * FROM victim WHERE emailid='".$email."' LIMIT 1" ;
		$result = $con->query($sql);//this executes the above query
		if($result->num_rows == 0){ //this means emailid does not exists
			echo "<center>No Victim Id Exists</center>";
		} 
		else{
			$password=md5($password);
			$row = $result->fetch_assoc();
			if($password==$row['password']){
				if($row['active']==1){
				
				//$_SESSION['victimactive'] = "";
				$_SESSION['victim_login'] = 1;
				$_SESSION['emailid'] = $row['emailid'] ;
				$_SESSION['name'] = $row['name'];
				$_SESSION['active']=$row['active'];
				$_SESSION['orgid'] = $row['orgid'];
				header("location: profile.php");
				}
				else{
					echo "<script>window.alert('Account not yet activated please visit your organisation')</script>" ;
					//$_SESSION['victimactive'] = "Account Not Activated Please Visit Organisation " ;

					session_unset();
					session_destroy();
				}
				
				
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
	<title>Victim Login</title>
</head>
<body>
	<center>
		<div>
			<p>Login For Victim</p>
		</div>
		<div>
			<form action="victimlogin.php" method="post">
				<table>
					<tr>
						<th>
							Victim id : - 
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
				<a href="victimregister.php"><input type="button" name="forgotfunder" value="Register"></a>
				<a href="../index.html"><input type="button" value="Go to Home"></a>
			</form>
		</div>
	</center>

</body>
</html>