<?Php
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from images where id='".$_GET['delete']."'");
header("location:all_images.php?msg=Image Deleted Successfully");
?>


  