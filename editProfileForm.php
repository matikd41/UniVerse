<?php

require_once "database.php";
ob_end_clean();

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$university = $_POST["university"];

if(isset($_POST["showBirthday"])) {
	$showBirthday = 1;
}
else {
	$showBirthday = 0;
}
$gradYear = $_POST["gradYear"];
if(isset($_POST["showGradYear"])) {
	$showGradYear = 1;
}
else {
	$showGradYear = 0;
}
$user_id = $_COOKIE["user_id"];

if ($connection && isset($_COOKIE["user_id"])) {
	$sql = "UPDATE profile_meta SET first_name='$firstName', last_name='$lastName', school='$university', dob_show='$showBirthday', grad_year='$gradYear', grad_year_show='$showGradYear' WHERE id='$user_id'";
	$isql = "UPDATE profile_meta SET first_name='$firstName' WHERE id=$user_id";
	
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
