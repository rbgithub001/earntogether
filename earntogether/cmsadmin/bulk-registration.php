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



/*Userid Generate Code Starts Here */
function userid()
{
$table_name='user_registration';
$encypt1=uniqid(rand(1000000000,9999999999), true);
$usid1=str_replace(".", "", $encypt1);
$pre_userid = substr($usid1, 0, 7);
$checkid=mysqli_query($GLOBALS["___mysqli_ston"], "select user_id from $table_name where user_id='$pre_userid'");
if(mysqli_num_rows($checkid)>0)
{
userid();
}
else
return $pre_userid;
}
/*Userid Generate Code Ends Here */

function level_countdd($crid,$tpid)
{
	global $a;
	$query1="select * from user_registration where user_id='$crid'";
	$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
	$row=mysqli_fetch_array($result1);
	$rclid1=$row['nom_id'];
	$a=1;
	if($rclid1!=$tpid)
	{
		level_countdd($rclid1,$tpid);
		$a++;
	}
	else
	{
		$a=1;
	}
	return $a;
}
/*function to show user on which level code ends here*/


/*Registration Spill Code Starts Here for finding the nomid */
function spill_id1s21($sponserid,$posi)
{
global $nom_id;
$query1="select * from user_registration where nom_id='$sponserid' and binary_pos='$posi'";
$result1=mysqli_query($GLOBALS["___mysqli_ston"], $query1);
$row=mysqli_fetch_array($result1);
$rclid1=$row['user_id'];
if($rclid1!=""){
spill_id1s21($rclid1,$posi);
} 
else
{
$nom_id=$sponserid;
}
return $nom_id;
}

function mem_pos($ref_id123){
$count_left_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='left'"));
$count_right_count=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from level_income_binary where income_id='$ref_id123' and leg='right'"));
// if both leg same 
if($count_left_count==$count_right_count)
{
$posi='left';
}
else
{
// find the weeker leg
$min=min($count_left_count,$count_right_count);
if($min==$count_left_count){
$posi='left';
}
if($min==$count_right_count){
$posi='right';
}
}
return $posi;
}
/*Registration Spill Code Ends Here for finding the nomid */

	
/* Sponsor Commission Code Starts Here*/
function commission_of_referal($ref,$useridss,$amount,$invoice_no,$packages)
{
	$date=date('Y-m-d');

	$comming=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$ref."' and status='Active' order by id desc limit 0,1"));

	if($comming['package']!='')
	{

	$comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$comming['package']."'"));
	$spc=$comm['sponsor_commission'];
	$pb=$amount;
	$withdrawal_commission=$spc*$pb/100;
	$rwallet=$withdrawal_commission;
	if($withdrawal_commission!='' && $withdrawal_commission!=0)
	{
		$vcount=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where user_id='$ref' and user_rank_name='Paid Member'"));
		if($vcount>0)
		{

	mysqli_query($GLOBALS["___mysqli_ston"], "update working_e_wallet set amount=(amount+$rwallet) where user_id='".$ref."'");
	$urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','0','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
    }
    else
    {
    //mysql_query("insert into credit_debit values(NULL,'$invoice_no','$ref','$rwallet','0','0','$ref','$useridss','$date','Referral Bonus','Earn Referral Bonus from $useridss for $packages Package','Commission of USD $rwallet For Package ".$_SESSION['platform']." ','Referral Bonus','$invoice_no','Referral Bonus','2','Working Wallet',CURRENT_TIMESTAMP,'$urls')");	
    }
	}
    }
}
/* Sponsor Commission Code Ends Here*/



