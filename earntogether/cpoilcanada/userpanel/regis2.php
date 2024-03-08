<?php
	include("../lib/config.php");
	$_SESSION['username']=$_POST['username'];
	//check we have username post var
	if(isset($_POST["username"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 
	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE username='$username'");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	//if value is more than 0, username is not available
	if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
	    echo "<p style='color:#FF0000'>"."  Username does not accept special character !"."</p>";
	    exit();
	}
	    
	if($username_exist) {
//	echo "<p style='color:#FF0000'>"."  Username Already Exists !"."</p>";
        echo 1;
	}else{
//	echo "<p style='color:#009999'>"."  Congrats User Name Available !"."</p>";
        echo 2;
	}
	//close db connection
	}
?>