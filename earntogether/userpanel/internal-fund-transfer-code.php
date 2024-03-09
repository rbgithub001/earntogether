<?php include("header.php");


if(isset($_POST['submit'])){
    
    $amount = $_POST['amount'];
    
    $t_code = $_POST['password'];
    
    $type = $_POST['type'];
    //$pwd= $t_code;
      //$pwd= hash('sha256',$pwd);
    
    if($t_code == $f['password']){
        
        if($amount > 0){
            
            $user_id = $f['user_id'];
             
             if ($type==1)
             {
                    $available_amt_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `level_e_wallet` WHERE user_id = '".$user_id."'"));
            
                    $available_amt = $available_amt_query['amount'];
                    
                    if($amount <= $available_amt){
                        // Deduct commission wallet amount
                        mysqli_query($GLOBALS['___mysqli_ston'], "UPDATE `level_e_wallet` SET amount = (amount-$amount) WHERE user_id = '".$user_id."'");
                        
                        // Insert Deduction in credit_debit
                        $rand = rand(1000000000,9999999999);
                        $date = date('Y-m-d');
                        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                        mysqli_query($GLOBALS['___mysqli_ston'], "INSERT INTO `credit_debit`(`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`, `current_url`) 
                        VALUES (NULL,'$rand','$user_id','0','$amount','0','$user_id','$user_id','$date','Fund Transfer','Fund Transfer from level wallet to investment wallet','Internal Fund Transfer','Internal Fund Transfer','$rand','Internal Fund Transfer','0','Level Wallet','$urls')");
                                                                                    
                                                                                    
                        
                        // Add product wallet amount
                        mysqli_query($GLOBALS['___mysqli_ston'], "UPDATE `rmb_wallet` SET amount = (amount+$amount) WHERE user_id = '".$user_id."'");
                        
                        mysqli_query($GLOBALS['___mysqli_ston'], "INSERT INTO `credit_debit`(`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`, `current_url`)  
                        VALUES (NULL,'$rand','$user_id','$amount','0','0','$user_id','$user_id','$date','Fund Transfer','Fund Transfer from level wallet to investment wallet','Internal Fund Transfer','Internal Fund Transfer','$rand','Internal Fund Transfer','0','RMB Wallet','$urls')");     

                             header("location:internal-fund-transfer.php?msg=Amount transfered successfully.");
                                }else{
                                    header("location:internal-fund-transfer.php?msg=Insufficient fund in your Pool Wallet."); 
                                }       

             }elseif($type==2){
                 $available_amt_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `roi_e_wallet` WHERE user_id = '".$user_id."'"));
            
                    $available_amt = $available_amt_query['amount'];
                    
                    if($amount <= $available_amt){
                        // Deduct commission wallet amount
                        mysqli_query($GLOBALS['___mysqli_ston'], "UPDATE `roi_e_wallet` SET amount = (amount-$amount) WHERE user_id = '".$user_id."'");
                        
                        // Insert Deduction in credit_debit
                        $rand = rand(1000000000,9999999999);
                        $date = date('Y-m-d');
                        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                        mysqli_query($GLOBALS['___mysqli_ston'], "INSERT INTO `credit_debit`(`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`, `current_url`) 
                        VALUES (NULL,'$rand','$user_id','0','$amount','0','$user_id','$user_id','$date','Fund Transfer','Fund Transfer from roi wallet to investment wallet','Internal Fund Transfer','Internal Fund Transfer','$rand','Internal Fund Transfer','0','ROI Wallet','$urls')");
                                                                                    
                                                                                    
                        
                        // Add product wallet amount
                        mysqli_query($GLOBALS['___mysqli_ston'], "UPDATE `rmb_wallet` SET amount = (amount+$amount) WHERE user_id = '".$user_id."'");
                        
                        mysqli_query($GLOBALS['___mysqli_ston'], "INSERT INTO `credit_debit`(`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`, `current_url`)  
                        VALUES (NULL,'$rand','$user_id','$amount','0','0','$user_id','$user_id','$date','Fund Transfer','Fund Transfer from roi wallet to investment wallet','Internal Fund Transfer','Internal Fund Transfer','$rand','Internal Fund Transfer','0','RMB Wallet','$urls')");     

                             header("location:internal-fund-transfer.php?msg=Amount transfered successfully.");
                                }else{
                                    header("location:internal-fund-transfer.php?msg=Insufficient fund in your Pool Wallet."); 
                                }  
             }
             elseif($type==3)
             {

                      $available_amt_query = mysqli_fetch_assoc(mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM `final_e_wallet` WHERE user_id = '".$user_id."'"));
            
                      $available_amt = $available_amt_query['amount'];
                    
                       if($amount <= $available_amt){
                        // Deduct commission wallet amount
                        mysqli_query($GLOBALS['___mysqli_ston'], "UPDATE `final_e_wallet` SET amount = (amount-$amount) WHERE user_id = '".$user_id."'");
                        
                        // Insert Deduction in credit_debit
                        $rand = rand(1000000000,9999999999);
                        $date = date('Y-m-d');
                        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                        mysqli_query($GLOBALS['___mysqli_ston'], "INSERT INTO `credit_debit`(`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`, `current_url`) 
                        VALUES (NULL,'$rand','$user_id','0','$amount','0','$user_id','$user_id','$date','Fund Transfer','Fund Transfer from main wallet to investment wallet','Internal Fund Transfer','Internal Fund Transfer','$rand','Internal Fund Transfer','0','E Wallet','$urls')");
                                                                                    
                                                                                    
                        
                        // Add product wallet amount
                        mysqli_query($GLOBALS['___mysqli_ston'], "UPDATE `rmb_wallet` SET amount = (amount+$amount) WHERE user_id = '".$user_id."'");
                        
                        mysqli_query($GLOBALS['___mysqli_ston'], "INSERT INTO `credit_debit`(`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`, `current_url`) 
                        VALUES (NULL,'$rand','$user_id','$amount','0','0','$user_id','$user_id','$date','Fund Transfer','Fund Transfer from main wallet to investment wallet','Internal Fund Transfer','Internal Fund Transfer','$rand','Internal Fund Transfer','0','RMB Wallet','$urls')");     

                             header("location:internal-fund-transfer.php?msg=Amount transfered successfully.");
                                }else{
                                    header("location:internal-fund-transfer.php?msg=Insufficient fund in your Income Wallet."); 
                                }    
             }

            else{
                header("location:internal-fund-transfer.php?msg=Wrong wallet choosen.");
            }
            
                
           
            
            
        }else{
            header("location:internal-fund-transfer.php?msg=Amount must be greater than 0.");    
        }
        
    }else{
        header("location:internal-fund-transfer.php?msg=Invalid Transaction Password.");    
    }
    
    
}else{
    header("location:internal-fund-transfer.php?msg=Please fill following fields.");
}


?>