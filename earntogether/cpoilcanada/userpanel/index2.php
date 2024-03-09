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

            
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<?php if($f['user_rank_name']=='Free Member'){?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
<?php } ?>

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

                                <style>
                                    .green {
                                        color: green;
                                    }
                                    
                                    h3 {
                                        font-size: 1em;
                                        font-weight: bold;
                                        font-family: Arial, Helvetica, sans-serif;
                                    }
                                </style>
                                  <style type="text/css">
                                        .dashboard {
                                            font-size: 17px;
                                            margin-bottom: 0;
                                            margin-top: 2px;
                                            color: #1f1f1f;
                                            font-weight: bold;
                                        }
                                        
                                        #btn{
                                            border-radius: 2px;
                                            font-size: 14px;
                                            padding: 4px 5px;
                                            outline: none !important;
                                            font-family: 'Nunito Sans', sans-serif;
                                        }
                                    </style>


<?php

$total_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid'"));
$total_downline_left=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='left'"));
$total_downline_right=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='right'"));
$direct_downline=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' and nom_id!=''"));
?>

<?php 

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

// Code for display total income //
$total_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select amount from working_e_wallet where user_id='$userid'"));
$total_earning11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' and pb>'0' order by id desc limit 0,1"));
// Code for display last day income //
$yesterday_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Referral Bonus' OR ttype='Binary Income' OR ttype='Roi Income' OR ttype='Level Income' OR ttype='Level Income')"));



// Code for display total sponsor income //
$sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total4 from credit_debit where user_id='$userid' and ttype='Referral Bonus'"));

// Code for display total Binary income //
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where user_id='$userid' and ttype='Binary Income'"));



// Code for display total Matching income //
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total6 from credit_debit where user_id='$userid' and ttype='Roi Income'"));

$withdraws=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total6 from withdraw_request where user_id='$userid' and status=1"));

$withdraw=$withdraws['total6'];




// Code for display total Left investment and right investment //
$left_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as left_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description!='Carry Forward BV' AND position='left'"));
$left_investments = $left_investment['left_invest'];

$right_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as right_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description!='Carry Forward BV' AND position='right'"));
$right_investments = $right_investment['right_invest'];

$toatl_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as total_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description!='Carry Forward BV'"));
$total_investments = $toatl_investment['total_invest'];


//code for display total direct income
$direct_income=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(credit_amt) as direct_income FROM `credit_debit` WHERE user_id='$userid' and ttype='Referral Bonus'"));
$direct_incomes = $direct_income['direct_income'];
// Code for display total downline member //



$matrix_downline12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid' "));
$matrix_downline1=$matrix_downline12['amount'];

$working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid' "));
$working_e_wallet=$working_e_wallet1['amount'];

$roi_e_wallet=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from roi_e_wallet where user_id='$userid' "));
$roi_e_wallet1=$roi_e_wallet['amount'];


//code for subscription
if(isset($_POST['submitPin'])){
 	//echo '<script>alert("ok")</script>';
 	$pins = $_POST['pin'];

 	$checpin = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pins where (pin_no='$pins' and status='0' and receiver_id='$userid')"));

 	if($checpin>0){

 		$pinset = mysqli_query($GLOBALS["___mysqli_ston"],"update pins set status='1',used_by='$userid' where (receiver_id='$userid' and pin_no='$pins')");
 		$useractive = mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set designation='Paid Member',user_rank_name='Paid Member' where user_id='$userid'");
 		if($useractive){
 		header("Location: index.php");
 	}
 		
 	}else{
 		$Message = 'Invalid PIN';
 		//header("Location: index.php?Message=".$Message);
 	}
 }

