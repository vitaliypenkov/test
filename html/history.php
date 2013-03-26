<?php  
    require("../includes/config.php");  
    
    $id = $_SESSION["id"];
    $positions = [];
    $rows = query("select * from transactions where user_id = ?", $id);
    
    foreach ($rows as $row)
    {    
        $positions[] = [
            "date" => $row["date"],
            "transaction" => $row["transaction"],
            "price" => $row["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"]
            ];
       
    }
    
    render("history.php", ["positions" => $positions, "title" => "History"]);  

?>




