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




if(isset($_POST['update']))
{
  $profit=$_POST['Account2'];
  $binary=$_POST['Account3'];
  
$expire=date('Y-m-d');
$date=date('Y-m-d');

$next_date1 = date('Y-m-d', strtotime($date . ' +1 day'));
$stop_date1 = date('Y-m-d', strtotime($date . ' +1 day'));
$last_date1 = date('Y-m-d', strtotime($date . ' -7 day'));
//mysqli_query($GLOBALS["___mysqli_ston"], "insert into test_cron values(NULL,'Kamlesh','$expire','Daily Binary Bonus')");
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

//insert commission in user ewallet by fetching from level income table code start here

/*for after first pair code start here*/
$companyturn=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as newsum from working_e_wallet"));
  $companyturnover=$companyturn['newsum'];
$profit_share=($companyturnover*$profit)/100;

$date1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from commission_charges where id=1 "));
$amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='1'"));
    $spc=$_POST['Account3'];
 $binary_share=($profit_share*$binary)/100;

$rd=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name='Paid Member'");
while($rds=mysqli_fetch_array($rd))
{
  $uid=$rds['user_id'];




$lefts=0;
    $rights=0;
    $vccunt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$uid' and user_rank_name='Paid Member'");
    while($vccunt1=mysqli_fetch_array($vccunt))
    {
      $left=0;
      $right=0;
      $down=$vccunt1['user_id'];


                  $left=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$uid' and down_id='$down' and leg='left'"));            
                   
                            if($left>0)
                            {
                              $lefts++;
                            }
                            else
                            {
                              $lefts=$lefts;
                            }

                            $right=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$uid' and leg='right' and down_id='$down'"));
                           
                            if($right>0)
                            {
                              $rights++;
                            }
                            else
                            {
                              $rights=$rights;
                            }

                            if(($lefts>=1 && $rights>=1) )
                            {
                              break;
                            }
     

    }


 
if(($lefts>=1 && $rights>=1))
{

 $uid=$rds['user_id'];
 $uid=$rds['user_id'];





$leftamt1=0;
$left_condi=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$uid' and leg='left'");

    while($vccunt111=mysqli_fetch_array($left_condi))
    {

 $left_userid=$vccunt111['down_id'];
$working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
  $leftamt1=$leftamt1+$working_e_wallet1['amount'];

    }


    $rightamt1=0;
$left_condi11=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$uid' and leg='right'");
    while($vccunt111=mysqli_fetch_array($left_condi11))
    {

 $left_userid=$vccunt111['down_id'];
$working_e_wallet2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
 $working_e_wallet2['amount'];
  $rightamt1=$rightamt1+$working_e_wallet2['amount'];

    }

//if($leftamt1>=1 && $rightamt1>=1)
    if($leftamt1>=1 && $rightamt1>=1)
{

//{

//$querys1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as totalleftamount from manage_bv_history where status='0' and income_id='$uid' and position='left' and date<='$date'"));
//$leftamt1=$querys1['totalleftamount'];

//$querys12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as totalrightamount from manage_bv_history where status='0' and income_id='$uid' and position='right' and date<='$date'"));
//$rightamt1=$querys12['totalrightamount'];

$userpack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$uid' order by id desc limit 1"));


$capping1=15000;



if($leftamt1<=$rightamt1)
{
$lesser_bv=$leftamt1;
$carry=$rightamt1-$leftamt1;
$pos='right';
}
else
{
$lesser_bv=$rightamt1;  
$carry=$leftamt1-$rightamt1;
$pos='left';
}


if($carry>0)
{
  
mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history1 values(NULL,'$uid','$uid','1','$carry','$pos','Carry Forward BV','$next_date1',CURRENT_TIMESTAMP,'0','$carry')");
}

$invoice=rand(1000000001,9999999999);


if($lesser_bv>0)
{           

         $lesser_bv1=$lesser_bv/$companyturnover;
            
            $lesser_bv12=$lesser_bv1*$binary_share;
         $amount2=$lesser_bv12; 
         if($amount2>$capping1)
         {

           
            $amount2=$capping1;
           
         }
         else
         {
          $amount2=$amount2;
         }
            
      

    $final_amt=$amount2;
    $tds=0;
$charge=0;
$total_amt=$final_amt;
    if($total_amt>0)
    {
mysqli_query($GLOBALS["___mysqli_ston"], "update roi_e_wallet set amount=(amount+$total_amt) where user_id='".$uid."'");




  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','$uid','$total_amt','0','$lesser_bv','$uid','123456','$expire','Binary Income','$profit','$spc','Binary Income','$invoice','$companyturnover','0','Payout Wallet','$urls')");
  }

  


    
}  
mysqli_query($GLOBALS["___mysqli_ston"], "update lifejacket_subscription set payout_status=1 where user_id='".$uid."'");
  mysqli_query($GLOBALS["___mysqli_ston"], "update manage_bv_history set status='1' where date<'$stop_date1' and income_id='$uid'");



}
}

/*for after first pair code end here*/

}




header("location:binary-income-report-daily.php");exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
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
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
     <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" style="min-height: 1000px;">

            <!-- header section start-->
    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                   Dashboard
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                 <?php include("top-menu1.php");?>
           
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

            <div class="row">
                

				 
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <section class="panel" style="background-color: #f1bebe;">
                        <header class="panel-heading">
                            UPDATE BINARY INFORMATION<span style="float:right;color:red;"><?php echo @$_GET['msg1'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                               <div class="form-group">
                                  <div class="col-sm-10 text-center">
                                      <h4><?php
                                      $pb=0;
                                       $companyturn=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as newsum from working_e_wallet"));
                                     
                                         echo 'Trading Fund = '.number_format($companyturn['newsum'],5);
                                        ?>
                                        
                                      </h4>
                                      
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="inputPassword1" class="col-sm-2 col-sm-2 control-label">Profit Share(%)</label>
                                  <div class="col-sm-10">
                                      <input type="text" name="Account2" value="<?php echo $f['ac_no'];?>" class="form-control" id="inputPassword1" placeholder="Enter the Profit Share" required>
                                      
                                  </div>
                              </div>
                              <div class="form-group">
                                    <label for="inputPassword1" class="col-sm-2 col-sm-2 control-label">Binary Income(%)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Account3" value="<?php echo $f['bank_nm'];?>" class="form-control" placeholder="Enter the Binary Income(%)" required>
                                        
                                    </div>
                              </div>
                            <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                   <input type="submit" name="update" value="Update" class="btn btn-primary" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
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

<!--Data Table-->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.tableTools.min.js"></script>
<script src="js/bootstrap-dataTable.js"></script>
<script src="js/dataTables.colVis.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/dataTables.scroller.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<!--data table init-->
<script src="js/data-table-init.js"></script>

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

</body>
</html>