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
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body class="sticky-header">

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
                <div class="col-md-6 state-overview">
                    <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <section class="panel orange">
                            <div class="value gray">
                                <h3 class="timer" data-from="0" data-to="<?php echo $totuser;?>"
                                    data-speed="1000">
                                    <!--320-->
                                </h3>
                                <p>Total Registered</p>
                                <p>User</p>
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-pencil"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php echo $query5;?> User Register Today</p>
                            </div>
                        </section>
                    </div>
                    <?php $totuser12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as sales1 from lifejacket_subscription"));?>
                    <?php $totuser11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as sales from lifejacket_subscription where date='".date('Y-m-d')."'"));?>
                   
<?php

// Code for display total Binary income //
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Referral Bonus'"));
$binary_earning1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Referral Bonus' and date='".date('Y-m-d')."'"));



$binary_earnings=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Level Income'"));
$binary_earning1s=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Level Income' and receive_date='".date('Y-m-d')."'"));


$binary_earnings_roi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Roi Income'"));
$binary_earning1s_roi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Roi Income' and receive_date='".date('Y-m-d')."'"));



$pendingwithdraw=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total5 from withdraw_request where status='0'"));
$pendingwithdraw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total5 from withdraw_request where status='0' and posted_date='".date('Y-m-d')."'"));

$total_fund=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as total5 from working_e_wallet "));



$reward_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Reward Bonus'"));
$reward_income1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Reward Bonus' and receive_date='".date('Y-m-d')."'"));

$award_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Award Bonus'"));
$award_income1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Award Bonus' and receive_date='".date('Y-m-d')."'"));



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


                    <div class="col-lg-4 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3 class="timer" data-from="0" data-to="<?php if($totuser12['sales1']=='' || $totuser12['sales1']==0) { echo "0"; } else { echo $totuser12['sales1'];} ?>"
                                    data-speed="3000">
                                    <!--320-->
                                </h3>
                                <p>Total Investment</p>
                                <p>Amount</p>
                            </div>
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($totuser11['sales']=='' || $totuser11['sales']==0) { echo "0"; } else { echo number_format($totuser11['sales'],2);} ?> generated today</p>
                            </div>
                        </section>
                    </div>
<!-- <div class="col-lg-2 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3 ><?php if($total_fund['total5']=='' || $total_fund['total5']==0) { echo "0"; } else { echo number_format($total_fund['total5'],2);} ?>
                                   
                                </h3>
                                <p>Combined</p>
                                <p>Trading Fund</p>
                            </div>
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            
                            <div class="drafts2">
                               
                            </div>
                        </section>
                    </div>-->

                    <div class="col-lg-4 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3> <?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo "0"; } else { echo number_format($binary_earning['total5'],2);} ?>
                                    <!--320-->
                                </h3>
                                <p>Referral Income</p>
                                <p>Distributed</p>
                            </div>
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($binary_earning1['total5']=='' || $binary_earning1['total5']==0) { echo "0"; } else { echo number_format($binary_earning1['total5'],2);} ?> distribute today</p>
                            </div>
                        </section>
                    </div>

</div>
<div class="row">
                      <div class="col-lg-4 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3> <?php if($binary_earnings['total5']=='' || $binary_earnings['total5']==0) { echo "0"; } else { echo number_format($binary_earnings['total5'],2);} ?>
                                    <!--320-->
                                </h3>
                                <p>Binary Income</p>
                                <p>Distributed</p>
                            </div>
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($binary_earning1s['total5']=='' || $binary_earning1s['total5']==0) { echo "0"; } else { echo number_format($binary_earning1s['total5'],2);} ?> distribute today</p>
                            </div>
                        </section>
                    </div>


  <div class="col-lg-4 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3 ><?php if($binary_earnings_roi['total5']=='' || $binary_earnings_roi['total5']==0) { echo "0"; } else { echo number_format($binary_earnings_roi['total5'],2);} ?>
                                   
                                </h3>
                                <p>ROI Income</p>
                                <p>Distributed</p>
                            </div>
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($binary_earning1s_roi['total5']=='' || $binary_earning1s_roi['total5']==0) { echo "0"; } else { echo number_format($binary_earning1s_roi['total5'],2);} ?> distribute today</p>
                            </div>
                        </section>
                    </div> 


