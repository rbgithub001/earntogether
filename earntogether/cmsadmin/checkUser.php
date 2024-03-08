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
	
	//check we have username post var
	if(isset($_POST["userid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   

	$uid = trim($_POST["userid"]); 
	//sanitize pin
	$uid = filter_var($uid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (user_id='$uid' || username='$uid')");
	//return total count
	$user_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_array($results);
	
	if(!$user_exist) {
	echo "<font color='#FF0000'>"."  Sorry user not available !"."</font>";
	}else{
	echo "<font color='#009999'>".$row_ref['username']." is available !</font>";
	}
	//close db connection
	}
?>