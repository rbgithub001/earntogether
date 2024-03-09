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

        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%; text-align: center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>



       
          <div class="row" style="margin-top: 20px;">

            <div class="clearfix"></div>

            <div class="col-md-8 center-block" style="float:none;">



              <?php if($f['user_rank_name']=='Paid Member'){ ?>




  <div class="row" id="section">
                                            <div class="col-lg-6 col-md-6">
                                              <div class="card gradient-orange-amber">
                                                <div class="card-body">
                                                  <div class="px-3 py-3">
                                                    <div class="media">
                                                      
                                                      <div class="media-body padr text-white text-right">
                                                     
                                                       <center>   <button style="background-color: #5b4a3e;" id="pay1">Sharia Investment</button></center>
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
                                                     
                                                      <div class="media-body padr text-white text-right">
                                                    <center>   <button style="background-color: #5b4a3e;" id="pay2">Open Investment</button></center>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>






<!--  For Shariya Inves -->






              <!--package upgrade code-->
              <div class="package-upgradei" id="packages1" style="display: none;">

                <form method="post" method="post" action="lifejacket_buy_code.php" onsubmit="return check_form()">

                <div class="row">
                  <div class="col-sm-12 mar-bot-20">
                    <center><strong style="color: black;">ENTER AMOUNT FOR CHIPS [ Sharia Investment ]</strong></center>
                  </div>

                  <div class="col-sm-6 mar-bot-20">
                    <div class="form-group">
                      <label><b>Enter Amount</b></label>
                     
                  <input type="text" name="amount"  class="form-control" placeholder="Enter Amount"/>  
               <input type="hidden" name="invest_type"  class="form-control" value="Sharia Investment" /> 
                  
                    <p class="pull-left"><b></b></p>
                  
                    </div>
                  </div>
                  <div class="col-sm-6 mar-bot-20">
                    <div class="form-group">
                      <label><b>User ID</b></label>
                      <input type="text" class="form-control" placeholder="Enter Username" readonly="readonly" value="<?php echo $f['user_id']; ?>" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 mar-bot-20">
                    <div class="form-group">
                      <label><b>Pay With</b></label>
                      <div class="clearfix"></div>
                      <div class="row" style="margin:0 -10px 15px -10px;">
                        <div class="col-sm-6">
                          <input type="radio" name="payment_method" class="form-control payment_method" value="ewallet"> Activation Wallet Balance <i class="pull-right"><img src="images/wallet.png" style="width: 22px;margin-top: 3px;" alt="" /></i>
                          <?php
                            $activation_wallet = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT amount FROM `final_e_wallet` WHERE user_id = '$userid'"));
                            echo "(USD ".number_format($activation_wallet['amount'],2).")";
                          ?>
                        </div>
                        <!--<div class="col-sm-6">
                          <input type="radio" name="payment_method" class="form-control payment_method" value="coinpayment"> Bitcoin Payment
                           <i class="pull-right"><img src="images/coin.png" style="width: 22px;margin-top: 3px;" alt="" /></i>
                        </div>-->
                      </div>
                      <div class="clearfix"></div>
                      
                    </div>
                  </div>
                  <div style="display: none;" id="payment_method_error" class="text-danger">
                    Please select a payment method.
                  </div>
                </div>

                <input type="submit" class="btn btn-primary btn-block" value="Submit" />

              </form>

              </div>






<!--  For Open Inves -->

     <div class="package-upgradei" id="packages2" style="display: none;">

                <form method="post" method="post" action="lifejacket_buy_code.php" onsubmit="return check_form()">

                <div class="row">
                  <div class="col-sm-12 mar-bot-20">
                    <center><strong style="color: black;">ENTER AMOUNT FOR CHIPS [ Open Investment ]</strong></center>
                  </div>

                  <div class="col-sm-6 mar-bot-20">
                    <div class="form-group">
                      <label><b>Enter Amount</b></label>
                     
                  <input type="text" name="amount"  class="form-control" placeholder="Enter Amount"/>  
                   <input type="hidden" name="invest_type"  class="form-control" value="Open Investment" />  
               
                  
                    <p class="pull-left"><b></b></p>
                  
                    </div>
                  </div>
                  <div class="col-sm-6 mar-bot-20">
                    <div class="form-group">
                      <label><b>User ID</b></label>
                      <input type="text" class="form-control" placeholder="Enter Username" readonly="readonly" value="<?php echo $f['user_id']; ?>" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 mar-bot-20">
                    <div class="form-group">
                      <label><b>Pay With</b></label>
                      <div class="clearfix"></div>
                      <div class="row" style="margin:0 -10px 15px -10px;">
                        <div class="col-sm-6">
                          <input type="radio" name="payment_method" class="form-control payment_method" value="ewallet"> Activation Wallet Balance <i class="pull-right"><img src="images/wallet.png" style="width: 22px;margin-top: 3px;" alt="" /></i>
                          <?php
                            $activation_wallet = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT amount FROM `final_e_wallet` WHERE user_id = '$userid'"));
                            echo "(USD ".number_format($activation_wallet['amount'],2).")";
                          ?>
                        </div>
                        <!--<div class="col-sm-6">
                          <input type="radio" name="payment_method" class="form-control payment_method" value="coinpayment"> Bitcoin Payment
                           <i class="pull-right"><img src="images/coin.png" style="width: 22px;margin-top: 3px;" alt="" /></i>
                        </div>-->
                      </div>
                      <div class="clearfix"></div>
                      
                    </div>
                  </div>
                  <div style="display: none;" id="payment_method_error" class="text-danger">
                    Please select a payment method.
                  </div>
                </div>

                <input type="submit" class="btn btn-primary btn-block" value="Submit" />

              </form>

              </div>














            <?php }else{?>


<center><h3 style="color: red;">Please Activate Your Account </h3></center>


        <?php    } ?>
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