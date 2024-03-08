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

  $id=$_GET['id'];
  $sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from commission_settings where id='".$id."'");
  $row=mysqli_fetch_array($sql);
  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");

if(isset($_POST['submits']))
{
$leadership_com=$_POST['leadership_com'];
$lead_period=$_POST['lead_period'];
$lead_status=$_POST['lead_status'];




$str="update commission_settings set leadership_com='$leadership_com', lead_status='$lead_status', lead_period='$lead_period' WHERE id=1";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $str)or die("error");


header("location:leadership-comm.php?id=". $id."&msg=Information Updated Successfully !");


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("header.php");?>

<script type="text/javascript" src="<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckeditor.js"></script>
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
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Leadership Commission Setting<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <?php $ferd=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from commission_settings where id=1"));

                         ?>
                       
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                           
                              
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Leadership Commission Percentage</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="leadership_com" class="form-control" required value="<?php echo $ferd['leadership_com'];?>" >
                                       
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Leadership Commission Period</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="lead_period" id="exampleInputState">
                                             <option value="Quaterly">Select Period</option>
                                       
                                        <option value="Monthly"  <?php if($ferd['lead_period']=='Monthly'){ echo "selected";}?>>Monthly</option>
                                        <option value="Quaterly" <?php if($ferd['lead_period']=='Quaterly'){ echo "selected";}?>>Quaterly</option>



                                      </select> 
                                        
                                    </div>
                                </div> 

                               <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Leadership Commission Status</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="lead_status" id="exampleInputState">
                                             <option value="Active">Select Status</option>
                                       
                                        <option value="Active"  <?php if($ferd['lead_status']=='Active'){ echo "selected";}?>>Active</option>
                                        <option value="Inactive" <?php if($ferd['lead_status']=='Inactive'){ echo "selected";}?>>Inactive</option>



                                      </select> 
                                        
                                    </div>
                                </div> 




                             

                                
                               
                               
                               

                               
                           
                              
                                       
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label"></label>
                                    <div class="col-lg-6">
                                        <input type="submit" class="btn btn-primary" name="submits" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
           
            </div>
            
            

            </div>
           
                         

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