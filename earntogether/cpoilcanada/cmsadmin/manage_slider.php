<?php
include("../lib/config.php");


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
<
            <!--body wrapper start-->
			
            <div class="wrapper">

                <div class="row">

                    <div class="col-sm-12 text-right">

                        <a href="add_new_slider.php" class="btn btn-success">Add New Slider</a>

                    </div>

                </div><br />
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 Manage Front Slider
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="table-responsive">
			
          <table class="table table-striped table-bordered table-hover">
		 <!--  <span style="float:right"><a href="add_new_slider.php"> <button class="btn btn-danger side"  type="button" id="button" >Add Slider</button></a></span>
       -->        <thead>
              
					  
					 
                <tr>
                  <th>S.no.</th>
                 <th>Main Heading</th>
				 <th>Sub Heading</th>
                 <th>image</th>
                 <th>Status</th>
				 <th>Action</th>
				 
				 
				 </tr>
              </thead>
              <tbody>
              <?php 
			  
			       $sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from  manage_slider order by id ");
			 
			 while( $slider=mysqli_fetch_array($sql))
			 {
				
				 if($slider['status'] ==0)
				{
					 $statuss = "Active";	 
				}
				else
				{
					$statuss = "Deactive";	
				}
				
				 
				 
	 ?>
                <tr>
                  <td><?php echo $slider['id']; ?></td>
                 
                  <td><?php echo $slider['main_heading']; ?></td>
				  <td><?php echo $slider['sub_heading']; ?></td>
                   
                  <td><img src="images/<?php echo $slider['image']; ?>" height="100" width="100"></td>
                
                   <td><?php echo $statuss ;?></td>
				  <td width="20%">&nbsp;
				  
             <span style="margin-left:5px;"><a href="update_slider.php?pid=<?php echo $slider['id'];?>"><img src="images/edit.png" /></a></span>
			
			<span style="margin-left:5px;"><a href="delete_slider.php?id=<?php echo $slider['id'];?>" title="Delete"><img src="images/Trashcan.png" style="height: 32px; width:32px;"  /></a></span>
                  </td>

				  
				  
				  
				 
				 
			 <?} ?>
                 
                  
                </tr>
               
                    
              </tbody>
            </table>
            
               

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