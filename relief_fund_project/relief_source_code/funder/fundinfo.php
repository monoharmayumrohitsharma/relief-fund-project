<?php
	include('auth.php');
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
				<!-- <a href="fundinfo.php"><input type="button" name="add" value="View My Funds"></a>  -->
				<a href="profile.php"><input type="button" name="remove" value="View Victims"></a>
				
				<a href="disasterview.php"><input type="button" name="remove" value="View Disaster"></a>
				
				</p>
		</div>
		

	</center>

</body>
</html>