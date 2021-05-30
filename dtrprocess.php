<?php
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(0);
	ini_set('display_errors', 0);
	if(!isset($_SESSION["getLogin"]))	{
		header("location:login.php");
	}	else {
?>

<!DOCTYPE html>
<html>
<head><meta charset = "UTF-8"><title> Date of Efficiency </title>
	<link rel="stylesheet" href="style.css">
	<style>
		body{
			background: #554ca8;
		}
	</style>
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
<br><br>
<center>
<div style='border: 2px solid white; padding: 30px;border-radius: 15px; width:50%'>
</b>
<table border = "3" bordercolor="white" width="90%" frame=void rules=rows color=black >

<?php
	$dayArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	$startDate=$_POST["StartDate"];
	$endDate=$_POST["EndDate"];
	$Days = 0;
	$SelectedSched=array();
	$Rest=array();

	echo "<div style='color:white'><p><b>Date of Effectivity: </b>";
	echo $startDate;
	echo " | ";

	echo "<b>Cut Off Date: </b>";
	echo $endDate;

	echo "</p>";

	for($workdays=0; $workdays<6; $workdays++)	{
		if (isset($_POST["work$workdays"]))		{
			array_push($SelectedSched, $workdays);
			$Days++;
		}	else {
			array_push($Rest, $dayArray[$workdays]);
		}
	}

	$restday="";

	for($index=0; $index<count($Rest); $index++)	{
		$restday.= $Rest[$index] ;
	}

	if($Days<=5 && $endDate>=$startDate) {
		echo "<td style='color:white; text-align: center''> Day Present </td>";
		echo "<td style='color:white; text-align: center''> Time in </td>";
		echo "<td style='color:white; text-align: center''> Time out </td>";
		echo "<td style='color:white; text-align: center''> Hours per day </td>";


		for($rows=1; $rows<=$Days; $rows++)	{
			echo"<tr style='color:white; text-align: center'>";

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

			if($HoursPerDay>8) {
				$Overtime += $HoursPerDay - 8;
				$isOvertime="Yes";
			}	else if($HoursPerDay<8&&$HoursPerDay>6)	{
				$Overtime = 0;
			}

			if ($HoursPerDay<6)	{
				echo $SelectedDay ;
				echo " did not meet the minimum hour.";
				$isUndertime="Yes";
			}
			echo "</tr>";
			include 'dtrdata.php';
		}

			echo "<tr style='color:white; background:rgba(255, 255, 255, 0.15)'>";
			echo "<td colspan=3> Total Rendered Hours:   </td>";
			echo "<td style='text-align: center'> $Total </td>";
			echo "</tr>";

			echo "<tr style='color:white; background:rgba(255, 255, 255, 0.15)'>";
			echo "<td colspan=3> Overtime:   </td>";
			echo "<td style='text-align: center'> $Overtime </td>";
			echo "</tr>";

			echo "<tr style='color:white; background:rgba(255, 255, 255, 0.15)'>";
			echo "<td colspan=3> Rest Day:   </td>";

			echo "<td style='text-align: center'> $restday </td>";
			echo "</tr>";

	}

	else if($Days>5||$endDate<$startDate)	{
		echo "Error, Please enter the proper amount of work days";
	}

	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo"</div>";
?>

</table>
<br><br>
<a href='dtr.php' style='text-decoration:none' class="button">back</a>

</div></center>
</body>
</html>

<?php } ?>
