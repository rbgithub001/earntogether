<?php include("header.php");


 $user = mysqli_query($GLOBALS["___mysqli_ston"], "select COUNT(user_registration.id) as total ,country.iso as country_name from user_registration  INNER JOIN country where user_registration.country=country.name GROUP BY country.iso");

 $data_item1 = array();

while($row = mysqli_fetch_array($user)) {
    $data_item[$row['country_name']] = $row['total'];
    array_push($data_item1,$data_item);
}

$gdp_count = json_encode($data_item1[count($data_item1)-1]);


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
<!-- <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link rel="stylesheet" media="all" href="https://jvectormap.com/css/lessframework.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/skin.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-jvectormap-2.0.5.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/syntax.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jsdoc.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-ui.min.css"/>
  
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20607161-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
  </head>

  <body class="">
    <div class="animsition">  
    
   
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


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                 <div class="content-page">
                <!-- Start content -->
                <div class="content">

        <div class="container-fluid">
          <div class="row">
       
            

         
           <div class="col-md-12">
                             <!--   <div class="mh-div"></div>-->
                           <div id="world-map-gdp" style=" height: 300px;margin: auto;"></div>
                        </div>  
             

         

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->

            <!-- content -->

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
   <script src="https://jvectormap.com/js/css3-mediaqueries.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="https://jvectormap.com/js/tabs.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-world-mill.js"></script>
  <script src="https://jvectormap.com/js/gdp-data.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>


 <script src="https://jvectormap.com/js/css3-mediaqueries.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="https://jvectormap.com/js/tabs.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-world-mill.js"></script>
  <script src="https://jvectormap.com/js/gdp-data.js"></script>

 <script>
 
/*               var gdpData = {
                      "AF": 16.63,
                      "AL": 11.58,
                      "DZ": 158.97,
                      "IN":  200,
                      
                     
                    
                      
                    };*/
                    var gdpData = <?php echo $gdp_count; ?>;
 
                
 
              $(function(){
                $('#world-map-gdp').vectorMap({
                  map: 'world_mill',
                  series: {
                    regions: [{
                      values: gdpData,
                      scale: ['#C8EEFF', '#0071A4'],
                      normalizeFunction: 'polynomial'
                      
                    }]
                  },
                  onRegionTipShow: function(e, el, code){
                    el.html(el.html()+' (Total Member - '+gdpData[code]+')');
                  }
                });
              });
    </script>
  </body>
</html>