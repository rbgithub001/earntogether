<?php 
include("../lib/config.php");
$uid=$_GET['id'];
$_SESSION['puc_user_id']=$uid;

// $_SESSION['usertype']='Distributor';
// $_SESSION['SD_User_Name']=$result['username'];
                                        


header("location:../franchisepanel/index.php");
exit();
?>