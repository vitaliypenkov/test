<?php  
       
  require("../includes/config.php"); 
    $id = $_SESSION["id"];
    
    $rows = query("select * from education where user_id = ?", $id);
    $edu = []; 
    foreach ($rows as $row)
    {  
        $edu[] = [
            "qualification" => $row["qualification"],
            "institution" => $row["institution"],
            "start_date" => $row["start_date"],
            "end_date" => $row["end_date"],                        
            "edu_id" => $row["id"]          
            ];
    }
     
    
   if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
         
       if (!empty($_POST["del"]))       
       {
          for ($i = 0; $i<count($_POST["del"]); $i++)
          {            
            query("delete from education where id =?", $_POST["del"][$i]);                
          }
       }
       else
       {  
            
           
          // var_dump($_SESSION);     
           for ($i = 0; $i<count($_POST["institution"]); $i++)
           {
                //if the skill is new, insert entered data
                if (empty($_POST["edu_id"][$i]))
                {
                    $result = query("INSERT INTO education (user_id, qualification, institution, start_date, end_date) VALUES(?, ?, ?, ?, ?)" , 
                    $id,
                    $_POST["qualification"][$i],
                    $_POST["institution"][$i],
                    $_POST["start_date"][$i],
                    $_POST["end_date"][$i]); 
                    
                    verifyResult ($result);
                }
                
                //if the skill already exists, update it
                else
                {
                    $result = query("update education set qualification = ?, institution = ?, start_date = ?, end_date = ? where id = ?",                    
                    $_POST["qualification"][$i],
                    $_POST["institution"][$i],
                    $_POST["start_date"][$i],
                    $_POST["end_date"][$i],
                    $_POST["edu_id"][$i]);  
                    
                    verifyResult ($result);                    
                }           
              
           }
        }       
       redirect("/education.php");  
    
    }       
    
       else
    {        
      render("education.php", ["edu" => $edu , "title" => "Education"]);
    }    

?>
 
