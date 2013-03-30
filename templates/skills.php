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
           // var_dump($skills);   
            //if any skill found, display prepopulated fields             
            if (!empty($skills[0]))
            {
                for ($i = 0; $i < $count; $i++)
                {                       
                    print ("<div id=div$i class='control-group'>");
                    print ("<input type='checkbox' id = \"sel$i\" name = \"{$skills[$i]["id"]}\" />");                  
                    print ("<input id=\"skill$i\" name=\"skill_name[]\" value=\"{$skills[$i]["skill"]}\" type=\"text\"/>");                      
                    print ("<select id =\"level$i\" name=\"skill_exp[]\">");
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
                    print ("<input id=\"id$i\" name=\"skill_id[]\" value=\"{$skills[$i]["id"]}\" style=\"visibility:hidden;\"  type=\"text\"/>");         
                    print ("</div>");
                 }
            }           
            
            // if no skills found, display empty fields
            else
            {
                    print ("<div id=id0 class='control-group'>");
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
            <button type="submit" id="del" class="btn">Delete Selected</button>
            <button type="submit" class="btn">Save</button>
        </div>
    </fieldset>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
<!--
$(document).ready(function() {
 // var new_btn = $('<button id="btn">Click</button>');          // new button
  var new_btn = $('<button id="btn">HA</button>');      // new <span> with class="spn"
    var new_input = $('<input placeholder="HA" ></input>');
    var new_div = $('<div id=div1 ></div>').addClass("control-group");
    var new_check = $("<input type='checkbox' id = 'sel1' /\>");
    var new_name = $("<input id=skill1 name=skill_name[] placeholder=\"Please fill in technology\" type=\"text\"/\>");
   
   // var new_exp = $("<option value=\"0\">Please Select</option>");
   var new_exp = $("<select id =\"level1\" name=\"skill_exp[]\">");
 // new_btn.insertAfter('#add');        // insert the new button after the tag with id="idd"

  // now we use the new added button, when is clicked
  $('#add').click(function() {
    // insert the "new_span" at the beginning inside all DIVs with class="cls"    
    new_div.insertAfter('#div0');
    new_check.appendTo('#div1');
    new_name.appendTo('#div1');
    new_exp.appendTo('#div1');
    
    selectValues = {"0": "Please select", "1": "Junior", "2": "Middle", "3": "Expert" };
    $.each(selectValues, function(key, value) {   
     $('#level1')
          .append($('<option>', { value : key })
          .text(value)); 
    });
    
  });
});
--></script>
