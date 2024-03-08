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
                <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Wallet Transaction Summary</h4>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th width="20%">#</th>
                        <th width="50%">Category</th>
                        <th width="30%">Overview</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      //$i=1;

                       /*$data=mysqli_query($GLOBALS["___mysqli_ston"], "select ttype, sum(debit_amt) AS totaldebit,SUM(credit_amt) AS totalcredit from credit_debit WHERE user_id='123456' group by ttype");
*/
                    
                     ?>
       <?php 
          $binary_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total1 from credit_debit where user_id='$userid' and ttype='Binary Income'"));

          $sponsor_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total2 from credit_debit where user_id='$userid' and ttype='Referral Bonus'"));

          $matching_earning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as total3 from credit_debit where user_id='$userid' and ttype='Roi Income'"));

          $withdraw_amount=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(debit_amt) as total4 from credit_debit where user_id='$userid' and ttype='Withdrawal Request'"));
          
          $fund_transfer=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(debit_amt) as total5 from credit_debit where user_id='$userid' and ttype='Fund Transfer'"));
        ?> 
                      <tr>
                        <th scope="row">1</th>
                        <td>Binary Income</td>
                        <td><b style="color: green;">+</b> <span style="color: blue;">$ <?php if($binary_earning['total1']==0){ echo '0'; }else{ echo $binary_earning['total1'];}?></span></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Referral Bonus</td>
                        <td><b style="color: green;">+</b> <span style="color: blue;">$ <?php if($sponsor_earning['total2']==0){ echo '0'; }else{ echo $sponsor_earning['total2'];}?></span></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Roi Income</td>
                        <td><b style="color: green;">+</b> <span style="color: blue;">$ <?php if($matching_earning['total3']==0){ echo '0'; }else{ echo number_format($matching_earning['total3'],2);}?></span></td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Withdrawal</td>
                        <td><b style="color: red;">-</b> <span style="color: blue;">$ <?php if($withdraw_amount['total4']==0){ echo '0'; }else{ echo $withdraw_amount['total4'];}?></span></td>
                      </tr>
                     <!--  <tr>
                        <th scope="row">5</th>
                        <td>E-wallet Fund Transfer</td>
                        <td><b style="color: red;">-</b> <span style="color: blue;">$ <?php if($fund_transfer['total5']==0){ echo '0'; }else{ echo $fund_transfer['total5'];}?></span></td>
                      </tr> -->
                      <?php //$i++;} ?>
                     
                    </tbody>
                  </table>
                  </div>

                </div>
              </section>
            
              <p class="text-center"><a href="ewallet-transaction-history.php" class="btn btn-primary" style="border-radius:0px;padding: 3px 8px;font-size:13px;">View All</a></p>
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