<?php
ob_start();
include("lib/config.php");
include("GoogleAuthenticator.php");
define("Currency",'INR');
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

case "UserRegistration_admin":			
_UserRegistrationAdmin();
break;

case "Poc_Registration":			
_PocRegistration();
break;

case "pocloginuser":
_PocLoginUserCode();
break;
 
case "loginuser":
_LoginUserCode();
break;

case "ForgotPasswordPOC":			
_ForgotPasswordPOC();
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
function _AddUser(){
if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['username']) && isset($_POST['password']) )
{
if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) )
{

				global $mxDb;
				$user_id =rand(00000,99999);
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
						'email'=>$_POST['email'],
						'password'=>$_POST['password']
				);
				}
				else
				{
				$update = array(
						'name'=>$_POST['name'],
						'username'=>$_POST['username'],						
						'email'=>$_POST['email'],
						'password'=>$_POST['password']
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
					header("Location:cmsadmin/sub-admin-manage.php?msg=Update User successfully!&res=1");
				}
				else{
					header("Location:cmsadmin/sub-admin-manage.php?msg=Failed record updateion!&res=1");
				}
			}
			else
				header("Location:cmsadmin/sub-admin-manage.php?msg=Please fill fields information!&res=0");
		}
		else
			header("Location:cmsadmin/sub-admin-manage.php?msg=Please fill fields information!&res=0");
	
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
    
      $gaobj = new GoogleAuthenticator;
	
	 @$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
     @$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
         @$newpassword = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
     
     
       @$url=$_POST['url'];
  
$password=$newpassword;


     if($username!='' && $password!='' )
	 {
		if(strlen($username) && strlen($password))
        {
	 $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') ))");
			 $result2=mysqli_fetch_array($query);
			 
			 $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') ))");
			 $result=mysqli_fetch_array($query);
					if($num=mysqli_num_rows($query))
					{ 
                       if($result2['secret']!=''  && $result2['two_way']!='')
            			{
                		    
                                $oneCode = $_POST['2fa_code'];
                                $secret = $result2['secret'];
                                $checkResult = $gaobj->verifyCode($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
                                if (!$checkResult)
                                {
                                  $_SESSION['err']="Invalid 2FA Code";
                					header("location:userpanel/login.php?msg=Invalid 2FA Code");
                					exit;
                                }
            			}
						$pdb=$result['password'];
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
						$_SESSION['currency']='INR';
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
				         	 unset($_SESSION['captcha']);
				         	?>
				        	<script type="text/javascript">
						 window.location.href='userpanel/index.php';

						</script> 	
				         <?php
				         exit();
				          }

					}
					else
					{
						//$_SESSION['err']="Username and Password does not match";
						echo "<script>window.location.href='userpanel/login.php?msg=Username and Password does not match!'</script>";
	       			}
	 		} 
	}
}

/*User Login Code Ends here*/
/*Userid Generate Code Starts Here */
function userid()
{
$table_name='user_registration';
$pre_userid="CP".rand(100000,999999);
//$usid1=str_replace(".", "", $encypt1);
//$pre_userid = substr($usid1, 0, 7);
$checkid=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from $table_name where user_id='$pre_userid'");
if(mysqli_num_rows($checkid)>0)
{
userid();
}
else
return $pre_userid;
}
/*Userid Generate Code Ends Here */


