<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from categories where category_id='".$_GET['id']."'");
header("location:manage-category.php?msg=Category Deleted Successfully!");
?>