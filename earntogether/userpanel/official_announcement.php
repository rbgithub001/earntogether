<?php include("header.php");?><!DOCTYPE html>
<html lang="en">
  <head>
       <?php include("title.php");?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/style.css" rel="stylesheet" type="text/css">


     <link href='css/material-design-iconic-font.min.css' rel='stylesheet' type='text/css'/>

     <link href='css/_misc2.css' rel='stylesheet' type='text/css'/>
      <link href="css/mixins.css" rel="stylesheet" />
    
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <!-- Style CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

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
        <div id="print">
        <!--<section id="example2">
          <div class="row">
          <div class="col-md-8">
            <strong style="color: black;">Official Announcement</strong>
          
          </div>

          <div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Announcement</a></li>
              <li><a href="#">Official Announcement</a></li>
              
            </ol>

          </div>
          </div>
        </section>--> <!-- / PAGE TITLE -->
<br />
        <div class="container-fluid">
          <div class="row">
       
           

            <div class="col-md-12 margin-bottom-30">
              <section class="panel panel-primary">
               
   <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold" ><b>OFFICIAL ANNOUNCEMENTS</b></h4>
               
                <div class="panel-body">

                  <div class="form-group">
                  
  
                <div class="table-responsive">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                       
                       
                        <th>Posted Date</th>
                         <th>Detail</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                     $sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from promo where status=1");
                     $i=1;
                      while($data1=mysqli_fetch_array($sql))
                      { ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $data1['news_name'];?></td>
                       
                       
                        <td><?php echo $data1['posted_date'];?></td>
                         <td> <a href="announcemnet-detail.php?id=<?php echo $data1['n_id'];?>" class="btn btn-primary" > View </a></td>
                      </tr>
                      <?php $i++;} ?>
                     
                    </tbody>
                  </table>

                </div>

                     
                  </div> <!-- / form-group -->

                </div> <!-- / panel-body -->

              </section> <!-- / panel -->

            </div> <!-- / col-md-9 -->

          </div> <!-- / row -->

        </div> <!-- / container-fluid -->

        </div>


        <script>function coderHakan(){var sayfa = window.open('','','width=800,height=800');sayfa.document.open("text/html");sayfa.document.write(document.getElementById('print').innerHTML);sayfa.document.close();sayfa.print();
}
</script>

       




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

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  </body>
</html>