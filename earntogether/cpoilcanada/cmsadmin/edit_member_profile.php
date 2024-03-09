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



    $id=$_GET['id'];
    $f=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where id='$id' "));
    $userimage = $f['image'];
    $userid=$f['user_id'];

if(isset($_POST['topupbusiness'])){
    //echo '<pre>'; print_r($_POST);die;
    $userid1 = $_POST['user_id'];
    $amount = $_POST['amount'];//power_leg_business = (power_leg_business+$amount),
    //echo "update user_registration set power_leg_business=(power_leg_business+$amount) where user_id='".$userid1."'"; die;
    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set power_leg_business=(power_leg_business+$amount) where user_id='".$userid1."'");
    
    $powelegbusiness = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select power_leg_business from user_registration where user_id='$userid1'"));
    $selfpowelegbusiness = $powelegbusiness['power_leg_business'];
    
    $selfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$userid1'"));
    $selfbusiness = $selfincomes['total'];
    //var_dump($selfbusiness); 
    //die;
    $mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(bv) as total from manage_bv_history where income_id='$userid1' "));
    $downbusiness = $mydownlineincomes['total'];
    //var_dump($downbusiness); 
    //die;
    $mytotalearning = $selfbusiness+$downbusiness+$selfpowelegbusiness;
    if($mytotalearning >=0 && $mytotalearning< 1000){
        $rank = 2;
        $slab = 5;
        $rankname = 'Beginner';
    }elseif($mytotalearning >=1000 && $mytotalearning< 4000){
        $rank = 3;
        $slab = 7;
        $rankname = 'Starter';
    }elseif($mytotalearning >=4000 && $mytotalearning< 20000){
        $rank = 4;
        $slab = 9;
        $rankname = 'Associate';
    }elseif($mytotalearning >=20000 && $mytotalearning< 50000){
        $rank = 5;
        $slab = 11;
        $rankname = 'Sr. Associate';
    }elseif($mytotalearning >=50000 && $mytotalearning< 100000){
        $rank = 6;
        $slab = 12.5;
        $rankname = 'Adviser';
    }elseif($mytotalearning >=100000 && $mytotalearning< 500000){
        $rank = 7;
        $slab = 14;
        $rankname = 'Sr. Adviser';
    }elseif($mytotalearning >=500000 && $mytotalearning< 1000000){
        $rank = 8;
        $slab = 15.5;
        $rankname = 'Director';
    }elseif($mytotalearning >=1000000 && $mytotalearning< 2000000){
        $rank = 9;
        $slab = 17;
        $rankname = 'Sr. Director';
    }elseif($mytotalearning >=2000000 && $mytotalearning< 5000000){
        $rank = 10;
        $slab = 18;
        $rankname = 'Star Director';
    }elseif($mytotalearning >=5000000 && $mytotalearning< 10000000){
        $rank = 11;
        $slab = 19;
        $rankname = 'Sr. Star Director';
    }elseif($mytotalearning >=10000000){
        $rank = 12;
        $slab = 20;
        $rankname = 'SuperStar Director';
    }
    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set slab='$slab', rank='$rank', active_status='1' where user_id='".$userid1."'");
}

