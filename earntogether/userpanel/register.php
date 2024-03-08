<?php include('../lib/config.php');
if($_GET['referral']!='')
{
  $_SESSION['referral']=$_GET['referral'];
}
else
{
  $_SESSION['referral']=$_SESSION['referral'];
}

 $fquerysel=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ( user_id='".$_SESSION['referral']."' || username='".$_SESSION['referral']."'  )  "));
         
 ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript">
           
            /*function checkPasswordMatch() {
                var password = $("#txtNewPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword)
                    $("#divCheckPasswordMatch").html("Passwords do not match!");
                else
                    $("#divCheckPasswordMatch").html("Passwords match.");
            }*/

            /*function passval(){
              var password = $("#txtNewPassword").val();
               var numbers = /[0-9]/g;
               var upperCaseLetters = /[A-Z]/g;
               var lowerCaseLetters = /[a-z]/g;*/
            //if (password.match(lowerCaseLetters)) {

            //  if (password.match(upperCaseLetters)) {

            //   if (password.match(numbers)) {

            /*   if (password.length >30) {
                 $("#pass").html("password must be atleast 30 characters maximum");
              //  $("#pass").html("");
                $("#txtNewPassword").val("");
                 return false;
               }else{
                 $("#pass").html("");
                // $("#pass").html("Password Strong");

               }*/

            /* }else{
                 $("#passvalidate").html("password must be atleast one numbers");
                 $("#pass").html("");
                 return false;
             }

             }else{
                $("#passvalidate").html("password must be atleast one upper case letter");
                $("#pass").html("");
                return false;
             }

             }else{
                  $("#passvalidate").html("password must be atleast one lower case letter");
                  $("#pass").html("");
                  return false;
             }*/

            // }

            /*
               function passval(){
               var passw=  /^[A-Za-z]\w{7,14}$/;
            if(inputtxt.value.match(passw)) 
            { 
            alert('Correct, try another...')
            return true;
            }
            else
            { 
            alert('Wrong...!')
            return false;
            }
                   }*/

            /*function tpassval() {
                var password = $("#txtNewPassword1").val();
                var numbers = /[0-9]/g;
                var upperCaseLetters = /[A-Z]/g;
                var lowerCaseLetters = /[a-z]/g;
                if (password.match(lowerCaseLetters)) {

                    if (password.match(upperCaseLetters)) {

                        if (password.match(numbers)) {

                            if (password.length < ) {
                                $("#tpassvalidate").html("password must be atleast 4 characters minimum");
                                $("#tpass").html("");
                                $("#txtNewPassword1").val("");
                                return false;
                            } else {
                                $("#tpassvalidate").html("");
                                 $("#tpass").html("Password Strong");
                            }

                        } else {
                            $("#tpassvalidate").html("password must be atleast one numbers");
                            $("#tpass").html("");
                            return false;
                        }

                    } else {
                        $("#tpassvalidate").html("password must be atleast one upper case letter");
                        $("#tpass").html("");
                        return false;
                    }

                } else {
                    $("#tpassvalidate").html("password must be atleast one lower case letter");
                    $("#tpass").html("");
                    return false;
                }

            }*/
            
        </script>
        <script type="text/javascript">
            
            function checkPasswordMatch1() {
                var password1 = $("#txtNewPassword1").val();
                var confirmPassword1 = $("#txtConfirmPassword1").val();
                if (password1 != confirmPassword1)
                    $("#divCheckPasswordMatch1").html("e-Wallet Password do not match!");
                else
                    $("#divCheckPasswordMatch1").html("Passwords match.");
            }
            
        </script>
          <script type="text/javascript">
           
            function checkEmailMatch() {
                var Email = $("#Newemail").val();
                var confirmEmail = $("#txtConfirmEmail").val();
                if (Email != confirmEmail)
                    $("#divCheckEmailMatch").html("Email Id do not match!");
                else
                    $("#divCheckEmailMatch").html("");
            }
            
        </script>

        <script type="text/javascript" src="js/sha256.js"></script>
        <script type="text/javascript">
            function validates1() {
                x = document.register
                input = x.password.value
                var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{7,20}$/;
                if (!re.test(input)) {
                    alert("Error: password must be contain at least one uppercase,Lower,special char and one number,total 8 char!");
                    return false;
                } else {
                    return true
                }

                x1 = document.register
                input1 = x1.transaction_pwd.value
                if (!re.test(input1)) {
                    alert("Error: The Password and Ewallet Password must be contain at least one uppercase,Lower,special char and one number,total 8 char!");
                    return false;
                } else {
                    return true
                }
                x.password.value = sha256(input);
                x1.transaction_pwd.value = sha256(input1);
            }
        </script>
        <script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            /*$(document).ready(function() {
                $("#username").keyup(function(e) {
                    //removes spaces from username
                    $(this).val($(this).val().replace(/\s/g, ''));
                    var username = $(this).val();
                    var re = /[\'^£$%&*()}{@#~?><>,|=_+¬-]/;
                    if (re.test(username)) {
                        $("#checkuser").html('<p style="color:#FF0000">Username does not accept special character.</p>');
                        return;
                    }
                    else if (username.length < 5) {
                        $("#checkuser").html('<p style="color:#FF0000">Username should be 5 character long.</p>');
                        return;
                    }
                    else if (username.length >= 5) {
                        $("#checkuser").html('Loading...');
                        $.post('regis2.php', {
                            'username': username
                        }, function(data) {
                            $("#checkuser").html(data);
                        });
                    }
                });
            });*/

            $(document).ready(function() {
                $("#txtNewPassword").blur(function(e) {
                    //removes spaces from username
                    $(this).val($(this).val().replace(/\s/g, ''));
                    var password = $(this).val();
                    if (password.length < 1) {
                        $("#password").html('');
                        return;
                    }
                    if (password.length >= 1) {
                        // $("#chpassword").html('Loading...');
                        $.post('regis100.php', {
                            'password': password
                        }, function(data) {
                            // $("#checkuser").html(data);
                        });
                    }
                });
            });
            $(document).ready(function() {
                $("#sponsorid").blur(function(e) {

                    $(this).val($(this).val().replace(/\s/g, ''));
                    var sponsorid = $(this).val();
                    if (sponsorid.length < 1) {
                        $("#checksponser").html('');
                        return;
                    }
                    if (sponsorid.length >= 1) {

                        //$("#checksponser").html('Loading...');
                        $.post('regis3.php', {
                            'sponsorid': sponsorid
                        }, function(data) {

                            $("#checksponser").html(data);
                             $('#checksponserdiv').show();

                        });
                    }
                });
            });

            $(document).ready(function() {
                $("#masterid").blur(function(e) {
                    $(this).val($(this).val().replace(/\s/g, ''));
                    var masterid = $(this).val();
                    if (masterid.length < 1) {
                        $("#checkmaster").html('');
                        return;
                    }
                    if (masterid.length >= 1) {
                        $("#checkmaster").html('Loading...');
                        $.post('regis5.php', {
                            'masterid': masterid
                        }, function(data) {
                            $("#checkmaster").html(data);
                        });
                    }
                });
            });

            $(document).ready(function() {
                $("#placementid").blur(function(e) {

                    //removes spaces from username
                    $(this).val($(this).val().replace(/\s/g, ''));
                    var refid = $(sponsorid).val();
                    //alert(refid);
                    var placementid = $(this).val();
                    if (placementid.length < 1) {
                        $("#checkplace").html('');
                        return;
                    }

                    if (placementid.length >= 1) {
                        $("#checkplace").html('Loading...');
                        $.post('regis4.php', {
                            'placementid': placementid,
                            'refid': refid
                        }, function(data) {
                            $("#checkplace").html(data);
                        });
                    }
                });
            });

       function change(){
  var txt = "CANTHO00001";
  document.getElementById("sponsorid").value = txt;
  document.getElementById("sponsorid").readOnly = true;
}
        </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Vines Realty Afrique Limited</title>
        <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
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
    .login-page{
		background:url(images/plot-1-1.jpg) no-repeat !important;
		background-size:cover !important;
		position:relative;
		min-height:100vh;
		max-height:100%;
		overflow-x: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top:420px;
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
	  a{
		  color:#333;
	  }
	  .header{
		  position:relative;
		  z-index:99;
	  }
	  
	  /*.input-group{*/
	  /*    position:relative;*/
	  /*    background:;*/
	  /*}*/
    </style>
        <style type="text/css">
            .logo_heading{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .eye-relative{
                position:relative;
                /*background:green;*/
            }
            .eye-relative .eye-absolute{
            position: absolute;
            z-index: 100;
            top: 6px;
            right: 10px;
            }
            
        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body class="login-page authentication-bg" onload="loadStatesByCountry()">

        <div id="particles-js"></div>
        <div class="">
			<div class="clearfix"></div>
            <div class="container" style="max-width: 800px !important;width: 100%;">
                <main class="login-container">
                    <div class="panel-container">
                        <section class="panel" style="width: 100%;max-width:100%;">
                            <header class="panel-heading logo_heading">
                                <div class="main__logo">
                                  <img src="images/logo.png">
                                </div> 
                                <h3 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">NEW REGISTRATION</h3>
                            </header>
                            <div class="panel-body">
                            <form name="registration" method="post" method="post" action="../post-action.php" id="registration" autocomplete='off'>
                                <input type="hidden" name="action" value="UserRegistration">
                                <?php @$msg=$_SESSION['err'];if($msg!='') { ?>
                                <div class="reg-header">
                                    <p style="color:#F00; text-align:center;"><br/>
                                    <span style="color:red; text-align:center; font-weight:bold; font-size:15px;">
                                        <?php if($msg=='ist') { echo "Register Successfully..! Please Check Your Email."; } else if($msg=='username') {  echo "Username Already Exists";} else if($msg=='sponsor') {  echo "Sponsor Not Exists or Wrong platform choosen by you";}  else if($msg=='email') { echo "Email Already Exists";}  else if($msg=='username1') { echo "Please Enter Username";} else if($msg=='platform') { echo "Please Select Package";} else if($msg=='position') { echo "Please Select Position"; } else { echo $_SESSION['err'];} $_SESSION['err']='';?>
                                    </span>
                                    </p>
                                    </div>
        <?php } ?>

        <?php
        if(!empty($_GET['msg'])){ ?>
          <div class="reg-header">
            <p style="color:#F00; text-align:center;">
                <br/><span style="color:#F00; text-align:center; font-weight:bold;">
                      <?php if($_GET['msg']!='') {  echo urldecode($_GET['msg']); } ?><br/>
                </span></p> 
        </div>
        <?php }    ?>
            <div class="text-left">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12"><label>Referral Information</label></div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                  <input type="text" class="form-control" name="sponsorid" autocomplete="off" placeholder="Please Enter Referral ID / Username" id="sponsorid" value="<?php if($_SESSION['referral']!='') { echo $_SESSION['referral']; } else {} ?>"    required>
                      <!--<input type="text" class="form-control" placeholder="Referral ID" name="sponsorid" onblur="checkuser(this.value)" autocomplete="off" placeholder="Please Enter Referral ID / Username" id="sponsorid" title="Sponsor name" value="<?php // if($_SESSION['referral']!='') { echo $_SESSION['referral']; } else {} ?>" <?php // if($_SESSION[ 'referral']!='' ) { ?> readonly-->
                      <!--<input type="text" class="form-control" placeholder="Referral ID" name="sponsorid" autocomplete="off" placeholder="Please Enter Referral ID / Username" id="sponsorid" title="Sponsor name" value="<?php if($_SESSION['referral']!='') { echo $_SESSION['referral']; } else {} ?>" <?php if($_SESSION[ 'referral']!='' ) { ?> readonly   <?php } ?> required>-->
                         <!--  <span id="checksponser"></span> -->
                  </div>
                 <div class="col-md-6" style="display:none;">
					<div class="form-group text-left">
					    <select class="form-control" name="rank" id="rank">
							<option value="">Select Rank</option> 
						    <?php 
						     $rrnk= $fquerysel['rank'];
						     $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id>'$rrnk'    ");
										  while($queryf1=mysqli_fetch_array($fquery)) {
										      
										  ?>
										  <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?> </option>
										  <?php } ?>
						</select>
																			<!--<span id="plt"></span>-->
					</div> 
				</div>
					<div class="col-sm-6" style="display: none;color: #7ebdca;" id="checksponserdiv">
                       <div class="col-sm-12" id="checksponser" style="border-radius: 5px;height: 36px; width: 100%;">
                           <!--background-color: #757166;border: 1px solid #aea6a1;-->
                       </div>
                  </div>				
									
 <div class="col-sm-4">
  <!--<button onclick="change()" class="btn btn-primary btn-lg">GET SPONSOR</button>-->
                  
                  </div>

                  
                </div>
              </div>

              <div class="form-group" >
                <div class="row">
                  
                </div>
              </div>



              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                      <label>Create Login Information</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                      <input class="form-control" placeholder="Enter Username" name="username" required id="username" type="text">
                      <span id="checkuser"></span>
                      <span id="checkuser1"></span>
                  </div>
                </div>
              </div>
              
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="eye-relative">
                            <div class="input-group" style=" display: flex; flex-wrap: wrap;">
                                <!--<input class="form-control" placeholder="Enter Password" type="password" name="password" required id="txtNewPassword" onkeyup="passval();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">-->
                                <input class="form-control" placeholder="Enter Password" type="password" name="password" required id="txtNewPassword" value="">
                                <!--<div class="input-group-append">-->
                                    <span class="input-group-text eye-absolute">
                                        <i class="fa fa-fw fa-eye" id="togglePassword"></i>
                                    </span>
                                <!--</div>-->
                            </div>
                            <div class="registrationFormAlert" id="passvalidate" style="font-size:14px;color:#f00;"></div>
                            <div id="pass" style="font-size:14px;color:#009999;"></div>
                        </div>
                        </div>
                
                        <div class="col-sm-6">
                            <div class="eye-relative">
                            <div class="input-group" style=" display: flex; flex-wrap: wrap;">
                                <!--<input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();">-->
                                <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" id="txtConfirmPassword">
                                <div class="input-group-append">
                                    <span class="input-group-text eye-absolute">
                                        <i class="fa fa-fw fa-eye" id="toggleConfirmPassword"></i>
                                    </span>
                                </div>
                            </div>
                            </div>
                            <span id="cpcheck"></span>
                            <div class="registrationFormAlert" id="divCheckPasswordMatch" style="font-size:16px;color:#009999;"></div>
                        </div>
                    </div>
                </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12" style="display: none;">
                    <input class="form-control" placeholder="Confirm Transaction Password" type="password" name="transaction_pwd1" id="txtConfirmPassword1" onkeyup="checkPasswordMatch1();">
                      <div class="registrationFormAlert" id="divCheckPasswordMatch1" style="font-size:16px;color:#009999;"></div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                      <label>Personal Information</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                      <input class="form-control" placeholder="Please enter your First name" name="firstname" type="text" id="firstname" required>
                      <span id="fnm"></span>
                  </div>

                  <div class="col-sm-6">
                      <input class="form-control" placeholder="Please enter your last name" type="text" name="lastname" id="lastname" required>
                      <span id="lnm"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                      <input class="form-control" placeholder="Please enter a valid email address" type="email" name="email" id="Newemail" required>
                      <span id="eml"></span>
                  </div>

                  <div class="col-sm-6">
                      <input class="form-control" placeholder="Confirm email address" type="email" name="confirm_email" id="txtConfirmEmail" onkeyup="checkEmailMatch();" required>
                      <span id="ceml"></span>
                      <div class="registrationFormAlert" id="divCheckEmailMatch" style="font-size:14px;color:#f00;"></div>
                  </div>
                </div>
              </div>
              
              
              <div class="form-group">
                  <div class="row" style="display:none">
                     <!-- <div class="col-sm-6">
                          
                           <div class="form-group">
                                <label for="exampleFormControlSelect1"> Designation</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Customer</option>
                                  <option>Assistant manager</option>
                                  <option>Marketing manager</option>
                                  <option>Chief marketing manager</option>
                                  <option>Sub regional head</option>
                                  <option>Regional head </option>
                                </select>
                              </div>
                      </div>-->
                                    <div class="col-md-6">
                                            <label for="validationServer03" class="form-label">Amount </label>
                                            <input type="text" class="form-control is-invalid" name="amount" id="amount" aria-describedby="validationServer03Feedback"  placeholder="(1000 to 10 lakhs)">
                                            <div id="validationServer03Feedback" class="invalid-feedback"></div>
                                        </div>
                                      </div>
                                  </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <select class="form-control" name="country" id="country"  required>
                                <?php 
                                 $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM country");
                                while($cnrty = mysqli_fetch_array($resos2))
                                {
                                    $selected = ($cnrty['name'] == 'Nigeria') ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $cnrty['id']?>" data="<?php echo $cnrty['phonecode'] ?>" <?php if($cnrty['id']=='160'){echo'selected';}else{}?>> <?php echo $cnrty['name']?>(<?php echo $cnrty['phonecode']?>)</option>
                                <?php }?>
                            </select>
                            <span id="cntry"></span>
                          </div>
                  
                   <div class="col-sm-2">
                      <!-- <select class="form-control" name="phonecode" id="phonecode" required>
                        <option value="">--select country code--</option>-->
                        <?php 
                        // $phonecodes=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `country`");
                       // while($phonecodess = mysqli_fetch_array($phonecodes)){ ?>
                           <!-- <option value="<?php echo $cnrty['phonecode']?>"><?php echo $cnrty['name']?>(<?php echo $cnrty['phonecode']?>)</option>-->
                        <?php //}
                        ?>
                      <!-- </select>
                       <span id="phncd"></span>-->
                         <input type="text" name="phonecode" id="phonecode" class="form-control" value="234" required readonly>
                       
                  </div>
                   <div class="col-sm-4">
                      <!--<input class="form-control" placeholder="Please enter a valid mobile number" type="number" id="number" name="mobile" required>-->
                      <input class="form-control" placeholder="Please enter a valid mobile number" type="number" id="number" name="mobile" oninput="validateMobileNumber()" required>
                      <span id="mbl"></span>
                  </div>
                </div>
              </div>

             <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                      <!--<input type="text" class="form-control" placeholder="Enter State" name="state" id="state" required>-->
                      <select class="form-control" name="state" id="state"  required>
                        <option value="">Please select state</option>
                    </select>

                  </div>

                  <div class="col-sm-6">
                      <input type="text" class="form-control" placeholder="Enter City" name="city" id="city" required>
                  </div>
                </div>
              </div>
               <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                      <input class="form-control" placeholder="address" type="text" required name="address" id="address">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                      <label for="term">
					  <input type="checkbox" id="term" name="term_cond" value="yes" title="Read and accept our Terms of Services" required>
					  <font class="bldf"><a href="#" target="_blank" style="color:#444;">Read & accept our Terms of Services</a></font></label>
                  </div>
                </div>
              </div>

              <!--<div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                      <label>Security</label>
                  </div>
                </div>
              </div>-->

              <!-- <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                       <input type="text" name="captcha" required class="form-control" placeholder="Enter the Captcha Code"/>
                  </div>

                  <div class="col-sm-6">
                     <img src="captcha/captcha.php?" id="captcha" style="height: 40px;">
                  </div>
                </div>
              </div>-->
              <!-- <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                        <div class="g-recaptcha" data-sitekey="6LdERvwUAAAAAAuwLe3VqvypgE7p9w_az7Hd3BHn"></div>
                  </div>

                 
                </div>
              </div> -->
<!--<div class="form-group text-left">
  <div class="g-recaptcha" data-sitekey="6LdERvwUAAAAAAuwLe3VqvypgE7p9w_az7Hd3BHn"></div>
                </div>-->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" disabled="disabled" name="submit" id="submit_button" class="btn btn-primary btn-lg">Register</button> &nbsp; 
                    <a href="login.php" class="btn btn-danger btn-lg">Cancel</a>
                  </div>
                </div>
              </div>
              <p>Already registered ? <a href="login.php" style="color:#054183;">Login now</a></p>
            </div>
            
            <!-- <div class="panel-footer2 text-right"><a href="#" class="btn btn-primary btn-lg" style="padding-right:25px;">Continue</a></div>-->

            <script type="text/javascript" src="js/sha256.js"></script>

            </div>
            <script>
                // Toggle password visibility for New Password
                    document.getElementById("togglePassword").addEventListener("click", function () {
                        togglePasswordVisibility("txtNewPassword");
                    });
            
                // Toggle password visibility for Confirm Password
                    document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
                        togglePasswordVisibility("txtConfirmPassword");
                    });
            
                function togglePasswordVisibility(inputId) {
                    var passwordInput = document.getElementById(inputId);
                    var icon = document.getElementById("toggle" + inputId);
            
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    } else {
                        passwordInput.type = "password";
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    }
                }
            </script>
            
            <script>
                function hash() {

                    var password = document.registration.txtNewPassword.value;
                    var confirm_password = document.registration.txtConfirmPassword.value;
                    var transaction_pwd1 = document.registration.txtNewPassword1.value;
                    var transaction_pwd = document.registration.txtConfirmPassword1.value;

                    document.registration.txtNewPassword.value = sha256(password);
                    document.registration.txtConfirmPassword.value = sha256(confirm_password);
                    document.registration.txtNewPassword1.value = sha256(transaction_pwd1);
                    document.registration.txtConfirmPassword1.value = sha256(transaction_pwd);

                }
            </script>
            <!-- <div class="form-group text-center">
                  <a href="#" class="btn-login btn btn-primary">Register</a> 
                  <a href="login.html" class="btn-login btn btn-danger">Cancel</a>
                </div> -->
