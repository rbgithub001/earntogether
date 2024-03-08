<?php
session_start();
include("header.php");


$idd=$f['user_id'];
$s=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$idd'");

$f=mysqli_fetch_array($s);
$name=$f['username'];

$last=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tickets order by id desc limit 1"));
if($last['id']=='')
{
	$tic=1;
}
else
{
$tic=$last['id']+1;
}
$category=$_REQUEST['category'];
$subject=$_REQUEST['filed01'];
$message=$_REQUEST['filed06'];
$create_date=date("Y-m-d");

$query="INSERT INTO tickets(user_id,user_name,subject,tasktype,description,t_date,ticket_no) VALUES('$idd','$name','$subject','$category','$message','$create_date',$tic)";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Error");
$msg="Ticket Submitted Successfully !";
if($res)
{
	header("location:support.php?msg=$msg");
}

?>