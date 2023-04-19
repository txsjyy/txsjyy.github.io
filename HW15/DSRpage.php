<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Student Record</title>
  <meta charset="UTF-8">
  <meta name="description" content="Delete Student Record">
  <meta name="author" content="Delete Student Record">
</head> 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Id = $_POST["ID"];  
	$mysqli = new mysqli('spring-2023.cs.utexas.edu','cs329e_bulko_txsjyy','Query9Spite6pig','cs329e_bulko_txsjyy');
	if ($mysqli->connect_errno) {
		die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
	} else {
		echo "<code>...Connection successful</code> <br>";
	}
	//Select Database
	$mysqli->select_db('cs329e_bulko_txsjyy') or die($mysqli->error);
	// Prepare the SQL statement
	$sql = "DELETE FROM STUDENTS WHERE ID = $Id";
	// Execute the SQL statement
	if (mysqli_query($mysqli, $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($mysqli);
	}
	// Close connection
	mysqli_close($mysqli);
}

?>
<body>
	<h3> Delete Student Record: </h3>
	<form method = "POST" action = "">
		<table>
			<tr>
				<td>ID:</td>
				<td> <input name = "ID" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td><input type = "submit" value = "Delete Student Record"/></td>
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
  border: none;
  border-radius: 4px;
  background-color: #f7f7f7;
  box-sizing: border-box;
  margin-bottom: 10px;
}
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: solid;
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
