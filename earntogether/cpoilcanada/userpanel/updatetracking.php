<?php
include("header.php");
$invoice_no=$_POST['invoice_no'];
$id=$_POST['id'];
$tracking=$_POST['tracking'];
$remark=$_POST['remark'];
if($invoice_no!='' && $id!='')
{
mysqli_query($GLOBALS["___mysqli_ston"], "update amount_detail set reason='$remark', false_invoice='$tracking' where invoice_no='$invoice_no' and seller_id='".$f['user_id']."'");
header("location:franchisee-shipped-order.php?msg=Status Updated!");
exit;
}
else
{
	header("location:franchisee-pending-order.php?msg=Unable to update it now!");
	exit;
}
?>