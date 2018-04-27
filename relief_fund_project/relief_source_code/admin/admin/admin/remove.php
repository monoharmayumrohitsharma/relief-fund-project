<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
include("auth.php");

if($_SERVER['REQUEST_METHOD']=='POST'){

		include_once('../../../db.php');
		$state=$con->escape_string($_POST['state']);
		$userid=$con->escape_string($_POST['userid']);
		$state = strtoupper($state);
		$stateid = $_POST['statelist'];
		$sql = "Select * from state where statename = '".$state."' AND id = ".$stateid ;
		$result = $con->query($sql);
		if($result->num_rows==1){
			$row = mysqli_fetch_array($result);
			if($row['userid'] == $userid){
				
				$sql = "DELETE FROM state WHERE id = ".$stateid ;
				$result=$con->query($sql);
				if($result==1){echo "<center>Deleted Successfully</center>";}

			}
				
			
			else{
				echo "<center> Wrong <b> Userid </b> <center>" ;
			}
			
		}
		else{
			echo "<center> No Selected State or state id  </center>";
		}
		
		

		}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Remove State</title>
</head>
<body><center>

	<h1>You Can Remove States</h1>
					
					
			<div>
				<fieldset>
					<legend><b>Remove State Info</b></legend>
					<form action="remove.php" method="post">
						<div>
							<p>

						Select State : - 
					<select name="statelist">
					<?php
						include_once('../../../db.php');
						$sql="SELECT * FROM state";
						$result=$con->query($sql);
						
						if($result->num_rows==0){
							
							echo "<option value='-1'>No States to show</option>";
								

						}
						else{
							
							while($row=mysqli_fetch_array($result)){
								
         						 echo "<option value='" . $row['id'] . "'>" . $row['statename']."," .$row['phone'] . "</option>";
         						}

							
						}
						
						$con->close();
						//echo "Connection Closed";
					?>
				</select>
						
				</p>
			</div>
					<table>
						<tr>
							<td>
								State : - 
							</td>
							<td>
								<input type="name" name="state" size="20" required="required" pattern="[A-Za-z][A-Za-z][A-Za-z][A-Za-z][A-Za-z][A-Za-z]+" title="Input correct state" />
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
						

						

					</table>
					<br/>
					<input type="submit" name="add" value="Remove state">
					<input type="reset" name="reset" value="Clear">
					<a href="profile.php"><input type="button" name="back" value="Back To Home"></a>

					
					
				</form>
				</fieldset>
			</div>

</center></body>
</html>