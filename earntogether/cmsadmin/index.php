<?php
include("../lib/config.php");
//print_r($_SESSION['user_id']);die();
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

 $user = mysqli_query($GLOBALS["___mysqli_ston"], "select COUNT(user_registration.id) as total ,country.iso as country_name from user_registration  INNER JOIN country where user_registration.country=country.name GROUP BY country.iso");

 $data_item1 = array();

while($row = mysqli_fetch_array($user)) {
    $data_item[$row['country_name']] = $row['total'];
    array_push($data_item1,$data_item);
}

$gdp_count = json_encode($data_item1[count($data_item1)-1]);

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
    
    <!--<link rel="stylesheet" media="all" href="https://jvectormap.com/css/style.css"/>-->
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/lessframework.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/skin.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-jvectormap-2.0.5.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/syntax.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jsdoc.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-ui.min.css"/>
    <style>
    .dashboard_card_single p {
        color: #fff;
    }
    
    .dashboard_card_single h3 {
        color: #fff !important;
    }
      body{
    background: #231a31;
      }
  </style>
<script type="text/javascript">
  /*var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20607161-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();*/
</script>
    <style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 0 auto;
}
#world-map-gdp{
    height: 400px !important;
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
        <?php $adminwallet=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select amount from admin_e_wallet where user_id='123456'"));?>
            <!--body wrapper start-->
            <div class="wrapper">
                <!--state overview start-->
                <div class="col-md-12 state-overview" style="margin-top: 20px;">
                    <div class="row">
                        
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <section class="panel pane1">
                            <div class="dashboard_card_single icon_1">
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
                            </div>
                            
                            <div class="drafts2">
                                <p><?php echo $query5;?> User Register Today</p>
                            </div>
                        </section>
                    </div>
                    <?php 
                    
                    $totuser12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount) as sales1 from billing_detail"));
                  
                    $totuser11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount) as sales from billing_detail where purchase_date='".date('Y-m-d')."'"));
                 //   $totuser12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_invoice_cv) as sales from amount_detail"));  // by me
                   //$totuser11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_invoice_cv) as sales from amount_detail where purchase_date='".date('Y-m-d')."'")); // by me
                   
                   
                    //$totuser11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as sales from lifejacket_subscription where date='".date('Y-m-d')."'"));?>
                   
<?php

// Code for display total Binary income //
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Level Income'"));
$binary_earning1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Level Income' and date='".date('Y-m-d')."'"));



$binary_earnings=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Binary Income'"));
$binary_earning1s=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Binary Income' and receive_date='".date('Y-m-d')."'"));


$binary_earnings_roi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Roi Income'"));
$binary_earning1s_roi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Roi Income' and receive_date='".date('Y-m-d')."'"));


$binary_earnings_reffral=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Referral Bonus'"));
$binary_earning1s_reffral=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Referral Bonus' and receive_date='".date('Y-m-d')."'"));

$binary_earnings_recruiting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Recruiting Bonus'"));
$binary_earning1s_recruiting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Recruiting Bonus' and receive_date='".date('Y-m-d')."'"));

$binary_earning1s_residual=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Level Income' and status=1 and receive_date='".date('Y-m-d')."'"));



$cofounder_earnings=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Co-founder Income' and status=1"));
$cofounder_earnings1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Co-founder Income' and status=1 and receive_date='".date('Y-m-d')."'"));

$cofounder_earnings1_pending=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Co-founder Income' and status=0"));
$cofounder_earnings1_pending1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where ttype='Co-founder Income' and status=0 and receive_date='".date('Y-m-d')."'"));

$pendingwithdraw=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total5 from withdraw_request where status='0'"));
$pendingwithdraw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total5 from withdraw_request where status='0' and posted_date='".date('Y-m-d')."'"));

$comwithdraw=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total5 from withdraw_request where status='1'"));
$comwithdraw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total5 from withdraw_request where status='1' and posted_date='".date('Y-m-d')."'"));

