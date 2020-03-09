<?php
	include("info.php");
   	session_start();
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
  <li><a href="findFood.php">Find Food</a></li>
  <li><a href="cart.php">Cart</a></li>
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


<!-- MAIN PAGE -->

<br>



<!-- site description -->
<h1> Your Cart </h1>

<?php
	$total = 0;
	$taxRate = 0.1;
	$id = $_SESSION['userID'];
	$sql9 = "select * from OrdersTable where UserID = '$id' ";
	$result = mysqli_query($db,$sql9);
	if($result->num_rows > 0)
	{
		echo "Cart Item - Food ID -- Name -------- Price" . "<br>";
		echo "<br>";
		while($row = $result->fetch_assoc())
		{
			echo $row['OrderID']. " ----------------- ".  $row['FoodItemID']. " ------ ". $row['Name']." ------ ".$row['Price']. "<br>";
			$total = $total + $row['Price'];
		}
		$tax = ($total * $taxRate);
		$tax = round($tax, 2);
		echo "<br>";
		echo "<br>";
		echo "Taxes: $" . $tax . "<br>";	
		echo "Total: $" . ($total + $tax). "<br>";
	}

?>

<h4>Remove items or place order</h4>


<form action="" method="post">
<label>Cart Item Number: </label><br>
<input type="text" name="itemNumber"><br>
<input type="hidden" name="removeAction"><br>
<button type="submit">Remove Item </button>
</form>

<?php
	if(!$_POST) 
	{
		echo "SUPER ERROR!";
	}
	else if (isset($_POST['removeAction']))
	{
		$deleteItem = $_POST['itemNumber'];
		$deleteUserID = $_SESSION['userID'];
		//echo $deleteItem;
		$sqlRemove = "delete from OrdersTable where OrderID = '$deleteItem' and UserID = '$deleteUserID' ";
		$result11 = mysqli_query($db,$sqlRemove);
		echo "Item removed from cart.";
	}
	else if (isset($_POST['paymentAction']))
	{
		$card = $_POST['cardNumber'];
		$month = $_POST['expMonth'];
		$year = $_POST['expYear'];
		$code = $_POST['secCode'];
		$id = $_SESSION['userID'];
		
		$insertSQL = "insert into PaymentMethodTable (CardNumber, ExpirationMonth, ExpirationYear, SecurityCode, UserID) values ('$card', '$month', '$year', '$code', '$id')";
		$result12 = mysqli_query($db,$insertSQL);
		echo "Payment submitted";

		$id = $_SESSION['userID'];
		$sql9 = "delete from OrdersTable where UserID = '$id' ";
		$result = mysqli_query($db,$sql9);
				
	}

?>


<h4>Payment options</h4>
<form action="" method="post">
<label>Card Number </label><br>
<input type="text" name="cardNumber"><br>
<label>Expiration Month (ex. 03) </label><br>
<input type="text" name="expMonth"><br>
<label>Expiration Year (ex. 26) </label><br>
<input type="text" name="expYear"><br>
<label>Security Code (on back of card) </label><br>
<input type="text" name="secCode"><br>


<input type="hidden" name="paymentAction"><br>
<button type="submit">Submit Order </button>
</form>


</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</html>
