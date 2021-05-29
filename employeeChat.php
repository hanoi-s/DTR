<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}

	else {
?>


<html>
<head><title>Chat Client</title>
<link rel="stylesheet" href="style.css"></head>
<body>

<ul>
	<?php
		error_reporting(E_ALL ^ E_NOTICE);
		echo "<li style='padding: 14px 16px; float:left'>Hi ". ucwords($_SESSION["getLogin"])."</li>";
	?>
	<li><a href= "logout.php">Logout </a></li>
	<li><a href= "modify.php">View Account </a></li>
</ul>

<div class = "logincentered">
<h1><center>Chat Option</center></h1>
<form method="POST">
<center>
<table>
<tr><td style='color:white'>Enter Message: <input type="text" name="txtMessage" size="20"></td><td><input type="submit" name="btnSend" value="send" class="button" style='margin-bottom:15px'></td></tr>
</table>

<?php
  $host = "127.0.0.1";
  $port = 50001;
  set_time_limit(0);
  if (isset($_POST["btnSend"])){

	  $msg = $_REQUEST["txtMessage"];
	  $sock = socket_create(AF_INET, SOCK_STREAM, 0);
	  socket_connect($sock, $host, $port);

	  socket_write($sock, $msg, strlen($msg));

	  $reply = socket_read($sock, 1924);
	  $reply = trim($reply);
	  $reply = "Server says:\t". $reply;
  }
?>

  <textarea rows="10" cols="49"><?php echo @$reply; ?></textarea>
</form>

<?php } ?>
</center>
</div>