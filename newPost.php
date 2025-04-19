<?php

require_once "database.php";
ob_end_clean();

$post = $_POST["newPost"];

if($connection) {
	$profile_meta = "SELECT * FROM profile_meta";
	$result = $connection->query($profile_meta);
	$row = $result->fetch_assoc();
	$name = $row["first_name"] . " " . $row["last_name"];
	$post_id = uniqid();

	$sql = "INSERT INTO post (post_id, user_id, name, post, date) VALUES (?, ?, ?, ?, current_timestamp())";

	$stmt = $connection->prepare($sql);
	$stmt->bind_param("iiss", $post_id, $row["ID"], $name, $post);

	if($stmt->execute())
		header("Location: profile.php");
	else
		echo "Failure";

	$connection->close();
}
else
	echo "Failed to connect to database";

?>
