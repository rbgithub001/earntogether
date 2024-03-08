<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include("header.php");

 $invoice_no=$_GET['id'];
// echo "select * from amount_detail where invoice_no='$invoice_no' ";
// exit();

$lfj=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from billing_detail where invoice_no='$invoice_no' "));

 $custid=$lfj['user_id'];
  $detailuser=$lfj['seller_id'];

// echo "select * from user_registration where user_id='$detailuser'";
// exit();

$userdeailss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$detailuser'"));
$customerdeailss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from customers where user_id='$custid'"));

?><!DOCTYPE html>
<html lang="en">
  <head>
       <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Style CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";
              window.print();
              document.body.innerHTML = oldPage;
               location.reload();
        }
    </script>
<style>
      blink {
        animation: blinker 1s linear infinite;
        color: #1c87c9;  <img src="../img/logo.png" alt="" width="200px;" />
       }
      @keyframes blinker {  
        50% { opacity: 0; }
       }
       .blink-one {
         animation: blinker-one 1s linear infinite;
       }
       @keyframes blinker-one {  
         0% { opacity: 0; }
       }
       .blink-two {
         animation: blinker-two 1.4s linear infinite;
       }
       @keyframes blinker-two {  
         100% { opacity: 0; }
       }
       .amount {
    background: #656565 none repeat scroll 0 0;
    color: #fff;
    font-family: "Abel",sans-serif;
    font-size: 29px;
    padding: 10px 30px;
}
.invoice h1 {
    color: #d5d5d5;
    font-size: 48px;
    text-transform: uppercase;
    font-family: 'Abel', sans-serif;
}
    </style>
  </head>

  <body class="">
    <div class="animsition">  
    
     <?php include("sidebar.php");?>
     

      <main id="playground">

            
       
         <?php include("top.php");?>

       


        <!-- PAGE TITLE -->
        <div id="print">
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Summary / Payment</h1>
          
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Home</a></li>
              <li><a href="#">Summary / Payment</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
           

            <div class="col-md-12 margin-bottom-30">
              
			  <section class="row" >

                <div class="total_invoice"  id="printArea">

             <div class="panel invoice">
                 
                 <div class="panel-body" id="printablediv">
							
                               

                                



                               
                            </div>
                 
                 
                   <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="../userpanel/images/logo1.png" alt="" width="250px" />
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <h1>invoice</h1>
                            </div>
                            <div class="col-xs-4">
                                <div class="total-purchase">
                                    Total Amount
                                </div>
                                <div class="amount"><?=CURRENCY ?> <?php echo number_format($lfj['net_amount'],2);?>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="container">

                                    <div class="col-xs-4 col-xs-12">
                                          <address>
                                            <strong>Paid to :</strong>
                                            <br><span> <?php echo $userdeailss['first_name']." ".$userdeailss['last_name'];?> </span>
                                        <br><span>Address: <?php echo $userdeailss['address'];?></span> 
                                        <br><span>City/State/Country:<?php echo $userdeailss['city'];?>/<?php echo $userdeailss['state'];?>/<?php echo $userdeailss['country'];?></span><br>
                                         <span>Pin:  <br>    <?php echo $userdeailss['zipcode'];?></span>
                                     <br><span>Tel: <?php echo $userdeailss['telephone'];?></span>
                                        </address>
                                    </div>
                                    

                                    <div class="col-xs-4 col-xs-12">
                                   <address>
                                            <strong>Buyer :</strong>
                                            <br><span> <?php echo $customerdeailss['first_name']." ".$customerdeailss['last_name'];?> </span>
                                        <br><span>Address: <?php echo $customerdeailss['address'];?></span> 
                                        <br><span>City/State/Country:<?php echo $customerdeailss['city'];?>/<?php echo $customerdeailss['state'];?>/<?php echo $customerdeailss['country'];?></span><br>
                                         <span>Pin:  <br>    <?php echo $customerdeailss['zipcode'];?></span>
                                     <br><span>Tel: <?php echo $customerdeailss['telephone'];?></span>
                                        </address>
                               
                                    </div>

                                    <div class="col-xs-4 col-xs-12 inv-info">

                                        <strong>INVOICE INFO</strong>

                                        <br> <span> Invoice Number</span>   <?php echo $lfj['invoice_no'];?>
                                        <br><span> Invoice Date</span>    <?php echo $lfj['payment_date'];?>
                                        <!-- <br/> <span> Expiry Date</span>     -->

                                         <br> <span>User ID</span>      <?php echo $lfj['seller_id'];?>
                                         <br> <span>Email ID :</span>    <?php echo $userdeailss['email'];?>
                                        <!--<br><span>Bank Ref No :</span> N/A-->
                                        <!--  <br><span style="color:green;"><b>Stockist Id :</b></span> 2025040-->
                                        <!-- <br><span style="color:green;"><b>Stockist Name :</b></span> Dehradun Store-->
                                        <!--<br><span style="color:green;"><b>Receiver Id :</b></span> -->
                                </div>
                                </div>
                        <br/>
                        <br/>
                        <br/>
                        

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>PROJECT NAME</th>
                                 <th>PROPERTY TYPE</th>
                              <!--   <th class="hidden-xs">DESCRIPTION</th> -->
                                <th class="">PROPERTY PRICE</th>
                                 <th class="">SALE PRICE</th>
                                <th>TOTAL PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $propertydet=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='".$lfj['property_id']."'"));
                          $propertytt=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where category_id='".$lfj['property_type']."'"));
                                   // echo $propertytt['name']." / ".$propertydet['title'];
                                    
                          //  $package123=mysqli_query($GLOBALS["___mysqli_ston"], "select * from purchase_detail where invoice_no='".$_GET['invoice_no']."'");
                           $i=1;
                          //  while($packagepurchase=mysqli_fetch_array($package123)){
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo  $propertydet['title'];?></td>
                                <td> <?= $propertytt['name']?></td>
                                 <td class=""><?=CURRENCY ?> <?php echo number_format($lfj['actual_property_amount'],2);?></td>
                                <td class=""><?=CURRENCY ?> <?php echo number_format($lfj['net_amount'],2);?></td>
                                <td><?=CURRENCY ?> <?php echo number_format($lfj['net_amount'],2);?></td>
                            </tr>
                            <?php //$i++; }?>
                           
                            </tbody>
                        </table>
                        <br/>
                        <br/>
                         <br/>
                        <br/>
                         <br/>
                        <br/>
                        
                        
                         <div class="container">

                                    <div class="col-xs-4 col-xs-12">
                                        <h4>PAYMENT METHOD</h4>
                                        <ul class="list-unstyled">
                                            <li><strong>Payment Mode :</strong> <?php echo $lfj['payment_type'];?></li>
                                            <!--<li> <strong>Order ID : </strong>order_IykcwHkp8z3uZD</li>-->
                                           <li><strong>Payment Status :</strong>Paid</li>
                                         </ul>

                                    </div>

                                    <div class="col-xs-4 col-xs-12">
                                        <ul class="list-unstyled">
                                        </ul>
                                    </div>
                                    <div class="col-xs-4 col-xs-12">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td><?php echo CURRENCY.' '. number_format($lfj['net_amount'],2);?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>GRAND TOTAL</strong></td>
                                                <td><strong><?php echo CURRENCY.' '. number_format($lfj['net_amount'],2);?></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          <div class="container">
                                </div><br><br>
                                <div class="container">
                                    <div class="col-xs-12 col-xs-12">
                                        <div class="pull-left">
                                              <a class="btn btn-danger" onClick="coderHakan()"><i class="fa fa-print"></i> Print</a>

                                            <!--<a href="javascript:void(0);" class="btn btn-primary hidden-print" id="print" style="float:right;" onclick="javascript:printDiv('printablediv')" target="_blank"><span aria-hidden="true"></span> Print</a>-->

                                        </div>

                                        <div class="pull-right">

                                        </div>

                                    </div>

                                </div>

                        <br/>
                        <br/>
                        <br/>
                        <!--  -->

                    </div>
                </div>


                </div>

            
             <div class="pull-left">
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>

            
  <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";
              window.print();
              document.body.innerHTML = oldPage;
               location.reload();
        }
    </script>

		</section>
            

            </div>
			
			

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->

        </div>




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

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>

  </body>
</html>