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




if(isset($_POST['addbillingaddress']) && isset($_POST['project_name']))
{
    $date=date('Y-m-d');
 $contacts=$_POST['contacts'];
$username=$_POST['username'];
$nametitle=$_POST['nametitle'];  
$occupation=$_POST['occupation'];  
$first_name=$_POST['first_name'];  
$last_name=$_POST['last_name'];  
//$pancard=$_POST['pancard'];  
$email=$_POST['email'];  
$contactnumber=$_POST['contactnumber'];  
$country=$_POST['country'];  
$state=$_POST['state'];  
$city=$_POST['city'];  
$address=$_POST['address'];  
$pay_method=$_POST['pay_method'];


$property_type=$_POST['property_type'];
$project_name=$_POST['project_name'];
$title=$_POST['title'];
$add=$_POST['add'];
$description=$_POST['description'];
$price=$_POST['price'];
$relcomper=$_POST['relcomper'];
 $relcomperamount=$_POST['relcomperamount'];
 $relcomamt= $_POST['relcomamt'];


 $fnumo  =mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from user_registration where (username='$username' || user_id='$username'  )");
 $ccm=mysqli_num_rows($fnumo);
 if($ccm>0)
   {
       $fnumores=mysqli_fetch_array($fnumo);
       $valuesr_id=$fnumores['user_id'];
     
       $invoice_no=rand('111111111','99999999');
    //  echo  $contacts;
    //  die;
    
       if($contacts=='none'){
        $uid=rand('22222','99999');
        
        // if(!empty($pancard)){
        // $chkpan=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from customers where pancard='$pancard' "));
        //   if($chkpan>0)
        //     {
        //          header("Location:property-billing.php?msg=PanCard Already Exist.");
        //          exit();
        //     }
        // }
        
        if(!empty($email)){
         $chkemail=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from customers where email='$email' "));
          if($chkemail>0)
            {
                 header("Location:property-billing.php?msg=Email Already Exist.");
                 exit();
            }
        }
        if(!empty($contactnumber)){
        $chkcont=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from customers where telephone='$contactnumber' "));
          if($chkcont>0)
            {
                 header("Location:property-billing.php?msg=Contact Number Already Exist.");
                 exit();
            }
        }
        
       $inst=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `customers`( `user_id`, `ref_id`, `title`, `first_name`, `last_name`, `email`, `pancard`, `address`, `occupation`, `city`, `state`, `country`, `telephone`, `date`,  `status`) 
       VALUES ('$uid','$valuesr_id','$nametitle','$first_name','$last_name','$email','','$address','$occupation','$city','$state','$country','$contactnumber','$date','0')");
       if($inst){
           $instproject=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `billing_detail`(`property_type`,`project_name`, `property_id`, `user_id`, `seller_id`, `rel_com_amt`, `invoice_no`, `net_amount`, `commisiion_perc`, `total_amount`, `payment_date`, `status`, `shipping_charge`, `tax`, `payment_type`, `shipping_status`, `purchase_date`, `date`) 
           VALUES ('$property_type','$project_name','$title','$uid','$valuesr_id','$relcomamt','$invoice_no','$price','$relcomper','$relcomperamount','$date','0','0','0','$pay_method','0','$date','$date')");

             if($instproject){
              header("Location:property-billing-review.php?inv=$invoice_no");
           }else{
                echo mysqli_error($GLOBALS["___mysqli_ston"]);
                exit;
           }
       
       }else{
           echo mysqli_error($GLOBALS["___mysqli_ston"]);exit;
       }
       
       }else{
            $fchkcust =mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from customers where ref_id='$valuesr_id' order by id desc limit 1"));

          $ssuid= $fchkcust['user_id'];
           
         $instproject=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `billing_detail`( `property_type`,`project_name`, `property_id`,`user_id`, `seller_id`, `rel_com_amt`, `invoice_no`, `net_amount`, `commisiion_perc`, `total_amount`, `payment_date`, `status`, `shipping_charge`, `tax`, `payment_type`, `shipping_status`, `purchase_date`, `date`) 
           VALUES ('$property_type','$project_name','$title','$ssuid','$valuesr_id','$relcomamt','$invoice_no','$price','$relcomper','$relcomperamount','$date','0','0','0','$pay_method','0','$date','$date')");
           if($instproject){
              header("Location:property-billing-review.php?inv=$invoice_no");
           }else{
                echo mysqli_error($GLOBALS["___mysqli_ston"]);
           }
       }
   }
   

}

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
                           Plot Billing<span style="float:right;color:green;"><?php echo @$_GET['msg'];?></span>
                           <span style="float:right;color:red;"><?php echo @$_GET['msg1'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal"  id="myform" name="myform" role="form" method="post" autocomplete='off'>
                            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Userid</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="username"  id="userid" class="form-control" placeholder="Enter Userid / Username" required>
                                    </div>
                                </div>
                                <p id="checkuserid"></p>
                                
                                <div class="form-group" id="contacts">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Contacts</label>
                                    <div class="col-lg-10" >
                                        <select class="form-control" name="contacts"  required>   
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div id="showdiv" style="display:none">
							<div class="form-group">
							  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">Title:</label>
							 <div class="col-lg-10">
							  <select name="nametitle" class="form-control" >
							       <option value="">Select Title</option>
							      <option value="Mr">Mr</option>
							      <option value="Mrs">Mrs</option>
							      <option value="Ms">Ms</option>
							  </select>
							  <!--<input type="text" name="first_name" class="form-control" id="exampleInputName" value="">-->
							</div>
					       </div>
						
							<div class="form-group">
							  <label for="exampleInputLName" class="col-lg-2 col-sm-2 control-label">Occupation</label>
							    <div class="col-lg-10">
							  <select name="occupation" class="form-control" >
							      <option value="">Select Occupation</option>
							      <option value="Employee">Employee</option>
							      <option value="Self Employee">Self Employee</option>
							      <option value="Professional">Professional</option>
							      <option value="Business">Business</option>
							  </select>
							</div>
					    	</div>
						
							<div class="form-group">
							  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">First Name:</label>
							  <div class="col-lg-10">
							  <input type="text" name="first_name" class="form-control" id="exampleInputName" value="">
							</div>
							</div>
							<div class="form-group">
							  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">Last Name:</label>
							  <div class="col-lg-10">
							  <input type="text" name="last_name" class="form-control" id="exampleInputName" value="">
							</div>
							</div>
							<!--<div class="form-group">-->
							<!--  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">Pancard:</label>-->
							<!--  <div class="col-lg-10">-->
							<!--   <input type="text" class="form-control" id="txtPANNumber" name="pancard" maxlength="10" onchange="validatePanNumber(this)"   />-->
							<!--   <span id="pancardmsg" ></span>-->
							<!--</div>-->
							<!--</div>-->
						
						
                   
                    
<?php include('../lib/random.php');
$salt=$_SESSION['nonce'];?>
<input type="hidden" name="randm" name="randm" value = "<?php echo htmlentities($salt);?>" />   
                   
                               
                               
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" name="email" class="form-control"   placeholder="Enter the Email">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Contact no</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="contactnumber" class="form-control" placeholder="Enter the Contactno">
                                       
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Country</label>
                                    <div class="col-lg-10">
                                         <input type="text" name="country" class="form-control" id="exampleInputAddress" value="India" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">State</label>
                                    <div class="col-lg-10">
                                       <input type="text" name="state" class="form-control" id="exampleInputAddress">
                                       
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">City</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="city" class="form-control" id="inputPassword1" placeholder="Enter the City" >
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address</label>
                                    <div class="col-lg-10">
                                        <input type="test" name="address" class="form-control" id="inputPassword1" placeholder="Enter the Address"  >
                                        
                                    </div>
                                </div>

                                 </div>
                                 
                                <div id="showprojectdiv" style="display:none">
                                         
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Property Type</label>
                                    <div class="col-lg-10">
                                         <select name="property_type" class="form-control" id="category" onChange="subCategory(this.value)" >
                                        <option value="">Select any one</option>
                                    <?php $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where status=0 and category_id=1 ");
                                        while($data=mysqli_fetch_array($action)) {
                                       ?>
                                       <option value="<?php echo $data['category_id'];?>"><?php echo $data['name'];?></option>
                                       <?php } ?>
                                     </select>  
                                    </div>
                                </div>
                                
                                   
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Project  Name</label>
                                    <div class="col-lg-10">
                                       <select name="project_name" class="form-control" id="projects" onChange="subProjects(this.value)"  >
                                                <option value="">Select any one</option>
                                                 </select> 
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Property Name</label>
                                    <div class="col-lg-10">
                                         <select name="title" class="form-control" id="projectplans" onChange="subProjectplans(this.value)" >
                                                <option value="">Select any one</option>
                                                 </select> 
                                    </div>
                                </div>
                                
                                
                                  <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Property Address</label>
                                    <div class="col-lg-10">
                                       <input type="text" name="add" id="propaddress"  class="form-control" readonly>
                                    </div>
                                </div>
                                
                                  <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                       <textarea  name="description" id="description" class="form-control" required readonly></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group">-->
                                <!--    <label class="col-lg-2 col-sm-2 control-label">Full Amount</label>-->
                                <!--    <div class="col-lg-10">-->
                                <!--       <input required type="number" name="price" id="price" class="form-control" readonly>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Size(Sqyard)</label>
                                    <div class="col-lg-10">
                                       <input required type="number" name="lot_size" id="lot_size" class="form-control" readonly>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Commission Amount</label>
                                    <div class="col-lg-10">
                                       <input required type="number" name="relcomperamount" id="relcomperamount" class="form-control" readonly>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Release Commission (%)</label>
                                    <div class="col-lg-10">
                                       <input  type="number" name="relcomper" id="relcomper" class="form-control" value="25" required>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Release Commssion Amount</label>
                                    <div class="col-lg-10">
                                       <input  type="number" name="relcomamt" id="relcomamt" class="form-control" readonly required >
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Payment Method</label>
                                    <div class="col-lg-10">
                                        <select  name="pay_method"  class="form-control"  required >
                                            <option value="Cheque">BY Cheque</option>
                                            <option value="Cash">BY Cash</option>
                                            <option value="Online">BY Online Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">

                                    <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                    <!--    <div class="form-group form-float">-->
                                    <!--        <div class="form-line"> <label class="form-label">Add PDF Link</label>-->
                                    <!--            <input required name="pdffile"  type="file"  />-->
                                               
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                    <!--    <div class="form-group form-float">-->
                                    <!--        <div class="form-line"> <label class="form-label">Add Video Link</label>-->
                                    <!--            <input type="text" class="form-control" required name="video">-->
                                               
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">-->
                                    <!--    <div class="form-group form-float">-->
                                    <!--        <div class="form-line"><label class="form-label">Add Location Link</label>-->
                                    <!--            <input type="text" class="form-control" required name="location">-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                 </div>
                        </div>
                        
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <!--<input type="submit" class="btn btn-primary" name="addbillingproject" id="showpbtnproject" value="Submit">-->
                                        <input type="submit" class="btn btn-primary" name="addbillingaddress" id="showpbtn" value="Submit" >
                                    </div>
                                </div>
                        
                                
                    </section>
                </div>
               
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
                $("#userid").blur(function(e) {
                    $(this).val($(this).val().replace(/\s/g, ''));
                    var userid = $(this).val();
                    if (userid.length < 1) {
                        $("#contacts").html('');
                        return;
                    }
                    if (userid.length >= 1) {

                        //$("#checksponser").html('Loading...');
                        $.post('check-billing.php', {
                            'userid': userid
                        }, function(data) {
                            $("#contacts").html(data);
                            $("#checksponserrank").show();
                        });
                    }
                });
            });
            
