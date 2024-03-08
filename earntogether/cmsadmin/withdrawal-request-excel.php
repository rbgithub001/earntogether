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

		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=Withdrawal-Request.csv");
		header("Pragma: no-cache");
		header("Expires: 0");
		   if(isset($_POST['Show']))
		   {
			$date=date("Y-m-d");
			$id=$_POST['list'];
			   
			$description=$_POST['description'];
			  // $title = '';$title .= "User Id, USername, First Name,Last Name,Amount In Usd,Withdraw Amount IN BTC,Withdraw Request Date,Bitcoin Address,Wallet Type "."\n";
			$title = '';$title .= "User Id, USername, First Name,Last Name,Amount In USD,Withdraw Request Date,Pay Address,Pay Type "."\n";
			echo $title;
			if(!empty($id)) {
    		foreach($id as $check)   {
			  
			$select=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request where id='$check'"));
			$selectuser_id=$select['user_id'];
			$request_amount=$select['request_amount'];
			   
			
			$sql = "SELECT * FROM withdraw_request where id='$check' and status='0'";
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

			$totc_unpaid = 0;
			$total = 0;
			$content = '';

			while($row=mysqli_fetch_assoc($res))
		{
			$usr=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$row['user_id']."'"));

			$content .= escape_csv_value($row['user_id']).",";
			$content .= escape_csv_value($usr['username']).",";					    
		    $content .= escape_csv_value($usr['first_name']).",";
		    $content .= escape_csv_value($usr['last_name']).",";
		    $content .= escape_csv_value(number_format($row['request_amount'],2)).",";
		    // $content .= escape_csv_value($row['btcamt']).",";
		    $content .= escape_csv_value($row['posted_date']).",";
		    $content .= escape_csv_value($row['pay_address']).",";	
		    $content .= escape_csv_value($row['payment_mode']).",";
	      	/*$walletfrom1 = "";
                      if($row['withdraw_wallet']=='working_e_wallet'){
                        $walletfrom1 = "Investment Wallet";
                      }elseif($row['withdraw_wallet']=='roi_e_wallet'){
                        $walletfrom1 = "Income Wallet";
                      }
                       $content .= escape_csv_value($walletfrom1).",";
      		$content .= escape_csv_value($row['description']).",";*/
	
			$content .= "\n";
}
					

			echo $content;
			mysqli_query($GLOBALS["___mysqli_ston"], "update withdraw_request set status='1',admin_remark='$description', admin_response_date='$date' where id='$check'");


}	   }	}   
		 
			
	
			
			 //header("location:withdrwal-request-manage.php");
		
		   
		   
		   ?>
		   