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
$User=$_GET['user'];
$invoice_no=$_GET['invoice_no'];
if($User!='' && $invoice_no!='')
{
mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set seller_id='$User', shipping_status='Pending', assign_date='".date('Y-m-d')."' where invoice_no='$invoice_no'");
header("location:manage-order.php?msg=Status Updated!");
exit;
}
else
{
	header("location:manage-order.php?msg=Unable to update it now!");
	exit;
}
?>