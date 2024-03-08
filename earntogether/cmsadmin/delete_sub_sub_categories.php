<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from sub_sub_categories where sub_sub_category_id='".$_GET['id']."'");
header("location:manage-sub-sub-category.php?msg=Sub Category Deleted Successfully!");
?>