<ul class="nav nav-pills">
    <li><a href="info.php">Personal Info</a></li>
    <li><a href="goal.php"><strong>Goal</strong></a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>  
    <li><a href="projects.php">Projects</a></li>
    <li><a href="/">Get Resume</a></li>     
</ul>

<form action="goal.php" method="post">

<div class="goal-group">
    <div class="title-group">Position</div>
<?php 

 if (!empty($goal[0]))
 {
   print ("<input class=\"input\" name=\"position\" maxlength=24 value =\"{$goal[0]["position"]}\" type=\"text\"/>");  
   print("<br/><br/><div class=\"title-group\">Objective</div>");
   print("<div>");
   print ("<textarea id=\"objective\" name=\"objective\" maxlength=250 cols=\"20\" rows=\"5\" style=\"margin: 0px 0px 10px; width: 535px; height: 103px; \">{$goal[0]["objective"]}</textarea>");   
   print("</div>"); 
 }
 else
 {  
   print ("<input class=\"input\" maxlength=24 type=\"text\"/>");  
   print("<br/><br/><div class=\"title-group\">Objective</div>");
   print("<div>");
   print ("<textarea name=\"objective\" maxlength=250 cols=\"20\" rows=\"5\" style=\"margin: 0px 0px 10px; width: 535px; height: 103px; \"> </textarea>");
   print("</div>");    
 }
?>
</div>    
    <div class="control-group">             
        <button id="save" type="submit" class="btn">Save</button>
    </div>
    
     <?php  
     
        if(!empty($_SESSION["status"]))
        {      
            if($_SESSION["status"] == 1)
            {
                echo ("<div class = info>");
                echo ("Data saved successfully");        
                echo ("</div>");  
                $_SESSION["status"] = 0;  
            } 
               
            if($_SESSION["status"] == -1)
            {
                echo ("<div class = \"error\">");
                echo ("An error occured please try again");        
                echo ("</div>"); 
                $_SESSION["status"] = 0;   
            }  
        }            
   
    ?>
</form>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
<script>
<!--
$(document).ready(function()
{       
    $('.input').change(informAboutChanges);   
});
--></script>
