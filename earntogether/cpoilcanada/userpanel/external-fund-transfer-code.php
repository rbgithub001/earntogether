<?php
ob_start();
include("header.php");
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$min_amount=5;
if(isset($_POST['update'])){
    if( !empty($_POST['amounts']) && !empty($_POST['user']) && !empty($_POST['password'])){
        if( $_POST['amounts'] >= $min_amount ){

            $newcode=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select password from user_registration where user_id='".$f['user_id']."'"));

            if($newcode['password']==''){
                $_SESSION['err']="Please enter correct login password!";
                header("location:external-fund-tranfer.php");
                exit;
            }
            $pwd= $newcode['password'];
	        //$pwd= hash('sha256',$pwd); 
   
            if($_POST['password']==$pwd){
                // transfer request
                $wallet=$_POST['wallet']; 
                $sid=$_POST['user'];
                $c=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id from user_registration where (user_id='$sid' or username='$sid')"));
                $rec=$c['user_id'];
                // $walletfrom=$_POST['walletfrom']; 
                $walletfrom=$wallet; 
                if ($walletfrom=='final_e_wallet') {
                    $wallets='final_e_wallet';
                    $msg='E Wallet';  
             
                }elseif($walletfrom=='roi_e_wallet') {
                    $wallets='roi_e_wallet';
                    $msg='ROI Wallet';
             
                }elseif ($walletfrom=='level_e_wallet') {
                    $wallets='level_e_wallet';
                    $msg='Income Wallet';
                }else{
                    $_SESSION['err']="Please choose from given wallet options!";
                    header("location:external-fund-tranfer.php");
                    exit();
                }
                $rwallet="rmb_wallet";
                $checkdown=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$userid' and down_id='".$rec."'"));
                if ($checkdown >0) {
                    $admin_amount=0;
                    $admin_charge=0.00;
                }else{
                    $admin_amount=0;
                    $admin_charge=0;
                }
    
                $total_charge=0;
                // echo "select amount from $wallets where user_id ='".$userid."'";die();
                $sql = "select amount from $wallets where user_id ='".$userid."'";
                $rsts = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                $args_wallet = mysqli_fetch_assoc($rsts);
                $total_charge = $_POST['amounts'];
                if( $args_wallet['amount'] >= $total_charge){
                    $pr=$total_charge*$admin_amount/100;
                    $finamt=$total_charge-$pr;
        
                    $rands=rand(0000000001,9999999999);
                    $ttype="External Fund Transfer";
                    $walleting=$msg;
                    $sql_receiver = "select user_id,username, first_name, last_name from user_registration where (user_id = '$rec' or username = '$rec')";
                    
                    $rst_receiver = mysqli_query($GLOBALS["___mysqli_ston"], $sql_receiver);
                    //$rst_receivers = mysql_fetch_array($rst_receiver);
                    if(mysqli_num_rows($rst_receiver) > 0 ){
                    
                        $args_receiver = mysqli_fetch_assoc($rst_receiver);
                        
                        
                        // get final E-wallet amount
                        $sql="select amount from $rwallet where user_id='".$args_receiver['user_id']."'";
                        $args_wallet_receiver = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $sql));
                        
                        $final_amount = $args_wallet_receiver['amount']+$finamt;
            
                        // $wall='Income Wallet';
                        $wall=$msg;
                        
                        //transfer fund to receiver
                        $sql_cr_Dr = "insert into credit_debit set user_id='".$args_receiver['user_id']."',"; 
                        $sql_cr_Dr .= "credit_amt='".$finamt."', admin_charge='".$admin_amount."', ";
                        $sql_cr_Dr .= "receiver_id='".$args_receiver['user_id']."', sender_id='".$userid."', ";
                        $sql_cr_Dr .= "receive_date='".date("Y-m-d")."', ";
                        $sql_cr_Dr .= "TranDescription='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
                        $sql_cr_Dr .= "Remark='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
                        $sql_cr_Dr .= "Cause='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
                        $sql_cr_Dr .= "transaction_no='".$rands."',";
                        $sql_cr_Dr .= "invoice_no='".$rands."',";
                        $sql_cr_Dr .= "ttype='".$ttype."',";
                        $sql_cr_Dr .= "product_name='".$ttype."',";
                        $sql_cr_Dr .= "ewallet_used_by = 'E Wallet',";
                        $sql_cr_Dr .= "current_url='".$urls."',";
                        $sql_cr_Dr .= "debit_amt=0,";
                        $sql_cr_Dr .= "status=0";
                    
                        mysqli_query($GLOBALS["___mysqli_ston"], $sql_cr_Dr) or die($sql_cr_Dr.mysqli_error($GLOBALS["___mysqli_ston"]));
                        //echo "<br>";
                        //update wallet amount
                        //echo "update $rwallet set amount='".$final_amount."' where user_id='".$args_receiver['user_id']."'"; die;
                        $update_wallet = "update $rwallet set amount='".$final_amount."' where user_id='".$args_receiver['user_id']."'";
                        mysqli_query($GLOBALS["___mysqli_ston"], $update_wallet)or die(mysqli_error($GLOBALS["___mysqli_ston"]));
                        
                        //echo "<br>";
                        
                        //deduct amount from sender e-wallet
                        $sql_transfer = "insert into credit_debit set user_id='".$userid."',";
                        $sql_transfer .= "debit_amt='".($finamt+$admin_amount)."', admin_charge='".$admin_amount."', ";
                        $sql_transfer .= "receiver_id='".$args_receiver['user_id']."', sender_id='".$userid."', ";
                        $sql_transfer .= "receive_date='".date("Y-m-d")."', ";
                        $sql_transfer .= "TranDescription='Transfer fund $".$finamt." to ".$args_receiver['first_name']." ".$args_receiver['last_name']." with ".$admin_charge."% admin charge',";
                        $sql_transfer .= "Remark='Transfer fund ".$finamt." SGD to ".$args_receiver['first_name']." ".$args_receiver['last_name']." with ".$admin_charge."% admin charge',";
                        $sql_transfer .= "Cause='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
                        $sql_transfer .= "transaction_no='".$rands."',";
                        $sql_transfer .= "invoice_no='".$rands."',";
                        $sql_transfer .= "ttype='".$ttype."',";
                        $sql_transfer .= "product_name='".$ttype."',";
                        $sql_transfer .= "ewallet_used_by='".$msg."',";
                        $sql_transfer .= "current_url='".$urls."',";
                        $sql_transfer .= "credit_amt=0,";
                        $sql_transfer .= "status=0";
                    
                        mysqli_query($GLOBALS["___mysqli_ston"], $sql_transfer)or die($sql_transfer.mysqli_error($GLOBALS["___mysqli_ston"]));
                        
                        //echo "<br>";
                        //update wallet amount
                        $update_wallet = "update $wallets set amount='".($args_wallet['amount']-$total_charge)."' where user_id='".$userid."'";
                        mysqli_query($GLOBALS["___mysqli_ston"], $update_wallet)or die(mysqli_error($GLOBALS["___mysqli_ston"]));
                    
         
        
                        $_SESSION['err']="Fund transferred successfully..!";
                        header("location:external-fund-tranfer.php");
                        exit();
                    }
                    else{
        			    $_SESSION['err']="Please enter correct User ID or user_name!!";
                        header("location:external-fund-tranfer.php");
                        exit();
                    }
                }else{
        		    $_SESSION['err']="Insufficient fund in your Wallet..!";
                    header("location:external-fund-tranfer.php");
                    exit();
                }
            
            }
            else{
                $_SESSION['err']="Please enter correct login password..!";
                header("location:external-fund-tranfer.php");
                      exit();
            }
        }
        else{
		    $_SESSION['err']="Please enter min ".$min_amount." BTC transfer to user wallet";
            header("location:external-fund-tranfer.php");
            exit();
        }
    
    }else{
        $_SESSION['err']="Please fill fields";
		header("location:external-fund-tranfer.php");
        exit();
    }
  
}
header("location:external-fund-tranfer.php");
?>