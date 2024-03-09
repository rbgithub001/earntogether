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
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">


          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">BANNER </h4>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Banner image</th>
                        <th>Size</th>
                        <th>Code</th>
                         <th>Download</th>
                        <th>Posted date</th>
                        

                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from manage_slider where status=0 order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><img width="150px" height="100px"  src="../cmsadmin/banner_images/<?php echo $data1['actual_image']; ?>" ></td>
                        
                       <td><p>width=150px,height=100px</p></td>


                      <td><a href="http://autotradecrypto.club/cmsadmin/banner_images/<?php echo $data1['actual_image']; ?>" target="_blank">http://autotradecrypto.club/cmsadmin/banner_images/<?php echo $data1['actual_image']; ?></a></td>

                        <!-- <td><p><a herf="http://autotradecrypto.club/<?php echo $f['username'];?>">http://autotradecrypto.club/<?php echo $f['username'];?></a></p></td> -->


                         <!-- <td><img width="150px" height="100px" src="../cmsadmin/banner_images/<?php echo $data1['m_image']; ?>" ></td>

                          <td><img width="150px" height="100px" src="../cmsadmin/banner_images/<?php echo $data1['l_image']; ?>" ></td>


                           <td><img width="150px" height="100px" src="../cmsadmin/banner_images/<?php echo $data1['banner_image']; ?>" ></td> -->

                            <!-- <td><img width="150px" height="100px" src="../cmsadmin/banner_images/<?php echo $data1['image']; ?>" ></td> -->

                        <!--  <td style="font-weight:bold;"> <a href="../cmsadmin/images/<?php echo $data1['logo_name'];?>" target="_blank" class="btn btn-warning"> View File</a></td> -->
                        

                        <td style="font-weight:bold;"> <a href="../cmsadmin/banner_images/<?php echo $data1['actual_image']; ?>" target="_blank" class="btn btn-warning" download> Download </a></td>

                        <td><?php echo $data1['date'];?></td>
                         
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>


                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

        <!--  <div class="col-md-12 text-center">

 <a href="bh_export_sponser_income.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div>
 -->

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