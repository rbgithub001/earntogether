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
	    echo '<script> window.location.href="'.$url.'"		</script>"';

}

        // header("Content-type: text/csv");
        // header("Content-Disposition: attachment; filename=approve-release-usercom.csv");
        // header("Pragma: no-cache");
        // header("Expires: 0");
        
		if(isset($_POST['Show'])){
			$from=$_POST['from'];
            $end_date=$_POST['end_date'];
			$id=$_POST['list'];
			$query123=$_POST['qry'];
			$date=date('Y-m-d');
		

            if(!empty($id)){
                foreach($id as $check) 
                {
    //       		$request_amount=$amount['amt'];
    //                 $request_amount=$request_amount;
                    $sql = "select * from credit_debit_hold where id='$check'";
                    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    //               	$totc_unpaid = 0;
				// 	$total = 0;
				// 	$content = '';
				while($data1=mysqli_fetch_assoc($res)){
				    $transaction_no= $data1['transaction_no'];
				    $user_id= $data1['user_id'];
				    $credit_amt= $data1['credit_amt'];
				    $admin_charge= $data1['admin_charge'];
				   
				    $receiver_id= $data1['receiver_id'];
				    $sender_id= $data1['sender_id'];
				    $receive_date= $data1['receive_date'];
				    $ttype= $data1['ttype'];
				    $TranDescription= $data1['TranDescription'];
				    $Cause= $data1['Cause'];
				    $Remark= $data1['Remark'];
				    $invoice_no= $data1['invoice_no'];
				    $product_name= $data1['product_name'];
				    $status= $data1['status'];
				    $ewallet_used_by= $data1['ewallet_used_by'];
				    $current_url= $data1['current_url'];
				    $package_id= $data1['package_id'];
				    $percent= $data1['percent'];
				    $total_invesment_amount= $data1['total_invesment_amount'];

				    
                 $sqlins="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                VALUES ('$transaction_no','$user_id','$credit_amt','0','$admin_charge','$receiver_id','$sender_id','$receive_date','$ttype','$TranDescription','$Cause','$Remark','$invoice_no','$product_name','$status','$ewallet_used_by','$current_url','$package_id','$percent','$total_invesment_amount')";

                $resins = mysqli_query($GLOBALS["___mysqli_ston"], $sqlins);
                
              //  echo "DELETE FROM credit_debit_hold  where id='$check' ";
			   $sqldel=   mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM credit_debit_hold  where id='$check' ");
                  
                   }
                }	
            }	    
	    }   
		 
header("location:billing-pending-commission.php");
?>