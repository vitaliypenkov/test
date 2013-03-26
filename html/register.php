<?php
    
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
              
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Passwords don't match.");
        }
        
        $rows = query("select * from users where username = ?", $_POST["username"]);
        
        if (count($rows) > 0)
        {
            apologize('Username ' . $_POST["username"] . ' is already taken. Please try another name');
        }
        
        else
        {        
            $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 1)", $_POST["username"], crypt($_POST["password"]));
        
            if ($result === false)
            {
                apologize("Something went wrong. Please try again");
            }
            
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id"); 
                $id = $rows[0]["id"];                
                $_SESSION["id"] = $id;
                redirect("/");
            }
        }
        
        
        
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
