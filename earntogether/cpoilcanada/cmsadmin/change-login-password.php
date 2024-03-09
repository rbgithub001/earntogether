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

if(isset($_POST['Add']))
{
$condition = " where user_id ='".$_SESSION['user_id']."'"; 
$args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');

$dbpwd=$args_user['password'].$_SESSION['nonce']; 

$pwd=hash('sha256',$dbpwd); 

   $password=$_POST['password'];
   $oldpassword=$_POST['oldpassword'];
   $userName = $_SESSION['userName'];
   $user_id=$_SESSION['user_id'];
   if($oldpassword==$pwd)
   {
    
   mysqli_query($GLOBALS["___mysqli_ston"], "update admin set password='$password' where user_id='$user_id'");
   header("location:change-login-password.php?msg=Login Password Change Successfully!");
   }
   else
   {
     header("location:change-login-password.php?msg=Old Password Not Match!");
   }
}



if(isset($_POST['Deduct']))
{
    $password=$_POST['password'];
    $password1=$_POST['password1'];
   if($password==$password1)
   {
   mysqli_query($GLOBALS["___mysqli_ston"], "update admin set transaction_pwd='$password1' where id=1");
   header("location:change-login-password.php?msg1=Transaction Password Change Successfully!");
   }
   else
   {
     header("location:change-login-password.php?msg1=Retype Password Not Match!");
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
                            Change Login Password<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" id="myform" name="myform"  autocomplete='off'>
                         <? include('../lib/random.php');
                             $salt=$_SESSION['nonce'];
                                ?>
								 <input type="hidden" name="randm" id="randm" value = "<?php echo htmlentities($salt);?>" />
						    <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Enter old Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Enter old Password" required value="" >
                                       
                                    </div>
                                </div>
						 
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Enter New Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password" required value="" >
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Retype New Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" id="inputPassword1" placeholder="Retype New Password" required>
                                       
                                    </div>
                                </div>
                                       
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="Add" onclick="return hash()" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
                 
            
            

            </div>
            <!--body wrapper end-->
			<script type="text/javascript" src="js/sha256.js"></script> 
<script>		
function hash() //function to calculate the salted has
{
var oldpassword=document.myform.oldpassword.value;
var password=document.myform.password.value;
var confirm_password=document.myform.confirm_pwd.value;
 
 var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{7,20}$/;
 if (oldpassword=="")
  {
  alert("Old Password must be filled out");
  document.myform.oldpassword.focus();
   return false;
  }
  if (password=="")
  {
  alert("Password must be filled out");
  document.myform.password.focus();
   return false;
  }
  if (password!=confirm_password)
  {
  alert("Confirm password Password must be Same");
  document.myform.confirm_pwd.focus();
   return false;
  }
  if(!re.test(password)) {
 alert("Error: password must contain at least one uppercase,Lower,spaciel char and one number,total 8 char!");
 document.myform.password.focus();
 return false;
 }
 
   var randm=document.myform.randm.value;
   oldpassword = sha256(oldpassword); 
   
   oldpassword = oldpassword + randm;  
  
   document.myform.oldpassword.value = sha256(oldpassword);
   document.myform.password.value = sha256(password);
   document.myform.confirm_pwd.value = sha256(confirm_password);
   document.myform.randm.value = "";
 }
 </script>

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

</body>
</html>