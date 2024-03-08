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
           
           
           <div class="row" id="section">
                  <div class="col-lg-4 col-md-4">
                    <div class="card gradient-light-blue-cyan">
                      <div class="card-body">
                        <div class="px-3 py-3">
                          <div class="media">
                            
                            <div class="media-body padr text-white text-right">
                           
                             <center> <button style="background-color: #5b4a3e;" id="pay1">Bitcoin Withdrawal</button></center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="card gradient-light-blue-cyan">
                      <div class="card-body">
                        <div class="px-3 py-3">
                          <div class="media">
                            
                            <div class="media-body padr text-white text-right">
                           
                             <center> <button style="background-color: #5b4a3e;" id="pay3">Ethereum Withdrawal</button></center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="card gradient-light-blue-cyan">
                      <div class="card-body">
                        <div class="px-3 py-3">
                          <div class="media">
                           
                            <div class="media-body padr text-white text-right">
                          <center>   <button style="background-color: #5b4a3e;" id="pay2">Bank Withdrawal</button></center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>   
          </div>
          
          
        </section> <!-- / PAGE TITLE -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 center-block"  id="packages1" style="display: none;">

           <form name="bankinfo" method="post" action="withdrawal-request-confirm.php">
              <section class="panel panel-primary">

                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">Withdrawal Request Form</h4>
                <h4 style="line-height: 21px;">
                       <div> B Wallet Balence : <?php echo 'USD'; ?> <?php $data1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from b_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data1['amount'],2);?></div>
                       <div> T Wallet Balence : <?php echo 'USD'; ?> <?php $data2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from t_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data2['amount'],2);?></div>
                       <div> RMB Wallet Balence : <?php echo 'USD'; ?> <?php $data3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from rmb_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data3['amount'],2);?></div>

                </h4>
              
               
          
                <div class="panel-body">
                <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="roi_e_wallet" checked="checked" />

             
                <div class="form-group">
                  <label for="exampleInputAddress">Enter Amount</label>
                  <input name="subject8" type="text" tabindex="1" value="" class="form-control" id="exampleInputAddress" required />
                </div>

                <div class="form-group" >
                  <label for="exampleInputAddress">Enter Bitcoin Address</label>
                  <input name="subject9" type="text" tabindex="1" class="form-control" id="exampleInputAddress" required value='<?php echo $f['btc_add'];?>'/>
                </div> 
                
                <div class="form-group">
                      <label for="exampleInputName">Enter Pin:</label>
                      <input type="text" name="pin" class="form-control" id="exampleInputAddress">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputName">Enter Pin:</label>
                      <select name="wallet" class="form-control">
                          <option value="b_wallet">B Wallet</option>
                          <option value="t_wallet">T Wallet</option>
                          <option value="rmb_wallet">RMB Wallet</option>
                      </select>
                    </div>
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
                    <input type="hidden" name="payment_mode" value="btc" >
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             
                </div>
              </div>
         

              </section>
</form>



          </div> 
          
          
          <div class="col-md-6 center-block"  id="packages3" style="display: none;">

           <form name="bankinfo" method="post" action="withdrawal-request-confirm.php">
              <section class="panel panel-primary">

                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">Withdrawal Request Form</h4>
                <h4 style="line-height: 21px;">
                       <div> B Wallet Balence : <?php echo 'USD'; ?> <?php $data1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from b_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data1['amount'],2);?></div>
                       <div> T Wallet Balence : <?php echo 'USD'; ?> <?php $data2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from t_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data2['amount'],2);?></div>
                       <div> RMB Wallet Balence : <?php echo 'USD'; ?> <?php $data3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from rmb_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data3['amount'],2);?></div>

                </h4>
              
               
          
                <div class="panel-body">
                <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="roi_e_wallet" checked="checked" />

             
                <div class="form-group">
                  <label for="exampleInputAddress">Enter Amount</label>
                  <input name="subject8" type="text" tabindex="1" value="" class="form-control" id="exampleInputAddress" required />
                </div>

                <div class="form-group" >
                  <label for="exampleInputAddress">Enter Ethereum Address</label>
                  <input name="subject9" type="text" tabindex="1" class="form-control" id="exampleInputAddress" required value='<?php echo $f['etc_add'];?>'/>
                </div> 
                
                <div class="form-group">
                      <label for="exampleInputName">Enter Pin:</label>
                      <input type="text" name="pin" class="form-control" id="exampleInputAddress">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputName">Enter Pin:</label>
                      <select name="wallet" class="form-control">
                          <option value="b_wallet">B Wallet</option>
                          <option value="t_wallet">T Wallet</option>
                          <option value="rmb_wallet">RMB Wallet</option>
                      </select>
                    </div>
                     <!-- <div class="form-group">
                      <label for="exampleInputName">Select Wallet:</label>-->
                      <!--<input type="text" name="subject9" class="form-control" id="subject9"  value="<?php echo $f['swift_code'];?>">-->
                        <!--<select id="cars" name="wallet_from" class="form-control" id="wallet_from">
                         <option value="roi_e_wallet">Income Wallet</option>
                         <option value="final_e_wallet">IB Wallet</option>
                        
                        </select>

                   
                   
                    </div>-->
                    
                <!--<input name="wallet_from" id="wallet_from" type="hidden" tabindex="1" value="withdrawal" />-->
                <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />

                <div class="form-group" >
                    <input type="hidden" name="payment_mode" value="ethereum" >
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">             
                </div>
              </div>
         

              </section>
