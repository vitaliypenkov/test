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
    <fieldset>
        <div>
        Technology    
        </div>
        
         <?php
            $count = count($skills);          
           // var_dump($skills);   
            //if any skill found, display prepopulated fields             
            if (!empty($skills[0]))
            {
                for ($i = 0; $i < $count; $i++)
                {                       
                    print ("<div id=div$i class='control-group'>");
                    print ("<input type='checkbox' id = \"sel$i\" name = \"{$skills[$i]["id"]}\" />");                  
                    print ("<input class=\"input\" id=\"skill$i\" name=\"skill_name[]\" value=\"{$skills[$i]["skill"]}\" type=\"text\"/>");                      
                    print ("<select class=\"input\" id =\"level$i\" name=\"skill_exp[]\">");
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
                    print ("<input id=\"id$i\" name=\"skill_id[]\" value=\"{$skills[$i]["id"]}\" style=\"visibility:hidden; position:absolute\"  type=\"text\"/>");         
                    print ("</div>");
                 }
            }           
            
            // if no skills found, display empty fields
            else
            {
                    print ("<div id=div0 class='control-group'>");
                    print ("<input type='checkbox' id = sel0/>");
                    print ("<input class=\"input\" id=\"skill0\" name=\"skill_name[]\" placeholder=\"Please fill in technology\" type=\"text\"/>");  
                    print ("<select class=\"input\" id =\"level0\" name=\"skill_exp[]\">");   
                    print ("<option value='0'>Please Select</option>");
                    print ("<option value='1'>Junior</option>");
                    print ("<option value='2'>Middle</option>");
                    print ("<option value='3'>Expert</option>");
                    print (" </select>");          
                    print ("</div>");
            }
         
         ?>        

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
    
    $('.input').change(informAboutChanges);   

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
    var template = "div";       
    var next_name;    
    var i = 0;
    while(true)   
    {
       next_name = template + i;
       if ($('#' + next_name).length <= 0)
        {           
            //alert(next_name);
            break;
        } 
       i++;     
    }
    
    var new_div = $('<div id='+ next_name +' ></div>').addClass("control-group");
    var new_check = $("<input type='checkbox'/\>");
    var new_name = $("<input name=skill_name[] placeholder=\"Please fill in technology\" type=\"text\"/\>");     
    var new_exp = $('<select id =\"level'+ next_name.substring(3) +'\" name=\"skill_exp[]\">');  
    var previous_name = template + (next_name.substring(3) - 1);
    if (previous_name == "div-1") {
        previous_name = "div0";
    }
    new_div.insertAfter('#' + previous_name);
    new_check.appendTo('#' + next_name);
    new_name.appendTo('#' + next_name);
    new_exp.appendTo('#'+ next_name);
    
    selectValues = {"0": "Please select", "1": "Junior", "2": "Middle", "3": "Expert" };
    $.each(selectValues, function(key, value) {   
     $('#level' + next_name.substring(3))
          .append($('<option>', { value : key })
          .text(value)); 
    });   
  }); 
});
--></script>
