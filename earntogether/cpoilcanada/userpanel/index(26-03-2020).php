<?php include("header.php");

$left_jan   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-01-01')."' AND l_date<='".date('Y-01-31')."' AND leg ='left'"));
$left_feb   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-02-01')."' AND l_date<='".date('Y-02-31')."' AND leg ='left'"));
$left_march = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-03-01')."' AND l_date<='".date('Y-03-31')."' AND leg ='left'"));
$left_April = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-04-01')."' AND l_date<='".date('Y-04-31')."' AND leg ='left'"));
$left_may   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-05-01')."' AND l_date<='".date('Y-05-31')."' AND leg ='left'"));
$left_june  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-06-01')."' AND l_date<='".date('Y-06-31')."' AND leg ='left'"));
$left_july  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-07-01')."' AND l_date<='".date('Y-07-31')."' AND leg ='left'"));
$left_aug   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-08-01')."' AND l_date<='".date('Y-08-31')."'  AND leg ='left'"));
$left_sep   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-09-01')."' AND l_date<='".date('Y-09-31')."'  AND leg ='left'"));
$left_oct   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-10-01')."' AND l_date<='".date('Y-10-31')."'  AND leg ='left'"));
$left_nov   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-11-01')."' AND l_date<='".date('Y-11-31')."'  AND leg ='left'"));
$left_dec   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-12-01')."' AND l_date<='".date('Y-12-31')."'  AND leg ='left'"));

$right_jan   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-01-01')."' AND l_date<='".date('Y-01-31')."' AND leg ='right'"));
$right_feb   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-02-01')."' AND l_date<='".date('Y-02-31')."' AND leg ='right'"));
$right_march = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-03-01')."' AND l_date<='".date('Y-03-31')."' AND leg ='right'"));
$right_April = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-04-01')."' AND l_date<='".date('Y-04-31')."' AND leg ='right'"));
$right_may   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-05-01')."' AND l_date<='".date('Y-05-31')."' AND leg ='right'"));
$right_june  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-06-01')."' AND l_date<='".date('Y-06-31')."' AND leg ='right'"));
$right_july  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-07-01')."' AND l_date<='".date('Y-07-31')."' AND leg ='right'"));
$right_aug   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-08-01')."' AND l_date<='".date('Y-08-31')."'  AND leg ='right'"));
$right_sep   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-09-01')."' AND l_date<='".date('Y-09-31')."'  AND leg ='right'"));
$right_oct   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-10-01')."' AND l_date<='".date('Y-10-31')."'  AND leg ='right'"));
$right_nov   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-11-01')."' AND l_date<='".date('Y-11-31')."'  AND leg ='right'"));
$right_dec   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-12-01')."' AND l_date<='".date('Y-12-31')."'  AND leg ='right'"));


$month__left_result = array($left_jan,$left_feb,$left_march,$left_April,$left_may,$left_june,$left_july,$left_aug,$left_sep,$left_oct,$left_nov,$left_dec);
$month_right_result = array($right_jan,$right_feb,$right_march,$right_April,$right_may,$right_june,$right_july,$right_aug,$right_sep,$right_oct,$right_nov,$right_dec);
$final_array = array('left' => $month__left_result,'right'=>$month_right_result);
$left_final = $final_array['left'];
$right_final = $final_array['right'];

//echo "select COUNT(user_registration.id) as total ,country.iso as country_name from user_registration  INNER JOIN country where user_registration.country=country.name and user_registration.ref_id='".$f['user_id']."' GROUP BY country.iso ";die();
$user = mysqli_query($GLOBALS["___mysqli_ston"], "select COUNT(user_registration.id) as total ,country.iso as country_name from user_registration  INNER JOIN country where user_registration.country=country.name and user_registration.ref_id='".$f['user_id']."' GROUP BY country.iso ");
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
    <?php include("title.php");?>
            <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <script src="js/jquery-1.11.2.min.js"></script>
   



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

.card-stats .card-content {
    text-align: right;
    padding-top: 10px;
    padding: 8px 20px;
    position: relative;
}
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
                                        #example2 {
                                          padding-top: 22px;
                                          background-color: white;
                                          box-shadow: 0 0 2px 0px #c7c3c3;
                                        }
                                        #btn{
                                            border-radius: 2px;
                                            font-size: 14px;
                                            padding: 4px 5px;
                                            outline: none !important;
                                            font-family: 'Nunito Sans', sans-serif;
                                        }
 
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
   
 
  

