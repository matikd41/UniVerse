<?php



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
    <h2>Fill in info</h2> 

    <div class="message-box"> 
    <?php echo $message; ?>
    <form method="POST" action="">
    <label for="fname" name="fname">First Name</label>
    <input type="text" name="fname" placeholder="First Name" required>

    <label for="lname" name="lname">Last Name</label>
    <input type="text" name="lname" placeholder="Last Name" required>

    <label for="school" name="school">University</label>
    <input type="text" name="school" placeholder="University" required>

    <label for="dob" name="dob">Date of Birth</label>
    <input type="date" name="dob" required>

    <label for="show_dob" name="show_dob">Show date of birth of profile?</label>
    <input type="checkbox" name="show_dob" required>

    <label for="grad_year" name="grad_year">Expected year of graduation</label>
    <input type="text" name="grad_year" required>

    <label for="show_grad_year" name="show_grad_year">Show expected year of graduation on profile?</label>
    <input type="checkbox" name="show_grad_year" required>

    <button type="submit">Submit</button>
</form>
</div>
</body>
</html>
