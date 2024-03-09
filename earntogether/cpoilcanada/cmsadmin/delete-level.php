<?php
include("../lib/config.php");
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
$_SESSION['rand'] = mt_rand(1111111,9999999); 
  $id=$_GET['id'];

  mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM set_level WHERE id=$id");
header("location:manage-level-comm.php?msg=level successfully deleted");

?>
