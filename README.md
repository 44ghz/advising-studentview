# advising-studentview
This is a tool for students to use to sign up for appointment times. This is meant to be a companion for the professor view.

/// Purpose ///

This was created for my course in PHP, in Fall 2018. The main goal of the program was to enable a student to sign up for an appointment that a professor has added as available. This would be done by the companion scripts, found in its respective repository. The student would have the option to register for the appointment, and could also search for their name in case they forgot the time.

/// How to use ///

The program is unable to be used at this time, and the database connection credentials have been censored. However, normally there would be a total of three scripts being used, which would allow the student to see open appointments, schedule one, and search for their appointment. This would be done through the browser, and the resulting information sent via PHP to the MySQL server to be added to the database.

/// How it works ///

This program works by taking information entered from the user in the webpage and sending it to the MySQL server via mysqli_queries in PHP. If there are available appointments, the student may register for one by simply entering their name and clicking a button on the table of those appointments. They can also enter their name below the table and search for their appointment. This simply calls a MySQL query into the database connection and retrieves the matching information, if applicable. 
