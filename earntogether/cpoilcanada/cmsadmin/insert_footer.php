 <?php include("../lib/config.php");
  
date_default_timezone_set("Africa/Lagos");
$date = date ("Y-m-d H:i:s");

if(isset($_POST['submits']))
{
$content=$_REQUEST['content'];
$title=$_REQUEST['title'];

//  $old_image=$_POST['old_image'];
//   $image=$_FILES['file_name']['name'];
//     $uploads_dir = '../../image';
//     $tmp_name = $_FILES["file_name"]["tmp_name"];
//     move_uploaded_file($tmp_name, "$uploads_dir/".$image);

// if($_FILES['file_name']['name']=='')
//   {
//     $img = $old_image;
//   }
    
//   else
//   {
//     $img = $image;
//   }

$str="insert into manage_footer set logo_title='".$title."',logo_desc='".$content."',date='".$date."'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $str)or die("error");

if($res)
{
//$msg="New NEWS Uploaded";
header("location:manage_footer.php?id=". $id."&msg=Footer Updated Successfully !");

//echo "<script>window.location.href='edit_official_announcement.php?id=". $id."&msg=Official announcement Updated Successfully !'</script>";
}}
?>