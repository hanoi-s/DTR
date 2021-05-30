<?php
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(0);
	ini_set('display_errors', 0);
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}
	
	else {
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> Date of Efficiency </title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<ul>
	<?php
		error_reporting(E_ALL ^ E_NOTICE);
		echo "<li style='padding: 14px 16px; float:left'>Hi ". ucwords($_SESSION["getLogin"])."</li>";
	?>
	<li><a href= "logout.php">Logout </a></li>
	<li><a href= "employeeChat.php">Chat </a></li>
	<li><a href= "edit.php">Edit Profile</a></li>
</ul>
<div><center>
</b>
<table border = "3" bordercolor="black" width="50%" frame=void rules=rows color=black>
		
<?php
	$dayArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	$startDate=$_POST["StartDate"];
	$endDate=$_POST["EndDate"];
	$Days = 0;
	$SelectedSched=array();
	$Rest=array();
	
	echo "<p><b>Date of Effectivity: </b>";
	echo $startDate;
	echo " | ";
	
	echo "<b>Cut Off Date: </b>";
	echo $endDate;
	
	echo "</p>";
	
	for($workdays=0; $workdays<6; $workdays++)
	{
		if (isset($_POST["work$workdays"]))
		{		
			array_push($SelectedSched, $workdays);
			$Days++;	
		
		}
		else
		{
			array_push($Rest, $dayArray[$workdays]);
			
		}
	}

	$restday="";
	for($index=0; $index<count($Rest); $index++)
	{
		$restday.= $Rest[$index] ;
	}	
	
	if($Days<=5 && $endDate>=$startDate)
	{
		echo "<td> Day Present </td>";
		echo "<td> Time in </td>";
		echo "<td> Time out </td>";
		echo "<td> Hours per day </td>";
		
		
		for($rows=1; $rows<=$Days; $rows++)
		{
			echo"<tr>";
			
			$isOvertime="No";
			$isUndertime="No";
			
			$count=$SelectedSched[$rows-1];
			$SelectedDay=$_POST["work$count"];
			echo "<td> $SelectedDay</td>";	
			
			$SelectedIn=$_POST["in$count"];
			echo "<td> $SelectedIn</td>";		
			
			$SelectedOut=$_POST["out$count"];
			echo "<td> $SelectedOut</td>";
			
			$HoursPerDay=$SelectedOut-$SelectedIn-1;
			echo "<td> $HoursPerDay</td>";
			
			$Total += $HoursPerDay;
			
			if($HoursPerDay>8)
			{
				$Overtime += $HoursPerDay - 8;
				$isOvertime="Yes";
			}
			
			else if($HoursPerDay<8&&$HoursPerDay>6)
			{
				$Overtime = 0;
			}
			
			if ($HoursPerDay<6)
			{
				echo $SelectedDay ;
				echo " did not meet the minimum hour.";
				$isUndertime="Yes";
			}
			
			
			echo "</tr>";
		}
		
			echo "<tr>";
			echo "<td colspan=3> Total Rendered Hours:   </td>";
			echo "<td> $Total </td>";
			echo "</tr>";
			
			echo "<tr>";		
			echo "<td colspan=3> Overtime:   </td>";
			echo "<td> $Overtime </td>";
			echo "</tr>";
			
			echo "<tr>";		
			echo "<td colspan=3> Rest Day:   </td>";
			
			
			
			echo "<td> $restday </td>";
			echo "</tr>";
	}
	
	else if($Days>5||$endDate<$startDate)
	{
		echo "Error, Please enter the proper amount of work days";
	}
	
	
?>
</center>
</table>
<br>
<a href='dtr.php' style='text-decoration:none' class="button">Back to DTR page</a>
</div>
</body>
</html>

<?php } ?>
