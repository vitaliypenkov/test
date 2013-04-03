<ul class="nav nav-pills">
    <li><a href="newcv.php"><strong>Personal Info</strong></a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>    
    <li><a href="logout.php">Log Out</a></li>
</ul>
<form action="newcv.php" method="post">
    <fieldset>

        <div class="control-group">    
            <input name='fname' <?php $details[0]["fname"] == NULL ? print "placeholder=\"First Name\"" : print "value=\"{$details[0]["fname"]}\"" ?> type='text'/>
            <input name='lname' <?php $details[0]["lname"] == NULL ? print "placeholder=\"Last Name\"" : print "value=\"{$details[0]["lname"]}\"" ?>  type='text'/>
            <input name='mname' <?php $details[0]["mname"] == NULL ? print "placeholder=\"Middle Name\"" : print "value=\"{$details[0]["mname"]}\"" ?>  type='text'/>
            <input name='email' <?php $details[0]["email"] == NULL ? print "placeholder=\"E-Mail\"" : print "value=\"{$details[0]["email"]}\"" ?>  type='text'/>
            <input name='phone1' <?php $details[0]["phone1"] == NULL ? print "placeholder=\"Phone Number\"" : print "value=\"{$details[0]["phone1"]}\"" ?>  type='text'/>
            <input name='phone2' <?php $details[0]["phone2"] == NULL ? print "placeholder=\"Phone Number\"" : print "value=\"{$details[0]["phone2"]}\"" ?>  type='text'/>                        
        </div>
        
        <div class="control-group">     
            <button type="submit" class="btn">Save</button>
        </div>        
    </fieldset>
    
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
            echo ("<div class = \"error\">");
            echo ("An error occured please try again");        
            echo ("</div>"); 
            $_SESSION["status"] = 0;   
        }        
    ?>
</form>


