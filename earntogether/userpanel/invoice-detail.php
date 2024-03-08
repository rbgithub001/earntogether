<?php include("header.php");
$checkid=$_GET['id'];
$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where id='$checkid'"));

$usderfd=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$lfj['user_id']."'"));
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
    
      <!-- start of LOGO CONTAINER -->
      
      <!-- end of LOGO CONTAINER -->

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

                <div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                               <!--      <img src="../images/logo.png" alt="" width="200px;" /> -->
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <h1>Invoice</h1>
                            </div>
                            <div class="col-xs-4">
                                <div class="total-purchase">
                                    Total Purchase
                                </div>
                                <div class="amount" style="font-size:35px;">
USD <?php echo number_format($lfj['amount'],2);?>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4">

                                <address>
                                    <strong>OFFICE ADDRESS</strong>
                                    <br>

Betvest Investment<br/>
info@betvestinvestment.com
                                   <!--  6 HARPER ROAD,  06-08 -->
                                   
                                    <!-- LEONG HUAT BUILDING, SG 369674 -->
                                   
                                    <!-- P: +65 (90) FROZEN -->
                                </address>
                            </div>
                            <div class="col-xs-4">
                                <strong>
                                    TO
                                </strong>
                                <br/><?php echo $usderfd['first_name']." ".$usderfd['last_name'];?>
                                <br/><?php echo $usderfd['email'];?>
                              
                                <br/>Tel: <?php echo $f['telephone'];?>
                            </div>
                            <div class="col-xs-4 inv-info">
                                <strong>INVOICE INFO</strong>
                                <br/> <span> Invoice Number</span>	<?php echo $lfj['transaction_no'];?>
                                <br/><span> Invoice Date</span>	<?php echo $lfj['date'];?>
                                <!-- <br/> <span> Expiry Date</span>	<?php echo $lfj['expire_date'];?> -->
                                <br/> <span> Invoice Status</span>	Paid
                            </div>
                        </div>
                        <br/>
                      

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                               
                                <th class="hidden-xs">DESCRIPTION</th>
                                <th class="">UNIT COST</th>
                               
                                <th>TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                               
                                <td class="hidden-xs"><?php echo $lfj['remark'];?></td>
                                <td class=""><?php echo number_format($lfj['amount'],2);?></td>
                                 
                                <td><?php echo number_format($lfj['amount'],2);?></td>
                            </tr>
                           
                            </tbody>
                        </table>
                        <br/>
                        <br/>

                        <div class="row">
                            <div class="col-xs-8">
                                <h4>PAYMENT METHOD</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <?php if($lfj['pay_type']=='Withdrawal Wallet')
                                        {
                                        echo 'Main Wallet';
                                        }
                                        else
                                        {
                                            echo $lfj['pay_type'];
                                        }

                                        ?>
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="col-xs-4">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td><?php echo number_format($lfj['amount'],2);?> USD</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong><?php echo number_format($lfj['amount'],2);?> USD</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                    <!-- <a href="#" class="btn btn-success">Submit Payment</a>-->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            
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