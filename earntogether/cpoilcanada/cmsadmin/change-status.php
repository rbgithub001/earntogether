<?php
include("../lib/config.php");

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
    //var_dump($tpv); 
    //die;
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
                    //$bonus = 1000000;
                    //mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$bonus) where user_id='".$userid."'");
                    /*mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$userid','$bonus','0','0','$userid','Admin','$date','Rank Bonus','Rank Bonus $userid','Rank Bonus for Ambassador','$downadd','$invoice_no','$tpv','0','E Wallet','$urls','$tpv','0','$tpv')");
                    */
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

function commission_matching($user1,$amount){
    $invoice_no=rand(100000000,9999999999);
    $userid=$user1;
    $date=date('Y-m-d');
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    $invoice_no=$invoice_no;
    $data_level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userid'");
    while($data_level12=mysqli_fetch_array($data_level1)){
        $level=$data_level12['level'];   
        $income_id=$data_level12['income_id']; 
        $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$income_id'"));
        $plan=$comm['user_plan'];
        if($comm['user_rank_name']=='Paid Member'){

            $withdrawal_commission11=$amount;
            //  if($comm['user_plan']==1){
            //                           if($level==1 ){
            //                           $spc=6;
            //                             }else if($level==2){
            //                             $spc=3;
            //                           }else if($level==3){
            //                             $spc=1;
            //                           }else if($level>=4 && $level<=6){
            //                             $spc=0.25;
            //                           }else if($level>=7 && $level<=10){
            //                             $spc=0.50;
            //                           }else if($level>=11 && $level<=15){
            //                             $spc=0.75;
            //                           }else if($level>=16 && $level<=20){
            //                             $spc=0.95;
            //                           }else{
            //                           $spc=0;
            //                             } 
            // }
            //  if($comm['user_plan']==2){
            //                           if($level==1 ){
            //                           $spc=7;
            //                             }else if($level==2){
            //                             $spc=4;
            //                           }else if($level==3){
            //                             $spc=1;
            //                           }else if($level>=4 && $level<=6){
            //                             $spc=0.25;
            //                           }else if($level>=7 && $level<=10){
            //                             $spc=0.50;
            //                           }else if($level>=11 && $level<=15){
            //                             $spc=0.75;
            //                           }else if($level>=16 && $level<=20){
            //                             $spc=0.95;
            //                           }else{
            //                           $spc=0;
            //                             } 
            // }
            // if($comm['user_plan']==3){
            //                                   if($level==1 ){
            //                           $spc=8;
            //                             }else if($level==2){
            //                             $spc=5;
            //                           }else if($level==3){
            //                             $spc=1;
            //                           }else if($level>=4 && $level<=6){
            //                             $spc=0.25;
            //                           }else if($level>=7 && $level<=10){
            //                             $spc=0.50;
            //                           }else if($level>=11 && $level<=15){
            //                             $spc=0.75;
            //                           }else if($level>=16 && $level<=20){
            //                             $spc=0.95;
            //                           }else{
            //                           $spc=0;
            //                             } 
            // }
            // if($comm['user_plan']==4){
            //                                 if($level==1 ){
            //                           $spc=10;
            //                             }else if($level==2){
            //                             $spc=6;
            //                           }else if($level==3){
            //                             $spc=1;
            //                           }else if($level>=4 && $level<=6){
            //                             $spc=0.25;
            //                           }else if($level>=7 && $level<=10){
            //                             $spc=0.50;
            //                           }else if($level>=11 && $level<=15){
            //                             $spc=0.75;
            //                           }else if($level>=16 && $level<=20){
            //                             $spc=0.95;
            //                           }else{
            //                           $spc=0;
            //                             } 
            // }
            $spc=5;
            $total=$withdrawal_commission11*$spc/100;
            $withdrawal_commission1=$total;
          
            if ($withdrawal_commission1>0) {
                mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$withdrawal_commission1) where user_id='".$income_id."'");
                $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$income_id','$withdrawal_commission1','0','$withdrawal_commission11','$income_id','$userid','$date','Level Income','Level Income','Level Income From $level','$tds','$invoice_no','$admin','0','Income Wallet',CURRENT_TIMESTAMP,'$urls','".$comm['user_plan']."','$spc','$withdrawal_commission11')");  
            }
        }
    }
}

