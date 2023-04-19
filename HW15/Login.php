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
  $file = fopen("passwd.txt", "r");
  while (($line = fgets($file)) !== false) {
      $parts = explode(":", $line);
      if ($parts[0] == $username && $parts[1]){
        fclose($file);
        session_start();
        header("Location: ActionPage.php");
        die;
      }
  }
  if ($flag == 0){
      echo "<script>alert('Login Failed!');</script>";
  }
}
?>
<div class="container">
    <div class="form">
      <h2>Login</h2>
      <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <button type="submit">Login</button>
        <button type="reset">Reset</button>
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
button[type="reset"] {
  background: #007bff;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease;
  float: right;
}
button[type="reset"]:hover {
  background: #0062cc;
}

</style>