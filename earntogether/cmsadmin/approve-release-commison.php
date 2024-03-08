<?php 
ob_start();
include("../lib/config.php");
/*   CSV Export*/
function escape_csv_value($value) {
    $value = str_replace('"', '""', $value); // First off escape all " and make them ""
    if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
        return '"'.$value.'"'; // If I have new lines or commas escape them
    } else {
        return $value; // If no new lines or commas just return the value
    }
}

function redirectURL($url) {
	    echo '<script> window.location.href="'.$url.'"
		</script>"';

}

        // header("Content-type: text/csv");
        // header("Content-Disposition: attachment; filename=approve-release-usercom.csv");
        // header("Pragma: no-cache");
        // header("Expires: 0");
        
		if(isset($_POST['Show'])){
			$from=$_POST['from'];
            $end_date=$_POST['end_date'];
			$id=$_POST['list'];
			$query123=$_POST['qry'];
			$date=date('Y-m-d');
			$description=$_POST['description'];
			//$title = '';
            //$title .= "Userid,Level Income,Total,Beneficiary Name ,Beneficiary Ac No,Bank Name,Branch Name,IFSC,Start Date,End Date"."\n";
            //echo $title;

            if(!empty($id)){
                foreach($id as $check) 
                {
    //       		$selectuser_id=$check;
    //       		$request_amount=$amount['amt'];
    //                 $request_amount=$request_amount;
    //                 $sql = "select * from credit_debit where id='$check'";
    //                 $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                    
    //               	$totc_unpaid = 0;
				// 	$total = 0;
				// 	$content = '';
				// 	while($data1=mysqli_fetch_assoc($res)){
				// 	    $user_id = $data1['user_id'];
				
			//	echo "update credit_debit set status=1  where id='$check' ";
			
				    mysqli_query($GLOBALS["___mysqli_ston"], "update credit_debit set status=1  where id='$check' ");
                    //}
                }	
            }	    
	    }   
		 
header("location:billing-release-commission.php");
?>