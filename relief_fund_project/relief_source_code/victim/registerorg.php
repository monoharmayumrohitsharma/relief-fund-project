<?php
	include("auth.php");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');

		$org =  $_POST['orgid'];
		$_SESSION['visitorg'] = "";
		$sql = "INSERT INTO victim(emailid, password, name, phone, address, pincode, city, district, active, orgid) VALUES ('".$_SESSION['email']."','".$_SESSION['password']."','".$_SESSION['name']."','".$_SESSION['phone']."','".$_SESSION['address']."','".$_SESSION['pincode']."','".$_SESSION['city']."','".$_SESSION['district']."',0,'".$org."')";
		$result=$con->query($sql);
		if($result){
			//echo "Inserted" ; 
			echo "<script>window.alert('Please Visit the Organisation To activate Your Email');</script>";
			//echo "<center><p>Please Visit the Organisation with valid documents </p></center>";
			
			// session_destroy();
			// sleep(5);
			// header("location: ../index.html");
			$_SESSION['visitorg'] = "Visit The Organisation ".$org." Thank you For registering";
			header("location: logout.php");
		}

		
		
		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>select organisation</title>
</head>
<body>
	<center>
		<p>These are the available organisations near you select one of them</p>
		<form action="registerorg.php" method="post">
		<table>
			<tr>
				<th>
					Select
				</th>
				<th>
					Organisation Name
				</th>
				<th>
					Address
				</th>
			</tr>
			<?php
				include("../db.php");
				$pin = substr($_SESSION['pincode'], 0,2);
				$sql = "SELECT * FROM organisation where orgpincode LIKE '".$pin."%' ";
				$result = $con->query($sql);
				if($result){
					while($row = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><input type='radio' name='orgid' value='".$row['orgid']."' </td>";
					echo "<td>".$row['orgname']." </td>";
					echo "<td>".$row['orgadd']." </td>";

					echo "</tr>";
				}

				}


			?>
		</table>
		<input type="submit" name="submit">
		
		<a href="logout.php"><input type="button" value="Cancel"></a>
	</form>
	</center>

</body>
</html>