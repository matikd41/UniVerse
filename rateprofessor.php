<?php
if(isset($_GET['id'])&& is_numeric($_GET['id'])){
    $professorId=(int)$_GET['id'];
} else{
    echo "Invalid Professor ID";
    exit;
}
?>

<html lang="eng">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add a Professor Rating - UniVerse</title>
    <link rel="stylesheet" href="navigationstyle.css">
    <style>
        body{
            font-family: Arial;
            background: #f4f4f4;
            margin: 100px 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .review-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select, textarea{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button{
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover{
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <a href="index.html"><img src="images/universe_logo.png" alt="UniVerse Logo" height="110"></a>
</div>
<div class="sidebar">
        <ul>
            <li><a href="index.html"><img src="images/home.png" alt="Home Icon" height="20" style="margin-right: 5px;">Home</a></li>
            <li><a href="profile.php"><img src="images/profile.png" alt="Profile Icon" height="25" style="margin-right: 5px;">Profile</a></li>
            <li><a href="Internpage.html"><img src="images/internship.png" alt="Intern Icon" height="20" style="margin-right: 5px;">Internship</a></li>
            <li><a href="rateaprofessormain.php"><img src="images/rating.png" alt="Star Icon" height="19" style="margin-right: 5px;">Professors</a></li>
            <li><a href="general-posts.html"><img src="images/blog.png" alt="Blog Icon" height="20" style="margin-right: 5px;">Discussion</a></li>
        </ul>
    </div>

    <div class="review-container">
        <h1>Add a Rating</h1>
        <form action="process-rating.php" method="post">
        <input type="hidden" name="professor_id" value="<?php echo $professorId; ?>">
            <div class="form-group">

            <div class="form-group">
                <label for="courseName">Course Name:</label>
                <input type="text" id="courseName" name="courseName" required>
            </div>

            <div class="form-group">
                <label for="onlineCourse">This is an online course</label>
                <input type="checkbox" id="onlineCourse" name="onlineCourse" value="true">
            </div>


            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="5  - Excellent"> 5 - Excellent</option>
                    <option value="4 - Very Good"> 4 - Very Good</option>
                    <option value="3 - Good"> 3 - Good</option>
                    <option value="2 - Poor"> 2 - Poor</option>
                    <option value="1 - Awful"> 1 - Awful</option>
                </select>
            </div>

            <div class="form-group">
                <label for="classDifficulty">How difficult was this class?:</label>
                <select id="classDifficulty" name="classDifficulty" required>
                    <option value="1 - Very Easy"> 1 - Very Easy</option>
                    <option value="2 - Easy"> 2 - Easy</option>
                    <option value="3 - Average"> 3 - Average</option>
                    <option value="4 - Difficult"> 4 - Difficult</option>
                    <option value="5 - Extremely Difficult"> 5 - Extremely Difficult</option>
                </select>
            </div>

            <div class="form-group">
                <label for="takeAgain">Would you take this professor again?:</label>
                <select id="takeAgain" name="takeAgain" required>
                    <option value="Yes"> Yes</option>
                    <option value="No"> No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="textbooks">Did this professor require you to buy textbooks?:</label>
                <select id="textbooks" name="textbooks" required>
                    <option value="Yes"> Yes</option>
                    <option value="No"> No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="attendance">Was attendance required?:</label>
                <select id="attendance" name="attendance" required>
                    <option value="Yes"> Yes</option>
                    <option value="No"> No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gradeReceived">Grade Recieved:</label>
                <select id="gradeReceived" name="gradeReceived" required>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D+">D+</option>
                    <option value="D">D</option>
                    <option value="D-">D-</option>
                    <option value="F">F</option>
                    <option value="Audit/No Grade">Audit/No Grade</option>
                    <option value="Dropped/Withdrew">Dropped/Withdrew</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Rather not say">Rather not say</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Write a Review</label>
                <textarea id="comment" name="comment" rows="5" required></textarea>
            </div>

            <button type="submit">Submit Rating</button>
        </form>
</body>
</html>
