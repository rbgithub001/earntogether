<?php
session_start(); 
 include("header.php");
function bonuson_rank($userid){
    $userid = $userid;
    //echo 'Current user ID'.$userid;
    //echo '<br/>';
    $pvarray = array();
    $tpv = 0;
    $selfbusiness = 0;
    $downbusiness = 0;
    $sbv = 0;
    $dpv = 0;
    $downtotal = 0;
    $maxpv = 0;
    $smallertotal = 0;
    $get50max = 0;
    $downadd = 0;
    $mypreviousrank = 0;
    $mypreviousrank2 = 0;
    $mypreviousrank3 = 0;
    $mypreviousrank4 = 0;
    $mypreviousrank5 = 0;
    $mypreviousrank6 = 0;
    $mypreviousrank7 = 0;
    $mypreviousrank8 = 0;
    $mypreviousrank9 = 0;
    $mypreviousrank10 = 0;
    $mypreviousrank11 = 0;
    
    $previousrankdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank = $previousrankdata['rank'];
    //var_dump($mypreviousrank); 
    
    $powelegbusiness = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$userid'"));
    $selfpowelegbusiness = $powelegbusiness['power_leg_business'];
    $selfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$userid'"));
    $selfbusiness = $selfincomes['total'];
    //var_dump($selfbusiness); 
    //die;
    $mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(bv) as total from manage_bv_history where income_id='$userid' "));
    $downbusiness = $mydownlineincomes['total'];
    //var_dump($downbusiness); 
    //die;
    $tpv = $selfbusiness+$downbusiness+$selfpowelegbusiness;
 /*   var_dump($tpv); 
    die;*/
    $ts = date('Y-m-d h:i:s');
    $urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    $date = date('Y-m-d');
    $rand = rand(0000001,9999999);
	$invoice_no=$userid.$rand;
	$lfid="LJ".$income_id.$rand;
    
    if($tpv >= 1000){
        $downadd = 0;
        $smallertotal = 0;
        $target = 1000;
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '2' where user_id='".$userid."'");
        
        $r1confirm = 1;
        $pvarray1 = [$selfbusiness];
        
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            
            array_push($pvarray,$downtotal);
        }
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
    
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='2' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        
        $checkactive = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive['active_status'] == 1){
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','2')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='2'");
            }
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='2' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('2','Starter','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Starter', rank_status='1' where user_id='".$userid."' and rank='2'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='2' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 50;
                    //echo "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'";
                    //echo '<br>';
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for starter','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='2'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='2' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='2'");
                }
            }
        }
    }
    
    $previousrankdata2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank2 = $previousrankdata2['rank'];
    
    if($tpv >= 4000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 4000;
        $maxpv = 0;
        $strongleg = 0;
    
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '3' where user_id='".$userid."'");
        $r2confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            
            array_push($pvarray,$downtotal);
            
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='3' and rank_qualify='1'"));
        $checkranks1 = $checkqualifyrank['tot'];
        
        $checkactive1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        
        if($checkactive1['active_status'] == 1){
            if($checkranks1<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','3')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='3'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='3' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('3','Associate','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Associate', rank_status='1' where user_id='".$userid."' and rank='3'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='3' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank1['tot'];
                if($chkbr <= 0){
                    $bonus = 150;
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Associate','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='3'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='3' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='3'");
                }
            }
        }
    }
    
    $previousrankdata3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank3 = $previousrankdata3['rank'];
    if($tpv >= 20000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 20000;
        $maxpv = 0;
        $strongleg = 0;
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '4' where user_id='".$userid."'");
        
        $r3confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            
            array_push($pvarray,$downtotal);
            
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='4' and rank_qualify='1'"));
        $checkranks2 = $checkqualifyrank['tot'];
        
        $checkactive2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive2['active_status'] == 1){
        
            if($checkranks2<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','4')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='4'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='4' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('4','Sr Associate','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Sr Associate', rank_status='1' where user_id='".$userid."' and rank='4'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='4' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 800;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Sr Associate','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='4'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='4' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='4'");
                }
            }
        }
        
    }
    
    $previousrankdata4 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank4 = $previousrankdata4['rank'];
    
    if($tpv >= 50000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 50000;
        $maxpv = 0;
        $strongleg = 0;
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '5' where user_id='".$userid."'");
        
        $r4confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='5' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive3['active_status'] == 1){
        
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','5')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='5'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='5' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('5','Adviser','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Adviser', rank_status='1' where user_id='".$userid."' and rank='5'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='5' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 2000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for adviser','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='5'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='5' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='5'");
                }
            }
        }
    }
    
    $previousrankdata5 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank5 = $previousrankdata5['rank'];
    
    if($tpv >= 100000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 100000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '6' where user_id='".$userid."'");
        
        $r5confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='6' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive4 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive4['active_status'] == 1){
        
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','6')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='6'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='6' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('6','Sr Adviser','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Sr Adviser', rank_status='1' where user_id='".$userid."' and rank='6'");
            }
        
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='6' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 5000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Sr adviser','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='6'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='6' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='6'");
                }
            }
        }
    }
    
    $previousrankdata6 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank6 = $previousrankdata6['rank'];
    
    if($tpv >= 500000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 500000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '7' where user_id='".$userid."'");
        
        $r6confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='7' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive5 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive5['active_status'] == 1){
        
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','7')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='7'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='7' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('7','Director','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Director', rank_status='1' where user_id='".$userid."' and rank='7'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='7' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 20000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Director','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='7'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='7' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='7'");
                }
            }
        }
    }
    
    $previousrankdata7 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank7 = $previousrankdata7['rank'];
    
    if($tpv >= 1000000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 1000000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '8' where user_id='".$userid."'");
        
        $r7confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$powelegbusinessdown;
            //echo 'down total->'.$downtotal;
            //echo '<br>';
            array_push($pvarray,$downtotal);
            //echo '<pre>inner array'; print_r($pvarray); 
            //echo '<br>';
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='8' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive6 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive6['active_status'] == 1){
        
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','8')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='8'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='8' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('8','Sr Director','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Sr Director', rank_status='1' where user_id='".$userid."' and rank='8'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='8' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 50000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Sr Director','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='8'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='8' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='8'");
                }
            }
        }
        
    }
    
    $previousrankdata8 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank8 = $previousrankdata8['rank'];
    
    if($tpv >= 2000000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 2000000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '9' where user_id='".$userid."'");
        
        $r8confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='9' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive7 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive7['active_status'] == 1){
            
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','9')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='9'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='9' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('9','Star Director','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Star Director', rank_status='1' where user_id='".$userid."' and rank='9'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='9' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 100000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Star Director','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='9'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='9' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='9'");
                }
            }
        }
        
    }
    
    $previousrankdata9 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank9 = $previousrankdata9['rank'];
    
    if($tpv >= 5000000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 5000000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '10' where user_id='".$userid."'");
        $r9confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='10' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive8 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive8['active_status'] == 1){
        
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','10')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='10'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='10' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('10','Sr Star Director','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_name='Sr Star Director', rank_status='1' where user_id='".$userid."' and rank='10'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='10' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 200000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Sr Star Director','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='10'");
                }
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='10' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='10'");
                }
            }
        }
        
    }
    
    $previousrankdata10 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank10 = $previousrankdata10['rank'];
    
    if($tpv >= 10000000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 10000000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '11' where user_id='".$userid."'");
        $r10confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='11' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive9 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive9['active_status'] == 1){
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','11')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='11'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='11' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('11','SuperStar Director','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank rank_name='SuperStar Director', rank_status='1' where user_id='".$userid."' and rank='11'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='11' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    $bonus = 500000;
                    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for SuperStar Director','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='11'");
                }
                
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='11' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='11'");
                }
            }
        }
    }
    
    
    $previousrankdata11 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select rank from user_registration where user_id='$userid'"));
    $mypreviousrank11 = $previousrankdata11['rank'];
    
    
    if($tpv >= 20000000){
        $pvarray = array();
        $downadd = 0;
        $smallertotal = 0;
        $downtotal = 0;
        $target = 20000000;
        $maxpv = 0;
        $strongleg = 0;
        
        
        $targetcapping = $target*50/100;
        $firstdownline = mysqli_query($GLOBALS["___mysqli_ston"],"Select * from matrix_downline where income_id = '$userid' and level = '1'");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set rank = '12' where user_id='".$userid."'");
        $r11confirm = 1;
        $pvarray1 = [$selfbusiness];
        while($downline=mysqli_fetch_array($firstdownline)){
            $downid = $downline['down_id'];
            $powelegbusinessdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$downid'"));
            $selfpowelegbusiness1 = $powelegbusinessdown['power_leg_business'];
            
            $selfdownincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$downid'"));
            $sbv = $selfdownincomes['total'];
            $downlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$downid'"));
            $dpv = $downlineincomes['total'];
            $downtotal = $sbv+$dpv+$selfpowelegbusiness1;
            array_push($pvarray,$downtotal);
        }
        
        $pvarray = array_merge($pvarray1, $pvarray);
        $maxpv = max($pvarray);
        
        $key = array_search($maxpv, $pvarray);
        unset($pvarray[$key]);
        if($maxpv > $targetcapping){
            $strongleg = $targetcapping;
        }else{
            $strongleg = $maxpv;
        }
        
        $smallertotal = array_sum($pvarray);
        
        $downadd = $smallertotal+$strongleg;
        
        $checkqualifyrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='12' and rank_qualify='1'"));
        $checkranks = $checkqualifyrank['tot'];
        
        $checkactive10 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='$userid'"));
        if($checkactive10['active_status'] == 1){
            
            if($checkranks<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into bonus_on_rank (`user_id`,`rank_qualify`,`bonus_qualify`,`rank`) values('$userid','1','0','12')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank_qualify='1' where user_id='".$userid."' and rank='12'");
            }
            
            $checkreward_status = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='12' and rank_status='1'"));
            $reward_status = $checkreward_status['tot'];
            $ts = date('Y-m-d h:i:s');
            if($reward_status<=0){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into reward_status (`rank`,`rank_name`,`rank_status`,`reward_status`,`user_id`,`achieved_date`,`ts`,`status`) values('12','Ambassador','1','0','$userid','$date','$ts','0')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set rank='12', rank_name='Ambassador', rank_status='1' where user_id='".$userid."' and rank='12'");
            }
            
            if($downadd >= $target){
                $checkBonusonrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from bonus_on_rank where user_id='$userid' and rank='12' and rank_qualify='1' and bonus_qualify='1'"));
                $chkbr = $checkBonusonrank['tot'];
                if($chkbr <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update bonus_on_rank set bonus_qualify='1' where user_id='".$userid."' and rank='12'");
                }
                
                $checkrewardbonus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select COUNT(id) as tot from reward_status where user_id='$userid' and rank='12' and rank_status='1' and reward_status='1'"));
                $chkrwb = $checkrewardbonus['tot'];
                if($chkrwb <= 0){
                    mysqli_query($GLOBALS["___mysqli_ston"], "update reward_status set reward_status='1' where user_id='".$userid."' and rank='12'");
                }
                
            }
        }
        
    }
    
    
    
    $getrefid = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"Select ref_id from user_registration where user_id = '$userid'"));
    
    $refid = $getrefid['ref_id'];
    if($refid!='cmp'){
        bonuson_rank($refid);
    }else{
        //echo 'her1e'; die;
        return false;
    }
}

