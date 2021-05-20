<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	
	$DBConnect = mysqli_connect ("localhost", "root", "")
	or die ("Unable to Connect". mysqli_error());
	
	mysqli_select_db($DBConnect, "dbemployee");
	$query = mysqli_query($DBConnect, "SELECT emppass FROM tblemployee");
	
	while($retrieve = mysqli_fetch_array($query))
	{	
		echo $retrieve ["empid"]. "<br \>";
		echo $retrieve ["empname"]. "<br \>";
		echo $retrieve ["empstatus"]. "<br \>";
		echo $retrieve ["empgender"]. "<br \>";
		echo $retrieve ["empuser"]. "<br \>";
		echo $retrieve ["emppass"]. "<br \>";
		
	}
	

?>