<?php  
       
    require("../includes/config.php"); 
    $id = $_SESSION["id"];
    
    $rows = query("select * from skills where user_id = ?", $id);
    $skills = []; 
    foreach ($rows as $row)
    {  
        $skills[] = [
            "skill" => $row["skill"],
            "exp" => $row["exp"],
            "id" => $row["id"]          
            ];
    }
   
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
         
       if (!empty($_POST["del"]))       
       {
          for ($i = 0; $i<count($_POST["del"]); $i++)
          {            
            query("delete from skills where id =?", $_POST["del"][$i]);                
          }
       }
       else
       {  
           var_dump($_POST);     
           for ($i = 0; $i<count($_POST["skill_name"]); $i++)
           {
                //if the skill is new, insert entered data
                if (empty($_POST["skill_id"][$i]))
                {
                     $result = query("INSERT INTO skills (user_id, skill, exp) VALUES(?, ?, ?)", $id, $_POST["skill_name"][$i], $_POST["skill_exp"][$i]); 
                      
                     verifyResult ($result);         
                }
                
                //if the skill already exists, update it
                else
                {
                     $result = query("update skills set skill = ?, exp = ? where id = ?", $_POST["skill_name"][$i], $_POST["skill_exp"][$i], $_POST["skill_id"][$i]);
                     
                     verifyResult ($result);
                }           
              
           }
        }       
        redirect("/skills.php");  
    
    }    
    
       else
    {        
      render("skills.php", ["skills" => $skills, "title" => "Skills"]);
    }
    

?>
 
