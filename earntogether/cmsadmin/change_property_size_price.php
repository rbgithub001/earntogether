<?php
ob_start();
include("../lib/config.php");



$datase=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property_size_price where id='".$_GET['id']."'  "));


$status =$datase['status'];
if($status==1){
    $status=0;
}else{
     $status=1;
}


mysqli_query($GLOBALS["___mysqli_ston"], "update property_size_price set status='$status' where id='".$_GET['id']."'");
header("location:manage-size-price-property.php?msg=Status Updated Successfully!");
?>