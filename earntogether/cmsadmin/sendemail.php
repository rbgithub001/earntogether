<?php 
include("../lib/config.php");

$user_id=$_GET['pid'];


  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$user_id'");
   $yes=mysqli_num_rows($data);
   if($yes>0)
   {

     $no=mysqli_fetch_array($data);
     $username=$no['username'];
     $first_name=$no['first_name'];
     $last_name=$no['last_name'];
     $email=$no['email'];
      $password=$no['password'];
      $t_code=$no['t_code'];

  

   
               
        $strSubject = "V6asia Password Reminder";
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

            $msg = '<html>

        <body>
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
  <tbody>
    <tr>
      <td>
      <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #e1e1e1; border-right:1px solid #e1e1e1; border-top:1px solid #e1e1e1; margin-top:50px; width:560px;margin:20px;">
        <tbody>
          <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center; vertical-align:top"><img class="CToWUd" src="http://198.154.241.136/~kamlesh/b6asianetwork/images/logo.png" style="margin:0 0 20px 0; width:180px" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center; vertical-align:top"><strong>Welecome '.$username.'</strong></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center; vertical-align:top">
                  <p style="text-align:center">Thanks for Joining V6asia</p>
                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>

      <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #e1e1e1; border-right:1px solid #e1e1e1; width:560px;margin:20px;">
        <tbody>
          <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:209px">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </td>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:42px">
              <tbody>
                <tr>
                  <td style="text-align:center"><img alt="" class="CToWUd" src="https://ci5.googleusercontent.com/proxy/KveaD9HdYnB8s3-Zc6C809y_abyUkEw-32xLF1nlhYyRGb1NPYZZqpFAxjIo-ZmMIZKHkmySA1YaOAQxqkefobd2oPnN4M_-HC-mAvCOO2GRBed-FXB5MaqwWTyKl6sLOREe=s0-d-e1-ft#https://wave-vero-assets.s3.amazonaws.com/images/checkmark-reminder-email.jpg" /></td>
                </tr>
              </tbody>
            </table>
            </td>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:209px">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>

      <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #e1e1e1; border-right:1px solid #e1e1e1; width:560px;margin:20px;">
        <tbody>
          <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:left; vertical-align:top">Dear '.$username.'<br />
                  <br />
                  V6asia about us content goes here.<br />
                  <br />
                  Thank You.</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>

      <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #e1e1e1; border-right:1px solid #e1e1e1; width:560px;margin:20px;">
        <tbody>
          <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
          <td>Your Login and Transaction Credentials</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Your  User ID : '.$user_id.' </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Username  : '.$username.'</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Password  : '.$password.' </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Transaction Password : '.$t_code.' </td>
          <td>&nbsp;</td>
        </tr>
        
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>

      <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #e1e1e1; border-right:1px solid #e1e1e1; border-top:1px solid #e1e1e1; width:560px;margin:20px;">
        <tbody>
          <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center; vertical-align:top">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center">
                  <p>Thanks for your business. for more detail visit us at <a href="http://198.154.241.136/~kamlesh/b6asianetwork/" style="text-decoration:none;color:#008f9b;font-weight:bold" target="_blank">www.V6asia.com</a></p>
                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>

      <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
        <tbody>
          <tr>
            <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:20px;">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>


        </body>

        </html>';
                
                // Attachment s
                mail ( $email, $strSubject, $msg, $strHeader ); // @ = No Show Error //
  

    // header("location:../index.php?msg=Email Sent  Successfully !");
   
echo "<html><script>alert('This  password will be sent at Email Address that member had put at the time of registration, Thanks..');</script></html>";          
print"<script language='javascript'>document.location='password-tracker.php'</script>";
}
else 
{
  echo "<html><script>alert('User not available');</script></html>";
print"<script language='javascript'>document.location='password-tracker.php'</script>";   
}

    
/*outsiders contact form Code Ends here */

?>