<?php include("header.php");?>
    <!DOCTYPE html>
    <html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("title.php");?>
            <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <script src="js/jquery-1.11.2.min.js"></script>
    <style>
        .dashboard a i {
            color: #a9ff00;
            font-size: 18px;
            margin-left: 10px;
        }
        .progress {
             height: 35px;
          background-color: #ddd;
        }
        .progressContainer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .progressContainer .singleDetails {
            width: 48%;
            text-align: left;
        }
        .singleDetails .progress-bar{
            align-items: center;
            display: flex;
            justify-content: start;
            text-indent: 10px;
        }
        .pregressCount span{
            font-weight: 600;
            color: #4c8400;
        }
        .card-stats .card-title {
            color: #ffffff!important;
        }
        .progress-bar{
            background-color: #6fbced;
            color: #000;
            font-weight: 800;
            white-space: nowrap;
        }
    </style>
</head>
<body class="">
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
<?php
$total_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$userid'"));
$direct_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' and nom_id!=''"));

$direct_total=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' "));
//$direct_total=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' and genealogy='1'"));

$in_direct_total=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'"));
//$in_direct_total=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' and genealogy='2'"));

$tito_wallet=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select amount from final_e_wallet where user_id='$userid'"));
$tito_wallet_amount=$tito_wallet['amount'];

$current_sub=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$f['user_plan']."'"));
$tottagert = $current_sub['amount']*12;

$monthlytarget = $current_sub['amount'];

$previous_weeks1 = strtotime("-1 week +1 day");
$start_weeks1 = strtotime("last sunday midnight",$previous_weeks1);
$end_weeks1 = strtotime("next saturday",$start_weeks1);
$start_weeks1 = date("Y-m-d",$start_weeks1);
$end_weeks1 = date("Y-m-d",$end_weeks1);
$d = strtotime("today");
$start_week = strtotime("last sunday midnight",$d);
$end_week = strtotime("next saturday",$d);
$start = date("Y-m-d",$start_week); //First Day of Week
$end = date("Y-m-d",$end_week);  // Last day of week
$last_date = date('Y-m-d', strtotime('-1 Day')); // Last day date
$currentMonthStartDate = date('Y-m-01');
$currentMonthEndDate = date('Y-m-t');

//Count current month sale
//echo "select sum(total_invoice_cv) as totsale from amount_detail where user_id='$userid' and purchase_date between '$currentMonthStartDate' and '$currentMonthEndDate'";
$currentMonthSale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_invoice_cv) as totsale from amount_detail where user_id='$userid' and purchase_date between '$currentMonthStartDate' and '$currentMonthEndDate'"));

$totalSale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(total_invoice_cv) as totsale from amount_detail where user_id='$userid' "));


// Code for display total income //

$total_earning11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' and pb>'0' order by id desc limit 0,1"));
// Code for display last day income //

$yesterday_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Referral Bonus' OR ttype='Binary Income' OR ttype='Roi Income' OR ttype='Level Income' OR ttype='Level Income')"));
$sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total4 from credit_debit where user_id='$userid' and ttype='Referral Bonus'"));
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where user_id='$userid' and ttype='Level Income'"));
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total6 from credit_debit where user_id='$userid' and ttype='Roi Income'"));
$rmb_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total7 from credit_debit where user_id='$userid' and ttype='Recruiting Bonus'"));
$residual_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total8 from credit_debit where user_id='$userid' and ttype='Residual Income'"));
$withdraws=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total6 from withdraw_request where user_id='$userid' and status=1"));
$withdraw=$withdraws['total6'];

//code for display total direct income
$direct_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(credit_amt) as direct_income FROM `credit_debit` WHERE user_id='$userid' and ttype='Referral Bonus'"));
$direct_incomes = $direct_income['direct_income'];
$direct_income1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(credit_amt) as direct_income FROM `credit_debit` WHERE user_id='$userid' and ttype='Direct Mataching Income'"));
$direct_incomes1 = $direct_income1['direct_income'];
// Code for display total downline member //

