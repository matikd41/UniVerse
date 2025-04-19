<?php

require_once "database.php";
ob_end_clean();

$post = $_POST["newPost"];
$id = $_POST["id"];

if($connection) {
	$profile_meta = "SELECT * FROM profile_meta WHERE ID = $id";
	$result = $connection->query($profile_meta);
	$row = $result->fetch_assoc();
	$name = $row["first_name"] . " " . $row["last_name"];

	$sql = "INSERT INTO post (user_id, name, post, date) VALUES (?, ?, ?, current_timestamp())";

	$stmt = $connection->prepare($sql);
	$stmt->bind_param("iss", $id, $name, $post);

	if($stmt->execute())
		header("Location: profile.php?id=$id");
	else
		echo "Failure";

	$connection->close();
}
else
	echo "Failed to connect to database";

?>
