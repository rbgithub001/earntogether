<?php 
ob_start();
session_start();
include("../lib/config.php");
   
/*   CSV Export*/
function escape_csv_value($value) 
{
	$value = str_replace('"', '""', $value); // First off escape all " and make them ""
	if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value))
	{ // Check if I have any commas or new lines
		return '"'.$value.'"'; // If I have new lines or commas escape them
	} 
	else 
	{
		return $value; // If no new lines or commas just return the value
	}
}

function redirectURL($url) 
{
	$url=$_SERVER['HTTP_REFERER'];
    echo '<script> window.location.href="'.$url.'"</script>"';
}

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=exportEpin.csv");
header("Pragma: no-cache");
header("Expires: 0");

if($_REQUEST['userid'])
{
	$userid = $_REQUEST['userid'];
}
/*$sql="select * from registration where (user_name ='$id' or user_id='$id')";
$res=mysql_query($sql);
$rw=mysql_fetch_array($res);	*/				
$totc_unpaid = 0;
$total = 0;
$content = '';
	  
$title = '';
$i=1;


/*echo "select * from pin_request where user_id='$userid' and status='0' order by id desc";
exit;*/
$select = mysqli_query($GLOBALS["___mysqli_ston"], "select * from credit_debit where user_id='$userid' and ttype='Matching Income' order by id desc");

if(mysqli_num_rows($select)>0)
{

	while($row=mysqli_fetch_assoc($select))
	{
		$data11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$row['sender_id']."'"));

		$ststuss = "Pending";

		if($row['status']==0) 
		{
			$ststuss="Paid";
		} 
		else 
		{
			$ststuss="Unpaid";
		}


		$content .= escape_csv_value($i).",";
		$content .= escape_csv_value($row['transaction_no']).",";
		$content .= escape_csv_value($data11['first_name']." ".$data11['last_name']).",";
		$content .= escape_csv_value($row['sender_id']).",";
		$content .= escape_csv_value($row['credit_amt']).",";
		$content .= escape_csv_value($row['ttype']).",";
		$content .= escape_csv_value($row['receive_date']).",";
		$content .= escape_csv_value($ststuss).",";
		$content .= "\n";
		$i++;
	}
}						
$title .= "Sr No.,Transaction No., Downline Name, Downline Id, Commission, Remark, Date, Status"."\n";
echo $title;
echo $content;

?>