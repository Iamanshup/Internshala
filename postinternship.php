<?php
include 'db.php';
session_start();
$location = $title = $stipend = $startby = $duration = $applyby = $postedon = $description = "";
$email = $_SESSION['email'];
$sql = $conn->query("select * from company where email = '$email'");
$row = $sql->fetch_assoc();
$employerName = $row['organisation'];
$error = "";
if(isset($_POST['submit']))
{
	$location = $_POST['location'];
	$title = $_POST['title'];
	$stipend = $_POST['stipend'];
	$startby = $_POST['startby'];
	$duration = $_POST['duration'];
	$applyby = $_POST['applyby'];
	$postedon = date("Y-m-d");
	$description = $_POST['description'];
	$sql = $conn->query("insert into job(email, employerName, location, jobTitle, stipend, startBy, duration, description, postedOn, applyBy) values('$email', '$employerName', '$location', '$title', '$stipend', '$startby', '$duration', '$description', '$postedon',  '$applyby')") or die(mysqli_error($conn));
	if($sql)
		header('Location:company.php');
	else
		$error = "Could not post. Please try again.";
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Post Internship</title>
</head>
<body>
	<header>
		<div class="container">
			
			<a href="company.php"><img src="internshala_logo.png" alt="logo" class="logo" height="50" width="150"></a>
			<nav>
				<ul>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header><br>

	<body>
			<form method="post" action="postinternship.php" align="center">
				Job Title: <input type="text" name="title" value="<?=$title?>"><br><br>
				Location: <input type="text" name="location"" value="<?=$location?>"><br><br>
				Stipend: <input type="text" name="stipend"" value="<?=$stipend?>"><br><br>
				Start By: <input type="date" name="startby"" value="<?=$startby?>"><br><br>
				Duration: <input type="text" name="duration"" value="<?=$duration?>"><br><br>
				Apply By: <input type="date" name="applyby"" value="<?=$applyby?>"><br><br>
				<textarea rows="5" cols="30" name="description" placeholder="Description of the job..."" value="<?=$description?>"></textarea><br><br>
				<input type="submit" name="submit" value="Post Internship" style="background: #1AA8BA; color: #ffffff">
			</form><br>
			<?=$error?>
	</body>
	</html>
