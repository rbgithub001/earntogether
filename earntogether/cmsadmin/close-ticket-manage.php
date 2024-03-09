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
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
$(function() {
    var pickerOpts = {
            dateFormat: $.datepicker.ATOM
    };  
$( "#datepicker" ).datepicker(pickerOpts);
});

$(function() {
    var pickerOpts = {
            dateFormat: $.datepicker.ATOM
    }; 
$( "#datepicker1" ).datepicker(pickerOpts);
});
</script>
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
                                User Close Tickets
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="table-responsive">
                            

                            <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                  <th style="text-align:center;">Ticket No.</th>
                  <th style="text-align:center;">User ID </th>
                  <th style="text-align:center;">User Name</th>
                  <th style="text-align:center;">Subject</th>
                  <th style="text-align:center;">Category</th>
                  <th style="text-align:center;">Posted Date</th>
                  <th style="text-align:center;">Response Date</th>
                  <th style="text-align:center;">Status</th>
                  <th style="text-align:center;">Actions</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tickets where status=1");
                                  while($banners=mysqli_fetch_array($data))
                                    { ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                   <?php echo $banners['ticket_no']; ?>
                                </td>
                                <td>
                                    <?php echo $banners['user_id']; ?>
                                </td>
                                <td>
                                    <?php echo $banners['user_name']; ?>
                                </td>
                                  
                                 <td>
                                 <?php echo $banners['subject']; ?>
                                </td>
                                <td>
                                  <?php echo $banners['tasktype']; ?>
                                </td>
                                   <td>
                                 <?php echo $banners['t_date']; ?>
                                </td>
                                 <td>
                                 <?php echo $banners['c_t_date']; ?>
                                </td>
                                 <th><?php echo "Responded"; ?></th>
                                 <td>&nbsp;
                  <span style="margin-left:5px;"><a href="close-tickets-response.php?id=<?php echo $banners['id'];?>" title="View Detail">View</a></span>
                  <span style="margin-left:5px;"><a href="delete-open-tickets.php?id=<?php echo $banners['id'];?>" title="Delete"  onclick="return confirm('Are you sure you want to delete?');">Delete</a></span>
                 

                  </td>

                               
                            </tr>
                            <?php $i++;} ?>
                            
                      
                            </tbody>
                            </table>
                           
                   </form>
                            </div>
                        </section>
                    </div>

                </div>

            </div>
            <!--body wrapper end-->

<script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1',
                                {
                                    filebrowserBrowseUrl : 'ckeditor/ckfinder/ckfinder.html',
                                    filebrowserImageBrowseUrl : 'ckeditor/ckfinder/ckfinder.html?type=Images',
                                    filebrowserFlashBrowseUrl : 'ckeditor/ckfinder/ckfinder.html?type=Flash',
                                    filebrowserUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                    filebrowserImageUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                    filebrowserFlashUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
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
<!--<script src="js/data-table-init.js"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap-dataTable.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />

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