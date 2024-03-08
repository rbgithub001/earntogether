<?php include("header.php");



$id=$_GET['id'];

if(isset($_POST['submit']))
{
  $usid=$_POST['user_id'];
  $remark=$_POST['remark'];
  
  $date=date('Y-m-d');

//   $mobchk=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from prospect_activity where telephone='$contact'"));
//   if($mobchk>0)
//   {
//         header("location:add-prospects.php?msg=Contact Number Already Exits Try Different Number!");
//         exit;
//   }
 
  mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `prospect_activity` ( `user_id`, `remark`, `date`) VALUES ( '$usid', '$remark', '".date('Y-m-d')."')");
  header("location:view-prospect-activity.php?id=$usid");
}


$dataxxx=mysqli_query($GLOBALS["___mysqli_ston"],"select * from customers where user_id='$id' " );
$datass1=mysqli_fetch_array($dataxxx);

?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
    .msglist{
     font-size: 16px;
    border-bottom: 1px solid;
    /*padding: 5px;*/
    /*margin-top: 25px;*/
        
    }
    
    textarea{
        background: #fff !important;
        border: 1px solid #000 !important;
    }
    form .form-control {
    border: 1px solid #000!important;
    color: #000;
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
            <strong style="color: black;">Update Profile</strong>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Profile</a></li>
              <li><a href="#">Update Profile</a></li>
            </ol>

          </div>
        </div>
        </section>--> <!-- / PAGE TITLE --><br />

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6">
                
              <section class="panel panel-primary">
                  
                  
                 <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Prospect Information</h4>
					<div class="row" style="margin:0 -10px">
					    <div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">Title : <?=$datass1['title'];?> </label>
							
							  
							  <!--<input type="text" name="first_name" class="form-control" id="exampleInputName" value="">-->
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Occupation  : <?=$datass1['occupation'];?> </label>
							  <!--<select name="occupation" class="form-control" required>-->
							  <!--    <option value="">Select Occupation</option>-->
							  <!--    <option value="Salaried">Salaried</option>-->
							  <!--    <option value="Employee">Employee</option>-->
							  <!--    <option value="Company">Company</option>-->
							  <!--</select>-->
							</div>
						</div>
					    </div>
					    	<div class="row" style="margin:0 -10px">
					   
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">First Name : <?=$datass1['first_name'];?> </label>
							  <!--<input type="text" name="first_name" class="form-control" >-->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Last Name  :  <?=$datass1['last_name'];?> </label>
							  <!--<input type="text" name="last_name" class="form-control" id="exampleInputLName" value="">-->
							</div>
						</div>
					    </div>
						<div class="row" style="margin:0 -10px">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">Email :  <?=$datass1['email'];?></label>
							  <!--<input type="email" name="email" class="form-control" id="exampleInputName" value="">-->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Contact Number :  <?=$datass1['telephone'];?></label>
							  <!--<input type="text" name="contact" class="form-control" id="exampleInputLName" value="">-->
							</div>
						</div>
					</div>
					<!--	<div class="row" style="margin:0 -10px">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputName">Pancard :  <?=$datass1['pancard'];?></label>
							  
							</div>
						</div> 
						
					</div>--><!--<input type="text" class="form-control" id="txtPANNumber" name="pancard" maxlength="10" onchange="validatePanNumber(this)"  required />-->
							   <!--<span id="pancardmsg" ></span>-->
                      <div class="form-group">
                        <div class="row" style="margin:0 -10px;">
                         
                          <div class="col-md-6">
                            <label>Country :  <?=$datass1['country'];?></label>
                            <!--<input type="text" name="country" class="form-control" id="exampleInputAddress" value="India" readonly>-->
                            
                          </div>
                           <div class="col-md-6">
                            <label>State :  <?=$datass1['state'];?></label>
                                 <!--<input type="text" name="state" class="form-control" id="exampleInputAddress">-->
                            
                          </div>
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <div class="row" style="margin:0 -10px;">
                         
                          <div class="col-md-6">
                            <label>City :  <?=$datass1['city'];?></label>
                                 <!--<input type="text" name="city" class="form-control" id="exampleInputAddress">-->
                            
                          </div>
                          
                          <div class="col-md-6">
                            <label for="exampleInputAddress">Address :  <?=$datass1['address'];?></label>
                            <!--<div class="input-group">-->
                            <!--  <span class="input-group-addon"><i class="ti-home"></i></span>-->
                              <!--<input type="text" name="address" class="form-control" id="exampleInputAddress" value="<?php  echo $f['address'];?>">-->
                            <!--</div>-->
                          </div>
                        </div>
                      </div>
                       
                  
                  
                  
                  
                  
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Activity Information</h4>
                <!--<p style="color:red;"><?=$_GET['msg1'];?></p>-->
                <!--<p  style="color:green;"><?=$_GET['msg'];?></p>-->
                <div class="panel-body">
                    <?php
                     $activitylist=mysqli_query($GLOBALS["___mysqli_ston"], "select remark,ts from prospect_activity where user_id='".$_GET['id']."' ");
                     while($activityresult= mysqli_fetch_array($activitylist)){ ?>
                    <p class="msglist">  <span style="  margin-top: 25px;  font-size: 12px;    float: right;"> <?php echo $activityresult['ts'];?> </span><br>
                    <?php echo $activityresult['remark'];?>
                   
                    </p>
                    
                    <?php } ?>
                </div>
                    
                  <br><br> <div class="panel-body"> 
                  <form  method="post" name="user" enctype="multipart/form-data" onsubmit="return hash();"; id="registration"  autocomplete='off' >
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputName">Username:</label>-->
                      <input type="hidden" name="user_id" class="form-control" id="exampleInputName" readonly value="<?php echo $_GET['id'];?>">
                    <!--</div>-->
					<div class="row" style="margin:0 -10px">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputName">Add Remark:</label>
							  <textarea name="remark" class="form-control" ></textarea>
							</div>
						</div>
						<!--<div class="col-md-6">-->
						<!--	<div class="form-group">-->
						<!--	  <label for="exampleInputLName">Last Name:</label>-->
						<!--	  <input type="text" name="last_name" class="form-control" id="exampleInputLName" value="">-->
						<!--	</div>-->
						<!--</div>-->
					</div>
					
					
                    
<?php include('../lib/random.php');
$salt=$_SESSION['nonce'];?>
<input type="hidden" name="randm" name="randm" value = "<?php echo htmlentities($salt);?>" />   
                    <!-- <div class="form-group col-md-6 no-right-padding" >
                      <label for="exampleInputPassword2">Confirm Transaction Password:</label>
                      <input type="password" name="first_name51" class="form-control"  id="txtConfirmPassword1" onkeyup="checkPasswordMatch1();" >
					  <div style="color:red;"> Left Blank if dont want to update User Password</div>
                      <div class="registrationFormAlert" id="divCheckPasswordMatch1" style="font-size:16px;color:#009999;"></div>
                    </div>-->
                     
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </section>

            </div> <!-- / col-md-6 -->

            <div class="col-md-6">
 
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

            </div>

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
  <script>
        function validatePanNumber(pan) {
            let pannumber = $(pan).val();
            var regex = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/;
            if (pannumber.match(regex)) {
                
                //alert(" Valid PAN number");
                $("#pancardmsg").html("<b style='color:green'>Valid PAN number</b>");

            }else {
              //  alert(" Invalid PAN number");
                 $("#pancardmsg").html("<b style='color:red'>Invalid PAN number</b> ");
               // $(pan).val("");
            }

        }
    </script>
  </body>
</html>