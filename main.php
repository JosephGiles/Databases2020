<?php
	session_start();
	include("info.php");
	if($_SESSION['username'])
	{
	echo "Logged in as: " .$_SESSION['username'];
	}
?>

<!--
Hash Passwords
Sanitize all string inputs
Add more checks and triggers (Ex. user must add full credit card number)
logout
-->




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
<!-- slide show (pics) -->
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="breakfast1.jpg" style="width:100%">
    <div class="text">Breakfast</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="lunch1.jpg" style="width:100%">
    <div class="text">Lunch</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="dinner1.jpg" style="width:100%">
    <div class="text">Dinner</div>
  </div>

  <!-- Next and previous buttons 
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  -->
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<!-- site description -->
<br>
<div>
<h2 class="heading"> Site Description/About us </h2>
<p class="normalText"> This paragraph will describe the site: 
This site helps people eat  home made food without cooking it themselves. 
People that sign up to cook home made food can make some good money on the side.</p>
</div>

<!-- hot food / most active food / most purchased food ( with pics ) -->
<br>
<div style="text-align:center">
<h2 class="heading"> Popular Foods </h2>
<ul class="popularFoods">
  <li><img class="popFoodImg" src="burger1.jpg" alt="Burger"></li>
  <li><img class="popFoodImg" src="pancake1.jpg" alt="Pancake"></li>
  <li><img class="popFoodImg" src="sandwich1.jpg" alt="Sandwich"></li>
</ul>
</div>

<br>
<!-- find food button -->
<div style="text-align:center">
<button class="normal hover" onclick="findFood.php"> Find Food </button>
</div>



</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</html>
