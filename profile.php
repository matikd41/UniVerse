<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "universe_db";

$conn = new mysqli($server, $user, $pass, $database);

$profile_meta = "SELECT * FROM profile_meta";//profile metadata

$post = "SELECT * FROM post";//user posts

$result_profile = $conn->query($profile_meta);
$row_profile = $result_profile->fetch_assoc();
$result_post = $conn->query($post);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset ="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>UniVerse - Profile</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="all">
		<link href="profile.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="header">
			<a href="index.html"><img src="" alt="UniVerse"></a>
		</div>
		<div class="banner" style="background:grey">
			<div class="banner2">
				<img class="profilePic" src="images/defaultPfp.jpg" alt="User profile picture">
				<span class="name"><?php echo $row_profile["first_name"] . " " . $row_profile["last_name"]; ?> </span>
			</div>
		</div>
		<div class="container">
			<div class="content-left">
				<div class="post">
					<label for="newPost">Post something new!</label>
					<br>
					<form action="newPost.php" method="post">
					<input style="width:80%;"type="text" id="newPost" name="newPost">
					<button type="submit">Post</button>
					</form>
				</div>
				<?php while($row_post = $result_post->fetch_assoc()) {//while loop to create divs for each post ?>
				<div class="post">
					<img src="images/defaultPfp.jpg" alt="User profile picture">
					<p class="post-info" style="display:inline;"><?php echo $row_post["name"] ?></p>
					<p class="post-text"><?php echo $row_post["post"] ?></p>
					<p class="post-info" style="text-align:right;"><?php echo "Posted " . $row_post["date"] ?></p>
				</div>
				<?php }//end of while loop ?>
			</div>
			<div class="content-right">
				<div class="post user-info">
					<h3 style="color:green;">● Online</h3>
					<h3><i class="nf nf-fa-graduation_cap"></i> Student</h3>
					<h3><i class="nf nf-fa-school"></i> <?php echo "Attending " . $row_profile["school"] ?></h3>
					<a href="editProfile.php">Edit Profile</a>
				</div>
			</div>
	</body>
</html>
