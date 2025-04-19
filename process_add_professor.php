<?php

require_once 'database.php';
ob_end_clean();

$universityname = $_POST["universityName"];
$professorname = $_POST["professorName"];
$departmentname = $_POST["departmentName"];

if ($connection) {
    $sql = "INSERT INTO professors (professorname, school, department) VALUES (?, ?, ?)";    

    $stmt = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $professorname, $universityname, $departmentname);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: rateaprofessormain.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

?>