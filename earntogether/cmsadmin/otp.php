<?php
include("../lib/config.php");
$_SESSION['rand_no'] = mt_rand(1111111,9999999);
$_SESSION['page_url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// create rand no for password salt
$_SESSION['salt'] = mt_rand(1111,9999);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Template">
    <meta name="keywords" content="admin dashboard, admin, flat, flat ui, ui kit, app, web app, responsive">
    <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
    <title>Welcome To Farex Star</title>

    <!-- Base Styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

    function refreshCaptcha()
    {
     var img = document.images['captchaimg'];
     img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    
    }
    </script>

    <style type="text/css">
    .login-body {
        background-image: url(./images/whitey.png);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .account-col {
        width: 382px;
        margin: 100px auto;
        text-align: center;
    }


    h2.form-heading {
        background: transparent;
        margin: 0;
        padding: 30px 15px;
        text-align: center;
        text-transform: uppercase;
        display: inline-block;
        width: 100%;
        color: #000;
        font-size: 32px;
    }
    .login-body .login-logo {
        margin: 0;
        text-align: center;
        background: #3ACEF1;
        color: #fff;
        font-size: 18px;
        text-transform: uppercase;
        display: inline-block;
        width: 100%;
        padding: 14px 0;
    }
    .around {
        border: 1px solid powderblue;
        background-color: white;
    }
    .form-signin {
        max-width: 330px;
        margin: 4px auto 50px;
    }
    .form-signin input[type="text"], .form-signin input[type="password"] {

        background: #faffbd;
        border: 1px solid rgba(158, 158, 158, 0.6);
        color: #333;

    }
    </style>


</head>

  <body class="login-body">

    <div id="particles-js"></div>

      <div class="container log-row">
        
      <div class="account-col text-center">

        <div class="around">

          <div class="login-logo">
            
            <!--<img src="../images/logo.jpg" style="width:200px;"/>-->

          </div>

      <h2 class="form-heading"> Admin Panel</h2>
        <?php if(isset($_GET['msg'])): ?>
                     <div style="padding:5px;text-align:center;font-size:18px; color:#000; font-weight:bold;"><?php echo strip_tags($_GET['msg']); ?></div>
                <?php endif; ?>
        
      
             <form  action="check-point.php" class="form-signin" id="myform" method="post">
         <input type="hidden" name="action" value="login">
                  <input type="hidden" name="token" value="<?php echo $_SESSION['rand_no']; ?>" />
              <div class="login-wrap">
                  <input type="text" class="form-control" placeholder="Enter Username" required name="username">
                  <input type="password" class="form-control" placeholder="Enter Password" name="password" required>

                   <!-- <input type="text"  placeholder="Enter the  text" name="capcha" id="capcha" required class="input-text"/>
                                                     &nbsp;<img src="../captcha/captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'> <a style="color:#0dccd7" href='javascript: refreshCaptcha(); '><br/>Reset Image</a> -->


                  <input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block" type="submit">
                
                 
              
          </form>
      </div>

      </div>

      </div>


      <!--jquery-1.10.2.min-->
      <script src="js/jquery-1.11.1.min.js"></script>
      <!--Bootstrap Js-->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jrespond..min.js"></script>
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
  </body>
</html>
