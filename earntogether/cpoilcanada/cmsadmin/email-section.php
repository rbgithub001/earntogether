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



                
if(isset($_POST['Add']))
{
global $mxDb;

if($_POST['list']!='' && $_POST['description']!='')
{
$email=$_POST['list'];
$arr=implode(",",$email);
$des=$_POST['description'];
$text = $des ;
if(isset($args_page['post_content']))
{
$text = stripslashes($args_page['post_content']);
$text = str_replace('src="','src="../',$text);
}
         
        $strSubject = "Healthy Food Empire Newsletter";
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
                  <td style="text-align:center; vertical-align:top"><img class="CToWUd" src="http://198.154.241.136/~kamlesh/healthyfoodempire/images/logo.png" style="margin:0 0 20px 0; width:180px" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center; vertical-align:top"><strong>Welecome Member</strong></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center; vertical-align:top">
                  <p style="text-align:center">Thanks for Joining Healthy Food Empire</p>
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
                  <td style="text-align:left; vertical-align:top">Dear Member<br />
                  <br />
                  '.$text.'<br />
                  Thank You.</td>
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
                  <p>Thanks for your business. for more detail visit us at <a href="http://198.154.241.136/~kamlesh/healthyfoodempire/" style="text-decoration:none;color:#008f9b;font-weight:bold" target="_blank">http://198.154.241.136/~kamlesh/healthyfoodempire/</a></p>
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
mail ( $email, $strSubject, $msg, $strHeader );
header("Location:email-section.php?msg=Newsletter sent successfully!");
}
else
{
header("Location:email-section.php?msg=Some technical error!");
}
}
?>

<!DOCTYPE html>
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
function ValidateData(form)
{
 var chks = document.getElementsByName('list[]');
 var hasChecked = false;
 for (var i = 0; i < chks.length; i++)
 {
  if(chks[i].checked)
  {
   hasChecked = true;
   break;
  }
 }
 if (hasChecked == false)
 {
  alert("Please select at least one Request.");
  return false;
 }
} 
function Check(chk)
{
 var chk = document.getElementsByName('list[]');
 if(document.myform.Check_All.value=="Check All")
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = true ;
  document.myform.Check_All.value="UnCheck All";
 }
 else
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = false ;
  document.myform.Check_All.value="Check All";
 }
}
</script>
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
                                User Email Management
                                    <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="table-responsive">
                            <form name="myform" onSubmit="return ValidateData(this);" method="post" >

                     
                            <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    <input type="button" name="Check_All" value="Check All" onclick="Check(document.myform.check_list)" />
                                </th>
                                <th style="text-align:center;">
                                    Userid
                                </th>
                                 <th style="text-align:center;">
                                    Username
                                </th>
                                  <th style="text-align:center;">
                                    Full Name
                                </th>
                                
                                
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $i=1;
                                  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration");
                                  while($data1=mysqli_fetch_array($data))
                                    { ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                   <input type="checkbox" name="list[]" id="list[]" value="<?php echo $data1['email'] ?>">
                                </td>
                                <td>
                                    <?php echo $data1['user_id'];?>
                                </td>
                              
                                  <td>
                                    <?php echo $data1['username'];?>
                                </td>
                                  <td>
                                    <?php echo $data1['first_name']." ".$data1['last_name']; ?>
                                </td>
                               
                            </tr>
                            <?php $i++;} ?>
                            
                      
                            </tbody>
                            </table>
                             <div style="text-align:center;"><textarea id="editor1" name="description" required> </textarea></div><br/><br/>
                         <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="Add" value="Submit">
                                    </div>
                                </div></form>
                            </div>
                        </section>
                    </div>

                </div>

            </div>
            <!--body wrapper end-->

 <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1',
                                {
                                    filebrowserBrowseUrl : 'ckeditor/ckfinder/ckfinder.html',
                                    filebrowserImageBrowseUrl : 'ckeditor/ckfinder/ckfinder.html?type=Images',
                                    filebrowserFlashBrowseUrl : 'ckeditor/ckfinder/ckfinder.html?type=Flash',
                                    filebrowserUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                    filebrowserImageUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                    filebrowserFlashUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    filebrowserWindowWidth : '1000',
                                    filebrowserWindowHeight : '700'
                                });
                            </script>
            <!--footer section start-->
           <?php include("footer.php");?>
            <!--footer section end-->



        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->


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