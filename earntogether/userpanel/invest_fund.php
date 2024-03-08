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
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </head>

  <body class="">
    <div class="animsition">  
    
     <?php include("sidebar.php");?>
     
      <main id="playground">

          <?php include("top.php");?>

        <section id="page-title" class="row">

          <div class="col-md-8">
           

          </div>

          <div class="col-md-4">

           
          </div>
        </section> <!-- / PAGE TITLE -->




        <div class="container-fluid">

  <h4>  <?php if(@$_GET['msg']!='') { ?><br/><br/> <div style="color:green;width:100%;float:center;"><strong><?php echo $_GET['msg'];?></strong><br/><br/></div> <?php } ?> <?php if(@$_GET['msg1']!='') { ?><br/><br/> <div style="color:red;width:100%;float:center;"><strong><?php echo $_GET['msg1'];?></strong><br/><br/></div> <?php } ?></h4> 

      <?php
     // echo $userid;
        $walletamountdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select amount from final_e_wallet where user_id='$userid'"));
       // print_r($walletamountdata); 
        //echo '<h4>Wallet Balance: '.$walletamountdata['amount'].'</h4>';
        echo '<h4>Plan Subscription</h4>';
    ?>

		<div class="row">
    
<?php $alredy=mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='$userid' order by id desc limit 1");

    $yesno=mysqli_num_rows($alredy); 
    $der=mysqli_fetch_array($alredy);
    if ($der['package']=='') {
        $packid=0;
    }else{
        $packid=$der['package'];  
    }
    
    
    if($packid==3)
    { ?>
       <center> <strong style="color:blue;">You had already updated to higher Package!"</strong></center>
    
<?php     }


    $Adate= $der['date'];

    $todaydate=(date("Y-m-d"));
   
?>
       <?php 
             $i=1;
               // $fetch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id< 5");
             $fetch=mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id>'$packid'");
             while($data=mysqli_fetch_array($fetch))
              {
              ?>

			<div class="col-md-4 col-sm-6">
				<div class="bpackage">
				    <form name="input<?php echo $i;?>" method="post" method="post" action="making-deposit.php" id='form_id<?=$i;?>'> 
    					<!--<p><img src="images/<?php echo $data['description'];?>" class="img-responsive" alt="" /></p>-->
    					<!--<p class="text-center"><img src="images/pp1.png" alt="" /></p>-->
						<h3><?php echo $data['name'];?></h3>
    					<h1><?php echo CURRENCY.' '. $data['amount'];?></h1>
    					<input type="hidden" name="package" value="<?php echo $data['id'];?>">
    				    <ul>
    					    <li><i class="fa fa-check" aria-hidden="true"></i> Validity (Days): <?php echo $data['roi_duration'];?></li>
    					    <li><i class="fa fa-check" aria-hidden="true"></i> Target Duration  : 1 Month</li>
    					    <li><i class="fa fa-check" aria-hidden="true"></i> Target Sale  :  <?php echo Currency.' '. $data['amount'];?></li>
    					    <li><i class="fa fa-check" aria-hidden="true"></i> Max Earning : <?php echo $data['capping'];?></li>
    					</ul> 
    					
                        <input type="hidden" name="pay_mode" value="e_wallet">
                        
                        <div class="plan-info" id='vouch'></div>
                        
    					<div class="buy"><input id="sub2" type="submit" name="submit" value="Subscribe" class="btn btn-warning" style="margin-bottom: 3px; background-color:#ffd401;padding:0px 12px;" /></div>
					</form>
				</div>
			</div>

	<?php $i++;} ?>
	        

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
 <script>
    /*$(document).ready(function () {

        $("#form_id1").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            $("#sub11").attr("disabled", true);

            //disable a normal button
            //$("#btnTest").attr("disabled", true);

            return true;

        });
    });*/
</script>
<script>
    /*$(document).ready(function () {

        $("#form_id2").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            $("#sub2").attr("disabled", true);

            //disable a normal button
            //$("#btnTest").attr("disabled", true);

            return true;

        });
    });*/
</script>

  </body>
</html>