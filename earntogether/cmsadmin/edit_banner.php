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

  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");
$id=$_GET['id'];

if(isset($_POST['submits']))
{

  //$main_heading=$_POST['main_heading'];
  //$sub_heading = $_POST['sub_heading'];
  //$status=$_POST['status'];

//$fcs=$_POST['fcs'];

$url=$_POST['url'];

$extraimage1=$_FILES['image1']['name'];
$extraimage2=$_FILES['image2']['name'];
$extraimage3=$_FILES['image3']['name'];
$extraimage4=$_FILES['image4']['name'];
$extraimage5=$_FILES['image5']['name'];

$TMPextraimage1=$_FILES['image1']['tmp_name'];
$TMPextraimage2=$_FILES['image2']['tmp_name'];
$TMPextraimage3=$_FILES['image3']['tmp_name'];
$TMPextraimage4=$_FILES['image4']['tmp_name'];
$TMPextraimage5=$_FILES['image5']['tmp_name'];

$EXimgpath1 = "banner_images/".$extraimage1;
$EXimgpath2 = "banner_images/".$extraimage2;
$EXimgpath3 = "banner_images/".$extraimage3;
$EXimgpath4 = "banner_images/".$extraimage4;
$EXimgpath5 = "banner_images/".$extraimage5;

move_uploaded_file($TMPextraimage1,$EXimgpath1);
move_uploaded_file($TMPextraimage2,$EXimgpath2);
move_uploaded_file($TMPextraimage3,$EXimgpath3);
move_uploaded_file($TMPextraimage4,$EXimgpath4);
move_uploaded_file($TMPextraimage5,$EXimgpath5);




$display_category=$_POST['display_category'];
global $mxDb;
global $ImageCreate_obj;
$small_image = '';
$medium_image = ''; 
$large_image = '';  
//$file_name = time()."large_".$_FILES['image']['name'];
//move_uploaded_file($_FILES['image']['tmp_name'],"banner_images/".$file_name);

$status=$_REQUEST['status'];
  
      $old_image=$_POST['old_image'];
     $file_name = time()."large_".$_FILES['image']['name'];
    $uploads_dir = 'banner_images';
    $tmp_name = $_FILES["image"]["tmp_name"];
   move_uploaded_file($_FILES['image']['tmp_name'],"banner_images/".$file_name);

if($_FILES['image']['name']=='')
  {
$img = $old_image;
$status=$_REQUEST['status'];
$url=$_POST['url'];

$str1="update manage_slider set status='".$status."',url='".$url."',actual_image='".$img."' WHERE id='$id'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $str1)or die("error");
header("location:manage_banner.php?msg= update Successfully !!");
  }
    
  else
  {
    $img = $file_name;
  

        
        // set requierd image createtion variable
        $image_array = explode(".",$img);
        $ext = end($image_array);
        $small_image = time()."small_".$_FILES['image']['name'];
        $medium_image = time()."mid_".$_FILES['image']['name']; 
        $large_image = $img;
        // set main image name
        $ImageCreate_obj->main_image_name = $img;
        // set main image path
        $ImageCreate_obj->main_image_path = "banner_images/";
        // set new image path
        $ImageCreate_obj->new_image_path = "banner_images/";
        // set new image extention
        $ImageCreate_obj->ext = $ext;
        list($width, $height) = @getimagesize("banner_images/".$img);

                
          // create small image dimension is 165*165.
          $ImageCreate_obj->new_image_name = $small_image;
          $ImageCreate_obj->new_image_width = 125;
          $ImageCreate_obj->new_image_height = 125;
          $ImageCreate_obj->image_create();   
          
          // create medium image dimension is 334*383.
          $ImageCreate_obj->new_image_name = $medium_image;
          $ImageCreate_obj->new_image_width = 250;
          $ImageCreate_obj->new_image_height = 250;
          $ImageCreate_obj->image_create(); 
          
          // create medium image dimension is 1000*1000.
          $large_image = time()."main_".$_FILES['image']['name'];
          $ImageCreate_obj->new_image_name = $large_image;
          $ImageCreate_obj->new_image_width = 300;
          $ImageCreate_obj->new_image_height = 600;
          $ImageCreate_obj->image_create(); 
         
         // create medium image dimension is 320*50.
          $banner_image = time()."main_".$_FILES['image']['name'];
          $ImageCreate_obj->new_image_name = $banner_image;
          $ImageCreate_obj->new_image_width = 320;
          $ImageCreate_obj->new_image_height = 50;
          $ImageCreate_obj->image_create(); 

         //echo "INSERT INTO `manage_slider` (`id`,`main_heading`,`sub_heading`,`actual_image`,`image`,`m_image`, `l_image`,`status`,`date`) VALUES (NULL, '$main_heading', '$sub_heading','$file_name', '$small_image', '$medium_image','$large_image','$status','".date('Y-m-d')."' )";

        // die();

  


$str="update manage_slider  set status='".$status."',url='".$url."',actual_image='".$img."',image='".$small_image."',m_image='".$medium_image."',l_image='".$large_image."',banner_image='".$banner_image."',date='".$date."' WHERE id='$id'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $str)or die("error");

//mysql_query("INSERT INTO `manage_slider` (`id`,`main_heading`, `sub_heading`,`actual_image`, `image`, `m_image`, `l_image`,`banner_image`,`status`,`date`) VALUES (NULL, '$main_heading', '$sub_heading','$file_name', '$small_image', '$medium_image','$large_image','$banner_image','$status','".date('Y-m-d')."' )");



header("location:manage_banner.php?msg= update Successfully !");
}

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
              <div class="col-sm-6 text-right">
                        <a href="javascript: window.history.go(-1)" class="btn btn-success">Back</a>
                        
                    </div>

                </div><br />
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Add Banner<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        
                       
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">




                        <?php
                            $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from manage_slider where id='".$id."'"));
                        ?>

                             
                                 <!-- <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Main Heading</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="main_heading" class="form-control" placeholder="Enter main heading"  value="" >
                                       
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sub-Heading</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="sub_heading" class="form-control" placeholder="Enter Sub-heading"  value="" >
                                       
                                    </div>
                                </div> -->

                          <div class="form-group">
                        
                          <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Status</label>
                           <div class="col-lg-10">
                          <select class="form-control" name="status" placeholder="Title" >
                          <option value="<?php echo $data['status']; ?>"><?php 
                              if($data['status']==0){ ?>
                               Active
                               <?php }else{

                                ?>inactive<?php
                               }
                           ?></option>
                          <option value="0">Active</option>
                          <option value="1">inactive</option>
                          </select>
                        </div>
                         </div>
                           
                           <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">URL</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="url" class="form-control" value="<?php echo $data['url'];?>" >
                                       
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"> Main Image</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="image" class="form-control">
                                       
                                        <img width="150px" height="100px" src="banner_images/<?php echo $data['actual_image']; ?>" >
                                        <input name="old_image" type="hidden"  value="<?php echo $data['image'];?>"/></td>
                                    </div>
                                </div>

                                

                               <!--  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                        <textarea name="product20" id="editor2" class="form-control"></textarea>
                                       
                                    </div>
                                </div> -->
                                       
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
                         

            <!--footer section start-->
           <?php include("footer.php");?>
            <!--footer section end-->


        </div>
        <!-- body content end-->
        
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script> 
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
  /*function subCategory(cat_id)
  { alert("dfhj");
    //var cat_id=$('#category').val();
    //$('#sub-category').empty();
    $.get('get_subcategory.php',{'cat_id':cat_id},function(data){

    $("#sub_category").html(data);
}
});
}*/

function subCategory(cat_id){
  var cat_id = cat_id;
  $.ajax({
    type: "GET",
    url: "get_subcategory.php",
    data: "cat_id="+cat_id, 
    cache: false,
    success: function(data){
      $("#sub_category").html(data);
    }
  });
}
</script>
</body>
</html>