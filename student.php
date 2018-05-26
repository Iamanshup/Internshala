<?php
include 'db.php';
session_start();
$studentEmail = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Student</title>
</head>
<body>
	<header>
		<div class="container">
			
			<a href="home.php"><img src="internshala_logo.png" alt="logo" class="logo" height="50" width="150"></a>
			<nav>
				<ul>
					<li><a href="home.php">Apply For Internships</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header><br>

	<table align="center">

		<?php
		$sql = $conn->query("select * from applied where studentEmail = '$studentEmail'") or die(mysqli_error($conn));
		while($row = $sql->fetch_assoc())
		{
			$employerEmail = $row['employerEmail'];
			$company = $row['company'];
			$jobTitle = $row['jobTitle'];
			$sql1 = $conn->query("Select * from job where email = '$employerEmail' and employerName = '$company' and jobTitle = '$jobTitle'");
			$row1 = $sql1->fetch_assoc();
				?>
		<tr>
			<td style="color: #1AA8BA" align="left">
				<?php echo $row1['jobTitle']; ?>
			</td>
		</tr>

		<tr>
			<td>
				<?php echo $row1['employerName']; ?>
			</td>
		</tr>

		<tr>
			<td>Location: <?php echo $row1['location']; ?></td>
		</tr>

		<tr>
			<td align="center">Start Date</td> 
			<td align="center">Duration</td> 
			<td align="center">Stipend</td> 
			<td align="center">Posted On</td> 
			<td align="center">Apply By</td>
		</tr>
		<tr>
			<td align="center"><?php echo $row1['startBy']; ?></td> 
			<td align="center"><?php echo $row1['duration']; ?></td> 
			<td align="center" style="padding: 5px"><?php echo $row1['stipend']; ?></td> 
			<td align="center"><?php echo $row1['postedOn']; ?></td> 
			<td align="center"><?php echo $row1['applyBy']; ?></td> 
		</tr>
	<?php
}
?>
		
	</table>
</body>
</html>