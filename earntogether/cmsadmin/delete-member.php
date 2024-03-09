<?php 
ob_start();
include("../lib/config.php");
/*   CSV Export*/


function redirectURL($url) {
	    echo '<script> window.location.href="'.$url.'"
		</script>"';

}

        
        $content = '';
$title = '';
 $ii=1;
        
		if(isset($_POST['Show'])){
		    	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                      
			$from=$_POST['from'];
            $end_date=$_POST['end_date'];
			$id=$_POST['list'];
			$query123=$_POST['qry'];
			$date=date('Y-m-d');
			$description=$_POST['description'];
			$title = '';
             $total_sum=0;
            if(!empty($id)){
               // print_r($id);exit;
                foreach($id as $check) 
                {
          			$totc_unpaid = 0;
					$total = 0;
				mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM user_registration where user_id='$check'");
				mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM final_e_wallet where user_id='$check'");
				mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM matrix_downline where income_id='$check' and down_id='$check'");
				
                }	
            }	    
	    }  
	    
	//    $title .= "Sr.No ,Userid,Username,Member Name, Commission,Description,Paid Status,Date  "."\n";
header("location:member-list.php?msg=Selected Member are Deleted Permanently.!");
?>