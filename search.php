<!DOCTYPE html>
<!-- File name: search.php
     Author: George Perez
     Class: CSCI 297 Fall 2018
     Description: This is a script companion for HW10. It will try to search for an appointment time for a given student.
                  If no appointment exists for the student, it will outout so. -->

<html>

<head>
  <title>Appointment Information (HW10)</title>
  <link href = "../sheet.css" type = "text/css" rel = "stylesheet"/>
  <style>
  div
  {
    text-align: justify;
    text-justify: inter-word;
    border: 1px solid black;
    height: 190px;
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

  // Getting the relevant information
  $First = trim($_POST['FNameSearch']);
  $Last = trim($_POST['LNameSearch']);
  $toSearch = $_POST['search'];

  echo "<p>";
  echo "<div>";

  // Select the appointment that matches the input
  $schedule = "SELECT * FROM appointments WHERE Available = '0' AND Stu_First = '$First' AND Stu_Last = '$Last';";
  $result = mysqli_query($DBconn, $schedule);

  if($result -> num_rows == 0) // If no appointment was found (if the number of rows is 0 or the empty set)
  {
    echo "<h3> No apppointment found</h3>";
    echo "There are no appointments for $First $Last. Please use the button below to return to the scheduling window.<br><br>";
    echo "<form action='studentview.php'>
    <input type='submit' value='View Available Appointments' />
    </form>";
    exit;
  }

  $row = mysqli_fetch_object($result); // Otherwise, create the table and display the information

  echo "<center><h3> Appointment information for $First:</h3></center>";
  echo "
        <table rules = all border = 5 cellpadding = '5' align = 'center'>
        <tr>
        <td bgcolor = lightgrey>id      </td>
        <td bgcolor = lightgrey>Day     </td>
        <td bgcolor = lightgrey>Time    </td>";

  echo("
        <tr>
        <td> $row->id
        <td> $row->Day $row->Month $row->Day_Num $row->Year
        <td> $row->Time
        ");
  echo "</table><br>";
  echo "Feel free to leave this window, or use the button below to view the available appointments.<br><br>
        <form action='studentview.php'>
        <input type='submit' value='View Available Appointments' />
        </form>";
  echo "</div>";

  mysqli_close($DBconn);
  ?>

  <br>
  <hr>
  <center>

  </div>
</body>

</html>
