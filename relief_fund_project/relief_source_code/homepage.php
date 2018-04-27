<?php
	include("auth.php");

	if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('db.php');
		$email = $con->escape_string($_POST['emailid']);
		$accntNum = $con->escape_string($_POST['accntnum']);
		$description = $con->escape_string($_POST['description']);
		$reqFund = $con->escape_string($_POST['reqFund']);

		$query = "SELECT emailid,orgid,active from victim  WHERE emailid = '".$email."' AND orgid='".$_SESSION['orgid']."' AND active = 0";
		$result = $con->query($query);
		if($result->num_rows == 0 ){
			echo "<script>window.alert('The Victim is Already Activated or Does Not belong to this organisation')</script>";
		}
		else{
			$sql = "INSERT INTO Victim_Funds(emailid,accntnum,description,reqfund,orgid,active) values('".$email."','".$accntNum."','".
			$description."',".$reqFund.",'".$_SESSION['orgid']."',1)";
			$result = $con->query($sql);
			if($result){
				$sql = "UPDATE victim SET active = 1 WHERE emailid = '".$email."'" ; 
				$res = $con->query($sql);
				echo "<script>window.alert('Inserted Victim Successfully');</script>";
				

			}
			else{
				echo "<script>window.alert(' Victim could not be Inserted');</script>";

			}
		}








	}

?>
<!DOCTYPE html>

<html>
	<head>
		<title>add Victim</title>
	</head>
	<body>
		<center>
			<h1>Welcome <?php echo $_SESSION['orgname'] ?></h1>
			<div>
				<p>
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
				<form action="homepage.php" method="post">
					<table>
						<tr>
							<td>
								Email Id : - 
							</td>
							<td><select name="emailid">
								<?php
									//<input type="name" name="emailid" size="20" required="required" />
									include_once("db.php");
									$sql = "SELECT emailid FROM victim where active = 0 and orgid='".$_SESSION['orgid']."'" ;
									$res = $con->query($sql);
									if($res->num_rows == 0 ){
										echo "<option value = -1>No Items to show</option>";
									} 
									else{
										while($row=mysqli_fetch_array($res)){
											$email = $row['emailid'];
											echo "<option value='".$email."'>".$email."</option>";
         								}
									}
								?>
							</select>
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

					<input type="submit" name="add" value="Add Victim">
					<input type="reset" name="reset" value="Clear">
				</form>
			</div>
			<br/><br/>

<a href="logout.php"><input type="button" value="Log out"></a>
</body>
</html>