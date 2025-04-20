<?php
unset($_COOKIE["email"]);
setcookie("email", "", -1, "/");
unset($_COOKIE["user_id"]);
setcookie("user_id", "", -1, "/");

echo "You have been signed out. Redirecting...";
header("Location: Signup.html");
?>
