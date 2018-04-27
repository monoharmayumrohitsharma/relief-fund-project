<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('db.php');
		$orgid = $con->escape_string($_POST['orgid']);
		$password = $con->escape_string($_POST['password']);

		//this is the query to check and login for funder
		$sql = "SELECT * FROM organisation WHERE orgid='".$orgid."'" ;
		$result = $con->query($sql);//this executes the above query
		if($result->num_rows == 0){ //this means emailid does not exists
			echo "<center>No organisation Exists</center>";
		} 
		else{
			$password=md5($password);
			$row = $result->fetch_assoc();
			if($password==$row['password']){
				$_SESSION['org_login'] = 1;
				$_SESSION['orgid'] = $row['orgid'];
				$_SESSION['stateid'] = $row['stateid'] ;
				$_SESSION['orgname'] = $row['orgname'];
				$_SESSION['orgadd']=$row['orgadd'];
				$_SESSION['orgpincode'] = $row['orgpincode'];
				$_SESSION['city']=$row['city'];
				$_SESSION['district']=$row['district'];
				header("location: homepage.php");
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
	<title>Organisation login</title>
</head>
<body>
	<center>
		
		<p>This is organisation login page</p>
		<div><form action="organisationlogin.php" method="post">
			<div>
				<table>
				<tr><th>Organisation id : -</th><td> <input type="text" name="orgid"></td></tr>
				<tr><th>Password : - </th><td><input type="Password" name="password"></td></tr>
				</table>
				<input type="submit" name="submit">
				<a href="index.html"><input type="button" value="Go to Home"></a>
			</div>
			
		</form></div>
	</center>

</body>
</html>