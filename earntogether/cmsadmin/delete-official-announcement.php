<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from promo where n_id='".$_GET['id']."'");
header("location:official-announcement.php?msg=Ticket Deleted Successfully!");
?>