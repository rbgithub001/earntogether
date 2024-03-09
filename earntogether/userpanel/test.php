<?php 
include('../lib/config.php');
$sellerid = 'TA507357';
$data_level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$sellerid' ");
  while($data_level12=mysqli_fetch_array($data_level1))
  {
    $income_id=$data_level12['income_id'];
    echo 'userlevel=>'.$userLevel = $data_level12['level'];
    
    // $chktdsdset = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_id='$income_id' "));

    // $rank_id=$chktdsdset['rank'];   
    
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='$userLevel'"));
    // $commissionid=$comm['id'];
    // $commissionlvl=$comm['level_per'];

    // if($userLevel==$commissionid)
    // {  
    //     echo $spc=$comm['level_per'];
    // }
    echo $spc=$comm['level_per'];
 /* if($commissionid==1)
  {
    $spc=$commissionlvl;
  }elseif($commissionid==2){
       $spc=$commissionlvl;
  }elseif($commissionid==3){
       $spc=$commissionlvl;
  }elseif($commissionid==4){      
   $spc=$commissionlvl;
  }elseif($commissionid==5){   
       $spc=$commissionlvl;
   }else{
   $spc=0;
    } */
echo $spc.'<br>';
   // $totals=$totalamount*$spc/100;
    $comm_amt=$saleamount*$spc/100;
      
    if ($comm_amt>0 && $spc>0 ) {
                
                $tds =   $comm_amt*5/100;
                $finalpay=$comm_amt-$tds;
               //mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$finalpay) where user_id='".$income_id."'");
                //$quesale="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`,`commis_amt`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                //VALUES ('$inv','$sellerid','$finalpay','0','5','$income_id','$sellerid','$date','$ttype2','$ttype2','$relecom','$comm_amt','$ttype2','$inv','0','0','EWallet','$relcomper','$spc','$spc','$saleamount')";
                
                //$chkexecute2 =mysqli_query($GLOBALS["___mysqli_ston"], $quesale);
                
  
}
}
?>