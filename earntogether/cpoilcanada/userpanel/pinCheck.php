<?php
	include("header.php");
	/*$_SESSION['pin']=$_POST['pin'];*/
	//check we have username post var
	if(isset($_POST["pin"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$pin = trim($_POST["pin"]); 
	//sanitize pin
	$pin = filter_var($pin, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pins WHERE ((receiver_id='$userid' and status='0') and pin_no='$pin') order by id");
	//return total count
	$pin_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_array($results);
	
	if(!$pin_exist) {
	echo "<font color='#FF0000'>"."  This pin is invalid for this user !"."</font>";
	}else{
	echo "<font color='#009999'>".  $row_ref['pin_no']." is valid for you !</font>";
	}
	//close db connection
	}
?>