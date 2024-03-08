<?php include("header.php");
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
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>Withdrawal Request</h1>-->
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">e-Wallet</a></li>
              <li><a href="#">e-Wallet Withdrawal Request</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">
<?php 
 $uid=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_id='$userid' "));

$uid1=$uid['withdraw_status'];

if ($uid1==0) {
 

?>
           <form name="bankinfo" method="post" action="withdrawal-request-confirm.php">
              <section class="panel">

                <header class="panel-heading" style="color:#000;">
                  <h3 class="panel-title">Withdrawal Request Form</h3>
                </header>
                <header class="panel-heading" style="color:#000;">
                   <br/> <h3 class="panel-title">
                        Main Wallet : <?php echo $_SESSION['currency']; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data['amount'],2);?><br>  

               <!--   Binary Wallet : <?php echo $_SESSION['currency']; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid'"));?><?php  echo number_format($data['amount'],2);?> <br>

                ROI Wallet : <?php echo $_SESSION['currency']; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from roi_e_wallet where user_id='$userid'"));?><?php  echo number_format($data['amount'],2);?> -->
                  </h3>
                <br/>
              <!--   <p>Note: On every Transaction 50% service charge will be levy.</p> <br/> -->
<h3 class="panel-title">
               <?php  
               
               $curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value=1'
				));
				$currency3 = curl_exec($curl);
				curl_close($curl);
               
//               $curl11 = curl_init();
// curl_setopt ($curl11, CURLOPT_URL, "https://www.bitstamp.net/api/v2/ticker/btcusd/");
// curl_setopt($curl11, CURLOPT_CUSTOMREQUEST, "GET");
// curl_setopt($curl11, CURLOPT_RETURNTRANSFER, true);
// $pdfResponse = curl_exec($curl11);
// $response = json_decode($pdfResponse);
// $currency1=$response->last;
// $currency2=$currency1*10/100;
// $currency3=$currency1-$currency2;

$x=1;
// echo "Current bitcoin price 1 USD = ".$newsd=number_format($x/$currency3,5)." BTC";

echo "Current bitcoin price 1 USD = $currency3 BTC";

 // curl_close ($curl11); 
 ?></h3>
              
                <br/></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
            <input type="hidden" name="btcamt" value="<?php echo $currency3;?>">
           
                  <div class="form-group">
                      <label for="exampleInputAddress">Send Amount From </label>
                      <div class="input-group">
                      <!-- <input type="radio" name="walletfrom" required class="form-control" value="working_e_wallet" checked>Binary Wallet
                      <input type="radio" name="walletfrom" required class="form-control" value="roi_e_wallet">ROI Wallet -->
                      <input type="radio" name="walletfrom" required class="form-control" value="final_e_wallet">Withdrawal Wallet
                      </div>
                  </div>
                 

  <div class="form-group">
                      <label for="exampleInputAddress">Enter Amount</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject8" type="number" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>


  <div class="form-group" >
                      <label for="exampleInputAddress">Enter Bitcoin Address</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject9" type="text" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>

                     
   <input name="wallet_from" id="wallet_from" type="hidden" tabindex="1" value="withdrawal" />
                <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />
                           
                





          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

              </section>

</form>
<?php } else  {  ?>

<h3 style="margin-top: 50px;"> <?php echo "withdrawal request disable by admin "; ?></h3>

<?php } ?>
            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

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
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>