<?php

include("lib/config.php");
$date=date('Y-m-d');
// $date= date('Y-m-d',strtotime($date1.'+1 Day'));

 $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=1"));
 $rowww1=$sqlqw1['sponsor_reward'];





$resdt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_rank_name='Paid Member'");

while($resdt1=mysqli_fetch_array($resdt))

{

	$user=$resdt1['user_id'];
	$uid=$user;
	$working_e_wallet2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$uid' "));
$pb=$working_e_wallet2['amount'];
	
	$package=1;
	$lifejacket_id=$resdt1['lifejacket_id'];
	$pack_date=$resdt1['date'];

	$date1=date_create($pack_date);
	$date2=date_create($date);
	$diff=date_diff($date1,$date2);
	$days_diff=$diff->format("%a");
	 $days_diff=$days_diff-1;



	if($package==1)

	{

      $first=$rowww1; 

	}

	
	
	else

	{

        $first=0; 

	}

   // $first1=$first*$days_diff;
   $first1=$first*1;


   $rwallet=$pb*$first1/100;  

    $invoice_no=$resdt1['invoice_no'];


$invoice_no=rand(1000000001,9999999999);


	if($rwallet!='' && $rwallet>0)

	{

		

		$vcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where user_id='$uid' and user_rank_name='Paid Member'"));
		if($vcount>0)
		{

	mysqli_query($GLOBALS["___mysqli_ston"], "update working_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$rwallet','0','0','$uid','123456','$date','Roi Income','Earn Roi Income','Commission of Roi Income ','$lifejacket_id','$invoice_no','Roi Income','0','ROI Wallet',CURRENT_TIMESTAMP,'$urls')");	
     }
    

	}



}
echo "closing Done";
?>