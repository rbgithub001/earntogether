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
      background:#000;
      color:#fff;
      transition:all .3s;
      padding: 10px;
      font-size: 20px;
    }
    .rdbtn:hover{
      background:#b30000;
      color:#fff;
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
            <br /><h1>Make Downline Investment</h1><br />

          </div>

          <div class="col-md-4">

           
          </div
        </section> <!-- / PAGE TITLE -->




        <div class="container-fluid">

         <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;float:left;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?>

       


       
          <div class="row">

      <form name="input<?php echo $i;?>" method="post" method="post" action="lifejacket_buy_code_upgrade.php">

          <div style="margin-left:-15px;margin-right:-15px;">

            <div class="col-md-6">
             
              <div class="widget price-table">
                <section class="panel panel-primary">
                  <header class="panel-heading">
                    <h4 class="panel-title">Make Investment</h4>
                  </header>

                  
                </section>

                <?php

                 $sqlqw1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=1"));
                 $rowww11=$sqlqw1['sponsor_reward'];
                 $rowww12=$sqlqw1['name'];
                 $rowww13=$sqlqw1['amount'];
                 $rowww14=$sqlqw1['matching'];

                 $sqlqw2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=2"));
                 $rowww21=$sqlqw2['sponsor_reward'];
                 $rowww22=$sqlqw2['name'];
                 $rowww23=$sqlqw2['amount'];
                 $rowww24=$sqlqw2['matching'];

                 $sqlqw3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=3"));
                 $rowww31=$sqlqw3['sponsor_reward'];
                 $rowww32=$sqlqw3['name'];
                 $rowww33=$sqlqw3['amount'];
                 $rowww34=$sqlqw3['matching'];

                 $sqlqw4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id=4"));
                 $rowww41=$sqlqw4['sponsor_reward'];
                 $rowww42=$sqlqw4['name'];
                 $rowww43=$sqlqw4['amount'];
                 $rowww44=$sqlqw4['matching'];


                ?>

                 <div class="plan-info">
                   <table class="table table-bordered">
                    <tr><td> <input type="radio" name="package" value="1" required></td><td><?php echo $rowww12;?></td><td> Invest between $<?php echo $rowww13;?> and $<?php echo $rowww14;?></td><td><?php echo $rowww11;?> % Daily</td></tr>
                    <tr><td> <input type="radio" name="package" value="2" required></td><td> <?php echo $rowww22;?></td><td> Invest between $<?php echo $rowww23;?> and $<?php echo $rowww24;?></td><td><?php echo $rowww21;?> % Daily</td></tr>
                    <tr><td> <input type="radio" name="package" value="3" required></td><td> <?php echo $rowww32;?></td><td> Invest between $<?php echo $rowww33;?> and $<?php echo $rowww34;?></td><td><?php echo $rowww31;?> % Daily</td></tr>
                    <tr><td> <input type="radio" name="package" value="4" required></td><td> <?php echo $rowww42;?></td><td>Invest $<?php echo $rowww43;?>+</td><td><?php echo $rowww41;?> % Daily</td></tr>
                   </table>
               </div>


                <div class="plan-info">
                   <input type="text" class="form-control" required name="upgradeuser" placeholder="Enter Downline Username">
               </div>
              
               <div class="plan-info">
                   <input type="number" class="form-control" required name="amount" placeholder="Enter amount">
               </div>
             
                <div class="plan-info">
                  <select name="payment_method" id="payment_method" class="form-control" required="required" oninvalid="setCustomValidity('Please select a payment method.')" onchange="try{setCustomValidity('')}catch(e){}">
                    <option value="">--Select Payment Method--</option>
                    <option value="ewallet">Main Wallet Balance</option>
                    <option value="rwallet">ROI Wallet Balance</option>
                    <option value="wwallet">Working Wallet Balance</option>

                   
                  </select>
                </div>

               
             
           
                <div class="plan-info">
          
            
           
                
                <input type="submit" name="submit" value="Submit" class="btn btn-block rdbtn" />

               
              </div>
            </div>
          </div>
        </div>
      </form>

 <div class="col-md-6">    <div class="widget price-table">    <div class="plan-info">
 <img src="Bitcoin-ATM.jpeg" style="height: 530px;
    width: 500px;">
    </div> 
  </div> 
    </div>    </div> 
 

          </div></div>

           <!-- / col-md-3 -->

          </div> <!-- / row -->

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
  </body>
</html>