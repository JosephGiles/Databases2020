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
  <li><a href="main.php">Home</a></li>
  <li><a href="#"></a></li>
  <li><a class="activePage" href="findFood.php">Find Food</a></li>
  <li><a class="activePage" href="cart.php">Cart</a></li>
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

<h1>Order</h1>
<form action="" method="post">
<label>Food ID: </label>
<input type="text" name="foodID">
<input type="hidden" name="addaction">
<button type="submit">Add to cart </button>
</form>


<?php
if(!$_POST) 
	{
		//echo "SUPER ERROR!";
	}
	else if (isset($_POST['addaction']))
	{
		//echo $_POST['foodID'];
		$findFoodID = $_POST['foodID'];
		$findFoodID = mysqli_real_escape_string($db,$findFoodID);
		$sqlGet = "Select Name, Price, FoodItemID from FoodItemsTable where FoodItemID = '$findFoodID'";
		$result = mysqli_query($db,$sqlGet);

		if($result->num_rows == 1)
		{
			while($row = $result->fetch_assoc())
			{
				//echo "WOOOT";
				//echo $row['Name'];
				$insertPrice = $row['Price'];
				//echo $insertPrice;
				$insertName = $row['Name'];
				//echo $insertName;
				$insertID = $_SESSION['userID'];
				//echo $insertID;
				$insertFoodID = $row['FoodItemID'];
				//echo $insertFoodID;
				$sqlInsert = "insert into OrdersTable (UserID, FoodItemID, Name, Price) values ('$insertID', '$insertFoodID', '$insertName', '$insertPrice') ";

				$result7 = mysqli_query($db,$sqlInsert);
				echo $insertName. " (" . $insertPrice . ") " . "added to cart";
			}
		//$sqlInsert = "insert into OrdersTable "
		}
		else
		{
			echo "Food ID doesn't exist";
		}
		
	}

?>

<h1>Search Dishes</h1>

<!-- MAIN PAGE -->
<!--
<br>
<form id="filterform" style="text-align:center">
  <label for="fsearch">Find food:</label>
  <input type="search" id="fsearch" name="fsearch">
  <p>Show Filter</p> 
	<button onclick="myFunction()">Show/Hide</button>
</form>
-->
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

<!--
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
		$chef = mysqli_real_escape_string($db,$_POST['chef']);
		
		$sql = "select * from FoodItemsTable inner join UsersTable on FoodItemsTable.UserID = UsersTable.UserID where ";
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

		if($chef != null)
		{
			if($bool == false)
			{
				$sql = $sql . "Email = '$chef'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and Email <= '$chef'";
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
				echo "NAME: ".$row["Name"]." | FOOD ID: ".$row['FoodItemID']." | COOK TIME: ".$row["CookTime"]." | CALORIES: " .$row["Calories"]." | PRICE: $" . $row["Price"].  " | Rating: ".$row['AverageRatings']." | NUMBER OF REVIEWS: ".$row['NumberOfReviews']." | CHEF EMAIL: ".$row['Email']."<br>";
			}
		}
		else
		{
			echo "0 results";
		}
		
	}
?>
-->

