<?php  
       
    require("../includes/config.php"); 
    $id = $_SESSION["id"];    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
         
        redirect("/education.php");  
    
    }    
    
       else
    {        
      render("education.php", ["title" => "Education"]);
    }
    

?>
 
