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

if($_POST[submits])
{

    //$page_flag=0;

    $frm=$_REQUEST['from'];
    $til=$_REQUEST['to'];

    $dfrom=explode("/",$frm);

    $fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 

    $dednd=explode("/",$til);
    $edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];



    $username=$_REQUEST['id'];  



    if($username!=''){
    
        $query123=" where user_id='$username'";  
    
    }
  
    if($frm!='' && $til!=''){
        $query123="where  registration_date>='$fdate' and   registration_date<='$edate' ";  
    }
    //$query123=" and p_date>='$date1' and   p_date<='$date2' ";  
}   

?>


<?php
if(isset($_POST['submit'])){
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <style type="text/css">
      h2.form-heading {

    font-size: 27px;
    text-align: center;
    margin: -37px 8px 37px 0;
  }
  .form-control {
    border: 1px solid #8e8585;
    width: 85%;
  }
   
    </style>
    <script>
    function mtcn(admin_remark1,userId,Id)
    {

        if(admin_remark1!='' && admin_remark1!=false)
        {
            $.ajax({
                url:'../ajax/ajax_awb.php',
                type:'post',
                data:{admin_remark1:admin_remark1,userId:userId,id:Id,funtion:'mtcn'},
                success:function(data)
                {
                    
                    if(data==2)
                    {
                            alert("Successfully Updated Remark");
                            location.reload();
                    }
                    else if(data==3)
                    {
                        alert("Due to some Error Occur");
                    }
                }
                
                
                
            });
        }
        
    }
    
    </script>

     <script>
function coderHakan()
{
var sayfa = window.open('','','width=500,height=500');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('printArea').innerHTML);
sayfa.document.close();
sayfa.print();
}
</script>
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
               <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
                    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">

                    <!--<div class="col-sm-12 text-right">

                        <a href="export_member_list.php" class="btn btn-success">export in excel</a>

                    </div>-->

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <div class="login-logo">
                    
                        </div> 
                                 
                        <div class="log-row">
                            <section class="panel">
                                <header class="text-center ">
                                    <h3 class="main-head"> User Registration Form </h3>
                                    <span style="color:red;"><?php echo @$_GET['msg'];?></span>
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
                </span></p> 
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
                  <div class="col-sm-6">
                      <!--<input type="text" class="form-control" placeholder="Sponsor Id" name="sponsorid" onblur="checkuser(this.value)" autocomplete="off" placeholder="Please Enter Sponsor Id / Username" id="sponsorid" title="Sponsor name" value="<?php // if($_SESSION['referral']!='') { echo $_SESSION['referral']; } else {} ?>" <?php // if($_SESSION[ 'referral']!='' ) { ?> readonly-->
                      <input type="text" class="form-control" placeholder="Sponsor Id" name="sponsorid" autocomplete="off" placeholder="Please Enter Sponsor Id / Username" id="sponsorid" title="Sponsor name" value="<?php if($_SESSION['referral']!='') { echo $_SESSION['referral']; } else {} ?>" <?php if($_SESSION[ 'referral']!='' ) { ?> readonly
                      
                      <?php } ?> required>
                         <!--  <span id="checksponser"></span> -->
                  </div>
                  <div class="col-md-6">
										<div class="form-group text-left">
										  <select class="form-control" name="platform" id="platform" required>
											<option value="">Select Package</option> 
									<?php 
										  $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance order by id asc  ");

										  while($queryf1=mysqli_fetch_array($fquery)) {
										      
										  ?>
										  <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?> (<?php echo $queryf1['amount'];?>)</option>
										  <?php } ?>
																			</select>
																			<span id="plt"></span>
																			</div> 
									</div>
 <div class="col-sm-4">
  <!--<button onclick="change()" class="btn btn-primary btn-lg">GET SPONSOR</button>-->
                  
                  </div>

                  
                </div>
              </div>

              <div class="form-group" style="display: none;color: #7ebdca;" id="checksponserdiv">
                <div class="row">
                  <div class="col-sm-12">
                       <div class="col-sm-6" id="checksponser" style="border-radius: 5px;height: 36px; width: 100%;">
                           <!--background-color: #757166;border: 1px solid #aea6a1;-->
                       </div>
                  </div>
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
                        <!--<input class="form-control" placeholder="Enter Password" type="password" name="password" required id="txtNewPassword" onkeyup="passval();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">-->
                      
                      <input class="form-control" placeholder="Enter Password" type="password" name="password" required id="txtNewPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">
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
                      <input class="form-control" placeholder="Confirm email address" type="email" required name="confirm_email" id="txtConfirmEmail" onkeyup="checkEmailMatch();">
                      <span id="ceml"></span>
                      <div class="registrationFormAlert" id="divCheckEmailMatch" style="font-size:14px;color:#f00;"></div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                   
                  <div class="col-sm-6">
                    <select class="form-control" name="country" id="country"  required>
                        
                         <option value="">--select country--</option>
                        <?php 
                         $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `country`");
                        while($cnrty = mysqli_fetch_array($resos2)){ ?>
                            <option value="<?php echo $cnrty['name']?>" data="<?php echo $cnrty['phonecode'] ?>">  <?php echo $cnrty['name']?>(<?php echo $cnrty['phonecode']?>)</option>
                        <?php }
                        ?>
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
                         <input type="text" name="phonecode" id="phonecode" class="form-control" required readonly>
                       
                  </div>
                   <div class="col-sm-4">
                      <input class="form-control" placeholder="Please enter a valid mobile number" type="number" id="number" required name="mobile">
                      <span id="mbl"></span>
                  </div>
                </div>
              </div>

            

              <!--<div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                      <label for="term">
					  <input type="checkbox" id="term" name="term_cond" value="yes" title="Read and accept our Terms of Services" required>
					  <font class="bldf"><a href="#" target="_blank" style="color:#444;">Read & accept our Terms of Services</a></font></label>
                  </div>
                </div>
              </div>-->

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
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button> &nbsp; 
                  <!--  <a href="login.php" class="btn btn-danger btn-lg">Cancel</a>-->
                  </div>
                </div>
              </div>
             <!-- <p>Already registered ? <a href="login.php" style="color:#054183;">Login now</a></p>-->
            </div>
            
            <!-- <div class="panel-footer2 text-right"><a href="#" class="btn btn-primary btn-lg" style="padding-right:25px;">Continue</a></div>-->

            <script type="text/javascript" src="../userpanel/js/sha256.js"></script>

            </div>
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
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

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
         $(document).ready(function(){
               $('#main_state').on('change',function(){
                   
                   var s_id=$('option:selected',this).attr('main_st');
                  $.ajax({
                       url : 'city-resp.php',
                       type : 'POST',
                       data :{'s_id':s_id},
                       success:function(data){
                        // console.log(data);
                            $('#main_city').html(data);
                       }
                  });


               })
         });
          
       </script>
       
         <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.group'); //Input field wrapper
        //var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
         
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(e){
            e.preventDefault();
            //Check maximum number of input fields
            if(x < maxField){ 
                var fieldHTML = '<div class="row"><div class="col-sm-3 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Our service</label><select class="form-control" style="width: 100%;" name="service[]"><?php $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `vender_services`"); while($cnrty = mysqli_fetch_array($resos2)){ ?><option value="<?php echo $cnrty['id']?>" ><?php echo $cnrty['service_name']?></option> <?php }?></select></div><div class="col-sm-3 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Title</label><input type="text" class="form-control" placeholder="Title" name="title[]" style="width: 100%;"> </div><div class="col-sm-5 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Discription</label><textarea id="discription" name="discription[]" rows="1" class="form-control"></textarea> </div></div>';
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
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
        //owl.reinit();
    });

