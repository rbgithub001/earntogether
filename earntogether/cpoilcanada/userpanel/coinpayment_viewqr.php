<?php include("header.php");

  if(isset($_SESSION['bpidp']) && !empty($_SESSION['bpidp'])){
    $bpid = $_SESSION['bpidp'];
    $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from block_io where id = '$bpid' and user_id = '$userid'");
    $count = mysqli_num_rows($query);
    $data = mysqli_fetch_assoc($query);

      if($count == 0){
          ?>
            <script type="text/javascript">
            window.location.href='fund-ewallet.php?msg=Invalid payment id!';
            </script>
            <?php
            exit;
      }
  }else{
      ?>
    <script type="text/javascript">
      window.location.href='package-upgrade.php?msg=Validation Error Occurs';
    </script>
    <?php
    exit();
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">
    <div class="animsition">  
    
      <!-- start of LOGO CONTAINER -->
     
      <!-- end of LOGO CONTAINER -->

      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
     <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

            
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
          <?php include("top.php");?>

        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-12">
            <br/><br/>
            <h1>Bitcoin Payment Response</h1>
          </div>

          
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">


        <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;"><?php echo $_GET['msg'];?><br/><br/></div> <?php } ?>
          <div class="row">
            


            <?php

              /* Sponsor Commission Code Starts Here*/
            function commission_of_referal($useridss,$amount,$invoice_no,$pb)
            {
              

              $date=date('Y-m-d');

              $matrx=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$useridss' and level<4");
              while($matrx1=mysqli_fetch_array($matrx))
              {
                      $ref=$matrx1['income_id'];  
                      $level=$matrx1['level'];
                      if($level==1)
                      {
                        $spc=5;
                      }
                      else if($level==2)
                      {
                        $spc=3;
                      }
                       else if($level==3)
                      {
                        $spc=2;
                      }
                       
                      else 
                      {
                        $spc=0;
                      }


                  $withdrawal_commission=$spc*$amount/100;
                  $rwallet=$withdrawal_commission;
                  if($withdrawal_commission!='' && $withdrawal_commission!=0)
                  {
                  mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
                  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                  mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Level Income','Earn Level Income from $useridss for $amount Amount','Commission of UGD $rwallet For Token Purchase ','Level Income','$invoice_no','Level Income','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");  
                  }
                }


            }
            /* Sponsor Commission Code Ends Here*/


              if(count($data)){ 

                $address = $data['address'];

                if(file_exists('./block_io/block_io.php')){
                  require ('./block_io/block_io.php');
                }else{
                  die('Unable to load block_io.php file');
                }

                    // require('./coinpayment/coinpayments.inc.php');
                    
                  $apiKey = '7166-9068-03fe-5e6c';
                  $pin = 'bitbuxatm';
                  $version = 2; // the API version
                  $block_io = new BlockIo($apiKey, $pin, $version);


                  $payment_data = $block_io->get_address_balance(array('addresses' => $address));

                  //mysql_query("update block_io set status_response = '".json_encode($payment_data)."' where id = '$bpid' and user_id = '$userid' ");

                ?>

                <h3>Please scan & pay and wait for few minutes...</h3><br/>
                <table class="table table-bordered">
                  <tr>
                    <th>Amount ($)</th>
                    <td><?php echo $data['amount']; ?></td>
                  </tr>
                  <tr>
                    <th>Amount (BTC)</th>
                    <td><?php echo $data['btc_amount']; ?></td>
                  </tr>                  
                  <tr>
                    <th>Address</th>
                    <td><?php echo $address; ?></td>
                  </tr>
                  <tr>
                    <th>QR Code</th>
                    <td>
                      <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin:<?php echo $address; ?>?amount=<?php echo $data['btc_amount']; ?>'>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Response</strong></td>                    
                  </tr>
                  <tr>
                    <td><strong>Confirmations:</strong></td>
                    <td>
                      <?php echo $data['confirmations']; ?> (3 Confirmations)
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Available Balance</strong></td>
                    <td>
                      <?php echo $payment_data->data->available_balance." ".$payment_data->data->network; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Pending Received Balance</strong></td>
                    <td>
                      <?php echo $payment_data->data->pending_received_balance." ".$payment_data->data->network; ?>
                    </td>
                  </tr>

                </table>

                <?php

                if($data['confirmations'] == 3){

                    mysqli_query($GLOBALS["___mysqli_ston"], "update block_io set status = '1' where id = '$bpid' and user_id = '$userid' ");

                    unset($_SESSION['bpidp']);

                    // $amount = $data['amount'];
                    // $pv = $amount;
                    // $pbs1 = $amount;
                    // $walls="Bitcoin Payment";
                    // $password=$f['t_code'];
                    // $rand = rand(0000000001,9000000000);
                    // $lfid="LJ".$userid.$rand;
                    // $start=date('Y-m-d');
                    // $end = date('Y-m-d', strtotime('+2 months'));

                    // $ref=mysql_fetch_array(mysql_query("select * from user_registration where user_id='$userid'"));

                    // mysql_query("update user_registration set designation='Paid Member', user_rank_name='Paid Member' where user_id='$userid'");

                    // mysql_query("INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$userid', '$amount', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$userid."','".$ref['ref_id']."','$pv')");

                    //   $invoice_no=rand(1111111111, 9999999999);
                    //   commission_of_referal($userid,$amount,$invoice_no,$pbs1);


                    //    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
                    //   $upliners=mysql_query("select * from level_income_binary where down_id='$userid'");
                    //   while($upline=mysql_fetch_array($upliners))
                    //   {
                    //     $income_id=$upline['income_id'];
                    //     $position=$upline['leg'];
                    //     $user_level=$upline['level']; 
                    //     mysql_query("insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
                    //   }
                    //    /*Inserting Record of BV in manage bv table for all upliners code ends here*/


                    //   date_default_timezone_set('Asia/Kolkata');
                    //   $email=$f['email'];
                    //   require '../mailer/PHPMailerAutoload.php';

                    //   //Create a new PHPMailer instance
                    //   $mail = new PHPMailer;
                    //   //Tell PHPMailer to use SMTP
                    //   $mail->isSMTP();
                    //   //Enable SMTP debugging
                    //   // 0 = off (for production use)
                    //   // 1 = client messages
                    //   // 2 = client and server messages
                    //   $mail->SMTPDebug = 0;

                    //   //Ask for HTML-friendly debug output
                    //   $mail->Debugoutput = 'html';

                    //   //Set the hostname of the mail server
                    //   $mail->Host = "mail.smtp2go.com";

                    //   //Set the SMTP port number - likely to be 25, 465 or 587
                    //   $mail->Port = 587;

                    //   //Whether to use SMTP authentication
                    //   $mail->SMTPAuth = true;

                    //   //Username to use for SMTP authentication
                    //   $mail->Username = "uniqueperfectness@gmail.com";

                    //   //Password to use for SMTP authentication
                    //   $mail->Password = "Mishra@20";

                    //   $mail->SMTPSecure = 'tls';

                    //   //Set who the message is to be sent from
                    //   $mail->setFrom('info@bitbuxatm.com', 'BitBuxATM');
                    //   //Set an alternative reply-to address
                    //   $mail->addReplyTo('info@bitbuxatm.com', 'BitBuxATM');
                    //   //Set who the message is to be sent to
                    //   $mail->addAddress($email, 'BitBuxATM');
                    //   //Set the subject line
                    //   $mail->Subject = 'You have successfully purchased the package';
                    //   //Read an HTML message body from an external file, convert referenced images to embedded,
                    //   //convert HTML into a basic plain-text alternative body
                    //    $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                    //   //Replace the plain text body with one created manually
                    //   $mail->Body = '<!doctype html>
                    //   <html>

                    //   <head>
                    //       <meta charset="utf-8">
                    //       <title>Account Credential</title>
                    //       <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
                    //       <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
                    //   </head>

                    //   <body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
                    //       <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
                    //           <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
                    //               <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                    //                   <img src="https://bitbuxatm.com/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                    //                   <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
                    //   line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                    //                    purchased  successfully   
                    //                   </div>
                    //                   <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    //                       Hello '.$f["username"].' Thank you! you have successfully purchased the package.
                    //                   </div>
                    //                   <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                    //                   </div>
                    //                   <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
                    //   color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                                         
                    //                   </div>
                    //                   <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                                       
                                         
                                        
                    //                       <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Package Name : Package '.$_POST["package"].'</h3>
                                         
                    //                       <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Amount  : '.$_POST["amount"].'</h3>
                    //                     </div>
                                      
                    //                   <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                    //                   </div>
                    //                   <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                    //                     Copyrights 2018 BitBuxATM. All Rights Reserved. </p>
                                      
                    //               </div>
                    //           </div>
                    //       </div>
                    //       </div><br/><br/>
                    //   </body>

                    //   </html>';



                    //     $mail->send();


                      ?>
                      <script type="text/javascript">
                      window.location.href='package-upgrade.php?msg=Thank you! you have successfully purchased the package';
                      </script>
                      <?php
                      exit;

                }



              }else{
                ?>
              <script type="text/javascript">
                window.location.href='package-upgrade.php?msg=Validation Error Occurs';
              </script>
              <?php
              exit();
              }


            ?>


      <!-- / col-md-3 -->

            </div> 
 

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->



    </main> <!-- /playground -->


    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
    <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>

  <script>
    setTimeout(function(){
       window.location.reload(1);
    }, 10000);
  </script>

  </body>
</html>