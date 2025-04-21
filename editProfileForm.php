<?php

require_once "database.php";
ob_end_clean();

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$university = $_POST["university"];
$showBirthday = isset($_POST["showBirthday"]) ? filter_input(INPUT_POST, "showBirthday", FILTER_VALIDATE_BOOL): false;
$gradYear = $_POST["gradYear"];
$showGradYear = isset($_POST["showGradYear"]) ? filter_input(INPUT_POST, "showGradYear", FILTER_VALIDATE_BOOL): false;

if ($connection) {
	$sql = "UPDATE profile_meta SET first_name='$firstName', last_name='$lastName', school='$university', dob_show='$showBirthday', grad_year='$gradYear', grad_year_show='$showGradYear' WHERE id=0";
	$isql = "UPDATE profile_meta SET first_name='$firstName' WHERE id=0";
	
	if($connection->query($sql) === TRUE)
		header("Location: profile.php");
	else
		echo "Error";

	$connection->close();
}
else {
	echo "Error connecting to database";
}
?>
