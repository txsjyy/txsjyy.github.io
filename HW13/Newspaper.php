<?php
    error_reporting(E_ALL); 
    ini_set('display_errors', 1);
    function CheckCookies(){
        $flag = 0 ;
        $file = fopen("passwd.txt", "r");
        while (($line = fgets($file)) !== false) {
            $parts = explode(":", $line);
            // Check if a cookie named "username" exists and has a value
            if (isset($_COOKIE["name"])&&$_COOKIE["name"]==$parts[0]) {
                $flag = 1;
                }
        }
        fclose($file);
        if ($flag == 0){
            return 0;
        }else{
            return 1;
        }
    }   
    if (isset($_GET['clicked'])) {
        ob_start();
        // Run the code here
        if (CheckCookies()==1){
            header("Location:https://www.nbcnews.com/health/health-news/residents-ohio-train-derailment-report-dead-fish-chickens-rcna70378");
            die;
        }else{
            $url = "https://www.nbcnews.com/health/health-news/residents-ohio-train-derailment-report-dead-fish-chickens-rcna70378";
            header("Location:Login.php?url=" . urlencode($url));
            die;
        }
        ob_end_flush();
    } 
    if (isset($_GET['clicked1'])) {
        ob_start();
        // Run the code here
        if (CheckCookies()==1){
            header("Location:https://abcnews.go.com/International/wireStory/japan-bids-teary-farewell-pandas-reserve-china-97352934");
            die;
        }else{
            $url = "https://abcnews.go.com/International/wireStory/japan-bids-teary-farewell-pandas-reserve-china-97352934";
            header("Location:Login.php?url=" . urlencode($url));
            die;
        }
        ob_end_flush();
    } 
    if (isset($_GET['clicked2'])) {
        ob_start();
        // Run the code here
        if (CheckCookies()==1){
            header("Location:https://thedailytexan.com/2023/02/20/marcellus-moores-decision-to-transfer-is-paying-off/");
            die;
        }else{
            $url = "https://thedailytexan.com/2023/02/20/marcellus-moores-decision-to-transfer-is-paying-off/";
            header("Location:Login.php?url=" . urlencode($url));
            die;
        }
        ob_end_flush();
    } 
    if (isset($_GET['clicked3'])) {
        ob_start();
        // Run the code here
        if (CheckCookies()==1){
            header("Location:https://thedailytexan.com/2023/04/03/ut-senate-to-introduce-resolution-supporting-campus-shuttle-pilot-for-disabled-students/");
            die;
        }else{
            $url = "https://thedailytexan.com/2023/04/03/ut-senate-to-introduce-resolution-supporting-campus-shuttle-pilot-for-disabled-students/";
            header("Location:Login.php?url=" . urlencode($url));
            die;
        }
        ob_end_flush();
    } 
    if (isset($_GET['clicked4'])) {
        ob_start();
        // Run the code here
        if (CheckCookies()==1){
            header("Location:https://thedailytexan.com/2023/04/02/graduate-film-student-tania-cattebeke-laconich-wins-first-moody-college-of-communication-photojournalism-contest/");
            die;
        }else{
            $url = "https://thedailytexan.com/2023/04/02/graduate-film-student-tania-cattebeke-laconich-wins-first-moody-college-of-communication-photojournalism-contest/";
            header("Location:Login.php?url=" . urlencode($url));
            die;
        }
        ob_end_flush();
    } 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>News | The Daily Clarion</title>
   <meta charset="UTF-8">
   <meta name="description" content="Newspaper">
   <meta name="author" content="Junyu Yao">
   <link rel="stylesheet" href="Newspaper.css">
