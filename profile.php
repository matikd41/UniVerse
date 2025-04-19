<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "universe_db";

$conn = new mysqli($server, $user, $pass, $database);

$user_id = (int) $_GET["id"];

if(!$user_id) {//temporary until user log in/sign in is fixed; defaults to John Doe;
	$user_id = 2;
}
if($user_id == 1) {//temporary; id of 1 will be logged in user's profile
	$user_id = 2;//temporary; will change to logged in user's id
}

$profile_meta = "SELECT * FROM profile_meta WHERE ID = $user_id";//profile metadata

$post = "SELECT * FROM post WHERE user_id = $user_id";//user posts

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
		<link href="profile.css" rel="stylesheet" type="text/css" media="all">
		<link href="navigationstyle.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="top-bar">
			<a href="index.html"><img src="images/universe_logo.png" alt="UniVerse" height="110"></a>
		</div>
		<div class="sidebar">
			<ul>
				<li><a href="index.html"><img src="images/home.png" height="20" style="margin-right:5px;">Home</a></li>
				<li><a href="profile.php"><img src="images/profile.png" height="20" style="margin-right:5px;">Profile</a></li>
				<li><a href="Internpage.html"><img src="images/internship.png" height="20" style="margin-right:5px;">Internship</a></li>
				<li><a href="RateAProfessorMain.php"><img src="images/rating.png" height="20" style="margin-right:5px;">Professors</a></li>
				<li><a href="general-posts.html"><img src="images/blog.png" height="20" style="margin-right:5px;">Discussion</a></li>
			</ul>
		</div>
		<div class="main-content">
			<div class="banner" style="background-image: url('images/defaultBG.jpg')">
				<div class="banner2">
					<img class="profilePic" src="images/defaultPfp.jpg" alt="User profile picture">
					<span class="name"><?php echo $row_profile["first_name"] . " " . $row_profile["last_name"]; ?></span>
				</div>
			</div>
			<div class="container">
			<div class="content-left">
				<div class="post">
					<!--- div for creating new posts --->
					<label for="newPost">Post something new!</label>
					<br>
					<form action="newPost.php" method="post">
					<input style="width:80%;"type="text" id="newPost" name="newPost">
					<input type="hidden" name="id" id="id" value="<?php echo $user_id; ?>" />
					<button type="submit">Post</button>
					</form>
				</div>
				<?php while($row_post = $result_post->fetch_assoc()) {//while loop to create divs for each post ?>
				<div class="post">
					<img src="images/defaultPfp.jpg" alt="User profile picture">
					<p class="post-info" style="display:inline;"><?php echo $row_post["name"] ?></p>
					<form action="deletePost.php" method="post">
					<input type="hidden" name="post-id" id="post-id" value="<?php echo $row_post["post_id"] ?>" />
					<input type="hidden" name="user-id" id="user-id" value="<?php echo $user_id ?>" />
					<button type="submit" class="del">Delete Post</button>
					</form>
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
			</div>
	</body>
</html>