/*Userid Generate Code for Vendor Starts Here */
function userids()
{
$table_name='poc_registration';
$pre_userid="TAV".rand(1000000,9999999);
//$usid1=str_replace(".", "", $encypt1);
//$pre_userid = substr($usid1, 0, 7);
$checkid=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from $table_name where user_id='$pre_userid'");
if(mysqli_num_rows($checkid)>0)
{
userids();
}
else
return $pre_userid;
}
/*Userid Generate Code for Vendor Ends Here */

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
    // echo "hi"; die();
	/*$letters_code=$_POST['letters_code'];
 	if(isset($_POST['captcha']) && !empty($_POST['captcha'])){
    if(strlen($_SESSION['captcha']) && $_POST['captcha'] == $_SESSION['captcha']){  */  
    // this is captcha code //
	//echo $_POST['radio-group']; die();
	//echo radio-group;
	global $mxDb;
	$term_cond=$_POST['term_cond'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$sponsorid1=$_POST['sponsorid'];
	
	$platform=$_POST['platform'];
	//$rank=$_POST['rank'];
	$amts=mysqli_fetch_array(mysqli_query("select * from status_maintenance where id='$platform'"));
	$amount=$amts['amount'];
	//echo $sponsorid1; die();
	if($sponsorid1!=''){
		$sponsorid1=$sponsorid1;
	}
	else{
	    $_SESSION['err']="Sponsor not available";
	    header("location:userpanel/register.php");
		exit;
	}
	
	$username=$_POST['username'];
	/*if(strlen($username) < 5){
	    $_SESSION['err']="Username should be 5 character long.";
		header("location:userpanel/register.php");
		exit;
	}*/

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
        $_SESSION['err']="Username does not accept special characters";
	    header("location:userpanel/register.php");
	    exit;
    }
    
	$usernamecheck=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where username = '$username'");
	$ucheck=mysqli_num_rows($usernamecheck);
	if($ucheck>0){
        $_SESSION['err']="Username has already exist";
	    header("location:userpanel/register.php");
	    exit;
	}	
	
	
	/*if($sponsorid1=='123456'){
	   header("location:userpanel/register.php?msg=This Sponsor Id is not used for registration !");
	    exit;
	}*/
		  
	$term_cond=$_POST['term_cond'];
	$password=$_POST['password'];
	// if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z]){8,20}$/', $password)) {
    //    	header("location:userpanel/register.php?msg=The password does not meet the requirements!");
	// 	 exit;
	// }

	$confirm_password=$_POST['confirm_password'];
	$confirm_email=$_POST['confirm_email'];
	//$email=$_POST['email'];
	$transaction_pwd=$_POST['password'];
	//if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z]){8,20}$/', $transaction_pwd)) {
    //header("location:userpanel/register.php?msg=Transaction password does not meet the requirements!");
	//exit;
	//}
	//$transaction_pwd1=$_POST['transaction_pwd1'];

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$country=$_POST['country'];
//	$phonecode = $_POST['phonecode'];
	$mobile=$_POST['mobile'];
	
	
	$phonecode = '91';  //$_POST['phonecode'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$limit_amt=$_POST['amount'];

	
	//$binary_pos=$_POST['radio-group'];

	//if($binary_pos!='')
	//{
	//	$binary_pos=$binary_pos;
    //	}
    //	else
	//{
	//	$binary_pos='right';
	//}


	$tran=$transaction_pwd;


    if($password!=$confirm_password){
	    $_SESSION['err']="Login password not match";
		header("location:userpanel/register.php");
		exit;
	}
	
	    if($email!=$confirm_email)
	{
		 $_SESSION['err']="Email not match";
		 header("location:userpanel/register.php");
		 exit;
	}