</head>
<body>
    <div id="container">
        <div id="top">
            <h1>The Daily Clarion</h1>
        </div>

        <div id="leftnav">
            <label>Navigation</label>
        <ul id="mylist">
            <li><a href="#National" class="homeheadline">National</a></li>
            <li><a href="#International" class="homeheadline">International</a></li>
            <li><a href="#Metro" class="homeheadline">Metro</a></li>
            <li><a href="#Business" class="homeheadline">Business</a></li>
            <li><a href="#Sports" class="homeheadline">Sports</a></li>
            <li><a href="#Arts&Leisure" class="homeheadline">Arts & Leisure</a></li>
            <li><a href="#Editorials" class="homeheadline">Editorials</a></li>
            <li><a href="#Opinions" class="homeheadline">Opinions</a></li>
            <li><a href="#Classifieds" class="homeheadline">Classifieds</a></li>
        </ul>
        </div>
        <div id="rightnav">
        <ul>
            <label>Next edition</label><hr>
            <li>
                <img src="forme.jpeg" alt="UT for me">
                <p>
                    UT-Austin researchers map 
                    over 200,000 new astronomical 
                    objects in project to understand 
                    universe's expansion
                </p>
            </li>
            <li>
                <img src="research.jpeg" alt="research">
                <p>UT For Me initiative celebrates 3 year anniversary</p>
            </li>
            <li>
                <img src="tower.jpeg" alt="tower">
                <p>Lawsuits aim to limit abortion-inducing medication access, affecting abortion, alternative uses nationwide</p>
            </li>
        </ul>
        </div>
        
        <div id="content">
        <h2>News</h2>
            <div id="topsection">
                <table id = "MainTable">
                    <tr>
                        <th>
                            <a href="?clicked=true" class="homeheadline link">Worried residents near Ohio train derailment report dead fish and chickens as authorities say it's safe to return</a>
                            <p> Aria Bendix and David K. Li, February 13, 2023 <br> <br>
                                Residents around East Palestine fear they, their animals and water sources were exposed to hazardous chemicals.</p>
                        </th>
                        <td>
                            <img src="nation.webp" alt="Ohio National Guard member">
                            <figcaption>Ohio National Guard members</figcaption>
                    </tr>
                    <tr>
                        <th>
                            <a href="?clicked1=true" class="homeheadline link">Japan bids teary farewell to pandas sent to reserve in China</a>
                            <p>MARI YAMAGUCHI, Associated Press February 21, 2023 <br> <br>
                                Japanese panda fans bid teary farewells to their idols Xiang Xiang, “super papa” Eimei and his twin daughters who were sent to China to live in a protected facility in Sichuan province
                            </p>
                        </th>
                        <td>
                            <img src="internation.jpeg" alt="pandas">
                            <figcaption>Panda Xiangxiang</figcaption>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="?clicked2=true" class="homeheadline">Marcellus Moore's decision to transfer is paying off</a>
                            <p>JT Bowen, General Sports Reporter • February 20, 2023 <br> <br>
                                Less than a year and a half ago, Marcellus Moore wasn't sure what the future held as a dual-sport athlete at Purdue. While football was his first love and what had gotten him this far, it wasn't panning...</p>
                        </th>
                        <td>
                            <img src="sport.jpeg" alt="Marcellus"> 
                            <figcaption>Marcellus Moore</figcaption>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="?clicked3=true" class="homeheadline">UT Senate to introduce resolution supporting campus shuttle pilot for disabled students</a>
                            <p>Ireland Blouin, Senior News Reporter • April 3, 2023 <br> <br>
                            The UT Senate of College Councils plans to tackle on-campus accessibility by introducing a resolution in support of implementing a pilot shuttle program for disabled students at its next assembly meeting...</p>
                        </th>
                        <td>
                            <img src="3.png" alt="Marcellus"> 
                            <figcaption>Marcellus Moore</figcaption>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="?clicked4=true" class="homeheadline">Graduate film student Tania Cattebeke Laconich wins first Moody College of Communication photojournalism contest</a>
                            <p>Aaron Sullivan, General News Reporter • April 2, 2023 <br> <br>
                            The Moody College of Communication opened its second photojournalism gallery exhibit on Thursday, where a collection of photos from graduate film student Tania Cattebeke Laconich is displayed after her...</p>
                        </th>
                        <td>
                            <img src="4.jpeg" alt="Marcellus"> 
                            <figcaption>Marcellus Moore</figcaption>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="footer">
         &copy; 2023 Junyu Yao The Daily Clarion, All Rights Resevered
        </div>
    </div>
</body>
</html>

