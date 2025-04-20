<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "universe_db";

$conn = new mysqli($server, $user, $pass, $database);
$curr_user_id = $_COOKIE["user_id"];


if(isset($_GET["id"])) {//direct to the profile page of user_id from GET, regardless of whether you are signed in
	$curr_user_id = $_GET["id"];
}
elseif(!isset($_COOKIE["user_id"])) {//if not signed in, redirect to log in
	header("Location: Signup.html");
}
$is_curr_user = isset($_COOKIE["user_id"]) && $curr_user_id == $_COOKIE["user_id"];//bool to see if this is user's page

$profile_meta = "SELECT * FROM profile_meta WHERE ID = $curr_user_id";//profile metadata

$post = "SELECT * FROM post WHERE user_id = $curr_user_id ORDER BY post_id DESC";//user posts

$result_profile = $conn->query($profile_meta);
$row_profile = $result_profile->fetch_assoc();
$result_post = $conn->query($post);


?>

<!DOCTYPE html>
<html style="font-family: Arial, sans-serif">
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
					<form name="nPost" action="newPost.php" onsubmit="return validatePost()" method="post">
					<input style="width:80%;"type="text" id="newPost" name="newPost">
					<input type="hidden" name="id" id="id" value="<?php echo $curr_user_id; ?>" />
					<button type="submit">Post</button>
					</form>
				</div>
				<?php while($row_post = $result_post->fetch_assoc()) {//while loop to create divs for each post ?>
				<div class="post">
					<img src="images/defaultPfp.jpg" alt="User profile picture">
					<p class="post-info" style="display:inline;"><?php echo $row_post["name"] ?></p>
					<form action="deletePost.php" onsubmit="return confirmDelete()" method="post">
					<input type="hidden" name="post-id" id="post-id" value="<?php echo $row_post["post_id"] ?>" />
					<input type="hidden" name="user-id" id="user-id" value="<?php echo $curr_user_id ?>" />
					<?php if($is_curr_user) {//only show delete if logged in user is the user in profile
					echo '<button type="submit" class="del">Delete Post</button>';
					} ?>
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
					<?php if($is_curr_user) {//only allow edit if logged in user is the user in profile
					echo '<a href="editProfile.php">Edit Profile</a>';
					} ?>
				</div>
			</div>
			</div>
	</body>
<script>
function validatePost() {
	var x = document.forms["nPost"]["newPost"].value;
	if(x == "" || x == null) {
		alert("Post must contain text.");
		return false;
	}
}
function confirmDelete() {
	var x = "Are you sure you want to delete this post?";
	if(!confirm(x)) return false;
}
</script>
</html>
