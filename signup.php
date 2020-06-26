<?php

$servername = "localhost:3306";
$username = "webuser";
$password = "secretpassword";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$salt = "login";
$password_encrypted = sha1($password.$salt);


$sql = "INSERT INTO `users` (`name`, `email`, `password_encrypted`)
VALUES ('$name', '$email', '$password_encrypted')";

if($conn->query($sql) === TRUE){
	?>
	<script>
		alert('Values have been inserted');
	</script>
	<?php
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}


?>
