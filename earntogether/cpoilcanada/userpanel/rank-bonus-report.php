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
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">RANK BONUS REPORT</h4>
                <div class="panel-body">
                    <?php 
                    $mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(bv) as total from manage_bv_history where income_id='$userid' "));
                    $mydincome = $mydownlineincomes['total'];
                    $selfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(amount) as total from lifejacket_subscription where user_id='$userid'"));
                    $selft = $selfincomes['total'];
                    $mytotalincome = $selft+$mydincome;
                    ?>
                <div class="row">
                    <div class=""><label>TPV:</label> <?php echo $mytotalincome;?></div>
                </div>
                  <table class="table">
                    <thead>
                      <!--<tr>-->
                      <!--  <th>#</th>-->
                      <!--  <th>SenderID</th>-->
                      <!--  <th>Sender Name</th>-->
                      <!--  <th>Transaction No</th>-->
                      <!--  <th>Downline Name</th>-->
                      <!--  <th>Downline Id</th>-->
                      <!--  <th>Commission</th>-->
                      <!--  <th>Remark</th>-->
                      <!--  <th>Date</th>-->
                      <!--  <th>Status</th>-->

                        
                      <!--</tr>-->
                      
                      <tr>
                        
                        <th>Rank Name</th>
                        <th>Required TPV</th>
                        <th>Bonus</th>
                        <th>Rank Qualify Status</th>
                        <th>Bonus Qualify Status</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     <tr>
                         <td>Beginner</td>
                         <td>0</td>
                         <td>0</td>
                         <td><i class="fa fa-check"></i></td>
                         <td><i class="fa fa-check"></i></td>
                     </tr>
                     <tr>
                         <?php $rank1data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='2'")); ?>
                         <td>Starter</td>
                         <td>1000</td>
                         <td>50</td>
                         <td>
                            <?php if($rank1data['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?>
                         </td>
                         <td>
                             <?php if($rank1data['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?>
                         </td>
                     </tr>
                     <tr>
                         <?php $rank2data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='3'")); ?>
                         <td>Associate</td>
                         <td>4000</td>
                         <td>150</td>
                         <td>
                             <?php if($rank2data['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?>
                         </td>
                         <td><?php if($rank2data['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='4'")); ?>
                         <td>Sr. Associate</td>
                         <td>20000</td>
                         <td>800</td>
                         <td><?php if($rankdata3['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata3['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata4 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='5'")); ?>
                         <td>Adviser</td>
                         <td>50000</td>
                         <td>2000</td>
                         <td><?php if($rankdata4['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata4['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata5 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='6'")); ?>
                         <td>Sr.Adviser</td>
                         <td>100000</td>
                         <td>5000</td>
                         <td><?php if($rankdata5['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata5['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata6 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='7'")); ?>
                         <td>Director</td>
                         <td>500000</td>
                         <td>20000</td>
                         <td><?php if($rankdata6['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata6['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata7 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='8'")); ?>
                         <td>Sr. Director</td>
                         <td>1000000</td>
                         <td>50000</td>
                         <td><?php if($rankdata7['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata7['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata8 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='9'")); ?>
                         <td>Star Director</td>
                         <td>2000000</td>
                         <td>100000</td>
                         <td><?php if($rankdata8['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata8['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata9 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='10'")); ?>
                         <td>Sr. Star Director</td>
                         <td>5000000</td>
                         <td>200000</td>
                         <td><?php if($rankdata9['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata9['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata10 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='11'")); ?>
                         <td>SuperStar Director</td>
                         <td>10000000</td>
                         <td>500000</td>
                         <td><?php if($rankdata10['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata10['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
                     <tr>
                         <?php $rankdata11 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bonus_on_rank where user_id='$userid' and rank='12'")); ?>
                         <td>Ambassador</td>
                         <td>20000000</td>
                         <td>Royalty Income</td>
                         <td><?php if($rankdata11['rank_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                         <td><?php if($rankdata11['bonus_qualify'] == 1){ echo '<i class="fa fa-check"></i>';} else{ echo '<i class="fa fa-times"></i>';} ?></td>
                     </tr>
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