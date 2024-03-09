<?php
include('../lib/config.php');
if ($_GET['id']!='' && $_GET['user']!='') {
mysqli_query($GLOBALS["___mysqli_ston"], "update withdraw_request set status='0' where id='".$_GET['id']."' and user_id='".$_GET['user']."'");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto Trade Crypto Confirmation</title>

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
          <section class="panel" style="width:700px !important">
            <header class="panel-heading">
             <div class="main__logo"><span class="textIN">AUTO TRADE CRYPTO </span><sup class="textBeta">βeta</sup></div>
              <p>Requested Successfull</p>
            </header>
            <div class="panel-body">
             <h2>Your Request Successfully registered.</h2>
              <hr>
              <div class="register-now">
                Login here? <a href="http://autotradecrypto.club/signin.php">Login</a>
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

    </div>
  </body>
</html>