</form>

                    </div>
                    </section>
            </div>
            </main>
            <!-- /playground -->

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.animsition.min.js"></script>
        <script src="js/login.js"></script>

        </div>
        <script>
            /*$(document).ready(function() {
                $("#txtNewPassword").keyup(function() {
                    $("#pass").html("Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
                });
            });*/
        </script>
        <script src="js/particles.js"></script>
        <script src="js/app.js"></script>
        <script src="js/jquery.flagstrap.js"></script>
        <script>
    $('#basic').flagStrap();

    $('#origin').flagStrap({
        placeholder: {
            value: "",
            text: "Country of origin"
        }
    });

    $('#options').flagStrap({
        countries: {
            "AU": "Australia",
            "GB": "United Kingdom",
            "US": "United States"
        },
        buttonSize: "btn-sm",
        buttonType: "btn-info",
        labelMargin: "10px",
        scrollable: false,
        scrollableHeight: "350px"
    });

    $('#advanced').flagStrap({
        buttonSize: "btn-lg",
        buttonType: "btn-primary",
        labelMargin: "20px",
        scrollable: false,
        scrollableHeight: "350px",
        onSelect: function (value, element) {
            alert(value);
            console.log(element);
        }
    });

</script>
        


<script type="text/javascript">
$(document).ready(function(){
$("#country").on('change',function(e) {
var value =$(this).find(':selected').attr('data');
//$('#phonecode').html("<option value="+value+">"+value+"</option>");
document.getElementById("phonecode").value = value;
});
});
</script>

    <script>
        (function() {
            $('#registration .form-control').change(function() {
                var empty = false;
                $('#registration .form-control').each(function() {
                    if ($(this).val() == '') {
                        empty = true;
                    }
                });
                
                
              //  $(document).ready(function() {
              //  $("#username").keyup(function(e) {
                if($('#registration #username').val()!=''){
                //var inputvalues = $('#regist #username').val();
                var namereg1 = /^[A-Za-z\-\s]+$/;
                
                //removes spaces from username
                    $('#registration #username').val($('#registration #username').val().replace(/\s/g, ''));
                    var username = $('#registration #username').val();
                    if (username.length < 1) {
                        $("#checkuser").html('');
                        //return;
                        empty9 = true;
                    }
                    if (username.length >= 1) {
                        //alert(username);
                        $("#checkuser").html('Loading...');
                        $.post('regis2.php', {
                            'username': username
                        }, function(data) {
                           
                            if(data==1){
                                $("#checkuser").html("Username Already Exists !");
                                //alert("One");
                                document.getElementById("checkuser").style.color = 'red';
                                empty9 = true;
                            }else if(data==2){
                                  $("#checkuser").html("Congrats User Name Available !");
                                document.getElementById("checkuser").style.color = 'green';
                                 empty9 = false;
                            }
                        });
                       
                    }
                
                   }else{
                               // document.getElementById("checkuser").style.color = 'red';
                                empty9 = true;
                  }
                
               // });
          //  });
                
                if($('#registration #platform').val()!=''){
                    var inpassword = $('#registration #platform').val();
                   
    		        if(inpassword=='') {
    		            empty1=true;
    		            message = "<span style='color:red'>Please choose package.</span>";
                        $('#plt').html(message);
    		        }else{
                        empty1=false;
                        message='';
                        $('#plt').html(message);
    		        }
                }else{
                    empty1=true;
                }
                
                /*if($('#registration #username').val()!=''){
                    var username1 = $('#registration #username').val();
                   
    		        if(username1=='') {
    		            empty2=true;
    		            message = "<span style='color:red'>Username should not be empty!!</span>";
                        $('#checkuser1').html(message);
    		        }else{
                        empty2=false;
                        message='';
                        $('#checkuser1').html(message);
    		        }
                }else{
                    empty2=true;
                }*/
                
                /*if($('#txtNewPassword').val()!=''){
                    var inpassword = $('#txtNewPassword').val();
                    var regpass = /^(?=.*[0-9])(?=.*[a-z])[a-zA-Z0-9]{8,16}$/;
    		        if(!regpass.test(inpassword)) {
    		            empty3=true;
    		            message = "<span style='color:red'>Please ensure your password is more than 8  character long and contain only numbers and letters.</span>";
                        $('#passvalidate').html(message);
    		        }else{
                        empty3=false;
                        message='';
                        $('#passvalidate').html(message);
    		        }
                }else{
                    empty3=true;
                }*/
                
                
                if($('#txtConfirmPassword').val()!=''){
                    var inpasswor = $('#txtNewPassword').val();
                    var inpasswordd = $('#txtConfirmPassword').val();
        
                    if(inpasswor != inpasswordd) {
                        empty4 = true;
                        message = "<span style='color:red'>Password do not match.</span>";
                        $('#cpcheck').html(message);
                    }else{
                        empty4 = false;
                        message = "<span style='color:green'>Password match.</span>";
                        $('#cpcheck').html(message);
                    }
                }else{
                    empty4 = true;
                    message = "";
                    $('#cpcheck').html(message);
                }
    
                if($('#firstname').val()!=''){
                    var inputvalues = $('#firstname').val();
                    var namereg1 = /^[A-Za-z\-\s]+$/;
    		        if(!namereg1.test(inputvalues)) {
    		            empty5 = true
                        message = "<span style='color:red'>You have entered an invalid name format, please ensure use only letters (a-z).</span>";
                        $('#fnm').html(message);
                    }
                    else{
                        empty5 = false;
                        message='';
                        $('#fnm').html(message);
                    }
                }else{
                    empty5 = true;
                }
                
                if($('#lastname').val()!=''){
                    var inputvalues1 = $('#lastname').val();
                    var namereg13 = /^[A-Za-z\-\s]+$/;
    		        if(!namereg13.test(inputvalues1)) {
    		            empty6 = true
                        message = "<span style='color:red'>You have entered an invalid name format, please ensure use only letters (a-z).</span>";
                        $('#lnm').html(message);
                    }
                    else{
                        empty6 = false;
                        message='';
                        $('#lnm').html(message);
                    }
                }else{
                    empty6 = true;
                }
    
                /*if($('#regist #birth_date').val()){
                    var dob = $('#regist #birth_date').val();
                    
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    today = yyyy + '-' + mm + '-' + dd;
                    
                    var date1 = today.split("-");
                    var date2 = dob.split("-");
    
                    var year1 = date1[0];
                    var year2 = date2[0];
                    
                    var yearsd = year1 - year2;
                    if(yearsd < 18){
                        empty4 = true;
                        message = '<span style="color:red"> You are not in the legal age to proceed with the registration.</span>';
                        $('#age').html(message); 
                    }else{
                        empty4 = false;
                        $('#age').html(''); 
                    }
                    
                }else{
                    empty4 = true;
                    message = '';
                    
                }*/
                
                if($('#number').val()!=''){
                    var phonen = $('#number').val();
                    cou = phonen.length;
                    var phonereg = /^[0-9+]+$/;
    		        if(!phonereg.test(phonen) || cou < 9) {
    		            empty7 = true;
    		            message = '<span style="color:#f00;">Please enter 9 digit numeric phone number';
    		            $('#mbl').html(message);
    		        }else{
    		            empty7=false;
    		            message = '';
                        $('#mbl').html(message);
    		        }
                    
                }else{
                    empty7 = true;
                    message = '';
                    $('#mbl').html(message);
                }
                
                if($('#Newemail').val() != ''){
                    email = $('#Newemail').val();
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    		        if(!regex.test(email)) {
                        empty8 = true;
                        message = "<span style='color:red'>You have entered an invalid email address. Please try again.</span>";
                        $('#eml').html(message);
                    }else{
                        empty8 = false;
                        message = "";
                        $('#eml').html(message);
                    }
                }else{
                    empty8 = true;
                    message = "";
                    $('#eml').html(message);
                }
                
                if(empty4==false && empty5==false && empty6==false && empty7==false && empty8==false && empty9==false) {
                    $('#submit_button').removeAttr('disabled');
                }
                else{
                    $('#submit_button').attr('disabled', 'disabled');
                }
            });
        })()
    									        
    </script>
    
    <!--State Fetch Script-->
    
<script>
$(document).ready(function() {
   $('#main_country').on('change', function() {
      var state_id = this.value;
      $.ajax({
         url: "../state-by-country-id.php",
         type: "POST",
         data: {
            state_id: state_id
         },
         cache: false,
         success: function(result){
            $("#main_state").html(result);
         }
      });
   });    

});


$(document).ready(function() {
   $('#country').on('change', function() {
      var state_id = this.value;
      $.ajax({
         url: "../state-by-country.php",
         type: "POST",
         data: {
            state_id: state_id
         },
         cache: false,
         success: function(result){
            $("#state").html(result);
         }
      });
   });    

});

function loadStatesByCountry() {
    var stateId =160;
    $.ajax({
        url: "../state-by-country.php",
        type: "POST",
        data: {
            state_id: stateId
        },
        cache: false,
        success: function(result) {
            $("#state").html(result);
        }
    });
}

</script>
    
    <!--Mobile Number Length Set Script-->
    
    <script>
    function validateMobileNumber() {
        var input = document.getElementById('number');
        var maxLength = 9;

        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }
</script>
    </body>

    </html>