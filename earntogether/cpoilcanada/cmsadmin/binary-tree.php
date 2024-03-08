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

if(isset($_GET['id'])){
	$userID = $_GET['id'];
	$action = 'UpdateProduct';
	// get product detail 
	$sqlQury=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userID."' or username='".$userID."'");
	$f=mysqli_fetch_assoc($sqlQury);
	
	$userid=$f['user_id'];


$fz=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userID' or username='$userID'"));
	
}else{
    $userID = 123456;
  $action = 'UpdateProduct';
  // get product detail 
  $sqlQury=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$userID."' or username='".$userID."'");
  $f=mysqli_fetch_assoc($sqlQury);
  
  $userid=$f['user_id'];


$fz=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userID' or username='$userID'"));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("header.php");?>

<script type="text/javascript" src="<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckeditor.js"></script>
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
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
     <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" style="min-height: 1000px;">

            <!-- header section start-->
    <?php include("top-menu.php");?>

            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                   Dashboard
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                 <?php include("top-menu1.php");?>
           
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper" style="background:#fff;">

            <div class="row">

             
			
			
			
			
			
			
			
				<div class="col-md-12">
		
			
              
              <div class="table-responsive">
			  
				
				<div class="col-md-3">
				
					<form name="tree" method="get" action="binary-tree.php">
	<input type="text" name="id" style="width:150px;" value="" placeholder="Enter Userid">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="Search">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_GET['id']!='') { ?> <a href="#" onclick="window.history.go(-1); return false;"> <input type="button" value="Back" name="backs"> </a> <?php } ?>
</form><br />


				</div>
			  
			  
			    
			  
			  
			  
                 <?php
