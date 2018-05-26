<?php
include 'db.php';
$email = $password = $usertype =  $error = "";
?>

<?php
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
		if($usertype == "student")
			$sql = $conn->query("select * from student where email = '$email'");
		else if($usertype == "company")
			$sql = $conn->query("select * from company where email = '$email'");
		if($sql->num_rows==1)
		{
			$row = $sql->fetch_assoc();
			$pass = $row['password'];
			if($pass == $password)
			{
				session_start();
				$_SESSION['email'] = $email;
				if($usertype == "student")
					header('Location:student.php');
				else if($usertype == "company")
					header('Location:company.php');
			}
			else
			{
				$error = "Invalid Email or Password";
			}
		}
		else
		{
			$error = "Invalid Email or Password";
		}
	}

	?>

<!doctype html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Login</title>
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
	<table cellspacing="25px" cellpadding="5px" align="center">
		<tr>
			<td align="right">
			<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
				Email: <input type="text" name="email" value="<?=$email?>"><br><br>
				Password: <input type="password" name="password" value="<?=$password?>"><br><br>
				<select name="usertype" required="true">
				<option value="student">Student</option>
				<option value="company">Company</option>
				</select><br><br>
				<input type="submit" name="login" value="Login" style="background: #1AA8BA; color: #ffffff">
			</form><br>
			<?php echo $error; ?>
			</td>
		</tr>
	</table>

</body>
</html>