<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Student Record</title>
  <meta charset="UTF-8">
  <meta name="description" content="AJAX demo">
  <meta name="author" content="Update Student Record">
</head> 
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Id = $_POST["ID"];
		$Last = $_POST["LAST"];
		$First = $_POST["FIRST"];
		$Major = $_POST["MAJOR"];
		$GPA = $_POST["GPA"];

		$mysqli = new mysqli('spring-2023.cs.utexas.edu','cs329e_bulko_txsjyy','Query9Spite6pig','cs329e_bulko_txsjyy');
		if ($mysqli->connect_errno) {
			die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
		} else {
			echo "<code>...Connection successful</code> <br>";
		}

		// Check if at least one field other than ID is filled
		if (!($Last || $First || $Major || $GPA)) {
			die('Error: Please fill at least one field other than ID.');
		}

		// Prepare the SQL statement
		$sql = "UPDATE STUDENTS SET ";

		if ($Last) {
			$sql .= "LAST = '$Last', ";
		}

		if ($First) {
			$sql .= "FIRST = '$First', ";
		}

		if ($Major) {
			$sql .= "MAJOR = '$Major', ";
		}

		if ($GPA) {
			$sql .= "GPA = '$GPA', ";
		}

		// Remove the trailing comma and space from the SQL statement
		$sql = rtrim($sql, ', ');

		// Add the WHERE clause to the SQL statement
		$sql .= " WHERE ID = '$Id'";

		// Execute the SQL statement
		if (mysqli_query($mysqli, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($mysqli);
		}

		// Close connection
		mysqli_close($mysqli);
	}
?>

<body>
	<h3> Update Student Record: </h3>
	<form method = "POST" action = "">
		<table>
			<tr>
				<td>ID:</td>
				<td> <input name = "ID" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>LAST:</td>
				<td> <input name = "LAST" type = "text" size = "30"  /> </td>
			</tr>
			<tr>
				<td>FIRST:</td>
				<td> <input name = "FIRST" type = "text" size = "30"  /> </td>
			</tr>
			<tr>
				<td>MAJOR:</td>
				<td> <input name = "MAJOR" type = "text" size = "30"  /> </td>
			</tr>
			<tr>
				<td>GPA:</td>
				<td> <input name = "GPA" type = "text" size = "30"  /> </td>
			</tr>
			<tr>
				<td><input type = "submit" value = "Update Student Record"/></td>
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