<!-- <?php if($f['user_rank_name']=='Free Member'){?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
<?php } ?> -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
$sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total4 from credit_debit where user_id='$userid' and ttype='Referral Bonus'"));
$binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total5 from credit_debit where user_id='$userid' and ttype='Binary Income'"));
$matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total6 from credit_debit where user_id='$userid' and ttype='Roi Income'"));
$withdraws=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(request_amount) as total6 from withdraw_request where user_id='$userid' and status=1"));
$withdraw=$withdraws['total6'];

$left_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as left_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description!='Carry Forward BV' AND position='left'"));
$left_investments = $left_investment['left_invest'];

$right_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as right_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description!='Carry Forward BV' AND position='right'"));
$right_investments = $right_investment['right_invest'];


$left_investment111=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as left_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description='Carry Forward BV' AND position='left'"));
$left_investments1= $left_investment111['left_invest'];

$right_investment111=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as right_invest FROM `manage_bv_history` WHERE income_id='$userid' AND description='Carry Forward BV' AND position='right'"));
$right_investments1 = $right_investment111['right_invest'];


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



                          <!---pop up modal code-->

                            <!-- Modal -->
                    
                                <!--pop modal code end-->

                                    <!-- PAGE TITLE -->
                                    <section id="page-title" class="row">

                                        <div class="col-md-12 col-sm-12" id="example2">
                                            <!-- <div class="col-md-8 col-sm-8">
                                            <h2>Dashboard ( Your User Id : <?php echo $f['user_id'];?> / Username : <?php echo $f['username'];?> / Rank : <?php echo $f['user_rank_name'];  ?> )</h2></div> -->

                                            <div class="col-md-6 col-sm-6">
                                            <h2 class="dashboard">DASHBOARD ( MY ID : <?php echo $f['user_id'];?>/<?php echo strtoupper($f['username']);?> )</h2>
                                            </div>


                                            <!-- <div class="col-md-4 col-sm-4">
                                            <?php $pc=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select status_maintenance.name from lifejacket_subscription inner join status_maintenance on lifejacket_subscription.package=status_maintenance.id where lifejacket_subscription.user_id='".$f['user_id']."' and lifejacket_subscription.status='Active' order by lifejacket_subscription.id desc limit 0,1"));  ?>
                                            <h2 style="float:right"> <?php if($f['user_rank_name']=='Free Member'){ echo "Free Member"; }else{ echo "Paid Member"; }?> </h2></div> -->


                                           <div class="col-md-6 col-sm-6">
                                            <?php if($f['user_rank_name']=='Free Member'){ ?>
                                            <div class="col-md-7">
                                            <h2 style="color:#1f1f1f;font-size: 16px;font-weight: bold;">Account Status : Inactive Member </h2>
                                            </div>
                                            <div class="col-md-5" style="float: left;"><a href="package-upgrade.php" class="btn btn-primary">Invest Your Fund</a>
                                            </div>
                                            <?php }else{
                                            ?>
                                            <div class="col-md-9" style="padding-bottom: 22px; float: right;">
                                                <h2 style="color:#1f1f1f;font-size: 16px;font-weight: bold;">My Package :                                    <?php
  $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$f['user_plan']."'"));

