<?php
include("header.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
{
$userids=$_REQUEST['id'];
$stre="select * from user_registration where user_id='$userids' || username='$userids'";
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
            
            <?php $count112=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid'"));?>
            <p class="lead">You have <span class="label label-warning"><?php echo $count112;?></span> downline members</p>
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
                        <li><a href="#">Team</a></li>
              <li class="active">Members</li>
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid white-bg">

          <div class="row">

<?php 
if(isset($_GET['id']))
{
  $userid=$_GET['id'];
}
else
{
  $userid=$userid;
}

$fz=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$userid' or username='$userid'"));
$userid=$fz['user_id'];

?>      
            
          
            
            
        <div class="col-md-12">
		
			
              
              <div class="table-responsive">
			  
				
				
				
				<div class="col-md-3">
				
					<form name="tree" method="get" action="binary-tree.php">
	<input type="text" name="id" style="width:150px;" value="" paceholder="Enter Userid">&nbsp;&nbsp;&nbsp;&nbsp;
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
if($nums==0)
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
    <?php if($fz['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($fz['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($fz['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?>


                            <br />
  <?php echo $userid;?><br/><?php echo $fz['username'];?><br/><?php echo $fz['first_name'];?> <br/> <?php echo date('d-m-Y',strtotime($fz['registration_date']));?>

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

                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='$userid' and leg='right'")); echo $regf1; ?></td>
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
                    <a  <?php if($userid !='' && $user1['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user1['user_id'];?>" <?php } ?> class="tooltip1"> <?php if($user1['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user1['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user1['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><br /><?php if($user1['user_id']!='') { ?>
                                  <?=$user1['user_id']?><br/><?=$user1['username']?><br/><?=$user1['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user1['registration_date']));?>

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
                                      <td align="left">User 1 Status:</td>
                                      <td align="left"><?php if($user1['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>

                                     <tr>
                                      <td align="left">Total Users:  </td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user1['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user1['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>
                                   





                                  </table>
                                  </div></span><?php } ?>
                      </a>
                      
                      
                      <ul>
                      
                        <li>
                          <a  <?php if($info1 !='' && $user2['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user2['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user2['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user2['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user2['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><br /><?php if($user2['user_id']!='') { ?>
                                        <?=$user2['user_id']?><br/><?=$user2['username']?> <br/><?=$user2['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user2['registration_date']));?>

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
                                      <td align="left">User 2 Status:</td>
                                      <td align="left"><?php if($user2['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

<tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user2['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user2['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>
                                   

                                 

                                  </table>
                                </div></span><?php } ?>
                            </a>
                            
                            
                            <ul>
                            
                              <li>
                           <a <?php if($info2 !='' && $user3['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user3['user_id']?>" <?php } ?> class="tooltip1">   <?php if($user3['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon" /><?php }else if($user3['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user3['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?><?php if($user3['user_id']!='') { ?>
                               <br/>  <?=$user3['user_id']?><br/><?=$user3['username']?><br/><?=$user3['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user3['registration_date']));?>

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
                                      <td align="left">User 3 Status:</td>
                                      <td align="left"><?php if($user3['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

<tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user3['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user3['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>
                                   


                                   

                                  </table>
                                </div></span><?php } ?>
                                  </a>
                                  
                                </li>
                                
                                
                                <li>
                                  <a <?php if($info2 !='' && $user4['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user4['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user4['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user4['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user4['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png"  class="iicon"/><?php }else if($user4['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png"  class="iicon"/><?php }else if($user4['user_rank_name']=="Director"){?><img src="images/director.png"  class="iicon"/><?php }  else if($user4['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif"  class="iicon"/><br/><?php } ?><?php if($user4['user_id']!='') { ?>
                                    <br/><?=$user4['user_id']?><br/><?=$user4['username']?><br/><?=$user4['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user4['registration_date']));?>

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
                                      <td align="left">User 4 Status:</td>
                                      <td align="left"><?php if($user4['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                   

  <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user4['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user4['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>

                                    


                                     


                                  </table>
                                </div></span><?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                </ul>

                            
                          </li>
                          
                          
                          <li>
                           <a <?php if($info1 !='' && $user5['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user5['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user5['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user5['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user5['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><?php if($user5['user_id']!='') { ?>
                               <br/><?=$user5['user_id']?><br/><?=$user5['username']?><br/><?=$user5['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user5['registration_date']));?>

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
                                      <td align="left">User 5 Status:</td>
                                      <td align="left"><?php if($user5['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

 <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user5['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user5['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>
                                   


                                   


                                  </table>
                                </div></span><?php } ?>
                              </a>
                              
                              
                              <ul>
                              
                                <li>
                                  <a <?php if($info5 !='' && $user6['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user6['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user6['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user6['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user6['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user6['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user6['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user6['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><?php if($user6['user_id']!='') { ?>
                                    <br/><?=$user6['user_id']?><br/><?=$user6['username']?><br/><?=$user6['first_name']?> <br/> <?php echo date('d-m-Y',strtotime($user6['registration_date']));?>

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
                                      <td align="left">User 6 Status:</td>
                                      <td align="left"><?php if($user6['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

                                   <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user6['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user6['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>



                                    

                                  </table>
                                </div></span><?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                  
                                  <li>
                                     <a <?php if($info5 !='' && $user7['user_id']==''){ ?> href="#"  target="_blank" <?php } else { ?> href="binary-tree.php?id=<?=$user7['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user7['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user7['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png"  class="iicon"/><?php }else if($user7['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user7['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user7['user_rank_name']=="Director"){?><img src="images/director.png"  class="iicon"/><?php }  else if($user7['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else {?><img src="images/empty.gif" class="iicon"/><br/><?php } ?> <?php if($user7['user_id']!='') { ?>
                                    <br/><?=$user7['user_id']?><br/><?=$user7['username']?><br/><?=$user7['first_name']?> <br/> <?php echo date('d-m-Y',strtotime($user7['registration_date']));?>

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
                                      <td align="left">User 7 Status:</td>
                                      <td align="left"><?php if($user7['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     

   <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user7['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user7['user_id']."' and leg='right'")); echo $regf1; ?></td>
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
                    <a <?php if($userid !='' && $user8['user_id']==''){ ?> href="#"  <?php } else { ?>  href="binary-tree.php?id=<?=$user8['user_id']?>" <?php } ?> class="tooltip1">   <?php if($user8['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user8['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user8['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?> <?php if($user8['user_id']!='') { ?>
                                    <br/><?=$user8['user_id']?><br/><?=$user8['username']?><br/><?=$user8['first_name']?> <br/> <?php echo date('d-m-Y',strtotime($user8['registration_date']));;?>

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
                                      <td align="left">User 8 Status:</td>
                                      <td align="left"><?php if($user8['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     

   <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user8['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user8['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>


                                 


                                  

                                  </table>
                                </div></span> <?php } ?>
                        </a>
                        
                                          
                      
                      <ul>
                      
                        <li>
                          <a <?php if($info8 !='' && $user9['user_id']==''){ ?> href="#"  <?php } else { ?> href="binary-tree.php?id=<?=$user9['user_id']?>" <?php } ?> class="tooltip1"> <?php if($user9['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user9['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon"/><?php }else if($user9['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon"/><?php }else if($user9['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon"/><?php }else if($user9['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon"/><?php }  else if($user9['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon"/><?php }  else{?><img src="images/empty.gif" class="iicon"/><br/><?php } ?><?php if($user9['user_id']!='') { ?>
                                    <br/><?=$user9['user_id']?><br/><?=$user9['username']?><br/><?=$user9['first_name']?>   <br/> <?php echo date('d-m-Y',strtotime($user9['registration_date']));?>

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
                                      <td align="left">User 9 Status:</td>
                                      <td align="left"><?php if($user9['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user9['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user9['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>


                                




                                    
                                  </table>
                                </div></span> <?php  } ?>
                            </a>
                            
                            
                            <ul>
                            
                              <li>
                               <a <?php if($info9 !='' && $user10['user_id']==''){ ?> href="#" <?php } else { ?>  href="binary-tree.php?id=<?=$user10['user_id']?>" <?php } ?> class="tooltip1"><?php if($user10['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user10['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png"  class="iicon" /><?php }else if($user10['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user10['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon" /><?php }else if($user10['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user10['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?><?php if($user10['user_id']!='') { ?>
  <br/><?=$user10['user_id']?><br/><?=$user10['username']?><br/><?=$user10['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user10['registration_date']));?>

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
                                      <td align="left">User 10 Status:</td>
                                      <td align="left"><?php if($user10['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    


                                       <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user10['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user10['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>


                                   <tr>
                                      <td align="left">Total BV</td>
                                      <td align="left">L: <?php $regfs1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total1 from manage_bv_history where income_id='".$user10['user_id']."' and position='left' and description!='Carry Forward BV'")); if($regfs1['total1']!='' || $regfs1['total1']!=0) { echo $regfs1['total1']; } else { echo "0"; } ?> |  R: <?php $regfs2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$user10['user_id']."' and position='right' and description!='Carry Forward BV'")); if($regfs2['total2']!='' || $regfs2['total2']!=0) { echo $regfs2['total2']; } else { echo "0"; }  ?></td>
                                    </tr>

                                     <tr>
                                      <td align="left">Current BV:</td>
                                      <td align="left">L: <?php $regfsd1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$user10['user_id']."' and position='left' and status=0 and description!='Carry Forward BV'"));  if($regfsd1['total2']!='' || $regfsd1['total2']!=0) { echo $regfsd1['total2']; } else { echo "0"; } ?> | R: <?php $regfsd2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(bv) as total2 from manage_bv_history where income_id='".$user10['user_id']."' and position='right' and status=0 and description!='Carry Forward BV'")); if($regfsd2['total2']!='' || $regfsd2['total2']!=0) { echo $regfsd2['total2']; } else { echo "0"; } ?></td>
                                    </tr>


                                     <?php 

                                    /*Left code start here */

                                    $regfse1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select bv as total2 from manage_bv_history where income_id='".$user10['user_id']."' and position='left' and description='Carry Forward BV' order by id desc limit 1")); 
                                    if($regfse1['total2']!='' || $regfse1['total2']!=0) { $leftx=$regfse1['total2']; } else { $leftx=0; }  

                                       /*Left code end here */


                                       /*Right code start here */


                                     $regfse2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select bv as total2 from manage_bv_history where income_id='".$user10['user_id']."' and position='right' and description='Carry Forward BV' order by id desc limit 1"));
                                     if($regfse2['total2']!='' || $regfse2['total2']!=0) { $lefty=$regfse2['total2']; } else { $lefty=0; }

                                        /*Right code end here */


                                    if($leftx>0)
                                    {
                                      $leftx=$leftx;
                                      $lefty=0;
                                    }
                                    else
                                    {
                                      $lefty=$lefty;
                                      $leftx=0;
                                    }


                                    ?>



                                    <tr>
                                      <td align="left">Carry Forward BV:</td>
                                      <td align="left">L: <?php echo $leftx;?> | R: <?php echo $lefty;?>  </td>
                                    </tr>



                                    


                                    
                                  </table>
                                </div></span> <?php } ?>
                                  </a>
                                  
                                </li>
                                
                                
                                <li>
                                  <a <?php if($info9 !='' && $user11['user_id']==''){ ?> href="#"  <?php } else { ?>  href="binary-tree.php?id=<?=$user11['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user11['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user11['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user11['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user11['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" height="45" class="iicon" /><?php }else if($user11['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user11['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?> <?php if($user11['user_id']!='') { ?>
  <br/><?=$user11['user_id']?><br/><?=$user11['username']?><br/><?=$user11['first_name']?>   <br/> <?php echo date('d-m-Y',strtotime($user11['registration_date']));?>

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
                                      <td align="left">User 11 Status:</td>
                                      <td align="left"><?php if($user11['user_status']==0 && $user11['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                   
                                    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user11['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user11['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>


                                  


                              

                                    
                                  </table>
                                </div></span> <?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                </ul>
                            
                            
                          </li>
                          
                          
                          <li>
                            <a <?php if($info8 !='' && $user12['user_id']==''){ ?> href="#" <?php } else { ?>  href="binary-tree.php?id=<?=$user12['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user12['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon" /><?php }else if($user12['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user12['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif"  class="iicon" /><br/><?php } ?><?php if($user12['user_id']!='') { ?>
  <br/><?=$user12['user_id']?><br/><?=$user12['username']?><br/><?=$user12['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user12['registration_date']));?>

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
                                      <td align="left">User 12 Status:</td>
                                      <td align="left"><?php if($user12['user_status']==0 && ['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                     

                                   
 				    <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user12['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user12['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>

                                   



                                 

                                    
                                  </table>
                                </div></span> <?php } ?>
                              </a>
                              
                              
                              <ul>
                              
                                <li>
                                 <a <?php if($info12 !='' && $user13['user_id']==''){ ?> href="#" <?php } else { ?> href="binary-tree.php?id=<?=$user13['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user13['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user13['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php }else if($user13['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon" /><?php }else if($user13['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png"  class="iicon" /><?php }else if($user13['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php }  else if($user13['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?><?php if($user13['user_id']!='') { ?>

  <br/><?=$user13['user_id']?><br/><?=$user13['username']?> <br/><?=$user13['first_name']?>  <br/> <?php echo date('d-m-Y',strtotime($user13['registration_date']));?>

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
                                      <td align="left">User 13 Status:</td>
                                      <td align="left"><?php if($user13['user_status']==0 && $user13['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
                                    

                                   
                                     <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user13['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user13['user_id']."' and leg='right'")); echo $regf1; ?></td>
                                    </tr>


                                   


                                  

                                    
                                  </table>
                                </div></span> <?php } ?>
                                    </a>
                                    
                                  </li>
                                  
                                  
                                  <li>
                                   <a <?php if($info12 !='' && $user14['user_id']==''){ ?> href="#"  <?php } else { ?>  href="binary-tree.php?id=<?=$user14['user_id']?>" <?php } ?> class="tooltip1">  <?php if($user14['user_rank_name']=="Free Member"){?><img src="images/RUBY.png" class="iicon" /><?php }else if($user14['user_rank_name']=="Paid Member"){?><img src="images/EMERALD.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Senior Manager"){?><img src="images/sm2.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Group Manager"){?><img src="images/group-manager.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Director"){?><img src="images/director.png" class="iicon" /><?php } else if($user14['user_rank_name']=="Normal User"){?><img src="images/member.gif" class="iicon" /><?php }  else{?><img src="images/empty.gif" class="iicon" /><br/><?php } ?>   <?php if($user14['user_id']!='') { ?>

  <br/><?=$user14['user_id']?><br/><?=$user14['username']?><br/><?=$user14['first_name']?>   <br/> <?php echo date('d-m-Y',strtotime($user14['registration_date']));?>

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
                                      <td align="left">User 14 Status:</td>
                                      <td align="left"><?php if($user14['user_status']==0 && $user14['user_status']!='') { echo "Active"; } else { echo "Deactivate"; } ?></td>
                                    </tr>
 <tr>
                                      <td align="left">Total Users:</td>
                                      <td align="left">L: <?php $regf=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user14['user_id']."' and leg='left'")); echo $regf; ?> | R: <?php $regf1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where income_id='".$user14['user_id']."' and leg='right'")); echo $regf1; ?></td>
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