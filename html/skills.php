<?php  
       
    require("../includes/config.php"); 
    $id = $_SESSION["id"];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
    
    
    }
    
    
       else
    {
        render("skills.php", ["title" => "Skills"]);
    }
    

?>
 
