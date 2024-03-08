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
  $dfrom=explode("/",$frm);
  $fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 

  if($frm!='')
  {
    
  $query123="where receive_date='$frm'";  
    
  }
  
//echo $query123; die;
}


/*if($_POST[submits])
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
  
  if($frm!='' && $til!='')
  {
    $query123[]=" receive_date>='$fdate' and receive_date<='$edate' ";
  }
  if(count($query123) > 0){
  $qry= 'where '.implode(' and',$query123);
  //echo $qry; die;
  }
} */


if (isset($_POST['cono']))
{
   $adid=$_POST['adid'];
   $bank_ref=!empty($_POST['bank_ref'])?$_POST['bank_ref']:'NA';
   if ($_POST['bank_ref']=='NA' || $_POST['bank_ref']=='')
   {
    $bank_ref='NA';
   }
   else
   {
    $bank_ref=$_POST['bank_ref'];
   }
   if ($_POST['trans_date']=='NA' || $_POST['trans_date']=='')
   {
    $trans_date='NA';
   }
   else
   {
    $trans_date=$_POST['trans_date'];
   }
   

   if (!empty($bank_ref) && !empty($trans_date))
   {
      $chk=mysqli_query($GLOBALS['___mysqli_ston'],"SELECT * FROM closing_credit_debit WHERE id='".$adid."' AND (bank_ref='NA' OR trans_date='NA')");
      $count=mysqli_num_rows($chk);
      if ($count>0)
      {
         $upq=mysqli_query($GLOBALS['___mysqli_ston'],"UPDATE closing_credit_debit SET bank_ref='".$bank_ref."',trans_date='".$trans_date."' WHERE id='".$adid."'");
         if ($upq)
         {
            header('location:close-monthly-closing.php?msg=Information Updated Successfully');exit;
         }
         else
         {
            header('location:close-monthly-closing.php?msg=Invalid action');exit;
         }
      }
      else
      {
        header('location:close-monthly-closing.php?msg=Already Submitted');exit;
      }
   }
   else
   {
      header('location:close-monthly-closing.php?msg=Fill The Details');exit;
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

  <?php 

                                  $data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from closing_credit_debit where 1  $query123");
                                  while($data21=mysqli_fetch_array($data2)) {  ?>
  <!-- Modal -->
<div class="modal fade" id="pro<?php echo $data21['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#fff;">Payout Details</h4>
      </div>
      <div class="modal-body">
        <form method="POST">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <td><strong>Bank Reference No. : </strong></td>
                    <td>
                      <input type="text" class="form-control" name="bank_ref" placeholder="Enter Bank Reference No." value="<?php echo $data21['bank_ref'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td><strong>Transfer Date : </strong></td>
                    <td>
                      <input type="text" class="form-control" name="trans_date" placeholder="Enter Transfer Date" id="zango" value="<?php echo $data21['trans_date'];?>" required>
                      <input type="hidden" name="adid" value="<?php echo $data21['id'];?>">
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2"><input type="submit" name="cono" value="Submit" class="btn btn-warning"></td>
                </tr>
            
            </table>
        </form>
      </div>
    </div>
  </div>
</div>

<?php } ?>

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

              
                    
                     </div>
                    
                </div><br />

                <div class="row">

                  <div class="col-sm-12 text-right">

                     <a href="searching_export_excel.php?date_r=<?php echo $query123;?>" class="btn btn-success">Export in excel</a>
                       <!--  <a href="searching_export_excel.php" class="btn btn-success">export in excel</a> -->
<?php// echo '<a class="btn btn-success" href="searching_export_excel.php?link=' . $query123 . '">export in excel</a>';?>
<!-- <?php echo '<a class="btn btn-success" href="export-close-monthly-closing.php?link=' . $query123 . '">export in excel</a>';?> -->
                    </div></br>
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                  Close Payout Report
        
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>



    
   
    <div class="total_invoice"  id="printArea">
<br/>
     <form class="form-inline" role="form" method="post" autocomplete="off" action="">
                               
                                <div class="form-group" id="date">
                                  <label for="date" class="col-lg-2 col-sm-2 control-label">Payout Date</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="date" class="form-control" id="datepicker" placeholder="YYYY-MM-DD" value="<?php echo $filter_date;?>">
                                    </div> 
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                            <hr/><br/>


                            <div class="table-responsive">

                                    <input type="hidden" name="qry" value="<?php echo $query123;?>">
                                      <input type="hidden" name="from" value="<?php echo $frm;?>">

                           <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                                 <th style="text-align:center;">
                                    S.No
                                </th>
                                 <th style="text-align:center;">
                                     Closing Date
                                </th style="text-align:center;">
                                <th style="text-align:center;">
                                    Userid
                                </th>
                                 <th style="text-align:center;">
                                    Full Name
                                </th>
                            
                                <th style="text-align:center;">
                                 Matching Bonus
                                </th>
                               <!--  <th style="text-align:center;">
                                  Direct Income 
                                </th> -->
                                <th style="text-align:center;">
                                 Repurchasing Bonus
                                </th>
                                 <th style="text-align:center;">
                                 Sales Rank Reward
                                </th>
                                <!-- <th style="text-align:center;">
                                    Travel/Car/House Fund Bonus
                                </th>
                                  <th style="text-align:center;">
                                  Quick Promotion Bonus
                                </th> -->
                                  <th >
                                 CTO Bonus
                                </th>
                                <th style="text-align:center;">
                                     Total 
                                </th>  
                            
                               

                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 

                         
                                  $i=1;
                             
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from closing_credit_debit $query123");
                                  while($data1=mysqli_fetch_array($data))
                                    {
                  
         $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_id='".$data1['user_id']."'"));           


                                                              
                                     ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                               <td>
                                    <?php

                                     echo $data1['receive_date'];?>
                                </td> 
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                                 <td>
                                    <?php echo $data11['first_name']."".$data11['last_name'];?>
                                </td>
                                          

                               
                                  

                  <td><?php echo $data1['binary_income'];?></td>
                          <!-- <td><?php echo $data1['direct_income'];?></td> -->
                             <td><?php echo $data1['repurchase_income'];?></td>
                        <td><?php echo $data1['sales_reward'];?></td>
                      
                     
                        <!--  <td><?php echo $data1['fund_income'];?></td>
                            <td><?php echo $data1['qperformance_income'];?></td>
                       -->
                               <td><?php echo $data1['frenachie_income'];?></t>
                       <td><?php echo $data1['credit_amt'];?></td>
                        

                            </tr>


                            <?php $i++;} 

  ?>
                            
                      
                            </tbody>
                            </table>
                            
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
  </script>

      <script>
  $( function() {
    $( "#zango" ).datepicker({"dateFormat": "yy-mm-dd"});
  } );
  </script>


</body>
</html>