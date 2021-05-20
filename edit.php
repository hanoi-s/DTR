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
<script type="text/javascript">
  function confirmation() {
    alert ("Confirm Modification of Record?")
  }
</script>
</head>
<body>
<h1>Update Module</h1>
<br>
<?php
	session_start();
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
 
    echo "<br /><input type='submit' onclick='confirmation()' name='edit' value='Save' />";
   echo "</form>";
  }
 ?>

<a href='dtr.php'>View All</a>
</body>
</html>

<?php } ?>