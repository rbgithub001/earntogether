<?php
ob_start();
include("../lib/config.php");

if ($_GET['id']!='' && $_GET['user']!='') {

	 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Paid Member', user_rank_name='Paid Member',user_plan='1' where user_id='".$_GET['user']."'");


	 mysqli_query($GLOBALS["___mysqli_ston"], "update id_proof_list set status='1' where id='".$_GET['id']."'");

}
header("location:inactivate-member.php?msg=Activated Successfully!");
	exit;

?>