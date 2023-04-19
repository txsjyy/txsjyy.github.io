<!DOCTYPE html>
<html lang="en">
<head>
  <title>Action Page</title>
  <meta charset="UTF-8">
  <meta name="description" content="Action Page">
  <meta name="author" content="Action Page">
  <script>
    function Logout(){
      alert('Thank you!');
      sessionStorage.clear(); // clear all session data
      window.location.href = 'Login.php'; // redirect to login page
    }
  </script>
</head> 
   <body>
   	<h3> SQL Information: </h3>
    <a href="ISRpage.php">Insert Student Record</a> <br> <br>
    <a href="DSRpage.php">Delete Student Record</a> <br> <br>
    <a href="USRpage.php">Update Student Record</a> <br> <br>
    <a href="VSRpage.php">View Student Record</a> <br> <br>
    <button onclick = Logout()>logout</button>
   </body>
</html>
<style>
  body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    text-align: center;
  }
  h3 {
      margin-top: 50px;
  }
  a {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 20px;
    font-weight: bold;
    width: 300px;
  }
  button {
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 20px;
    font-weight: bold;
    border: none;
    width: 200px;
  }
  a:hover {
    background-color: #3e8e41;
  }
  button:hover{
    background-color: red;
  }
</style>
