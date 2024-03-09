<?php include('../lib/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Centre Professionnel Oeil d'Experts Change The Password</title>
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
    .login-page{
		background:url(images/vladimir-haltakov-CQDutGGkAjk-unsplash.jpg) no-repeat !important;
		background-size:cover !important;
		position:relative;
		min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
	}
	
	.login-page .login-container{
		display:block;
		position:relative;
		z-index:99;
	}
	.header{
		text-align:center;
		padding:10px 0;
		background:#202020;
		margin-bottom:30px;
	}
	.header img{
		max-height:80px;
	}
	.login-page h3 {
		margin: 15px 0 20px 0;
		font-weight: bold !important;
	}
	
      .main__logo{
        margin-bottom:10px;
      }
      .textIN{
        font-weight:bold;
      }
      .login-container .panel{
        padding: 20px;
      }
	  form .form-control{
		  background:#fff !important;
		  border:1px solid #ccc !important;
		  color:#333 !important;
	  }
	  .login-page .login-container .panel .panel-heading{
		  background:#fff;
		  color:#065bb1;
	  }
	  .login-page .login-container form label{
		  color:#333 !important;
	  }
	  .login-page .login-container .panel{
		  color:#333;
	  }
    </style>
        <style type="text/css">
            .logo_heading{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
        </style>
  </head>
  

  <body class="login-page">

    <!--<div id="particles-js"></div>-->

    <div class="">
		<div class="clearfix"></div>

      <main class="login-container">
        <div class="panel-container">
          <section class="panel">
            <header class="panel-heading logo_heading">
                <div class="main__logo">
                  <img src="images/logo.png">
                </div> 
                <h3>Forgot Password</h3>
            </header>
            <div class="panel-body">
              <form action="../post-action.php" method="post">
               <input name="action" type="hidden" value="ForgotPassword" />
                 <?php if($_GET['msg']!='') { ?>
                 <div class="text-center" style=" font-size:14px; font-weight:bold;">
                     <span style="padding-left:10px;">
                         <?php if($_GET['msg']=='wrong') { echo "Wrong Credential Details or account deactivated!";} else if($_GET['msg']=='logout') { echo "You Are Logout!";} else if($_GET['msg']=='Wrong Security Code') { echo "Please Fill correct captcha.";} else { echo urldecode($_GET['msg']); } ?></span>
                         <br/><br/></div>
              <?php } ?>
                <div class="form-group">
                  <label for="userid">User Id</label>
                  <input type="text" class="form-control" id="userid" placeholder="Enter your userid" value="" name="userid" required>
                </div>
                <div class="form-group">
                  <label for="username">Email Id</label>
                  <input type="email" class="form-control" id="username" placeholder="Enter your registered email" value="" name="email" required>
                </div>

                <div class="form-group text-center">
                  <input type="submit" name="submit" value="Send" class="btn-login btn btn-primary btn-block">
                </div>

               <!-- <hr> -->
               <!--  <div class="social-login">
                  <p class="text-center">Like Us On
              </p>
                  <p class="text-center"><a href="https://www.facebook.com/" target="_blank"><i class="ti-facebook"></i></a> <a href="https://www.linkedin.com/"  target="_blank"><i class="ti-google"></i></a> <a href="https://twitter.com/" target="_blank"><i class="ti-twitter"></i></a> </p>
               </div> -->
              </form>
              
              <div class="register-now">
                Already registered? <a href="login.php" style="color:#054183;">Login now</a>
              </div>
            </div>
          </section>
        </div>
      </main> <!-- /playground -->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.11.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/jquery.animsition.min.js"></script>
      <script src="js/login.js"></script>
      <script src="js/particles.js"></script>
      <script src="js/app.js"></script>
    </div>
  </body>
</html>