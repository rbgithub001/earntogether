<?php
ob_start();
include("lib/config.php");

 $state_id = $_POST["state_id"];
  $result = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM  states where country_id = $state_id");
?>
<option value="">Select State</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["name"];?>"><?php echo $row["name"];?></option>
<?php
}

?>
