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
              <!--<h1>My Withdrawal Request</h1>-->
              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4 text-right">
               <a href="withdraw-request.php"><input type="submit" name="update" style="margin-bottom:0;" value="New Request Click Here" class="btn btn-primary"></a>   
            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Investment Wallet Withdrawal Request</h4>

                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date & time</th>
                        <th>Title</th>
                        <th>Paid Amount</th>
                        <th>Amount (USD) </th>
                        <th>Bitcoin Address/Account No. </th>
                        <th>Wallet Type </th>
                        <th>Payent Mode</th>
                        <th>Status</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request where user_id='$userid' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['ts'];?></td>
                         <td>Withdrawal Request</td>
                        <td><?php echo $data1['total_paid_amount'];?></td> 
                        <td><?php echo number_format($data1['request_amount'],2); ?></td>
                        
                        <td>
                                   <?php if($data1['payment_mode']=='bank'){
                                   echo "<span>Account name:</span>".$data1['acc_name'];?><br/><?php echo "<span>Bank Name:</span>".$data1['bank_nm'];?><br/>  <?php echo "<span>Branch Name:</span>" .$data1['branch_nm'];?><br/>  <?php echo "<span>Account Number:</span>" .$data1['acc_number'];?><br/>  <?php echo "<span>Swift Code:</span>" .$data1['swift_code'];?>
                                <?php   }
                                   if($data1['payment_mode']=='btc'){echo "<span>Bitcoin Address:</span>".$data1['acc_number'];}
                                   if($data1['payment_mode']=='ethereum'){echo "<span>Ethereum Address :</span>".$data1['acc_number'];}
                                       if($data1['payment_mode']=='litecoin'){echo "<span>Litecoin Address :</span>".$data1['acc_number'];}
                                   ?>
                                </td>
                        <!--<td><?php echo $data1['acc_number'];?></td>-->
                          <td>
                                 <?php
                      $walletfrom1 = "";
                      if($data1['withdraw_wallet']=='roi_e_wallet'){
                        $walletfrom1 = "Income Wallet";
                      }elseif($data1['withdraw_wallet']=='final_e_wallet'){
                        $walletfrom1 = "IB Wallet";
                      }
                      echo $walletfrom1;
                    ?>
                                </td> 
                        <td><?php echo $data1['payment_mode'];?></td>        
                          <td><?php if($data1['status']==0) { echo "Pending"; } else if($data1['status']==2) { echo "Waiting to confirm"; } else { echo "Paid";}?></td>
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