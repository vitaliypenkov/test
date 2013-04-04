<?php  
       
  require("../includes/config.php"); 
    $id = $_SESSION["id"];
    
    $rows = query("select * from projects where user_id = ?", $id);
    $projects = []; 
    foreach ($rows as $row)
    {  
        $projects[] = [
            "name" => $row["name"],
            "workload" => $row["workload"],
            "responsibilities" => $row["responsibilities"],
            "role" => $row["role"],
            "technologies" => $row["technologies"],                        
            "id" => $row["project_id"]          
            ];
    }
     
    
   if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
         
       if (!empty($_POST["del"]))       
       {
          for ($i = 0; $i<count($_POST["del"]); $i++)
          {            
            query("delete from work_exp where id =?", $_POST["del"][$i]);                
          }
       }
       else
       {  
           //var_dump($_POST);     
           for ($i = 0; $i<count($_POST["name"]); $i++)
           {
                //if the skill is new, insert entered data
                if (empty($_POST["project_id"][$i]))
                {
                    $result = query("INSERT INTO projects (user_id, name, workload, responsibilities, role, technologies ) VALUES(?, ?, ?, ?, ?, ?)", 
                    $id,
                    $_POST["name"][$i],
                    $_POST["workload"][$i],
                    $_POST["responsibilities"][$i],
                    $_POST["role"][$i],
                    $_POST["technologies"][$i]);
                     
                    
                    verifyResult ($result);         
                }
                
                //if the skill already exists, update it
                else
                {
                    $result = query("update projects set name = ?, workload = ?, responsibilities = ?, role = ?, technologies = ? where id = ?",                    
                    $_POST["name"][$i],
                    $_POST["workload"][$i],
                    $_POST["responsibilities"][$i],
                    $_POST["role"][$i],
                    $_POST["technologies"][$i],
                    $_POST["project_id"][$i]);  
                    
                    verifyResult ($result);
                }           
              
           }
        }       
       redirect("/projects.php");  
    
    }       
    
       else
    {        
      render("projects.php", ["projects" => $projects , "title" => "Projects"]);
    }
    

?>
 
