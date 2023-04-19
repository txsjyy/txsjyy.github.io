<?php

if ($_POST["page"] == "confirm")
{
  $timeArray = array( "8:00 am","9:00 am" , "10:00 am" , "11:00 am" , "12:00 pm" , "1:00 pm" , "2:00 pm" , "3:00 pm" ,"4:00 pm" , "5:00 pm");
  $newArray= array();
  $file = fopen("signup.txt", "r");
  for ($i = 0; $i < count($timeArray); $i++) {
    $line = rtrim(fgets($file));
    $parts = explode(",", $line);
    $time = trim($parts[0]);
    $name = trim($parts[1]);
    if ($name == "") {
        $newArray[$time] = $_POST[$i];
    }else{
        $newArray[$time] = $name;
    }
  }
  fclose($file);

  // Save the updated dictionary to a file
  $file = fopen("signup.txt", "w");
  foreach ($newArray as $time => $name) {
      fwrite($file, $time . "," . $name . "\n");
  }
  fclose($file);

  UpdatePage();
}
else
{
  InitialPage();
}

function UpdatePage ()
{  
    $timeArray = array( "8:00 am","9:00 am" , "10:00 am" , "11:00 am" , "12:00 pm" , "1:00 pm" , "2:00 pm" , "3:00 pm" ,"4:00 pm" , "5:00 pm");
    $file = fopen("signup.txt", "r");
    $schedule = array();
    while (($line = fgets($file)) !== false) {
        $parts = explode(",", $line);
        $schedule[trim($parts[0])] = trim($parts[1]);
    }
    fclose($file);

    $script = $_SERVER['PHP_SELF'];

    echo <<<top
    <html lang="en">
        <head>
            <title> Sample Quiz </title>
            <meta charset="UTF-8">
            <meta name="description" content="Quiz">
            <meta name="author" content="Junyu Yao">
            <style>td, th {text-align: center;}</style>
        </head>
        <body> 
        <form action="$script" method="post">
            <table align="center" width="30%" border="2">
            <caption style="margin-bottom:0.25cm;"> <b>Sign-Up Sheet</b> </caption>
            <tbody><tr><th style="width:130px"> Time </th><th> Name </th></tr>
top; 
    $length = count($timeArray);
    for ($i=0; $i <$length; $i++) {
        echo '<tr>';
        echo '<td>' . $timeArray[$i] . '</td>';
        if ($schedule[$timeArray[$i]] == ""){
            echo '<td><input type="text" name="' . $i . '"></td>';
        }else{
            echo '<td>' . $schedule[$timeArray[$i]] . '</td>';
        }
        echo '</tr>';
    }
    echo <<<table
            </tbody>
            </table>
            <br>
            <center><input type="submit" name="page" value="confirm"></center>  
        </body>
    </html>
table;
}
  function InitialPage(){
    $timeArray = array( "8:00 am","9:00 am" , "10:00 am" , "11:00 am" , "12:00 pm" , "1:00 pm" , "2:00 pm" , "3:00 pm" ,"4:00 pm" , "5:00 pm");
    $script = $_SERVER['PHP_SELF'];
    print <<<top
    <html lang="en">
        <head>
            <title> Sample Quiz </title>
            <meta charset="UTF-8">
            <meta name="description" content="Quiz">
            <meta name="author" content="Junyu Yao">
            <style>td, th {text-align: center;}</style>
        </head>
        <body> 
        <form action="$script" method="post">
            <table align="center" width="30%" border="2">
            <caption style="margin-bottom:0.25cm;"> <b>Sign-Up Sheet</b> </caption>
            <tbody><tr><th style="width:130px"> Time </th><th> Name </th></tr>
    top;
    for ($i = 0; $i < count($timeArray); $i++) {
        echo '<tr>';
        echo '<td>' . $timeArray[$i] . '</td>';
        echo '<td><input type="text" name="' . $i . '"></td>';
        echo '</tr>';
    }
    print<<<table
            </tbody>
            </table>
            <br>
            <center><input type="submit" name="page" value="confirm"></center>  
        </body>
    </html>
    table;
  }
?>


