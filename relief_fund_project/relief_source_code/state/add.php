<?php
/* Displays user information and some useful messages */
//session_start();

// Check if user is logged in using the session variable
include("auth.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$stateid = $_SESSION['stateid'];
		$orgname=$con->escape_string($_POST['orgname']);
		$orgid=$con->escape_string($_POST['orgid']);
		
		$orgpsswd=$con->escape_string($_POST['orgpsswd']);
		$headorg=$con->escape_string($_POST['headorg']);
		$headphone=$con->escape_string($_POST['headphone']);
		$orgemail=$con->escape_string($_POST['orgemail']);
		$orgphone=$con->escape_string($_POST['orgphone']);
		$addorg=$con->escape_string($_POST['addorg']);
		$pincode=$con->escape_string($_POST['pincode']);
		$orgcity=$con->escape_string($_POST['orgcity']);
		$orgdistrict=$con->escape_string($_POST['orgdistrict']);

		$orgpsswd = md5($orgpsswd);
		
		
		$sql = "Select orgname from organisation where orgid = '".$orgid."'" ;
		$result = $con->query($sql);
		
		if($result->num_rows>0){
				//echo "<center><p> Organisation id already exists</p></center>";
				echo "<script>window.alert('Could Not Insert Organisation id already Exists');</script>";
		}
			
		
		else{
			$sql = "INSERT INTO organisation(stateid,orgname,orgid,password,headorg,headphone,orgemail,orgphone,orgadd,orgpincode,city,district) VALUES(".$stateid.",'".$orgname."','".$orgid."','"
					.$orgpsswd."','".$headorg."','".$headphone."','".$orgemail."','".$orgphone."','".$addorg."','".$pincode."','".$orgcity."','".$orgdistrict."')";

			$result = $con->query($sql);
			if($result==1)
			{
				echo "<p><center>Inserted</center></p>";
			}
		}
		
		

	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>add State</title>
		<script type="text/javascript" src="js/validator.js"></script>
	</head>
	<body>
		<center>
			<h1>Welcome <?php echo $_SESSION['state'] ?></h1>
			<div><p><a href="add.php"><input type="button" name="add" value="add Organisation"></a> <a href="remove.php"><input type="button" name="remove" value="remove Organisation"></a></p></div>
			<h3>You can add states</h3>
			

			
			<div>
				<fieldset>
					<legend><b>Add Organisation Info</b></legend>
					<form action="add.php" method="post"  name="form1">
					<table>
						<tr>
							<td>
								ORGANISATION NAME : - 
							</td>
							<td>
								<input type="name" name="orgname" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								ORGANISATION ID : - 
							</td>
							<td>
								<input type="name" name="orgid" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								PASSWORD : - 
							</td>
							<td>
								<input type="password" name="orgpsswd" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								HEAD OF ORGANISATION : - 
							</td>
							<td>
								<input type="name" name="headorg" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								PHONE NUMBER(HOO) : - 
							</td>
							<td>
								<input type="text" name="headphone" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								ORGANISATION EMAIL : - 
							</td>
							<td>
								<input type="email" name="orgemail" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								ORGANISATION PHONE : - 
							</td>
							<td>
								<input type="name" name="orgphone" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								ADDRESS OF ORGANISATION : - 
							</td>
							<td>
								<input type="name" name="addorg" size="50" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								PINCODE : - 
							</td>
							<td>
								<input type="text" name="pincode" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								CITY : - 
							</td>
							<td>
								<input type="name" name="orgcity" size="20" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								DISTRICT : - 
							</td>
							<td>
								<input type="name" name="orgdistrict" size="20" required="required" />
							</td>
						</tr>

						

					</table>
					<br/>
					<input type="submit" name="add" value="Add state">
					<input type="reset" name="reset" value="Clear">
					<a href="logout.php"><input type="button" name="back" value="logout"></a>
					

					
					
				</form>
				</fieldset>
			</div>
			




		</center>
	</body>	

</html>	