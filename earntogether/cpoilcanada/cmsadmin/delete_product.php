<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from products where product_id='".$_GET['id']."'");
header("location:manage-product.php?msg=Ticket Deleted Successfully!");
?>