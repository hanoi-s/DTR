<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}
	
	else {
?>

<h3> Please select a function </h3>

<a href="edit.php"> 1. Edit user data </a> <br>
<a href="delete.php"> 2. Delete user data </a> <br>


	<?php }?>