<?php include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("title.php");?>
     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    #example2{
      margin-bottom: 20px;
    }
    .panel-primary{
      padding: 15px;
    }
    .m-b{
      margin-bottom: 25px;
    }
    </style>
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
        <section id="example2">
          <div class="row">
            <div class="col-md-12">
              <!--<h1>Withdrawal Request</h1>-->
              <p><div align="center" style="color:green;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
            </div>
           
           
          </div>
          
          
        </section> <!-- / PAGE TITLE -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 center-block">
 <div class="text-right">
              <!-- <a href="update-beneficiary.php"><input type="submit" name="update" style="margin-bottom:0;" value="Update Beneficiary" class="btn btn-primary"></a>  --> 
            </div>
           <form name="bankinfo" method="post" action="withdrawal-request-confirm.php">
              <section class="panel panel-primary">

                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">E-marketing Withdrawal Request Form</h4>
               
              <?php $walletAmountdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select amount from final_e_wallet where user_id='$userid'")); 
                $walletamount = $walletAmountdata['amount'];
                echo '<h4>Wallet Balance: SAR '.number_format($walletamount,2).'</h4>';
              ?>
               
          
                <div class="panel-body">
                <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" value="e_wallet" checked="checked" />

                <!--<div class="form-group">
                  <label for="exampleInputName">Withdraw Mode:</label>
                  <select name="payment_mode" class="form-control" required>
                      <option value=''>Select</option>
                      <option value="BTC Withdrawl">BTC</option>
                      <option value="TRX Withdrawl">TRX</option>
                  </select>
                </div>-->
                <div class="form-group">
                  <label for="exampleInputAddress">Enter Amount</label>
                  <input name="subject8" type="text" tabindex="1" value="" class="form-control" id="exampleInputAddress" required />
                  <input type="hidden" value="e_wallet" name="wallet_from">
                </div>

                
                
                <div class="form-group">
                  <label for="exampleInputName">Enter Password:</label>
                  <input type="text" name="password" class="form-control" id="exampleInputAddress" required>
                </div>
                    
                 <!--<div class="form-group">
                  <label for="exampleInputName">Enter Pin:</label>
                  <select name="wallet" class="form-control">
                      <option value="final_e_wallet">Cantho Wallet</option>
                      <option value="level_e_wallet">Level Wallet</option>
                      <option value="roi_e_wallet">ROI Wallet</option>
                  </select>
                </div>-->
                  <!--<div class="form-group">
                  <label for="exampleInputName">Select Wallet:</label>
                  <!--<input type="text" name="subject9" class="form-control" id="subject9"  value="<?php echo $f['swift_code'];?>">-->
                   <!-- <select id="cars" name="wallet_from" class="form-control" id="wallet_from">
                     <option value="roi_e_wallet">Income Wallet</option>
                     <option value="final_e_wallet">IB Wallet</option>
                    
                    </select>-->

                   
                   
                </div>
                    
                <!--<input name="wallet_from" id="wallet_from" type="hidden" tabindex="1" value="withdrawal" />-->
                <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />

                <div class="form-group" >
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             
                </div>
              </div>
         

              </section>
</form>



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