<?php

require_once 'database.php';
ob_end_clean();

$courseName = $_POST["courseName"];

$onlineCourse = isset($_POST["onlineCourse"]) ? filter_input(INPUT_POST, "onlineCourse", FILTER_VALIDATE_BOOL) : false;
$rating = $_POST["rating"];
$classDifficulty = $_POST["classDifficulty"];
$takeAgain = $_POST["takeAgain"];
$textbooks = $_POST["textbooks"];
$attendance = $_POST["attendance"];
$gradeReceived = $_POST["gradeReceived"];
$comment = $_POST["comment"];

if ($connection) {
    $sql = "INSERT INTO professorreviews (Course_Number, Online_Class, Rating, Difficulty, Would_Take_Again, Textbooks_Required, Attendance_Required, Grade_Received, Review) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($stmt, "sisssssss", $courseName, $onlineCourse, $rating, $classDifficulty, $takeAgain, $textbooks, $attendance, $gradeReceived, $comment);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: rateaprofessor.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} else {
    echo "Database connection failed.";
}

?>