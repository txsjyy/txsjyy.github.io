<?php
   error_reporting(E_ALL);
   ini_set("display_errors", "on");
   
   $server = $_GET["server"];
   $user   = $_GET["user"];
   $pwd    = $_GET["pwd"];
   $dbName = $_GET["dbName"];

   // decode the urlencoded password
   $pwd    = urldecode($pwd);

   // print just to confirm they got passed correctly
   echo "Server: <code>".$server."</code><br>";
   echo "User: <code>".$user."</code><br>";
   echo "Database name: <code>".$dbName."</code><br><br>";
   
   // Connect to MySQL Server

   $mysqli = new mysqli($server, $user, $pwd, $dbName);

   if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
      echo "<code>...Connection successful</code> <br>";
   }
  
   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);
   
   // Retrieve data from Query String
   $Id = $_GET['Id'];
   $Last = $_GET['Last'];
   $First = $_GET['First'];

   echo "Id: <code>".$Id."</code><br>";
   echo "Last: <code>".$Last."</code><br>";
   echo "First: <code>".$First."</code><br><br>";

   
   // Escape User Input to help prevent SQL Injection
   $Id = $mysqli->real_escape_string($Id);
   $Last = $mysqli->real_escape_string($Last);
   $First = $mysqli->real_escape_string($First);

   //build query
   echo "<code>...Building query</code><br>";
   // Construct query based on which fields are provided
   $sql = "SELECT * FROM STUDENTS";
   if (!empty($Id) || !empty($Last) || !empty($First)) {
      $sql .= " WHERE";
      if (!empty($Id)) {
         $sql .= " ID = '$Id'";
      }
      if (!empty($Last)) {
         $sql .= (!empty($Id) ? " AND" : "") . " LAST = '$Last'";
      }
      if (!empty($First)) {
         $sql .= (!empty($Id) || !empty($Last) ? " AND" : "") . " FIRST = '$First'";
      }
   }
   //Execute query
   echo "<code>...Executing query</code><br><br>";
   $result = $mysqli->query($sql) or die($mysqli->error);
   
   //Build Result String
   $display_string = "<table border=2> <tr> <th>ID</th> <th>LAST</th> <th>FIRST</th> <th>MAJOR</th> <th>GPA</th> </tr>";
   
   // Insert a new row in the table for each person returned
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[ID]</td>";
      $display_string .= "<td>$row[LAST]</td>";
      $display_string .= "<td>$row[FIRST]</td>";
      $display_string .= "<td>$row[MAJOR]</td>";
      $display_string .= "<td>$row[GPA]</td>";
      $display_string .= "</tr>";
   }
   echo "Query: <code>" . $sql . "</code> <br><br>";
   
   $display_string .= "</table>";
   echo $display_string;

?>