$f=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` WHERE user_id='$userid' "));
?>
<!-- PAGE TITLE -->
<section id="page-title" class="row">
    <div class="col-md-12 col-sm-12" id="example2" style="background: rgb(16 104 227);">
        <!-- <div class="col-md-8 col-sm-8">
        <h2>Dashboard ( Your User Id : <?php echo $f['user_id'];?> / Username : <?php echo $f['username'];?> / Rank : <?php echo $f['user_rank_name'];  ?> )</h2></div> -->

        <!--<div class="col-md-12 col-sm-12">-->
            <!--<h2 class="dashboard" style="padding-top:10px;    color: #54b0ff !important;"> ( MY ID : <?php // echo $f['user_id'];?>/<?php // echo strtoupper($f['first_name']." ".$f['last_name']);?><?php // echo $f['designation'];  ?> )</h2>-->
            <h2 class="dashboard" style="font-weight: 500;font-size: 15px;">Referral Link: <a target="_blank" href="<?=SITE_URL;?>/userpanel/register.php?referral=<?php echo $f['username'];?>" style="color:white;  display: block;"> <?=SITE_URL;?>/userpanel/register.php?referral=<?php echo $f['username'];?> <i class="fa fa-share-alt"></i> </a></h2>

            <!-- <div class="col-md-4 col-sm-4">
            <?php $pc=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select status_maintenance.name from lifejacket_subscription inner join status_maintenance on lifejacket_subscription.package=status_maintenance.id where lifejacket_subscription.user_id='".$f['user_id']."' and lifejacket_subscription.status='Active' order by lifejacket_subscription.id desc limit 0,1"));  ?>
            <h2 style="float:right"> <?php if($f['user_rank_name']=='Free Member'){ echo "Free Member"; }else{ echo "Paid Member"; }?> </h2></div> -->
        <!--</div>-->

       <div class="col-md-6 col-sm-6">
        <?php if($f['user_rank_name']=='Free Member'){ ?>
		<div class="row"
        <div class="col-md-7">
        <h2 style="color:#fff;font-size: 16px;font-weight: bold;padding-top:10px;">Account Status : Inactive Member </h2>
        </div>
        <div class="col-md-5" style="float: left;"><a href="package-upgrade.php" class="btn btn-primary">Invest Your Fund</a>
        </div>
        <?php }//else{
        ?>
       

     </div>
	 </div>

</section>
<!-- / PAGE TITLE -->

<br/>

                                    <div class="container-fluid">
                                    
								<!-- 
                                    <div class="row mb-4">
                                        <div class="col-md-3 col-sm-6">
                                           <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                <div class="card-header">
                                                    <div class="icon icon-warning">
                                                        <img src="images/dollar-symbol.png" alt="" />
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <p class="category"><strong>Self Business</strong></p>
                                                    <h3 class="card-title">$ <?php //echo number_format($selfearning,2); ?></h3>

                                                </div>
                                                <div class="card-footer">
                                                    <div class="stats">
                                                        <img src="images/information.png" />  
                                                        <a href="#">See detailed </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--<div class="col-md-3 col-sm-6">
                                            <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                <div class="card-header">
                                                    <div class="icon icon-warning">
                                                        <img src="images/wallet.png" alt="" />
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <p class="category"><strong>Team Business</strong></p>
                                                    <h3 class="card-title">$ <?php // echo number_format($mydownincome,2); ?></h3>

                                                </div>
                                                <div class="card-footer">
                                                    <div class="stats">
                                                        <img src="images/information.png" />  
                                                        <a href="t_wallet-transaction-history.php">See detailed </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <!--<div class="card card-stats blue-bg" style="min-height: 120px;">
                                                <div class="card-header">
                                                    <div class="icon icon-warning">
                                                        <img src="images/dollar-symbol.png" alt="" />
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <p class="category"><strong>Team Business</strong></p>
                                                    <h3 class="card-title">$ <?php // echo number_format($mytotalearning,2); ?></h3>

                                                </div>
                                                <!--<div class="card-footer">
                                                    <div class="stats">
                                                        <img src="images/information.png" />  
                                                        <a href="t_wallet-transaction-history.php">See detailed </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                     <div class="row mb-4">
                                       <!--  <div class="col-md-12 col-sm-12">
                                               <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-content progressContainer">
                                                        <div class="singleDetails">
                                                            <p class="category"><strong>Your Monthly Target Meter </strong></p>
                                                            <div class="progress">
                                                            <?php
                                                            $datatotal = $currentMonthSale['totsale'];
                                                             $maxper1=($datatotal/$monthlytarget)*100;
                                                            ?>
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $monthlytarget;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $maxper1;?>%">  <?php echo number_format($maxper1,2);?> % </div>
                                                            </div>
                                                        </div>
                                                        <div class="singleDetails">
                                                            <h3 class="card-title pregressCount">Monthly Target: <span>INR 0 - SAR <?php echo number_format($monthlytarget,2) ; ?> </span> </h3>
                                                            <h3 class="card-title pregressCount">Monthly Purchase: <span>INR <?php echo number_format($currentMonthSale['totsale'],2) ; ?> </span> </h3>
                                                        </div>
                                                    
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 col-sm-12">
                                               <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-content progressContainer">
                                                        <div class="singleDetails">
                                                            <p class="category"><strong>Your Annual Target Meter </strong></p>
                                                            <div class="progress">
                                                            <?php
                                                            $datatotal = $totalSale['totsale'];
                                                             $maxper=($datatotal/$tottagert)*100;
                                                            ?>
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $tottagert;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $maxper;?>%">  <?php echo number_format($maxper,2);?> % </div>
                                                            </div>
                                                        </div>
                                                        <div class="singleDetails">
                                                            <h3 class="card-title pregressCount">Annual Target: <span>INR 0 - INR <?php echo number_format($tottagert,2); ?> </span> </h3>
                                                            <h3 class="card-title pregressCount">Annual Purchase: <span>INR <?php echo number_format($totalSale['totsale'],2) ; ?> </span> </h3>
                                                        </div>
                                                    
                                                        
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>-->
                                       
                                           
                                            <!--<div class="col-md-3 col-sm-6">-->
                                            <!--    <div class="card card-stats blue-bg">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <div class="icon icon-warning">-->
                                            <!--                 <img src="images/dollar-symbol.png" alt="" />-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                                   <!--  $_SESSION['currency'] -->
                                            <!--        <div class="card-content">-->
                                            <!--            <p class="category"><strong>Total Earning</strong></p>-->
                                            <!--            <h3 class="card-title"><?php // echo '$'; ?> <?php // if($yesterday_earning['total2']=='' || $yesterday_earning['total2']==0) { echo '0.00'; } else  { echo number_format($yesterday_earning['total2'],2); } ?></h3>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-footer">-->
                                            <!--            <div class="stats">-->
                                            <!--                <i class="material-icons text-info">info</i>-->
                                            <!--                <a href="total-income.php">See detailed</a>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->

                                            <!--<div class="col-md-3 col-sm-6">-->
                                            <!--    <div class="card card-stats blue-bg">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <div class="icon icon-warning">-->
                                            <!--                <img src="images/dollar-symbol.png" alt="" />-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-content">-->
                                            <!--            <p class="category"><strong>Matching bonus</strong></p>-->
                                            <!--            <h3 class="card-title"><?php echo '$' ?> <?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo '0.00'; } else  { echo number_format($binary_earning['total5'],2); } ?></h3>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-footer">-->
                                            <!--            <div class="stats">-->
                                            <!--                <i class="material-icons text-info">info</i>-->
                                            <!--                <a href="unilevel-income.php">See detailed</a>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                      <?php $total_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and (ttype='Level Income' OR ttype='Self Income')")); ?>
                                        <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Total Earning</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo ($total_income['total2']) ? number_format($total_income['total2'],2) : '0.00'; ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            
                                            $self_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype='Self Income' "));

                                            ?>
                                             <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Self  Earning</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo ($self_income['total2']) ? number_format($self_income['total2'],2) : '0.00'; ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                              <?php
                                            
                                            $level_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype='Level Income' "));

                                            ?>
                                             <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Level Earning</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo ($level_income['total2']) ? number_format($level_income['total2'],2) : '0.00'; ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $totalteam_income=0;
                                            $total_downlinesss=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$userid'");
                                            while($team_user=mysqli_fetch_array($total_downlinesss)){
                                                $tuid=$team_user['down_id'];
                                                $team_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$tuid' and (ttype='Self Income' OR ttype='Level Income')"));
                                            $totalteam_income+=$team_income['total2'];
                                            }
                                            
                                            ?>
                                             <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Team  Earning</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo $totalteam_income; //;($self_income['total2']) ? number_format($self_income['total2'],2) : '0.00'; ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                             $per_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as myper_sale from billing_detail where seller_id='".$userid."' and status=1 "));
                                            ?>
                                             <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Personal Sale</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo ($per_sale['myper_sale']) ? number_format($per_sale['myper_sale'],2) : '0.00'; ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $groupsale=0;
                                             $datadown=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline  where income_id='".$userid."' ");
                            while($datared=mysqli_fetch_array($datadown)){ 
                                
                              $ddid=  $datared['down_id'];
                              $downidper_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as mydown_sale from billing_detail where seller_id='$ddid' and status=1 "));
                             
                              if(!empty($downidper_sale['mydown_sale']))
                              {
                                   $groupsale+=$downidper_sale['mydown_sale']; 
                                  
                              }
                             }
                             ?>
                                             <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Group Sale</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo ($groupsale) ? number_format($groupsale,2) : '0.00'; ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>TOTAL DOWNLINE</strong></p>
                                                        <h3 class="card-title"> <?php  if($total_downline!=0){ echo $total_downline;  } else{ echo '0'; } ?></h3>
            
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--<div class="col-md-3 col-sm-6">-->
                                            <!--    <div class="card card-stats blue-bg" style="min-height: 120px;">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <div class="icon icon-warning">-->
                                            <!--                <img src="images/wallet.png" alt="" />-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-content">-->
                                            <!--            <p class="category"><strong>TOTAL DIRECT</strong></p>-->
                                            <!--            <h3 class="card-title"><?php if($direct_downline!=0){ echo $direct_downline; } else{ echo '0'; } ?></h3>-->
            
                                            <!--        </div>-->
                                                    
                                            <!--        <div class="card-footer">-->
                                            <!--            <div class="stats">-->
                                            <!--                <img src="images/information.png" /> -->
                                            <!--                <a href="level-income-report.php">See detailed </a>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
                                            
                                            <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>TOTAL DIRECT</strong></p>
                                                        <h3 class="card-title"><?php if($direct_total!=0){ echo $direct_total; } else{ echo '0'; } ?></h3>
            
                                                    </div>
                                                    
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           <div class="clearfix"></div> 
                                            <div class="col-md-3 col-sm-6" style='display:none'>
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>TOTAL IN-DIRECT</strong></p>
                                                        <h3 class="card-title"><?php if($in_direct_total!=0){ echo $in_direct_total; } else{ echo '0'; } ?></h3>
            
                                                    </div>
                                                    
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <!--<img src="images/information.png" /> 
                                                            <a href="level-income-report.php">See detailed </a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            <!--<div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>ROI Earning</strong></p>
                                                        <h3 class="card-title"><?//=CURRENCY?> <?php // if($matching_earning['total6']=='' || $matching_earning['total6']==0) { echo '0.00'; } else  { echo number_format($matching_earning['total6'],2); } ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="roi-income-report.php">See detailed</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!--<div class="col-md-3 col-sm-6">-->
                                            <!--    <div class="card card-stats blue-bg">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <div class="icon icon-warning">-->
                                            <!--                <img src="images/family-tree.png" alt="" />-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-content">-->
                                            <!--            <p class="category"><strong>Total Downline</strong></p>-->
                                            <!--            <h3 class="card-title"><?php // echo $total_downline_left; ?></h3>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-footer">-->
                                            <!--            <div class="stats">-->
                                            <!--                <i class="material-icons text-info">info</i>-->
                                            <!--                <a href="downline-member-report.php">See detailed </a>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>BONUS WALLET</strong></p>
                                                        <h3 class="card-title">$ <?php // echo number_format($tito_wallet_amount,2); ?></h3>

                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <img src="images/information.png" />  
                                                            <a href="tito_wallet-transaction-history.php">See detailed </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!-- <div class="col-md-3 col-sm-6">-->
                                            <!--    <div class="card card-stats blue-bg" style="min-height: 120px;">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <div class="icon icon-warning">-->
                                            <!--                <img src="images/wallet.png" alt="" />-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-content">-->
                                            <!--            <p class="category"><strong> Income Wallet</strong></p>-->
                                            <!--            <h3 class="card-title"> <?=CURRENCY?> <?php if(isset($tito_wallet_amount)){ echo number_format($tito_wallet_amount,2);  } else{ echo '0.00'; } ?></h3>-->
                                                      
                                            <!--        </div>-->
                                            <!--        <div class="card-footer">-->
                                            <!--            <div class="stats">-->
                                                            <!--<img src="images/information.png" /> 
                                            <!--                <a href="invoice-report.php">See detailed </a>-->
                                                            
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
											<!--<div class="col-md-3 col-sm-6">-->
           <!--                                    <div class="card card-stats blue-bg" style="min-height: 120px;">-->
           <!--                                         <div class="card-header">-->
           <!--                                             <div class="icon icon-warning">-->
           <!--                                                 <img src="images/wallet.png" alt="" />-->
           <!--                                             </div>-->
           <!--                                         </div>-->
           <!--                                         <div class="card-content">-->
           <!--                                             <p class="category"><strong>Purchase(Current month)</strong></p>-->
           <!--                                             <h3 class="card-title"><?=CURRENCY?> <?php echo number_format($currentMonthSale['totsale'],2); ?></h3>-->
           <!--                                         </div>-->
           <!--                                         <div class="card-footer">-->
           <!--                                             <div class="stats">-->
                                                            <!--<img src="images/information.png" /><a href="roi_wallet-transaction-history.php">See detailed </a>-->
           <!--                                             </div>-->
           <!--                                         </div>-->
           <!--                                     </div>-->
           <!--                                 </div>-->
										   <!-- <div class="col-md-3 col-sm-6">
                                               <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/wallet.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Target(Current month)</strong></p>
                                                        <h3 class="card-title"><?=CURRENCY?> <?php echo number_format($current_sub['amount'],2); ?></h3>

                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                           
                                            
                                   </div>
								   
								   <!--<div class="row mb-4">
									<div class="col-md-12">
										<div class="live-ticker"><script src="https://widgets.coingecko.com/coingecko-coin-price-static-headline-widget.js"></script>
                                            <coingecko-coin-price-static-headline-widget  coin-ids="bitcoin,eos,ethereum,litecoin,ripple,tron,monero" currency="usd" locale="en">
                                            </coingecko-coin-price-static-headline-widget>
                                        </div>
									</div>
								   </div>-->
								   
								   <div class="row mb-4">
										<!--<div class="col-md-3 col-sm-6">-->
										<!--	<div class="card card-stats blue-bg" style="min-height: 120px;">-->
										<!--		<div class="card-content2">-->
										<!--			<h3 class="card-title2"><?=CURRENCY?> <?php if(isset($totalSale['totsale'])){ echo number_format($totalSale['totsale'],2); } else{ echo '0.00'; } ?></h3>-->
										<!--		</div>-->
										<!--		<div class="card-header2">-->
										<!--			<div class="icon icon-warning">-->
										<!--				<img src="images/tr1.png" alt="" />-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="clearfix"></div>-->
										<!--		<div class="card-footer2">-->
										<!--			<div class="stats text-center">-->
										<!--				<h3>TOTAL PURCHASE</h3>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>  -->

										<!--<div class="col-md-3 col-sm-6">-->
										<!--	<div class="card card-stats blue-bg" style="min-height: 120px;">-->
										<!--		<div class="card-content2">-->
										<!--			<h3 class="card-title2"><?=CURRENCY?> <?php if(isset($total_income['total2'])){ echo number_format($total_income['total2'],2);  } else{ echo '0.00'; } ?></h3>-->
										<!--		</div>-->
										<!--		<div class="card-header2">-->
										<!--			<div class="icon icon-warning">-->
										<!--				<img src="images/tr2.png" alt="" />-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="clearfix"></div>-->
										<!--		<div class="card-footer2">-->
										<!--			<div class="stats text-center">-->
										<!--				<h3>TOTAL INCOME</h3>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>  -->
										
										<!--<div class="col-md-3 col-sm-6">-->
										<!--	<div class="card card-stats blue-bg" style="min-height: 120px;">-->
										<!--		<div class="card-content2">-->
										<!--			<h3 class="card-title2"><?php  if($total_downline!=0){ echo $total_downline;  } else{ echo '0'; } ?></h3>-->
										<!--		</div>-->
										<!--		<div class="card-header2">-->
										<!--			<div class="icon icon-warning">-->
										<!--				<img src="images/tr3.png" alt="" />-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="clearfix"></div>-->
										<!--		<div class="card-footer2">-->
										<!--			<div class="stats text-center">-->
										<!--				<h3>TOTAL DOWNLINE</h3>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>-->
										
				
										<!--<div class="col-md-3 col-sm-6">-->
										<!--	<div class="card card-stats blue-bg" style="min-height: 120px;">-->
										<!--		<div class="card-content2">-->
										<!--			<h3 class="card-title2"><?php if($direct_downline!=0){ echo $direct_downline; } else{ echo '0'; } ?></h3>-->
										<!--		</div>-->
										<!--		<div class="card-header2">-->
										<!--			<div class="icon icon-warning">-->
										<!--				<img src="images/tr4.png" alt="" />-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="clearfix"></div>-->
										<!--		<div class="card-footer2">-->
										<!--			<div class="stats text-center">-->
										<!--				<h3>TOTAL DIRECT</h3>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>-->
								   </div>
								
								
								
								
								<div class="row">
									<!--<div class="col-md-3 col-sm-6">
										<div class="invest-btn">
											<a href="add_fund.php" class="btn btn-primary btn-block btn-lg"><img src="images/investbtn1.png" alt="" /> &nbsp;ADD FUNDS E-WALLET</a>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="invest-btn">
											<a href="add_fund1.php" class="btn btn-primary btn-block btn-lg"><img src="images/investbtn1.png" alt="" /> &nbsp;ADD FUNDS CRYPTO</a>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="invest-btn">
											<a href="withdraw-request.php" class="btn btn-primary btn-block btn-lg"><img src="images/investbtn2.png" alt="" /> &nbsp;WITHDRAW FUNDS</a>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="invest-btn">
											<a href="referal.php" class="btn btn-primary btn-block btn-lg"><img src="images/investbtn3.png" alt="" /> &nbsp;REFERRAL LINK</a>
										</div>
									</div>-->
									
									
									
									<!--<div class="col-md-3 col-sm-6">-->
									<!--	<div class="invest-btn">-->
									<!--		<a href="package-upgrade.php" class="btn btn-primary btn-block btn-lg"><img src="images/investbtn4.png" alt="" /> &nbsp;BUSINESS PLAN</a>-->
									<!--	</div>-->
									<!--</div>-->
									
									
								</div>


   <!--         <div class="col-md-6">-->
   <!--                     <figure class="highcharts-figure">-->
   <!--                         <div id="container111"></div>-->
   <!--                     </figure>-->
						
						
   <!--               <section class="card hovercard" style="border-radius: 0px !important;margin:0;">-->
   <!--             <div class="cardheader"></div>-->
                 <!--<img alt="" src="images/646E1DE9-4C19-4273-99D8-E13A0C3CC433.jpg">-->
   <!--                 <div class="avatar">-->
   <!--                     <img alt="" src="<?php echo $userimage;?>">-->
   <!--                 </div>-->

   <!--                 <div class="info">-->
   <!--                     <div class="title">-->
   <!--                         <a href="#"><?php //echo $f['first_name']." ".$f['last_name'];?></a>-->
   <!--                     </div>-->
   <!--                       <div class="desc" style="font-size: 16px;">User Id : <?php //echo $f['user_id'];?></div>-->
                            <!-- <div class="desc" style="font-size: 16px;">Username : <?php// echo $f['username'];?></div> -->

                              <!-- <div class="desc" style="font-size: 16px;">Activation Date : <?php 

                             // $dert=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$f['user_id']."' and status='Active' order by id desc limit 0,1"));-->

                           //echo $dert['date'];?></div> -->

   <!--                     <div class="desc" style="font-size: 16px;">Sponsor Id : <?php echo $f['ref_id'];?></div>-->
   <!--<div class="desc" style="font-size: 16px;">Activation : <?php //if($f['user_rank_name']=='Free Member'){ echo "Inactive"; }else{ echo "Active"; }?> </div>-->

                        <!-- <div class="desc" style="font-size: 16px;">Sponsor Name : <?php $fdert=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select first_name, last_name from user_registration where user_id='".$f['ref_id']."'"));

                        //echo $fdert['first_name']." ".$fdert['last_name'];?></div> -->

   <!--                 </div>-->
   <!--               </section>-->
   <!--             </div>-->

                    <!--<div class="col-md-6">-->
                        
                    <!--   <div class="card card-stats white2-bg" >-->
                    <!--    <div class="card-content">-->
                    <!--      <div id="block-afl-widgets-afl-block-promotion-tools" style="min-height:143px;">-->

                           
                    <!--      <div class="row">-->
                    <!--        <div class="col-md-12">-->
                    <!--          <h3> Joining Link</h3>-->
                    <!--          <p ><a href="http://182.76.237.238/~syscheck/cantho/userpanel/register.php?referral=<?php echo $f['username'];?>" style="color: #fff;">CANTHO.com</a></p>-->
                             
                             <!--<button onclick="myFunction()">Copy</button>-->
                    <!--          <div class="social-medi-icons padder-md">-->
                    <!--            <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://182.76.237.238/~syscheck/cantho/register.php?referral=<?php echo $f['username'];?>&pos=left">-->
                    <!--              <img class="img-circle img-responsive" src="images/facebook.png" alt="">-->
                    <!--            </a>-->
                    <!--            <a target="_blank" href="http://twitter.com/share?url=http://182.76.237.238/~syscheck/cantho/register.php?referral=<?php echo $f['username'];?>&pos=left">-->
                    <!--              <img class="img-circle img-responsive" src="images/twitter.png" alt="">-->
                    <!--            </a>-->
                    <!--            <a target="_blank" href="https://api.whatsapp.com/send?text=http://182.76.237.238/~syscheck/cantho/register.php?referral=<?php echo $f['username'];?>&pos=left">-->
                    <!--              <img class="img-circle img-responsive" src="images/whatsapp2.png" alt="">-->
                    <!--            </a>-->
                    <!--            <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://182.76.237.238/~syscheck/cantho/register.php?referral=<?php echo $f['username'];?>&pos=left">-->
                    <!--              <img class="img-circle img-responsive" src="images/google-plus.png" alt="">-->
                    <!--            </a>-->
                    <!--          </div>-->
                    <!--        </div>-->
                         
                          
                          
                    <!--      </div>-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                  
    

                              </div>                

                                                  

                <div class="row">
                    
            <!--                        <div class="col-md-6">-->
                                                  <!--<div id="world-map-gdp" style=" height: 400px;margin: auto;"></div>-->

            <!--                                  <div class="region region-grid-block-right">-->
            <!--                                    <div id="block-afl-widgets-afl-block-my-organisations" class="block block-afl-widgets clearfix">-->

            <!--                                        <div class="panel wrapper white2-bg">-->
            <!--                                            <h4 class="m-t-none m-b font-thin-bold inline font-semi-bold" style="color:#000;">Team Performance</h4>-->
            <!--                                            <div class="nav-tabs-alt  hidden-xs">-->
            <!--                                                <ul class="nav nav-tabs nav-justified">-->
                                                                <!--<li class="active my-organisation-tabitem">-->
                                                                <!--    <a data-target="#tab-top-earners" href="#" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>-->
                                                                <!--</li>-->
            <!--                                                    <li class="my-organisation-tabitem">-->
            <!--                                                        <a data-target="#" href="#" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>-->
                                                              <?php
            // $i=0;-->
    //   $join_image = array('<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/all/themes/eps_diamond/img/avatar.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/istockphoto-915981818-170667a.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/20190617_men_mobile.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/jason-emery-fltc-066-4-800x440.jpg" width="104" height="104" alt="">');
            //     $new_join = mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$userid' order by id desc limit 4");
      
                ?> 
            <!--                                                    <div class="tab-pane" id="tab-recentJoinings">-->
            <!--                                                        <div class="">-->
            <!--                                                            <ul class="list-group list-group-xs m-b-none">-->
                                                                       <?php //while($new_joining11=mysqli_fetch_array($new_join)){-->
                                                                           //   $new_joining = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$new_joining11['down_id']."'")); 
                                                                       
                                                                     ?>  
            <!--                                                                <li class="list-group-item b b-md m-b-sm clearfix">-->
            <!--                                                                    <div class="col-md-9 col-sm-9 col-xs-9">-->
            <!--                                                                        <div class="thumb pull-left m-r">-->
            <!--                                                                          <?php //echo $join_image[$i];?>
            <!--                                                                         </div>-->
            <!--                                                                        <div class="clear ">-->
            <!--                                                                            <div class="m-b-xs">-->
            <!--                                                                                <span class="text-black">-->
                                                                            <?php 
                                                                       //  echo ucfirst($new_joining['first_name'] ." ". $new_joining['last_name'] );
                                                                      ?>                             <!--   </span>-->
            <!--                                                                            </div>-->
            <!--                                                                            <div class="">-->
                                                                                    <!--<span class="text-muted"><?php 
                                                                        // echo $new_joining['registration_date']; 
                                                                    ?>  <!--</span> </div>
            <!--                                                                        </div>-->
            <!--                                                                    </div>-->
            <!--                                                                    <div class="col-md-3 col-sm-3 col-xs-3">-->
            <!--                                                                        <div class="pull-right">-->
                                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Platinum</span> -->
            <!--                                                                            <div class="thumb m-r pull-right"><!-- <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-37.png" alt="Package - 37" title="Package - 37"> </div> -->
            <!--                                                                        </div>-->
            <!--                                                                    </div>-->

                                                                           <!-- </li>-->
            <!--                                                              <?php //$i++;} ?>
                                                
            <!--                                                            </ul>-->
            <!--                                                        </div>-->
                                                     
            <!--                                                    </li>-->
                                                        
            <!--                                            </div>-->
                                                       <!-- TAB RECENT JOININGS -->
            <!--                                     </div>     </ul>-->
												<!--</div>-->
            <!--                                </div> <!-- / col-md-6 -->
                                            
            <!--                            </div>    -->
                    
                                   
                      
                        <!--<div class="col-md-6">
                   
                       <div class="card card-stats white2-bg" style='height: 183px;'>
                        <div class="card-content">
                          <div id="block-afl-widgets-afl-block-promotion-tools" style="min-height:212px;">

                           
                          <div class="row">
                              
                            <div class="col-md-6">
                                     <h3>Official Announcement </h3>
                            <div class="table-responsive" style='width: 564px;'>

                  <table class="table datatable">
               
                    <tbody>
                     
                     <?php
                     $sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from promo where status=1 order by n_id desc limit 0,1");
                     $i=1;
                      while($data1=mysqli_fetch_array($sql))
                      { ?>
                      <tr>
                    
                        <td><?php echo $data1['news_name'];?></td>
                       
                       
                        <td><?php echo $data1['posted_date'];?></td>
                         <td> <a href="announcemnet-detail.php?id=<?php echo $data1['n_id'];?>" class="btn btn-primary" > View </a></td>
                      </tr>
                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>

                </div>
                        
                           
                            </div>
                         
                           
                          </div>
                          </div>
                        </div>
                    </div>
                    </div>-->
                     <div class="clearfix"></div>
                </div>

                                                    
            <div class="">

              <div class="">
              <br />

                    <!--                
                                <div class="row">
                                            <div class="col-md-12 col-sm-12">
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
                                                  </div> -->
<!-- 
                                                  <div class="row-row">
                                                      <div class="cell">
                                                          <div class="cell-inner">
                                                              <div class="tab-content">

                                                            
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
                                                                                              <span class="">BINARY EARNING </span>
                                                                                          </div>
                                                                          
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$' ?> <?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo '0.00'; } else  { echo number_format($binary_earning['total5']); } ?>                           </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="binary-income-report.php" class="btn btn-sm btn-info">View More</a>
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
                                                                             
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$'; ?> <?php if($matching_earning['total6']=='' || $matching_earning['total6']==0) { echo '0.00'; } else  { echo number_format($matching_earning['total6']); } ?>                             </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="roi-income-report.php" class="btn btn-sm btn-info">View More</a>
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
                                                                                              <span class="">DIRECT INCOME</span>
                                                                                          </div>
                                                                               
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ <?php // echo number_format($direct_incomes); ?>                          </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="sponsor-income.php" class="btn btn-sm btn-info">View More</a>
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
                                                                      
                                                                      </div>

                                                                  </div>
                                                          

                                                             
                <?php
                 $wallet_requests = mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request where user_id='".$f['user_id']."' order by id limit 4");
      
                ?>                                                  
                                                                  <div class="tab-pane" id="tab-withdrawal-request">
                                                                      <div class="">
                                                                          <div class="panel no-border">
                                                                              <ul class="list-group list-group-lg m-b-none">
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
                                                                                 
                                                                              </ul>
                                                                          </div>
                                                                      </div>

                                                                      <div class="col-md-12">
                                                                         
                                                                      </div>

                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>   
                                                        <!-- Will visible on Xs -->
                                                        <div class="text-right inline pull-right">
                                                            <div class="dropdown  visible-xs">
                                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                                <ul class="dropdown-menu nav flex-column pull-right">
                                                                  
                                                                    <li class="my-organisation-tabitem">
                                                                        <a data-target="#tab-recentJoinings" href="#" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row-row">

                                                            <div class="tab-content">

                                                               
                <?php
                $i=0;
                $image = array('<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/formal-fashion-for-him.png" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/career.jpg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/adult_close_up_eyeglasses_eyewear_face_facial_expression_fashion_fashion_model-1000789.jpg%21d.jpeg" width="104" height="104" alt="">','<img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/jason-emery-fltc-066-4-800x440.jpg" width="104" height="104" alt="">');
                 $top_earner = mysqli_query($GLOBALS["___mysqli_ston"], "select * from roi_e_wallet order by amount desc limit 4");
      
                ?>  

                                                                

         
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
                                            
         <!-- / container-fluid --><br /><br />

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
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
     <link rel="stylesheet" media="all" href="https://jvectormap.com/css/lessframework.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/skin.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-jvectormap-2.0.5.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/syntax.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jsdoc.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-ui.min.css"/>
   <script src="https://jvectormap.com/js/css3-mediaqueries.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->
  <script src="https://jvectormap.com/js/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="https://jvectormap.com/js/tabs.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-world-mill.js"></script>
  <script src="https://jvectormap.com/js/gdp-data.js"></script>
  </body>
</html>