?>
	<script type="text/javascript">
		$(document).ready(function() {
	    $("#pin").blur(function (e) {
	     
	    $(this).val($(this).val().replace(/\s/g, ''));
	    var pin = $(this).val();
	    if(pin.length < 1){$("#check").html('');return;}
	    if(pin.length >= 1){
	        
	    //$("#checksponser").html('Loading...');
	    $.post('pinCheck.php', {'pin':pin}, function(data) {

	    $("#check").html(data);
	    });
	    }
	    }); 
	    });
	</script>

                          <!---pop up modal code-->

                            <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
                                  <div class="modal-dialog">
                                        
                                    <!-- Modal content-->
                                      <div class="modal-content">
                                         <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" style="color:black;font-size: 24px;">&times;</button>
                                              <h4 class="modal-title" style="text-align: center;font-family: monospace; color: black;">PACKAGE SUBSCRIPTION &nbsp;&nbsp;<strong style="color: red;"><?php  if(isset($Message)){echo ($Message);}?></strong></h4>
                                            </div>
                                            <div class="modal-body">
                                             <div class="row">
                                            
                                             <div class="col-lg-6 col-md-6">
                                              <div >
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                      
                                                      <div class="media-body padr text-white text-right">
                                                     
                                                       <center>  <button id="hide" class="btn-success btn" id="pay2" style="border-radius: 0px;background-color: #087d53 !important;border-color: #079864;">Activate Now</button></center>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                              <div >
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                     
                                                      <div class="media-body padr text-white text-right">
                                                    <center>   <a href="request-for-pin.php" class="btn-warning btn" id="pay2" style="border-radius: 0px;background-color: #ab700a;">Request For Algorithmic</a></center>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                            <form action="" method="post" autocomplete='off' id="p"  style="display: none;">
                                                <div class="form-group">
                                                  <input type="text" name="pin" placeholder="Enter 12 Digit Code" class="form-control" id="pin" required="required">
                                                  <span id="check"></span>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-4">
                                                         <input type="submit" name="submitPin" value="SUBMIT"  class="btn btn-primary btn-block" style="border-radius: 0px;">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                 
                                            </form>

                                            </div>
                                           
                                          </div>
                                          
                                        </div>
                                      </div>
                                <!--pop modal code end-->

                                    <!-- PAGE TITLE -->
                                    <section id="page-title">
                                      <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <h1 class="m-n h3">Dashboard</h1>
                                        </div>
                                        <div class="col-lg-8 col-md-12 text-right hidden-xs title-extra-class">

                                            <div class="region region-title-extra">
                                                <div id="block-afl-widgets-afl-block-member-current-package" class="block block-afl-widgets clearfix">

                                                    <div class="inline text-left">
                                                        <div class="hidden-md inline m-r text-left  pull-left">
                                                            <div class="sparkline inline m-r-xs"><img class="img-circle" width="50" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package-images/package-36.png" alt="Package - 36" title="Package - 36"></div>
                                                        </div>
                                                        <div class="r-r inline m-r text-left">
                                                            <div class="m-b-">Current Package</div>
                                                            <div class="sparkline inline text-md text-black font-bold">Gold</div>
                                                            <div class="text-success">Expire On :2022-Feb-13</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.block -->
                                                <div id="block-afl-widgets-afl-block-upgrade-package-link" class="block block-afl-widgets v-top">

                                                    <div class="panel panel-primary">
                                                        <div class="panel-body text-primary"><strong>Package Upgrade On Processing : </strong>Platinum</div>
                                                    </div>
                                                </div>
                                                <!-- /.block -->
                                            </div>
                                        </div>
                                        <!-- sreeram -->

                                    </div>

                                        

                                    </section>
                                    <!-- / PAGE TITLE -->
                                    <br/>

                                    <div class="container-fluid">
                                        <div class="row">

                                          <div class="col-md-6">
                                            <div class="row">
                                              <div class="col-md-6 col-sm-6">
                                                  <div class="card card-stats purple-bg">
                                                      <div class="card-header">
                                                          <div class="icon icon-warning">
                                                              <img src="images/family-tree.png" alt="" />
                                                          </div>
                                                      </div>
                                                      <div class="card-content">
                                                          <p class="category"><strong>Downline Members</strong></p>
                                                          <h3 class="card-title"><?php echo $total_downline; ?></h3>
                                                      </div>
                                                      <div class="card-footer">
                                                          <div class="stats">
                                                              <i class="material-icons text-info">info</i>
                                                              <a href="downline-member-report.php">See detailed </a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-sm-6">
                                                  <div class="card card-stats white2-bg">
                                                      <div class="card-header">
                                                          <div class="icon icon-warning">
                                                              <img src="images/family-tree.png" alt="" />
                                                          </div>
                                                      </div>
                                                      <div class="card-content">
                                                          <p class="category"><strong>Referral Members</strong></p>
                                                          <h3 class="card-title"><?php echo $direct_downline; ?></h3>
                                                      </div>
                                                      <div class="card-footer">
                                                          <div class="stats">
                                                              <i class="material-icons text-info">info</i>
                                                              <a href="direct-sponsor-member-report.php">See detailed</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats white2-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/family-tree.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Left Downline</strong></p>
                                                        <h3 class="card-title"><?php echo $total_downline_left; ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="downline-member-report.php">See detailed </a>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats blue-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/family-tree.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Left Downline</strong></p>
                                                        <h3 class="card-title"><?php echo $total_downline_left; ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="downline-member-report.php">See detailed </a>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-md-12 col-sm-12">
                                                <div class="card card-stats white2-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                             <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                   <!--  $_SESSION['currency'] -->
                                                    <div class="card-content">
                                                        <p class="category"><strong>Total Earning</strong></p>
                                                        <h3 class="card-title"><?php echo '$'; ?> <?php if($yesterday_earning['total2']=='' || $yesterday_earning['total2']==0) { echo '0.00'; } else  { echo number_format($yesterday_earning['total2'],2); } ?></h3>
                                                    </div>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                            
                                          <div class="col-md-6">
                                            <div class="card card-stats white2-bg">
                                              <div class="card-content">
                                                <div class="region region-analytics-right">
                                                  <div id="block-afl-widgets-afl-block-downlines-chart" class="block block-afl-widgets clearfix">
                                                    <div class="afl-widget-panel afl-widget afl-widget-chart" widget="block_downlines_chart">
                                                      <div class="loader loader-bar"></div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                          </div>
                                        </div>

                                        <div class="row">

                                            

                                           <!-- <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Sponsor Earning</strong></p>
                                                        <h3 class="card-title"><?php echo $_SESSION['currency']; ?> <?php if($sponsor_earning['total4']=='' || $sponsor_earning['total4']==0) { echo '0.00'; } else  { echo $sponsor_earning['total4']; } ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="sponsor-income.php">See detailed report</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="col-md-7">
                                                <div class="card card-stats white2-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Binary Earning</strong></p>
                                                        <h3 class="card-title"><?php echo '$' ?> <?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo '0.00'; } else  { echo number_format($binary_earning['total5'],2); } ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="binary-income-report.php">See detailed</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="card card-stats white2-bg promotion">
                                                  <div class="card-content">
                                                    <div id="block-afl-widgets-afl-block-promotion-tools">
                                                      <h4>Promotion Tools</h4>
                                                      <p>Click here to show referral link</p>
                                                      <div class="social-medi-icons padder-md">
                                                        <a target="_blank" href="#">
                                                          <img class="img-circle img-responsive" src="images/facebook.png" alt="">
                                                        </a>
                                                        <a target="_blank" href="#">
                                                          <img class="img-circle img-responsive" src="images/twitter.png" alt="">
                                                        </a>
                                                        <a target="_blank" href="#">
                                                          <img class="img-circle img-responsive" src="images/whatsapp2.png" alt="">
                                                        </a>
                                                        <a target="_blank" href="#">
                                                          <img class="img-circle img-responsive" src="images/telegram.png" alt="">
                                                        </a>
                                                        <a target="_blank" href="#">
                                                          <img class="img-circle img-responsive" src="images/linkedin.png" alt="">
                                                        </a>
                                                        <img class="img-circle img-responsive" src="images/share.png" alt="">
                                                      </div>
                                                    </div>

                                                    <div class="row rank-achievement-block">
                                                      <div class="col-md-6 no-padder">
                                                        <div class="wrapper inner-wrapper h-block">
                                                            <h4 class="font-thin-bold m-t-none m-b">Current Rank - <span class="text-primary">PEARL EXECUTIVE</span></h4>
                                                            <div class="">
                                                                <div data-toggle="tooltip" data-placement="top" title="Target Required - 400.00">
                                                                    <div class="m-t-md m-b-md"><span class="pull-right text-primary"><div class="inline text-left text-primary dropdown"><div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><div><i class="fa fa-fw fa-caret-down text-muted text-md"></i></div> </div><div class="warpper-xs pull-right dropdown-menu bg-white text-center"><div class="wrapper-sm m-b-xs b-b"><div class="text-center text-danger "><div class="h3"><span class="m-r-xs ">$ 400.00</span></div>
                                                                    <div class="text-xs">REQUIRED</div>
                                                                </div>
                                                            </div>
                                                            <div class="wrapper-sm">
                                                                <div class="text-center text-success">
                                                                    <div class="h3"><span class="m-r-xs">$ 0.00</span></div>
                                                                    <div class="text-xs">ACHIEVED</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </span><span class="m-b-sm">Weaker Leg Sale</span></div>
                                                    <div class="progress progress-xs  m-t-sm">
                                                        <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="0%" style="width: 0%"></div>
                                                    </div>
                                                    </div>
                                                    <div data-toggle="tooltip" data-placement="top" title="Target Required - 2">
                                                        <div class="m-t-md m-b-md"><span class="pull-right text-primary"><div class="inline text-left text-primary dropdown"><div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><div><i class="fa fa-fw fa-caret-down text-muted text-md"></i></div> </div><div class="warpper-xs pull-right dropdown-menu bg-white text-center"><div class="wrapper-sm m-b-xs b-b"><div class="text-center text-danger "><div class="h3"><span class="m-r-xs "> 2</span></div>
                                                        <div class="text-xs">REQUIRED</div>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper-sm">
                                                        <div class="text-center text-success">
                                                            <div class="h3"><span class="m-r-xs"> 1</span></div>
                                                            <div class="text-xs">ACHIEVED</div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </span><span class="m-b-sm"> JADE EXECUTIVE s in your team</span></div>
                                                    <div class="progress progress-xs  m-t-sm">
                                                        <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>

                                                      <div class="col-md-6 no-padder">
                                                        <div class="wrapper inner-wrapper h-block">
                                                            <h4 class="font-thin-bold m-t-none m-b">Next Rank - <span class="text-info">SAPHIRE EXECUTIVE</span></h4>
                                                            <div class="">
                                                                <div data-toggle="tooltip" data-placement="top" title="Target Required - 1,200.00">
                                                                    <div class="m-t-md m-b-md"><span class="pull-right text-primary"><div class="inline text-left text-primary dropdown"><div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><div><i class="fa fa-fw fa-caret-down text-muted text-md"></i></div> </div><div class="warpper-xs pull-right dropdown-menu bg-white text-center"><div class="wrapper-sm m-b-xs b-b"><div class="text-center text-danger "><div class="h3"><span class="m-r-xs ">$ 1,200.00</span></div>
                                                                    <div class="text-xs">REQUIRED</div>
                                                                </div>
                                                            </div>
                                                            <div class="wrapper-sm">
                                                                <div class="text-center text-success">
                                                                    <div class="h3"><span class="m-r-xs">$ 0.00</span></div>
                                                                    <div class="text-xs">ACHIEVED</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </span><span class="m-b-sm">Weaker Leg Sale</span></div>
                                                    <div class="progress progress-xs  m-t-sm">
                                                        <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="0%" style="width: 0%"></div>
                                                    </div>
                                                    </div>
                                                    <div data-toggle="tooltip" data-placement="top" title="Target Required - 6">
                                                        <div class="m-t-md m-b-md"><span class="pull-right text-primary"><div class="inline text-left text-primary dropdown"><div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><div><i class="fa fa-fw fa-caret-down text-muted text-md"></i></div> </div><div class="warpper-xs pull-right dropdown-menu bg-white text-center"><div class="wrapper-sm m-b-xs b-b"><div class="text-center text-danger "><div class="h3"><span class="m-r-xs "> 6</span></div>
                                                        <div class="text-xs">REQUIRED</div>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper-sm">
                                                        <div class="text-center text-success">
                                                            <div class="h3"><span class="m-r-xs"> 1</span></div>
                                                            <div class="text-xs">ACHIEVED</div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </span><span class="m-b-sm"> PEARL EXECUTIVE s in your team</span></div>
                                                    <div class="progress progress-xs  m-t-sm">
                                                        <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="16%" style="width: 16%"></div>
                                                    </div>
                                                    </div>
                                                    <div data-toggle="tooltip" data-placement="top" title="Target Required - 3">
                                                        <div class="m-t-md m-b-md"><span class="pull-right text-primary"><div class="inline text-left text-primary dropdown"><div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><div><i class="fa fa-fw fa-caret-down text-muted text-md"></i></div> </div><div class="warpper-xs pull-right dropdown-menu bg-white text-center"><div class="wrapper-sm m-b-xs b-b"><div class="text-center text-danger "><div class="h3"><span class="m-r-xs "> 3</span></div>
                                                        <div class="text-xs">REQUIRED</div>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper-sm">
                                                        <div class="text-center text-success">
                                                            <div class="h3"><span class="m-r-xs"> 1</span></div>
                                                            <div class="text-xs">ACHIEVED</div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </span><span class="m-b-sm"> PEARL EXECUTIVE s in your refferal team</span></div>
                                                    <div class="progress progress-xs  m-t-sm">
                                                        <div class="progress-bar bg-warning" data-toggle="tooltip" data-original-title="33%" style="width: 33%"></div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                         
                                        </div>

                                        <div class="row">

