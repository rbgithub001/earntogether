<?php
ob_start();
include("../lib/config.php");



$datase=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from projects   where project_id='".$_GET['id']."'  "));


$status =$datase['status'];
if($status==1){
    $status=0;
}else{
     $status=1;
}


mysqli_query($GLOBALS["___mysqli_ston"], "update projects set status='$status' where project_id='".$_GET['id']."'");
header("location:manage-projects.php?msg=Status Updated Successfully!");
?>