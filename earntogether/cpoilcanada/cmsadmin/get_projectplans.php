<?php
ob_start();
include("../lib/config.php");
//echo $_POST['plan_id'];
$datase=mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where project_name='".$_POST['plan_id']."' and sold='0' ");
if(!empty($datase)){
 echo "<option value=''>Select Any one</option>";
while($datase2= mysqli_fetch_array($datase)){
    $propertyname=$datase2['title'];
     $propertyid=$datase2['id'];
     
    echo "<option value='".$propertyid."'>$propertyname</option>";
}

}

// mysqli_query($GLOBALS["___mysqli_ston"], "update projects set status='$status' where project_id='".$_GET['id']."'");
// header("location:manage-projects.php?msg=Status Updated Successfully!");
?>