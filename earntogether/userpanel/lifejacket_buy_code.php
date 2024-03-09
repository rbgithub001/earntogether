<?php
ob_start();
include("includes/header.php");

//paring_bonus();die;

/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages){
	$date=date('Y-m-d');

	//Direct Commission
	$rwallet = $amount*8/100;
	//if($withdrawal_commission != '' && $withdrawal_commission != 0){
        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Income','Earn Referral Income from $useridss for $packages Package','Commission of USD $rwallet For Package ".$packages." ','Referral Income','$invoice_no','Referral Income','0','E Wallet',CURRENT_TIMESTAMP,'$urls')");	
   //	}
   unset($_SESSION['referral_status']);
}
/* Sponsor Commission Code Ends Here*/


/* Sponsor Direct Commission Code Starts Here*/
function commission_level($user1,$package,$amount,$invoice_no)
{

  $invoice_no=rand(10000000000,9999999999999);
$userid=$user1;
$date=date('Y-m-d');
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$invoice_no=$invoice_no;
$data_level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userid'");
  while($data_level12=mysqli_fetch_array($data_level1))
  {
    $level=$data_level12['level'];   
   $income_id=$data_level12['income_id'];   

$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$income_id'"));

$plan=$comm['user_plan'];
      $withdrawal_commission11=$amount;

  if($level==2)
     {
    $spc=1;
   
   }
  else if($level==3)
     {
    $spc=1;
   
   }
  else if($level==4)
     {

    $spc=1;
   
   } 
   else if($level==5)
     {

    $spc=1;
   
   } 
 else 
     {

    $spc=0;
   
   } 




     


      $total=$withdrawal_commission11*$spc/100;


     

      

     $withdrawal_commission1=$total;
      
if ($withdrawal_commission1>0 && $comm['user_rank_name']=='Affiliate') {
  

      mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$withdrawal_commission1) where user_id='".$income_id."'");
      $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$income_id','$withdrawal_commission1','0','0','$income_id','$userid','$date','Level Income','Level Income','Level Income','$tds','$invoice_no','$level','0','Income Wallet',CURRENT_TIMESTAMP,'$urls')");  
  

}



  

}

}




function commission_matching($user1,$amount)
{

  $invoice_no=rand(100000000,9999999999);
$userid=$user1;
$date=date('Y-m-d');
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$invoice_no=$invoice_no;
$data_level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userid'");
  while($data_level12=mysqli_fetch_array($data_level1))
  {
    $level=$data_level12['level'];   
     $income_id=$data_level12['income_id'];   

   $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$income_id'"));

    $plan=$comm['user_plan'];






$lefts=0;
    $rights=0;
    $vccunt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$income_id' and user_rank_name='Affiliate'");
    while($vccunt1=mysqli_fetch_array($vccunt))
    {
      $left=0;
      $right=0;
      $down=$vccunt1['user_id'];


                  $left=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$income_id' and down_id='$down' and leg='left'"));            
                      
                            if($left>0)
                            {
                              $lefts++;
                            }
                            else
                            {
                              $lefts=$lefts;
                            }

                            $right=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$income_id' and leg='right' and down_id='$down'"));
                           
                            if($right>0)
                            {
                              $rights++;
                            }
                            else
                            {
                              $rights=$rights;
                            }

                            if(($lefts>=1 && $rights>=1) )
                            {
                              break;
                            }
     

    }



if(($lefts>=1 || $rights>=1) && $comm['user_rank_name']=='Affiliate')
{

                              $withdrawal_commission11=$amount;

                          if($level==1 && $plan>=2)
                             {
                           $spc=2;

                           }else if($level==2 && $plan>=3)
                             {
                            $spc=2;
                           
                           }else if($level==3 && $plan>=4)
                             {
                            $spc=2;
                           
                           } else if($level==4 && $plan>=5) {

                            $spc=2;
                           
                           } else if($level==5 && $plan>=6)
                             {

                            $spc=2;
                           
                           } 
                         else 
                             {

                            $spc=0;
                           
                           } 




     


      $total=$withdrawal_commission11*$spc/100;


     

      

     $withdrawal_commission1=$total;
      
if ($withdrawal_commission1>0) {
  

      mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$withdrawal_commission1) where user_id='".$income_id."'");
      $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$income_id','$withdrawal_commission1','0','$withdrawal_commission11','$income_id','$userid','$date','Direct Mataching Income','Direct Mataching Income','Direct Mataching Income','$tds','$invoice_no','$admin','0','Income Wallet',CURRENT_TIMESTAMP,'$urls')");  
  

}
}


  

}

}





