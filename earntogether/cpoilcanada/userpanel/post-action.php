<?php
ob_start();
include("lib/config.php");
define("Currency",'RM');
$value1 = $_GET['action'];



if($value1!='')
{
$value = $_GET['action'];	
}
else
{
$value = $_POST['action'];
}

switch($value)
{

case "UserRegistration":			
_UserRegistration();
break;

  
case "loginuser":

_LoginUserCode();
break;

case "ForgotPassword":			
_ForgotPassword();
break;

case "ForgotTransactionPassword":			
_ForgotTransactionPassword();
break;

case "CheckUserEwalletBalance":
_CheckUserEwalletBalance();
break;

case "freeusertopaiduser":
_freeusertopaiduser();
break;


case "ProductShopNowEwalletPurchase":
_ProductShopNowEwalletPurchase();
break;

case "AddUser":
_AddUser();
break;

case "UpdateUser":
_UpdateUser();
break;

}


function _AddUser()
{

if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['username']) && isset($_POST['password']) )
{
if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) )
{

				global $mxDb;
				$user_id = rand(00000,99999);
				$insert = array(
						'name'=>$_POST['name'],
						'user_id'=>$user_id,
						'username'=>$_POST['username'],
						'password'=>$_POST['password'],
						'email'=>$_POST['email'],
						'type'=>'sub_admin',
						'date'=>date('Y-m-d'),
						'add_date_time'=>date('Y-m-d H:i:s')

				);

				if($mxDb->insert_record( 'admin', $insert ))
				{
					$privileage = $_POST['privileage'];

					foreach( $privileage as $privil)
					{

						$insert_array = array(

								'privilege_page'=>$privil,

								'date'=>date('Y-m-d'),

								'add_date_time'=>date('Y-m-d H:i:s'),

								'admin_id'=>$user_id

						           );
						$mxDb->insert_record( 'admin_privileges', $insert_array );

					}
					header("Location:cmsadmin/sub-admin-manage.php?msg=Add user successfully");
				}
				else{
					header("Location:cmsadmin/sub-admin-manage.php?msg=Failed record insertion");
				}
			}
			else
				header("Location:cmsadmin/add-sub-admin.php?msg=Please fill fields information");
		}
		else
			header("Location:cmsadmin/add-sub-admin.php?msg=Please fill fields information");

	}

function _UpdateUser()
{

		if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['username']) && isset($_POST['id']) )
		{
			if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username'])  && !empty($_POST['id']) )
			{
				global $mxDb;
				$user_id = $_POST['id'];

	            $res=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where user_id='$user_id'"));
				$res1=$res['password'];
	            if($res1==$_POST['password'])
				{
					$update = array(
						'name'=>$_POST['name'],
						'username'=>$_POST['username'],
						'email'=>$_POST['email']
				);
				}
				else
				{
				$update = array(
						'name'=>$_POST['name'],
						'username'=>$_POST['username'],						
						'email'=>$_POST['email']
				);
				}
				$where = " user_id=".$user_id;
				if($mxDb->update_record( 'admin', $update, $where ))
				{
					$mxDb->delete_record('admin_privileges', "admin_id='".$user_id."'");
					$privileage = $_POST['privileage'];
					foreach( $privileage as $privil){
						$insert_array = array(
								'privilege_page'=>$privil,
								'date'=>date('Y-m-d'),
								'add_date_time'=>date('Y-m-d H:i:s'),
								'admin_id'=>$user_id
						);
						$mxDb->insert_record( 'admin_privileges', $insert_array );
					}
					header("Location:cmsadmin/add-sub-admin.php?msg=Update User successfully!&res=1");
				}
				else{
					header("Location:cmsadmin/add-sub-admin.php?msg=Failed record updateion!&res=1");
				}
			}
			else
				header("Location:cmsadmin/add-sub-admin.php?msg=Please fill fields information!&res=0");
		}
		else
			header("Location:cmsadmin/add-sub-admin.php?msg=Please fill fields information!&res=0");
	
}




