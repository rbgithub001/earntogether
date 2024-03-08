<?php  //delete page
include("../lib/config.php");
$id=$_GET['pid'];
mysqli_query($GLOBALS["___mysqli_ston"], "delete from Sub_header_menu where id='$id'");	
$_SESSION['admin_sess']="Deleted Successfull";
header("Location:sub_menu.php");
?>
