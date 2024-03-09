<?php include("header.php");

if(isset($_REQUEST['Search']))
{
  $level=$_REQUEST['level'];

  if($level!='')
{
  $query2.="and level='$level' and pay_status='Unpaid'";   
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='css/material-design-iconic-font.min.css' rel='stylesheet' type='text/css'/>

     <link href='css/_misc2.css' rel='stylesheet' type='text/css'/>
     <link href="css/turbo.css" rel="stylesheet" />
      <link href="css/mixins.css" rel="stylesheet" />
    
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <!--<li><a href="#">Team Report</a></li>
              <li><a href="#">Total Downline Member Report</a></li>-->
             
            </ol>

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="col-lg-12 center-block" style="float:none;">
                    
                </div>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">View Ticket Response</h4>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        
                        <th>Ticket No.</th>
                        <th>Subject</th>
                        <th>Category</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Query</th>
                        <th>Response Date</th>
                        <th>Response</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1; $userid = $f['user_id'];
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tickets where user_id='$userid' ORDER BY id DESC");
                      while($data1=mysqli_fetch_array($data))
                      {
                        $str=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$data1[user_id]."'");
                        $xy=mysqli_fetch_array($str);
                        $name=$xy['first_name']." ".$xy['last_name'];
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                      
                        <td><?php echo $data1['id'];?></td>
                        
                        <td><?php echo $data1['subject'];?></td>
                        <td><?php echo $data1['tasktype'];?></td>
                         <td><?php echo $data1['t_date'];?></td>
                          <td align="center" class="ptext"><?php if($data1['status']==0){ echo "Pending";} else { echo "Responsed";}?></td>
                       <td><?php echo $data1['description'];?></td>
                        <td><?php echo $data1['c_t_date']; ?></td>

                        <td align="center" class="ptext"><?=$data1['response'];?></td>

                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>

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
  <script src="js/jquery.dataTables.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script src="js/sugarrush.tables.js"></script>
  </body>
</html>