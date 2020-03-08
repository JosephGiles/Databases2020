<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'phpmyadmin');
   define('DB_PASSWORD', 'Winston');
   define('DB_DATABASE', 'testDatabase');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);	
?>





<!--
<?php
	$servername = "localhost";
	$username = "phpmyadmin";
	$password = "Winston";
	$dbname = "testDatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";
?>


<html>
	<body>
	<h1>PHP connect to MySQL</h1>
	</body>
</html>

<?php
	$sql = "select * from UsersTable";
	$result = $conn->query($sql);

	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "Email: " . $row["Email"]. " Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
		}
	}
	else
	{
		echo "0 results";
	}
	$conn->close();
?>
-->
