<?php
if (isset($_POST["loginBtn"])) {
 $user=$_POST["username"];
 $pass=$_POST["pass"];

 // $isCorrect=false;
 // include 'md5.php';
 //
 //  if($isCorrect) {
 //    session_start();  //to start the session
 //    $_SESSION['getLogin'] = $user;  //this will hold the session variable to identify the user of the system
 //    $userid =$fetch["empid"];
 //    $_SESSION['getID'] = $userid;
 //    header("location:dtr.php");  //this sets the headers for the HTTP response given by the server
 //  } else {
 //    header("location:login.php?error=1");
 //  }

//if username and password fields are empty
 if($user == "" || $pass == "") {
   // display error for empty fields
   header("location:login.php?error=2");
 } else {
   // DB stuff
   $DBConnect = mysqli_connect("localhost", "root", "")
   or die ("Unable to Connect". mysqli_error());
   mysqli_select_db($DBConnect, "dbemployee");

   // 1st query; check if entered username exists in db
   $query = mysqli_query($DBConnect, "SELECT empuser FROM tblemployee WHERE empuser = '$user'");

   // count number of usernames in db
   $numrows = mysqli_num_rows($query);

   // if count is > 0
   if($numrows > 0){

     // 2nd query; username exists so we get data
     $query2 = mysqli_query($DBConnect, "SELECT * FROM tblemployee WHERE empuser = '$user'");
     while ($retrieve = mysqli_fetch_array($query2)){
       // check if entered username is same as username in db (i dont know how to make this efficient)
       if($retrieve["empuser"] != $user){
         // display error for invalid username/password
         header("location:login.php?error=1");
       } else {
         // if entered username is valid, check hashed password
         // if($retrieve["emppw"] == md5($pass)){ // (1) UNCOMMENT THIS LINE TO ENABLE MD5 HASH
         if($retrieve["emppass"] == $pass){ // (2) UNCOMMENT THIS LINE TO ENABLE MD5 HASH
           // start session
           session_start();
           // get user for session
           $_SESSION['getLogin'] = $user;
           // redirect to dtr
           header("location:dtr.php");
         } else {
           // if username is valid but wrong password, display error for invalid username/password
           header("location:login.php?error=1");
         }
       }
     }
   } else {
     // display error if entered username does not exist
     header("location:login.php?error=3");
   }
 }
 } else {
 // display error if fields are empty
 header("location:login.php?error=2");

}
?>
