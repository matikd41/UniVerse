<?php

require_once "database.php";
ob_end_clean();


if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_COOKIE["email"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$school = $_POST["school"];
	$dob = date("Y-m-d", strtotime($_POST["dob"]));
	if(isset($_POST["show_dob"])) {
		$show_dob = 1;
	}
	else {
		$show_dob = 0;
	}
	$grad_year = $_POST["grad_year"];
	if(isset($_POST["show_grad_year"])) {
		$show_grad_year = 1;
	}
	else {
		$show_grad_year = 0;
	}

	$sql = "INSERT INTO profile_meta (email, first_name, last_name, school, dob, dob_show, grad_year, grad_year_show) VALUES ('$email', '$fname', '$lname', '$school', '$dob', '$show_dob', '$grad_year', '$show_grad_year')";
	if($connection->query($sql)) {
		$profile = "SELECT * FROM profile_meta WHERE email = '$email'";
		$sqli = $connection->query($profile);
		$row = $sqli->fetch_assoc();
		$new_id = $row["ID"];
		setcookie("user_id", $new_id, time() + 86400, "/");
		header("Location: profile.php?id=$new_id");
	}
	else echo $connection->error;
	$connection->close();
}

?> 

<!DOCTYPE html> 
<html> 
<head> 
<title>Register</title>
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
input[type=text], 
input[type=email] { 
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
    <h2>Finish setting up your account</h2> 

    <div class="message-box"> 
    <?php echo $_COOKIE["email"]; ?>
    <br>
    <br>
    <form name="data" method="POST" action="">
    <label for="fname" name="fname">First Name</label>
    <input type="text" name="fname" placeholder="First Name" required>

    <label for="lname" name="lname">Last Name</label>
    <input type="text" name="lname" placeholder="Last Name" required>

    <label for="school" name="school">University</label>
    <input type="text" name="school" placeholder="University" required>

    <label for="dob" name="dob" value="<?php echo date('Y-m-d')?>">Date of Birth</label>
    <input type="date" name="dob" required>
<br>
    <label for="show_dob" name="show_dob">Show date of birth of profile?</label>
    <input type="checkbox" name="show_dob">
<br>
<br>
    <label for="grad_year" name="grad_year">Expected year of graduation</label>
    <input type="number" name="grad_year" placeholder="<?php echo date('Y')?>" min="<?php echo date('Y')?>" required>
    <label for="show_grad_year" name="show_grad_year">Show expected year of graduation on profile?</label>
    <input type="checkbox" name="show_grad_year">

    <button type="submit">Submit</button>
</form>
</div>
</body>
</html>