function paring_bonus($income_id)
{
    $date=date('Y-m-d');


//insert commission in user ewallet by fetching from level income table code start here
$rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$income_id'");

while($rds=mysqli_fetch_array($rd)){
	$uid 	=	$rds['user_id'];


$lefts=0;
    $rights=0;
    $vccunt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$uid' and user_rank_name='Affiliate'");
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

                            if(($lefts>=1 && $rights>=1) )
                            {
                              break;
                            }
     

    }


 
if(($lefts>=1 && $rights>=1))
{

	$uid_ref=$rds['ref_id'];
	$querys1 	=	mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalleftamount from manage_bv_history where status='0' and income_id='$uid' and position='left' and date<='$date'"));
	$leftamt 	=	$querys1['totalleftamount'];

	$querys12 	= 	mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pair) as totalrightamount from manage_bv_history where status='0' and income_id='$uid' and position='right' and date<='$date'"));
	$rightamt 	=	$querys12['totalrightamount'];
 'leftamt = '.$leftamt;
	if($leftamt <= $rightamt){
		$lesser_bv 	=	$leftamt;
		$carry 		=	$rightamt-$leftamt;
		$pos 		=	'right';
	}else{
		$lesser_bv 	=	$rightamt;
		$carry 		=	$leftamt-$rightamt;
		$pos 		=	'left';
	}
	$userpack 	=	mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$uid' order by id desc limit 1"));

	$amts1 	=	mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$userpack['package']."'"));
	$capping1 		=	$amts1['capping'];
	$lesser_bv 		=	$lesser_bv;
	$carry 			= 	$carry;
	$binary_bonus 	=	$amts1['binary_bonus'];
mysqli_query($GLOBALS["___mysqli_ston"], "update manage_bv_history set status='1' where date<='$date' and income_id='$uid'");
	if($carry>0){
		
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$uid','$uid','1','0','$pos','Carry Forward BV','$date',CURRENT_TIMESTAMP,'0','$carry')");
	}

	if($lesser_bv>0){
		

		mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_point_history values(NULL,'$uid','$uid','$lesser_bv','0','$pos','Point BV','$date',CURRENT_TIMESTAMP,'0','$lesser_bv')");

$resdt1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(credit_amt) as amt FROM `credit_debit` where receive_date='$date' and ttype='Binary Income' and  user_id='$uid'"));


if ($resdt1['amt']>0 && $resdt1['amt']!='') {
$amount_check=$resdt1['amt'];
}else{
$amount_check=0;  
}


		$amount 	=	$lesser_bv*$binary_bonus/100;

$amount_cap=$amount+$amount_check;

		if($amount_cap > $capping1){
			$amount 	= 	$capping1-$amount_check;
      $cappingact=$capping1;
     
		}else{
			$amount 	=	$amount;
      $cappingact=0;
    
		}
		if($amount > 0){
			$invoice_no 			=	$uid.rand(1001,9999);
			$withdrawal_commission 	=	$amount;
			$withdrawal_commission 	=	$amount;
			$rwallet 				=	$withdrawal_commission;
			if($withdrawal_commission != '' && $withdrawal_commission != 0){
		    	$urls 	=	"http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
				mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");

		    	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$rwallet','0','$lesser_bv','$uid','$useridss','$date','Binary Income','Binary Income','Binary Income','Binary Income','$invoice_no','$cappingact','0','E Wallet',CURRENT_TIMESTAMP,'$urls')");

		    	  commission_matching($uid,$rwallet);
    	   	}
		}else{
$invoice_no       = $uid.rand(1001,9999);
  $urls   = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','0','0','$lesser_bv','$uid','$useridss','$date','Binary Income','Binary Income','Binary Income','Binary Income','$invoice_no','$cappingact','0','E Wallet',CURRENT_TIMESTAMP,'$urls')");
    }

		
	}else{}
	
}
}


}



















