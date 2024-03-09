<?php 
 include("header.php");
 
 if(isset($_POST['submit']))
 {

   
   $check = getimagesize($_FILES["uploadedfile"]["tmp_name"]);
   $filename12 = $_FILES["uploadedfile"]["name"];
   if ($filename12!='') {
    
    if($check == false) {
        
        
       header("location:upload-payment.php?msg=File is not an image.");
       exit(); 
    }

     $filename12 = time()."main_".$_FILES["uploadedfile"]["name"];

     $target_dir = "images/";
     $target_file = $target_dir . basename($_FILES["uploadedfile"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif") {
  
     header("location:making-deposit.php?msg=Sorry, file not allowed.");
       exit();
}
   
     move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"paymentproof/" .$filename12);
}

  $usd=$usd['USD']['last'];
  $total_usd=$_POST['usdamount'];
  $total_usd1=$_POST['usdamount_last'];
  $trannumber = $_POST['trannumber'];
  $amount = $_POST['amount'];

   mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `paymentproof` (`id`, `user`, `bank`, `amount`, `tranno`, `paymentproof`, `posteddate`, `status`,`bank_name`,`payment_mode`,`amount_used`,`apply_for`,`usd`,`total_usd`,`wallet_type`) VALUES (NULL, '".$f['user_id']."', '$bank', '$amount', '$trannumber', '$filename12', '".date('Y-m-d')."', 'Pending', '$bank_name', '$payment_mode', '$amount_used','Activation Wallet','$total_usd1','$total_usd','$wallet_type')");
   
   header("location:making-deposit.php?msg=Payment request submited successsfully!"); 
   exit;
 }

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
           <strong style="color: black;"><i class="ti-wallet"></i> Please request for fund in BTC and after admin approval,You will receive amount in USD on activation wallet.</strong>
            <p><div align="center" style="color:green;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
        <div class="col-md-8" style="float: right;margin-bottom: 5px;">
           
          <button id="p1" style="color: green;">BITCOIN</button>
            <!--<button id="p2" style="color: blue;">TETHER</button>-->
        </div>
         
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row text-center">
       
            <div class="col-md-6" id="btc" >
            <div class="box-effect">
                        <form name="bankinfo" method="post" enctype="multipart/form-data">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Upload Payment Information</h3>
                </header>

         
                <div class="panel-body">
                  <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />


                 <input type="hidden" name="wallet_type" value="Bitcoin" id="Bitcoin">
                    <input type="hidden" name="amount111" value="<?php echo $usd['USD']['last'];?>" id="ammm112">
                    <div class="form-group"><!-- Enter Amount Deposited -->
                    
                             <!--  <div class="input-group">
                                Amount
                              <input type="text" name="amount111" required="" value="" class="" id="ammm" style="width: 90px;" autocomplete="off"> 
                             *100$ + 1$ fee = <input type="text" name="usdamount" required="" value="" class="" id="ammm1" style="width: 90px;" readonly>
                              </div> -->

                         <div class="input-group">
                              Amount
                              <input type="text" name="amount111" required="" value="" class="" id="ammm" style="width: 90px;" autocomplete="off"> 
                             *100$ = <input type="text" name="usdamount" required="" value="" class="" id="ammm1" style="width: 90px;" readonly>
                          </div>        

                    </div>

                    <input type="hidden" name="usdamount_last" required="" value="" class="" id="ammm2" style="width: 90px;" readonly>
                   <div class="form-group"><!-- Enter Amount Deposited -->
                    
                      <div class="input-group">
                        You need to send
                        <input type="text" name="amount" value="" id="ammm11" readonly> <b>  BTC </b>
                      </div>
                    </div>
                   <div class="form-group" id="transactionid"><!-- Enter Transaction / Reference / UTR Number -->
                      <label for="exampleInputAddress">Paste Bitcoin Transaction ID / TXID</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="trannumber"  value="" class="form-control" id="exampleInputAddress" required="">
                      </div>
                    </div>
           
                     <div class="form-group" id="depositaddress" style="display: none;">
                      <label for="exampleInputAddress">Deposit Account Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="depositaddress"  value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                    
                   <!-- <div class="form-group" id="banknumber">
                      <label for="exampleInputAddress">From which Bank</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="bank_name"  value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>-->

                   

                      <div class="form-group"><!-- Upload the payment proof -->
                      <label for="exampleInputAddress">Upload proof of payment</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="file" name="uploadedfile">
                      </div>
                    </div>


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

            
            
            </div>
            </div>





    <div class="col-md-6"  id="tether" style="display: none;">
            <div class="box-effect">
                        <form name="bankinfo" method="post" enctype="multipart/form-data">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Upload Payment Information</h3>
                </header>

         
                <div class="panel-body">
                <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />


                 <input type="hidden" name="wallet_type" value="Tether" id="Tether">
                    <input type="hidden" name="amount111" value="<?php

                     echo $usd['USD']['last'];?>" id="ammm112">
                    <div class="form-group"><!-- Enter Amount Deposited -->
                    
                              <div class="input-group">
                                Amount
                            <input type="text" name="amount111" required="" value="" class="" id="ammmthere" style="width: 90px;" autocomplete="off"> 
                             *100$ + 1$ fee = <input type="text" name="usdamount" required="" value="" class="" id="ammm1total" style="width: 90px;" readonly>
                               </div>
                            </div>
                    <input type="hidden" name="usdamount_last" required="" value="" class="" id="ammmtotal2" style="width: 90px;" readonly>
                   <div class="form-group"><!-- Enter Amount Deposited -->
                    
                      <div class="input-group">
                        You need to send
                        <input type="text" name="amount" value="" id="ammm1tether1" readonly> <b>  TETHER </b>
                      </div>
                    </div>
              <div class="form-group" id="transactionid"><!-- Enter Transaction / Reference / UTR Number -->
                      <label for="exampleInputAddress">Paste TETHER Transaction ID / TXID</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="trannumber"  value="" class="form-control" id="exampleInputAddress" required="">
                      </div>
                    </div>
           
                     <div class="form-group" id="depositaddress" style="display: none;">
                      <label for="exampleInputAddress">Deposit Account Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="depositaddress"  value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                    
                   <!-- <div class="form-group" id="banknumber">
                      <label for="exampleInputAddress">From which Bank</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="bank_name"  value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>-->

                   

                      <div class="form-group"><!-- Upload the payment proof -->
                      <label for="exampleInputAddress">Upload proof of payment</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="file" name="uploadedfile">
                      </div>
                    </div>


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

            
            
            </div>
            </div>
   
             <!-- / col-md-6 -->
             <div class="col-md-6" id="taaaahhh">
                        <div class="qr-code">
                       <!--  <img src="images/bitcoin-qr-code.jpg" alt=""> -->
                       <!--  <img src="images/bitcoin-qr-code111.png" alt="">   -->
                         <!--<img src="images/IMG_2791.JPG" alt="" style="width: 211px;">-->
                         <img src="images/bitcoin-qr-code111.png" alt="">
                         <img src="images/IMG_2826.PNG" alt="" style="width: 225px;">
                        <p>Bitcoin QR code</p>
                        </div>

                        <br>
                        <p>BTC ADDRESS(1Lgk5jrUsKrdgTB9mQSSjv9rXX6Ti6PVRq)</p> 
                       <!--  <p id="addresss"></p> -->
                        <!-- <div class="qr-code"><img src="images/ether-qr-code.png" alt="">
                         <p>Ether QR code</p>
                        </div>
                        <div class="qr-code"><img src="images/bitcoin-cash-qrcode.png" alt="">
                        <p>Bitcoin Cash QR code</p>
                        </div> -->
             </div>
   <div class="col-md-6" id="thhh" style="display: none;">
                        <div class="qr-code">
                       <!--  <img src="images/bitcoin-qr-code.jpg" alt=""> -->
                       <!--  <img src="images/bitcoin-qr-code111.png" alt="">   -->
                         <!--<img src="images/IMG_2791.JPG" alt="" style="width: 211px;">-->
                         <img src="te.jpg" alt="" style="width: 225px;">
                        <p>Tether QR code</p>
                        </div>

                        <br>
                        <p>TETHER ADDRESS(0xb6D55EE7ABcB6136863af43645Ba7955F76f3085)</p> 
                       <!--  <p id="addresss"></p> -->
                        <!-- <div class="qr-code"><img src="images/ether-qr-code.png" alt="">
                         <p>Ether QR code</p>
                        </div>
                        <div class="qr-code"><img src="images/bitcoin-cash-qrcode.png" alt="">
                        <p>Bitcoin Cash QR code</p>
                        </div> -->
             </div>

          

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




  </body>
</html>