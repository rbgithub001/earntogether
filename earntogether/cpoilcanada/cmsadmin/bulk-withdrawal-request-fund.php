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

?><!DOCTYPE html>
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
  <!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script> -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
     <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/> -->
<!-- <script src="http://code.jquery.com/jquery-1.8.2.js"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script> -->




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

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                Payment Details
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <?php

                                if(isset($_POST['Show']) && !empty($_POST['Show']) && ($_POST['Show'] == 'Transfer Fund') ){

                                  $request_ids =  $_POST['list'];
                                  $i = 1;
                                  $usd_total = 0;
                                  $btc_total = 0;
                                  ?>

                                  <form action="send-bulk-bitcoin-response.php" method="post" onsubmit="return confirm_submit();">
                                      <div class="table-responsive">
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th>Sr. No.</th>
                                                  <th>Name</th>
                                                  <th>Amount in USD</th>
                                                  <th>Amount in BTC</th>
                                                  <th>Bitcoin Address</th>                                                  
                                              </tr>
                                  <?php

                                  foreach ($request_ids as $key => $request_id) {
                                    $data = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request where status=0 and id = '".$request_id."'")); 

                                    $usd_total += $data['request_amount'];
                                    $btc_total += number_format($data['btcamt'], 8);

                                    $username = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select concat(first_name, ' ', last_name) AS fullname from user_registration where user_id = '".$data['user_id']."'"));

                                    ?>
                                    
                                              <tr>
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $username['fullname']; ?></td>
                                                  <td><?php echo $data['request_amount']; ?></td>
                                                  <td><?php echo number_format($data['btcamt'], 8); ?></td>  
                                                  <td><?php echo $data['description']; ?></td> 

                                                  <input type="hidden" name="address[<?php echo $request_id; ?>]" value="<?php echo $data['description']; ?>">
                                                      <input type="hidden" name="amount[<?php echo $request_id; ?>]" value="<?php echo number_format($data['btcamt'], 8); ?>">
                                                       <input type="hidden" name="request_id[<?php echo $request_id; ?>]" value="<?php echo $request_id; ?>">                                                 
                                              </tr>  
                                   
                                    <?php

                                    $i++;

                                  }

                                  ?>

                                  <tr>
                                    <th>Total:</th>
                                    <th></th>
                                    <th><?php echo number_format($usd_total, 2); ?> USD</th>
                                    <th><?php echo number_format($btc_total, 8); ?> BTC</th>
                                    <th></th>
                                  </tr>

                                  </table>
                                      </div>
                                  
                                    <div class="form-group">
                                      <div class="col-md-2">
                                        Enter Pin Number:
                                      </div>
                                      <div class="col-md-6">
                                        <input type="password" name="block_pin" class="form-control" required />
                                      </div>
                                      <div class="col-md-2">
                                        <input class="btn btn-success" type="submit" name="submit" value="Pay">
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                    <br/><br/>
                                    
                                  </form>

                                  <?php
                                
                                }else{
                                    header("location: open-withdrawal-request.php");
                                }
                                
                                
                            ?>
                            
                            

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
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

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

    function confirm_submit(){
      var con = confirm("Do you want to transfer fund?");
      if(con){
        return true;
      }else{
        return false;
      }
    }

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