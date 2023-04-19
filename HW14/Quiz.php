<html lang="en">
<head>
    <title> Sample Quiz </title>
    <meta charset="UTF-8">
    <meta name="description" content="Quiz">
    <meta name="author" content="Junyu Yao">
    <link rel="stylesheet" href="Quiz.css">
    <script defer>
        function checkForm() {
            var inputs = document.getElementsByTagName("input");
            var isFilled = true;
            // Loop through all input fields
            for (var i = 0; i < inputs.length; i++) {
                if ((inputs[i].type == "text" || inputs[i].type == "email" || inputs[i].type == "number")
                    && inputs[i].value == "") {
                    isFilled = false;
                    break;
                } else if (inputs[i].type == "radio" && !isRadioSelected(inputs[i].name)) {
                    isFilled = false;
                    break;
                } else if (inputs[i].type == "checkbox" && !isCheckboxSelected(inputs[i].name)) {
                    isFilled = false;
                    break;
                }
            }
            // If any field is empty, display an alert and stop form submission
            if (!isFilled) {
                alert("Please fill in all fields.");
                event.preventDefault();
            }
            // All fields are filled, allow form submission
            return true;
        }  
        function isRadioSelected(radioName) {
            var radioInputs = document.getElementsByName(radioName);
            for (var i = 0; i < radioInputs.length; i++) {
                if (radioInputs[i].checked) {
                    return true;
                }
            }
            return false;
        }
        function isCheckboxSelected(checkboxName) {
            var checkboxInputs = document.getElementsByName(checkboxName);
            for (var i = 0; i < checkboxInputs.length; i++) {
                if (checkboxInputs[i].checked) {
                    return true;
                }
            }
            return false;
        }
    </script>
</head>

