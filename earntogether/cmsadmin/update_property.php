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
   extract($_REQUEST);
   
   $id=$_GET['id'];
     
   date_default_timezone_set("Asia/Kolkata");
   $date = date ("Y-m-d");
   
   // if(isset($_POST['submits']))
   // {
   // $product1=$_POST['product1'];
   // $product2=$_POST['product2'];
   // $product3=$_POST['product3'];
   // $product4=$_POST['product4'];
   // $product5=$_POST['product5'];
   // $product6=$_POST['product6'];
   // $product7=$_POST['product7'];
   // $product8=$_POST['product8'];
   // $product9=$_POST['product9'];
   // $product10=$_POST['product10'];
   // $product11=$_POST['product11'];
   // $product12=$_POST['product12'];
   // $product13=$_POST['product13'];
   // $product14=$_FILES['image']['name'];
   // $product15=$_POST['product15'];
   // $product16=$_POST['product16'];
   // $product17=$_POST['product17'];
   // $product18=$_POST['product18'];
   // $product19=$_POST['product19'];
   // $product20=$_POST['product20'];
   // $display_category=$_POST['display_category'];
   // $fcs=$_POST['fcs'];
   
   // $delvry = '';
   
   //   if ($_POST['allcountry'] == 'ALL') {
   
   //     $delvry = $_POST['allcountry'];
   //   } else {
   
   //       foreach ($_POST['delivery'] as $key => $value) {
   //         $delvry .= $value.',';
   //       }
   
   //       $delvry = trim($delvry,',');
   //   }
   
   // global $mxDb;
   // global $ImageCreate_obj;
   
   
   
   // if($product14!='')
   // {
   // $small_image = '';
   // $medium_image = ''; 
   // $large_image = '';  
   // $file_name = time()."large_".$_FILES['image']['name'];
   // move_uploaded_file($_FILES['image']['tmp_name'],"product_images/".$file_name);
   
          
   //         // set requierd image createtion variable
   //         $image_array = explode(".",$file_name);
   //         $ext = end($image_array);
   //         $small_image = time()."small_".$_FILES['image']['name'];
   //         $medium_image = time()."mid_".$_FILES['image']['name']; 
   //         $large_image = $file_name;
   //         // set main image name
   //         $ImageCreate_obj->main_image_name = $file_name;
   //         // set main image path
   //         $ImageCreate_obj->main_image_path = "product_images/";
   //         // set new image path
   //         $ImageCreate_obj->new_image_path = "product_images/";
   //         // set new image extention
   //         $ImageCreate_obj->ext = $ext;
   //         list($width, $height) = @getimagesize("product_images/".$file_name);
   
                   
   //           // create small image dimension is 165*165.
   //           $ImageCreate_obj->new_image_name = $small_image;
   //           $ImageCreate_obj->new_image_width = 150;
   //           $ImageCreate_obj->new_image_height = 150;
   //           $ImageCreate_obj->image_create();   
             
   //           // create medium image dimension is 334*383.
   //           $ImageCreate_obj->new_image_name = $medium_image;
   //           $ImageCreate_obj->new_image_width = 294;
   //           $ImageCreate_obj->new_image_height = 357;
   //           $ImageCreate_obj->image_create(); 
             
   //           // create medium image dimension is 1000*1000.
   //           $large_image = time()."main_".$_FILES['image']['name'];
   //           $ImageCreate_obj->new_image_name = $large_image;
   //           $ImageCreate_obj->new_image_width = 1000;
   //           $ImageCreate_obj->new_image_height = 1000;
   //           $ImageCreate_obj->image_create(); 
   
   
   
   
   // mysqli_query($GLOBALS["___mysqli_ston"], "update products set actual_image='$file_name', image='$small_image', m_image='$medium_image', l_image='$large_image' where product_id='$id'");          
           
   // }
   
   // mysqli_query($GLOBALS["___mysqli_ston"], "update products set category='$product1', sub_category='$product2', sub_sub_category='$product3', product_code='$product4', product_name='$product5', qty='$product6', price='$product7', discount='$product8', points='$product9', wholesale_price='$product10', mode='$product11', shipping_charge='$product12', tax='$product13', description='$product20' where product_id='$id'");
   
   
   
   
   // header("location:manage-product.php?msg=Plot details Updated Successfully !");
   // }
   
   $id=$_REQUEST['id'];
   
   $res=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='$id' "));
   $id=$res['id'];
   $img=$res['image'];
   $pdf=$res['pdf'];
   
   
   
   
   if(isset($_POST['submit']))
   {
   // $pfile=$_FILES['pdffile']['name'];
   // if($pfile==''){
       
   //     $pdffile = $pdf;
       
   // }else{
   //     $pdffile=$pfile;
   //     unlink("property_pdf/$pdf");
   //     move_uploaded_file($_FILES['pdffile']['tmp_name'],"property_pdf/".$_FILES['pdffile']['name']); 
   // }
    $property_typee=$_POST['property_type'];
    $project_name=$_POST['project_name'];
    $title=$_POST['title'];
    $plot_size=$_POST['plot_size'];
    $price=$_POST['property_price'];
    $add=$_POST['add'];
    $booking_price=$_POST['booking_price'];
    $sqr_price=$_POST['sqr_price'];
    $description=$_POST['description'];
    $file=$_FILES['file']['name'];
    $total = count($_FILES['file']['name']);
    $attachment = array();
   // Loop through each file
   for( $i=0 ; $i < $total ; $i++ ) {
     $tmpFilePath = $_FILES['file']['tmp_name'][$i];
   
     if ($tmpFilePath != ""){
   
       $newFilePath = "property_image/" . $_FILES['file']['name'][$i];
   
       move_uploaded_file($tmpFilePath, $newFilePath);
   }
   }
       $arr = implode(',', $file); 
   
    $query= mysqli_query($GLOBALS["___mysqli_ston"],"update property set title='$title', price='$price', address='$add', project_name='$title', description='$description', property_type='$property_type', image='$arr', plot_size='$plot_size' where id='$id'");
      
      if($query){
          header("location:manage-property.php?msg=Property Data Update successful.!");
      }else{
          echo mysqli_error($GLOBALS["___mysqli_ston"]);
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
               <div class="row">
                  <div class="col-lg-12">
                     <section class="panel">
                        <header class="panel-heading">
                           Edit Service Details<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                           <form  role="form" method="post" enctype="multipart/form-data">
                              <div class="row clearfix">
                                 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                       <div class="form-line">
                                          <label class="form-label">Service Type</label>
                                          <select name="property_type" class="form-control" id="category" onChange="subCategory(this.value)" required>
                                             <option value="" >Select Service Type</option>
                                             <?php 
                                                $proprt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='".$_GET['id']."'"));
                                                $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where status=0");
                                                    while($data=mysqli_fetch_array($action)) {
                                                   ?>
                                             <option value="<?php echo $data['category_id'];?>" <?php if($data['category_id']==$proprt['property_type']) { echo 'selected'; } ?>  ><?php echo $data['name'];?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                               <!--  <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                       <div class="form-line">
                                          <label class="form-label">Project  Name</label>
                                       <input required type="text" name="project_name" class="form-control">
                                          <select name="project_name" class="form-control" id="projects"  required>
                                             <?php 
                                                $proprt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from projects where project_id='".$res['project_name']."'"));
                                                   ?>
                                             <option value="<?php echo $proprt['project_id'];?>"><?php echo $proprt['project_name'];?></option>
                                             <option value="">Select any one</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>-->
                                 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                       <div class="form-line">
                                           <label class="form-label">Service Name</label>
                                          <input type="text" name="title" class="form-control" value="<?php echo $res['title'];?>" required>
                                       </div>
                                    </div>
                                 </div>
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Property Owner</label>-->
                                 <!--            <input required type="text" name="property_owner" class="form-control" value="<?php echo $res['property_owner'];?>">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 
                               <!--  <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                       <div class="form-line"><label class="form-label">Property Size</label>
                                          <input type="text" name="plot_size" class="form-control" value="<?php echo $res['plot_size'];?>" required>
                                       </div>
                                    </div>
                                 </div>-->
                                 
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6" style=display:none;"">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                               <label class="control-label">Property Size </label>
        
                                               <select name="plot_size" class="form-control" id="category" onChange="propertySize(this.value)" >
                                                    <option value="">Select Property Size</option>
                                                    <?php $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from property_size_price");
                                                    while($data=mysqli_fetch_array($action)) {
                                                   ?>
                                                   <option value="<?php echo $data['size'];?>" <?php if($data['size']==$res['plot_size']){ echo "selected";} ?>><?php echo $data['size'];?> sqr-feet</option>
                                                   <?php } ?>
                                                </select>                                    
                                            </div>
                                        </div>
                                    </div>-->
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--   <div class="form-group form-float">-->
                                 <!--       <div class="form-line">-->
                                 <!--            <label style="color:gray;">Sold</label>-->
                                 <!--          <input name="sold" type="radio" id="radio_36" value="yes" class="with-gap radio-col-light-blue" checked />-->
                                 <!--           <label for="radio_36">YES</label>-->
                                 <!--           <input name="sold" type="radio" id="radio_30" value="No" class="with-gap radio-col-red"  />-->
                                 <!--           <label for="radio_30">NO</label>-->
                                 <!--       </div>-->
                                 <!--   </div>-->
                                 <!--</div>-->
                                 <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Land area</label>-->
                                 <!--            <input required type="text" name="land_area" class="form-control" value="<?php echo $res['land_area'];?>">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!-- </div>-->
                                 
                                  <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                     <div class="form-group form-float">
                                         <div class="form-line">
                                             <label class="form-label">Booking price</label>
                                             <input type="number" name="booking_price" class="form-control" value="<?php echo $res['booking_price'];?>" required>
                                         </div>
                                     </div>
                                 </div>
                                 
                                 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                     <div class="form-group form-float">
                                         <div class="form-line">
                                             <label class="form-label">Sqr Fit Price</label>
                                             <input type="number" name="sqr_price" class="form-control" value="<?php echo $res['sqr_price'];?>" required>
                                         </div>
                                     </div>
                                 </div>-->
                                 
                                 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Full Price</label>
                                                <input type="text" name="property_price" id="property_price" class="form-control" value="<?php echo $res['price'];?>" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                 
                                <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                       <div class="form-line">
                                           <label class="form-label">Address</label>
                                          <input type="text" name="add" class="form-control" value="<?php echo $res['address'];?>" required>
                                       </div>
                                    </div>
                                 </div>-->
                                 
                                 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                       <div class="form-line">
                                           <label class="form-label">Description</label>
                                          <textarea required name="description" class="form-control"><?php echo $res['description'];?></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"> <label class="form-label">Add PDF Link</label>-->
                                 <!--            <input  name="pdffile"  type="file"  />-->
                                 <!--            <input required name="oldpdffile"  type="hidden" value="<?php echo $res['pdf'];?>" />-->
                                 <!--            <a href="property_pdf/<?php echo $res['pdf'];?>" target="_blank"> View PDF</a>-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"> <label class="form-label">Add Video Link</label>-->
                                 <!--            <input type="text" class="form-control" required name="video">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Add Location Link</label>-->
                                 <!--            <input type="text" class="form-control" required name="location">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <!--<div class="custom-file">-->
                                    <!--    <label class="form-label">Add Property Image</label>-->
                                    <!--    <input  name="file"  type="file"  />-->
                                    <!--    <input  name="oldfile"  type="hidden" value="<?php echo $res['image'];?>" />-->
                                    <!--    <img src="property_image/<?php echo $res['image'];?>" height="200"> -->
                                    <!--</div>-->
                                    <div class="custom-file">
                                       <label class="form-label">Add Multiple Service Image</label> 
                                       <div>
                                          <?php 
                                             //$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM property_images where property_id='$id' ");
                                             //  while($row=mysqli_fetch_array($query)){
                                             //  $imageURL = 'property_image/'.$row["images"];
                                              ?>
                                          <!--                                         <img src="<?php echo $imageURL; ?>" alt=""  style="width: 10%;"/><br><br>-->
                                          <?php // } ?>
                                          <input  type="file" name="file[]"  multiple />
                                       </div>
                                    </div>
                                    <br> <button class="add_field_button">+ Add Images</button>
                                 </div>
                                 <!-- <div class="header col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">-->
                                 <!--<h4 style="text-align: center;">Condition</h4>-->
                                 <!-- </div>-->
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Kitchen</label>-->
                                 <!--            <input required type="number" name="kitchan" class="form-control">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Hall</label>-->
                                 <!--            <input required type="number" name="hall" class="form-control">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Bedroom</label>-->
                                 <!--            <input required type="number" name="bedroom" class="form-control">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                 <!--    <div class="form-group form-float">-->
                                 <!--        <div class="form-line"><label class="form-label">Bathroom</label>-->
                                 <!--            <input required type="number" name="bathroom" class="form-control">-->
                                 <!--        </div>-->
                                 <!--    </div>-->
                                 <!--</div>-->
                                 <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;padding: 5%;">
                                    <input type="submit" name="submit" class="btn btn-primary m-l-15 waves-effect" value="Submit">
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
           type: "POST",
           url: "get_project.php",
           data: "cat_id="+cat_id, 
           cache: false,
           success: function(data){
             $("#projects").html(data);
           }
         });
         }
        
        function propertySize(plot_size){
          var plot_size = plot_size;
          $.ajax({
            type: "POST",
            url: "get_property_price.php",
            data: "plot_size="+plot_size, 
            cache: false,
            success: function(data){
                $("#property_price").val(data);
            }
          });
        }
      </script>
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
      <script>
         $(document).ready(function() {
         var max_fields      = 10; //maximum input boxes allowed
         var wrapper   		= $(".custom-file"); //Fields wrapper
         var add_button      = $(".add_field_button"); //Add button ID
         
         var x = 1; //initlal text box count
         $(add_button).click(function(e){ //on add input button click
         e.preventDefault();
         //	alert(x);
         if(x < max_fields){ //max input box allowed
         x++; //text box increment
         $(wrapper).append('<br><div><input required name="file[]"  type="file"><a href="#" class="remove_field">Remove</a></div>'); //add input box
         }
         });
         
         $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

         e.preventDefault(); $(this).parent('div').remove(); x--;
         })
         });
      </script>
   </body>
</html>