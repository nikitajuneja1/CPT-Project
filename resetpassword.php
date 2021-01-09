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
$email = $_POST["email"];
$sql = mysqli_query($conn, "SELECT count(*) as total from userDetails WHERE email = '".$email."'");
$row = mysqli_fetch_array($sql);
if($row["total"] > 0){
    ?>
    <script>
        alert('A mail is sent to the registered email address.');
    </script>
    <?php
}
else{
    ?>
	<script>
		alert('The entered email address is not registered. Please try again.');
	</script>
	<?php
}
?>