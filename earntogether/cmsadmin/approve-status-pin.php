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

  $amount_usered=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pin_paymentproof where id='$User'"));
  $amount = $amount_usered['usd'];

  $paymode = $amount_usered['payment_mode'];
  $tranno = $amount_usered['tranno'];

  
if($status=='1'){
   
    $selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$amount_usered['user']."'"));
    $request_amount1=$selecting['amount']; 
 	  $request_amounts1=$request_amount1+$amount;
	
  global $mxDb;

                $new_pin = new Pins();
                
                $pin_no = $new_pin->get_new_pin('pins');
                    
                    $insert_pin = array(
                    
                            'pin_no' => $pin_no,
                            'amount' => $amount,
                            'status' => 0,
                            'crt_date' => date('Y-m-d'),
                            'created_by_user' => 'Admin',
                            'receiver_id' => $amount_usered['user'],
                            'sender_id' => 'Admin',
                            'used_by'=>''
                    );
                    
                    // insert record into pins
                    $mxDb->insert_record('pins', $insert_pin);
                    
             
mysqli_query($GLOBALS["___mysqli_ston"], "update pin_paymentproof set status='$status',pin_no='".$pin_no."' where id='$User'");

header("location:pin-pending-payment.php?msg= Algorithmic Created Successfully Please check on Fresh Algorithmic History !");
exit;
}

if($status=='2'){
mysqli_query($GLOBALS["___mysqli_ston"], "update pin_paymentproof set status='$status' where id='$User'");
header("location:pin-pending-payment.php?msg= Updated Successfully!");
exit;
}

?>