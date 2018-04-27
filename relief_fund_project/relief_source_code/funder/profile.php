<?php
	//session_start();
	include('auth.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
	include('../db.php');
	$sql = "SELECT * FROM victim_funds vf WHERE id=".$_POST['victim'];
	$res = $con->query($sql);
	if($res->num_rows == 0 ){
		echo "<script>window.alert('Wrong Victim');</script>";
	}
	else{
		//echo "<script>window.alert('".$_SESSION['name']."') </script>";
		while($row1 = mysqli_fetch_array($res)){
			$_SESSION['victimid'] = $row1['id'];
			$_SESSION['emailid'] = $row1['emailid'];
			$_SESSION['accntnum'] = $row1['accntnum'];
			$_SESSION['description'] = $row1['description'];
			$_SESSION['reqfund'] = $row1['reqfund'];
			header('location: payfundVictim.php');
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Funder Profile</title>
</head>
<body>
	<center>
		<h1>Welcom Funder <?php echo $_SESSION['name']; ?></h1>
		<div>
				<p>
				<!-- <a href="fundinfo.php"><input type="button" name="add" value="View My Funds"></a>  -->
				<a href="profile.php"><input type="button" name="remove" value="View Victims"></a>
				
				<a href="disasterview.php"><input type="button" name="remove" value="View Disaster"></a>
				
				</p>
		</div>
		<div>
			<form action="profile.php" method="post">
				<table>
					<tr>
						<td>Select</td>
						<td>Email Id</td>
						<td>Account Number</td>
						<td>Description</td>
						<td>Required Fund</td>
						
					</tr>
					<tr>
						<?php
							include_once("../db.php");
							$sql = "SELECT * FROM victim_funds vf WHERE active = 1 ";
							$res = $con->query($sql);
							if($res->num_rows > 0){
								while($row=mysqli_fetch_array($res)){
									echo "<tr>";

									echo "<td> <input type ='radio' name='victim' value =".$row['id']." Required='Required' /> </td> ";
									echo "<td>".$row['emailid']."</td>";
									echo "<td>".$row['accntnum']."</td>";
									echo "<td>".$row['description']."</td>";
									echo "<td>".$row['reqfund']."</td>";
									//echo "<td>".$row['emailid']."</td>";
									echo "</tr>";
								}
							}
							else{
								echo "<script>window.alert('No Data To show')</script>";
							}
						?>
					</tr>
				</table>
				<input type="submit" name="submit" value="Pay Fund">
				<input type="reset" name="reset"> 
			</form>
		</div>
		<br/>
		<br/>
		<a href="logout.php"><input type="button" name="logout" value="Log Out"></a>

	</center>

</body>
</html>