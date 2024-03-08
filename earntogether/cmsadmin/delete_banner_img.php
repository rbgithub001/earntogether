<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from manage_slider where id='".$_GET['id']."'");
header("location:manage_banner.php?msg=Deleted Successfully!");
?>