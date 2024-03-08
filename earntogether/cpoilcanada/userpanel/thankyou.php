<?php include("../lib/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=WEBSITE;?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Facebook Pixel Code -->

<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=323408631557379&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Ads: 789464997 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-789464997"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-789464997');
</script>-->

<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->

	<style type="text/css">
    .login-page{
		background:url(images/vladimir-haltakov-CQDutGGkAjk-unsplash.jpg) no-repeat !important;
		/*background-size:cover !important;*/
		position:relative;
		/*min-height:620px;*/
	}
	
	.login-page .login-container{
		display:block;
		position:relative;
		z-index:99;
	}
	.header{
	 text-align: center;
    padding: 10px 0;
    background: #003989ad;
    margin-bottom: 30px;

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
		  margin-bottom:30px;
	  }
	  a{
		  color:#333;
	  }
	  
	  .login-page .login-container .panel{
	      width:auto;
	  }
	  
	  .login-page {
    min-height: auto;
    }
    
    .h2, h2 {
font-size:27px;
        
    }
    
    </style>
        <style type="text/css">
           
            @media (max-width:767px){
                .login-page{
                  min-height: 1200px;
                }
            }
            
        </style>

  </head>

  <body class="login-page">
      
    <div class="animsition" style="display: initial;">
	
	<div class="header">
			<div class="container">
			 <a href="../index.php">
			     <h3 style="color:#fff;">Centre Professionnel Oeil d'Experts</h3>
			     </a>
			</div>
		</div>
		<div class="clearfix"></div>


      <main class="login-container" style="display: inherit;">
        <div class="panel-container">
          <section class="panel">
            <header class="panel-heading">

			     <img src="../images/logo.png" alt="" />
              <h2>Centre Professionnel Oeil d'Experts</h2>

            </header>
            <?php
               $chkuser = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select user_id,username,password from user_registration where user_id='".$_GET['userid']."' "));
            ?>

            <div class="panel-body">
             <!--<form class="form-horizontal" method="post" id="customer_login" accept-charset="UTF-8" action="#">-->
              <div class="panel panel-default p2">
               
                <div class="panel-body text-left">
                 <p style="color: #555; text-align: justify; font-size: 14px;"> Congratulations on getting Started with Centre Professionnel Oeil d'Experts<br>
                 
                 </p>
                   <p style="color: #555; text-align: justify; font-size: 14px;">Below are your login details & Remember: Privacy is everything</p>
                <table class="table table-bordered table-hover table-striped">
              
                 <tr>
                    <th>User ID</th>
                    <td><?php echo $chkuser['user_id']; ?></td>
                  </tr>
                  
                  <tr>
                    <th>Username</th>
                  <td><?php echo $chkuser['username']; ?></td>
                  </tr>
                  
                   <tr>
                    <th>Password</th>
                  <td><?php echo $chkuser['password']; ?></td>
                  </tr>
                  
                  <!--<tr>
                    <th>Pin</th>
                    <td><?php // echo $_GET['pin']; ?>

                    </td>
                  </tr>  -->
                </table>
                  
                  <a href="login.php" class="btn btn-primary">Login Now</a>
                  <!-- <a href="pin.php"><img src="images/epin.png" width="170"></a>&nbsp;&nbsp;&nbsp;&nbsp;-->
                </div>
              </div>
            <!--</form>-->
              <hr>
             
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

    </div>
    <!--Facebook Event-->
    <script>
  fbq('track', 'CompleteRegistration');
</script>
<!--Facebook Event End-->
  </body>
</html>