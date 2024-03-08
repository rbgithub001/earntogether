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


$invoice_no=$_GET['inv'];
// echo "select * from amount_detail where invoice_no='$invoice_no' ";
// exit();
$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where invoice_no='$invoice_no' "));

 $detailuser=$lfj['user_id'];
// echo "select * from user_registration where user_id='$detailuser'";
// exit();

$userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$detailuser'"));


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
    <script>
function coderHakan()
{
var sayfa = window.open('','','width=500,height=500');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('printArea').innerHTML);
sayfa.document.close();
sayfa.print();
}
</script>
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

            <div class="total_invoice"  id="printArea">

             <div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="../images/logo.png" alt="" width="250px" />
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <h1>invoice</h1>
                            </div>
                            <div class="col-xs-4">
                                <div class="total-purchase">
                                    Total Purchase
                                </div>
                                <div class="amount"><? echo CURRENCY ; ?> <?php echo number_format($lfj['total_amount'],2);?>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4"> 
                                <address>
                                    <strong>OFFICE ADDRESS</strong>
                                    <br>Cognisance Sciences <br>

                                </address>
                            </div>
                            <div class="col-xs-4">
                                <strong>
                                    TO
                                </strong>
                                <br/><?php echo $userdeailss['first_name']." ".$userdeailss['last_name'];?>
                                <br/><?php echo $userdeailss['address'];?>
                                <br/><?php echo $userdeailss['city'];?>, <?php echo $userdeailss['state'];?>, <?php echo $userdeailss['country'];?>
                                <br/>Tel: <?php echo $userdeailss['telephone'];?>
                            </div>
                            <div class="col-xs-4 inv-info">
                                <strong>INVOICE INFO</strong>
                                <br/> <span> Invoice Number</span>  <?php echo $lfj['invoice_no'];?>
                                <br/><span> Invoice Date</span> <?php echo $lfj['payment_date'];?>
                             
                                <br/> <span> Invoice Status</span>  Paid
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ITEM</th>
                              <!--   <th class="hidden-xs">DESCRIPTION</th> -->
                                <th class="">UNIT COST</th>
                                <th class="">QUANTITY</th>
                                <th>TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                             $package123=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_purchase_detail where invoice_no='".$invoice_no."'");
$i=1;
 while($packagepurchase=mysqli_fetch_array($package123))
 {
;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo  $packagepurchase['product_name'];?></td>
                               <!--  <td class="hidden-xs"><?php echo $packagepurchase['remark'];?></td> -->
                                <td class=""><?php echo number_format($packagepurchase['net_price'],2);?></td>
                                <td class=""><?php echo $packagepurchase['quantity'];?></td>
                                <td><?php echo number_format($packagepurchase['price'],2);?></td>
                            </tr>
                            <?php $i++; }?>
                           
                            </tbody>
                        </table>
                        <br/>
                        <br/>

                        <div class="row">
                            <div class="col-xs-8">
                                <!--<h4>PAYMENT METHOD</h4>-->
                                <!--<ul class="list-unstyled">-->
                                <!--    <li>-->
                                       <?php //echo $lfj['payment_mode'];?>
                                <!--    </li>-->
                                   
                                <!--</ul>-->
                            </div>
                            <div class="col-xs-4">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td><? echo CURRENCY ; ?> <?php echo number_format($lfj['net_amount'],2);?></td>
                                    </tr>
                                   
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong><? echo CURRENCY ; ?> <?php echo number_format($lfj['total_amount'],2);?></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <!--  -->

                    </div>
                </div>


                </div>

            
             <div class="pull-left">
                                    <a class="btn btn-danger" onClick="coderHakan()"><i class="fa fa-print"></i> Print</a>
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
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