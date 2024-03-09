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
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];  
  $query123=array();
  if($username!='')
  {
  $query123[]="user_id='$username'";  
  }
  if($email!='')
  {
    $data=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where email='$email'");
    while ($data1=mysqli_fetch_array($data)) {
      $query123[]="user_id='".$data1['user_id']."'"; 

     } 
  
  }
  if($name!='')
  {
     $name1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where username='$name'")); 

  $query123[]="user_id='".$name1['user_id']."'";  
  }
  $mstatus=$_REQUEST['mstatus'];
  if($mstatus!='')
  {
  $query123[] = " pay_type='$mstatus'";  
  }
  if($frm!='' && $til!='')
  {
    $query123[]=" date >='$fdate' and date <='$edate' ";
  }
  if(count($query123) > 0){
  $qry= 'and '.implode(' OR ',$query123);
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

                    
                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Member Package Report (Bitcoin Payment)

   
       
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            

               </br>
<div class="row">
<div class="col-md-12" style="border: 1px solid #DFDFDF; box-shadow: none; border-radius: 0px; color: #999; opacity: 1; padding: 10px 0px 10px 4px !important;
margin: 0px 0px 1px 21px;">    
<form name="tree" method="post" action="#">
<div class="col-md-3">
<input name="id" value="" type="text" placeholder="Enter User Id" class="form-control"></div>
<div class="col-md-3">
<input name="name" value="" type="text" placeholder="Enter Username" class="form-control"></div>
<div class="col-md-3">
<input name="email" value="" type="email" placeholder="Enter Email Id" class="form-control"></div>
<div class="col-md-2">
<input name="from" value=""  placeholder="Enter Start Date" id="bdate" type="text" class="form-control"></div>
<div class="col-md-2">
<input  placeholder="Enter End Date" name="to" value="" id="bdate1" type="text" class="form-control"></div>
<!--<div class="col-md-3">
<select name="mstatus" class="form-control">
    <option value="">Member Pay Type</option>
    <option value="Withdrawal Wallet">Main Wallet</option>
     <option value="Working Wallet">Working Wallet</option>
      <option value="ROI Wallet">ROI Wallet</option>
    <option value="Coin Payment">Coin Payment</option>
<option value="Admin Activation">Admin Activation</option>
    
</select>


</div>-->
<div class="col-md-2">
<input type="submit" name="submits" value="Submit" class="btn btn-success">           
</div>
</form>
</div>
   </div> 
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
                                   Email Id
                                </th>
                                <th style="text-align:center;">
                                    Package Amount
                                </th>
                                <th style="text-align:center;">
                                    Pay Type
                                </th>
                                 <th style="text-align:center;">
                                    Paid By
                                </th>
                                <th style="text-align:center;">
                                    Purchase Date
                                </th>
                               <th style="text-align:center;">
                                    Expire Date
                                </th> 
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $total=0;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where pay_type='Bitcoin Payment' $qry order by id desc");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                     
                                        ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                                <td>
                                  <?php 
                                   $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select username,first_name,last_name,email from user_registration where user_id='".$data1['user_id']."'"));
                                    echo $data11['username'];?>
                                </td>
                                <td>
                                    <?php echo $data11['first_name']." ".$data11['last_name'];?>
                                </td>
                                
                               <td>
                                    <?php echo $data11['email'];?>
                                </td>
                               
                                <td>
                                    <?php echo $data1['amount'];?>
                                </td>
                                <td>
                                    <?php echo $data1['pay_type'];?>
                                </td>
                                 <td>
                                    <?php 

                                    if($data1['remark']=='Downline Package Upgrade')
                                    {

                                    $data112=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select username,first_name,last_name,email from user_registration where user_id='".$data1['sponsor']."'"));

                                    echo $data112['username'];
                                  }
                                  else
                                  {
                                    
                                  }


                                    ?>
                                </td>
                                 <td>
                                    <?php echo $data1['date'];?>
                                </td>
                                  <td>
                                    <?php echo $data1['expire_date'];?>
                                </td> 
                                
                            </tr>
                            <?php $i++;} ?>
                            
                      
                            </tbody>
                            </table>

                            <table align="center" >
                            <tr></tr>
                            <tr>
                      <td></td>
                      <td></td>
                      <td style="font-weight:bold;text-align:center;"><h4>Total Commission = </h4></td>
                      <td><span><h4><?php echo $total; ?></h4></span></td>
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