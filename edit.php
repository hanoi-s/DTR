<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}

	else {
?>

<html>
<head><title>Edit Module</title>
	<link rel="stylesheet" href="style.css">
<ul>
  <li style='float:left'><a href= "login.php">Back</a></li>
</ul>
<script type="text/javascript">
  function confirmation() {
    alert ("Confirm Modification of Record?")
  }

	function confirmDelete(){
		if (confirm("Confirm Deletion of Record?")) {
			alert("Account successfully deleted!");
			self.location = "delete.php";
		} else {
			self.location = "edit.php";
		}
	}
</script>
</head>
<body>
<div class = "logincentered">
<br><br><br><br><br><br>
<center><h1>Edit Your Profile</h1></center>
<?php
	require("connect.php");
	echo "<form action='update.php' method='post'>";
	if(isset($_SESSION['getID'])) {

	$eid = $_SESSION['getID'];

	$query = mysqli_query($DBConnect, "SELECT * FROM tblemployee WHERE empid='$eid'");
	$cell = mysqli_fetch_array($query);
    $id=$cell["empid"];
    $name=$cell["empname"];
    $status=$cell["empstatus"];
    $gender=$cell["empgender"];
	$user=$cell["empuser"];
    $pass=$cell["emppass"];
		echo "<input type='hidden' name='id' value='". $id . "'size='30'>";
		echo "Employee Name : <input type='text' name='name' value='" .$name."' size='30'><br/>";
		echo "Employee Status : <input type='text' name='status' value='".$status."' size='30'><br/>";
		echo "Employee Gender : <input type='text' name='gender' value='".$gender."' size='30'><br/>";
		echo "Employee Username : <input type='text' name='user' value='".$user."' size='30'><br/>";
		echo "Employee Password : <input type='text' name='pass' value='".$pass."' size='30'><br/>";
	   echo "<br /><center><input type='button' onclick='confirmDelete()' name='delete' value='Delete account' class='button'/>&nbsp&nbsp<input type='submit' onclick='confirmation()' name='edit' value='Save' class='button'/><center>";
   echo "</form></p>";
  }
 ?>
</div>
</body>
</html>

<?php } ?>
