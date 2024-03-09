<?php
ob_start();
include("../lib/config.php");
$datase=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from property where id='".$_POST['prop_id']."' and sold='0' "));
if(!empty($datase)){
    
    echo json_encode($datase);
    return;
     
// while($datase2= mysqli_fetch_array($datase)){
//      $propertyname=$datase2['title'];
//   // echo  $propertyid=$datase2['id'];
//       echo  $propertyprice=$datase2['price'];die;
//   // echo "<option value='".$propertyid."'>$propertyname</option>";
// }

}
?>