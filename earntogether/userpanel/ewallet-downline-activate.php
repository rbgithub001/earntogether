<?php include("header.php");


if(isset($_POST['submit'])) 
{
    $user=$_POST['user'];
    $t_password=$_POST['t_password'];
  $platform=$_POST['platform'];

    if($t_password!=$f['t_code'])
    {
        header("location:ewallet-downline-activate.php?msg=Transaction password not matched");
        exit;
    }
    else
    {
        $conts=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where (user_id='$user' || username='$user')");
        $newconts=mysqli_num_rows($conts);
        if($newconts>0)
        {
            $fetching=mysqli_fetch_array($conts);
            $activeuser_id=$fetching['user_id'];

            $reg_user=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$activeuser_id'"));
             $plan = $platform;
            $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$plan."'"));
                    $sponsor_benifit_bonus=$comm['sponsor_commission'];
                    $pb=$comm['pb'];
                    $amount=$comm['amount'];

          $ewa='final_e_wallet';
  $walls="Fund Wallet";
    $rand = rand(0000000001,9000000000);
    $start=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+120 days'));
    $lfid="LJ".$activeuser_id.$rand;

                    $lastcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='".$f['user_id']."' and amount>='$amount'"));
                    if($lastcount>0)
                    {
$un=$reg_user['username'];
  $pw=$reg_user['password'];
  $t_pw=$reg_user['t_code'];

 $downline_check=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$f['user_id']."' and down_id='$activeuser_id'"));
  if($downline_check>0)
              {
if ($reg_user['user_rank_name']!='Affiliate') {

            mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Affiliate', user_rank_name ='Affiliate', user_plan='$plan' where user_id='$activeuser_id'");

            


            $upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$activeuser_id'"); 
            while($upline=mysqli_fetch_array($upliners)) { 
              $income_id=$upline['income_id']; 
              $position=$upline['leg']; 
              $user_level=$upline['level']; 
              mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$activeuser_id','$user_level','".$pb."','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$pb')"); 
            }

    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$activeuser_id', '$plan', '$amount', '$walls', '$password', '$rand', '$start', '$end', 'Package Upgrade', CURRENT_TIMESTAMP, 'Active', '$rand','$lfid','".$activeuser_id."','".$f['user_id']."','$pb')");

    


            $invoice=rand(1000000,9999999);
            $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            $amts=5000;

        mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount-$amount) where user_id='".$f['user_id']."'");
         // mysqli_query($GLOBALS["___mysqli_ston"], "update shopping_e_wallet set amount=(amount+$amts) where user_id='".$activeuser_id."'");
        mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit (`transaction_no`,`user_id`,`credit_amt`,`debit_amt`,`admin_charge`,`receiver_id`,`sender_id`,`receive_date`,`ttype`,`TranDescription`,`Cause`,`Remark`,`invoice_no`,`product_name`,`status`,`ewallet_used_by`,`current_url`) values('$invoice','".$f['user_id']."','0','$amount','0','".$f['user_id']."','$activeuser_id','".date('Y-m-d')."','Downline Activation','Downline Activation','Downline Activation','Downline Activation','$invoice','Downline Activation','0','Fund Wallet','$urls')");






        header("location:ewallet-downline-activate.php?msg=Downline Activated Successfully.");
        exit;

}else
       {
        header("location:ewallet-downline-activate.php?msg=User Already Active");
    exit;
       }
        }else
       {
        header("location:ewallet-downline-activate.php?msg=User Is Not Your Growline Member");
    exit;
       }




       }
         else
         {
            header("location:ewallet-downline-activate.php?msg=Insuffcient fund in your leaders wallet");
        exit;
         }



        }
        else
        {
            header("location:ewallet-downline-activate.php?msg=No such user found or its already active");
        exit;
        }
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



    <style type="text/css">
    .rdbtn{
      background:#ff880e;
      color:#fff;
      transition:all .3s;
      padding: 10px;
      font-size: 20px;
    }
    .rdbtn:hover{
      background:#5f3d9e;
      color:#fff;
    }
    .panel-primary > .panel-heading {
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    color: #333;
    background-color: #d0a713;
    border-color: #b3900f;
    padding: 15px;
}
.rdbtn {
    background: #ff880e;
    color: #fff;
    transition: all .3s;
    padding: 10px;
    font-size: 20px;
}
.rdbtn:visited{
  color: #fff;
}
.package-upgradei{
  font-size: 16px;
}
.mar-bot-20{
  margin-bottom: 20px;
}
.package-upgradei label{
  margin-bottom: 10px;
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
            <br /><h1>Activate Downline</h1><br />

          </div>

        </section> <!-- / PAGE TITLE -->




        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;float:left;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>

        <?php $alredy=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' and status='Active' order by id desc limit 1");
$yesno=mysqli_num_rows($alredy); 
 $der=mysqli_fetch_array($alredy);
$packid=$der['package'];

$todaydate=(date("Y-m-d"));
   if(1==2)
   {
     echo "<h3 style='color:green;width:100%;float:left;'>"."Not allowed you have already purchased the package"."</h3>";
    
   }
   else
   {
?>


       
          <div class="row">

            <div class="clearfix"></div>

            <div class="col-md-8 center-block" style="float:none;">

              <div class="package-upgradei">

                 <form name="bankinfo" method="post" action="">

                                                <input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Enter Downline ID / Username</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="user" required value="" class="form-control" id="user">

                      </div>
                         <span id="euser"></span>
                    </div>

 <div class="form-group">
                      <label for="exampleInputAddress">Select Package</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                    <select class="form-control" name="platform" id="platform" required>
                                                         
                                                        <?php 
                      $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance");

                      while($queryf1=mysqli_fetch_array($fquery)) {
                      ?>
                      <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?> ( <?php echo $queryf1['amount'];?> INR )</option>
                      <?php } ?>
                                                        </select></div>
                    </div>

         
                         <div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>

                 <div class="row">
            <div class="col-md-12">
              <input type="submit" name="submit" value="Activate" class="btn label theme-bg text-white f-12">
                
            </div>
          </div>
                                               
                                            </form>

              </div>

          </div>

      

 <!--<div class="col-md-6">    <div class="widget price-table">    <div class="plan-info">
 <img src="Bitcoin-ATM.jpeg" style="height: 465px;
    width: 500px;">
    </div> 
  </div> 
    </div>  -->
    
      </div> 
 

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row --><?php } ?>

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
  <script>
    $(function() {
      $('#package').change(function(){
        var pack_id = $(this).val();
        if(pack_id){
          var pack_roi = $(this).find(':selected').data('reward');
          var pack_amt = $(this).find(':selected').data('amount');
          $("#pack_amt").html(pack_amt);
          $("#pack_roi").html(pack_roi+'%');
          $("#package_amount").val(pack_amt);
          $('#premiumpackage2').show();
        }else{
          $('#premiumpackage2').hide();
        }
      });

    });
  </script>
  <script type="text/javascript">
      
    function check_form(){

      
        $("#payment_method_error").hide();
          var payment_method = $("input[name=payment_method]:checked").val();
          console.log(payment_method);
          if(payment_method == "ewallet" || payment_method == "rwallet" || payment_method == "wwallet" || payment_method == "coinpayment"){
            $("#payment_method_error").hide();
            return true;
          }else{            
            alert("Please select payment method");
            $("#payment_method_error").show();
            return false;
          }

          return false;
      }
    </script>
</body>
</html>