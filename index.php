<!doctype html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Internshala</title>
</head>

<body>
	<header>
		<div class="container">
			
			<img src="internshala_logo.png" alt="Internshala" class="logo" height="50" width="150">

			<nav>
				<ul>
					<li><a href="#">Register</a>
					<div class="submenu">
						<ul>
							<li><a href="student_register.php">New Student - Register</a></li>
							<li><a href="company_register.php">New Company - Hire Interns</a></li>
						</ul>
					</div></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<br>

	<table align="center">

		<?php
		include'db.php';
		$sql=$conn->query("Select * from job");
		while($row = $sql->fetch_assoc())
		{
			?>
		<tr>
			<td style="color: #1AA8BA" align="left">
				<?php echo $row['jobTitle']; ?>
			</td>
		</tr>

		<tr>
			<td>
				<?php echo $row['employerName']; ?>
			</td>
		</tr>

		<tr>
			<td>Location: <?php echo $row['location']; ?></td>
		</tr>

		<tr>
			<td align="center">Start Date</td> 
			<td align="center">Duration</td> 
			<td align="center">Stipend</td> 
			<td align="center">Posted On</td> 
			<td align="center">Apply By</td>
		</tr>
		<tr>
			<td align="center"><?php echo $row['startBy']; ?></td> 
			<td align="center"><?php echo $row['duration']; ?></td> 
			<td align="center" style="padding: 5px"><?php echo $row['stipend']; ?></td> 
			<td align="center"><?php echo $row['postedOn']; ?></td> 
			<td align="center"><?php echo $row['applyBy']; ?></td> 
		</tr>
		<tr>
		<td></td><td></td><td></td><td></td>
		<td>
		<form method="post" action="login.php">
			<input type="submit" name="apply" value="Apply Now" style="background: #1AA8BA; color: #ffffff">
		</form>
		</td>
		</tr>
	<?php
}
?>
		
	</table>

</body>
</html>