<?php 
 include("header.php");
 $uid = $f['user_id'];
 if (isset($_POST['sub'])) 
 {
     $tmp_name=$_FILES['id_proof_image']['tmp_name']; 
     $tmp_name1=$_FILES['id_proof_image1']['tmp_name']; 
     $pic = $_FILES['id_proof_image']['name']; 
      $pic1 = $_FILES['id_proof_image1']['name']; 
     $folder="img/";
     date_default_timezone_set("Asia/Calcutta");
     $date = date('h_i_s', time());
     $imageDBpath =$folder.$date.$pic;
     $imageDBpath1 =$folder.$date.$pic1;
    $id_number=$_POST['id_number'];
   $id_proof=$_POST['id_proof'];
    $check_yes=$_POST['yes'];
    $hid=$_POST['hidden_id'];
   $check1 = getimagesize($_FILES["id_proof_image"]["tmp_name"]);
    $check2 = getimagesize($_FILES["id_proof_image1"]["tmp_name"]);
    if($check1 == false || $check2 == false) {
        
        
      header("location:kyc_status.php?msg=File is not an image.");
      exit(); 
    }

     $filename12 = time()."main_".$_FILES["id_proof_image"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["id_proof_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt") {
  
    header("location:kyc_status.php?msg=Sorry, file not  allowed.");
      exit();
}
     $check = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select user_id from id_proof_list where user_id='$uid'"));
     if($check=='1')
     {
    
    move_uploaded_file($tmp_name,$folder.$date.$pic);
      move_uploaded_file($tmp_name1,$folder.$date.$pic1);

   mysqli_query($GLOBALS["___mysqli_ston"],"update id_proof_list set user_id='$uid',id_number='$id_number',id_image='$imageDBpath',id_image1='$imageDBpath1',id_checkbox='$check_yes',status='0' where id='$hid'");
     }
     else {
              move_uploaded_file($tmp_name,$folder.$date.$pic);
               move_uploaded_file($tmp_name1,$folder.$date.$pic1);
    mysqli_query($GLOBALS["___mysqli_ston"],"insert into id_proof_list (user_id,id_proof,id_number,id_image,id_image1,id_checkbox,status) values ('$uid','$id_proof','$id_number','$imageDBpath','$imageDBpath1','$check_yes','0')");
    header("location:kyc_status.php?msg_id= Record Submit successfully..!");
    exit();
    } 
    
 }
 
if (isset($_POST['pancard'])) 
 {
      $tmp_name=$_FILES['pancard_proof_image']['tmp_name']; 
      $pic = $_FILES['pancard_proof_image']['name']; 
      $folder="img/";
      date_default_timezone_set("Asia/Calcutta");
      $date = date('h_i_s', time());
      $imageDBpath =$folder.$date.$pic;
    $pan_number=$_POST['pan_number'];
    $check_yes=$_POST['yes'];
    $status = $_POST['status'];
     $h_panid=$_POST['hidden_pan_id'];
     /*validation start*/
    
    $check = getimagesize($_FILES["pancard_proof_image"]["tmp_name"]);
    if($check == false) {
        
        
      header("location:kyc_status.php?msg=File is not an image.");
      exit(); 
    }


     $filename12 = time()."main_".$_FILES["pancard_proof_image"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["pancard_proof_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt") {
  
    header("location:kyc_status.php?msg=Sorry, file not  allowed.");
      exit();
}
    /*validation end*/
      $check1 = mysql_num_rows(mysql_query("select user_id from pancard_proof_list where user_id='$uid'"));
     if($check1=='1')
     {
          move_uploaded_file($tmp_name,$folder.$date.$pic);
  mysql_query("update pancard_proof_list set user_id='$uid',pancard_number='$pan_number',pancard_image='$imageDBpath',id_checkbox='$check_yes',status='0' where id='$h_panid'");
     }
     else {
    move_uploaded_file($tmp_name,$folder.$date.$pic);
    mysql_query("insert into pancard_proof_list (user_id,pancard_number,pancard_image,id_checkbox,status) values ('$uid','$pan_number','$imageDBpath','$check_yes','0')");
    header("location:kyc_status.php?msg_pan= Record Submit successfully..!");
    exit();
    } 
 }
    
    if (isset($_POST['address'])) 
 {
      $tmp_name=$_FILES['address_proof_image']['tmp_name']; 
      $tmp_name2=$_FILES['address_proof_image2']['tmp_name']; 
      $pic = $_FILES['address_proof_image']['name']; 
      $pic2 = $_FILES['address_proof_image2']['name']; 
      $folder="img/";
      date_default_timezone_set("Asia/Calcutta");
      $date = date('h_i_s', time());
      $imageDBpath =$folder.$date.$pic;
      $imageDBpath2 =$folder.$date.$pic2;
    $add_proof=$_POST['add_proof'];
    $check_yes=$_POST['yes'];
    $status = $_POST['status'];
    $h_addid=$_POST['hidden_add_id'];
    /*validation start*/
    
    $check = getimagesize($_FILES["address_proof_image"]["tmp_name"]);
    $check21 = getimagesize($_FILES["address_proof_image2"]["tmp_name"]);
    if($check == false || $check21 == false)
    {
      header("location:kyc_status.php?msg=File is not an image.");
      exit(); 
    }

     $filename12 = time()."main_".$_FILES["address_proof_image"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["address_proof_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt") {
  
    header("location:kyc_status.php?msg=Sorry, file1 not  allowed.");
      exit();
}

 $filename123 = time()."main_".$_FILES["address_proof_image2"]["name"];

  $target_dir23 = "images/";
$target_file23 = $target_dir23 . basename($_FILES["address_proof_image2"]["name"]);
$uploadOk23 = 1;
$imageFileType23 = strtolower(pathinfo($target_file23,PATHINFO_EXTENSION));
if($imageFileType23 != "jpg" && $imageFileType23 != "png" && $imageFileType23 != "jpeg" 
&& $imageFileType23 != "gif" && $imageFileType23 != "pdf" && $imageFileType23 != "txt") {
  
    header("location:kyc_status.php?msg=Sorry, file2 not  allowed.");
      exit();
}
    /*validation end*/
      $check2 = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select user_id from address_proof_list where user_id='$uid'"));
     if($check2=='1')
     {
          move_uploaded_file($tmp_name,$folder.$date.$pic);
          move_uploaded_file($tmp_name2,$folder.$date.$pic2);
   mysqli_query($GLOBALS["___mysqli_ston"],"update address_proof_list set user_id='$uid',address_proof='$add_proof',address_proof_image='$imageDBpath',address_proof_image2='$imageDBpath2',id_checkbox='$check_yes',status='0' where id='$h_addid'");
     }
     else {
          move_uploaded_file($tmp_name,$folder.$date.$pic);
          move_uploaded_file($tmp_name2,$folder.$date.$pic2);
    mysqli_query($GLOBALS["___mysqli_ston"],"insert into address_proof_list (user_id,address_proof,address_proof_image,address_proof_image2,id_checkbox,status) values ('$uid','$add_proof','$imageDBpath','$imageDBpath2','$check_yes','0')");
    header("location:kyc_status.php?msg_add= Record Submit successfully..!");
    exit();
    } 
 }
    

 if (isset($_POST['bank'])) 
 {
      $tmp_name=$_FILES['bank_recipt_proof_image']['tmp_name']; 
      $pic = $_FILES['bank_recipt_proof_image']['name']; 
      $folder="img/";
    date_default_timezone_set("Asia/Calcutta");
      $date = date('h_i_s', time());
      $imageDBpath =$folder.$date.$pic;
    $bank_name=$_POST['account3'];
    $acc_name=$_POST['account1'];
    $ac_no=$_POST['account2'];
    $branch_nm=$_POST['account4'];
    $swift_code=$_POST['account5'];
    $check_yes=$_POST['yes'];
    $status = $_POST['status'];
    
    /*validation start*/
    
    $check = getimagesize($_FILES["bank_recipt_proof_image"]["tmp_name"]);
    if($check == false) {
        
        
      header("location:kyc_status.php?msg=File is not an image.");
      exit(); 
    }


     $filename12 = time()."main_".$_FILES["bank_recipt_proof_image"]["name"];

  $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["bank_recipt_proof_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt") {
  
    header("location:kyc_status.php?msg=Sorry, file not  allowed.");
      exit();
}
    /*validation end*/

    move_uploaded_file($tmp_name,$folder.$date.$pic);
    
    $ch1 = mysql_num_rows(mysql_query("select * from bank_statement_proof_list where user_id='$uid'"));
    
    
    
    if ($ch1 > 0) {
         mysql_query("UPDATE bank_statement_proof_list SET bank_name='$bank_name',acc_name='$acc_name',ac_no='$ac_no',branch_nm='$branch_nm',swift_code='$swift_code',bank_recipt_proof='$imageDBpath',id_checkbox='$check_yes',status='0' where user_id='$uid'");
        
       
    }else{
        
      $checker=mysql_query("insert into bank_statement_proof_list (user_id,bank_name,acc_name,ac_no,branch_nm,swift_code,bank_recipt_proof,id_checkbox,status) values ('$uid','$bank_name','$acc_name','$ac_no','$branch_nm','$swift_code','$imageDBpath','$check_yes','0')");
        
    }
   
    if ($checker) {
        mysql_query("UPDATE user_registration set acc_name='$acc_name', ac_no='$ac_no', branch_nm='$branch_nm', bank_nm='$bank_name', swift_code='$swift_code', bank_details_img='$imageDBpath' where user_id='$uid'");
        
    }
    header("location:kyc_status.php?msg_bank= Record Submit successfully..!");
    exit();
 
 }
    

?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
     <link href="css/sugarrush.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">
    #example2{
      margin-bottom: 20px;
    }
    .panel-primary{
      padding: 15px;
    }
    
    
    .m-b{
      margin-bottom: 25px;
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
        <section id="example2">
          
            <p><div align="center" style="color:green;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p>
          
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">KYC Documents</h4>
<div class="panel-body">
    
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="20%">Select ID Proof</th>
        <th width="20%">Id Proof Number</th>
        <th width="20%"> Front Side Image Upload</th>
         <th width="20%"> Back Side Image Upload</th>
    
        <th width="20%" >Admin Approval</th>
        <th width="20%">Action</th>
      
      </tr>
    </thead>
    
 <tbody>
      <tr>
           <div class="row">
                <div class="col-lg-12">
                   
                             <br/>
                            Manage Id Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_id'];?></span>
                        
                                    
                        <div class="panel-body">
           
                             <?php $data_id = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$uid'")); 
                             echo "select * from id_proof_list where user_id='$uid'";
                             ?>
                    
                     <?php $data_id_bm = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$uid'")); 
                     
                     if($data_id_bm=='0' || $data_id['status']=='2') { 
                     
                     ?>
                     
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                                  <td width='20%'>
                                      <select name="id_proof" class="form-control" required style="width:140px;">
                                          
                                    
                                   <option value="Passport" <?php if($data_id['id_proof']=='Passport') { ?> selected <?php } ?> >Passport</option>
                                   <option value="Driving License" <?php if($data_id['id_proof']=='Driving License') { ?> selected <?php } ?> >Driving License</option>
                                   
                                       </select>
                                    
                                 </td>
                                 
                                 <td width="20%">
                                     <input type="text" name="id_number" class="form-control" placeholder="Id Number" style="width:300px;"  required >
                                    <span id="eaadhar" ></span>
                                    </td>
                    
                                    
                                    <td width="5%">
                                    <input type="file" id="id_proof_image" name="id_proof_image" >
                                    </td>
                                     <td width="5%">
                                    <input type="file" id="id_proof_image1" name="id_proof_image1">
                                    </td>
                                
                                   
                                 
                                     <td width="20%">
                                          <?php if($data_id['status']=='1'){ echo "<b>Approoved</b>";} else if($data_id['status']=='0') { echo "<b>Pending</b>"; }else if($data_id['status']=='2') { ?><b>Cancelled By Admin [ <?php echo $data_id['admin_remark']; ?> ]</b><?php } ?>
                                    </td> 
                                    
                                     <input type="hidden" name="hidden_id" value="<?php echo $data_id['id']; ?>">
                                     
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="sub" value="Submit">
                                    </td>
                                          
                                  
                                
                            </form>
                            
                            <?php } else {
                            
                    
                            ?>
                             <td width='20%'>
                                     <?php echo $data_id['id_proof'];?> </td>
                            
                                     <td width="20%">
                                     <?php echo $data_id['id_number']; ?> 
                                     </td>
                                     <td width="10%">
                                     <img src="<?php echo $data_id['id_image']; ?>" width="50%"/>

                                     </td>
                                       <td width="10%">
                                     <img src="<?php echo $data_id['id_image1']; ?>" width="50%"/>
                                     
                                     </td>
                                   
                                     <td width="20%">
                                     <?php if($data_id['status']=='1'){ echo "<b>Approoved</b>";} else if($data_id['status']=='0') { echo "<b>Pending</b>"; } ?>
                                     </td>
                         
                                      <td width="20%">
                                          <?php
                                          if($data_id['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?idproof=<?=$data_id['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                                    
                                
                            <?php } ?>
                                  </div>
                    

           
                </div>
       </tr>
 </tbody>
 
</table>
</div>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="20%">Pan Card Number</th>
        <th width="20%">Pan Card Image Upload</th>
        <th width="20%">Self Approved</th>
        <th width="20%" >Admin Approval</th>
        <th width="20%">Action</th>
             
      </tr>
    </thead>
    
 <tbody>
      <tr>
          
      <div class="row">
                <div class="col-lg-12">
               
                         <br/>
                            Manage PAN Details<span style="float:right;color:red;"><?php echo @$_GET['msg_pan'];?></span>
                     
                                    <?php $data_pan = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pancard_proof_list where user_id='$uid'")); ?>
                        <div class="panel-body">
                            
                                 <?php $data_pancrdid = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pancard_proof_list where user_id='$uid'")); 
                                     
                                     if($data_pancrdid=='0' || $data_pan['status']=='2')
                                     {
                                     ?>
                                     
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                         
                                 <td width='20%'>
                                     <input type="text"  style="width:300px;" id="passport" name="pan_number" class="form-control" placeholder="Pan Card Number" value="<?php echo $data_pan['pancard_number']; ?>" required>
                                      <span id="epan" ></span>
                                    </td>
                    
                                    
                                    <td width='10%'>
                                    <input type="file" id="pancard_proof_image" name="pancard_proof_image" required="">
                                    </td>
                                   
                                     <td width='5%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_pan['id_checkbox']=='0') { ?> checked <?php } ?> value="0"></label>
                                     </td>
                                 
                                     <td width='20%'>
                                          <?php if($data_pan['status']=='0'){ echo "<b>Pending</b>";} else if($data_pan['status']=='1') { echo "<b>Approoved</b>"; }else if($data_pan['status']=='2') { ?><b>Cancelled By Admin[ <?php echo $data_pan['admin_remark']; ?> ]</b><?php } ?>
                                    </td> 
                                    
                                    <input type="hidden" name="hidden_pan_id" value="<?php echo $data_pan['id']; ?>">
                                    
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="pancard" value="Submit">
                                    </td>
                                       
                                
                            </form>
                                <?php } else { ?>
                                
                                <td width='20%'>
                                    <?php echo $data_pan['pancard_number']; ?>
                                    </td>
                                     <td width='10%'>
                                   <img src="<?php echo $data_pan['pancard_image'];?>" width="50%"/>
                                    </td>
                                     <td width='5%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_pan['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label>
                                     </td>
                                      <td width='20%'>
                                          <?php if($data_pan['status']=='0'){ echo "<b>Pending</b>";} else if($data_pan['status']=='1') { echo "<b>Approved</b>"; } ?>
                                    </td> 
                                    
                                 <td width="20%">
                                       <?php
                                          if($data_pan['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?panproof=<?=$data_pan['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                               
                           
                         <?php } ?>
                        </div>

                    
                </div>
             
            </div>
                
 </tbody>
</tr>
</table>
</div> 

 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="20%">Select Address Proof</th>
        <th width="20%">Upload Front Address Proof</th>
        <th width="20%">Upload Back Address Proof</th>
     
        <th width="20%" >Admin Approval</th>
        <th width="20%">Action</th>
               
        
      </tr>
    </thead>
    
 <tbody>
      <tr>
          
     <div class="row">
                <div class="col-lg-12">
                    <br/>
                            Manage Address Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_add'];?></span>
                  
                                    <?php $data_add = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$uid'")); ?>
                        <div class="panel-body">
                              <?php $data_addid = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$uid'")); 
                                if($data_addid=='0' || $data_add['status']=='2')
                                     {
                                     ?>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                         
                                <td width='20%'>
                                    <select name="add_proof" class="form-control" required>
                                       <option value="Passport" <?php if($data_add['address_proof']=='Passport') { ?> selected <?php } ?> >Passport</option>
                                       <option value="Driving License" <?php if($data_add['address_proof']=='Driving License') { ?> selected <?php } ?> >Driving License</option>
                                    </select>
                                </td>
                    
                                    
                               <td width='10%'>
                                    <input type="file" id="address_proof_image" name="address_proof_image">
                                    </td>
                                    <td width='10%'>
                                    <input type="file" id="address_proof_image2" name="address_proof_image2">
                                    </td>
                                    
                       
                                 <td width='20%'>
                                          <?php if($data_add['status']=='0'){ echo "<b>Pending</b>";} else if($data_add['status']=='1') { echo "<b>Approved</b>"; }else if($data_add['status']=='2') { ?><b>Cancelled By Admin[ <?php echo $data_add['admin_remark']; ?> ]</b><?php } ?>
                                    </td> 
                                       <input type="hidden" name="hidden_add_id" value="<?php echo $data_add['id']; ?>">
                                    
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="address" value="Submit">
                                    </td>
                              
                                
                            </form>
                             <?php } else {  ?>
                             
                                       <td width='20%'>
                                     <?php echo $data_add['address_proof']; ?>
                                      </td>
                    
                                    
                               <td width='20%'>
                                    <img src="<?php echo $data_add['address_proof_image'];?>" width="50%"/>
                                    </td>
                                    
                                    <td width='20%'>
                                    <img src="<?php echo $data_add['address_proof_image2'];?>" width="50%"/>
                                    </td>
                                    
                        
                                 <td width='20%'>
                                       
                                          <?php if($data_add['status']=='0'){ echo "<b>Pending</b>";} else if($data_add['status']=='1') { echo "<b>Approved</b>"; } ?>
                                    </td>
                             <td width="20%">
                                   <?php
                                          if($data_add['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?addressproof=<?=$data_add['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                 
                                 
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                                     
                             
                             <?php } ?>
                         
                        </div>

                 
                </div>
             
            </div>

 </tbody>
</tr>
</table>
</div>


<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th width="40%">Bank Details</th>

         <th width="20%">Bank Reciept Upload</th>
       <th width="10%">Self Approved</th>
        <th width="10%" >Admin Approval</th>
        <th width="20%">Action</th>
              
      </tr>
    </thead>
    
 <tbody>
      <tr>
          
      <div class="row">
                <div class="col-lg-12">
                    <br/>
                            Manage Bank Details Proof<span style="float:right;color:red;"><?php echo @$_GET['msg_bank'];?></span>
                  
                                    <?php $data_bank = mysql_fetch_assoc(mysql_query("select * from bank_statement_proof_list where user_id='$uid'")); ?>
                        <div class="panel-body">
                             <?php $data_bnkid = mysql_num_rows(mysql_query("select * from bank_statement_proof_list where user_id='$uid'")); 
                                     
                                     if($data_bnkid=='0' || $data_bank['status']=='2')
                                     {
                                     ?>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                         
                                 <td width='40%'>
                                     
                                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account1" value="" placeholder='Account Holder Name' class="form-control" style="width:300px;" required >
                      </div>
                    </div>

           <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account2" value="" class="form-control" placeholder='Account Number'  style="width:300px;" required>
                      </div>
                    </div>
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account3" value="" class="form-control" placeholder='Bank Name'  style="width:300px;" required>
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account4" value="" class="form-control" placeholder='Branch Name'  style="width:300px;" required>
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account5" value="" class="form-control" placeholder='Ifsc / Swift Code'  style="width:300px;" required>
                      </div>
                </div>
              

                </div>
                </td>
                             
                                    
                                    <td width='20%'>
                                    <input type="file" id="bank_recipt_proof_image" name="bank_recipt_proof_image" required>
                                    </td>
                                   
                                     <td width='20%'>
                                     <label><input type="checkbox" name="yes" <?php if($data_bank['id_checkbox']=='0') { ?> checked <?php } ?> value="0"></label>
                                     </td>
                                 
                                     <td width='20%'>
                                          <?php if($data_bank['status']=='0'){ echo "<b>Pending</b>";} else if($data_bank['status']=='1') { echo "<b>Approved</b>"; }else if($data_bank['status']=='2') { ?><b>Cancelled By Admin[ <?php echo $data_bank['admin_remark']; ?> ]</b><?php } ?>
                                    </td> 
                                    
                                    <input type="hidden" name="hidden_bank_id" value="<?php echo $data_bank['id']; ?>">
                                    
                                  
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" name="bank" value="Submit">
                                    </td>
                                   
                            </form>
                            <?php } else {?>
                            
                            <td width='20%'>
                               <div class="form-group">    
                                   <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account1" value="<?php echo $data_bank['acc_name'];?>" placeholder='Account Holder Name' class="form-control"  <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>

           <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account2" value="<?php echo $data_bank['ac_no'];?>" class="form-control" placeholder='Account Number' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account3" value="<?php echo $data_bank['bank_name'];?>" class="form-control" placeholder='Bank Name' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account4" value="<?php echo $data_bank['branch_nm'];?>" class="form-control" placeholder='Branch Name' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                    </div>
              
                <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="account5" value="<?php echo $data_bank['swift_code'];?>" class="form-control" placeholder='Ifsc / Swift Code' <?php if ($f['kyc_status']==1){ ?> readonly<?php } ?>>
                      </div>
                </div></td>
                             
                                    
                                    <td width='20%'>
                                    <img src="<?php echo $data_bank['bank_recipt_proof']; ?>" width="50%"/>
                                    </td>
                                   
                                     <td width='20%'>
                                     <label style="color:blue;"><input type="checkbox" name="yes" <?php if($data_bank['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label>
                                     </td>
                                 
                                     <td width='20%'>
                                          <?php if($data_bank['status']=='0'){ echo "<b>Pending</b>";} else if($data_bank['status']=='1') { echo "<b>Approved</b>"; } ?>
                                    </td> 
                                    <td width="20%">
                                         <?php
                                          if($data_bank['status']=='0')
                                          {
                                              ?>
                                              <a href="update_kyc.php?bankproof=<?=$data_bank['id']?>" class="btn btn success">Update</a>
                                              <?
                                              
                                          }
                                          ?>
                                       
                                        
                                        <span style="color:blue;"><b>Uploaded </b></span>
                                      </td>
                          
                            
                            <?php }?>
                         
                        </div>

               
                </div>
             
            </div>
                
 </tbody>
</tr>
</table>
</div>






                        </div>
                        

              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
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
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script type="text/javascript">
$(document).ready(function () {
  var z;
        $('#dependenddropdown').change(function () {
            z=$('#dependenddropdown').val();

            $('#addresss').text(z);
        });
    });

</script>
<script type="text/javascript">
  $("#p1").click(function(){

  $("#btc").show();
   $("#taaaahhh").show();
  $("#tether").hide();
  $("#thhh").hide();
});

$("#p2").click(function(){
 $("#btc").hide();
  $("#thhh").show();
  $("#tether").show();
  $("#taaaahhh").hide();
});
</script>
  <script>
    /*$("#ammm").keyup(function(){*/
        $(document).ready(function(){
             $("#ammm").change(function(){
                 var am = $("#ammm").val();
                 var am11 = $("#ammm112").val();
                 //var totalam = am*100+1;
                 var totalam = am;
                 var totalam1 = am;
                 var divide =totalam/am11;
                 
              if(am==''){
                     $('#ammm1').val('');
                     $('#ammm2').val('');
                     
                 }
                 if(am!=''){
                       $('#ammm1').val(totalam);
                       $('#ammm2').val(totalam1);
                  } 
                    
                    if(am==''){
                       $('#ammm11').val('');
                  }
                  if(am!=''){
                       $('#ammm11').val(divide);
                  } 
                  
                  
               
            });
        });
</script>
  <script>
        $(document).ready(function(){
             $("#ammmthere").keyup(function(){
                 var am = $("#ammmthere").val();
                
                 //var totalam = am*100+1;
                 var totalam = am;
                 var totalam1 = am;
                 var divide =totalam;
                 
              if(am==''){
                     $('#ammm1total').val('');
                     $('#ammmtotal2').val('');
                     
                 }
                 if(am!=''){
                       $('#ammm1total').val(totalam);
                       $('#ammmtotal2').val(totalam1);
                  } 
                    
                    if(am==''){
                       $('#ammm1tether1').val('');
                  }
                  if(am!=''){
                       $('#ammm1tether1').val(divide);
                  } 
                  
                  
               
            });
        });
</script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>