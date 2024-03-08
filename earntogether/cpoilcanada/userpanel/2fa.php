<?php include("header.php");
include("../GoogleAuthenticator.php");
$user_id = $f['user_id'];
$username2fa = $f['username'];
if(isset($_POST['generate'])){
    $go=new GoogleAuthenticator;
    $secret = $go->createSecret();
    $authname = 'T4U - '.$username2fa;
    // generates the QR code for the link the user's phone with the service
    $site_url = 'https://trader4u.net';
    $qrCodeUrl = $go->getQRCodeGoogleUrl($authname, $site_url, $secret);
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into 2fatemp values (NULL,'$user_id','$secret','$qrCodeUrl')");
    header("location:2fa.php");
}
if(isset($_POST['enable']))
{
    $gaobj = new GoogleAuthenticator;
    $twa3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select two_way,secret from 2fatemp where user_id='$userid'"));
	    
    $oneCode = $_POST['2fa_code'];
    $secret = $twa3['secret'];
    $two_way = $twa3['two_way'];
    $rowid = $twa3['id'];
    $checkResult = $gaobj->verifyCode($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
    if (!$checkResult)
    {
        $_SESSION['err']="Invalid 2FA Code";
		header("location:2fa.php");
		exit;
    }
    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set secret='".$secret."', two_way='".$two_way."' where user_id='$user_id'");
    mysqli_query($GLOBALS["___mysqli_ston"], "delete from 2fatemp where user_id='$user_id'");
}
if(isset($_POST['disable']))
{
    $gaobj = new GoogleAuthenticator;
    $twa4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select two_way,secret from user_registration where user_id='$userid'"));
	    
    $oneCode = $_POST['2fa_code'];
    $secret = $twa4['secret'];
    $checkResult = $gaobj->verifyCode($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
    if (!$checkResult)
    {
        $_SESSION['err']="Invalid 2FA Code";
		header("location:2fa.php");
		exit;
    }
    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set secret=null, two_way=null where user_id='$user_id'");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
            <h1>Two Factor Authentication (2FA)</h1>
                <?php if($_SESSION['err']!='') { ?> <p class="text-center"><div style="color:red; font-size:14px; font-weight:bold;"><span style="color:#F00;padding-left:20px;"><?php echo $_SESSION['err']; $_SESSION['err']='';?></span><br/><br/></div>
              </p><?php } ?>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6">

            <section class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">2FA</h3>
                </header>
                <div class="panel-body">
                    <form  method="post" name="user" enctype="multipart/form-data" id="2fa">
                        <?php
                            $twa=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select two_way,secret from user_registration where user_id='$userid'"));
                            if($twa['two_way']!='' && $twa['secret']!='')
                            {
                        ?>
                        <div class="form-group">
                            <label for="code">2FA Enabled</label>
                            <input type="text" class="form-control" id="2fa_code" placeholder="Enter 2FA Code to Disable" name="2fa_code" >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <input type="submit" name="disable" value="Disable 2FA"  class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        
                        <?php
                            $twa2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select two_way,secret from 2fatemp where user_id='$userid'"));
                            if($twa2['two_way']!='' && $twa2['secret']!='')
                            {
                        ?>
                        <img src="<?= $twa2['two_way']?>" style='width:200px;'><br/>
                        <p><?= $twa2['secret']?></p><br/>
                        <div class="form-group">
                            <label for="code">2FA Code Disabled</label>
                            <input type="text" class="form-control" id="2fa_code" placeholder="Enter 2FA Code to Enable" name="2fa_code" >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <input type="submit" name="enable" value="Enable 2FA"  class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        
                        <?php
                            if($twa2['two_way']=='' && $twa2['secret']=='' && $twa['two_way']=='' && $twa['secret']=='')
                            {
                        ?>                      
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <input type="submit" name="generate" value="Generate 2FA QR Code"  class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        
                        
                    </form>
                </div>
            </section>

            </div> <!-- / col-md-6 -->

            <div class="col-md-6">

              <!-- / section -->
			 
              <!-- / section -->

            </div>

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
  
  </body>
</html>