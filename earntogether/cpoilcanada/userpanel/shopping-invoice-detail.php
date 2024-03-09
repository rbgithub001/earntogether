<?php include("header.php");

  $invoiceno=$_GET['inv'];?>
<!DOCTYPE html>
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
            <!--<h1>My Package Invoice</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4" style="float:right;">

           <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Invoice</a></li>-->
              <!--<li><a href="#">My Package Invoice</a></li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <!--<h4 class="panel-title">Purchase Invoices</h4>-->
                </header>
                <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                       
                        <div class="total_invoice"  id="printArea">

                            <div class="table-responsive">
                                
                                 <div class="container-fluid">
          <div class="row">

            <div class="col-md-12 margin-bottom-30">
              
			  

                <div class="invoice">
                    <div id="dvContents" class="panel-body">
                        <div class="row">
                            <?php
                           
                            $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where invoice_no='$invoiceno'");
                            $data1=mysqli_fetch_array($data);
                            $seller_id = $data1['seller_id'];
                            
                            
                            $data234=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where user_id='$seller_id'"));
                            $img = $data234['image'];
                            $seller_name = $data234['username'];
                            
                            ?>
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <div class="invoice-logo">
                                    <img width="250" alt="" src="../images/<?=$img;?>">
                                </div>
                            </div>
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                               <?php
                               if(isset($_GET['type']) && $_GET['type']=='activation')
                               { 
                               ?>
                               <h2>Activation invoice</h2>
                               <?php
                                } 
                                else
                                {
                                 ?>
                                 <h2>PURCHASE INVOICE</h2>
                                 <?php   
                                }
                               ?>
                            </div>
                            
                            
                                    
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <div class="total-purchase">
                                    Paid Amount
                                </div>
                                <div class="amount">SAR  <?php echo number_format($data1['total_amount'],2);?> <?php //echo number_format($data1['total_amount'],2);?>                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <?php $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'");
                                $address=mysqli_fetch_array($data);?>
                            <div class="col-xs-8 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <strong> TO</strong>
                                <br><?php echo ucfirst($address['first_name'])." ".ucfirst($address['last_name']);?>
                                <br><?php echo $address['address']; ?>
                                <br><?php echo $address['city'].", ".$address['state'];?>
                                <br><?php echo $address['country'];?>
                                <br>Tel: +962-<?php echo $address['telephone'];?>   </div>
                            <div class="col-xs-4 inv-info animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                            
                                <strong>INVOICE INFO :</strong>
                                <br> <span> Invoice Number :</span>	<?php echo $data1['invoice_no'];?>
                                <br><span> Invoice Date :</span>	<?php echo $data1['date'];?>
                               
                                <br><span style="color:green;"><b>Stockist Id :</b></span> <?=$seller_id;?>                         
                                <br> <span style="color:green;"> Stockist Name : : </span> <?=$seller_name;?> 
								        </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <table class="table table-striped table-hover">
												
						
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ITEM</th>
                                <th>UNIT COST</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php
                                $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from eshop_purchase_detail where invoice_no='$invoiceno'");
                                $i=0;
                                $subtotal = 0;
                                $discount = 0;
                                while($data=mysqli_fetch_array($query)){
                                   $i++;
                                   $subtotal = $subtotal + $data['net_price'];
                                   $discount = $discount + $data['discount'];
                                     $gst_per = 12;
                                        $gst = ($data['net_price'] * $gst_per / 100);
                                        $product_gst = $product_gst + $gst;
                                         $data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from products where product_id='".$data['p_id']."'"));
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <!-- <td><img src="<?php echo SITE_URL."cmsadmin/product_images/".$data11['actual_image']; ?>" height="100px" width="100px"/></td> -->
                                    <td><?php echo  $data['product_name'];?></td>
                                   
                                    <td><?php echo number_format($data['price'],2);?></td>
                                   
                                    <!--<td><?php // echo  $data['pv'];?></td>-->
                                    <td><?php echo $data['quantity'];?></td>
                                   
                                    <td><?php echo number_format($data['net_price'],2);?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-xs-8 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <!--<h4>PAYMENT METHOD</h4>-->
                                <ul class="list-unstyled">
                                    <li>
                                        <b><?php echo $data1['payment_mode'];?></b>
                                    </li>
                                   <li><strong>Payment Status :</strong><?php 

                                                 echo"Paid";
                                              ?></li>
                                </ul>
                                <!--<h4>CURRENCY TYPE</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <b>USD</b>
                                    </li>
                                   
                                </ul>-->
                            </div>
                            <div class="col-xs-4 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td><?php echo $data1['total_amount'];?><?php// echo $currency.number_format($data1['total_amount'],2);?></td>
                                    </tr>
									
									<!--<tr>
                                        <td>Paid Amount</td>
                                        <td>$100</td>
                                    </tr>
                                   
									<tr>
                                        <td>Pending Amount</td>
                                        <td>$100</td>
                                    </tr>-->
									
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong><?php echo $data1['total_amount'];?><?php  //echo $currency.number_format($data1['total_amount'],2);?></strong></td>
                                    </tr>
                                    </tbody>
										                                </table>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12 animateme scrollme" data-when="enter" data-from="0.2" data-to="0" data-crop="false" data-opacity="0" data-scale="0.5">
                                <div class="pull-left">
                                     <input type="button" onclick="PrintDiv();" value="Print" class="btn btn-danger" />
                            
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                <a href="index.php" class="btn btn-danger"><i class="ti-dashboard"></i> Back to Dashboard</a>
                                    <!-- <a href="#" class="btn btn-success">Submit Payment</a>-->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


	
            

            </div>

          </div>

      
        </div> <!-- / container-fluid -->

                            </div></div>
                      

                    </div>

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


