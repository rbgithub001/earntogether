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
$id=1;
  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");
if(isset($_POST['submits']))
{

if (!empty($_POST["level"])) {
    mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM set_level WHERE package_id=$id");
    foreach ($_POST["level"] AS $value) {
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO set_level(package_id,level)VALUES('$id','$value')");
    }
}
if (!empty($_POST["commission"])) {
    $l=1;
    foreach ($_POST["commission"] AS $value) {
        $sql=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE set_level set level_comm='$value' where level=$l and package_id=$id ");
        $l++;
    }
}
header("location:manage-level-comm.php?msg=Level Updated Successfully !");
exit();
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
                            Level Management<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        
                       
                        <div class="panel-body">
<form class="form-horizontal" role="form" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>">
<br/>
<h4 align="center">Level Commission Setting</h4>
<br/>
<div class="form-group">
<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"></label>
<div class="col-lg-10">

<div class="col-lg-5">Level </div> 
<div class="col-lg-5">Commission</div><br/><br/>
<?php $res3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from set_level where package_id='$id'");
while ($res4=mysqli_fetch_assoc($res3)) {
    
// }
 ?>
<div class="col-lg-5"><input name="level[]" type="text" class="form-control" style="width:300px;" value="<?php echo $res4['level'];?>" /> 
</div>
<div class="col-lg-5"><input name="commission[]" type="text" class="form-control" required style="width:300px;" value="<?php echo $res4['level_comm'];?>" /></div> 
<a href="delete-level.php?id=<?php echo $res4['id'];?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a><br/><br/>
<?php } ?>

<div class="col-lg-12">
<span style="font:normal 12px agency, float:right; arial; color:blue; text-decoration:underline; cursor:pointer;" onclick="addMoreRows(this.form);">
Add More
</span>       
<div id="addedRows"></div>
</div>  

</div>

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
                         

            <!--footer section start-->
           <?php include("footer.php");?>

           <?php 
$rowcount=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select level from set_level where package_id='$id' ORDER BY level DESC  LIMIT 1"));
 $rowcnt=$rowcount['level'];
           ?>
            <!--footer section end-->


        </div>
        <!-- body content end-->
        
    </section>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
var rowCount = "<?php echo $rowcnt;?>";

function addMoreRows(frm) {

rowCount ++;
var recRow = '<p id="rowCount'+rowCount+'"><br/><input name="level[]" value="'+rowCount+'"  readonly required type="text" style="width:300px;" maxlength="120" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="commission[]" style="width:300px;"  type="text"  maxlength="120" style="margin: 4px 5px 0 5px;"  required />  <a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></p>';
jQuery('#addedRows').append(recRow);
}

function removeRow(removeNum) {
jQuery('#rowCount'+removeNum).remove();
}
</script>

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