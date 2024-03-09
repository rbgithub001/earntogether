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
    form.bankinfo section.panel {
        padding: 20px;
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
              
        <?php
   // $userid=$_SESSION['userpanel_user_id'];
       //echo  $userid=$_SESSION['user_id'];
        
        //print_r($_SESSION['user_id']);
         $bank=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));
         
      //  print_r($bank); 
                if($bank['bank_nm']!="" && $bank['branch_nm']!="" && $bank['ac_no']!="" && $bank['swift_code']!="")
                {
        ?>
              
            <div class="col-md-6 center-block">
            <div class="text-right">
                <a href="update-bank-info.php"><input type="submit" name="update" style="margin-bottom:0;" value="Update Bank Details" class="btn btn-primary"></a> 
            </div>
           <form name="bankinfo" method="post" action="withdrawal-request-confirm-new.php" class="bankinfo">
              <section class="panel">

                <header class="panel-heading">
                 <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">Withdrawal Request Form</h4>
               
              <?php $walletAmountdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select amount from final_e_wallet where user_id='$userid'")); 
                $walletamount = $walletAmountdata['amount']; ?>
                 <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">Income Wallet Balance: SAR <?php echo number_format($walletamount,2);?></h4>
            
                <br/></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Full Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject1" type="text" tabindex="1" value="<?php echo $f['first_name'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>

                     <!-- <div class="form-group">
                      <label for="exampleInputAddress">Last Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject2" type="text" tabindex="1" value="<?php echo $f['last_name'];?>"  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>-->

                      <div class="form-group">
                      <label for="exampleInputAddress">Account Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject3" type="text" tabindex="1" value="<?php echo $bank['acc_name'];?>" <?php if($bank['acc_name']!=''){ echo "readonly"; }?> style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>

  <div class="form-group">
                      <label for="exampleInputAddress">Account Number</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject4" type="text" tabindex="1" value="<?php echo $bank['ac_no'];?>" <?php if($bank['ac_no']!=''){ echo "readonly"; }?> style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                  
                      </div>
                    </div>


  <div class="form-group">
                      <label for="exampleInputAddress">Bank Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input name="subject5" type="text" tabindex="1" value="<?php echo $bank['bank_nm'];?>" <?php if($bank['bank_nm']!=''){ echo "readonly"; }?> style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Branch Name</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input name="subject6" type="text" tabindex="1" value="<?php echo $bank['branch_nm'];?>" <?php if($bank['branch_nm']!=''){ echo "readonly"; }?> style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">IFSC Code</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input name="subject7" type="text" tabindex="1" value="<?php echo $bank['swift_code'];?>" <?php if($bank['swift_code']!=''){ echo "readonly"; }?> style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Enter Amount</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input name="subject8" type="number" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Description</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input name="subject9" type="text" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Enter Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input name="password" type="password" tabindex="1" value=""  style="width:100%; border:1px solid #ebebeb; padding:5px;" class="form-control" id="exampleInputAddress" required />
                        </div>
                    </div>
                    <input name="wallet_from" id="wallet_from" type="hidden" tabindex="1" value="withdrawal" />
                    <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />
                    <div class="form-group">
                        <div class="input-group">
                          <input type="submit" name="submit" value="Submit" class="btn btn-primary"> 
                        </div>
                    </div>
                </section>
            </form>    

 <?php }else{ ?> 
                          <div class="col-md-12">
                               <center><strong style="color:red; font-size:16px;">Please First Update Your Bank Details!!</strong></center>
                       <!-- <center><strong style="color:red; font-size:16px;">Please First Verify Your Kyc!!</strong></center>-->
                        </div>
                        <?php } ?> 

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