</script>


</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
            
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
                        $.post('regis3.php', {
                            'sponsorid': sponsorid
                        }, function(data) {

                            $("#checksponser").html(data);
                             $('#checksponserdiv').show();

                        });
                    }
                });
            });
</script>  
              
              
       <script type="text/javascript">
     $(document).ready(function() {
    $("#username11").keyup(function (e) {
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var username = $(this).val();
    if(username.length < 1){$("#checkuser").html('');return;}
    if(username.length >= 1){
    
    $.post('regis5.php', {'username':username}, function(data) {
    $("#checkuser").html(data);
    });
    }
    }); 
    });
       </script>
  <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>
       
       <script>
                $(document).ready(function(){
                  $("#sponsorid").blur(function(){
                  var idd = $("#sponsorid").val();
                  $.ajax({
                      type:"POST",
                      url:"check-sponsorid.php",
                      data:{"siddd":idd},
                      success: function(result){
                      $("#checkuser_sponsorid").html(result);
                      if(idd==''){
                           $("#checkuser_sponsorid").html('');
                      }
                }});
            });
     });
</script>
<script type="text/javascript">
         $(document).ready(function(){
               $('#main_state').on('change',function(){
                   
                   var s_id=$('option:selected',this).attr('main_st');
                  $.ajax({
                       url : 'city-resp.php',
                       type : 'POST',
                       data :{'s_id':s_id},
                       success:function(data){
                        // console.log(data);
                            $('#main_city').html(data);
                       }
                  });


               })
         });
          
       </script>
       
       <script type="text/javascript">
 
 $(document).ready(function() {
    $("#number").blur(function (e) {
 var regExp = /[0-9]{10}/; 
 var txtpan = $(this).val(); 

 if (txtpan.length == 10 ) { 
  if( txtpan.match(regExp) ){ 
 
   $("#epan").html('Mobile match found');
  }
  else {
  
   $("#epan").html('Not a valid Mobile number');
   event.preventDefault(); 
   $("#number").val('');
  } 
 } 
 else { 
      
       $("#epan").html('Please enter 10 digits for a valid Mobile number');
       $("#number").val('');
       event.preventDefault(); 
 } 
});
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#country").on('change',function(e) {
var value =$(this).find(':selected').attr('data');
document.getElementById("phonecode").value = value;
//$('#phonecode').html("<option value="+value+">"+value+"</option>");
});
});
</script>

<script>
        (function() {
            $('#registration .form-control').change(function() {
                var empty1 = false;
                $('#registration .form-control').each(function() {
                    if ($(this).val() == '') {
                        empty1 = true;
                    }
                });
                
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
                
                if($('#registration #username').val()!=''){
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
                }
                
                if($('#txtNewPassword').val()!=''){
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
                
                
                if($('#txtConfirmPassword').val()!=''){
                    var inpasswor = $('#txtNewPassword').val();
                    var inpasswordd = $('#txtConfirmPassword').val();
        
                    if(inpasswor != inpasswordd) {
                        empty4 = true;
                        message = "<span style='color:red'>Password do not match.</span>";
                        $('#cpcheck').html(message);
                    }else{
                        empty4 = false;
                        message = "";
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
    
               
                
                /*if($('#number').val()!=''){
                    var phonen = $('#number').val();
                    cou = phonen.length;
                    var phonereg = /^[0-9+]+$/;
    		        if(!phonereg.test(phonen) || cou < 6) {
    		            empty7 = true;
    		            message = '<span style="color:#f00;">Please enter 10 digit numeric phone number';
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
                }*/
                
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
                
            });
        })()
    									        
    </script>
    
    <script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
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
                        $.post('regis5.php', {
                            'username': username
                        }, function(data) {
                            $("#checkuser").html(data);
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
    

</body>
</html>