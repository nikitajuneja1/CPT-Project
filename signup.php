<?php
session_start();
$servername = "localhost";
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

$sql = "INSERT INTO userDetails (name, email, password)
VALUES ('$name', '$email', '$password_encrypted')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>