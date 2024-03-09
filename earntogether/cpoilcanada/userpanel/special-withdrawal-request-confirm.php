<?php 
ob_start();
include("header.php");
if(isset($_POST['submit'])){
    //  print_r($_POST);die;
    $rand=rand(0,1000000);
    $amount = $_POST['amount'];
    $wallet_from=$_POST['wallet']; 
    $invid=$_POST['invid'];
    $user_ids=$_POST['userid'];
    //$description = $_POST['description'];
    $password=$_POST['password'];
    $checkInvestment = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from  lifejacket_subscription where user_id = '$user_ids' and id='$invid'"));
    $date = date('Y-m-d');
    //echo '<pre>'; print_r($checkInvestment); die;
    if($checkInvestment['expire_date'] > $date){
        //echo 'here'; die;
        $msg="Sorry ! You can not withdraw now!";
        header("location:withdraw-investment-special.php?msg=$msg"); exit();
    }
    //echo 'hr'; die;
    $userdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from  user_registration where user_id = '$user_ids'"));

    //echo '<pre>'; print_r($checkInvestment); die;
    if(!empty($checkInvestment) || $checkInvestment!=''){
        $requestAmount = $checkInvestment['amount'];
        $lifejacket_id = $checkInvestment['lifejacket_id'];
        $package = $checkInvestment['package'];
        $payment_mode = 'Bank Transfer';
        $walletdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select amount from  t_wallet where user_id = '$user_ids'"));
        $currentwallet = $walletdata['amount'];
        if($requestAmount<=$currentwallet){
    
            if($wallet_from!=''){
                $date=date("Y-m-d");
                mysqli_real_escape_string($GLOBALS['___mysqli_ston'],$requestAmount);
                
                mysqli_query($GLOBALS["___mysqli_ston"], "update lifejacket_subscription set status='Inactive' , payout_status='1', next_pay='' where user_id='$user_ids' and lifejacket_id='$lifejacket_id'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "update t_wallet set amount=(amount-$requestAmount) where user_id='$user_ids'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$requestAmount) where user_id='$user_ids'");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) 
                VALUES (NULL, '$rand', '$user_ids', '0', '$requestAmount', '0', '$user_ids', '$user_ids', '$date', 'Capital Withdraw', 'Capital Withdrawal for Special Package $package', '$lifejacket_id', 'Capital Withdrawal', '$rand', 'Capital withdraw', '0', 't_wallet','$urls')");
                
                mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) 
                VALUES (NULL, '$rand', '$user_ids', '$requestAmount', '0', '0', '$user_ids', '$user_ids', '$date', 'Capital Credit', 'Capital Credit for Special Package $package', '$lifejacket_id', 'Capital Credit', '$rand', 'Capital Credit', '0', 'E Wallet','$urls')");
    
                
                /*mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO withdraw_request (id,transaction_number,user_id,acc_name,bank_nm,branch_nm,swift_code,request_amount,acc_number,status,posted_date,withdraw_wallet,total_paid_amount,transaction_charge,ts,payment_mode) 
                VALUES (NULL,'$rand','$user_ids','".$userdata['acc_name']."','".$userdata['bank_nm']."','".$userdata['branch_nm']."','".$userdata['swift_code']."','$requestAmount','".$userdata['ac_no']."','0','$date','t_wallet','$requestAmount','0',CURRENT_TIMESTAMP,'$payment_mode')");
            */
              
            
                $msg="Your withdraw for $lifejacket_id is done successfully! Please check your Cantho Wallet.";
            
                $fetchid=((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
            
            
                /*mail */
    			/*$useremail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$user_ids'")); 
    			$email=$useremail['email'];
    			date_default_timezone_set('Asia/Kolkata');
    
                require '../mailer/PHPMailerAutoload.php';
            
                //Create a new PHPMailer instance
                $mail = new PHPMailer;
                //Tell PHPMailer to use SMTP
                $mail->isSMTP();
                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = 0;
            
                //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';
    
                //Set the hostname of the mail server
                $mail->Host = "mail.smtp2go.com";
            
                //Set the SMTP port number - likely to be 25, 465 or 587
                $mail->Port = 587;
            
            
                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
            
                //Username to use for SMTP authentication
                $mail->Username = "srdev@maxtratechnologies.net";
                //jeera.update1@maxtratechnologies.in
                $mail->Password = "Maxtra@2020";
                
                $mail->SMTPSecure = 'tls';
            
                //Set who the message is to be sent from
                $mail->setFrom('srdev@maxtratechnologies.net', 'CANTHO');
                //Set an alternative reply-to address
                $mail->addReplyTo('srdev@maxtratechnologies.net', 'CANTHO');
                //Set who the message is to be sent to
                $mail->addAddress($email, 'CANTHO');
                //Set the subject line
                $mail->Subject = 'Withdrawal Request';
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                //Replace the plain text body with one created manually
                $mail->Body = '<!doctype html>
                <html>
                <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <title>Profile Update</title>
                    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
                    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
                </head>
                <body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
                    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
                        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
                            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                                <img src="http://182.76.237.227/~syscheck/cifuae/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
                line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                                    Withdrawal Request
                                </div>
                                
                                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                                </div>
                                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
                color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                                  
                                </div>
                                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                                 <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Withdrawal Amount  : '.$sub8.'</h3>
                                  </div>
                                
                                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                                </div>
                                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                                  Copyrights 2021 CANTHO. All Rights Reserved. </p>
                                
                            </div>
                        </div>
                    </div>
                    </div><br/><br/>
                </body>
                
                </html>';
    
            	$mail->send();*/
                /* mail */
                
                header("location:withdraw-investment-special.php?msg=$msg");
                }
            else{
              $msg="Sorry ! Insufficient Balance In Your wallet ! or Today your limit is over!";
              header("location:withdraw-investment-special.php?msg=$msg");
            }
        }else{
            $msg="Sorry ! You do not have sufficient balance in investment wallet!";
            header("location:withdraw-investment-special.php?msg=$msg");
        }
    
    }
    else{
        $msg="Sorry ! You are doing something wrong!";
        header("location:withdraw-investment-special.php?msg=$msg");
    }
}
?>