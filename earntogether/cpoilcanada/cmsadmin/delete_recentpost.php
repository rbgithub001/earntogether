<?php  //delete page
include("../lib/config.php");
$id=$_GET['id'];
mysqli_query($GLOBALS["___mysqli_ston"], "delete from manage_recentpost where id='$id'");	
$_SESSION['admin_sess']="Deleted Successfull";
header("Location:manage_ourservices.php");
?>
