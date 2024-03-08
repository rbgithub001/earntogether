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
if(isset($_POST['subpan'])) {
  $id=$_POST['id'];
  $rem=$_POST['remark'];
  $res=mysqli_query($GLOBALS["___mysqli_ston"],"update due_clear_request set status='2',admin_remark='$rem', admin_date='".date('Y-m-d')."' where id='$id'");
  header("location:dues-request-report.php?msg=You have successfully rejected member request");
  exit();
}
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

                   
                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Dues clear request Report
                            </header>
                        <!--<div class="row">
                            <div class="col-sm-12">
                            <form name="tree" method="post" action="#" >
                            <div class="col-sm-2">
                            <input name="id" value="" type="text" placeholder="User Id" class="form-control">
                            </div>
                            <div class="col-sm-2">
                            <input name="uname" value="" type="text" placeholder="User Name" class="form-control">
                            </div>
                            <div class="col-sm-2">
                            <input name="mname" value="" type="text" placeholder="Member Name" class="form-control">
                            </div>

                            <div class="col-sm-2">
                            <input name="from" value=""  placeholder="Start Date" id="bdate" type="text" class="form-control">
                            </div>
                            <div class="col-sm-2">
                            <input  placeholder="End Date" name="to" value="" id="bdate1" type="text" class="form-control">
                            </div>
                            <div class="col-sm-1">
                            <input type="submit" name="submits" value="Submit" class="btn btn-success">           
                            </div>
                            </form>
                            </div></div>-->

     </br>
    
                        <div class="total_invoice"  id="printArea">
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    Userid
                                </th>
                                <th style="text-align:center;">
                                    Username
                                </th>
                                <th style="text-align:center;">
                                    Payment Mode
                                </th>
                                <th style="text-align:center;">
                                    Payment Proof
                                </th>
                                <th style="text-align:center;">
                                    Amount (SAR)
                                </th>
                                <th style="text-align:center;">
                                    Posted Date
                                </th>
                                <th style="text-align:center;">
                                    Status
                                </th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                             $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from due_clear_request order by id desc"); ?>
                            <?php while($data11=mysqli_fetch_array($data)){ ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $data11['user_id'];?>
                                </td>
                                <td>
                                    <?php
                                    $data111=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select username from poc_registration where user_id='".$data11['user_id']."'"));    
                                    echo $data111['username'];?>
                                </td>
                                <td>
                                    <?php echo $data11['payment_mode'];?>
                                </td>
                                <td>
                                    <a target="_blank" href="../franchisepanel/images/<?php echo $data11['pay_proof'];?>" class="btn btn-primary">View</a>
                                </td>
                                <td>
                                    <?php echo $data11['amount'];?>
                                </td>
                               
                                 <td>
                                     <?php echo $data11['posted_date'];?>
                                </td>
                                <td>
                                    <?php if($data11['status']=='0'){ ?>
                                    <a href="approve-due-request.php?id=<?php echo $data11['id'];?>&status=1" class="btn btn-success" onclick="return confirm('Are you sure?');">Approve</a> 
                                    <div data-toggle="modal" data-target="#myModal1" class="btn btn-success" >Reject</div>
                                    <div class="modal fade" id="myModal1" role="dialog">
                                        <div class="modal-dialog">
                                        
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <form name="fname" method="post" action="#">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Remark</h4>
                                            </div>
                                            <div class="modal-body">
                                            <div class="serch-wrap">
                                            <div class="form-wrapper cf">
                                             <input type="hidden" name="id" value="<?php echo $data11['id'];?>">
                                              <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Remark" autocomplete="off">
                                            </div>  
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <input type="submit" name="subpan" value="Submit" class="btn btn-success">
                                            </div>
                                            </form>
                                          </div>
                                          
                                        </div>
                                      </div>
                                    <?php 
                                    }
                                     if($data11['status']=='2') 
                                        { 
                                            echo "Cancelled";
                                        }
                                        ?>
                                       <?php 
                                     if($data11['status']=='1') 
                                        { 
                                            echo "Approved";
                                        }
                                        ?>
                                </td>
                                
                            </tr>
                            
                            <?php $i++;} ?>
                          
                            
                      
                            </tbody>
                            </table>
                            </div>
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

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js">
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
       
  <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

</body>
</html>