if(isset($_POST['submit']))
{
$first1=$_POST['first_name1'];
$username=$_POST['username'];
if($username!=$f['username'])
{
   $fnumo=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where username='$username'"));
   if($fnumo>0)
   {
       header("location:edit_member_profile.php?id=". $id."&msg=username already exists !");
   }
   else
   {
       mysqli_query($GLOBALS["___mysqli_ston"], "insert into olduser_names (`id`,`user_id`,`oldusername`,`newusername`) values(NULL,'".$f['user_id']."','".$f['username']."','$username')");
       mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set username='$username' where id='$id'");
   }
}
$first2=$_POST['first_name2'];  
$first3=$_POST['first_name3'];  
$first4=$_POST['first_name4'];  
$first5=$_POST['first_name5'];  
$first6=$_POST['first_name6'];  
$first7=$_POST['first_name7'];  
$first8=$_POST['first_name8'];  
$first9=$_POST['first_name9'];  
$first10=$_POST['first_name10'];  
$first11=$_POST['first_name11'];  
$first12=$_POST['first_name12'];  
$first13=$_POST['first_name13']; 

$first14=$_POST['first_name14'];
$ent=$_POST['ent'];
$limit_amt=$_POST['limit_amt']; 

$fedt1=$_POST['issue'];
$fedt2=$_POST['product_type'];

$rank=$_POST['rank'];
     	$ranklist=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select name from user_rank_list where id='$rank'"));

        $designation=$ranklist['name'];

if($first4!=''){
$pcond=", password='$first4'";	
 }
 if($first5!=''){
$tpcond=", t_code='$first5'";	
 }
 
//echo "update user_registration set first_name='$first1', last_name='$first2', email='$first3' $pcond $tpcond , address='$first6', country='$first7', state='$first8', city='$first9',  telephone='$first11', dob='$first12', sex='$first13'  where user_id='$userid'";
// exit();

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set first_name='$first1',  last_name='$first2', email='$first3' $pcond $tpcond, 
address='$first6', country='$first7', state='$first8', city='$first9', zipcode='$first10', telephone='$first11', dob='$first12', sex='$first13' ,designation='$designation',limt_amt='$limit_amt',rank='$rank'
where user_id='$userid'");
/*header("location:edit_member_profile.php?id=<?php echo $f['id'];?>&msg=Profile Information Updated Successfully !");*/
//echo "<script>window.location.href='edit_member_profile.php?id=". $id."&msg=Profile Information Updated Successfully !'</script>"; 

header("location:edit_member_profile.php?id=". $id."&msg=Profile Information Updated Successfully !");

}


if(isset($_POST['update']))
{
  $first21=$_POST['Account1'];
  $first22=$_POST['Account2'];
  $first23=$_POST['Account3'];
  $first24=$_POST['Account4'];
  $first25=$_POST['Account5'];

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set acc_name='$first21', bank_nm='$first22', branch_nm='$first23', ac_no='$first24', swift_code='$first25' where user_id='$userid'");
//header("location:update-profile.php?msg=Bank Detail Updated Successfully !"); 
//header("location:member-list.php"); 
//echo "<script>window.location.href='edit_member_profile.php?id=". $id."&msg1=Bank Detail Updated Successfully !'</script>"; 
header("location:edit_member_profile.php?id=". $id."&msg1=Bank Detail Updated Successfully !");
}
if(isset($_POST['update1']))
{
  $first21=$_POST['password'];
  $first22=$_POST['t_password'];
 if($first21!=$first22)
 {
     header("location:edit_member_profile.php?id=". $id."&msg1=Password And Transaction Password Not Match!");
 }

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set password='$first21', t_code='$first22' where user_id='$userid'");
//header("location:update-profile.php?msg=Bank Detail Updated Successfully !"); 
//header("location:member-list.php"); 
//echo "<script>window.location.href='edit_member_profile.php?id=". $id."&msg1=Bank Detail Updated Successfully !'</script>"; 
header("location:edit_member_profile.php?id=". $id."&msg1=User Password Updated Successfully !");
}



