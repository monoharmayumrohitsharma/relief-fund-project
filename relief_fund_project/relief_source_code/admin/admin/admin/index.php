<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../../../db.php');
		$userid=$con->escape_string($_POST['userid']);
		$password=$con->escape_string($_POST['password']);
		echo $userid ;
		
		$sql = "SELECT * FROM admin where userid='".$userid."' LIMIT 1";
		$result = $con->query($sql);

		if($result->num_rows==0){
			$_SESSION['message']="user with the userid ".$userid." doesnot exist";
			
			header("location: error.php");
		}
		else
		{
			$user = $result->fetch_assoc();
			$password = md5($password);
			

    		if ($password==$user['password'])  {      
       	 	    	//echo "Password verified";
        			$_SESSION['logged_admin_in'] = true;

        			header("location: profile.php");
    		}
    		else {
        		$_SESSION['message'] = "You have entered wrong password, try again!";
        			header("location: error.php");
    		}
		}

	}
?>





<!DOCTYPE html>
<html>
<head>
	<title>central admin page</title>
	
</head>
<body>
	<center>
		<h1>This is the central admin page</h1>
		<p>Only Authorized person can access this and can add or remove or reset a <b> state</b></p>
		<form action="index.php" method="post" >
			<table>
				<tr>
					<th><label>UserId:</label><th>
					<td><input type="name" name="userid" required="required"></td>
				</tr>

				<tr>
					<th><label>Password:</label><th>
					<td><input type="password" name="password" required="required"></td>
				</tr>
			</table>
			<input type="submit" name="login" value="Login">
		</form>
	</center>

</body>
</html>