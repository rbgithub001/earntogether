<?php include("../lib/config.php");



                       $userquery=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *FROM `user_registration`");

                       while($rowuser=mysqli_fetch_array($userquery)){
                       $userid = $rowuser['user_id'];
                       $left_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as left_invest FROM `manage_bv_history` WHERE income_id='$userid' "));
                       $left_investments = $left_investment['left_invest'];
                          if($left_investments>=10000 and $left_investments<30000) {
                              	mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Golden consultant' where user_id='".$userid."'");

                          }
                        
                        
                          if($left_investments>=30000 and $left_investments<50000) {
                            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Diamond consultant' where user_id='".$userid."'");

                          }
                        
                          if($left_investments>=50000 and $left_investments<80000) {
                                    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Silver Manager' where user_id='".$userid."'");

                          }
                        
                          if($left_investments>=80000 and $left_investments<140000) {
                                mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Golden Manager' where user_id='".$userid."'");

                          }
                         
                          if($left_investments>=140000 and $left_investments<200000) {
                                mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Diamond Manager' where user_id='".$userid."'");

                          }
                         
              
                          if($left_investments>=200000 and $left_investments<300000) {
                                mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Silver Partner' where user_id='".$userid."'");

                          }
                         
                          if($left_investments>=300000 and $left_investments<500000) {
                            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Golden Partner' where user_id='".$userid."'");

                          }
                        
              
                          if($left_investments>=500000 and $left_investments<700000 ) {
                                mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Diamond Partner' where user_id='".$userid."'");

                          }
                         
              
                          if($left_investments>=700000  and $left_investments<850000) {
                                mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Country Representative' where user_id='".$userid."'");

                          }
                        
                          if($left_investments>=850000 and $left_investments<1000000) {
                                 mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Continent Representative ' where user_id='".$userid."'");

                          }
                         
                          if($left_investments>=1000000) {
                            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Global Representative ' where user_id='".$userid."'");

                          }
                          }
                              
                              
                ?>              
                         