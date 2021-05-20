<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}
	
	else {
?>

<html>
<head><title>Delete Module</title>
<script type="text/javascript">
  function confirmation() {
    alert ("Confirm Modification of Record?")
  }
</script>
</head>
<body>
<h1>Delete Module</h1>
<hr>
<?php
error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  require("connect.php");
  if(isset($_SESSION['getID'])) {
  
  $eid = $_SESSION['getID'];
  
  $query = mysqli_query($DBConnect, "DELETE  FROM tblemployee WHERE empid='$eid'");
  $cell = mysqli_fetch_array($query);
     echo "Record has been deleted";
  }
 ?>

<a href='logout.php'>View All</a>
</body>
</html>

<?php } ?>