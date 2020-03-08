<!-- created by HHF Feb 2020 -->
<!-- comment -->
<!DOCTYPE html>
<php>
<head>
  <link rel="stylesheet" href="cookEatInStyle.css">
</head>
<body>
<!-- title -->
<h1 class="title">Cook/Eat In</h1>

<!-- navbar -->
<ul class="navbar">
  <li><a href="main.php">Home</a></li>
  <li><a href="account.php"> Account </a></li>
  <li><a href="chefKitchen.php"> Chef Kitchen </a></li>
  <li><a href="cartOrder.php"> Cart </a></li>
  <li><a class="activePage" href="findFood.php">Find Food</a></li>
  <li style="float:right"><a href="login.php">Login</a></li>
</ul>


<!-- MAIN PAGE -->
<br>
<div>
	<img id="foodItemPic" src="burger1.jpg" alt="Burger">
	<h2 id="foodItemName"> Food Item Title/Name </h2>	
	<p class="foodItemText" id="foodItemDescription"> description </p> <br>	
	<p class="foodItemText" id="foodItemWarning"> warning </p> <br>	
	<p class="foodItemText" id="foodItemStars"> stars </p> <br>	
	<p class="foodItemText" id="foodItemPrice"> price </p> <br>		<br>

</div>
<br>
<br>
<!-- find food button -->
<div>
	<button id="addCart" class="hover" onclick=""> Add to Cart </button>
</div>
<div id="reviewSection">
	<h2 id="foodItemReviewTitle"> Reviews </h2>	
<table class="reviews">
  <tr>
    <th>UserName</th>
    <th>Review</th>
    <th>Star</th>
	<th>Date</th>
  </tr>
  <tr>
    <td>john</td>
    <td>this food sucks</td>
    <td>1/5</td>
	<td>today</td>
  </tr>
  <tr>
    <td>fred</td>
    <td>love this food</td>
	<td>5/5</td>
    <td>feb 13 2020</td>
  </tr>  
</table>
</div>


</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</php>
