function signOut() {
	if(!confirm("Are you sure you want to sign out?")) {
		return false;
	}
	alert("You have successfully signed out");
	window.location.href = "signout.php";
}
