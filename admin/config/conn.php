<?php
$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbconn = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";


//select a database to work with
$selected = mysql_select_db("jobs_db",$dbconn)
  or die("Could not select jobs_db");


?>