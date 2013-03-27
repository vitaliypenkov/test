<?php
    
    require("../includes/config.php");   
    
    $positions = [];
    $id  = $_SESSION["id"];
    
    $rows = query("select * from portfolio where id = ?", $id);
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"]
            ];
        }
    }
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);

?>
