<?php
$timeArray = array( "8:00 am ","9:00 am" , "10:00 am" , "11:00 am" , "12:00 pm" , "1:00 pm" , "2:00 pm" , "3:00 pm" ,"4:00 pm" , "5:00 pm");
if ($_POST["page"] == "confirm")
{
  $nameArray = $_POST["nameList"];
  $schedule = array();
  for ($i = 0; $i < count($timeArray); $i++) {
    $time = $timeArray[$i];
    
    $name = $nameArray[$i];
    $schedule[$time] = $name;
  }
  // Save the updated dictionary to a file
  $file = fopen("signup.txt", "w");
  foreach ($schedule as $time => $name) {
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
    $file = fopen("signup.txt", "r");
    $schedule = array();
    while (($line = fgets($file)) !== false) {
        $parts = explode(",", $line);
        $schedule[$parts[0]] = trim($parts[1]);
    }
    fclose($file);
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
    foreach ($schedule as $time => $name) {
      echo '<tr>';
      echo '<td>' . $time . '</td>';
      if ($name == "") {
        echo '<td><input type="text" id=“1” name="nameList[]"></td>';
      }else {
        echo '<td><input type="text" name="nameList[]" value="' . $name . '" readonly></td>';
      }
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
  function InitialPage(){
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
            <tr><td> 8:00 am </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 9:00 am </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 10:00 am </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 11:00 am </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 12:00 pm </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 1:00 pm </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 2:00 pm </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 3:00 pm </td><td> <input type="text" name="nameList[]"></td></tr>
            <tr><td> 4:00 pm </td><td> <input type="text" name="nameList[]"> </td></tr>
            <tr><td> 5:00 pm </td><td> <input type="text" name="nameList[]"> </td></tr>
            </tbody>
            </table>
            <br>
            <center><input type="submit" name="page" value="confirm"></center>  
        </body>
    </html>
    top;
  }
?>


