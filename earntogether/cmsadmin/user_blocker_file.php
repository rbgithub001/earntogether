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
$_SESSION['rand'] = mt_rand(1111111,9999999); 
if(isset($_POST['Add']))
{
   $down=$_POST['down'];
   $bstatus=$_POST['bstatus'];
   
   $left=$_POST['left'];
   $right=$_POST['right'];
   $both=$_POST['both'];
   
   $uid=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where (user_id='".$_POST['userid']."' OR username='".$_POST['userid']."' )"));
   $userid=$uid['user_id'];
   
   
   if($down=='with_downline'){
       $ch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid'");
    while($ch1=mysqli_fetch_assoc($ch)){
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$ch1['down_id']."'");
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$_POST['userid']."'");
    }
   }else{
   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='$userid'");    
   }
   
   
    if($left=='left_member'){
       $ch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='left'");
    while($ch1=mysqli_fetch_assoc($ch)){
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$ch1['down_id']."'");
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$_POST['userid']."'");
    }
   }
   if($right=='right_member'){
    $ch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='right'");
    while($ch1=mysqli_fetch_assoc($ch)){
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$ch1['down_id']."'");
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$_POST['userid']."'");
    }  
   }
   
    if($both=='both_member'){
    $ch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid'");
    while($ch1=mysqli_fetch_assoc($ch)){
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$ch1['down_id']."'");
           mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_status='$bstatus' where user_id='".$_POST['userid']."'");
    }  
   }
   
   
   
   
   
  header("location:user_blocker_file.php?msg=User Blocked Status Updated Successfully..!");
  exit;
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
                <div class="col-lg-8">
                    <section class="panel">
                        <header class="panel-heading">
                            User Id Blocker<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Userid</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="userid" class="form-control" placeholder="Enter Userid / Username" required value="<?php echo $_GET['id'];?>">
                                        <p class="help-block">Enter userid or username of the user</p>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                     <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"></label>
                                    <div class="col-lg-10">
                                        <label for="down" class="btn btn-secondary active">
                                        <input type="radio" id="down" name="down" value="with_downline">With Downline</label>
                                        
                                        <label for="down" class="btn btn-secondary active">
                                        <input type="radio" id="self" name="down" value="self">Self</label>
                                    </div>
                                </div>
                                
                                  <div class="form-group">
                                     <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"></label>
                                    <div class="col-lg-10">
                                        <label for="down" class="btn btn-secondary active">
                                        <input type="radio" id="down" name="left" value="left_member">Left</label>
                                        
                                        <label for="down" class="btn btn-secondary active">
                                        <input type="radio" id="self" name="right" value="right_member">Right</label>
                                        <label for="down" class="btn btn-secondary active">
                                        <input type="radio" id="self" name="both" value="both_member">Both</label>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Block Status</label>
                                    <div class="col-lg-10">
                                    <select name="bstatus" class="form-control">
                                        <option value="">Block Status</option>
                                        <option value="1">Blocked</option>
                                        <option value="0">Unblocked</option>
                                    </select>    
                                    </div>
                                </div>
                                 
                                   
                                   
                                    
                               
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="Add" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
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

<script type="text/javascript">
	$('#remark').change(function (){
		var selectedValue = this.value;
		if(selectedValue == 'Bank Transfer')
		{
			$('#banksDiv').removeClass('hide');
			$('#refKeyDiv').removeClass('hide');
		}
		else if(selectedValue == 'NETS' || selectedValue == 'VISA/MASTER' || selectedValue == 'OTHERS')
		{
			$('#banksDiv').addClass('hide');
			$('#refKeyDiv').removeClass('hide');
		}
		else 
		{
			$('#banksDiv').addClass('hide');
			$('#refKeyDiv').addClass('hide');
		}
		
	});
	
</script>

</body>
</html>