if (isset($_POST['sub'])){
        //echo '<pre>'; print_r($_POST); print_r($_SESSION); die;
        $pack_id=$_POST['package'];
        $user_id=$f['user_id'];
        $userid = $user_id;
        $sponsorid = $f['ref_id'];
        $txn_id=$user_id.rand(0000000001,9000000000);
        $payment_mode = $_POST['pay_mode'];
        $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='$pack_id'"));
        //var_dump($comm); die;
        if(empty($comm['id'])){
            header('location:invest_fund.php?msg=Something went wrong! Try again!');
            exit;
        }
        $packId = $pack_id;
        
        $capping=$comm['capping'];
        $pamount = $comm['amount'];
        $paid_id = $user_id;
        $current_time = date('Y-m-d h:i:s');
        $investduration = $comm['roi_duration'];
        
        $ewallet_table1='E Wallet';
    	$rand = rand(0000001,9999999);
    	$invoice_no=$user_id.$rand;
    	$lfid="LJ".$user_id.$rand;
    	$subs_date=date('Y-m-d');
        $end = date('Y-m-d', strtotime('+365 days'));
        
        if($txn_id!='' && $pamount!='' && $pamount != '0' && $user_id!=''){
            
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) 
	        VALUES (NULL, '$user_id', '$packId', '$pamount', '$ewallet_table1', '123456', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','$sponsorid','$capping')");

            mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set user_plan='$packId',designation='Paid User',user_rank_name='Paid User' where user_id='".$user_id."'");
    
            //header('location:invest_fund.php?msg=You have successfully subscribed to new package!');
            header('location:purchasepackageinvoice-report.php');
            exit;
            
        }
        else{
           header('location:invest_fund.php?msg=Session expired! Try again!');exit;
        }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <!--<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>-->
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">
       #example2 {
                border: 1px solid color:gray;
                padding-top: 22px;
                background-color: white;
                box-shadow: 4px 4px 2px 0px #c7c3c3;
                margin-bottom: 20px;
              }  
    </style>

  </head>

  <body class="">
    <div class="animsition">  
    
   
      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
   <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

        
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
   
      <?php include("top.php");?>
        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->
  

        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-12" id="example2">
           <!--<strong>Payment Information</strong>-->
           <strong style="color: black;"><i class="ti-wallet"></i> Are you sure want to subscribe this package ?</strong>
            <p><div align="center" style="color:green;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
        <div class="col-md-8" style="float: right;margin-bottom: 5px;">
           
        <!--   <button id="p1" style="color: green;">BITCOIN</button> -->
            <!--<button id="p2" style="color: blue;">TETHER</button>-->
        </div>
         
        </section> <!-- / PAGE TITLE -->

     
          <div class="container">

                        <!-- end row -->
                        <?php
                            if (!empty($_POST)){
                                //echo '<pre>'; print_r($_POST); die;
                                $package=$_POST['package'];
                                
                                $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='$package'"));
                                
                                $pname = $sqlqw1['name'];
                                $pamount = $sqlqw1['amount'];
                                $pcapping = $sqlqw1['capping'];
                                $proi_duration = $sqlqw1['roi_duration'];
                        ?>
                       
                      <?php if($_POST['pay_mode']=="e_wallet"){ ?>
                      
                      <div class="row">
                            <div class="card-box table-responsive" style="min-height: 500px !important;">
                                
                                <div class="col-sm-6">
                                   
                                    <form method="POST" enctype="multipart/form-data">
                                        <h3><?=$pname;?></h3>
                                        <input type="hidden" name="pay_mode" value='<?php echo $_POST['pay_mode']; ?>' required readonly>
                                        <input type="hidden" name="package" value='<?php echo $package; ?>' required readonly>
                                        <label style="color: green;">Target Sale : <?php echo CURRENCY.' '.$pamount;?> </label></br>
                                        <label style="color: green;">Target Days : <?php echo '1 Month';?> </label></br>
                                        <label style="color: green;">Max Earning : <?php echo CURRENCY.' '.$pcapping;?> </label></br>
                                        <div class="form-group">
                                            <input type="submit" name="sub" value="Continue" class="btn btn-secondary" id="submitdata1">
                                            <a  href="javascript:window.history.go(-1)" id="submitdata2" class="btn btn-warning">BACK</a>
                                        </div>                                            
                                    </form>
                                </div>

                            </div>
                        </div>
                      
                   <?php } ?>
                      
                   
                    <?php }else{ unset($_SESSION['amount']); header('location:package_upgrade.php');exit;}?>


                       
                        <!-- end row -->

                 

        </div> <!-- / container-fluid -->


