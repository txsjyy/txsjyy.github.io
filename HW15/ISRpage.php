<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert Student Record</title>
  <meta charset="UTF-8">
  <meta name="description" content="AJAX demo">
  <meta name="author" content="Insert Student Record">
</head> 
<?php
if ($_POST["ID"]==TRUE){
	$Id = $_POST["ID"]; 
	$Last = $_POST["LAST"]; 
	$First = $_POST["FIRST"]; 
	$Major = $_POST["MAJOR"]; 
	$Gpa = $_POST["GPA"]; 
	// Connect to MySQL Server
	$mysqli = new mysqli('spring-2023.cs.utexas.edu','cs329e_bulko_txsjyy','Query9Spite6pig','cs329e_bulko_txsjyy');
	if ($mysqli->connect_errno) {
	   die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
	} else {
	   echo "<code>...Connection successful</code> <br>";
	}
	//Select Database
	$mysqli->select_db('cs329e_bulko_txsjyy') or die($mysqli->error);
	// Escape User Input to help prevent SQL Injection

	$Id = $mysqli->real_escape_string($Id);
	$Last = $mysqli->real_escape_string($Last);
	$First = $mysqli->real_escape_string($First);
	$Major = $mysqli->real_escape_string($Major);
	$Gpa = $mysqli->real_escape_string($Gpa);
	// Prepare the SQL statement
	$sql = "INSERT INTO STUDENTS(ID, LAST, FIRST, MAJOR, GPA) VALUES ('$Id', '$Last', '$First', '$Major', '$Gpa')";
	// Execute the SQL statement
	if (mysqli_query($mysqli, $sql)) {
		echo "Data inserted successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	}
}
?>
<body>
	<h3> Insert Student Record: </h3>
	<form method = "POST" action = "">
		<table>
			<tr>
				<td>ID:</td>
				<td> <input name = "ID" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>LAST:</td>
				<td> <input name = "LAST" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>FIRST:</td>
				<td> <input name = "FIRST" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>MAJOR:</td>
				<td> <input name = "MAJOR" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>GPA:</td>
				<td> <input name = "GPA" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td><input type = "submit" value = "Insert Student Record"/></td>
			</tr>
		</table>
	</form>
</body>
</html>
<style>
body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}
h3 {
  font-size: 24px;
  margin-bottom: 20px;
}
form {
  margin: 20px;
  background-color: #f2f2f3;
}
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 600px;
}
td {
  padding: 10px;
}
input[type="text"] {
  width: 100%;
  padding: 8px;
  border: solid;
  border-radius: 4px;
  background-color: #f7f7f7;
  box-sizing: border-box;
  margin-bottom: 10px;
}
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 12px 20px;
  cursor: pointer;
  margin-top: 10px;
  margin-bottom: 10px;
}
input[type="submit"]:hover {
  background-color: #3e8e41;
}
</style>