// if(isset($_POST['modify']))
// {
// $filename12 = time()."main_".$_FILES["uploadedfile"]["name"];
// move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"images/" .$filename12);
// mysql_query("update user_registration set image='$filename12' where user_id='$userid'");
// header("location:update-profile.php?msg=Profile Picture Updated Successfully !");  
// }


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
                            Update member Profile<span style="float:right;color:red;"><?php echo @$_GET['msg'];?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal"  id="myform" name="myform" role="form" method="post" autocomplete='off'>
                            <!--  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Present</label>
                                    <div class="col-lg-10">
                                         <?php $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$_GET['id']."'")); echo number_format($user['amount'],2);?> Amount in wallet
                                
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sponsor ID</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="sponsorid" class="form-control" placeholder="Enter Userid / Username" required value="<?php echo $f['ref_id'];?>" readonly>
                                       
                                    </div>
                                </div>
                                <?php $ref_name=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$f['ref_id']."'")); ?>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Sponsor Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="sponsorname" class="form-control" id="inputPassword1" value="<?php echo $ref_name['first_name'];?>" required readonly>
                                      
                                    </div>
                                </div>
                                        <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">User Registration Date</label>
                                    <div class="col-lg-10">
                                        <input type="test" name="regdate" class="form-control"  placeholder="Enter the description" value="<?php echo $f['registration_date'];?>"  readonly>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><!-- Personal Information --></label>
                                   <div class="col-lg-10">
                                          <h3>Personal Information</h3>
                                
                                    </div> 
                                </div>
                                <!--<div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Old Username</label>
                                    <div class="col-lg-10">
                                        <?php $oldusr=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from olduser_names where user_id='".$f['user_id']."' order by id desc")); ?>
                                        <input type="text" name="oldusername" class="form-control" id="inputPassword1"  value="<?php echo $oldusr['oldusername'];?>" readonly >
                                        
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Userid</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="userid" class="form-control" placeholder="Enter Userid / Username" required value="<?php echo $f['user_id'];?>" readonly readonly>
                                       
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Username</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="username" class="form-control" id="inputPassword1"  value="<?php echo $f['username'];?>" required >
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                     <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Designation</label>
                                             <select class="form-control" name="rank" id="rank" required>
                    							<option value="">Select Rank</option> 
                    						    <?php 
                    						     $rrnk= $fquerysel['rank'];
                    						     $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id>'$rrnk'    ");
                    										  while($queryf1=mysqli_fetch_array($fquery)) {
                    										      
                    										  ?>
                    										  <option value="<?php echo $queryf1['id'];?>" <?php if($queryf1['id']==$f['rank']){echo 'selected=selected';}else{ echo $queryf1['id']; }?>><?php echo $queryf1['name'];?> </option>
                    										  <?php } ?>
                    						</select>
					        	</div>
                                        <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">First Name</label>
                                    <div class="col-lg-10">
                                        <input type="test"name="first_name1" value="<?php echo $f['first_name'];?>" class="form-control" placeholder="Enter the First Name"  >
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Last Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="first_name2" class="form-control" placeholder="Enter Last Name"  value="<?php echo $f['last_name'];?>" >
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="first_name3" class="form-control"    value="<?php echo $f['email'];?>"  placeholder="Enter the Email">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Contactno</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="first_name11" value="<?php echo $f['telephone'];?>" class="form-control" placeholder="Enter the Contactno">
                                       
                                    </div>
                                </div>
                                        <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address</label>
                                    <div class="col-lg-10">
                                        <input type="test" name="first_name6" class="form-control" id="inputPassword1" placeholder="Enter the Address" value="<?php echo $f['address'];?>" >
                                        
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Country</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="first_name7">
                      <option value="<?php echo $f['country'];?>"><?php echo $f['country'];?></option>
                      
                      </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">State</label>
                                    <div class="col-lg-10">
                                        <!--<input type="test" name="first_name8" class="form-control"  value="<?php echo $f['state'];?>" placeholder="Enter the State">-->
                                        <select class="form-control" name="first_name8" id="state"  required>
                        
                                                     <option value="">--Select State--</option>
                                                   
                                                    <?php 
                                                    
                                                     $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `all_states`  ");
                                                    
                                                    while($cnrty = mysqli_fetch_array($resos2)){
                                                    
                                                    ?>
                                                        <option value="<?php echo $cnrty['state_name']?>" <?php if($cnrty['state_name']==$f['state']){echo 'selected=selected';}else{ echo $cnrty['state_name']; }?>>  <?php echo $cnrty['state_name']?></option>
                                                    <?php }                      ?>
                                                </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">City</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="first_name9" value="<?php echo $f['city'];?>" class="form-control" id="inputPassword1" placeholder="Enter the City" >
                                        
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="first_name4" id="first_name4" class="form-control"   placeholder="Enter the Password" >
                                        <div style="color:red;"> Left Blank if dont want to update User Password</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Transaction Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="first_name5" id="first_name5" class="form-control"  placeholder="Enter the Password Transaction Password" >
                                       <div style="color:red;"> Left Blank if dont want to update Transaction Password</div>
                                    </div>
                                </div>
                                 <!--<div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Date Of Birth</label>
                                    <div class="col-lg-10">
                                        <input type="test" name="first_name12" value="<?php echo $f['dob'];?>" class="form-control" id="inputPassword1" placeholder="Enter the Date Of Birth (yyyy-mm-dd)" >
                                        
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Amount</label>
                                    <div class="col-lg-10">
                                        <input type="test" name="limit_amt" value="<?php echo $f['limt_amt'];?>" class="form-control" id="limit_amt" placeholder="Enter the Amount" >
                                        
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Gender</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="first_name13" id="exampleInputState">
                                        <option value="<?php echo $f['sex'];?>"><?php echo $f['sex'];?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                      </select> 
                                        
                                    </div>
                                </div>

                               
                                
                               
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
               <!-- <div class="col-lg-6">onclick="return hash()"
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

</body>
</html>