<?php
ob_start(); 
include("../lib/config.php");
if($_GET['status']!='' && $_GET['hid']!='') {
	
	$a=mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set id_status='".$_GET['status']."' where user_id='".$_GET['hid']."'");
	header("location:member_document_verifynew.php");
	exit;
}





?>