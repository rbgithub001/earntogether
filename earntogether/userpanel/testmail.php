<?php 

$repli="http://www.autotradecrypto.club/".$username;
				$strSubject = "Auto Trade Crypto Withdrawal Confirmation";
				// $from = 'info@autotradecrypto.club';
				$from = 'kamlesh@maxtratechnologies.net';
	     		$email='vikaschoudharymaxtra@gmail.com';
		    	$headeruser="Mime-Version: 1.0\r\n";
$headeruser.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headeruser1="Mime-Version: 1.0\r\n";
$headeruser1.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headeruser1.= "From:Auto Trade Crypto <$from>" . "\r\n";


$msg = '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Withdrawal Confirmation</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px; font-family: Open Sans, Tahoma, Times, serif; background: rgb(77, 158, 185) none repeat scroll 0% 0%; width: 100%; float: left;">
    <div class="container" style="width:590px; margin:auto;margin-top:50px;margin-bottom:50px;">
        <div class="container1" style="background: #fff;width: 100%;float: left;margin-bottom:50px;">
            <div class="cont" style="width: 490px;float: left;text-align: center;margin: 25px 0px 0px 43px;">
                <img src="http://www.autotradecrypto.club/images/logo.png" style="margin:0 0 20px 0;width:300px;  "><br/><br/>
                <div class="header" style="font-weight: 600;color: rgb(255, 255, 255);font-size: 30px;
line-height: 30px;padding: 18px 0px 12px;background-color: rgb(255, 114, 67); font-family: Arial, cursive;">
                   Withdrawal Confirmation
                </div>
                <div class="pay-head" style="font-family: Lato;font-weight: 400;color: rgb(72, 72, 72);font-size: 25px;line-height: 35px; margin-top: 13px;">
                    Hello abc you have requested for 10 withdraw amount. kindly confirm your request is genuine.
                </div>
                <div class="border" style="width: 500px;text-align: left;height: 1px;background-color: #000;float: left;">
                </div>
                <div class="txt" style="font-family: Lato,Arial;font-weight: 400;font-size: 15px;line-height: 23px;
color: rgb(38, 38, 38);width: 100%;margin-top: 24px;">
                    <p style="margin: 0px !important;">This mail is for withdrawal confirmation. Kindly click on link below and confirm your request.</p>
                </div>
                <div class="amount" style="color: rgb(72, 72, 72);line-height: 35px;font-family: Lato;">
                 
                    <a href="withdrawalconfirm.php?id=8&user=123456" style="line-height: 35px;font-family: Lato;" class="btn btn-danger">Cliick here for Confirmation</a>
                  </div>
                
                <div class="line" style="height: 1px;background: rgb(218, 218, 218) none repeat scroll 0% 0%;margin-top: 20px;">
                </div>
                <p style="font-family: Lato, Arial; font-weight: 400; font-size: 15px; line-height: 24px; color: #0c0b0c; -webkit-font-smoothing: antialiased; margin: 26px 0px 0px !important;">
                  Copyrights 2017 Auto Trade Crypto. All Rights Reserved. </p>
                
            </div>
        </div>
    </div>
    </div><br/><br/>
</body>

</html>';

	mail ( $email, $strSubject, $msg, $headeruser1 );
    echo $email.$strSubject.$msg.$headeruser1;
    ?>