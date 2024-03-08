<?php include('../lib/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
  <script type="text/javascript"><!--
    function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();
    if (password != confirmPassword)
    $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
    $("#divCheckPasswordMatch").html("Passwords match.");
    }
    //--></script>
    <script type="text/javascript"><!--
    function checkPasswordMatch1() {
    var password1 = $("#txtNewPassword1").val();
    var confirmPassword1 = $("#txtConfirmPassword1").val();
    if (password1 != confirmPassword1)
    $("#divCheckPasswordMatch1").html("e-Wallet Password do not match!");
    else
    $("#divCheckPasswordMatch1").html("Passwords match.");
    }
  //--></script>

  <script type="text/javascript">
    function validates1(){
    x=document.register
    input=x.password.value
    if (input.length<6){
    alert("The Password and Ewallet Password cannot contain less than 6 characters and more than 12 characters!")
    return false
    }else {
    return true
    }

    x1=document.register
    input1=x1.transaction_pwd.value
    if (input1.length<6){
    alert("The Password and Ewallet Password cannot contain less than 6 characters and more than 12 characters!")
    return false
    }else {
    return true
    }
    }
  </script>
  <script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#username").keyup(function (e) {
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var username = $(this).val();
    if(username.length < 1){$("#checkuser").html('');return;}
    if(username.length >= 1){
    $("#checkuser").html('<img src="images/preloader.gif" />');
    $.post('regis2.php', {'username':username}, function(data) {
    $("#checkuser").html(data);
    });
    }
    }); 
    });
    $(document).ready(function() {
    $("#sponsorid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var sponsorid = $(this).val();
    if(sponsorid.length < 1){$("#checksponser").html('');return;}
    if(sponsorid.length >= 1){
    $("#checksponser").html('<img src="images/preloader.gif" />');
    $.post('regis3.php', {'sponsorid':sponsorid}, function(data) {
    $("#checksponser").html(data);
    });
    }
    }); 
    });

    $(document).ready(function() {
    $("#masterid").blur(function (e) {
    $(this).val($(this).val().replace(/\s/g, ''));
    var masterid = $(this).val();
    if(masterid.length < 1){$("#checkmaster").html('');return;}
    if(masterid.length >= 1){
    $("#checkmaster").html('<img src="images/preloader.gif" />');
    $.post('regis5.php', {'masterid':masterid}, function(data) {
    $("#checkmaster").html(data);
    });
    }
    }); 
    });

    $(document).ready(function() {
    $("#placementid").blur(function (e) {

    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var refid = $(sponsorid).val();
    //alert(refid);
    var placementid = $(this).val();
    if(placementid.length < 1){$("#checkplace").html('');return;}

    if(placementid.length >= 1){
    $("#checkplace").html('<img src="images/preloader.gif" />');
    $.post('regis4.php', {'placementid':placementid,'refid':refid}, function(data) {
    $("#checkplace").html(data);
    });
    }
    }); 
    });
  </script> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitcash Connect Registration</title>

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
      .mar-t-b {
        margin-bottom: 17px;
      }
      html{
        background:#fff;
      }
      .login-page{
        background:#fff;
      }
      .nrd{
        border:1px solid #ccc;
        border-radius:10px;
        -moz-border-radius:10px;
        -webkit-border-radius:10px;
        -o-border-radius:10px;
        margin:50px auto;
        padding:30px 0 0 10px;
      }
      .lgo{
        max-width:360px;
        margin:0 auto;
      }
      .pad-left-0{
        padding-left:0;
      }
      .pad-right-0{
        padding-right:0;
      }
      .input-left {
        border-radius: 0 .25em .25em 0 !important;
      }
      .input-right {
        border-radius: .25em 0 0 .25em !important;
        border-right: 0 !important;
      }
      .form-control{
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        color: #555;
        display: block;
        font-size: 14px;
        height: 48px;
        line-height: 1.42857;
        padding: 10px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100%;
      }
      @media (max-width:950px){
        .pad-left-0{
          padding-left: 10px;
          padding-right: 15px;
        }
        .pad-right-0{
          padding-right:15px;
        }
        .input-left {
          border-radius: 4px !important;
          border-right: 1px solid #ccc;
        }
        .input-right {
          border-radius: 4px !important;
          border-right: 1px solid #ccc !important;
        }
      }
    </style>
  </head>

  <body class="login-page">

    <div class="col-md-5 col-sm-7 col-xs-10 center-block nrd" style="float:none;">

      <img src="../images/logo3.png" class="img-responsive lgo" alt="" />

      <div class="panel-body">

        <h2 class="text-center">Registration</h2>

          <form name="registration" method="post"  method="post" action="../post-action.php"  onsubmit="return validates1()" >
               
            <div class="panel-body text-left">

              <div class="col-sm-12 mar-t-b">
                <input type="text" class="form-control" placeholder="Name" />
              </div>

              <div class="col-sm-12 mar-t-b">
                <input type="text" class="form-control" placeholder="Email" />
              </div>

              <div class="col-sm-12 mar-t-b">
                <input type="text" class="form-control" placeholder="Username" />
              </div>

              <div class="col-sm-6 mar-t-b pad-right-0">
                <input type="text" class="form-control input-right" placeholder="Password" />
              </div>

              <div class="col-sm-6 mar-t-b pad-left-0">
                <input type="text" class="form-control input-left" placeholder="Confirm Password" />
              </div>
              

                <!-- <div class="col-sm-12 mar-t-b">

                  <input type="radio" name="term_cond" required> <font class="bldf"><a href="terms-of-use.php" target="_blank">I Read Terms &amp; Conditions</a></font>
                
                </div> -->


                <div class="col-sm-12 mar-t-b">

                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign Up Now" />
                
                </div>                
                                                  
                </form>
                
                <div class="register-now">
                  Already a user? <a href="login.php">Sign in</a>
                </div>
            </div>
          </div>
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