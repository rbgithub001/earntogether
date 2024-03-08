<?php
	include("header.php");
	/*$_SESSION['pin']=$_POST['pin'];*/
	//check we have username post var
	if(isset($_POST["userid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$pin = trim($_POST["userid"]); 
	//sanitize pin
	$pin = filter_var($pin, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id,username FROM user_registration WHERE (user_id='$pin' || username='$pin') order by id");
	//return total count
	$pin_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_array($results);
	
	if(!$pin_exist) {
	echo "<font color='#FF0000'>"."  User not available !"."</font>";
	}else{
	echo "<font color='#009999'>".  $row_ref['username']." is available !</font>";
	}
	//close db connection
	}
?>