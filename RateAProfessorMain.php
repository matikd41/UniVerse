<?php
require_once 'database.php';
ob_end_clean(); // Removes the "You are connected" message

// Initialize variables
$currentSchool = null;
$professors = [];
$schools = [];
$schoolCounts = [];

// Get all distinct schools from database with professor counts
$sql = "SELECT school, COUNT(*) as professor_count FROM professors GROUP BY school ORDER BY school";
$schoolResult = $connection->query($sql);
while ($row = $schoolResult->fetch_assoc()) {
    $schools[] = $row['school'];
    $schoolCounts[$row['school']] = $row['professor_count'];
}

// Check if school is selected
if (isset($_GET['school'])) {
    $currentSchool = mysqli_real_escape_string($connection, $_GET['school']);
    
    // Get professors for selected school
    $sql = "SELECT * FROM professors WHERE school = '$currentSchool'";
    
    if (isset($_GET['professor_query'])) {
        $searchQuery = mysqli_real_escape_string($connection, $_GET['professor_query']);
        $sql .= " AND name LIKE '%$searchQuery%'";
    }
    
    $professorResult = $connection->query($sql);
    while ($row = $professorResult->fetch_assoc()) {
        $professors[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate a Professor</title>
    <style>
        
        .add-professor {
            position: fixed;
            top: 10px;
            right: 10px;
            width: auto;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            border: none;
            cursor: pointer;
}

.add-professor:hover {
  background-color: #0056b3;
}
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
        }
        
        h1 {
            margin: 0;
            font-size: 2.5em;
        }
        
        .search-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .search-box {
            display: flex;
            margin-bottom: 20px;
        }
        
        input[type="text"] {
            flex: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
            font-size: 16px;
        }
        
        button {
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #2980b9;
        }
        
        .results {
            display: none;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .school-result, .professor-result {
            padding: 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .school-result:hover, .professor-result:hover {
            background-color: #f9f9f9;
        }
        
        .school-result h3, .professor-result h3 {
            margin: 0 0 5px 0;
        }
        
        .school-result p, .professor-result p {
            margin: 0;
            color: #666;
        }
        
        .back-button {
            background-color: #95a5a6;
            margin-right: 10px;
        }
        
        .back-button:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Rate a Professor</h1>
        </div>
    </header>
    
    <a href="addaprofessor.php" class="button add-professor">Don't see your school/professor?</a>
    <div class="container">
        <div class="search-container">
            <!-- School search -->
            <div id="school-search" style="<?php echo $currentSchool ? 'display:none' : 'display:block'; ?>">
                <h2>Find Your School</h2>
                <form class="search-box" method="get" id="school-search-form">
                    <input type="text" id="school-input" name="school_query" placeholder="Enter your school name..." 
                           value="<?php echo isset($_GET['school_query']) ? htmlspecialchars($_GET['school_query']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
                <div class="results" id="school-results" style="<?php echo isset($_GET['school_query']) ? 'display:block' : 'display:none'; ?>">
                    <?php if (!empty($schools)): ?>
                        <?php 
                        $searchQuery = isset($_GET['school_query']) ? strtolower($_GET['school_query']) : '';
                        $hasResults = false;
                        
                        foreach ($schools as $school): 
                            if (empty($searchQuery) || strpos(strtolower($school), $searchQuery) !== false):
                                $hasResults = true;
                        ?>
                                <div class="school-result" onclick="selectSchool('<?php echo htmlspecialchars($school); ?>')">
                                    <h3><?php echo htmlspecialchars($school); ?></h3>
                                    <p><?php echo $schoolCounts[$school]; ?> professors rated</p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        
                        <?php if (!$hasResults): ?>
                            <p>No schools found. Try a different search.</p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Professor search -->
            <div id="professor-search" style="<?php echo $currentSchool ? 'display:block' : 'display:none'; ?>">
                <h2>Find a Professor at <span id="selected-school"><?php echo htmlspecialchars($currentSchool); ?></span></h2>
                <form class="search-box" method="get">
                    <input type="hidden" name="school" value="<?php echo htmlspecialchars($currentSchool); ?>">
                    <button type="button" class="back-button" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>'">← Back</button>
                    <input type="text" id="professor-input" name="professor_query" placeholder="Enter professor name..." 
                           value="<?php echo isset($_GET['professor_query']) ? htmlspecialchars($_GET['professor_query']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
                <div class="results" id="professor-results" style="display:block">
                    <?php if (!empty($professors)): ?>
                        <?php foreach ($professors as $professor): ?>
                            <div class="professor-result" onclick="window.location.href='rateaprofessor.php?id=<?= $professor['id'] ?>'">
                                <h3><?php echo htmlspecialchars($professor['professorname']); ?></h3>
                                <p>Department of <?php echo htmlspecialchars($professor['department']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php elseif ($currentSchool): ?>
                        <p>No professors found. Try a different search.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function selectSchool(school) {
            window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?school=" + encodeURIComponent(school);
        }
        
        // Show school results when search is submitted
        document.getElementById('school-search-form').addEventListener('submit', function() {
            document.getElementById('school-results').style.display = 'block';
        });
    </script>
</body>
</html>