<?php
if (isset($_POST["loginBtn"]))
 {
 $user=$_POST["username"];
 $pass=$_POST["pass"];
 
 $isCorrect=false;
 include 'md5.php';
 
if($isCorrect) 
    {
      session_start();  //to start the session
      $_SESSION['getLogin'] = $user;  //this will hold the session variable to identify the user of the system
	  $userid =$fetch["empid"];
	  $_SESSION['getID'] = $userid; 
	  header("location:dtr.php");  //this sets the headers for the HTTP response given by the server 
    }
   else
    {
      header("location:login.php?error=1");
    }
}
?>
