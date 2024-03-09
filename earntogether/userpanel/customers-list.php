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
        border-bottom: 2px solid #04063c0d;
    }
    h4.mainHeading {
        font-size: 30px;
        font-weight: 600;
        margin-bottom: 24px;
    }
    .panel-body{
        overflow:auto;
    }
    
</style>
            
            
            
            
            
            <!--hkfhjkfh-->
            
            
          <div class="row">

            <div class="col-md-12">
         <section class="panel panel-primary">
                <header class="panel-heading ">
                  <h3>  Customer List</h3>
                    
                    
                </header>
                <!--<header class="panel-heading  text-right"><a href="add-prospects.php" class="btn btn-primary" > Add Customer</a></header>-->
                <div class="panel-body">
                  <table class=" table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Prospect Id</th>
                        <!--<th>Username</th>-->
                        <!--<th>Password</th>-->
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Pancard</th>
                        <th>Country</th> 
                        <th>State</th>
                        <th>City</th>
                        <th>Address</th> 
                         <!--<th>View</th> -->
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                     $i=1;
                          $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from customers where status=1 and ref_id='$userid'");
                   
                      while($data1=mysqli_fetch_array($data)){
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                         <td><?php echo $data1['user_id'];?></td>
                         <!--<td><?php echo $data1['username'];?></td>-->
                          <!--<td><?php echo $data1['password'];?></td>-->
                           <td><?php echo $data1['first_name'].' '.$data1['last_name'];?></td>
                           <td><?php echo $data1['email'];?></td>
                           <td><?php echo $data1['telephone'];?></td>
                           <td><?php echo $data1['pancard'];?></td>  
                           <td><?php echo $data1['country'];?></td>
                           <td><?php echo $data1['state'];?></td>
                           <td><?php echo $data1['city'];?></td>
                           <td><?php echo $data1['address'];?></td>
                           <!--<td><a href="view-customer.php?id=<?php echo $data1['user_id'];?>" class="btn btn-sm btn-primary">View</a></td>                            -->
                      </tr>

                      <?php $i++;
                      
                      } ?>
                     
                    </tbody>
                  </table>


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