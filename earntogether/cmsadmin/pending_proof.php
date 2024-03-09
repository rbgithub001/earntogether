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
 
 if ($_GET['resetid']!='' && $_GET['action']=='reset') {
     mysqli_query($GLOBALS["___mysqli_ston"],"delete from address_proof_list where user_id='".$_GET['resetid']."'");
     
     mysqli_query($GLOBALS["___mysqli_ston"],"delete from bank_statement_proof_list where user_id='".$_GET['resetid']."'");
     
     mysqli_query($GLOBALS["___mysqli_ston"],"delete from id_proof_list where user_id='".$_GET['resetid']."'");
     mysqli_query($GLOBALS["___mysqli_ston"],"delete from pancard_proof_list where user_id='".$_GET['resetid']."'");

     header("location:pending_proof.php?msg=User Details Deleted Successfully..!");
     exit();
 }

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
                               Pending KYC List
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-responsive table-striped data-table">
 
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                     User Id
                                </th>
                                <th style="text-align:center;">
                                    Introducer Code
                                </th>
                                <th style="text-align:center;">
                                    Username
                                </th>
                                <th style="text-align:center;">
                                    Full Name
                                </th>
                              
                                <th style="text-align:center;">
                                   Action
                                </th>
                              
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
$i=1;
$data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where kyc_status=0 order by id desc");
while($data1=mysqli_fetch_array($data))
{ 
$dataq1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='".$data1['user_id']."' and status=0"));
$dataq2=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pancard_proof_list where user_id='".$data1['user_id']."' and status=0 "));
$dataq3=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='".$data1['user_id']."' and status=0 "));
$dataq4=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bank_statement_proof_list where user_id='".$data1['user_id']."' and status=0 "));


//if($dataq1>0 || $dataq2>0 || $dataq3>0 || $dataq4>0)
if($dataq1>0 || $dataq3>0)
{ ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                                <td>
                                    <?php echo $data1['ref_id'];?>
                                </td>
                                <td>
                                    <?php echo $data1['username'];?>
                                </td>
                                <td>
                                    <?php echo $data1['first_name']." ".$data1['last_name'];?>
                                </td>
                               
                                 <td>
                                   <a href="member_document_verifynew.php?id=<?php echo $data1['user_id'];?>" class="btn btn-primary"> View Proof</a>

                                   <a href="pending_proof.php?resetid=<?php echo $data1['user_id'];?>&action=reset" class="btn btn-danger">Reset</a>
                                </td>

                                
                               
                            </tr>
                            <?php $i++;}} ?>
                            
                      
                            </tbody>
                            </table>
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
<!-- <script src="js/dataTables.responsive.min.js"></script> -->
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