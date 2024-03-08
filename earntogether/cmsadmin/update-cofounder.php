<?php
ob_start();
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
$User=$_GET['user'];
$status=$_GET['status'];
$issue_date=date("Y-m-d");
mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set co_founder='$status' where user_id='$User'");
header("location:member-list.php?msg=Status Updated!");
?>