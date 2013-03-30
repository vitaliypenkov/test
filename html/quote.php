<?php  
       
    require("../includes/config.php"); 
    
    $positions = [];     
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {            
        if (empty($_POST["quote"]))
        {
            echo "Please enter symbol";
        } 
        
        $stock = lookup($_POST["quote"]);
        if($stock === false)
        {
            echo "There are no socks matching that symbol";
        }
        
        else
        {
               $price = number_format($stock["price"], 2, '.', ',');
               $positions[] = [
               "symbol" => $stock["symbol"],
               "name" => $stock["name"],
               "price" => $price];               
               render("quote_result.php", ["positions" => $positions, "title" => "Quote"]);
        }
    }   
    else
    {
        render("quote.php", ["title" => "Quote"]);
    }
    
 ?>
 

 
 
 
 
 
