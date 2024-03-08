<?php include("header.php");?>
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
    <link href='css/material-design-iconic-font.min.css' rel='stylesheet' type='text/css'/>

     <link href='css/_misc2.css' rel='stylesheet' type='text/css'/>
      <link href="css/mixins.css" rel="stylesheet" />
    
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    
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
  <section id="example2">
    <div class="row">
      <div class="col-md-8">
        <strong style="color: black;">REFERRAL LINK</strong>
        <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
      </div>
         
      <div class="col-md-4">

      </div>
    </div>
  </section> 
 <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-8 center-block" style="float:none;">

           <form name="bankinfo" method="post">
			   
					<div class="panel panel-primary">
						
						<h4 class="m-t-none text-center text-primary-lt font-thin-bold font-semi-bold">REFERRAL LINK FOR RIGHT POSITION</h4>
					  
						<div class="panel-body">
						
						<div class="text-center">
							<!--<a href="http://182.76.237.227/~syscheck/farex/userpanel/register.php?referral=farex&pos=left" style="color: blue;">farex.com?pos=Left</a>-->
							<a href="http://182.76.237.227/~syscheck/farex/userpanel/register.php?referral=<?php echo $f['username'];?>&pos=right" rel="gallery" target="_blank" <?php $i=1;?> id="myInput<?= $i?>">
						  http://182.76.237.227/~syscheck/farex/userpanel/register.php?referral=<?php echo $f['username'];?>&pos=right
						   </a><button style="float: right;background-color: #99a8bb;"  onclick="myFunction(<?= $i;?>)">Copy</button> <br/>
						   <br/>
						   <br/>

							<a href="http://www.facebook.com/sharer.php?u=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>" target="_blank"><img src="images/sfacebook.png" width="155" /></a> &nbsp;
 <a href="https://api.whatsapp.com/send?text=http://182.76.237.227/~syscheck/farex/<?php echo $f['username'];?>" data-action="share/whatsapp/share"><img src="images/whatsapp.png" width="90" /></a> &nbsp;
							<a href="http://twitter.com/share?url=http://182.76.237.227/~syscheck/farex/<?php echo $f['username'];?>" target="_blank"><img src="images/stwitter.png" width="155" /></a> &nbsp;
					  
						  
							<a href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>" target="_blank"><img src="images/sg.png" width="155" /></a>
							<br/>

						</div>
						
					  </div>
					  
					</div>
                 
              
           </form>

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
    function myFunction(jag) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#myInput'+jag).text()).select();
    document.execCommand("copy");
    $temp.remove();
  }
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