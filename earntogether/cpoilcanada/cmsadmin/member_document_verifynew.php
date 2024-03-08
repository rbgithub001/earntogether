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
  
  else
  {
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
 

if($_GET['act']=='fake' && $_GET['fakeid']!='') 
{ 
  $fk=$_GET['fakeid'];
  if ($_GET['id_proof_data']!='') {
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update id_proof_list set status='2' where id='".$_GET['id_proof_data']."'");
  }elseif ($_GET['panid']!='') {
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update pancard_proof_list set status='2' where id='".$_GET['panid']."'");
    header("location:member_document_verifynew.php?id=$fk");
    exit();
  }
  elseif ($_GET['add_id']!='') {
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update address_proof_list set status='2' where id='".$_GET['add_id']."'");
    header("location:member_document_verifynew.php?id=$fk");
    exit();
  }elseif ($_GET['bank_id']!='') {
      $res=mysqli_query($GLOBALS["___mysqli_ston"],"update bank_statement_proof_list set status='2' where id='".$_GET['bank_id']."'");
    
  header("location:member_document_verifynew.php?id=$fk");
  exit();
  }
  header("location:member_document_verifynew.php");
  exit();
}

if(isset($_POST['subid'])) {
  $id=$_POST['id'];
  $rem=$_POST['remark'];
  $res=mysqli_query($GLOBALS["___mysqli_ston"],"update id_proof_list set status='2',admin_remark='$rem', admin_date='".date('d-m-y')."' where id='$id' ");
  header("location:member_document_verifynew.php?id=$_GET[id]&msg=You have successfully rejected member address");
  exit();
}

if(isset($_POST['subadd'])) {
  $id=$_POST['id'];
  $rem=$_POST['remark'];
  $res=mysqli_query($GLOBALS["___mysqli_ston"],"update address_proof_list set status='2',admin_remark='$rem', admin_date='".date('d-m-y')."' where id='$id'");
  header("location:member_document_verifynew.php?id=$_GET[id]&msg=You have successfully rejected member address");
  exit();
}

if(isset($_POST['subpan'])) {
  $id=$_POST['id'];
  $rem=$_POST['remark'];
  $res=mysqli_query($GLOBALS["___mysqli_ston"],"update pancard_proof_list set status='2',admin_remark='$rem', admin_date='".date('d-m-y')."' where id='$id'");
  header("location:member_document_verifynew.php?id=$_GET[id]&msg=You have successfully rejected member address");
  exit();
}

if(isset($_POST['subbank'])) {
  $id=$_POST['id'];
  $rem=$_POST['remark'];
   $res=mysqli_query($GLOBALS["___mysqli_ston"],"update bank_statement_proof_list set status='2',admin_remark='$rem', admin_date='".date('d-m-y')."' where id='$id'");
   
  
  header("location:member_document_verifynew.php?msg=You have successfully rejected member address");
  exit();
}




if($_GET['id_proof_data']!='' && $_GET['uid']!='')
{
    $data_id=$_GET['uid'];
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update id_proof_list set status='1' , admin_date='".date("Y-m-d")."' where id='".$_GET['id_proof_data']."' and user_id='$data_id'");

    $dataq1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$data_id' and status=1"));
   // $dataq2=mysql_num_rows(mysql_query("select * from pancard_proof_list where user_id='$data_id' and status=1"));
    $dataq3=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$data_id' and status=1"));
     //$dataq4=mysql_num_rows(mysql_query("select * from bank_statement_proof_list where user_id='$data_id' and status=1"));
   
    if($dataq1>0 && $dataq3>0)
    {
    //  mysql_query("update user_registration set kyc_status=1 where user_id='$data_id'");
           

  mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set kyc_status=1 where user_id='$data_id'");

    }



    header("location:member_document_verifynew.php?id=$data_id");
    
}
if($_GET['panid']!='' && $_GET['panuid']!='')
{
    $data_id=$_GET['panuid'];
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update pancard_proof_list set status='1', admin_date='".date("Y-m-d")."' where id='".$_GET['panid']."' and user_id='$data_id'");
    $dataq1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$data_id' and status=1"));
    $dataq2=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pancard_proof_list where user_id='$data_id' and status=1"));
    $dataq3=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$data_id' and status=1"));
    
     $dataq4=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bank_statement_proof_list where user_id='$data_id' and status=1"));
     
    
    if($dataq2>0 && $dataq3>0 && $dataq4>0)
    {
      
     

  mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set kyc_status=1 where user_id='$data_id'");

    }
    header("location:member_document_verifynew.php?id=$data_id");
    
}

if($_GET['add_id']!='' && $_GET['add_uid']!='')
{
    $data_id=$_GET['add_uid'];
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update address_proof_list set status='1' where id='".$_GET['add_id']."' and user_id='$data_id'");
    $dataq1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$data_id' and status=1"));
    //$dataq2=mysql_num_rows(mysql_query("select * from pancard_proof_list where user_id='$data_id' and status=1"));
    $dataq3=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$data_id' and status=1"));
    
   // $dataq4=mysql_num_rows(mysql_query("select * from bank_statement_proof_list where user_id='$data_id' and status=1"));
    
    
    if($dataq1>0 && $dataq3>0)
    {
    
  
  mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set kyc_status=1 where user_id='$data_id'");

    }
    header("location:member_document_verifynew.php?id=$data_id");
    
}


if($_GET['bank_id']!='' && $_GET['bank_uid']!='')
{
    $data_id=$_GET['bank_uid'];
    $res=mysqli_query($GLOBALS["___mysqli_ston"],"update bank_statement_proof_list set status='1' where id='".$_GET['bank_id']."' and user_id='$data_id'");
    
     
     $dataq1=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$data_id' and status=1"));
     $dataq2=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pancard_proof_list where user_id='$data_id' and status=1"));
     $dataq3=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$data_id' and status=1"));
     $dataq4=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bank_statement_proof_list where user_id='$data_id' and status=1"));
     
    if($dataq2>0 && $dataq3>0 && $dataq4>0)
    {
        
     
  mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set kyc_status=1 where user_id='$data_id'");

    }
   
    header("location:member_document_verifynew.php?id=$data_id");
    
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
                    userpanel
                </h3>
                 <?php include("top-menu1.php");?>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 Member Document Verify By Admin

                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-responsive data-table">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    Document Proof
                                </th>
                                <th style="text-align:center;">
                                    User ID
                                </th>
                                <th style="text-align:center;">
                                    Member Name
                                </th>
                                <th style="text-align:center;">
                                    View Document
                                </th>
                               <th style="text-align:center;">
                                    Document Name
                                </th>
                                <th style="text-align:center;">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $data1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$_GET[id]' and status=0"));
                                 // $data_pan=mysql_fetch_array(mysql_query("select * from pancard_proof_list where user_id='$_GET[id]' and status=0"));
                                 $data_add=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$_GET[id]' and status=0"));
                                 
                                // $data_bank=mysql_fetch_array(mysql_query("select * from bank_statement_proof_list where user_id='$_GET[id]' and status=0"));
                                 
                                  
                                  
                                  $data_row=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$_GET[id]' and status=0 "));
                                  if($data_row=='1')
                                  {
                                        $data2=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$_GET['id']."'"));
                                        ?>
                            <tr style="text-align:center;">
                             
                                <td>
                                    <?php echo "1";?>
                                </td>
                                 <td>
                                    ID Proof
                                </td>
                                <td>
                                    <?php echo $data2['user_id'];?> / <?php echo $data2['username'];?>
                                </td>
                              <td>
                                    <?php echo $data2['first_name']." ".$data2['last_name'];?>
                                </td>
                                <td>
                    <a href="../userpanel/<?php echo $data1['id_image'];?>" target='blank'> View Front Side  </a><br>
                    <?php if ($data1['id_image1']!='') {
                     ?>  <a href="../userpanel/<?php echo $data1['id_image1'];?>" target='blank'> View Back Side  </a>
                     <?php } ?>
                                </td>
                               <td>
                                     <?php echo "ID Proof No :  ".$data1['id_number'];?>
                                </td>
                                <td>
                                     <?php 
                                     if($data1['status']=='0') 
                                        { ?>
                                     <a href="member_document_verifynew.php?id_proof_data=<?php echo $data1['id'];?>&act=active&uid=<?php echo $data1['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Approve</a>

                                     <div data-toggle="modal" data-target="#myModal" class="btn btn-success" >Reject</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form name="fname" method="post" action="#">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remark</h4>
        </div>
        <div class="modal-body">
        <div class="serch-wrap">
        <div class="form-wrapper cf">
          <input type="hidden" name="id" value="<?php echo $data1['id'];?>">
          <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Remark" autocomplete="off">
        </div>  
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button> -->
          <input type="submit" name="subid" value="Submit" class="btn btn-success">

          </div>
          </form>
      </div>
      
    </div>
  </div>


                                     <!-- <a href="member_document_verifynew.php?id_proof_data=<?php echo $data1['id'];?>&act=fake&fakeid=<?php echo $data1['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Reject</a> -->  
                                      <?php } ?>
                                          <?php 
                                     if($data1['status']=='2') 
                                        { 
                                            echo "Cancelled";
                                        }
                                        ?>
                                       <?php 
                                     if($data1['status']=='1') 
                                        { 
                                            echo "Approved";
                                        }
                                        ?>
 
                                </td>

                            </tr>
                            <?php } ?>
                            
                                
                                <?php $data_pan_row=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pancard_proof_list where user_id='$_GET[id]' and status=0")); 
                                if($data_pan_row=='1') { 
                                $data2=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$_GET['id']."'"));
                                ?>
                                     <tr style="text-align:center;">
                                <td>
                                    <?php echo "2";?>
                                </td>
                                <td>
                                     Pan Card Proof
                                </td>
                                <td>
                                    <?php echo $data2['user_id'];?> / <?php echo $data2['username'];?>
                                </td>
                              <td>
                                    <?php echo $data2['first_name']." ".$data2['last_name'];?>
                                </td>
                                <td>
                    <a href="../userpanel/<?php echo $data_pan['pancard_image'];?>" target='blank'> view </a>
                                </td>
                               <td>
                                     <?php echo "Pan Card No : ".$data_pan['pancard_number'];?>
                                </td>
                                <td>
                                     <?php 
                                     if($data_pan['status']=='0') 
                                        { ?>
                                     <a href="member_document_verifynew.php?panid=<?php echo $data_pan['id'];?>&act=active&panuid=<?php echo $data_pan['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Approve</a> 

                                     <!-- <a href="member_document_verifynew.php?panid=<?php echo $data_pan['id'];?>&act=fake&fakeid=<?php echo $data_pan['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Reject</a> -->
                                     <div data-toggle="modal" data-target="#myModal1" class="btn btn-success" >Reject</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form name="fname" method="post" action="#">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remark</h4>
        </div>
        <div class="modal-body">
        <div class="serch-wrap">
        <div class="form-wrapper cf">
         <input type="hidden" name="id" value="<?php echo $data_pan['id'];?>">
          <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Remark" autocomplete="off">
        </div>  
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="subpan" value="Submit" class="btn btn-success">
        </div>
        </form>
      </div>
      
    </div>
  </div>





                                      <?php } ?>
                                      <?php 
                                     if($data_pan['status']==2) 
                                        { echo "Cancelled"; } ?>
                                       <?php 
                                     if($data_pan['status']==1) 
                                        { echo "Approved"; }
                                        ?>
 
                                </td>

                            </tr>
                            <?php } ?>
                           
                           <!--FOR ADDRESS-->
                        
                        
                                <?php $data_add_row=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$_GET[id]' and status=0")); 
                                if($data_add_row=='1') { 
                                $data2=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$_GET['id']."'"));
                                ?>
                                     <tr style="text-align:center;">
                                <td>
                                    <?php echo "2";?>
                                </td>
                                <td>
                                     Address Proof
                                </td>
                                <td>
                                    <?php echo $data2['user_id'];?> / <?php echo $data2['username'];?>
                                </td>
                              <td>
                                    <?php echo $data2['first_name']." ".$data2['last_name'];?>
                                </td>
                                <td>
                     <a href="../userpanel/<?php echo $data_add['address_proof_image'];?>" target='blank'> View Front Side  </a><br>
                    <?php if ($data_add['address_proof_image2']!='') {
                     ?>  <a href="../userpanel/<?php echo $data_add['address_proof_image2'];?>" target='blank'> View Back Side  </a>
                     <?php } ?>
                                </td>
                               <td>
                                     <?php echo $data_add['address_proof'];?>
                                </td>
                                <td>
                                     <?php 
                                     if($data_add['status']=='0') 
                                        { ?>
                                     <a href="member_document_verifynew.php?add_id=<?php echo $data_add['id'];?>&act=active&add_uid=<?php echo $data_add['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Approve</a> 

                                     <!-- <a href="member_document_verifynew.php?add_id=<?php echo $data_add['id'];?>&act=fake&fakeid=<?php echo $data_add['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Reject</a> -->
                                     <div data-toggle="modal" data-target="#myModal1" class="btn btn-success" >Reject</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form name="fname" method="post" action="#">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remark</h4>
        </div>
        <div class="modal-body">
        <div class="serch-wrap">
        <div class="form-wrapper cf">
         <input type="hidden" name="id" value="<?php echo $data_add['id'];?>">
          <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Remark" autocomplete="off">
        </div>  
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="subadd" value="Submit" class="btn btn-success">
        </div>
        </form>
      </div>
      
    </div>
  </div>





                                      <?php } ?>
                                      <?php 
                                     if($data_add['status']==2) 
                                        { echo "Cancelled"; } ?>
                                       <?php 
                                     if($data_add['status']==1) 
                                        { echo "Approved"; }
                                        ?>
 
                                </td>

                            </tr>
                            <?php } ?>
                          <!--Code End FOR ADDRESS-->
                           <!--FOR Bank-->
                        
                              <?php $data_bank_row=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from bank_statement_proof_list where user_id='$_GET[id]' and status=0")); 
                              
                        if($data_bank_row=='1') { 
                            $data2=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from user_registration where user_id='".$_GET['id']."'"));
                       
                        ?>  
                                
                                <tr style="text-align:center;">
                                <td>
                                    <?php echo "3";?>
                                </td>
                                <td>
                                     Bank Details Proof
                                </td>
                                <td>
                                    <?php echo $data2['user_id'];?> / <?php echo $data2['username'];?>
                                </td>
                              <td>
                                    <?php echo $data2['first_name']." ".$data2['last_name'];?>
                                </td>
                                <td>
                    <a href="../userpanel/<?php echo $data_bank['bank_recipt_proof'];?>" target='blank'> view </a>
                                </td>
                               <td>
                                     <?php echo "Bank Name : ".$data_bank['bank_name'].'<br>';?>
                                     <?php echo "Account Name : ".$data_bank['acc_name'].'<br>';?>
                                     <?php echo "Account Number : ".$data_bank['ac_no'].'<br>';?>
                                     <?php echo "Branch Name : ".$data_bank['branch_nm'].'<br>';?>
                                     <?php echo "Swift Code : ".$data_bank['swift_code'].'<br>';?>
                                </td>
                                <td>
                                     <?php 
                                     if($data_bank['status']=='0') 
                                        { ?>
                                     <a href="member_document_verifynew.php?bank_id=<?php echo $data_bank['id'];?>&act=active&bank_uid=<?php echo $data_bank['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Approve</a> 

                                     <!--<a href="member_document_verifynew.php?bank_id=<?php echo $data_bank['id'];?>&act=fake&fakeid=<?php echo $data_bank['user_id'];?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Reject</a> -->
                                     
                                     
                                     
                                      <div data-toggle="modal" data-target="#myModal1" class="btn btn-success" >Reject</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form name="fname" method="post" action="#">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remark</h4>
        </div>
        <div class="modal-body">
        <div class="serch-wrap">
        <div class="form-wrapper cf">
         <input type="hidden" name="id" value="<?php echo $data_add['id'];?>">
          <input type="text" id="remark" name="remark" class="form-control" placeholder="Enter Remark" autocomplete="off">
        </div>  
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="subadd" value="Submit" class="btn btn-success">
        </div>
        </form>
      </div>
      
    </div>
  </div>
                                     
                                     
                                      <?php } ?>

                                       <?php if($data_bank['status']=='1') 
                                        { echo "Approved"; } ?>
                                        <?php if($data_bank['status']=='2') 
                                        { echo "Cancelled"; } ?>
 
                                </td>

                            </tr>
                                     
                            <?php } ?>
                         
                           <!--End for bank-->
                            </tbody>
                            </table>
                            </div></div>
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
<script src="js/userpanel-vmap-init.js"></script>

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
<!-- <script src="js/dataTables.responsive.min.js"></script> -->
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

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js">
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