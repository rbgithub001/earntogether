<?php include("header.php");?>
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

    <style type="text/css">
    .rdbtn{
      background:#ff880e;
      color:#fff;
      transition:all .3s;
      padding: 10px;
      font-size: 20px;
    }
    .rdbtn:hover{
      background:#5f3d9e;
      color:#fff;
    }
    .panel-primary > .panel-heading {
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    color: #333;
    background-color: #d0a713;
    border-color: #b3900f;
    padding: 15px;
}
.rdbtn {
    background: #ff880e;
    color: #fff;
    transition: all .3s;
    padding: 10px;
    font-size: 20px;
}
.rdbtn:visited{
  color: #fff;
}
.package-upgradei{
  font-size: 16px;
}
.mar-bot-20{
  margin-bottom: 20px;
}
.package-upgradei label{
  margin-bottom: 10px;
}

.dashboard {
  font-size: 17px;
  margin-bottom: 0;
  margin-top: 2px;
  color: #1f1f1f;
  font-weight: bold;
}
#example2 {
  border: 1px solid color:gray;
  padding-top: 22px;
  background-color: white;
  box-shadow: 4px 4px 2px 0px #c7c3c3;
}
#btn{
  border-radius: 2px;
  font-size: 14px;
  padding: 4px 5px;
  outline: none !important;
  font-family: 'Nunito Sans', sans-serif;
  }
  #packages {
  background-color: white;
  box-shadow: 1px 2px 5px 5px #c7c3c3;
  padding: 20px;
}                       
</style>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<?php if($f['user_rank_name']=='Free Member'){?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
      $("#pin").blur(function (e) {
       
      $(this).val($(this).val().replace(/\s/g, ''));
      var pin = $(this).val();
      if(pin.length < 1){$("#check").html('');return;}
      if(pin.length >= 1){
          
      //$("#checksponser").html('Loading...');
      $.post('pinCheck.php', {'pin':pin}, function(data) {

      $("#check").html(data);
      });
      }
      }); 
      });
  </script>

</head>

  <body class="">
    <div class="animsition">  
    
      <!-- start of LOGO CONTAINER -->
     
      <!-- end of LOGO CONTAINER -->

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
        <!-- end of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <!-- <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                  <strong>Add Funds To Pool</strong>
                </div>
              <?php if($f['user_rank_name']=='Free Member'){ ?>
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" id="btn" data-target="#myModal">Subscribe</button>
                </div>    
              <?php } ?>
            </div>
          </div> -->

                        <!--code for box-->
                                <div class="col-md-12 col-sm-12" id="example2">
                                           
                                            <div class="col-md-7 col-sm-7">
                                             <strong style="color: black;">KYC Documents</strong>
                                           </div>

                                           <div class="col-md-5 col-sm-5">
                                            <?php if($f['user_rank_name']=='Free Member'){ ?>
                                            <div class="col-md-9">
                                            <h2 style="color:#1f1f1f;font-size: 16px;font-weight: bold;">Account Status : Inactive Member </h2>
                                            </div>
                                        <!--     <div class="col-md-3" style="float: left;"><button type="button" class="btn btn-primary" data-toggle="modal" id="btn" data-target="#myModal">Subscribe</button>
                                            </div> -->
                                            <?php }else{
                                            ?>
                                            <div class="col-md-9" style="padding-bottom: 22px; float: right;">
                                                <h2 style="color:#1f1f1f;font-size: 16px;font-weight: bold;">Account Status : Paid Member </h2>
                                            </div> 
                                        
                                            <?php } ?>

                                         </div>

                                        </div>
                                      <!--code for box close-->





                                <!--pop modal code end-->
        </section> <!-- / PAGE TITLE -->

<?php
 $uid = $f['user_id'];
 if(isset($_POST['sub'])) 
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
 
