<?php include('../lib/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Centre Professionnel Oeil d'Experts</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    
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
		/*min-height: 110vh;*/
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
		 background: #fff;
         color: #003989;
      }
	  .login-page .login-container form label{
		  color:#333 !important;
	  }
	  .login-page .login-container .panel{
		  color:#333;
	  }
    </style>
        <style type="text/css">
           
            
        </style>
 <script src='https://www.google.com/recaptcha/api.js'></script>

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
              <h3><b>Log In</b></h3>
            </header>
            <div class="panel-body">
              <form action="../post-action.php" method="post">
               <input name="action" type="hidden" value="loginuser" />
                 <?php if($_GET['msg']!='') { ?> <div class="text-center" style="color:lightgreen; font-size:14px; font-weight:bold;"><span style="color:lightgreen;padding-left:10px;"><?php if($_GET['msg']=='wrong') { echo "Wrong Credential Details or account deactivated!";} else if($_GET['msg']=='logout') { echo "You Are Logout!";} else if($_GET['msg']=='Wrong Security Code') { echo "Please Fill correct captcha.";} else { echo $_GET['msg']; } ?></span><br/><br/></div>
                <?php } ?>
                <div class="form-group text-left">
                  <label for="username">UserId</label>
                  <input type="text" class="form-control" id="username" placeholder="UserId"  name="username" required>
                </div>

                <div class="form-group text-left">
                  <label for="password">Password</label> 
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password"  required >
                <!--   <button type="button" class="btn btn-sm btn-primary" onclick="myFunction('password')"><i id="eyeIcon2" class="fa fa-eye"></i></button> -->
                </div>
<!-- <div class="form-group">
                  <label for="code">2FA Code</label>
                  <input type="text" class="form-control" id="code" placeholder="Enter 2FA Code IF Enabled" name="2fa_code" >
                </div> -->

               <!--<div class="form-group text-left">-->
               <!--       <label for="inputPassword3" style="margin-bottom: 10px;">Security</label>-->
                                                       
               <!--       <input type="text" name="captcha" required class="form-control" placeholder="Enter the Captcha Code"/>-->
                              
               <!--    <center><img src="captcha/captcha.php?" id="captcha" style="margin-top:10px;height: 60px;"></center>-->
                 <!-- <a href=""  id="new">
                         <img src="images/reload.png" style="width:21px;" />
                  </a> -->
               <!--</div>-->
              <!--  <div class="form-group text-left">
  <div class="g-recaptcha" data-sitekey="6LdERvwUAAAAAAuwLe3VqvypgE7p9w_az7Hd3BHn"></div>
                </div> -->
                <div class="form-group text-center">
                  <input type="submit" name="submit" value="Sign in" class="btn-login btn btn-primary btn-block">
				  <p><a href="forgot.php" class="btn btn-default btn-block">Forgot Password?</a></p>
				  <!--<p>Not registered? <a href="register.php" style="color:#054183;">Register now</a></p>-->
                </div>
                <div class="form-group text-center">
                 
				
				  <p><a href="register.php" style="color:#fff;float:left;" class="btn btn-default">Register</a></p>
				  <p><a href="../index.php" style="color:#fff;float:right;" class="btn btn-default">Home Page</a></p>
                </div>
              </form>
            </div>
          </section>
        </div>
        
      </main> <!-- /playground -->
      <script type="text/javascript" src="js/sha256.js"></script> 
                  <script type="text/javascript">
                    // form validation 
                     function validateForm(thisform){
                        
                        // check usernmae
                        if(thisform.username.value == ''){
                            alert("Please enter your username");
                            thisform.username.value.focus();
                            return false;
                        }
                        // check password
                        if(thisform.password.value == ''){
                            alert("Please enter your password");
                            thisform.password.value.focus();
                            return false;
                        }
                             var cd = thisform.randm.value;  
                             var abc=thisform.password.value;                            
                             var abc= sha256(abc);                          
                             var abc = abc+cd;                                                   
                             thisform.password.value=sha256(abc);
                             thisform.randm.value='';
                        return true;
                    }
                  </script>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.11.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/jquery.animsition.min.js"></script>
      <script src="js/login.js"></script>
      <script src="js/particles.js"></script>
      <script src="js/app.js"></script>


      <script>
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
          stats.begin();
          stats.end();
          if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
          }
          requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
      </script>
    </div>
  </body>
</html>