<div class="col-lg-4 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3> <?php if($pendingwithdraw['total5']=='' || $pendingwithdraw['total5']==0) { echo "0"; } else { echo number_format($pendingwithdraw['total5'],2);} ?>
                                  
                                    <!--320-->
                                </h3>
                                <p>Pending </p>
                                <p>Withdrawal</p>
                            </div>
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($pendingwithdraw['total5']=='' || $pendingwithdraw['total5']==0) { echo "0"; } else { echo number_format($pendingwithdraw['total5'],2);} ?> Pending Today</p>
                            </div>
                        </section>
                    </div>


  </div>

                   
                  
                </div>
                <!--state overview end-->
                <div class="col-md-6">
                                      <figure class="highcharts-figure">
                                <div id="container111"></div>
                                <!--<p class="highcharts-description">
                                    This chart shows how data labels can be added to the data series. This
                                    can increase readability and comprehension for small datasets.
                                </p>-->
</figure>
</div>

               

                <!--<div class="row">
                    <div class="col-md-8">
                        <section class="panel">
                            <header class="panel-heading">
                                Earning Graph
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body">

                                <div class="earning-chart-space" id="dashboard-earning-chart"></div>

                                <div class="row earning-chart-info">
                                    <div class="col-sm-3 col-xs-6">
                                        <h4>$ 12,37</h4>
                                        <small class="text-muted"> Daily Sales Report</small>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <h4>$ 86,69</h4>
                                        <small class="text-muted">Weekly Sales Report</small>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <h4>$ 25,9770</h4>
                                        <small class="text-muted">Monthly Sales Report</small>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <h4>$ 948,160,50</h4>
                                        <small class="text-muted">Yearly Sales Report</small>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>-->
                

                   
<!--
                        <section class="panel">
                            <div class="panel-body">
                                <!--monthly page view start-->
                                <!--<ul class="monthly-page-view">
                                    <li class="pull-left page-view-label">
                                        <span class="page-view-value timer" data-from="0" data-to="93205"
                                              data-speed="4000">
                                            <!--93,805-->
                                        <!--</span>
                                        <span>Monthly Page views</span>
                                    </li>
                                    <li class="pull-right">
                                        <div id="page-view-graph" class="chart"></div>
                                    </li>
                                </ul>
                                <!--monthly page view end-->
                            <!--</div>
                        </section>
                    </div>
                </div>-->

                <!--<div class="row">
                    <div class="col-md-8">
                        <section class="panel" id="block-panel">
                            <header class="panel-heading head-border">
                                mobile visit
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body">
                                <ul class="mobile-visit">
                                    <li class="page-view-label">
                                        <span class="page-view-value"> 5,8105</span>
                                        <span>Unique visitors</span>
                                    </li>
                                    <li>
                                        <div class="easy-pie-chart">
                                            <div class="iphone-visitor" data-percent="45"><span>45</span>%</div>
                                        </div>
                                        <div class="visit-title">
                                            <i class="fa fa-apple green-color"></i>
                                            <span>iPhone</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="easy-pie-chart">
                                            <div class="android-visitor" data-percent="80"><span>80</span>%</div>
                                        </div>
                                        <div class="visit-title">
                                            <i class="fa fa-android purple-color"></i>
                                            <span>Android</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4">
                       <section class="panel">
                            <div class="panel-body">
                                <!--monthly page view start-->
                                <!--<ul class="monthly-page-view">
                                    <li class="pull-left page-view-label">
                                        <span class="page-view-value timer" data-from="0" data-to="93205"
                                              data-speed="4000">
                                            <!--93,805-->
                                        <!--</span>
                                        <span>Monthly Page views</span>
                                    </li>
                                    <li class="pull-right">
                                        <div id="page-view-graph" class="chart"></div>
                                    </li>

                                </ul>
                                <!--monthly page view end-->
                           <!-- </div>
                        </section>
                         <section class="panel">
                            <div class="panel-body">
                                <!--monthly page view start-->
                               <!-- <ul class="monthly-page-view">
                                    <li class="pull-left page-view-label">
                                        <span class="page-view-value timer" data-from="0" data-to="93205"
                                              data-speed="4000">
                                            <!--93,805-->
                                        <!--</span>
                                        <span>Monthly Page views</span>
                                    </li>
                                    <li class="pull-right">
                                        <div id="page-view-graph" class="chart"></div>
                                    </li>
                                    
                                </ul>
                                <!--monthly page view end-->
                            <!--</div>
                        </section>
                    </div>
                </div>-->

               

            </div>



            <div class="wrapper">
             <div class="row">

                    <!-- <div class="col-sm-12 text-right">

                        <a href="export_joining_reports.php" class="btn btn-success">Export in excel</a>

                    </div> -->

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        
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


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>

<script>
Highcharts.chart('container111', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Total Member'
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