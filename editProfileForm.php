<?php

require_once "database.php";
ob_end_clean();

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$university = $_POST["university"];
$birthday = $_POST["birthday"];
$showBirthday = isset($_POST["showBirthday"]) ? filter_input(INPUT_POST, "showBirthday", FILTER_VALIDATE_BOOL): false;
$gradYear = $_POST["gradYear"];
$showGradYear = isset($_POST["showGradYear"]) ? filter_input(INPUT_POST, "showGradYear", FILTER_VALIDATE_BOOL): false;

if ($connection) {
	$sql = "INSERT INTO profile_meta (first_name, last_name, school, dob, dob_show, grad_year, grad_year_show) VALUES (?, ?, ?, ?, ?, ?, ?)";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param("sssssisi", $firstName, $lastName, $university, $birthday, $showBirthday, $gradYear, $showGradYear);

	if($stmt->execute()) {
		header("Location: profile.php");
		exit();
	}
	else {
		echo "Error inserting data: " . $connection->error;
	}

	$stmt->close();
	$connection->close();
}
else {
	echo "Error connecting to database";
}
?>
