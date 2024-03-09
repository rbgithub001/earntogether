<?php include("header.php");

if(isset($_POST['submit']))
{

$first4=$_POST['first_name4'];  
$first41=$_POST['first_name41'];  
$oldpwd=$_POST['oldpwd']; 
$databasepwd= $f['password'];


 if($oldpwd!=''){
	if($oldpwd!=$databasepwd) {
	header("location:change_password.php?msg=Old Password do not match !");
     exit; 	
	}
	 
 }
 
if($first41!=$first4)
{
header("location:change_password.php?msg=Password do not match !");
 exit; 
}

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set password='$first4' where user_id='$userid'");
header("location:change_password.php?msg=Password Updated Successfully !");
}


/*if(isset($_POST['submit1']))
{

$first5=hash('sha256',$_POST['first_name5']);  
$first51=hash('sha256',$_POST['first_name51']); 
$oldpwd1=hash('sha256',$_POST['oldpwd1']); 

$databasepwd= $f['t_code'];

 if($oldpwd1!=''){
  if($oldpwd1!=$databasepwd) {
  header("location:change_password.php?msg1=Old Transaction Password do not match !");
     exit;  
  }
   
 }

 if($first51!=$first5)
 {
 header("location:change_password.php?msg1=Transaction Password do not match!");
  exit; 
 }
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set t_code='$first5' where user_id='$userid'");
header("location:change_password.php?msg1=Transaction Password Updated Successfully !");
}*/

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    #example2{
      margin-bottom: 20px;
    }
    .panel-primary{
      padding: 15px;
    }
    .m-b{
      margin-bottom: 25px;
    }
    </style>
  </head>

  <body class="">
    <div class="animsition">  
    
   
      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
   <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

        
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
   
      <?php include("top.php");?>
        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <!--<section id="example2">
          <div class="row">
          <div class="col-md-8">
            <strong style="color: black;">Change Password</strong>
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Profile</a></li>
            </ol>

          </div>
          </div>
        </section>--> <!-- / PAGE TITLE -->
<br />

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6 center-block" style="float:none;">

              <section class="panel panel-primary">
                <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold"><b>CHANGE PASSWORD</b></h4>

                <div class="panel-body">
                  <form  method="post" name="user" enctype="multipart/form-data"  id="registration"  autocomplete='off' >
                    
					          <div class="form-group">
                      <label for="exampleInputPassword1">Old Password:</label>
                      <input type="password" name="oldpwd" class="form-control" id="oldpwd"  >
                       <div class="registrationFormAlert" id="passvalidate11" style="font-size:14px;color:#f00;"></div>  
				
                    </div><!-- Left Blank -->
					
                    <div class="form-group">
                      <label for="exampleInputPassword1">NEW Password:</label>
                      <input type="password" name="first_name4" class="form-control" id="txtNewPassword" onkeyup="passval();" >
                       <div class="registrationFormAlert" id="passvalidate" style="font-size:14px;color:#f00;"></div>  
					
                    </div>
					          <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password:</label>
                      <input type="password" name="first_name41" class="form-control" id="txtConfirmPassword"   onkeyup="checkPasswordMatch();">
				
                      <div class="registrationFormAlert" id="divCheckPasswordMatch" style="font-size:16px;color:#009999;"></div>
                    </div>
				
                    
                       
                    <div class="form-group">
                      <input type="submit" name="submit" value="Update"  class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </section>

            </div> <!-- / col-md-6 -->


           <!--  <div class="col-md-6">

              <section class="panel">
                <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg1'];?></div></p>
                <header class="panel-heading">
                  <h3 class="panel-title">Change Transaction Password</h3>
                </header>
                <div class="panel-body">
                  <form  method="post" name="user1" enctype="multipart/form-data" onsubmit="return hash();"; id="registration"  autocomplete='off' >
                    
                    <div class="form-group col-md-12 no-left-padding">
                      <label for="exampleInputPassword1">Old Transaction Password:</label>
                      <input type="password" name="oldpwd1" class="form-control" id="oldpwd1"  >
                       <div class="registrationFormAlert" id="passvalidate11" style="font-size:14px;color:#f00;"></div>  
        
                    </div>
          
                    <div class="form-group col-md-12 no-left-padding">
                      <label for="exampleInputPassword1">Transaction Password:</label>
                      <input type="password" name="first_name5" class="form-control" id="txtNewPassword1" onkeyup="tpassval();" >
                       <div class="registrationFormAlert" id="passvalidate1" style="font-size:14px;color:#f00;"></div>  
          
                    </div>
                    <br>
                    <div class="form-group col-md-12 no-right-padding">
                      <label for="exampleInputPassword1">Confirm Transaction Password:</label>
                      <input type="password" name="first_name51" class="form-control" id="txtConfirmPassword1"   onkeyup="checkPasswordMatch1();">
        
                      <div class="registrationFormAlert" id="divCheckPasswordMatch1" style="font-size:16px;color:#009999;"></div>
                    </div>  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel">
                          <div class="panel-body">
                            <input type="submit" name="submit1" value="Update" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </section>

            </div>  -->
            <!-- / col-md-6 -->


              <!-- / section -->
			 
