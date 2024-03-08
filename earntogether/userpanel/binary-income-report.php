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

            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">

             
            </ol>

          </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Binary Income Report</h4>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Transaction No</th>
                        <th>Matching</th>
                         <th>Percentage</th>
                        <th>Commission</th>
                     
                        <th>Date</th>
                        <th>Status</th>

                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $total=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$userid' and ttype='Binary Income' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                        $total=$total+$data1['credit_amt'];
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['transaction_no'];?></td>
                          <td><?php echo $data1['product_name'];?></td>
                           <td><?php echo $data1['Remark'];?>%</td>
                          <td><?php echo $data1['credit_amt'];?></td>
                       
                          <td><?php echo $data1['receive_date'];?></td>
                          <td><?php if($data1['status']==0) echo "Paid"; else echo "Unpaid";?></td>
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>

  <table align="center" >
                            <tr></tr>
                            <tr>
                      <td></td>
                      <td></td>
                      <td style="font-weight:bold;text-align:center;"><h4>Total Commission = </h4></td>
                      <td><span><h4><?php echo $total; ?></h4></span></td>
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