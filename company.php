<?php
include 'db.php';
session_start();
$email = $_SESSION['email'];
$sql = $conn->query("select * from company where email = '$email'");
$row = $sql->fetch_assoc();
$employerName = $row['organisation'];
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Company</title>
</head>
<body>
	<header>
		<div class="container">
			
			<img src="internshala_logo.png" alt="logo" class="logo" height="50" width="150">
			<nav>
				<ul>
					<li><a href="postinternship.php">Post Internship</a></li>
					<li><a href="applicants.php">Check Applicants</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header><br>
		
<table align="center">

	<?php
		include'db.php';
		$sql=$conn->query("Select * from job where email = '$email'");
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
	<?php
		}
	?>
		
	</table>
</body>
</html>