<?php include("../lib/config.php");
if ($_POST['sid']!='') {
	 $sid=$_POST['sid'];
	$c=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT first_name,last_name from user_registration where (user_id='$sid' or username='$sid')");
	$c1=mysqli_num_rows($c);
	if ($c1 > 0) {
		$c2=mysqli_fetch_assoc($c);
		
	   // echo $c2['username'];
	   echo "<font color='#009999'><strong>".$c2['first_name']." ".$c2['last_name']." User Available..!</strong></font>";
	}else{
	   
	   echo "<font color='#F00'><strong> User Not Available..!</strong></font>";
	}
// echo $_POST['sid'];

}


?>