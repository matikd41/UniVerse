<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "universe_users";

$conn = new mysqli($servername, $username, $password, $dbname); 

$message = ""; 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 

}

if 
($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = $_POST["email"]; 
    $password = $_POST["password"];


$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')"; 
if ($conn->query($sql) === TRUE) { 
    $message =  "Signup succesful!"; 

} else { 
    $message = "Error: " . $conn->error; 


}
} 

$conn->close();
?> 

<!DOCTYPE html> 
<html> 
<head> 
<title>Signup</title>
<style> 
body { 
    font-family: Arial, sans-serif; 
    background-color: #f2f2f2; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
}
.container { 
    bakground-color: white; 
    padding: 40px; 
    border-radius: 10px; 
    box-shadow: 0 0 10px rgba(0,0,0,1); 
    width: 350px; 
    text-align: center; 
    h2 { 
        margin-bottom: 20px; 
    }

}
input[type=email], 
input[type=password] { 
    width: 100%; 
    padding: 10px; 
    margin: 10px 0 20px; 
    border: 1px solid #ccc; 
    border-radius: 5px;
    box-sizing: border-box; 
}
button { 
    width: 100%; 
    padding: 12px; 
    background-color: black; 
    color: gold; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
}
button:hover { 
    background-color: #333; 
}
.message-box { 
    margin-bottom: 20px; 
    text-align: center; 
    color: green; 
    font-weight: bold; 
}
</style> 
</head> 
<body>
    <div class="container">  
    <h2>Create an Account</h2> 

    <div class="message-box"> 
    <?php echo $message; ?>
    <form method="POST" action=""> 
    <input type="email" name="email" placeholder="Email" required> 
    <input type="password" name="password" placeholder="Password" required> 
     <button type="submit">Sign Up</button>
</form>
</div>
</body>
</html>