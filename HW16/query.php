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
   $UserName = $_GET['UserName'];
   $Password = $_GET['Password'];

   echo "UserName: <code>".$UserName."</code><br>";
   echo "Password: <code>".$Password."</code><br>";
 
   // Escape User Input to help prevent SQL Injection
   $UserName = $mysqli->real_escape_string($UserName);
   $Password = $mysqli->real_escape_string($Password);

   //build query
   echo "<code>...Building query</code><br>";
   // Construct query based on which fields are provided
   $sql = "SELECT * FROM passwords WHERE user_name = '$UserName'";
   $result = $mysqli->query($sql);

   // Check if the query returned any results
   if ($result->num_rows > 0) {
      // Get the password for the matching user
      $row = $result->fetch_assoc();
      $stored_password = $row['password'];
   
      // Compare the stored password with the user-entered password
      if ($Password==$stored_password) {
      // Passwords match, user is authenticated
      echo "User and password confirmed. <br><br>";
      } else {
      // Prepare the SQL statement
      $sql = "UPDATE passwords SET password = '$Password' WHERE user_name = '$UserName'";
      // Execute the SQL statement
      if (mysqli_query($mysqli, $sql)) {
         echo "Password changed. <br><br>";
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
      }
      die;
      }
   } else {
      // Prepare the SQL statement
      $sql = "INSERT INTO passwords(user_name, password) VALUES ('$UserName', '$Password')";
      // Execute the SQL statement
      if (mysqli_query($mysqli, $sql)) {
         echo "New user registered.<br><br>";
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
      }
      die;
   }

   //Execute query
   echo "<code>...Executing query</code><br><br>";
   $result = $mysqli->query($sql) or die($mysqli->error);
   //Build Result String
   $display_string = "<table border=2> <tr> <th>User Name</th> <th>Password</th> </tr>";
   // Insert a new row in the table for each person returned
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[user_name]</td>";
      $display_string .= "<td>$row[password]</td>";
      $display_string .= "</tr>";
   }
   echo "Query: <code>" . $sql . "</code> <br><br>";
   $display_string .= "</table>";
   echo $display_string;
?>