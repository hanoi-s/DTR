<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}
	
	else {
?>

<?php
	
	error_reporting(E_ALL ^ E_NOTICE);
	
	$DBConnect = mysqli_connect("localhost", "root", "")
	or die("Unable to connect". mysqli_error());	
	
	mysqli_select_db($DBConnect, "dbemployee");
	
	if(isset($_POST["enter"]))
	{
		$eid = $_SESSION['getID'];		
		$sql = "INSERT INTO dtrtable (employeeID, StartingDate, CutOffDate, 
		DaysPresent, TimeIn, TimeOut, HoursPerDay, TotalHours, OverTime, UnderTime, RestDays) 
		VALUES ('$eid', '$startDate', '$endDate', '$SelectedDay', '$SelectedIn',
		'$SelectedOut', '$HoursPerDay', '$Total', '$isOvertime', '$isUndertime', '$restday')";
		mysqli_query($DBConnect, $sql) or die(mysqli_error());
	
	}
	
	else
	{
		echo "Cannot Save";
	}
?>

<?php } ?>