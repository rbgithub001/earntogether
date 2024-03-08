<?php
    include("../lib/config.php");
	$_SESSION['sponsorid']=$_POST['sponsorid'];
	//check we have username post var
	if(isset($_POST["sponsorid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$sponsorid =  strtolower(trim($_POST["sponsorid"])); 
	//sanitize username
	$sponsorid = filter_var($sponsorid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
//	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' or username='$sponsorid') and  user_status='0' and user_rank_name='Paid Member')");
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' or username='$sponsorid') and  user_status='0')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_array($results);
	
	//if value is more than 0, username is not available
	//	if($row_ref['user_id']!='Emark00001')
	
	if(!$username_exist) {
	echo "<p style='color:red;'>"."  Sponsor Not Available ! "."</p>";
	}elseif($row_ref['user_id']=='Emark00001'){
	//echo "<p style='color:blue'>".  $row_ref['first_name']." ".$row_ref['last_name']." is your sponsor !</p>";
	 echo "<p style='color:blue'>".  $row_ref['first_name']." ".$row_ref['last_name']." is your sponsor and from this Sponsor Id you will become Co-founder !</p>";
	}else{
	  echo "<p style='color:blue'>".  $row_ref['first_name']." ".$row_ref['last_name']." is your sponsor !</p>";  
	}
	 
	//close db connection
	}
?>