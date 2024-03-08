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
                                             <strong style="color: black;">Buy The Chips</strong>
                                           </div>

                                           <div class="col-md-5 col-sm-5">
                                            <?php if($f['user_rank_name']=='Free Member'){ ?>
                                            <div class="col-md-9">
                                            <h2 style="color:#1f1f1f;font-size: 16px;font-weight: bold;">Account Status : Inactive Member </h2>
                                            </div>
                                            <div class="col-md-3" style="float: left;"><button type="button" class="btn btn-primary" data-toggle="modal" id="btn" data-target="#myModal">Subscribe</button>
                                            </div>
                                            <?php }else{
                                            ?>
                                            <div class="col-md-9" style="padding-bottom: 22px; float: right;">
                                                <h2 style="color:#1f1f1f;font-size: 16px;font-weight: bold;">Account Status : Paid Member </h2>
                                            </div> 
                                        
                                            <?php } ?>

                                         </div>

                                        </div>
                                      <!--code for box close-->



<!-- Make Investment -->
          <!-- <div class="col-md-4">
<span style="float:right;"><a href="package-upgrade-downline.php" class="btn btn-block rdbtn">Downline Investment</a></span>
           
</div -->


           <!---pop up modal code-->
           <?php
              //code for subscription
            if(isset($_POST['submitPin'])){
              //echo '<script>alert("ok")</script>';
              $pins = $_POST['pin'];

              $checpin = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"],"select * from pins where (pin_no='$pins' and status='0' and receiver_id='$userid')"));

              if($checpin>0){

                $pinset = mysqli_query($GLOBALS["___mysqli_ston"],"update pins set status='1',used_by='$userid' where (receiver_id='$userid' and pin_no='$pins')");
                $useractive = mysqli_query($GLOBALS["___mysqli_ston"],"update user_registration set designation='Paid Member',user_rank_name='Paid Member' where user_id='$userid'");
                if($useractive){
                header("Location: package-upgrade.php");
              }
                
              }else{
                $Message = 'Invalid PIN';
                //header("Location: index.php?Message=".$Message);
              }
             } 
          ?>

                                      <!-- Modal -->
                                      <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                        
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" style="color:black;font-size: 24px;">&times;</button>
                                              <h4 class="modal-title" style="text-align: center;font-family: monospace; color: black;">PACKAGE SUBSCRIPTION &nbsp;&nbsp;<strong style="color: red;"><?php  if(isset($Message)){echo ($Message);}?></strong></h4>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                
                                            </div>
                                            <form action="" method="post" autocomplete='off' >
                                                <div class="form-group">
                                                  <input type="text" name="pin" placeholder="Enter pin number" class="form-control" id="pin" required="required">
                                                  <span id="check"></span>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-4">
                                                         <input type="submit" name="submitPin" value="SUBMIT"  class="btn btn-primary btn-block" style="border-radius: 0px;">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                 
                                            </form>

                                            </div>
                                           
                                          </div>
                                          
                                        </div>
                                      </div>
                                <!--pop modal code end-->
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%; text-align: center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>

        <?php /*$alredy=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' and status='Active' order by id desc limit 1");
          $yesno=mysqli_num_rows($alredy); 
          $der=mysqli_fetch_array($alredy);
          $packid=$der['package'];

          $todaydate=(date("Y-m-d"));
          if(1==2)
        {
          echo "<h3 style='color:green;width:100%;float:left;'>"."Not allowed you have already purchased the package"."</h3>";
    
        }
        else
        {*/
?>

       
          <div class="row" style="margin-top: 20px;">

            <div class="clearfix"></div>

            <div class="col-md-8 center-block" style="float:none;">



           <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                              <div class="card gradient-orange-amber">
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                      <div class="align-center">
                                                        <i class="icon-wallet text-white font-large-2 float-left"></i>
                                                      </div>
                                                      <div class="media-body padr text-white text-right">
                                                        <h3 class="text-white"></h3>
                                                        <span>Sharia Investment</span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                              <div class="card gradient-light-blue-cyan">
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                      <div class="align-center">
                                                        <i class="icon-wallet text-white font-large-2 float-left"></i>
                                                      </div>
                                                      <div class="media-body padr text-white text-right">
                                                        <h3 class="text-white"></h3>
                                                        <span>Open Investment</span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
           <!--package upgrade code-->


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
</body>
</html>