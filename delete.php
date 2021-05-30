<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}

	else {
?>

<html>
<head><title>Bye!</title>
<script type="text/javascript">
  function confirmation() {
    alert ("Confirm Deletion of Record?")
  }
</script>
</head>
<body>
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

</body>
</html>

<?php } ?>

<!-- DESTROY SESSION IF ACCOUNT IS DELETED -->
<?php
session_start();
session_destroy();
header("location:login.php");
?>
