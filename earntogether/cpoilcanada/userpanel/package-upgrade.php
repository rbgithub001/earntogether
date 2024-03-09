<?php include("header.php");
function commission_matching($ref,$user1,$amount,$percentage,$total_invesment){
$invoice_no=rand(100000000,9999999999);
$userid=$user1;
$date=date('Y-m-d');
$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$invoice_no=$invoice_no;
     $sender_id=$ref;
     
    $withdrawal_commission1=$amount;
    if ($withdrawal_commission1>0) {
    mysqli_query($GLOBALS["___mysqli_ston"], "update b_wallet set amount=(amount+$withdrawal_commission1) where user_id='".$user1."'");
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$user1','$withdrawal_commission1','0','$withdrawal_commission11','$user1','$sender_id','$date','Matching Bonus','Matching Bonus','Matching Bonus From $level','$tds','$invoice_no','$admin','0','B Wallet',CURRENT_TIMESTAMP,'$urls','".$comm['user_plan']."','$percentage','$total_invesment')");  
}
}
/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages){
    
    //echo "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','B Wallet',CURRENT_TIMESTAMP,'$urls','$packages','$spc','$amount')"; die();
	$date=date('Y-m-d');
	$commpackage=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select package from user_request where user_id='".$ref."'"));
	 $pack_id=$commpackage['package']; 

    $refmid=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select user_plan from user_registration where user_id='$ref'")); 
	$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$refmid['user_plan']."'"));
	 $spc=$comm['referral'];



	$withdrawal_commission=$spc*$amount/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0){
	mysqli_query($GLOBALS["___mysqli_ston"], "update b_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
	$urls="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','B Wallet',CURRENT_TIMESTAMP,'$urls','$packages','$spc','$amount')");	
	
	  $refmid=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$ref'")); 
	  $refmids=$refmid['ref_id'];
   	  $matching_amoumt=$withdrawal_commission*5/100;
	  commission_matching($ref,$refmids,$matching_amoumt,5,$withdrawal_commission);

	}
}
/* Sponsor Commission Code Ends Here*/

  if (isset($_POST['sub'])){
      
      
    $amount=$_POST['amount'];
    $amount11=$_POST['amount'];
    $user_id=$f['user_id'];
    $userid=$f['user_id'];
$package=$_POST['package']; 
    $payment_mode = $_POST['pay_mode'];
    
    $fuser=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$user_id."'"));  

 if( $fuser['t_code'] != $_REQUEST['pin'])
      {
        
         // echo "<script language='javascript'> alert('Invalid Pin!'); window.location.href='package-upgrade.php'; </script>";
          
        header('location:package-upgrade.php?msg=Invalid Pin!!');

          exit();
        }
        
        //echo "select * from $payment_mode where user_id='".$user_id."'"; die();
         $userwallet=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $payment_mode where user_id='".$user_id."'"));  
//echo $userwallet['amount']; die();
 if($amount11>$userwallet['amount'])
      {
        
        //  echo "<script language='javascript'> alert('Balance not available!'); window.location.href='package-upgrade.php'; </script>";
                 
                  header('location:package-upgrade.php?msg=Balance not available!');

          exit();
        }
        
        
    
    
   
    $q2=mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO `investment`(`user_id`, `package_id`, `investment_fee`) VALUES ('".$user_id."','".$package."','".$amount."')");
    $cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$userid."'"));
    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='$package'"));


