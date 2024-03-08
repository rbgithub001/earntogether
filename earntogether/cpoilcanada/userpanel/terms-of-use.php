<?php include('../lib/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BitBuxATM Terms & Conditions</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">
   
    <style type="text/css">
      .mar-t-b {
        margin-bottom: 17px;
      }
    </style>

  </head>

  <body class="login-page">
    <div class="animsition">

      <main class="register-container">

        <div class="panel-container" style="max-width: 960px !important;width: 100%;">
          <section class="panel" style="width: 100%;">
            <header class="panel-heading">
              <img src="../images/logo.png" class="big-logo" alt="SugarCrush">
              <p>Terms and Conditions</p>
            </header>
            <div class="panel-body">
              <?php
  $sql=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from contactdetail where id='16'"));
  echo $sql['description'];?>
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



    <!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>  -->
    <!-- <script type="text/javascript" src="js/calender/jquery-1.10.2.js"></script>  -->
    <script type="text/javascript" src="js/calender/jquery-ui-1.10.4.custom.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/calender/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" type="text/css" href="css/calender/jquery-ui-1.10.4.custom.min.css"/>




    </div>
  </body>
</html>