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
			     $sql="SELECT * FROM credit_debit WHERE (TranDescription='Bank Transfer' || TranDescription='NETS' || TranDescription='Cash' || TranDescription='VISA/MASTER' || TranDescription='OTHERS') ";
                    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_assoc($res))
{
     $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$row['user_id']."'")); 

$content .= escape_csv_value($ii).",";
	//$content .= escape_csv_value(date('m/d/Y',strtotime($row['lead_generation_date ']))).",";
	$content .= escape_csv_value($row['user_id']).",";

	$content .= escape_csv_value($user['username']).",";
	
	$content .= escape_csv_value($user['first_name']." ".$user['last_name']).",";
	//$content .= escape_csv_value($row['last_name']).",";
	//$content .= escape_csv_value($row['email']).",";

	//$content .= escape_csv_value($row['phoner']).",";
	
	//$content .= escape_csv_value($row['country']).",";
     //$content .= escape_csv_value($row['mem_status']).",";
      $content .= escape_csv_value($row['credit_amt']).",";
      // $content .= escape_csv_value($row['ttype']).",";
       $content .= escape_csv_value($row['TranDescription']).",";
    //  $content .= escape_csv_value($row['package_id']).",";

      //$content .= escape_csv_value($data1['package_name']).",";
     
     
     if($row['status']=='0')
            {   
               $status_d='Paid';
           }
           else{
                	
                		$status_d='Pending';
                		
                }

                  
           $content.=escape_csv_value($status_d).","; 
		  $content .= escape_csv_value($row['ts']).",";
          // $content .= escape_csv_value(date('m/d/Y',strtotime($row['ts']))).",";
		    
	  
	  
    $content .= "\n";
	
	$ii++;
}
						
$title .= "Sr.No ,Userid,Username,Member Name, Commission,Description,Paid Status,Date  "."\n";
echo $title;
echo $content;

?>