if($userid!=$idd)
{
$nums=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$userid' and income_id='".$idd."'"));
}
else
{
	$nums=1;
}
if(1==0)
{
	echo "<h3>"."Sorry this user not come under your downline"."</h3>";
}
else
{
?>    
                  <div class="tree">
                 


                    <ul>
                        <li>
                           <?php if($fz['user_id']!=''){?><a href="binary-tree.php?id=<?=$userid?>" class="tooltip1"><?php } ?> 
    <?php if($fz['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($fz['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?>


                            <br />  <?php echo $userid;?><br/><?php echo $fz['first_name'];?> <br/> <?php echo $fz['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$fz['user_id']."' order by id desc limit 1"));

                                      $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?>
                                   <?php if($fz['user_id']!=''){?>
                                                               <span><img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?php echo $userid;?></td>
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

                                  


                                    
                                  </table>
                                </div>
                                </span> <?php } ?>
                                </a>
  
<?php
$table='user_registration';
/*first level two user start here */
$fetch1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$userid' and binary_pos='left' limit 1"));
$info1=$fetch1['user_id'];
$user1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info1'"));
$fetch8=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$userid' and binary_pos='right' limit 1"));
$info8=$fetch8['user_id'];
$user8=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info8'"));
/*first level two user end here */
  
/*second level four user start here */
$fetch2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info1' and binary_pos='left' limit 1"));
$info2=$fetch2['user_id'];
$user2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info2'"));

$fetch5=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info1' and binary_pos='right' limit 1"));
$info5=$fetch5['user_id'];
$user5=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info5'"));

$fetch9=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info8' and binary_pos='left' limit 1"));
$info9=$fetch9['user_id'];
$user9=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info9'"));
  
$fetch12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info8' and binary_pos='right' limit 1"));
$info12=$fetch12['user_id'];
$user12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info12'"));
  
/*second level four user ends here */
  
/*third level eight user starts here */
  
$fetch3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info2' and binary_pos='left' limit 1"));
$info3=$fetch3['user_id'];
$user3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info3'"));

$fetch4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info2' and binary_pos='right' limit 1"));
$info4=$fetch4['user_id'];
$user4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info4'"));
 
$fetch6=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info5' and binary_pos='left' limit 1"));
$info6=$fetch6['user_id'];
$user6=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info6'"));
  
$fetch7=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info5' and binary_pos='right' limit 1"));
$info7=$fetch7['user_id'];
$user7=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info7'"));

$fetch10=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info9' and binary_pos='left' limit 1"));
$info10=$fetch10['user_id'];
$user10=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info10'"));
  
$fetch11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info9' and binary_pos='right' limit 1"));
$info11=$fetch11['user_id'];
$user11=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info11'"));
  
$fetch13=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info12' and binary_pos='left' limit 1"));
$info13=$fetch13['user_id'];
$user13=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info13'"));
  
$fetch14=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from $table where nom_id='$info12' and binary_pos='right' limit 1"));
$info14=$fetch14['user_id'];
$user14=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$info14'"));
  
/*third level eight user ends here */
?>
  



                
                <ul>
                
                  <li>
                    <a  <?php if($userid !='' && $user1['user_id']==''){ ?> href="../register.php?pl_id=<?=$userid;?>&sponsor_id=<?=$id;?>&binary_pos=left" target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user1['user_id'];?>" <?php } ?> class="tooltip1"> <?php if($user1['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user1['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><br /><?php if($user1['user_id']!='') { ?>
                                  <?=$user1['user_id']?><br/><?=$user1['first_name']?>  <br/> <?php echo $user1['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user1['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];




                                      ?> <?php } ?>
                     <?php if($user1['user_id']!=''){?>
                    <span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user1['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user1['first_name']." ".$user1['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user1['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user1['ref_id']; ?></td>
                                    </tr>
                                   
                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user1['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>

                                    



                                  </table>
                                  </div></span><?php } ?>
                      </a>
                      
                      
                      <ul>
                      
                        <li>
                          <a  <?php if($info1 !='' && $user2['user_id']==''){ ?> href="../register.php?pl_id=<?=$info1;?>&sponsor_id=<?=$id;?>&binary_pos=left"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user2['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user2['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user2['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><br /><?php if($user2['user_id']!='') { ?>
                                        <?=$user2['user_id']?><br/><?=$user2['first_name']?>  <br/> <?php echo $user2['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user2['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                          
                           <?php if($user2['user_id']!=''){?><span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                     <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user2['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user2['first_name']." ".$user2['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user2['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user2['ref_id']; ?></td>
                                    </tr>

                                  
                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user2['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    


                                  </table>
                                </div></span><?php } ?>
                            </a>
                            
                            
                            <ul>
                            
                              <li>
                           <a <?php if($info2 !='' && $user3['user_id']==''){ ?> href="../register.php?pl_id=<?=$info2;?>&sponsor_id=<?=$id;?>&binary_pos=left"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user3['user_id']?>" <?php } ?> class="tooltip1">   <?php if($user3['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user3['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?><?php if($user3['user_id']!='') { ?>
                               <br/>  <?=$user3['user_id']?><br/><?=$user3['first_name']?>  <br/> <?php echo $user3['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user3['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                                
                               <?php if($user3['user_id']!=''){?> <span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user3['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user3['first_name']." ".$user3['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user3['country'];?></td>
                                    </tr>
                                     <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user3['ref_id']; ?></td>
                                    </tr>

                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user3['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    


                                  </table>
                                </div></span><?php } ?>
                                  </a>
                                  
                                </li>
                                
                                
                                <li>
                                  <a <?php if($info2 !='' && $user4['user_id']==''){ ?> href="../register.php?pl_id=<?=$info2;?>&sponsor_id=<?=$id;?>&binary_pos=right"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user4['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user4['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user4['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user4['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png"  class="iicon"/><?php }else if($user4['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png"  class="iicon"/><?php }else if($user4['user_rank_name']=="Director"){?><img src="images/director.png"  class="iicon"/><?php }  else if($user4['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif"  class="iicon"/><br/><?php } ?><?php if($user4['user_id']!='') { ?>
                                    <br/><?=$user4['user_id']?><br/><?=$user4['first_name']?>  <br/> <?php echo $user4['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user4['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                                 <?php if($user4['user_id']!=''){?> 
                                  <span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user4['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user4['first_name']." ".$user4['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user4['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user4['ref_id']; ?></td>
                                    </tr>

                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user4['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                   



                                  </table>
                                </div></span><?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                </ul>

                            
                          </li>
                          
                          
                          <li>
                           <a <?php if($info1 !='' && $user5['user_id']==''){ ?> href="../register.php?pl_id=<?=$info1;?>&sponsor_id=<?=$id;?>&binary_pos=right"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user5['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user5['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user5['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><?php if($user5['user_id']!='') { ?>
                               <br/><?=$user5['user_id']?><br/><?=$user5['first_name']?>  <br/> <?php echo $user5['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user5['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?> 
                              <?php if($user5['user_id']!='') { ?>
                            <span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user5['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user5['first_name']." ".$user5['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user5['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user5['ref_id']; ?></td>
                                    </tr>


                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user5['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

                                  </table>
                                </div></span><?php } ?>
                              </a>
                              
                              
                              <ul>
                              
                                <li>
                                  <a <?php if($info5 !='' && $user6['user_id']==''){ ?> href="../register.php?pl_id=<?=$info5;?>&sponsor_id=<?=$id;?>&binary_pos=left"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user6['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user6['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user6['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user6['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user6['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user6['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user6['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><?php if($user6['user_id']!='') { ?>
                                    <br/><?=$user6['user_id']?><br/><?=$user6['first_name']?> <br/> <?php echo $user6['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user6['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php  } ?>
                                <?php if($user6['user_id']!=''){?>  
                                  <span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user6['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user6['first_name']." ".$user6['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>

                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user6['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user6['ref_id']; ?></td>
                                    </tr>

                                  
  <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user6['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

                                  </table>
                                </div></span><?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                  
                                  <li>
                                     <a <?php if($info5 !='' && $user7['user_id']==''){ ?> href="../register.php?pl_id=<?=$info5;?>&sponsor_id=<?=$id;?>&binary_pos=right"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user7['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user7['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user7['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png"  class="iicon"/><?php }else if($user7['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user7['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user7['user_rank_name']=="Director"){?><img src="images/director.png"  class="iicon"/><?php }  else if($user7['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else {?><img src="images/empty.gif" class="iicon"/><br/><?php } ?> <?php if($user7['user_id']!='') { ?>
                                    <br/><?=$user7['user_id']?><br/><?=$user7['first_name']?> <br/> <?php echo $user7['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user7['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                                    
                                      <?php if($user7['user_id']!=''){?><span>
                                  <img class="callout" src="images/callout.gif" />
                                  <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                     <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user7['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user7['first_name']." ".$user7['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user7['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user7['ref_id']; ?></td>
                                    </tr>

                                   

                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user7['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     


                                  </table>
                                </div></span> <?php } ?>
                                      </a>
                                      
                                    </li>
                                    
                                  </ul>
                              
                            </li>
                            
                          </ul>
                      
                    </li>
                    
                    
                    
                    
                    
                    
                    
                    <li>
                    <a <?php if($userid !='' && $user8['user_id']==''){ ?> href="../register.php?pl_id=<?=$userid;?>&sponsor_id=<?=$id;?>&binary_pos=right" target="_blank"  <?php } else { ?>  href="binary-tree.php?id=<?=$user8['user_id']?>" <?php } ?> class="tooltip1">   <?php if($user8['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user8['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?> <?php if($user8['user_id']!='') { ?>
                                    <br/><?=$user8['user_id']?><br/><?=$user8['first_name']?> <br/> <?php echo $user8['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user8['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                      <?php if($user8['user_id']!='') { ?>
                      <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user8['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user8['first_name']." ".$user8['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user8['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user8['ref_id']; ?></td>
                                    </tr>

                                   

                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user8['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     



                                  </table>
                                </div></span> <?php } ?>
                        </a>
                        
                                          
                      
                      <ul>
                      
                        <li>
                          <a <?php if($info8 !='' && $user9['user_id']==''){ ?> href="../register.php?pl_id=<?=$info8;?>&sponsor_id=<?=$id;?>&binary_pos=left" target="_blank"  <?php } else { ?> href="binary-tree.php?id=<?=$user9['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user9['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user9['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user9['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user9['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon"/><?php }else if($user9['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user9['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><?php if($user9['user_id']!='') { ?>
                                    <br/><?=$user9['user_id']?><br/><?=$user9['first_name']?>   <br/> <?php echo $user9['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user9['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?> <?php if($user9['user_id']!=''){?>
                          
                          <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user9['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user9['first_name']." ".$user9['last_name'] ?></td>
                                    </tr>

                                    <tr>

                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user9['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user9['ref_id']; ?></td>
                                    </tr>

                                  
                                  

  <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user9['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                  
                                    
                                  </table>
                                </div></span> <?php  } ?>
                            </a>
                            
                            
                            <ul>
                            
                              <li>
                               <a <?php if($info9 !='' && $user10['user_id']==''){ ?> href="../register.php?pl_id=<?=$info9;?>&sponsor_id=<?=$id;?>&binary_pos=left"  target="_blank" <?php } else { ?>  href="binary-tree.php?id=<?=$user10['user_id']?>" <?php } ?> class="tooltip1"><?php if($user10['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user10['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png"  class="iicon" /><?php }else if($user10['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user10['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon" /><?php }else if($user10['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user10['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?><?php if($user10['user_id']!='') { ?>
                                    <br/><?=$user10['user_id']?><br/><?=$user10['first_name']?>  <br/> <?php echo $user10['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user10['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                                 <?php if($user10['user_id']!=''){?>
                                <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user10['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user10['first_name']." ".$user10['last_name'] ?></td>
                                    </tr>

                                    <tr>

                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user10['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user10['ref_id']; ?></td>
                                    </tr>

                                 

                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user10['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    


                                    
                                  </table>
                                </div></span> <?php } ?>
                                  </a>
                                  
                                </li>
                                
                                
                                <li>
                                  <a <?php if($info9 !='' && $user11['user_id']==''){ ?> href="../register.php?pl_id=<?=$info9;?>&sponsor_id=<?=$id;?>&binary_pos=right" target="_blank"  <?php } else { ?>  href="binary-tree.php?id=<?=$user11['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user11['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user11['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user11['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user11['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" height="45" class="iicon" /><?php }else if($user11['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user11['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?> <?php if($user11['user_id']!='') { ?>
                                     <br/><?=$user11['user_id']?><br/><?=$user11['first_name']?>   <br/> <?php echo $user11['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user11['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                                   <?php if($user11['user_id']!=''){?>
                                  <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user11['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user11['first_name']." ".$user11['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user11['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user11['ref_id']; ?></td>
                                    </tr>

                                  
  <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user11['user_status']==0 && $user11['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                   
                                  
                                    
                                  </table>
                                </div></span> <?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                </ul>
                            
                            
                          </li>
                          
                          
                          <li>
                            <a <?php if($info8 !='' && $user12['user_id']==''){ ?> href="../register.php?pl_id=<?=$info8;?>&sponsor_id=<?=$id;?>&binary_pos=right"  target="_blank" <?php } else { ?>  href="binary-tree.php?id=<?=$user12['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user12['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user12['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif"  class="iicon" /><br/><?php } ?><?php if($user12['user_id']!='') { ?>
                                <br/><?=$user12['user_id']?><br/><?=$user12['first_name']?>  <br/> <?php echo $user12['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user12['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php } ?>
                              <?php if($user12['user_id']!=''){?>
                            <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user12['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user12['first_name']." ".$user12['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user12['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user12['ref_id']; ?></td>
                                    </tr>

  <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user12['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     

                                    
                                  </table>
                                </div></span> <?php } ?>
                              </a>
                              
                              
                              <ul>
                              
                                <li>
                                 <a <?php if($info12 !='' && $user13['user_id']==''){ ?> href="../register.php?pl_id=<?=$info12;?>&sponsor_id=<?=$id;?>&binary_pos=left"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user13['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user13['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user13['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user13['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user13['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png"  class="iicon" /><?php }else if($user13['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user13['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?><?php if($user13['user_id']!='') { ?>

                                 <br/><?=$user13['user_id']?><br/><?=$user13['first_name']?>  <br/> <?php echo $user13['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user13['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?> <?php  } ?>
                                      <?php if($user13['user_id']!=''){?>
                                  <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                   <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user13['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user13['first_name']." ".$user13['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user13['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user13['ref_id']; ?></td>
                                    </tr>

                                    
  <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user13['user_status']==0 && $user13['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

                                   
                                   

                                    
                                  </table>
                                </div></span> <?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                  
                                  <li>
                                   <a <?php if($info12 !='' && $user14['user_id']==''){ ?> href="../register.php?pl_id=<?=$info12;?>&sponsor_id=<?=$id;?>&binary_pos=right" target="_blank"  <?php } else { ?>  href="binary-tree.php?id=<?=$user14['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user14['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user14['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Senior Paid Member"){?><img src="images/sm2.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Group Paid Member"){?><img src="images/group-Paid Member.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?>   <?php if($user14['user_id']!='') { ?>

                                 <br/><?=$user14['user_id']?><br/><?=$user14['first_name']?>   <br/> <?php echo $user14['registration_date'];?>

                                      <br/><?php $pack=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$user14['user_id']."' order by id desc limit 1"));   $packing=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$pack['package']."'"));


                                       echo $packing['name'];?>  
                                   <?php } ?>
                             <?php if($user14['user_id']!=''){?>        
                                    <span>
                                 <img class="callout" src="images/callout.gif" />
                                 <div class="flyout">
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                  <tr>
                                      <td align="left">User ID:</td>
                                      <td align="left"><?=$user14['user_id'] ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Full Name:</td>
                                      <td align="left"><?=$user14['first_name']." ".$user14['last_name'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                   
                                      <td align="left">Country:</td>
                                      <td align="left"><?=$user14['country'];?></td>
                                    </tr>

                                    <tr>
                                      <td align="left">Sponsor ID:</td>
                                      <td align="left"><?php echo $user14['ref_id']; ?></td>
                                    </tr>

                                   
                                  

                                     <tr>
                                      <td align="left">User Status:</td>
                                      <td align="left"><?php if($user14['user_status']==0 && $user14['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     
                                    
                                  </table>
                                </div></span>
                              <?php } ?>        </a>
                                      
                                    </li>
                                    
                                  </ul>
                              
                            </li>
                            
                          </ul>
                      
                        </li>
                        
                      </li>
                
                
              </li>
                
          </ul>
        
          </div>
          
         
         <?php } ?>
       
       
          
        </div>
        
      </div>
			
			
			
			
			
			
			
			
			
			
			
			
           
            </div>
            
            

            </div>
            <!--body wrapper end-->
 <script type="text/javascript">
                         // Re the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.re( 'editor2',
                         {
                              filebrowserBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html',
                              filebrowserImageBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html?type=Images',
                              filebrowserFlashBrowseUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/ckfinder.html?type=Flash',
                              filebrowserUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                              filebrowserImageUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                              filebrowserFlashUploadUrl : '<?php echo SITE_URL; ?>cmsadmin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
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



<!-- d js at the end of the document so the pages load faster -->
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