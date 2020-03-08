<?php
	session_start();
	include("info.php");

?>



<!-- created by HHF Feb 2020 -->
<!-- comment -->
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="cookEatInStyle.css">
</head>
	<body>
	<!-- title -->
	<h1 class="title">Cook/Eat In</h1>

	<!-- navbar -->
	<ul class="navbar">
	  <li><a class="activePage" href="main.php">Home</a></li>
	  <li><a href="#"></a></li>
	  <li><a href="findFood.html">Find Food</a></li>
	  <li><a href="mykitchen.php">My Kitchen</a></li>
	  <?php
	if($_SESSION['loggedin'] == true)
	{	
		
  		echo "<li style="."float:right"."><a href="."logout.php".">Logout</a></li>";

	}	
	else
	{
		echo "<li style="."float:right"."><a href="."login.php".">Login</a></li>";
	}
	?>
	</ul>

<?php 
if($_SESSION['isChef'] == true)
{
 echo "<h1>Your Current Menu</h1>";
}
else
{
 echo "<h1>You are not a chef.</h1>";		
}
?>
	
<?php

	include("info.php");
if($_SESSION['isChef'] == true)
{
	$theID = $_SESSION['userID'];
	$sql = "select * from FoodItemsTable where UserID = '$theID'";
	//$result = $conn->query($sql);
	$result = mysqli_query($db,$sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "Item: " . $row["Name"]. " | Cook Time: " . $row["CookTime"]. " | Calories: " . $row["Calories"]. " | Price: $" . $row["Price"].  "<br>";
		}
	}
	else
	{
		echo "0 results";
	}
}	
?>

	
		
<?php
if($_SESSION['isChef'] == true)
{
	echo "<h1>Add new food item</h1>";
	//include("info.php");
   	//session_start();
}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
      //food info sent from form 
      if($_SESSION['isChef'] == true)
	{


        $mydish = mysqli_real_escape_string($db,$_POST['dish']);
        $myingredients = mysqli_real_escape_string($db,$_POST['ingredients']);
	$myminutes = mysqli_real_escape_string($db,$_POST['minutes']);
	$mycalories = mysqli_real_escape_string($db,$_POST['calories']);
	$myprice = mysqli_real_escape_string($db,$_POST['price']);


		//echo "passwords match";
		
		$theID = $_SESSION['userID'];
	        $sql3 = "INSERT INTO FoodItemsTable (Name, Ingredients, CookTime, Calories, Price, UserID) Values ('$mydish', '$myingredients', '$myminutes', '$mycalories', '$myprice', '$theID')";

      		$result3 = mysqli_query($db,$sql3);	
		//header("location: login.php");
		echo "Dish added";
	
	}
}
?>

<script>
	function hideFunction()
	{
		var x = document.getElementByID("myForm");
		x.style.display = "none";
	}
</script>



<?php
if($_SESSION['isChef'] == true)
{
echo'	<form id="myForm" action =""  method = "post">
		<label>Name of dish: </label><br><input type = "text" name = "dish"><br><br>
		<label>Ingredients: </label><br><input type = "text" name = "ingredients"><br><br>
		<label>Cook Time in minutes: </label><br><input type="text" name="minutes"><br><br>
		<label>Calories: </label><br><input type="text" name="calories"><br><br>
		<label>Price: </label><br><input type="text" name="price"><br><br>

 <input type = "submit" value = " Add New Dish "/><br />
</form>';

}
?>









	</body>
</html>


