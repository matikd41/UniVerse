<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$conn = new mysqli('localhost', 'root', '', 'universe_users'); 

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 

}

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    header("Location: internpage.html"); 
    exit(); 
} else { 
    echo "Invalid login. Try again"; 
}
?>
