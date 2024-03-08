<?php 
ob_start();
include("header.php");
if(isset($_POST['submit'])){
$rand=rand(0,1000000);
$wallet_from=$_POST['wallet_from'];
$sub8=$_POST['subject8'];
$user_ids=$_POST['id'];

if($_POST['password']==$f['password'])
{
if($wallet_from=='withdrawal')
{
$res_reg1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM final_e_wallet WHERE user_id='$user_ids'"));
$amount1=$res_reg1['amount'];
$amount=$amount1;
$wit_table='final_e_wallet';

$transaction_charge=0;

/*if($sub8<350)
{
$transaction_charge=0;
}
else
{
$transaction_charge=5;	
}*/

$transaction_charge1=$sub8*$transaction_charge/100;
$subamounts=$sub8-$transaction_charge1;
}
$sub1=$_POST['subject1'];
//$sub2=$_POST['subject2'];
$sub3=$_POST['subject3'];
$sub4=$_POST['subject4'];
$sub5=$_POST['subject5'];
$sub6=$_POST['subject6'];
$sub7=$_POST['subject7'];
$sub9=$_POST['subject9'];
$send_id=$_POST['id'];
$date=date("Y-m-d");
if($amount>=$sub8)
{
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$user_ids'"));
$request_amount1=$selecting['amount']; print_r("<br/>");
$request_amounts1=$request_amount1-$sub8; print_r("<br/>");
mysqli_query($GLOBALS["___mysqli_ston"], "update $wit_table set amount='$request_amounts1' where user_id='$user_ids'");
mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) VALUES (NULL, '$rand', '$user_ids', '0', '$sub8', '0', '123456', '$user_ids', '$date', 'Withdrawal Request', 'Withdrawal Request From Admin', '0', 'Withdrawal Request ', '$rand', 'Withdrawal Request', '0', 'Income Wallet','$urls')");
mysqli_query($GLOBALS["___mysqli_ston"], "insert into withdraw_request values (NULL,'$rand','$send_id','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$subamounts','$sub9','0','$date','','','$wit_table','$sub8','$transaction_charge')");
$msg="Request Sent Successfully !";
header("location:withdraw-request-new.php?msg=$msg");
exit;
}
else
{
  $msg="Sorry ! Insufficient Balance In Your Income Wwallet !";
  header("location:withdraw-request-new.php?msg=$msg");
  exit;
}
}
else
{
   $msg="Sorry ! Wrong Password!";
  header("location:withdraw-request-new.php?msg=$msg");
  exit;
}

}

?>