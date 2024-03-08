<?php
ob_start();
include("header.php");
// echo '<pre>';
// print_r($_REQUEST); die();
$payment_mode= $_POST['payment_mode'];
$subject8 = $_POST['subject8'];
if($payment_mode == ''){
    echo "<script language='javascript'> alert('Please choose withdraw mode'); window.location.href='withdraw-request.php'; </script>";
}
if($payment_mode == 'BTC Withdrawl'){
    if($subject8 < 20){
        echo "<script language='javascript'> alert('Amount should be greater than 20 USD'); window.location.href='withdraw-request.php'; </script>";
    }
    if($f['btc_add']==''){
        echo "<script language='javascript'> alert('Please Update Your BTC Beneficiary Details!'); window.location.href='withdraw-request.php'; </script>";
    }else{
        $address = $f['btc_add'];
    }
}
if($payment_mode == 'TRX Withdrawl'){
    if($_POST['subject8'] < 5 ){
        
        echo "<script language='javascript'> alert('Amount should be greater than or equal to 5 USD!'); window.location.href='withdraw-request.php'; </script>";
    }
    if($f['trx_address']==''){
        echo "<script language='javascript'> alert('Please Update Your TRX Beneficiary Details!'); window.location.href='withdraw-request.php'; </script>";
    }else{
        $address = $f['trx_address'];
    }
}


$fuser=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userid."'"));  


 if($_POST['wallet']=='e_wallet') {
       $working ="ok";
} else {
     echo "<script language='javascript'> alert('Security @ is uncompromised withdraw should be from main wallet.'); window.location.href='withdraw-request.php'; </script>";
}              
//  if( $fuser['kyc_status'] == 0)
//       {
        
//           echo "<script language='javascript'> alert('Please Verify Your KYC Status!'); window.location.href='withdraw-request.php'; </script>";
//         }

 if($fuser['password'] != $_REQUEST['password'])
        {
        
          echo "<script language='javascript'> alert('Invalid Pin!'); window.location.href='withdraw-request.php'; </script>";
        }






?>
<!DOCTYPE html>
  <?php include('../lib/random.php');
   $salt=$_SESSION['nonce'];
?>
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
            <div class="col-md-8">
              <!-- <h1>Withdrawal Request</h1> -->
              <p><div style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
            </div>

            <div class="col-md-4">

              <ol class="breadcrumb pull-right no-margin-bottom">
                
              </ol>

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
              <div class="col-md-6 center-block" style="float:none;">
          

                <form name="bankinfo" id="bankinfo" method="post" action="withdrawal-request-code.php" onsubmit="return hash();";   autocomplete='off'>
		   
		            <input type="hidden" name="randm" value = "<?php echo htmlentities($salt);?>" />
                <section class="panel panel-primary">

               <!--  <header class="panel-heading">
                  <h3 class="panel-title">Withdrawal Request Confirmation</h3>
                </header> -->

                <div class="panel-body">
                   <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">WITHDRAWAL REQUEST CONFIRMATION</h4>
                <!--<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="roi_e_wallet" checked="checked" />-->



                <div class="form-group">
                  <div class="row" style="margin:0 -10px;">
                    <!--<div class="col-sm-7">-->
                    <!--  <label for="exampleInputAddress">Send Amount From</label>-->
                    <!--</div>-->
                    <div class="col-sm-5">
                    <?php
                      $walletfrom1 = "";
                      
                      if($_POST['wallet']=='e_wallet'){
                        $walletfrom1 = "final_e_wallet";
                      }
                     // echo $walletfrom1;
                    ?>
                    
                    <input type="hidden" name="pay_address" required class="form-control" value="<?php echo $address; ?>" ?>
                     <input type="hidden" name="wallet_from" required class="form-control" value="<?php echo $_POST['wallet']; ?>" ?>

                 
                    </div>
                  </div>
                </div>
            
                <div class="form-group">
                  <div class="row" style="margin:0 -10px;">
                    <div class="col-sm-7">
                      <label for="exampleInputAddress">Confirm Amount</label>
                       
                        <input name="subject8" type="text" tabindex="1" readonly="" value="<?php echo $_POST['subject8'];?>" class="form-control" id="exampleInputAddress" required />

                    </div>
                    <div class="col-sm-5">
                   
                        
                        <input name="subject8" type="hidden" tabindex="1" value="<?php echo $_POST['subject8'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                        <input type="hidden" name="payment_mode" value="<?php echo $payment_mode; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                   <div class="row" style="margin:0 -10px;">
                     <div class="col-sm-7">
                        <label for="exampleInputAddress">Pay Address</label>
                        <input type="text" value="<?=$address;?>" style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" readonly required>
                     </div>
                    <!--<div class="col-sm-5">
                       <?php // echo $f['ben_bank'];?>
                       <input name="ben_bank" type="hidden" tabindex="1" value="<?php //echo $f['ben_bank'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                    </div>-->
                  </div>
                  </div>

                    <!--<div class="form-group">
                   <div class="row" style="margin:0 -10px;">
                     <div class="col-sm-7">
                        <label for="exampleInputAddress">Account Number</label>
                     
                     </div>
                    <div class="col-sm-5">
                       <?php // echo $f['ben_acc_no'];?>
                       <input name="ben_acc_no" type="hidden" tabindex="1" value="<?php echo $f['ben_acc_no'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                    </div>
                  </div>
                  </div>-->

                   <div class="form-group">
                      <label for="exampleInputAddress">Confirm Pin</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="password" id="password" type="password" tabindex="1" value=""  class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                  </div>
 
               <!--  <input name="description" id="description" type="hidden" tabindex="1" value="<?php echo $_POST['description'];?>" /> -->
                <!--<input name="wallet_from" id="wallet_from" type="hidden" tabindex="1" value="withdrawal" />-->
                <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />
                 <input type="hidden" name="payment_mode" value="<?php echo $payment_mode; ?>">
                           

                <div class="form-group">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             
                </div>
              </div>

    </section>

</form>
        
                <script type="text/javascript" src="js/sha256.js"></script> 

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