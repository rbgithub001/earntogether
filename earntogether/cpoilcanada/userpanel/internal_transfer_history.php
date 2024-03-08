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
              <!--<h1>My Package Invoice</h1>-->
              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4" style="float:right;">

             <ol class="breadcrumb pull-right no-margin-bottom">
                <!--<li><a href="#">Invoice</a></li>-->
                <!--<li><a href="#">My Package Invoice</a></li>-->
              </ol>

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
                <section class="panel panel-primary">
                <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Internal Transfer History</h4>
                <div class="panel-body">
                <div class="table-responsive">
                        <table class="table datatable">
                                      <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Transaction No</th>
                                            <th>Amount </th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Wallet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                             $i=1;
                                              $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$userid' and ttype='Internal Fund Transfer'");
                                              while($data1=mysqli_fetch_array($data)){
                                                 ?>
                                                   <tr>
                                                   <th scope="row"><?php echo $i;?></th>
                                                   <td><?php echo $data1['transaction_no'];?></td>
                                                   <td><?php echo $data1['debit_amt'];?></td>
                                                   <td><?php echo $data1['receive_date'];?></td>
                                                   <td><?php if($data1['status']==0) echo "Paid"; else echo "Unpaid";?></td>
                                                   <td><?php echo $data1['ewallet_used_by'];?></td>

                                                   </tr>
                                                <?php $i++;} ?>
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