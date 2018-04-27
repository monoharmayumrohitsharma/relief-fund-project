<?php
	include("auth.php");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('db.php');
		$Dname = $con->escape_string($_POST['Dname']);
		$accntNum = $con->escape_string($_POST['accntnum']);
		$description = $con->escape_string($_POST['description']);
		$reqFund = $con->escape_string($_POST['reqFund']);

		$query = "SELECT dname,orgid FROM disaster_funds where dname='".$Dname."' AND orgid = '".$_SESSION['orgid']."'";
		$result = $con->query($query);
		if($result->num_rows != 0 ){
			echo "<script>window.alert('This Disaster has already been Uploaded')</script>";
		}
		else{
			$sql = "INSERT INTO disaster_funds(dname,accntnum,description,reqfund,orgid,active) values('".$Dname."','".$accntNum."','".
			$description."',".$reqFund.",'".$_SESSION['orgid']."',1)";
			$result = $con->query($sql);
			if($result){
				// $sql = "UPDATE victim SET active = 1 WHERE emailid = '".$email."'" ; 
				// $res = $con->query($sql);
				echo "<script>window.alert('Inserted Disaster Successfully');</script>";
				

			}
			else{
				echo "<script>window.alert('Could not be Inserted');</script>";

			}
		}
	}

?>
<!DOCTYPE html>

<html>
	<head>
		<title>add Disaster</title>
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
			<div>
				<form action="addDisaster.php" method="post">
					<table>
						<tr>
							<td>
								Disaster Name : - 
							</td>
							<td>
								<input type="name" name="Dname" required="required" >
							</td>
						</tr>
						<tr>
							<td>
								Account Number : - 
							</td>
							<td>
								<input type="number" name="accntnum" size = "20" required="required">
							</td>
						</tr>
						<tr>
							<td>
								Description : - 
							</td>
							<td>
								<input type="name" name="description" size="50" required="required" />
							</td>
						</tr>
						<tr>
							<td>
								Required Fund : - 
							</td>
							<td>
								<input type="text" name="reqFund" size="20" required="required" />
							</td>
						</tr>
						
						
					</table>

					<input type="submit" name="add" value="Add Disaster">
					<input type="reset" name="reset" value="Clear">
				</form>
			</div>
		

<a href="logout.php"><input type="button" value="Log out"></a>
</center>
</body>


</html>