<?php
	if(!$_POST) 
	{
		//echo "SUPER ERROR!";
	}
	else if (isset($_POST['searchaction']))
	{
		$cuisine = mysqli_real_escape_string($db,$_POST['cuisine']);
		$cookTime = mysqli_real_escape_string($db,$_POST['cookTime']);
		$rating = mysqli_real_escape_string($db,$_POST['starCount']);
		$reviewCount = mysqli_real_escape_string($db,$_POST['reviewCount']);
		//$distance = mysqli_real_escape_string($db,$_POST['distance']);
		$price = mysqli_real_escape_string($db,$_POST['price']);
		$calorie = mysqli_real_escape_string($db,$_POST['calorie']);
		$chef = mysqli_real_escape_string($db,$_POST['chef']);
		
		$sql = "select * from FoodItemsTable inner join UsersTable on FoodItemsTable.ChefID = UsersTable.UserID where ";
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

		if($chef != null)
		{
			if($bool == false)
			{
				$sql = $sql . "Email = '$chef'";
				$bool = true;
			}
			else
			{
				$sql = $sql . " and Email <= '$chef'";
			}
		}



		//echo $sql."<br>";
		//$sql = "select * from FoodItemsTable where CookTime <= '$cookTime'";
		//echo "<br>" .$sql;
		//$result = $conn->query($sql);
		$result = mysqli_query($db,$sql);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "NAME: ".$row["Name"]." | FOOD ID: ".$row['FoodItemID']." | COOK TIME: ".$row["CookTime"]." | CALORIES: " .$row["Calories"]." | PRICE: $" . $row["Price"].  " | Rating: ".$row['AverageRatings']." | NUMBER OF REVIEWS: ".$row['NumberOfReviews']." | CHEF EMAIL: ".$row['Email']."<br>";
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

  <label for="chef">Chef's Email:</label><br>
  <input type="text" id="chef" name="chef"><br><br>
 
	<input type="hidden" name="searchaction">
	<button class="normal hover" type = "submit"> Search </button>
</form>
</div>

<br>

<h1>See Reviews</h1>

<?php
	if (isset($_POST['searchReviewAction']))
	{
		//echo "REVIEW";
		$foodID = $_POST['reviewFoodID'];
		$foodID = mysqli_real_escape_string($db,$foodID);
		//echo $foodID;

		$sqlAverage = "Select Name, FoodItemID, NumberOfReviews, AverageRatings from FoodItemsTable where FoodItemID = '$foodID'";
		$resultAverage = mysqli_query($db,$sqlAverage);
		if($resultAverage->num_rows == 1)
		{
			while($row = $resultAverage->fetch_assoc())
			{
				echo $row['Name'].", FoodID: ". $row['FoodItemID']. "<br>";
				echo "Average Rating: " . $row['AverageRatings'] . "/5". "<br>";
				echo "Number of ratings: " . $row['NumberOfReviews'] . "<br><br>";
			}
		}
		

		$sqlReview = "Select * from ReviewsTable inner join UsersTable on ReviewsTable.PostedByUserID = UsersTable.UserID where FoodItemID = '$foodID'";

		$result = mysqli_query($db,$sqlReview);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo $row['Rating'] . "/5  " . $row['Review'] . " -  " . $row['FirstName']. " " . $row['LastName'] . "<br>";
			}
		}
	}

?>

<form style="text-align:center" action="" method="post">
  <label for="cuisine">Search Review by Food ID:</label><br>
  <input type="text" id="cuisine" name="reviewFoodID"><br><br>

<!--
  <label for="chef">Search Review by Chef's Email:</label><br>
  <input type="text" id="chef" name="reviewChef"><br><br>
-->
	<input type="hidden" name="searchReviewAction">
	<button class="normal hover" type = "submit"> Search </button>
</form>

<br>

<h1>Add a Review</h1>

<?php
	if (isset($_POST['addReviewAction']))
	{
		//echo "REVIEW";
		$foodID = $_POST['foodID'];
		$rating = $_POST['rating'];
		$review = $_POST['review'];
		$id = $_SESSION['userID'];
		
		$foodID = mysqli_real_escape_string($db,$foodID);
		$rating = mysqli_real_escape_string($db,$rating);
		$review = mysqli_real_escape_string($db,$review);
		$id = mysqli_real_escape_string($db,$id);
		
		
		$sqlAdd = "insert into ReviewsTable (FoodItemID, Review, Rating, PostedByUserID) values ('$foodID', '$review', '$rating', '$id')";

		$result = mysqli_query($db,$sqlAdd);
		echo "Review added!"."<br>";

		$sql1= "select * from ReviewsTable where FoodItemID = '$foodID'";
		$result2 = mysqli_query($db,$sql1);
		if($result2->num_rows > 0)
		{
			$count = 0;
			$ratingSum = 0;
			while($row = $result2->fetch_assoc())
			{
				//echo $row['Rating'] ."<br>";
				$ratingSum = $row['Rating'] + $ratingSum;
				$count = $count + 1;
			}

			$averageRating = $ratingSum / $count;
			//echo "average rating: " . $averageRating;
			
			
			$sqlUpdate = "UPDATE FoodItemsTable SET NumberOfReviews = '$count', AverageRatings = '$averageRating' WHERE FoodItemID = '$foodID'";
			$resultUpdate = mysqli_query($db,$sqlUpdate);
						
		}
		
	}

?>




<form style="text-align:center" action="" method="post">
  <label for="cuisine">Food ID:</label><br>
  <input type="text" id="cuisine" name="foodID"><br><br>

  <label for="cuisine">Rating out of 5 (ex. 3):</label><br>
  <input type="text" id="cuisine" name="rating"><br><br>

  <label for="chef">Write Review:</label><br>
  <input type="text" id="chef" name="review"><br><br>

	<input type="hidden" name="addReviewAction">
	<button class="normal hover" type = "submit"> Add Review </button>
</form>






<!-- find food button
<div style="text-align:center">
<button class="normal hover" onclick=""> Find Food </button>
</div>
-->


</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</html>
