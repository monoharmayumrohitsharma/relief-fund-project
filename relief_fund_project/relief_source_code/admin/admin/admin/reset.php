<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
include("auth.php");

?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../../../db.php');
		$stateid=$_POST['statelist'];
		if($stateid==-1){
			echo "<center>No state exsists</center>";
			
		}
		else{
		$userid=$con->escape_string($_POST['userid']);
		$password=$con->escape_string($_POST['password']);
		$email=$con->escape_string($_POST['email']);
		$phone=$con->escape_string($_POST['phone']);
		
		$psswd = $password;
		

		$password = md5($password);
		
		
		$sql = "SELECT s1.id,s1.statename,s1.password,s1.userid,s1.email,s1.phone FROM state s1,statereset s2 WHERE 
		s1.id=".$stateid." AND s1.id = s2.id AND s2.request = 1" ;
		$result = $con->query($sql);
		if($result->num_rows==0){
			echo "<center><p> No States to update</p></center>";
		}
		else{
			while($row=mysqli_fetch_array($result)){
				$tmp['id'] = $row['id'];
				$tmp['statename'] = $row['statename'];
				$tmp['password'] = $row['password'];
				$tmp['userid'] = $row['userid'];
				$tmp['email'] = $row['email'];
				$tmp['phone'] = $row['phone'];
				
			}
			$sql = "UPDATE state SET id=".$tmp['id']." " ;
			$msg = "For the state ".$tmp['statename']." ";
			if(trim($userid)!=""){
				$sql = $sql.",userid ='".$userid."' ";
				$msg = $msg."user name is ".$userid." ";
			}
			if(trim($password)!="d41d8cd98f00b204e9800998ecf8427e"){//hash value of ""
				$sql = $sql.",password ='".$password."' ";
				$msg = $msg."password is ".$psswd." ";
			}
			if(trim($email)!=""){
				$sql = $sql.",email ='".$email."' ";
				$msg = $msg."email is ".$email." ";
			}
			if(trim($phone)!=""){
				$sql = $sql.",phone ='".$phone."' ";
				$tmp['phone'] = $phone ;
				$msg = $msg."phone no. is ".$phone." ";
			}
			
			$sql = $sql."WHERE id =".$stateid ;
			if($result=$con->query($sql)){
				//this code make statereset table to 0
				$sql = "DELETE FROM statereset WHERE id =".$stateid;
				$res = $con->query($sql);
				///send sms;
				// include_once('send_message/way2sms-api.php');
   	// 			sendWay2SMS ( '8722737566' , '9449833008' , $tmp['phone'] , $msg);


			}

		}
	}
		
		

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset State</title>
</head>
<body>
	<center>
		<h3>These are the states requested for change</h3>
		<table border="1">
			<tr>
			<th>State</th>
			<th>Description</th>

			</tr>
			
				<?php
					include_once('../../../db.php');
						$sql="SELECT s1.statename,s2.description FROM statereset s2,state s1 WHERE s2.id = s1.id AND s2.request=1 ";
						$result=$con->query($sql);
						
						if($result->num_rows==0){
							
								echo "<tr><td>No States </td><td> to show</td></tr>";
								

						}
						else{
							
							while($row=mysqli_fetch_array($result)){

								
         						 echo "<tr><td>".$row['statename']."</td><td>".$row['description']."</td></tr>";
         						}

							
						}
						//$con->close();
						

				?>
			

		</table>

		<p>Select the state to modify</p>
		<p><b>Note:-</b>Insert new values for only specified textfields and leave blank for no change</p>
		<div>
			<form action="reset.php" method="post">
				<table>
					<tr>
						<td>State</td>
						<td>
							<select name="statelist">
							<?php
								
								$sqli="SELECT statereset.id,state.statename FROM statereset,state WHERE statereset.id = state.id AND statereset.request=1";
								$res=$con->query($sqli);
						
								if($res->num_rows==0){
							
									echo "<option value ='-1'>No states to show</option>";
								

								}
								else{
							
									while($rows=mysqli_fetch_array($res)){

								
         						 		echo "<option value='".$rows['id']."'>".$rows['statename']."</option>";
         							}

							
								}
								//$con->close();
								


								?>
						</select>
						</td>
						<td>UserId:-</td><td><input type="name" name="userid" size="20"></td>
					</tr>
					<tr>
						<td>
							Password:-
						</td>
						<td>
							<input type="password" name="password" size="20">
						</td>
						<td>
							Email:-
						</td>
						<td>
							<input type="email" name="email" size="20">
						</td>
					</tr>
					<tr>
						<td>
							phone:-
						</td>
						<td> 
							<input type="text" name="phone" size="20" pattern="[789][0-9]{9}" title="Enter Correct Phone Number">
						</td>
						
					</tr>
				</table>
				<input type="submit" name="submit"> <input type="reset" name="clear"> <a href="profile.php"><input type="button" name="gotoadmin"
					value="Go to Admin"></a>
				
			</form>
		</div>
		
		




	</center>

</body>
</html>