<?php
  if ($_POST["page"] == "confirm")
  {
    confirmPage();
  }
  else
  {
     QuizPage();
  }

  function QuizPage ()
  {  
    $script = $_SERVER['PHP_SELF'];
    print <<<quizpage
    <html lang="en">
    <head>
        <title> Sample Quiz </title>
        <meta charset="UTF-8">
        <meta name="description" content="Quiz">
        <meta name="author" content="Junyu Yao">
        <link rel="stylesheet" href="Quiz.css">
    </head>
    <body>
        <form action="$script" method="post">
            <div id="header">
                <span> Quiz 1 </span><br>
                <span> CS 329E - Elements of Web Programming </span><br>
                <span> March 21, 2023</span>
                
            </div>
            <table>
                <tr><th colspan="2"><h3> True / False </h3></th></tr>
                <tr>
                    <th>1."URL" stands for "Universal Reference Link".</th>
                    <th>
                        a) True <input type="radio" name="Q1" value="T">
                        b) False <input type="radio" name="Q1" value="F">
                    </th>
                </tr>
                <tr>
                    <th>2.An Apple MacBook is an example of a Linux system.</th>
                    <th>
                        a) True <input type="radio" name="Q2" value="T">
                        b) False <input type="radio" name="Q2" value="F">
                    </th>
                </tr>
                <tr ><th colspan="2"><h3>Multiple Choice</h3></th></tr>
                <tr><th colspan="2">3.Which of these do NOT contribute to packet delay in a packet switching network?</th>
                <tr>
                    <td colspan="2">
                        <input name = "Q3[]" type = "checkbox" value = "a"> a) Processing delay at a router <br>
                        <input name = "Q3[]" type = "checkbox" value = "b" > b) CPU workload on a client <br>
                        <input name = "Q3[]" type = "checkbox" value = "c" > c) Transmission delay along a communications link <br>
                        <input name = "Q3[]" type = "checkbox" value = "d" > d) Propagation delay <br>
                    </td>
                </tr>
                <tr><th colspan="2">4.This Internet layer is responsible for creating the packets that move across the network.</th>
                <tr>
                    <td colspan="2">
                        <input name = "Q4[]" type = "checkbox" value = "a"> a) Physical <br>
                        <input name = "Q4[]" type = "checkbox" value = "b" > b) Data Link <br>
                        <input name = "Q4[]" type = "checkbox" value = "c" > c) Network <br>
                        <input name = "Q4[]" type = "checkbox" value = "d" > d) Transport <br>
                    </td>
                </tr>
                <tr><th colspan="2"><h3>Fill in the Blank</h3></th></tr>
                <tr>
                    <td><input type="text" name="Q5"></td>
                    <td>is a networking protocol that runs over TCP/IP, and governs communication between web
                        browsers and web servers.</td>
                </tr>
                <tr>
                    <td>A small icon displayed in a browser table that identifies a website is called a</td>
                    <td><input type="text" name="Q6"></td>
                </tr> 
                <tr>
                    <td><input type="submit" name="page" value="confirm"></td>
                    <td><input type="reset" name="Clear" value="Clear"></td>
                    
                </tr>         
            </table>
        </form>
    </body>
    </html>
  quizpage;
  }
  function confirmPage() {

    $q1 = $_POST["Q1"];
    $q2 = $_POST["Q2"];
    $q3 = $_POST["Q3"];
    $q4 = $_POST["Q4"];
    $q5 = $_POST["Q5"];
    $q6 = $_POST["Q6"];
    $q5 = strtolower($q5);
    $q6 = strtolower($q6);
    $score = array($q1,$q2,$q3[0],$q4[0],$q5,$q6);
    $answer = array("F","T","b","c","http","favicon");
    $cnt = 0;
    for ($x = 0; $x <= 5; $x++) {
      if ($score[$x] == $answer[$x]){
        $cnt += 1;
        if ($x ==3 && $x == 4){
          if (count($score[$x])>1){
            continue;
          }
        }
      }
    }

    echo "<script>alert('Your Grade is $cnt/6 ')</script>";
    print <<<PAGE2
      <html>
      <head>
      <title> Confirm Order </title>
      </head>
      <body>
      <p>
      Well done for finishing the quiz, you have scored $cnt / 6!
      </p>
      </body>
      </html>
  PAGE2;
  }


 