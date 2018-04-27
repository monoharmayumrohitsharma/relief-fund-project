<?php
	include('auth.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
	include('../db.php');
	$sql = "SELECT * FROM disaster_funds WHERE id=".$_POST['disaster'];
	$res = $con->query($sql);
	if($res->num_rows == 0 ){
		echo "<script>window.alert('Wrong Victim');</script>";
	}
	else{
		//echo "<script>window.alert('".$_SESSION['name']."') </script>";
		while($row1 = mysqli_fetch_array($res)){
			$_SESSION['disasterid'] = $row1['id'];
			$_SESSION['dname'] = $row1['dname'];
			$_SESSION['accntnum'] = $row1['accntnum'];
			$_SESSION['description'] = $row1['description'];
			$_SESSION['reqfund'] = $row1['reqfund'];
			$_SESSION['orgid']= $row1['orgid'];
 			header('location: payfundDisaster.php');
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
		<h1>Welcom Funder <?php echo $_SESSION['name'];?></h1>
		<div>
				<p>
				<!-- <a href="fundinfo.php"><input type="button" name="add" value="View My Funds"></a> --> 
				<a href="profile.php"><input type="button" name="remove" value="View Victims"></a>
				
				<a href="disasterview.php"><input type="button" name="remove" value="View Disaster"></a>
				
				</p>
		</div>
		<div>
			<form action="disasterview.php" method="post">
				<table>
					<tr>
						<td>Select</td>
						<td>Disaster Name</td>
						<td>Account Number</td>
						<td>Description</td>
						<td>Required Fund</td>
						
					</tr>
					
						<?php
							include_once("../db.php");
							$sql = "SELECT * FROM disaster_funds vf WHERE active = 1 ";
							$res = $con->query($sql);
							if($res->num_rows > 0){
								while($row=mysqli_fetch_array($res)){
									echo "<tr>";

									echo "<td> <input type ='radio' name='disaster' value =".$row['id']." Required='Required' /> </td> ";
									echo "<td>".$row['dname']."</td>";
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