<!--                                             <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats" style="min-height: 100px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Right Team Investment</strong></p>
                                                        <h3 class="card-title">USD <?php echo number_format($right_investments,2); ?></h3>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="col-md-6 col-sm-6">
                                                <div class="panel wrapper">
                                                  <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Commissions &amp; Withdrawals</h4>
                                                  <div class="nav-tabs-alt hidden-xs">
                                                      <ul class="nav nav-tabs nav-justified">
                                                          <li class="active">
                                                              <a data-target="#tab-earnings" href="#" role="tab" data-toggle="tab" aria-expanded="true">Earnings</a>
                                                          </li>
                                                          <li class="">
                                                              <a data-target="#tab-expenditures" href="#" role="tab" data-toggle="tab" aria-expanded="false">Expenses</a>
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
                                                                                                  <span class="text-bold text-md">WC</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">WITHDRAWAL CANCELLATION</span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 6 month(s) 20 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ 23.00                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="/afl/income-history?category=WITHDRAWAL%20CANCELLATION" class="btn btn-sm btn-info">View More</a>
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
                                                                                                  <span class="text-bold text-md">RAB</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">RANK ADVANCEMENT BONUS</span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 6 month(s) 20 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ 100.00                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="/afl/income-history?category=RANK%20ADVANCEMENT%20BONUS" class="btn btn-sm btn-info">View More</a>
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
                                                                                                  <span class="text-bold text-md">MB</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">MATCHING BONUS</span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 7 month(s) 9 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ 12.75                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="/afl/income-history?category=MATCHING%20BONUS" class="btn btn-sm btn-info">View More</a>
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
                                                                                                  <span class="text-bold text-md">BBP</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                              <span class="">BINARY BONUS PAY</span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 8 month(s) 8 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ 150.00                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                              <a href="/afl/income-history?category=BINARY%20BONUS%20PAY" class="btn btn-sm btn-info">View More</a>
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
                                                                  <!-- TAB EXPENDITURES -->
                                                                  <div class="tab-pane" id="tab-expenditures">
                                                                      <div class="m-t">
                                                                          <div class="panel no-border">
                                                                              <ul class="list-group list-group-lg m-b-none">

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <button class="btn 
                                                                                           btn-md 
                                                                                           btn-icon 
                                                                                           btn-primary">
                                                                                                  <span class="text-bold text-md">CP</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span>COMMISSION PAYOUT</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 604.7                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <a href="/afl/expenses-history?category=COMMISSION%20PAYOUT" class="btn btn-sm btn-info">View More</a>
                                                                                          </div>
                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <button class="btn 
                                                                                           btn-md 
                                                                                           btn-icon 
                                                                                           btn-danger">
                                                                                                  <span class="text-bold text-md">W</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span>WITHDRAWAL</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 10                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <a href="/afl/expenses-history?category=WITHDRAWAL" class="btn btn-sm btn-info">View More</a>
                                                                                          </div>
                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <button class="btn 
                                                                                           btn-md 
                                                                                           btn-icon 
                                                                                           btn-warning">
                                                                                                  <span class="text-bold text-md">EFT</span>
                                                                                              </button>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span>E-WALLET FUND TRANSFER</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 10.2                              </span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <a href="/afl/expenses-history?category=E-WALLET%20FUND%20TRANSFER" class="btn btn-sm btn-info">View More</a>
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
                                                                  <div class="tab-pane" id="tab-withdrawal-request">
                                                                      <div class="m-t">
                                                                          <div class="panel no-border">
                                                                              <ul class="list-group list-group-lg m-b-none">
                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span class="font-thin-bold text-md text-black">Bitcoin</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <span class="text-md">2019-07-30 10:58:54</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 150                              </span>
                                                                                          </div>

                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <span class="font-thin-bold text-md text-info">
                                                                              Requested                              </span>
                                                                                          </div>

                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span class="font-thin-bold text-md text-black">Bitcoin</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <span class="text-md">2019-07-30 10:58:34</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 50                              </span>
                                                                                          </div>

                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <span class="font-thin-bold text-md text-primary">
                                                                              Approved                              </span>
                                                                                          </div>

                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span class="font-thin-bold text-md text-black">Bitcoin</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <span class="text-md">2019-07-24 08:30:00</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 629.7                              </span>
                                                                                          </div>

                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <span class="font-thin-bold text-md text-success">
                                                                              Paid                              </span>
                                                                                          </div>

                                                                                      </div>
                                                                                  </li>

                                                                                  <li class="list-group-item">
                                                                                      <div class="row">
                                                                                          <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                              <span class="font-thin-bold text-md text-black">Bitcoin</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                              <span class="text-md">2019-07-24 08:30:00</span>
                                                                                          </div>
                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                              <span class="text-md text-black">
                                                                              $ 23                              </span>
                                                                                          </div>

                                                                                          <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                              <span class="font-thin-bold text-md text-danger">
                                                                              Rejected                              </span>
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
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>   
                                            <div class="col-md-6 col-sm-6">
                                              <div class="region region-grid-block-right">
                                                <div id="block-afl-widgets-afl-block-my-organisations" class="block block-afl-widgets clearfix">

                                                    <div class="panel wrapper">
                                                        <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Team Performance</h4>
                                                        <div class="nav-tabs-alt  hidden-xs">
                                                            <ul class="nav nav-tabs nav-justified">
                                                                <li class="active my-organisation-tabitem">
                                                                    <a data-target="#tab-top-earners" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>
                                                                </li>
                                                                <li class="my-organisation-tabitem">
                                                                    <a data-target="#tab-rankOverview" role="tab" data-toggle="tab" aria-expanded="false">Rank Overview</a>
                                                                </li>
                                                                <li class="my-organisation-tabitem">
                                                                    <a data-target="#tab-packageOveview" role="tab" data-toggle="tab" aria-expanded="false">Package Overview</a>
                                                                </li>
                                                                <li class="my-organisation-tabitem">
                                                                    <a data-target="#tab-recentJoinings" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
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
                                                                        <a data-target="#tab-top-earners" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>
                                                                    </li>
                                                                    <li class="my-organisation-tabitem nav-item">
                                                                        <a data-target="#tab-rankOverview" role="tab" data-toggle="tab" aria-expanded="false">Rank Overview</a>
                                                                    </li>
                                                                    <li class="my-organisation-tabitem">
                                                                        <a data-target="#tab-packageOveview" role="tab" data-toggle="tab" aria-expanded="false">Package Overview</a>
                                                                    </li>
                                                                    <li class="my-organisation-tabitem">
                                                                        <a data-target="#tab-recentJoinings" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row-row">

                                                            <div class="tab-content">

                                                                <!-- TAB EARNINGS -->
                                                                <div class="tab-pane active" id="tab-top-earners">
                                                                    <div class="">
                                                                        <ul class="list-group list-group-xs m-b-none">
                                                                            <li class="list-group-item b m-b-sm">
                                                                                <div class="thumb pull-left m-r">
                                                                                    <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/formal-fashion-for-him.png" width="104" height="104" alt=""> </div>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs">
                                                                                        <span class="text-black">
                                                                            Walker Robles                              </span>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <span class="text-muted">$ 399.60</span> </div>

                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item b m-b-sm">
                                                                                <div class="thumb pull-left m-r">
                                                                                    <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/career.jpg" width="104" height="104" alt=""> </div>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs">
                                                                                        <span class="text-black">
                                                                            Curran Guzman                              </span>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <span class="text-muted">$ 169.60</span> </div>

                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item b m-b-sm">
                                                                                <div class="thumb pull-left m-r">
                                                                                    <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/adult_close_up_eyeglasses_eyewear_face_facial_expression_fashion_fashion_model-1000789.jpg%21d.jpeg" width="104" height="104" alt=""> </div>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs">
                                                                                        <span class="text-black">
                                                                            Karly Nolan                              </span>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <span class="text-muted">$ 114.80</span> </div>

                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item b m-b-sm">
                                                                                <div class="thumb pull-left m-r">
                                                                                    <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/jason-emery-fltc-066-4-800x440.jpg" width="104" height="104" alt=""> </div>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs">
                                                                                        <span class="text-black">
                                                                            Bianca Hawkins                              </span>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <span class="text-muted">$ 80.00</span> </div>

                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                    </div>

                                                                </div>

                                                                <!-- TAB RANK OVERVIEW -->
                                                                <div class="tab-pane" id="tab-rankOverview">
                                                                    <div class="m-t">
                                                                        <ul class="list-group list-group-xs m-b-none">
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="thumb m-r pull-left">
                                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/rank_images/rank-2.png" alt="Rank - 2" title="Rank - 2"> </div>
                                                                                <span class="pull-right label text-base font-normal bg-primary inline m-t">1</span>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs"><span>PEARL EXECUTIVE</span></div>
                                                                                    <div class=""><span class="text-muted">You have 1 PEARL EXECUTIVE in your team.</span></div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="thumb m-r pull-left">
                                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/rank_images/rank-1.png" alt="Rank - 1" title="Rank - 1"> </div>
                                                                                <span class="pull-right label text-base font-normal bg-primary inline m-t">14</span>
                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs"><span>JADE EXECUTIVE</span></div>
                                                                                    <div class=""><span class="text-muted">You have 14 JADE EXECUTIVE in your team.</span></div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="col-md-12">
                                                                            <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!-- TAB WITHDRAWAL REQUESTS -->
                                                                <div class="tab-pane" id="tab-packageOveview">
                                                                    <div class="m-t">
                                                                        <ul class="list-group list-group-xs m-b-none">
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="thumb m-r pull-left">
                                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package-images/package-32.png" alt="Package - 32" title="Package - 32"> </div>
                                                                                <span class="pull-right label text-base font-normal bg-dark text-white inline m-t">4 Members</span>
                                                                                <span>
                                                                                          </span>

                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs"><span>Bronze</span></div>
                                                                                    <div class=""><span class="text-muted">You have 4 Bronze package purchases in your team.</span></div>
                                                                                </div>

                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="thumb m-r pull-left">
                                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package-images/package-30.png" alt="Package - 30" title="Package - 30"> </div>
                                                                                <span class="pull-right label text-base font-normal bg-dark text-white inline m-t">4 Members</span>
                                                                                <span>
                                                                                          </span>

                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs"><span>Silver</span></div>
                                                                                    <div class=""><span class="text-muted">You have 4 Silver package purchases in your team.</span></div>
                                                                                </div>

                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="thumb m-r pull-left">
                                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package-images/package-36.png" alt="Package - 36" title="Package - 36"> </div>
                                                                                <span class="pull-right label text-base font-normal bg-dark text-white inline m-t">3 Members</span>
                                                                                <span>
                                                                                          </span>

                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs"><span>Gold</span></div>
                                                                                    <div class=""><span class="text-muted">You have 3 Gold package purchases in your team.</span></div>
                                                                                </div>

                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="thumb m-r pull-left">
                                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package-images/package-37.png" alt="Package - 37" title="Package - 37"> </div>
                                                                                <span class="pull-right label text-base font-normal bg-dark text-white inline m-t">4 Members</span>
                                                                                <span>
                                                                                          </span>

                                                                                <div class="clear ">
                                                                                    <div class="m-b-xs"><span>Platinum</span></div>
                                                                                    <div class=""><span class="text-muted">You have 4 Platinum package purchases in your team.</span></div>
                                                                                </div>

                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                                    </div>

                                                                </div>

                                                                <!-- TAB RECENT JOININGS -->
                                                                <div class="tab-pane" id="tab-recentJoinings">
                                                                    <div class="m-t">
                                                                        <ul class="list-group list-group-xs m-b-none">
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                    <div class="thumb pull-left m-r">
                                                                                        <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/all/themes/eps_diamond/img/avatar.jpg" width="104" height="104" alt=""> </div>
                                                                                    <div class="clear ">
                                                                                        <div class="m-b-xs">
                                                                                            <span class="text-black">
                                                                              Clinton Haley                                </span>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <span class="text-muted">2019-07-30 10:59</span> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                    <div class="pull-right">
                                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Platinum</span> -->
                                                                                        <div class="thumb m-r pull-right"><img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-37.png" alt="Package - 37" title="Package - 37"> </div>
                                                                                    </div>
                                                                                </div>

                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                    <div class="thumb pull-left m-r">
                                                                                        <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/istockphoto-915981818-170667a.jpg" width="104" height="104" alt=""> </div>
                                                                                    <div class="clear ">
                                                                                        <div class="m-b-xs">
                                                                                            <span class="text-black">
                                                                              Tallulah Barber                                </span>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <span class="text-muted">2019-07-24 08:30</span> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                    <div class="pull-right">
                                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Silver</span> -->
                                                                                        <div class="thumb m-r pull-right"><img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-30.png" alt="Package - 30" title="Package - 30"> </div>
                                                                                    </div>
                                                                                </div>

                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                    <div class="thumb pull-left m-r">
                                                                                        <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/20190617_men_mobile.jpg" width="104" height="104" alt=""> </div>
                                                                                    <div class="clear ">
                                                                                        <div class="m-b-xs">
                                                                                            <span class="text-black">
                                                                              Rhona Washington                                </span>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <span class="text-muted">2019-07-24 08:30</span> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                    <div class="pull-right">
                                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Bronze</span> -->
                                                                                        <div class="thumb m-r pull-right"><img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-32.png" alt="Package - 32" title="Package - 32"> </div>
                                                                                    </div>
                                                                                </div>

                                                                            </li>
                                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                    <div class="thumb pull-left m-r">
                                                                                        <img class="img-circle img-responsive" src="https://binary.epixelmlmsoftware.com/sites/binary/files/user-profile-images/jason-emery-fltc-066-4-800x440.jpg" width="104" height="104" alt=""> </div>
                                                                                    <div class="clear ">
                                                                                        <div class="m-b-xs">
                                                                                            <span class="text-black">
                                                                              Bianca Hawkins                                </span>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <span class="text-muted">2019-07-24 08:30</span> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                    <div class="pull-right">
                                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Gold</span> -->
                                                                                        <div class="thumb m-r pull-right"><img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-36.png" alt="Package - 36" title="Package - 36"> </div>
                                                                                    </div>
                                                                                </div>

                                                                            </li>
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
                                            </div>
                                            </div>
                                            <!--<div class="col-md-3 col-sm-6">
                                                <div class="card card-stats" style="min-height: 100px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Available Pool Balance</strong></p>
                                                        <h3 class="card-title">BTC <?php if($total_earning['amount']=='' || $total_earning['amount']==0) { echo '0.00'; } else  { echo number_format($total_earning['amount'],8); } ?></h3>
                                                        <h4 class="card-title">USD <?php if($total_earning['amount']=='' || $total_earning['amount']==0) { echo '0.00'; } else  { echo number_format(($total_earning['amount']*$usd['USD']['last']),2); } ?></h4>
                                                    </div>
                                                </div>
                                            </div>-->

                                         

                                            </div>


                                                <?php 

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

// Code for display total income //
$total_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as total1 from lifejacket_subscription where user_id='$userid'"));

// Code for display last day income //
$yesterday_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype!='Fund Transfer' and (ttype='Referral Bonus' OR ttype='Binary Income' OR ttype='Roi Income' OR ttype='Level Income' OR ttype='Level Income')"));

// Code for display total sponsor income //
$sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total4 from credit_debit where user_id='$userid' and ttype='Referral Bonus'"));

// Code for display total Binary income //
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where user_id='$userid' and ttype='Binary Income'"));

// Code for display total Matching income //
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total6 from credit_debit where user_id='$userid' and ttype='Roi Income'"));

$withdraws=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total6 from withdraw_request where user_id='$userid' and status=1"));

$withdraw=$withdraws['total6'];

// Code for display total downline member //

$matrix_downline12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid' "));
$matrix_downline1=$matrix_downline12['amount'];

$working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid' "));
$working_e_wallet=$working_e_wallet1['amount'];

?>
                                                    
            



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
   <script>
    $("#hide").click(function(){
    $("#p").show();
    $("#hide").hide();
  });
  </script>
  <script src="js/highcharts.js"></script>
  </body>
</html>