<ul class="nav nav-pills">
    <li><a href="info.php">Personal Info</a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php"><strong>Work Experience</strong></a></li>
    <li><a href="skills.php">Skills</a></li> 
    <li><a href="projects.php">Projects</a></li>  
    <li><a href="javascript:;"  onClick="window.open('view.php<? echo "?user_id=", $_SESSION["id"]?>','no','scrollbars=yes,width=1250,height=768')" >View Resume</a>  </li>    
</ul>


<form action="workexp.php" method="post">

    <table id="table" class="table table-bordered">
    
    <?php    
        print("<tr>");
        print("<th>Delete?</th>");
        print("<th>Company</th>");
        print("<th>Position</th>");
        print("<th>Start date</th>");
        print("<th>End date</th>");
        print("</tr>");

            $count = count($wexps);         
              
            //if any skill found, display prepopulated fields             
            if (!empty($wexps[0]))
            {
                for ($i = 0; $i < $count; $i++)                
                {                                       
                    echo ("<tr><th>");
                    echo ("<input class =\"delete_box\" type='checkbox' name = \"{$wexps[$i]["id"]}\"/>");    
                    echo ("<input maxlength=5 name=\"work_id[]\" value=\"{$wexps[$i]["id"]}\" style=\"visibility:hidden; position:absolute\"  type=\"text\"/> </th>");                   
                    echo ("<th><input class=\"input\" name=\"company[]\" value=\"{$wexps[$i]["company"]}\" type=\"text\"/></th>");                                                        
                    print ("<th><input class=\"input\" name=\"position[]\" value=\"{$wexps[$i]["position"]}\" type=\"text\"/></th>");                                                        
                    print ("<th><input class=\"input\" name=\"start_date[]\" value=\"{$wexps[$i]["start_date"]}\" type=\"text\"/></th>");                                                        
                    print ("<th><input class=\"input\" name=\"end_date[]\" value=\"{$wexps[$i]["end_date"]}\" type=\"text\"/></th>");                                                                                                
                    print ("<tr>");
                }
            }
            else
            {            
                    print ("<tr><th>");
                    print ("<input class =\"delete_box\" type='checkbox'/></th>");                  
                    print ("<th><input class=\"input\" name=\"company[]\" type=\"text\"/></th>");                                                        
                    print ("<th><input class=\"input\" name=\"position[]\" type=\"text\"/></th>");                                                        
                    print ("<th><input class=\"input\" name=\"start_date[]\" type=\"text\"/></th>");                                                        
                    print ("<th><input class=\"input\" name=\"end_date[]\" type=\"text\"/></th>");                                                                                                
                    print ("<tr>");
             
             
            }
    ?>
    </table>
    <div class="control-group">  
        <button type="button" id="del" class="btn">Delete Selected</button>
        <button type="button" id="add" class="btn">Add More</button>
        <button id ="save" type="submit" class="btn">Save</button>
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
<script>
<!--
$(document).ready(function() {
    
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
       url: 'workexp.php',
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
    var company = ('<th><input class=\"input\" name=\"company[]\" type=\"text\"/\></th>');
    var position = ("<th><input class=\"input\" name=\"position[]\" type=\"text\"/\></th>"); 
    var start_date =  ("<th><input class=\"input\" name=\"start_date[]\" type=\"text\"/\></th>");                                                        
    var end_date = ("<th><input class=\"input\" name=\"end_date[]\" type=\"text\"/\></th></tr>");        
    $('#table tr:last').after(checkbox + company + position + start_date + end_date);  
    informAboutChanges();    
  }); 
});
--></script>
