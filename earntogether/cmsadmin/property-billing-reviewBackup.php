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

$inv=$_GET['inv'];


  

if(isset($_POST['finalbilling']))
{
  $date=date('Y-m-d');
 $contacts=$_POST['contacts'];
$username=$_POST['username'];

$nametitle=$_POST['nametitle'];  
$occupation=$_POST['occupation'];  
$first_name=$_POST['first_name'];  
$last_name=$_POST['last_name'];  
 
$email=$_POST['email'];  
$contact=$_POST['contact'];  
$country=$_POST['country'];  
$state=$_POST['state'];  
$city=$_POST['city'];  
$address=$_POST['address'];  
$pay_method=$_POST['pay_method'];

  $rand = rand(0000000001,9000000000);

$property_type=$_POST['property_type'];
$project_name=$_POST['project_name'];
$title=$_POST['title'];
$add=$_POST['add'];
$description=$_POST['description'];
$price=$_POST['price'];
$relcomper=$_POST['relcomper'];
$relcomperamount=$_POST['relcomperamount'];
$relcomamt= $_POST['relcomamt'];
$cheq= $_POST['cheq'];
$receiveby= $_POST['receiveby'];
$utrno= $_POST['utrno'];
$prop_com_perc= $_POST['prop_com_perc'];
   $ttype2="Level Income";
 $fnumo  =mysqli_query($GLOBALS["___mysqli_ston"], "select * from billing_detail where invoice_no='$inv' and status='0'");/**/
 $ccm=mysqli_num_rows($fnumo);
 if($ccm>0)
  {
      
    
      $cdata=mysqli_fetch_array($fnumo);
      $prid =$cdata['property_id'];
      $custid =$cdata['user_id'];
      $sellerid =$cdata['seller_id'];
      echo $saleamount =$cdata['net_amount'];//die;
       $totalamount =$cdata['total_amount'];
      
      $instprsold=mysqli_query($GLOBALS["___mysqli_ston"], "update  property set  sold='1'    where   id='$prid' ");
      $instproject=mysqli_query($GLOBALS["___mysqli_ston"], "update  billing_detail set prop_com_perc='$prop_com_perc',receiveby='$receiveby',utrno='$utrno',cheque_num='$cheq', status='1', payment_type='$pay_method',property_type='$property_type',project_name='$project_name',property_id='$title',net_amount='$price',total_amount='$relcomperamount' , commisiion_perc='$relcomper', rel_com_amt='$relcomamt' where   invoice_no='$inv' ");
      $instprcust=mysqli_query($GLOBALS["___mysqli_ston"], "update customers set status='1',title ='$nametitle',first_name='$first_name',last_name='$last_name',email='$email',address='$address',occupation='$occupation',city='$city',state='$state',country='$country',telephone='$contact'   where   user_id='$custid' ");

  $refquery=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$sellerid'"));  
   
  $ref= $refquery['ref_id'];
	// Start Direct Commission
   $ttyperef='Self Income';

	$comm_amt = $saleamount*5/100;
	$spcs = 5;
	
	
        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$comm_amt) where user_id='".$ref."'");
         $quesale="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`,`commis_amt`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                VALUES ('$inv','$ref','$comm_amt','0','$spcs','$ref','$sellerid','$date','$ttyperef','Earn Referral Income from $sellerid','0','0','$ttyperef','$inv','0','0','EWallet','0','$spcs','$spcs','$saleamount')";
                                $chkexecute2 =mysqli_query($GLOBALS["___mysqli_ston"], $quesale);

	// End Direct Commission

  	// Start level Commission
  
$data_level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$sellerid' ");
  while($data_level12=mysqli_fetch_array($data_level1))
  {
    $income_id=$data_level12['income_id'];   
    
    $chktdsdset = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_id='$income_id' "));

    $rank_id=$chktdsdset['rank'];   
    
$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='$rank_id' "));
$commissionid=$comm['id'];
$commissionlvl=$comm['level_per'];

   $spc=$commissionlvl;

 /* if($commissionid==1)
  {
    $spc=$commissionlvl;
  }elseif($commissionid==2){
       $spc=$commissionlvl;
  }elseif($commissionid==3){
       $spc=$commissionlvl;
  }elseif($commissionid==4){      
   $spc=$commissionlvl;
  }elseif($commissionid==5){   
       $spc=$commissionlvl;
   }else{
   $spc=0;
    } */

   // $totals=$totalamount*$spc/100;
    $comm_amt=$saleamount*$spc/100;
      
    if ($comm_amt>0 && $spc>0 ) {
 
               
                $quesale="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`,`commis_amt`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                VALUES ('$inv','$sellerid','$comm_amt','0','$spc','$income_id','$sellerid','$date','$ttype2','$ttype2','$relecom','$comm_amt','$ttype2','$inv','0','0','EWallet','$relcomper','$spc','$spc','$saleamount')";
                
                $chkexecute2 =mysqli_query($GLOBALS["___mysqli_ston"], $quesale);
                
  
} 
      
  }
  
  // End level Commission

          
            header("Location:invoice_details.php?invoice_no=$inv");

  }else{
      header("Location:property-billing.php?msg1=This Property Already Billed ");
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
                         Review  Property Billing<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                            <?php
 $seldata =mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from billing_detail where invoice_no='$inv'"));
// $uidss=$seldata['seller_id'];
  $custid=$seldata['user_id'];
 $cust=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from customers where user_id='$custid'"));

?>
                            <form class="form-horizontal"  id="myform" name="myform" role="form" method="post" autocomplete='off'>
                            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Userid</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="username"  id="userid" class="form-control" placeholder="Enter Userid / Username" value="<?php echo $seldata['seller_id']?>" readonly required>
                                    </div>
                                </div>
                                <p id="checkuserid"></p>
                                <div id="showdiv" >
							<div class="form-group">
							  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">Title:</label>
							 <div class="col-lg-10">
							  <select name="nametitle" class="form-control" >
							       <option value="">Select Title</option>
							      <option value="Mr" <?php if($cust['title']=='Mr'){ echo 'selected'; } ?>>Mr</option>
							      <option value="Mrs" <?php if($cust['title']=='Mrs'){ echo 'selected'; } ?>>Mrs</option>
							      <option value="Ms" <?php if($cust['title']=='Ms'){ echo 'selected'; } ?>>Ms</option>
							  </select>
							</div>
					       </div>
						
					
							<div class="form-group">
							  <label for="exampleInputLName" class="col-lg-2 col-sm-2 control-label">Occupation</label>
							    <div class="col-lg-10">
							  <select name="occupation" class="form-control" >
							      <option value="">Select Occupation</option>
							      <option value="Salaried" <?php if($cust['occupation']=='Salaried'){ echo 'selected'; } ?>>Salaried</option>
							      <option value="Employee" <?php if($cust['occupation']=='Employee'){ echo 'selected'; } ?>>Employee</option>
							      <option value="Company" <?php if($cust['occupation']=='Company'){ echo 'selected'; } ?>>Company</option>
							  </select>
							</div>
					    	</div>
						
							<div class="form-group">
							  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">First Name:</label>
							  <div class="col-lg-10">
							  <input type="text" name="first_name" class="form-control" id="exampleInputName" value="<?php echo $cust['first_name']?>" readonly >
							</div>
							</div>
							<div class="form-group">
							  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">Last Name:</label>
							  <div class="col-lg-10">
							  <input type="text" name="last_name" class="form-control" id="exampleInputName" value="<?php echo $cust['last_name']?>" readonly >
							</div>
							</div>
							<!--<div class="form-group">-->
							<!--  <label for="exampleInputName" class="col-lg-2 col-sm-2 control-label">Pancard:</label>-->
							<!--  <div class="col-lg-10">-->
							<!--   <input type="text" class="form-control" id="txtPANNumber" name="pancard" maxlength="10" onchange="validatePanNumber(this)"  value="<?php echo $cust['pancard']?>" />-->
							<!--   <span id="pancardmsg" ></span>-->
							<!--</div>-->
							<!--</div>-->
						
						
                   
                    
<?php include('../lib/random.php');
$salt=$_SESSION['nonce'];?>
<input type="hidden" name="randm" name="randm" value = "<?php echo htmlentities($salt);?>" />   
                   
                               
                               
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" name="email" class="form-control"   placeholder="Enter the Email" value="<?php echo $cust['email']?>">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Contact no</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="contact" class="form-control" placeholder="Enter the Contactno" value="<?php echo $cust['telephone']?>">
                                       
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
                                       <input type="text" name="state" class="form-control" id="exampleInputAddress" value="<?php echo $cust['state']?>">
                                       
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">City</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="city" class="form-control" id="inputPassword1" placeholder="Enter the City" value="<?php echo $cust['city']?>">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address</label>
                                    <div class="col-lg-10">
                                        <input type="test" name="address" class="form-control" id="inputPassword1" placeholder="Enter the Address" value="<?php echo $cust['address']?>" >
                                        
                                    </div>
                                </div>

                                 </div>
                                 
                                <div id="showprojectdiv" >
                                         
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Property Type</label>
                                    <div class="col-lg-10">
                                         <select name="property_type" class="form-control" id="category" onChange="subCategory(this.value)" >
                                        <option value="">Select any one</option>
                                    <?php $action=mysqli_query($GLOBALS["___mysqli_ston"], "select * from categories where status=0");
                                        while($data=mysqli_fetch_array($action)) {
                                       ?>
                                       <option value="<?php echo $data['category_id'];?>"  <?php if($seldata['property_type']==$data['category_id']){ echo 'selected'; } ?>><?php echo $data['name'];?></option>
                                       <?php } ?>
                                     </select>  
                                    </div>
                                </div>
                                
                                   
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Project  Name</label>
                                    <div class="col-lg-10">
                                       <select name="project_name" class="form-control" id="projects" onChange="subProjects(this.value)"  >
                                                <option value="">Select any one</option>
                                            <?php $actionww=mysqli_query($GLOBALS["___mysqli_ston"], "select * from projects where project_id='".$seldata['project_name']."'");
                                        while($dataxx=mysqli_fetch_array($actionww)) {
                                       ?>
                                       <option value="<?php echo $dataxx['project_id'];?>"  <?php if($seldata['project_name']==$dataxx['project_id']){ echo 'selected'; } ?>><?php echo $dataxx['project_name'];?></option>
                                       <?php } ?>    
                                   </select> 
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Property Name</label>
                                    <div class="col-lg-10">
                                        <select name="title" class="form-control" id="projectplans" onChange="subProjectplans(this.value)" >
                                          <option value="">Select any one</option>
                                           <?php $actionwwss=mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='".$seldata['property_id']."'");
                                        while($dataddxx=mysqli_fetch_array($actionwwss)) {
                                       ?>
                                       <option value="<?php echo $dataddxx['id'];?>"  <?php if($seldata['property_id']==$dataddxx['id']){ echo 'selected'; } ?>><?php echo $dataddxx['title'];?></option>
                                       <?php } ?>
                                       
                                        </select> 
                                    </div>
                                </div>
                              
                                <?php $actionwwssss=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='".$seldata['property_id']."'"));?>
                                
                                  <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Property Address</label>
                                    <div class="col-lg-10">
                                       <input type="text" name="add" id="propaddress"  class="form-control" value="<?php echo $actionwwssss['address']?>">
                                    </div>
                                </div>
                                
                                  <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                       <textarea  name="description" id="description" class="form-control" required readonly><?php echo $actionwwssss['description']?></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group">-->
                                <!--    <label class="col-lg-2 col-sm-2 control-label">Full Price</label>-->
                                <!--    <div class="col-lg-10">-->
                                <!--       <input required type="number" name="price" id="price" class="form-control" value="<?php echo $seldata['net_amount']?>" readonly>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Full Amount</label>
                                    <div class="col-lg-10">
                                       <input required type="number" name="full_price" id="full_price" class="form-control" value="<?php echo $seldata['actual_property_amount']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Sale Amount</label>
                                    <div class="col-lg-10">
                                       <input required type="number" name="price" id="price" class="form-control" value="<?php echo $seldata['net_amount']?>" required>
                                    </div>
                                </div>
                               <input required type="hidden" name="perc" id="perc" class="form-control" value="<?php echo $seldata['prop_com_perc']?>" required>

                                
            
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"> Commssion Amount</label>
                                    <div class="col-lg-10">
                                       <input  type="number" name="relcomperamount" id="relcomperamount" class="form-control" value="<?php echo $seldata['total_amount']?>"  readonly required >
                                      <input  type="hidden" name="relcomper" id="relcomper" class="form-control" value="<?php echo $seldata['commisiion_perc']?>" required>

                                    </div>
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Release Commssion (%)</label>
                                    <div class="col-lg-10">
                         <input  type="number" name="prop_com_perc" id="percs" class="form-control" value="<?php echo $seldata['prop_com_perc']?>"  readonly required >

                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Release Commssion Amount</label>
                                    <div class="col-lg-10">
                                       <input  type="number" name="relcomamt" id="relcomamt" class="form-control" value="<?php echo $seldata['rel_com_amt']?>"  readonly required >
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Payment Method</label>
                                    <div class="col-lg-10">
                                        <select   name="pay_method" id="pay_method" class="form-control" required >
                                            <option value="Cheque" <?php if($seldata['payment_type']=='Cheque') { echo 'selected'; }?> >BY Cheque</option>
                                            <option value="Cash" <?php if($seldata['payment_type']=='Cash') { echo 'selected'; }?> >BY Cash</option>
                                            <option value="Online" <?php if($seldata['payment_type']=='Online') { echo 'selected'; }?> >BY Online Payment</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="form-group" id="chknum" style="">
                                    <label class="col-lg-2 col-sm-2 control-label">Cheque</label>
                                    <div class="col-lg-10">
                                       <input type="text" name="cheq" id="cheques" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group" id="chknum2" style="">
                                    <label class="col-lg-2 col-sm-2 control-label">Receive by</label>
                                    <div class="col-lg-10">
                                       <input type="text" name="receiveby" id="receivebys" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group" id="chknum3" style="">
                                    <label class="col-lg-2 col-sm-2 control-label">UTR No.</label>
                                    <div class="col-lg-10">
                                       <input type="text" name="utrno" id="utrnos" class="form-control">
                                    </div>
                                </div>
                                
                                <?php if($seldata['cheque_num']!=''){?>
                                <div class="form-group" id="chknums" style="" >
                                    <label class="col-lg-2 col-sm-2 control-label">Cheque Number</label>
                                    <div class="col-lg-10">
                                       <input  type="text" name="cheq" id="cheq" class="form-control" value="<?php echo $seldata['cheque_num']?>"  readonly required >
                                    </div>
                                </div>
                                <?php } ?>
                                  <?php if($seldata['receiveby']!='' ){?>
                                <div class="form-group" id="chknums" style="">
                                    <label class="col-lg-2 col-sm-2 control-label">Receive by</label>
                                    <div class="col-lg-10">
                                       <input  type="text" name="receiveby" id="receiveby" class="form-control" value="<?php echo $seldata['receiveby']?>"  readonly required >
                                    </div>
                                </div>
                                <?php } ?>
                                
                                  <?php if($seldata['utrno']!=''){?>
                                <div class="form-group" id="chknums" style="">
                                    <label class="col-lg-2 col-sm-2 control-label">UTR No.</label>
                                    <div class="col-lg-10">
                                       <input  type="text" name="utrno" id="utrno" class="form-control" value="<?php echo $seldata['utrno']?>"  readonly required >
                                    </div>
                                </div>
                                <?php } ?>
                                        <div class="row clearfix"></div>
                                 
                             
                        </div>
                        
                         <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <!--<input type="submit" class="btn btn-primary" name="addbillingproject" id="showpbtnproject" value="Submit">-->
                                        <input type="submit" class="btn btn-primary" name="finalbilling" id="showpbtn" value="Submit" onclick="return confirm('Are you sure?');">
                                    </div>
                                </div>
                        
                                
                    </section>
                </div>
               
				 <script type="text/javascript" src="js/sha256.js"></script> 
<!--<script>	 
function hash()   
{
	 
var tranc_pwd=document.myform.first_name5.value;
var password=document.myform.first_name4.value;
var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{7,20}$/;

if(tranc_pwd!=''){
if(!re.test(tranc_pwd)) {
 alert("Transaction password must contain at least one uppercase,Lower,spaciel char and one number,total 8 char!");
 document.myform.first_name5.focus();
 return false;
 }	
 document.myform.first_name5.value=sha256(tranc_pwd);
 }

if(password!=''){
if(!re.test(password)) {
 alert("User login password must contain at least one uppercase,Lower,spaciel char and one number,total 8 char!");
 document.myform.first_name4.focus();
 return false;
 }	
 document.myform.first_name4.value=sha256(password);
}
 }
</script>-->


                <!--<div class="col-lg-6">-->
                <!--    <section class="panel">-->
                <!--        <header class="panel-heading">-->
                <!--            UPDATE BANK INFORMATION<span style="float:right;color:red;"><?php echo @$_GET['msg1'];?></span>-->
                <!--        </header>-->
                <!--        <div class="panel-body">-->
                <!--            <form class="form-horizontal" role="form" method="post">-->
                            <!--  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Present</label>
                                    <div class="col-lg-10">
                                         <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$_GET['id']."'")); echo number_format($user['amount'],2);?> Amount in wallet
                                
                                    </div>
                                </div> -->
                <!--                <div class="form-group">-->
                <!--                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Account Name</label>-->
                <!--                    <div class="col-lg-10">-->
                <!--                        <input type="text" name="Account1" value="<?php echo $f['acc_name'];?>" class="form-control" placeholder="Enter the Account Name"  >-->
                                        
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="form-group">-->
                <!--                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Account Number</label>-->
                <!--                    <div class="col-lg-10">-->
                <!--                        <input type="text" name="Account2" value="<?php echo $f['ac_no'];?>" class="form-control" id="inputPassword1" placeholder="Enter the Account Number" >-->
                                        
                <!--                    </div>-->
                <!--                </div>-->
                <!--              <div class="form-group">-->
                <!--                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Bank Name</label>-->
                <!--                    <div class="col-lg-10">-->
                <!--                        <input type="text" name="Account3" value="<?php echo $f['bank_nm'];?>" class="form-control" placeholder="Enter the Bank Name" >-->
                                        
                <!--                    </div>-->
                <!--                </div> -->

                <!--                <div class="form-group">-->
                <!--                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Branch Name</label>-->
                <!--                    <div class="col-lg-10">-->
                <!--                        <input type="text" name="Account4" value="<?php echo $f['branch_nm'];?>" class="form-control" placeholder="Enter the Branch Name">-->
                                        
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="form-group">-->
                <!--                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">-->
                <!--                    Ifsc / Swift Code</label>-->
                <!--                    <div class="col-lg-10">-->
                <!--                        <input type="text"name="Account5" value="<?php echo $f['swift_code'];?>" class="form-control" placeholder="Ifsc / Swift Code">-->
                                        
                <!--                    </div>-->
                <!--                </div>-->


                               
                <!--                <div class="form-group">-->
                <!--                    <div class="col-lg-offset-2 col-lg-10">-->
                <!--                   <input type="submit" name="update" value="Update" class="btn btn-primary" >-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </form>-->
                <!--        </div>-->
                <!--    </section>-->
                <!--</div>-->
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
                        $("#checkuserid").html('');
                        return;
                    }
                    if (userid.length >= 1) {

                        //$("#checksponser").html('Loading...');
                        $.post('check-billing.php', {
                            'userid': userid
                        }, function(data) {
                            $("#checkuserid").html(data);
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

<!--


<script type="text/javascript">

function subProjectplans(prop_id){
  var prop_id = prop_id;
 var relcomper=$("#relcomper").val();
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
    
   var relcomperamt= (prop_data.price*relcomper)/100;
   var com_price= (prop_data.price*4)/100;
   var  relcomperamt22= (relcomperamt*relcomper)/100;
   
   $("#full_price").val(prop_data.price);
     $("#price").val(prop_data.price);
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
                   var relcomperamt= (relcomperamount*relcomper)/100;
                    $("#relcomamt").val(relcomperamt);
                });
            });
            
