<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from ppt where id='".$_GET['id']."'");
header("location:manage_ppt.php?msg=Powr point slider Deleted Successfully!");
?>