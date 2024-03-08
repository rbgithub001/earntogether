<?php
session_start(); 
 include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <!--<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>-->
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


    <style type="text/css">
       #example2 {
                border: 1px solid color:gray;
                padding-top: 22px;
                background-color: white;
                box-shadow: 4px 4px 2px 0px #c7c3c3;
                margin-bottom: 20px;
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
        <section id="page-title" class="row">

          <div class="col-md-12" id="example2">
           <!--<strong>Payment Information</strong>-->
           <strong style="color: black;"><i class="ti-wallet"></i> Please request for Investment in BTC.</strong>
            <p><div align="center" style="color:green;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
        <div class="col-md-8" style="float: right;margin-bottom: 5px;">
           
        <!--   <button id="p1" style="color: green;">BITCOIN</button> -->
            <!--<button id="p2" style="color: blue;">TETHER</button>-->
        </div>
         
        </section> <!-- / PAGE TITLE -->

     
          <div class="container">

                      <br/>
                        <!-- end row -->
     


                 
                       <br><br>
                      <div class="row">
                            <div class="card-box table-responsive" style="min-height: 500px !important;">
                                
                                <div class="col-sm-6">
                                   
                                    <form method="POST" enctype="multipart/form-data">
                                         <input type="hidden" name="type" value='<?php echo $type; ?>' required readonly>
                                            <input type="hidden" name="package" value='<?php echo $package; ?>' required readonly>
                                        <input class="form-control" placeholder="Enter Amount Sent" type="hidden" name="amount" value='<?php echo $amt; ?>' required readonly>

                                          <label style="color: green;">Total Amount To Pay Amount : $<?php echo $_SESSION['amount'];?> </label></br></br>
                                        <div class="form-group">
                                            <label>You Need To Pay Amount In BTC</label>
                                            <input class="form-control" placeholder="Enter Amount Sent" type="text" name="btc_amt"  value='<?php echo $amt/$usd['USD']['last']; ?>' required readonly style='background-color: #ccdef5;opacity: 1;width: 363px;'>
                                        </div>

                                        <!--<div class="form-group">
                                            <label>Payment Method</label>
                                            <select class="form-control" name="payment_method" id="payment_method" style='width:363px;' required>
                                              <option value="">--select payment method--</option>
                                              <option value="qrcode">QR Code</option>
                                              <option value="blockchain">Block Chain</option>
                                            </select>
                                        </div>-->
                                        
                                       

                                        <div class="form-group">
                                           <label>Payment Method</label>
                                           <br>
                                              <input type="button" class="btn btn-success btn-lg" id="b1" value="BITCOIN">
                                           
                                              <input type="button" class="btn btn-danger btn-lg" id="b2" value="ETHEREUM">
                                          
                                              <input type="button" class="btn btn-info btn-lg" id="b3" value="BLOCK CHAIN">
                                            
                                           
                                           
                                        </div>


                                        <div class="form-group" style="display: none;" id="transid">
                                            <label>Transaction ID</label>
                                            <input class="form-control" placeholder="Enter Txn ID" type="text" name="txn_id" required style='width: 363px;'>
                                        </div>
                                        <div class="form-group" style="width: 363px;display: none;" id="transproof">
                                            <label>Upload Proof</label>
                                            <input class="form-group" type="file" name="pay_proof" style="width: 100px;" required>
                                        </div>
                                        <div class="form-group text-center">
                                           <input type="submit" name="sub" class="btn btn-primary" id="submitdata1">
                                           <a  href="javascript:window.history.go(-1)" id="submitdata2" class="btn btn-warning" style="display: none;">BACK</a>
                                        </div>                                            
                                    </form>
                                </div>

                                <div class="col-sm-6" style="display: none;" id="bitcoincode">
                                   <h4 class="m-t-0 header-title text-center"><b>Bitcoin Details</b></h4>
                                    <div class="item active text-center">
                                    <div class="row">
                                        <div class="col-sm-12">
                                           <img src="images/bitcoin-qr-code111.png" alt="">
                                        </div>

                                        <div class="col-sm-12">
                                           <p style="display: inline;" >BTC Address : <b id="myInput1" >3JiTfVBffTFXkZcw5U7fKxJVAj7gRyuVxE</b></p><button class="btn-primary" onclick="copyToClipboard('#myInput1')">Copy </button>
                                        </div>
                                    </div>  
                                    <br><br>
                                    <p class="m-t-0 text-center" style="color: red;"><b>Important :-</b>Activation will only happen when we will receive payment proof so "Do Upload ScreenShot After Payment" with "Hash ID".Please verify that the bitcoin address shown in ledger live matches the one on your ledger device.</p> 
                                    
                                    </div>  
                                </div>

                            </div>
                        </div>
              


                       
                        <!-- end row -->

                 

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
  <script type="text/javascript">
