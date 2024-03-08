<?php include("header.php");

if(isset($_POST['submit']))
{
$first1=$_POST['first_name1'];
$first2=$_POST['first_name2'];  
$first3=$_POST['first_name3'];  


$first4=hash('sha256',$_POST['first_name4']);  
// $first5=$_POST['first_name5'];  
$first41=hash('sha256',$_POST['first_name41']);  
// $first51=$_POST['first_name51']; 
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
$ltc_add=$_POST['ltc_add'];  
$etc_add=$_POST['etc_add']; 


$acc_name=$_POST['acc_name'];
$ac_no=$_POST['ac_no'];
$bank_nm=$_POST['bank_nm'];
$branch_nm=$_POST['branch_nm'];
$swift_code=$_POST['swift_code'];


$id_no=$_POST['id_no'];  


$btc_add=$_POST['btc_add'];  


$oldpwd=hash('sha256',$_POST['oldpwd']); 

$databasepwd= $f['password'];

$ent=$_POST['ent'];

$tmp_name=$_FILES['pancard_proof_image']['tmp_name']; 
$pic = $_FILES['pancard_proof_image']['name']; 
$imageDBpath =time().$pic;
move_uploaded_file($tmp_name,"images/".$imageDBpath);
if($first4!=''){
	$pwd=" password='$first4',";
  $tpwd=" t_code='$first4',";
}


if($first41!=$first4)
{
header("location:update-profile.php?msg=Password do not match !");
 exit; 
}


mysqli_query($GLOBALS["___mysqli_ston"], "insert into previous_record (`user_id`,`first_name`,`last_name`,`email`,`address`,`country`,`state`,`city`,`zipcode`,`telephone`,`dob`,`sex`,`merried_status`,`id_card`,`id_no`,`image`)
   values('".$userid."','".$f['first_name']."','".$f['last_name']."','".$f['email']."', '".$f['address']."', '".$f['country']."', '".$f['state']."', '".$f['city']."', '".$f['zipcode']."', '".$f['telephone']."', '".$f['dob']."','".$f['sex']."','".$f['merried_status']."','".$f['id_card']."','".$f['id_no']."','".$f['image']."')");

mysqli_query($GLOBALS["___mysqli_ston"], "insert into updated_record (`user_id`,`first_name`,`last_name`,`email`,`address`,`country`,`state`,`city`,`zipcode`,`telephone`,`dob`,`sex`,`merried_status`,`id_card`,`id_no`)
   values('".$userid."','".$first1."','".$first2."','".$first3."', '".$first6."', '".$first7."', '".$first8."', '".$first9."', '".$first10."', '".$first12."', '".$first12."','".$first13."','".$first14."','".$imageDBpath."','".$id_no."')");

/*echo "update user_registration set first_name='$first1', last_name='$first2',  $pwd $tpwd email='$first3', address='$first6', country='$first7', state='$first8', city='$first9', zipcode='$first10', telephone='$first11', dob='$first12', sex='$first13', merried_status='$first14', id_card='$imageDBpath', id_no='$id_no',update_status='1', btc_add='$btc_add' where user_id='$userid'";die;*/

mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set first_name='$first1',ltc_add='$ltc_add',etc_add='$etc_add', last_name='$first2', email='$first3', address='$first6', country='$first7', state='$first8', city='$first9', zipcode='$first10', telephone='$first11', dob='$first12', sex='$first13', merried_status='$first14', id_card='$imageDBpath', id_no='$id_no',update_status='1', btc_add='$btc_add', acc_name='$acc_name', ac_no='$ac_no', bank_nm='$bank_nm', branch_nm='$branch_nm', swift_code='$swift_code' where user_id='$userid'");

/*mail */
			  $useremail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'")); 
			  $email=$useremail['email'];
			  date_default_timezone_set('Asia/Kolkata');

require '../mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = "mail.smtp2go.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;


//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = "srdev@maxtratechnologies.net";
//jeera.update1@maxtratechnologies.in
$mail->Password = "Maxtra@2020";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('srdev@maxtratechnologies.net', 'TITO');
//Set an alternative reply-to address
$mail->addReplyTo('srdev@maxtratechnologies.net', 'TITO');
//Set who the message is to be sent to
$mail->addAddress($email, 'TITO');
//Set the subject line
$mail->Subject = 'Profile Update';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Profile Update</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>
<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="http://182.76.237.227/~syscheck/cifuae/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                    Profile Update
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$_SESSION['username'].' Your Profile Update Successfully.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                  
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2021 TITO. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>
</html>';



	$mail->send();
/* mail */


header("location:update-profile.php?msg=Member Profile Updated Successfully !");
}


if(isset($_POST['submit_1']))
{
  $first21=$_POST['acc_name'];
  $first22=$_POST['bank_nm'];
  $first23=$_POST['branch_nm'];
  $first24=$_POST['ac_no'];
  $first25=$_POST['swift_code'];


mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set acc_name='$first21', bank_nm='$first22', branch_nm='$first23', ac_no='$first24', swift_code='$first25' where user_id='$userid'");
/*mail */
			  $useremail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'")); 
			  $email=$useremail['email'];
			  date_default_timezone_set('Asia/Kolkata');

require '../mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = "mail.smtp2go.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;


//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = "srdev@maxtratechnologies.net";
//jeera.update1@maxtratechnologies.in
$mail->Password = "Maxtra@2020";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('srdev@maxtratechnologies.net', 'TITO');
//Set an alternative reply-to address
$mail->addReplyTo('srdev@maxtratechnologies.net', 'TITO');
//Set who the message is to be sent to
$mail->addAddress($email, 'TITO');
//Set the subject line
$mail->Subject = 'Profile Update';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Profile Update</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>
<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="http://182.76.237.227/~syscheck/cifuae/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                    Profile Update
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$_SESSION['username'].' Your Profile Update Successfully.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                  
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2021 TITO. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

	$mail->send();
/* mail */
header("location:update-profile.php?msg=Bank Detail Updated Successfully !");
}

if(isset($_POST['modify']))
{
$filename12 = time()."main_".$_FILES["uploadedfile"]["name"];
move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"images/" .$filename12);



mysqli_query($GLOBALS["___mysqli_ston"], "insert into previous_record (`user_id`,`first_name`,`last_name`,`email`,`address`,`country`,`state`,`city`,`zipcode`,`telephone`,`dob`,`sex`,`merried_status`,`id_card`,`id_no`,`image`)
   values('".$userid."','".$f['first_name']."','".$f['last_name']."','".$f['email']."', '".$f['address']."', '".$f['country']."', '".$f['state']."', '".$f['city']."', '".$f['zipcode']."', '".$f['telephone']."', '".$f['dob']."','".$f['sex']."','".$f['merried_status']."','".$f['id_card']."','".$f['id_no']."','".$f['image']."')");

mysqli_query($GLOBALS["___mysqli_ston"], "insert into updated_record (`user_id`,`image`)
   values('".$userid."','".$image."')");


mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set image='$filename12' where user_id='$userid'");


/*mail */
			  $useremail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'")); 
			  $email=$useremail['email'];
			  date_default_timezone_set('Asia/Kolkata');

require '../mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = "mail.smtp2go.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;


//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = "srdev@maxtratechnologies.net";
//jeera.update1@maxtratechnologies.in
$mail->Password = "Maxtra@2020";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('srdev@maxtratechnologies.net', 'TITO');
//Set an alternative reply-to address
$mail->addReplyTo('srdev@maxtratechnologies.net', 'TITO');
//Set who the message is to be sent to
$mail->addAddress($email, 'TITO');
//Set the subject line
$mail->Subject = 'Profile Update';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Profile Update</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>
<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="http://182.76.237.227/~syscheck/cifuae/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                    Profile Update
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$_SESSION['username'].' Your Profile Update Successfully.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                  
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2021 TITO. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

	$mail->send();
/* mail */

header("location:update-profile.php?msg=Member Profile Photo Updated Successfully !");  
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
        </section>--> <!-- / PAGE TITLE --><br />

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Personal Information</h4>
                <div class="panel-body">
                  <form  method="post" name="user" enctype="multipart/form-data" onsubmit="return hash();"; id="registration"  autocomplete='off' >
                    <!--<div class="form-group">
                      <label for="exampleInputName">Username:</label>
                      <input type="text" name="username" class="form-control" id="exampleInputName" readonly value="<?php echo $f['username'];?>">
                    </div>-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputName">First Name:</label>
							  <input type="text" name="first_name1" class="form-control" id="exampleInputName" <?php if($f['update_status']=='1'){?>  <?php }?> value="<?php echo $f['first_name'];?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputLName">Last Name:</label>
							  <input type="text" name="first_name2" class="form-control" id="exampleInputLName" <?php if($f['update_status']=='1'){?>  <?php }?> value="<?php echo $f['last_name'];?>">
							</div>
						</div>
					</div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email:</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="ti-email"></i></span>
                        <input type="email" name="first_name3" class="form-control" id="exampleInputEmail1" value="<?php echo $f['email'];?>" <?php if($f['email']!=""){ ?> readonly <?php } ?>>
                      </div>
                    </div>

					
			
<? include('../lib/random.php');
   $salt=$_SESSION['nonce'];
?><input type="hidden" name="randm" name="randm" value = "<?php echo htmlentities($salt);?>" />   
                    <!-- <div class="form-group col-md-6 no-right-padding" >
                      <label for="exampleInputPassword2">Confirm Transaction Password:</label>
                      <input type="password" name="first_name51" class="form-control"  id="txtConfirmPassword1" onkeyup="checkPasswordMatch1();" >
					  <div style="color:red;"> Left Blank if dont want to update User Password</div>
                      <div class="registrationFormAlert" id="divCheckPasswordMatch1" style="font-size:16px;color:#009999;"></div>
                    </div>-->
                      <div class="form-group">
                        <div class="row" style="margin:0 -10px;">
                          <div class="col-md-6">
                            <label for="exampleInputAddress">Address:</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="ti-home"></i></span>
                              <input type="text" name="first_name6" class="form-control" id="exampleInputAddress" value="<?php echo $f['address'];?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Country</label>
                            <select class="form-control" name="first_name7" >
                            <option value="<?php echo $f['country'];?>"><?php echo $f['country'];?></option>
                            <option value="Singapore">Singapore</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="China">China</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Vietnam">Vietnam</option>
                            <option disabled="disabled">---------------------------</option>
                            <option value="United States">United States</option> 
                            <option value="United Kingdom">United Kingdom</option> 
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option> 
                            <option value="Algeria">Algeria</option> 
                            <option value="American Samoa">American Samoa</option> 
                            <option value="Andorra">Andorra</option> 
                            <option value="Angola">Angola</option> 
                            <option value="Anguilla">Anguilla</option> 
                            <option value="Antarctica">Antarctica</option> 
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                            <option value="Argentina">Argentina</option> 
                            <option value="Armenia">Armenia</option> 
                            <option value="Aruba">Aruba</option> 
                            <option value="Australia">Australia</option> 
                            <option value="Austria">Austria</option> 
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option> 
                            <option value="Bahrain">Bahrain</option> 
                            <option value="Bangladesh">Bangladesh</option> 
                            <option value="Barbados">Barbados</option> 
                            <option value="Belarus">Belarus</option> 
                            <option value="Belgium">Belgium</option> 
                            <option value="Belize">Belize</option> 
                            <option value="Benin">Benin</option> 
                            <option value="Bermuda">Bermuda</option> 
                            <option value="Bhutan">Bhutan</option> 
                            <option value="Bolivia">Bolivia</option> 
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                            <option value="Botswana">Botswana</option> 
                            <option value="Bouvet Island">Bouvet Island</option> 
                            <option value="Brazil">Brazil</option> 
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                            <option value="Brunei Darussalam">Brunei Darussalam</option> 
                            <option value="Bulgaria">Bulgaria</option> 
                            <option value="Burkina Faso">Burkina Faso</option> 
                            <option value="Burundi">Burundi</option> 
                            <option value="Cambodia">Cambodia</option> 
                            <option value="Cameroon">Cameroon</option> 
                            <option value="Canada">Canada</option> 
                            <option value="Cape Verde">Cape Verde</option> 
                            <option value="Cayman Islands">Cayman Islands</option> 
                            <option value="Central African Republic">Central African Republic</option> 
                            <option value="Chad">Chad</option> 
                            <option value="Chile">Chile</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                            <option value="Colombia">Colombia</option> 
                            <option value="Comoros">Comoros</option> 
                            <option value="Congo">Congo</option> 
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                            <option value="Cook Islands">Cook Islands</option> 
                            <option value="Costa Rica">Costa Rica</option> 
                            <option value="Cote D'ivoire">Cote D'ivoire</option> 
                            <option value="Croatia">Croatia</option> 
                            <option value="Cuba">Cuba</option> 
                            <option value="Cyprus">Cyprus</option> 
                            <option value="Czech Republic">Czech Republic</option> 
                            <option value="Denmark">Denmark</option> 
                            <option value="Djibouti">Djibouti</option> 
                            <option value="Dominica">Dominica</option> 
                            <option value="Dominican Republic">Dominican Republic</option> 
                            <option value="Ecuador">Ecuador</option> 
                            <option value="Egypt">Egypt</option> 
                            <option value="El Salvador">El Salvador</option> 
                            <option value="Equatorial Guinea">Equatorial Guinea</option> 
                            <option value="Eritrea">Eritrea</option> 
                            <option value="Estonia">Estonia</option> 
                            <option value="Ethiopia">Ethiopia</option> 
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                            <option value="Faroe Islands">Faroe Islands</option> 
                            <option value="Fiji">Fiji</option> 
                            <option value="Finland">Finland</option> 
                            <option value="France">France</option> 
                            <option value="French Guiana">French Guiana</option> 
                            <option value="French Polynesia">French Polynesia</option> 
                            <option value="French Southern Territories">French Southern Territories</option> 
                            <option value="Gabon">Gabon</option> 
                            <option value="Gambia">Gambia</option> 
                            <option value="Georgia">Georgia</option> 
                            <option value="Germany">Germany</option> 
                            <option value="Ghana">Ghana</option> 
                            <option value="Gibraltar">Gibraltar</option> 
                            <option value="Greece">Greece</option> 
                            <option value="Greenland">Greenland</option> 
                            <option value="Grenada">Grenada</option> 
                            <option value="Guadeloupe">Guadeloupe</option> 
                            <option value="Guam">Guam</option> 
                            <option value="Guatemala">Guatemala</option> 
                            <option value="Guinea">Guinea</option> 
                            <option value="Guinea-bissau">Guinea-bissau</option> 
                            <option value="Guyana">Guyana</option> 
                            <option value="Haiti">Haiti</option> 
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                            <option value="Honduras">Honduras</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option> 
                            <option value="India">India</option> 
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option> 
                            <option value="Ireland">Ireland</option> 
                            <option value="Israel">Israel</option> 
                            <option value="Italy">Italy</option> 
                            <option value="Jamaica">Jamaica</option> 
                            <option value="Japan">Japan</option> 
                            <option value="Jordan">Jordan</option> 
                            <option value="Kazakhstan">Kazakhstan</option> 
                            <option value="Kenya">Kenya</option> 
                            <option value="Kiribati">Kiribati</option> 
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                            <option value="Korea, Republic of">Korea, Republic of</option> 
                            <option value="Kuwait">Kuwait</option> 
                            <option value="Kyrgyzstan">Kyrgyzstan</option> 
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                            <option value="Latvia">Latvia</option> 
                            <option value="Lebanon">Lebanon</option> 
                            <option value="Lesotho">Lesotho</option> 
                            <option value="Liberia">Liberia</option> 
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                            <option value="Liechtenstein">Liechtenstein</option> 
                            <option value="Lithuania">Lithuania</option> 
                            <option value="Luxembourg">Luxembourg</option> 
                            <option value="Macao">Macao</option> 
                            <option value="Macedonia">Macedonia</option> 
                            <option value="Madagascar">Madagascar</option> 
                            <option value="Malawi">Malawi</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option> 
                            <option value="Malta">Malta</option> 
                            <option value="Marshall Islands">Marshall Islands</option> 
                            <option value="Martinique">Martinique</option> 
                            <option value="Mauritania">Mauritania</option> 
                            <option value="Mauritius">Mauritius</option> 
                            <option value="Mayotte">Mayotte</option> 
                            <option value="Mexico">Mexico</option> 
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                            <option value="Moldova, Republic of">Moldova, Republic of</option> 
                            <option value="Monaco">Monaco</option> 
                            <option value="Mongolia">Mongolia</option> 
                            <option value="Montserrat">Montserrat</option> 
                            <option value="Morocco">Morocco</option> 
                            <option value="Mozambique">Mozambique</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option> 
                            <option value="Nepal">Nepal</option> 
                            <option value="Netherlands">Netherlands</option> 
                            <option value="Netherlands Antilles">Netherlands Antilles</option> 
                            <option value="New Caledonia">New Caledonia</option> 
                            <option value="New Zealand">New Zealand</option> 
                            <option value="Nicaragua">Nicaragua</option> 
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option> 
                            <option value="Norfolk Island">Norfolk Island</option> 
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                            <option value="Norway">Norway</option> 
                            <option value="Oman">Oman</option> 
                            <option value="Pakistan">Pakistan</option> 
                            <option value="Palau">Palau</option> 
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                            <option value="Panama">Panama</option> 
                            <option value="Papua New Guinea">Papua New Guinea</option> 
                            <option value="Paraguay">Paraguay</option> 
                            <option value="Peru">Peru</option> 
                            <option value="Philippines">Philippines</option> 
                            <option value="Pitcairn">Pitcairn</option> 
                            <option value="Poland">Poland</option> 
                            <option value="Portugal">Portugal</option> 
                            <option value="Puerto Rico">Puerto Rico</option> 
                            <option value="Qatar">Qatar</option> 
                            <option value="Reunion">Reunion</option> 
                            <option value="Romania">Romania</option> 
                            <option value="Russian Federation">Russian Federation</option> 
                            <option value="Rwanda">Rwanda</option> 
                            <option value="Saint Helena">Saint Helena</option> 
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                            <option value="Saint Lucia">Saint Lucia</option> 
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                            <option value="Samoa">Samoa</option> 
                            <option value="San Marino">San Marino</option> 
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                            <option value="Saudi Arabia">Saudi Arabia</option> 
                            <option value="Senegal">Senegal</option> 
                            <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                            <option value="Seychelles">Seychelles</option> 
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option> 
                            <option value="Solomon Islands">Solomon Islands</option> 
                            <option value="Somalia">Somalia</option> 
                            <option value="South Africa">South Africa</option> 
                            <option value="South Georgia">South Georgia</option> 
                            <option value="Spain">Spain</option> 
                            <option value="Sri Lanka">Sri Lanka</option> 
                            <option value="Sudan">Sudan</option> 
                            <option value="Suriname">Suriname</option> 
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                            <option value="Swaziland">Swaziland</option> 
                            <option value="Sweden">Sweden</option> 
                            <option value="Switzerland">Switzerland</option> 
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                            <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                            <option value="Tajikistan">Tajikistan</option> 
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option> 
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                            <option value="Tunisia">Tunisia</option> 
                            <option value="Turkey">Turkey</option> 
                            <option value="Turkmenistan">Turkmenistan</option> 
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                            <option value="Tuvalu">Tuvalu</option> 
                            <option value="Uganda">Uganda</option> 
                            <option value="Ukraine">Ukraine</option> 
                            <option value="United Arab Emirates">United Arab Emirates</option> 
                            <option value="United Kingdom">United Kingdom</option> 
                            <option value="United States">United States</option> 
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                            <option value="Uruguay">Uruguay</option> 
                            <option value="Uzbekistan">Uzbekistan</option> 
                            <option value="Vanuatu">Vanuatu</option> 
                            <option value="Venezuela">Venezuela</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                            <option value="Wallis and Futuna">Wallis and Futuna</option> 
                            <option value="Western Sahara">Western Sahara</option> 
                            <option value="Yemen">Yemen</option> 
                            <option value="Zambia">Zambia</option> 
                            <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                          </div>
                        </div>
                      </div>



                    

                     <div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        <div class="col-md-6">
                          <label for="exampleInputUrl">State:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="ti-world"></i></span>
                            <input type="text" name="first_name8" class="form-control" id="exampleInputUrl"  value="<?php echo $f['state'];?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputCity">City:</label>
                          <input type="text" name="first_name9" value="<?php echo $f['city'];?>"  class="form-control" id="exampleInputCity">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        <div class="col-md-6">
                          <label for="exampleInputZip">Zip Code:</label>
                          <input type="text" name="first_name10" value="<?php echo $f['zipcode'];?>"  class="form-control" id="exampleInputZip">
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputCity">Contact Number:</label>
                          <input type="text" name="first_name11" value="<?php echo $f['telephone'];?>" <?php if($f['telephone']!=""){ ?> readonly <?php } ?>  class="form-control" id="exampleInputCity">
                        </div>
                      </div>
                    </div>
                    

                    <!--<div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        <div class="col-md-6">
                          <label for="exampleInputCity">BTC Address:</label>
                          <input type="text" name="btc_add" value="<?php echo $f['btc_add'];?>" <?php if($f['btc_add']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputZip">Date Of Birth (yyyy-mm-dd):</label>
                          <input type="text" name="first_name12" value="<?php echo $f['dob'];?>" class="form-control" id="exampleInputZip">
                        </div>
                      </div>
                    </div>-->
                    <!--<div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        <div class="col-md-6">
                          <label for="exampleInputCity">Lite Coin Address:</label>
                          <input type="text" name="ltc_add" value="<?php echo $f['ltc_add'];?>" <?php if($f['ltc_add']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>
                         <div class="col-md-6">
                          <label for="exampleInputCity">Ethereum Address:</label>
                          <input type="text" name="etc_add" value="<?php echo $f['etc_add'];?>" <?php if($f['etc_add']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>
                      </div>
                    </div>-->
                    
                    <!--<div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        <div class="col-md-6">
                          <label for="exampleInputCity">Beneficiary’s Full Name:</label>
                          <input type="text" name="acc_name" value="<?php echo $f['acc_name'];?>" <?php if($f['acc_name']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>
                         <div class="col-md-6">
                          <label for="exampleInputCity">Bank Name:</label>
                          <input type="text" name="bank_nm" value="<?php echo $f['bank_nm'];?>" <?php if($f['bank_nm']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>
                      </div>
                    </div>-->
                    
                    <!--<div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        <div class="col-md-6">
                          <label for="exampleInputCity">Bank Account Number:</label>
                          <input type="text" name="ac_no" value="<?php echo $f['ac_no'];?>" <?php if($f['ac_no']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>-->
                         <!--<div class="col-md-6">
                          <label for="exampleInputCity">Branch Code:</label>
                          <input type="text" name="branch_code" value="<?php echo $f['branch_code'];?>" <?php if($f['branch_code']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>-->
                        <!--<div class="col-md-6">
                          <label for="exampleInputCity">Branch Name:</label>
                          <input type="text" name="branch_nm" value="<?php echo $f['branch_nm'];?>" <?php if($f['branch_nm']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>
                        
                      </div>
                    </div>-->
                    
                    <div class="form-group">
                      <div class="row" style="margin:0 -10px">
                        
                        <!--<div class="col-md-6">
                          <label for="exampleInputCity">Swift Code:</label>
                          <input type="text" name="swift_code" value="<?php echo $f['swift_code'];?>" <?php if($f['swift_code']!=''){?> readonly <?php }?>   class="form-control" id="exampleInputCity">
                        </div>-->
						<div class="col-md-6">
                          <label for="exampleInputZip">Date Of Birth (yyyy-mm-dd):</label>
                          <input type="text" name="first_name12" value="<?php echo $f['dob'];?>" class="form-control" id="exampleInputZip">
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputState">Gender:</label>
                          <select class="form-control" name="first_name13" id="exampleInputState">
                            <option value="<?php echo $f['sex'];?>"><?php echo $f['sex'];?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>       
                        </div>
                      </div>
                    </div>
                    
                    <!--<div class="form-group">
                      <div class="row" style="margin:0 -10px">-->
                        <!--<div class="col-md-6">
                          <label for="exampleInputState">Gender:</label>
                          <select class="form-control" name="first_name13" id="exampleInputState">
                            <option value="<?php echo $f['sex'];?>"><?php echo $f['sex'];?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>       
                        </div>-->
                        <!--<div class="col-md-6">-->
                        <!--  <label for="exampleInputCity">ID Number:</label>-->
                        <!--  <input type="text" name="id_no" value="<?php echo $f['id_no'];?>" <?php if($f['id_no']!=''){?> readonly <?php }?> class="form-control" id="exampleInputCity">-->
                        <!--</div>-->
                      <!--</div>
                    </div>-->

                
                      
                 <!--    <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputState">Upload Id Proof:</label>
                      <input type="file" id="pancard_proof_image" name="pancard_proof_image"   <?php if($f['id_card']!=''){?> readonly <?php }?> class="form-control">  
                    </div>  -->
                     <!-- <div class="form-group col-md-6 no-right-padding">
                      <label for="exampleInputState">Proof:</label>

                      <?php if($f['id_card']!='') { ?>

                      
                      <img src="images/<?php echo $f['id_card'];?>" width='150' height='150'>  

                      <?php } else { ?> <img src="nopreview.jpg" width='150' height='150'>    <?php } ?>
                    </div>   -->         
                    
                       
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update"  class="btn btn-primary">
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

              <form name="image" method="post" enctype="multipart/form-data">
              <section class="panel panel-primary">

                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">Change Profile Photo</h4>
                <div class="panel-body">
                  <div style="text-align:center;"> <img src="<?php echo $userimage;?>" style="border:2px solid #000;width:90px;"></div>
                  <br/>
                  <div class="form-group">
                    <label for="exampleInputFile">Picture</label>
                    <input type="file" name="uploadedfile" id="exampleInputFile" required>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="modify" value="Upload" <?php //if($f['update_status']=='1'){?>  <?php// }?> class="btn btn-primary">
                  </div>
                </div>
              </section>

 </form>
 
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
  </body>
</html>