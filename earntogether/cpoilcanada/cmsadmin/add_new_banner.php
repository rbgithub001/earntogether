<?php
include("../lib/config.php");
 $eid=$_GET[eid];  


// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id']))
    header("Location:login.php");
  }
  
  
function adGetExtension($str) 

{

     $i = strrpos($str,".");

  if (!$i) { return ""; }

  $l = strlen($str) - $i;

  $ext = substr($str,$i+1,$l);

  return $ext;

}

///////start of image uploading general function from here

function adImageUpload($image, $cnt, $pathss)

  {

    $_FILES['image1']=$image;

       //This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.

         //get the original name of the file from the clients machine

             $filename = stripslashes($_FILES['image1']['name']);

            //get the extension of the file in a lower case format

             $extension = adGetExtension($filename);

             $extension = strtolower($extension);

            

            

             if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

             {

             //print error successMsg

              //echo "<span class='successMsg'>File Not Uploaded</span>";

              $errors=1;

             }

             else

             {

              

              

            $size=filesize($_FILES['image1']['tmp_name']);

           

           //compare the size with the maxim size we defined and print error if bigger

           if ($size > MAX_SIZE*1024)

           {

            //echo "<span class='successMsg'>File is big in size</span>";

            $errors=1;

           }

           //we will give an unique name, for example the time in unix time format

           $image_name=time().$cnt.'.'.$extension;

           //the new name will be containing the full path where will be stored (images folder)

           $newname=$pathss.$image_name;

           $copied = copy($_FILES['image1']['tmp_name'], $newname);

           if (!$copied) 

           {

            //echo "<span class='message'>File not Copied</span>";

            $errors=1;

           }}
           return @$image_name;            
     }
  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");
  
  if(isset($_POST['submits']))
	{ 

    $name=$_POST['name']; 
   $title=$_POST['sub_name'];
      $link=$_POST['link_btn1']; 
	    $date=date('Y-m-d');

 
 //$logo_name=$_POST['logo_name'];
  $mainImagePath="images/";

  $img1=adImageUpload($_FILES['logo_name'], "1", $mainImagePath);

  
		
   $sql="insert into manage_slider  set main_heading = '".$name."' ,  sub_heading ='".$title."' ,  image ='".$img1."' ,date='".$date."' " ;  
  mysqli_query($GLOBALS["___mysqli_ston"],  $sql) ; 

	$msg="New Banner Uploaded";
    header("location:manage_banner.php?msg=$msg");

	}
	
 
	
            
                 
     
          //  header("Location:create-epin-reports.php?msg=Require fields does not match");
 


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
                            Add New Banner<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
					
				 <form action="" class="validate" method="post" id='form1' enctype="multipart/form-data">
                    <fieldset>
                      <div class="form-group">
                        
                      </div>
                      
                         <div class="form-group">
                        <div class="left-box">
                          <label for="name" >Main Heading</label>
                          <input type="text" class="validate[required] form-control placeholder" name="name" id="name" value=" <?php echo $fes1[page_name] ; ?>"  placeholder="Your Name" data-bind="value: name" />
                          
                        </div>
                      </div>
                      
                    
                      
                         <div class="form-group">
                        <div class="left-box">
                          <label for="name" >Sub Heading</label>
                          <input type="text" class="validate[required] form-control placeholder" name="sub_name" id="sub_name"  placeholder="" data-bind="value: name" /> 
                        </div>
                      </div>
					     <!-- <div class="form-group">
                        <div class="left-box">
                          <label for="name" >Link Title</label>
                          <input type="text" class="validate[required] form-control placeholder" name="link_btn1" id="link_btn1"  placeholder="" data-bind="value: name" /> 
                        </div>
                      </div> -->
					  
					       <div class="form-group">
                        <div class="left-box">
                          <label for="name" >Status</label>
                          <select class="validate[required] form-control placeholder" name="status" placeholder="Title" data-bind="value: name" />
                          <option value="">Active</option>
                          <option value="">inactive</option>
                          </select>
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <div class="left-box">
                          <label for="name" >Upload Image</label>
                          <input type="file" class="validate[required] form-control placeholder" name="logo_name" id="logo_name"  placeholder="" data-bind="value: name" /> 
                        </div>
                      </div>
                      
           

					  
					  
					  
					  

                      <div class="clearfix"></div>
                      <div class="form-group">
                        <div class="left-box"> <br />
                          <button class="btn btn-danger side"  type="submit" name="submits" id="button" >Submit</button>
                        </div>
                      </div>
                    </fieldset>
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

</body>
</html>