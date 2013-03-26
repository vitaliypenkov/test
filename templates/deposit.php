     <ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="deposit.php"><strong>Deposit</strong></a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

<form action="deposit.php" method="post">
    <fieldset>  

        <div class="control-group">
            Your current balance is <b><?php  print($cash) ?> </b>
        </div>         
  <!--      <div class="control-group"> 
            <select name="card">
                <option value="0">Please select card</option>
                <option value="visa">Visa</option>
                <option value="master">Master Card</option>
                <option value="american">American Express</option>
            </select> 
        <div class="control-group">
          <input name="number" placeholder="Card Number" type="text"/>
        </div>   -->
        <div class="control-group">        
          <input name="amount" placeholder="Amount" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Deposit</button>
        </div>
    </fieldset>
</form>
