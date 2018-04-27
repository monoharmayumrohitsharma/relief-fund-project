<?php
	include("auth.php");

?>
<!DOCTYPE html>

<html>
	<head>
		<title>add State</title>
	</head>
	<body>
		<center>
			<h1>Welcome <?php echo $_SESSION['orgname'] ?></h1>
			<div><p>
				<a href="homepage.php"><input type="button" name="add" value="Add Victim "></a> 
				<a href="addDisaster.php"><input type="button" name="remove" value="Add disaster"></a>
				
				<a href="removeVictim.php"><input type="button" name="remove" value="Remove Victim"></a>
				<a href="removeDisaster.php"><input type="button" name="remove" value="Remove Disaster"></a>
				<a href="checkbalvictim.php"><input type="button" name="remove" value="Check Balance Victim"></a>
				<a href="checkbalorg.php"><input type="button" name="remove" value="Check Balance Organisation"></a>
				</p>
				</div>
				<br/>
				<br/>
				<table border="1">
					<tr>
						<td>Name </td>
						<td>Account Number</td>
						<td>Description</td>
						<td>Required Fund</td>
						<td>Total Funds</td>

					</tr>
					<?php
						echo "<tr>";
						include_once('db.php');
						$sql = "SELECT * FROM disaster_funds where orgid='".$_SESSION['orgid']."'";
						$res = $con->query($sql);
						if($res->num_rows == 0 ){
							echo "No Disaster to Show";
						}
						else{
							while($row=mysqli_fetch_array($res)){
								echo "<td>".$row['dname']."</td>" ;
								echo "<td>".$row['accntnum']."</td>" ;
								echo "<td>".$row['description']."</td>" ;
								echo "<td>".$row['reqfund']."</td>" ;
								echo "<td>".$row['totalfund']."</td>" ;
								echo "</tr>";
							}
						}



						

					?>
				</table>

<a href="logout.php"><input type="button" value="Log out"></a>
</body>
</html>