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

$id=$_GET['id'];
  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");

if(isset($_POST['submits']))
{
$product1=$_POST['product1'];
$product2=$_POST['product2'];
$product3=$_POST['product3'];
$product4=$_POST['product4'];
$product5=$_POST['product5'];
$product6=$_POST['product6'];
$product7=$_POST['product7'];
$product8=$_POST['product8'];
$product9=$_POST['product9'];
$product10=$_POST['product10'];
$product11=$_POST['product11'];
$product12=$_POST['product12'];
$product13=$_POST['product13'];
$product14=$_FILES['image']['name'];
$product15=$_POST['product15'];
$product16=$_POST['product16'];
$product17=$_POST['product17'];
$product18=$_POST['product18'];
$product19=$_POST['product19'];
$product20=$_POST['product20'];
$display_category=$_POST['display_category'];
$fcs=$_POST['fcs'];

$delvry = '';

  if ($_POST['allcountry'] == 'ALL') {

    $delvry = $_POST['allcountry'];
  } else {

      foreach ($_POST['delivery'] as $key => $value) {
        $delvry .= $value.',';
      }

      $delvry = trim($delvry,',');
  }

global $mxDb;
global $ImageCreate_obj;



if($product14!='')
{
$small_image = '';
$medium_image = ''; 
$large_image = '';  
$file_name = time()."large_".$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"product_images/".$file_name);

       
        // set requierd image createtion variable
        $image_array = explode(".",$file_name);
        $ext = end($image_array);
        $small_image = time()."small_".$_FILES['image']['name'];
        $medium_image = time()."mid_".$_FILES['image']['name']; 
        $large_image = $file_name;
        // set main image name
        $ImageCreate_obj->main_image_name = $file_name;
        // set main image path
        $ImageCreate_obj->main_image_path = "product_images/";
        // set new image path
        $ImageCreate_obj->new_image_path = "product_images/";
        // set new image extention
        $ImageCreate_obj->ext = $ext;
        list($width, $height) = @getimagesize("product_images/".$file_name);

                
          // create small image dimension is 165*165.
          $ImageCreate_obj->new_image_name = $small_image;
          $ImageCreate_obj->new_image_width = 150;
          $ImageCreate_obj->new_image_height = 150;
          $ImageCreate_obj->image_create();   
          
          // create medium image dimension is 334*383.
          $ImageCreate_obj->new_image_name = $medium_image;
          $ImageCreate_obj->new_image_width = 294;
          $ImageCreate_obj->new_image_height = 357;
          $ImageCreate_obj->image_create(); 
          
          // create medium image dimension is 1000*1000.
          $large_image = time()."main_".$_FILES['image']['name'];
          $ImageCreate_obj->new_image_name = $large_image;
          $ImageCreate_obj->new_image_width = 1000;
          $ImageCreate_obj->new_image_height = 1000;
          $ImageCreate_obj->image_create(); 




mysqli_query($GLOBALS["___mysqli_ston"], "update products set actual_image='$file_name', image='$small_image', m_image='$medium_image', l_image='$large_image' where product_id='$id'");          
        
}

mysqli_query($GLOBALS["___mysqli_ston"], "update products set category='$product1', sub_category='$product2', sub_sub_category='$product3', product_code='$product4', product_name='$product5', qty='$product6', price='$product7', discount='$product8', points='$product9', wholesale_price='$product10', mode='$product11', shipping_charge='$product12', tax='$product13', description='$product20' where product_id='$id'");




header("location:manage-product.php?msg=Plot details Updated Successfully !");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("header.php");?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Edit Plot Details<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        
                        <?php $data1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from products where product_id='$id'"));?>
                       
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">




                            <!-- <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Product Category</label>
                                    <div class="col-lg-10">
                                              <select name="product1" class="form-control">
                                    <?php $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where status=0");
                                        while($data=mysqli_fetch_array($action)) {
                                       ?>
                                       <option value="<?php echo $data['category_id'];?>" <?php if($data1['category']==$data['category_id']) { ?> selected <?php } ?>><?php echo $data['name'];?></option>
                                       <?php } ?>
                                       </select>
                                    </div>
                                </div>-->
                                 
                               <!-- <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Unique Product Code</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product4" class="form-control" placeholder="Enter Unique Product Code" required value="<?php echo $data1['product_code'];?>" >
                                       
                                    </div>
                                </div>-->
                             <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Plot Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product5" class="form-control" placeholder="Enter Plot Name" required value="<?php echo $data1['product_name'];?>" >
                                       
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Plot Quantity</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product6" class="form-control" placeholder="Enter Plot Quantity" required value="<?php echo $data1['qty'];?>" >
                                       
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Plot Price</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product7" class="form-control" placeholder="Enter Plot Retail Price" required value="<?php echo $data1['price'];?>" >
                                       
                                    </div>
                                </div>

                                  

                               <!-- <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Product Discount</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product8" class="form-control" placeholder="Enter Product Disount" required value="<?php echo $data1['discount'];?>" >
                                       
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Plot PV/BV</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product9" class="form-control" placeholder="Enter Plot Point" required value="<?php echo $data1['points'];?>" >
                                       
                                    </div>
                                </div>

                                
                                 <!-- <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Product Type</label>
                                    <div class="col-lg-10">
                                      
                                        <select name="product11" class="form-control">
                       
                            <option value="New Arrival" <?php if($data1['mode']=='New Arrival') { ?> selected <?php } ?> >New Arrival</option>
                         <option value="Featured" <?php if($data1['mode']=='Featured') { ?> selected <?php } ?>>Featured</option>
                         <option value="Sale" <?php if($data1['mode']=='Sale') { ?> selected <?php } ?>>Sale</option>
                         <option value="Best Seller" <?php if($data1['mode']=='Best Seller') { ?> selected <?php } ?>>Best Seller</option>
                          </select>
                                    </div>
                                </div>-->
                              <!--   <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Shipping Charge ($)</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product12" class="form-control" placeholder="Enter Shipping Charge" required value="<?php echo $data1['shipping_charge'];?>" >
                                       
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tax (%)</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product13" class="form-control" placeholder="Enter Tax" required value="<?php echo $data1['tax'];?>" >
                                       
                                    </div>
                                </div>-->
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Plot Image</label>
                                    <div class="col-lg-10">
                                    <img src="product_images/<?php echo $data1['image'];?>" style="width:100px;"><br/><br/>Or Change <br/>
                                        <input type="file" name="image" class="form-control"  >
                                       
                                    </div>
                                </div>
                                
                               

                               

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                        <textarea name="product20" id="editor2" class="form-control"><?php echo $data1['description'];?></textarea>
                                       
                                    </div>
                                </div>
                                       
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="submits" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
           
            </div>
            
            

            </div>
            <!--body wrapper end-->
 <script type="text/javascript">
                         // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor2',
                         {
                              filebrowserBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html',
                              filebrowserImageBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html?type=Images',
                              filebrowserFlashBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html?type=Flash',
                              filebrowserUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                              filebrowserImageUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                              filebrowserFlashUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                              filebrowserWindowWidth : '1000',
                              filebrowserWindowHeight : '700'
                         });
                         </script>
                              <script type="text/javascript">
                // delete record
                delete_item2 = function(id,pid,im){
                  
                   if(confirm("Do you want to delete this record?")){
                      var url = 'delete-more-images.php?dpid='+id+'&mpid='+pid+'&dfid='+im;
                        window.location.href=url;
                    }
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