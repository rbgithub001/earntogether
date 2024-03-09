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

		if(isset($_GET['Show'])){
		  
			$from=$_POST['from'];
            $end_date=$_POST['end_date'];
			$id=$_POST['list'];
		 
			$query123=$_POST['qry'];
			$date=date('Y-m-d');
			$description=$_POST['description'];
		
            if(!empty($id)){
                 echo "dsf";die;
                foreach($id as $check) 
                {
  
				    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set del_status=4  where id='$check' ");
                    
                }	
            }	    
	    }



if($_POST[submits])
{
    
    
$frm=$_REQUEST['from'];
$til=$_REQUEST['to'];
$dfrom=explode("/",$frm);
$fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 
$dednd=explode("/",$til);
$edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];
$username=$_REQUEST['id'];  

$uname=$_REQUEST['uname']; 
$umobile=$_REQUEST['umobile']; 
$uemail=$_REQUEST['uemail']; 



  $query123=array();
  if($uname!='')
  {
     $query123[]=" (first_name='$uname' or last_name='$uname' or username='$uname')";   
  }
   if($umobile!='')
  {
     $query123[]=" (telephone='$umobile' or branch_nm='$umobile')";   
  }
    if($uemail!='')
  {
     $query123[]=" (email='$uemail')";   
  }
  
  if($username!='')
  {
  $query123[]=" (user_id='$username' or first_name='$username' or last_name='$username' or username='$username')";  
  }
  $mstatus=$_REQUEST['mstatus'];
  if($mstatus!='')
  {
  $query123[] = " user_rank_name='$mstatus'";  
  }
  if($frm!='' && $til!='')
  {
    $query123[]=" registration_date>='$fdate' and registration_date<='$edate' ";
  }
  if(count($query123) > 0){
  $qry= 'where '.implode(' and',$query123);
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
    <script>
    function mtcn(admin_remark1,userId,Id)
    {

        if(admin_remark1!='' && admin_remark1!=false)
        {
            $.ajax({
                url:'../ajax/ajax_awb.php',
                type:'post',
                data:{admin_remark1:admin_remark1,userId:userId,id:Id,funtion:'mtcn'},
                success:function(data)
                {
                    
                    if(data==2)
                    {
                            alert("Successfully Updated Remark");
                            location.reload();
                    }
                    else if(data==3)
                    {
                        alert("Due to some Error Occur");
                    }
                }
                
                
                
            });
        }
        
    }
    
    </script>

     <script>
function coderHakan()
{
var sayfa = window.open('','','width=500,height=500');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('printArea').innerHTML);
sayfa.document.close();
sayfa.print();
}

</script>
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

                    <div class="col-sm-12 text-right">

                        <a href="export_member_list.php" class="btn btn-success">export in excel</a>

                    </div>
                    <div class="col-sm-12">
                    <center> <span style="color:Green;"><?php echo @$_GET['msg'];?></span></center>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">Registered Member List</header>
                                <div class="row">
                                    <div class="col-sm-12" style="margin:20px 20px 20px 20px; ">
                                        <form name="tree" method="post" action="#" >
                                            <div class="col-sm-2">
                                                <input name="id" value="" type="text" placeholder="User Id" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <input name="uname" value="" type="text" placeholder="User Name" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <input name="umobile" value="" type="text" placeholder="Mobile" class="form-control">
                                            </div>
                                            <!--<div class="col-sm-2">
                                                <input name="uemail" value="" type="text" placeholder="Enter User Email" class="form-control">
                                            </div>-->
                                            <div class="col-sm-2">
                                                <input name="from" value=""  placeholder="Start Date" id="bdate" type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <input  placeholder="End Date" name="to" value="" id="bdate1" type="text" class="form-control">
                                            </div>
                                            <!--<div class="col-sm-2">
                                                <select name="mstatus" class="form-control">
                                                    <option value="">Member Type</option>
                                                    <option value="Paid Member">Paid</option>
                                                    <option value="Free Member">Free</option>
                                                </select>
                                            </div>-->
                                            <div class="col-sm-1">
                                                <input type="submit" name="submits" value="Submit" class="btn btn-success">           
                                            </div>
                                        </form>
                                    </div>
                                <div class="col-md-12" style="text-align: center;">
