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
    $query123[]=" registration_date>='$fdate' and registration_date<='$edate' ";
  }
  if(count($query123) > 0){
  $qry= 'and '.implode(' and',$query123);
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
                    Dashboard
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">

                    <div class="col-sm-12 text-right">

                        <a href="export_member_list.php" class="btn btn-success">export in excel</a>

                    </div>

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 Inactive Member List

                                 
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>


                              </br>
   
    <div class="total_invoice"  id="printArea">

     <?php

                 $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=1"));
                 $rowww11=$sqlqw1['sponsor_reward'];
                 $rowww12=$sqlqw1['name'];
                 $rowww13=$sqlqw1['amount'];
                 $rowww14=$sqlqw1['matching'];

                 $sqlqw2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=2"));
                 $rowww21=$sqlqw2['sponsor_reward'];
                 $rowww22=$sqlqw2['name'];
                 $rowww23=$sqlqw2['amount'];
                 $rowww24=$sqlqw2['matching'];

                 $sqlqw3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=3"));
                 $rowww31=$sqlqw3['sponsor_reward'];
                 $rowww32=$sqlqw3['name'];
                 $rowww33=$sqlqw3['amount'];
                 $rowww34=$sqlqw3['matching'];

                 $sqlqw4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=4"));
                 $rowww41=$sqlqw4['sponsor_reward'];
                 $rowww42=$sqlqw4['name'];
                 $rowww43=$sqlqw4['amount'];
                 $rowww44=$sqlqw4['matching'];


                ?>


                            <div class="table-responsive">
                            <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    User ID
                                </th>
                                <th style="text-align:center;">
                                    Username
                                </th>
                                <th style="text-align:center;">
                                    Full Name / Email / Mobile
                                </th>
                               
                                 <th style="text-align:center;">
                                  Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                //   echo "select * from user_registration $qry";
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_rank_name='Free Member' order by id desc");
                                  while($data1=mysqli_fetch_array($data))
                                    { ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    
                                    <a href='jumpto_member_office.php?id=<?php echo $data1['user_id'];?>' target="_blank"><?php echo $data1['user_id'];?> </a>
                                </td>
                                <td>
                                    <?php echo $data1['username'];?>
                                </td>
                             
                                <td>
                                    <?php echo $data1['first_name']." ".$data1['last_name'];?><br/> <?php echo $data1['username'];?> <?php echo $data1['email'];?><br/>  <?php echo $data1['username'];?><?php echo $data1['telephone'];?>
                                </td>
                               

                                
                            

                                
                               
   


                                 <td>
                                   <form method="post" action="memberactive.php">
                                    <input type="hidden" value="<?php echo $data1['user_id'];?>" name="user">
                                    <table class="table table-bordered">
                    <tr><td> <input type="radio" name="package" value="1" required></td><td><?php echo $rowww12;?></td><td> Invest between $<?php echo $rowww13;?> and $<?php echo $rowww14;?></td><td><?php echo $rowww11;?> % Daily</td></tr>
                    <tr><td> <input type="radio" name="package" value="2" required></td><td> <?php echo $rowww22;?></td><td> Invest between $<?php echo $rowww23;?> and $<?php echo $rowww24;?></td><td><?php echo $rowww21;?> % Daily</td></tr>
                    <tr><td> <input type="radio" name="package" value="3" required></td><td> <?php echo $rowww32;?></td><td> Invest between $<?php echo $rowww33;?> and $<?php echo $rowww34;?></td><td><?php echo $rowww31;?> % Daily</td></tr>
                    <tr><td> <input type="radio" name="package" value="4" required></td><td> <?php echo $rowww42;?></td><td>Invest $<?php echo $rowww43;?>+</td><td><?php echo $rowww41;?> % Daily</td></tr>
                   </table><br/>
                                   <input type="number" value="" name="amount" placeholder="Enter amount"><br/><br/>
                                   <input type="submit" name="active" value="Submit">
                                   </form>
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