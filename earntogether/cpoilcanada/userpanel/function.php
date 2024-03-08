<?php
include("../lib/config.php");

function total_downline($userid)
{
	$query="select user_id from user_registration where nom_id='$userid'";
	$q=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	$r=0;
	while($row_d=mysqli_fetch_assoc($q))
	{
		$r++;
		$uid=$row_d['user_id'];
		$query1="select user_id from user_registration where nom_id='$uid'";
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		while($row_d1=mysqli_fetch_assoc($q1))
		{
			$r++;
			$uid1=$row_d1['user_id'];
			$query2="select user_id from user_registration where nom_id='$uid1'";
			$q2=mysqli_query($GLOBALS["___mysqli_ston"], $query2);
			while($row_d2=mysqli_fetch_assoc($q2))
			{
				$r++;
				$uid2=$row_d2['user_id'];
			}

		}	

	}
	
	return $r;

}


function direct_user($id)
{
	
$query="select user_id from user_registration where ref_id='$id'";
$q=mysqli_query($GLOBALS["___mysqli_ston"], $query);
$totaldirectmem=mysqli_num_rows($q);
return $totaldirectmem;
}
?>