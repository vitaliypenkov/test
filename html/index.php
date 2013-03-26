<?php
    
    require("../includes/config.php");   
    
    $positions = [];
    $cash;
    $id  = $_SESSION["id"];
    $rows = query("select cash from users where id = ?", $id);
    foreach ($rows as $row)
    {         
        $cash = number_format($row["cash"], 2, '.', ',');
    }
    
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
    render("portfolio.php", ["cash" => $cash,"positions" => $positions, "title" => "Portfolio"]);

?>
