<?php
ob_start();
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
 $_SESSION['rand'] = mt_rand(1111111,9999999); 
 $rand=rand(0,1000000);
 $User=$_GET['id'];
 $status=$_GET['status'];
 $issue_date=date("Y-m-d");

  $amount_usered=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where id='$User'"));
  $amount = $amount_usered['usd'];
  $paymode = $amount_usered['payment_mode'];
  $tranno = $amount_usered['tranno'];

  
if($status=='1' && $amount_usered['apply_for']=='Activation Wallet'){
   
    $selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$amount_usered['user']."'"));
    $request_amount1=$selecting['amount']; 
	$request_amounts1=$request_amount1+$amount;
	
mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount='$request_amounts1' where user_id='".$amount_usered['user']."'");



mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`,`invoice_no`, `product_name`, `status`, `ewallet_used_by`) VALUES (NULL, '$tranno', '".$amount_usered['user']."', '$amount', '0', '0', '123456', '".$amount_usered['user']."', '".date("Y-m-d")."', 'Payment Approved', 'Payment Approved From Admin', '0', 'Payment Approved', '$tranno', 'Payment Approved', '0', 'Activation Wallet')");

mysqli_query($GLOBALS["___mysqli_ston"], "update paymentproof set status='$status' where id='$User'");


}
if($status=='1' && $amount_usered['apply_for']=='Topup Wallet')
{
     $selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from topup_e_wallet where user_id='".$amount_usered['user']."'"));
		$request_amount1=$selecting['amount']; 
		$request_amounts1=$request_amount1+$amount;
	
mysqli_query($GLOBALS["___mysqli_ston"], "update topup_e_wallet set amount='$request_amounts1' where user_id='".$amount_usered['user']."'");



mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`,`invoice_no`, `product_name`, `status`, `ewallet_used_by`) VALUES (NULL, '$tranno', '".$amount_usered['user']."', '$amount', '0', '0', '123456', '".$amount_usered['user']."', '".date("Y-m-d")."', 'Payment Approved', 'Payment Approved From Admin', '0', 'Payment Approved', '$tranno', 'Payment Approved', '0', 'Topup Wallet')");

mysqli_query($GLOBALS["___mysqli_ston"], "update paymentproof set status='$status' where id='$User'");
}


if($status=='2'){
mysqli_query($GLOBALS["___mysqli_ston"], "update paymentproof set status='$status' where id='$User'");

}
header("location:pending-payment.php?msg= Updated Successfully!");
?>