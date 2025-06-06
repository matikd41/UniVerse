<?php 

require_once "database.php";
ob_end_clean();

if(!isset($_COOKIE["user_id"])) {//if user is not logged in, redirect to login
	header("Location: Signup.html");
}

$sql = "SELECT * FROM post ORDER BY post_id DESC";
$result = $connection->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>UniVerse - Welcome</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #000000;
      color: #caa437;
      padding: 30px 20px;
      font-size: 32px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .nav {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin: 40px 20px;
    }

    .nav a {
      text-decoration: none;
      background-color: #ffffff;
      color: #000000;
      padding: 15px 25px;
      border-radius: 12px;
      border: 2px solid #caa437;
      font-size: 18px;
      transition: 0.3s ease;
      min-width: 180px;
      text-align: center;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }

    .nav a:hover {
      background-color: #caa437;
      color: #ffffff;
      transform: translateY(-3px);
    }

    .content {
      text-align: center;
      font-size: 22px;
      margin: 40px 20px;
      color: #333;
    }

    .discussion-section {
      max-width: 600px;
      margin: 0 auto 60px;
      padding: 20px;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      max-height: 500px;
      overflow-y: auto;
    }

    .discussion-post {
      font-size: 18px;
      color: #333;
      padding: 15px 20px;
      background: #f9f9f9;
      border-left: 5px solid #caa437;
      border-radius: 8px;
      margin-bottom: 15px;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.6s ease-in-out forwards;
    }

    .author {
      font-size: 14px;
      color: #777;
      margin-top: 10px;
    }
    .author a {
	color: #777;
	text-decoration: none;
    }
    .author a:hover {
	text-decoration: underline;
    }

    .actions {
      margin-top: 10px;
      font-size: 14px;
      color: #555;
      display: flex;
      gap: 20px;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      .nav {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <div class="header">Welcome to UniVerse</div>

  <div class="nav">
    <a href="Signup.html">Login Page</a>
    <a href="general-posts.html">Discussion Posts</a>
    <a href="rateaprofessormain.php">Professor Rating</a>
    <a href="profile.php">Profile Page</a>
    <a href="Internpage.html">Intern Page</a>
  </div>

  <div class="content">
    <p>Connecting students to opportunities, one step at a time.</p>
  </div>

  <!--div class="discussion-section" id="discussionBoard">
    <!-- Fake posts will be injected here -->

  <div class="discussion-section">
	<?php while($row = $result->fetch_assoc()) {//while loop to obtain posts from database ?>
	    <div class="discussion-post">
		<?php echo $row["post"] ?>
		<div class="author">- <a href="profile.php?id=<?php echo$row["user_id"] ?>"><?php echo $row["name"] ?></a></div>
	    </div>
	<?php } ?>
  </div>

  <script>
    const posts = [
      { message: "Is anyone else drowning in midterms? Good luck everyone!", author: "Student A, OU" },
      { message: "Tip: Kresge Library’s 3rd floor is the quietest. Best for focus.", author: "Student B, Psychology" },
      { message: "Golden Grizzlies game tonight at 7PM! Who’s going?", author: "Student C, Athletics Fan" },
      { message: "Just found out tutoring is free on campus. Bless.", author: "Student D, Engineering" },
      { message: "Career fair prep tip: Practice your pitch in front of a mirror.", author: "Student E, Business" },
      { message: "Free coffee in the Oakland Center on Fridays? Yes please ☕", author: "Student F, Chill Club" },
      { message: "Mental Health Week has yoga and therapy dogs — it’s a vibe.", author: "Student G, Wellness Team" },
      { message: "Group study for BIO 1200 this weekend? Let’s form a squad.", author: "Student H, Pre-Med" },
      { message: "Can we talk about how hard parking is after 10AM? 😩", author: "Student I, Relatable Commuter" },
      { message: "Student Org Fair had some awesome clubs! Join something!", author: "Student J, Leadership Club" }
    ];

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function createPost(postData) {
      const postEl = document.createElement('div');
      postEl.className = 'discussion-post';
      const likes = getRandomInt(5, 150);
      const comments = getRandomInt(0, 30);

      postEl.innerHTML = `
        ${postData.message}
        <div class="author">— ${postData.author}</div>
        <div class="actions">
          ❤️ ${likes} Likes
          💬 ${comments} Comments
        </div>
      `;
      return postEl;
    }

    function loadDiscussionBoard() {
      const board = document.getElementById('discussionBoard');

      const randomPost = posts[Math.floor(Math.random() * posts.length)];
      const postElement = createPost(randomPost);

      board.appendChild(postElement);

      // Limit to last 10 posts
      if (board.children.length > 10) {
        board.removeChild(board.children[0]);
      }

      // Auto scroll to bottom
      board.scrollTop = board.scrollHeight;
    }

    // Initial 3 posts
    for (let i = 0; i < 3; i++) loadDiscussionBoard();

    // Add a new one every 4 seconds
    setInterval(loadDiscussionBoard, 4000);
  </script>

</body>
</html>
