<?php  

    require("../includes/config.php");     
    $id = $_SESSION["id"];
    $max_deposit_amount = 10000;
    $max_balance_amount = 1000000;
    $symbols = [];
    $cash = query("select cash from users where id = ?", $id);  
    $cash = $cash[0]["cash"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {     
       /* if(empty($_POST["card"]))
        {
            apologize("Please select your credit card type");
        }
               
        if (($_POST["card"]) === "Please select card" )
        {
             apologize("Please select your credit card type");
        } 
         
        if (empty($_POST["number"]))
        {
             apologize("Please select your credit card number");
        } 
         */
        $res = preg_match("/^\d+$/", $_POST["amount"]);            
        if ($res === 0)
        {
            apologize("Please enter a valid amount");
        }    
        
        if ($_POST["amount"] > $max_deposit_amount)
        {
            apologize("We are greatly sorry, but we don't process deposits greater than 10,000 at a time");
        }   
        
        if ($cash + $_POST["amount"] > $max_balance_amount )
        {
            apologize("Oh, please don't be so greedy. Max balance amount you might ever need is $max_balance_amount");
        }   
                                  
        else
        {     
            query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount"], $id);
            query("INSERT INTO transactions (user_id, transaction, price) VALUES(?, 'DEPOSIT', ?)", $id, $_POST["amount"]); 
       
            redirect("/");
        }
    }
    else
    {
        render("deposit.php", ["cash" => $cash, "title" => "Deposit"]);
    }

?>




