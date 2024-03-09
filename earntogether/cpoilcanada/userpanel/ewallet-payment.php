<?php include("../lib/config.php");
$_SESSION['rand_no'] = mt_rand(1111111,9999999);
$_SESSION['page_url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// create rand no for password salt
$_SESSION['salt'] = mt_rand(1111,9999);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coin Traders Club International Ewallet Payment</title>

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
              <h2>Pay Via Sponsor Ewallet</h2>
            </header>
            <div class="panel-body">
              <form action="../post-action.php" method="post">
                <input name="action" type="hidden" value="CheckUserEwalletBalance" />
                  <input name="totalamount" type="hidden" value="<?php echo $_SESSION['amount'];?>" />
                  <input type="hidden" name="payment_method" value="Ewallet"  required >
                 <?php @$msg=$_GET['msg'];?>
                  <?php if($_GET['msg']!='') { ?> <span style="color:#F00; font-size:14px; font-weight:bold; text-align:center;"> <?php $my_str=$_GET['msg'];echo urldecode($my_str); print_r("<br/>"); ?> </span><br/><?php } ?>
                <div class="form-group">
                  <label for="username">Sponsor Username / User Id</label>
                  <input type="text" class="form-control" id="username" placeholder="Username"  name="pay_username" required>
                </div>

                <div class="form-group">
                  <label for="password">Sponsor Transaction Password</label> 
                  <input type="password" class="form-control" id="password" placeholder="Password" name="pay_password"  required>
                </div>
                
                <div class="form-group text-center">
                  <input type="submit" name="submit" value="Pay" class="btn-login btn btn-primary">
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