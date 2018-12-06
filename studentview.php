<!DOCTYPE html>
<!-- File name: studentview.php
     Author: George Perez
     Class: CSCI 297 Fall 2018
     Description: This script will allow students to schedule appointment times, and search for their time with the name they provided. -->

<head>
  <title>Schedule Appointment (HW10)</title>
  <link href = "../sheet.css" type = "text/css" rel = "stylesheet"/>
</head>

<body>
  <ul class = "navbar">
		<li class = "navelement"><a class = "navlink" href = ../>Home</a></li>
		<li class = "navelement"><a class = "navlink" href = ../csci297.html>CSCI 297</a></li>
	</ul>

<h3 align="center">
      Student View<br>
</h3>
  <center>
  <table rules=all border=5 cellpadding = "5">
  <tr>
  <td bgcolor = darkgrey colspan = 4 align = center><font color = black>Available Appointments
  <tr>
  <td bgcolor = lightgrey>id      </td>
  <td bgcolor = lightgrey>Day     </td>
  <td bgcolor = lightgrey>Time    </td>
  <td bgcolor = lightgrey>Register  </td>

  <?php
    // George Perez
    // Connect the database
    $DBconn = new mysqli("deltona.birdnest.org", "USER", "PASS", "DB");

    echo "<form method = 'post' action = 'schedule.php'>";
    echo "Enter your first and last name, then select an appointment below by clicking the corresponding register button.<br><br>";

    echo "First Name:<br>";
    echo "<input type=text name='fname' required>";
    echo "<br>Last Name:<br>";
    echo "<input type=text name='lname' required>";
    echo "<br> <br>";

    // Submit and process the query for existing warehouses
    $query = "SELECT * FROM appointments WHERE Available = '1'";
    $query .= "ORDER BY Long_Date ASC;";
    $result = mysqli_query($DBconn, $query);

    $currentTime = time();
    while($row = mysqli_fetch_object($result))
    { // Getting all available appointments
      echo("
        <tr>
        <td> $row->id
        <td> $row->Day $row->Month $row->Day_Num $row->Year
        <td> $row->Time
        <td> <input type = 'submit' action = 'schedule.php' name = schedule value = '$row->id'>
          ");
    }

    echo "</form>";
  ?>
  </table>

  <hr>

  <form method = "post" action = "search.php">
    <pre>
    Search:
First Name: <input type=text name="FNameSearch" required>
Last  Name: <input type=text name="LNameSearch" required>
     <input type = submit value = "Search" name = "search">
   </pre>
</body>