</form>



          </div>
          <!-- / row -->
         
          <!--<div class="col-md-6 center-block"  id="packages2" style="display: none;">
       
<h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">LiteCoin Details</h4>
 <h4>
                        Income Wallet Balence : <?php echo 'USD'; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data['amount'],2);?>
                </h4>
            
               
       <form  method="post" name="bankinfo" onsubmit="return hash();";  autocomplete='off' action="withdrawal-request-confirm.php"  >
                     <div class="form-group" >
                  <label for="exampleInputAddress">Enter Litecoin Address</label>
                  <input name="subject9" type="text" tabindex="1" class="form-control" id="exampleInputAddress" required value='<?php echo $f['ltc_add'];?>'/>
                </div> 
                    
                      <div class="form-group">
                      <label for="exampleInputName">Enter Amount:</label>
                      <input type="text" name="subject8" class="form-control" id="exampleInputAddress">
                    </div>
                    
                       <div class="form-group">
                      <input type="hidden" name="payment_mode" value="litecoin" >
                        <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
                    </div>
           </form>

                       </div> -->
                       
                       
                       <div class="col-md-6 center-block"  id="packages2" style="display: none;">
       
<h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold" >Banks Details</h4>
 <h4 style="line-height: 21px;">
                       <div> B Wallet Balence : <?php echo 'USD'; ?> <?php $data1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from b_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data1['amount'],2);?></div>
                       <div> T Wallet Balence : <?php echo 'USD'; ?> <?php $data2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from t_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data2['amount'],2);?></div>
                       <div> RMB Wallet Balence : <?php echo 'USD'; ?> <?php $data3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from rmb_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data3['amount'],2);?></div>

                </h4>
            
               
       <form  method="post" name="bankinfo" onsubmit="return hash();";  autocomplete='off' action="withdrawal-request-confirm.php"  >
                     <div class="form-group" >
                          <label for="exampleInputCity">Beneficiary’s Full Name:</label>
                          <input type="text" name="acc_name" value="<?php echo $f['acc_name'];?>"  class="form-control" id="exampleInputCity">
                </div> 
                    
                      <div class="form-group">
                          <label for="exampleInputCity">Bank Name:</label>
                          <input type="text" name="bank_nm" value="<?php echo $f['bank_nm'];?>"  class="form-control" id="exampleInputCity">
                    </div>
                    
                    <div class="form-group">
                          <label for="exampleInputCity">Bank Account Number:</label>
                          <input type="text" name="subject9" value="<?php echo $f['ac_no'];?>" class="form-control" id="exampleInputCity"> 
                    </div>
                    
                    <div class="form-group">
                         <label for="exampleInputCity">Branch Name:</label>
                          <input type="text" name="branch_nm" value="<?php echo $f['branch_nm'];?>" class="form-control" id="exampleInputCity">
                    </div>
                    
                    <div class="form-group">
                          <label for="exampleInputCity">Swift Code:</label>
                          <input type="text" name="swift_code" value="<?php echo $f['swift_code'];?>" class="form-control" id="exampleInputCity">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName">Enter Amount:</label>
                      <input type="text" name="subject8" class="form-control" id="exampleInputAddress">
                    </div>
                    
                    
                     <div class="form-group">
                      <label for="exampleInputName">Enter Pin:</label>
                      <input type="text" name="pin" class="form-control" id="exampleInputAddress">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputName">Enter Pin:</label>
                      <select name="wallet" class="form-control">
                          <option value="b_wallet">B Wallet</option>
                          <option value="t_wallet">T Wallet</option>
                          <option value="rmb_wallet">RMB Wallet</option>
                      </select>
                    </div>
                    
                    
                    <input type="hidden" id="id" name="id" value="<?php echo $userid;?>" />
                       <div class="form-group">
                      <input type="hidden" name="payment_mode" value="bank" >
                        <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
                    </div>
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
  <script>
   $("#pay1").click(function(){
  $("#packages1").show();
  $("#packages3").hide();
  $("#section").hide();
  
});

  $("#pay2").click(function(){
  $("#packages2").show();
  $("#section").hide();
  
});

$("#pay3").click(function(){
  $("#packages3").show();
  $("#packages1").hide();
  $("#packages2").hide();
  $("#section").hide();
  
});
  </script>
  </body>
</html>