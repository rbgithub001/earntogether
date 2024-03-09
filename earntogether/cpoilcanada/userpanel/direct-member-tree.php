<?php
include("header.php");
$countsd=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'"));
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
$userids=$_REQUEST['id'];
$stre="select * from user_registration where user_id='$userids' || username='$userids' ";
$rese=mysqli_query($GLOBALS["___mysqli_ston"], $stre);
$xe=mysqli_fetch_array($rese);
$userid=$xe['user_id'];
 $id=$idd;
}
else
{
  $userid=$userid;
  $id=$idd;
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

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Style CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style type="text/css">
	.tree{
		min-height:auto;
	}
	.animsition{
	    min-height:825px !important;
	}
	</style>
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
        <section id="page-title" class="row" style="padding:5px 12px !important;">

          <div class="col-md-8">
           <h1>Referral Tree</h1>
            <p class="lead">You have <span class="label label-warning"><?php echo $countsd;?></span> referral members.</p>
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
                        <!--<li><a href="#">Genealogy</a></li>
              <li class="active">Direct Sponsors</li>-->
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">

          <div class="row">

			<div class="col-md-12">
			
				<div class="panel panel-primary">

      <?php 
if(isset($_POST['submit']))
{


  $userid=$_POST['id'];
}
else
{
  $userid=$userid;
}

if(isset($_GET['submit']))
{


  $userid=$_GET['id'];
}
else
{
  $userid=$userid;
}

$fz=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' or username='$userid' "));
$userid=$fz['user_id'];

$selfincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='$userid'"));
$selfbusiness = $selfincomes['total'];
$powerlegearning=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select power_leg_business from user_registration where user_id='$userid'"));                        
$powerlegbusiness = $powerlegearning['power_leg_business'];
$selfbus = $selfbusiness+$powerlegbusiness;

$mydownlineincomes = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='$userid' "));
$downbusiness = $mydownlineincomes['total'];
$tpv = $selfbus+$downbusiness;

$before_activationbusiness = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(bv) as total from manage_bv_history where income_id='$userid' "));
$before_activation = $before_activationbusiness['total'];


?>      
            				<div style="padding:20px;">
				<form class="tree_member_form" name="tree" method="get" action="direct-member-tree.php">
                    <input type="text" name="id" class="search_bar" value="" placeholder="Enter Userid">
                    <input type="submit" name="submit" value="Search" class="search_btn">
                    <input type="button" value="Back" name="backs" class="back_btn"> </a> 
                </form>
                <br />

				<div class="tree_view_member">
				
                    
                        <div class="table-responsive">
                        
                        	<div class="content" style="width: 980px; overflow-x: scroll;">


                          <?php
if($userid!=$idd)
{
$nums=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid' and income_id='".$idd."'"));
}
else
{
  $nums=1;
}
$nums=1;
if($nums==0){
  echo "<h3>"."Sorry this user not come under your downline"."</h3>";
}
else
{
?>    
					<div class="tree" style="height:500px;padding-left:35px;">
					    <ul>
					        <li>
					            <a href="direct-member-tree.php?id=<?php echo $userid?>" class="tooltip1">
					                <!--src="images/green-toro.png" -->
					                <img <?php if($f['user_rank_name']=="Silver consultant") { ?> src="images/male.jpg" 
                                    <?php } else if($fz['user_rank_name']=="Golden consultant") { ?>
                                     src="images/male.jpg"
                                      <?php } else if($fz['user_rank_name']=="Diamond consultant") { ?>
                                     src="images/male.jpg"
                                      <?php } else if($fz['user_rank_name']=="Silver Manager") { ?>
                                    src="images/male.jpg"
                                      <?php } else if($fz['user_rank_name']=="Golden Manager") { ?>
                                     src="images/male.jpg"
                                     <?php } else if($fz['user_rank_name']=="Golden Manager") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Golden Manager") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Diamond Manager") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Silver Partner") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Golden Partner") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Diamond Partner") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Country Representative") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     
                                     else if($fz['user_rank_name']=="Continent Representative") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($fz['user_rank_name']=="Global Representative") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else { ?>
                                      src="images/male.jpg"

                                     <?php } ?> class="iicon"/>
                                     <br /><?=$userid?><br/><?php echo $fz['first_name'];?> <?php echo $fz['last_name'];?><br />
                                    <span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
                                    </tr>
                                      <tr>
                                      <td align="left">Username:</td>
                                      <td align="left"><?php echo $fz['username'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?php echo $fz['first_name'];?> <?php echo $fz['last_name'];?></td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left"><?php echo $fz['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $fz['ref_id'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Self Business:</td>
                                      <td align="left">$ <?php echo ($selfbus) ? $selfbus:'00';?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Team Business:</td>
                                      <td align="left">$ <?php echo $tpv ? $tpv : '00';?></td>
                                    </tr>
                                    <!--<tr>
                                        <td align="left">Business Before Activation</td>
                                        <td align="left">$ <?php // echo $before_activation ? $before_activation : '00';?></td>
                                    </tr>-->
                                    
                                  </table>
                                </div>
                                </span>
								</a>
						<ul>
                       <?php 
$que=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'");
while($datas1=mysqli_fetch_array($que)) { 
    $selfincomes1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from lifejacket_subscription where user_id='".$datas1['user_id']."'"));
    $selfbusiness1 = $selfincomes1['total'];
    $powerlegearning1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select power_leg_business from user_registration where user_id='".$datas1['user_id']."''"));                        
    $powerlegbusiness1 = $powerlegearning1['power_leg_business'];
    $sbus = $selfbusiness1+$powerlegbusiness1;
    
    $mydownlineincomes1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(after_active) as total from manage_bv_history where income_id='".$datas1['user_id']."' "));
    $downbusiness1 = $mydownlineincomes1['total'];
    $tpv1 = $sbus+$downbusiness1;
    
    $before_activationbusiness1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(bv) as total from manage_bv_history where income_id='".$datas1['user_id']."' "));
$before_activation1 = $before_activationbusiness1['total'];

?>


								<li><a href="direct-member-tree.php?id=<?=$datas1['user_id'];?>" class="tooltip1">

                        <img     <?php if($datas1['user_rank_name']=="Silver consultant") { ?>

                                    src="images/male.jpg"
                                    <?php } else if($datas1['user_rank_name']=="Golden consultant") { ?>
                                     src="images/male.jpg"
                                      <?php } else if($datas1['user_rank_name']=="Diamond consultant") { ?>
                                     src="images/male.jpg"

                                      <?php } else if($datas1['user_rank_name']=="Silver Manager") { ?>
                                    src="images/male.jpg"
                                      <?php } else if($datas1['user_rank_name']=="Golden Manager") { ?>
                                     src="images/male.jpg"
                                     <?php } else if($datas1['user_rank_name']=="Golden Manager") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Golden Manager") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Diamond Manager") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Silver Partner") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Golden Partner") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Diamond Partner") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Country Representative") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     
                                     else if($datas1['user_rank_name']=="Continent Representative") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else if($datas1['user_rank_name']=="Global Representative") { ?>
                                     src="images/male.jpg"
                                     <?php }
                                     else { ?>
                                      src="images/male.jpg"

                                     <?php } ?> class="iicon"/>

                        <br /><?php echo $datas1['user_id'];?><br/><?php echo $datas1['first_name'];?> <?php echo $datas1['last_name'];?><br />
											
											<span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $datas1['user_id'];?></td>
                                    </tr>
                                     <tr>
                                      <td align="left">Username:</td>
                                      <td align="left"><?php echo $datas1['username'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?php echo $datas1['first_name'];?> <?php echo $datas1['last_name'];?></td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Country:</td>
                                      <td align="left"><?php echo $datas1['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $datas1['ref_id'];?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Self Business:</td>
                                      <td align="left">$ <?php echo $sbus ? $sbus : '00';?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Team Business:</td>
                                      <td align="left">$ <?php echo $tpv1 ? $tpv1:'00';?></td>
                                    </tr>
                                    <!--<tr>
                                      <td align="left">Business Before Activation:</td>
                                      <td align="left">$ <?php // echo $before_activation1 ? $before_activation1:'00';?></td>
                                    </tr>-->
                                  </table>
                                </div>
                                </span>
								</a></li>
								<?php } ?>	
											</ul>
											
										</li>
									</ul>
								</div>
							 <?php } ?>
							</div>
                        </div>
                    </div>
				</div>
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

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.inbox.js"></script>
  </body>
</html>