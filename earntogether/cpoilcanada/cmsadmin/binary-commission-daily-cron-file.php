<?php
include("lib/config.php");
$expire=date('Y-m-d');
$date=date('Y-m-d');

$next_date1 = date('Y-m-d', strtotime($date . ' +1 day'));
$stop_date1 = date('Y-m-d', strtotime($date . ' +1 day'));
$last_date1 = date('Y-m-d', strtotime($date . ' -7 day'));
mysqli_query($GLOBALS["___mysqli_ston"], "insert into test_cron values(NULL,'Kamlesh','$expire','Daily Binary Bonus')");
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

//insert commission in user ewallet by fetching from level income table code start here

/*for after first pair code start here*/
$companyturn=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as newsum from lifejacket_subscription where date<='$date' and payout_status='0'"));
 echo $companyturnover=$companyturn['newsum'];die;
$profit_share=$companyturnover*10/100;

$date1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from commission_charges where id=1 "));
$amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='1'"));
    $spc=$amts1['binary_bonus'];
 $binary_share=$profit_share*$spc/100;

$rd=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name='Paid Member'");
while($rds=mysqli_fetch_array($rd))
{
 $uid=$rds['user_id'];




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

                            if(($lefts>=1 && $rights>=1) )
                            {
                              break;
                            }
     

    }



if(($lefts>=1 && $rights>=1))
{








$working_left=0;
$left_condi=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$uid' and leg='left'");

    while($vccunt111=mysqli_fetch_array($left_condi))
    {

 $left_userid=$vccunt111['down_id'];
$working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
  $leftamt1=$working_left+$working_e_wallet1['amount'];

    }


    $working_right=0;
$left_condi11=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$uid' and leg='right'");
    while($vccunt111=mysqli_fetch_array($left_condi11))
    {

$left_userid=$vccunt111['down_id'];
$working_e_wallet2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
 $rightamt1=$working_right+$working_e_wallet2['amount'];

    }

if($leftamt1>=1 && $rightamt1>=1)
{

//$querys1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as totalleftamount from manage_bv_history where status='0' and income_id='$uid' and position='left' and date<='$date'"));
//$leftamt1=$querys1['totalleftamount'];

//$querys12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as totalrightamount from manage_bv_history where status='0' and income_id='$uid' and position='right' and date<='$date'"));
//$rightamt1=$querys12['totalrightamount'];

$userpack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$uid' order by id desc limit 1"));


$capping1=15000;



if($leftamt1<=$rightamt1)
{
$lesser_bv=$leftamt1;
$carry=$rightamt1-$leftamt1;
$pos='right';
}
else
{
$lesser_bv=$rightamt1;  
$carry=$leftamt1-$rightamt1;
$pos='left';
}


if($carry>0)
{
  
mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history1 values(NULL,'$uid','$uid','1','$carry','$pos','Carry Forward BV','$next_date1',CURRENT_TIMESTAMP,'0','$carry')");
}

$invoice=rand(1000000001,9999999999);


if($lesser_bv>0)
{           

         $lesser_bv1=$lesser_bv/$companyturnover;
            $lesser_bv12=$lesser_bv1*$binary_share;
         $amount2=$lesser_bv12; 
         if($amount2>$capping1)
         {

           
            $amount2=$capping1;
           
         }
         else
         {
          $amount2=$amount2;
         }
            
      

    $final_amt=$amount2;
    $tds=0;
$charge=0;
$total_amt=$final_amt;
    if($total_amt>0)
    {
mysqli_query($GLOBALS["___mysqli_ston"], "update roi_e_wallet set amount=(amount+$total_amt) where user_id='".$uid."'");
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$total_amt','0','$lesser_bv','$uid','123456','$expire','Binary Income','Binary Income 1st Pair $pair','$spc','Binary Income','$invoice','$companyturnover','0','Payout Wallet','$urls')");
  }

  


    
}  
mysqli_query($GLOBALS["___mysqli_ston"], "update lifejacket_subscription set payout_status=1 where user_id='".$uid."'");
  mysqli_query($GLOBALS["___mysqli_ston"], "update manage_bv_history set status='1' where date<'$stop_date1' and income_id='$uid'");



}
}

/*for after first pair code end here*/

}



?>