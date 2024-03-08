<?php include("header.php");


if(isset($_POST['update']))
{
$getuserid=$_SESSION['userpanel_user_id'];
$selectdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$getuserid."'"));
$t_password=$_POST['t_password'];
$postuserid=$_POST['userid'];
$amounts=$_POST['amounts'];
if($amounts < 0){
 $_SESSION['err']="Invailed Amount!";
  header("location:fund-ewallet.php");
  exit;
}      
      $pwd= $selectdata['t_code'].$_SESSION['nonce'];
	  $pwd= hash('sha256',$pwd);  
	   


if($pwd==$t_password)
{	

        if(file_exists('./block_io/block_io.php')){
          require ('./block_io/block_io.php');
        }else{
          die('Unable to load block_io.php file');
        }


        // $webhook_url = "https://bitbuxatm.com/userpanel/blockio_webhook.php?key=biutmyat_bitbux";

        $webhook_url = "https://www.bitbuxatm.com/userpanel/blockio_webhook.php?key=biutmyat_bitbux";

        // require('./coinpayment/coinpayments.inc.php');
          
        $apiKey = '7166-9068-03fe-5e6c';
        $pin = trim('Bholenath');
        $version = 2; // the API version
        $block_io = new BlockIo($apiKey, $pin, $version);

        $label = $userid."_".rand(100,999);
        $newAddressInfo = $block_io->get_new_address(array('label' => $label));

        $email = $f['email'];
        $amount = $amounts;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value='.$_POST['amounts']
        ));
        $price_in_btc = curl_exec($curl);
        curl_close($curl);


        if (strtolower($newAddressInfo->status) == 'success') {

          $address = $newAddressInfo->data->address;
          $label   = $newAddressInfo->data->label;

          $notification = $block_io->create_notification(array('type' => 'address', 'address' => $address, 'url' => $webhook_url));

          // use mysql_real_escape_string for input fields
          mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO block_io SET user_id='".$userid."', amount = '".mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $amount)."', btc_amount = '".$price_in_btc."', label = '".$label."', address = '".$address."', notification = '".$notification->data->notification_id."', type='fund'");

          $insert_id = ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);

          $_SESSION['bpid'] = $insert_id;
          
          header("location:add_fund_viewqr.php");
          exit();

          ?>
            <script type="text/javascript">
              window.location.href='add_fund_viewqr.php';
            </script>
            <?php
            exit();
          // $le = php_sapi_name() == 'cli' ? "\n" : '<br />';
          // print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
          // print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
          // print 'Status URL: '.$result['result']['status_url'].$le;
        } else {
          // print 'Error: '.$result['error']."\n";
          ?>
          <script type="text/javascript">
             window.location.href='fund-ewallet.php?msg='.$newAddressInfo->data->error_message;
          </script>
                <?php
          exit();
        }

}
else
{
	$_SESSION['err']="Wrong Transaction Password!";
  header("location:fund-ewallet.php");
  exit;
  
}
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
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>Ewallet Transaction History</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Ewallet</a></li>
              <li><a href="#">Ewallet Transaction History</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
<form action="" method="post" name="bitcoin" >
            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Add fund with bitcoin</h4>
                </header>
                <div class="panel-body">
<div class="blockchain-btn" style="width:auto" data-create-url="create.php?invoice_id=<?php echo $invoice_id; ?>"> 
            <div class="blockchain stage-begin" style="text-align: center;">
                <img src="images/pay_now_64.png">
            </div>
            <div class="blockchain stage-loading" style="text-align:center">
                <img src="<?php echo $blockchain_root; ?>Resources/loading-large.gif">
            </div>
            <div class="blockchain stage-ready" style="text-align:center">
                Please send <?php echo $price_in_btc; ?> BTC to <br /> <b>[[address]]</b> <br />
                <div class='qr-code'></div>
            </div>
            <div class="blockchain stage-paid">
                Payment Received <b>[[value]] BTC</b>. Thank You.
            </div>
            <div class="blockchain stage-error">
                <font color="red">[[error]]</font>
            </div>
                
              


                </div>
            </section>
            </div>
      
      </div>
        </div> <!-- / container-fluid -->


        



     <?php include("footer.php");?>


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
      <script type="text/javascript" src="<?php echo $blockchain_root ?>Resources/js/pay-now-button-v2.js"></script>
          <script type="text/javascript">
	$(document).ready(function() {
		$('.stage-paid').on('show', function() {
			window.location.href = './order_status.php?invoice_id=<?php echo $invoice_id; ?>';
		});
	});
	</script>
  
  </body>
</html>
