<?php
	include("../lib/config.php");
//	$_SESSION['sponsorid']=$_POST['sponsorid'];
	//check we have username post var
	if(isset($_POST["mobile"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$mobile =  strtolower(trim($_POST["mobile"])); 
	//sanitize username
//	$mobile = filter_var($sponsorid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
    //	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' or username='$sponsorid') and  user_status='0' and user_rank_name='Paid Member')");
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_id FROM user_registration WHERE telephone='$mobile' ");
	//return total count
echo	$username_exist = mysqli_num_rows($results); //total records
//	$row_ref=mysqli_fetch_array($results);
	
	//if value is more than 0, username is not available
	
// 	if(!$username_exist) {
// 	echo "<p style='color:red;'>"." Contact Number Already Exist ! "."</p>";
// 	}else{
	    
// 	 //   echo $row_ref['user_id'];
// //	echo "<p style='color:green'>".  $row_ref['first_name']." ".$row_ref['last_name']."( ".$row_ref['designation']." ) is your sponsor !</p>";
// 	}
	

	

	//close db connection
	}
?>