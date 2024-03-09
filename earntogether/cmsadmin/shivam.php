<?php
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 


$left_jan   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-01-01')."' AND registration_date<='".date('Y-01-31')."' "));
$left_feb   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-02-01')."' AND registration_date<='".date('Y-02-31')."' "));
$left_march = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-03-01')."' AND registration_date<='".date('Y-03-31')."' "));
$left_April = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-04-01')."' AND registration_date<='".date('Y-04-31')."' "));
$left_may   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-05-01')."' AND registration_date<='".date('Y-05-31')."' "));
$left_june  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-06-01')."' AND registration_date<='".date('Y-06-31')."' "));
$left_july  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-07-01')."' AND registration_date<='".date('Y-07-31')."' "));
$left_aug   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-08-01')."' AND registration_date<='".date('Y-08-31')."'  "));
$left_sep   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-09-01')."' AND registration_date<='".date('Y-09-31')."'  "));
$left_oct   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-10-01')."' AND registration_date<='".date('Y-10-31')."'  "));
$left_nov   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-11-01')."' AND registration_date<='".date('Y-11-31')."'  "));
$left_dec   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where  registration_date>='".date('Y-12-01')."' AND registration_date<='".date('Y-12-31')."'  "));
$month__left_result = array($left_jan,$left_feb,$left_march,$left_April,$left_may,$left_june,$left_july,$left_aug,$left_sep,$left_oct,$left_nov,$left_dec);
$final_array = array('left' => $month__left_result);
$left_final = $final_array['left'];

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include("header.php");?>
    <!--easy pie chart-->
    <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="css/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="css/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body class="sticky-header">
<style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
    </style>
    <section>
        <!-- sidebar left start-->
       <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
           <?php include("top-menu.php");?>
            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
               <?php include("top-menu1.php");?>
            <!-- page head end-->
        <?php $totuser=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration"));?>
            <!--body wrapper start-->
            <div class="wrapper">
                <!--state overview start-->
                <div class="row state-overview">
                   

     <div class="container-fluid">
                     <div class="row">
                                          <figure class="highcharts-figure">
                                <div id="container111"></div>
                                <!--<p class="highcharts-description">
                                    This chart shows how data labels can be added to the data series. This
                                    can increase readability and comprehension for small datasets.
                                </p>-->
</figure>
            </div>  
                     </div>
                  
                </div>
            </div>



           
            <!--body wrapper end-->


            <!--footer section start-->
          <?php include("footer.php");?>
            <!--footer section end-->


       
        </div>
        <!-- body content end-->
    </section>
    







<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->


<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery.min.js"></script>
<script src="js/switchery-init.js"></script>

<!--flot chart -->
<script src="js/jquery.flot.js"></script>
<script src="js/flot-spline.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.tooltip.min.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.selection.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>


<!--common scripts for all pages-->

<script src="js/scripts.js"></script>

<script>
Highcharts.chart('container111', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Left Right Monthly Downline'
    },
    subtitle: {
        /*text: 'Source: WorldClimate.com'*/
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Registration'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Total',
        data: <?php echo json_encode($left_final); ?>
    }]
});

          
      
</script>

<script>
$(document).ready(function(){
    $('.highcharts-credits').remove();
});
</script>

</body>
</html>