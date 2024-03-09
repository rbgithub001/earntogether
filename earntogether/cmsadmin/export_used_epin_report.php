<?php 
ob_start();
include_once("../lib/config.php");

error_reporting(0);
   
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
header("Content-Disposition: attachment; filename=exportSponsorIncome.csv");
header("Pragma: no-cache");
header("Expires: 0");
/*$totc_unpaid = 0;
$total = 0;*/
$content = '';
$title = '';
 $ii=1;
			     $sql="select * from pins where status='1' ";
                    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_assoc($res))
{
   

$content .= escape_csv_value($ii).",";
	//$content .= escape_csv_value(date('m/d/Y',strtotime($row['lead_generation_date ']))).",";
	$content .= escape_csv_value($row['pin_no']).",";

	$content .= escape_csv_value($row['amount']).",";
	
	$content .= escape_csv_value('Already Used').",";
	$content .= escape_csv_value($row['crt_date']).",";
	$content .= escape_csv_value($row['used_by']).",";
	$content .= escape_csv_value($row['t_date']).",";
	
	  
	  
    $content .= "\n";
	
	$ii++;
}
						
$title .= "Sr.No , Pin , Amount,Status, Create Date,Used By,Used Date  "."\n";
echo $title;
echo $content;

?>