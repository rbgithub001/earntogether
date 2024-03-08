<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <!--<h1>My Withdrawal Request</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4" style="float:right;">

             <!-- <a href="withdraw-request.php"><input type="submit" name="update" value="New Request Click Here" class="btn btn-primary"></a>  -->  

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Request Fund History</h4>
                </header>
                <div class="panel-body table-responsive">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User Id</th>
                   <!--      <th>Bank Name</th> -->
                        <th>Amount in USD</th>
                        <th>Amount in BTC</th>
                        <th>Transaction</th>
                        <th>Payment Proof</th>
                        <th>Date</th>
                     <!--      <th>Wallet Type</th> -->
                        <th>Status</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $amount=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from paymentproof where user='$userid'");
                      while($data1=mysqli_fetch_array($data))
                      {
                        $amount=$amount+$data1['amount'];
                        if($data1['status']=='1'){
                          $status='Approve';
                        }
                     else{
                      $status=$data1['status'];
                     }
                     ?>

                      <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $data1['user'];?></td>
                     <!--      <td><?php echo $data1['bank'];?></td> -->
                             <td><?php echo $data1['usd'];?></td>
                          <td><?php echo $data1['amount'];?></td>
                          <td><?php echo $data1['tranno'];?></td>
                        <td>
                             <a href="paymentproof/<?php echo $data1['paymentproof'];?>" target='_blank' style="color: blue;"> view </a>

                       </td>
                          <td><?php echo $data1['posteddate'];?></td>
                           <!--   <th><?php echo $data1['wallet_type'];?></th> -->
                          <td><?php echo $status;?></td>
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>
                  <table align="center" >
                            <tr></tr>
                            <tr>
                      <td></td>
                      <td></td>
                      <td style="font-weight:bold;text-align:center;"><h4>Total Amount = </h4></td>
                      <td><span><h4><?php echo $amount; ?></h4></span></td>
                      </tr>
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