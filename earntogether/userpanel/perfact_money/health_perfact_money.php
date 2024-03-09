<html>

<head>
  <title>Balance</title>
</head>

<body>

<h1>Balance</h1>


<form method="post" action="https://perfectmoney.is/api/step1.asp">
    <!-- <input type="text" name="PAYEE_ACCOUNT" value="U11344205"></br>  -->
    <input type="text" name="PAYEE_ACCOUNT" value="U25117903"></br>
    <input type="text" name="PAYEE_NAME" value="TITO"></br>
    <input type="text" name="PAYMENT_AMOUNT" value="1"></br>
    <input type="text" name="PAYMENT_UNITS" value="USD"></br> 
   <!-- <input type="text" name="PAYMENT_UNITS" value="BTC"></br>  -->
    <input type="text" name="PAYMENT_ID" value="123456"></br>
    <input type="text" name="STATUS_URL" value="http://localhost/perfact_money/success.php"></br>
    <input type="text" name="PAYMENT_URL" value="http://localhost/perfact_money/success.php"></br>
    <input type="text" name="NOPAYMENT_URL" value="http://localhost/perfact_money/success.php"></br>
    <input type="text" name="BAGGAGE_FIELDS" value=""></br>
    <input type="submit" name="submit" value="PAY">
</form>
</body>

</html>
