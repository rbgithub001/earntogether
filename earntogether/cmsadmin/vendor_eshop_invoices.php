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
$dfrom=explode("/",$frm);
$fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 
$dednd=explode("/",$til);
$edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];
$username=$_REQUEST['id'];  

$uname=$_REQUEST['uname']; 
$umobile=$_REQUEST['umobile']; 
$uemail=$_REQUEST['uemail']; 



  $query123=array();
  if($uname!='')
  {
     $query123[]=" (first_name='$uname' or last_name='$uname' or username='$uname')";   
  }
   if($umobile!='')
  {
     $query123[]=" (telephone='$umobile' or branch_nm='$umobile')";   
  }
    if($uemail!='')
  {
     $query123[]=" (email='$uemail')";   
  }
  
  if($username!='')
  {
  $query123[]=" (user_id='$username' or first_name='$username' or last_name='$username' or username='$username')";  
  }
  $mstatus=$_REQUEST['mstatus'];
  if($mstatus!='')
  {
  $query123[] = " user_rank_name='$mstatus'";  
  }
  if($frm!='' && $til!='')
  {
    $query123[]=" payment_date>='$fdate' and payment_date<='$edate' ";
  }
  if(count($query123) > 0){
  $qry= 'where '.implode(' and',$query123);
  //echo $qry; die;
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

                      <!--  <a href="export_sponsor_income_report.php" class="btn btn-success">Export in excel</a>-->

                    </div>

                </div><br />
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                PURCHASE INVOICES
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h5>SEARCHING.....</h5>
        <form name="tree" method="post" action="">
<input name="id" value="" type="text" placeholder="Enter User Id">&nbsp;&nbsp;
<input name="from" value=""  placeholder="Enter Start Date" id="bdate" type="text">&nbsp;&nbsp;
<input  placeholder="Enter End Date" name="to" value="" id="bdate1" type="text">&nbsp;&nbsp;
<input type="submit" name="submits" value="Submit" class="btn btn-success">           
</form>
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
                             
                        <th>S.no</th>
                        <th>User Id</th>
                        <th>Username</th>
                        <th>Invoice No</th>
                        <th>Total Amount</th>
                        
                        <!--<th>Payment Type</th>-->
                        <th>Date</th>
                        <th>Vendor</th>
                         <th>View Invoice</th>
                       
                      
                     
                                
                            </tr>
                            </thead>
                            <tbody>
                             
                     <?php
                      $i=1;
                      $grandrevenue=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail $qry order by am_id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                          
                           $userdetails=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select username from user_registration where user_id='".$data1['user_id']."'"));
                    
                        $grandrevenue=$grandrevenue+$data1['total_invoice_cv'];
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['user_id'];?></td>
                        <td><?php echo $userdetails['username'];?></td>
                         <td><?php echo $data1['invoice_no'];?></td>
                         <td><?php echo $data1['total_invoice_cv'];?></td>
                         <!-- <td><?php //echo $data1['payment_mode'];?></td>-->
                        <td><?php echo $data1['payment_date'];?></td>
                       <td><?php echo $data1['seller_id'];?></td>
                           <td><a style="color:#34379e" href="shopping-invoice-detail.php?inv=<?php echo $data1['invoice_no'];?>">View Invoice</a></td>
                         
                      </tr>

                      <?php $i++;} ?>
                      
                            </tbody>
                            </table>

                             <table align="center" >
                            <tr></tr>
                            <tr>
                        <td style="font-weight:bold;text-align:center;"><h4>Total Amount=</h4></td>
                      <td><span><h4><? echo CURRENCY ; ?> <?php echo $grandrevenue; ?></h4></span></td>
                     <!-- <td>&nbsp;&nbsp;&nbsp;</td>
                       <td style="font-weight:bold;text-align:center;"><h4>Total Commission = </h4></td>
                      <td><span><h4><?php echo $totalcommission; ?>,</h4></span></td>
                      <td>&nbsp;&nbsp;</td>-->
                      
                      <!--  <td style="font-weight:bold;text-align:center;"><h4>Total PayOut Distribution=</h4></td>
                      <td><span><h4><?php echo $totalpayout; ?>,</h4></span></td>
                        <td>&nbsp;&nbsp;</td>
                      <td style="font-weight:bold;text-align:center;"><h4>Total Company Revenue = </h4></td>
                      <td><span><h4><?php echo $grandrevenue; ?></h4></span></td>-->
                      </tr>

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