<?php
ob_start();
include("header.php"); 
/*function to show user on which level code ends here*/
/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no)
{
	$date=date('Y-m-d');
  
  $direct_percentage = mysqli_query($GLOBALS["___mysqli_ston"], "select direct_percentage from manage_commision_percentage where id=1");
  $charge = mysqli_fetch_array($direct_percentage);
  $total_charge = $amount*$charge['direct_percentage']/100;

  if($total_charge>0)
  {
            
	  mysqli_query($GLOBALS["___mysqli_ston"], "update roi_e_wallet set amount=(amount+$total_charge) where user_id='".$ref."'");
	  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$total_charge','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $total_charge For Package ".$_SESSION['platform']."','Referral Bonus','$invoice_no','Referral Bonus','0','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
   
    }
}


function pairing_bonus($income_id)
{
$date=date('Y-m-d');

//insert commission in user ewallet by fetching from level income table code start here
$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$income_id'");

while($rds=mysqli_fetch_array($rd)){
  $uid  = $rds['user_id'];
  $bakipair_left=0;
  $bakipair_right=0;
  $lefts=0;
  $rights=0;
  $vccunt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$uid' and user_rank_name='Paid Member'");
    while($vccunt1=mysqli_fetch_array($vccunt))
    {

      $left=0;
      $right=0;
      $down=$vccunt1['user_id'];

      $left=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$uid' and down_id='$down' and leg='left'"));            
                   
                            if($left>0)
                            {
                              $lefts++;
                            }
                            else
                            {
                              $lefts=$lefts;
                            }

                            $right=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$uid' and leg='right' and down_id='$down'"));
                           
                            if($right>0)
                            {
                              $rights++;
                            }
                            else
                            {
                              $rights=$rights;
                            }

  }


 
if($lefts>=1 && $rights>=1)
{

  $uid_ref=$rds['ref_id'];
  $querys1  = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalleftamount from manage_bv_history where status='0' and income_id='$uid' and position='left' and date<='$date'"));
  $leftamt  = $querys1['totalleftamount'];

  $querys12   =   mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalrightamount from manage_bv_history where status='0' and income_id='$uid' and position='right' and date<='$date'"));
  $rightamt   = $querys12['totalrightamount'];


if($leftamt <= $rightamt){
    $lesser_bv  = $leftamt;
    $carry    = $rightamt-$leftamt;
    $pos    = 'right';
  }else{
    $lesser_bv  = $rightamt;
    $carry    = $leftamt-$rightamt;
    $pos    = 'left';
  }

  $userpack = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$uid' order by id desc limit 1"));

  
  $match = $lesser_bv;
  $lesser_bv = $lesser_bv;
  $carry = $carry;

  mysqli_query($GLOBALS["___mysqli_ston"], "update manage_bv_history set status='1' where date<='$date' and income_id='$uid'");
  if($carry>0){
    
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$uid','$uid','1','0','$pos','Carry Forward BV','$date',CURRENT_TIMESTAMP,'0','$carry')");

 }

  if($lesser_bv>0){
    //here fetch commision value from commission table

    $direct_percentage = mysqli_query($GLOBALS["___mysqli_ston"], "select binary_percentage from manage_commision_percentage where id=1");
    $charge = mysqli_fetch_array($direct_percentage);

    //$amount   = $lesser_bv*10/100;
    $amount   = $lesser_bv*$charge['binary_percentage']/100;
    $deduct   = 0;
    $amount1   = $amount-$deduct;

    if($amount1 > 0){
      $invoice_no       = $uid.rand(1001,9999);
      $withdrawal_commission  = $amount1;
      $withdrawal_commission  = $amount1;
      $rwallet = $withdrawal_commission;
      if($withdrawal_commission != '' && $withdrawal_commission != 0){
          $urls   = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "update roi_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");

        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$rwallet','0','$deduct','$uid','$useridss','$date','Binary Income','Binary Income','Binary Income','".$charge['binary_percentage']."','$invoice_no','$match','0','Income Wallet',CURRENT_TIMESTAMP,'$urls')");

      }
    }

    
  }else{}
  
}
}

}

/* Sponsor Commission Code Ends Here*/

