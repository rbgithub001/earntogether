<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");
include("rank-update.php");
?>


<?php 
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];



function commission_of_level($user_id,$amount,$invoice_no,$plan_nameing)
{
    $date=date('Y-m-d');
    $star_month=date('Y-m-')."01";
      $end_month=date('Y-m-')."31";
    $user=$user_id;
      $select_upl=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$user_id' and level<7");
      while($select_upl1=mysqli_fetch_array($select_upl))
      {
         $upid=$select_upl1['income_id'];
         Rank_update($upid);

         $refc=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$upid'"));
         $upaln=$refc['user_rank_name'];
         $level=$select_upl1['level'];


          $levelss1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as toks1 from purchase_detail where user_id='$upid' and (purchase_date between '$star_month' and '$end_month')"));
          $totalsum1=$levelss1['toks1'];
          if($totalsum1=='')
          {
            $totalsum1=0;
          }
          else
          {
            $totalsum1=$totalsum1;
          }

         


         if($level==1)
         {
                $spc=10;
         }
         else if($level==2)
         {
                $spc=3;
         }
         else if($level==3)
         {
                $spc=3;
         }
         else if($level==4)
         {
                  $spc=3;
         }
         else if($level==5)
         {
                 $spc=3;
         }
         else if($level==6)
         {
                 $spc=3;
         }
        
         else
         {
          $spc=0;
         }

            $withdrawal_commission=$amount*$spc/100;
            $rwallet=$withdrawal_commission;
            $invoice_no=$upid.rand(10000,99999);
            if($upaln=='Ruby')
            {
              $stop=6;
            }
            else if($upaln=='Diamond')
            {
              $stop=6;
            }
            else if($upaln=='Emerald')
            {
              $stop=6;
            }
            else if($upaln=='Sapphire')
            {
              $stop=5;
            }
            else if($upaln=='Platinum')
            {
              $stop=5;
            }
            else if($upaln=='Gold')
            {
              $stop=5;
            }
            else if($upaln=='Silver')
            {
              $stop=4;
            }
            else if($upaln=='Premier')
            {
              $stop=4;
            }
            else if($upaln=='Elite')
            {
              $stop=4;
            }
            else if($upaln=='Senior')
            {
              $stop=3;
            }
            else if($upaln=='Lead')
            {
              $stop=3;
            }
            else if($upaln=='Associate')
            {
              $stop=2;
            }
            
            else
            {
              $stop=2;
            }

        
            if($withdrawal_commission!='' && $withdrawal_commission!=0 && $level<=$stop)
            {
              if($totalsum1>=65)
              {
            mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$upid."'");
            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$upid','$rwallet','0','0','$upid','$user','$date','Level Income','Earn Level Income','Level Income','Level Income','$invoice_no','Level Income','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");
             }
             else
             {

               $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$upid','$rwallet','0','0','$upid','$user','$date','Level Income','Earn Level Income','Level Income','Level Income','$invoice_no','Level Income','1','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");
         

             }    
            }
                      
      }




} //function close here 





                 /*generate invoice number*/
                    function _generateInvoiceNo(){
                            global $mxDb;
                            $rand = date(Ymdhis);
                             
                                return $rand;
                            }

                      /*make payment*/

                  if(isset($_POST['wallet_pay']))
                  {
                    global $mxDb;
                    $date=date("Y-m-d");
                    $payment_type=$_POST['pay_method'];print_r("<br/>");
                    $username = $_POST['pay_username'];print_r("<br/>");
                    $t_password = $_POST['pay_password'];print_r("<br/>");
                    $total_amount = $_SESSION['ag'];print_r("<br/>");

                     
                     if($payment_type=='final_e_wallet_pay')
                     {
                      $ewallet_table='final_e_wallet'; 
                      $ewallet_table1='Ewallet';
                     }

                    $condition1 = " where (username='".$username."' || user_id='".$username."')";
                    $args_sponsor1 = $mxDb->get_information('user_registration', 'user_id', $condition1, true, 'assoc');

                    $paid_id1=$args_sponsor1['user_id']; 

                               if($paid_id1){

                                  if( ($username != '' && $t_password != '') && ($payment_type!='')){

                                    $condition = " where user_id='".$paid_id1."' and t_code='".$t_password."'";
                                    $args_sponsor = $mxDb->get_information('user_registration', 'user_id', $condition, true, 'assoc');
                                    $paid_id=$args_sponsor['user_id'];
                                    
                                    if( isset($args_sponsor['user_id']) ){
                                      
                                    $wallet_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewallet_table where user_id='$paid_id'"));
                                     $cut_wallet=$wallet_amount['amount'];  /*total amount of sponsor*/
                                    /*echo "$cut_wallet<br>"; */
                                    
                                     $match_wallet1=$total_amount;
                                    /*echo "$match_wallet1";*/
                                    
                                          if($cut_wallet >=$match_wallet1){         
                                                    
                                            $invoice_no = _generateInvoiceNo();
                                             $amt=$cut_wallet-$match_wallet1;
                                                      
                                      /*inserting products in purchase detail table*/

                                      foreach ($_SESSION["cart_products"] as $cart_itm){
                                             // set variables to use in content below
                                              $product_name = $cart_itm["product_name"];
                                              $product_qty = $cart_itm["product_qty"];
                                              $product_price = $cart_itm["product_price"];
                                              $product_id = $cart_itm["product_id"];
                                              $product_color = $cart_itm["product_color"];
                                              $product_points = $cart_itm["product_points"];
                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                  $total_points = ($product_points * $product_qty); //calculate Price x Qty

                                  $fsc = $cart_itm["fcs"];
                                  
                                  $pamt=$product_price*$fsc/100;
                                  $pamt1=$pamt*$product_qty;
                                  $pamt2=$pamt2+$pamt1;
                                  $totalsmts=$totalsmts+$pamt2;

                                  $total_points1=$total_points1+$total_points;

                                  
                                            $total = ($total + $subtotal); //add subtotal to total var

                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                 


                                            $insert_array = array('invoice_no'=>$invoice_no,'product_name'=>$product_name,'user_id'=>$_SESSION['userpanel_user_id'],'p_id'=>$product_id,'quantity'=>$product_qty,'net_price'=>$subtotal,'price'=>$product_price,'pay_mode'=>$ewallet_table1, 'pay_type'=>$ewallet_table1,'purchase_date'=>$date,'pv'=>$total_points);
                                              
                                              $mxDb->insert_record('purchase_detail', $insert_array);
                                             
                                                 //if($mxDb->insert_record('purchase_detail', $insert_array))

                                              }
                                            $insert_array1= array('invoice_no'=>$invoice_no,'user_id'=>$_SESSION['userpanel_user_id'],'net_amount'=>$total_amount,'payment_mode'=>$ewallet_table1, 'total_amount'=>$total_amount, 'payment_date'=>$date, 'purchase_date'=>$date, 'date'=>$date); 
                                            $mxDb->insert_record('amount_detail', $insert_array1);
						
                                            $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update $ewallet_table set amount=(amount-$total_amount) where user_id='".$f['user_id']."'");
											 
 mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`)
   values('$invoice_no','".$_SESSION['userpanel_user_id']."','0','".$total_amount."','0','123456','".$_SESSION['userpanel_user_id']."','$date','Shop Product Purchase','Shop Product Purchase','Shop Product Purchase','Shop Product Purchase','$invoice_no','Shop Product Purchase','0','E Wallet','$urls')");

commission_of_level($_SESSION['userpanel_user_id'],$total_points1,$invoice_no,$invoice_no);


  


                                           header('location:shopping-invoice-detail.php?inv='.$invoice_no);
                       
                                          }
                                          else{
                                            header('location:ewallet-payment-shop.php?msg=Insufficient Credits!!!');
                                          }
                                      }
                                      else{
                                         header('location:ewallet-payment-shop.php?msg=Username/ ID or Transaction password doesnot correct!!!');
                                      }
                                  }
                              }
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
            <h1>Pay By Wallet</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Eshop</a></li>
              <li><a href="#">Wallet Amount</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="final_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Pay Your Amount By Wallet</strong></h3>
                </header>
                
                <div class="panel-body">
                  <input name="payaction" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet_pay">
              <div class="form-group">
                      <label for="exampleInputAddress"> <strong>Available Wallet Amount: <?php echo $_SESSION['currency']; ?> <?php $reds=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$_SESSION['userpanel_user_id']."'")); echo $_SESSION['rates']*$reds['amount']; ?></strong></label>
                      
                    </div>
                <div class="form-group">
                      <label for="exampleInputAddress"><strong> Your Total Invoice Amount: <?php echo $_SESSION['currency']; ?> <?php echo $_SESSION['rates']*$_SESSION['ag'];?></strong></label>
                      
                    </div>
                      <div class="form-group">
                        <label for="exampleInputAddress">Enter Username/ User ID</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               <input type="text" name="pay_username" required value="" class="form-control" id="exampleInputAddress">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Enter Transaction Password</label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               <input type="password" name="pay_password" required value="" class="form-control" id="exampleInputAddress">
                        </div>
                    </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="wallet_pay" value="PAY" class="btn btn-success">             
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

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