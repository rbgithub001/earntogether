<?php 
ob_start();
include("../lib/config.php");
/*   CSV Export*/
function escape_csv_value($value) {
    $value = str_replace('"', '""', $value); // First off escape all " and make them ""
    if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
        return '"'.$value.'"'; // If I have new lines or commas escape them
    } else {
        return $value; // If no new lines or commas just return the value
    }
}

function redirectURL($url) {
	    echo '<script> window.location.href="'.$url.'"
		</script>"';

}


        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=open-monthly-excel-reports.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $content = '';
$title = '';
 $ii=1;
        
		if(isset($_POST['Show'])){
		    	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                      
			$from=$_POST['from'];
            $end_date=$_POST['end_date'];
			$id=$_POST['list'];
			$query123=$_POST['qry'];
			$date=date('Y-m-d');
			$description=$_POST['description'];
			$title = '';
			            //$title .= "Userid,Level Income,Total,Beneficiary Name ,Beneficiary Ac No,Bank Name,Branch Name,IFSC,Start Date,End Date"."\n";
			            
            $title .= "Sr.No,Receiver id,Receiver Name,Receiver Rank,Userid,KYC Status,Full Name,Rank Name,Account No,Bank Name,Branch Name,IFSC,Total Income,Paid Status,Date"."\n";
            echo $title;
            $p=1;
             $total_sum=0;
            if(!empty($id)){
                
                foreach($id as $check) 
                {
          			$totc_unpaid = 0;
					$total = 0;
					
					$content = '';
					    $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$check' ");
                        $data1=mysqli_fetch_array($data);
                        $uid = $data1['user_id'];
                        
                        
                        $bankdeta=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from bank_statement_proof_list where user_id='".$uid."' "));
                        
                         $acno=$bankdeta['ac_no'];
                         $bankname=$bankdeta['bank_name'];
                         $acc_name= $bankdeta['acc_name'];
                         $branch_nm= $bankdeta['branch_nm'];
                         $swift_code= $bankdeta['swift_code'];
                         
                        $receivdtl = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$uid' and status='1'"));
                        $recvId=    $receivdtl['receiver_id'];
                        
                        $receivdtl1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$recvId' "));
                        
                        
                        $leveltot = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as crdamt from credit_debit where user_id='$uid' and status='1' and ttype='Self Income'"));
                        $selfincome=    $leveltot['crdamt'];
                        if($selfincome==0 || $selfincome==''){
                            $selfincome=0;
                        }
                        
	                    $current_sub=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$data1['rank']."'"));
	                    $rankname = $current_sub['name'];
	                    
	                    $current_sub2=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$receivdtl1['rank']."'"));
	                    $rankname2 = $current_sub2['name'];
	                    
                        $crddbt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as crdamt from credit_debit where user_id='$uid' and status='1' and ttype='Level Income' "));
                        $levelinc = $crddbt['crdamt'];
                        if($levelinc==0 || $levelinc==''){
                            $levelinc=0;
                        }
                        $total=($selfincome+$levelinc);
                        $total_sum+=$total;

                        if($data1['kyc_status']=='0'){
                             $statuskyc='Pending';
                             }else{
                                 $statuskyc='Approved';
                         }
                         if($data1['status']=='0'){
                            $status_d='Paid';
                         }else{
                             $status_d='Pending';
                         }
                        
                        $content .= escape_csv_value($p).",";
                        $content .= escape_csv_value($recvId).",";
                        $content .= escape_csv_value($receivdtl1['first_name']." ".$receivdtl1['last_name']).",";
                        $content .= escape_csv_value($rankname2).",";
                        $content .= escape_csv_value($uid).",";
                        $content .= escape_csv_value($statuskyc).",";
                        $content .= escape_csv_value($data1['first_name']." ".$data1['last_name']).",";
                        $content .= escape_csv_value($rankname).",";
                    	$content .= escape_csv_value($acno).",";
                    	$content .= escape_csv_value($bankname).",";
                    	$content .= escape_csv_value($branch_nm).",";
                    	$content .= escape_csv_value($swift_code).",";
                    	
                    	
                    	$content .= escape_csv_value($total).",";
                    	$content.=escape_csv_value($status_d).","; 
                    	$content .= escape_csv_value($date).",";
                         $content .= "\n";
                         $p++;   
                         echo $content;
                          mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$total) where user_id='$check'");
                        mysqli_query($GLOBALS["___mysqli_ston"], "update credit_debit set status='2' , payout_date='".date('Y-m-d')."' where user_id='$check' and status='1' and (ttype='Level Income' || ttype='Self Income' || ttype='Referral Income')");
                }	
            }	    
	    }  
	    
	//    $title .= "Sr.No ,Userid,Username,Member Name, Commission,Description,Paid Status,Date  "."\n";
//header("location:open-payout.php");
?>