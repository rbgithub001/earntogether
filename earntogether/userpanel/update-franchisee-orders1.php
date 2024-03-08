<?php
include("header.php");
$invoice_no=$_GET['invoice_no'];
$status=$_GET['status'];
if($invoice_no!='' && $status=='Delivered')
{
mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set  shipping_status='Delivered', deliver_date='".date('Y-m-d')."' where invoice_no='$invoice_no' and seller_id='".$f['user_id']."'");
header("location:franchisee-deliver-order.php?msg=Status Updated!");
exit;
}
else
{
	header("location:franchisee-shipped-order.php?msg=Unable to update it now!");
	exit;
}
?>