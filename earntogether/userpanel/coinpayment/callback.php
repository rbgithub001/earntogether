<?php

    include("../../lib/config.php");

	// $fp = fopen('response.txt', 'a');
	// fwrite($fp, '['.date('Y-m-d h:i:s').'] '.json_encode($_REQUEST)."\n");
	// fclose($fp);

	 // Fill these in with the information from your CoinPayments.net account. 
    $cp_merchant_id = '017392a478cb6640658c7aa9c3602c3c'; 
    $cp_ipn_secret = '8R8lM6uqrSdUmKxS2f5xgcWDojRjZW'; 
    $cp_debug_email = 'autotradecryptoupdates@gmail.com'; 




    function errorAndDie($error_msg) { 
        global $cp_debug_email; 
        if (!empty($cp_debug_email)) { 
            $report = 'Error: '.$error_msg."\n\n"; 
            $report .= "POST Data\n\n"; 
            foreach ($_POST as $k => $v) { 
                $report .= "|$k| = |$v|\n"; 
            } 
            mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
        } 
        die('IPN Error: '.$error_msg); 
    } 

    if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') { 
        errorAndDie('IPN Mode is not HMAC'); 
    } 

    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) { 
        errorAndDie('No HMAC signature sent.'); 
    } 

    $request = file_get_contents('php://input'); 
    if ($request === FALSE || empty($request)) { 
        errorAndDie('Error reading POST data'); 
    } 

    if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) { 
        errorAndDie('No or incorrect Merchant ID passed'); 
    } 

    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret)); 
    if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) { 
    //if ($hmac != $_SERVER['HTTP_HMAC']) { <-- Use this if you are running a version of PHP below 5.6.0 without the hash_equals function 
        errorAndDie('HMAC signature does not match'); 
    } 
     
    // HMAC Signature verified at this point, load some variables. 

    $txn_id = $_POST['txn_id']; 
    $item_name = $_POST['item_name']; 
    $item_number = $_POST['item_number']; 
    $amount1 = floatval($_POST['amount1']); 
    $amount2 = floatval($_POST['amount2']); 
    $currency1 = $_POST['currency1']; 
    $currency2 = $_POST['currency2']; 
    $status = intval($_POST['status']); 
    $status_text = $_POST['status_text']; 

    $received_confirms = $_POST['received_confirms'];


    $callback = json_encode($_POST);

    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO coinpayment_ipn SET txn_id = '".$txn_id."', status_code = '".$status."', status_text = '".$status_text."', ipn_data = '".$callback."', received_confirms = '".$received_confirms."'");


    //These would normally be loaded from your database, the most common way is to pass the Order ID through the 'custom' POST field. 
    $data = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM coinpayment WHERE txn_id = '".$txn_id."'"));

    if(count($data)){
    	$order_currency = $data['currency1']; 
    	$order_total = $data['amount']; 
    }


    //depending on the API of your system, you may want to check and see if the transaction ID $txn_id has already been handled before at this point 

    // Check the original currency to make sure the buyer didn't change it. 
    if ($currency1 != $order_currency) { 
        errorAndDie('Original currency mismatch!'); 
    }     
     
    // Check amount against order total 
    if ($amount1 < $order_total) { 
        errorAndDie('Amount is less than order total!'); 
    } 
   	
    

    if ($status >= 100 || $status == 2) { 
        // payment is complete or queued for nightly payout, success 
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE coinpayment SET callback = '".$callback."', status = '".$status."', status_text = '".$status_text."' WHERE txn_id = '".$txn_id."' ");
    } else if ($status < 0) { 
        //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent 
         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE coinpayment SET callback = '".$callback."', status = '".$status."', status_text = '".$status_text."' WHERE txn_id = '".$txn_id."' ");
    } else { 
        //payment is pending, you can optionally add a note to the order page 
         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE coinpayment SET callback = '".$callback."', status = '".$status."', status_text = '".$status_text."' WHERE txn_id = '".$txn_id."' ");
    } 
    
    die('IPN OK'); 
	
	