<?php include("footer.php");?>

    </main> <!-- /playground -->

  

    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
 <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
     <script>
    function myFunctionleft(jag) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#myInputleft'+jag).text()).select();
    document.execCommand("copy");
    $temp.remove();
  }
 </script>
 <script>
    function myFunctionright(jag) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#myInputright'+jag).text()).select();
    document.execCommand("copy");
    $temp.remove();
  }
 </script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>

  <script type="text/javascript">
  
$(document).ready(function () {
  var z;
        $('#dependenddropdown').change(function () {
            z=$('#dependenddropdown').val();

            $('#addresss').text(z);
        });
    });

</script>
<script type="text/javascript">
  $("#p1").click(function(){

  $("#btc").show();
   $("#taaaahhh").show();
  $("#tether").hide();
  $("#thhh").hide();
});

$("#p2").click(function(){
 $("#btc").hide();
  $("#thhh").show();
  $("#tether").show();
  $("#taaaahhh").hide();
});
</script>
  <script>
        $(document).ready(function(){
             $("#ammm").keyup(function(){
                 var am = $("#ammm").val();
                 var am11 = $("#ammm112").val();
                 //var totalam = am*100+1;
                 var totalam = am*100;
                 var totalam1 = am*100;
                 var divide =totalam/am11;
                 
              if(am==''){
                     $('#ammm1').val('');
                     $('#ammm2').val('');
                     
                 }
                 if(am!=''){
                       $('#ammm1').val(totalam);
                       $('#ammm2').val(totalam1);
                  } 
                    
                    if(am==''){
                       $('#ammm11').val('');
                  }
                  if(am!=''){
                       $('#ammm11').val(divide);
                  } 
                  
                  
               
            });
        });