$min=$comm['amount'];
$max=$comm['matching'];

 if(($amount<$min) || ($amount>$max))
      {
      header('location:package-upgrade.php?msg=Please Enter a Valid Amount!');

          exit();
        }


    $package_name=$comm['name']; 
    $pbs1=$_POST['amount'];
    $matching=$comm['matching'];
    $ewa=$_POST['pay_mode'];
    if($_POST['pay_mode']=='final_e_wallet'){
                        $walls = "CANTHO Wallet";
        }elseif($_POST['pay_mode']=='b_wallet'){
        $walls = "B Wallet";
            }
            elseif($_POST['pay_mode']=='t_wallet'){
        $walls = "T Wallet";
            }
            elseif($_POST['pay_mode']=='rmb_wallet'){
        $walls = "RMB Wallet";
            }

    
    $rand = rand(0000000001,9000000000);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+365 days'));
    $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'"));   
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    $pv=$amount;
    $lfid="LJ".$userid.$rand;
    mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE $payment_mode SET amount=(amount-$amount) WHERE user_id='$userid'");
    $cron_date1=date('Y-m-d', strtotime($start. ' + 1 days'));
    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`,`invest_type`,`cron_date`) VALUES (NULL, '$userid', '$package', '$amount11', 'package upgrade', '$pincodes', '$rand', '$start', '$end', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$userid."','".$cure['ref_id']."','$privious_investment','$invest_type','$cron_date1')");
    $lifejuserid=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select package from lifejacket_subscription where user_id='$userid' order by id desc "));   
    $package=$lifejuserid['package'];
    //if($package>$package){
        
       // echo "update user_registration set  user_plan='$package' where user_id='$userid'"; die();
      mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set user_rank_name='Paid Member', user_plan='$package' where user_id='$userid'");
  // }
   
           commission_of_referal($cure['ref_id'],$userid,$amount,$rand,$package);
           
            $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userid'");
            while($upline=mysqli_fetch_array($upliners)){
              $income_id=$upline['income_id'];
              $position=$upline['leg'];
              $user_level=$upline['level']; 
              mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$userid','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
            }
            
            
        
        

			 /*mail */
			  $useremail=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='$userid'")); 
			  $email=$useremail['email'];
			  date_default_timezone_set('Asia/Kolkata');

require '../mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = "mail.smtp2go.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;


//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = "srdev@maxtratechnologies.net";
//jeera.update1@maxtratechnologies.in
$mail->Password = "Maxtra@2020";

$mail->SMTPSecure = 'tls';

//Set who the message is to be sent from
$mail->setFrom('srdev@maxtratechnologies.net', 'CANTHO');
//Set an alternative reply-to address
$mail->addReplyTo('srdev@maxtratechnologies.net', 'CANTHO');
//Set who the message is to be sent to
$mail->addAddress($email, 'CANTHO');
//Set the subject line
$mail->Subject = 'CANTHO  Invesment';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '<!doctype html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Account Credential</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="http://182.76.237.227/~syscheck/cifuae/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                    Package invesment
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello '.$_SESSION['username'].' thanks for Invesment with us.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                  
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                 <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Invesment Amount : '.$amount.'</h3>
                 
                 <h3 style="margin: 8px 0px 10px !important;font-weight: 300;font-size: 20px"> Package_name : '.$package_name.'</h3>
                   
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2021 CANTHO. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

	$mail->send();



			 /* mail */
        
        
        header('location:package-upgrade.php?msg=You have successfully activated '.$userid.' account');
        exit;
        }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#pay_mode").on('change',function(){
      $('#vouch').html('');
   var txt = $(this).val();
   if (txt == 'Voucher')
   {
       $('#vouch').html("<input type= 'text' name ='Voucher' placeholder='Enter Voucher' class='form-control'>");
       $("#form_id").attr("action","test.php");
   }
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pay_mode1").on('change',function(){
      $('#vouch1').html('');
   var txt = $(this).val();
   if (txt == 'Voucher')
   {
       $('#vouch1').html("<input type= 'text' name ='Voucher' placeholder='Enter Voucher' class='form-control'>");
       $("#form_id1").attr("action","test.php");
   }
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pay_mode2").on('change',function(){
      $('#vouch2').html('');
   var txt = $(this).val();
   if (txt == 'Voucher')
   {
       $('#vouch2').html("<input type= 'text' name ='Voucher' placeholder='Enter Voucher' class='form-control'>");
       $("#form_id2").attr("action","test.php");
   }
  });
});

</script>

<script>
$(document).ready(function(){
  $("#pay_mode3").on('change',function(){
      $('#vouch3').html('');
   var txt = $(this).val();
   if (txt == 'Voucher')
   {
       $('#vouch3').html("<input type= 'text' name ='Voucher' placeholder='Enter Voucher' class='form-control'>");
       $("#form_id3").attr("action","test.php");
   }
  });
});
</script>

    <style type="text/css">
    .rdbtn{
      background:#000;
      color:#fff;
      transition:all .3s;
      padding: 10px;
      font-size: 20px;
    }
    .rdbtn:hover{
      background:#b30000;
      color:#fff;
    }
	.animsition{
		min-height:980px !important;
	}
    </style>
  </head>

  <body class="">
    <div class="animsition">  
    
      <!-- start of LOGO CONTAINER -->
     
      <!-- end of LOGO CONTAINER -->

      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
     <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

            
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
          <?php include("top.php");?>

        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
           

          </div>

          <div class="col-md-4">

           
          </div
        </section> <!-- / PAGE TITLE -->




        <div class="container-fluid">

  <h4>  <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;float:center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?> <?php if(@$_GET['msg1']!='') { ?><br/><br/> <div style="color:red;width:100%;float:center;"><strong><?php echo $_GET['msg1'];?></strong><br/><br/></div> <?php } ?></h4> 

       

		<div class="row">




<?php $alredy=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' order by id desc limit 1");
$yesno=mysqli_num_rows($alredy); 
 $der=mysqli_fetch_array($alredy);
if ($der['package']=='') {
  $packid=0;
}else{
$packid=$der['package'];  
}


if($packid==8)
{
  echo "You had already updated to higher Package!";
  
}


 //Old Package Fetch Detail
                // $commding=$der['date'];
                // $datetime1 = new DateTime($commding);
                // $datetime2 = new DateTime($date);
                // $interval = $datetime1->diff($datetime2);
                // $interval->format('%a');


                // if($interval<=30)
                // {
                //   $percent=110;
                // }
                // else if($interval>=30 && $interval<=60)
                // {
                //   $percent=115;
                // }
                // else
                // {
                //   $percent=120;
                // }


  $Adate= $der['date'];
  $todaydate=(date("Y-m-d"));
?>

       <?php 
             $i=1;
             $fetch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance");
             while($data=mysqli_fetch_array($fetch))
             {
              ?>
			<div class="col-md-3 col-sm-6">
				<div class="bpackage">
				    <!--<form name="input<?php echo $i;?>" method="post" method="post" action="making-deposit.php" id='form_id'> -->
				    <form name="input<?php echo $i;?>" method="post" method="post" action="#" id='form_id'> 
				<!--	<p><img src="images/<?php //echo $data['description'];?>" class="img-responsive" alt="" /></p>  -->
					<h3><?php echo $data['name'];?></h3>
					<h1>$<?php echo $data['amount'];?>-$<?php echo $data['matching'];?></h1>
					<input type="hidden" name="package" value="<?php echo $data['id'];?>">
				 <ul>
						<!--<li><i class="fa fa-check" aria-hidden="true"></i> Validity : 15 Months</li>-->
						<!--<li><i class="fa fa-check" aria-hidden="true"></i> Month Profit : 10%</li>-->
						<!--<li><i class="fa fa-check" aria-hidden="true"></i> Total Profit : 30 Days</li>-->
					    <li><i class="fa fa-check" aria-hidden="true"></i> Daily Profit(%age)  : <?php echo $data['sponsor_reward'];?>%</li>
					    <li><i class="fa fa-check" aria-hidden="true"></i> Validity (Days): <?php echo $data['roi_duration'];?></li>
					    <li><i class="fa fa-check" aria-hidden="true"></i> Total : <?php echo $data['sponsor_reward']*$data['roi_duration'];?>%</li>
					    <li><i class="fa fa-check" aria-hidden="true"></i> Royality Income : 1%<?php //echo $data['residual_income'];?></li>
					    <li><i class="fa fa-check" aria-hidden="true"></i> Sponsor Income : <?php //echo $data['residual_income'];?>%</li>
					    
					    <!--    Residual Income -->
					    
					    <!--<li><i class="fa fa-check" aria-hidden="true"></i> Matching Income : <?php echo $data['matching_income'];?>%</li>-->
					    <!--<li><i class="fa fa-check" aria-hidden="true"></i> Matching Capping : $ <?php echo $data['capping'];?></li>-->
					    <!--<li><i class="fa fa-check" aria-hidden="true"></i> <?php echo $data['principal_return'];?></li>-->
					    <li style="font-size:16px;color: #337ab7;"><i class="fa fa-check" aria-hidden="true" ></i><b> CANTHO Wallet : $<?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><?php  echo number_format($data['amount'],2);?></b></li>
					</ul> 
					
					<!--<div class="voucher"><a href="#">Using Voucher Code</a></div>
					<div class="buy"><a href="#">Buy</a></div>-->
					<input type="text" class="form-control" required name="amount" placeholder="Enter Amount" >
                    <!--<br><input type="text" class="form-control" required name="pin" placeholder="Enter Pin" >-->
                    <br>
                   <select id="pay_mode"  class="form-control" required name="pay_mode">
                      <option value="">--please select--</option>
                      <option value="final_e_wallet">CANTHO Wallet</option>
                     
                      <!--<option value="Bitcoin">Bitcoin</option>-->
                      <!--<option value="Ethereum">Ethereum</option>-->
                          <!--<option value="litecoin">Litecoin</option>-->
                   <!--    <option value="Voucher">Voucher</option> -->
                    </select>

                <br>
               <div class="plan-info" id='vouch'>
                  
               </div>
               
                    
					<input type="submit" name="sub" value="Buy" class="btn btn-primary btn-block" />
					</form>
				</div>
			</div>

	<?php $i++;} ?>

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->



    </main> <!-- /playground -->


    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
    <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
 

  </body>
</html>