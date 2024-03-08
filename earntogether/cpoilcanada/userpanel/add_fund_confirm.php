<?php
ob_start();
include("header.php");
$_SESSION['amountf']=$_REQUEST['amountf'];
if($_REQUEST['currency']=="BTC"){
$url= "https://blockchain.info/ticker";
function get_data($url) {
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
$zan=get_data($url);
$usd=json_decode($zan,true);
$usd_amount=$usd['USD']['last'];
$amount=$_REQUEST['amountf']/$usd['USD']['last'];
}

if($_REQUEST['currency']=="ETH"){
$url2= "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD";

function get_datas($url2) {
$ch2 = curl_init();
$timeout2 = 5;
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
$data2 = curl_exec($ch2);
curl_close($ch2);
return $data2;
}
$zan2=get_datas($url2);
$usd2=json_decode($zan2,true);
$usd_amount=$usd2['USD'];
$amount=$_REQUEST['amountf']/$usd2['USD'];
}

if($_REQUEST['currency']=="USDT"){
$url2= "https://min-api.cryptocompare.com/data/price?fsym=USDT&tsyms=USD";
function get_datas($url2) {
$ch2 = curl_init();
$timeout2 = 5;
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
$data2 = curl_exec($ch2);
curl_close($ch2);
return $data2;
}
$zan2=get_datas($url2);
$usd2=json_decode($zan2,true);
$usd_amount=$usd2['USD'];
$amount=$_REQUEST['amountf']/$usd2['USD'];
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='css/material-design-iconic-font.min.css' rel='stylesheet' type='text/css'/>

     <link href='css/_misc2.css' rel='stylesheet' type='text/css'/>
     <link href="css/turbo.css" rel="stylesheet" />
      <link href="css/mixins.css" rel="stylesheet" />
    
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

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

            
      
         <?php //include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8" style="float:none;color:#900;text-align: center;font-size: 16px;">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            <?php echo @$_GET['msg'];?>
          </div>

          <!--<div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Team Report</a></li>
              <li><a href="#">Total Downline Member Report</a></li>
             
            </ol>

          </div>-->
        </section> <!-- / PAGE TITLE -->

        <div class="col-lg-12 center-block" >
                </div>
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">


              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">Add Fund</h4>
                <div class="panel-body">
           
    <!--<form action="add_save_fund.php" method="post" class="form_container left_label">-->
<form action="https://www.coinpayments.net/index.php" method="post" target="_top">
    
                              	<div class="form-group">
							
									<div class="form_input">
										<input name="amountf" type="hidden" value="<?php echo $usd_amount; ?>" readonly required tabindex="1" class="form-control" id="exampleInputAddress" />
									</div>
								</div>
								<div class="form-group">
									<label class="field_title">Amount</label>
									<div class="form_input">
										<input name="amountf" type="number" value="<?php echo $amount; ?>" readonly required tabindex="1" class="form-control" id="exampleInputAddress" />
									</div>
								</div>
							
		
							
				               <div class="form-group">
									<label class="field_title">Payment Type</label>
									<div class="form_input">
									    <select name="currency" class="form-control" required disabled="">
									        <option value="">Please Select</option>
									        <option value="BTC" <?php if($_REQUEST['currency']=='BTC'){ ?>  selected  <?php } ?>>BTC</option>
									        <option value="ETH" <?php if($_REQUEST['currency']=='ETH'){ ?>  selected  <?php } ?>>ETH</option>
									        <option value="USDT" <?php if($_REQUEST['currency']=='USDT'){ ?>  selected  <?php } ?>>USDT</option>
									    </select>
									</div>
								</div>
							
							
							
							
								<div class="form-group">
									<div class="form_input">
										<button type="submit" class="btn btn-primary">Add Fund</button>
										<!--<a href="support.php"><button type="button" class="btn btn-primary">Back</button></a>-->
									</div>
								</div>
								
          <input type="hidden" name="cmd" value="_pay_simple">
    <input type="hidden" name="reset" value="1">
    <input type="hidden" name="merchant" value="606a89bb575311badf510a4a8b79a45e">
    <!--<input type="hidden" name="merchant" value="dcb7af6a7ef39091c0d44fa84f41e00e">-->
    <input type="hidden" name="item_name" value="add fund">
    <input type="hidden" name="item_desc" value="Item Description">
    <input type="hidden" name="want_shipping" value="1">
    <input type="hidden" name="success_url" value="http://182.76.237.238/~syscheck/cantho/userpanel/coinpay/success.php">
    <!--<input type="image" src="https://www.coinpayments.net/images/pub/buynow-med.png" alt="Buy Now with CoinPayments.net">	-->
						</form>
						</div>
						

              </section>
            

            </div> <!-- /col-md-6 -->

  

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
  </body>
</html>