/*	if($transaction_pwd!=$transaction_pwd1)
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



//	$resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$sponsorid1' || username='$sponsorid1')  and user_rank_name='Paid Member')");
	$resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$sponsorid1' || username='$sponsorid1'))");
		  $resos1=mysqli_num_rows($resos);
		  if($resos1==0)
		  {
			  $_SESSION['err']="Sponsor not available";
		  header("location:userpanel/register.php");
		  exit;
		  }
		  
		 $resos23=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where email='$email'");
		  $resos123=mysqli_num_rows($resos23);
		  if($resos123>0)
		  {
			  $_SESSION['err']="Email already exist";
		  header("location:userpanel/register.php");
		  exit;
		  }

	$mobilecheck=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where telephone = '$mobile'");
		  $mcheck=mysqli_num_rows($mobilecheck);
		  if($mcheck>0)
		  {
			    $_SESSION['err']="mobile number already exist";
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
		//$sponsorid='123456';
		
		$_SESSION['err']="Your Sponsor is not correct, please check.";
		        header("location:userpanel/register.php");
		        exit;
	}


    $ref_id123=$sponsorid;

    $nom_id123='';
    $ref_id=$ref_id123;

	
   
    
    $nom_id123=$ref_id123;
    $email=$_POST['email'];
    if (1==1) {
	    $user_id=userid();
 	    if($user_id=='123456' || $user_id==''){
            $user_id=userid();
 	    }
 	   
 	   
 	    $fqueryrank=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='$rank'   "));
 	   //$desg= $fqueryrank['name'];
 	    $desg='Free User';

	    //$username=$user_id;
	 	$date=date('Y-m-d');
	 	$guest_ip   = $_SERVER['REMOTE_ADDR'];
        $token = rand(0000000001,9000000000);
        
        
        
	        $insert_array = array('user_id'=>$user_id, 'first_name'=>$firstname, 'last_name'=>$lastname,
	        'ref_id'=>$sponsorid,'nom_id'=>$sponsorid,'username'=>$username,'password'=>$password,
	        'email'=>$email, 'telephone'=>$mobile, 'country'=>$country, 'city'=>$city, 'state'=>$state,
	        'address'=>$address, 'phonecode'=>$phonecode, 'admin_status'=>"0",'user_status'=>"0",
	        'registration_date'=>$date,  'designation'=>$desg,'user_rank_name'=>'Free User',
	        't_code'=>$password,'slab' => '0','active_status'=>'0','rank'=>$rank,'user_plan'=>$platform,'limt_amt'=>$limit_amt);

		//$insert_array = array('user_id'=>$user_id, 'first_name'=>$firstname, 'last_name'=>$lastname, 'ref_id'=>$sponsorid,'username'=>$username,'password'=>$password,'first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email, 'telephone'=>$mobile, 'country'=>$country, 'phonecode'=>$phonecode, 'admin_status'=>"0",'user_status'=>"0",'registration_date'=>$date,  'designation'=>"Free User",'user_rank_name'=>'Free User','t_code'=>$tran, 'product_type'=>$guest_ip, 'token'=>$token, 'user_plan' => $platform);
	    $ceheckuser=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$user_id' || username='$user_id'))");
	    $ceheckuser1=mysqli_num_rows($ceheckuser);
	  
	    if($ceheckuser1==0){
		    $mxDb->insert_record('user_registration', $insert_array);
		    // mysqli_query("INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '".$_SESSION['platform']."', '".$_SESSION['lamount']."', '$ewallet_table1', '$pincodes', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','".$_SESSION['sponsorid']."','$pb')");
			
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
        	mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
        header("location:userpanel/thankyou.php?userid=$user_id");
        //	header("location:userpanel/thankyou.php?userid=$user_id&username=$username&password=$password");
	        exit();	
        }else{
            header("location:userpanel/register.php?msg=User already exist!!!");
	        exit();	
        }
        
		 
    } 
   




}
/*Ambassador Registration Code Ends Here */

