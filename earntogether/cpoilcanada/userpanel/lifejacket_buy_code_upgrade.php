<?php
ob_start();
include("header.php"); 
/*function to show user on which level code ends here*/



/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages)
{
	$date=date('Y-m-d');

	$comming=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$ref."' and status='Active' order by id desc limit 0,1"));

	if($comming['package']!='')
	{

	$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$comming['package']."'"));
	$spc=$comm['sponsor_commission'];
	$pb=$amount;
	$withdrawal_commission=$spc*$pb/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0)
	{
		$vcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where user_id='$ref' and user_rank_name='Paid Member'"));
		if($vcount>0)
		{

	mysqli_query($GLOBALS["___mysqli_ston"], "update working_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of BTC $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
    }
    else
    {
    //mysql_query("insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of BTC $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','2','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
    }
	}
    }
}
/* Sponsor Commission Code Ends Here*/



if(($_POST['package']!='') && ($_POST['payment_method']!='') && ($_POST['upgradeuser']!=''))
{

 $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=1"));
                 $rowww11=$sqlqw1['sponsor_reward'];
                 $rowww12=$sqlqw1['name'];
                 $rowww13=$sqlqw1['amount'];
                 $rowww14=$sqlqw1['matching'];

                 $sqlqw2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=2"));
                 $rowww21=$sqlqw2['sponsor_reward'];
                 $rowww22=$sqlqw2['name'];
                 $rowww23=$sqlqw2['amount'];
                 $rowww24=$sqlqw2['matching'];

                 $sqlqw3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=3"));
                 $rowww31=$sqlqw3['sponsor_reward'];
                 $rowww32=$sqlqw3['name'];
                 $rowww33=$sqlqw3['amount'];
                 $rowww34=$sqlqw3['matching'];

                 $sqlqw4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=4"));
                 $rowww41=$sqlqw4['sponsor_reward'];
                 $rowww42=$sqlqw4['name'];
                 $rowww43=$sqlqw4['amount'];
                 $rowww44=$sqlqw4['matching'];

                  


              


	
	 if($_POST['package']!='' &&  $_POST['amount']!='')
	{
		$package=$_POST['package'];

          if ($package==1 && $_POST['amount']>=200 && $_POST['amount']<=999) {
              
          }else if ($package==2 && $_POST['amount']>=1000 && $_POST['amount']<=4999) {
            
          }else if ($package==3 && $_POST['amount']>=5000 && $_POST['amount']<=9999) {
             
          }else if ($package==4 && $_POST['amount']>=10000) {
             
          }else{
           header("location:package-upgrade-downline.php?msg=Please Enter Valid Amount");
        exit; 
          }







	}
	else
	{
		$package=0;
		header("location:package-upgrade-downline.php?msg=Select package");
		exit;
	}

	$password=$f['t_code'];
	$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_POST['package']."'"));
    $package_name=$comm['name'];
    $validity=$comm['pb'];
     $rand = rand(0000000001,9000000000);
    $amount=$_POST['amount'];
    $pbs1=$_POST['amount'];

    $payment_method = $_POST['payment_method'];

    $upgradeuser1=$_POST['upgradeuser'];
    $newfetch=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$upgradeuser1' || username='$upgradeuser1'"));
    if($newfetch==0)
    {
    	header("location:package-upgrade-downline.php?msg=No such downline found");
		exit;
    }
    else
    {
    $upgradeuser12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$upgradeuser1' || username='$upgradeuser1'"));
    $upgradeuser=$upgradeuser12['user_id'];
    $fuser=$upgradeuser12['email'];
       $fusername=$upgradeuser12['username'];
    }


    /*$newfetchlo=mysql_num_rows(mysql_query("select * from lifejacket_subscription where user_id='$upgradeuser' and status='Active'"));
    if($newfetchlo>0)
    {
    	header("location:package-upgrade-downline.php?msg=This user have already a active package.");
		exit;
    }*/


    


       
    		$ewa='final_e_wallet';
	        $walls="Withdrawal Wallet";
    	
	
    $rand = rand(0000000001,9000000000);

    
    $start=date('Y-m-d');
   $end = date('Y-m-d', strtotime('+'."$validity".' days'));
    $t_code1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' and t_code='$password'"));

       $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$upgradeuser'"));

	if(1==1)
	{

		$ewalletdetail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewa where user_id='$userid'"));
		$user_ewalletamt=$ewalletdetail['amount'];
		$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        

        	if($payment_method == 'ewallet' || $payment_method == 'rwallet' || $payment_method == 'wwallet'){

        		if($user_ewalletamt>=$amount)
        		{
	        		$pv=$pbs1;
				    $lfid="LJ".$userid.$rand;
				   	$yes=mysqli_query($GLOBALS["___mysqli_ston"], "update $ewa set amount=(amount-$amount) where user_id='$userid'");
					if($yes)
			        {

			        	
			   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Paid Member', user_rank_name='Paid Member' where user_id='$upgradeuser'");

			        	 

						mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$upgradeuser', '".$_POST['package']."', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Downline Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$upgradeuser."','".$f['user_id']."','$pv')");

						mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$rand','$userid','0','$amount','0','$upgradeuser','$userid','$start','Package Upgrade','Package Upgrade by $userid','Package Upgrade by $upgradeuser ','Package Upgrade for $upgradeuser','$rand','Downline Investment','0','$walls','$urls')");
			    	   	$invoice_no=rand(1111111111,9999999999);
     				    commission_of_referal($ref['ref_id'],$upgradeuser,$amount,$invoice_no,$_POST['package']);

     				    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
						$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$upgradeuser'");
						while($upline=mysqli_fetch_array($upliners))
						{
							
$income_id=$upline['income_id'];
//  $income_ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$income_id'"));
// $income_plan=$income_ref['user_plan'];
// if ($income_plan==1) {
// 	$pack1=10;
// }else if($income_plan==2){
// 	$pack1=20;
// }else if($income_plan==3){
// 	$pack1=30;
// }else if($income_plan==4){
// 	$pack1=1000;
// }else {
// 	$pack1=100;
// }

// 							if ($upline['level']<=$pack1) {
							$position=$upline['leg'];
							$user_level=$upline['level']; 
							mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$upgradeuser','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
					//	}
					}
					   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

					}

					?>


					<script type="text/javascript">
					window.location.href='package-upgrade-downline.php?msg=Thank You. You had successfully purchased the package for your downline.';
					</script>
					<?php
					exit;


				}else{
					?>
					<script type="text/javascript">

					   window.location.href='package-upgrade-downline.php?msg=Insufficient Fund In your e-Wallet ';

					   </script>

		            <?php

					

				}

        	}elseif($payment_method == 'coinpayment'){

        		if(file_exists('./block_io/block_io.php')){
				  require ('./block_io/block_io.php');
				}else{
				  die('Unable to load block_io.php file');
				}

        		// require('./coinpayment/coinpayments.inc.php');
        		
        		$apiKey = '7166-9068-03fe-5e6c';
			  	$pin = trim('Bholenath');
			  	$version = 2; // the API version
			  	$block_io = new BlockIo($apiKey, $pin, $version);

			  	$label = $userid."_".rand(100,999);
			  	$newAddressInfo = $block_io->get_new_address(array('label' => $label));

        		$email = $f['email'];
        		$amount = $amount;

                // $curl = curl_init();
				// curl_setopt_array($curl, array(
				//     CURLOPT_RETURNTRANSFER => 1,
				//     CURLOPT_URL => 'https://blockchain.info/tobtc?currency=BTC&value='.$_POST['amount']
				// ));
				// $price_in_btc = curl_exec($curl);
				// curl_close($curl);


                $price_in_btc = $amount;
        									
				
				if (strtolower($newAddressInfo->status) == 'success') {

					$address = $newAddressInfo->data->address;
  					$label   = $newAddressInfo->data->label;

					// use mysql_real_escape_string for input fields
					mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO block_io SET user_id='".$userid."', amount = '".mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $amount)."', btc_amount = '".$price_in_btc."', label = '".$label."', address = '".$address."'");

					$insert_id = ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
					
					header("location:coinpayment_viewqr.php?bpid=".$insert_id);
					exit();

					?>
				  	<script type="text/javascript">
				   		window.location.href='coinpayment_viewqr.php?bpid='.$insert_id;
				   	</script>
				    <?php
				    exit();
					// $le = php_sapi_name() == 'cli' ? "\n" : '<br />';
					// print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
					// print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
					// print 'Status URL: '.$result['result']['status_url'].$le;
				} else {
					// print 'Error: '.$result['error']."\n";
					?>
					<script type="text/javascript">
					   window.location.href='package-upgrade-downline.php?msg='.$newAddressInfo->data->error_message;
					</script>
		            <?php
					exit();
				}

        	}
		

	}else{

		?>

         <script type="text/javascript">
			window.location.href='package-upgrade-downline.php?msg=Wrong Transaction Password';
		</script>
        <?php

	}



}else{
	?>
  	<script type="text/javascript">
   		window.location.href='package-upgrade-downline.php?msg=Validation Error Occurs';
   	</script>
    <?php
}

?>

