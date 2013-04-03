<?php  
       
    require("../includes/config.php"); 
    $id = $_SESSION["id"];   
    
    $rows = query("select * from goal where user_id = ?", $id);
    $goal = []; 
    foreach ($rows as $row)
    {  
        $goal[] = [
            "position" => $row["position"],
            "objective" => $row["objective"]
            ];
    } 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
                  
        $result = query("INSERT INTO goal (user_id, position, objective) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE position = VALUES (position), objective = VALUES (objective) ",
        $id, $_POST["position"], $_POST["objective"] );
        
        verifyResult ($result);
        
        redirect("/goal.php");  
    
    }    
    
       else
    {        
      render("goal.php", ["goal" => $goal ,"title" => "Goal"]);
    }
    

?>
 
