<?php

include("../lib/config.php"); 

$id=$_GET['pid'];

$date=date("Y-m-d");
if(isset($_POST['submits']))

{
$emailtemp=$_POST['description'];



$str="update  email_template set template='".$emailtemp."',posted_date='".$date."' where id='$id'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $str)or die("error");

if($res)
{
//$msg="New NEWS Uploaded";
header("location:manage_emailtemplate.php?id=". $id."&msg=Template updated Successfully !");

//echo "<script>window.location.href='edit_official_announcement.php?id=". $id."&msg=Official announcement Updated Successfully !'</script>";
}


} 


?>