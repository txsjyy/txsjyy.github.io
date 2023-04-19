<html lang="en">
<head>
    <title>Login Quiz</title>
</head>
<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    // get values submitted from the login form
    $username = $_POST["username"];
    $password = $_POST["password"];
    // "beyonce" is the only authorized user: her name and password are hardcoded into this file
    $flag = 0;
    $file = fopen("passwd.txt", "r+");
    while (($line = fgets($file)) !== false) {
        $parts = explode(":", $line);
        if ($parts[0] == $username && $parts[1]){
          if (!$parts[2]){
            session_start();
            $file1 = fopen("result.txt", "a");
            fwrite($file1,$username . ":0 \n");
            fclose($file1);
            setcookie("name", $username, time()+900, "/");
            fseek($file, -1, SEEK_CUR); // move the file pointer back one character
            fwrite($file, ":take\n"); // write ":take" at the end of the line, followed by a newline character
            //  use the function "header" to redirect us to the 
            // desired page. header() adds aheader to the HTTP
            // response, and calling it with a "Location : url"
            //  argument initiates that redirect.
            // Set up a score variable
            $score = 0;
            // Store the score in a session variable
            $_SESSION['quiz_score'] = $score;
            $_SESSION['user_name'] = $username;
            // Get the session ID
            $session_id = session_id();
            header("Location: Quiz.php?session_id= $session_id");
            die;
          }else{
            $flag = 1;
            echo "<p>You have taken the test.<p>";
          }
        }
    }
    fclose($file);
    if ($flag == 0){
        echo "<p>Incorrect username or password.<p>";
    }
}
?>

<!-- Navbar -->
<div class="navbar">
  <a href="Login.php">Login</a>
  <a href="Signup.php">Signup</a>
</div>
<div class="container">
    <div class="form">
      <h2>Login</h2>
      <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <button type="submit">Login</button>
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