<ul class="nav nav-pills">
    <li><a href="newcv.php">Personal Info</a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php"><strong>Work Experience</strong></a></li>
    <li><a href="skills.php">Skills</a></li>    
    <li><a href="logout.php">Log Out</a></li>
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
                    echo ("<input type='checkbox' id = \"sel$i\" name = \"{$wexps[$i]["id"]}\"/>");    
                    echo ("<input id=\"id$i\" maxlength=5 name=\"work_id[]\" value=\"{$wexps[$i]["id"]}\" style=\"visibility:hidden; position:absolute\"  type=\"text\"/> </th>");                   
                    echo ("<th><input name=\"company[]\" value=\"{$wexps[$i]["company"]}\" type=\"text\"/></th>");                                                        
                    print ("<th><input name=\"position[]\" value=\"{$wexps[$i]["position"]}\" type=\"text\"/></th>");                                                        
                    print ("<th><input name=\"start_date[]\" value=\"{$wexps[$i]["start_date"]}\" type=\"text\"/></th>");                                                        
                    print ("<th><input name=\"end_date[]\" value=\"{$wexps[$i]["end_date"]}\" type=\"text\"/></th>");                                                                                                
                    print ("<tr>");
                }
            }
            else
            {            
                    print ("<tr><th>");
                    print ("<input type='checkbox' id = \"sel0\"/></th>");                  
                    print ("<th><input name=\"company[]\" placeholder=\"Please specify company\" type=\"text\"/></th>");                                                        
                    print ("<th><input name=\"position[]\" placeholder=\"Please specify position\" type=\"text\"/></th>");                                                        
                    print ("<th><input name=\"start_date[]\" placeholder=\"Please specify start date\" type=\"text\"/></th>");                                                        
                    print ("<th><input name=\"end_date[]\" placeholder=\"Please specify end date\" type=\"text\"/></th>");                                                                                                
                    print ("<tr>");
             
             
            }
    ?>
    </table>
    <div class="control-group">  
        <button type="button" id="del" class="btn">Delete Selected</button>
        <button type="button" id="add" class="btn">Add More</button>
        <button type="submit" class="btn">Save</button>
    </div>
    
    <?php  
      
        if($_SESSION["status"] == 1)
        {
            echo ("<div class = info>");
            echo ("Data saved successfully");        
            echo ("</div>");  
            $_SESSION["status"] = 0;  
        } 
           
        if($_SESSION["status"] == -1)
        {
            echo ("<div class = \"info\">");
            echo ("An error occured please try again");        
            echo ("</div>"); 
            $_SESSION["status"] = 0;   
        }        
    ?>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
<!--
$(document).ready(function() {
    
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
    var checkbox = ('<tr><th><input type=\"checkbox\" id = \"sel0\"/\></th>');
    var company = ('<th><input name=\"company[]\" placeholder=\"Please specify company\" type=\"text\"/\></th>');
    var position = ("<th><input name=\"position[]\" placeholder=\"Please specify position\" type=\"text\"/\></th>"); 
    var start_date =  ("<th><input name=\"start_date[]\" placeholder=\"Please specify start date\" type=\"text\"/\></th>");                                                        
    var end_date = ("<th><input name=\"end_date[]\" placeholder=\"Please specify end date\" type=\"text\"/\></th></tr>");        
    $('#table tr:last').after(checkbox + company + position + start_date + end_date);      
  }); 
});
--></script>
