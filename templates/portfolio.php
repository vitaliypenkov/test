<ul class="nav nav-pills">
    <li><a href="info.php">Personal Info</a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>    
    <li><a href="projects.php">Projects</a></li>
</ul>

<div class="view header-name">

<h1>   
<? echo $info[0]["fname"] ?>  
<? echo $info[0]["lname"] ?> 
<? echo $info[0]["mname"] ?> 
</h1>
    
<div>

<div class="view header-contacts">
E-mail: 
<a href="mailto:<? echo $info[0]["email"] ?>?Subject=<? echo $info[0]["fname"]?> <? echo $info[0]["lname"]?>, <? echo $goal[0]["position"]?>: Interview Request">
<? echo $info[0]["email"] ?></a>
<p> 
Phone: <? echo $info[0]["phone1"] ?>  
<p> 
Phone: <? echo $info[0]["phone2"] ?>  
<div>

<div class="view objective">
<h4>Position:</h4>   <? echo $goal[0]["position"] ?> 
<h4>Objective:</h4>  <? echo $goal[0]["objective"] ?> 
<div>

<div class="view experience">
<h4>Summary of Work Experience</h4>
<?php 
    $count = count($wexps);     
    for ($i = 0; $i < $count; $i++)                
    {    
        echo "<br>";
        echo "<b>Name of Employer:</b> ", $wexps[$i]["company"] ;
        echo "<br>";
        echo "<b>Dates of Employment:</b> ",$wexps[$i]["start_date"], " - ", $wexps[$i]["end_date"];          
        echo "<br>";
        echo "<b>Position:</b> ", $wexps[$i]["position"];        
        echo "<p>";
        
     }
?>     
<div>

<div class="view education">
<h4>Education</h4>
<?php 

    $count = count($edu);     
    for ($i = 0; $i < $count; $i++)                
    {    
         echo "<br>";
        echo "<b>Institution:</b> ", $edu[$i]["institution"];    
        echo "<br>";
        echo "<b>Qualification:</b> ", $edu[$i]["qualification"] ;
        echo "<br>";
        echo "<b>Dates of Studying:</b> ",$edu[$i]["start_date"], " - ", $edu[$i]["end_date"];          
            
        echo "<p>";
        
     }
?>     

<div>
 



