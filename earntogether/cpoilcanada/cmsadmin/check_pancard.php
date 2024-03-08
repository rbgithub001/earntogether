<?php
ob_start();
include("../lib/config.php");



$datase2=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from customers where pancard='".$_POST['pancard']."'  "));
if($datase>0){
    echo 'Already Exist';

}else{
    
    //  $datase2= mysqli_fetch_array($datase);
    //  $pname=$datase2['project_name'];
    //  $pid=$datase2['project_id'];
     
}

?>