<form name="myform" onSubmit="return ValidateData(this);" method="GET"  >
     <input name="Show" type="submit" class="btn btn-primary" id="Show" value="Delete" onClick="setTimeout('window.location.reload()',3000);">
                                    </div>
                                </div>
                                
                                </br>
   
                        <div class="total_invoice"  id="printArea">

                            <div class="table-responsive">
                            <table id="myTable" class="myTable data-table">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    User ID
                                </th>
                                <th style="text-align:center;">
                                    Username
                                </th>
                                <th style="text-align:center;">
                                    Full Name / Email / Mobile
                                </th>
                                <!-- <th style="text-align:center;">
                                    Package Name
                                </th>-->
                                <!--<th style="text-align:center;">
                                    Package Name(Amount)
                                </th>-->
                                
                                <th style="text-align:center;">
                                    Sponsor Id
                                </th>
                                <th style="text-align:center;">
                                    User Rank
                                </th>
                               <!-- <th style="text-align:center;">
                                    Purchase (SAR)
                                </th>-->
                                <th style="text-align:center;">
                                  Amount
                                </th>
                                <th style="text-align:center;">
                                   Personal Sale
                                </th>
                                <th style="text-align:center;">
                                    Group Sale
                                </th>
                                 
                                
                                 <th style="text-align:center;">
                                 Country
                                </th>
                                
                                <th style="text-align:center;">
                                    Edit
                                </th>
                               <!-- <th style="text-align:center;">
                                   Co-Founder
                                </th>-->
                               
                                
                                 <th style="text-align:center;">
                                   Login Status
                                </th>
                                <th style="text-align:center;">
                                   Delete<br>
                                  
                                    <input type="button" name="Check_All" value="Check All" onclick="Check(document.myform.check_list)" />
                               
                                </th>
                            </tr>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $groupsale=0;
                            // $downarray = array();
                            // $firstlevelmembers=(mysqli_query($GLOBALS["___mysqli_ston"], "select down_id from matrix_downline where income_id='Emark00001' and level='1'"));
                            // while($firstlevel = mysqli_fetch_array($firstlevelmembers)){
                            //     array_push($downarray,$firstlevel['down_id']);
                            // }
                            
                            $i=1;
                            $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration $qry order by id desc");
                            while($data1=mysqli_fetch_array($data)){ 
                            $str1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$data1['rank']."'  "));
                    
                            $per_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as myper_sale from billing_detail where seller_id='".$data1['user_id']."' and status=1 "));
                            
                            $datadown=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline  where income_id='".$data1['user_id']."' ");
                            while($datared=mysqli_fetch_array($datadown)){ 
                                
                              $ddid=  $datared['down_id'];
                              $downidper_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as mydown_sale from billing_detail where seller_id='$ddid' and status=1 "));
                             
                              if(!empty($downidper_sale['mydown_sale']))
                              {
                                   $groupsale+=$downidper_sale['mydown_sale']; 
                                  
                              }
                            }
                            
                            
                         //   $group_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as group_sale from billing_detail where seller_id='".$data1['user_id']."' and status=1 "));
                            
                            
                            
                            
                        ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    
                                    <a href='jumpto_member_office.php?id=<?php echo $data1['user_id'];?>' target="_blank"><?php echo $data1['user_id'];?> </a>
                                </td>
                                
                               <!-- <td>
                                     <?php $package=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select name from status_maintenance where id='".$data1['user_plan']."'"));?>
                                    
                                    <?php echo $package['name'];?>
                                </td>-->
                                
                                <td>
                                    <?php echo $data1['username'];?>
                                </td>
                             
                                <td>
                                    <?php echo "<span style='color: #af0101;'>Full name:</span>".$data1['first_name']." ".$data1['last_name'];?><br/>  <?php echo "<span style='color: #af0101;'>Email:</span>".$data1['email'];?><br/>  <?php echo "<span style='color: #af0101;'>Telephone:</span>" .$data1['telephone'];?>
                                </td>
                                 <!--<td>
                                     <?php $package=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select name,amount from status_maintenance where id='".$data1['user_plan']."'"));?>
                                    
                                    <?php echo $package['name'].' '.'('.$package['amount'].')';?>
                                </td>-->
                                
                                <td>
                                    <?php $quets=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select username from user_registration where user_id='".$data1['ref_id']."'")); echo $quets['username'];?>
                                </td>
                                <td>
                                    <?php echo $str1['name'];
                                    echo ' ('.$str1['level_per'].'%)';
                                ?>
                                </td>
                                
                                <td> <?php echo number_format($data1['limt_amt'],2);?></td>
                                <td> <?php if(!empty($per_sale['myper_sale'])){echo number_format($per_sale['myper_sale'],2); }else{ echo '0.00'; }?></td>
                               
                               
                               
                                <td><?=$groupsale;?></td>

                                 <!--<td>
                                    <?php 
                                    //echo "select active_status from user_registration where user_id='".$data1['user_id']."'";
                                        /*$checkstatus = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select active_status from user_registration where user_id='".$data1['user_id']."'"));
                                        if($checkstatus['active_status'] == 0){
                                            
                                            echo 'Free User';
                                        }else{
                                            
                                            echo 'Active User';
                                        }*/
                                    ?>
                                </td>-->
                                
                               <!--<td>
                                   <?php
                                   
                                    $selfincomes2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select sum(total_invoice_cv) as total from amount_detail where user_id='".$data1['user_id']."'"));
                                    $selfbusiness2 = $selfincomes2['total'];
                                    echo $selfbusiness2 ? $selfbusiness2 : '00';
                                    ?>
                               </td>-->
                               
                               
                              
                                <td>
                                     <?php echo $data1['country'];?>
                                </td>
                                
                                <td>
                                     <a href="edit_member_profile.php?id=<?php echo $data1['id'];?>">Edit</a>
                                </td>
                              <!--  <td>
                                    <?php if(in_array($data1['user_id'],$downarray)){ ?>
                                    <select onchange="window.location.href = this.value" name="select">
                                        <option value="update-cofounder.php?user=<?php echo $data1['user_id'];?>&status=0"  <?php if($data1['co_founder']=='0'){ echo "selected";}?>>Deactive</option>
                                        <option value="update-cofounder.php?user=<?php echo $data1['user_id'];?>&status=1" <?php if($data1['co_founder']=='1'){ echo "selected";}?>>Active</option>
                                  </select>
                                  <?php }else{ echo '-';} ?>
                                </td>-->
                                <td>
                                    
                                     <select onchange="window.location.href = this.value" name="select">
                                        <option value="update-issued.php?user=<?php echo $data1['user_id'];?>&status=0"  <?php if($data1['user_status']=='0'){ echo "selected";}?>>Active</option>
                                         <option value="update-issued.php?user=<?php echo $data1['user_id'];?>&status=1" <?php if($data1['user_status']=='1'){ echo "selected";}?>>Deactive</option>
                                   
                                  </select>
                                </td> 
                                    <td><input type="checkbox" name="list[]" id="list[]" value="<?php echo $data1['id'] ?>"></td>
                            </tr>
                            <?php $i++;} ?>
                            
                      
                            </tbody>
                            </table>
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
        //owl.reinit();
    });

</script>

</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
       
  <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

</body>
</html>