<?php
	
	//include '../lib/config.php';

	ini_set('always_populate_raw_post_data', -1);

  /* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages,$con)
{
  $date=date('Y-m-d');

  $comming=mysqli_fetch_array(mysqli_query($con, "select * from lifejacket_subscription where user_id='".$ref."' and status='Active' order by id desc limit 0,1"));

  if($comming['package']!='')
  {

  $comm=mysqli_fetch_array(mysqli_query($con, "select * from status_maintenance where id='".$comming['package']."'"));
  $spc=$comm['sponsor_commission'];
  $pb=$amount;
  $withdrawal_commission=$spc*$pb/100;
  $rwallet=$withdrawal_commission;
  if($withdrawal_commission!='' && $withdrawal_commission!=0)
  {
    $vcount=mysqli_num_rows(mysqli_query($con, "select id from user_registration where user_id='$ref' and user_rank_name='Paid Member'"));
    if($vcount>0)
    {

  mysqli_query($con, "update working_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($con, "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package $packages','Referral Bonus','$invoice_no','Referral Bonus','0','Working Wallet',CURRENT_TIMESTAMP,'$urls')"); 
    }
    else
    {
    //mysql_query("insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','2','Working Wallet',CURRENT_TIMESTAMP,'$urls')"); 
    }
  }
    }
}

/* Sponsor Commission Code Ends Here*/

	/* Sponsor Commission Code Starts Here*/
    // function commission_of_referal($useridss,$amount,$invoice_no,$pb, $con)
    // {
      

    //   $date=date('Y-m-d');

    //   $matrx=mysqli_query($con, "select * from matrix_downline where down_id='$useridss' and level<4");
    //   while($matrx1=mysqli_fetch_array($matrx))
    //   {
    //           $ref=$matrx1['income_id'];  
    //           $level=$matrx1['level'];
    //           if($level==1)
    //           {
    //             $spc=5;
    //           }
    //           else if($level==2)
    //           {
    //             $spc=3;
    //           }
    //            else if($level==3)
    //           {
    //             $spc=2;
    //           }
               
    //           else 
    //           {
    //             $spc=0;
    //           }


    //       $withdrawal_commission=$spc*$amount/100;
    //       $rwallet=$withdrawal_commission;
    //       if($withdrawal_commission!='' && $withdrawal_commission!=0)
    //       {
    //       mysqli_query($con, "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
    //       $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    //       mysqli_query($con, "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Level Income','Earn Level Income from $useridss for $amount Amount','Commission of UGD $rwallet For Token Purchase ','Level Income','$invoice_no','Level Income','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");  
    //       }
    //     }


    // }
    /* Sponsor Commission Code Ends Here*/

	if(file_exists('./block_io/block_io.php')){
      require ('./block_io/block_io.php');
      $apiKey = '7166-9068-03fe-5e6c';
      $pin = trim('Bholenath');
      $version = 2; // the API version
      $block_io = new BlockIo($apiKey, $pin, $version);
    }else{
      die('Unable to load block_io.php file');
    }

    if(isset($callbackRequest['type']) && ($callbackRequest['type'] == "ping") ){
		header("HTTP/1.1 200 OK");
		die;
	}

	if(isset($_REQUEST['key']) && ($_REQUEST['key'] == 'biutmyat_bitbux')){
		
		date_default_timezone_set('Asia/Kolkata');

		define('HOSTNAME','localhost');
		define('DB_USERNAME','biutmyat_bitbux');
		define('DB_PASSWORD','Password@!@#$%');
		define('DB_DATABASE','biutmyat_bitbux');

		

		$con = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Unable to connect to mysql");

		
		$callbackRequest = json_decode(@file_get_contents('php://input'), true);

		$notification 	= $callbackRequest['notification_id'];
		$confirmations 	= $callbackRequest['data']['confirmations'];
		
		$balance_change 	= $callbackRequest['data']['amount_received'];

		mysqli_query($con, "update block_io set status_response = '".json_encode($callbackRequest)."', confirmations = '$confirmations' where notification = '$notification' ");

		if($confirmations == 3){
			$query = mysqli_query($con, "select * from block_io where notification = '$notification' and status = '0'");			
			$data = mysqli_fetch_assoc($query);

			if(($data['type'] == 'fund') && ($balance_change >= $data['btc_amount'])){

				$userid = $data['user_id'];

				$amount = $data['amount'];
				
				$date=date('Y-m-d');

				mysqli_query($con, "update block_io set status_response = '".json_encode($callbackRequest)."', status = '1' where notification = '$notification' ");

				mysqli_query($con, "update final_e_wallet set amount=(amount+$amount) where user_id='".$userid."'");

				$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

				$invoice_no=rand(1111111111, 9999999999);

				mysqli_query($con, "insert into credit_debit values(NULL,'$invoice_no','$userid','$amount','0','0','$userid','123456','$date','Fund Added','Fund Added to wallet','Fund Added to wallet through Bitcoin','Fund Added','$invoice_no','Fund Added','0','Main Wallet',CURRENT_TIMESTAMP,'$urls')");

				$block_io->delete_notification(array('notification_id' => $notification));


			}elseif (($data['type'] == 'package')  && ($balance_change >= $data['btc_amount'])) {


				$userid = $data['user_id'];

				$amount = $data['amount'];

        $package_id = $data['package_id'];
				
				$date = date('Y-m-d');

				mysqli_query($con, "update block_io set status_response = '".json_encode($callbackRequest)."', status = '1' where notification = '$notification' ");

				$f = mysqli_fetch_assoc(mysqli_query($con, "select * from user_registration where user_id = '$userid'"));

				$amount = $data['amount'];
				$pv = $amount;
				$pbs1 = $amount;
				$walls="Bitcoin Payment";
				$password = $f['t_code'];
				$rand = rand(0000000001,9000000000);
				$lfid="LJ".$userid.$rand;
				$start=date('Y-m-d');
				$end = date('Y-m-d', strtotime('+2 months'));

				$ref=mysqli_fetch_array(mysqli_query($con, "select * from user_registration where user_id='$userid'"));

				mysqli_query($con, "update user_registration set designation='Paid Member', user_rank_name='Paid Member' where user_id='$userid'");

        date_default_timezone_set('Asia/Kolkata');
        $current_time= date("Y-m-d H:i:s");

				mysqli_query($con, "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$userid', '$package_id', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$userid."','".$ref['ref_id']."','$pv')");

				  $invoice_no=rand(1111111111, 9999999999);

				  commission_of_referal($ref['ref_id'],$userid,$amount,$invoice_no,$package_id, $con);


				   /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				  $upliners=mysqli_query($con, "select * from level_income_binary where down_id='$userid'");
				  while($upline=mysqli_fetch_array($upliners))
				  {
				    $income_id=$upline['income_id'];
				    $position=$upline['leg'];
				    $user_level=$upline['level']; 
				    mysqli_query($con, "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
				  }
				   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

				 
                      $email=$f['email'];
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
                      $mail->Username = "jeera.update1@maxtratechnologies.in";

                      //Password to use for SMTP authentication
                      $mail->Password = "b2E3NWZvdTFqZmcw";

                      $mail->SMTPSecure = 'tls';

                      //Set who the message is to be sent from
                      $mail->setFrom('info@bitbuxatm.com', 'BitBuxATM');
                      //Set an alternative reply-to address
                      $mail->addReplyTo('info@bitbuxatm.com', 'BitBuxATM');
                      //Set who the message is to be sent to
                      $mail->addAddress($email, 'BitBuxATM');
                      //Set the subject line
                      $mail->Subject = 'You have successfully purchased the package';
                      //Read an HTML message body from an external file, convert referenced images to embedded,
                      //convert HTML into a basic plain-text alternative body
                       $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                      //Replace the plain text body with one created manually
                      $mail->Body = '<!doctype html>
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
                                      <img src="https://bitbuxatm.com/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                                      <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
                      line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                                       purchased  successfully   
                                      </div>
                                      <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                                          Hello '.$f["username"].' Thank you! you have successfully purchased the package.
                                      </div>
                                      <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                                      </div>
                                      <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
                      color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                                         
                                      </div>
                                      <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                                       
                                         
                                        
                                          <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Package Name : Package '.$data["package_name"].'</h3>
                                         
                                          <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Amount  : '.number_format($amount, 2).' USD</h3>
                                        </div>
                                      
                                      <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                                      </div>
                                      <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                                        Copyrights 2018 BitBuxATM. All Rights Reserved. </p>
                                      
                                  </div>
                              </div>
                          </div>
                          </div><br/><br/>
                      </body>

                      </html>';



                    $mail->send();

                    $block_io->delete_notification(array('notification_id' => $notification));
			}

		}

		
		

		$fp = fopen('webhook.txt', 'a');
		fwrite($fp, '['.date('Y-m-d h:i:s').'] '.json_encode($callbackRequest)."\n");
		fclose($fp);

		header("HTTP/1.1 200 OK");
		die;

		
	}

?>