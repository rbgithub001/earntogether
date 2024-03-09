<?php
//echo 'hello='.$id=$_SESSION['userpanel_user_id'];
ob_start();
include('../lib/config.php');
//include('function.php');
date_default_timezone_set("Asia/Singapore"); 
$times=date('Y-m-d H:i:s');
if(isset($_POST['submit']))
echo 'hello='.$id=$_SESSION['userpanel_user_id'];
$userid=$_SESSION['userpanel_user_id'];
{
$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$id."' || username='".$userid."'"));
$userid=$cure['user_id'];
$username=$cure['username'];
$package=$_POST['product'];
$lamount=$_POST['amount'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$meter=$_POST['meter'];
//$ewa='cp3';
$ewa='reward_e_wallet';
$walls="Reload Wallet";



/*if($package=='14' || $package=='15' )
{
$mobile12=substr($mobile,0,1);	
$mnb='8';
$mobile="0".$mobile;
}
else
{
$mobile12=substr($mobile,0,2);
$mnb='01';
$mobile=$mobile;
}
if($mobile12!=$mnb)
{
header("location:buy-product-reload.php?msg=Wrong Mobile Number ! Should start with $mnb only");
exit;
}*/


if($mobile!=$_POST['cmobile'])
{
header("location:buy-product-reload.php?msg=Confirm Mobile Number Not Match ! Try Again !");
exit;
}

$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where id='".$package."'"));
$plan_type=$cure['type'];
$plan_name=$cure['name'];
$short=$cure['short'];

$rm1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from reload_pv where pid='".$package."' and pv='$lamount'"));
$rm=$rm1['rm'];

//echo $rm;print_r("<br/>");
//echo $package;print_r("<br/>");
//echo $lamount;print_r("<br/>");
//echo $mobile12;print_r("<br/>");
//echo $meter;print_r("<br/>");
//exit;

$rand = rand(1000000000,9000000000);
$start=date('Y-m-d');
echo "select * from user_registration where user_id='$userid' and t_code='$password'";
$t_code1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' and t_code='$password'"));

if($package!='' && $lamount!='' && $password!='' && $userid!='')

{

	

	

			if($t_code1>0)

			{

			
				$user_userid=$userid;

				

				$ewalletdetail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewa where user_id='$user_userid'"));

				$user_ewalletamt=$ewalletdetail['amount'];

				$user_ewalletamt1=$user_ewalletamt;

				$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

					  if($user_ewalletamt1>=$lamount)

					  {

						   $yes=mysqli_query($GLOBALS["___mysqli_ston"], "update $ewa set amount=(amount-$lamount) where user_id='$user_userid'");

						   if($yes)

						   {

							 mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `contact_reload` (`id`, `plan_type`, `plan_name`, `amount`, `mobile`, `user_id`, `posted_date`, `ts`, `transaction_no`, `meter`) VALUES (NULL, '$plan_type', '$plan_name', '$lamount', '$mobile', '$userid', '".date('Y-m-d')."', '$times', '$rand', '$meter')");
							 
							 if($package==15)
							 {
								  $message=$short."#".$rm."#".$mobile."#".$meter."#".'132488';
							 }
							 else
							 {
							 $message=$short."#".$rm."#".$mobile."#".'132488';
							 }
/*$mesego=urlencode($message);

$recipient=60128922455;
$recipient2="+601110633601";
$curl1 = curl_init();
curl_setopt ($curl1, CURLOPT_URL, "http://login.bulksms.my/websmsapi/ISendSMS.aspx?username=gwc&password=1234&message=$mesego&mobile=$recipient&sender=gwc&type=1");
curl_exec ($curl1);
curl_close ($curl1);

$curl2 = curl_init();
curl_setopt ($curl2, CURLOPT_URL, "http://www.bulksms2u.com/websmsapi/ISendSMS.aspx?username=gwc&password=123456&message=$mesego&mobile=$recipient2&sender=gwc&type=1");
curl_exec ($curl2);
curl_close ($curl2);*/

							mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$rand','$user_userid','0','$lamount','0','$userid','$user_userid','$start','Product Purchase','Product Purchase by $userid','Product Purchase by $userid ','Product Purchase $user_id','$rand','Product Purchase by $userid','0','$walls','$urls')");
													
			

						   }

						

						   ?>

                           <script type="text/javascript">

						   window.location.href='buy-product-reload.php?msg=Thank You! for your purchase. Your request is in process';

						   </script>

                           <?php

						 

						   exit;

						   

					}

					else

					{

						?>

                         <script type="text/javascript">

						   window.location.href='buy-product-reload.php?msg=In Sufficient Fund In your reload Wallet ';

						   </script>

                        <?php

						

					}

			}

		

			else

			{

				?>

                 <script type="text/javascript">

						   window.location.href='buy-product-reload.php?msg=Wrong Credentail Details';

						   </script>

                

                <?php

				

			}



}

else

{

	?>

      <script type="text/javascript">

						   window.location.href='buy-product-reload.php?msg=Validation Error Occurs';

						   </script>

    <?php

	

	

}




}

?>

