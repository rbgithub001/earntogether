<?php
include("../lib/config.php");



require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require('spreadsheet-reader-master/SpreadsheetReader.php');


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


function level_countdd($crid,$tpid)
{
    global $a;
    $query1="select * from user_registration where user_id='$crid'";
    $result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
    $row=mysqli_fetch_array($result1);
    $rclid1=$row['nom_id'];
    $a=1;
    if($rclid1!=$tpid)
    {
        level_countdd($rclid1,$tpid);
        $a++;
    }
    else
    {
        $a=1;
    }
    return $a;
}
  

function commission_of_referal($ref,$useridss,$amount,$invoice_no)
{
    $date=date('Y-m-d');
    
$date1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from commission_charges where id=1 "));

    $spc=$date1['w_charge'];
    $withdrawal_commission=$spc*$amount/100;
    $rwallet=$withdrawal_commission;
    if($withdrawal_commission!='' && $withdrawal_commission!=0 && $ref!='cmp')
    {
    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')"); 

    }

return $withdrawal_commission;



}


if(isset($_POST['Add'])){

$date=date("Y-m-d");

  $mimes = ['text/csv','application/csv','application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["uploadedfile"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['uploadedfile']['name']);
    move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());




    /* For Loop for all sheets */
    for($i=1;$i<10;$i++){


      $Reader->ChangeSheet($i);


      foreach ($Reader as $Row)
      {
      
  $account_no = isset($Row[5]) ? $Row[5] : '';
    $balance = isset($Row[9]) ? $Row[9] : '';
  
$resos11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_acc_no='$account_no' "));
$user_id=$resos11['user_id'];
$resos=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$resos11['user_id']."' and user_rank_name='Paid Member'"));
                $rand = rand(0000001,9999999);
                $invoice_no=$user_id.$rand;   
                   $lfid="LJ".$user_id.$rand; 
    
if ($resos>0 && $balance!='') {
  
$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$user_id' ");
                $fetchnompos1=mysqli_fetch_array($selectnompos1);
                $ref=$fetchnompos1['ref_id'];



                       

$last_life=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$user_id' order by amount desc limit 0,1"));
$amount=$balance-$last_life['amount'];

if ($last_life['amount']=='') {
    $last_life['amount']=0;
}else{
    $last_life['amount']=$last_life['amount'];
}

if ($last_life['amount']<$balance) {
  
      
        $withdrawal_commission=commission_of_referal($ref,$user_id,$amount,$invoice_no);
}else{
    $withdrawal_commission=0;
}




            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`,`sponser_income`) VALUES (NULL, '$user_id', '1', '$balance', '$walls', '$password', '$rand', '$date', '$date', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$user_id."','".$fetchnompos1['ref_id']."','$pv','$withdrawal_commission')");



    $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$user_id'");
                while($upline=mysqli_fetch_array($upliners))
                {

              $income_id=$upline['income_id'];echo "<br>";
                $position=$upline['leg'];
                $user_level=level_countdd($user_id,$income_id); 
                mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$user_id','$user_level','".$balance."','$position','Package Purchase Amount','$date',CURRENT_TIMESTAMP,'0','$balance')");
                }





}

       }
       
header("Location:uploadcsv.php?msg=Uploaded Successfully");
exit;
    }


   


  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }


}


?>




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
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
     <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" style="min-height: 1000px;">

            <!-- header section start-->
    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                   Dashboard
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                 <?php include("top-menu1.php");?>
           
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

            <div class="row">
                <div class="col-lg-7 center-block" style="float:none;">
                    <section class="panel">
                        <header class="panel-heading">
                           <span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                         <?php $date1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from commission_charges where id=1 "));  ?>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Upload FXchoice Member List</label>
                                    <div class="col-lg-8">
                                        <input type="file" name="uploadedfile" class="form-control" required >
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Sponsor Commission(%)</label>
                                    <div class="col-lg-8">
                                        <input type="number" name="w_charge" class="form-control" placeholder="Enter Sponsor Commission" value="<?php echo $date1['w_charge'] ?>" required readonly>
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-8">
                                        <input type="submit" class="btn btn-primary" name="Add" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
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
                                   Balance
                                </th>
                                <th style="text-align:center;">
                                     Sponsor Income
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
                                  $date=date("Y-m-d");
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where date='$date'  order by id desc");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                    $total=$total+$data1['amount']; 
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
                                    <?php
                            if ($data1['sponser_income']=='') {
                                echo "0";
                            }else{
                                echo $data1['sponser_income'];
                            }

                                     ?>
                                </td> 
                                
                                 <td>
                                    <?php echo $data1['date'];?>
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
                      <td style="font-weight:bold;text-align:center;"><h4>Total Balance = </h4></td>
                      <td><span><h4><?php echo $total; ?></h4></span></td>
                      </tr>

                      </table>
                            </div></div>
            

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

</body>
</html>