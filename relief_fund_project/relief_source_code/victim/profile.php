<?php
	include("authlogin.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hello Victim </title>
</head>
<body>
	<center>
		<p>Welcome <?php echo $_SESSION['name']; ?></p>
		<p>Here is the details of your account and funder</p>
		<table border="1">
			<tr>
				<th>Email Id</th>
				<th>Account Number</th>
				<th>Description</th>
				<th>Total Funds</th>
			</tr>

		
		
			<?php
				include("../db.php");
				$sql = "SELECT * FROM victim_funds where emailid ='".$_SESSION['emailid']."'";
				$result=$con->query($sql);
				
				
					
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>".$row['emailid']."</td>";
					echo "<td>".$row['accntnum']."</td>";
					echo "<td>".$row['description']."</td>";
					echo "<td>".$row['totalfund']."</td>";

					echo "</tr>";
				}
			

					
				
			?>
		</table>
			

		<a href="logoutvictim.php"><input type="button" value="log out"></a>

	</center>

</body>
</html>