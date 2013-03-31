<?php  
       
    require("../includes/config.php"); 
    $id = $_SESSION["id"];    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
         
        redirect("/goal.php");  
    
    }    
    
       else
    {        
      render("goal.php", ["title" => "Goal"]);
    }
    

?>
 
