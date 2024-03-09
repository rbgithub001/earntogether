<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','Off');
@ini_set('error_reporting',0);
ob_start();
include_once("header.php");


function spill($sponserid)
{
  global $nom_id1,$lev;
  foreach($sponserid as $key => $val)
  {
  $query1="select * from user_registration where nom_id='$val' order by id";
  $result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
  $num_ro1[]=mysqli_num_rows($result1);
  while($row=mysqli_fetch_array($result1))
  {
  $rclid1[]=$row['user_id'];
  }
  }
  foreach($num_ro1 as $key11 => $valu)
  {
   if($valu < 5)
   {
   $key1=$key11;
   break;
   }
  }
    switch ($valu)
    {
    case '0':
    $nom_id1=$sponserid[$key1];
    break;
    case '1':
    $nom_id1=$sponserid[$key1];
    break;
    case '2':
    $nom_id1=$sponserid[$key1];
    break;
    case '3':
    $nom_id1=$sponserid[$key1];
    break;
    case '4':
    $nom_id1=$sponserid[$key1];
    break;
    case '5':
    if(!empty($nom_id1))
    {
    break;
    }
    spill($rclid1);
  }
   return $nom_id1;
}


include("profit-sharing-commission-file.php"); 
?>
<?php 
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

/* Retail Commission Code Starts Here*/
function  Fast_Start_Commission($usersid,$invoice_no,$total_amount,$mailu)
{
  $date=date('Y-m-d');
  $need_rank=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$usersid'"));
  $need_rank1=$need_rank['user_rank_name'];
  if($need_rank1=='Free Member')
  {
  $spc=10;
  }
  else if($need_rank1=='Customer')
  {
  $spc=10;
  }
  else if($need_rank1=='Preferred Customer')
  {
  $spc=15;
  }
  else if($need_rank1=='Marketers')
  {
  $spc=20;
  }
  else if($need_rank1=='Preffered Marketers')
  {
  $spc=25;
  }
  else if($need_rank1=='Pro Marketers')
  {
  $spc=25;
  }
  else if($need_rank1=='Preffered Pro Marketers')
  {
  $spc=30;
  }
  else if($need_rank1=='Elite Marketers')
  {
  $spc=35;
  }
  else
  {
  $spc=0;
  }
  $withdrawal_commission=$total_amount*$spc/100;
  $rwallet=$withdrawal_commission;
  if($withdrawal_commission!='' && $withdrawal_commission!=0)
  {
  mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$usersid."'");
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$usersid','$rwallet','0','0','$usersid','$mailu','$date','One Time Rewards','Earn One Time Rewards for $invoice_no Invoice','Earn One Time Rewards for $invoice_no Invoice','Earn One Time Rewards for $invoice_no Invoice','$invoice_no','Earn One Time Rewards for $invoice_no Invoice','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");  
  }
}
/* Retail Commission Code Ends Here*/









/* Retail Commission Code Starts Here*/
function  One_Time_Fast_Start_Commission($users,$invoice_no,$total_amount)
{
  $date=date('Y-m-d');
 
  $need_rank=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline_ref where down_id='$users' and level<'6'");
  while($income=mysqli_fetch_array($need_rank))
  {

  $usersid=$income['income_id'];
  $need_ranks=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$usersid'"));
  $need_rank1=$need_ranks['user_rank_name'];
  if($need_rank1=='Free Member')
  {
  $spc=10;
  }
  else if($need_rank1=='Customer')
  {
  $spc=10;
  }
  else if($need_rank1=='Preferred Customer')
  {
  $spc=15;
  }
  else if($need_rank1=='Marketers')
  {
  $spc=20;
  }
  else if($need_rank1=='Preffered Marketers')
  {
  $spc=25;
  }
  else if($need_rank1=='Pro Marketers')
  {
  $spc=25;
  }
  else if($need_rank1=='Preffered Pro Marketers')
  {
  $spc=30;
  }
  else if($need_rank1=='Elite Marketers')
  {
  $spc=35;
  }
  else
  {
  $spc=0;
  }
  $withdrawal_commissiond=$total_amount*$spc/100;
  $withdrawal_commission=$withdrawal_commissiond;
  $rwallet=$withdrawal_commission;
  if($withdrawal_commission!='' && $withdrawal_commission!=0)
  {
  mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$usersid."'");
  $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$usersid','$rwallet','0','0','$usersid','$users','$date','Ongoing Fast Start Bonuses','Earn Ongoing Fast Start Bonuses for $invoice_no Invoice','Earn Ongoing Fast Start Bonuses for $invoice_no Invoice','Earn Ongoing Fast Start Bonuses for $invoice_no Invoice','$invoice_no','Earn Ongoing Fast Start Bonuses for $invoice_no Invoice','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");  
  }
  }
}
/* Retail Commission Code Ends Here*/














