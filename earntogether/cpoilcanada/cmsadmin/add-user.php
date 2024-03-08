<?php
   include("../lib/config.php");
   // manage secure login of user account
   if(!isset($_SESSION['token_id'])){
     header("Location:login.php");
   }
   else if(isset($_SESSION['token_id'])){
     if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
       header("Location:login.php");
     }
     
     else{
     
       $condition = " where user_id ='".$_SESSION['user_id']."'";
       $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
     }
   }
   // store random no for security
   $_SESSION['rand'] = mt_rand(1111111,9999999); 
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("header.php");?>
      <!--easy pie chart-->
      <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
      <!--vector maps -->
      <link rel="stylesheet" href="css/jquery-jvectormap-1.1.1.css">
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
      <!--switchery-->
      <link href="css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
      <!--jquery-ui-->
      <link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />
      <!--iCheck-->
      <link href="css/all.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <!--common style-->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="sticky-header">
      <section>
         <!-- sidebar left start-->
         <?php include("sidebar.php");?>
         <!-- sidebar left end-->
         <!-- body content start-->
         <div class="body-content" style="min-height: 1000px;">
            <!-- header section start-->
            <?php include("top-menu.php");?>
            <!-- header section end-->
            <!-- page head start-->
            <div class="page-head">
               <h3 class="m-b-less">
                  Dashboard
               </h3>
               <!--<span class="sub-title">Welcome to Static Table</span>-->
               <?php include("top-menu1.php");?>
               <!-- page head end-->
               <!--body wrapper start-->
               <div class="wrapper">
                  <div class="row">
                     <div class="col-lg-6">
                        <section class="panel">
                           <header class="panel-heading">
                              Add member <span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                           </header>
                           <div class="panel-body">
                              <form name="registration" method="post" method="post" action="../post-action.php" id="registration" autocomplete='off'>
                                 <input type="hidden" name="action" value="UserRegistration_admin">
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
                                       </span>
                                    </p>
                                 </div>
                                 <?php }    ?>
                                 <div class="text-left">
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-12"><label>Sponsor Information</label></div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <!--<input type="text" class="form-control" placeholder="Sponsor Id" name="sponsorid" onblur="checkuser(this.value)" autocomplete="off" placeholder="Please Enter Sponsor Id / Username" id="sponsorid" title="Sponsor name" value="<?php // if($_SESSION['referral']!='') { echo $_SESSION['referral']; } else {} ?>" <?php // if($_SESSION[ 'referral']!='' ) { ?> readonly-->
                                             <input type="text" class="form-control" placeholder="Sponsor Id" name="sponsorid" autocomplete="off" placeholder="Please Enter Sponsor Id / Username" id="sponsorid" title="Sponsor name" required>
                                             <span id="checksponser" style="color:blue"></span> 
                                          </div>
                                          
                                          <!--<div class="col-sm-4">-->
                                          <!--<button onclick="change()" class="btn btn-primary btn-lg">GET SPONSOR</button>-->
                                          <!--</div>-->
                                       </div>
                                    </div>
                                    <!--<div class="form-group" style="display: none;color: #7ebdca;" id="checksponserdiv">-->
                                    <!--  <div class="row">-->
                                    <!--    <div class="col-sm-12">-->
                                    <!--         <div class="col-sm-6" id="checksponser" style="border-radius: 5px;height: 36px; width: 100%;">-->
                                    <!--background-color: #757166;border: 1px solid #aea6a1;-->
                                    <!--         </div>-->
                                    <!--    </div>-->
                                    <!--  </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                    <!--  <div class="row">-->
                                    <!--    <div class="col-md-12">-->
                                    <!--        <label>Create Login Information</label>-->
                                    <!--    </div>-->
                                    <!--  </div>-->
                                    <!--</div>-->
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <label>Personal Information</label>
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
                                          <div class="col-sm-6">
                                            
                                             
                                              <select class="form-control" name="newrank" id="newrank" required>
                                             		<option>Select  Rank</option> 
                                                    <?php 
                                                $fqueryq=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list order by id asc  ");
                                                while($queryf1q=mysqli_fetch_array($fqueryq)) {
                                                ?>
                                             	  <option value="<?php echo $queryf1q['id'];?>"><?php echo $queryf1q['name'];?></option>
                                             	  <?php } ?>
                                             	  </select>
                                             
                                          </div>
                                          <div class="col-sm-6">
                                             <select class="form-control" name="genealogy" id="genealogy" onchange="showSenderInput(this);">
                                                <option value="">Select Genealogy</option>
                                                <option value="2">Direct</option>
                                             </select>
                                          </div>
                                          
                                          <div class="col-sm-6" style="display: none;" id=senderUserId>
                                             <input class="form-control" placeholder="Sender User Id" type="text" name="sender_userid" id="sender_userid">
                                             <div class="registrationFormAlert" id="" style="font-size:16px;color:#009999;"></div>
                                              <span id="checksponser2" style="color:blue"></span> 
                                          </div>
                                          <!-- <div class="col-md-6">
                                             <div class="form-group text-left">
                                               
                                             	  <span id="plt"></span>
                                             	  </div> 
                                             	  </div>-->
                                          <div class="col-sm-12">
                                            
                                              <select class="form-control" name="amount" id="amount" required>
                                             		<option>Select Registration Package</option> 
                                                    <?php 
                                                $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from package order by id asc  ");
                                                while($queryf1=mysqli_fetch_array($fquery)) {
                                                ?>
                                             	  <option value="<?php echo $queryf1['id'];?>"><?php echo 'Tulsi Aaradhya &nbsp; '.$queryf1['name'];?> (<?php echo $queryf1['max'];?>)</option>
                                             	  <?php } ?>
                                             	  </select>
                                             
                                             <!--<input type="text" class="form-control is-invalid" name="amount" id="amount"  aria-describedby="validationServer03Feedback" required placeholder="(1000 to 10 lakhs)">-->
                                             <div id="validationServer03Feedback" class="invalid-feedback">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <!--<input class="form-control" placeholder="Enter Password" type="password" name="password" required id="txtNewPassword" onkeyup="passval();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">-->
                                             <input class="form-control" placeholder="Enter Password" type="password" name="password" required id="txtNewPassword" value="">
                                             <div class="registrationFormAlert" id="passvalidate" style="font-size:14px;color:#f00;"></div>
                                             <div id="pass" style="font-size:14px;color:#009999;"></div>
                                          </div>
                                          <div class="col-sm-6">
                                             <!--<input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();">-->
                                             <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" id="txtConfirmPassword">
                                             <span id="cpcheck"></span>
                                             <div class="registrationFormAlert" id="divCheckPasswordMatch" style="font-size:16px;color:#009999;"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--  <div class="row">-->
                                    <!--    <div class="col-sm-12" style="display: none;">-->
                                    <!--      <input class="form-control" placeholder="Confirm Transaction Password" type="password" name="transaction_pwd1" id="txtConfirmPassword1" onkeyup="checkPasswordMatch1();">-->
                                    <!--        <div class="registrationFormAlert" id="divCheckPasswordMatch1" style="font-size:16px;color:#009999;"></div>-->
                                    <!--    </div>-->
                                    <!--  </div>-->
                                    <!--</div>-->
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <input class="form-control" placeholder="Please enter your First name" name="firstname" required type="text" id="firstname">
                                             <span id="fnm"></span>
                                          </div>
                                          <div class="col-sm-6">
                                             <input class="form-control" placeholder="Please enter your last name" type="text" name="lastname" required id="lastname">
                                             <span id="lnm"></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <input class="form-control" placeholder="Please enter a valid email address" type="email" required name="email" id="Newemail">
                                             <span id="eml"></span>
                                          </div>
                                          <div class="col-sm-6">
                                             <input class="form-control" placeholder="Confirm email address" type="email" required name="confirm_email" id="txtConfirmEmail">
                                             <span id="ceml"></span>
                                             <div class="registrationFormAlert" id="divCheckEmailMatch" style="font-size:14px;color:#f00;"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-6">
                                          <!--   <input class="form-control" value="India" name="country" readonly>-->
                                           <select class="form-control" name="country" id="country"  required>
                                <?php 
                                 $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM country");
                                while($cnrty = mysqli_fetch_array($resos2))
                                {
                                   // $selected = ($cnrty['name'] == 'Nigeria') ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $cnrty['id']?>" data="<?php echo $cnrty['phonecode'] ?>" > <?php echo $cnrty['name']?>(<?php echo $cnrty['phonecode']?>)</option>
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
                                             <input type="text" name="phonecode" id="phonecode" class="form-control"  value="+91"  required readonly>
                                          </div>
                                          <div class="col-sm-4">
                                             <input class="form-control" placeholder="Enter a valid mobile number" type="number" id="number" required name="mobile">
                                             <span id="mbl"></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-6">
                                                 <select class="form-control" name="state" id="state"  required>
                        <option value="">Please select state</option>
                    </select>
                                  <!--           <select class="form-control" name="state" id="state"  required>
                                                <option value="">--Select State--</option>
                                                <?php 
                                                   $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `all_states`  ");
                                                   
                                                   while($cnrty = mysqli_fetch_array($resos2)){
                                                   
                                                   ?>
                                                <option value="<?php echo $cnrty['state_name']?>" >  <?php echo $cnrty['state_name']?></option>
                                                <?php }                      ?>
                                             </select>-->
                                          </div>
                                          <div class="col-sm-6">
                                             <input class="form-control" placeholder="Please enter city" type="text"  name="city" required>
                                             <span id="ceml"></span>
                                             <div class="registrationFormAlert" id="divCheckEmailMatch" style="font-size:14px;color:#f00;"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <input class="form-control" placeholder="Please enter address" type="text" required name="address" >
                                          </div>
                                       </div>
                                    </div>
                                    <!--       <div class="form-group">-->
                                    <!--         <div class="row">-->
                                    <!--           <div class="col-sm-12">-->
                                    <!--               <label for="term">-->
                                    <!--<input type="checkbox" id="term" name="term_cond" value="yes" title="Read and accept our Terms of Services" required>-->
                                    <!--<font class="bldf"><a href="#" target="_blank" style="color:#444;">Read & accept our Terms of Services</a></font></label>-->
                                    <!--           </div>-->
                                    <!--         </div>-->
                                    <!--       </div>-->
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
                                             <button type="submit" disabled="disabled" name="submit" id="submit_button" class="btn btn-primary">Register</button> &nbsp; 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- <div class="panel-footer2 text-right"><a href="#" class="btn btn-primary btn-lg" style="padding-right:25px;">Continue</a></div>-->
                                 <script type="text/javascript" src="js/sha256.js"></script>
                           </div>
                           <script>
                              /*function hash() {
                              
                                  var password = document.registration.txtNewPassword.value;
                                  var confirm_password = document.registration.txtConfirmPassword.value;
                                  var transaction_pwd1 = document.registration.txtNewPassword1.value;
                                  var transaction_pwd = document.registration.txtConfirmPassword1.value;
                              
                                  document.registration.txtNewPassword.value = sha256(password);
                                  document.registration.txtConfirmPassword.value = sha256(confirm_password);
                                  document.registration.txtNewPassword1.value = sha256(transaction_pwd1);
                                  document.registration.txtConfirmPassword1.value = sha256(transaction_pwd);
                              
                              }*/
                           </script>
                           <!-- <div class="form-group text-center">
                              <a href="#" class="btn-login btn btn-primary">Register</a> 
                              <a href="login.html" class="btn-login btn btn-danger">Cancel</a>
                              </div> -->
                           </form>
                     </div>
                     </section>
                  </div>
                  <!-- <div class="col-lg-6">
                     <section class="panel">
                          <header class="panel-heading">
                              Topup Member Business<span style="float:right;color:red;"><?php echo @$_GET['msg1'];?></span>
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal"  id="topup" name="topup" role="form" method="post" autocomplete='off'>
                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Amount</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="amount" class="form-control" placeholder="Enter amount" required>
                                          <input type="hidden" name="user_id" value="<?php echo $f['user_id'];?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <input type="submit" class="btn btn-primary" name="topupbusiness" value="TopUp">
                                      </div>
                                  </div>
                                  
                              </form>
                          </div>
                     </div>-->
                  <script type="text/javascript" src="js/sha256.js"></script> 
               </div>
            </div>
            <!--body wrapper end-->
            <!--footer section start-->
            <?php include("footer.php");?>
            <!--footer section end-->
         </div>
         <!-- body content end-->
      </section>
      <!-- Placed js at the end of the document so the pages load faster -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <!--jquery-ui-->
      <script src="js/jquery-migrate.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/modernizr.min.js"></script>
      <!--Nice Scroll-->
      <!--right slidebar-->
      <script src="js/slidebars.min.js"></script>
      <!--switchery-->
      <script src="js/switchery.min.js"></script>
      <script src="js/switchery-init.js"></script>
      <!--flot chart -->
      <script src="js/jquery.flot.js"></script>
      <script src="js/flot-spline.js"></script>
      <script src="js/jquery.flot.resize.js"></script>
      <script src="js/jquery.flot.tooltip.min.js"></script>
      <script src="js/jquery.flot.pie.js"></script>
      <script src="js/jquery.flot.selection.js"></script>
      <script src="js/jquery.flot.stack.js"></script>
      <script src="js/jquery.flot.crosshair.js"></script>
      <!--earning chart init-->
      <script src="js/earning-chart-init.js"></script>
      <!--Sparkline Chart-->
      <script src="js/jquery.sparkline.js"></script>
      <script src="js/sparkline-init.js"></script>
      <!--easy pie chart-->
      <script src="js/jquery.easy-pie-chart.js"></script>
      <script src="js/easy-pie-chart.js"></script>
      <!--vectormap-->
      <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="js/jquery-jvectormap-world-mill-en.js"></script>
      <script src="js/dashboard-vmap-init.js"></script>
      <!--Icheck-->
      <script src="js/icheck.min.js"></script>
      <script src="js/todo-init.js"></script>
      <!--jquery countTo-->
      <script src="js/jquery.countTo.js"  type="text/javascript"></script>
      <!--owl carousel-->
      <script src="js/owl.carousel.js"></script>
      <!--Data Table-->
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.tableTools.min.js"></script>
      <script src="js/bootstrap-dataTable.js"></script>
      <script src="js/dataTables.colVis.min.js"></script>
      <script src="js/dataTables.responsive.min.js"></script>
      <script src="js/dataTables.scroller.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
      <!--data table init-->
      <script src="js/data-table-init.js"></script>
      <!--common scripts for all pages-->
      <script src="js/scripts.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         
             //countTo
         
             $('.timer').countTo();
         
             //owl carousel
         
             $("#news-feed").owlCarousel({
                 navigation : true,
                 slideSpeed : 300,
                 paginationSpeed : 400,
                 singleItem : true,
                 autoPlay:true
             });
         });
         
         $(window).on("resize",function(){
             var owl = $("#news-feed").data("owlCarousel");
             owl.reinit();
         });
         
      </script>
      <script type="text/javascript">
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
                             $.post('../userpanel/check-rank.php', {
                                 'sponsorid': sponsorid
                             }, function(data) {
         
                                 $("#checksponser").html(data);
                                //  $('#checksponserdiv').show();
                                //  $('#checksponserrank').show();
                             });
                         }
                     });
                 });
                 
      </script>
      
    <script type="text/javascript">
         $(document).ready(function() {
                     $("#sender_userid").blur(function(e) {
                         
                         $(this).val($(this).val().replace(/\s/g, ''));
                         var sender_userid = $(this).val();
                         if (sender_userid.length < 1) {
                             $("#checksponser2").html('');
                             return;
                         }
                         
                         if (sender_userid.length >= 1) {
         
                             //$("#checksponser").html('Loading...');
                             $.post('../userpanel/check_rank2.php', {
                                 'sender_userid': sender_userid
                             }, function(data) {
         
                                 $("#checksponser2").html(data);
                                //  $('#checksponserdiv').show();
                                //  $('#checksponserrank').show();
                             });
                         }
                     });
                 });
                 
      </script>
      
      
      <script>
         /*$(document).ready(function() {sender_userid
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
      <script type="text/javascript">
        function showSenderInput(that) {
            if (that.value == "2") {
                // alert("check");
                document.getElementById("senderUserId").style.display = "block";
                $("#senderUserId").attr("required", true);
            } else {
                document.getElementById("senderUserId").style.display = "none";
               
            }
        }
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
                        //  $("#checkuser").html('Loading...');
                         $.post('../userpanel/regis2.php', {
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
                 
               /*  if($('#txtNewPassword').val()!=''){
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
                 }
                 */
                 
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
               if(!phonereg.test(phonen) || cou < 10 || cou >10) {
                   empty7 = true;
                   message = '<span style="color:#f00;">Please enter 10 digit numeric phone number';
                   $('#mbl').html(message);
               }else{
                   empty7 = false;
               }/*else{
                   
                   //alert(username);
                         $("#mbl").html('Loading...');
                         $.post('../userpanel/checkmobile.php', {
                             'mobile': phonen
                         }, function(data) {
         
                             if(data==1){
                                 $("#mbl").html("phone number Already Exists !");
                                 //alert("One");
                                 document.getElementById("mbl").style.color = 'red';
                                 empty7 = true;
                             }else {
                                   $("#mbl").html("");
                                 document.getElementById("mbl").style.color = 'green';
                                 empty7 = false;
                             }
                         }); 
                 //  empty7=false;
                 //  message = '';
                 //         $('#mbl').html(message);
               }*/
                     
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
                 
                  if($('#txtConfirmEmail').val()!=''){
                     var inpasswor = $('#Newemail').val();
                     var inpasswordd = $('#txtConfirmEmail').val();
         
                     if(inpasswor != inpasswordd) {
                         empty9 = true;
                         message = "<span style='color:red'>Email Id does not match.</span>";
                         $('#ceml').html(message);
                     }else{
                         empty9 = false;
                          message = "<span style='color:green'>Email Id match.</span>";
                         $('#ceml').html(message);
                     }
                 }else{
                     empty9 = true;
                     message = "";
                     $('#ceml').html(message);
                 }
                 
                 // if(empty4==false && empty5==false && empty6==false && empty7==false && empty8==false && empty9==false) {
                     if(empty4==false && empty7==false && empty8==false && empty9==false) {
                     $('#submit_button').removeAttr('disabled');
                 }
                 else{
                     $('#submit_button').attr('disabled', 'disabled');
                 }
             });
         })()
         					        
      </script>
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
<script type="text/javascript">
$(document).ready(function(){
$("#country").on('change',function(e) {
var value =$(this).find(':selected').attr('data');
//$('#phonecode').html("<option value="+value+">"+value+"</option>");
document.getElementById("phonecode").value = value;
});
});
</script>

   </body>
</html>