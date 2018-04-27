<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
include("auth.php");


if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../../../db.php');
		$state=$con->escape_string($_POST['state']);
		$userid=$con->escape_string($_POST['userid']);
		$password=$con->escape_string($_POST['password']);
		$email=$con->escape_string($_POST['email']);
		$phone=$con->escape_string($_POST['phone']);
		

		$password = md5($password);
		
		$state = strtoupper($state);
		$sql = "Select statename from state where statename = '".$state."'" ;
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<center><p> State already Exists</p></center>";
		}
		else{
			$sql = "INSERT INTO state(statename,userid,password,email,phone) VALUES('".$state."','".$userid."','".$password."','"
					.$email."',".$phone.")";
			$result = $con->query($sql);
			if($result==1)
			{
				echo "<p><center>Inserted</center></p>";
			}
		}
		
		

	}


?>
<html>
	<head>
		<title>add State</title>
		<script type="text/javascript"  src="/js/java1.js"></script>
	</head>
	<body>
		<center>
			<h1>Welcome</h1>
			<h3>You can add states</h3>
			<div>
				<p>
					Avaialble States : - 
					<?php
						include_once('../../../db.php');
						$sql="SELECT * FROM state";
						$result=$con->query($sql);
						echo "<select>";
						if($result->num_rows==0){
							
								echo "<option value='-1'>No States to show</option>";
								

						}
						else{
							
							while($row=mysqli_fetch_array($result)){
								
         						 echo "<option value='" . $row['id'] . "'>" . $row['statename'] . "</option>";
         						}

							
						}
						echo "</select>";
						$con->close();
						//echo "Connection Closed";
					?>
						
				</p>
			</div>
			<div>
				<fieldset>
					<legend><b>Add State Info</b></legend>
					<form action="add.php" method="post" name="myForm1" onsubmit="return validateForm()">
					<table>
						<tr>
							<td>
								State : - 
							</td>
							<td>
								<input type="name" name="state" size="20" required="required" pattern="[a-zA-Z][a-zA-Z][a-zA-Z]+"
								title="Name Should be alphabetics" />
							</td>
						</tr>
						<tr>
							<td>
								User Id : - 
							</td>
							<td>
								<input type="name" name="userid" size="20" required="required" pattern="[a-z]{3}[0-9]{3}" title="should be 3 alphabets and 3 numbers" />
							</td>
						</tr>
						<tr>
							<td>
								Password : - 
							</td>
							<td>
								<input type="password" name="password" size="20" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Should contain one upper one lower and number and should be min 8 Characters" />
							</td>
						</tr>
						<tr>
							<td>
								Email : - 
							</td>
							<td>
								<input type="email" name="email" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								Phone : - 
							</td>
							<td>
								<input type="name" name="phone" size="20" required="required" pattern="[789][0-9]{9}" title="Should be 10 Digits" />
							</td>
						</tr>
						

						

					</table>
					<br/>
					<input type="submit" name="add" value="Add state">
					<input type="reset" name="reset" value="Clear">
					<a href="profile.php"><input type="button" name="back" value="Back To Home"></a>

					
					
				</form>
				</fieldset>
			</div>
			




		</center>
	</body>	

</html>	