if ($f['user_plan']!='') {
  echo $sqlqw1['name'];
}else{
   echo "Free User";
}

                                    ?> </h2>
                                            </div> 
                                        
                                            <?php } ?>

                                         </div>

                                        </div>

                                    </section>
                                    <!-- / PAGE TITLE -->
                                    <br/>

                                    <div class="container-fluid">
                                     

                                     <div class="row">
                                       <div class="col-md-6">
                                           <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats blue-bg">
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
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="total-income.php">See detailed</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats blue-bg">
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
                                       </div>
                                  <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats blue-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>ROI Earning</strong></p>
                                                        <h3 class="card-title"><?php echo '$'; ?> <?php if($matching_earning['total6']=='' || $matching_earning['total6']==0) { echo '0.00'; } else  { echo number_format($matching_earning['total6'],2); } ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="roi-income-report.php">See detailed</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                             <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 100px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Direct Income</strong></p>
                                                        <h3 class="card-title">$ <?php echo number_format($direct_incomes,2); ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="sponsor-income.php">See detailed report</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>

                                       <div class="row">

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

                                            <div class="col-md-6 col-sm-6">
                                                <div class="card card-stats blue-bg">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/family-tree.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="category"><strong>Right Downline</strong></p>
                                                        <h3 class="card-title"><?php echo $total_downline_right; ?></h3>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="stats">
                                                            <i class="material-icons text-info">info</i>
                                                            <a href="downline-member-report.php">See detailed</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                 
                                       <div class="col-md-6 col-sm-6">
                                         <figure class="highcharts-figure">
                                            <div id="container111"></div>
                                         </figure>    
                                       </div>    
                                   </div>


                                        <div class="row">

                                            <div class="col-md-3 col-sm-6">
                                                <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                    <div class="card-header">
                                                        <div class="icon icon-warning">
                                                            <img src="images/dollar-symbol.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-content"><!-- Investments -->
                                                        <p class="category"><strong>My Total Investment</strong></p>
                                                        <h3 class="card-title">$ <?php echo $working_e_wallet; ?></h3>
                                                    </div>

                                                </div>
                                            </div>   
                                            <div class="col-md-3 col-sm-6">
                                                    <div class="card card-stats blue-bg" style="min-height: 120px;">
                                                        <div class="card-header">
                                                            <div class="icon icon-warning">
                                                                <img src="images/dollar-symbol.png" alt="" />
                                                            </div>
                                                        </div>
                                                        <div class="card-content">
                                                            <p class="category"><strong>Total Team Investment</strong></p>
                                                            <h4 class="card-title">L: <?php echo number_format($left_investments,2); ?> : R:<?php echo number_format($right_investments,2); ?></h4>
                                                             <p class="category"><strong>Pending Team Investment</strong></p>
                                                            <h4 class="card-title">L: <?php echo number_format($left_investments1,2); ?> : R:<?php echo number_format($right_investments1,2); ?></h4>
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
                                                            <p class="category"><strong>ROI Wallet Balance</strong></p>
                                                            <h3 class="card-title">$ <?php echo number_format($roi_e_wallet1,2); ?></h3>
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
                                                            <p class="category"><strong>IB Wallet Balance</strong></p>
                                                            <h3 class="card-title">$ <?php echo number_format($matrix_downline1,2); ?></h3>
                                                        </div>
                                                    
                                                    </div>
                                            </div>

                                            
                                                      

                                                    <div class="clearfix"></div>
                                          </div>

                                                    
            <div class="">

              <div class="">
                <div class="row">
                <div class="col-md-6">
                  <section class="card hovercard" style="border-radius: 0px !important;margin:0;">
                <div class="cardheader"></div>
                 <!--<img alt="" src="images/646E1DE9-4C19-4273-99D8-E13A0C3CC433.jpg">-->
                    <div class="avatar">
                        <img alt="" src="<?php echo $userimage;?>">
                    </div>

                    <div class="info">
                        <div class="title">
                            <a href="#"><?php echo $f['first_name']." ".$f['last_name'];?></a>
                        </div>
                          <div class="desc" style="font-size: 16px;">User Id : <?php echo $f['user_id'];?></div>
                            <!-- <div class="desc" style="font-size: 16px;">Username : <?php echo $f['username'];?></div> -->

                              <!-- <div class="desc" style="font-size: 16px;">Activation Date : <?php 

                               $dert=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$f['user_id']."' and status='Active' order by id desc limit 0,1"));

                               echo $dert['date'];?></div> -->

                        <div class="desc" style="font-size: 16px;">Sponsor Id : <?php echo $f['ref_id'];?></div>
   <div class="desc" style="font-size: 16px;">Activation : <?php if($f['user_rank_name']=='Free Member'){ echo "Inactive"; }else{ echo "Active"; }?> </div>

                        <!-- <div class="desc" style="font-size: 16px;">Sponsor Name : <?php $fdert=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select first_name, last_name from user_registration where user_id='".$f['ref_id']."'"));

                        echo $fdert['first_name']." ".$fdert['last_name'];?></div> -->

                    </div>



                    

                  </section>

                  <div class="card card-stats white2-bg">
                        <div class="card-content">
                          <div id="block-afl-widgets-afl-block-promotion-tools">

                           
                          <div class="row">
                            <div class="col-md-6">
                              <h3>Left Joining Link</h3>
                              <p><a href="http://182.76.237.227/~syscheck/farex/userpanel/register.php?referral=<?php echo $f['username'];?>&pos=left" style="color: blue;">farex.com?pos=Left</a></p>
                            
                              <div class="social-medi-icons padder-md">
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=left">
                                  <img class="img-circle img-responsive" src="images/facebook.png" alt="">
                                </a>
                                <a target="_blank" href="http://twitter.com/share?url=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=left">
                                  <img class="img-circle img-responsive" src="images/twitter.png" alt="">
                                </a>
                                <a target="_blank" href="https://api.whatsapp.com/send?text=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=left">
                                  <img class="img-circle img-responsive" src="images/whatsapp2.png" alt="">
                                </a>
                                <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=left">
                                  <img class="img-circle img-responsive" src="images/google-plus.png" alt="">
                                </a>
                              </div>
                            </div>
                         
                            <div class="col-md-6">
                              <h3>Right Joining Link</h3>
                              <p><a href="http://182.76.237.227/~syscheck/farex/userpanel/register.php?referral=<?php echo $f['username'];?>&pos=right" style="color: blue;" target="_blank">farex.com?pos=Right</a></p>

                           
                              <div class="social-medi-icons padder-md">
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=right">
                                  <img class="img-circle img-responsive" src="images/facebook.png" alt="">
                                </a>
                                <a target="_blank" href="http://twitter.com/share?url=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=right">
                                  <img class="img-circle img-responsive" src="images/twitter.png" alt="">
                                </a>
                                <a target="_blank" href="https://api.whatsapp.com/send?text=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=right">
                                  <img class="img-circle img-responsive" src="images/whatsapp2.png" alt="">
                                </a>
                                <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://182.76.237.227/~syscheck/farex/register.php?referral=<?php echo $f['username'];?>&pos=right">
                                  <img class="img-circle img-responsive" src="images/google-plus.png" alt="">
                                </a>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                    </div>

                </div>
                

                                            <div class="col-md-6">
                                                  
                                                  <div id="world-map-gdp" style=" height: 400px;margin: auto;"></div>  
                                               
                                              </div>

                                            </div> <!-- / col-md-6 -->


                                   
                                <div class="row">
                                            <div class="col-md-6 col-sm-6">
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
                                                                                              <span class="">BINARY EARNING </span>
                                                                                          </div>
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 6 month(s) 20 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$' ?> <?php if($binary_earning['total5']=='' || $binary_earning['total5']==0) { echo '0.00'; } else  { echo number_format($binary_earning['total5'],2); } ?>                           </span>
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
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 6 month(s) 20 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$'; ?> <?php if($matching_earning['total6']=='' || $matching_earning['total6']==0) { echo '0.00'; } else  { echo number_format($matching_earning['total6'],2); } ?>                             </span>
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
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 7 month(s) 9 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              $ <?php echo number_format($direct_incomes,2); ?>                          </span>
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
                                                                                          <!--  <div class="col-xs-2 m-t-xs">
                                                                            <span> 8 month(s) 8 day(s)</span>
                                                                          </div> -->
                                                                                          <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                              <span class="text-md text-black">
                                                                              <?php echo '$'; ?> <?php if($yesterday_earning['total2']=='' || $yesterday_earning['total2']==0) { echo '0.00'; } else  { echo number_format($yesterday_earning['total2'],2); } ?>                       </span>
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
                                            <div class="col-md-6 col-sm-6">
                                              <div class="region region-grid-block-right">
                                                <div id="block-afl-widgets-afl-block-my-organisations" class="block block-afl-widgets clearfix">

                                                    <div class="panel wrapper">
                                                        <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Team Performance</h4>
                                                        <div class="nav-tabs-alt  hidden-xs">
                                                            <ul class="nav nav-tabs nav-justified">
                                                                <!--<li class="active my-organisation-tabitem">-->
                                                                <!--    <a data-target="#tab-top-earners" href="#" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>-->
                                                                <!--</li>-->
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
                                                                    <!--<li class="my-organisation-tabitem nav-item active">-->
                                                                    <!--    <a data-target="#tab-top-earners" href="#" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>-->
                                                                    <!--</li>-->
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

        </div> <!-- / container-fluid --><br /><br />

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




  <script>
$(document).ready(function(){
    $('.highcharts-credits').remove();
});
</script>

<?php if($dfg['status']==0) { ?>

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

   /* var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());*/

  });
  </script>
   <script>
    $("#hide").click(function(){
    $("#p").show();
    $("#hide").hide();
  });
  </script>
  
  <script>
Highcharts.chart('container111', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Left & Right Monthly Downline'
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
        name: 'Left',
        data: <?php echo json_encode($left_final); ?>
    }, {
        name: 'Right',
        data: <?php echo json_encode($right_final); ?>
    }]
});
</script>

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

 <script>
 
/*               var gdpData = {
                      "AF": 16.63,
                      "AL": 11.58,
                      "DZ": 158.97,
                      "IN":  200,
                      
                     
                    
                      
                    };*/
                   
                var gdpData = <?php echo $gdp_count; ?>;
                setTimeout(function(){ 
                    
                    
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
                    
                    
                }, 500);
                
             
                 
            
             
    </script>

  </body>
</html>