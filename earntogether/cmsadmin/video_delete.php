<?Php
include("../lib/config.php");
mysqli_query($GLOBALS["___mysqli_ston"], "delete from video where id='".$_GET['del']."'");
header("location:all_video.php?msg=video Deleted Successfully");
?>


  