</script>

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
                
                // var cat_id = cat_id;
  $.ajax({
    type: "POST",
    url: "check_pancard.php",
    data: "pannumber="+pannumber, 
    cache: false,
    success: function(data){
      $("#pancardmsg").html(data);
    }
  });
                
                
                
                
                
                

            }else {
              //  alert(" Invalid PAN number");
                 $("#pancardmsg").html("<b style='color:red'>Invalid PAN number</b> ");
               // $(pan).val("");
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
    
    <script type="text/javascript">
  /*function subCategory(cat_id)
  { alert("dfhj");
    //var cat_id=$('#category').val();
    //$('#sub-category').empty();
    $.get('get_subcategory.php',{'cat_id':cat_id},function(data){

    $("#sub_category").html(data);
}
});
}*/

function subCategory(cat_id){
  var cat_id = cat_id;
  $.ajax({
    type: "POST",
    url: "get_project.php",
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
    url: "get_projectplans.php",
    data: "plan_id="+plan_id, 
    cache: false,
    success: function(data){
      $("#projectplans").html(data);
    }
  });
}
</script>

<script type="text/javascript">

function subProjectplans(prop_id){
  var prop_id = prop_id;
 var relcomper=$("#relcomper").val();
 
 var perc =$("#perc").val();
 // alert(prop_id);
  $.ajax({
    type: "POST",
    url: "get_property.php",
    data: "prop_id="+prop_id, 
    cache: false,
    success: function(data){
     // alert(data);
     var prop_data = JSON.parse(data);  
    //  alert(prop_data);
    // alert(prop_data.price);
    
   var relcomperamt= (prop_data.lot_size*relcomper)/100;
   var com_price= (prop_data.lot_size*1200);
   var  relcomperamt22= (com_price*relcomper)/100;
     $("#lot_size").val(prop_data.lot_size);
      $("#relcomamt").val(com_price);
     $("#propaddress").val(prop_data.address);
     $("#description").val(prop_data.description);
      $("#relcomperamount").val(com_price);
     $("#relcomamt").val(relcomperamt22);
      
    }
  });
}
</script>


<script type="text/javascript">
    $(document).ready(function() {
                $("#relcomper").change(function(e) {
                    var relcomperamount=$("#relcomperamount").val();
                    var relcomper=$("#relcomper").val();
                   var relcomperamt= (relcomperamount*relcomper);
                    $("#relcomamt").val(relcomperamt);
                       
                    
                });
            });
            
</script>

  </body>
</html>