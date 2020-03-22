<?php
	include("info.php");
   	session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
      // username and password sent from form 
      
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	$mypassword2 = mysqli_real_escape_string($db,$_POST['password2']);
	$mycity = mysqli_real_escape_string($db,$_POST['city']);
	$mystreet = mysqli_real_escape_string($db,$_POST['street']);
	$myzip = mysqli_real_escape_string($db,$_POST['zipcode']);
	$mystate = mysqli_real_escape_string($db,$_POST['state']);
	$myphone = mysqli_real_escape_string($db,$_POST['phone']);
	$myfirst = mysqli_real_escape_string($db,$_POST['first']);
	$mylast = mysqli_real_escape_string($db,$_POST['last']);
	$mychef = mysqli_real_escape_string($db,$_POST['chef']);
	
	$require = strlen($mypassword);
      
	if($mypassword == $mypassword2 && $require >= 7 )
	{
		echo "passwords match and length requirement is met";
		
		if($mychef == "on")
		{
			$mychef = 1;
		}
		else
		{
			$mychef = 0;
		}
	        $sql3 = "INSERT INTO UsersTable (Email, Password, PhoneNumber, StreetAddress, City, ZIPCode, State, LoggedIn, IsChef, FirstName, Lastname) Values ('$myemail', PASSWORD('$mypassword'), '$myphone', '$mystreet', '$mycity', '$myzip', '$mystate', '0', '$mychef', '$myfirst', '$mylast')";

      		$result3 = mysqli_query($db,$sql3);	
		header("location: login.php");



	}
	else if($mypassword != $mypassword2)
	{
		echo "passwords don't match";
	}
	else if($require < 7)
	{
		echo "Password must be at least 8 characters long";
	}
	else
	{
		echo "Some awful error has occured";
	}
	


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
	  <li><a href="findFood.php">Find Food</a></li>
	<li><a href="cart.php">Cart</a></li>
	<li><a href="mykitchen.php">My Kitchen</a></li>
	  <li style="float:right"><a href="#"></a></li>
	</ul>


<br>
<div>
	<h2 class="heading"> Create your Account </h2>
</div>




	<form style="text-align:center" action = "" method = "post">
		<label>Email  :</label><br><input type = "text" name = "email"><br><br>
		<label>Password  :</label><br><input type = "password" name = "password"><br><br>
		<label>Repeat Password:</label><br><input type="password" name="password2"><br><br>
		<label>Location (city)</label><br><input type="text" name="city"><br><br>
		<label>Street Address</label><br><input type="text" name="street"><br><br>
		<label>Zipcode</label><br><input type="text" name="zipcode"><br><br>
		<label>State</label><br><input type="text" name="state"><br><br>
		<label>First Name</label><br><input type="text" name="first"><br><br>
		<label>Last Name</label><br><input type="text" name="last"><br><br>
		<label>Phone</label><br><input type="text" name="phone"><br><br>
		<label>I will be a Chef</label><input type="checkbox" name="chef"><br><br>
		<input type = "submit" value = " Create Account "/><br />
	</form>











<!-- MAIN PAGE -->

<br>



<!-- site description -->
<!--
<br>
<div>
	<h2 class="heading"> Create your Account </h2>
</div>

<form style="text-align:center" action="/action_page.php">
-->
<!--  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br><br>
--> 
<!--
  <label for="email">Email</label><br>
  <input type="text" id="email" name="email"><br><br>

  <label for="pwd">Password:</label><br>
  <input type="password" id="pwd" name="pwd"><br><br>
  
  <label for="rePwd">Repeat Password:</label><br>
  <input type="password" id="rePwd" name="rePwd"><br><br>
  
  <label for="city">Location (city)</label><br>
  <input type="text" id="city" name="city"><br><br>
  
  <label for="street">Street Address</label><br>
  <input type="text" id="street" name="street"><br><br>
  
  <label for="phone">Phone</label><br>
  <input type="text" id="phone" name="phone"><br><br>
  
  <label for="phone">Want to be a Chef?</label>
  <input type="checkbox" id="chef" name="chef" value="chef">
  
  <!--<input type="submit" value="Login"><br><br>
  <input type="button" id="loginButton" value="Login">
</form>

<br>
-->
<!-- find food button -->
<!--
<div style="text-align:center">
<button class="normal hover" onclick=""> Create Account </button>
</div>

-->

</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</html>
