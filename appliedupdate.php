<?php
include 'db.php';
session_start();
$studentEmail = $_SESSION['email'];
//$employerEmail = $_SESSION['employerEmail'];
//$company = $_SESSION['company'];
$no=$_POST['no'];
$sql=$conn->query("select * from job where no='$no'");
$row = $sql->fetch_assoc();
			$employerEmail = $row['email'];
			$company = $row['employerName'];
			$jobTitle = $row['jobTitle'];
			
//$jobTitle = $_SESSION['jobTitle'];
$sql = $conn->query("insert into applied(studentEmail, employerEmail, company, jobTitle) values('$studentEmail', '$employerEmail', '$company', '$jobTitle')") or die(mysqli_error($conn));
session_unset();
$_SESSION['email'] = $studentEmail;
header('Location:student.php');
?>