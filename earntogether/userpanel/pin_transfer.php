<?php include("header.php");


?><?php
//code for subscription
if(isset($_POST['submitPin'])){
  $transfer_date=date("Y-m-d");
  $reciever = $_POST['userid'];
  $pins = $_GET['pins'];

 $check = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT id FROM pins where pin_no='$pins' and receiver_id='".$f['user_id']."'"));
if ($check<=0 || $check=='') {
 header("location:pin_transfer.php?pins=$pins&msg=Invalid Code!"); 
   exit;
}

  $results = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id,username FROM user_registration WHERE (user_id='$reciever' || username='$reciever') order by id"));
  //return total count
 if ($results>0) {
$results11 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id,username FROM user_registration WHERE (user_id='$reciever' || username='$reciever') order by id"));
$reciever=$results11['user_id'];
  mysqli_query($GLOBALS["___mysqli_ston"], "update pins set receiver_id='".$reciever."',sender_id='".$f['user_id']."' where pin_no='$pins'");

  $checpin = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pins where (pin_no='$pins' and status='0' and receiver_id='$userid')"));

  
   mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `pin_transfer_status` (`id`, `sender_id`,`reciever_id`, `pin_no`, `transfer_date`) VALUES (NULL, '".$f['user_id']."', '".$reciever."', '".$pins."','".$transfer_date."')");
   
   header("location:algorithmic_fund_history.php?msg=Algorithmic Code Transfered successsfully!"); 
   exit;

 }else{
   header("location:pin_transfer.php?pins=$pins&msg=User Not Found!"); 
   exit;
 }
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

    <style type="text/css">
    .rdbtn{
      background:#ff880e;
      color:#fff;
      transition:all .3s;
      padding: 10px;
      font-size: 20px;
    }
    .rdbtn:hover{
      background:#5f3d9e;
      color:#fff;
    }
    .panel-primary > .panel-heading {
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    color: #333;
    background-color: #d0a713;
    border-color: #b3900f;
    padding: 15px;
}
.rdbtn {
    background: #ff880e;
    color: #fff;
    transition: all .3s;
    padding: 10px;
    font-size: 20px;
}
.rdbtn:visited{
  color: #fff;
}
.package-upgradei{
  font-size: 16px;
}
.mar-bot-20{
  margin-bottom: 20px;
}
.package-upgradei label{
  margin-bottom: 10px;
}

.dashboard {
  font-size: 17px;
  margin-bottom: 0;
  margin-top: 2px;
  color: #1f1f1f;
  font-weight: bold;
}
#example2 {
  border: 1px solid color:gray;
  padding-top: 22px;
  background-color: white;
  box-shadow: 4px 4px 2px 0px #c7c3c3;
}
#btn{
  border-radius: 2px;
  font-size: 14px;
  padding: 4px 5px;
  outline: none !important;
  font-family: 'Nunito Sans', sans-serif;
  }
  #packages {
  background-color: white;
  box-shadow: 1px 2px 5px 5px #c7c3c3;
  padding: 20px;
}                       
</style>



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
        <!-- end of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <!-- <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                  <strong>Add Funds To Pool</strong>
                </div>
              <?php if($f['user_rank_name']=='Free Member'){ ?>
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" id="btn" data-target="#myModal">Subscribe</button>
                </div>    
              <?php } ?>
            </div>
          </div> -->

                        <!--code for box-->
                               
                                      <!--code for box close-->





                                <!--pop modal code end-->
        </section> <!-- / PAGE TITLE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function() {
        $("#userid").blur(function (e) {
         
        $(this).val($(this).val().replace(/\s/g, ''));
        var userid = $(this).val();
        if(userid.length < 1){$("#check").html('');return;}
        if(userid.length >= 1){
            
        //$("#checksponser").html('Loading...');
        $.post('check-user-pin-transfer.php', {'userid':userid}, function(data) {

        $("#check").html(data);
        });
        }
        }); 
        });
    </script
    
    


        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%; text-align: center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>



       
          <div class="row" style="margin-top: 20px;">

            <div class="clearfix"></div>

            <div class="col-md-8 center-block" style="float:none;">



              <?php //if($f['user_rank_name']=='Paid Member'){ ?>




<!--  For Shariya Inves -->


              <!--package upgrade code-->


               <!--  <form method="post" method="post" action="lifejacket_buy_code.php" onsubmit="return check_form()"> -->

              <form method="post" action="">

                <div class="row">
                  <div class="col-sm-12 mar-bot-20">
                    <center><strong style="color: black;">ENTER USERID FOR ALGORITHMIC CODE TRANSFER</strong></center>
                  </div>

                  <div class="col-sm-6 mar-bot-20">
                    <div class="form-group">
                      <label><b>Enter USERID/USERNAME</b></label>
                     
                  <input type="text" name="userid" id="userid"  class="form-control" placeholder="Enter userid" required="" />  
                <span id="check"></span>
                  
                    <p class="pull-left"><b></b></p>
                  
                    </div>
                  </div>
                  <div class="col-sm-6 mar-bot-20">

                </div>
    

                <input type="submit" class="btn btn-primary btn-block" value="Submit" name="submitPin" />

              </form>

              

              </div>




            <?php //}else{?>




        <?php    //} ?>
           <!--package upgrade code-->


          </div>
 <!--<div class="col-md-6">    <div class="widget price-table">    <div class="plan-info">
 <img src="Bitcoin-ATM.jpeg" style="height: 465px;
    width: 500px;">
    </div> 
  </div> 
    </div>  -->
    
      </div> 
 

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row --><?php //} ?>

        </div> <!-- / container-fluid -->



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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  
 
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