<?php
   //session_unset();
   //session_destroy();

   include("info.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT UserID FROM UsersTable WHERE Email = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
	{
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         echo "found match";
	$sql2 = "update UsersTable set LoggedIn = 1 Where Email = '$myusername'";
	$result2 = mysqli_query($db,$sql2);

	$sql5 = "select * from UsersTable where Email = '$myusername'"; 	

	$result2 = mysqli_query($db,$sql5);	
	If($row = $result2->fetch_assoc())
	{
	//echo "--". $row["Email"]. " " . $row["UserID"]. " " . $row["IsChef"]. "  ";
	}
	
	
	$myID = $row["UserID"];
	$myChef = $row["IsChef"];

	//if($myChef == false)
	//{
		//echo "FALSE";
	//}
	
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $myusername;
	$_SESSION['userID'] = $myID;
	$_SESSION['isChef'] = $myChef;	
	
	//echo $_SESSION['loggedin'] . "  ";
	//echo $_SESSION['username']. "  ";
	//echo $_SESSION['userID']. "  ";
	//echo $_SESSION['isChef']. "  ";
         header("location: main.php");
      }
	else 
	{
         //$error = "Your Login Name or Password is invalid";
	echo "no match";
      }
   }
?>





<!-- created by HHF Feb 2020 -->
<!-- comment -->
<!DOCTYPE html>
<html>

<h1>--------------------------Joseph's Test login---------------------------------</h1>
<form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
</form>
<li><a href="createAccount.php">Create Account</a></li>
<h1>--------------------------Joseph's Test login---------------------------------</h1>

<head>
  <link rel="stylesheet" href="cookEatInStyle.css">
</head>
<body>
<!-- title -->
<h1 class="title">Cook/Eat In</h1>

<!-- navbar -->
<ul class="navbar">
  <<li><a href="main.php">Home</a></li>
  <li><a href="#"></a></li>
  <li><a href="findFood.html">Find Food</a></li>
  <li style="float:right"><a href="createAccount.php">Create Account</a></li>
</ul>


<!-- MAIN PAGE -->

<br>



<!-- site description -->
<br>
<div>
	<h2 class="heading"> Login </h2>
</div>

<form style="text-align:center" action="" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" class="box"><br>
  <label for="pwd">Password:</label><br>
  <input type="password" id="pwd" name="password" class="box"><br><br>
  <input type = "submit" value = " Submit "/><br />
  <!--<input type="submit" value="Login"><br><br>
  <input type="button" id="loginButton" value="Login"> -->
</form>


<br>
<!-- login button -->
<div style="text-align:center">
	<button class="normal hover" onclick=""> Login </button>
</div>
<div style="text-align:center">
	<a href="createAccount.php">Create Account</a>
</div>



</body>

<script type="text/javascript" src="cookEatInJS.js"></script>

</html>
