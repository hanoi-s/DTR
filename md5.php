<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	$DBConnect = mysqli_connect ("localhost", "root", "")
	or die ("Unable to Connect". mysqli_error());
	
	mysqli_select_db($DBConnect, "dbemployee");
	$query = mysqli_query($DBConnect, "SELECT empuser, emppass, empid FROM tblemployee WHERE empuser = '$user'");
	
	
	
	if ($fetch = mysqli_fetch_array($query))
	{
		$encryptPass = md5($fetch["emppass"]);
		$isCorrect=md5($pass)==$encryptPass;
	}
?>

 
 
 
 
 
 