/*user data insert details code end*/
if(($_POST['amount']!='') && $_POST['amount']>0 && $_POST['payment_method']!='')
{
	//$password=$f['t_code'];
    $rand = rand(0000000001,9000000000);
    $amount=$_POST['amount'];
    $pbs1=$_POST['amount'];
    $invest_type=$_POST['invest_type'];

    $payment_method = $_POST['payment_method'];

	  $ewa='final_e_wallet';
	  $walls="Activation Wallet";
    	
	  $rand = rand(0000000001,9000000000);

    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+750 days'));
   
    
    $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));

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
				   	$yes1=mysqli_query($GLOBALS["___mysqli_ston"], "update working_e_wallet set amount=(amount+$amount) where user_id='$userid'");

				if($yes)
			 {
    	
			    $current_time= date("Y-m-d H:i:s");

          $invest=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid'"));
		      $privious_investment=$invest['amount'];

          $privious_investment=$amount;


         //$withdrawal_commission=commission_of_referal($ref['ref_id'],$userid,$amount,$invoice_no);
            commission_of_referal($ref['ref_id'],$userid,$amount,$rand);

						mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`,`invest_type`) VALUES (NULL, '$userid', '1', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$userid."','".$ref['ref_id']."','$privious_investment','$invest_type')");
						mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$rand','$userid','0','$amount','0','$userid','$userid','$start','Package Upgrade','Package Upgrade by $userid','Package Upgrade by $userid ','Package Upgrade $userid','$rand','Package Upgrade by $userid','0','$walls','$urls')");
			    	   
     				    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
						$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
						while($upline=mysqli_fetch_array($upliners))
						{
           
              $income_id=$upline['income_id'];
              $position=$upline['leg'];
							$user_level=$upline['level']; 
							mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
              pairing_bonus($income_id);

						//	}
						}
					   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

					}
							
					?>
					<script type="text/javascript">
					window.location.href='package-upgrade.php?msg=Thank you! you have successfully purchased the package';
					</script>
					<?php
					exit;


				}else{
					?>
					<script type="text/javascript">

					   window.location.href='package-upgrade.php?msg=Insufficient Fund In your e-Wallet ';

					   </script>

		            <?php

					

				}

        	}

    //     	elseif($payment_method == 'coinpayment'){

    //     		if(file_exists('./block_io/block_io.php')){
				//   require ('./block_io/block_io.php');
				// }else{
				//   die('Unable to load block_io.php file');
				// }

				// $webhook_url = "https://bitcodeals.com/userpanel/blockio_webhook.php?key=biutmyat_bitbux";

    //     		// require('./coinpayment/coinpayments.inc.php');
        		
    //     		$apiKey = '7166-9068-03fe-5e6c';
			 //  	$pin = 'bitbuxatm';
			 //  	$version = 2; // the API version
			 //  	$block_io = new BlockIo($apiKey, $pin, $version);

			 //  	$label = $userid."_".rand(100,999);
			 //  	$newAddressInfo = $block_io->get_new_address(array('label' => $label));

    //     		$email = $f['email'];
        		
    //     		$amount = $amount;

    //     		$curl = curl_init();
				// curl_setopt_array($curl, array(
				//     CURLOPT_RETURNTRANSFER => 1,
				//     CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value='.$amount
				// ));
				// $price_in_btc = curl_exec($curl);
				// curl_close($curl);
        									
				
				// if (strtolower($newAddressInfo->status) == 'success') {

				// 	$address = $newAddressInfo->data->address;
  		// 			$label   = $newAddressInfo->data->label;

  		// 			$notification = $block_io->create_notification(array('type' => 'address', 'address' => $address, 'url' => $webhook_url));

				
				// 	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO block_io SET user_id='".$userid."', amount = '".mysqli_real_escape_string($amount)."', btc_amount = '".$price_in_btc."', label = '".$label."', address = '".$address."', notification = '".$notification->data->notification_id."', type='package', package_id='".$_POST['package']."', package_name = '".mysqli_real_escape_string($package_name)."'");

				// 	$insert_id = mysqli_insert_id();

				// 	$_SESSION['bpidp'] = $insert_id;
					
				// 	header("location:coinpayment_viewqr.php");
				// 	exit();

				// 	
				
				// } else {
				
				
				// }

    //     	}
		

	}else{

		?>

         <script type="text/javascript">
			window.location.href='package-upgrade.php?msg=Wrong Transaction Password';
		</script>
        <?php

	}



}else{
	?>
  	<script type="text/javascript">
   		window.location.href='package-upgrade.php?msg=Validation Error Occurs';
   	</script>
    <?php
}
/*user data insert details code end*/
?>

