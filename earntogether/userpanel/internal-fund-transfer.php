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
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
    
   
      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
   <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

        
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
   
      <?php include("top.php");?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                 <div class="content-page">
                <!-- Start content -->
                <div class="content">

        <div class="container">
          <div class="row">
       
            

            <div class="col-md-6 col-md-offset-3">
            <form name="internal_fund_transfer" method="post" action="internal-fund-transfer-confirm.php">
              <section class="panel">
                     <br>
                   <h3 class="text-center">Internal Fund Transfer</h3><br/>
             
                <div class="panel-body" style="padding:0 30px;">

                <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
                
                <?php
                    /*Income Wallet*/ 
                    $commission_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `roi_e_wallet` WHERE user_id = '".$f['user_id']."'"));
                    echo "<h4><strong>ROI Wallet Balance:</strong> $ ".number_format($commission_query['amount'], 2)."<h4>";
                    $product_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `level_e_wallet` WHERE user_id = '".$f['user_id']."'"));
                    echo "<h4><strong>Level Wallet Balance: </strong> $ ".number_format($product_query['amount'], 2)."<h4>";
                    $final_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `final_e_wallet` WHERE user_id = '".$f['user_id']."'"));
                    echo "<h4><strong>Bonus Wallet Balance: </strong> $ ".number_format($final_query['amount'], 2)."<h4>";
                    $inv_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `rmb_wallet` WHERE user_id = '".$f['user_id']."'"));
                    echo "<h4><strong>Investment Wallet Balance: </strong> $ ".number_format($inv_query['amount'], 2)."<h4>";
                   
                ?>
                <hr/>
                    <div class="form-group">
                      <label for="exampleInputAddress">Type</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <select name="type" class="form-control">
                          <option value="1">Level To Investment Wallet</option>
                          <option value="2">ROI To Investment Wallet</option>
                          <option value="3">Bonus To Investment Wallet</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputAddress">Amount</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="amount" value="" class="form-control" id="amount" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputAddress">Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="password" value="" class="form-control" id="t_code">
                      </div>
                    </div>
                
					<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					</div>

                </div>
            
              </section>

			</form>
             

            </div>

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->

            <!-- content -->

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
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#rid").blur(function (e) {
    var sid = $(this).val();
 
    if(sid.length >= 1){
    $.post('userfinder.php', {'sid':sid}, function(data) {
    $("#checksponser").html(data);
    // alert(data);
    });
    }
    }); 
    });
  </script>
  </body>
</html>