if(isset($_POST['Add']))
{
   $nregister=$_POST['nregister'];
   $userid=$_POST['userid'];
  
  if($nregister!='' && $userid!='')
  {                     
    $resos=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where (user_id='$userid' || username='$userid')");
    $resos1=mysqli_num_rows($resos);
	    if($resos1>0)
	    {
	    	$resos12=mysqli_fetch_array($resos);
	        $sponsorid=$resos12['user_id'];
	        $urls="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];


	         $nus=1;
        while($nus<=$nregister)
        {

        $binary_pos=mem_pos($sponsorid);
        $nom_id123=spill_id1s21($sponsorid,$binary_pos);

        
        $user_id=userid();
        $randomname1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select name from randomname ORDER BY RAND() LIMIT 1"));
        $randomname=$randomname1['name'];
        $password=rand(100000,999999);
        global $mxDb;
        $date=date('Y-m-d');

        $newcounts=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from user_registration where username='$randomname'"));
        if($newcounts==0)
        {

        $insert_array = array('user_id'=>$user_id, 'first_name'=>$randomname, 'ref_id'=>$sponsorid,'username'=>$randomname,'password'=>$password,'admin_status'=>"0", 'email'=>"baba1008atm@gmail.com", 'telephone'=>"9876543210", 'user_status'=>"0",'registration_date'=>$date,'designation'=>"Free Member",'user_rank_name'=>'Free Member','t_code'=>$password);
		$mxDb->insert_record('user_registration', $insert_array);

        mysqli_query($GLOBALS["___mysqli_ston"], "insert into final_e_wallet values(NULL,'$user_id','0','0')");
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into working_e_wallet values(NULL,'$user_id','0','0')");
		mysqli_query($GLOBALS["___mysqli_ston"], "insert into roi_e_wallet values(NULL,'$user_id','0','0')");


		                    if($nom_id123!='' && $binary_pos!='')
			        		{
			        			$nom=$nom_id123;
								$pos=$binary_pos;
								$l=1;
								while($nom!='cmp'){
							    if($nom!='cmp' && $nom!=''){
								mysqli_query($GLOBALS["___mysqli_ston"], "insert into level_income_binary set down_id='".$user_id."', income_id='$nom', leg='$pos', l_date='".date('Y-m-d')."', status=0, level='$l'");
								$l++;
								$selectnompos=mysqli_query($GLOBALS["___mysqli_ston"], "select binary_pos, nom_id from user_registration where user_id='$nom'  ");
								$fetchnompos=mysqli_fetch_array($selectnompos);
								$pos=$fetchnompos['binary_pos'];
								$nom=$fetchnompos['nom_id'];
								}
			        		   }
			        		  
			        		   mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set nom_id='".$nom_id123."', binary_pos='".$binary_pos."' where user_id='$user_id'");
			        	   }

		       /*Inserting Record of BV in manage bv table for all upliners code starts here*/
				$nom123=$sponsorid;
				$date=date('Y-m-d');
				$l1=1;
				while($nom123!='cmp'){
			    if($nom123!='cmp'){
				mysqli_query($GLOBALS["___mysqli_ston"], "insert into matrix_downline set down_id='".$user_id."', income_id='$nom123', l_date='$date', status=0, level='$l1'");
				$l1++;
				$selectnompos1=mysqli_query($GLOBALS["___mysqli_ston"], "select ref_id from user_registration where user_id='$nom123' ");
				$fetchnompos1=mysqli_fetch_array($selectnompos1);
				$nom123=$fetchnompos1['ref_id'];
				}
				}	
			   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

                    $randing=rand(1,4);
                    if($randing!='')
                    {
                        $ifds=$randing;
                    }
                    else
                    {
                        $ifds=1;
                    }


	                $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='$ifds'"));
	                $rowww11=$sqlqw1['sponsor_reward'];
	                $rowww12=$sqlqw1['name'];
	                $rowww13=$sqlqw1['amount'];
	                $rowww14=$sqlqw1['matching'];

                    $ref=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='$user_id'"));

                    $cure=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$user_id."'"));
				    $comm=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='1'"));
				    $package_name=$comm['name'];
				    $validity=$comm['pb'];
				    $rand = rand(0000000001,9000000000);
				    $amount=rand(100,1000);
				    $pbs1=$amount;
				    $pv=$pbs1;
				    $start=date('Y-m-d');
				     $lfid="LJ".$user_id.$rand;
                    $end = date('Y-m-d', strtotime('+'."$validity".' days'));
                    $current_time= date("Y-m-d H:i:s");
                     mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set designation='Paid Member', user_plan='1', user_rank_name='Paid Member' where user_id='$user_id'");


					mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `lifejacket_subscription` (`id`, `user_id`, `package`, `amount`, `pay_type`, `pin_no`, `transaction_no`, `date`, `expire_date`, `remark`, `ts`, `status`, `invoice_no`,`lifejacket_id`,`username`,`sponsor`,`pb`) VALUES (NULL, '$user_id', '1', '$amount', 'Admin Activation', 'Bulk Register', '$rand', '$start', '$end', 'Package Upgrade', '$current_time', 'Active', '$rand','$lfid','".$user_id."','".$ref['ref_id']."','$pv')");

					/*Inserting Record of BV in manage bv table for all upliners code starts here*/
						$upliners=mysqli_query($GLOBALS["___mysqli_ston"], "select * from level_income_binary where down_id='$user_id'");
						while($upline=mysqli_fetch_array($upliners))
						{
							$income_id=$upline['income_id'];
							$position=$upline['leg'];
							$user_level=$upline['level']; 
							mysqli_query($GLOBALS["___mysqli_ston"], "insert into manage_bv_history values(NULL,'$income_id','$user_id','$user_level','$amount','$position','Package Purchase Amount','$start',CURRENT_TIMESTAMP,'0','$amount')");
						}
					   /*Inserting Record of BV in manage bv table for all upliners code ends here*/

					    $invoice_no=rand(1111111111,9999999999);
     				    commission_of_referal($ref['ref_id'],$user_id,$amount,$invoice_no,1);




			   $nus++;
			}
			}


	        $_SESSION['err']="Data Updated Successfully!";  
			header("location:bulk-registration.php");
			exit();

	       

	    }
	    else
	    {
	    	$_SESSION['err']="No user found!";  
		header("location:bulk-registration.php");
		 exit();
	    }



    
    
    
  }
  else
  {
 	$_SESSION['err']="something went worng!";  
	header("location:bulk-registration.php");
	 exit();
  }
	 
}





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
                 <?php include("top-menu1.php");
				 include('../lib/random.php');
   $salt=$_SESSION['nonce'];

				 ?>
           
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

            <div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                           Bulk Registration<span style="float:right;color:red;"><?php echo $_SESSION['err']; $_SESSION['err']='';?></span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                             
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Enter Username / User ID </label>
                                    <div class="col-lg-10">
                                        <input type="text" name="userid" class="form-control" placeholder="Enter Userid / Username" required value="" required>
                                        <p class="help-block">Enter userid or username of the user</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Enter Numbers</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="nregister" class="form-control" id="inputPassword1" placeholder="Number of registration" required>
                                        <p class="help-block">Number of registration</p>
                                    </div>
                                </div>
								<input type="hidden" name="randm" class="form-control" id="inputPassword1" value="<? echo  md5($salt.$_GET['id']);?>" required>
                                    
                                  
                                    
                                   
                                 <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" class="btn btn-primary" name="Add" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
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

<script type="text/javascript">
	$('#remark').change(function (){
		var selectedValue = this.value;
		if(selectedValue == 'Bank Transfer')
		{
			$('#banksDiv').removeClass('hide');
			$('#refKeyDiv').removeClass('hide');
		}
		else if(selectedValue == 'NETS' || selectedValue == 'VISA/MASTER' || selectedValue == 'OTHERS')
		{
			$('#banksDiv').addClass('hide');
			$('#refKeyDiv').removeClass('hide');
		}
		else 
		{
			$('#banksDiv').addClass('hide');
			$('#refKeyDiv').addClass('hide');
		}
		
	});
	
</script>

</body>
</html>