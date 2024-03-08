<?php
ob_start();
include("header.php");
if($_SESSION['ag']!='')
{

?>

  <form action="paypal.php?sandbox=1" method="post" id="paypal_money"> <?php // remove sandbox=1 for live transactions ?>
    <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="invoice" value="<?php echo $_SESSION['ag'].$_f['user_id'];?>" />
    
      <input type="hidden" name="product_id" value="<?php echo $_SESSION['ag'].$_f['user_id'];?>" />
      <input type="text" name="product_name" value="Product Purchase From Cognisance Sciences" />
      
       <input type="text" name="product_quantity" value="1" />
       <input type="text" name="product_amount" value="<?php echo number_format($_SESSION['ag'],2);?>" />
       
        <input type="text" name="payer_fname" value="<?php echo $f['first_name'];?>" />
      
        <input type="text" name="payer_lname" value="<?php echo $f['last_name'];?>" />
        
        <input type="hidden" name="payer_address" value="<?php echo $f['address'];?>" />
       
        <input type="hidden" name="payer_city" value="<?php echo $f['city'];?>" />
       
        <input type="hidden" name="payer_state" value="<?php echo $f['state'];?>" />
      
        <input type="hidden" name="payer_zip" value="<?php echo $f['zipcode'];?>" />
       
        <input type="hidden" name="payer_country" value="<?php echo $f['country'];?>" />
     <input type="hidden" name="payer_email" value="<?php echo $f['email'];?>" />
   

    </form>

<script type="text/javascript">
    document.getElementById('paypal_money').submit();
</script>
<?php
}
?>