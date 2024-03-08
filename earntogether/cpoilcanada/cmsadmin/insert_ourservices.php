<?php
include("../lib/config.php");

date_default_timezone_set("Africa/Lagos");
$time = date ("Y-m-d H:i:s");


$title=$_REQUEST['title'];
$content=$_REQUEST['content'];
$date=date('Y-m-d');

    $image=$_FILES['file_name']['name'];
    $uploads_dir = 'images';
    $tmp_name = $_FILES["file_name"]["tmp_name"];
    move_uploaded_file($tmp_name, "$uploads_dir/".$image);


$str="insert into manage_ourservices set logo_title='".$title."',logo_desc='".$content."',logo_name='".$image."',date='".$time."'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $str)or die("error");
if($res)
{
$msg=" Uploaded successfully";
header("location:manage_ourservices.php");
}
?>