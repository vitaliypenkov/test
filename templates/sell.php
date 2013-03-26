<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php"><strong>Sell</strong></a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="deposit.php">Deposit</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">  
            <select name="symbol">
            <?php
        
                foreach($symbols as $i => $symbol)
                {
                    $symbols[0] = "Please select";
                    $symbols[$i + 1] = $symbol;
                }        
                foreach($symbols as $symbol)
                {
                    echo '<option value="' . $symbol .  '">' . $symbol . '</option>';
                }
            ?>
            </select> 
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Sell</button>
        </div>
    </fieldset>
</form>

