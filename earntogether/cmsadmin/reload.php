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

//$page_flag=0;

$frm=$_REQUEST['from'];
$til=$_REQUEST['to'];

$dfrom=explode("/",$frm);

$fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 

$dednd=explode("/",$til);
$edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];



$username=$_REQUEST['id'];  



  if($username!='')
  {
    
  $query123=" where user_id='$username'";  
    
  }
  
if($frm!='' && $til!='')
{
$query123="where  registration_date>='$fdate' and   registration_date<='$edate' ";  
  
  
}
  //$query123=" and p_date>='$date1' and   p_date<='$date2' ";  


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
<!-- Main content starts -->
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script>
    function mtcn(admin_remark1,userId,Id)
    {

        if(admin_remark1!='' && admin_remark1!=false)
        {
            $.ajax({
                url:'../ajax/ajax_awb.php',
                type:'post',
                data:{admin_remark1:admin_remark1,userId:userId,id:Id,funtion:'mtcn'},
                success:function(data)
                {
                    
                    if(data==2)
                    {
                            alert("Successfully Updated Remark");
                            location.reload();
                    }
                    else if(data==3)
                    {
                        alert("Due to some Error Occur");
                    }
                }
                
                
                
            });
        }
        
    }
    
function statusResponse(val,id)
{ //alert(val);
  //alert(id);
  /*var con_id = document.getElementById("country").value;
  var ser_id = ser_id;*/
  $.ajax({
    type: "GET",
    url: "get_statusresponse.php",
    data: "val="+val+"&id="+id,
    cache: false,
    success: function(data){ //alert(data);
      //$("#amount").html(data);
      if(data==1)
      {
          window.location.href="reload.php?msg=Topup Sucessfully Approved!!";
      }
      if(data==2)
      {
        window.location.href="reload.php?msg=Topup Request is being Cancelled!";
      }
      if(data==3)
      {
        window.location.href="reload.php?msg=Please Select Status!!";
      }
    }
  });
}

    </script>

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
                    Reload Section
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">

                    <div class="col-sm-12 text-right">

                       <!--  <a href="export-reload-user.php" class="btn btn-success">export in excel</a> -->

                    </div>

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 Reload Section
<div style="padding:5px; color:#063; font-weight:bold;"><?php echo @$_GET['msg']; ?></div>
<?php

        /*if(isset($_GET['msg'])):
          if($_GET['msg']=='ist'):?>
                    <div style="padding:5px; color:#063; font-weight:bold;"><?php echo "Successfully Updated Data  !"; ?></div>
              <?php else: ?>
                    <div style="padding:5px; color:#F00; font-weight:bold;"><?php echo "Sorry Unable to Send !"; ?></div> 
      <?php
          endif;
        endif;*/
      ?>

                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <!-- <h5>SEARCHING.....</h5>
         <form method="post"  id='form1' method="post" name="search">
        <input type="text"  id="datepicker" name="start_date" placeholder="Start Date(YYYY-MM-DD)" />
        <input type="text"  id="datepicker1" name="end_date" placeholder="End Date(YYYY-MM-DD)"/>
         <button class="btn btn-success"  type="submit" id="button" name="show" >Submit</button>
         
</form> -->
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
    <form name="myform" onSubmit="return ValidateData(this);" method="post" action="">
    <div class="total_invoice"  id="printArea">
<input type="hidden" name="rand" value="<?php echo $_SESSION['rand'];?>"/>
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                              <th style="text-align:center;">S.no.</th>
                              <th style="text-align:center;">Plan Type</th>
                              <th style="text-align:center;">Plan Name</th>
                              <th style="text-align:center;">PV</th>
                              <th style="text-align:center;">RM/DENO</th>
                              <th style="text-align:center;">Mobile No</th>
                              <th style="text-align:center;">Username</th>
                              <th style="text-align:center;">Apply Date</th>
                              <th style="text-align:center;">Transaction Number</th>
                              <th style="text-align:center;">Status</th>
                                
                            </tr>
                            </thead>
                            <tbody>

<?php 
        if(isset($_POST['show']))
       {
          $start_date=substr($_POST['start_date'],2,100);
         $end_date=substr($_POST['end_date'],2,100);
        
          $args_banners_week = $mxDb->get_information('contact_reload', '*', "where 1=1  and (posted_date between '$start_date' and '$end_date') order by id desc ",false, 'assoc');
       }
       else
       {
       // get best offer banners 
        $args_banners_week = $mxDb->get_information('contact_reload', '*', "where 1=1 order by id desc ",false, 'assoc');
       }
        /* ====== show records ======== */
        if($args_banners_week):
          $s_nos = 1;
        
        
        
          foreach($args_banners_week as $banners):
        
        
          
              ?>

                           
                            <tr style="text-align:center;">
                  <td><?php echo $s_nos; ?></td>
                  <td><?php echo $banners['plan_type']; ?></td>
                  <td><?php echo $banners['plan_name']; ?></td>
                  <td> <?php echo $banners['amount']; ?></td>
                   <?php $red1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where name='".$banners['plan_name']."' and type='".$banners['plan_type']."'"));?>
                  <?php $red=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from reload_pv where pid='".$red1['id']."' and pv='".$banners['amount']."'"));?>
                    <td> <?php echo $red['rm']; ?></td>
                   <td> <?php echo $banners['mobile']; ?></td>
                  
                   
                     
                      <?php $red2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$banners['user_id']."'"));?>
                       <td><?php echo $red2['username']; ?></td>
                        <td><?php echo $banners['posted_date']; ?></td>
                           
                               <td><?php echo $banners['transaction_no'];?></td>
                                
                                 <td><select name="status" onchange="statusResponse(this.value,'<?php echo $banners['id']; ?>');">
                                  <option value="">Select Status</option>
                                  <option value="Approved" <?php if($banners['meter']=='0') { echo "selected"; } ?> >Approved</option>
                                  <option value="Cancel" <?php if($banners['meter']=='1') { echo "selected"; } ?>>Cancel</option>
                                </select></td>
                  
                 <?php @$total_amount=$total_amount+$banners['amount'];?>
                 
                </tr>
                <?php $s_nos++;
          endforeach;
        endif;
        ?>
                
                            
                            
                      
                            </tbody>
                            
                            </table>
                            <div style="text-align: center;"><b>Total PV = <?php echo @$total_amount;?></b> </div>
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