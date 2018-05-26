<?php
$conn = mysqli_connect("localhost", "root", "", "soe");

$sql=$conn->query("Select * from student");
while($row=$sql->fetch_assoc())
{
	echo $row['Name']."</br>";
}
?>