<?php 
ob_start();
include("header.php");
if($_POST['amounts']=='' || $_POST['user']=='')
{
   echo "<script language='javascript'> alert('Enter Details!'); window.location.href='external-fund-tranfer.php'; </script>";
}

if(is_numeric($_POST['amounts']))
{
}
else
{
   echo "<script language='javascript'> alert('Enter Numbers only!'); window.location.href='external-fund-tranfer.php'; </script>";
}


$roesd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));

if( $roesd==0 )
      {
        
          echo "<script language='javascript'> alert('Sorry no such member found!'); window.location.href='external-fund-tranfer.php'; </script>";
        }
        else 
        {
            $fuser=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));  

            $fuserid=$fuser['user_id'];
        }




 if( $fuserid == $f['user_id'] )
      {
        
          echo "<script language='javascript'> alert('You Cannot transfer to your own account!'); window.location.href='external-fund-tranfer.php'; </script>";
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

<? 
   include('../lib/random.php');
   $salt=$_SESSION['nonce'];
?>
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>External Fund Transfer</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Fund Transfer</a></li>
              <li><a href="#">External transfer</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post" action="external-fund-transfer-code.php" onsubmit="return hash();"; id="bankinfo"  autocomplete='off'>
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">e-Wallet fund transfer confirmation</h3>
                </header>
               
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
           
           <div class="form-group">
                      <label for="exampleInputAddress">Send Amount From </label>
                      <div class="input-group">
                        <!-- <span class="input-group-addon"></span> -->
                        
  <input type="radio" name="walletfrom" required class="form-control" value="working_e_wallet" <?php if($_POST['walletfrom']=='working_e_wallet'){ echo checked;}?> >Working Wallet
  <input type="radio" name="walletfrom" required class="form-control" value="roi_e_wallet" <?php if($_POST['walletfrom']=='roi_e_wallet'){ echo checked;}?>>ROI Wallet
  <input type="radio" name="walletfrom" required class="form-control" value="final_e_wallet" <?php if($_POST['walletfrom']=='final_e_wallet'){ echo checked;}?>>Main Wallet



                      </div>
                    </div>



           <div class="form-group">
                      <label for="exampleInputAddress">Confirm Userid / Username</label>
                      <div class="input-group">
                      
                        <?php echo $_POST['user'];?>
                        <input type="hidden" name="user" required value="<?php echo $fuserid;?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Confirm amount to transfer</label>
                      <div class="input-group">
                       
                        <?php echo $_POST['amounts'];?>
                        <input type="hidden" name="amounts" required value="<?php echo $_POST['amounts'];?>" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                  <input type="hidden" name="randm" value = "<?php echo htmlentities($salt);?>" />        
                      
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
<script type="text/javascript" src="js/sha256.js"></script> 
<script>
function hash(){
	 
 var randm=document.bankinfo.randm.value;	
 var t_password=document.bankinfo.t_password.value;
 
 	 var t_password= sha256(t_password);							
     var t_password = t_password+randm;							 						 
 	 document.bankinfo.t_password.value = sha256(t_password);	 
 	
}
</script>
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