if(($_POST['package_id']!='') && ($_POST['amount']!=''))
{
	$password=$_POST['password'];
	$payment_type=$_POST['payment_type'];
	
	$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_POST['package_id']."'"));
    $package_name=$comm['name'];
     $pbs1=$comm['pb'];
    $amount=$comm['amount'];
$cashback=$comm['cashback'];


	$ewa='final_e_wallet';
	$walls="E Wallet";
    $rand = rand(0000000001,9000000000);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+12 months'));
   

       $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));

if ($payment_type=='E Wallet') {

	 $t_code1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' and password='$password'"));
	
	if($t_code1>0)
	{

     }else{
 
				header("Location:package_upgrade.php?msg=Wrong Transaction Password");
				exit;
	  }
    
    $ewalletdetail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewa where user_id='$userid'"));
		$user_ewalletamt=$ewalletdetail['amount'];
		
        if($user_ewalletamt>=$amount)
        {
 	$yes=mysqli_query($GLOBALS["___mysqli_ston"], "update $ewa set amount=(amount-$amount) where user_id='$userid'");
        }else{
 
			header("Location:package_upgrade.php?msg=Insufficient Fund");
			exit;
	       }






}
if ($payment_type=='pin') {
	$pincodes=$_POST['pin'];
	 $condition = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pins where pin_no='".$pincodes."' and amount='$amount' and status='0' "));
              
  $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));  
                          if($condition>0){

                          }else{
                          	header("Location:package_upgrade.php?msg=Wrong Pin Number !!!");
			exit;
                          }

 $pin=mysqli_query($GLOBALS["___mysqli_ston"], "update pins set status='1' where pin_no='".$pincodes."'");






}

		


$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
             $pv=$pbs1;


	    $lfid="LJ".$userid.$rand;
	  
	
$end_date=date('Y-m-d', strtotime($subs_date. ' + 7 days'));
		mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`,`acc_type`,`cron_date`) VALUES (NULL, '$userid', '".$_POST['package_id']."', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$userid."','".$ref['ref_id']."','$pv','Main Account','$end_date')");
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$rand','$userid','0','$amount','0','$userid','$userid','$start','Package Upgrade','Package Upgrade by $userid','Package Upgrade by $userid ','Package Upgrade $userid','$rand','Package Upgrade by $userid','0','$walls','$urls')");


	$plan_nameing=$_POST['package_id'];
	/*Inserting Record of BV in manage bv table for all upliners code starts here*/
	// if ($plan_nameing>1) {
	$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
	while($upline=mysqli_fetch_array($upliners))
	{
		$income_id=$upline['income_id'];
		$position=$upline['leg'];
		$user_level=$upline['level'];
			paring_bonus($income_id);
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$pv','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$pv')");
	}
//}
   /*Inserting Record of BV in manage bv table for all upliners code ends here*/
  
   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_plan='".$_POST['package_id']."', user_rank_name='Affiliate',designation='Affiliate' where user_id='$userid'");

   	$invoice_no=rand(1111111111,9999999999);


    commission_level($userid,$_POST['package_id'],$amount,$rand);

      



  
                           
   $ref_details=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$ref['ref_id']."'"));


if ($ref_details['user_rank_name']=='Affiliate') {

  	commission_of_referal($ref['ref_id'],$userid,$amount,$rand,$plan_nameing); 
    
 
}    



header("Location:package_upgrade.php?msg=Thank You! You have Successfully Upgraded to Premium Membership");
			exit;
			

}

else

{

	?>

      <script type="text/javascript">

						   window.location.href='package_upgrade.php?msg=Validation Error Occurs';

						   </script>

    <?php

	

	

}

?>

