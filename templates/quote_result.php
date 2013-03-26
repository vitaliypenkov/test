<ul class="nav nav-pills">
    <li><a href="quote.php"><strong>Quote</strong></a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

    <?php    
        foreach ($positions as $position) 
        {
            print("A share of " . $position["name"] . " (" . $position["symbol"] . ") costs <b>" . $position["price"] . "</b>");
        }
    ?>  

