<?php
ob_start();
session_start();
include("../lib/config.php");
$curr=$_GET['currency'];
if($curr!='')
{
	

	$gdert=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from currency_manage where to_currency='$curr'"));
	$_SESSION['currency']=$curr;
    $_SESSION['rates']=$gdert['exchange_rate'];
	header("location:index.php");
}


?>