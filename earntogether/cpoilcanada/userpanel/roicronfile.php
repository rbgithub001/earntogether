<?php
include("../lib/config.php");
$date=date('Y-m-d');

   $day=date('d');
$resdt11=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `lifejacket_subscription`");
while($resdt1=mysqli_fetch_array($resdt11)){
    $user=$resdt1['user_id'];
    $uid=$user;
    $package=$resdt1['package'];
    $sqlqw5=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='$package'"));
    $pb=$sqlqw5['sponsor_reward'];
    $package_id=$sqlqw5['id'];
    //echo "select *from investment where package_id='$package_id' and user_id='$uid'"; echo '</br>';
     $first=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select *  from lifejacket_subscription where id='".$resdt1['id']."'"));
     $rwallet1=$pb*$first['amount']/100;  
     $income=$rwallet1; 
     $ref_amount=$income*2/100; 
     $rand = rand(0000000001,9000000000);

     $user_ref_data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_id='".$resdt1['user_id']."'"));
     $ref_user_id = $user_ref_data['ref_id'];
     
     $direct_count = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count FROM `user_registration` where user_plan>0 and  ref_id='".$resdt1['user_id']."'"));
     $direct_counts =$direct_count['direct_count'];
   if($direct_counts>=10){
           $direct_count_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count_amount FROM `credit_debit` where user_id='".$resdt1['user_id']."' and ttype='Recruiting Bonus' and credit_amt='25'"));
           $direct_count_amounts =$direct_count_amount['direct_count_amount'];
           if($direct_count_amounts==0){
          mysqli_query($GLOBALS["___mysqli_ston"], "update rmb_wallet set amount=(amount+25) where user_id='".$uid."'");
          mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','25','0','$shopping','$uid','Recruiting Bonus','$date','Recruiting Bonus','Recruiting Bonus','".$sqlqw5['name']."','$lifejacket_id','$rand','10 Direct Active Users','0','RMB Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','0','".$first['amount']."')");  
            } 
           } 


      if($direct_counts>=25){
           $direct_count_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count_amount FROM `credit_debit` where user_id='".$resdt1['user_id']."' and ttype='Recruiting Bonus' and credit_amt='50'"));
           $direct_count_amounts =$direct_count_amount['direct_count_amount'];
           if($direct_count_amounts==0){
        	mysqli_query($GLOBALS["___mysqli_ston"], "update rmb_wallet set amount=(amount+50) where user_id='".$uid."'");
        	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','50','0','$shopping','$uid','Recruiting Bonus','$date','Recruiting Bonus','Recruiting Bonus','".$sqlqw5['name']."','$lifejacket_id','$rand','25 Direct Active Users','0','RMB Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','0','".$first['amount']."')");	
            } 
           } 
      
      
      if($direct_counts>=50){
           $direct_count_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count_amount FROM `credit_debit` where user_id='".$resdt1['user_id']."' and ttype='Recruiting Bonus' and credit_amt='100'"));
           $direct_count_amounts =$direct_count_amount['direct_count_amount'];
           if($direct_count_amounts==0){
        	mysqli_query($GLOBALS["___mysqli_ston"], "update rmb_wallet set amount=(amount+100) where user_id='".$uid."'");
        	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','100','0','$shopping','$uid','Recruiting Bonus','$date','Recruiting Bonus','Recruiting Bonus','".$sqlqw5['name']."','$lifejacket_id','$rand','50 Direct Active Users','0','RMB Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','0','".$first['amount']."')");	
      } 
     }
    
   if($direct_counts>=75){
           $direct_count_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count_amount FROM `credit_debit` where user_id='".$resdt1['user_id']."' and ttype='Recruiting Bonus' and credit_amt='175'"));
           $direct_count_amounts =$direct_count_amount['direct_count_amount'];
           if($direct_count_amounts==0){
            mysqli_query($GLOBALS["___mysqli_ston"], "update rmb_wallet set amount=(amount+175) where user_id='".$uid."'");
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','175','0','$shopping','$uid','Recruiting Bonus','$date','Recruiting Bonus','Recruiting Bonus','".$sqlqw5['name']."','$lifejacket_id','$rand','75 Direct Active Users','0','RMB Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','0','".$first['amount']."')");	
       } 
    } 


     if($direct_counts>=100){
           $direct_count_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count_amount FROM `credit_debit` where user_id='".$resdt1['user_id']."' and ttype='Recruiting Bonus' and credit_amt='250'"));
           $direct_count_amounts =$direct_count_amount['direct_count_amount'];
           if($direct_count_amounts==0){
            mysqli_query($GLOBALS["___mysqli_ston"], "update rmb_wallet set amount=(amount+250) where user_id='".$uid."'");
        	   mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','250','0','$shopping','$uid','Recruiting Bonus','$date','Recruiting Bonus','Recruiting Bonus','".$sqlqw5['name']."','$lifejacket_id','$rand','100 Direct Active Users','0','RMB Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','0','".$first['amount']."')");	
          }
     }
     
          if($direct_counts>150){
           $direct_count_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as direct_count_amount FROM `credit_debit` where user_id='".$resdt1['user_id']."' and ttype='Recruiting Bonus' and credit_amt='500'"));
           $direct_count_amounts =$direct_count_amount['direct_count_amount'];
           if($direct_count_amounts==0){
                mysqli_query($GLOBALS["___mysqli_ston"], "update rmb_wallet set amount=(amount+500) where user_id='".$uid."'");
        	   mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','500','0','$shopping','$uid','Recruiting Bonus','$date','Recruiting Bonus','Recruiting Bonus','".$sqlqw5['name']."','$lifejacket_id','$rand','".$first['package']."','0','RMB Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','0','".$first['amount']."')");	
          }
       }
      
	if($income!='' && $income>0){
    $end_date=date('Y-m-d', strtotime($date. ' + 7 days'));
	mysqli_query($GLOBALS["___mysqli_ston"], "update t_wallet set amount=(amount+$income) where user_id='".$uid."'");
    mysqli_query($GLOBALS["___mysqli_ston"], "update t_wallet set amount=(amount+$ref_amount) where user_id='".$ref_user_id."'");
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	if($day!=06 and $day!=07){
	   if($ref_user_id!='cmp'){
	    // $ref_user_id=123456;  
	      mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$ref_user_id','$ref_amount','0','$shopping','$ref_user_id','$uid','$date','Residual Income','Residual Income','".$sqlqw5['name']."','$lifejacket_id','$rand','".$first['package']."','0','T Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','2','".$first['amount']."')");
	   } 
   	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$rand','$uid','$income','0','$shopping','$uid','Admin','$date','Roi Income','Roi Income','".$sqlqw5['name']."','$lifejacket_id','$rand','".$first['package']."','0','T Wallet',CURRENT_TIMESTAMP,'$urls','$package_id','$pb','".$first['amount']."')");	
	}
	    
	}
     }
     
     
echo "Closing Done";
?>