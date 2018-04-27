<?php
	session_start();



	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$userid=$con->escape_string($_POST['uname']);
		$password=$con->escape_string($_POST['psswd']);
		//$hashvalue=$con->escape_string($_POST['hshvlv']);
		$sql = "SELECT * FROM state where userid='".$userid."' LIMIT 1";
		$result = $con->query($sql);
		if($result->num_rows==0){
			$_SESSION['message']="user with the userid ".$userid." doesnot exist";
			header("location: error.php");
		}
		else
		{
			$user = $result->fetch_assoc();//from table
			$password = md5($password);//from user
			//$hashvalue=md5($hashvalue);
			

    		if ($password==$user['password'] )  {      
       	 	    	//echo "Password verified";
    			
        			$_SESSION['logged_in'] = true;
        			$_SESSION['state'] = $user['statename'];
        			$_SESSION['stateid']= $user['id'];
        			if($user['active']==0){
        				$sql = "UPDATE state SET active=1 WHERE id =".$_SESSION['stateid'];
        				$res=$con->query($sql);
        				header("location: add.php");
        			}
        			else{
        				$_SESSION['message'] = "An User is Online Cannot connect unless other user is offline";
        			header("location: error.php");
        			}

        			//header("location: profile.php");


        		
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
	<title>Welcome to state</title>
	
</head>
<body>
	<center>
	<h1>this is state Login page</h1>
	<div>
	<form action="index.php" method="post">
	<div>
		<table>
			<tr>
				<th>State UserId : -</th>
				<td><input type="text" name="uname" required="required"></td>
			</tr>
			<tr>
				<th>Password : -</th>
				<td><input type="password" name="psswd" required="required"></td>
			</tr>
			


		</table>
		<input type="submit" name="submit"/> 
		<a href="forgot.php"><input type="button" name="reset" value="Forgot" /></a>
	</div>
	</form>
	</div>
	</center>

</body>
</html>