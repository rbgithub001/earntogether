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

  <body class="">
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">

            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">


            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">All Bonus Report</h4>
                </header>
</br>
     <tr>
    <td width="3%" align="right">&nbsp;</td>
    <td width="94%" align="right"><img src="../cmsadmin/images/document-print.png" width="32" height="32" onClick="coderHakan()" /></td>
    <td width="3%" align="right">&nbsp;</td>
    </tr>
    <div class="total_invoice"  id="printArea">

                <div class="panel-body">

                   <table class="table table-bordered dataTable hover" id="datatable" aria-describedby="datatable_info"> 
               <tr>
                      <td><h5><strong>Commission Type</strong></h5></td>
                      <td style="font-size:14px"><h5><strong>Bonus</strong></h5></td>
                    </tr>           
                
                    <tr>
                      <td><h5><strong>Referral Bonus</strong></h5></td>
                      <?php

                      
                               
                      $sql12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as totamt from credit_debit where user_id='$userid' and ttype='Referral Bonus' "));

                      if($sql12['totamt']!='')
                        {
                          $tot = $sql12['totamt'];
                        }
                        else
                        {
                          $tot = 0;
                        }

                     
           ?>
                              
                        <td style="font-size:14px">$<?php 

                         $a1=$tot;
                         echo number_format($a1,2);


                         ?></td>

                         
                    </tr>            
                            
                    <tr>
                        <td><h5><strong>Team Bonus</strong></h5></td>
                              
                        <?php

                     


                     
            $sql124=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as totamt4 from credit_debit where user_id='$userid' and ttype='Team Bonus' "));

            if($sql124['totamt4']!='')
              {
                $tot1 = $sql124['totamt4'];
              }
              else
              {
                $tot1 = 0;
              }
             
           ?>
                              
                        <td style="font-size:14px">$<?php 
                         $a2= $tot1;

                         echo number_format($a2,2);



                         ?></td>


                    </tr>


                    <tr>
                        <td><h5><strong>Generation Bonus</strong></h5></td>
                          <?php

                           
                     
 $bonus=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as lead1 from credit_debit where user_id='$userid' and ttype='Generation Bonus' "));

            if($bonus['lead1']!='')
              {
                $tot12 = $bonus['lead1'];
              }
              else
              {
                $tot12 = 0;
              }
            
           ?>
                              
                        <td style="font-size:14px">$<?php 
                        $a3=$tot12;

                      echo number_format($a3,2);


                        ?></td>      
                        
                    </tr>

                   <!--  <tr>
                        <td><h5><strong>Direct Bonus</strong></h5></td>
                       
              <?php

                
                     
            $bonus12=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot12 from credit_debit where user_id='$userid' and ttype='Direct Profit Sharing Income' "));

            if($bonus12['leadtot12']!='')
              {
                $tote12 = $bonus12['leadtot12'];
              }
              else
              {
                $tote12 = 0;
              }
            
           ?>
                              
                        <td style="font-size:14px">$<?php echo $a4=$tote12;?></td> 
                    </tr> -->

                     <tr>
                        <td><h5><strong>Rank Bonus</strong></h5></td>
                       
              <?php

                
                     
            $bonus123=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select sum(credit_amt) as leadtot12 from credit_debit where user_id='$userid' and (ttype='Rank Bonus' OR ttype='Additional Rank Bonus') "));

            if($bonus123['leadtot12']!='')
              {
                $tote123 = $bonus123['leadtot12'];
              }
              else
              {
                $tote123 = 0;
              }
            
           ?>
                              
                        <td style="font-size:14px">$<?php 
                              $a5=$tote123;
                           echo number_format($a5,2);



                        ?></td> 
                    </tr>

                    

                    <tr>
                        <td><h3><strong>Total  Bonus</strong></h3></td>
                              
                        <td><h3 style="color:#ff0000;"><strong>$<?php echo $a6=$a1+$a2+$a3+$a5 ;?></strong></h3></td>
                    </tr>

                    
                                                
                                        
            </table>


                </div></div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->


         <!--  <div class="col-md-12 text-center">

 <a href="bh_export_matching_income.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div> -->


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
  </body>
</html>