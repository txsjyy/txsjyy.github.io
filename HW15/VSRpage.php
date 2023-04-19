<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Student Record</title>
  <meta charset="UTF-8">
  <meta name="description" content="AJAX demo">
  <meta name="author" content="View Student Record">
</head> 

<body>
	<script language = "javascript" type = "text/javascript">
	// check at least one input
	function checkInputFields() {
		var inputs = document.getElementsByTagName("input"); // get all input elements on the page
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].value !== "") { // check if input field is not empty
			return true; // return true if at least one input field is filled
			}
		}
		return alert('Please at least fill in one field!'); // return false if no input fields are filled
	}
	//Browser Support Code
	function ajaxFunction(server,user,pwd,dbName,flag){
		if (flag == 's'){
			if (checkInputFields()){
				var ajaxRequest;  // The variable that makes Ajax possible!
				ajaxRequest = new XMLHttpRequest();
				// Create a function that will receive data sent from the server and will update
				// the div section in the same page.
				ajaxRequest.onreadystatechange = function(){
					if(ajaxRequest.readyState == 4){
						var ajaxDisplay = document.getElementById('ajaxDiv');
						ajaxDisplay.innerHTML = ajaxRequest.responseText;
					}
				}
				// Now get the value from user and pass it to server script.
				var Id = document.getElementById('ID').value;
				var Last = document.getElementById('LAST').value;
				var First = document.getElementById('FIRST').value;
				
				var queryString = "?Id=" + Id ;
				queryString +=  "&Last=" + Last + "&First=" + First + "&server=" + server + "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
				ajaxRequest.open("GET", "query.php" + queryString, true);
				ajaxRequest.send(null);
			}
			else{
				alert('Please at least fill in one field!');
			}
		}else{
			var ajaxRequest;  // The variable that makes Ajax possible!
			ajaxRequest = new XMLHttpRequest();
			// Create a function that will receive data sent from the server and will update
			// the div section in the same page.
			ajaxRequest.onreadystatechange = function(){
				if(ajaxRequest.readyState == 4){
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}
			var queryString = "?server=" + server;
			queryString += "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
			ajaxRequest.open("GET", "viewquery.php" + queryString, true);
			ajaxRequest.send(null);
		}	
	}
	</script>
	<h3> View Student Record: </h3>
	<form method = "POST" action = "">
		<table>
			<tr>
				<td>ID:</td>
				<td> <input id = "ID" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>LAST:</td>
				<td> <input id = "LAST" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td>FIRST:</td>
				<td> <input id = "FIRST" type = "text" size = "30" required /> </td>
			</tr>
			<tr>
				<td><input type = "button" onclick = "ajaxFunction('spring-2023.cs.utexas.edu','cs329e_bulko_txsjyy','Query9Spite6pig','cs329e_bulko_txsjyy','s')" value = "Query MySQL"/></td>
				<td><input type = "button" onclick = "ajaxFunction('spring-2023.cs.utexas.edu','cs329e_bulko_txsjyy','Query9Spite6pig','cs329e_bulko_txsjyy','all')" value = "View All Student Records"/></td>
			</tr>
		</table>
	</form>
	<div id = 'ajaxDiv'>Result of query</div>
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
#ajaxDiv {
  margin: 20px;
  padding: 20px;
  background-color: #fff;
  border-radius: 4px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
</style>