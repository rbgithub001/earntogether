<?php include("../lib/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cognisance Sciences Payment</title>

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
  </head>

  <body class="login-page">
    <div class="animsition">

      <main class="login-container">

        <div class="panel-container">
          <section class="panel">
            <header class="panel-heading">
             <img src="../images/logo.png" class="big-logo">
              <h2>Payment Option</h2>
            </header>
            <div class="panel-body">
             <form class="form-horizontal" method="post" id="customer_login" accept-charset="UTF-8" action="#">
              <div class="panel panel-default p2" style="width:280px;">
                <div class="panel-heading2" style="width:280px;">Select Payment Option</div>
                <div class="panel-body text-left">
                  <a href="ewallet-payment.php" ><img src="ewallet.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <!-- <a href="pin.php" ><img src="../images/epin.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                  <!-- <a href="pin.php"><img src="images/epin.png" width="170"></a>&nbsp;&nbsp;&nbsp;&nbsp;-->
                </div>
              </div>
            </form>
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
  </body>
</html>