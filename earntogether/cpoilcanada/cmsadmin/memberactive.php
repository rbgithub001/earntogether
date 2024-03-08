<?php
ob_start();
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 
$User=$_POST['user'];
$amount=$_POST['amount'];
$package=$_POST['package'];

if($User!='' && $amount!='' && $package!='')
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


	
	if($_POST['package']==1)
	{
		if($_POST['amount']>=$rowww13 && $_POST['amount']<=$rowww14)
		{
			$package=1;
		}
		else
		{
		header("location:inactive-member-list.php?msg=Amount should be match with the package selected");
		exit;
	    }
	}
	else if($_POST['package']==2)
	{
		if($_POST['amount']>=$rowww23 && $_POST['amount']<=$rowww24)
		{
			$package=2;
		}
		else
		{
		header("location:inactive-member-list.php?msg=Amount should be match with the package selected");
		exit;
	    }
	}
	else if($_POST['package']==3)
	{
		if($_POST['amount']>=$rowww33 && $_POST['amount']<=$rowww34)
		{
			$package=3;
		}
		else
		{
		header("location:inactive-member-list.php?msg=Amount should be match with the package selected");
		exit;
	    }
	}
	else if($_POST['package']==4)
	{
		if($_POST['amount']>=$rowww43)
		{
			$package=4;
		}
		else
		{
		header("location:inactive-member-list.php?msg=Amount should be match with the package selected");
		exit;
	    }
	}
	else
	{
		$package=0;
		header("location:inactive-member-list.php?msg=Select package");
		exit;
	}

	$userid=$User;
	$password="Admin";

	$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_POST['package']."'"));
    $package_name=$comm['name'];
    $validity=$comm['pb'];
    
    $amount=$_POST['amount'];
    $pbs1=$_POST['amount'];
    $ewa='final_e_wallet';
	$walls="Admin Activation";

	$rand = rand(0000000001,9000000000);
	   $lfid="LJ".$userid.$rand;
	   $pv=$pbs1;

    
    $start=date('Y-m-d');
   $end = date('Y-m-d', strtotime('+'."$validity".' days'));

   $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));


mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$userid', '".$_POST['package']."', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$userid."','123456','$pv')");
						$invoice_no=rand(1111111111,9999999999);
     				    commission_of_referal($ref['ref_id'],$userid,$amount,$invoice_no,$_POST['package']);

     				    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
						$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
						while($upline=mysqli_fetch_array($upliners))
						{
							$income_id=$upline['income_id'];
							$position=$upline['leg'];
							$user_level=$upline['level']; 
							mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
						}
					   /*Inserting Record of BV in manage bv table for all upliners code ends here*/


mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Paid Member', user_rank_name='Paid Member' where user_id='$User'");
header("location:inactive-member-list.php?msg=Status Updated!");
exit;
}
else
{
	header("location:inactive-member-list.php?msg=Unable to update now!");
	exit;
}






/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages)
{
	$date=date('Y-m-d');

	$comming=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$ref."' order by id desc limit 0,1"));

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
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
    }
    else
    {
    //mysql_query("insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','2','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
    }
	}
}
/* Sponsor Commission Code Ends Here*/



?>