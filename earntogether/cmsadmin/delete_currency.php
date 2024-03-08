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

  $id=$_GET['id'];
  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");

if($_GET['id']!='')
{
mysqli_query($GLOBALS["___mysqli_ston"], "delete from currency_manage where id='".$_GET['id']."'");
header("location:manage-currency.php?msg=Currency Deleted Successfully !");
}
else
{
header("location:login.php?msg=Login First!");
}


?>
