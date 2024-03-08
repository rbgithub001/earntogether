<?php
include("../lib/config.php");
// manage secure login of user account
if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999); 


  // $user = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select COUNT(user_registration.id) as total ,country.iso as country_name from user_registration  INNER JOIN country where user_registration.country=country.name GROUP BY country.iso"));
//print_r($user); die();
    /*foreach($user as $arr){
    print_r ($arr); die();
}*/

//while($arr = mysqli_fetch_array($user)){
/*foreach($user as $array){
    echo $array['total'];  die();
}*/

//$query = mysql_query("SELECT * FROM product");
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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include("header.php");?>
    <!--easy pie chart-->
    <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

  
    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="css/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/style.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/lessframework.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/skin.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-jvectormap-2.0.5.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/syntax.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jsdoc.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-ui.min.css"/>
  
  <style>
      body{
    background: #231a31;
      }
  </style>
</head>
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
<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
       <?php include("sidebar.php");?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
           <?php include("top-menu.php");?>
            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
               <?php include("top-menu1.php");?>
            <!-- page head end-->
      
            <!--body wrapper start-->
            <div class="wrapper">
                <!--state overview start-->
                <div class="row state-overview">
                 <div class="container-fluid">
                       <div class="row">
                             <!--   <div class="mh-div"></div>-->
                           <div id="world-map-gdp" style="width: 720px; height: 400px;margin: auto;margin-top: 20px;"></div>
                        </div>  
                 </div>
                </div>
            </div>
            <!--body wrapper end-->


            <!--footer section start-->
          <?php include("footer.php");?>
            <!--footer section end-->


       
        </div>
        <!-- body content end-->
    </section>
    







<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->


<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery.min.js"></script>
<script src="js/switchery-init.js"></script>

<!--flot chart -->
<script src="js/jquery.flot.js"></script>
<script src="js/flot-spline.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.tooltip.min.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.selection.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>


<!--common scripts for all pages-->

<script src="js/scripts.js"></script>


<?php 
 
?>




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