<ul class="nav nav-pills">
    <li><a href="newcv.php">Personal Info</a></li>
    <li><a href="skills.php"><strong>Skills</strong></a></li>    
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

<form action="skills.php" method="post">
    <fieldset>
        <div>
        Technology    
        </div>
        
         <?php
            $count = count($skills); 
           // var_dump($count);
            var_dump($skills);                
            if (!empty($skills[0]))
            {
                for ($i = 0; $i < $count; $i++)
                {
                    print ("<div class='control-group'>");
                    print ("<input type='checkbox' id = sel" . $i . " name = 'skill" . $i. "_sel'/>");
                  //  print ("<input id=\"skill$i\" name=\"skill_name[]\" value=\"{$skills[$i]["skill"]}\" type=\"text\"/>");  
                    print ("<input id=\"skill$i\" name=\"skill_name[]\" value=\"{$skills[$i]["skill"]}\" type=\"text\"/>");  
                    
                    print ("<select id =\"level$i\" name=\"skill_exp[]\">");   
                    print ("<option value='0'>Please Select</option>");
                    print ("<option value='1' selected='selected'>Junior</option>");
                    print ("<option value='2'>Middle</option>");
                    print ("<option value='3'>Expert</option>");
                    print (" </select>");   
                    print ("<input id=\"id$i\" name=\"skill_id[]\" value=\"{$skills[$i]["id"]}\" style=\"visibility:hidden;\"  type=\"text\"/>");         
                    print ("</div>");
                 }
            }
            
            else
            {
                    print ("<div class='control-group'>");
                    print ("<input type='checkbox' id = sel0 name = 'skill0_sel'/>");
                    print ("<input id=\"skill0\" name=\"skill_name[]\" placeholder=\"Please fill in technology\" type=\"text\"/>");  
                    print ("<select id =\"level0\" name=\"skill_exp[]\">");   
                    print ("<option value='0'>Please Select</option>");
                    print ("<option value='1'>Junior</option>");
                    print ("<option value='2'>Middle</option>");
                    print ("<option value='3'>Expert</option>");
                    print (" </select>");          
                    print ("</div>");
            }
         
         ?>
        

        <div class="control-group">  
            <button type="button" id="add" onClick="add()" class="btn">Add More</button>
        </div>
        <div class="control-group">  
            <button type="button" id="remove" class="btn">Remove Selected</button>
            <button type="submit" class="btn">Save</button>
        </div>
    </fieldset>
</form>

<script type="text/javascript"><!--
$(document).ready(function() {
  var new_btn = $('<button id="btn">Click</button>');          // new button
  var new_span = $('<span>START</span>').addClass('spn');      // new <span> with class="spn"
    var new_imput = $('<input placeholder="HA" ></input>')
  new_btn.insertAfter('#skill');        // insert the new button after the tag with id="idd"

  // now we use the new added button, when is clicked
  $('#btn').click(function() {
    // insert the "new_span" at the beginning inside all DIVs with class="cls"
    new_span.insertAfter('#level');
  });
});
--></script>
