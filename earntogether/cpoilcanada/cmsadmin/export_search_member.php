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
			     $sql="select * from user_registration  ";
                    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_assoc($res))
{
     $user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$row['user_id']."'"));
      $amount=$user['amount'];

      $usera=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as totals from credit_debit where user_id='".$row['user_id']."' and ttype!='Fund Transfer'"));

      if($usera['totals']=='')
      {
      	$totamt=0;
      }
        
      else 
     {
	$totamt=number_format($usera['totals'],2);
      }
    	
     

$content .= escape_csv_value($ii).",";
	//$content .= escape_csv_value(date('m/d/Y',strtotime($row['lead_generation_date ']))).",";
	$content .= escape_csv_value($row['user_id']).",";

	$content .= escape_csv_value($row['username']).",";
	
	$content .= escape_csv_value($row['first_name']." ".$row['last_name']).",";
	$content .= escape_csv_value($amount).",";
	$content .= escape_csv_value($totamt).",";

	//$content .= escape_csv_value($row['phoner']).",";
	
	//$content .= escape_csv_value($row['country']).",";
     //$content .= escape_csv_value($row['mem_status']).",";
      $content .= escape_csv_value($row['user_rank_name']).",";
       $content .= escape_csv_value($row['last_login_date']).",";
       //$content .= escape_csv_value($row['plan_id']).",";
    //  $content .= escape_csv_value($row['package_id']).",";

      //$content .= escape_csv_value($data1['package_name']).",";
     
     
     
		 //$content .= escape_csv_value(date('m/d/Y',strtotime($row['registration_date']))).",";



		 // if($row['user_status']=='0')
   //          {   
   //             $status_d='Active';
   //         }
   //         else{
                	
   //              		$status_d='Inactive';
                		
   //              }

                  
           //$content.=escape_csv_value($status_d).","; 
		  // $content .= escape_csv_value($row['user_status']).",";
		    
	  
	  
    $content .= "\n";
	
	$ii++;
}
						
$title .= "Sr.No ,Userid,Username,Member Name, Ewallet Amount,Total Commission Earned,Rank / Designation, Last Login  "."\n";
echo $title;
echo $content;

?>