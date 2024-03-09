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
  </head>

  <body class="">
    <div class="">  
    
    <?php include("sidebar.php");?>
      <main id="playground">
 
      
         <?php include("top.php");?>
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>My Package Invoice</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4" style="float:right;">

           <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Invoice</a></li>-->
              <!--<li><a href="#">My Package Invoice</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
           <!-- 
            <div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>-->

<style>
    .profilesContainer {
        display: flex;
        justify-content: space-start;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    .profileContainer {
        border-radius: 10px;
        overflow: hidden;
    }
    .profileContainer img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .profilesContainer .singleProfileDetails {
        max-width: 31%;
        width: 31%;
        border-radius: 10px;
        margin-bottom: 10px;
        margin-right: 9px;
        border: 3px solid #04063c0d;
        padding: 5px 20px;;
    }
    .singleProfileDetails{
        border-radius: 10px;
        margin-bottom: 10px;
        margin-right: 9px;
        border: 3px solid #04063c0d;
        padding: 5px 20px;
    }
    .singleProfileDetails h4 {
        font-size: 18px;
        font-weight: 600;
        text-transform: capitalize;
    }
    .companyDetials{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 20px;
    }
    .companyDetials .logo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 20px;
    }
    .companyDetials .logo img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .companyDetials h4 {
        margin: 0!important;
        font-size: 30px;
        font-weight: 600;
    }
    .singleProfileDetails h5 {
        font-size: 14px;
        font-weight: 500;
    }
    .singleProfileDetails .singleService {
        display: flex;
        justify-content: space-around;
        align-items: center;
        text-transform: capitalize;
        border-bottom: 2px solid #04063c0d;description
    }
    h4.mainHeading {
        font-size: 30px;
        font-weight: 600;
        margin-bottom: 24px;
    }
</style>
            
            
            
            
            
            <!--hkfhjkfh-->
            
            
          <div class="row">

            <div class="col-md-12">
                <?php
                  $userid=$_GET['id'];
                   $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_registration where user_id='$userid'");
                    $data1=mysqli_fetch_array($data);
                     // $xedata=explode(" ",  $data1['file']);
                  
                     
                ?>

              <section class="panel panel-primary">
                <header class="panel-heading">
                </header>
                
                <div class="panel-body">
                    <div class="companyDetials">
                        <div class="logo">
                            <?php
                            
                            // $filedd= explode(" ",$data1['file']);
                            // echo $filedd;
                            // $ss= $filedd[0];
                            
                            ?>
                            <img src="../uploads/cmplogo/<?php echo $data1['cmp_logo'];?>" class="img-fluid" alt="" />
                        </div>
                        <h4><td><?php echo $data1['first_name'].' '.$data1['last_name'];?></td></h4>
                    </div>
                    
                           
                                
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-4">
                            <div class="profileContainer">
                                
                                
                            <!--    <img src="../uploads/<?php echo $i['1'];?>" width="50"; height="50";>-->

                                    <div class="single_vendorCard">
                                      <div class="">
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
                                                      <img src='../uploads/<?php echo $p[$i]; ?>'  style="height:250px;width:100%;"  alt="...">
                                                    </div>
                                                   <?php } ?>  
                                                    
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
                                            </div>
                                        </div>
                                    </div>
                              
                            
                             </div>
                            
                            
                        </div>
                        <div class="col-md-8">
                            <div class="profilesContainer">
                                <div class="singleProfileDetails" style="min-width: 100%;">
                                    <h4>Address	</h4>
                                    <p><?php echo $data1['address'];?></p>
                                </div>
                                <!--singleProfileDetails close here-->
                                <div class="singleProfileDetails">
                                    <h4>city</h4>
                                    <p><?php echo $data1['city'];?></p>
                                </div>
                                <!--singleProfileDetails close here-->
                                <div class="singleProfileDetails">
                                    <h4> State	</h4>
                                    <p><?php echo $data1['state'];?></p>
                                </div>
                                
                                 <div class="singleProfileDetails">
                                    <h4> Country	</h4>
                                    <p><?php echo $data1['country'];?></p>
                                </div>
                                
                                    <div class="singleProfileDetails">
                                    <h4> Telephone	</h4>
                                    <p><?php echo $data1['telephone'];?></p>
                                </div>
                                 <div class="singleProfileDetails">
                                    <h4> Landmark	</h4>
                                    <p><?php echo $data1['lendmark'];?></p>
                                </div>
                                 <div class="singleProfileDetails" style="min-width: 100%;">
                                    <h4> Description	</h4>
                                    <p><?php echo $data1['description'];?></p>
                                </div>
                                <!--singleProfileDetails close here-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <!--<h4 class="mainHeading">Services</h4> -->
                            <?php
                           $userid=$_GET['id'];
                           $seddata=mysqli_query($GLOBALS["___mysqli_ston"],"select catogory from poc_register_details where poc_userid='$userid' GROUP BY catogory ");
                          //$seddata=mysqli_fetch_all(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM poc_register_details WHERE catogory IN (SELECT catogory FROM poc_register_details) AND poc_userid='$userid'"), MYSQLI_ASSOC);
                         
                             while($dataqq=mysqli_fetch_array($seddata)){
                                 
                            $subddata=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_register_details where catogory='".$dataqq['catogory']."' AND poc_userid='$userid'");
                            $cat=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from vender_services where id='".$dataqq['catogory']."'")); 
                                ?>
                            <div class="col-md-12" style="background:#f5f5f5;">
                            <h4 class="mainHeading"><?php echo $cat['service_name'];?></h4> 
                            <?php
                              while($qqq=mysqli_fetch_array($subddata)){  ?>
                             <!--<div class="singleProfileDetails">-->
                                <!--<div class="singleService">-->
                                    <table class="table">
                                        <tr><td><?php echo $qqq['title'];?></td><td><?php echo $qqq['description'];?></td></tr>
                                    </table>
                                <!--</div>-->
                            <!--</div>-->
                            <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        
                        
                        
                    </div>
                </div>
              
              </section>
            

            </div> <!-- /col-md-6 -->

  

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
  </body>
</html>