<?php
  // Start the session
  session_start();
  // Retrieve the session ID from the URL parameter
  $session_id = $_GET['session_id'];
  // Set the session ID to the current session ID
  session_id($session_id);
  // Retrieve the session variables
  $username = $_SESSION['username'];
  $score= $_SESSION['quiz_score'];
  if (!isset($_SESSION["user_name"])){
    // user is not logged in, redirect to login page on refresh
    redirectOnRefresh('https://spring-2023.cs.utexas.edu/cs329e-bulko/txsjyy/HW14/Signup.php');
  }
  elseif ($_POST["Q1s"] == "confirm"){
    if ($_POST["Q1"] == "F"){
      $_SESSION["quiz_score"]+=10;
      updateScore($_SESSION["quiz_score"]);
    }
    if (!$_COOKIE['name']){
      confirmPage();
    }else{
      Q2();
    }
  }
  elseif ($_POST["Q2s"] == "confirm"){
    if ($_POST["Q2"] == "T"){
      $_SESSION["quiz_score"]+=10;
      updateScore($_SESSION["quiz_score"]);
    }
    if (!$_COOKIE['name']){
      confirmPage();
    }else{
      Q3();
    }
  }
  elseif ($_POST["Q3s"] == "confirm"){
    $q3  = $_POST["Q3"];
    if (count($q3)==1 && $q3[0]== "b"){
      $_SESSION["quiz_score"]+=10;
      updateScore($_SESSION["quiz_score"]);
    }
    if (!$_COOKIE['name']){
      confirmPage();
    }else{
      Q4();
    }
  }
  elseif ($_POST["Q4s"] == "confirm"){
    $q4  = $_POST["Q4"];
    if (count($q4)==1 && $q4[0]== "c"){
      $_SESSION["quiz_score"]+=10;
      updateScore($_SESSION["quiz_score"]);
    }
    if (!$_COOKIE['name']){
      confirmPage();
    }else{
      Q5();
    }
  }
  elseif ($_POST["Q5s"] == "confirm"){
    $q5  = strtolower($_POST["Q5"]);
    if ($q5 == "http"){
      $_SESSION["quiz_score"]+=10;
      updateScore($_SESSION["quiz_score"]);
    }
    if (!$_COOKIE['name']){
      confirmPage();
    }else{
      Q6();
    }
  }
  elseif ($_POST["Q6s"] == "confirm"){
    $q6  = strtolower($_POST["Q6"]);
    if ($q6 == "favicon"){
      $_SESSION["quiz_score"]+=10;
      updateScore($_SESSION["quiz_score"]);
    }
    confirmPage();
  }
  
  else{
    Q1();
  }
  function updateScore($newScore) {
    // Get the username from the session
    $username = $_SESSION['user_name'];
    // Open the file for reading and writing
    $file = fopen("result.txt", "r+");
    // Loop through each line of the file
    while (($line = fgets($file)) !== false) {
      // Split the line into username and score
      $parts = explode(":", $line);
      $fileUsername = $parts[0];
      $fileScore = trim($parts[1]);
      // Check if this line has the same username as the one in the session
      if ($fileUsername == $username) {
         // Delete the old line
        $pos = ftell($file);
        fseek($file, $pos - strlen($line), SEEK_SET);
        ftruncate($file, $pos - strlen($line));
        // Write the new line
        $newLine = $fileUsername . ":" . $newScore . PHP_EOL;
        fwrite($file, $newLine);
        break;
      }
    }
    // Close the file
    fclose($file);
  }
  function redirectOnRefresh($url) {
    header('Refresh: 5; URL=' . $url); // redirect to the specified URL after 5 seconds
    echo 'You will be redirected to ' . $url . ' in 5 seconds. If you are not automatically redirected, please click <a href="' . $url . '">here</a>.'; // display a message to the user
  }


  function Q1 ()
  {  
    print <<<Q1
    <body>
        <form method="post" onsubmit="return checkForm();">
            <div id="header">
                <span> Quiz 1 </span><br>
                <span> CS 329E - Elements of Web Programming </span><br>
                <span> April 11, 2023</span>
            </div>
            <div>
            <h3> True / False </h3>
            <b>1.</b> "URL" stands for "Universal Reference Link". 
            a) True <input type="radio" name="Q1" value="T" > b) False <input type="radio" name="Q1" value="F"> <br><br>
            </div>
            <div>
            <input type="submit" name="Q1s" value="confirm" >
            <input type="reset" name="Clear" value="Clear" >
            </div>
        </form>
    </body>
    </html>
    Q1;
    }   
    function Q2 ()
    {  
      print <<<Q2
      <body>
          <form method="post" onsubmit="return checkForm();">
              <div id="header">
                  <span> Quiz 1 </span><br>
                  <span> CS 329E - Elements of Web Programming </span><br>
                  <span> April 11, 2023</span>
              </div>
              <div>
              <h3> True / False </h3>
              <b>2.</b> An Apple MacBook is an example of a Linux system.
              a) True <input type="radio" name="Q2" value="T" > b) False <input type="radio" name="Q2" value="F"> <br>
              </div>
              <div>
              <input type="submit" name="Q2s" value="confirm" >
              <input type="reset" name="Clear" value="Clear" >
              </div>
          </form>
      </body>
      </html>
      Q2;
    } 
    function Q3 ()
    {  
      print <<<Q3
      <body>
          <form  method="post" onsubmit="return checkForm();">
              <div id="header">
                  <span> Quiz 1 </span><br>
                  <span> CS 329E - Elements of Web Programming </span><br>
                  <span> April 11, 2023</span>
              </div>
              <div>
              <h3> Multiple Choice </h3>
              <b>3.</b> Which of these do NOT contribute to packet delay in a packet switching network? <br>
              <input name="Q3[]" type="checkbox" value="a" > a) Processing delay at a router <br>
              <input name="Q3[]" type="checkbox" value="b"> b) CPU workload on a client <br>
              <input name="Q3[]" type="checkbox" value="c"> c) Transmission delay along a communications link <br>
              <input name="Q3[]" type="checkbox" value="d"> d) Propagation delay <br>
              </div>
              <div>
              <input type="submit" name="Q3s" value="confirm">
              <input type="reset" name="Clear" value="Clear">
              </div>
          </form>
      </body>
      </html>
      Q3;
    } 
    function Q4 ()
    {  
      $script = $_SERVER['PHP_SELF'];
      print <<<Q4
      <body>
          <form action="$script" method="post" onsubmit="return checkForm();">
              <div id="header">
                  <span> Quiz 1 </span><br>
                  <span> CS 329E - Elements of Web Programming </span><br>
                  <span> April 11, 2023</span>
              </div>
              <div>
              <h3> Multiple Choice </h3>
              <b>4.</b> This Internet layer is responsible for creating the packets that move across the network. <br>
              <input name="Q4[]" type="checkbox" value="a" > a) Physical <br>
              <input name="Q4[]" type="checkbox" value="b"> b) Data Link <br>
              <input name="Q4[]" type="checkbox" value="c"> c) Network <br>
              <input name="Q4[]" type="checkbox" value="d"> d) Transport <br>
              </div>
              <div>
              <input type="submit" name="Q4s" value="confirm">
              <input type="reset" name="Clear" value="Clear">
              </div>
          </form>
      </body>
      </html>
      Q4;
    } 
    function Q5 ()
    {  
      $script = $_SERVER['PHP_SELF'];
      print <<<Q5
      <body>
          <form action="$script" method="post" onsubmit="return checkForm();">
              <div id="header">
                  <span> Quiz 1 </span><br>
                  <span> CS 329E - Elements of Web Programming </span><br>
                  <span> April 11, 2023</span>
              </div>
              <div>
              <h3> Fill in the Blank </h3>
              <input type="text" name="Q5">is a networking protocol that runs over TCP/IP, and governs communication between web
              browsers and web servers.
              </div>
              <div>
              <input type="submit" name="Q5s" value="confirm">
              <input type="reset" name="Clear" value="Clear">
              </div>
          </form>
      </body>
      </html>
      Q5;
    }
    function Q6 ()
    {  
      $script = $_SERVER['PHP_SELF'];
      print <<<Q6
      <body>
          <form action="$script" method="post" onsubmit="return checkForm();">
              <div id="header">
                  <span> Quiz 1 </span><br>
                  <span> CS 329E - Elements of Web Programming </span><br>
                  <span> April 11, 2023</span>
              </div>
              <div>
              <h3> Fill in the Blank </h3>
              A small icon displayed in a browser table that identifies a website is called a <input type="text" name="Q6">
              </div>
              <div>
              <input type="submit" name="Q6s" value="confirm">
              <input type="reset" name="Clear" value="Clear">
              </div>
          </form>
      </body>
      </html>
      Q6;
    }
  
  function confirmPage() {
    $cnt = $_SESSION["quiz_score"];
    session_destroy();
    echo "<script>alert('Your Grade is $cnt/60')</script>";
    print <<<PAGE2
      <html>
      <head>
      <title> Confirm Order </title>
      </head>
      <body>
      <p>
      Well done for finishing the quiz, you have scored $cnt / 60!
      </p>
      </body>
      </html>
  PAGE2;
  }
