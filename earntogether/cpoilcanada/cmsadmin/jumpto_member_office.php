<?php 
include("../lib/config.php");
$uid=$_GET['id'];
$_SESSION['userpanel_user_id']=$uid;

// $_SESSION['usertype']='Distributor';
// $_SESSION['SD_User_Name']=$result['username'];
                                        

$_SESSION['currency']='INR';
                        $_SESSION['rates']=1;

header("location:../userpanel/index.php");
exit();
?>