<?php
 include("../lib/config.php");
include 'bitcoin-include.php';
//include '../mailer/PHPMailerAutoload.php';


$fp = fopen('response.txt', 'a');
fwrite($fp, json_encode($_GET));
fclose($fp);


//$db = new mysqli($mysql_host, $mysql_username, $mysql_password) or die(__LINE__ . ' Invalid connect: ' . mysqli_error());
//$db->select_db($mysql_database) or die( "Unable to select database. Run setup first.");

$invoice_id = $_GET['invoice_id'];



$transaction_hash = $_GET['transaction_hash'];
$value_in_btc = $_GET['value'] / 100000000;
$amount_value=$_GET['value'];
$query6=mysqli_query($GLOBALS["___mysqli_ston"], "select address,user_id
 from invoices where invoice_id = '".$invoice_id."'");

//echo "select address from invoices where invoice_id = '".$invoice_id."'";
//$stmt = $db->prepare("select address from invoices where invoice_id = ?");
//$stmt->bind_param("i",$invoice_id);
//$success = $stmt->execute();

//if (!$success) {
  //  die(__LINE__ . ' Invalid query: ' . mysql_error());
//}

//$result = $stmt->get_result();
while($row = mysqli_fetch_array($query6)) {
  $my_address = $row['address'];
  $getuserid= $row['user_id'];
}

//$result->close();
//$stmt->close(); 

if ($_GET['address'] != $my_address) {
    echo 'Incorrect Receiving Address';
  return;
}

/*if ($_GET['secret'] != $secret) {
  echo 'Invalid Secret';
  return;
}*/

if ($_GET['confirmations'] >= 4) {
  //Add the invoice to the database
  $insert=mysqli_query($GLOBALS["___mysqli_ston"], "replace INTO invoice_payments (invoice_id, transaction_hash, value,user_id) values('".$invoice_id."', '".$transaction_hash."', '".$value_in_btc."','".$getuserid."')");
  

  $changvalue=$_GET['value'];

 $selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$getuserid."'"));
    $request_amount1=$selecting['amount']; 
    $request_amounts1=$request_amount1+$amount_value; 
  mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount= $request_amounts1 where user_id='".$getuserid."'" );
 
  
  //$stmt = $db->prepare("replace INTO invoice_payments (invoice_id, transaction_hash, value) values(?, ?, ?)");
  //$stmt->bind_param("isd",$invoice_id, $transaction_hash, $value_in_btc);
  //$stmt->execute();

  //Delete from pending
  $result=mysqli_query($GLOBALS["___mysqli_ston"], "delete from pending_invoice_payments where invoice_id='".$invoice_id."' limit 1");
//  $stmt = $db->prepare(" delete from pending_invoice_payments where invoice_id = ? limit 1");
  //$stmt->bind_param("i",$invoice_id);
  //$result = $stmt->execute();

  if($result) {
      
      function smptmail($to,$strSubject,$msg,$strHeader){
    

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
  $mail->Username = "tushar@maxtratechnologies.com";

  //Password to use for SMTP authentication
  $mail->Password = "wNhKJHAuWRke";

  $mail->SMTPSecure = 'tls';

  //Set who the message is to be sent from
  $mail->setFrom('amiymaxtratechnologies@gmail.com', 'bitbuxatm');
  //Set an alternative reply-to address
  $mail->addReplyTo('amiymaxtratechnologies@gmail.com', 'bitbuxatm');
  //Set who the message is to be sent to
  //$to='anupama@maxtratechnologies.com';
  $mail->addAddress($to, 'bitbuxatm');
  //Set the subject line
  $mail->Subject = $strSubject;

  $mail->Body = $msg;

  $mail->IsHTML(true);

  //send the message, check for errors
  if (!$mail->send()) {
      return false;
  } else {
      return true;
  }
}
      
      $query=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "Select * from registration where user_id='".$getuserid."'"));
         $repli=SITE_URL.$query['user_name'];
                       $n_email= $query['email'];
            $n_strSubject = "Payment successfully send using blockchain";
            $n_from = 'amiymaxtratechnologies@gmail.com';
            $headeruser='Mime-Version: 1.0'. "\r\n";
$headeruser.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headeruser1='MIME-Version: 1.0' . "\r\n";
$headeruser1.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headeruser1.= "From:bitbuxatm <$n_from>" . "\r\n";


$n_msg = '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="'.SITE_URL.'images/logo.png" style="margin:0 0 20px 0; width:85px ; "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Your Account Information
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Thank you for bitcoin payment.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">Below are your login and transaction Credentials:</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">  Invoice ID : '.$invoice_id.'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">  Amount : '.$value_in_btc.' USD</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">  Address  : '.$my_address.'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Transaction Hash  : '.$transaction_hash.'</h3>
                


                </div>
              
                      <div class="ttl" style="margin: 14px 0px 0px 69px;width: 357px;font-family: Lato;font-weight: 400;color: rgb(255, 255, 255);font-size: 25px;line-height: 35px;padding: 6px 0px;background-color: rgb(230, 67, 60);">
  
             </div>
              
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
             
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

 $email=  smptmail( $query['email'], $n_strSubject, $n_msg, $headeruser1 ); 
     echo "*ok*";
  }
} else {
  //Waiting for confirmations
  //create a pending payment entry
  $insert2=mysqli_query($GLOBALS["___mysqli_ston"], "replace INTO pending_invoice_payments (invoice_id, transaction_hash, value,user_id) values('".$invoice_id."', '".$transaction_hash."', '".$value_in_btc."','".$getuserid."')");
  //$stmt = $db->prepare("replace INTO pending_invoice_payments (invoice_id, transaction_hash, value) values(?, ?, ?)");
  //$stmt->bind_param("isd",$invoice_id, $transaction_hash, $value_in_btc);
  //$stmt->execute();

   echo "Waiting for confirmations";
}

?>