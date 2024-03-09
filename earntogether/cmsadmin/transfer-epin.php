<?php 
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 


if(isset($_POST['submit']))
{
  if($_POST['user']!='')
  {
  $user=$_POST['user'];
  $pin=$_POST['list'];

  $count=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$user' || username='$user'");
  $count1=mysqli_num_rows($count);
  $count11=mysqli_fetch_array($count);
  $recid=$count11['user_id'];
	  if($count1>0)
	  {
	  	  
	

  if(!empty($pin)) {
    foreach($pin as $check)   {
		  
		  	mysqli_query($GLOBALS["___mysqli_ston"], "update pins set receiver_id='$recid' where pin_no='$check'");
		  	header("location:fresh-epin-reports.php?msg=Pin transfer successfully");
	        exit;
		}}
		 
	  }
	  else
	  {

	  header("location:fresh-epin-reports.php?msg=Wrong receiver enter!");
	  exit;

	  }
  }
  else
  {
  	 header("location:fresh-epin-reports.php?msg=Wrong User Id !");
  exit;
  }
  
}
?>
