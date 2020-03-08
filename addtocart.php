<?php

if (!$_POST) 
{
    echo '<center><b>Error: </b>Form has not been submitted</center>';
} 
else if (isset($_POST['action'])) 
{
     echo "ADD " . $_POST['action'];
     echo "ADD " . $_POST['action2'];

}
else if (isset($_POST['other'])) 
{

    echo "other " . $_POST['other'];
} 
else 
{
    echo '<center><b>Error:</b> Unknown Error</center>';
}





?>


<form action="addtocart.php" method="post">
<input type="text" name="action">
<input type="text" name="action2" >
<input type="submit" >
</form>

<form action="addtocart.php" method="post">
<input type="text" name="other">
<input type="submit">
</form>
