<head><title>Register</title>
<link rel="stylesheet" href="style.css"></head>
<ul>
  <li style='float:left'><a href= "login.php">Back</a></li>
  <li><a href= "client.php">CHAT</a></li>
  <li><a href= "login.php">LOGIN</a></li>
</ul>
<div class = "logincentered">

<form action ="add.php" method = "post">
	<br><br><h1><center>Register</center></h1>
	<p style="color:white">
    Enter ID: <input type="text" name= "eid" size="20" autofocus/> <br />
  	Enter Name: <input type="text" name= "ename" size="30" /> <br />
  	Enter Status: <input type="text" name= "estatus" size="20" /> <br />
  	Enter Gender: <input type="text" name= "egender" size="1" /> <br />
  	Enter Username: <input type="text" name= "euser" size="20" /> <br />
  	Enter Password: <input type="text" name= "epass" size="20" /> <br />

	<center><input type ="submit" name ="Save" class="button" value="Register"/><center> <br />
</form>

<?php
	error_reporting(E_ALL ^ E_NOTICE);

	$DBConnect = mysqli_connect("localhost", "root", "")
	or die("Unable to connect". mysqli_error());

	mysqli_select_db($DBConnect, "dbemployee");

	if(isset($_POST["Save"]))
	{
		$eid=$_POST["eid"];
		$ename=$_POST["ename"];
		$estatus=$_POST["estatus"];
		$egender=$_POST["egender"];
		$euser=$_POST["euser"];
		$epass=$_POST["epass"];

		$sql = "INSERT INTO tblemployee (empid, empname, empstatus, empgender, empuser, emppass)
		VALUES ('$eid', '$ename', '$estatus', '$egender', '$euser', '$epass')";
		mysqli_query($DBConnect, $sql) or die(mysqli_error());
		echo "Records have been saved";
	}

	else
	{
		echo "<center>Cannot Save</center>";
	}

?>
</div>
