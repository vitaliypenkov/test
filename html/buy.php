<?php         
          
    require("../includes/config.php"); 
         
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {            
        if (empty($_POST["symbol"]))
        {
            apologize("Please enter symbol");
        } 
           
        $stock = lookup($_POST["symbol"]);
        if($stock === false)
        {
            apologize("There are no stocks matching that symbol");
        }
            
        $res = preg_match("/^\d+$/", $_POST["shares"]);            
        if ($res === 0)
        {
            apologize("Please enter an integer");
        }              
        else
        {       
            $price = number_format($stock["price"], 2, '.', ',');
            $id = $_SESSION["id"];
            $shares = $_POST["shares"];
            $cash_available;
            $rows = query("select cash from users where id = ?", $id);
            foreach ($rows as $row)
            {         
                $cash_available = number_format($row["cash"], 2, '.', '');
            }
               
            $cash_needed = $shares * $price;                
               
            if ($cash_available < $cash_needed)
            {
                 apologize("You don't have sufficient funds. Please try less number of shares.");
            }   
            else
            {  
                $result = query("INSERT INTO portfolio (id, symbol, name, shares, price) VALUES(?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
                $id, $stock["symbol"], $stock["name"], $shares, $price);
               
               if ($result === false)
               {
                    apologize("Something went wrong. Please try again");
               }      
               else
               {
                     query("UPDATE users SET cash = cash - ? WHERE id = ?", $cash_needed, $id);
                     query("INSERT INTO transactions (user_id, transaction, symbol, shares, price) VALUES(?, 'BUY', ?, ?, ?)", $id, $stock["symbol"],$shares , $price); 
                   
                     redirect("/");
               }
            }   
               
         }
     }
     else
     {
        render("buy.php", ["title" => "Buy"]);
     }
 ?>
 

 
 
 
 
 
