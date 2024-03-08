<?php 
ob_start();
include("header.php");
if(isset($_POST['submit'])){
  //  print_r($_POST);die;
 $user_ids=$_POST['id'];
$rand=$user_ids.rand(0,1000000);
$wallet_from=$_POST['wallet_from']; 
$sub8=$_POST['subject8'];
//$user_ids=$_POST['id'];
//$description = $_POST['description'];
$password=$_POST['password'];
//$new_trans=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select transaction_charge from manage_commision_percentage"));
$newcode=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select password from user_registration where user_id='".$f['user_id']."'"));
$pwd = $newcode['password'];
 
      /*if($newcode['password']==''){
        header("location:withdraw-request.php?msg=Please enter correct transaction password!");
        exit;
      }*/
      
     
     if($pwd!=$password){
        header("location:withdraw-request.php?msg=Please enter correct transaction password!");
        exit;
      }

  if($pwd==$password){
      if($wallet_from!=''){
        
         if($wallet_from=='e_wallet'){
            $payment_mode=$_POST['payment_mode'];
            $wit_table='final_e_wallet';
            $msg1='CANTHO Wallet';
            $transaction_charge=$new_trans['transaction_charge'];
            $working ="ok";

         }
         
         /*if($wallet_from=='b_wallet'){
            $payment_mode=$_POST['payment_mode'];
            $wit_table='b_wallet';
            $msg1='B Wallet';
            $transaction_charge=$new_trans['transaction_charge'];
            $working ="ok";
         }
         if($wallet_from=='t_wallet'){
            $payment_mode=$_POST['payment_mode'];
            $wit_table='t_wallet';
            $msg1='T Wallet';
            $transaction_charge=$new_trans['transaction_charge'];
            $working ="ok";

         }
        
         if($wallet_from=='rmb_wallet'){
            $payment_mode=$_POST['payment_mode'];
            $wit_table='rmb_wallet';
            $msg1='RMB Wallet';
            $transaction_charge=$new_trans['transaction_charge'];
            $working ="ok";

         }*/
$query= "SELECT amount FROM $wit_table WHERE user_id='$user_ids'";
$res_reg1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],$query));
$amount1=$res_reg1['amount'];
$amount=$amount1;
//$transaction_charge1=(8/100)*$sub8;
//$subamounts=$sub8-$transaction_charge1;
//$subamounts=$sub8;
$sub1=$_POST['ben_acc_no'];
$sub2=$_POST['ben_bank'];
$sub3=$_POST['branch_nm'];
$sub4=$_POST['swift_code'];
$sub9=$_POST['subject9'];
$send_id=$_POST['id'];
//$btcamt=$_POST['btcamt'];
echo $payment_mode = $payment_mode; die;
$pay_address = $_POST['pay_address'];
$date=date("Y-m-d");
if($sub8>0  && $amount>=$sub8)
{
//echo "hi"; die();
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $wit_table where user_id='$user_ids'"));
$request_amount1=$selecting['amount']; print_r("<br/>");
$request_amounts1=$request_amount1-$sub8; print_r("<br/>");
mysqli_real_escape_string($GLOBALS['___mysqli_ston'],$sub8);

//echo "INSERT INTO withdraw_request (id,transaction_number,user_id,acc_name,bank_nm,branch_nm,swift_code,request_amount,acc_number,status,posted_date,withdraw_wallet,total_paid_amount,transaction_charge,ts,payment_mode) VALUES (NULL,'$rand','$send_id','$sub1','$sub2','$sub3','$sub4','$sub8','$sub9','0','$date','$wit_table','$subamounts','$transaction_charge1',CURRENT_TIMESTAMP,'$payment_mode')"; die();

mysqli_query($GLOBALS["___mysqli_ston"], "update $wit_table set amount='$request_amounts1' where user_id='$user_ids'");

mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) 
VALUES (NULL, '$rand', '$user_ids', '0', '$sub8', '0', '123456', '$user_ids', '$date', 'Withdrawal Request', 'Withdrawal Request From $user_ids', '0', 'Withdrawal Request', '$rand', '$wallet_from', '0', '$msg1','$urls')");




mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO withdraw_request (id,transaction_number,user_id,acc_name,bank_nm,branch_nm,swift_code,request_amount,acc_number,status,posted_date,withdraw_wallet,total_paid_amount,transaction_charge,ts,payment_mode,pay_address) 
VALUES (NULL,'$rand','$send_id','$sub1','$sub2','$sub3','$sub4','$sub8','$sub9','0','$date','$msg1','$sub8','0',CURRENT_TIMESTAMP,'$payment_mode','$pay_address')");

  

$msg="Request Sent Successfully!";

$fetchid=((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);


/*mail */
			  $useremail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$user_ids'")); 
			  $email=$useremail['email'];
			  date_default_timezone_set('Asia/Kolkata');
/*
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

	$mail->send();
	*/
/* mail */

header("location:withdraw-request.php?msg=$msg");
}
else{
  $msg="Sorry ! Insufficient Balance In Your wallet ! or Today your limit is over!";
  header("location:withdraw-request.php?msg=$msg");
}

}
else{
 $msg="Working wallet withdraw only for wednesday and saturday  !";
  header("location:withdraw-request.php?msg=$msg");

}
}
else
{
   $msg="Sorry ! Wrong Transaction Password!";
  header("location:withdraw-request.php?msg=$msg");
}

}
?>