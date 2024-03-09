<?php
include("lib/config.php");
$date=date('Y-m-d');
$dist=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(user_id) from user_registration where user_rank_name='Paid Member'");
while($dist1=mysqli_fetch_array($dist))
{
	$counts=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where ref_id='".$dist1['user_id']."'"));
	if($counts>=5)
	{
		$uid=$dist1['user_id'];
		$life=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$dist1['user_id']."' and status='Active' order by id desc limit 0,1"));
		$lifeid=$life['id'];
		$lifeamount=$life['amount'];
		mysqli_query($GLOBALS["___mysqli_ston"], "update lifejacket_subscription set status='Deactive' where id='$lifeid'");
		mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$lifeamount) where user_id='".$dist1['user_id']."'");
		mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Free Member', designation='Free Member' where user_id='".$dist1['user_id']."'");

	$invoice_no=rand(100000,999999);
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$lifeamount','0','0','$uid','123456','$date','Fastest Referral Income','Earn Fastest Referral Income','Commission of Fastest Referral Income ','Fastest Referral Income','$invoice_no','Fastest Referral Income','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");	
	}
}

?>