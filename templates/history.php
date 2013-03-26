<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php"><strong>History</strong></a></li>
    <li><a href="deposit.php">Deposit</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

<table class="table table-bordered">
    <?php    
            print("<tr>");
            print("<th>Transaction</th>");
            print("<th>Date/Time</th>");
            print("<th>Symbol</th>");        
            print("<th>Shares</th>");
            print("<th>Price</th>");
            print("</tr>");

        foreach ($positions as $position) 
        {
            
            print("<tr>");
            print("<td>" . $position["transaction"] . "</td>");
            print("<td>" . $position["date"] . "</td>");
            print("<td>" . $position["symbol"] . "</td>");            
            print("<td>" . $position["shares"] . "</td>");
            print("<td>" . $position["price"] . "</td>");           
            print("</tr>");
        }
    ?>
</table>


