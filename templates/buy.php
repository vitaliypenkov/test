<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php"><strong>Buy</strong></a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="deposit.php">Deposit</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>
<form action="buy.php" method="post">
    <fieldset>
        <div class="control-group">
          <input name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="control-group">
          <input name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Buy</button>
        </div>
    </fieldset>
</form>
