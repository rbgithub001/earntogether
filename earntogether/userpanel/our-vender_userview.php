<?php include("header.php");?>
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
    <style type="text/css">
    #example2{
      margin-bottom: 20px;
    }
    .panel-primary{
      padding: 15px;
    }
    .m-b{
      margin-bottom: 25px;
    }
    .servicesTabs{
        background: #04063c;
        padding: 5px 5px;
    }
    .servicesTabs a {
        border-radius: 50px!important;
        padding: 10px 30px!important;
        margin-right: 10px!important;
    }
    </style>
  </head>

  <body class="">
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="example2">
          <div class="row">
            <div class="col-md-8">
                <h3>Vendor List</h3>
              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4">

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
            
            
            <div>
              <!-- Nav tabs -->
            <ul class="nav nav-tabs servicesTabs" role="tablist">
                <!--<li role="presentation" class="active"><a href="all-services.php" aria-controls="service1" role="tab" data-toggle="tab">All</a></li>-->
                
                
                <li role="presentation" class="active"><a href="#allservice" aria-controls="allservice" role="tab" data-toggle="tab">All</a></li>
                <?php
                      $datawww=mysqli_query($GLOBALS["___mysqli_ston"],"select * from vender_services ");
                      while($data1sss=mysqli_fetch_array($datawww)){
                      ?>
                <li role="presentation"><a href="#service<?php echo $data1sss['id'];?>" onclick="GetDataFromDB('<?php echo $data1sss['service_name'];?>');" aria-controls="service<?php echo $data1sss['id'];?>" role="tab" data-toggle="tab"><?php echo $data1sss['service_name'];?></a></li>
                <!--<li role="presentation"><a href="#service3" onclick="GetDataFromDB('books');" aria-controls="service3" role="tab" data-toggle="tab">Books</a></li>-->
                <!--<li role="presentation"><a href="#service4" onclick="GetDataFromDB('fruits');" aria-controls="service4" role="tab" data-toggle="tab">Foods</a></li>-->
                <!--<li role="presentation"><a href="#service5" onclick="GetDataFromDB('foods');" aria-controls="setting5" role="tab" data-toggle="tab">Fruits</a></li>-->
                
                <?php } ?>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="allservice">
                    <div class="row">
                        <div class="col-md-12">
                                  <?php 
                                         $n=1;
                                        //   $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_registration where franchise_category!='Master Franchise'");
                                         $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_registration where franchise_category!='Master Franchise'");
                                          while($data1=mysqli_fetch_array($data)){ 
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
                                                      <img src='../uploads/<?php echo $p[$i]; ?>' style="height:170px;width:100%" alt="...">
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
                                         <!--<a href="view-vender-history.php?id=<?php echo $data1['id'];?>" target="_blank" class="btn btn-primary">View history</a>-->
                                         <a href="view-vender-history.php?id=<?php echo $data1['user_id'];?>" target="_blank" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                    <?php $n++;} ?>
                            </div>
                    </div>
                </div>
                 <?php
                      $ddsddf=mysqli_query($GLOBALS["___mysqli_ston"],"select * from vender_services ");
                      while($dfff=mysqli_fetch_array($ddsddf)){
                      //echo  $dfff['service_name'];  
                      ?>
                
                <div role="tabpanel" class="tab-pane"  id="service<?php echo $dfff['id']?>" >
                    <div class="row">
                        <div class="col-md-12">
                    <?php 
                    $n=1;
                    $data2=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_register_details where catogory='".$dfff['id']."'   ");
                    while($data11=mysqli_fetch_array($data2)){  
                    
                    $data3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_registration where user_id ='".$data11['poc_userid']."' ")); 
                    
                    ?>
                    <div class="col-md-4">
                                    <div class="single_vendorCard">
                                      <div class="img_details">
                                            <div class="vendor_img">
                                               <div id="carousel<?php echo $n; ?>-example-generic" class="carousel slide" data-ride="carousel">
            
                                                  <!-- Wrapper for slides -->
                                                  <div class="carousel-inner" role="listbox">
                                                        <?php 
                                                 
                                                   $cc = count(explode(",",$data3['file']));
                                                   $r=$data3['file'];
                                                  
                                                   $p=explode(",",$r);
                                                  
                                                   for($i=0; $i < $cc; $i++) {
                                                  ?>
                                                   <div class="item <?php if($i == 0) { echo "active"; } ?>">
                                                      <img src='../uploads/<?php echo $p[$i]; ?>'  style="height:170px;width:100%" alt="...">
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
                                                    <h5><?php echo $data3['user_id'];?></h5>
                                                </div>
                                                <div class="single_details">
                                                    <h5>Name</h5>
                                                    <h5><?php echo $data3['first_name']." ".$data3['last_name'];?></h5>
                                                </div>
                                                <div class="single_details">
                                                    <h5>Number</h5>
                                                    <h5><?php echo $data3['telephone'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cardButtons">
                                            <a href="<?php echo $data3['location'];?>" target="_blank" class="btn btn-primary">View Location</a>
                                         <!--<a href="view-vender-history.php?id=<?php echo $data3['id'];?>" target="_blank" class="btn btn-primary">View history</a>-->
                                         <a href="view-vender-history.php?id=<?php echo $data3['user_id'];?>" target="_blank" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                    
                    
                           <?php      } ?> 
                    
                </div>
                </div>
                   
                </div>
                
                
                <?php } ?>
               
              
              
            </div>
       
        </div> <!-- / container-fluid -->


         

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

      
      <script>
            // function GetDataFromDB(tab_type){
            //   //  alert(tab_type);
          
            // $.post("ajax_page.php",
            // {
            //     tab_type: tab_type
            // },
            // function(data, status){
              
            //  $("#service2").html(data);
            // });
        // }
        
        
        // $(".class1").click(function(){
        //     $("#service1").hide();
        //     $("#service2").show();
        // });
    
   
        
</script>
 
  </body>
</html>