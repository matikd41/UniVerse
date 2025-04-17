<?php

require_once "database.php";
ob_end_clean();

$sql = "SELECT * FROM profile_meta";
$result = $connection->query($sql);
$meta = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset ="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>UniVerse - Profile</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="all">
		<link href="profile.css" rel="stylesheet" type="text/css" media="all">
		<link href="editProfile.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="header">
			<a href="index.html"><img src="" alt="UniVerse"></a>
		</div>
		<div class="banner" style="background:grey">
			<div class="banner2">
				<img class="profilePic" src="images/defaultPfp.jpg" alt="User profile picture">
				<span class="name"><?php echo $meta["first_name"] . " " .  $meta["last_name"]; ?></span>
			</div>
		</div>
		<div class="container">
			<h1>Edit Profile</h1>
			<form action="editProfileForm.php" method="post">
			<div class="item">
				<label for="firstName" name="firstName">First Name:</label>
				<input type="text" id="firstName" name="firstName" value="<?php echo $meta["first_name"]?>">
			</div>
			<div class="item">
				<label for="lastName" name="lastName">Last Name:</label>
				<input type="text" id="lastName" name="lastName"value ="<?php echo $meta["last_name"]?>">
			</div>
			<div class="item">
				<label for="university" name="university">Currently attending:</label>
				<input type="text" id="university" name="university"value ="<?php echo $meta["school"]?>">
			</div>
			<div class="item">
				<label for="birthday" name="birthday">Date of Birth:</label>
				<input type="date" id="birthday" name="birthday">
				<input type="checkbox" id="showBirthday" name="showBirthday"<?php if($meta["dob_show"]) echo "checked";?>>
				<label id="showBirthday" name="showBirthday">Show on profile?</label>
			</div>
			<div class="item">
				<label for="gradYear" name="gradYear">Expected year of graduation:</label>
				<input type="text" id="gradYear" name="gradYear" value ="<?php echo $meta["grad_year"]?>">
				<input type="checkbox" id="showGradYear" name="showGradYear"<?php if($meta["grad_year_show"]) echo "checked";?>>
				<label id="showGradYear" name="showGradYear">Show on profile?</label>
			</div>
			<button type="submit">Submit changes</button>
			</form>
		</div>
	</body>
</html>
