<ul class="nav nav-pills">
    <li><a href="info.php">Personal Info</a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>  
    <li><a href="projects.php"><strong>Projects</strong></a></li>
    <li><a href="javascript:;"  onClick="window.open('view.php<? echo "?user_id=", $_SESSION["id"]?>','no','scrollbars=yes,width=1250,height=768')" >View Resume</a>  </li>
</ul>

<form action="projects.php" method="post">

<fieldset>
<?php

    if (!empty($projects[0]))
    {
        $count = count($projects);        
        for ($i = 0; $i < $count; $i++)                
        {
            echo ("<div id=\"pid$i\" class=\"div_project\">");
                echo ("<div class=\"project-title div_project_left\">Project Name<br/>");
                    echo ("<input class=\"input\" name=\"project_name[]\" value=\"{$projects[$i]["project_name"]}\" type=\"text\"/></div>");
                        
                echo ("<div class=\"project-title div_project_right\">Role<br/>");
                    echo ("<input class=\"input\" name=\"role[]\" value=\"{$projects[$i]["role"]}\" type=\"text\"/></div>");

                echo ("<div class=\"project-title div_project_left\">Project Description</div><br/>");
                echo ("<textarea class= \"textarea\" name=\"workload[]\" >{$projects[$i]["workload"]}</textarea>");    
            
                echo ("<div class=\"project-title div_project_left\">Responsibilities</div><br/>");            
                echo ("<textarea class= \"textarea\" name=\"responsibilities[]\" >{$projects[$i]["responsibilities"]}</textarea>");    
            
                echo ("<div class=\"project-title div_project_left\">Project Technologies</div><br/>");            
                echo ("<textarea class= \"textarea\" name=\"technologies[]\" >{$projects[$i]["technologies"]}</textarea>");
                
                echo ("<button type=\"button\" name=\"{$projects[$i]["project_id"]}\" class=\"btn del\">Delete</button>");

                echo ("<input maxlength=5 name=\"project_id[]\" value=\"{$projects[$i]["project_id"]}\" style=\"visibility:hidden; position:absolute\"  type=\"text\"/>");            
            echo ("</div>");                

        }
    }       
    else
    {              
         echo ("<div class=\"div_project\">");
                echo ("<div class=\"project-title div_project_left\">Project Name<br/>");
                    echo ("<input class=\"input\" name=\"project_name[]\" type=\"text\"/></div>");
                        
                echo ("<div class=\"project-title div_project_right\">Role<br/>");
                    echo ("<input class=\"input\" name=\"role[]\" type=\"text\"/></div>");

                echo ("<div class=\"project-title div_project_left\">Project Description</div><br/>");
                echo ("<textarea class= \"textarea\" name=\"workload[]\" ></textarea>");    
            
                echo ("<div class=\"project-title div_project_left\">Responsibilities</div><br/>");            
                echo ("<textarea class= \"textarea\" name=\"responsibilities[]\" ></textarea>");    
            
                echo ("<div class=\"project-title div_project_left\">Project Technologies</div><br/>");            
                echo ("<textarea class= \"textarea\" name=\"technologies[]\" ></textarea>");                        
            echo ("</div>");           
    }
    
?>

</fieldset>

    <div class="control-group"> 
        <button type="button" id="add" class="btn">Add More</button>
        <button type="submit" class="btn">Save</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
<!--
$(document).ready(function() {

    nicEditors.allTextAreas({buttonList : ['bold','italic','underline','strikeThrough', 'removeformat', 'indent', 'outdent', 
    'left', 'center', 'right', 'justify', 'ol', 'ul', 'fontSize', 'fontFamily','fontFormat']})  
    
    $('.del').click(function() 
    {
        var del = $(this).attr('name'); 
   
       $.ajax({
       url: 'projects.php',
       type: 'POST',
       data: {
            del: del
       },
       success: function(response){
       window.location.reload();
       } 
    }); 
    
    });
          
  // now we use the new added button, when is clicked
  $('#add').click(function() 
  {  
  
    var main_div = ('<div id=\"pid$i\" class=\"div_project\">');
    var project_name1 = ('<div class=\"project-title div_project_left\">Project Name<br/\>'); 
    var project_name2 = ('<input class=\"input\" name=\"project_name[]\" type=\"text\"/\></div>');           
    var role1 = ('<div class=\"project-title div_project_right\">Role<br/\>'); 
    var role2 = ('<input class=\"input\" name=\"role[]\" type=\"text\"/\></div>');                    
    var descr1 = ('<div class=\"project-title div_project_left\">Project Description</div><br/\>'); 
    var descr2 = ('<textarea class= \"textarea\" name=\"workload[]\" ></textarea>');                   
    var k1 = ('<div class=\"project-title div_project_left\">Responsibilities</div><br/\>');
    var k2 = ('<textarea class= \"textarea\" name=\"responsibilities[]\" ></textarea>');
    var k3 = ('<div class=\"project-title div_project_left\">Project Technologies</div><br/\>');
    var k4 = ('<textarea class= \"textarea\" name=\"technologies[]\" ></textarea></div>');       
   
    $('.div_project').after(main_div + project_name1 + project_name2 + role1 + role2 + descr1 +descr2 + k1 +k2 +k3 + k4);    
    
   
  }); 
});
--></script>
