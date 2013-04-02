<?php  
       
  require("../includes/config.php"); 
    $id = $_SESSION["id"];
    
    $rows = query("select * from education where user_id = ?", $id);
    $edu = []; 
    foreach ($rows as $row)
    {  
        $edu[] = [
            "qalification" => $row["qalification"],
            "institution" => $row["institution"],
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
            query("delete from work_exp where id =?", $_POST["del"][$i]);                
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
                    query("update work_exp set company = ?, position = ?, start_date = ?, end_date = ? where id = ?",                    
                    $_POST["company"][$i],
                    $_POST["position"][$i],
                    $_POST["start_date"][$i],
                    $_POST["end_date"][$i],
                    $_POST["work_id"][$i]);  
                }           
              
           }
        }       
       redirect("/workexp.php");  
    
    }       
    
       else
    {        
      render("education.php", ["edu" => $edu , "title" => "Education"]);
    }
    

?>
 
