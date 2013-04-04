<ul class="nav nav-pills">
    <li><a href="info.php"><strong>Personal Info</strong></a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>
    <li><a href="projects.php">Projects</a></li> 
</ul>
<form action="info.php" method="post">
    <fieldset>

        <div class="control-group">    
            <input name='fname' <?php $info[0]["fname"] == NULL ? print "placeholder=\"First Name\"" : print "value=\"{$info[0]["fname"]}\"" ?> type='text'/>
            <input name='lname' <?php $info[0]["lname"] == NULL ? print "placeholder=\"Last Name\"" : print "value=\"{$info[0]["lname"]}\"" ?>  type='text'/>
            <input name='mname' <?php $info[0]["mname"] == NULL ? print "placeholder=\"Middle Name\"" : print "value=\"{$info[0]["mname"]}\"" ?>  type='text'/>
            <input name='email' <?php $info[0]["email"] == NULL ? print "placeholder=\"E-Mail\"" : print "value=\"{$info[0]["email"]}\"" ?>  type='text'/>
            <input name='phone1' <?php $info[0]["phone1"] == NULL ? print "placeholder=\"Phone Number\"" : print "value=\"{$info[0]["phone1"]}\"" ?>  type='text'/>
            <input name='phone2' <?php $info[0]["phone2"] == NULL ? print "placeholder=\"Phone Number\"" : print "value=\"{$info[0]["phone2"]}\"" ?>  type='text'/>                        
        </div>
        
        <div class="control-group">     
            <button type="submit" class="btn">Save</button>
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


