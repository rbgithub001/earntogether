<?php include("header.php");?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include("title.php");?>
            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Fonts -->
            <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
           <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

            <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
            <link href="css/style.css" rel="stylesheet" type="text/css">

            <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css' />
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

            <!-- SugarRush CSS -->
            <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <style type="text/css">
                .officiala .panel-heading{
                    background: #666eaf;
                    background: -moz-linear-gradient(-45deg, #666eaf 0%, #618fc0 100%);
                    background: -webkit-linear-gradient(-45deg, #666eaf 0%,#618fc0 100%);
                    background: linear-gradient(135deg, #666eaf 0%,#618fc0 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#666eaf', endColorstr='#618fc0',GradientType=1 );
                }
                .officiala .panel-heading h4{
                    color: #fff;
                }
                .Random{
                    padding:10px;
                    padding-left: 20px;
                }
                .Random li{
                    list-style: decimal;
                    padding-bottom: 10px;
                }
            </style>
    

    </head>

    <body class="">
        
<?php //include("header.php");?>
        <?php $dfg=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from popup order by id desc limit 0,1")); if($dfg['status']==0) { ?>
            <div class='popup'>
                <div class='cnt223'>
                    <img src='exit.png' alt='quit' class='x' id='x' />
                    <div style="height:300px; overflow-y:scroll; width:100%; padding:10px;">
                        <p>

                            <?php
      $args_product = mysqli_query($GLOBALS["___mysqli_ston"], "select * from promo");
      while($args_product1=mysqli_fetch_array($args_product))
      {
          echo "<h3>".$args_product1['news_name']."</h3>";print_r("<br/>");
        echo $args_product1['description'];print_r("<br/>");print_r("<br/>");

      }
       ?>
                    </div>
                    </p>
                </div>
            </div>
            <br/>
            <?php } ?>
                <div class="animsition">
                    <?php include("sidebar.php");?>

                        <main id="playground">

                            <!-- - - - - - - - - - - - - -->
                            <!-- start of TOP NAVIGATION -->
                            <!-- - - - - - - - - - - - - -->
                            <?php include("top.php");?>

                                <!-- - - - - - - - - - - - - -->
                                <!-- end of TOP NAVIGATION   -->
                                <!-- - - - - - - - - - - - - -->

                                <section id="configuration">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title-wrap bar-success">
                                                        <h4 class="card-title">Self Investment History</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block card-dashboard">
                                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                                                        <label>Show
                                                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm">
                                                                                <option value="10">10</option>
                                                                                <option value="25">25</option>
                                                                                <option value="50">50</option>
                                                                                <option value="100">100</option>
                                                                            </select> entries</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                        <label>Search:
                                                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-striped table-bordered zero-configuration no-footer">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 9px;">#</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Transaction No.: activate to sort column ascending" style="width: 119px;">Transaction No.</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 75px;">Username</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Investment ID: activate to sort column ascending" style="width: 152px;">Investment ID</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 145px;">Date</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Package Type: activate to sort column ascending" style="width: 142px;">Package Type</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Package Amount: activate to sort column ascending" style="width: 128px;">Package Amount</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Invoice: activate to sort column ascending" style="width: 56px;">Invoice</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <tr role="row" class="odd">
                                                                                <td class="sorting_1">1</td>
                                                                                <td>6351373747</td>
                                                                                <td>bsandeepgupta@hotmail.com</td>
                                                                                <td>LJ68514776351373747 </td>
                                                                                <td>2018-11-07 07:14:53</td>
                                                                                <td>Economy Package 2</td>
                                                                                <td>200</td>
                                                                                <td><a href="#"><i class="ft-download"></i></a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-5">
                                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

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

<?php if($dfg['status']==0) { ?>

  <style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
.cnt223 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
}
.cnt223{
width: 60%;
margin: 0px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 10px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;
margin-top:75px;
}
.cnt223 p{
clear: both;
color: #555555;
text-align: justify;
}
.cnt223 p a{
color: #d91900;
font-weight: bold;
}
.cnt223 .x{
float: left;
height: 35px;
left: -22px;
position: relative;
top: -25px;
width: 34px;
}
.cnt223 .x:hover{
cursor: pointer;
}
</style>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>

<?php } ?>
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