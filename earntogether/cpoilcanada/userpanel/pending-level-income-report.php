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

              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4">

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">HOLD LEVEL INCOME REPORT</h4>
                
                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Invoice Number</th>
                        <th>User Id</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Customer Name</th>
                        <th>Customer Mobile</th>
                        <th> Total Purchase Amount(<?php echo CURRENCY;?>)</th>
                         <th> Commission (%)</th><!-- Commission -->
                         <th>Commission</th>
                        <th> Released Commission(%)</th>
                        <th> Released Commission (<?php echo CURRENCY;?>)</th><!-- Commission -->
                        <th>TDS(5%)</th>
                        <th>Final Payable Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                     <?php
                      $i=1;
                      $total=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$userid' and ttype='Level Income' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                        $total=$total+$data1['credit_amt'];
                        $userdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id,username,first_name,last_name from user_registration where user_id='".$data1['sender_id']."'"));

                        $billingdeat= mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select total_amount,user_id ,commisiion_perc from billing_detail where invoice_no='".$data1['invoice_no']."'"));
                      //echo $billingdeat['user_id'];
                        
                        $custdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], " select * from customers where user_id='".$billingdeat['user_id']."'"));

                         $pendcomper=(100-$billingdeat['commisiion_perc']);
                        ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['receive_date'];?></td>
                        <th><a href="purchase-invoice.php?id=<?php echo $data1['invoice_no'];?>" style="color:blue"><?php echo $data1['invoice_no'];?></a></th>
                        <td><?php echo $data1['user_id'];?></td>
                        <td><?php echo $userdata['username'];?></td>
                        <td><?php echo $userdata['first_name'].' '.$userdata['first_name'];?></td>
                       <td><?php echo $custdata['title'].' '.$custdata['first_name'].' '.$custdata['first_name'];?></td>
                       <td><?php echo $custdata['telephone'];?></td>
                        <td><?php echo number_format($data1['total_invesment_amount'],2);?></td>
                         <td><?php echo $data1['percent'];?> %</td>
                         
                         <td><?php echo  $data1['package_id']; // $ccm;?> </td>
                          <td><?php echo $pendcomper;?>%</td>
                         <td><?php echo $pendcomamt=($data1['package_id']*$pendcomper)/100; // $data1['Cause']; // $relecom ?></td>

                        <td><?php echo $tds=($pendcomamt*5)/100; ?></td>
                        <td> <?php echo $finalpay=$pendcomamt-$tds;?></td>
                        <td><?php if($data1['status']==0) echo "Pending"; else echo "Paid";?></td>
                    </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                    
                    
               
                    
                  </table>
                 
                    </div>
                    
                     <!--<h3 style="text-align: center;"> Total Commission :  <?php echo CURRENCY; echo ' '.$total;?> </h3>-->

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