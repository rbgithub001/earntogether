<?php
include("../lib/config.php");



function commission_of_referal($ref,$useridss,$amount,$invoice_no)
{
  $date=date('Y-m-d');
    $vccunt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$ref'"));
  $direct_percentage = mysqli_query($GLOBALS["___mysqli_ston"], "select referral from status_maintenance where id='".$vccunt['user_plan']."'");
  $charge = mysqli_fetch_array($direct_percentage);
  $total_charge = $amount*$charge['referral']/100;

  if($total_charge>0 && $vccunt!='Free Member')
  {
            
    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$total_charge) where user_id='".$ref."'");
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$total_charge','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $total_charge For Package ".$_SESSION['platform']."','Referral Bonus','$invoice_no','Referral Bonus','0','Working Wallet',CURRENT_TIMESTAMP,'$urls')"); 
   
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



if($vccunt1['user_rank_name']=='Affiliate')
{

                              $withdrawal_commission11=$amount;
 if($vccunt1['user_plan']==1){
                          if($level==1 ){
                           $spc=6;
                            }else if($level==2){
                            $spc=5;
                           }else if($level==3){
                            $spc=4;
                           } else if($level==4) {
                            $spc=3;
                           }else if($level==5){
                            $spc=2;
                           }else if($level==6){
                            $spc=1;
                           }else if($level>=7 && $level<=15){
                            $spc=1;
                           }else{
                          $spc=0;
                            } 
}
 if($vccunt1['user_plan']==2){
                          if($level==1 ){
                           $spc=7;
                            }else if($level==2){
                            $spc=6;
                           }else if($level==3){
                            $spc=5;
                           } else if($level==4) {
                            $spc=4;
                           }else if($level==5){
                            $spc=3;
                           }else if($level==6){
                            $spc=2;
                           }else if($level>=7 && $level<=15){
                            $spc=1;
                           }else{
                          $spc=0;
                            } 
}
if($vccunt1['user_plan']==3){
                          if($level==1 ){
                           $spc=8;
                            }else if($level==2){
                            $spc=7;
                           }else if($level==3){
                            $spc=6;
                           } else if($level==4) {
                            $spc=5;
                           }else if($level==5){
                            $spc=4;
                           }else if($level==6){
                            $spc=3;
                           }else if($level==7){
                            $spc=1;
                           }else if($level>=8 && $level<=15){
                            $spc=1;
                           }else{
                          $spc=0;
                            } 
}
if($vccunt1['user_plan']==4){
                          if($level==1 ){
                           $spc=10;
                            }else if($level==2){
                            $spc=9;
                           }else if($level==3){
                            $spc=8;
                           } else if($level==4) {
                            $spc=6;
                           }else if($level==5){
                            $spc=5;
                           }else if($level==6){
                            $spc=4;
                           }else if($level==7){
                            $spc=3;
                           }else if($level==8){
                            $spc=2;
                           }else if($level>=9 && $level<=15){
                            $spc=1;
                           }else{
                          $spc=0;
                            } 
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


 
//if($lefts>=1 && $rights>=1)
//{

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

    $direct_percentage = mysqli_query($GLOBALS["___mysqli_ston"], "select binary_bonus from status_maintenance where id='".$rds['user_plan']."'");
    $charge = mysqli_fetch_array($direct_percentage);

    //$amount   = $lesser_bv*10/100;
    $amount   = $lesser_bv*$charge['binary_bonus']/100;
    $deduct   = 0;
    $amount1   = $amount-$deduct;

    if($amount1 > 0){
      $invoice_no       = $uid.rand(1001,9999);
      $withdrawal_commission  = $amount1;
      $withdrawal_commission  = $amount1;
      $rwallet = $withdrawal_commission;
      if($withdrawal_commission != '' && $withdrawal_commission != 0){
          $urls   = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");

        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$rwallet','0','$deduct','$uid','$useridss','$date','Binary Income','Binary Income','Binary Income','".$charge['binary_bonus']."','$invoice_no','$match','0','Income Wallet',CURRENT_TIMESTAMP,'$urls')");
  commission_matching($uid,$rwallet);
      }
    }

    
  }else{}
  
//}
}

}





if($_GET['id']!='' && $_GET['status']!='')
{
  $newid=$_GET['id'];
  $status=$_GET['status'];
   $pack=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM user_request WHERE id='".$newid."'"));
   
  if ($status==1)
  {
   $invest_type=$pack['se_amount'];
   $userid=$pack['user_id'];
    $cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='".$pack['package']."'"));
    $package_name=$comm['name'];
    $pbs1=$comm['pb'];
    $matching=$comm['matching'];
    $amount=$pack['amount'];
    $amount11=$comm['amount'];
    $ewa='final_e_wallet';
    $walls="Income Wallet";
    $rand = rand(0000000001,9000000000);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+365 days'));
    $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'"));   
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    $pv=$amount;

    $lfid="LJ".$userid.$rand;
mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE working_e_wallet SET amount=(amount+$amount) WHERE user_id='$userid'");
$cron_date1=date('Y-m-d', strtotime($start. ' + 1 days'));

    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`,`invest_type`,`cron_date`) VALUES (NULL, '$userid', '".$pack['package']."', '$amount11', 'package upgrade', '$pincodes', '$rand', '$start', '$end', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$userid."','".$cure['ref_id']."','$privious_investment','$invest_type','$cron_date1')");



    // $data_level1=mysqli_query($GLOBALS["___mysqli_ston"],"select * from matrix_downline where down_id='$userid'");
    // while($data_level12=mysqli_fetch_array($data_level1))
    // {
    //   $income_id=$data_level12['income_id'];
    //   $level=$data_level12['level'];
    //   $withdrawal_commission=$pv;
    //   if($withdrawal_commission!='' && $withdrawal_commission!=0)
    //   {
    //     mysqli_query($GLOBALS["___mysqli_ston"],"insert into manage_bv_history set downline_id='".$userid."', income_id='$income_id', level='$level', point='$withdrawal_commission', date='$subs_date', status='1'");
    //   }
    // }



        

   mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set designation='Paid Member', user_rank_name='Paid Member', user_plan='".$pack['package']."' where user_id='$userid'");
    
   
     commission_of_referal($cure['ref_id'],$userid,$amount,$rand);
            $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
            while($upline=mysqli_fetch_array($upliners))
            {
           
              $income_id=$upline['income_id'];
              $position=$upline['leg'];
              $user_level=$upline['level']; 
              mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
             pairing_bonus($income_id);

  
            }
            

       

    mysqli_query($GLOBALS["___mysqli_ston"],"update user_request set status='".$status."' where id='".$newid."'");

    $invoice_no=rand(1111111111,9999999999);
  
   // send_invoice($rand);
    header('location:approved-user-request.php?msg=You have successfully activated '.$userid.' account');
    exit;
  }
  else
  {
    mysqli_query($GLOBALS["___mysqli_ston"],"update user_request set status='".$status."' where id='".$newid."'");
    header('location:rejected-user-request.php');exit;
     
  }
}
else
{
  header('location:pending-user-request.php?msg=Validation Error Occur');
  exit;
}

?>