// if (isset($_POST['pancard'])) 
//  {
//       $tmp_name=$_FILES['pancard_proof_image']['tmp_name']; 
//       $pic = $_FILES['pancard_proof_image']['name']; 
//       $folder="img/";
//       date_default_timezone_set("Asia/Calcutta");
//       $date = date('h_i_s', time());
//       $imageDBpath =$folder.$date.$pic;
//     $pan_number=$_POST['pan_number'];
//     $check_yes=$_POST['yes'];
//     $status = $_POST['status'];
//      $h_panid=$_POST['hidden_pan_id'];
//      /*validation start*/
    
//     $check = getimagesize($_FILES["pancard_proof_image"]["tmp_name"]);
//     if($check == false) {
        
        
//       header("location:kyc_status.php?msg=File is not an image.");
//       exit(); 
//     }


//      $filename12 = time()."main_".$_FILES["pancard_proof_image"]["name"];

//   $target_dir = "images/";
// $target_file = $target_dir . basename($_FILES["pancard_proof_image"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
// && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt") {
  
//     header("location:kyc_status.php?msg=Sorry, file not  allowed.");
//       exit();
// }
//     /*validation end*/
//       $check1 = mysql_num_rows(mysql_query("select user_id from pancard_proof_list where user_id='$uid'"));
//      if($check1=='1')
//      {
//           move_uploaded_file($tmp_name,$folder.$date.$pic);
//   mysql_query("update pancard_proof_list set user_id='$uid',pancard_number='$pan_number',pancard_image='$imageDBpath',id_checkbox='$check_yes',status='0' where id='$h_panid'");
//      }
//      else {
//     move_uploaded_file($tmp_name,$folder.$date.$pic);
//     mysql_query("insert into pancard_proof_list (user_id,pancard_number,pancard_image,id_checkbox,status) values ('$uid','$pan_number','$imageDBpath','$check_yes','0')");
//     header("location:kyc_status.php?msg_pan= Record Submit successfully..!");
//     exit();
//     } 
//  }
    
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
    

//  if (isset($_POST['bank'])) 
//  {
//       $tmp_name=$_FILES['bank_recipt_proof_image']['tmp_name']; 
//       $pic = $_FILES['bank_recipt_proof_image']['name']; 
//       $folder="img/";
//     date_default_timezone_set("Asia/Calcutta");
//       $date = date('h_i_s', time());
//       $imageDBpath =$folder.$date.$pic;
//     $bank_name=$_POST['account3'];
//     $acc_name=$_POST['account1'];
//     $ac_no=$_POST['account2'];
//     $branch_nm=$_POST['account4'];
//     $swift_code=$_POST['account5'];
//     $check_yes=$_POST['yes'];
//     $status = $_POST['status'];
    
//     /*validation start*/
    
//     $check = getimagesize($_FILES["bank_recipt_proof_image"]["tmp_name"]);
//     if($check == false) {
        
        
//       header("location:kyc_status.php?msg=File is not an image.");
//       exit(); 
//     }


//      $filename12 = time()."main_".$_FILES["bank_recipt_proof_image"]["name"];

//   $target_dir = "images/";
// $target_file = $target_dir . basename($_FILES["bank_recipt_proof_image"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
// && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt") {
  
//     header("location:kyc_status.php?msg=Sorry, file not  allowed.");
//       exit();
// }
//     /*validation end*/

//     move_uploaded_file($tmp_name,$folder.$date.$pic);
    
//     $ch1 = mysql_num_rows(mysql_query("select * from bank_statement_proof_list where user_id='$uid'"));
    
    
    
//     if ($ch1 > 0) {
//          mysql_query("UPDATE bank_statement_proof_list SET bank_name='$bank_name',acc_name='$acc_name',ac_no='$ac_no',branch_nm='$branch_nm',swift_code='$swift_code',bank_recipt_proof='$imageDBpath',id_checkbox='$check_yes',status='0' where user_id='$uid'");
        
       
//     }else{
        
//       $checker=mysql_query("insert into bank_statement_proof_list (user_id,bank_name,acc_name,ac_no,branch_nm,swift_code,bank_recipt_proof,id_checkbox,status) values ('$uid','$bank_name','$acc_name','$ac_no','$branch_nm','$swift_code','$imageDBpath','$check_yes','0')");
        
