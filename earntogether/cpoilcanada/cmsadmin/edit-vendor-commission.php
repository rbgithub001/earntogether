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
  
  //var_dump($row);
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");

if(isset($_POST['submits']))
{

//$amount=$_POST['amount'];
//$name=$_POST['name'];
//$capping=$_POST['capping'];
//$roi_duration = $_POST['roi_duration'];

$percc1 = $_POST['percc1'];
$percc2 = $_POST['percc2'];
$percc3 = $_POST['percc3'];
$percc4 = $_POST['percc4'];
$percc5 = $_POST['percc5'];
$percc6 = $_POST['percc6'];
$percc7 = $_POST['percc7'];
$percc8 = $_POST['percc8'];

//$percc = $_POST['percc'];
//if( ($percc8 > $percc1) && ($percc1 > $percc2) && ($percc2 > $percc3) && ($percc3 > $percc4) && ($percc4 > $percc5) && ($percc5 > $percc6) && ($percc6 > $percc7)  ){
if( ($percc8 > $percc1) && ($percc1 > $percc2) && ($percc2 > $percc3)  ){

$str1=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc1' where id=1")or die("error");
$str2=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc2' where id=2")or die("error");
$str3=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc3' where id=3")or die("error");
$str4=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc4' where id=4")or die("error");
$str5=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc5' where id=5")or die("error");
$str6=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc6' where id=6")or die("error");
$str7=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc7' where id=7")or die("error");
$str8=mysqli_query($GLOBALS["___mysqli_ston"], "update user_rank_list set level_per='$percc8' where id=8")or die("error");
}else{
    
    header("location:edit-vendor-commission.php?msg1=Please check Commission Percentage !");
}
if($str1 && $str2 && $str3 && $str4)
{
header("location:edit-vendor-commission.php?msg=Commission Information Updated Successfully !");
}
    
    
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
                            Commission Manage <span style="float:right;color:red;"><?php echo @$_GET['msg1'];?></span>
                            <span style="float:right;color:green;"><?php echo @$_GET['msg'];?></span>
                        </header>
                         <?php $row1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=1 ")); ?>
                         <?php $row2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=2 ")); ?>
                         <?php $row3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=3 ")); ?>
                         <?php $row4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=4 "));
                               $row5=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=5 "));
                               $row6=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=6 "));
                               $row7=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=7 "));
                               $row8=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id=8 "));
                         ?>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                            <!-- <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Package Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Package Name" required value="<?php echo $row['name'];?>" readonly>
                                       
                                    </div>
                                </div>-->
                                <!--  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Max Earning (Capping)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="capping" class="form-control" placeholder="Enter Package Capping" required value="<?php echo $row['capping'];?>">
                                       
                                    </div>
                                </div> -->
                               <!--
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Validity (Days)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="roi_duration" class="form-control" placeholder="Enter Package Validity" required value="<?php echo $row['roi_duration'];?>" >
                                       
                                    </div>
                                </div>-->
                                 
                               <!--  
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Package Amount (SAR)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required value="<?php echo $row['amount'];?>" >
                                       
                                    </div>
                                </div>-->
                                
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row8['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc8" step="any" class="form-control"  required value="<?php echo $row8['level_per'];?>" >
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row1['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc1" step="any" class="form-control"  required value="<?php echo $row1['level_per'];?>" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row2['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc2" step="any" class="form-control"  required value="<?php echo $row2['level_per'];?>" >
                                    </div>
                                </div>
                                      <!--<div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row3['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc3" step="any" class="form-control" required value="<?php echo $row3['level_per'];?>" >
                                    </div>
                                </div>
                           <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row4['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc4" step="any" class="form-control"  required value="<?php echo $row4['level_per'];?>" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row5['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc5" step="any" class="form-control"  required value="<?php echo $row5['level_per'];?>" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row6['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc6" step="any" class="form-control"  required value="<?php echo $row6['level_per'];?>" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $row7['name'];?> (%)</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="percc7" step="any" class="form-control"  required value="<?php echo $row7['level_per'];?>" >
                                    </div>
                                </div>
                                
                                -->
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="submits" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </section>
                </div>
           
            </div>
            
            

            </div>
            <!--body wrapper end-->
 <script type="text/javascript">
                         // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor2',
                         {
                              filebrowserBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html',
                              filebrowserImageBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html?type=Images',
                              filebrowserFlashBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html?type=Flash',
                              filebrowserUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                              filebrowserImageUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                              filebrowserFlashUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                              filebrowserWindowWidth : '1000',
                              filebrowserWindowHeight : '700'
                         });
                         </script>
                         

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