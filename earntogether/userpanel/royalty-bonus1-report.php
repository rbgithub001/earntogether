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
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Royalty Report</h4>
                <div class="panel-body">
                    <?php 
                    /*$mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(bv) as total from manage_bv_history where income_id='$userid' "));
                    $mydincome = $mydownlineincomes['total'];
                    $selfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(amount) as total from lifejacket_subscription where user_id='$userid'"));
                    $selft = $selfincomes['total'];
                    $mytotalincome = $selft+$mydincome;*/
                    ?>
                <div class="row">
                    <!--<div class=""><label>TPV:</label> <?php // echo $mytotalincome;?></div>-->
                </div>
                  <table class="table datatable">
                    <thead>
                      
                      <tr>
                        <th>Rank</th>
                        <th>Rank Name</th>
                        <th>Qualified Date</th>
                        <th>Company Turnover</th>
                        <th>No of achivers</th>
                        <th>Your Commission</th>
                        <th>Receive Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                     $i=1;
                      $total=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$userid' and ttype='Royalty Bonus' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      { 
                        $rankdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from reward_status where user_id='$userid'"));

                      ?>
                     <tr>
                         <td><?php $rankdata['rank'] ?></td>
                         <td><?php $rankdata['rank_name'] ?></td>
                         <td><?php $rankdata['achieved_date'] ?></td>
                         <td><?php $data1['total_invesment_amount'] ?></td>
                         <td><?php $data1['Cause'] ?></td>
                         <td><?php $data1['credit_amt'] ?></td>
                         <td><?php $data1['receive_date'] ?></td>
                     </tr>
                     <?php } ?>
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