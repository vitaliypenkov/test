<?php  
       
    require("../includes/config.php"); 
       
     $id = $_SESSION["id"];
     $details = []; 
         
    $rows = query("select * from personal_info where user_id = ?", $id);
    foreach ($rows as $row)
    {  
        $details[] = [
            "fname" => $row["fname"],
            "lname" => $row["lname"],
            "mname" => $row["mname"]            
            ];
    }
     
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {            
        if (empty($_POST["fname"]))
        {
            echo "Please enter symbol";
        } 
        
        if (empty($_POST["lname"]))
        {
            echo "Please enter symbol";
        } 
        
        if (empty($_POST["mname"]))
        {
            echo "Please enter symbol";
        }         
         
        $result = query("update personal_info set fname = ?, lname = ?, mname = ? where user_id = ?", $_POST["fname"],$_POST["lname"], $_POST["mname"], $id); 
        
        verifyResult ($result);
        redirect("/newcv.php");
    }   
    else
    {
        render("newcv.php", ["details" => $details, "title" => "New CV. Step 1: Personal Details"]);
    }
    
 ?>
 

 
 
 
 
 
