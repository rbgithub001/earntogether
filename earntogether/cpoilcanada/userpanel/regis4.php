<?php
	ini_set("memory_limit",-1);
	ini_set('max_execution_time', 300);
	include("../lib/config.php");
	$_SESSION['placementid']=$_POST['placementid'];
	//check we have username post var
	if(isset($_POST["placementid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$placementid =  strtolower(trim($_POST["placementid"])); 
	$refid =  strtolower(trim($_POST["placementid"]));
	$select2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE (username='$placementid' OR user_id= '$placementid')"));
	$placementid =  $select2['user_id'];
	if($placementid!='')
	{
	$refid =  strtolower(trim($_POST["refid"])); 
	$refid = strtoupper($refid);
	$placementid = strtoupper($placementid);
	if($refid==$placementid)
	{
	$nom=$placementid;	
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$nom' or username='$nom') and  user_status='0')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_assoc($results);
	}
	else
	{
	$nom=$placementid;
	//check username in db
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$nom' or username='$nom') and  user_status='0')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_assoc($results);
	//return total count
	}
	if($nom!=$refid)
	{
	$yesd = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM level_income_binary WHERE (income_id='$refid' and down_id='$nom')"));
	}
	else
	{
	$yesd =1;
	}
	//if value is more than 0, username is not available
	if($username_exist==1 && $yesd==0) {
	echo "<font color='#FF0000'><strong>"."Placement User Not Available or not in the downline of sponsor!"."<strong</font>";
	}
	else{
	echo "<font color='#009999'><strong>".ucfirst($row_ref['username'])." is your Placement ID!<strong</font>";
	}
	//close db connection
	}
	else
	{
	echo "<font color='#FF0000'><strong>"."Placement User Not Available or not in the downline of sponsor!"."<strong</font>";
	}
	}
?>