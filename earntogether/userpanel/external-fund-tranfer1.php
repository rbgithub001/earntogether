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
        <section id="example2">
          <div class="row">
            <div class="col-md-9">
             <!--  <h1>Income Wallet Fund Transfer</h1> -->
              <p style="color:#900;font-weight:bold; text-align: center;"><?php echo $_SESSION['err'];$_SESSION['err'];?></p>
            </div>

            <div class="col-md-3">
                <a href="external-fund-transfer-list1.php"><input type="submit" name="updates1" value="View Transaction" class="btn btn-primary"></a>   
            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6 center-block" style="float:none;">

<?php 
 $uid=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where  user_id='$userid' "));

 $uid1=$uid['kyc_status'];

 if($uid1==1) {
  
?>

           <form name="bankinfo" method="post" action="external-fund-transfer-confirm1.php">
              <section class="panel panel-primary">

                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">Chip transfer To Other User</h4>

                <h4>My Total Chips : <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$userid'"));?><?php  echo $data['amount'];?>
                </h4><!-- $_SESSION['currency']; -->
                
                <!--<p>Note: wallet fund transfer 8% charge will be only if user transfer fund in upline</p>--></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="working_e_wallet" checked="checked" />
   
                        
  
  <input type="hidden" name="walletfrom" required class="form-control" value="working_e_wallet">


           <div class="form-group">
              <label for="exampleInputAddress">Enter Recipient Userid / Username</label>
              <input type="text" name="user" required value="" class="form-control" id="rid">
              <span id="checksponser"></span> 
            </div>

           <div class="form-group">
            <label for="exampleInputAddress">Enter Amount to Transfer</label>
              <input type="text" name="amounts" required value="" class="form-control" id="exampleInputAddress">
          </div>

          <div class="form-group">
            <input type="submit" name="update" value="Transfer" class="btn btn-primary">             
          </div>
        </div>

              </section>

</form>
<?php } else  {  ?>

<h3 style="margin-top: 50px;color: red;"> <?php echo "Your KYC is Pending. Please Update Your KYC !!"; ?></h3>

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