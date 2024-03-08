<?php include("header.php");

if(isset($_POST['submit']))
{
$first1=$_POST['first_name1'];
$first2=$_POST['first_name2'];  
$first3=$_POST['first_name3'];  
$first4=$_POST['first_name4'];  
$first5=$_POST['first_name5'];  
$first41=$_POST['first_name41'];  
$first51=$_POST['first_name51']; 
$first6=$_POST['first_name6'];  
$first7=$_POST['first_name7'];  
$first8=$_POST['first_name8'];  
$first9=$_POST['first_name9'];  
$first10=$_POST['first_name10'];  
$first11=$_POST['first_name11'];  
$first12=$_POST['first_name12'];  
$first13=$_POST['first_name13'];  
$first14=$_POST['first_name14'];  
$first15=$_POST['first_name15'];  
$ent=$_POST['ent'];

$nom_name=$_POST['nom_name'];
$nom_relation=$_POST['nom_relation'];
$nom_mobile=$_POST['nom_mobile'];
$nom_dob=$_POST['nom_dob'];

$ben_fullname=$_POST['ben_fullname'];
$ben_bank=$_POST['ben_bank'];
$ben_acc_no=$_POST['ben_acc_no'];
$ben_acc_pin=$_POST['ben_acc_pin'];
$ben_wallet_id=$_POST['ben_wallet_id'];
$ben_perfect_money=$_POST['ben_perfect_money'];
$ben_nric=$_POST['nric_no'];
$url=$_GET['url'];
if($first41!=$first4){
header("location:update-beneficiary.php?url=$url&msg=Password do not match !");
 exit; 
}

if($first51!=$first5)
{
header("location:update-beneficiary.php?url=$url&msg=Transaction Password do not match!");
 exit; 
}

//echo "update user_registration set email='$first3', address='$first6',  state='$first8', city='$first9', zipcode='$first10', telephone='$first11', dob='$first12', sex='$first13', ben_fullname='$ben_fullname',ben_bank='$ben_bank',ben_acc_no='$ben_acc_no', ben_nric='$ben_nric',ben_acc_pin='$ben_acc_pin',ben_wallet_id='$ben_wallet_id',ben_perfect_money='$ben_perfect_money' where user_id='$userid'"; die();
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set email='$first3', address='$first6',  state='$first8', city='$first9', zipcode='$first10', telephone='$first11', dob='$first12', sex='$first13', ben_fullname='$ben_fullname',ben_bank='$ben_bank',ben_acc_no='$ben_acc_no', ben_nric='$ben_nric',ben_acc_pin='$ben_acc_pin',ben_wallet_id='$ben_wallet_id',ben_perfect_money='$ben_perfect_money' where user_id='$userid'");
header("location:update-beneficiary.php?url=$url&msg=Member Profile Updated Successfully !");
}

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
        </section>--> <!-- / PAGE TITLE -->
		<br />
		
		
		
        <div class="container-fluid">
          <div class="row">
          <div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-body">
				    <?php if($f['ben_acc_no']!="" and $f['ben_bank']!=""){ ?>
				     <span style="font-size:16px;color:green;">Contact admin to update your beneficiary </span>
				     <?php } ?>
                         <form name="input" method="post" name="user">

                    <!--  <div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Username:</label>-->
                    <!--  <input type="text" name="username" class="form-control" id="exampleInputName" value="<?php echo $f['username'];?>" readonly></div>-->

                   
                    <!-- <div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Country:</label>-->
                    <!--  <input type="text" name="country" class="form-control" id="exampleInputName" value="<?php echo $f['country'];?>" readonly>-->
                    <!--</div>-->

                    <!-- <div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Full Name:</label>-->
                    <!--  <input type="text" name="nric" class="form-control" id="exampleInputName" value="<?php echo $f['first_name']." ".$f['last_name'];?>" readonly>-->
                    <!--</div>-->

                    <!--<div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Passport Number:</label>-->
                    <!--  <input type="text" name="nric_no" class="form-control" id="exampleInputName" value="<?php echo $f['ben_nric'];?>" <?php if($f['ben_nric']!="") { ?>readonly <?php } ?>>-->
                    <!--</div>-->

                    <!--  <div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Beneficiary Full Name:</label>-->
                    <!--  <input type="text" name="ben_fullname" class="form-control" id="exampleInputName" value="<?php echo $f['ben_fullname'];?>"  <?php if($f['ben_fullname']!="") { ?>readonly <?php } ?>>-->
                    <!--</div>-->
                    
                    <!--  <div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Beneficiary Bank Name:</label>-->
                    <!--  <input type="text" name="ben_bank" class="form-control" id="exampleInputName" value="<?php echo $f['ben_bank'];?>" <?php if($f['ben_bank']!="") { ?>readonly <?php  } ?>>-->
                    <!--</div>-->
                    
                     <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputName">Select Beneficiary:</label>
                      <select  name="ben_bank" class="form-control" id="exampleInputName" required <?php if($f['ben_bank']!=""){ echo 'disabled'; } ?> >
                          <option value="">Please Select</option>
                          <option value="BTC" <?php if($f['ben_bank']=="BTC"){ echo 'selected';  }?>>BTC</option>
                          <option value="PAYPAL" <?php if($f['ben_bank']=="PAYPAL"){ echo 'selected';  }?>>PAYPAL</option>
                          <option value="TRON" <?php if($f['ben_bank']=="TRON"){ echo 'selected';  }?>>TRON</option>
                          <option value="PERFECT MONEY" <?php if($f['ben_bank']=="PERFECT MONEY"){ echo 'selected';  }?>>PERFECT MONEY</option>
                          <option value="ETH" <?php if($f['ben_bank']=="ETH"){ echo 'selected';  }?>>ETH</option>
                          </select>
                    </div>
                    
                    
                      <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputName"> Account Number:</label>
                      <input type="text" required name="ben_acc_no" class="form-control" id="exampleInputName" value="<?php echo $f['ben_acc_no'];?>"  <?php if($f['ben_acc_no']!="") { ?>readonly <?php  } ?>>
                    </div>
                    
                    
                    
                    <!--  <div class="form-group col-md-6 no-left-padding">-->
                    <!--  <label for="exampleInputName">Swift Code:</label>-->
                    <!--  <input type="text" name="ben_acc_pin" class="form-control" id="exampleInputName" value="<?php echo $f['ben_acc_pin'];?>" <?php if($f['ben_acc_pin']!="") { ?>readonly <?php  } ?>>-->
                    <!--</div>-->
                    
                    
                  <!--     <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputName">BTC Wallet ID:</label>
                      <input type="text" name="ben_wallet_id" class="form-control" id="exampleInputName" value="<?php echo $f['ben_wallet_id'];?>" >
                    </div>
                    
                      <div class="form-group col-md-6 no-left-padding">
                      <label for="exampleInputName">Perfect Money:</label>
                      <input type="text" name="ben_perfect_money" class="form-control" id="exampleInputName" value="<?php echo $f['ben_perfect_money'];?>" >
                    </div> -->

 <!--                   <div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputName">Beneficiary Passport:</label>-->
 <!--                     <input type="text" name="ben_nric" class="form-control" id="exampleInputName" value="<?php echo $f['ben_nric'];?>" >-->
 <!--                   </div>-->


 <!--                   <div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputState">Gender:</label>-->
 <!--                     <select class="form-control" name="first_name13" id="exampleInputState">-->
 <!--                       <option value="<?php echo $f['sex'];?>"><?php echo $f['sex'];?></option>-->
 <!--                       <option value="Male">Male</option>-->
 <!--                       <option value="Female">Female</option>-->
 <!--                       <option value="Other">Other</option>-->
 <!--                     </select>       -->
 <!--                   </div>-->

 <!--                <div class="form-group col-md-6 no-right-padding">-->
 <!--                     <label for="exampleInputZip">Date Of Birth :</label>-->
 <!--                     <input type="date" name="first_name12" value="<?php echo $f['dob'];?>" class="form-control" id="exampleInputZip">-->
 <!--                   </div>-->
 <!--                   <br>-->
                  

                   


                   

 <!--                   <div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputEmail1">Email:</label>-->
 <!--                     <div class="input-group">-->
 <!--                       <span class="input-group-addon"><i class="ti-email"></i></span>-->
 <!--                       <input type="email" name="first_name3" class="form-control" id="exampleInputEmail1" value="<?php echo $f['email'];?>">-->
 <!--                     </div>-->
 <!--                   </div>-->

 <!--                     <div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputCity">Contact Number:</label>-->
 <!--                     <input type="text" name="first_name11" value="<?php //echo $f['telephone'];?>" class="form-control" id="exampleInputCity">-->
 <!--                   </div>-->
 <!--<div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputUrl">State:</label>-->
 <!--                     <div class="input-group">-->
 <!--                       <span class="input-group-addon"><i class="ti-world"></i></span>-->
 <!--                       <input type="text" name="first_name8" class="form-control" id="exampleInputUrl" value="<?php //echo $f['state'];?>">-->
 <!--                     </div>-->
 <!--                   </div>-->

 <!--                   <div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputCity">City:</label>-->
 <!--                     <input type="text" name="first_name9" value="<?php //echo $f['city'];?>" class="form-control" id="exampleInputCity">-->
 <!--                   </div>-->

 <!--                   <div class="form-group col-md-6 no-right-padding">-->
 <!--                     <label for="exampleInputZip">Zip Code:</label>-->
 <!--                     <input type="text" name="first_name10" value="<?php //echo $f['zipcode'];?>" class="form-control" id="exampleInputZip">-->
 <!--                   </div>-->

                   
 <!--                    <br>-->
 <!--                     <div class="form-group col-md-6 no-left-padding">-->
 <!--                     <label for="exampleInputAddress">Address:</label>-->
 <!--                     <div class="input-group">-->
 <!--                       <span class="input-group-addon"><i class="ti-home"></i></span>-->
 <!--                       <input type="text" name="first_name6" class="form-control" id="exampleInputAddress"value="<?php //echo $f['address'];?>">-->
 <!--                     </div>-->
 <!--                   </div>-->



                    
                      

                  

                  

                    <div class="row">
            <div class="col-md-12 text-center">
             
                  <input type="submit" name="submit" value="Update" <?php if($f['ben_acc_no']!="" and $f['ben_bank']!=""){ ?>  disabled <?php } ?> class="btn btn-primary" />
                
            </div>
			</div>
			</div>
          </div>
                  </form>
              
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
  </body>
</html>