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
        $id = [];
        
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
                $id[$i] = $d;
           }
           
           for ($i = 0; $i<count($n); $i++)
           {
           
                $result = query("INSERT INTO skills (user_id, skill, exp) VALUES(?, ?, ?)", $id, $n[$i], $e[$i]);
           
                if ($result === false)
                {
                    apologize("Something went wrong. Please try again");
                }  
              //   var_dump($n[$i]); 
              //  var_dump($e[$i]);    
           }
           
           
               
        redirect("/skills.php");
           
        }
    
    }
    
    
       else
    {        
      render("skills.php", ["skills" => $skills, "title" => "Skills"]);
    }
    

?>
 
