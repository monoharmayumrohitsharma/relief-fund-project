<?php
	include('auth.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$sql = "SELECT * FROM victim_funds where emailid='".$_SESSION['emailid']."'";
		$res = $con->query($sql);
		if($res->num_rows == 0){
			echo "<script>window.alert('Wrong Victim');</script>";

		}
		else{
			$row = $res->fetch_assoc();
			$totalfund = $_POST['payamt'];
			$fundername = $row['fundedby'];
			$fundername = $fundername.",".$_SESSION['email'];
			
			$totalfund = $totalfund + $row['totalfund'];
			$sql ="UPDATE victim_funds SET totalfund=".$totalfund.",fundedby='".$fundername."' WHERE emailid ='".$_SESSION['emailid']."' ";
			$result = $con->query($sql);
			$sql1 = "INSERT INTO transaction(funder,type,victimid,amount) values('".$_SESSION['email']."',0,'".$_SESSION['emailid']."',".$totalfund.")";
			$res1 = $con->query($sql1);
			if($result){
				echo "<script>window.alert('Thank You for Transaction ')</script>";
			}

		}


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pay Funds</title>
</head>
<body>
	<center>
		<h1>Welcome Funder <?php echo $_SESSION['name'] ;?> </h1>
		<form action="payfundVictim.php" method="POST">
		<table border="1">
			<?php
				include('../db.php');
				$sql = "SELECT * FROM victim where emailid ='".$_SESSION['emailid']."'";
				$res = $con->query($sql);
				$row = mysqli_fetch_array($res);
				echo "<tr>";
				echo "<td> Name : - </td>";
				echo "<td>".$row['name']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Description : - </td>";
				echo "<td>".$_SESSION['description']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Account Number : - </td>";
				echo "<td>".$_SESSION['accntnum']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Required Fund : - </td>";
				echo "<td>".$_SESSION['reqfund']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> City : - </td>";
				echo "<td>".$row['city']."</td>";
				echo "</tr>";
				

			?>
			<tr>
				<td>Pay : - </td>
				<td><input type='text' name='payamt' required='required' pattern='^[1-9](?!00$)[0-9]\d+$' title='Amount should be greater than 100' /> </td>
			</tr>
		</table>
		<input type="submit" name="submit" value="submit"/>
		<a href="profile.php"><input type="button" value="Go Back" /></a>
		</form>

	</center>

</body>
</html>