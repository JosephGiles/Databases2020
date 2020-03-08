<?php
	session_start();
	include("info.php");
	if($_SESSION['username'])
	{
	echo "Logged in as: " .$_SESSION['username'];
	}
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
  <li><a href="cookEatInMain.html">Home</a></li>
  <li><a href="#"></a></li>
  <li><a class="activePage" href="findFood.php">Find Food</a></li>
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


<!-- MAIN PAGE -->

<br>
<form id="filterform" style="text-align:center">
  <label for="fsearch">Find food:</label>
  <input type="search" id="fsearch" name="fsearch">
  <p>Show Filter</p> 
	<button onclick="myFunction()">Show/Hide</button>
</form>

<script>
function myFunction() {
  var x = document.getElementById("filterform");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>


<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$cuisine = mysqli_real_escape_string($db,$_POST['cuisine']);
		$cookTime = mysqli_real_escape_string($db,$_POST['cookTime']);
		$rating = mysqli_real_escape_string($db,$_POST['starCount']);
		$reviewCount = mysqli_real_escape_string($db,$_POST['reviewCount']);
		//$distance = mysqli_real_escape_string($db,$_POST['distance']);
		$price = mysqli_real_escape_string($db,$_POST['price']);
		$calorie = mysqli_real_escape_string($db,$_POST['calorie']);
		
		$sql = "select * from FoodItemsTable where ";
		$bool = false;

		if($cuisine != null)
		{
			$sql = $sql . "Name = '$cuisine'";
			$bool = true;
			//echo "ACCIDENT";
		}
		
		if($cookTime != null)
		{
			if($bool == false)
			{
				$sql = $sql . "CookTime <= '$cookTime'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and CookTime <= '$cookTime'";
			}
		}

		if($rating != null)
		{
			if($bool == false)
			{
				$sql = $sql . "AverageRatings >= '$rating'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and AverageRatings >= '$rating'";
			}
		}

		if($reviewCount != null)
		{
			if($bool == false)
			{
				$sql = $sql . "NumberOfReviews >= '$reviewCount'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and NumberOfReviews >= '$reviewCount'";
			}
		}

		if($price != null)
		{
			if($bool == false)
			{
				$sql = $sql . "Price <= '$price'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and Price >= '$price'";
			}
		}

		if($calorie != null)
		{
			if($bool == false)
			{
				$sql = $sql . "Calories <= '$calorie'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and Calories <= '$calorie'";
			}
		}



		echo $sql."<br>";
		//$sql = "select * from FoodItemsTable where CookTime <= '$cookTime'";
		//echo "<br>" .$sql;
		//$result = $conn->query($sql);
		$result = mysqli_query($db,$sql);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "NAME: ".$row["Name"]." | COOK TIME: ".$row["CookTime"]." | CALORIES: " .$row["Calories"]." | PRICE: $" . $row["Price"].  " | Rating: ".$row['AverageRatings']." | NUMBER OF REVIEWS: ".$row['NumberOfReviews']." CHEF EMAIL: ".$row['UserID']."<br>";
			}
		}
		else
		{
			echo "0 results";
		}
		
	}
?>





<!-- site description -->
<br>
<div>
<form style="text-align:center" action="" method="post">
  <label for="cuisine">Type/Cuisine:</label><br>
  <input type="text" id="cuisine" name="cuisine"><br><br>
 
  <label for="cookTime">Maximum cook time:</label><br>
  <input type="text" id="cookTime" name="cookTime"><br><br>
  
  <label for="starCount">Minimum Rating:</label><br>
  <input type="text" id="starCount" name="starCount"><br><br>
  
  <label for="reviewCount">Minimum review count:</label><br>
  <input type="text" id="reviewCount" name="reviewCount"><br><br>
  
  <label for="distance">Max distance:</label><br>
  <input type="text" id="distance" name="distance"><br><br>
  
  <label for="price">Max price:</label><br>
  <input type="text" id="price" name="price"><br><br>
  
  <label for="calorie">Max calorie count:</label><br>
  <input type="text" id="calorie" name="calorie"><br><br>
 
	<button class="normal hover" type = "submit"> Search </button>
</form>
</div>



<br>
<!-- find food button -->
<div style="text-align:center">
<button class="normal hover" onclick=""> Find Food </button>
</div>



</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</html>
