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
            <!--<h1>Ewallet Transaction History</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Ewallet</a></li>
              <li><a href="#">Ewallet Transaction History</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
		  
		  <? 
   include('../lib/random.php');
   $salt=$_SESSION['nonce'];
?>
 
<form action="bitcoin-payment.php" method="post" name="bitcoin" id="bitcoin" onsubmit="return hash();";   autocomplete='off'>
            <div class="col-md-12">



              <section class="panel panel-primary">
                <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;text-align: center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>
                <header class="panel-heading">
                  <h4 class="panel-title">Fund wallet with bitcoin</h4>
                </header>
                <div class="panel-body">
<?php

?>
 <br/> <h3 class="panel-title">e-Wallet Ballance :  <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><strong><?php  echo number_format($data['amount'],2);

//echo "select * from final_e_wallet where user_id='$userid'";



 ?></strong> USD</h3>
                <br/></header>
               <h3><span style="color:red;">
                  <?php
              if($_SESSION['err']!='')
              {
echo $_SESSION['err'];
       $_SESSION['err']='';           
              }
              ?></span>
               </h3>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
             <input type="hidden" name="randm" value = "<?php echo htmlentities($salt);?>" />
           <div class="form-group">
                      <label for="exampleInputAddress">Your Username</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="userid" required value="<?php echo $f['username'];?>" class="form-control" id="usernameQ" readonly="readonly">
                      </div>
                      <div id="fullname" style="font-size:14px;color:green;font-weight:bold;"></div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Amount to Transfer</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="amounts" required  class="form-control"   id="exampleInputAddress"  value="">
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
</div>
</div>
</section>
</div>
</form>
            
<script type="text/javascript" src="js/sha256.js"></script> 
<script>
function hash(){
	 
 var randm=document.bitcoin.randm.value;	
 var t_password=document.bitcoin.t_password.value;
 
 	 var t_password= sha256(t_password);							
     var t_password = t_password+randm;							 						 
 	 document.bitcoin.t_password.value = sha256(t_password);	 
 	
}
</script>
      
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
      <script type="text/javascript" src="<?php echo $blockchain_root ?>Resources/js/pay-now-button-v2.js"></script>
  
  </body>
</html>