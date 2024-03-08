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

$checkid=$_GET['id'];


$invoice_no=$_GET['invoice_no'];
// echo "select * from amount_detail where invoice_no='$invoice_no' ";
// exit();

$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from billing_detail where invoice_no='$invoice_no' "));

 $custid=$lfj['user_id'];
  $detailuser=$lfj['seller_id'];

// echo "select * from user_registration where user_id='$detailuser'";
// exit();

$userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$detailuser'"));
$customerdeailss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from customers where user_id='$custid'"));


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
                 
                 <div class="panel-body" id="printablediv">
							
                               

                                



                               
                            </div>
                 
                 
                   <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="../userpanel/images/logo.png" alt="" width="150px" />
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <h1>invoice</h1>
                            </div>
                            <div class="col-xs-4">
                                <div class="total-purchase">
                                    Total Amount
                                </div>
                                <div class="amount"><?=CURRENCY ?> <?php echo number_format($lfj['net_amount'],2);?>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="container">

                                    <div class="col-xs-4 col-xs-12">
                                          <address>
                                            <strong>Paid to :</strong>
                                            <br><span> <?php echo $userdeailss['first_name']." ".$userdeailss['last_name'];?> </span>
                                        <br><span>Address: <?php echo $userdeailss['address'];?></span> 
                                        <br><span>City/State/Country:<?php echo $userdeailss['city'];?>/<?php echo $userdeailss['state'];?>/<?php echo $userdeailss['country'];?></span><br>
                                         <span>Pin:  <br>    <?php echo $userdeailss['zipcode'];?></span>
                                     <br><span>Tel: <?php echo $userdeailss['telephone'];?></span>
                                        </address>
                                    </div>
                                    

                                    <div class="col-xs-4 col-xs-12">
                                   <address>
                                            <strong>Buyer :</strong>
                                            <br><span> <?php echo $customerdeailss['first_name']." ".$customerdeailss['last_name'];?> </span>
                                        <br><span>Address: <?php echo $customerdeailss['address'];?></span> 
                                        <br><span>City/State/Country:<?php echo $customerdeailss['city'];?>/<?php echo $customerdeailss['state'];?>/<?php echo $customerdeailss['country'];?></span><br>
                                         <span>Pin:  <br>    <?php echo $customerdeailss['zipcode'];?></span>
                                     <br><span>Tel: <?php echo $customerdeailss['telephone'];?></span>
                                        </address>
                               
                                    </div>

                                    <div class="col-xs-4 col-xs-12 inv-info">

                                        <strong>INVOICE INFO</strong>

                                        <br> <span> Invoice Number</span>   <?php echo $lfj['invoice_no'];?>
                                        <br><span> Invoice Date</span>    <?php echo $lfj['payment_date'];?>
                                        <!-- <br/> <span> Expiry Date</span>     -->

                                         <br> <span>User ID</span>      <?php echo $lfj['seller_id'];?>
                                         <br> <span>Email ID :</span>    <?php echo $userdeailss['email'];?>
                                        <!--<br><span>Bank Ref No :</span> N/A-->
                                        <!--  <br><span style="color:green;"><b>Stockist Id :</b></span> 2025040-->
                                        <!-- <br><span style="color:green;"><b>Stockist Name :</b></span> Dehradun Store-->
                                        <!--<br><span style="color:green;"><b>Receiver Id :</b></span> -->
                                </div>
                                </div>
                        <br/>
                        <br/>
                        <br/>
                        

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>SERVICE NAME</th>
                                 <th>SERVICE TYPE</th>
                              <!--   <th class="hidden-xs">DESCRIPTION</th> -->
                                <th class="">SERVICE PRICE</th>
                                 <th class="">SALE PRICE</th>
                                <th>TOTAL PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $propertydet=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='".$lfj['property_id']."'"));
                          $propertytt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where category_id='".$lfj['property_type']."'"));
                                   // echo $propertytt['name']." / ".$propertydet['title'];
                                    
                          //  $package123=mysqli_query($GLOBALS["___mysqli_ston"], "select * from purchase_detail where invoice_no='".$_GET['invoice_no']."'");
                           $i=1;
                          //  while($packagepurchase=mysqli_fetch_array($package123)){
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo  $propertydet['title'];?></td>
                                <td> <?= $propertytt['name']?></td>
                                 <td class=""><?=CURRENCY ?> <?php echo number_format($lfj['actual_property_amount'],2);?></td>
                                <td class=""><?=CURRENCY ?> <?php echo number_format($lfj['net_amount'],2);?></td>
                                <td><?=CURRENCY ?> <?php echo number_format($lfj['net_amount'],2);?></td>
                            </tr>
                            <?php //$i++; }?>
                           
                            </tbody>
                        </table>
                        <br/>
                        <br/>
                         <br/>
                        <br/>
                         <br/>
                        <br/>
                        
                        
                         <div class="container">

                                    <div class="col-xs-4 col-xs-12">
                                        <h4>PAYMENT METHOD</h4>
                                        <ul class="list-unstyled">
                                            <li><strong>Payment Mode :</strong> <?php echo $lfj['payment_type'];?></li>
                                            <!--<li> <strong>Order ID : </strong>order_IykcwHkp8z3uZD</li>-->
                                           <li><strong>Payment Status :</strong>Paid</li>
                                         </ul>

                                    </div>

                                    <div class="col-xs-4 col-xs-12">
                                        <ul class="list-unstyled">
                                        </ul>
                                    </div>
                                    <div class="col-xs-4 col-xs-12">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td><?php echo CURRENCY.' '. number_format($lfj['net_amount'],2);?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>GRAND TOTAL</strong></td>
                                                <td><strong><?php echo CURRENCY.' '. number_format($lfj['net_amount'],2);?></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          <div class="container">
                                </div><br><br>
                                <div class="container">
                                    <div class="col-xs-12 col-xs-12">
                                        <div class="pull-left">
                                              <a class="btn btn-danger" onClick="coderHakan()"><i class="fa fa-print"></i> Print</a>

                                            <!--<a href="javascript:void(0);" class="btn btn-primary hidden-print" id="print" style="float:right;" onclick="javascript:printDiv('printablediv')" target="_blank"><span aria-hidden="true"></span> Print</a>-->

                                        </div>

                                        <div class="pull-right">

                                        </div>

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