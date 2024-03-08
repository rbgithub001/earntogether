<?php
session_start();
/* session destory */
// 120 Second in seconds
// $inactive = 120; 
// ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours
// if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
//     // last request was more than 2 hours ago
//     session_unset();     // unset $_SESSION variable for this page
//     session_destroy();   // destroy session data
// }
// $_SESSION['testing'] = time(); // Update session
// /* session destory */

include("../lib/config.php");
if(isset($_SESSION['userpanel_user_id']) && $_SESSION['userpanel_user_id'] != "")
{
	$idd = $_SESSION['userpanel_user_id'];
	$f=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where (user_id='$idd' OR username='$idd')"));
	$userimage = $f['image'];
	$userid=$f['user_id'];

	if($userimage !='' && file_exists('images/'.$userimage))
	{
		$userimage = 'images/'.$userimage;
	} 
	else
	{
		if($f['sex'] == 'male' || $f['sex'] == 'Male')
		{
			$userimage = "images/male.jpg";	
		}
		else if($f['sex'] == 'female' || $f['sex'] == 'Female')
		{
			$userimage = "images/female.jpg";		
		}
		else
		{
			$userimage = "images/male.jpg";	
		}
	}
}
else
{
	echo "<script language='javascript'>window.location.href='../logout.php';</script>";exit;
}
if($_SESSION['currency']!='')
{
    $countrycuurency='INR';
    $cntryexrate=1;

}

else
{
     $countrycuurency='INR';
     $cntryexrate='1';
}
?>