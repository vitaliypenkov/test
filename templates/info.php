<ul class="nav nav-pills">
    <li><a href="info.php"><strong>Personal Info</strong></a></li>
    <li><a href="goal.php">Goal</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="workexp.php">Work Experience</a></li>
    <li><a href="skills.php">Skills</a></li>
    <li><a href="projects.php">Projects</a></li>    
    <li><a href="/">Get Resume</a></li> 
</ul>
<form action="info.php" method="post">
    <fieldset>
        <div class="control-group">
            <div class="title-group">First Name</div>
            <div class="title-group">Last Name</div>
            <div class="title-group">Middle Name</div>
            <input class="input" name='fname' <?php if (!empty($info[0]["fname"])) $info[0]["fname"] == NULL ? print "" : print "value=\"{$info[0]["fname"]}\"" ?> type='text'/>
            <input class="input" name='lname' <?php if (!empty($info[0]["lname"])) $info[0]["lname"] == NULL ? print "" : print "value=\"{$info[0]["lname"]}\"" ?>  type='text'/>
            <input class="input" name='mname' <?php if (!empty($info[0]["mname"])) $info[0]["mname"] == NULL ? print "" : print "value=\"{$info[0]["mname"]}\"" ?>  type='text'/>
            <br/><br/>
            <div class="title-group">E-mail</div>
            <div class="title-group">Address</div>
            <div class="title-group">Phone number</div>            
            <input class="input" name='email' <?php if (!empty($info[0]["email"])) $info[0]["email"] == NULL ? print "" : print "value=\"{$info[0]["email"]}\"" ?>  type='text'/>
            <input class="input" name='phone1' <?php if (!empty($info[0]["phone1"])) $info[0]["phone1"] == NULL ? print "" : print "value=\"{$info[0]["phone1"]}\"" ?>  type='text'/>
            <input class="input" name='phone2' <?php if (!empty($info[0]["phone2"])) $info[0]["phone2"] == NULL ? print "" : print "value=\"{$info[0]["phone2"]}\"" ?>  type='text'/>                        
        </div>
        
        <div class="control-group">     
            <button id="save" type="submit" class="btn">Save</button>
        </div>        
    </fieldset>
    
     <?php 
      
        if(!empty($_SESSION["status"]))
        {      
            if($_SESSION["status"] == 1)
            {
                echo ("<div class = \"info\">");
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

<script>
<!--
$(document).ready(function()
{
    $('.input').change(informAboutChanges);     
});
--></script>


