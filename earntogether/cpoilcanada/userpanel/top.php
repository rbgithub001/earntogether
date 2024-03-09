                 <nav class="navbar navbar-top navbar-static-top">
          <div class="container-fluid">

            <!-- sidebar collapse and toggle buttons get grouped for better mobile display -->
            <div class="navbar-header nav">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-top">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand show-hide-sidebar hide-sidebar" href="#"><i class="fa fa-outdent"></i></a>
              <a class="navbar-brand show-hide-sidebar show-sidebar" href="#"><i class="fa fa-indent"></i></a>
                 <h4 style="width: 420px;"></h4>
                 
                 <?php 
// $blockchain_root_price_search= "https://blockchain.info/tobtc?currency=USD&value=1";
            //      $url= "https://blockchain.info/ticker";
            //   $zan=get_data($url);
            //   function get_data($url) {
            //     $ch = curl_init();
            //     $timeout = 5;
            //     curl_setopt($ch, CURLOPT_URL, $url);
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            //     $data = curl_exec($ch);
            //     curl_close($ch);
            //     return $data;
            //   }

            //   $usd=json_decode($zan,true);

            //   $usd['USD']['last'];
               
               ?> 
  
               <?php 
// $blockchain_root_price_search= "https://blockchain.info/tobtc?currency=USD&value=1";
            //      $url2= "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD";
            //      $zan2=get_datas($url2);
            //     function get_datas($url2) {
            //     $ch2 = curl_init();
            //     $timeout2 = 5;
            //     curl_setopt($ch2, CURLOPT_URL, $url2);
            //     curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
            //     curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
            //     $data2 = curl_exec($ch2);
            //     curl_close($ch2);
            //     return $data2;
            //   }

            //   $usd2=json_decode($zan2,true);

              ?>
              
              
              
              
               <!--<h4 style="width: 420px;"></h4>-->
            </div>
           
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-top">

              <ul class="nav navbar-nav">

                <!-- start of LANGUAGE MENU -->
            <!-- <li class="dropdown language-nav">
                   <select name="currency" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="
    padding: 8px;color: #000;margin-top:11px; ">
    
                 <?php 
                    
                // $dref=mysqli_query($GLOBALS["___mysqli_ston"], "select * from currency_manage order by id asc");
                 //      while($dref1=mysqli_fetch_array($dref))
                 //      {
                         ?>
                      
    <option value="currency.php?currency=<?php echo $dref1['to_currency'];?>" <?php if($_SESSION['currency']==$dref1['to_currency']) { ?> selected <?php } ?> ><?php echo $dref1['to_currency'];?></option>   

                        
                         <?php               // }        ?>
                         </select>          </li> -->

                 
                <!-- end of LANGUAGE MENU -->
                
                <!-- start of OPEN NOTIFICATION PANEL BUTTON -->
                <?php 
                $str11="select * from message where reciever_id='$id' and read_receiver=1 order by id desc";
                $res11=mysqli_query($GLOBALS["___mysqli_ston"], $str11);
                $count11=mysqli_num_rows($res11); ?>
                <!-- <li>
                  <a href="#" class="btn-show-chat">
                    <i class="ti-announcement"></i><span class="badge badge-warning"><?php echo $count11;?></span>
                  </a>
                </li> -->
                  <style type="text/css">
                  .goog-te-gadget .goog-te-combo
                  {
                    color:#000;
                    background-color: #fff ;
                    padding:10px;
                    width:150px;
                  }
                  .goog-te-gadget {
                    color:#0a899a;
                  }
                  .goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active{
                    color:#0a899a;
                  }
                  .goog-logo-link img{
                    display:none;
                    display:hidden;
                  }
                  .goog-te-banner-frame{
                    display:none;
                  }
                  .skiptranslate{
                    margin-top: 4px !important;
					          margin-left: 115px;
                  }
				  .goog-te-gadget img{
						display:none !important;
					}
					.goog-te-gadget-simple .goog-te-menu-value span{
						padding-right:5px !important;
					}
					.goog-te-banner-frame{
						display:none !important;
					}
                  </style>

  
                <!-- <li  data-toggle="tooltip" data-placement="right">
                  <div id="google_translate_element" style="top:0px;"></div>
                <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </li>-->
                <!-- end of OPEN NOTIFICATION PANEL BUTTON -->

              </ul>

              <ul class="nav navbar-nav navbar-right">

                <!-- start of USER MENU -->
                <li class="dropdown user-profile">
                                                     
                        <?php 
                        /*$ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'"));
                        
                        $refIds = $ref['ref_id'];
                        $mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$userid' "));
                        $mydownincome = $mydownlineincomes['total'];
                        
                        $total_earnssing11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(after_active)as ssss from lifejacket_subscription where user_id='$userid' order by id desc"));                        
                        $mybusiness = $total_earnssing11['ssss'];
                        
                        $powerlegearning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select power_leg_business from user_registration where user_id='$userid'"));                        
                        $powerlegbusiness = $powerlegearning['power_leg_business'];
                        
                        $selfearning = $mybusiness+$powerlegbusiness;
                        
                        $mytotalearning = $mydownincome+$mybusiness+$powerlegbusiness;*/
    
                        ?> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="height:55px; display:inline-block !important;">
                        <div class="user-img-container">
                          <img src="<?php echo $userimage;?>" alt="My Image"> 
                        </div> 
                        Welcome <?php echo $f['username'];?> ! <br/> 
                        <?php 
                        //echo $f['designation'];
                        $str1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$f['rank']."'  "));
                       // print_r($str1);
                        //echo '('.$str1['level_per'].'%)';
                        //if($f['co_founder']>0){ echo "Co-Founder";}else{ } ?>
                        <!--<span class="chat-status success"></span>-->
                    </a>
                    
                        
                    
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="update-profile.php">My Profile</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </li>
                <!-- end of USER MENU -->

              </ul>
            </div>
            <!-- end of navbar-collapse -->
          </div>
          <!-- end of container-fluid -->
        </nav>