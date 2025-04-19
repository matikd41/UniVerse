<?php

require_once 'database.php';
ob_end_clean(); //removes the "You are conneceted" from the top

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $professorId = (int) $_GET['id']; // Cast to int for safety

    $sqlReviews = "SELECT * FROM professorreviews WHERE professor_id = $professorId"; 
    $professorreviews = $connection->query($sqlReviews);

    $sqlProfessor = "SELECT * FROM professors WHERE id = $professorId"; 
    $professor = $connection->query($sqlProfessor)->fetch_assoc();

   // echo "You are viewing professor with name: " . $professor['professorname']; //Test to see if you're directed correctly
} else {
    echo "Invalid or missing professor ID.";
}
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

    <div class="professor-container">
        <h1><?php echo htmlspecialchars($professor['professorname']); ?></h1>
        <?php echo htmlspecialchars($professor['school']); ?>
        <p>Department of <?php echo htmlspecialchars($professor['department']); ?></p>
        <p>Overall Rating: <strong>N/A</strong></p>
        <p>Total Reviews: <strong>N/A</strong></p>
    </div>

    <div class="button-container">
        <a href="rateprofessor.php?id=<?php echo$professorId;?>" class="button add-rating">Give a Rating</a>
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