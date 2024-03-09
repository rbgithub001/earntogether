<?php
    ob_start();
    include("../lib/config.php");
    // manage secure login of user account
    if(!isset($_SESSION['token_id'])){
      header("Location:login.php");
    }
    else if(isset($_SESSION['token_id'])){
      if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
        header("Location:login.php");
      }
      
      else{
      
        $condition = " where user_id ='".$_SESSION['user_id']."'";
        $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
      }
    }
    // store random no for security
    $_SESSION['rand'] = mt_rand(1111111,9999999); 
    $rand=rand(0,1000000);
    $User=$_GET['id'];
    $status=$_GET['status'];
    $issue_date=date("Y-m-d");
    $amount_usered=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from due_clear_request where id='$User'"));
    $amount = $amount_usered['amount'];
    $paymode = $amount_usered['payment_mode'];
    $user_id = $amount_usered['user_id'];
    //$tranno = $amount_usered['tranno'];
    
    if($status=='1'){
        $selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select due_amount from poc_registration where user_id='".$amount_usered['user']."'"));
        $request_amount1=$selecting['due_amount']; 
    	$request_amounts1=$request_amount1+$amount;
	
        //mysqli_query($GLOBALS["___mysqli_ston"], "update admin_e_wallet set amount=(amount+$amount) where user_id='123456'");
    
        mysqli_query($GLOBALS["___mysqli_ston"], "update poc_registration set due_amount=(due_amount-$amount) where user_id='$user_id'");
        
        $transaction_no = '123456'.rand(0000001,9999999);
        
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `puc_credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`ts`,`current_url`) 
    VALUES ('$transaction_no','Admin','$amount','0','0', 'Admin', '$user_id','".date('Y-m-d')."', 'Clear Due', '$user_id has cleared his due', '$amount', 'Clear Due', '$transaction_no', '0', '0','Admin Wallet', '".date('Y-m-d h:i:s')."','0')");
    
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`,`invoice_no`, `product_name`, `status`, `ewallet_used_by`) VALUES (NULL, '$tranno', '".$amount_usered['user']."', '$amount', '0', '0', '123456', '".$amount_usered['user']."', '".date("Y-m-d")."', 'Payment Approved', 'Payment Approved From Admin', '0', 'Payment Approved', '$tranno', 'Payment Approved', '0', 'Activation Wallet')");
        
        mysqli_query($GLOBALS["___mysqli_ston"], "update due_clear_request set status='$status' where id='$User'");
    }

    header("location:dues-request-report.php?msg= Due cleared Successfully!");
?>