$inword=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as total5 from lifejacket_subscription"));
$inword1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as total5 from lifejacket_subscription where date='".date('Y-m-d')."'"));



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


                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <section class="panel pane2">
                            <div class="dashboard_card_single icon_2">
                                <div class="value gray">
                                    <h3 class="timer" data-from="0" data-to="<?php if($totuser12['sales1']=='' || $totuser12['sales1']==0) { echo "0"; } else { echo $totuser12['sales1'];} ?>"
                                        data-speed="3000">
                                        <!--320-->
                                    </h3>
                                    <p>Total Sales</p>
                                    <p>Amount</p>
                                </div>
                                <div class="symbol">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="drafts2">
                                <p><?php if($totuser11['sales']=='' || $totuser11['sales']==0) { echo "0"; } else { echo number_format($totuser11['sales']);} ?> generated today</p>
                            </div>
                        </section>
                    </div>
<!-- <div class="col-lg-2 col-sm-6">
                        <section class="panel orange">
                            
                            <div class="value gray">
                                <h3 ><?php if($total_fund['total5']=='' || $total_fund['total5']==0) { echo "0"; } else { echo number_format($total_fund['total5']);} ?>
                                   
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
                    <?php
                    $binary_earnings_pending=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where (ttype='Level Income' || ttype='Self Income'  ) and status=0"));
                    $binary_earnings_pending1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where (ttype='Level Income' || ttype='Self Income'  ) and status=0 and receive_date='".date('Y-m-d')."'"));
                    ?>
                    
                     <div class="col-lg-4 col-md-4 col-sm-6">
                        <section class="panel pane1">
                            <div class="dashboard_card_single icon_4">
                                <div class="value gray">
                                    <h3 class="timer" data-from="0" data-to="<?php if($binary_earnings_pending['total5']=='' || $binary_earnings_pending['total5']==0) { echo "0"; } else { echo number_format($binary_earnings_pending['total5']);} ?>"
                                        data-speed="3000">
                                        <!--320-->
                                    </h3>
                                  
                                    <p>Pending Level Income</p>
                                    <p>Distributed</p>
                                </div>
                                <div class="symbol">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="drafts2">
                                <p><?php if($binary_earnings_pending1['total5']=='' || $binary_earnings_pending1['total5']==0) { echo "0"; } else { echo number_format($binary_earnings_pending1['total5']);} ?> distribute today</p>
                            </div>
                        </section>
                    </div>
                    
                    <?php
                    $dist_level_inc=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as totallevel from credit_debit where (ttype='Level Income' || ttype='Self Income'  ) "));
                    $dist_level_inc_today=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as todaylevel from credit_debit where (ttype='Level Income' || ttype='Self Income'  )and receive_date='".date('Y-m-d')."'"));
                 //  print_r($dist_level_inc_today);
                   
                   
                   
                    ?>
                     <div class="col-lg-4 col-md-4 col-sm-6">
                        <section class="panel pane2">
                            <div class="dashboard_card_single icon_2">
                                <div class="value gray">
                                    <h3 class="timer" data-from="0" data-to="<?php if($dist_level_inc['totallevel']=='' || $dist_level_inc['totallevel']==0) { echo "0"; } else { echo (int)($dist_level_inc['totallevel']);} ?>"
                                        data-speed="3000">
                                        <!--320-->
                                    </h3>
                                     
                                    <p>Level Income</p>
                                    <p>Distributed</p>
                                </div>
                                <div class="symbol">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="drafts2">
                                <p><?php if($dist_level_inc_today['todaylevel']=='' || $dist_level_inc_today['todaylevel']==0) { echo "0"; } else { echo number_format($dist_level_inc_today['todaylevel']);} ?> distribute today</p>
                            </div>
                        </section>
                    </div>
                    
                    <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                            <section class="panel pane1">
                                <div class="dashboard_card_single icon_1">
                                    <div class="value gray">
                                        <h3 class="timer" data-from="0" data-to="<?php if($cofounder_earnings1_pending['total5']=='' || $cofounder_earnings1_pending['total5']==0) { echo "0"; } else { echo number_format($cofounder_earnings1_pending['total5']);} ?>"
                                        data-speed="3000">
                                     
                                    </h3>
                                       
                                    </h3>
                                    <p>Pending Co-founder Income</p>
                                    <p>Distributed</p>
                                        
                                    </div>
                                    
                                    <div class="symbol">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                
                                <div class="drafts2">
                                  <p><?php if($cofounder_earnings1_pending1['total5']=='' || $cofounder_earnings1_pending1['total5']==0) { echo "0"; } else { echo number_format($cofounder_earnings1_pending1['total5']);} ?> distribute today</p>   
                                </div>
                            </section>
                        </div>-->
                    
                    
                     <!--<div class="col-lg-4 col-md-4 col-sm-6">
                            <section class="panel pane1">
                                <div class="dashboard_card_single icon_1">
                                    <div class="value gray">
                                        <h3 class="timer" data-from="0" data-to="<?php if($cofounder_earnings1['total5']=='' || $cofounder_earnings1['total5']==0) { echo "0"; } else { echo number_format($cofounder_earnings1['total5']);} ?>"
                                        data-speed="3000">

                                    </h3>
                                       
                                    </h3>
                                    <p>Co-founder Income</p>
                                    <p>Distributed</p>
                                        
                                    </div>
                                    
                                    <div class="symbol">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                
                                <div class="drafts2">
                                  <p><?php if($binary_earnings_residual['total5']=='' || $binary_earnings_residual['total5']==0) { echo "0"; } else { echo number_format($binary_earnings_residual['total5']);} ?> distribute today</p>   
                                </div>
                            </section>
                        </div>-->
                        
                       
                    
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <section class="panel pane1">
                            <div class="dashboard_card_single icon_1">
                                <div class="value gray">
                                    <h3 class="timer" data-from="0" data-to="<?php if($pendingwithdraw['total5']=='' || $pendingwithdraw['total5']==0) { echo "0"; } else { echo number_format($pendingwithdraw['total5']);} ?>"
                                        data-speed="3000">
                                        <!--320-->
                                    </h3>
                                    <p>Pending </p>
                                    <p>Withdrawal</p>
                                </div>
                                <div class="symbol">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($pendingwithdraw['total5']=='' || $pendingwithdraw['total5']==0) { echo "0"; } else { echo number_format($pendingwithdraw['total5']);} ?> Pending Today</p>
                            </div>
                        </section>
                    </div>
                    
                    <?php
                                  $total=0;
                                  $grandrevenue=0;
                                  $totalcommission=0;
                                  //$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail $query123");
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where status=1 and ttype=('Level Income' || 'Co-founder Income') $query123 GROUP BY product_name");
                                  
                                  while($data1=mysqli_fetch_array($data)){ 
                                      
                                  $amounttable=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where invoice_no='".$data1['product_name']."'"));      
                                      
                                      
                                  $total=$total+$amounttable['net_amount'];
                                  $invoice=$amounttable['product_name'];
                                  
                                  $sellercheck = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='".$amounttable['seller_id']."'"));
                                  $scommission_percent = $sellercheck['commission_percent'];
                                  
                                  $totaladmincom=$amounttable['net_amount']*$scommission_percent/100;
                                  
                                  $totalcommission=$totalcommission+$totaladmincom;
                                  //$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from puc_credit_debit where ttype='Admin Extra Commission'");
                                   
                                 
                                  $crdamt = $data1['credit_amt'];
                                  
                                  $totalrevenue=$totaladmincom-$crdamt;
                                  
                                  $grandrevenue=$grandrevenue+$totalrevenue;
                                  
                        }          
                   
                   /* $totaladmincom=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as creditamt from puc_credit_debit where ttype='Admin Extra Commission'"));
                    $totalsalescom=$totaladmincom['creditamt'];
                    
                    $crddbt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as crdamt from credit_debit where status=1 and ttype=('Level Income' || 'Co-founder Income')"));
                    $crdamt = $crddbt['crdamt'];
                    
                    $totalsalescom=$totalsalescom-$crdamt;*/
                    ?>
                    
                    
                   <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="vendorwise-extra-commission.php">
                            <section class="panel pane1">
                                <div class="dashboard_card_single icon_1">
                                    <div class="value gray">
                                        <h3><?php echo number_format($grandrevenue,2);?></h3>
                                        <p>Company Revenue Till Now</p>
                                        
                                    </div>
                                    
                                    <div class="symbol">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                
                                <div class="drafts2">
                                     <p><?php if($pendingwithdraww['total5']=='' || $pendingwithdraww['total5']==0) { echo "0"; } else { echo number_format($pendingwithdraww['total5']);} ?> </p>
                                </div>
                            </section>
                            </a>
                        </div>-->
                        
                    <?php
                    $first_day_this_month = date('Y-m-01'); 
                    $last_day_this_month  = date('Y-m-t');
                   
                    
                     $total=0;
                                  $grandrevenue1=0;
                                  $totalcommission=0;
                                  //$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail $query123");
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where status=1 and ttype=('Level Income' || 'Co-founder Income') and receive_date BETWEEN '$first_day_this_month' AND '$last_day_this_month' GROUP BY product_name");
                                  
                                  while($data1=mysqli_fetch_array($data)){ 
                                      
                                  $amounttable=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where invoice_no='".$data1['product_name']."'"));      
                                      
                                      
                                  $total=$total+$amounttable['net_amount'];
                                  $invoice=$amounttable['product_name'];
                                  
                                  $sellercheck = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='".$amounttable['seller_id']."'"));
                                  $scommission_percent = $sellercheck['commission_percent'];
                                  
                                  $totaladmincom=$amounttable['net_amount']*$scommission_percent/100;
                                  
                                  $totalcommission=$totalcommission+$totaladmincom;
                                  //$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from puc_credit_debit where ttype='Admin Extra Commission'");
                                   
                                 
                                  $crdamt = $data1['credit_amt'];
                                  
                                  $totalrevenue=$totaladmincom-$crdamt;
                                  
                                  $grandrevenue1=$grandrevenue1+$totalrevenue;
                                  }
                    
                    ?>
                        
                        <!--<div class="col-lg-3 col-md-4 col-sm-6">
                        <section class="panel pane2">
                            <div class="dashboard_card_single icon_2">
                                <div class="value gray">
                                   <h3><?php echo number_format($grandrevenue1,2);?></h3>
                                        <p>This Month Revenue Till Now</p>
                                </div>
                                <div class="symbol">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                            </div>
                            <div class="drafts2">
                              
                            </div>
                        </section>
                    </div>-->
                    
                    <!--<div class="col-lg-3 col-md-4 col-sm-6">
                            <section class="panel pane1">
                                <div class="dashboard_card_single icon_1">
                                    <div class="value gray">
                                        <h3><?php echo number_format($adminwallet['amount'],2);?></h3>
                                        <p>Admin Wallet</p>
                                        
                                    </div>
                                    
                                    <div class="symbol">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                
                                <div class="drafts2">
                                    
                                </div>
                            </section>
                        </div>-->
                <?php
                /*
                <a href="inword.php">
                 <div class="col-lg-3 col-md-4 col-sm-6">
                        <section class="panel">
                            <div class="dashboard_card_single icon_2">
                                <div class="value gray">
                                    <h3> <?php if($inword['total5']=='' || $inword['total5']==0) { echo "0"; } else { echo number_format($inword['total5']);} ?>
                                      
                                        <!--320-->
                                    </h3>
                                    <p>Inward</p>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="symbol">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($inword1['total5']=='' || $inword1['total5']==0) { echo "0"; } else { echo number_format($inword1['total5']);} ?> Inword Today</p>
                            </div>
                        </section>
                    </div>
                  </a>
                <a href="outword.php">
                 <div class="col-lg-3 col-md-4 col-sm-6">
                        <section class="panel">
                            <div class="dashboard_card_single icon_3">
                                <div class="value gray">
                                    <h3> <?php if($comwithdraw['total5']=='' || $comwithdraw['total5']==0) { echo "0"; } else { echo number_format($comwithdraw['total5']);} ?>
                                      
                                        <!--320-->
                                    </h3>
                                    <p>Outward</p>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="symbol">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            
                            <div class="drafts2">
                                <p><?php if($comwithdraw1['total5']=='' || $comwithdraw1['total5']==0) { echo "0"; } else { echo number_format($comwithdraw1['total5']);} ?> Outword Today</p>
                            </div>
                        </section>
                    </div>
                            </a>
                */
                ?>
                </div>
                <!--state overview end-->
                <div class="row">
                    <div class="col-md-6">
                        <figure class="highcharts-figure">
                            <div id="container111"></div>
                                <!--<p class="highcharts-description">
                                    This chart shows how data labels can be added to the data series. This
                                    can increase readability and comprehension for small datasets.
                                </p>-->
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div id="world-map-gdp" style=" height: 300px;margin: auto;"></div>
                    </div>
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


            <?php /*
           <div class="">
                                            <div class="col-md-6 col-sm-6" style="margin-top:20px;">
                                                <div class="panel wrapper">
                                                  <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Commissions &amp; Withdrawals</h4>
                                                  <div class="nav-tabs-alt hidden-xs">
                                                      <ul class="nav nav-tabs nav-justified">
                                                          <li class="active">
                                                              <a data-target="#tab-earnings" href="#" role="tab" data-toggle="tab" aria-expanded="true">Earnings</a>
                                                          </li>

                                                          <li class="">
                                                              <a data-target="#tab-withdrawal-request" href="#" role="tab" data-toggle="tab" aria-expanded="false">Withdrawal Requests</a>
                                                          </li>
                                                      </ul>
                                                  </div>

                                                  <!-- Will visible on Xs -->
                                                  <div class="text-right inline pull-right">
                                                      <div class="dropdown  visible-xs">
                                                          <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                  </a>
                                                          <ul class="dropdown-menu nav flex-column pull-right">
                                                              <li class="earnings-and-expenditures-navitem active">
                                                                  <a data-target="#tab-earnings" href="#" role="tab" data-toggle="tab" aria-expanded="true">Earnings</a>
                                                              </li>
                                                              <li class="earnings-and-expenditures-navitem">
                                                                  <a data-target="#tab-expenditures" href="#" role="tab" data-toggle="tab" aria-expanded="false">Expenses</a>
                                                              </li>
                                                              <li class="earnings-and-expenditures-navitem">
                                                                  <a data-target="#tab-withdrawal-request" href="#" role="tab" data-toggle="tab" aria-expanded="false">Withdrawal Requests</a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                  </div>

                                                  <div class="row-row">
                                                      <div class="cell">
                                                          <div class="cell-inner">
                                                              <div class="tab-content">

                                                                  <!-- TAB EARNINGS -->
                                                                  <div class="tab-pane active" id="tab-earnings">
                                                                      <div class="">
                                                                          <div class="panel no-border">
                                                                              <ul class="list-group list-group-lg m-b-none">
                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                              <button class="btn 
                                                                                          btn-md 
                                                                                          btn-icon 
                                                                                          btn-info">
                                                                                                  <span class="text-bold text-md">BE</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">ROALITY EARNING </span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 6 month(s) 20 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$' ?> <?php if($binary_earnings['total5']=='' || $binary_earnings['total5']==0) { echo '0.00'; } else  { echo number_format($binary_earnings['total5']); } ?>                           </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="binary-income-reports.php" class="btn btn-sm btn-info">View More</a>
                                                                                          </div>
                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                              <button class="btn 
                                                                                          btn-md 
                                                                                          btn-icon 
                                                                                          btn-primary">
                                                                                                  <span class="text-bold text-md">ROI</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">ROI EARNING</span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 6 month(s) 20 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$'; ?> <?php if($binary_earnings_roi['total5']=='' || $binary_earnings_roi['total5']==0) { echo '0.00'; } else  { echo number_format($binary_earnings_roi['total5']); } ?>                             </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="roi-income-reports1.php" class="btn btn-sm btn-info">View More</a>
                                                                                          </div>
                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                              <button class="btn 
                                                                                          btn-md 
                                                                                          btn-icon 
                                                                                          btn-danger">
                                                                                                  <span class="text-bold text-md">DI</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">Matching bonus</span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 7 month(s) 9 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ <?php echo number_format($binary_earning['total5']); ?>                          </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="direct-member-reports.php" class="btn btn-sm btn-info">View More</a>
                                                                                          </div>
                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                              <button class="btn 
                                                                                          btn-md 
                                                                                          btn-icon 
                                                                                          btn-warning">
                                                                                                  <span class="text-bold text-md">TE</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">TOTAL EARNING 
                                                                                                  
                                                                                              </span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 8 month(s) 8 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$'; ?> <?php if($yesterday_earning['total2']=='' || $yesterday_earning['total2']==0) { echo '0.00'; } else  { echo number_format($yesterday_earning['total2']); } ?>                       </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="total-income.php" class="btn btn-sm btn-info">View More</a>
                                                                                          </div>
                                                                                      </div>
                                                                                  </li>

                                                                              </ul>
                                                                          </div>
                                                                      </div>

                                                                      <div class="col-md-12">
                                                                          <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                      </div>

                                                                  </div>
                                                          

                                                                  <!-- TAB WITHDRAWAL REQUESTS -->
                <?php
                 $wallet_requests = mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request order by id limit 4");
      
                ?>                                                  
                                                                  <div class="tab-pane" id="tab-withdrawal-request">
                                                                      <div class="">
                                                                          <div class="panel no-border">
                                                                              <ul class="list-group list-group-lg m-b-none" style="margin-bottom:0">
                                                                                <?php 
                                                while($wallet_requestss=mysqli_fetch_array($wallet_requests))
                                                                  {
                                                                                ?>
                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span class="font-thin-bold text-md text-black text-primary">USD</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <span class="text-md">
                                                                                                <?php echo $wallet_requestss['ts'];?>
                                                                                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">$
                                                                              <?php echo $wallet_requestss['request_amount'];?>                              </span>
                                                                                          </div>

                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <span class="font-thin-bold text-md text-info">
                                                                              <?php if($wallet_requestss['status']==0) { echo 'Pending';}else{ echo 'Approved';}?>                          </span>
                                                                                          </div>

                                                                                      </div>
                                                                                  </li>

                                                                              
                                                                                <?php } ?>
                                            <!--php code-->                                        
                                                                              </ul>
                                                                          </div>
                                                                      </div>

                                                                      <div class="col-md-12">
                                                                          <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                      </div>

                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>   
                                            <div class="col-md-6 col-sm-6" style="margin-top:20px;">
                                              <div class="region region-grid-block-right">
                                                <div id="block-afl-widgets-afl-block-my-organisations" class="block block-afl-widgets clearfix">

                                                    <div class="panel wrapper">
                                                        <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Team Performance</h4>
                                                        <div class="nav-tabs-alt  hidden-xs">
                                                            <ul class="nav nav-tabs nav-justified">
                                                                <li class="active my-organisation-tabitem">
                                                                    <a data-target="#tab-top-earners" href="#" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>
                                                                </li>
                                                                <li class="my-organisation-tabitem">
                                                                    <a data-target="#tab-recentJoinings" href="#" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <!-- Will visible on Xs -->
                                                        <div class="text-right inline pull-right">
                                                            <div class="dropdown  visible-xs">
                                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                                <ul class="dropdown-menu nav flex-column pull-right">
                                                                    <li class="my-organisation-tabitem nav-item active">
                                                                        <a data-target="#tab-top-earners" href="#" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>
                                                                    </li>
                                                                    <li class="my-organisation-tabitem">
                                                                        <a data-target="#tab-recentJoinings" href="#" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row-row">

                                                            <div class="tab-content">

                                                                <!-- TAB EARNINGS -->
                <?php
                $i=0;
                $image = array('<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/formal-fashion-for-him.png" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/career.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/adult_close_up_eyeglasses_eyewear_face_facial_expression_fashion_fashion_model-1000789.jpg%21d.jpeg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/jason-emery-fltc-066-4-800x440.jpg" width="104" height="104" alt="">');
                 $top_earner = mysqli_query($GLOBALS["___mysqli_ston"], "select * from roi_e_wallet order by amount desc limit 4");
      
                ?>  
                                                                <div class="tab-pane active" id="tab-top-earners">
                                                                    <div class="">
                                                                        <ul class="list-group list-group-xs m-b-none">
                                                                      <?php 
                                                                                while($top_earner_data=mysqli_fetch_array($top_earner))
                                                                  {  

                            $working_earner=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select first_name,last_name from user_registration where user_id ='".$top_earner_data["user_id"]."'"));

//$top_earner_name = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration");

                                                                                ?>  
                                                                            <li class="list-group-item b m-b-sm">
                                                                                <div class="thumb pull-left m-r">

                                                                                  <?php echo $image[$i];?>
                                                                                    <!-- <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/formal-fashion-for-him.png" width="104" height="104" alt=""> --> </div>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs">
                                                                                        <span class="text-black">
                                                                            <?php 
                                                                           echo ucfirst($working_earner['first_name'] ." ". $working_earner['last_name'] ); 
                                                                            ?>                              </span>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <span class="text-muted">$<?php 
                                                                                        echo number_format($top_earner_data['amount']);
                                                                                        ?></span> </div>

                                                                                </div>
                                                                            </li>
                                                                          <?php $i++;} ?>
                                                                    
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                    </div>

                                                                </div>

                                                                

                                                                <!-- TAB RECENT JOININGS -->
               <?php
                $i=0;
                $join_image = array('<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/all/themes/eps_diamond/img/avatar.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/istockphoto-915981818-170667a.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/20190617_men_mobile.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/jason-emery-fltc-066-4-800x440.jpg" width="104" height="104" alt="">');
                 $new_join = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration order by id desc limit 4");
      
                ?>  
                                                                <div class="tab-pane" id="tab-recentJoinings">
                                                                    <div class="">
                                                                        <ul class="list-group list-group-xs m-b-none">
                                                                       <?php while($new_joining=mysqli_fetch_array($new_join)){?>   
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                    <div class="thumb pull-left m-r">
                                                                                      <?php echo $join_image[$i];?>
                                                                                     </div>
                                                                                    <div class="clear ">
                                                                                        <div class="m-b-xs">
                                                                                            <span class="text-black">
                                                                             <?php 
                                                                           echo ucfirst($new_joining['first_name'] ." ". $new_joining['last_name'] ); 
                                                                            ?>                                </span>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <span class="text-muted"><?php 
                                                                           echo $new_joining['registration_date']; 
                                                                            ?>  </span> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                    <div class="pull-right">
                                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Platinum</span> -->
                                                                                        <div class="thumb m-r pull-right"><!-- <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-37.png" alt="Package - 37" title="Package - 37"> --> </div>
                                                                                    </div>
                                                                                </div>

                                                                            </li>
                                                                          <?php $i++;} ?>
                                                
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        if (jQuery('.my-organisation-tabitem').length) {
                                                            jQuery('.my-organisation-tabitem').click(function() {
                                                                jQuery('.my-organisation-tabitem').removeClass('active');
                                                            });
                                                        }
                                                    </script>

                                                </div>
                                                <!-- /.block -->
                                            </div></div></div></div></div>
            */ ?>
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


 <script src="https://jvectormap.com/js/css3-mediaqueries.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="https://jvectormap.com/js/tabs.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-world-mill.js"></script>
  <script src="https://jvectormap.com/js/gdp-data.js"></script>

 <script>
 
/*               var gdpData = {
                      "AF": 16.63,
                      "AL": 11.58,
                      "DZ": 158.97,
                      "IN":  200,
                      
                     
                    
                      
                    };*/
                    var gdpData = <?php echo $gdp_count; ?>;
 
                
 
              $(function(){
                $('#world-map-gdp').vectorMap({
                  map: 'world_mill',
                  series: {
                    regions: [{
                      values: gdpData,
                      scale: ['#C8EEFF', '#0071A4'],
                      normalizeFunction: 'polynomial'
                      
                    }]
                  },
                  onRegionTipShow: function(e, el, code){
                    el.html(el.html()+' (Total Member - '+gdpData[code]+')');
                  }
                });
              });
    </script>

</body>
</html>