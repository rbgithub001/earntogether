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
<?php 

$left_condi=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$userid' and leg='left'");

    while($vccunt111=mysqli_fetch_array($left_condi))
    {

 $left_userid=$vccunt111['down_id'];
$working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
  $leftamt1=$leftamt1+$working_e_wallet1['amount'];

    }


    $rightamt1=0;
$left_condi11=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$userid' and leg='right'");
    while($vccunt111=mysqli_fetch_array($left_condi11))
    {

 $left_userid=$vccunt111['down_id'];
$working_e_wallet2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
 $working_e_wallet2['amount'];
  $rightamt1=$rightamt1+$working_e_wallet2['amount'];

    }
?>
         <h3>   Left Business : <?php echo $leftamt1;?><br/></h3>
           
          </div>

          <div class="col-md-4">

          <h3>  Right Business : <?php echo $rightamt1;?></h3>

          </div>
        </div>
        </section>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Pairing Report</h4>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                       
                        <th>Downline Name</th>
                        <th>Downline Username</th>
                        <th>Amount</th>
                         <th>Position</th>
                              <th>Level</th>
                       
                       <!--  <th>Date</th> -->
                      

                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $amount=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' ");
                      while($data1=mysqli_fetch_array($data))
                      {

                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                         <?php $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1['down_id']."'"));?>
                        <td><?php echo $data11['first_name']." ".$data11['last_name'];?></td>
                         <td><?php echo $data11['username'];?></td>
                          <td><?php 
$working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='".$data1['down_id']."'"));
  $leftamt1=$working_e_wallet1['amount'];
       $amount=$amount+$working_e_wallet1['amount'];

                          echo $leftamt1;?></td>
                        <td><?php echo $data1['leg'];?></td>
                        <td><?php echo $data1['level'];?></td>
                         
                           <!--   <td><?php echo $data1['ts'];?></td> -->
                         <!--  <td><?php if($data1['status']==1) echo "Paid"; else echo "Unpaid";?></td> -->
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