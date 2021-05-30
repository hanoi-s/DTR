<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}

	else {
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Employee DTR</title>
</head>

<ul>
	<?php
		error_reporting(E_ALL ^ E_NOTICE);
		echo "<li style='padding: 14px 16px; float:left'>Hi ". ucwords($_SESSION["getLogin"])."</li>";
	?>
	<li><a href= "logout.php">Logout </a></li>
	<li><a href= "employeeChat.php">Chat </a></li>
	<li><a href= "edit.php">Edit Profile</a></li>
</ul>


<center>
<div style='color:white'><br><br>
<h2>Work Schedule </h2>
<h3>[ Online Daily Time Record ]</h3>
<form action="dtrprocess.php" method="post">
Date of Effectivity: &nbsp;

<input type="date" id="StartDate" name="StartDate">

&nbsp; Cut Off Date: &nbsp;

<input type="date" id="EndDate" name="EndDate">



	  <br /><br />
	  <?php
	     $dayArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		 echo "<table width='40%'>";
		 echo "<tr style='color:white'><th>/</th><th>Day</th><th>Time In</th><th>Time Out</th><tr>";
		 for($day=0; $day<=5; $day++) {
		   echo "<tr style='color:white'><td><input type='checkbox' id = 'work$day' name='work$day' value='$dayArray[$day]' onclick='Validation()'></td><td align = 'center'>".$dayArray[$day]. "</td>".
		        "<td align='center'><select id = 'in$day' name='in$day' onclick='Validation()' required disabled><option></option>";
				      for($timein=0; $timein<=24; $timein++) {
					     echo "<option value=$timein>$timein</option>";
					  }
           echo "</select></td>";
		   echo "<td align='center'><select id = 'out$day' name='out$day' onclick='Validation()' required disabled><option></option>";
		              for($timeout=0; $timeout<=24; $timeout++){
					    echo "<option value=$timeout>$timeout</option>";
					  }
           echo "</select></td></tr>";
         }
		 echo "</table>";
	  ?>
	<br />
	<input type="submit" name="enter" id="enter" value="Save" class="button" style="opacity: 0.3" disabled>
	<input formaction = 'dtrview.php' type="submit" name="click" value = "View" class="button">
	<input type="reset" class="button">
	<p id="error"></p>
	<p id="error2"></p>
	<p id="error3"></p>
	<p id="error4"></p>
	<p id="error5"></p>
	<p id="error6"></p>
	<p id="error7"></p>
  </form>
  </center>

  <script>
	<?php
	for($day=0; $day<=5; $day++) {
		echo  "document.getElementById('work$day').onchange = function() {";
		echo  "document.getElementById('in$day').disabled = !this.checked;";
		echo  "document.getElementById('out$day').disabled = !this.checked;";
		echo  "};";
	}
	?>

	function Validation(){
		var checkBox0 = document.getElementById("work0");
		var checkBox1 = document.getElementById("work1");
		var checkBox2 = document.getElementById("work2");
		var checkBox3 = document.getElementById("work3");
		var checkBox4 = document.getElementById("work4");
		var checkBox5 = document.getElementById("work5");

		var in0 = document.getElementById("in0").value;
		var in1 = document.getElementById("in1").value;
		var in2 = document.getElementById("in2").value;
		var in3 = document.getElementById("in3").value;
		var in4 = document.getElementById("in4").value;
		var in5 = document.getElementById("in5").value;

		var out0 = document.getElementById("out0").value;
		var out1 = document.getElementById("out1").value;
		var out2 = document.getElementById("out2").value;
		var out3 = document.getElementById("out3").value;
		var out4 = document.getElementById("out4").value;
		var out5 = document.getElementById("out5").value;
		//if((out0-in0)-1 >=6)
		var i;
		var count = 0;
		var count2 =0;
//(out0-in0)-1 >=6
		if(checkBox0.checked == true){
			count++;
			if ((out0-in0)-1 >=6){
				count2++;
				document.getElementById("error2").innerHTML = "";
			}
			else document.getElementById("error2").innerHTML = "Monday: A minimum of 6 hours a day is required (excluding breaks).";
		}
		else document.getElementById("error2").innerHTML = "";
		if(checkBox1.checked == true){
			count++;
			if ((out1-in1)-1 >=6){
				count2++;
				document.getElementById("error3").innerHTML = "";
			}
			else document.getElementById("error3").innerHTML = "Tuesday: A minimum of 6 hours a day is required (excluding breaks).";
		}
		else document.getElementById("error3").innerHTML = "";
		if(checkBox2.checked == true){
			count++;
			if ((out2-in2)-1 >=6){
				count2++;
				document.getElementById("error4").innerHTML = "";
			}
			else document.getElementById("error4").innerHTML = "Wednesday: A minimum of 6 hours a day is required (excluding breaks).";
		}
		else document.getElementById("error4").innerHTML = "";
		if(checkBox3.checked == true){
			count++;
			if ((out3-in3)-1 >=6){
				count2++;
				document.getElementById("error5").innerHTML = "";
			}
			else document.getElementById("error5").innerHTML = "Thursday: A minimum of 6 hours a day is required (excluding breaks).";
		}
		else document.getElementById("error5").innerHTML = "";
		if(checkBox4.checked == true){
			count++;
			if ((out4-in4)-1 >=6){
				count2++;
				document.getElementById("error6").innerHTML = "";
			}
			else document.getElementById("error6").innerHTML = "Friday: A minimum of 6 hours a day is required (excluding breaks).";
		}
		else document.getElementById("error6").innerHTML = "";
		if(checkBox5.checked == true){
			count++;
			if ((out5-in5)-1 >=6){
				count2++;
				document.getElementById("error7").innerHTML = "";
			}
			else document.getElementById("error7").innerHTML = "Saturday: A minimum of 6 hours a day is required (excluding breaks).";
		}
		else document.getElementById("error7").innerHTML = "";
		
		if(count != 5){
			document.getElementById("error").innerHTML = "5 days should be selected";
		}
		else{
			document.getElementById("error").innerHTML = "";
		}

		if (count > 4 && count <6 && count2 > 4 && count2 <6){
			document.getElementById("enter").disabled = false;
			document.getElementById("enter").style.opacity = 1;
		}
		else{
			document.getElementById("enter").disabled = true;
			document.getElementById("enter").style.opacity = 0.3;
			//document.getElementById("error").innerHTML = "There seems to be an error in yout inputs. Please double check.<br> 5 days should be selected and a minimum of 6 hours of work a day (excluding break hours).";
			//document.getElementById("error").innerHTML = "A minimum of 6 hours a day is required (excluding breaks)."
		}
	}
</script>
</div>
</body>
</html>

<?php } ?>