/*Rank Updation Code Start Here*/
function  Update_Rank_Customer($userside)
{
    $fers=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userside'"));
    $rank_user=$fers['user_rank_name'];
    if($rank_user=='Free Member')
    {
      $purpoints=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as totalp from purchase_detail where user_id='$userside'"));
      $purpoints1=$purpoints['totalp'];
      if($purpoints1>=40)
      {
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `pool_users` (`id`, `user_id`, `come_date`, `go_date`, `rank`, `status`) VALUES (NULL, '$userside', '".date('Y-m-d')."', '', 'Customer', 'Active')");
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `rank_achiever` (`id`, `user_id`, `last_rank`, `move_rank`, `ts`, `posted_date`) VALUES (NULL, '$userside', 'Free Member', 'Customer', CURRENT_TIMESTAMP, '".date('Y-m-d')."')");
           
        $ref_id=$fers['ref_id'];
     

        mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set user_rank_name='Customer',  designation='Customer' where user_id='$userside'");


      }
    }
}

/*Rank Updation Code Ends Here*/


/* */
function  Update_Preffered_Marketer_dollar_one_commission_after_650($userside1)
{
    $count=0;
    $invoice_no=rand(111111,999999);
    $date=date('Y-m-d');
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

    $need_rank=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where down_id='$userside1'");
  while($income=mysqli_fetch_array($need_rank))
  {
    $userside=$income['income_id'];
    $ok=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userside' and user_rank_name='Preffered Marketers'"));
    if($ok>0)
    {
    $total_left_downline1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$userside'");
    while($datw1=mysqli_fetch_array($total_left_downline1))
    {
      $down=$datw1['down_id'];
      $ranks=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$down'"));
      $ranks=$ranks['user_rank_name'];
      if($ranks!='Free Member')
      {
        $count++;
      }
    }
    if($count>650)
    {
    $rwallet=1;
    mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$rwallet) where user_id='".$userside."'");
    $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$userside','$rwallet','0','0','$userside','$userside1','$date','Dollar 1 Pool Bonuses','Earn Dollar 1 Pool Bonuses for $invoice_no Invoice','Earn Dollar 1 Pool Bonuses for $invoice_no Invoice','Earn Dollar 1 Pool Bonuses for $invoice_no Invoice','$invoice_no','Earn Dollar 1 Pool Bonuses for $invoice_no Invoice','0','Withdrawal Wallet',CURRENT_TIMESTAMP,'$urls')");  
    }
  }
  }




}
/* */






                 /*generate invoice number*/
                    function _generateInvoiceNo(){
                            global $mxDb;
                            $rand = mt_rand(100000000000000,99999999999999999);
                              $condition = " where invoice_no='".$rand."'";
                                $args_invoice = $mxDb->get_information('lifejacket_subscription','invoice_no',$condition,true,'assoc');
                              if(isset($args_invoice['invoice_no']))
                              {
                                if($args_invoice['invoice_no'] == $rand)
                                  _generateInvoiceNo();
                                else
                                  return $rand;
                              }
                              else
                                return $rand;
                            }

                      /*make payment*/

                  if(isset($_POST['wallet_pay']))
                  {
                    global $mxDb;
                    $date=date("Y-m-d");
                    $payment_type='E Pin';print_r("<br/>");
                    $pay_pin = $_POST['pay_pin'];print_r("<br/>");
                  
                    $total_amount = $_SESSION['ag'];print_r("<br/>");

                      $ewallet_table='E Pin'; 
                      $ewallet_table1='E Pin';


               $numsf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pins where pin_no='$pay_pin' and status='0' and amount='$total_amount'"));
               if($numsf>0)
               {

               	mysqli_query($GLOBALS["___mysqli_ston"], "update pins set status='1', used_by='".$_SESSION['user_id']."', t_date='".date('Y-m-d')."' where pin_no='$pay_pin'");



                    

                                                                      
                                            $invoice_no = _generateInvoiceNo();
                                                       
                                      /*inserting products in purchase detail table*/

                                      foreach ($_SESSION["cart_products"] as $cart_itm){
                                             // set variables to use in content below
                                              $product_name = $cart_itm["product_name"];
                                              $product_qty = $cart_itm["product_qty"];
                                              $product_price = $cart_itm["product_price"];
                                              $product_id = $cart_itm["product_id"];
                                              $product_color = $cart_itm["product_color"];
                                              $product_points = $cart_itm["product_points"];
                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                  $total_points = ($product_points * $product_qty); //calculate Price x Qty

                                  $fsc = $cart_itm["fcs"];
                                  
                                  $pamt=$product_price*$fsc/100;
                                  $pamt1=$pamt*$product_qty;
                                  $pamt2=$pamt2+$pamt1;
                                  $totalsmts=$totalsmts+$pamt2;
                                  
                                            $total = ($total + $subtotal); //add subtotal to total var

                                              $subtotal = ($product_price * $product_qty); //calculate Price x Qty
                                 


                                            $insert_array = array('invoice_no'=>$invoice_no,'product_name'=>$product_name,'user_id'=>$_SESSION['user_id'],'p_id'=>$product_id,'quantity'=>$product_qty,'net_price'=>$subtotal,'price'=>$product_price,'pay_mode'=>$ewallet_table1, 'pay_type'=>$ewallet_table1,'purchase_date'=>$date,'pv'=>$total_points);
                                              
                                              $mxDb->insert_record('purchase_detail', $insert_array);
                                             
                                                 //if($mxDb->insert_record('purchase_detail', $insert_array))

                                              }
                                            $insert_array1= array('invoice_no'=>$invoice_no,'user_id'=>$_SESSION['userpanel_user_id'],'net_amount'=>$total_amount,'payment_mode'=>$ewallet_table1, 'total_amount'=>$total_amount, 'payment_date'=>$date, 'purchase_date'=>$date, 'date'=>$date); 
                                            $mxDb->insert_record('amount_detail', $insert_array1);
						
                                            $qur = mysqli_query($GLOBALS["___mysqli_ston"], "update $ewallet_table set amount='$amt' where user_id='".$paid_id."'");
											 
 mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`)
   values('$invoice_no','$paid_id','0','".$total_amount."','0','123456','$paid_id','$date','Shop Product Purchase','Shop Product Purchase','Shop Product Purchase','Shop Product Purchase','$invoice_no','Shop Product Purchase','0','E Wallet','$urls')");

$gers=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_SESSION['userpanel_user_id']."'"));






$purpoints=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as totalp from purchase_detail where user_id='".$_SESSION['userpanel_user_id']."'"));
$purpoints1=$purpoints['totalp'];
if($purpoints1>=40)
{
  

  if($ydat['nom_id']=='')
  {

    $ydat=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$_SESSION['userpanel_user_id']."'"));
  $ref_id=$ydat['ref_id'];
  $ref_id123 = array();
  $ref_id123[]=$ref_id;
  $nom_id=spill($ref_id123); 

          /*Inserting Record of BV in manage bv table for all upliners code starts here*/
         $nom=$nom_id;
         $date=date('Y-m-d');
          $l=1;
          while($nom!='cmp'){
                          if($nom!='cmp'){
              mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$_SESSION['userpanel_user_id']."', income_id='$nom', l_date='$date', status=0, level='$l'");
                $l++;
                $selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select nom_id from user_registration where user_id='$nom'");
                $fetchnompos=mysqli_fetch_array($selectnompos);
                $nom=$fetchnompos['nom_id'];
            }

          } 
   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='$nom_id' where user_id='".$_SESSION['userpanel_user_id']."'");
   }

}



 Update_Rank_Customer($_SESSION['userpanel_user_id']);
                                            if($f['user_rank_name']!='Free Member')
                                            {

/*Inserting Record of BV in manage bv table for all upliners code starts here*/
        $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline_ref where down_id='".$_SESSION['userpanel_user_id']."'");
        while($upline=mysqli_fetch_array($upliners))
        {
        $income_id=$upline['income_id'];
        $user_level=$upline['level'];
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','".$_SESSION['userpanel_user_id']."','$user_level','".$total_points."','Package Purchase Amount','$date')");
        }
         /*Inserting Record of BV in manage bv table for all upliners code ends here*/

                                         

                                            }


$one=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from amount_detail where user_id='".$_SESSION['userpanel_user_id']."'"));
if($one==1)
{
  Fast_Start_Commission($gers['ref_id'],$invoice_no,$total_amount,$_SESSION['userpanel_user_id']);
}
else
{
  One_Time_Fast_Start_Commission($_SESSION['userpanel_user_id'],$invoice_no,$totalsmts);
}

$purpoints=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(pv) as totalp from purchase_detail where user_id='".$_SESSION['userpanel_user_id']."'"));
$purpoints1=$purpoints['totalp'];
if($purpoints1>=40)
{
Profit_Sharing_Bonus($_SESSION['userpanel_user_id']);
Update_Preffered_Marketer_dollar_one_commission_after_650($_SESSION['userpanel_user_id']);
}


                                     
                                           
                                              
  
 $email=$f['email'];
    $strSubject = "Purchase Detail Invoice From Member25";
    $from = 'kamlesh@maxtratechnologies.net';
    $strSid = md5 ( uniqid ( time () ) );
    $strHeader = "";
    $strHeader .= "From:<" . $from . ">\nReply-To: " . $from . "";                
    $strHeader .= "MIME-Version: 1.0\n";
    $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
    $strHeader .= "This is a multi-part message in MIME format.\n";
    $strHeader .= "--" . $strSid . "\n";
    $strHeader .= "Content-type: text/html; charset=utf-8\n";
    $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
    $strHeader .= " \n\n";
    $strHeader .= "  <br>";
    $msg = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<style>
*{-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;}
</style>
<body style="margin:0px; padding:0px; font-family: Arial, Helvetica, sans-serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
<div class="container" style="width:544px; margin:auto;margin-bottom:50px;margin-top:50px;">
<div class="wrapper" style="width:100%; float:left; background:#fff;border-radius: 8px 8px 0px 0px;margin-bottom:50px;">
<div class="top" style="width:94%; float:left; background:#235daa; padding:16px;border-radius: 8px 8px 0px 0px;">
<img src="http://198.154.241.136/~kamlesh/mike/images/fox-dark-logo3.png" height="80" /><br/>
<span class="head" style="width: 100%; float: right;text-align:center;color: #fff;font-weight: bold;
font-size: 27px;">Product Order Invoice </span>
</div>
<div class="top1" style="width:100%; float:left; background:#f6f6f7; padding:23px 0px; text-align:center;
border-radius: 8px 8px 0px 0px;font-size: 24px;line-height: 36px;font-weight: bold;color: #465059;">
Thanks for the purchasing with us!
</div>
<div class="top2" style="width:100%; float:left; padding:16px;border-radius: 8px 8px 0px 0px;font-size: 14px;
color: #54565c;">
<p style="    margin-bottom: 24px;"><span>Hey '.$f[username].',<br></br></span>
Below is your order detail you had just made. Hope you feel better with our service <br/>and we will waiting for your return!</p>
<p style="margin-bottom: 24px;">Your Order Detail for Invoice No : <strong>'.$invoice_no.'</strong></p>
</div>
<div class="top3" style="width:94%; float:left; background:#f6f6f7; padding:16px;
font-size: 13px;color: #888;">

<div class="clnt" style="width:65%; padding-left: 23px;">
<p style="background:#78b8c4; color:#fff;padding: 8px 10px;border-radius: 2px; margin:0px;margin-left:150px;">Total Amount Paid : $ '.$total_amount.'</p>
</div>

</div>

<div class="bottom" style="width:100%; float:left;color:#54565c;font-size:14px;">
<div class="bottom1" style="width:100%; float:left; text-align:center;margin:24px 0px;">But it`s not too late! To you can purchase as much as you want,<br/> click the button below.</div>
<div class="bottom1" style="width:100%; float:left; text-align:center;">
<a href="http://198.154.241.136/~kamlesh/mike/login.php"><button style="border: none; color: #fff; background-color: #7fbe56; padding: 14px 24px;
font-size: 20px;border-radius: 5px; cursor:pointer;">Purchase More</button></a>
</div>
<div class="bottom1" style="width:100%; float:left; text-align:center;margin:24px 0px; ">Thanks for shopping!<br/>
              Member25 Team</div>
</div>
</div>
</body>
</html>';

    mail ( $email, $strSubject, $msg, $strHeader );



                                           header('location:shopping-invoice-detail.php?inv='.$invoice_no);
                       
}
else
{
	header("location:pin-shop-payment.php?msg=Wrong epin enter or pin already used!");
}

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

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">
    <div class="animsition">  
    
   
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
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Pay By E Pin</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          </div>

             
             
          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Eshop</a></li>
              <li><a href="#">E Pin Payment</a></li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

           <form name="bankinfo" method="post">
           <input type="hidden" name="pay_method" value="final_e_wallet_pay">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title"><strong>Pay Your Amount By E Pin</strong></h3>
                </header>
                
                <div class="panel-body">
                
                <div class="form-group">
                      <label for="exampleInputAddress">Your Total Invoice Amount: <strong>USD <?php echo $_SESSION['ag'];?></strong></label>
                      
                    </div>
                      <div class="form-group">
                        <label for="exampleInputAddress">Enter the e pin </label>
                          <div class="input-group">
                             <span class="input-group-addon"></span>
                               <input type="text" name="pay_pin" required value="" class="form-control" id="exampleInputAddress">
                        </div>
                    </div>
                  
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="wallet_pay" value="PAY" class="btn btn-success">             
                  </div>
              </div>
            </div>
          </div>

              </section>

</form>

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->


<?php include("footer.php");?>

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
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>