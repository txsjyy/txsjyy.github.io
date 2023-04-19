<html lang="en">
<head>
    <title>Login Demo</title>
</head>
<?php
// if the request method is post, verify the submitted username /pwd
$url = $_GET["url"];
$url = urldecode($url);

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    // get values submitted from the login form
    $username = $_POST["username"];
    $password = $_POST["password"];
    // "beyonce" is the only authorized user: her name and password are hardcoded into this file
    $flag = 0 ;
    $file = fopen("passwd.txt", "r");
    while (($line = fgets($file)) !== false) {
        $parts = explode(":", $line);
        if ($parts[0] == $username && $parts[1]){
            setcookie("name", $username, time()+360, "/");
            //  use the function "header" to redirect us to the 
            // desired page. header() adds aheader to the HTTP
            // response, and calling it with a "Location : url"
            //  argument initiates that redirect.
            if (isset($_GET["url"])) {
              $url = urldecode($_GET["url"]);
              header("Location: " . $url);
            } else {
                header("Location: Newspaper.php");
            }
            // header("Location " . $url);
            // header("Location:Newspaper.php");
            die;
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
  <a href="Login.php?url=<?php echo $url; ?>">Login</a>
  <a href="Signup.php?url=<?php echo $url; ?>">Signup</a>
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