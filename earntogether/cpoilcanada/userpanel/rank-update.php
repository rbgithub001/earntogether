<?php
$star_month=date('Y-m-')."01";
$end_month=date('Y-m-')."31";
$date=date('Y-m-d');
function Rank_update($userone)
{
   $queryt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userone'");
   while($teds=mysqli_fetch_array($queryt))
   {
   	 $user_id=$teds['user_id'];
     $user_rank_name=$teds['user_rank_name'];
     $invoice_no=$user_id.rand(10000,99999);

     

          $level1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as toks1 from credit_debit where user_id='$user_id' and (ttype='ttype='Rank Bonus' OR ttype='Level Income' OR ttype='Pool Income')"));
          $totalsum1=$level1['toks1'];

         
          
         
          if($totalsum1>=200 && $user_rank_name=='Associate')
          {
            $rwallet=20;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Lead', designation='Lead' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Associate', 'Lead', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')"); 
              
          }


          else if($totalsum1>=600 && $user_rank_name=='Lead')
          {
            $rwallet=60;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Senior', designation='Senior' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Lead', 'Senior', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')"); 
              
          }

          else if($totalsum1>=1300 && $user_rank_name=='Senior')
          {
            $rwallet=156;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Elite', designation='Elite' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Senior', 'Elite', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')"); 
              
          }

          else if($totalsum1>=2400 && $user_rank_name=='Elite')
          {
            $rwallet=288;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Premier', designation='Premier' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Elite', 'Premier', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')"); 
              
          }
           else if($totalsum1>=3800 && $user_rank_name=='Premier')
           {
            $rwallet=456;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Silver', designation='Silver' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Premier', 'Silver', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

           else if($totalsum1>=5800 && $user_rank_name=='Silver')
           {
            $rwallet=812;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Gold', designation='Gold' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Silver', 'Gold', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

           else if($totalsum1>=8400 && $user_rank_name=='Gold')
           {
            $rwallet=1176;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Platinum', designation='Platinum' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Gold', 'Platinum', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

           else if($totalsum1>=11700 && $user_rank_name=='Platinum')
           {
            $rwallet=1638;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Sapphire', designation='Sapphire' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Platinum', 'Sapphire', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

            else if($totalsum1>=16400 && $user_rank_name=='Sapphire')
           {
            $rwallet=2624;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Emerald', designation='Emerald' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Sapphire', 'Emerald', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

            else if($totalsum1>=22300 && $user_rank_name=='Emerald')
           {
            $rwallet=3568;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Diamond', designation='Diamond' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Emerald', 'Diamond', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

           else if($totalsum1>=30000 && $user_rank_name=='Diamond')
           {
            $rwallet=4800;

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Ruby', designation='Ruby' where user_id='$user_id'");
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `qualify_date`) VALUES (NULL, '$user_id', 'Diamond', 'Ruby', CURRENT_TIMESTAMP, '$date')");

            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user_id','$rwallet','0','0','$user_id','123456','$date','Rank Bonus','Earn Rank Bonus','Rank Bonus','Rank Bonus','$invoice_no','Rank Bonus','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");               
           }

        
           else
           {}
     

   } // while close here
} //function close here


?>