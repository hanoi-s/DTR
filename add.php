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
  Enter ID: <input type='text' name="eid" size='14' autofocus/> <br />
	Enter Name: <input type="text" name= "ename" size="50" /> <br />
	Enter Status: <input type="radio" name= "estatus" value="Probation" />Probation
                <input type="radio" name= "estatus" value="Regular" />Regular<br />
	Enter Gender: <input type="radio" name="egender" value="M">Male
                <input type="radio" name="egender" value="F">Female<br>
	Enter Username: <input type="text" name= "euser" size="8" /> <br />
	Enter Password: <input type="password" name= "epass" size="50" /> <br />
	</p>

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