function  _ProductShopNowEwalletPurchase()
{

	global $mxDb;
	$date=date("Y-m-d");
	
     $Invoice=_generateInvoiceNo();
	 $payment_type=$_POST['payment_method'];print_r("<br/>");
	 $password = $_POST['password'];print_r("<br/>");
     $total_amount = $_POST['totalamount'];print_r("<br/>");
     $payment_user = $_POST['payment_user'];print_r("<br/>");

 

	 if($payment_type=='Ewallet')
	 {
		$ewallet_table='final_e_wallet'; 
		$ewallet_table1='E Wallet';
	 }



		if( ($password != '' && $total_amount != '') && ($payment_type!='') ){

		$condition = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$payment_user."' and t_code='$password'"));
		
		$condition1 = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewallet_table where user_id='".$payment_user."' and amount>='$total_amount'"));
		  $urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			//echo $condition;print_r("<br/>");
			//echo $condition1;  print_r("<br/>");
            //echo "select * from user_registration where user_id='".$payment_user."' and t_code='$password'";
            //echo "select * from $ewallet_table where user_id='".$payment_user."' and amount>='$total_amount'";
			//exit; 
		 

		if($condition>0 && $condition1>0)
		{
			mysqli_query($GLOBALS["___mysqli_ston"], "update $ewallet_table set amount=(amount-$total_amount) where user_id='$payment_user'");

	mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`)
	 values('$Invoice','$payment_user','0','".$total_amount."','0','123456','$payment_user','$date','Shop Now Store Product Purchase','Shop Now Storloginusere Product Purchase','Shop Now Store Product Purchase','Shop Now Store Product Purchase','$Invoice','Shop Now Store Product Purchase','0','E Wallet','$urls')");

		
				
      
	
    $_SESSION['purchaser_user_id']=$_SESSION['purchaser_id'];
	header("Location:shopnow-ewallet-purchase-payment-done.php?invoice=$Invoice&tran=kjhuyfbghnhjkk12345");
			exit();
	}
	
	
	else{
	header("Location:shopnow-ewallet-purchase-payment.php?tran=xyzabc1230987653gebdhsnsh&msg=Your Transaction Password Is Incorrect or In suffiecient fund");
	}
}
	else{
	header("Location:shopnow-ewallet-purchase-payment.php?tran=xyzabc1230987653gebdhsnsh&msg=Please enter the Password");
	}
	
	



}









/*User Login Code Starts here*/
function _LoginUserCode(){
	
	global $mxDb;



	// if(isset($letters_code) && !empty($_SESSION['6_letters_code'])){
	 
        
         
      var_dump($_POST)   ;die;
   //   if($_SESSION['6_letters_code']==$letters_code){
	 @$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
     @$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
         @$newpassword = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['newpassword']);
     
     
       @$url=$_POST['url'];
  
$password=$newpassword;


     if($username!='' && $password!='' )
	 {

		if(strlen($username) && strlen($password))
        {

			 $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') ))");
			 $result=mysqli_fetch_array($query);
					if($num=mysqli_num_rows($query))
					{ 

					echo 	$pdb=$password;die;
						$dbpwd=$pdb; 
 			              //$pwd=hash('sha256',$dbpwd);
						
/*echo $password;print_r("<br/>");
echo $pdb;print_r("<br/>");
echo $dbpwd;	print_r("<br/>");
exit;*/					
						if($password != $pdb )
	                    {
							$_SESSION['err']="Username and Password does not match";
							header("location:userpanel/login.php");
							exit;
						}
						$user_id=$result['user_id'];
						session_regenerate_id(true);
						
						$_SESSION['SD_User_Name']=$result['username'];
					
						$_SESSION['userpanel_user_id']=$user_id;

						/* store the visitor info in table code start here*/
						$guest_ip   = $_SERVER['REMOTE_ADDR'];
						$_SESSION['currency']='USD';
                        $_SESSION['rates']=1;


       					$fo=$result['first_name']." ".$result['last_name'];
						mysqli_query($GLOBALS["___mysqli_ston"], "insert into visitor values (NULL,'$user_id','".$result['username']."','$fo','$guest_ip',CURRENT_TIMESTAMP)");
						/* store the visitor info in table code ends here*/	

						if($url!='')
				         { 
				        		
				         ?>		
					 	<script type="text/javascript">
						 window.location.href='<?php echo $url; ?>';

						</script>

				         <?php
				         exit();  
				         }
				         else
				         {
				         	?>
				        	<script type="text/javascript">
						 window.location.href='userpanel/dashboard.php';

						</script> 	
				         <?php
				         exit();
				          }

					}
					else
					{
						$_SESSION['err']="Username and Password does not match";
						header("location:userpanel/login.php");
	       			}
	 		} 
	}
//}else{ 
            //             $_SESSION['err']="Captcha verification failed";

    		//			header("location:userpanel/login.php");
//}
//}else{ $_SESSION['err']="Captcha verification failed";
 //   header("location:userpanel/login.php");
//}
	
}
/*User Login Code Ends here*/


/*Userid Generate Code Starts Here */
function userid()
{
$table_name='user_registration';
$encypt1=uniqid(rand(1000000000,9999999999), true);
$usid1=str_replace(".", "", $encypt1);
$pre_userid = substr($usid1, 0, 7);
$checkid=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from $table_name where user_id='$pre_userid'");
if(mysqli_num_rows($checkid)>0)
{
userid();
}
else
return $pre_userid;
}
/*Userid Generate Code Ends Here */

function level_countdd($crid,$tpid)
{
	global $a;
	$query1="select * from user_registration where user_id='$crid'";
	$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
	$row=mysqli_fetch_array($result1);
	$rclid1=$row['nom_id'];
	$a=1;
	if($rclid1!=$tpid)
	{
		level_countdd($rclid1,$tpid);
		$a++;
	}
	else
	{
		$a=1;
	}
	return $a;
}
/*function to show user on which level code ends here*/


/*Registration Spill Code Starts Here for finding the nomid */
function spill_id1s2($sponserid,$posi)
{
global $nom_id;
$query1="select * from user_registration where nom_id='$sponserid' and binary_pos='$posi'";
$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
$row=mysqli_fetch_array($result1);
$rclid1=$row['user_id'];
if($rclid1!=""){
spill_id1s2($rclid1,$posi);
} 
else
{
$nom_id=$sponserid;
}
return $nom_id;
}

function mem_pos($ref_id123){
//$count_left_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='left'"));
//$count_right_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='right'"));

//GET WEAKER LEG BASED ON VOLUME AND NOT NUMBER OF USERS.
$left_condi=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$ref_id123' and leg='left'");
$leftamt1=0;
while($vccunt111=mysqli_fetch_array($left_condi))
{
    $left_userid=$vccunt111['down_id'];
    $working_e_wallet1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
    $leftamt1=$leftamt1+$working_e_wallet1['amount'];
}

$rightamt1=0;
$left_condi11=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct(down_id) from level_income_binary where income_id='$ref_id123' and leg='right'");
while($vccunt111=mysqli_fetch_array($left_condi11))
{
    $left_userid=$vccunt111['down_id'];
    $working_e_wallet2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from working_e_wallet where user_id='$left_userid' "));
    $working_e_wallet2['amount'];
    $rightamt1=$rightamt1+$working_e_wallet2['amount'];
}
$count_left_count=$leftamt1;
$count_right_count=$rightamt1;


// Check personally sponsored left or right if not 2
// $did_sponsor_1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$ref_id123'");
// $did_sponsor_2=mysqli_num_rows($did_sponsor_1);

// if($did_sponsor_2 == 1)
// {
//     $get_1_pos=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$ref_id123' limit 1"));
//     if($get_1_pos['binary_pos']=='right')
//     {
//         $posi='left';
//     }
//     else
//     {
//         $posi='right';
//     }
// }
// else if($did_sponsor_2 != 1)
// {
//     // if both leg same 
//     if($count_left_count==$count_right_count)
//     {
//         $posi='left';
//     }
//     else
//     {
//         // find the weeker leg
//         $min=min($count_left_count,$count_right_count);
//         if($min==$count_left_count){
//         $posi='left';
//     }
//         if($min==$count_right_count)
//         {
//             $posi='right';
//         }
//     }
// }
// return $posi;


if($count_left_count==$count_right_count)
{
$posi='left';
}
else
{
// find the weeker leg
$min=min($count_left_count,$count_right_count);
if($min==$count_left_count){
$posi='left';
}
if($min==$count_right_count){
$posi='right';
}
}
return $posi;
}
/*Registration Spill Code Ends Here for finding the nomid */

/*Ambassador Registration Code Starts Here */
function _UserRegistration(){
	
	$letters_code=$_POST['letters_code'];
//if($_SESSION['6_letters_code']!=$letters_code){
//$_SESSION['err']="Captcha code does not match";	
//header("Location:userpanel/register.php");
// exit();
//}
	
	global $mxDb;
	$term_cond=$_POST['term_cond'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$sponsorid1=$_POST['sponsorid'];

	if($sponsorid1!='')
	{
		$sponsorid1=$sponsorid1;
	}
	else
	{
		//$sponsorid1=123456;
		  $_SESSION['err']="Sponsor not available";
		  header("location:userpanel/register.php");
		  exit;
	}
	$platform=$_POST['platform'];
	echo $platform; die;
	$fquery=mysql_fetch_array(mysql_query("select * from status_maintenance where id='$platform'"));
	//print_r($fquery); die;
	
    $amount=$fquery['amount'];
    $plan_name=$fquery['name'];

	$username=$_POST['username'];
	$term_cond=$_POST['term_cond'];
	$password=$_POST['password'];
	// if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z]){8,20}$/', $password)) {

 //    	header("location:userpanel/register.php?msg=The password does not meet the requirements!");
	// 	 exit;
	// }

	//$confirm_password=$_POST['confirm_password'];
	$transaction_pwd=$_POST['password'];
	// if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z]){8,20}$/', $transaction_pwd)) {

 //    	header("location:userpanel/register.php?msg=Transaction password does not meet the requirements!");
	// 	 exit;
	// }
	//$transaction_pwd1=$_POST['transaction_pwd1'];

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$country=$_POST['country'];
	$mobile=$_POST['mobile'];
	$binary_pos=$_POST['position'];

	//if($binary_pos!='')
	//{
	//	$binary_pos=$binary_pos;
//	}
//	else
	//{
	//	$binary_pos='right';
	//}


	$tran=$transaction_pwd;


    /*if($password!=$confirm_password)
	{
		 $_SESSION['err']="Login password not match";
		 header("location:userpanel/register.php");
		 exit;
	}

	if($transaction_pwd!=$transaction_pwd1)
	{    
        $_SESSION['err']="Transaction password not match";
		 header("location:userpanel/register.php");
		 exit;
	}*/


	if($term_cond!='yes')
	{
		
		 $_SESSION['err']="Kindly accept the terms & condition";
		 header("location:userpanel/register.php");
		 exit;
	}



	$resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$sponsorid1' || username='$sponsorid1')  and user_rank_name='Paid Member')");
		  $resos1=mysqli_num_rows($resos);
		  if($resos1==0)
		  {
			  $_SESSION['err']="Sponsor not available";
		  header("location:userpanel/register.php");
		  exit;
		  }

		  $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$username' || username='$username'))");
		  $resos12=mysqli_num_rows($resos2);
		  if($resos12>0)
		  {			  
		  $_SESSION['err']="Username already exists";
		  header("location:userpanel/register.php");
		  exit;
		  }

	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid1' || username='$sponsorid1') and user_status='0')");
	$row_ref=mysqli_fetch_assoc($results);
    $ref_id=$row_ref['user_id'];

	$sponsorid=$ref_id;
	if($sponsorid!='')
	{
		$sponsorid=$sponsorid;
	}
	else
	{
		$sponsorid='123456';
	}


    $ref_id123=$sponsorid;

    if($binary_pos=='Auto' || $binary_pos=='')
    {
    $binary_pos=mem_pos($ref_id123);
    }
    else
    {
    	$binary_pos=$binary_pos;
    }

	

	

    $nom_id123='';
    $ref_id=$ref_id123;

    // $newquots=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$ref_id' and leg='$binary_pos' order by id desc");
    // while($newquots=mysqli_fetch_array($newquots))
    // {
    //   $newquots1=$newquots['down_id'];
    //   $vcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where user_id='$newquots1' and binary_pos='$binary_pos'"));
    //   if($vcount>0)
    //   {
    //   	$nom_id123=$newquots1;
    //   }
    //   else
    //   {
    //   	$nom_id123='';
    //   }

    //   if($nom_id123!='')
    //   {
    //   	break;
    //   }
    // }

	
    if($nom_id123!='')
    {
    $nom_id123=spill_id1s2($nom_id123,$binary_pos);
    }
    else
    {
    	  $nom_id123=spill_id1s2($ref_id123,$binary_pos);
    }

	
	$email=$_POST['email'];

	
	
	



 if (1==1) {
						$user_id=userid();
					 	if($user_id=='123456' || $user_id=='')
					 	{
                          $user_id=userid();
					 	}
					 	$date=date('Y-m-d');
					 	$guest_ip   = $_SERVER['REMOTE_ADDR'];
					 	
    		$insert_array = array('user_id'=>$user_id, 'first_name'=>$firstname, 'last_name'=>$lastname, 'ref_id'=>$sponsorid,'username'=>$username,'password'=>$password,'first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email, 'telephone'=>$mobile, 'country'=>$country,'admin_status'=>"0",'user_status'=>"0",'registration_date'=>$date,  'designation'=>"Free Member",'user_rank_name'=>'Free Member','t_code'=>$tran, 'product_type'=>$guest_ip);
			$mxDb->insert_record('user_registration', $insert_array);
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into working_e_wallet values(NULL,'$user_id','0','0')");
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into roi_e_wallet values(NULL,'$user_id','0','0')");

             /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$nom123=$sponsorid;
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$user_id."', income_id='$nom123', l_date='$date', status=0, level='$l1'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				}
				}	
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/


			   if($nom_id123!='' && $binary_pos!='')
			        		{
			        			$nom=$nom_id123;
								$pos=$binary_pos;
								$l=1;
								while($nom!='cmp'){
							    if($nom!='cmp' && $nom!=''){
								mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='".$user_id."', income_id='$nom', leg='$pos', l_date='".date('Y-m-d')."', status=0, level='$l'");
								$l++;
								$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom'  ");
								$fetchnompos=mysqli_fetch_array($selectnompos);
								$pos=$fetchnompos['binary_pos'];echo"<br>";
								$nom=$fetchnompos['nom_id'];echo"<br>";
								}
			        		   }
			        		  
			        		   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='".$nom_id123."', binary_pos='".$binary_pos."' where user_id='$user_id'");

			        	 }
			        	

$sponsorus1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$sponsorid'"));
$sponsorus=$sponsorus1['username'];


                $repli="https://E-marketin/userpanel/register.php?referral=".$username;
               
				//$strSubject = "Betvest Registration Confirmation";
			date_default_timezone_set('Asia/Kolkata');

require 'mailer/PHPMailerAutoload.php';

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
$mail->Host = "smtp-pulse.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
// $mail->Username = "cjsteynberg@gmail.com";

// //Password to use for SMTP authentication
// $mail->Password = "5TN32sCFKNrpMq";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('admin@mymticlub.com', 'E-marketing');
//Set an alternative reply-to address
$mail->addReplyTo('admin@mymticlub.com', 'E-marketing');
//Set who the message is to be sent to
$mail->addAddress($email, 'E-marketing');
//$mail->addAddress('cjsteynberg@gmail.com', 'Betvest');
//Set the subject line
$mail->Subject = 'E-marketing Registration Confirmation';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually

$body = '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="Betvest/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Registration Confirmation
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$username.' thank you for registering with MTI.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">Please do not share this information with anyone. Betvest will never ask you for your login information.</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Username  : '.$username.'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Password  : ************</h3>
                
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Replicated Link  : Betvest/?referral='.$_SESSION['username'].'</h3>
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2019 Betvest. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';
$mail->Body = $body;

$mail->IsHTML(true);



	$mail->send();

			//$_SESSION['userpanel_user_id']=$user_id;



			header("location:userpanel/thankyou.php?userid=$user_id&username=$username&password=$password");
			exit();
    }



}
/*Ambassador Registration Code Ends Here */


function _ForgotPassword(){

	global $mxDb;

 	if($_POST['email']!='')

	{

		$email=$_POST['email'];
        $userid=$_POST['userid'];
        $token = rand(0000000001,9000000000);
        
		 $res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email' and (user_id='$userid' || username='$userid')");

		 $res1=mysqli_num_rows($res);
		 if($res1 == 0)

        {
			  header("location:userpanel/forgot.php?msg=Userid / Email not found");
		}
		else
		{
      
		$res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email' and (user_id='$userid' || username='$userid')");


		  $res1=mysqli_fetch_array($res);
          $pass=$res1['password'];
          $status=$res1['user_status'];
          $username=$res1['username'];
          $user_id=$res1['user_id'];
          $t_code=$res1['t_code'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into forgot_password values(NULL,'$token','$userid','$email','$status')");

$from = 'admin@betvestinvestment.com';
	     		
date_default_timezone_set('Asia/Kolkata');

require 'mailer/PHPMailerAutoload.php';

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
//Set the hostname of the mail server
$mail->Host = "smtp-pulse.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

// //Username to use for SMTP authentication
// $mail->Username = "cjsteynberg@gmail.com";

// //Password to use for SMTP authentication
// $mail->Password = "5TN32sCFKNrpMq";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('admin@betvestinvestment.com', 'E-marketing');
//Set an alternative reply-to address
$mail->addReplyTo('admin@betvestinvestment.com', 'E-marketing');
//Set who the message is to be sent to
$mail->addAddress($email, 'admin@betvestinvestment.com');
//Set the subject line
$mail->Subject = 'Password Credential From E-marketing';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$body=  '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="Betvest/images/logo.png" height="70"><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Forgot Password Credential
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$username.' below are the credential of your account
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">Please donot share this information with any one for some security reason please update your password every month.</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">Your User ID : '.$user_id.'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">Your Username  : '.$username.'</h3>
   
                </div>
                <div class="ttl" style="margin: 14px 0px 0px 69px;width: 357px;font-family: Lato;font-weight: 400;color: rgb(255, 255, 255);font-size: 25px;line-height: 35px;padding: 6px 0px;background-color: rgb(230, 67, 60);">
                   <a href="https://betvest.com/userpanel/new-password.php?user_id='.$userid.'&token='.$token.'&status='.$status.'" style="text-decoration:none;color:#fff;"> Generate New Password </a>
                </div>
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Betvest<br/> All rights reserved 2019 </p>
                <div class="icon" style="width: 350px;float: left;margin: 18px 0px 25px 149px;">

                  
                   
                </div>
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';
                

$mail->Body = $body;

$mail->IsHTML(true);

                // Attachment s
//$mail->addAttachment("images/".$file);
//send the message, check for errors
if (!$mail->send()) {
  
    header("location:userpanel/forgot.php?msg=Your Credential not Sent ");
} else {
  
    header("location:userpanel/forgot.php?msg=Your Credential Successfully Sent");
}


}
}
}
/*Forgot Password Code Ends here */



/*Forgot Transaction Password Code start here */
function _ForgotTransactionPassword(){

	global $mxDb;

 

	if($_POST['email']!='')

	{

		$email=$_POST['email'];
        $userid=$_POST['userid'];
        $token = rand(0000000001,9000000000);
        
		 $res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email' and (user_id='$userid' || username='$userid')");

		 $res1=mysqli_num_rows($res);
		 if($res1 == 0)

        {
			  header("location:userpanel/forgot_transaction.php?msg=Userid / Email not found");

		  }

			  else

					  {
      

          $res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email' and (user_id='$userid' || username='$userid')");



		  $res1=mysqli_fetch_array($res);
          $pass=$res1['password'];
          $status=$res1['user_status'];
          $username=$res1['username'];
          $user_id=$res1['user_id'];
          $t_code=$res1['t_code'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into forgot_password values(NULL,'$token','$userid','$email','$status')");

$from = 'admin@mymticlub.com';
	     		
date_default_timezone_set('Asia/Kolkata');

require 'mailer/PHPMailerAutoload.php';

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
$mail->Host = "smtp-pulse.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
// $mail->Username = "cjsteynberg@gmail.com";

// //Password to use for SMTP authentication
// $mail->Password = "5TN32sCFKNrpMq";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('admin@mymticlub.com', 'admin@mymticlub.com');
//Set an alternative reply-to address
$mail->addReplyTo('admin@mymticlub.com', 'admin@mymticlub.com');
//Set who the message is to be sent to
$mail->addAddress($email, 'admin@mymticlub.com');
//Set the subject line
$mail->Subject = 'Password Credential From Betvest';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$body =  '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="Betvest/images/logo.png" height="70"><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Forgot Transaction Password Credential
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$username.' below are the credential of your account
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">Please donot share this information with any one for some security reason please update your password every month.</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">Your User ID : '.$user_id.'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px">Your Username  : '.$username.'</h3>
   
                </div>
                <div class="ttl" style="margin: 14px 0px 0px 69px;width: 357px;font-family: Lato;font-weight: 400;color: rgb(255, 255, 255);font-size: 25px;line-height: 35px;padding: 6px 0px;background-color: rgb(230, 67, 60);">
                   <a href="Betvest/userpanel/new-transaction-password.php?user_id='.$userid.'&token='.$token.'&status='.$status.'" style="text-decoration:none;color:#fff;"> Generate New Transaction Password </a>
                </div>
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Betvest<br/> All rights reserved 2018 </p>
                <div class="icon" style="width: 350px;float: left;margin: 18px 0px 25px 149px;">

                  
                   
                </div>
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';
                
                // Attachment s
//$mail->addAttachment("images/".$file);
//send the message, check for errors
$mail->Body = $body;

$mail->IsHTML(true);
if (!$mail->send()) {
  
    header("location:userpanel/forgot_transaction.php?msg=Your Credential not Sent ");
} else {
  
    header("location:userpanel/forgot_transaction.php?msg=Your Credential Successfully Sent");
}


}
}
}
/*Forgot Transaction Password Code Ends here */



/*Generate Invoice Number format code starts here*/
function _generateInvoiceNo(){
global $mxDb;
$rand = mt_rand(100000000000000,99999999999999999);
$condition = " where invoice_no='".$rand."'";
$args_invoice = $mxDb->get_information('lifejacket_subscription','invoice_no',$condition,true,'assoc');
if(isset($args_invoice['invoice_no']))
{
if($args_invoice['invoice_no'] == $rand)
_generateInvoiceNo();
else
return $rand;
}
else
return $rand;
}
/*Generate Invoice Number format code ends here*/




/*Payment and user register Code starts here*/
function  _CheckUserEwalletBalance(){
	global $mxDb;
	$date=date("Y-m-d");
	$payment_type=$_POST['payment_method'];print_r("<br/>");
	$username = $_POST['pay_username'];print_r("<br/>");
    $t_password = $_POST['pay_password'];print_r("<br/>");
    $total_amount = $_SESSION['lamount'];print_r("<br/>");
   
	if($payment_type=='Ewallet')
	{
		$ewallet_table='final_e_wallet'; 
		$ewallet_table1='Withdrawal Wallet';
	}
    $condition1 = " where (username='".$username."' || user_id='".$username."')";
	$args_sponsor1 = $mxDb->get_information('user_registration', 'user_id', $condition1, true, 'assoc');
	$paid_id1=$args_sponsor1['user_id'];
	if($paid_id1)
		{
		if( ($username != '' && $t_password != '') && ($payment_type!='') )
		{
		$condition = " where user_id='".$paid_id1."' and t_code='".$t_password."'";
		$args_sponsor = $mxDb->get_information('user_registration', 'user_id', $condition, true, 'assoc');
	   	$paid_id=$args_sponsor['user_id'];
		if( isset($args_sponsor['user_id']) ){
			$wallet_amount = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewallet_table where user_id='$paid_id'"));
			$cut_wallet=$wallet_amount['amount'];
		    $wall1=$total_amount;
		   	if(($cut_wallet>=$wall1))
			{
		
		    	$usercountry=$_SESSION['country'];
		   

		    $user_id=$_SESSION['user_id'];
			$_SESSION['newuserid']=$user_id;
		



			$insert_array = array('user_id'=>$user_id,'dob'=>$_SESSION['dob'], 'zipcode'=>$_SESSION['pincode'], 'issued'=>'NO', 'product_type'=>'', 'master_account'=>$_SESSION['masterid'], 'ref_id'=>$_SESSION['sponsorid'],'nom_id'=>$_SESSION['nomid'],'username'=>$_SESSION['username'],'password'=>$_SESSION['password'],'first_name'=>$_SESSION['firstname'],'last_name'=>$_SESSION['lastname'],'email'=>$_SESSION['email'],'country'=>$_SESSION['country'],'admin_status'=>"0",'user_status'=>"0",'registration_date'=>$date,'designation'=>"Normal User",'user_rank_name'=>'Normal User','t_code'=>$_SESSION['transaction_pwd'], 'state'=>$_SESSION['state'], 'city'=>$_SESSION['city'], 'telephone'=>$_SESSION['phone'], 'address'=>$_SESSION['address'], 'user_plan'=>$_SESSION['platform'], 'id_card'=>'Passport', 'id_no'=>$_SESSION['passport']);
			if($mxDb->insert_record('user_registration', $insert_array))
			{
		    $nom=$_SESSION['nomid'];
			$pos=$_SESSION['binary_pos'];
			$l=1;
			while($nom!='cmp'){
		    if($nom!='cmp'){
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='$user_id', income_id='$nom', leg='$pos', l_date='".date('Y-m-d')."', status=0, level='$l'");
			$l++;
			$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom' ");
			$fetchnompos=mysqli_fetch_array($selectnompos);
			$pos=$fetchnompos['binary_pos'];
			$nom=$fetchnompos['nom_id'];
			}
		}
	}

	
	mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='".$_SESSION['nomid']."', binary_pos='".$_SESSION['binary_pos']."' where user_id='$user_id'");

				$qur = mysqli_query($GLOBALS["___mysqli_ston"], "update $ewallet_table set amount=(amount-$wall1) where user_id='".$paid_id."'");
				if($qur){
                $urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

				}
				$subs_date=date('Y-m-d');
		        $end = date('Y-m-d', strtotime('+12 months'));
				
				$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_SESSION['platform']."'"));
				$sponsor_benifit_bonus=$comm['sponsor_commission'];
				$pb=$comm['pb'];
				
				

				$rand = rand(0000001,9999999);
				$invoice_no=$user_id.$rand;
				$lfid="LJ".$user_id.$rand;
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");

				

				


	           
	                     
	            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '".$_SESSION['platform']."', '".$_SESSION['lamount']."', '$ewallet_table1', '$t_password', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','".$_SESSION['ref_username']."','$pb')");
    			mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice_no','$paid_id','0','".$wall1."','0','$user_id','$paid_id','$subs_date','Package Purchase','Package Purchase by $user_id','Package Purchase by $user_id ','Package Purchase $user_id','$invoice_no','Package Purchase by $user_id','0','Withdrawal Wallet','$urls')");
                
                $repli="E-marketing/".$_SESSION['username'];
                $email=$_SESSION['email'];
				require 'mailer/PHPMailerAutoload.php';

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
$mail->Host = "smtp-pulse.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
// $mail->Username = "cjsteynberg@gmail.com";

// //Password to use for SMTP authentication
// $mail->Password = "5TN32sCFKNrpMq";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('admin@mymticlub.com', 'E-marketing');
//Set an alternative reply-to address
$mail->addReplyTo('admin@mymticlub.com', 'E-marketing');
//Set who the message is to be sent to
$mail->addAddress($email, 'E-marketing');
//Set the subject line
$mail->Subject = 'E-marketing Registration Confirmation';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="Betvest/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Registration Confirmation
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$_SESSION['username'].' thanks for registering with us.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">Please do not share this information with anyone.Betvest management will never ask you for your login information.</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> User ID : '.$_SESSION['user_id'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Username  : '.$_SESSION['username'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Sponsor Id  : '.$_SESSION['sponsorid'].'</h3>
                    
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Replicated Link  : Betvest/'.$_SESSION['username'].'</h3>
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2018 Betvest. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

	$mail->send();

	
				/*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$user_id'");
				while($upline=mysqli_fetch_array($upliners))
				{
				$income_id=$upline['income_id'];
				$position=$upline['leg'];
				$user_level=level_countdd($user_id,$income_id); 
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$user_id','$user_level','".$pb."','$position','Package Purchase Amount','$date',CURRENT_TIMESTAMP,'0','$pb')");
				}
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

				
			    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$nom123=$_SESSION['sponsorid'];
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$user_id."', income_id='$nom123', l_date='$date', status=0, level='$l1'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				}
				}	
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/
                
                $plan_nameing=$_SESSION['platform'];
			   
			    commission_of_referal($_SESSION['sponsorid'],$user_id,$pb,$invoice_no,$plan_nameing);
			    commission_of_level($user_id,$pb,$invoice_no,$plan_nameing);

			    //Rank_update();

			  

			    $_SESSION['userpanel_user_id']=$user_id;




				header("Location:userpanel/index.php");
				}
				else{
				header("Location:userpanel/ewallet-payment.php?msg=Insufficient fund in ewallet or company cash wallet");
				}
				}
				else{
				header("Location:userpanel/ewallet-payment.php?msg=Your username or transaction password is incorrect");
				}
				}
				else{
					header("Location:userpanel/ewallet-payment.php?msg=Please fill the details");
			    }

}
else
{
header("Location:userpanel/ewallet-payment.php?msg=Your Sponsor Id Not Match");
}
}
/*Payment and user register Code ends here*/



function _freeusertopaiduser(){
$password=$_POST['password'];
$amount=$_POST['amount'];
$userid=$_POST['uid'];
$packid=$_POST['package_id'];

	$cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_POST['package_id']."'"));
    $package_name=$comm['name'];
    $pbs1=$comm['pb'];
    
	$ewa='final_e_wallet';
	$walls="Withdrawal Wallet";
    $rand = rand(0000000001,9000000000);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+12 months'));
    $t_code1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' and t_code='$password'"));

    $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));

	if($t_code1>0)
	{
		$ewalletdetail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $ewa where user_id='$userid'"));
		$user_ewalletamt=$ewalletdetail['amount'];
		$urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        if($user_ewalletamt>=$amount)
        {
        $pv=$pbs1;
	    $lfid="LJ".$userid.$rand;
	   	$yes=mysqli_query($GLOBALS["___mysqli_ston"], "update $ewa set amount=(amount-$amount) where user_id='$userid'");
if($yes)
{
$ch = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE user_id='$userid'"));
if ($ch['user_id']!='') {
$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='".$ch['ref_id']."' and user_status='0')");
$row_ref=mysqli_fetch_assoc($results);
$ref_id=$row_ref['user_id'];	
$ref_username=$row_ref['username'];	
$ref_pos=$row_ref['binary_pos'];
$ref_id123=$ref_id;


if ($ch['binary_pos']!='') {
	$binary_pos=$ch['binary_pos'];
}else{
    
    	$binary_pos=mem_pos($ref_id123);
}
     
    	 // $binary_pos=mem_pos($ref_id123);
    	
   

    if($nom_id123!='')
    {
    	$nom_id123=$nom_id123;
    }
    else
    {
    	 $nom_id123=spill_id1s2($ref_id123,$binary_pos);
    }


	
    $resultings = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$nom_id123' || username='$nom_id123') and user_status='0')");
    $row_refing=mysqli_fetch_array($resultings);
    $nom_id1=$row_refing['user_id'];
    $nom_id=$nom_id1;
    $_SESSION['binary_pos']=$binary_pos;
    $_SESSION['nomid']=$nom_id123;


   			$nom=$nom_id123;
			$pos=$binary_pos;
			$l=1;
			while($nom!='cmp'){
		    if($nom!='cmp' && $nom!=''){
			mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='$userid', income_id='$nom', leg='$pos', l_date='".date('Y-m-d')."', status=0, level='$l'");
			$l++;
			$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom' ");
			$fetchnompos=mysqli_fetch_array($selectnompos);
			$pos=$fetchnompos['binary_pos'];
			$nom=$fetchnompos['nom_id'];

			}
		}
		mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='".$nom_id123."', binary_pos='".$binary_pos."',user_plan='$packid' where user_id='$userid'");

				$usr=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid'"));
				$uplan=$usr['user_plan'];
				$subs_date=date('Y-m-d');
		        $end = date('Y-m-d', strtotime('+12 months'));
				$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$uplan."'"));
				$sponsor_benifit_bonus=$comm['sponsor_commission'];
				$pamount=$comm['amount'];
				$pb=$comm['pb'];
				$rand = rand(0000001,9999999);
				$invoice_no=$userid.$rand;
				$lfid="LJ".$userid.$rand;
				$ewallet_table1='Package Upgrade';
	                     
mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$userid', '$uplan', '$pamount', '$ewallet_table1', '".$usr['t_code']."', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','123456','".$usr['ref_id']."','$pb')");

mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice_no','$userid','0','".$amount."','0','$userid','123456','$subs_date','Package Purchase','Package Purchase by $userid','Package Purchase by $userid ','Package Purchase $userid','$invoice_no','Package Purchase by $userid','0','Withdrawal Wallet','$urls')");



 $repli="E-marketing/".$usr['username'];
                $email=$usr['email'];
				require 'mailer/PHPMailerAutoload.php';

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
$mail->Host = "smtp-pulse.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
// $mail->Username = "cjsteynberg@gmail.com";

// //Password to use for SMTP authentication
// $mail->Password = "5TN32sCFKNrpMq";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('admin@mymticlub.com', 'E-marketing');
//Set an alternative reply-to address
$mail->addReplyTo('admin@mymticlub.com', 'E-marketing');
//Set who the message is to be sent to
$mail->addAddress($email, 'admin@mymticlub.com');
//Set the subject line
$mail->Subject = 'Password Credential From E-marketing';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body =  '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="Betvest/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Registration Confirmation
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$usr['username'].' thanks for registering with us.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">Please do not share this information with anyone.Betvest management will never ask you for your login information.</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> User ID : '.$usr['user_id'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Username  : '.$usr['username'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Sponsor Id  : '.$usr['sponsorid'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Password  : '.$usr['password'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Transaction Password  : '.$usr['transaction_pwd'].'</h3>
                    <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Replicated Link  : '.$repli.'</h3>
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2018 Betvest. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

	$mail->send();

	$date=date('Y-m-d');
				/*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid'");
				while($upline=mysqli_fetch_array($upliners))
				{
				$income_id=$upline['income_id'];
				$position=$upline['leg'];
				$user_level=level_countdd($userid,$income_id); 
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','".$pb."','$position','Package Purchase Amount','$date',CURRENT_TIMESTAMP,'0','$pb')");
				}
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

				
			    /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$nom123=$usr['ref_id'];
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$userid."', income_id='$nom123', l_date='$date', status=0, level='$l1'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				}
				}	
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/
                
                $plan_nameing=$usr['user_plan'];
			   
			    commission_of_referal($usr['ref_id'],$userid,$pb,$invoice_no,$plan_nameing);
			    commission_of_level($userid,$pb,$invoice_no,$plan_nameing);

			    //Rank_update();

			  

			    $_SESSION['userpanel_user_id']=$userid;

header("location:userpanel/index.php");

}
}}else{
	header("location:userpanel/package-upgrade1.php?msg=Insufficient Balance");
	exit();
}

}
}


/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages)
{
	$date=date('Y-m-d');
	$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$packages."'"));
	$spc=$comm['sponsor_commission'];

	
	$withdrawal_commission=$spc*$amount/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0)
	{
	mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
	$urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");	

	}





}
/* Sponsor Commission Code Ends Here*/



function commission_of_level($user_id,$amount,$invoice_no,$plan_nameing)
{
	  $date=date('Y-m-d');
	  $user=$user_id;
      $select_upl=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$user_id' and level>1 and level<8");
      while($select_upl1=mysqli_fetch_array($select_upl))
      {
         $upid=$select_upl1['income_id'];

         $refc=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$upid'"));
         $upaln=$refc['user_plan'];


         $level=$select_upl1['level'];
         if($level==1)
         {
                $spc=0;
         }
         else if($level==2)
         {
                $spc=1;
         }
         else if($level==3)
         {
                   $spc=1;
         }
         else if($level==4)
         {
                  $spc=1.5;
         }
         else if($level==5)
         {
                 $spc=1.5;
         }
         else if($level==6)
         {
                 $spc=2;
         }
         else if($level==7)
         {
                 $spc=3;
         }
         else
         {
          $spc=0;
         }

            $withdrawal_commission=$amount*$spc/100;
            $rwallet=$withdrawal_commission;
            $invoice_no=$upid.rand(10000,99999);
            if($upaln==1)
            {
            	$stop=2;
            }
            else if($upaln==2)
            {
            	$stop=2;
            }
            else if($upaln==3)
            {
            	$stop=3;
            }
            else if($upaln==4)
            {
            	$stop=4;
            }
            else if($upaln==5)
            {
            	$stop=5;
            }
            else
            {
            	$stop=7;
            }

        
            if($withdrawal_commission!='' && $withdrawal_commission!=0 && $level<=$stop)
            {
            mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$upid."'");
            $urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$upid','$rwallet','0','0','$upid','$user','$date','Level Income','Earn Level Income from $useridss for $packages Package','Commission of USD $rwallet For Package ".$plan_nameing." ','Level Income','$invoice_no','Level Income','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");    
            }
                      
      }




} //function close here 






?>