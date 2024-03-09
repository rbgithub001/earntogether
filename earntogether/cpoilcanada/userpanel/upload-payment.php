<?php include("header.php");

 if(isset($_POST['submit']))
 {

   $bank=$_POST['bank'];
   $amount=$_POST['amount'];
   
   if($_POST['trannumber1']!='')
   {
        $trannumber=$_POST['trannumber1'];
  
   }
   else
   {
               $trannumber=$_POST['trannumber'];

   }
   
   $trannumber=$_POST['trannumber'];
   $bank_name=$_POST['bank_name'];
   $payment_mode=$_POST['payment_mode'];
   $amount_used=$_POST['amount_used'];
   
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
  
    header("location:upload-payment.php?msg=Sorry, file not  allowed.");
       exit();
}
   
   move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"paymentproof/" .$filename12);

   }
/*   echo "INSERT INTO `paymentproof` (`id`, `user`, `bank`, `amount`, `tranno`, `paymentproof`, `posteddate`, `status`,`bank_name`,`payment_mode`,`amount_used`,`apply_for`) VALUES (NULL, '".$f['user_id']."', '$bank', '$amount', '$trannumber', '$filename12', '".date('Y-m-d')."', 'Pending', '$bank_name', '$payment_mode', '$amount_used','Activation Wallet')";
   exit;*/
 

   mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `paymentproof` (`id`, `user`, `bank`, `amount`, `tranno`, `paymentproof`, `posteddate`, `status`,`bank_name`,`payment_mode`,`amount_used`,`apply_for`) VALUES (NULL, '".$f['user_id']."', '$bank', '$amount', '$trannumber', '$filename12', '".date('Y-m-d')."', 'Pending', '$bank_name', '$payment_mode', '$amount_used','Activation Wallet')");
   
   header("location:upload-payment.php?msg=Payment request submited successsfully!"); 
   exit;
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
            <h1>Payment Information</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
         
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row text-center">
       
            <div class="col-md-6" >
            <div class="box-effect">
                        <form name="bankinfo" method="post" enctype="multipart/form-data">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Upload Payment Information</h3>
                </header>

            <!--    <header class="panel-heading">
                 <br/> <h3 class="panel-title"> Account Name : Way2height marketing private limited<br/>
A/c no. 50200036443223<br/>
IFSC CODE .HDFC0000808<br/>
HDFC BANK  <br/></h3><br/>
<h3 class="panel-title"> Account Name : Way2height marketing private limited<br/>
A/c no. 06911132000979<br/>
IFSC CODE .ORBC0100691<br/>
OBC BANK  <br/></h3>
                <br/></header>-->
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />

            <div class="form-group">
                      <label for="exampleInputAddress">Select bank in which you deposit the payment</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <select name="bank" required class="form-control" id="dependenddropdown">
                           <!--  <option value="">Select deposit method</option> -->
                        <option value="BTC ADDRESS(32BvUiXhzrC5bmR8DfnWazfS4eTjC9FJvV)">BTC ADDRESS(32BvUiXhzrC5bmR8DfnWazfS4eTjC9FJvV)</option>
                        <!-- BTC ADDRESS(18vN8tcfldFPVAk7g8iMokKFZs71:2nCX7ES) -->
                       <!--  18vN8tcfldFPVAk7g8iMokKFZs71:2nCX7ES -->
                       <!--  <option value="ETHER ADDRESS(0x66Ee583aAB6A1E5515a227498434419D760e0801)">ETHER ADDRESS(0x66Ee583aAB6A1E5515a227498434419D760e0801)</option>
                       <option value="BCH ADDRESS(qrj7h2y24rxxxqv2swu734r6jv8t99wh0yvdmtxweg)">BCH ADDRESS(qrj7h2y24rxxxqv2swu734r6jv8t99wh0yvdmtxweg)</option> -->
<!--                       <option value="BCH ADDRESS(qrj7h2y24rxxxqv2swu734r6jv8t99wh0yvdmtxweg)">BCH ADDRESS(qrj7h2y24rxxxqv2swu734r6jv8t99wh0yvdmtxweg)</option>
-->
                        </select>
                      </div>
                    </div>
            
<!--
                    <div class="form-group">
                      <label for="exampleInputAddress">Payment Mode</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <select name="payment_mode" required class="form-control" id="cashdeposit">
                        <option value="Check Deposit">Check Deposit</option>
                        <option value="NEFT">NEFT</option>
                        <option value="IMPS">IMPS</option>
                        <option value="RTGS">RTGS</option>
                        <option value="Cash Deposit" >Cash Deposit</option>

                        </select>
                      </div>
                    </div>-->

          
                   <!--    <input type="hidden" name="amount_used" value="For Leaders wallet" > -->
                     
                       <div class="form-group"><!-- Enter Amount Deposited -->
                      <label for="exampleInputAddress">Enter Bitcoin amount sent</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="amount" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
              <div class="form-group" id="transactionid"><!-- Enter Transaction / Reference / UTR Number -->
                      <label for="exampleInputAddress">Paste Bitcoin Transaction ID / TXID</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="trannumber"  value="" class="form-control" id="exampleInputAddress">
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
             <div class="col-md-6">
                        <div class="qr-code" s>
                       <!--  <img src="images/bitcoin-qr-code.jpg" alt=""> -->
                        <img src="images/bitcoin-qr-code111.png" alt="">
                        <p>Bitcoin QR code</p>
                        </div>

                        <br>
                          <p>BTC ADDRESS(32BvUiXhzrC5bmR8DfnWazfS4eTjC9FJvV)</p>
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