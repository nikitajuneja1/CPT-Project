<?php

$servername = "localhost";
$username = "webuser";
$password = "secretpassword";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$password = $_POST["password"];
$salt = "login";
$password_encrypted = sha1($password.$salt);

$sql = mysqli_query($conn, "SELECT count(*) as total from userDetails WHERE email = '".$email."' and
	password = '".$password_encrypted."'");
// echo $password_encrypted;

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
	</head>
	<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $email; ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="https://foodbooker.s3.amazonaws.com/s3website/voice.html" class="btn btn-success">FoodBooker</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
	</body>
	</html>

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
