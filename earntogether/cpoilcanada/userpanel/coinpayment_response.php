<?php include("header.php");?>
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
            <h1>Coin Payment Response</h1>
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

            if(isset($_GET['txn_id']) && !empty($_GET['txn_id'])){
              $txn_id = $_GET['txn_id'];
            }else{
              ?>
              <script type="text/javascript">
                window.location.href='package-upgrade.php?msg=Validation Error Occurs';
              </script>
              <?php
              exit();
            }

            $result=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select c.txn_id, c.converted_amount, c.amount, c.currency2, c.address, c.qrcode_url, c.status_url, c.status, ci.received_confirms, ci.status_text, ci.status_code from coinpayment as c LEFT JOIN coinpayment_ipn as ci ON (ci.txn_id=c.txn_id) where c.txn_id='$txn_id' and c.used = '0' order by ci.date DESC LIMIT 1"));

            if(count($result) > 0){
              
              ?>
              <hr/>
	      <h3>Please scan & pay and wait for until 2 confirmations in status row after payment.</h3><br/>
              <table class="table table-bordered">
                <tr>
                  <th>Transaction ID</th>
                  <td><?php echo $result['txn_id']; ?></td>
                </tr>
                <tr>
                  <th>Amount</th>
                  <td><?php echo $result['converted_amount'].' '.$result['currency2']; ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php echo $result['address']; ?></td>
                </tr>
                <tr>
                  <th>QR Code:</th>
                  <td><img src="<?php echo $result['qrcode_url']; ?>" /></td>
                </tr>
                <tr>
                  <th>View Status</th>
                  <td><a target="_blank" href="<?php echo $result['status_url']; ?>">Click to View Status</a></td>
                </tr>

                <?php

                  $status = $result['status_code'];

                  if ($status >= 100 || $status == 2) {
                      // payment is complete or queued for nightly payout, success 
                      //echo '<tr><td>Status:</td><td>'.$result['status_text'].'</td></tr>';

                      $amount = $result['amount'];
                      $pv = $amount;
                      $pbs1 = $amount;
                      $walls="Coin Payment";
                      $password=$f['t_code'];
                      $rand = rand(0000000001,9000000000);
                      $lfid="LJ".$userid.$rand;
                      $start=date('Y-m-d');
                      $end = date('Y-m-d', strtotime('+2 months'));

                      $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));

                      mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$userid', '$amount', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$userid."','".$ref['ref_id']."','$pv')");
			
			
			// Update used cointpayment
			
			mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `coinpayment` SET `used` = '1' WHERE txn_id='$txn_id'");
                      
                      $invoice_no=rand(1111111111, 9999999999);
                      commission_of_referal($userid,$amount,$invoice_no,$pbs1);


                      ?>
                      <script type="text/javascript">
                      window.location.href='package-upgrade.php?msg=Thank you! you have successfully purchased the package';
                      </script>
                      <?php
                      exit;

                  } else if ($status < 0) { 
                      //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent 
                      echo '<tr><td>Status:</td><td>'.$result['status_text'].' ( Number Of Confirmations: '.$result['received_confirms'].' )</td></tr>';
                  } else { 
                      //payment is pending, you can optionally add a note to the order page 
                       echo '<tr><td>Status:</td><td>'.$result['status_text'].' ( Number Of Confirmations: '.$result['received_confirms'].' )</td></tr>';
                  } 

                ?>

              </table>

              <?php
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