<?php  
       
    require("../includes/config.php"); 
       
     $id = $_SESSION["id"];
     $info = []; 
         
    $rows = query("select * from personal_info where user_id = ?", $id);
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
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {            
                 
        $result = query("update personal_info set fname = ?, lname = ?, mname = ?, email = ?, phone1 = ?, phone2 = ? where user_id = ?",
        $_POST["fname"],$_POST["lname"], $_POST["mname"], $_POST["email"], $_POST["phone1"], $_POST["phone2"], $id); 
        
        verifyResult ($result);
        redirect("/info.php");
    }   
    else
    {
        render("info.php", ["info" => $info, "title" => "Personal Details"]);
    }
    
 ?>
 

 
 
 
 
 
