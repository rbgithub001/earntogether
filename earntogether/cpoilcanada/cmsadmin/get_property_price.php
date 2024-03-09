<?php
ob_start();
include("../lib/config.php");
$datase=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select price from property_size_price where size='".$_POST['plot_size']."' and status='0' "));
if(!empty($datase)){
 
    echo $datase['price'];
    return;
     
// while($datase2= mysqli_fetch_array($datase)){
//      $propertyname=$datase2['title'];
//   // echo  $propertyid=$datase2['id'];
//       echo  $propertyprice=$datase2['price'];die;
//   // echo "<option value='".$propertyid."'>$propertyname</option>";
// }

}
?>