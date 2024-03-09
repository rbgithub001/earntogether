<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
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

    <style>
    table th{
      font-weight:bold;
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
  <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Cart Plot</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Home</a></li>
              <li><a href="#">Your Cart</a></li>
            </ol>

          </div>
        </section> 
 <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-12">
<header class="panel-heading">
                  <h4 class="panel-title">Total Cart Plot</h4>
                </header>

           
                      <section class="panel">

                               <!-- Cart View Detail-->
                        <div class="table-responsive">
                            <form method="post" action="cart_update.php">
                            <table class="table table-hover table-striped px" style="border:1px solid #ccc;">
                            <thead>
                            <tr><th width="10%">Quantity</th>
                            <th width="20%">Name</th>
                            <th width="20%">Image</th>
                            <th width="20%">Price</th>
                             <th width="20%">Points</th>
                            <th width="20%">Total</th>
                           
                            <th width="10%">Remove</th>
                            
                            </tr></thead>
                              <tbody>
                              <?php
                              $all_points=0;
                              if(isset($_SESSION["cart_products"])) //check session var
                                {
                                $total = 0; //set initial total value
                                $b = 0; //var for zebra stripe table 
                                foreach ($_SESSION["cart_products"] as $cart_itm)
                                    {
                                  //set variables to use in content below
                                  $product_name = $cart_itm["product_name"];
                                  $product_qty = $cart_itm["product_qty"];
                                  $product_points = $cart_itm["product_points"];
                                  $product_image = $cart_itm["image"];
                                  $product_price = $cart_itm["product_price"];
                                  $product_id = $cart_itm["product_id"];
                                 
                                  $product_color = $cart_itm["product_color"];
                                  $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                  $total_points=($product_points*$product_qty);
                                  
                                  $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
                                  echo '<tr class="'.$bg_color.'">';
                                  echo '<td><input type="text" style="text-align:center;width: 30px;" maxlength="2" name="product_qty['.$product_id.']" value="'.$product_qty.'" /></td>';
                                  echo '<td>'.$product_name.'</td>';
                                  echo '<td><img height="53px" width="60px" src="../cmsadmin/product_images/'.$product_image.'"></td>';
                                  echo '<td>'.$currency.$_SESSION['rates']*$product_price.'</td>';
                                  echo '<td>'.$total_points.'</td>';
                                  echo '<td>'.$currency.$_SESSION['rates']*$subtotal.'</td>';
                                  
                                  echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_id.'" /></td>';
                                  
                                        echo '</tr>';
                                  $total = ($total + $subtotal); //add subtotal to total var
                                  $all_points=($all_points+$total_points);
                                    }
                                
                                $grand_total = $total + $shipping_cost; //grand total including shipping cost
                                foreach($taxes as $key => $value){ //list and calculate all taxes in array
                                    $tax_amount     = round($total * ($value / 100));
                                    $tax_item[$key] = $tax_amount;
                                    $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
                                    
                                }
                                $_SESSION['ag']=$grand_total;
                                
                               /* $list_tax       = '';
                                foreach($tax_item as $key => $value){ //List all taxes
                                  $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
                                }
                                $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
                              */}
                                ?>
                                <tr>
                                  <td colspan="4"></td>
                                  
                                  <td colspan="5"><span style="float:right;text-align: right;font-weight: bold"><?php echo $shipping_cost. $list_tax; ?>Total Amount : <?php echo $currency; echo sprintf("%01.2f", $_SESSION['rates']*$grand_total); ?></span></td></tr>
                                <tr><td colspan="2"></td>
                                
                                <td colspan="5" class="text-right">&nbsp;<a href="eshop.php" class="btn btn-primary">Add More Items</a> &nbsp;<button type="submit" class="btn btn-primary">Update Your Cart</button> &nbsp; <a class="btn btn-primary" href="shopping-payment.php"> Buy Now</a></td></tr>
                              </tbody>
                            </table>
                            <input type="hidden" name="return_url" value="<?php 
                            $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                            echo $current_url; ?>" />
                            </form>
                          </div>
                        <!-- Cart View Detail ends-->


              </section>

             

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

        </div>
      
          
            


   <?php include("footer.php");?>

    </main> <!-- /playground -->


    <?php include("rightside-panel.php");?>
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