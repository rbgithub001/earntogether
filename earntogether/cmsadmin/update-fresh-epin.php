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

// echo $id=$_GET['id'];
// echo $status=$_GET['status'];
// die;
$id=$_GET['id'];
$status=$_GET['status'];
$issue_date=date("Y-m-d");
mysqli_query($GLOBALS["___mysqli_ston"], "update pins set status='$status' where id='$id'");
header("location:fresh-epin-reports.php?msg=Status Updated!");
?>