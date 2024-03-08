<?php include("header.php");

 

?>
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
        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Wallet Fund Transfer</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">
  <a href="external-fund-transfer-list.php"><input type="submit" name="updates1" value="View Transaction" class="btn btn-primary"></a>   
           

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

<?php 
 $uid=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_id='$userid' "));

$uid1=$uid['fund_status'];

if ($uid1==0) {
 

?>

           <form name="bankinfo" method="post" action="external-fund-transfer-confirm.php">
              <section class="panel">

                <header class="panel-heading" style="color:#000;">
                  <h3 class="panel-title">Wallet fund transfer</h3>
                </header>
                <header class="panel-heading" style="color:#000;">
                 <br/> <h3 class="panel-title">Main Wallet : <?php echo $_SESSION['currency']; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data['amount'],2);?><br>

                Working Wallet :<?php echo $_SESSION['currency']; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data['amount'],2);?> <br>

             ROI Wallet : <?php echo $_SESSION['currency']; ?> <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from roi_e_wallet where user_id='$userid'"));?><?php  echo number_format($_SESSION['rates']*$data['amount'],2);?>
                  </h3>
                <br/>
                <p>Note: wallet fund transfer 8% charge will be only if user transfer fund in upline</p></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Send Amount From </label>
                      <div class="input-group">
                        <!-- <span class="input-group-addon"></span> -->
                        
  <input type="radio" name="walletfrom" required class="form-control" value="working_e_wallet" checked>Working Wallet
  <input type="radio" name="walletfrom" required class="form-control" value="roi_e_wallet">ROI Wallet
  <input type="radio" name="walletfrom" required class="form-control" value="final_e_wallet">Main Wallet



                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Enter Recipient Userid / Username</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="user" required value="" class="form-control" id="rid">
                        <span id="checksponser"></span> 
                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Enter Amount to Transfer</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="amounts" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                         <div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="update" value="Transfer" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

              </section>

</form>
<?php } else  {  ?>

<h3 style="margin-top: 50px;"> <?php echo "Fund Transfer request disable by admin "; ?></h3>

<?php } ?>
            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

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