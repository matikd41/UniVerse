<html lang="eng">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add a Professor - UniVerse</title>
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
    <div class="review-container">
        <h1>Add a Professor</h1>
        <form action="process_add_professor.php" method="post">
            <div class="form-group">
                <label for="universityName"> Name of School:</label>
                <input type="text" id="universityName" name="universityName" required>
            <div>
                
            <div class="form-group">
                <label for="professorName">Professor's Name:</label>
                <input type="text" id="professorName" name="professorName" required>
            <div>

            <div class="form-group">
                <label for="departmentName">Deparment's Name:</label>
                <input type="text" id="departmentName" name="departmentName" required>
            <div>

            <button type="submit">Submit Rating</button>
        </form>
</body>
</html>
