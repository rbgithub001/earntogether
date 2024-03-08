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
        <div class="body-content" >

            <!-- header section start-->
           <?php include("top-menu.php");?>
            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                   Bonus Summary
                </h3>
             
            <!-- page head end-->
<?php $result=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT (select sum(credit_amt) from credit_debit where ttype='Referral Bonus') as sponsor_income,(select sum(credit_amt) from credit_debit where ttype='Binary Income') as binary_income,(select sum(bv) from manage_bv_history) as pairing_income,(select sum(credit_amt) from credit_debit where ttype='Unilevel Income') as unilevel_income,(select sum(credit_amt) from credit_debit where ttype='Leadership Income') as leadership_income,(select sum(credit_amt) from credit_debit where ttype='CTO Income') as cto_income,(select sum(net_amount) from amount_detail )as total_product_sale,(select sum(amount) from lifejacket_subscription)as total_package_sale"));?>
            <!--body wrapper start-->
            <div class="wrapper">
                <!--state overview start-->
                <div class="row state-overview">
                   
                    <div class="col-lg-2 col-sm-6">
                        <section class="panel d-green">
                            <div class="value gray">
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['sponsor_income'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Sponsor Income</p>
                                
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-cogs"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total Sponsor Income</p>
                            </div>
                        </section>
                    </div>
                 
                   
                    <div class="col-lg-2 col-sm-6">
                        <section class="panel d-green">
                            <div class="value gray">
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['binary_income'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Binary Income</p>
                                
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-cogs"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total Binary Income</p>
                            </div>
                        </section>
                    </div>
                  
                   
                    <div class="col-lg-2 col-sm-6">
                        <section class="panel d-green">
                            <div class="value gray">
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['pairing_income'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Pairing Income</p>
                                
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-cogs"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total Pairing Income</p>
                            </div>
                        </section>
                    </div>
                   
                   
                    <div class="col-lg-2 col-sm-6">
                        <section class="panel d-green">
                            <div class="value gray">
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['unilevel_income'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Unilevel Income</p>
                                
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-cogs"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total Unilevel Income</p>
                            </div>
                        </section>
                    </div>
                
                   
                    <div class="col-lg-2 col-sm-6">
                        <section class="panel d-green">
                            <div class="value gray">
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['leadership_income'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Leadership Income</p>
                                
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-cogs"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total Leadership Income</p>
                            </div>
                        </section>
                    </div>
                
                   
                    <div class="col-lg-2 col-sm-6">
                        <section class="panel d-green">
                            <div class="value gray">
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['cto_income'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total CTO Income</p>
                                
                            </div>
                            
                            <div class="symbol">
                                <i class="fa fa-cogs"></i>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total CTO Income</p>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <section class="panel d-blue" >
                            <div class="value gray" style='float:left;width:32%;'>
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['total_package_sale'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Package Purchase</p>
                                
                            </div>
                            <div class="value gray" style='float:left;width:2%;'>
                                <h1 >
                                    +
                                </h1>
                                <p></p>
                                
                            </div>

                            <div class="value gray" style='float:left;width:32%;'>
                                <h1 class="timer" data-from="0" data-to="<?php echo $result['total_product_sale'];?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Product Purchase</p>
                                
                            </div>

                                <?php
                                 $totsl= $result['total_product_sale']+$result['total_package_sale'];
                                ?>
                                <div class="value gray" style='float:left;width:2%;'>
                                <h1 >
                                    =
                                </h1>
                                <p></p>
                                
                            </div>

                            <div class="value gray" style='float:left;width:32%;'>
                                <h1 class="timer" data-from="0" data-to="<?php echo $totsl;?>"
                                    data-speed="1000">
                                    <!--320--> RM
                                </h1>
                                <p>Total Sales</p>
                                
                            </div>
                            
                            <div class="symbol">
                               <b></b>
                            </div>
                            
                            <div class="drafts2">
                                <p>Total Sales</p>
                            </div>
                        </section>
                    </div>


                </div>
                <!--state overview end-->
                
               

               
               

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

</body>
</html>