<?php
// define path constant for include file
define('ABSPATH','../lib/');

// include main file
include(ABSPATH.'functions.php'); 

// check point for login user and logout user

if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['action']) && isset($_POST['token']) ){
	
	if( !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['action']) && !empty($_POST['token']) ){
		// check token no and hit url

//   echo $_POST['token'].'<br>';
//   echo $_SESSION['rand_no'];die;
		if( $_POST['token'] == $_SESSION['rand_no']){
		//	print_r($_POST);die;
			// check user credential
			$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
			$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
			
//$password1= hash("sha256",$password);
//echo $password1;die;
//echo $username; print_r("<br/>");echo $password;print_r("<br/>");echo $password1;exit();
			$condition = " where username ='".$username."' and password ='".$password."'";
			$args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
			
			if($args_user['username']){
			    
				// check password
				if( $password == $args_user['password']){ 
					
					unset($_SESSION['salt']);
					unset($_SESSION['rand_no']);
					unset($_SESSION['captcha']);
					// check admin account status
					if( $args_user['stutus'] == 0 ){
						
						// update login of user
						$condition = " username ='".$username."'";
						$update_array = array('last_login'=>date('Y-m-d H:i:s'),'login_status'=>1);print_r($update_array);//die;
						if($mxDb->update_record('admin', $update_array, $condition)){
							//	echo "hi";die;
							$_SESSION['token_id'] = md5($args_user['user_id']);
							$_SESSION['user_id'] = $args_user['user_id'];								
							header("Location:index.php");
						
						}
						else{
							header("Location:login.php?msg=Login Failed. Please try again");
						}
					}
					else{
						header("Location:login.php?msg=Your account is suspent contact to Super admin");
					}
				}
				else{
					header("Location:login.php?msg=Your password is incorrect");
				}
				
			}
			else{
				header("Location:login.php?msg=Please enter correct username");
			}
		}
		else{
			header("Location:login.php?msg=Please enter correct username and password");
		}



	}
	else
		header("Location:".$_SERVER['HTTP_REFERER']);
}



// logout user 
if(isset($_REQUEST['logout'])){
	
	$condition = " user_id ='".$_SESSION['user_id']."'";
	$update_array = array('last_logout'=>date('Y-m-d H:i:s'),'login_status'=>0);
	if($mxDb->update_record('admin', $update_array, $condition)){
		
		// destroy login session
		unset($_SESSION['token_id']);
		unset($_SESSION['user_id']);
		header("Location:login.php?msg=Logout successfully!");
	}
	else{
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
}
?>