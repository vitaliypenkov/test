<ul class="nav nav-pills">
    <li><a href="newcv.php"><strong>Personal Info</strong></a></li>
    <li><a href="skills.php">Skills</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>
<form action="newcv.php" method="post">
    <fieldset>
        <div>
            
        </div>
        <div class="control-group">  
        <?php
            if ($details[0]["fname"] == NULL)
            {
                print ("<input name='fname' placeholder='First Name' type='text'/>");
            }
            else
            {
                print ("<input name='fname' value=" . $details[0]["fname"] ." type='text'/>");
            }        
            if ($details[0]["lname"] == NULL)
            {
                print ("<input name='lname' placeholder='Last Name' type='text'/>");
            }
            else
            {
                print ("<input name='lname' value=" . $details[0]["lname"] ." type='text'/>");
            }
        
            if ($details[0]["mname"] == NULL)
            {
                print ("<input name='mname' placeholder='Middle Name' type='text'/>");
            }
            else
            {
                print ("<input name='mname' value=" . $details[0]["mname"] ." type='text'/>");
            }
        ?>  
                
        </div>
        <div class="control-group">        
          <!--  <button type="button" class="btn">Back</button>  -->         
            <button type="submit" class="btn">Save</button>
        </div>
        <div class="control-group">
            
        </div>
    </fieldset>
</form>


