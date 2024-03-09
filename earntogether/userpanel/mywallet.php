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
              <!--<h1>Ewallet Transaction History</h1>-->
              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4">

              <ol class="breadcrumb pull-right no-margin-bottom">
                <!--<li><a href="#">Ewallet</a></li>
                <li><a href="#">Ewallet Transaction History</a></li>-->
               
              </ol>

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                
                
                <div class="panel-body">
                  <div class="table-responsive">
                   <table id="datatable-keytable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Wallet</th>
                                          
                                            <th>Amount</th>
                                         <!--   <th>Details</th>-->
                                        </tr>
                                        </thead>


                                        <tbody>
                                          <tr>
                                            <td>1</th>
                                            <td>Income Wallet</td>
                                           
                                            <td>
                                            <?php 
                                                $walletamt1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select amount from final_e_wallet where user_id='".$f['user_id']."'"));
                                                echo $x1=number_format($walletamt1['amount'],2);
                                                 ?>
                                                     
                                                 </td>
                                           <!-- <td><a href="ewallet-transaction-history.php?wallet=Income Wallet" class="btn btn-primary btn-sm">View</a></td>-->
                                          </tr>

                                         

                                          


                                        
                                         
                                         

                                         
                                        </tbody>
                                    </table>
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