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
  

  $date=date('Y-m-d');
// $date= date('Y-m-d',strtotime($date1.'+1 Day'));

 $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=1"));
 $rowww1=$sqlqw1['sponsor_reward'];


 $resdt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `lifejacket_subscription` where invest_type='Open Investment'");


while($resdt1=mysqli_fetch_array($resdt))

{

  $user=$resdt1['user_id'];
  $uid=$user;
  $working_e_wallet2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$uid' "));
  $pb=$resdt1['amount'];
  
  $package=1;
  $lifejacket_id=$resdt1['lifejacket_id'];
  $pack_date=$resdt1['date'];

  $date1=date_create($pack_date);
  $date2=date_create($date);
  $diff=date_diff($date1,$date2);
  $days_diff=$diff->format("%a");
  $days_diff=$days_diff-1;



  // if($package==1)

  // {

  //     $first=$rowww1; 

  // }

  
  
  // else

  // {

  //       $first=0; 

  // }

   // $first1=$first*$days_diff;
   // $first1=$first*1;
  $first1=$profit;


  $rwallet=$pb*$first1/100;  

  $invoice_no=$resdt1['invoice_no'];


  $invoice_no=rand(1000000001,9999999999);


  if($rwallet!='' && $rwallet>0)

  {

   $data=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where ttype='Roi Income' AND receive_date='".date('Y-m-d')."' and TranDescription='Open Investment'"));
    if($data<=0)
    {

 // mysqli_query($GLOBALS["___mysqli_ston"], "update working_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");

  mysqli_query($GLOBALS["___mysqli_ston"], "update roi_e_wallet set amount=(amount+$rwallet) where user_id='".$uid."'");

$last_life=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$uid' and pb>'0' order by id desc limit 0,1"));


mysqli_query($GLOBALS["___mysqli_ston"], "update lifejacket_subscription set pb=(pb+$rwallet) where id='".$last_life['id']."'");


  
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$uid','$rwallet','0','0','$uid','123456','$date','Roi Income','Open Investment','$pb','$lifejacket_id','$invoice_no','$first1','0','ROI Wallet',CURRENT_TIMESTAMP,'$urls')");  
     }else{
      header("location:edit_daily_roi.php?msg=Not Allowed,You have already Closed!!");exit;

     }
}

}
  

header("location:roi-income-report-daily.php");exit;
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
                             Global investment Closing<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                               <div class="form-group">
                                  <label for="inputPassword1" class="col-sm-2 col-sm-2 control-label">Roi(%)</label>
                                  <div class="col-sm-10">
                                      <input type="text" name="Account2" value="<?php echo $f['ac_no'];?>" class="form-control" id="inputPassword1" placeholder="Enter the Roi" required>
                                      
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