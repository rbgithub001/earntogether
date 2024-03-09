<?php
ob_start();
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from tickets where id='".$_GET['id']."'");
header("location:open-ticket-manage.php?msg=Ticket Deleted Successfully!");
?>