/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages){
    
	$date=date('Y-m-d');
	$commpackage=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select package from user_request where user_id='".$ref."'"));
	$pack_id=$commpackage['package']; 
	$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack_id."'"));
	$spc=$comm['referral'];
	$withdrawal_commission=$spc*$amount/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0)
	{
	mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
	$urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls','$packages','$spc','$amount')");	

	}


}
/* Sponsor Commission Code Ends Here*/


if($_GET['id']!='' && $_GET['status']!=''){
    $newid=$_GET['id'];
    $status=$_GET['status'];
    $pack=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM user_request WHERE id='".$newid."'"));
    if($status==1){
        $invest_type=$pack['se_amount'];
        $userid=$pack['user_id'];
        $cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$userid."'"));
        $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='".$pack['package']."'"));
        $packId = $pack['package'];
        $package_name=$comm['name'];
        $pbs1=$pack['amount'];
        $matching=$comm['matching'];
        $amount=$pack['amount'];
        $amount11=$pack['amount'];
        $current_time = date('Y-m-d h:i:s');
        $investduration = $comm['roi_duration'];
        $ewa='final_e_wallet';
        $walls="Income Wallet";
        $rand = rand(0000000001,9000000000);
        $start=date('Y-m-d');
        $end = date('Y-m-d', strtotime($start. '+'.$investduration.' days'));
        if($packId ==5){
            $next_pay = date('Y-m-d', strtotime($start. '+ 30 days'));
        }else{
            $next_pay = date('Y-m-d', strtotime($start. '+ 1 days'));
        }
        $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'")); 
        $refid      =   $ref['ref_id'];
   
        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        $pv=$amount;
        $lfid="LJ".$userid.$rand;
        mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE t_wallet SET amount=(amount+$amount) WHERE user_id='$userid'");
        $cron_date1=date('Y-m-d', strtotime($start. ' + 1 days'));
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `investment` (`id`, `user_id`, `package_id`, `investment_fee`) VALUES (NULL, '$userid', '".$pack['package']."', '$amount')");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`,`invest_type`,`cron_date`,`after_active`,`next_pay`,`payout_status`) 
        VALUES (NULL, '$userid', '".$pack['package']."', '$amount11', 'package upgrade', '$pincodes', '$rand', '$start', '$end', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$userid."','".$cure['ref_id']."','$privious_investment','$invest_type','$cron_date1','$amount11','$next_pay','0')");
        
        mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set active_status='1', designation='Paid Member', user_rank_name='Paid Member' where user_id='$userid'");
    
        $lifejuserid = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select package from lifejacket_subscription where user_id='$userid' order by id desc "));   
        $package=$lifejuserid['package'];

        /*if($pack['package']>$package){
            //die('dsdsd2');
            mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set designation='Paid Member', user_rank_name='Paid Member', user_plan='".$pack['package']."' where user_id='$userid'");
        }*/
    
        $upliners1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userid'");
        while($upline1=mysqli_fetch_array($upliners1)){
            $income_id1=$upline1['income_id'];
            $position1=$uplin1e['leg'];
            $user_level1=$upline1['level'];
            $checkactiveinv = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select active_status from user_registration where user_id='$income_id1'"));
            $activestatus = $checkactiveinv['active_status'];
            if($activestatus == 1){
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id1','$userid','$user_level1','$amount','$position1','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount','$amount')");
            }else{
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id1','$userid','$user_level1','$amount','$position1','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount','0')");
            }
        }
        
        $mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$userid' "));
        $mydincome = $mydownlineincomes['total'];
        $powelegbusinessmydown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$userid'"));
        $selfpowelegmydownbusiness = $powelegbusinessmydown['power_leg_business'];
        $selfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$userid'"));
        $selft = $selfincomes['total'];
        $mytotalincome = $selft+$mydincome+$selfpowelegmydownbusiness;
        
        $refdownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$refid' "));
        $refdincome = $refdownlineincomes['total'];
        $refincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$refid'"));
        $reft = $refincomes['total'];
        $powelegbusinessrefdown = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$refid'"));
        $refpoweleg = $powelegbusinessrefdown['power_leg_business'];
     
        $reftotalincome = $reft+$refdincome+$refpoweleg;
    
        if($reftotalincome >0 && $reftotalincome< 1000){
            $refslab = 5;
            $rank = 1;
        }elseif($reftotalincome >=1000 && $reftotalincome< 4000){
            $refslab = 7;
            $rank = 2;
        }elseif($reftotalincome >=4000 && $reftotalincome< 20000){
            $refslab = 9;
            $rank = 3;
        }elseif($reftotalincome >=20000 && $reftotalincome< 50000){
            $refslab = 11;
            $rank = 4;
        }elseif($reftotalincome >=50000 && $reftotalincome< 100000){
            $refslab = 12.5;
            $rank = 5;
        }elseif($reftotalincome >=100000 && $reftotalincome< 500000){
            $refslab = 14;
            $rank = 6;
        }elseif($reftotalincome >=500000 && $reftotalincome< 1000000){
            $refslab = 15.5;
            $rank = 7;
        }elseif($reftotalincome >=1000000 && $reftotalincome< 2000000){
            $refslab = 17;
            $rank = 8;
        }elseif($reftotalincome >=2000000 && $reftotalincome< 5000000){
            $refslab = 18;
            $rank = 9;
        }elseif($reftotalincome >=5000000 && $reftotalincome< 10000000){
            $refslab = 19;
            $rank = 10;
        }elseif($reftotalincome >=10000000){
            $refslab = 20;
            $rank = 11;
        }else{
            $refslab = 0;
            $rank = 0;
        }
        
        $checkactiveref = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select active_status from user_registration where user_id='$refid'"));
        if($checkactiveref['active_status'] == '1'){
            mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set slab='".$refslab."', rank='".$rank."' WHERE user_id='$refid'");
        }
        
        if($mytotalincome >0 && $mytotalincome< 1000){
            $myslab = 5;
            $myrank = 1;
        }elseif($mytotalincome >=1000 && $mytotalincome< 4000){
            $myslab = 7;
            $myrank = 2;
        }elseif($mytotalincome >=4000 && $mytotalincome< 20000){
            $myslab = 9;
            $myrank = 3;
        }elseif($mytotalincome >=20000 && $mytotalincome< 50000){
            $myslab = 11;
            $myrank = 4;
        }elseif($mytotalincome >=50000 && $mytotalincome< 100000){
            $myslab = 12.5;
            $myrank = 5;
        }elseif($mytotalincome >=100000 && $mytotalincome< 500000){
            $myslab = 14;
            $myrank = 6;
        }elseif($mytotalincome >=500000 && $mytotalincome< 1000000){
            $myslab = 15.5;
            $myrank = 7;
        }elseif($mytotalincome >=1000000 && $mytotalincome< 2000000){
            $myslab = 17;
            $myrank = 8;
        }elseif($mytotalincome >=2000000 && $mytotalincome< 5000000){
            $myslab = 18;
            $myrank = 9;
        }elseif($mytotalincome >=5000000 && $mytotalincome< 10000000){
            $myslab = 19;
            $myrank = 10;
        }elseif($mytotalincome >=10000000){
            $myslab = 20;
            $myrank = 11;
        }else{
            $myslab = 0;
            $myrank = 0;
        }

        mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set slab='".$myslab."', rank='".$myrank."' WHERE user_id='$userid'");

        $checkdirectst = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select active_status from user_registration where user_id='$refid'"));
        if($checkdirectst['active_status'] == '1'){
            $ts = date('Y-m-d h:i:s');
            $urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            $date = date('Y-m-d');
            $rand = rand(0000001,9999999);
    		$invoice_no=$user_id.$rand;
    		$lfid="LJ".$user_id.$rand;
    		$difslab = $refslab;
            //$difslab = $refslab-$myslab;
            $bonusdirect = $pbs1*$difslab/100;
            $rederralcom = $bonusdirect*90/100;
            $directsp = $bonusdirect*10/100;
            if($bonusdirect > 0){
                mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE final_e_wallet SET amount=(amount+$rederralcom) WHERE user_id='$refid'");
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                values('$invoice_no','$refid','$rederralcom','0','0','$refid','$userid','$date','Direct Referral Income','Direct Referral Income $user_id 10% goes to direct sponsor','Direct Referral Income by $userid 10% goes to direct sponsor','Direct Referral Income $userid','$invoice_no','Direct Referral Income by $user_id','0','E Wallet','$urls','".$pack['package']."','$difslab','$pbs1')");
            
                $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$refid'"));
                $sqlqwref = $sqlqw1['ref_id'];
                $sqlqw1refd=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select active_status from user_registration where user_id='$sqlqwref'"));
                if($sqlqw1refd['active_status'] == 1){
                    mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE final_e_wallet SET amount=(amount+$directsp) WHERE user_id='$sqlqwref'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$sqlqwref','$directsp','0','0','$sqlqwref','$refid','$date','Sponsor Income','Sponsor Income $sqlqwref','Sponsor Income by $refid ','Sponsor Income $refid','$invoice_no','Sponsor Income by $refid','0','E Wallet','$urls','0','0','$bonusdirect')");
                
                }
            }   
        }
    
        $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userid'");
        while($upline=mysqli_fetch_array($upliners)){
            $income_id=$upline['income_id'];
            //$income_id=$upline['income_id'];
            $position=$upline['leg'];
            $user_level=$upline['level']; 
            
            $incref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$income_id'")); 
            $increfid      =   $incref['ref_id'];
            
            $incdownlinebuss = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$income_id' "));
            $incdincome = $incdownlinebuss['total'];
            $incselfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$income_id'"));
            $incselft = $incselfincomes['total'];
            $incpowelegbusiness = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$income_id'"));
            $incpowelegbus = $incpowelegbusiness['power_leg_business'];
    
            $inctotalincome = $incselft+$incdincome+$incpowelegbus;
            
            $increfdownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$increfid' "));
            $increfdincome = $increfdownlineincomes['total'];
            $increfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$increfid'"));
            $increft = $increfincomes['total'];
            $increfpowelegbusiness = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$increfid'"));
            $increfpoweleg = $increfpowelegbusiness['power_leg_business'];
            $increftotalincome = $increft+$increfdincome+$increfpoweleg;
            
            if($inctotalincome >0 && $inctotalincome< 1000){
                $incslab = 5;
                $incrank = 1;
            }elseif($inctotalincome >=1000 && $inctotalincome< 4000){
                $incslab = 7;
                $incrank = 2;
            }elseif($inctotalincome >=4000 && $inctotalincome< 20000){
                $incslab = 9;
                $incrank = 3;
            }elseif($inctotalincome >=20000 && $inctotalincome< 50000){
                $incslab = 11;
                $incrank = 4;
            }elseif($inctotalincome >=50000 && $inctotalincome< 100000){
                $incslab = 12.5;
                $incrank = 5;
            }elseif($inctotalincome >=100000 && $inctotalincome< 500000){
                $incslab = 14;
                $incrank = 6;
            }elseif($inctotalincome >=500000 && $inctotalincome< 1000000){
                $incslab = 15.5;
                $incrank = 7;
            }elseif($inctotalincome >=1000000 && $inctotalincome< 2000000){
                $incslab = 17;
                $incrank = 8;
            }elseif($inctotalincome >=2000000 && $inctotalincome< 5000000){
                $incslab = 18;
                $incrank = 9;
            }elseif($inctotalincome >=5000000 && $inctotalincome< 10000000){
                $incslab = 19;
                $incrank = 10;
            }elseif($inctotalincome >=10000000){
                $incslab = 20;
                $incrank = 11;
            }else{
                $incslab = 0;
                $incrank = 0;
            }
            
            $checkactiveincome_id = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select active_status from user_registration where user_id='$income_id'"));
            if($checkactiveincome_id['active_status'] == '1'){
               mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set slab='".$incslab."', rank='".$incrank."' WHERE user_id='$income_id'");
            }
            
            
            
            if($increftotalincome >0 && $increftotalincome< 1000){
                $slab = 5;
                $increfrank = 1;
            }elseif($increftotalincome >=1000 && $increftotalincome< 4000){
                $slab = 7;
                $increfrank = 2;
            }elseif($increftotalincome >=4000 && $increftotalincome< 20000){
                $slab = 9;
                $increfrank = 3;
            }elseif($increftotalincome >=20000 && $increftotalincome< 50000){
                $slab = 11;
                $increfrank = 4;
            }elseif($increftotalincome >=50000 && $increftotalincome< 100000){
                $slab = 12.5;
                $increfrank = 5;
            }elseif($increftotalincome >=100000 && $increftotalincome< 500000){
                $slab = 14;
                $increfrank = 6;
            }elseif($increftotalincome >=500000 && $increftotalincome< 1000000){
                $slab = 15.5;
                $increfrank = 7;
            }elseif($increftotalincome >=1000000 && $increftotalincome< 2000000){
                $slab = 17;
                $increfrank = 8;
            }elseif($increftotalincome >=2000000 && $increftotalincome< 5000000){
                $slab = 18;
                $increfrank = 9;
            }elseif($increftotalincome >=5000000 && $increftotalincome< 10000000){
                $slab = 19;
                $increfrank = 10;
            }elseif($increftotalincome >=10000000){
                $slab = 20;
                $increfrank = 11;
            }else{
                $slab = 0;
                $increfrank = 0;
            }
            
            $checkactiveincrefid = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select active_status from user_registration where user_id='$increfid'"));
            if($checkactiveincrefid['active_status'] == '1'){
               mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set slab='".$slab."', set='".$increfrank."' WHERE user_id='$increfid'");
            }
            
            
            if($slab>$incslab){
                $ts = date('Y-m-d h:i:s');
                $urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                $date = date('Y-m-d');
                $rand = rand(0000001,9999999);
        		$invoice_no=$income_id.$rand;
        		$lfid="LJ".$income_id.$rand;
                $difslab1 = $slab-$incslab;
                $bonusdirect1 = $pbs1*$difslab1/100;
                $directsposorincome = $bonusdirect1*10/100;
                $referralbonus = $bonusdirect1*90/100;
                if($referralbonus > 0){
                    mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE level_e_wallet SET amount=(amount+$referralbonus) WHERE user_id='$increfid'");
                    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                    values('$invoice_no','$increfid','$referralbonus','0','0','$increfid','$income_id','$date','Level Income','Level Income $increfid 10% goes to direct sponsor','Level Income by $income_id for level $user_level','Level Income $increfid 10% goes to direct sponsor','$invoice_no','Level Income by $income_id 10% goes to direct sponsor','0','Income Wallet','$urls','".$pack['package']."','$difslab1','$pbs1')");
                
                    $selectref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ref_id FROM `user_registration` where user_id = '$increfid'"));
                    $linref = $selectref['ref_id'];
                    $checkrestatus=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT active_status FROM `user_registration` where user_id = '$linref'"));
                    if($checkrestatus['active_status'] == 1){
                        
                        mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE final_e_wallet SET amount=(amount+$directsposorincome) WHERE user_id='$linref'");
                        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`,`package_id`, `percent`, `total_invesment_amount`) 
                        values('$invoice_no','$linref','$directsposorincome','0','0','$linref','$increfid','$date','Sponsor Income','Sponsor Income $linref','Sponsor Income by $increfid','Sponsor Income of 10% from $bonusdirect1','$invoice_no','Sponsor Income by $increfid','0','Income Wallet','$urls','0','10','$bonusdirect1')");
                
                    }
                    
                }  
            }
            
        }
        //die;
        
        bonuson_rank($userid);
    
        //commission_matching($userid,$amount);
        mysqli_query($GLOBALS["___mysqli_ston"],"update user_request set status='".$status."' where id='".$newid."'");
    
        $invoice_no=rand(1111111111,9999999999);
        header('location:approved-user-request.php?msg=You have successfully activated '.$userid.' account');
        exit;
    }
  else{
        mysqli_query($GLOBALS["___mysqli_ston"],"update user_request set status='".$status."' where id='".$newid."'");
        header('location:rejected-user-request.php');exit;
    }
}
else{
    header('location:pending-user-request.php?msg=Validation Error Occur');
    exit;
}

?>