$(document).ready(function () {
  var z;
        $('#dependenddropdown').change(function () {
            z=$('#dependenddropdown').val();

            $('#addresss').text(z);
        });
    });

</script>
<script type="text/javascript">
  $("#p1").click(function(){

  $("#btc").show();
   $("#taaaahhh").show();
  $("#tether").hide();
  $("#thhh").hide();
});

$("#p2").click(function(){
 $("#btc").hide();
  $("#thhh").show();
  $("#tether").show();
  $("#taaaahhh").hide();
});
</script>
  <script>
        $(document).ready(function(){
             $("#ammm").keyup(function(){
                 var am = $("#ammm").val();
                 var am11 = $("#ammm112").val();
                 //var totalam = am*100+1;
                 var totalam = am*100;
                 var totalam1 = am*100;
                 var divide =totalam/am11;
                 
              if(am==''){
                     $('#ammm1').val('');
                     $('#ammm2').val('');
                     
                 }
                 if(am!=''){
                       $('#ammm1').val(totalam);
                       $('#ammm2').val(totalam1);
                  } 
                    
                    if(am==''){
                       $('#ammm11').val('');
                  }
                  if(am!=''){
                       $('#ammm11').val(divide);
                  } 
                  
                  
               
            });
        });
</script>
  <script>
        $(document).ready(function(){
             $("#ammmthere").keyup(function(){
                 var am = $("#ammmthere").val();
                
                 //var totalam = am*100+1;
                 var totalam = am*100;
                 var totalam1 = am*100;
                 var divide =totalam;
                 
              if(am==''){
                     $('#ammm1total').val('');
                     $('#ammmtotal2').val('');
                     
                 }
                 if(am!=''){
                       $('#ammm1total').val(totalam);
                       $('#ammmtotal2').val(totalam1);
                  } 
                    
                    if(am==''){
                       $('#ammm1tether1').val('');
                  }
                  if(am!=''){
                       $('#ammm1tether1').val(divide);
                  } 
                  
                  
               
            });
        });
</script>
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

<!--<script>
    $("#payment_method").change(function(){
     var status = $(this).val();
     if(status=='qrcode'){
    $("#bitcoincode").show();
    $("#transid").show();
    $("#transproof").show();
    $("#submitdata1").show();
    $("#submitdata2").hide();
  }if(status=='blockchain'){
    alert('Coming soon');
    $("#bitcoincode").hide();
    $("#transid").hide();
    $("#transproof").hide();
    $("#submitdata1").hide();
    $("#submitdata2").show();
  }
  });
</script>-->

<script>
 $('#b1').click(function() { 
    var text = $(this).val(); 
    if(text=="BITCOIN"){
     $("#bitcoincode").show();
    $("#transid").show();
    $("#transproof").show();
    $("#submitdata1").show();
    $("#submitdata2").hide();
    }
    }); 
                                            
    $('#b2').click(function() { 
    var text = $(this).val(); 
    if(text=="ETHEREUM"){
    alert('Coming soon');
    $("#bitcoincode").hide();
    $("#transid").hide();
    $("#transproof").hide();
    $("#submitdata1").hide();
    $("#submitdata2").show();
     }
    }); 
                                            
    $('#b3').click(function() { 
    var text = $(this).val(); 
    if(text=="BLOCK CHAIN"){
    alert('Coming soon');
    $("#bitcoincode").hide();
    $("#transid").hide();
    $("#transproof").hide();
    $("#submitdata1").hide();
    $("#submitdata2").show();
    }
 }); 
</script>                                          
                                            
                                        

  </body>
</html>