<script type="text/javascript" src="js/sha256.js"></script> 
<script>
function hash(){
	 
 var randm=document.user.randm.value;	
 var oldpwd=document.user.oldpwd.value;
 var oldtpwd=document.user.oldtpwd.value;
 var password=document.user.txtNewPassword.value;
 var confirm_password=document.user.txtConfirmPassword.value;
 var transaction_pwd1=document.user.txtNewPassword1.value;
 var transaction_pwd=document.user.txtConfirmPassword1.value;
 if(password!=''){
var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{7,20}$/;
if(!re.test(password)) {
 alert("Error: password must contain at least one uppercase,Lower,spaciel char and one number,total 8 char!");
 document.user.txtNewPassword.focus(); 
 return false;
 }
 	var oldpwd= sha256(oldpwd);							
  var oldpwd = oldpwd+randm;							 						 
 	document.user.oldpwd.value = sha256(oldpwd);	 
 	document.user.txtNewPassword.value = sha256(password);
	document.user.txtConfirmPassword.value = sha256(confirm_password);
 }
 if(transaction_pwd1!=''){
	 var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{7,20}$/;
if(!re.test(transaction_pwd1)) {
 alert("Error: password must contain at least one uppercase,Lower,spaciel char and one number,total 8 char!");
 document.user.txtNewPassword1.focus(); 
 return false;
 }
	 var oldtpwd= sha256(oldtpwd);							
     var oldtpwd = oldtpwd+randm;							 						 
 	document.user.oldtpwd.value = sha256(oldtpwd);
	document.user.txtNewPassword1.value = sha256(transaction_pwd1);
	document.user.txtConfirmPassword1.value = sha256(transaction_pwd);
 } 
}
</script>

            
              <!-- / section -->

           
          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->


<?php include("footer.php");?>

    </main> <!-- /playground -->


    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
 <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script>
 	  function passval(){
       var password = $("#txtNewPassword").val();
       var numbers = /[0-9]/g;
       var upperCaseLetters = /[A-Z]/g;
       var lowerCaseLetters = /[a-z]/g;
      if (password.match(lowerCaseLetters)) {
     
      
        if (password.match(upperCaseLetters)) {
       
         
          if (password.match(numbers)) {
         
            if (password.length < 8) {
             $("#passvalidate").html("Password must be atleast 8 characters long");
             $("#pass").html("");
             return false;
            }else{
              $("#passvalidate").html("");
              $("#pass").html("Password Strong");
            }

      }else{
          $("#passvalidate").html("Password must be atleast one numbers");
          $("#pass").html("");
          return false;
      }
      
      }else{
         $("#passvalidate").html("Password must be atleast one upper case letter");
         $("#pass").html("");
         return false;
      }
      
      }else{
           $("#passvalidate").html("Password must be atleast one lower case letter");
           $("#pass").html("");
           return false;
      }

    }
	
	
	
	
	
    function tpassval(){
      var password = $("#txtNewPassword1").val();
       var numbers = /[0-9]/g;
       var upperCaseLetters = /[A-Z]/g;
       var lowerCaseLetters = /[a-z]/g;
      if (password.match(lowerCaseLetters)) {
     
      
        if (password.match(upperCaseLetters)) {
       
         
          if (password.match(numbers)) {
         
            if (password.length < 8) {
             $("#tpassvalidate").html("Password must be atleast 8 characters long");
             $("#tpass").html("");
             return false;
            }else{
              $("#tpassvalidate").html("");
              $("#tpass").html("Password Strong");
            }

      }else{
          $("#tpassvalidate").html("Password must be atleast one numbers");
          $("#tpass").html("");
          return false;
      }
      
      }else{
         $("#tpassvalidate").html("Password must be atleast one upper case letter");
         $("#tpass").html("");
         return false;
      }
      
      }else{
           $("#tpassvalidate").html("Password must be atleast one lower case letter");
           $("#tpass").html("");
           return false;
      }

    }
    
    function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();
    if (password != confirmPassword)
    $("#divCheckPasswordMatch").html("Password do not match!");
    else
    $("#divCheckPasswordMatch").html("Password match.");
    }
    
     function checkPasswordMatch1() {
    var password1 = $("#txtNewPassword1").val();
    var confirmPassword1 = $("#txtConfirmPassword1").val();
    if (password1 != confirmPassword1)
    $("#divCheckPasswordMatch1").html("Transaction Password do not match!");
    else
    $("#divCheckPasswordMatch1").html("Password match.");
    }
    
    </script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>