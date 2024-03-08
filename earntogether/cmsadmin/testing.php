<?php
include("../lib/config.php");



die;



$saleamount=200000;
$inv='23432432';
$date=date('Y-m-d');

  $sellerid='RL462661';    
  
            $chkincrank2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select rank from user_registration where user_id='$sellerid' "));
                $urank2= $chkincrank2['rank'];
                
            $chkincname2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select level_per from user_rank_list where id='$urank2' "));
                $level_per2= $chkincname2['level_per'];
                
              
                
                $levelcom2 = ($saleamount*$level_per2)/100;
                $ttype2="Self Income";
                $quesale="INSERT INTO `credit_debit33`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                VALUES ('$inv','$sellerid','$levelcom2','0','0','$sellerid','$sellerid','$date','$ttype2','$ttype2','$ttype2','$ttype2','$inv','0','0','EWallet','$urls','$prid','$level_per2','$saleamount')";
                $chkexecute2 =mysqli_query($GLOBALS["___mysqli_ston"], $quesale);
           //   mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$levelcom2) where user_id='$sellerid' ");
            //   echo "update final_e_wallet set amount=(amount+$levelcom2) where user_id='$sellerid' ";
              $urankcount=0;
           $chkinc =mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$sellerid' ");
         while($cdatainc=mysqli_fetch_array($chkinc)){
                
                $income_id = $cdatainc['income_id'];
                $l1=$cdatainc['level'];
                $chkincrank = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select rank from user_registration where user_id='$income_id' "));
                $urank= $chkincrank['rank'];
                    
	       if($urank=='1'){
         	    $urankcount=$urankcount+1;
         	}
           if($urankcount=='2'){
         	    break;
         	}
  
         	    if($urank!='4' && $urankcount!='2'){
         	        
            $chkincper = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select percent from credit_debit33 where  transaction_no='$inv' and  receive_date='$date'  order by id  desc limit 1 "));
              
        	    $chkincname = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select level_per from user_rank_list where id='$urank'  "));
                 $level_per= $chkincname['level_per']-$chkincper['percent'];
                
                $levelcom = ($saleamount*$level_per)/100;
                $ttype="Level Income";
                $que="INSERT INTO `credit_debit33`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                VALUES ('$inv','$income_id','$levelcom','0','0','$income_id','$sellerid','$date','$ttype','$ttype','$ttype','$ttype','$inv','$l1','0','EWallet','$urls','$prid','$level_per','$saleamount')";

                $chkexecute =mysqli_query($GLOBALS["___mysqli_ston"], $que);

        		$fetchnompos1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select rank from user_registration where user_id='$income_id' "));
        		$urank=$fetchnompos1['rank'];
        		
        	
        	}
                

                
            }
            

        
        ?>