<?php
    
    require("../includes/config.php"); 
  
    $id  = $_SESSION["id"]; 
    $rows = [];
    if (!empty($_GET["user_id"]))
    {
        $rows = query("select * from personal_info where user_id = ?", $_GET["user_id"]);
    }
    
  //  $rows = query("select * from personal_info where user_id = ?", $id);
    $info = [];
    //var_dump($_GET);
    foreach ($rows as $row)
    {  
        $info[] = [
            "fname" => $row["fname"],
            "lname" => $row["lname"],
            "mname" => $row["mname"],
            "email" => $row["email"], 
            "phone1" => $row["phone1"], 
            "phone2" => $row["phone2"]         
            ];
    }   
    
    $rows = query("select * from goal where user_id = ?", $id);
    $goal = []; 
    foreach ($rows as $row)
    {  
        $goal[] = [
            "position" => $row["position"],
            "objective" => $row["objective"]
            ];
    } 
    
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
    
    renderMiddlePart("view.php", ["edu" => $edu, "wexps" => $wexps, "goal" => $goal, "info" => $info, "title" => "Personal Info"]);
?>
