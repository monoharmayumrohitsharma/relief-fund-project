<?php

include("auth.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once('../db.php');
		$orgid=$con->escape_string($_POST['uorgid']);
		
		 



		$sql = "Select * from organisation where orgid = '".$orgid."' AND stateid = ".$_SESSION['stateid'] ;
		$result = $con->query($sql);
		if($result->num_rows==1){
			$row = mysqli_fetch_array($result);
			if($row['orgid'] == $orgid){
				if($row['stateid']==$_SESSION['stateid']){
					$sql = "DELETE FROM organisation 
							WHERE orgid = '".$orgid."' AND stateid=".$_SESSION['stateid'] ;
					$result=$con->query($sql);
					if($result==1){echo "<center>Deleted Successfully</center>";}

				}
				else{
					echo "<center> The Organisation is not <b>part of this state  </b> <center>" ;
				}
			}
			else{
				echo "<center> Wrong <b> organisation id </b> <center>" ;
			}
			
		}
		else{
			echo "<center> No Organisation Exists  </center>";
		}
		
		

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Remove State</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
	<h1>Welcome <?php echo $_SESSION['state'] ?></h1>
	<h3>You can remove Organisations</h3>
	<div><p><a href="add.php"><input type="button" name="add" value="add Organisation"></a> <a href="remove.php"><input type="button" name="remove" value="remove Organisation"></a></p></div>

	<div><p>These are the organisation under you</p></div>
		<div>
		<table class="table table-condensed">
			<tr>
				<th>Organisation Name</th>
				<th>Organisation Userid</th>
				<!-- <th>Organisation Head</th>
				<th>Organisation Head Phone</th> -->

				<th>Organisation Email</th>
				<th>Organisation phone</th>
				<th>Organisation Address</th>
				<th>Organisation Pincode</th>
				<th>Organisation City</th>
				<th>Organisation District</th>
			</tr>
			<?php
				include_once("../db.php");
				$sql = "SELECT * FROM organisation WHERE stateid=".$_SESSION['stateid'];
				$result = $con->query($sql);
				if($result){
					if($result->num_rows>0){
						while($row=mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['orgname']."</td>";
							echo "<td>".$row['orgid']."</td>";
							echo "<td>".$row['orgemail']."</td>";
							echo "<td>".$row['orgphone']."</td>";
							echo "<td>".$row['orgadd']."</td>";
							echo "<td>".$row['orgpincode']."</td>";
							echo "<td>".$row['city']."</td>";
							echo "<td>".$row['district']."</td>";
							
							echo "</tr>";
						}

					}
				}

			?>
		</table>
		</div>
					
					
			<div>
				<fieldset>
					<legend><b>Remove Organisation Info</b></legend>
					<form action="remove.php" method="post">
						
							
					<table>
						<tr>
							<td>
								Organistaion Id : - 
							</td>
							<td>
								<input type="name" name="uorgid" size="20" required="required" />
							</td>
						</tr>
						

						

					</table>
					<br/>
					<input type="submit" name="add" value="Remove Organisation" class="btn btn-danger">
					<input type="reset" name="reset" value="Clear">
					<a href="logout.php"><input type="button" name="back" value="logout"></a>

					
					
				</form>
				</fieldset>
			</div>

</center></body>
</html>