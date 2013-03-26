<?php  

    require("../includes/config.php");     
    $id = $_SESSION["id"];
    $symbols = [];
    $rows = query("select symbol from portfolio where id = ?", $id);
    $i = 0;
    
    foreach ($rows as $row)
    {
        $symbols [$i] = $row["symbol"];        
        $i++;    
    }      
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {     
        if(empty($_POST["symbol"]))
        {
            apologize("Please select a symbol to sell first");
        }
               
        if (($_POST["symbol"]) === "Please select" )
        {
             apologize("Please select a symbol to sell first");
        }            
        else
        {        
             $rows = query("select * FROM portfolio WHERE id = ? AND symbol = ?", $id, $_POST["symbol"]);
             $shares;
             $price;
             foreach ($rows as $row)
             {
                $shares = $row["shares"];
                $price = $row["price"];
             }  
                        
             $cash = $price * $shares;            
            
             $result = query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $id, $_POST["symbol"]);
        
             if ($result === false)
             {
                apologize("Something went wrong. Please try again");
             }
             else
             {
                query("UPDATE users SET cash = cash + ? WHERE id = ?", $cash, $id);
                query("INSERT INTO transactions (user_id, transaction, symbol, shares, price) VALUES(?, 'SELL', ?, ?, ?)", $id, $_POST["symbol"],$shares , $price); 
       
                redirect("/");
             } 
        }
    }
    else
    {
        render("sell.php", ["symbols" => $symbols, "title" => "Sell"]);
    }

?>




