<html lang="en">
<head>
    <title>Signup</title>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    // get values submitted from the login form
    $username = $_POST["username"];
    $password = $_POST["password"];
    // "beyonce" is the only authorized user: her name and password are hardcoded into this file
    $flag = 0 ;
    $file = fopen("passwd.txt", "r");
    while (($line = fgets($file)) !== false) {
        $parts = explode(":", $line);
        if ($parts[0] == $username ){
            $flag = 1;
        }
    }
    fclose($file);
    if ($flag == 1){
        echo '<script>alert("Username has been taken please try again!");</script>';
    }else{
        $file = fopen("passwd.txt", "a");
        fwrite($file,$username . ":" . $password ."\n");
        fclose($file);
        setcookie("name", $username, time()+360, "/");
        //  use the function "header" to redirect us to the 
        // desired page. header() adds aheader to the HTTP
        // response, and calling it with a "Location : url"
        //  argument initiates that redirect.
        header("Location: Login.php");
        die;
    }
}
?>
<div class="navbar">
  <a href="Login.php">Login</a>
  <a href="Signup.php">Signup</a>
</div>
<div class="container">
    <div class="form">
      <h2>Sign Up</h2>
      <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Choose a username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Choose a password" required>
        <button type="submit">Sign Up</button>
      </form>
    </div>
</div>
</html>
<style>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
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

button[type="submit"] {
  background: #007bff;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

button[type="submit"]:hover {
  background: #0062cc;
}
/* Navbar styles */
.navbar {
  background-color: #333;
  overflow: hidden;
}

.navbar a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

  /* Active link */
.active {
  background-color: #4CAF50;
  color: white;
}
  </style>