</script>-->





<script type="text/javascript">

function subProjectplans(prop_id){
  var prop_id = prop_id;
 var relcomper=$("#relcomper").val();
 
 var perc =$("#perc").val();
  $.ajax({
    type: "POST",
    url: "get_property.php",
    data: "prop_id="+prop_id, 
    cache: false,
    success: function(data){
     // alert(data);
     var prop_data = JSON.parse(data);  
 
    // alert(prop_data.price);
    
   var relcomperamt= (prop_data.price*relcomper)/100;
   var com_price= (prop_data.price*4)/100;
   var  relcomperamt22= (com_price*relcomper)/100;
   
     $("#full_price").val(prop_data.price);
     $("#price").val(prop_data.price);
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
                   var relcomperamt= (relcomperamount*relcomper)/100;
                    $("#relcomamt").val(relcomperamt);
                });
            });
            
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#price").change(function(e) {
            var price=$("#price").val();
            var perc=$("#perc").val();
            var relcomper=$("#relcomper").val();
            var relcomperamt= (price*perc)/100;
            var relcomper22 = (relcomperamt*relcomper)/100;
            
            $("#relcomperamount").val(relcomperamt);
            $("#relcomamt").val(relcomper22);

            //  alert(price);
            //   alert(perc);
            //  alert(relcomperamt);
                });
            });
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#chknum').hide();
    $('#chknum2').hide();
    $('#chknum3').hide();
    $('#pay_method').on('change', function(){
    	var demovalue = $(this).val(); 
    	if(demovalue=='Cheque'){
             $('#chknum').show();
             $("#cheqs").attr("required", true);
             $('#chknum2').hide();
             $('#chknum3').hide();
          }else{ $('#chknum').hide(); }
          
          if(demovalue=='Cash'){
             $('#chknum2').show();
              $("#receivebys").attr("required", true);
             $('#chknum').hide();
             $('#chknum3').hide();
          }else{ $('#chknum2').hide(); }
          
          if(demovalue=='Online'){
             $('#chknum3').show();
              $("#utrnos").attr("required", true);
               $('#chknum').hide();
             $('#chknum2').hide();
          }else{ $('#chknum3').hide(); }
          
    });
});
    
</script>
  </body>
</html>