//     }
   
//     if ($checker) {
//         mysql_query("UPDATE user_registration set acc_name='$acc_name', ac_no='$ac_no', branch_nm='$branch_nm', bank_nm='$bank_name', swift_code='$swift_code', bank_details_img='$imageDBpath' where user_id='$uid'");
        
//     }
//     header("location:kyc_status.php?msg_bank= Record Submit successfully..!");
//     exit();
 
//  }
    

?>  

        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%; text-align: center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>



       
          <div class="row" style="margin-top: 20px;">

            <div class="clearfix"></div>

            <div class="col-md-12 center-block" style="float:none;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-2"> <strong class="warning">MANAGE ID PROOF</strong></div>
                     <div class="col-md-4 col-md-offset-2"> <strong class="warning">MANAGE ID ADDRESS PROOF</strong></div>
                </div>

                                        <div class="row" id="section">
                                            <div class="col-lg-5 col-md-5 col-md-offset-1" style="box-shadow: grey 0px 2px 4px 3px;">
                                              <div class="card">
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                      
                                                      <div class="media-body padr text-white text-right">
                                                      
                    <!--form code-->
                     <?php $data_id = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$uid'")); 
                          //   echo "select * from id_proof_list where user_id='$uid'";
                             ?>
                    
                     <?php $data_id_bm = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from id_proof_list where user_id='$uid'")); 
                     
                 if($data_id_bm=='0' || $data_id['status']=='2') { ?>
                    <form name="bankinfo" method="post" enctype="multipart/form-data">
                     <div class="row">
                      <div class="col-md-5"><strong style="color: black;">ID Proof</strong></div>
                     <div class="col-md-7">
                       <select name="id_proof" style="width: 210px; padding: 7px; color: black;" required>
                                          
                          <option value="Passport" <?php if($data_id['id_proof']=='Passport') { ?> selected <?php } ?> >Passport</option>
                          <option value="Driving License" <?php if($data_id['id_proof']=='Driving License') { ?> selected <?php } ?> >Driving License</option>
                                   
                      </select>
                     </div>
                  </div>
                  <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-5"><strong style="color: black;">ID Proof Number</strong></div>
                     <div class="col-md-7">
                       <input type="text" name="id_number" value="<?php echo $data_id['id_number']; ?>" required="required" style="color: black;">
                        <span id="eaadhar" ></span>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                     <div class="col-md-6"> <input type="file" id="id_proof_image" name="id_proof_image" required=""><br><span style="color: black;text-align: center;">Front Side Image</span></div>
                      <div class="col-md-6"><input type="file" id="id_proof_image1" name="id_proof_image1" required=""><br><span style="color: black; text-align: center;">Back Side Image</span></div>
                  </div>
            
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Self Approved</strong></div>
                     <div class="col-md-6"><input type="checkbox" name="yes" value="0" style="color: black;"></div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-5"><strong style="color: black;">Admin Approval</strong></div>
                     <div class="col-md-7"><span style="color: black;"><?php if($data_id['status']=='1'){ echo "<b>Approoved</b>";} else if($data_id['status']=='0') { echo "<span>Pending</span>"; }else if($data_id['status']=='2') { ?><span>Cancelled By Admin [ <?php echo $data_id['admin_remark']; ?> ]</span><?php } ?></span></div>
                      <input type="hidden" name="hidden_id" value="<?php echo $data_id['id']; ?>">
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Action</strong></div>
                     <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" name="sub" value="Submit">
                     </div>
                  </div>
                </form>

                 <?php  }else{ ?>

                 
                <!--display data code-->                    
                  <div class="row">
                      <div class="col-md-6"><strong style="color: black;">ID Proof</strong></div>
                     <div class="col-md-6"><span style="color: black;"><?php echo $data_id['id_proof'];?></span></div>
                  </div>
                  <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">ID Proof Number</strong></div>
                     <div class="col-md-6"><span style="color: black;"><?php echo $data_id['id_number'];?></span></div>
                  </div>
                  <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                     <div class="col-md-6"> <?php if(empty($data_id['id_image'])){?> <img src="document_blank.png" width="120px;" height="100px;"/><?php } else {?><img src="<?php echo $data_id['id_image']; ?>" width="120px;" height="100px;"/><?php } ?><br><span style="color: black;text-align: center;">Front Side Image</span></div>
                      <div class="col-md-6"> <?php if(empty($data_id['id_image1'])){?> <img src="document_blank.png" width="120px;" height="100px;"/><?php } else {?><img src="<?php echo $data_id['id_image1']; ?>" width="120px;" height="100px;"/><?php } ?><br><span style="color: black; text-align: center;">Back Side Image</span></div>
                  </div>
            
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Self Approved</strong></div>
                     <div class="col-md-6"> <input type="checkbox" name="yes" <?php if($data_id['id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled" style="color: black;"></div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Admin Approval</strong></div>
                     <div class="col-md-6"><span style="color: black;"> <?php if($data_id['status']=='1'){ echo "<span>Approoved</span>";} else if($data_id['status']=='0') { echo "<span>Pending</span>"; } ?></span></div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Action</strong></div>
                     <div class="col-md-6"><strong style="color: black;"> 
                      <?php
                          if($data_id['status']=='0')
                        {
                          ?>
                        <a href="update_kyc.php?idproof=<?=$data_id['id']?>" class="btn btn-primary" style=" border-radius: 0px;">Update</a>
                    <?
                        }
                    ?></strong>
                     <span style="color:blue;"><b>Uploaded </b></span>
                  </div>
                  </div>
                  <!--display data code-->       
                  <?php  }   
                ?>  
                                          <!--form code end here-->

                                                      
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1"></div>
                                            <div class="col-lg-5 col-md-5" style="box-shadow: grey 0px 2px 4px 3px;">
                                              <div class="card">
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                     
                                                      <div class="media-body padr text-white text-right">
                                                   <!--form code-->
                 <?php 
                

                $data_add = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$uid'"));
                $data_addid = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from address_proof_list where user_id='$uid'")); 
                if($data_addid=='0' || $data_add['status']=='2')
                {
                ?>
                  <form name="bankinfo" method="post" enctype="multipart/form-data">
                     <div class="row">
                      <div class="col-md-5"><strong style="color: black;">ID Proof</strong></div>
                     <div class="col-md-7">
                       <select name="id_proof" style="width: 210px; padding: 7px; color: black;" required>
                                          
                          <option value="Passport" <?php if($data_add['id_proof']=='Passport') { ?> selected <?php } ?> >Passport</option>
                          <option value="Driving License" <?php if($data_add['id_proof']=='Driving License') { ?> selected <?php } ?> >Driving License</option>
                                   
                      </select>
                     </div>
                  </div>
                  
                  <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                     <div class="col-md-6"> <input type="file" id="address_proof_image" name="address_proof_image" required=""><br><span style="color: black;text-align: center;">Front Side Image</span></div>
                      <div class="col-md-6"><input type="file" id="address_proof_image2" name="address_proof_image2" required=""><br><span style="color: black; text-align: center;">Back Side Image</span></div>
                  </div>
            
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Self Approved</strong></div>
                     <div class="col-md-6">
                      <input type="checkbox" name="yes" <?php if($data_add['id_checkbox']=='0') { ?> checked <?php } ?> value="0" style="color: black;">
                     </div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-5"><strong style="color: black;">Admin Approval</strong></div>
                  <div class="col-md-7">
                      <span style="color: black;">
                      <?php if($data_add['status']=='0'){ echo "<span>Pending</span>";} else if($data_add['status']=='1') { echo "<span>Approved</span>"; }else if($data_add['status']=='2') { ?><span>Cancelled By Admin[ <?php echo $data_add['admin_remark']; ?> ]</span><?php } ?>    
                     </span>
                   </div>
                     <input type="hidden" name="hidden_add_id" value="<?php echo $data_add['id']; ?>">
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Action</strong></div>
                     <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" name="address" value="Submit">
                     </div>
                  </div>
                </form>

                <?php 
                }  else{
                 ?>                                     
                  <div class="row">
                    <div class="col-md-6"><strong style="color: black;">ID Proof</strong></div>
                     <div class="col-md-6"><span style="color: black;"><?php echo $data2['address_proof'];?></span>
                     </div>
                  </div>
                 
                  <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                     <div class="col-md-6"> <?php if(empty($data2['address_proof_image'])){?> <img src="document_blank.png" width="120px;" height="100px;"/><?php } else {?><img document_blank.png src="<?php echo $data2['address_proof_image2']; ?>" width="120px;" height="100px;"/><?php } ?><br><span style="color: black;text-align: center;">Front Side Image</span></div>
                      <div class="col-md-6"> <?php if(empty($data['id_image1'])){?> <img src="document_blank.png" width="120px;" height="100px;"/><?php } else {?><img document_blank.png src="<?php echo $data['id_image1']; ?>" width="120px;" height="100px;"/><?php } ?><br><span style="color: black; text-align: center;">Back Side Image</span></div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Self Approved</strong></div>
                     <div class="col-md-6"> <label><input type="checkbox" name="yes" <?php if($data2['  id_checkbox']=='0') { ?> checked <?php } ?> value="0" disabled="disabled"></label></div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Admin Approval</strong></div>
                     <div class="col-md-6"><span style="color: black;"><?php if($data2['status']=='1'){ echo "<b>Approoved</b>";} else if($data2['status']=='0') { echo "<span>Pending</span>"; } ?></span></div>
                  </div>
                 <div class="row" style="margin-top: 10px; border-top: 1px solid gray; padding-top: 10px;">
                       <div class="col-md-6"><strong style="color: black;">Action</strong></div>
                     <div class="col-md-6"><strong style="color: black;"> 
                      <?php
                          if($data2['status']=='0')
                        {
                          ?>
                        <a href="update_kyc.php?address=<?=$data2['id']?>" class="btn btn-primary" style=" border-radius: 0px;">Update</a>
                    <?
                        }
                    ?></strong></div>
                  </div>
                 <?php } ?> 
                  <div class="row" style="margin-top: 10px; padding-top: 10px;padding-bottom: 20px;">
                       
                  </div>

                                                      <!--form code end here-->
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>





          </div>
 <!--<div class="col-md-6">    <div class="widget price-table">    <div class="plan-info">
 <img src="Bitcoin-ATM.jpeg" style="height: 465px;
    width: 500px;">
    </div> 
  </div> 
    </div>  -->
    
      </div> 
 

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row --><?php //} ?>

        </div> <!-- / container-fluid -->



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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  <script>
    $(function() {
      $('#package').change(function(){
        var pack_id = $(this).val();
        if(pack_id){
          var pack_roi = $(this).find(':selected').data('reward');
          var pack_amt = $(this).find(':selected').data('amount');
          $("#pack_amt").html(pack_amt);
          $("#pack_roi").html(pack_roi+'%');
          $("#package_amount").val(pack_amt);
          $('#premiumpackage2').show();
        }else{
          $('#premiumpackage2').hide();
        }
      });

    });
  </script>
  <script type="text/javascript">
      
    function check_form(){

      
        $("#payment_method_error").hide();
          var payment_method = $("input[name=payment_method]:checked").val();
          console.log(payment_method);
          if(payment_method == "ewallet" || payment_method == "rwallet" || payment_method == "wwallet" || payment_method == "coinpayment"){
            $("#payment_method_error").hide();
            return true;
          }else{            
            alert("Please select payment method");
            $("#payment_method_error").show();
            return false;
          }

          return false;
      }
    </script>

    <script>
   $("#pay1").click(function(){
  $("#packages1").show();
  $("#section").hide();
  
});

      $("#pay2").click(function(){
  $("#packages2").show();
  $("#section").hide();
  
});
  </script>
</body>
</html>