</script>
  <script>
        $(document).ready(function(){
             $("#ammmthere").keyup(function(){
                 var am = $("#ammmthere").val();
                
                 //var totalam = am*100+1;
                 var totalam = am*100;
                 var totalam1 = am*100;
                 var divide =totalam;
                 
              if(am==''){
                     $('#ammm1total').val('');
                     $('#ammmtotal2').val('');
                     
                 }
                 if(am!=''){
                       $('#ammm1total').val(totalam);
                       $('#ammmtotal2').val(totalam1);
                  } 
                    
                    if(am==''){
                       $('#ammm1tether1').val('');
                  }
                  if(am!=''){
                       $('#ammm1tether1').val(divide);
                  } 
                  
                  
               
            });
        });
</script>

  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>

<!-- <script>
    $("#payment_method").change(function(){
     var status = $(this).val();
     if(status=='qrcode'){
    $("#bitcoincode").show();
    $("#transid").show();
    $("#transproof").show();
    $("#submitdata1").show();
    $("#submitdata2").hide();
  }if(status=='blockchain'){
    alert('Coming soon');
    $("#bitcoincode").hide();
    $("#transid").hide();
    $("#transproof").hide();
    $("#submitdata1").hide();
    $("#submitdata2").show();
  }
  });
</script> -->

<script>
 $('#b1').click(function() { 
    var text = $(this).val(); 
    if(text=="BITCOIN"){
     $("#bitcoincode").show();
    $("#transid").show();
    $("#transproof").show();
    $("#ethererium").hide();
    $("#submitdata1").show();
    $("#submitdata2").show();
    }
    }); 
                                            
    $('#b2').click(function() { 
    var text = $(this).val(); 
    if(text=="ETHEREUM"){
    //alert('Coming soon');
    $("#ethererium").show();
    $("#transid").show();
    $("#transproof").show();
    $("#submitdata1").show();
    $("#submitdata2").show();
     }
    }); 
                                            
    $('#b3').click(function() { 
    var text = $(this).val(); 
    if(text=="litecoin"){
  
    $("#lightcoin").show();
    $("#transid").show();
    $("#transproof").show();
    $("#submitdata1").show();
    $("#submitdata2").show();
    }
 }); 
</script>

  </body>
</html>