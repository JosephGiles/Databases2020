<?php
	include("info.php");
	session_start();
	
	$myusername = $_SESSION['username'];

	$sql6 = "update UsersTable set LoggedIn = 0 Where Email = '$myusername'";
	$result6 = mysqli_query($db,$sql6);




	

?>

<html>
	<body>
		<h1>You are logged out.</h1>
		<form action="login.php">
			<button type="submit">Click me</button>
		</form>
	</body>
</html>
