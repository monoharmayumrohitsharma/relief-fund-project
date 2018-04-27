<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
include("auth.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
	echo "<table border='1'>";
	echo "<tr>";
	//echo "<td></td>";
	echo "<td>Funder Email</td>" ;
	echo "<td>Receiver</td>";
	echo "<td>Funds </td>"; 
	echo "</tr>" ;
	
	$view = $_POST['view'];
	include_once('../../../db.php');
	$sql = "SELECT * FROM transaction where type = ".$view;
	$res = $con->query($sql);
	while($row=mysqli_fetch_array($res)){
	
	
	$sql1 = "SELECT * FROM victim where emailid='".$row['victimid']."'";
	$result1 = $con->query($sql1);
	$sql2 = "SELECT * FROM funder where emailid='".$row['funder']."'";
	$result2 = $con->query($sql1);
	$row1 = mysqli_fetch_array($result1);
	$row2 = mysqli_fetch_array($result2);

	echo "<tr>";
	echo "<td>".$row['funder']."</td>";
	
	echo "<td>".$row['victimid']."</td>";
	echo "<td>".$row['amount']."</td>"; 
	echo "</tr>" ;

	//echo "<table border='1'>";
	// echo "<tr>";
	// echo "<td>".$row1['name']."</td>";
	// echo "<td>".."</td>" ;
	// echo "<td>Funds</td>";
	// echo "<td>Receiver</td>"; 
	// echo "</tr>" ;



	echo "</table>";
}

	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Details</title>
</head>
<body>
	<center>
		<form action="transaction.php" method="POST">
		<p>View by :-</p>
		<select name="view">
			<!--<option value = 0>Victim</option>-->
			<option value=1>Funder</option>
		</select>
		<input type="submit" value="Show"/>	
		<a href="profile.php"><input type="button" value="Go to Home"></a>
	</form>



	</center>

</body>
</html>