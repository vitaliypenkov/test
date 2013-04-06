<ul class="nav nav-pills">
    <li><a href="info.php">Personal Info</a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php"><strong>Skills</strong></a></li>
    <li><a href="projects.php">Projects</a></li>
    <li><a href="javascript:;"  onClick="window.open('view.php<? echo "?user_id=", $_SESSION["id"]?>','no','scrollbars=yes,width=1250,height=768')" >View Resume</a>  </li>    
</ul>

<form action="skills.php" method="post">
    <table id="table" class="table table-bordered skills-table">
    <?php    
        print("<tr>");
        print("<th>Delete?</th>");
        print("<th>Technology</th>");
        print("<th>Knowledge level</th>");
        print("</tr>");        

            $count = count($skills);          
           // var_dump($skills);   
            //if any skill found, display prepopulated fields             
            if (!empty($skills[0]))
            {
                for ($i = 0; $i < $count; $i++)
                {
                    echo ("<tr><th>");
                    echo ("<input type='checkbox' class =\"delete_box\" id = \"sel$i\" name = \"{$skills[$i]["id"]}\" />");                  
                    echo ("<input id=\"id$i\" name=\"skill_id[]\" value=\"{$skills[$i]["id"]}\" style=\"visibility:hidden; position:absolute\"  type=\"text\"/> </th>");  
                    echo ("<th><input class=\"input\" id=\"skill$i\" name=\"skill_name[]\" value=\"{$skills[$i]["skill"]}\" type=\"text\"/></th>");
                    echo ("<th><select class=\"select\" id =\"level$i\" name=\"skill_exp[]\">");                    
                    print ("<option value='0'>Please Select</option>");                    
                    if ($skills[$i]["exp"]== 1)
                    {
                        print ("<option value=\"1\" selected=\"selected\">Junior</option>");
                    }
                    else
                    {
                         print ("<option value=\"1\">Junior</option>");
                    }
                    
                    if ($skills[$i]["exp"]== 2)
                    {
                        print ("<option value=\"2\" selected=\"selected\">Middle</option>");
                    }
                    else
                    {
                         print ("<option value='2'>Middle</option>");
                    }
                    
                    if ($skills[$i]["exp"]== 3)
                    {
                        print ("<option value=\"3\" selected=\"selected\">Expert</option>");
                    }
                    else
                    {
                         print ("<option value='3'>Expert</option>");
                    } 
                    print (" </select>");   
                    echo ("</th><tr>");                    
                 }
            }           
            
            // if no skills found, display empty fields
            else
            {
                    echo ("<tr><th>");            

                    print ("<input type='checkbox' class =\"delete_box\" id = sel0/></th>");
                    print ("<th><input class=\"input\" id=\"skill0\" name=\"skill_name[]\" type=\"text\"/></th>");  
                    print ("<th><select class=\"input\" id =\"level0\" name=\"skill_exp[]\">");   
                    
                    print ("<option value='0'>Please Select</option>");
                    print ("<option value='1'>Junior</option>");
                    print ("<option value='2'>Middle</option>");
                    print ("<option value='3'>Expert</option>");
                    print (" </select>");          
                    echo ("</th><tr>");                    
            }
         
         ?>        
        </table>
        <div class="control-group">  
            <button type="button" id="del" class="btn">Delete Selected</button>
            <button type="button" id="add" class="btn">Add More</button>
            <button id="save" type="submit" class="btn">Save</button>
        </div>
    </fieldset>
    
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
<script>
<!--
$(document).ready(function() {    
    
    $('.select').change(informAboutChanges);   
    $('.input').keyup(informAboutChanges);
    
    $('#del').click(function() 
    {
        var dels = [];
        $("input:checked").each(function()
        {
            var code = $(this).attr('name');            
            dels.push(code);
        });
   
       $.ajax({
       url: 'skills.php',
       type: 'POST',
       data: {
            del: dels
       },
       success: function(response){
       window.location.reload();
       } 
       }); 
    
    });
    
  // now we use the new added button, when is clicked
  $('#add').click(function() 
  {  
    var checkbox = ('<tr><th><input class =\"delete_box\" type=\"checkbox\" id = \"sel0\"/\></th>');
    var skill_name = ('<th><input class=\"input\" name=\"skill_name[]\" type=\"text\"/\></th>');    
    var skill_exp = ('<th><select class=\"select\" name=\"skill_exp[]\" type=\"text\"/\></th></tr>'); 
    $('#table tr:last').after(checkbox + skill_name + skill_exp); 
    
    selectValues = {"0": "Please select", "1": "Junior", "2": "Middle", "3": "Expert" };
    $.each(selectValues, function(key, value) {   
     $('.select')
          .append($('<option>', { value : key })
          .text(value)); 
    });  
     
    informAboutChanges();    
  }); 
});
--></script>
