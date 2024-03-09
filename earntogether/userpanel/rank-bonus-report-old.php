<?php include("header.php");
$left_investment=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pair) as left_invest FROM `manage_bv_history` WHERE income_id='$userid' "));
$left_investments = $left_investment['left_invest'];

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
                <h4 class="m-t-none text-primary-lt font-thin-bold inline m-b font-semi-bold">ROYALTY INCOME OR TURNOVER BONUS.</h4><br />
				
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                   
                        <th>RANK NAME</th>
                        <th>FINANCIAL TURNOVER </th>
                        <!--<th>Commission(%)</th>-->
                        <th>RANK ACHIEVEMENT BONUS</th>
                      
                        <th>Status</th>

                        
                      </tr>
                    </thead>
                    <tbody>
                 
                       <tr>
                        <th scope="row">1</th>
                        <td>Silver consultant</td>
                        <td>0 USD</td>
                          <!--<td>1 %</td>-->
                      
                          <td>0 USD</td>
                         <td><?php 
              
                          if($left_investments>=0) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                      
                      
                      <tr>
                        <th scope="row">2</th>
                        <td>Golden consultant </td>
                        <td>10000 USD </td>
                          <!--<td>1 %</td>-->
                      
                          <td>500 USD </td>
                         <td><?php 
              
                          if($left_investments>=10000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                      
                      
                       <tr>
                        <th scope="row">3</th>
                        <td>Diamond consultant</td>
                        <td>30000 USD </td>
                          <!--<td>1 %</td>-->
                      
                          <td>1000 USD </td>
                         <td><?php 
              
                          if($left_investments>=30000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                      
                      
                      <tr>
                        <th scope="row">4</th>
                        <td>Silver Manager</td>
                        <td>50000 USD </td>
                          <!--<td>1 %</td>-->
                      
                          <td>2000 USD </td>
                         <td><?php 
              
                          if($left_investments>=50000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                      
                      <tr>
                        <th scope="row">5</th>
                        <td>Golden Manager</td>
                        <td>80000 USD </td>
                          <!--<td>1 %</td>-->
                      
                          <td>3000 USD </td>
                         <td><?php 
              
                          if($left_investments>=80000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>  
                      
                      
                      <tr>
                        <th scope="row">6</th>
                        <td>Diamond Manager</td>
                        <td>140000 USD </td>
                          <!--<td>1 %</td>-->
                      
                          <td>5000 USD </td>
                         <td><?php 
              
                          if($left_investments>=140000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>  
                      <tr>
                        <th scope="row">7</th>
                        <td>Silver Partner</td>
                        <td>200000 USD </td>
                          <!--<td>1 %</td>-->
                      
                          <td>Yamaha MT 03 Sports bike</td>
                         <td><?php 
              
                          if($left_investments>=200000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Golden Partner</td>
                        <td>300000 USD </td>
                          <!--<td>2 %</td>-->
                      
                          <td>Benelli 402 S Sports Bike</td>
                        <td><?php 
              
                          if($left_investments>=300000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>

                     <tr>
                        <th scope="row">9</th>
                        <td>Diamond Partner </td>
                        <td>500000 USD</td>
                          <!--<td>3 %</td>-->
                      
                          <td>Kawasaki Ninja 400 Sports Bike</td>
                        <td><?php 
              
                          if($left_investments>=500000  ) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                     <tr>
                        <th scope="row">10</th>
                        <td>Country Representative</td>
                        <td>700000 USD </td>
                          <!--<td>5 %</td>-->
                      
                          <td>Europe Tour, Office Setup, Meeting with owners
and official launch event in respective country</td>
                        <td><?php 
              
                          if($left_investments>=700000  ) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                       <tr>
                        <th scope="row">11</th>
                        <td>Continent Representative</td>
                        <td>850000 USD</td>
                          <!--<td>6 %</td>-->
                      
                          <td>5 pax 10 days trips to UAE and Gala Event
invitation
</td>
                        <td><?php 
              
                          if($left_investments>=850000) {
                         ?> 
                                  
                               <img src="qualified.png" width="35px;"><?php

                              }
                              
                               
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
                      
                       <tr>
                        <th scope="row">12</th>
                        <td>Global Representative</td>
                        <td>1000000 USD</td>
                          <!--<td>6 %</td>-->
                      
                          <td>10% share in company profits, Board of Director to
  the company, and a Brand new Porsche Carera.
</td>

                        <td><?php 
                          if($left_investments>=1000000) {
                         ?> 
                            <img src="qualified.png" width="35px;"><?php
                              }
                              else 
                              { ?> 
                                <img src="notqwalify.png" width="35px;"> 
                              <?php } ?></td>
                      </tr>
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