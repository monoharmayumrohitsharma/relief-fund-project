<?php
	include("auth.php");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('db.php');
		
		if($_POST['victim'] <= 0){
			echo "<script>window.alert('NoT Selected')</script>";
		}
		else{
		$sql = "SELECT * FROM victim_funds WHERE id =".$_POST['victim']." AND orgid = '".$_SESSION['orgid']."'";
		$res = $con->query($sql);
		if($res->num_rows==0){
			echo "<script>window.alert('This Victim Does not Belong to this Organisation');</script>";
		}
		else{
			$sql = "UPDATE victim_funds SET active = 0 WHERE id = ".$_POST['victim'];
			$result = $con->query($sql);
			if($result){
				echo "<script>window.alert('Deleted Successfully')</script>";
			}
		}
	}
}

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
			<div>
				<form action = "removeVictim.php" method="post">
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
								include_once('db.php');
								$sql = "SELECT * FROM victim_funds where active = 1 and orgid='".$_SESSION['orgid']."'" ;
									$res = $con->query($sql);
									if($res->num_rows == 0 ){
										echo "No Victims to show";
									} 
									else{
										while($row=mysqli_fetch_array($res)){
											echo "<td><input type='radio' name='victim' value=".$row['id']." /></td>";
											echo "<td>".$row['emailid']."</td>" ;
											echo "<td>".$row['accntnum']."</td>" ;
											echo "<td>".$row['description']."</td>" ;
											echo "<td>".$row['reqfund']."</td>" ;
											echo "</tr>";
										}
									}
									
											




							?>
						
					</table>
					<input type="submit" name="add" value="Remove Victim">
					<input type="reset" name="reset" value="Cancel">
				</form>
				

			</div>

			<a href="logout.php"><input type="button" value="Log out"></a>
		</center>
	</body>
</html>