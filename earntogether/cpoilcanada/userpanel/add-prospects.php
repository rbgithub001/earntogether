<?php include("header.php");

if(isset($_POST['submit']))
{
  $title= $_POST['title'];
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
   $address=$_POST['address'];
   $country=$_POST['country'];
   $state=$_POST['state'];
   $city=$_POST['city'];
   $pancard=   ''; //$_POST['pancard'];
   $occupation= $_POST['occupation'];
   $looking_for=$_POST['looking_for'];
   $budget =$_POST['budget'];
  
  $date=date('Y-m-d');
$mid=rand('22222','55555');
  $mobchk=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from customers where telephone='$contact'"));
  if($mobchk>0)
  {
        header("location:add-prospects.php?msg=Contact Number Already Exits Try Different Number!");
        exit;
  }
  $emailchk=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from customers where email='$email'"));
  if($emailchk>0)
  {
          header("location:add-prospects.php?msg=Email  Already Exits Try Different email!");
           exit;
  }
//   $pancradchkl=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from customers where pancard='$pancard'"));
//   if($pancradchkl>0)
//   {
//           header("location:add-prospects.php?msg=Pan Number  Already Exits Try Different!");
//           exit;
//   }


  $rest=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `customers` ( `user_id`,`ref_id`,`title`, `first_name`, `last_name`, `email`, `pancard`,`address`,`occupation`, `city`,`state`,`country`, `telephone`,`date`,`budget`,`looking_for`) VALUES ('$mid', '$userid','$title','$first_name', '$last_name', '$email', '$pancard', '$address','$occupation','$city','$state','$country','$contact', '".date('Y-m-d')."', '$budget', '$looking_for') ");
  if($rest){
 /*     
      
      $api_key='f1c9e4699f3f06564d0b47579fcb3d4b';
      $srd='6221a9d6c825615242e0dd0a';
      $fulln=$first_name.' '.$last_name;
      
$curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://app.sell.do/api/leads/create?api_key=$api_key&srd=$srd&name=$fulln&email=$email&phone=$contact&custom_interested_in=$looking_for&note=Prospect%20data&sub_source=$userid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    // "postman-token: a92e5829-31e3-2800-3b80-42bc20138dbe"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
  
} else {
  echo $response;
  exit();
}
*/
      
      header("location:prospects-list.php?msg= Added Sucsessfully!");
  }else{
      echo mysqli_error($GLOBALS["___mysqli_ston"]);
  }
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

  <body class="" onload="loadStatesByCountry()">
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
                <p class="red" style="color:red;"><?=$_GET['msg'];?></p>
              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Prospect Information</h4>
                <div class="panel-body">
                  <form  method="post" name="user" enctype="multipart/form-data" onsubmit="return hash();"; id="registration"  autocomplete='off' >
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputName">Username:</label>-->
                    <!--  <input type="text" name="username" class="form-control" id="exampleInputName" readonly value="<?php echo $f['username'];?>">-->
                    <!--</div>-->
					<div class="row" style="margin:0 -10px">
					    <div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">Title:</label>
							  <select name="title" class="form-control" required>
							       <option value="">Select Title</option>
							      <option value="Mr">Mr</option>
							      <option value="Mrs">Mrs</option>
							      <option value="Ms">Ms</option>
							  </select>
							  <!--<input type="text" name="first_name" class="form-control" id="exampleInputName" value="">-->
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Occupation</label>
							  <select name="occupation" class="form-control" required>
							      <option value="">Select Occupation</option>
							      <option value="Employee">Employee</option>
							      <option value="Self Employee">Self Employee</option>
							      <option value="Professional">Professional</option>
							      <option value="Business">Business</option>
							  </select>
							</div>
						</div>
					    </div>
					    	<div class="row" style="margin:0 -10px">
					   
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">First Name:</label>
							  <input type="text" name="first_name" class="form-control" id="exampleInputName" value="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Last Name:</label>
							  <input type="text" name="last_name" class="form-control" id="exampleInputLName" value="">
							</div>
						</div>
					    </div>
						<div class="row" style="margin:0 -10px">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">Email:</label>
							  <input type="email" name="email" class="form-control" id="exampleInputName" value="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Contact Number:</label>
							  <input type="text" name="contact" class="form-control" id="exampleInputLName" value="">
							</div>
						</div>
					</div>
					<!--	<div class="row" style="margin:0 -10px">-->
					<!--	<div class="col-md-12">-->
					<!--		<div class="form-group">-->
					<!--		  <label for="exampleInputName">Pancard:</label>-->
					<!--		   <input type="text" class="form-control" id="txtPANNumber" name="pancard" maxlength="10" onchange="validatePanNumber(this)"   />-->
					<!--		   <span id="pancardmsg" ></span>-->
					<!--		</div>-->
					<!--	</div>-->
						
					<!--</div>-->
					
                   
                    
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
                        <div class="row" style="margin:0 -10px;">
                         
                         
                        <div class="col-md-6">
                            <label>Country</label>
                            <!--<input type="text" name="country" class="form-control" id="exampleInputAddress" value="India" readonly>-->
                            <select class="form-control" name="country" id="country" onchange="getstate()" required>
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
                          
                        <div class="col-md-6">
                            <label>State</label>
                            <select class="form-control" name="state" id="state"  required>
                                <option value="">Please select state</option>
                            </select>
                          </div>
                          
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="row" style="margin:0 -10px;">
                          <div class="col-md-6">
                            <label>City</label>
                                 <input type="text" name="city" class="form-control" id="exampleInputAddress">
                          </div>
                          <div class="col-md-6">
                            <label for="exampleInputAddress">Address:</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="ti-home"></i></span>
                              <input type="text" name="address" class="form-control" id="exampleInputAddress" value="<?php // echo $f['address'];?>">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="row" style="margin:0 -10px;">
                          <div class="col-md-6">
                            <label for="exampleInputAddress">Looking For : </label>
                            <select name="property_type" class="form-control" id="category" onChange="subCategory(this.value)" >
                                        <option value="">Select any one</option>
                                    <?php $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where status=0");
                                        while($data=mysqli_fetch_array($action)) {
                                       ?>
                                       <option value="<?php echo $data['category_id'];?>"><?php echo $data['name'];?></option>
                                       <?php } ?>
                                     </select>  
                          </div>
                          
                           <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line"><label class="control-label">Project Name</label>
                                                <!--<input required type="text" name="project_name" class="form-control">-->
                                                <select name="project_name" class="form-control" id="projects" onChange="subProjects(this.value)"  >
                                                <option value="">Select Project</option>
                                                 </select>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line"><label class="form-label">Property Name</label>
                                                <input required type="text" name="title" class="form-control">
                                                <select name="title" class="form-control" id="projectplans" onChange="subProjectplans(this.value)" >
                                                <option value="">Select Property</option>
                                                 </select> 
                                                
                                            </div>
                                        </div>
                                    </div>-->

                                     <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                               <label class="control-label">Property Size</label>
                                               
                                               <input type="text" name="plot_size" id="plot_size" class="form-control" value="" readonly>
        
                                               <select name="plot_size" class="form-control" id="plot_size" onChange="propertySize(this.value)" >
                                                    <option value="">Select Property Size</option>
                                                    <?php $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from property_size_price");
                                                    while($data=mysqli_fetch_array($action)) {
                                                   ?>
                                                   <option value="<?php echo $data['id'];?>"><?php echo $data['size'];?> sqr-feet</option>
                                                   <?php } ?>
                                                </select>                                   
                                            </div>
                                        </div>
                                    </div>-->
                                    
                                    <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Full Price</label>
                                                <input type="text" name="property_price" id="property_price" class="form-control" value="" readonly>
                                                
                                            </div>
                                        </div>
                                    </div>-->
                                    
                          <div class="col-md-6">
                            <label>Budget :</label>
                            <select class="form-control" name="budget"  required>
                                 <option value="">Please select </option>
                                 <option value="Between 1M - 5M"> Between 1M - 5M</option>
                                 <option value="Between 5M - 10M"> Between 5M - 10M</option>
                                 <option value="Between 10M - 15M"> Between 10M - 15M</option>
                                 <option value="Between 15M - 20M"> Between 15M - 20M</option>
                                 <option value="Above 20M"> Above 20M</option>
                                 
                            </select>
                          </div>
                          
                        </div>
                      </div>
                      

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
        /*function validatePanNumber(pan) {
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

        }*/
        
        
        function subCategory(cat_id){
          var cat_id = cat_id;
          $.ajax({
            type: "POST",
            url: "../cmsadmin/get_project.php",
            data: "cat_id="+cat_id, 
            cache: false,
            success: function(data){
              $("#projects").html(data);
            }
          });
        }
    </script>
    <script type="text/javascript">

function subProjects(plan_id){
  var plan_id = plan_id;
  $.ajax({
    type: "POST",
    url: "../cmsadmin/get_projectplans.php",
    data: "plan_id="+plan_id, 
    cache: false,
    success: function(data){
      $("#projectplans").html(data);
    }
  });
}
</script>
    <script type="text/javascript">

function propertySize(plot_id){
  var plot_id = plot_id;
 
  $.ajax({
    type: "POST",
    url: "get_plotsizeprize.php",
    data: "plot_id="+plot_id, 
    cache: false,
    success: function(data){
        console.log();
      $("#property_price").html(data);
    }
  });
}
</script>
<script type="text/javascript">

function subProjectplans(project_name)
{
 var project_name = project_name;
 var relcomper=$("#relcomper").val();
 var percs =$("#percs").val();
 //alert(percs);
 var relcomper=$("#relcomper").val('100');
  $.ajax({
    type: "POST",
    url: "../cmsadmin/get_property.php",
    data: "project_name="+project_name,
    cache: false,
    success: function(data){
     
     var prop_data = JSON.parse(data);  
//   console.log(prop_data);
//     alert(prop_data);
    
   var relcomperamt= (prop_data.price*relcomper)/100;
   var com_price= (prop_data.price*percs)/100;
   var  relcomperamt22= (com_price*relcomper)/100;
   
     $("#property_price").val(prop_data.price);
     $("#plot_size").val(prop_data.plot_size);
    // $("#relcomamt").val(prop_data.price);
      $("#relcomamt").val(com_price);
     // $("#relcomamt").val(com_price);
     $("#propaddress").val(prop_data.address);
     $("#description").val(prop_data.description);
      $("#relcomperamount").val(com_price);
    // $("#relcomamt").val(relcomperamt22);
      
    }
  });
}
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



    function getstate() {
    
   var state_id = $('#country').val();
   
    //   alert(state_id);
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
}

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
  </body>
</html>