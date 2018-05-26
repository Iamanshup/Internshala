<?php
include 'db.php';
session_start();
$employerEmail = $_SESSION['email'];
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
			
			<a href="company.php"><img src="internshala_logo.png" alt="logo" class="logo" height="50" width="150"></a>
			<nav>
				<ul>
					<li><a href="company.php">Home</a></li>
					<li><a href="postinternship.php">Post Internship</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header><br>

	<table align="center" cellpadding="5px" cellspacing="1px" border="1">
		<tr>
			<td align="center" style="background: #1AA8BA; color: #ffffff">Name</td>
			<td align="center" style="background: #1AA8BA; color: #ffffff">Email</td>
			<td align="center" style="background: #1AA8BA; color: #ffffff">Job Title</td>
			<td align="center" style="background: #1AA8BA; color: #ffffff">Mobile</td>
		</tr>

	<?php
		$sql = $conn->query("select * from applied where employerEmail = '$employerEmail'");
		while($row = $sql->fetch_assoc())
		{
			$studentEmail = $row['studentEmail'];
			$company = $row['company'];
			$jobTitle = $row['jobTitle'];
			$sql1 = $conn->query("select * from student where email = '$studentEmail'");
			$row1 = $sql1->fetch_assoc()
	?>
		<tr>
			<td align="center"><?=$row1['firstName']." ".$row1['lastName']?></td>
			<td align="center"><?=$studentEmail?></td>
			<td align="center"><?=$jobTitle?></td>
			<td align="center"><?=$row1['mobileNo']?></td>
		</tr>
	<?php
		}
	?>
	</table>

</body>
</html>