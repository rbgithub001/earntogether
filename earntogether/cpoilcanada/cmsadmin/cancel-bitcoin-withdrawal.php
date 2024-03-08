<?php
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 

?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include("header.php");?>

    <!--easy pie chart-->
    <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="css/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="css/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
               <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
                    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                Confirm Payment
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <?php

                                if(isset($_GET['request_id']) && !empty($_GET['request_id']) ){
                                    $data = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from withdraw_request where status=0 and id = '".$_GET['request_id']."'"));


                                    if(count($data)){

                                        $sub8 = $data['total_paid_amount'];

                                        $walletfrom = $data['withdraw_wallet'];

        
                                         if ($walletfrom=='final_e_wallet') {
                                             $wit_table='final_e_wallet';
                                             $msg1='Withdrawal Wallet';                                          
                                         }elseif($walletfrom=='working_e_wallet') {
                                            $wit_table='working_e_wallet';
                                            $msg1='Working Wallet';
                                         }elseif ($walletfrom=='roi_e_wallet') {
                                            $wit_table='roi_e_wallet';
                                            $msg1='ROI Wallet';
                                         }

                                        $user_ids = $data['user_id'];

                                        $date=date("Y-m-d");
                                        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                        $rand=rand(0,1000000);

                                        
                                        mysqli_query($GLOBALS["___mysqli_ston"], "update withdraw_request set status = '1' where id = '".$_GET['request_id']."'");

                                        $selecting=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $wit_table where user_id='$user_ids'"));
                                        $request_amount1=$selecting['amount']; 
                                        $request_amounts1=$request_amount1+$sub8; 

                                        mysqli_query($GLOBALS["___mysqli_ston"], "update $wit_table set amount='$request_amounts1' where user_id='$user_ids'");

                                        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `credit_debit` (`id`, `transaction_no`, `user_id`, `credit_amt`, `debit_amt`, `admin_charge`, `receiver_id`, `sender_id`, `receive_date`, `ttype`, `TranDescription`, `Cause`, `Remark`, `invoice_no`, `product_name`, `status`, `ewallet_used_by`,`current_url`) VALUES (NULL, '$rand', '$user_ids', '$sub8', '0', '0', '123456', '$user_ids', '$date', 'Cancelled  Withdrawal Request', 'Cancelled Withdrawal Request From Admin', '0', 'Cancelled Withdrawal Request ', '$rand', 'Cancelled Withdrawal Request', '0', '$msg1','$urls')");

                                        $user_data = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT u.username, u.user_id, u.email FROM `withdraw_request` as w INNER JOIN user_registration AS u ON (u.user_id = w.user_id) WHERE w.id = '".$_GET['request_id']."'"));
                                            
                                            date_default_timezone_set('Asia/Kolkata');
                                            
                                            
                                        $email=$user_data['email'];
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
                                        $mail->Username = "uniqueperfectness@gmail.com";

                                        //Password to use for SMTP authentication
                                        $mail->Password = "Mishra@20";

                                        $mail->SMTPSecure = 'tls';

                                        //Set who the message is to be sent from
                                        $mail->setFrom('info@bitbuxatm.com', 'BitBuxATM');
                                        //Set an alternative reply-to address
                                        $mail->addReplyTo('info@bitbuxatm.com', 'BitBuxATM');
                                        //Set who the message is to be sent to
                                        $mail->addAddress($email, 'BitBuxATM');
                                        //Set the subject line
                                        $mail->Subject = 'Withdrawal Request';
                                        //Read an HTML message body from an external file, convert referenced images to embedded,
                                        //convert HTML into a basic plain-text alternative body
                                         $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                                        //Replace the plain text body with one created manually
                                        $mail->Body = '<!doctype html>
                                        <html>

                                        <head>
                                            <meta charset="utf-8">
                                            <title>Account Credential</title>
                                            <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
                                            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
                                        </head>

                                        <body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 70%; float: left;">
                                            <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
                                                <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
                                                    <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                                                        <img src="https://bitbuxatm.com/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                                                        
                                                        <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                                                         Hello '.$user_data["username"].', Your withdrawal request has been cancelled by admin. Your requested amount has been refunded to your wallet.
                                                        </div>
                                                        <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                                                        </div>
                                                        <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
                                        color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                                                          
                                                       
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            </div><br/><br/>
                                        </body>

                                        </html>';



                                          $mail->send();

                                        header("location: open-withdrawal-request.php?msg1=Amount refunded successfully!");


                                    }else{
                                        header("location: open-withdrawal-request.php?msg=Invalid request id!");
                                    }


                                }else{
                                    header("location: open-withdrawal-request.php");
                                }
                                

                            ?>
                            

                            

                        </section>
                    </div>

                </div>

            </div>
            <!--body wrapper end-->


            <!--footer section start-->
           <?php include("footer.php");?>
            <!--footer section end-->



        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery.min.js"></script>
<script src="js/switchery-init.js"></script>

<!--flot chart -->
<script src="js/jquery.flot.js"></script>
<script src="js/flot-spline.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.tooltip.min.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.selection.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>

<!--Data Table-->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.tableTools.min.js"></script>
<script src="js/bootstrap-dataTable.js"></script>
<script src="js/dataTables.colVis.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/dataTables.scroller.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<!--data table init-->
<script src="js/data-table-init.js"></script>

<!--common scripts for all pages-->

<script src="js/scripts.js"></script>


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>

</body>
</html>