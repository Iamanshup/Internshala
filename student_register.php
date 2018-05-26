<?php
include 'db.php';
$email = $password = $fname = $lname = $mobile = $error = "";
?>

<?php
	if(isset($_POST['signup']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mobile = $_POST['mobile'];
		$sql = $conn->query("insert into student values('$email', '$password', '$fname', '$lname', '$mobile')");
		if($sql)
		{
			header('Location:login.php');
		}
		else
		{
			$error = "Email Already Exists";
		}
	}
?>

<!doctype html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Register</title>
</head>

<body>
	<header>
		<div class="container">
			
			<a href="index.php"><img src="internshala_logo.png" alt="logo" class="logo" height="50" width="150"></a>

			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<br>

	<form align="center" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
		Email: <input type="email" name="email" value="<?=$email?>"><br><br>
		Password: <input type="password" name="password" value="<?=$password?>"><br><br>
		First Name: <input type="text" name="fname" value="<?=$fname?>"><br><br>
		Last Name: <input type="text" name="lname" value="<?=$lname?>"><br><br>
		Mobile: <input type="number" name="mobile" value="<?=$mobile?>"><br><br>
		<input type="submit" name="signup" value="Sign Up" style="background: #1AA8BA; color: #ffffff">
	</form><br>
	<?=$error?>

</body>
</html>