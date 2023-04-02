<?php 

$servername = "bijnaojmpbrxdjfmlfxh-mysql.services.clever-cloud.com";
$username = "uzpubmigxvrypm1f";
$password = "7ZB8vkdvYWW9JjQd0gTV";

// Create connection to the database
  $conn = new mysqli($servername, $username, $password,'bijnaojmpbrxdjfmlfxh');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


if (isset($_POST['login'])) {
	// code...
	//login part

//login variables
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$password1 = md5($password);

$query = "SELECT * FROM farmers WHERE email='$email' AND password='$password1'";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) == 1) {
	// code...
			echo "Login Successful";
			//$_SESSION["loggedin]=TRUE;
			echo '<script type="text/javascript">';
			echo 'window.location.href="index.php";';
			echo '</script>';
			
} else {
	// code...
	echo "Login credentials are wrong";
}

}
 ?>