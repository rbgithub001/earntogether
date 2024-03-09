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

if($_POST[submits])
{
$frm=$_REQUEST['from'];
$til=$_REQUEST['to'];
$leg=$_REQUEST['leg'];
$leg=$_REQUEST['leg'];
$memtype=$_REQUEST['memtype'];
$username=$_REQUEST['id'];
$sponsor=$_REQUEST['sponser'];
$f1 = date("Y-m-d", strtotime($frm));
$f2 = date("Y-m-d", strtotime($til));

$query123=array();
if($frm!='' && $til!='')
{
  $query123[]=" registration_date between '$f1' and '$f2' ";
}
 if($username!='')
  {
  $qry= mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where (user_id='$username' or username='$username' or first_name='$username' or last_name='$username')"));
  $query123[]=" user_id='".$qry['user_id']."'";
      
  }
   if($sponsor!='')
  {
  $qry= mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where (user_id='$sponsor' or username='$sponsor' or first_name='$sponsor' or last_name='$sponsor')"));
  $query123[]=" ref_id='".$qry['user_id']."'";
      
  }
  
  

if ($memtype!='') {
 $query123[]=" user_rank_name= '$memtype'"; 
}
if(count($query123)>0){
    $qrt= 'where '.implode(" and",$query123);   
}


} 


?><!DOCTYPE html>
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

                    <div class="col-sm-12 text-right">

                        <a href="export_direct_member.php" class="btn btn-success">Export in excel</a>

                    </div>

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Direct Member Report
      
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                           
<div class="row">

            <div class="col-md-12" style="padding-top:20px;">
                <form name="tree" method="post" action="">
                <div class='col-md-4'>
                    <input name="id" value="" type="text" placeholder="Enter User Id/ User Name/Member Name" class="form-control">
                </div>
                <div class='col-md-4'>
                    <input name="sponser" value="" type="text" placeholder="Enter Sponser Id/ Sponser Name" class="form-control">
                </div>
                <div class="col-md-2">
                <input name="from" value="<?=$frm?>"  placeholder="Enter Start Date" id="bdate" type="text" class="form-control">
                </div>
                <div class="col-md-2">
                <input placeholder="Enter End Date" name="to" value="<?=$til?>" id="bdate1" type="text" class="form-control">
                </div>
                <div class="col-md-2">
                <select  name="memtype" class="form-control"> 
                <option value="">Select Member</option>
                <option value="Free Member" <?php if($memtype=='Free Member'){ echo "selected"; }?>>Free</option>
                <option value="Paid Member" <?php if($memtype=='Paid Member'){ echo "selected"; } ?>>Paid</option>
                </select></div>
                <div class="col-md-3">
                <input type="submit" name="submits" value="Submit" class="btn btn-success"></div>           
                </form></div></div>


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
                                    Member Name
                                </th>
                                <th style="text-align:center;">
                                    Sposnor Id
                                </th>
                                <th style="text-align:center;">
                                    Sponsorname
                                </th>
                                <th style="text-align:center;">
                                    Member Type
                                </th>
                                <th style="text-align:center;">
                                    Last Update Date & Time
                                </th>
                                <!--<th style="text-align:center;">
                                    Status
                                </th>-->
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                 
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration $qrt");
                                  while($data1=mysqli_fetch_array($data))
                                    { ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                                <td>
                                    <?php echo $data1['username'];?>
                                </td>
                                <td>
                                    <?php echo $data1['first_name']." ".$data1['last_name'];?>
                                </td>
                                
                                <td>
                                     <?php echo $data1['ref_id'];?>
                                </td>
                                <td>
                                    <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1['ref_id']."'")); echo $user['username'];?>
                                </td>
                                <td>
                                     <?php echo $data1['user_rank_name'];?>
                                </td>
                                <td>
                                     <?php echo $data1['ts'];?>
                                </td>
                                <!--<td>
                                     <?php // if($data1['user_status']==0) echo "Active"; else echo "Deactive";?>
                                </td>-->
                                
                            </tr>
                            <?php $i++;} ?>
                            
                      
                            </tbody>
                            </table>
                            </div></div>
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