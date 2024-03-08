<?php
ob_start();
include("../lib/config.php");
//mysql_connect("localhost","root","");
//mysql_select_db("kamlesh_mike");
$status=$_GET['val'];
$id=$_GET['id'];

if($status=='Approved')
{
	mysqli_query($GLOBALS["___mysqli_ston"], "update contact_reload set meter='0' where id='$id'");
	echo "1";
	//header("Location:reload.php?msg=Topup Sucessfully Approved!!");
}
elseif($status=='Cancel')
{
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$invoice = rand(1000000000,9000000000);
	$start=date('Y-m-d');

	mysqli_query($GLOBALS["___mysqli_ston"], "update contact_reload set meter='1' where id='$id'");

	$sql=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_reload where id='$id'"));	
	$pv = $sql['amount'];
	$uid = $sql['user_id'];

	mysqli_query($GLOBALS["___mysqli_ston"], "update reward_e_wallet set amount=(amount+$pv) where user_id='$uid'");

	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$pv','0','0','$uid','123456','$start','Topup Cancelled','Topup Cancelled  by 123456','Topup Cancelled  by 123456','Topup Cancelled  by 123456','$invoice','Topup Cancelled  by 123456','0','Reload Wallet','$urls')");

	
	echo "2";
	//header("Location:reload.php?msg=Topup Request is being Cancelled!");
}
else
{
	echo "3";
	//header("Location:reload.php?msg=Please Select Status!!");
}
?>
