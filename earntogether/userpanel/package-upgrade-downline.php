<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



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
</style>
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

          <div class="col-md-8">
            <br /><h1>Downline Investment</h1><br />

          </div>

          <!-- <div class="col-md-4">
<span style="float:right;"><a href="package-upgrade-downline.php" class="btn btn-block rdbtn">Downline Investment</a></span>
           
          </div -->
        </section> <!-- / PAGE TITLE -->




        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;float:left;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>

        <?php $alredy=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' and status='Active' order by id desc limit 1");
$yesno=mysqli_num_rows($alredy); 
 $der=mysqli_fetch_array($alredy);
$packid=$der['package'];

$todaydate=(date("Y-m-d"));
   if(1==2)
   {
     echo "<h3 style='color:green;width:100%;float:left;'>"."Not allowed you have already purchased the package"."</h3>";
    
   }
   else
   {
?>


       
          <div class="row">

            <div class="clearfix"></div>

            <div class="col-md-8 center-block" style="float:none;">

              <div class="package-upgradei">

                <form name="input<?php echo $i;?>" method="post" method="post" action="lifejacket_buy_code_upgrade.php">
              <div class="widget price-table">
                <section class="panel panel-primary">
                  <header class="panel-heading">
                    <h4 class="panel-title" style="text-align: center;">Downline Investment</h4>
                  </header>

                  
                </section>

                

                 <div class="plan-info">
                   <table class="table table-bordered">

                    <?php

                      $package_qry = mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance");

                      while($package_data=mysqli_fetch_array($package_qry))
                      {
                          $sponsor_reward = $package_data['sponsor_reward'];
                          $name           = $package_data['name'];
                          $amount         = $package_data['amount'];
                          $matching       = $package_data['matching'];
                          $package_id     = $package_data['id'];

                          ?>

                          <tr>
                            <td> <input type="radio" name="package" value="<?php echo $package_id; ?>" required></td>
                            <td><?php echo $name;?></td>
                            <td>USD <?php echo $amount;?> </td> 
                             <td><?php echo $sponsor_reward;?> % Daily</td> 
                          </tr>

                          <?php

                      }

                    ?>

                    
                   </table>
               </div>

 <div class="plan-info"> 
                  <input type="text" name="amount" id="upgradeuser" class="form-control" required="required" placeholder="Please enter Amount" oninvalid="setCustomValidity('Please enter Amount.')" >
                 </div>
               
              <div class="plan-info"> 
                  <input type="text" name="upgradeuser" id="upgradeuser" class="form-control" required="required" placeholder="Please enter downline ID / Username" oninvalid="setCustomValidity('Please enter downline ID / Username.')" onchange="try{setCustomValidity('')}catch(e){}">
                 </div>
              
             
                 <div class="plan-info"> 
                  <select name="payment_method" id="payment_method" class="form-control" required="required" oninvalid="setCustomValidity('Please select a payment method.')" onchange="try{setCustomValidity('')}catch(e){}">
                    <option value="">--Select Payment Method--</option>
                    <option value="ewallet">Main Wallet Balance</option>
              

                   
                  </select>
                 </div>
                

               
             
           
              <div class="plan-info"> 
              <input type="submit" name="submit" value="Submit" class="btn btn-block rdbtn" />
             </div>
            </div>
         
        <!-- </div> -->
      </form>

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

          </div> <!-- / row --><?php } ?>

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