<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$conn = new mysqli('localhost', 'root', '', 'universe_db'); 

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 

}

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
	setcookie("email", $email, time() + 86400, "/");//creates email cookie set to user's email
	$sql = "SELECT * FROM profile_meta WHERE email='$email'";
	$result = $conn->query($sql);
	$user_id = $result->fetch_assoc();
	if(!isset($user_id["ID"])) {//if user has not completed registration, redirect to register
		header("Location: register.php");
		exit();
	}
    setcookie("user_id", $user_id["ID"], time() + 86400, "/");//creates user id cookie set to user's id
    header("Location: profile.php"); 
    exit(); 
} else { 
    echo "Invalid login. Try again"; 
}
?>
