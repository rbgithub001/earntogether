<?php include("header.php");

 $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 $min_amount=1;
if(isset($_POST['update'])){
  
  if( !empty($_POST['amounts']) && !empty($_POST['user']))
  {
    if( $_POST['amounts'] >= $min_amount )
    {
      if( $_POST['t_password'] == $f['t_code'] )
      {
        // transfer request
        $wallet=$_POST['wallet'];
        
          $wallets='final_e_wallet';
          $msg='Withdrawal Wallet';
        

       


        $admin_amount=0;
        $total_charge=0;
        $sql = "select amount from $wallets where user_id ='".$_POST['user']."'";
        $rsts = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        $args_wallet = mysqli_fetch_assoc($rsts);
        
        
        $total_charge = $_POST['amounts'];
        
        if( $args_wallet['amount'] >= $total_charge)
        {
          // get receiver user_id
          $rands=rand(0000000001,9999999999);
          $ttype="Fund Transfer To Master ID";
          $walleting="Withdrawal Wallet";
          $sql_receiver = "select user_id, first_name, last_name from user_registration where (user_id = '".$userid."' or username = '".$userid."')";
          
          $rst_receiver = mysqli_query($GLOBALS["___mysqli_ston"], $sql_receiver);
          //$rst_receivers = mysql_fetch_array($rst_receiver);
          if( mysqli_num_rows($rst_receiver) > 0 ){
            
            $args_receiver = mysqli_fetch_assoc($rst_receiver);
            
            $admin_charge=0.00;
            // get final E-wallet amount
            $sql="select amount from $wallets where user_id='".$args_receiver['user_id']."'";
            $args_wallet_receiver = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $sql));
            
            $final_amount = $args_wallet_receiver['amount']+$_POST['amounts'];
            
            //transfer fund to receiver
            $sql_cr_Dr = "insert into credit_debit set user_id='".$args_receiver['user_id']."',"; 
            $sql_cr_Dr .= "credit_amt='".$_POST['amounts']."', admin_charge='".$admin_amount."', ";
            $sql_cr_Dr .= "receiver_id='".$args_receiver['user_id']."', sender_id='".$_POST['user']."', ";
            $sql_cr_Dr .= "receive_date='".date("Y-m-d")."', ";
            $sql_cr_Dr .= "TranDescription='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_cr_Dr .= "Remark='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_cr_Dr .= "Cause='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_cr_Dr .= "transaction_no='".$rands."',";
            $sql_cr_Dr .= "invoice_no='".$rands."',";
            $sql_cr_Dr .= "ttype='".$ttype."',";
            $sql_cr_Dr .= "product_name='".$ttype."',";
            $sql_cr_Dr .= "ewallet_used_by='".$msg."',";
            $sql_cr_Dr .= "current_url='".$urls."',";
            $sql_cr_Dr .= "debit_amt=0,";
            $sql_cr_Dr .= "status=0";
            
            mysqli_query($GLOBALS["___mysqli_ston"], $sql_cr_Dr) or die($sql_cr_Dr.mysqli_error($GLOBALS["___mysqli_ston"]));
            //echo "<br>";
            //update wallet amount
            $update_wallet = "update $wallets set amount='".$final_amount."' where user_id='".$args_receiver['user_id']."'";
            mysqli_query($GLOBALS["___mysqli_ston"], $update_wallet)or die(mysqli_error($GLOBALS["___mysqli_ston"]));
            
            //echo "<br>";
            
            //deduct amount from sender e-wallet
            $sql_transfer = "insert into credit_debit set user_id='".$_POST['user']."',";
            $sql_transfer .= "debit_amt='".($_POST['amounts']+$admin_amount)."', admin_charge='".$admin_amount."', ";
            $sql_transfer .= "receiver_id='".$args_receiver['user_id']."', sender_id='".$_POST['user']."', ";
            $sql_transfer .= "receive_date='".date("Y-m-d")."', ";
            $sql_transfer .= "TranDescription='Transfer fund $".$_POST['amounts']." to ".$args_receiver['first_name']." ".$args_receiver['last_name']." with ".$admin_charge."% admin charge',";
            $sql_transfer .= "Remark='Transfer fund ".$_POST['amounts']." SGD to ".$args_receiver['first_name']." ".$args_receiver['last_name']." with ".$admin_charge."% admin charge',";
            $sql_transfer .= "Cause='Transfer fund by ".$name." to ".$args_receiver['first_name']." ".$args_receiver['last_name']."',";
            $sql_transfer .= "transaction_no='".$rands."',";
            $sql_transfer .= "invoice_no='".$rands."',";
            $sql_transfer .= "ttype='".$ttype."',";
            $sql_transfer .= "product_name='".$ttype."',";
            $sql_transfer .= "ewallet_used_by='".$msg."',";
            $sql_transfer .= "current_url='".$urls."',";
            $sql_transfer .= "credit_amt=0,";
            $sql_transfer .= "status=0";
            
            mysqli_query($GLOBALS["___mysqli_ston"], $sql_transfer)or die($sql_transfer.mysqli_error($GLOBALS["___mysqli_ston"]));
            
            //echo "<br>";
            //update wallet amount
            $update_wallet = "update $wallets set amount='".($args_wallet['amount']-$total_charge)."' where user_id='".$_POST['user']."'";
            mysqli_query($GLOBALS["___mysqli_ston"], $update_wallet)or die(mysqli_error($GLOBALS["___mysqli_ston"]));;
            
            //exit;
            echo "<script language='javascript'> alert('Fund Transfer Successfully!'); window.location.href='master-transfer.php'; </script>";
          }
          else{
            echo "<script language='javascript'> alert('Please Enter Correct User ID'); window.location.href='master-transfer.php'; </script>";
          }
          
        }else{
          echo "<script language='javascript'> alert('Insufficient Funds in e-Wallet');window.location.href='master-transfer.php';  </script>";
        }
        
      }
      else{
        echo "<script language='javascript'> alert('Please Enter Correct Transaction Password'); window.location.href='master-transfer.php'; </script>";
      }
      
    }
    else{
      echo "<script language='javascript'> alert('Please Enter Min ".$min_amount." SGD Transfer to e-Wallet');window.location.href='master-transfer.php';  </script>";
    }
    
  }
  else{
    echo "<script language='javascript'> alert('Please Fill in Required Fields'); window.location.href='master-transfer.php'; </script>";
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
            <!--<h1>Master Account Transfer</h1>-->
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Fund Transfer</a></li>-->
              <!--<li><a href="#">Ewallet transfer</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">Master Account e-Wallet Transfer</h3>
                </header>
               
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Select Sub Account ID</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <select name="user" required class="form-control" id="exampleInputAddress">
                         <option value="">Select Sub Account</option>
                           <?php  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where master_account='$userid'");
                      while($data1=mysqli_fetch_array($data))
                      { ?>
                         <option value="<?php echo $data1['user_id'];?>"> <?php echo $data1['user_id'];?> (Balance: <?php $hg=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$data1['user_id']."'")); echo $hg['amount']; ?>&nbsp; SGD) (<?php echo $data1['first_name'];?>)</option>

                         <?php } ?>
                        </select>
                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Enter Amount to Transfer</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="amounts" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                         <div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="update" value="Transfer" class="btn btn-primary">             </div>
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