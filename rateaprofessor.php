<?php

require_once 'database.php';

$sql = "SELECT * FROM professorreviews"; 
$professorreviews = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate a Professor - UniVerse</title>
    <link rel="stylesheet" href="rateaprofessorstyle.css">
</head>
<body>
    <a href="addaprofessor.html" class="button add-professor">Add a Professor</a>

    <div class="professor-container">
        <h1>John Doe</h1>
        <p>School Name</p>
        <p>Department Name</p>
        <p>Overall Rating: <strong>N/A</strong></p>
        <p>Total Reviews: <strong>N/A</strong></p>
    </div>

    <div class="button-container">
        <a href="rateprofessor.html" class="button add-rating">Give a Rating</a>
    </div>

    <?php
    while ($column = mysqli_fetch_assoc($professorreviews)) {
        ?>
        <div class="reviews">
            <div class="review-container">
                <div class="review">
                    <p><strong>Course Name:</strong> <?php echo htmlspecialchars($column['Course_Number']); ?></p>
                    <p><strong>Online Class:</strong> <?php echo $column['Online_Class'] ? 'Yes' : 'No'; ?></p>
                    <p><strong>Rating:</strong> <?php echo htmlspecialchars($column['Rating']); ?></p>
                    <p><strong>Difficulty:</strong> <?php echo htmlspecialchars($column['Difficulty']); ?></p>
                    <p><strong>Would Take Again:</strong> <?php echo htmlspecialchars($column['Would_Take_Again']); ?></p>
                    <p><strong>Textbooks Required:</strong> <?php echo htmlspecialchars($column['Textbooks_Required']); ?></p>
                    <p><strong>Attendance Required:</strong> <?php echo htmlspecialchars($column['Attendance_Required']); ?></p>
                    <p><strong>Grade Received:</strong> <?php echo htmlspecialchars($column['Grade_Received']); ?></p>
                    <p><strong>Review:</strong> <?php echo htmlspecialchars($column['Review']); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</body>
</html>