/*User Registration By Admin Code Starts Here */
function _UserRegistrationAdmin(){
   
	global $mxDb;
	

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	
	$sponsorid1=$_POST['sponsorid'];// sponsor---10
	
	$sender_userid1 = $_POST['sender_userid'];    //sender--rank 
	
	$sender_user_id = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sender_userid1' || username='$sender_userid1') and user_status='0')");
	$sender_ref=mysqli_fetch_assoc($sender_user_id);
    $sender_userid=$sender_ref['user_id'];
	
	$rank=$_POST['newrank'];
	
	$genealogy=$_POST['genealogy'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];

	$email=$_POST['email'];
	$confirm_email=$_POST['confirm_email'];
	$country=$_POST['country'];
	$phonecode = '91';  //$_POST['phonecode'];
	$mobile=$_POST['mobile'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$reg_amt=$_POST['amount'];
	
	
	$amts=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from package where id=$reg_amt"));
	$limit_amt=$amts['max'];
	
	if($sponsorid1==$sender_userid){
	    $_SESSION['err']="Sponsor and In-Direct Member Cannot be same";
	    header("location:cmsadmin/add-user.php");
		exit;
	}
	
	
	
	if($sponsorid1!=''){
		$sponsorid1=$sponsorid1;
	}else{
	    $_SESSION['err']="Sponsor not available";
	    header("location:cmsadmin/add-user.php");
		exit;
	}
	
	$username=$_POST['username'];
	
	if(strlen($username) < 5){
	    $_SESSION['err']="Username should be 5 character long.";
		header("location:cmsadmin/add-user.php");
		exit;
	}

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
        $_SESSION['err']="Username does not accept special characters";
	    header("location:cmsadmin/add-user.php");
	    exit;
    }
    
	$usernamecheck=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where telephone = '$username'");
	$ucheck=mysqli_num_rows($usernamecheck);
	if($ucheck>0){
        $_SESSION['err']="Username has already exist";
	    header("location:cmsadmin/add-user.php");
	    exit;
	}	
	

    if($password!=$confirm_password){
	    $_SESSION['err']=" password not match";
		header("location:cmsadmin/add-user.php");
		exit;
	}
	
	    if($email!=$confirm_email)
	{
		 $_SESSION['err']="Email not match";
		 header("location:cmsadmin/add-user.php");
		 exit;
	}



//	$resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$sponsorid1' || username='$sponsorid1')  and user_rank_name='Paid Member')");
	$resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$sponsorid1' || username='$sponsorid1'))");
		  $resos1=mysqli_num_rows($resos);
		  if($resos1==0)
		  {
			  $_SESSION['err']="Sponsor not available";
		  header("location:cmsadmin/add-user.php");
		  exit;
		  }
	
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid1' || username='$sponsorid1') and user_status='0')");
	$row_ref=mysqli_fetch_assoc($results);
    $ref_id=$row_ref['user_id'];
    
    if($sender_userid!=''){
        $sponsorid=$sender_userid;
    }else{
        	$sponsorid=$ref_id;
    }
    

	if($sponsorid!='')
	{
		$sponsorid=$sponsorid;
	}
	else
	{
		//$sponsorid='123456';
		$_SESSION['err']="Please check your sponsor";
		        header("location:cmsadmin/add-user.php");
		        exit;
		
	}
    $ref_id123=$sponsorid;
    $nom_id123='';
    $ref_id=$ref_id123;

    $nom_id123=$ref_id123;
    
  //  $userrank=$_POST['rank'];
	    $user_id=userid();
 	    if($user_id=='123456' || $user_id==''){
            $user_id=userid();
 	    }
					 	
	    //$username=$user_id;
	 	$date=date('Y-m-d');
	 	$guest_ip   = $_SERVER['REMOTE_ADDR'];
        $token = rand(0000000001,9000000000);
        
        
     	$ranklist=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select name from user_rank_list where id=$rank"));

        $designation=$ranklist['name'];
       // if($sponsorid=='123456'){
             $insert_array = array('user_id'=>$user_id, 'first_name'=>$firstname, 'last_name'=>$lastname, 'ref_id'=>$sponsorid,'nom_id'=>$sponsorid,
             'username'=>$username,'password'=>$password,'email'=>$email, 'telephone'=>$mobile, 'country'=>$country, 'phonecode'=>$phonecode, 
             'state'=>$state,'city'=>$city,'address'=>$address,'admin_status'=>"0",'user_status'=>"0",'registration_date'=>$date,  
             'designation'=>$designation,'user_rank_name'=>$designation,'t_code'=>$password,'slab' => '0','active_status'=>'0','rank'=>$rank,
             'user_plan'=>$platform,'co_founder'=>'1','limt_amt'=>$limit_amt, 'genealogy'=>$genealogy, 'sender_userid'=>$sponsorid1); 
             
             //echo '<pre>'; print_r($insert_array);die;
             
        $ceheckuser=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ((user_id='$user_id' || username='$user_id'))");
	    $ceheckuser1=mysqli_num_rows($ceheckuser);
	  
	    if($ceheckuser1==0){
		    $mxDb->insert_record('user_registration', $insert_array);
		    // mysqli_query("INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '".$_SESSION['platform']."', '".$_SESSION['lamount']."', '$ewallet_table1', '$pincodes', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','".$_SESSION['sponsorid']."','$pb')");
			
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
        	mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
        // 	mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_e_wallet values(NULL,'$user_id','0','0')");
        	
         	
         	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) 
        	VALUES (NULL, '$user_id', '$platform', '$limit_amt', 'By Admin', '123456', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','$sponsorid','')");


        	   $ttype2="Registration Level Income";
        	   
        	         /*Direct Sponsor Commission and Sender Commission*/
       
      $direct_comm =  $limit_amt*10/100;
      
      $direct_comm_after = $limit_amt-$direct_comm;
      
      mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$direct_comm) where user_id='".$sponsorid1."'");
         
      
    $directcom="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`,`commis_amt`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
    VALUES ('$token','$user_id','$direct_comm','0','0','$sponsorid1','$user_id','$date','Direct Register Commission','Sponsor Commission','','$comm_amt','Direct Register Commission','$inv','0','0','By Admin','$relcomper','$spc','10','$limit_amt')";
    
    mysqli_query($GLOBALS["___mysqli_ston"], $directcom);
      
      /*SENDE COMMISSION*/
      
/*	$sender = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sender_userid' || username='$sender_userid') and user_status='0')");
	$sender_ref=mysqli_fetch_assoc($sender);
    $sender_id=$sender_ref['user_id'];
    $sender_rank=$sender_ref['rank'];
      
      	$sender_rank_per = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  user_rank_list WHERE id=$sender_rank"));
      	$sen_per = $sender_rank_per['level_per'];
      
    if($sender_id!=''){
        
      $sender_usercom = $direct_comm_after*$sen_per/100; 
      
      $newregamount  = $limit_amt-$sender_usercom;
       
    $sendercom="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`,`commis_amt`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
    VALUES ('$invoice_no','$user_id','$sender_usercom','0','0','$sender_userid','$user_id','$date','Sender Register Commission','Sender Commission','','$comm_amt','Sender Register Commission','$inv','0','0','By Admin','$relcomper','$spc','$sen_per','$limit_amt')";
    
    mysqli_query($GLOBALS["___mysqli_ston"], $directcom);
       
    }*/
    
/*commission level-*/
        	
        	$data_level1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$user_id' ");
        	
                      while($data_level12=mysqli_fetch_array($data_level1))
                      {
                        $income_id=$data_level12['income_id'];   
                        
                        $chktdsdset = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_registration` where user_id='$income_id' "));
                    
                        $rank_id=$chktdsdset['rank'];   
                        
                    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='$rank_id' "));
                    $commissionid=$comm['id'];
                    $commissionlvl=$comm['level_per'];
                    
                       $spc=$commissionlvl;
                    
                        // $comm_amt=$newregamount*$spc/100;
                         $comm_amt=$limit_amt*$spc/100;
                          
                        if ($comm_amt>0 && $spc>0 ) {
                     
                                   
                                    $quesale="INSERT INTO `credit_debit`(`transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`,`commis_amt`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,  `current_url`, `package_id`, `percent`, `total_invesment_amount`) 
                                    VALUES ('$token','$user_id','$comm_amt','0','$spc','$income_id','$user_id','$date','$ttype2','$ttype2','$commissionlvl','$comm_amt','$ttype2','$inv','0','0','By Admin','$relcomper','$spc','$spc','$limit_amt')";
                                    
                                    $chkexecute2 =mysqli_query($GLOBALS["___mysqli_ston"], $quesale);
                                    
                         mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$comm_amt) where user_id='".$income_id."'");
         
                    } 
                          
                      }
  
  /*End commission level-*/
        	
        	
        	header("location:cmsadmin/member-list.php?msg=New User Registered Successfully!!");
	        exit();	
        }else{
            header("location:cmsadmin/add-user.php?msg=User already exist!!!");
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

$from = 'srdev@maxtratechnologies.net';
	     		
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
$mail->setFrom('srdev@maxtratechnologies.net', 'E Marketing Investment');
//Set an alternative reply-to address
$mail->addReplyTo('srdev@maxtratechnologies.net', 'E Marketing Investment');
//Set who the message is to be sent to
$mail->addAddress($email, 'srdev@maxtratechnologies.net');
//Set the subject line
$mail->Subject = 'Password Credential From E Marketing Investment';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$body=  '<!doctype html>
<html>

<head>
    
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
                   <a href="http://182.76.237.238/~syscheck/cantho/userpanel/new-password.php?user_id='.$userid.'&token='.$token.'&status='.$status.'" style="text-decoration:none;color:#fff;"> Generate New Password </a>
                </div>
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  E Marketing<br/> All rights reserved 2021 </p>
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
		        $end = date('Y-m-d', strtotime('+15 months'));
				
				$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$_SESSION['platform']."'"));
				$sponsor_benifit_bonus=$comm['sponsor_commission'];
				$pb=$comm['pb'];
				
				

				$rand = rand(0000001,9999999);
				$invoice_no=$user_id.$rand;
				$lfid="LJ".$user_id.$rand;
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");

	                     
	            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '".$_SESSION['platform']."', '".$_SESSION['lamount']."', '$ewallet_table1', '$t_password', '$invoice_no', '$subs_date', '$end', 'Package Purchase', CURRENT_TIMESTAMP, 'Active', '$invoice_no','$lfid','$paid_id','".$_SESSION['ref_username']."','$pb')");
    			mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice_no','$paid_id','0','".$wall1."','0','$user_id','$paid_id','$subs_date','Package Purchase','Package Purchase by $user_id','Package Purchase by $user_id ','Package Purchase $user_id','$invoice_no','Package Purchase by $user_id','0','Withdrawal Wallet','$urls')");
                
                $repli="Betvest/".$_SESSION['username'];
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
$mail->setFrom('admin@mymticlub.com', 'Betvest');
//Set an alternative reply-to address
$mail->addReplyTo('admin@mymticlub.com', 'Betvest');
//Set who the message is to be sent to
$mail->addAddress($email, 'Betvest');
//Set the subject line
$mail->Subject = 'Betvest Registration Confirmation';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!doctype html>
<html>

<head>
    
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
    $end = date('Y-m-d', strtotime('+15 months'));
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
		        $end = date('Y-m-d', strtotime('+15 months'));
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



 $repli="Betvest/".$usr['username'];
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
$mail->setFrom('admin@mymticlub.com', 'Betvest');
//Set an alternative reply-to address
$mail->addReplyTo('admin@mymticlub.com', 'Betvest');
//Set who the message is to be sent to
$mail->addAddress($email, 'admin@mymticlub.com');
//Set the subject line
$mail->Subject = 'Password Credential From Betvest';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body =  '<!doctype html>
<html>

<head>
    
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
                    
                    
                    <a href='.$repli.' style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">Confirm</a>
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



function _PocRegistration(){
    
	global $mxDb;
	$url="https://www.google.com/maps/search/";
	$firstname=$_POST['firstname'];
	$username=$_POST['username'];
	$description=$_POST['discription_one'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
    $t_code=$_POST['password'];
    $phonecode = $_POST['phonecode'];
    $company_reg_no = $_POST['company_reg_no'];
    
    //service register
    
   // echo $user_id;
   
   $title=$_POST['title'];
   $discription=$_POST['discription'];
   
   $service=$_POST['service'];
   $var1= count($_POST['service']);
   //echo $var;
  
    //$location=$_POST['location'];
	$city=$_POST['city'];
    $address=$_POST['address'];
    $lendmark=$_POST['lendmark'];
    $phone=$_POST['phone'];
    $sex=$_POST['sex'];
    $state=$_POST['state'];
    $stock_point=$_POST['stock_point'];
   // $country="India";
   $country=$_POST['country'];
      $loc=$url."+".$city."+".$state."+".$country;
    $franchise_category=$_POST['franchise_category'];
    if($user_id=='123456' || $user_id==''){
        $user_id=userids();
	}
	if($franchise_category=='Master Franchise'){
       $franchise_satus=1;
    }else{
       $franchise_satus=0; 
    }	
    $gst=$_POST['gst'];
    $date=date('Y-m-d');
    $commission_percent = $_POST['commission_percent'];
    $credit_limit = $_POST['credit_limit'];
    $uploads_dir = 'uploads';
    $gallarr = array();
    
    
    foreach ($_FILES["file"]["tmp_name"] as $key => $tmp_name){
       /* $file_name=$_FILES["file"]["name"][$key];
        $file_tmp=$_FILES["file"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        
        $filename=trim(basename($file_name,$ext));
        
        $filename = str_replace(" ","",$filename);
        $newFileName=$filename.$ext;
        move_uploaded_file($_FILES["file"]["tmp_name"][$key],"uploads/".$newFileName);
        array_push($gallarr,$newFileName)*/;
    
    } 
        $file_tmp = count($_FILES['file']['name']);

     	$filename = [];

	for ($i = 0; $i < $file_tmp; $i++) {

		$fname = $_FILES['file']['name'][$i];

		$filename[] = $fname;

		 move_uploaded_file($_FILES['file']['tmp_name'][$i],"uploads/".$fname);
		$dd= implode(",", $filename);
    }
    
       
		$cmp_logo = $_FILES['cmp_logo']['name'];
		 move_uploaded_file($_FILES['cmp_logo']['tmp_name'],"uploads/cmplogo/".$cmp_logo);
		
   
   // $gallstr = implode(',',$gallarr);
    
    if($user_id!=''){
        $insert_array = array('user_id'=>$user_id, 'file'=>$dd ,'username'=>$username,'password'=>$password,'first_name'=>$firstname,'description'=>$description,
        'last_name'=>$lastname,'email'=>$email,'user_status'=>"0",'registration_date'=>$date,'t_code'=>$t_code,'location'=>$loc,'telephone'=>$phone,
        'address'=>$address,'city'=>$city,'sex'=>$sex,'state'=>$state,'country'=>$country,'phonecode'=>$phonecode,'lendmark'=>$lendmark,
        'franchise_category'=>$franchise_category,'franchise_satus'=>$franchise_satus,'stock_point'=>$stock_point,'gst'=>$gst,'cmp_logo'=>$cmp_logo,'commission_percent'=>$commission_percent, 'credit_limit'=>$credit_limit, 'company_reg_no'=>$company_reg_no);
        
        	

		if($mxDb->insert_record('poc_registration', $insert_array)){
		   // mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_register_details values(NULL,'$user_id[$i]','$service','$title','$discription')");
		     mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_e_wallet values(NULL,'$user_id','0','0')");
		    mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_income_wallet values(NULL,'$user_id','0','0')");
		    
		     for($i=0; $i<$var1; $i++){
       
        $qq=mysqli_query($GLOBALS["___mysqli_ston"], "insert into poc_register_details(`poc_userid`, `catogory`, `title`, `description`) values('".$user_id."','".$service[$i]."','".$title[$i]."','".$discription[$i]."')");
       // echo $qq; 
   }
		}
    }
	
    if ($stock_point!='') {
    	header("Location:cmsadmin/final_vendor_registration.php?msg=Registration Successfully");
    //		header("Location:cmsadmin/poc_registration.php?msg=Registration Successfully");
    // 	header("Location:cmsadmin/poc_registration.php?msg=Registration Successfully");
    	exit;
    }else{
    // 	header("Location:cmsadmin/poc_registration1.php?msg=Registration Successfully");
    
    	header("Location:cmsadmin/final_vendor_registration.php?msg=Registration Successfully");
    //	header("Location:cmsadmin/poc_registration.php?msg=Registration Successfully");
    	exit;
    }
}


/*User Login Code Starts here*/
function _PocLoginUserCode(){
    // echo "test";die;
	global $mxDb;
	@$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
    @$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
    @$url=$_POST['url'];
    if($username!='' && $password!='' ){
		if(strlen($username) && strlen($password)){
			$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where ((user_status='0' && admin_status='0') && ((email = '$username' || username='$username' || user_id='$username') && password = '$password'))");
			$result=mysqli_fetch_array($query);
			if($num=mysqli_num_rows($query)){ 
				$user_id=$result['user_id'];
				$_SESSION['SD_User_Name']=$result['username'];
				$_SESSION['puc_user_id']=$user_id;
				/* store the visitor info in table code start here*/
				$guest_ip   = $_SERVER['REMOTE_ADDR'];
   				$fo=$result['first_name']." ".$result['last_name'];
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into visitor values (NULL,'$user_id','".$result['username']."','$fo','$guest_ip',CURRENT_TIMESTAMP)");
				/* store the visitor info in table code ends here*/	
				if($url!=''){ 
		         ?>		
        			<script type="text/javascript">
        			    window.location.href='franchisepanel/index.php';
        			</script>
        	         <?php
        	         exit();  
				}
		        else{ ?>
		        	<script type="text/javascript">
				        window.location.href='franchisepanel/index.php';
				    </script> 	
		            <?php
		            exit();
	            }
			}
			else{
				header("location:franchise-login.php?msg=wrong");
   			}
	 	} 
	}
}
/*User Login Code Ends here*/



function _ForgotPasswordPOC(){

	global $mxDb;

	$strSubject = "Password Credential From nextgeneration";  

	if($_POST['email']!=''){
	    $email=$_POST['email'];
		$res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where email='$email'");
		$res1=mysqli_num_rows($res);
		if($res1 == '0'){
	        header("location:pucpanel/forgot.php?msg=Email not found in our database!");
		}
	    else{
            $res=mysqli_query($GLOBALS["___mysqli_ston"], "select * from poc_registration where email='$email'");
		    $res1=mysqli_fetch_array($res);
            $pass=$res1['password'];
            $username=$res1['first_name'];
            $user_id=$res1['user_id'];
            $t_code=$res1['t_code'];
            $desc='Hello '.$username.' Your password is '.$pass.' and your transaction password is '.$t_code.' . Regards Renzglobal'; 
            header("location:pucpanel/forgot.php?msg=Password sent to your email id!");
        }
    }
    else{
        header("location:pucpanel/forgot.php?msg=Unable to process try another time!");
    }
}
/*Forgot Password Code Ends here */






?>