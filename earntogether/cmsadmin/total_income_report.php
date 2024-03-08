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
$f1 = date("Y-m-d", strtotime($frm));
$f2 = date("Y-m-d", strtotime($til));

$query123=array();
if($frm!='' && $til!='')
{
  $query123[]=" registration_date between '$f1' and '$f2' ";
}
 if($username!='')
  {
  $qry= mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where (user_id='$username' or username='$username')"));
  $query123[]=" user_id='".$qry['user_id']."'";
      
  }
  
  
// if ($leg!='') {
//  $query123[]=" leg= '$leg'"; 
// }
if ($memtype!='') {
 $query123[]=" user_rank_name= '$memtype'"; 
}
if(count($query123)>0){
    $qrt= 'where '.implode(" and",$query123);   
}


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

                    <div class="col-sm-12 text-right">

                        <a href="export_total_inocme.php" class="btn btn-success">Export in excel</a>

                    </div>

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Total Income Report
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h5>SEARCHING.....</h5>
                                 
<div class="row">

            <div class="col-md-12">
                <form name="tree" method="post" action="">
                <div class='col-md-3'>
                    <input name="id" value="" type="text" placeholder="Enter User Id" class="form-control">
                </div>
                <div class="col-md-3">
                <input name="from" value="<?=$frm?>"  placeholder="Enter Start Date" id="bdate" type="text" class="form-control">
                </div>
                <div class="col-md-3">
                <input placeholder="Enter End Date" name="to" value="<?=$til?>" id="bdate1" type="text" class="form-control">
                </div>
              
                <div class="col-md-3">
                <input type="submit" name="submits" value="Submit" class="btn btn-success"></div>           
                </form></div></div>
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>

     </br>
     <tr>
    <td width="3%" align="right">&nbsp;</td>
    <td width="94%" align="right"><img src="images/document-print.png" width="32" height="32" onClick="coderHakan()" /></td>
    <td width="3%" align="right">&nbsp;</td>
    </tr>
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
                                    Total income
                                </th>
                                 <th style="text-align:center;">
                                    Sponsor Income
                                </th>
                                <th style="text-align:center;">
                                    ROI Income
                                </th>
                                <th style="text-align:center;">
                                    Binary Income
                                </th>
                                <!--<th style="text-align:center;">-->
                                <!--    Binary Income-->
                                <!--</th>-->
                                <th style="text-align:center;">
                                    Fund Transfer
                                </th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration $qrt order by id desc");
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
                                
                               
                                   <?php 



    $data123=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot12 from credit_debit where user_id='".$data1['user_id']."' and (ttype='Referral Bonus' OR ttype='Roi Income' OR ttype='Binary Income' OR ttype='Fund Transfer')")); 

       if($data123['leadtot12']!='')
      {
        $tot = $data123['leadtot12'];
      }
      else
      {
        $tot = 0;
      }
      //$totals = $tot+$totals; ;?>

                        <td>  <?php  echo number_format($tot,2) ;?>
                                </td>
                                 <td>
                                    <?php  $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as sp from credit_debit where user_id='".$data1['user_id']."' and (ttype='Referral Bonus')"));  
                                    echo number_format($data11['sp'],2);  
                                    ?>
                                </td>
                                
                                <td>
                                     <?php  $data22=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as roi from credit_debit where user_id='".$data1['user_id']."' and (ttype='Roi Income')")); echo number_format($data22['roi'],2); ?>
                                </td>
                                <td>
                                    <?php  $data112=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as bi from credit_debit where user_id='".$data1['user_id']."' and (ttype='Binary Income')"));  
                                    echo number_format($data112['bi'],2);  
                                    ?>
                                </td>
                                <td>
                                     <?php $data33=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as ft from credit_debit where user_id='".$data1['user_id']."' and ( ttype='Fund Transfer')")); echo number_format($data33['ft'],2); ;?>
                                </td>
                                
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