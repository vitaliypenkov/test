<ul class="nav nav-pills">
    <li><a href="newcv.php">Personal Info</a></li>
    <li><a href="skills.php"><strong>Skills</strong></a></li>    
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>


<?php

function add()
{
print("<div class='control-group'>");
print("<input name='skill1_name' placeholder='Skill1' type='text'/>");
print("");
print("");
print("");
print("");
}
   
?>
<form action="newcv.php" method="post">
    <fieldset>
        <div>
        Technology    
        </div>
        <div class="control-group">
          <input id="skill" name="skill1_name" placeholder="Skill1" type="text"/>
          <select idd ="level" name="skill1_exp">
            <option value="0">Please Select</option>
            <option value="1">Junior</option>
            <option value="2">Middle</option>
            <option value="3">Expert</option>
          </select>
        </div>
        <div class="control-group">  
            <button type="button" id="add" onClick="add()" class="btn">Add</button>
        </div>
        <div class="control-group">  
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
