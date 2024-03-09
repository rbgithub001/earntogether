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

   <style>
       .item.active{
           height:120px;
           width:auto;
       }
   </style>
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

                  <div class="col-sm-12 text-left">

                      <h3 style="color: #00aafe; font-weight: 600; font-size: 30px; padding-bottom:30px;">Vendor List</h3>

                    </div>
                    
                    <!-- image-->
                    


                    
                    
                    
                    <!--image end-->

                </div><br />
                
                <div class="row">
                      <?php 
                                  $n=1;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_registration where franchise_category!='Master Franchise'");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                            // 
                               // print_r($data1['location']);
                                 
                                    ?>
                    
                    <div class="col-md-4">
                        <div class="single_vendorCard">
                          <div class="img_details">
                                <div class="vendor_img">
                                   <div id="carousel<?php echo $n; ?>-example-generic" class="carousel slide" data-ride="carousel">

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                            <?php 
                                     
                                       $cc = count(explode(",",$data1['file']));
                                       $r=$data1['file'];
                                      
                                       $p=explode(",",$r);
                                      
                                       for($i=0; $i < $cc; $i++) {
                                      ?>
                                       <div class="item <?php if($i == 0) { echo "active"; } ?>">
                                          <img src='../uploads/<?php echo $p[$i]; ?>'  alt="...">
                                        </div>
                                        
                                       <?php } ?>  
                                        
                                        <!--<div class="item">
                                          <img src="https://flyjazz.ca/wp-content/uploads/2017/01/dummy-user.jpg" alt="...">
                                        </div>-->
                                      </div>
                                    
                                      <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel<?php echo $n; ?>-example-generic" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel<?php echo $n; ?>-example-generic" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </div>
                                    <!--<img class="img-responsive" src="https://flyjazz.ca/wp-content/uploads/2017/01/dummy-user.jpg" alt="" />-->
                                </div>
                                <div class="vendor_details">
                                    <div class="single_details">
                                        <h5>ID</h5>
                                        <h5><?php echo $data1['user_id'];?></h5>
                                    </div>
                                    <div class="single_details">
                                        <h5>Name</h5>
                                        <h5><?php echo $data1['first_name']." ".$data1['last_name'];?></h5>
                                    </div>
                                    <div class="single_details">
                                        <h5>Number</h5>
                                        <h5><?php echo $data1['telephone'];?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="cardButtons">
                                <a href="<?php echo $data1['location'];?>" target="_blank" class="btn btn-primary">View Location</a>
                              
                                <a href="vender-history.php?id=<?php echo $data1['user_id'];?>" target="_blank" class="btn btn-primary">View History</a>
                            </div>
                        </div>
                    </div>
                        <?php $n++;} ?>
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