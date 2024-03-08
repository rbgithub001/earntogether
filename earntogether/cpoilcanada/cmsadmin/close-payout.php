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

if($_POST[submit])
{

$frm=$_REQUEST['date'];
$end_date=$_REQUEST['end_date'];

  if($end_date!='')
  {
    
  $query123=" and  receive_date<='$end_date'";  
    
  }
}  
?>
<!DOCTYPE html>
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
<script type="text/javascript">
function ValidateData(form)
{
 var chks = document.getElementsByName('list[]');
 var hasChecked = false;
 for (var i = 0; i < chks.length; i++)
 {
  if(chks[i].checked)
  {
   hasChecked = true;
   break;
  }
 }
 if (hasChecked == false)
 {
  alert("Please select at least one Request.");
  return false;
 }
} 
function Check(chk)
{
 var chk = document.getElementsByName('list[]');
 if(document.myform.Check_All.value=="Check All")
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = true ;
  document.myform.Check_All.value="UnCheck All";
 }
 else
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = false ;
  document.myform.Check_All.value="Check All";
 }
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

             <!--<div class="row">-->
             <!--     <div class="col-sm-12 text-right">-->
             <!--        </div>-->
                    
             <!--   </div><br />-->

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Close Payout Report
        
                                <!--<span class="tools pull-right">-->
                                <!--    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>-->
                                <!--    <a class="t-close fa fa-times" href="javascript:;"></a>-->
                                <!--</span>-->
                            </header>



    
   
                            <div class="total_invoice"  id="printArea">
                     
                             <!--<form class="form-inline" role="form" method="post" autocomplete="off">
                               
                           
                                <div class="form-group" id="date">
                                  <label for="date" class="col-lg-4 col-sm-4 control-label">Payout End Date</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="end_date" class="form-control" id="datepicker1" placeholder="YYYY-MM-DD" value="<?php echo $end_date;?>">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Search">
                                    </div>
                                </div>
                            </form>-->
                            <hr/>


                            <div class="table table-responsive">

                                <input type="hidden" name="qry" value="<?php echo $query123;?>">
                                      <input type="hidden" name="from" value="<?php echo $frm;?>">
                                      <input type="hidden" name="end_date" value="<?php echo $end_date;?>">
                                         <input type="hidden" name="from" value="<?php echo $frm;?>">

                            <table border="1" style="width:100%;margin:10px;">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                
                                 <th style="text-align:center;">
                                    User Id
                                </th>

                                 <th style="text-align:center;">
                                    User Name
                                </th>
                                <th style="text-align:center;">
                                    Full Name
                                </th>
                                <th style="text-align:center;">Payout Date</th>
                                <!--<th style="text-align:center;">-->
                                <!--    Receiver Rank Name-->
                                <!--</th>-->
                                
                                <!--<th style="text-align:center;">-->
                                <!--    Payer id-->
                                <!--</th>-->

                                 <th style="text-align:center;">
                                    KYC Status
                                </th>
                                
                                <!-- <th style="text-align:center;">-->
                                <!--    Payer Name-->
                                <!--</th> -->
                                <!--<th style="text-align:center;">-->
                                <!--    Payer Rank-->
                                <!--</th> -->
                                <!--<th style="text-align:center;">
                                 Business Volume
                                </th>-->
                                <th style="text-align:center;">
                                 Self Income 
                                </th>
                                <th style="text-align:center;">
                                 Level Income
                                </th>
                                <th style="text-align:center;">
                                    Total 
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                 $i=1;
                                  $startdate = date('Y-m-01');
                                  $enddate = date('Y-m-t');
                                  $total_sum=0;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration order by id asc");
                                  while($data1=mysqli_fetch_array($data)){
                                        $uid = $data1['user_id'];
                                        //  $businessamt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(rel_com_amt) as invcv from billing_detail where seller_id='$uid' and status='1' ")); 
                                        $leveltot = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as crdamt from credit_debit where user_id='$uid' and status='2' and ttype='Self Income'"));
                                            $selfincome=    $leveltot['crdamt'];
					                    $current_sub=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$data1['rank']."'"));
					                    $rankname = $current_sub['name'];
					                    
                                        $crddbt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as crdamt from credit_debit where user_id='$uid' and status='2' and ttype='Level Income' "));
                                        $levelinc = $crddbt['crdamt'];
                                        
                                        $recivId = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where status='2' and user_id='$uid'"));
                                      
                                        $recivdetl = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$recivId['receiver_id']."'"));
                                       
                                       $current_sub11=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$recivdetl['rank']."'"));
                                        $rankname11 = $current_sub11['name'];
                                        
                                        
                                        
                                        $total=($selfincome+$levelinc);
                                        if($total>0){
                                        ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                
                                
                                <td>
                                    <a href="jumpto_member_office.php?id=<?php echo $data1['user_id'];?>" target="_blank"><?php echo $data1['user_id'];?>
                                   <!--<a href="jumpto_member_office.php?id=<?php echo $recivId['receiver_id'];?>" target="_blank"><?php echo $recivId['receiver_id'];?></a>-->
                                </td>
                                <td><?php echo $data1['username'];?></td> 
                                <td><?php echo $data1['first_name']." ".$data1['last_name'];?></td>
                                <td><?php echo $recivId['payout_date'];?> </td>
                                 <!--<td><?php echo $recivdetl['first_name']." ".$recivdetl['last_name'];?></td> -->
                                 <!--<td><?php echo $rankname11;?></td>-->
                               
                                <!--<td>-->
                                <!--   <a href="jumpto_member_office.php?id=<?php echo $data1['user_id'];?>" target="_blank"><?php echo $data1['user_id'];?></a>-->
                                <!--</td>-->
                                <td> <?php if($data1['kyc_status']=='0'){ echo 'Pending'; }else{ echo 'Approved'; }?></td>
                                
                                 <!--<td><?php echo $data1['first_name']."".$data1['last_name'];?></td> -->
                                 <!--<td><?php echo $rankname;?></td>-->
                                  <td><?php echo number_format($selfincome,2);?> </td>
                                  <td><?php echo number_format($levelinc,2);?>  </td>
                                  
                                 <td><?php echo number_format($total,2);?></td>
                               <?php   $total_sum+=$total; ?>
                            </tr>
                            <?php $i++; 
                                               
                                          } 
                            }  
                            ?>
                            </tbody>
                            </table>
                              <div class="row">
                              <div class="col-sm-8">
                              </div>
                               <div class="col-sm-4" style="text-align: center;">
                              <strong>Total Payable Amount:</strong> <? echo CURRENCY ; ?> <?= number_format($total_sum,2); ?> 
                            </div>
                            </div>
                             <!--<div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                     
                                        <input name="Show" type="submit" class="btn btn-primary" id="Show" value="Generate Payout" onClick="setTimeout('window.location.reload()',3000);">
                                    </div>
                                </div><br/><br/>--></form>
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

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js">
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>

              <script>
  $( function() {
    $( "#datepicker" ).datepicker({"dateFormat": "yy-mm-dd"});
  } );
   $( function() {
    $( "#datepicker1" ).datepicker({"dateFormat": "yy-mm-dd"});
  } );
  </script>


</body>
</html>