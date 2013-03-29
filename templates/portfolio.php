<ul class="nav nav-pills">
    <li><a href="newcv.php">Personal Info</a></li>
    <li><a href="skills.php">Skills</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="deposit.php">Deposit</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

<table class="table table-bordered">
    <?php    
            print("<tr>");
            print("<th>Symbol</th>");
            print("<th>Name</th>");
            print("<th>Shares</th>");
            print("<th>Price</th>");
            print("<th>TOTAL</th>");
            print("</tr>");

        foreach ($positions as $position) 
        {
            
            print("<tr>");
            print("<td>" . $position["symbol"] . "</td>");
            print("<td>" . $position["name"] . "</td>");
            print("<td>" . $position["shares"] . "</td>");
            print("<td>" . $position["price"] . "</td>");
            print("<td>" . $position["price"] * $position["shares"] . "</td>");
            print("</tr>");
        }
        
         /*   print("<tr>");
            print("<td>CASH</td>");
            print("<td></td>");
            print("<td></td>");
            print("<td></td>");
            print("<td>" . $cash . "</td>");
            print("</tr>");*/

    ?>
</table>


