<?php
ob_start();
include("../lib/config.php");
//echo $_POST['plan_id'];
$datase=mysqli_query($GLOBALS["___mysqli_ston"], "select * from property_size_price where id='".$_POST['plot_id']."'");
if(!empty($datase))
{
    $datase2= mysqli_fetch_array($datase);
    echo $datase2['price'];
}

// mysqli_query($GLOBALS["___mysqli_ston"], "update projects set status='$status' where project_id='".$_GET['id']."'");
// header("location:manage-projects.php?msg=Status Updated Successfully!");
?>