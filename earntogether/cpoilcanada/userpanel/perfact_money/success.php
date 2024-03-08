<?php

session_start();
include("header.php");
$idd=$f['user_id']; 
$date=date('Y-m-d');
$amount=$_REQUEST['PAYMENT_AMOUNT'];
$rand = rand(0000001,9999999);
$invoice_no=$idd.$rand;
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];			
$query="update final_e_wallet set amount=(amount+$amount) where user_id='".$idd."'";
mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$idd','$amount','0','0','$idd','$idd','$date','Add Fund','Add Fund','Add Fund','Add Fund','$invoice_no','','0','TITO Wallet','CURRENT_TIMESTAMP','$urls','','','')");	
$res=mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Error");
$msg="Amount Added Successfully !";
if($res){
 header("location:add_fund.php?msg=$msg");
}
?>