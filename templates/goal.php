<ul class="nav nav-pills">
    <li><a href="newcv.php">Personal Info</a></li>
    <li><a href="goal.php"><strong>Goal</strong></a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>    
    <li><a href="logout.php">Log Out</a></li>
</ul>


<form action="goal.php" method="post">

<div>
Position:
<?php 


 if (!empty($goal[0]))
 {
   print ("<input name=\"position\" maxlength=24 value =\"{$goal[0]["position"]}\" type=\"text\"/>");  
   print("</div>");    
   print("Objective: ");
   print("<div>");
   print ("<textarea name=\"objective\" maxlength=250 cols=\"20\" rows=\"5\" style=\"margin: 0px 0px 10px; width: 535px; height: 103px; \">{$goal[0]["objective"]}</textarea>");   
 
 }
 else
 {  
   print ("<input name=\"position\" maxlength=24 placeholder=\"E.g.: Jr Java Developer\" type=\"text\"/>");  
   print("</div>");    
   print("Objective: ");
   print("<div>");
   print ("<textarea name=\"objective\" maxlength=250 cols=\"20\" rows=\"5\" style=\"margin: 0px 0px 10px; width: 535px; height: 103px; \"> </textarea>");
 }
?>
</div>
    <div class="control-group">             
        <button type="submit" class="btn">Save</button>
    </div>
</form>
