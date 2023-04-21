<html lang="en">
<head>
    <title>Signup</title>
</head>
<script language = "javascript" type = "text/javascript">
  	// check at least one input
	function checkInputFields() {
		var UserName = document.getElementById('username').value;
    var Password = document.getElementById('password').value;
		if (UserName !== "" && Password !== "") { // check if input field is not empty
			return true; // return true if at least one input field is filled
    }else{
      return false; // return false if no input fields are filled
    }
	}
	//Browser Support Code
	function ajaxFunction(server,user,pwd,dbName){
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
      var UserName = document.getElementById('username').value;
      var Password = document.getElementById('password').value;
      
      var queryString = "?UserName=" + UserName ;
      queryString +=  "&Password=" + Password + "&server=" + server + "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
      ajaxRequest.open("GET", "query.php" + queryString, true);
      ajaxRequest.send(null);
    }else{
      alert('Please fill in both fields!');
    }
	}
</script>

<div class="container">
    <div class="form">
      <h2>Sign Up</h2>
      <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Choose a username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Choose a password" required>
        <input type = "button" onclick = "ajaxFunction('spring-2023.cs.utexas.edu','cs329e_bulko_txsjyy','Query9Spite6pig','cs329e_bulko_txsjyy')" value = "Sign up"/>
        <input type="reset">
      </form>
    </div>
</div>
<div id = 'ajaxDiv'>Result of query</div>
</html>

<style>
#ajaxDiv {
  margin: 20px;
  padding: 20px;
  background-color: #fff;
  border-radius: 4px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50vh;
  background: #f7f7f7;
}
.form {
  background: white;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  padding: 30px;
  border-radius: 10px;
  margin: 20px;
  width: 400px;
}
h2 {
  text-align: center;
  margin-bottom: 20px;
}
label {
  font-size: 16px;
  display: block;
  margin-bottom: 10px;
}
input[type="text"],
input[type="password"] {
  font-size: 16px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  width: 100%;
}
input[type="button"] {
  background: #007bff;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}
input[type="button"]:hover {
  background: #0062cc;
}
input[type="reset"] {
  background: #007bff;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  float: right;
  transition: background-color 0.2s ease;
}
input[type="reset"]:hover {
  background: #0062cc;
}
  </style>

