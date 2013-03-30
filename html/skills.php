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
      // var_dump($_POST["skill_name"]);
    // var_dump($_POST);
     /*   if (empty($_POST["skill_name"]))
        {
            //foreach()
            apologize("Please enter skill first");
            
        } */
        
    //    else
        {
        $n = [];
        $e = [];
        $skill_id = [];
        
           foreach($_POST["skill_name"] as $i => $name)
           {           
                $n[$i] = $name;
           }
             
           foreach($_POST["skill_exp"] as $i => $exp)
           {
                $e[$i] = $exp;
           }
           
           foreach($_POST["skill_id"] as $i => $d)
           {
                $skill_id[$i] = $d;
           }
           
           for ($i = 0; $i<count($n); $i++)
           {
                //if the skill is new, insert entered data
                if (empty($skill_id[$i]))
                {
                    query("INSERT INTO skills (user_id, skill, exp) VALUES(?, ?, ?)", $id, $n[$i], $e[$i]);
           
                }
                
                //if the skill already exists, update it
                else
                {
                    query("update skills set skill = ?, exp = ?", $n[$i], $e[$i]);
                }           
              
           }
               
        redirect("/skills.php");
           
        }
    
    }    
    
       else
    {        
      render("skills.php", ["skills" => $skills, "title" => "Skills"]);
    }
    

?>
 
