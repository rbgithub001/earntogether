<?php include("header.php");


if($_POST[submits])
{
$frm=$_REQUEST['from'];
$til=$_REQUEST['to'];
$leg=$_REQUEST['leg'];
$leg=$_REQUEST['leg'];
$memtype=$_REQUEST['memtype'];
$f1 = date("Y-m-d", strtotime($frm));
$f2 = date("Y-m-d", strtotime($til));
if($frm!='' && $til!='')
{
  $query123=" and user_registration.registration_date between '$f1' and '$f2'";
  // $query12=" l_date between '$f1' and '$f2'";
}
if ($leg!='') {
 $query123.=" and user_registration.binary_pos= '$leg'"; 
}
if ($memtype!='') {
 $query123.=" and user_registration.user_rank_name= '$memtype'"; 
}
} 


?>
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
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="example2">
          <div class="row">
            <div class="col-md-8">
              <!--<h1>Referral Member</h1>-->
              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4">

              <ol class="breadcrumb pull-right no-margin-bottom">
                <!--<li><a href="#">Team Report</a></li>
                <li><a href="#">Direct Refferal Member</a></li>-->
               
              </ol>

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Personally Referred Members</h4>
                 <div class="row" style="margin:0 -10px;">

            <div class="">
                <form name="tree" method="post" action="">
                <div class="col-md-2">
                <input name="from" value="<?=$frm?>"  placeholder="Enter Start Date" id="bdate" type="text" class="form-control">
                </div>
                <div class="col-md-2">
                <input placeholder="Enter End Date" name="to" value="<?=$til?>" id="bdate1" type="text" class="form-control">
            </div>
                <!--<select  name="leg" > -->
                <!--<option value="left" <?php if($leg=='left'){ echo "selected"; }?>>Left</option>-->
                <!--<option value="right" <?php if($leg=='right'){ echo "selected"; } ?>>Right</option>-->
                <!--</select>-->
                <div class="col-md-2">
                <select  name="memtype" class="form-control"> 
                <option value="">Select Member</option>
                <option value="Free Member" <?php if($memtype=='Free Member'){ echo "selected"; }?>>Free</option>
                <option value="Paid Member" <?php if($memtype=='Paid Member'){ echo "selected"; } ?>>Paid</option>
                </select></div>
                <!--<div class="col-md-2">-->
                <!--<select  name="leg" class="form-control"> -->
                <!--<option value="">Position</option>-->
                <!--<option value="left" <?php //if($leg=='left'){ echo "selected"; }?>>Left</option>-->
                <!--<option value="right" <?php //if($leg=='right'){ echo "selected"; } ?>>Right</option>-->
                <!--</select></div>-->
                <div class="col-md-4">
                <input type="submit" name="submits" value="Submit" class="btn btn-success"></div>           
                </form></div></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                          <th>User Id</th>
                           <!--<th>Username</th>-->
                          <th>Full Name</th>
                          <!--<th>Sponsor</th>-->
                          <th>Rank</th>
                          <th>Personal Sale</th>
                           <th>Group Sale</th>
                          
                          <!--<th>Level</th>-->
                       <!--     <th>Position</th> -->
                        <!--   <th>Investment Amount (SAR)</th>-->
                         <th>Register Date</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;
                      $groupsale=0;
                      $myper_sale=0;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid' $query123");
                      while($data1=mysqli_fetch_array($data))
                      {
                          // $datainves=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(amount) as amount from lifejacket_subscription where user_id='".$data1['user_id']."'"));
                           $str1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_rank_list where id='".$data1['rank']."'  "));
                          
                           $per_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as myper_sale from billing_detail where seller_id='".$data1['user_id']."' and status=1 "));
                           $myper_sale+=$per_sale['myper_sale'];
                           
                           
                            $datadown=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline  where income_id='".$data1['user_id']."' ");
                            while($datared=mysqli_fetch_array($datadown)){ 
                                
                              $ddid=  $datared['down_id'];
                              $downidper_sale=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(net_amount)as mydown_sale from billing_detail where seller_id='$ddid' and status=1 "));
                             
                              if(!empty($downidper_sale['mydown_sale']))
                              {
                                   $groupsale+=$downidper_sale['mydown_sale']; 
                                  
                              }
                             }
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['user_id'];?></td>
                        <!--<td><?php //echo $data1['username'];?></td>-->
                        <td><?php echo $data1['first_name']." ".$data1['last_name'];?></td>
                        
                         <td><?php echo $str1['name'] .' '. '('.$str1['level_per'].'%)'; ?></td>
                         <td> <?php if(!empty($per_sale['myper_sale'])){echo number_format($per_sale['myper_sale'],2); }else{ echo '0.00'; }?></td>
                        <td><?=$groupsale;?></td>
                         <!--<td>-->
                        <?php// if($data1['rank']== 1) { echo 'Beginner';} elseif($data1['rank']== 2){ echo 'Starter';}elseif($data1['rank']== 3){ echo 'Associate';}elseif($data1['rank']== 4){ echo 'Sr. Associate';}
                        //   elseif($data1['rank']== 5){ echo 'Adviser';} elseif($data1['rank']== 6){ echo 'Sr. Adviser';} elseif($data1['rank']== 7){ echo 'Director';} elseif($data1['rank']== 8){ echo 'Sr. Director';}
                        //   elseif($data1['rank']== 9){ echo 'Star Director';} elseif($data1['rank']== 10){ echo 'Sr. Star Director';} elseif($data1['rank']== 11){ echo 'SuperStar Director';} elseif($data1['rank']== 12){ echo 'Ambassador';}
                        //   ?>
                        <!--</td>-->
                          
                        <!-- <td><?php /*$packs=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from lifejacket_subscription where user_id='".$data1['user_id']."' order by id desc limit 0,1")); 

                         $vest=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from status_maintenance where id='".$packs['package']."'"));
                         if($vest['name']!='')
                         {
                         echo $vest['name'];
                       }
                       else
                       {
                         echo "Free Member";
                       }
*/
                          ?></td>-->
                      <!--    <td><?php if(isset($datainves['amount'])){ echo $datainves['amount']; } else{ echo 0.00; } ?></td>-->
                             <td><?php echo $data1['registration_date'];?></td>
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>
                  </div>
                  <h3> Total Personal Sale = <?= CURRENCY?> <?= number_format($myper_sale,2); ?></h3>
                  <!--<h3> Total Group Sale = </h3>-->
                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->


         <!--<div class="col-md-12 text-center">

 <a href="bh_export_direct_sponser_report.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div>-->



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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
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