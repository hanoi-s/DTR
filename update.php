<link rel="stylesheet" href="style.css">
<div class = "logincentered"  style='border: 2px solid white; padding: 30px;border-radius: 15px;'>
<h1>Record Modification Confirmation</h1>

<?php
	error_reporting(E_ALL ^ E_NOTICE);
  require("connect.php");
  
  if(isset($_POST["edit"])){
  $newID = $_POST["id"];
  $newName = $_POST["name"];
  $newStat = $_POST["status"];
  $newGender = $_POST["gender"];
  $newUser = $_POST["user"];
  $newPass = $_POST["pass"];
 
  mysqli_query($DBConnect, "UPDATE tblemployee SET empname='$newName', empstatus='$newStat', 
            empgender='$newGender', empuser='$newUser', emppass='$newPass' WHERE empid='$newID'") or die (mysqli_error());
  
  echo "<h3 style='color:white'>Record has been saved. Please check the modification below.</h3>";
  
  $query = mysqli_query($DBConnect, "SELECT * FROM tblemployee WHERE empid='$newID'");
  $fetch = mysqli_fetch_array($query);
  echo "<p style='color:white'>Employee Name : ". $fetch["empname"]. "<br />";
  echo "Employee Status : ". $fetch["empstatus"]. "<br />";
  echo "Employee Gender : ". $fetch["empgender"]. "<br />";
  echo "Employee Username : ". $fetch["empuser"]. "<br />";
  echo "Employee Password : ". $fetch["emppass"]. "<br /></p>";
  
 }

?>
<br />
<center><a style='text-decoration:none' href="dtr.php" class="button">Back</a>  </center>
</div>