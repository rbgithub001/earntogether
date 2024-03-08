<?php
ob_start();
include("../lib/config.php");



$datase=mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where property_type='".$_POST['cat_id']."'  ");
if(!empty($datase)){
 echo "<option value=''>Select Any one</option>";
while($datase2= mysqli_fetch_array($datase)){
    $pname=$datase2['project_name'];
     $pid=$datase2['id'];
     
    echo "<option value='".$pid."'>$pname</option>";
}
}

// mysqli_query($GLOBALS["___mysqli_ston"], "update projects set status='$status' where project_id='".$_GET['id']."'");
// header("location:manage-projects.php?msg=Status Updated Successfully!");
?>