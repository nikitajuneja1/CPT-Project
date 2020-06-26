<?php

$servername = "localhost:3306";
$username = "webuser";
$password = "secretpassword";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$password = $_POST["password"];


$sql = mysqli_query($conn, "SELECT count(*) as total from users WHERE email = '".$email."' and
	password = '".$password."'");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>
	<script>
		alert('Login successful');
	</script>

	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}








?>
