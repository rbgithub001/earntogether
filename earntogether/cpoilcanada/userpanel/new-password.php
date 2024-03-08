<?php include('../lib/config.php');

if(isset($_POST['submit']))
{
  
$userid=$_POST['user_id'];  
$token=$_POST['token'];  
$status=$_POST['status'];  
$password=$_POST['password']; 
$password1=$_POST['password1'];  
 
$f=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from forgot_password where userid='$userid' and token='$token'"));
 
 if($f['status']=='0')
{
  if($password!=$password1) {
  header("location:new-password.php?user_id=$userid&token=$token&status=$status&msg=Confirm Password does not match !");
     exit;  
}
   
//$databasepwd1=hash('sha256',$password);
$databasepwd1=$password;

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set password='$databasepwd1' where (user_id='$userid' || username='$userid')");
mysqli_query($GLOBALS["___mysqli_ston"], "update forgot_password set status=1 where userid='$userid' and token='$token'");
header("location:login.php?msg=Password Updated Successfully !");
}
else{
  header("location:forgot.php?msg=Please try Again !");
exit;
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cantho Forgot Password</title>

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .main__logo{
        margin-bottom:10px;
      }
      .textIN{
        font-weight:bold;
      }
    </style>
  </head>

  <body class="login-page">
    <div class="animsition">

      <main class="login-container">

        <div class="panel-container">
          <section class="panel">
            <header class="panel-heading">
             <div class="main__logo">
                 <!--<img src="../images/logo.png">-->
                 
                 <h2>CANTHO</h2>
                 </div>
             <p>New Password</p>
            </header>
            <div class="panel-body">
              <form action="" method="post">
              
                 <?php 
                  $user_id=$_GET['user_id'];
                  $token=$_GET['token'];
                  $status=$_GET['status'];
                 if($_GET['msg']!='') { ?> 
                 <p class="text-center"><div style="color:red; font-size:14px; font-weight:bold;">
                     <span style="color:#F00;padding-left:10px;"><?php if($_GET['msg']=='wrong') { echo "Wrong Credential Details or account deactivated!";} else if($_GET['msg']=='logout') { echo "You Are Logout!";} else if($_GET['msg']=='Wrong Security Code') { echo "Please Fill correct captcha.";} else { echo urldecode($_GET['msg']); } ?></span><br/><br/></div>
                 </p>
              <?php } ?>
               <input name="user_id" type="hidden" value="<?php echo $user_id ;?>" />
               <input name="token" type="hidden" value="<?php echo $token ;?>" />
               <input name="status" type="hidden" value="<?php echo $status ;?>" />
              <div class="form-group">
                  <label for="userid">Enter New password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter your password" value="" name="password" required>
                </div>
                <div class="form-group">
                  <label for="username">Confirm New password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter your Confirm password" value="" name="password1" required>
                </div>

                               
                <div class="form-group text-center">
                  <input type="submit" name="submit" value="Send" class="btn-login btn btn-primary">
                </div>

               <hr>
               
              </form>
              <hr>
              <div class="register-now">
                Already registered? <a href="login.php">Login now</a>
              </div>
            </div>
          </section>
        </div>
      </main>
      </div>
      <!-- /playground -->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.11.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/jquery.animsition.min.js"></script>
      <script src="js/login.js"></script>

    </div>
  </body>
</html>