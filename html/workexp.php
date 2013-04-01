<?php  
       
  require("../includes/config.php"); 
    $id = $_SESSION["id"];
    
    $rows = query("select * from work_exp where user_id = ?", $id);
    $wexps = []; 
    foreach ($rows as $row)
    {  
        $wexps[] = [
            "company" => $row["company"],
            "position" => $row["position"],
            "start_date" => $row["start_date"],
            "end_date" => $row["end_date"],                        
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
           for ($i = 0; $i<count($_POST["company"]); $i++)
           {
                //if the skill is new, insert entered data
                if (empty($_POST["work_id"][$i]))
                {
                    query("INSERT INTO work_exp (user_id, company, position, start_date, end_date) VALUES(?, ?, ?, ?, ?)" , 
                    $id,
                    $_POST["company"][$i],
                    $_POST["position"][$i],
                    $_POST["start_date"][$i],
                    $_POST["end_date"][$i]);           
                }
                
                //if the skill already exists, update it
                else
                {
                    query("update work_exp set company = ?, position = ?, start_date = ?, end_date = ? where user_id = ?",                    
                    $_POST["company"][$i],
                    $_POST["position"][$i],
                    $_POST["start_date"][$i],
                    $_POST["end_date"][$i],
                    $id);  
                }           
              
           }
        }       
       // redirect("/workexp.php");  
    
    }       
    
       else
    {        
      render("workexp.php", ["wexps" => $wexps , "title" => "Work Experience"]);
    }
    

?>
 
