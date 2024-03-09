<?php

error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();


 include("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include("title.php");?>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">


    <?php 
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from ppt");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                    ?>
  <!-- Modal -->
<div class="modal fade" id="pro<?php echo $data1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#fff;">Product Details</h4>
      </div>
      <div class="modal-body">
        
      <table class="table table-bordered table-hover table-striped">
        <tr>
          <td colspan="2"><center>
                  <a href="../admin/images/<?php echo $data1['logo_name']; ?>" class="img-responsive" target="_blank"><img src="images/download.jpg" style="max-height:200px;"></a>
       <!--    <img src="../admin/images/<?php echo $data1['image']; ?>" class="img-responsive" alt="" style="max-height:200px;" /> --></center></td>
        </tr>
        <tr>
          <td><strong>Name : </strong></td>
          <td><?php echo $data1['logo_title'];?></td>
        </tr>
        <tr>
          <td><strong>File name : </strong></td>
          <td><?php echo $data1['logo_name'];?></td>
        </tr>
        <tr>
          <td><strong>Details : </strong></td>
          <td><?php echo $data1['logo_desc'];?></td>
        </tr>
      
      </table>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   
<br>

        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Power Point Presentation</h1>
          
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Home</a></li>
              <li><a href="#">Power Point Presentation</a></li>
              
            </ol>

          </div>
        </section> <!-- / PAGE TITLE --><br>



        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
               <header class="panel-heading">
                  <h4 class="panel-title">Power Point Presentation</h4>
                </header>
                <div class="panel-body">

                 
                <div data-ride="carousel" class="carousel slide" id="carousel-example">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                       
                        <!-- Products List Start -->
                         <div class="item active">
                        
                             <div class="row">
                               <?php 
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from ppt");
                                  while($data1=mysqli_fetch_array($data))
                                    { 
                                    ?>
                                     <form name="add-to-cart" action="cart_update.php" method="post">
                            
                    <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-20 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
                  
                                    <div class="col-item animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
                                        <div class="photo">
                      <a href="#" data-toggle="modal" data-target="#pro<?php echo $data1['id'];?>">
                  
                      <a href="../admin/images/<?php echo $data1['logo_name']; ?>" class="img-responsive" target="_blank"><img src="images/download.jpg" height="100px"></a>
                      </a>
                                        </div>
                                        <div class="info" style="min-height:190px;">
                                            <div class="row">
                                                <div class="price col-md-12">
                                                <div class="col-md-12" style="text-align:center;" >
                                                        <b><?php echo $data1['logo_title'];?></b>
                                                    </div>
                                                        
                                                  <!--   <div class="col-md-12"  style="text-align:center;" >
                                                         <?php  echo $data1['material'];?> 
                                                    </div> -->

                                                    <!--<div class="col-md-6" style="padding-right:0;">
                                                      <h3 class="price-text-color">
                                                       SC <?php  echo $data1['points'];?></h3>
                                                    </div>-->

                                                </div>
                                            </div>
                                      

                                        

                                            <div class="separator clear-left">
                                               
                                    
                        
                          <p>
                            <i class="fa fa-list"></i><!--<a href="product-details.php?pid=<?php echo $data1['product_id'];?>"  data-toggle="modal" data-target="#pro1">View Product Details</a>-->
                            <a href="#" data-toggle="modal" data-target="#pro<?php echo $data1['id'];?>">View PPT Details</a>
                          </p>
                          
                                            </div><br/>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form> 
                              <?php }?>
                                </div>        
              </div>     <!-- Products List Ends -->
                        </div>
                    </div>


                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

         <!-- <div class="col-md-12 text-center">

 <a href="bh_export_sponser_income.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div> -->


     <?php include("footer.php");?>


    </main> <!-- /playground -->


    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
     <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  </body>
</html>