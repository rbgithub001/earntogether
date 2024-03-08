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
$mname=$_REQUEST['mname']; 
$comsn=$_REQUEST['comsn']; 
$tty=$_REQUEST['tty']; 
$rmrk=$_REQUEST['rmrk']; 
$pstatus=$_REQUEST['pstatus']; 



  $query123=array();
  if($uname!='')
  {
      
      $selectquery=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where username='".$uname."' or first_name='$uname' or last_name='$uname'"));
      
     $query123[]=" and  user_id='".$selectquery['user_id']."'";   
  }
  
  if($username!='')
  {
  $query123[]=" and  user_id='$username'";  
  }
    if($comsn!='')
  {
  $query123[]="  and  credit_amt LIKE '$comsn%' and	ttype='Referral Bonus'";  
  }
   if($mname!='')
  {
  $selectquery=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where username='".$mname."' or first_name='$mname' or last_name='$mname'"));
      
     $query123[]=" and  user_id='".$selectquery['user_id']."'";  
  }
  
  if($pstatus!='')
  {
  $query123[] = " and status='$pstatus' ";  
  }
  if($frm!='' && $til!='')
  {
    $query123[]=" BETWEEN ts>='$fdate' and ts<='$edate' ";
  }
  if(count($query123) > 0){
  $qry= implode($query123);
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

                   

                </div><br />
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 Trinary Income Report
                
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                                                        <div class="row">
    
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
<input name="comsn" value="" type="text" placeholder="Commission" class="form-control">
</div>

<div class="col-sm-2">
<select name="pstatus" class="form-control">
    <option value="">Paid Status</option>
    <option value="0">Paid</option>
    <option value="1">Unpaid</option>
</select>
</div>

<!--<div class="col-sm-2">
<input name="from" value=""  placeholder="Start Date" id="bdate" type="text" class="form-control">
</div>
<div class="col-sm-2">
<input  placeholder="End Date" name="to" value="" id="bdate1" type="text" class="form-control">
</div>-->

<div class="col-sm-1">
<input type="submit" name="submits" value="Submit" class="btn btn-success">           
</div>
</form>
</div></div>
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
                                   Referral Member 
                                </th>
                                <th style="text-align:center;">
                                    Commission
                                </th>
                                <th style="text-align:center;">
                                    Transaction Type
                                </th>
                               
                                <th style="text-align:center;">
                                   Paid Status
                                </th>
                                 <th style="text-align:center;">
                                   Date
                                </th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $total=0;

                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where ttype='Trinary Income' $qry order by id desc");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                        $total=$total+$data1['credit_amt'];
                                    ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                                <td>
                                    <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1['user_id']."'")); echo $user['username'];?>
                                </td>
                                <td>
                                    <?php echo $user['first_name']." ".$user['last_name'];?>
                                </td>
                                <td>
                                    <?php  $user1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1['sender_id']."'")); echo $user1['username'];?>
                                </td>
                                <td>
                                     <?php echo number_format($data1['credit_amt'],2);?>
                                </td>
                                <td>
                                  <?php echo $data1['ttype'];?>
                                </td>
                              
                                <td>
                                     <?php if($data1['status']==0) echo "Paid"; else echo "Pending";?>
                                </td>
                                 <td>
                                     <?php echo $data1['ts'];?>
                                </td>
                                
                            </tr>
                            <?php 
                            $i++;
                            }
                            ?>
                            
                      
                            </tbody>
                            </table>

                            <table align="center" >
                            <tr></tr>
                            <tr>
                      <td></td>
                      <td></td>
                      <td style="font-weight:bold;text-align:center;"><h4>Total Commission = </h4></td>
                      <td><span><h4><?php echo number_format($total,2); ?></h4></span></td>
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