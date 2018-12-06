<!DOCTYPE html>
<!-- File name: schedule.php
     Author: George Perez
     Class: CSCI 297 Fall 2018
     Description: This is a script companion for HW10. It will notify the student that their appointment was scheduled and displays the apppointment time. -->

<html>

<head>
  <title>Appointment Scheduled (HW10)</title>
  <link href = "../sheet.css" type = "text/css" rel = "stylesheet"/>
  <style>
  div
  {
    text-align: justify;
    text-justify: inter-word;
    border: 1px solid black;
    height: 160px;
    width: 400px;
    padding: 25px 50px 50px 50px;
    background-color: #95979b;
  }
  </style>

</head>

<body>
  <center>
  <ul class = "navbar">
		<li class = "navelement"><a class = "navlink" href = ../>Home</a></li>
		<li class = "navelement"><a class = "navlink" href = ../csci297.html>CSCI 297</a></li>
	</ul>


  <?php
  // George Perez
  // Connect the database
  $DBconn = new mysqli("deltona.birdnest.org", "USER", "PASS", "DB");

  $FName = trim($_POST['fname']);
  $LName = trim($_POST['lname']);
  $toSchedule = $_POST['schedule'];

  // Putting the appointment in the database
  $schedule = "UPDATE appointments SET Stu_First = '$FName', Stu_Last = '$LName', Available = '0' WHERE id = '$toSchedule'";

  // Getting the appointment time to give back to the student
  $time = "SELECT * FROM appointments WHERE id = '$toSchedule'";
  mysqli_query($DBconn, $schedule);
  mysqli_query($DBconn, $time);

  $result = mysqli_query($DBconn, $time);
  $row = mysqli_fetch_object($result);

  // Fetching all the appointment information to display back to the studnet
  $id = $row->id;
  $day = $row->Day;
  $month = $row->Month;
  $daynum = $row->Day_Num;
  $year = $row->Year;
  $time = $row->Time;

  mysqli_close($DBconn);

  echo "<p>";
  echo "<div>";
  echo "<h3> Appointment has been made</h3>";
  echo "Your appointment has been scheduled for <br><strong>$day, $month $daynum, $year </strong>at<strong> $time</strong>.<br> Feel free to leave this window, or use the button below to view the available appointments.<br><br>
        <form action='studentview.php'>
        <input type='submit' value='View Available Appointments' />
        </form>
        </div>";
  ?>

  <br>
  <hr>
  <center>

  </div>
</body>

</html>
