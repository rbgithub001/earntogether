<?php
include("header.php");
$invoice_no=$_GET['invoice_no'];
$status=$_GET['status'];
if($invoice_no!='' && $status=='Shipped')
{
mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set  shipping_status='Shipped', shipped_date='".date('Y-m-d')."' where invoice_no='$invoice_no' and seller_id='".$f['user_id']."'");
header("location:update-franchisee-orders.php?msg=Status Updated!");
exit;
}
else
{
	header("location:franchisee-pending-order.php?msg=Unable to update it now!");
	exit;
}
?>