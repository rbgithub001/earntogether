<?php 
ob_start();
include("header.php");

$data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid'"));
$data1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));

if($_POST['amounts']=='' || $_POST['user']=='')
{
   echo "<script language='javascript'> alert('Enter Details!'); window.location.href='external-fund-tranfer1.php'; </script>";
}

if($_POST['amounts']>$data['amount']){
  echo "<script language='javascript'> alert('Transfer Amount Is Greater Than Chip Amounts!'); window.location.href='external-fund-tranfer1.php'; </script>";
}

if(is_numeric($_POST['amounts']))
{
}
else
{
   echo "<script language='javascript'> alert('Enter Numbers only!'); window.location.href='external-fund-tranfer1.php'; </script>";
}


$roesd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));

if( $roesd==0 )
      {
        
          echo "<script language='javascript'> alert('Sorry no such member found!'); window.location.href='external-fund-tranfer1.php'; </script>";
        }
        else 
        {
            $fuser=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_POST['user']."' || username='".$_POST['user']."'"));  

            $fuserid=$fuser['user_id'];
        }




 if( $fuserid == $f['user_id'] )
      {
        
          echo "<script language='javascript'> alert('You Cannot transfer to your own account!'); window.location.href='external-fund-tranfer1.php'; </script>";
        }


 if( $data1['kyc_status'] == 0)
      {
          echo "<script language='javascript'> alert('Please Verify Your KYC Status!'); window.location.href='external-fund-tranfer.php'; </script>";
        }





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

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

<? 
   include('../lib/random.php');
   $salt=$_SESSION['nonce'];
?>
        <!-- PAGE TITLE -->
        <section id="example2">
          <div class="row">
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
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6 center-block" style="float:none;">

           <form name="bankinfo" method="post" action="external-fund-transfer-code1.php"  id="bankinfo"  autocomplete='off'>
              <section class="panel panel-primary">

                <h4 class="m-t-none text-primary-lt m-b font-thin-bold inline font-semi-bold">Chips transfer confirmation</h4>
               
                <div class="panel-body">
                  <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="working_e_wallet" checked="checked" />
           
                <div class="form-group">
                  <div class="row" style="margin:0 -10px;">
                    <div class="col-sm-7">
                      <label for="exampleInputAddress">Confirm Userid / Username</label>
                    </div>
                    <div class="col-sm-5">
                      <?php echo $_POST['user'];?>
                      <input type="hidden" name="user" required value="<?php echo $fuserid;?>" class="form-control" id="exampleInputAddress">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row" style="margin:0 -10px;">
                    <div class="col-sm-7">
                      <label for="exampleInputAddress">Confirm Chips to transfer</label>
                    </div>
                    <div class="col-sm-5"> 
                        <?php echo $_POST['amounts'];?>
                        <input type="hidden" name="amounts" required value="<?php echo $_POST['amounts'];?>" class="form-control" id="exampleInputAddress">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">Enter Login Password</label>
                  <input type="password" name="password" required value="" class="form-control" id="exampleInputAddress">
                </div>
                  <input type="hidden" name="randm" value ="<?php echo htmlentities($salt);?>" />        
                      
                 <div class="form-group">
                    <input type="submit" name="update" value="Transfer" class="btn btn-primary">
                 </div>
                </div>

              </section>

</form>
<script type="text/javascript" src="js/sha256.js"></script> 
<script>
function hash(){
	 
 var randm=document.bankinfo.randm.value;	
 var password=document.bankinfo.password.value;
 
 var password= sha256(password);							
var password = password+randm;							 						 
 	 document.bankinfo.password.value = sha256(password);	 
 	
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