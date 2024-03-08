<?php include("header.php");



$left_jan   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-01-01')."' AND l_date<='".date('Y-01-31')."' AND leg ='left'"));
$left_feb   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-02-01')."' AND l_date<='".date('Y-02-31')."' AND leg ='left'"));
$left_march = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-03-01')."' AND l_date<='".date('Y-03-31')."' AND leg ='left'"));
$left_April = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-04-01')."' AND l_date<='".date('Y-04-31')."' AND leg ='left'"));
$left_may   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-05-01')."' AND l_date<='".date('Y-05-31')."' AND leg ='left'"));
$left_june  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-06-01')."' AND l_date<='".date('Y-06-31')."' AND leg ='left'"));
$left_july  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-07-01')."' AND l_date<='".date('Y-07-31')."' AND leg ='left'"));
$left_aug   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-08-01')."' AND l_date<='".date('Y-08-31')."'  AND leg ='left'"));
$left_sep   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-09-01')."' AND l_date<='".date('Y-09-31')."'  AND leg ='left'"));
$left_oct   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-10-01')."' AND l_date<='".date('Y-10-31')."'  AND leg ='left'"));
$left_nov   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-11-01')."' AND l_date<='".date('Y-11-31')."'  AND leg ='left'"));
$left_dec   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-12-01')."' AND l_date<='".date('Y-12-31')."'  AND leg ='left'"));


$right_jan   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-01-01')."' AND l_date<='".date('Y-01-31')."' AND leg ='right'"));
$right_feb   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-02-01')."' AND l_date<='".date('Y-02-31')."' AND leg ='right'"));
$right_march = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-03-01')."' AND l_date<='".date('Y-03-31')."' AND leg ='right'"));
$right_April = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-04-01')."' AND l_date<='".date('Y-04-31')."' AND leg ='right'"));
$right_may   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-05-01')."' AND l_date<='".date('Y-05-31')."' AND leg ='right'"));
$right_june  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-06-01')."' AND l_date<='".date('Y-06-31')."' AND leg ='right'"));
$right_july  = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-07-01')."' AND l_date<='".date('Y-07-31')."' AND leg ='right'"));
$right_aug   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-08-01')."' AND l_date<='".date('Y-08-31')."'  AND leg ='right'"));
$right_sep   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-09-01')."' AND l_date<='".date('Y-09-31')."'  AND leg ='right'"));
$right_oct   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-10-01')."' AND l_date<='".date('Y-10-31')."'  AND leg ='right'"));
$right_nov   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-11-01')."' AND l_date<='".date('Y-11-31')."'  AND leg ='right'"));
$right_dec   = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select income_id from level_income_binary where income_id='".$f['user_id']."' AND l_date>='".date('Y-12-01')."' AND l_date<='".date('Y-12-31')."'  AND leg ='right'"));


$month__left_result = array($left_jan,$left_feb,$left_march,$left_April,$left_may,$left_june,$left_july,$left_aug,$left_sep,$left_oct,$left_nov,$left_dec);
$month_right_result = array($right_jan,$right_feb,$right_march,$right_April,$right_may,$right_june,$right_july,$right_aug,$right_sep,$right_oct,$right_nov,$right_dec);

$final_array = array('left' => $month__left_result,'right'=>$month_right_result);
$left_final = $final_array['left'];
$right_final = $final_array['right'];

?>





    <!DOCTYPE html>
    <html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php include("title.php");?>
            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Fonts -->
            <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
           <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

            <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
            <link href="css/style.css" rel="stylesheet" type="text/css">
             <link href="css/core1.css" rel="stylesheet" type="text/css">

            <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css' />
            <link rel="stylesheet" type=$right_final"text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />


   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

    <body class="">


            <br/>
        
                <div class="animsition">
                    <?php include("sidebar.php");?>

                        <main id="playground">

                            <!-- - - - - - - - - - - - - -->
                            <!-- start of TOP NAVIGATION -->
                            <!-- - - - - - - - - - - - - -->
                            <?php include("top.php");?>

                                <!-- - - - - - - - - - - - - -->
                                <!-- end of TOP NAVIGATION   -->
                                <!-- - - - - - - - - - - - - -->

                                <style>
                                    .green {
                                        color: green;
                                    }
                                    
                                    h3 {
                                        font-size: 1em;
                                        font-weight: bold;
                                        font-family: Arial, Helvetica, sans-serif;
                                    }
                                </style>
                                <style type="text/css">
                                        .dashboard {
                                            font-size: 17px;
                                            margin-bottom: 0;
                                            margin-top: 2px;
                                            color: #1f1f1f;
                                            font-weight: bold;
                                        }
                                        #example2 {
                                          border: 1px solid color:gray;
                                          padding-top: 22px;
                                          background-color: white;
                                          box-shadow: 4px 4px 2px 0px #c7c3c3;
                                        }
                                        #btn{
                                            border-radius: 2px;
                                            font-size: 14px;
                                            padding: 4px 5px;
                                            outline: none !important;
                                            font-family: 'Nunito Sans', sans-serif;
                                        }
                                        
                                        
                                        
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

                                    </style>



                                  
                                    

        <div class="container-fluid">
                     <div class="row">
                            <figure class="highcharts-figure">
                                <div id="container111"></div>
                                <!--<p class="highcharts-description">
                                    This chart shows how data labels can be added to the data series. This
                                    can increase readability and comprehension for small datasets.
                                </p>-->
</figure>

                            </div>  
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
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>

<script>
Highcharts.chart('container111', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Left Right Monthly Downline'
    },
    subtitle: {
        /*text: 'Source: WorldClimate.com'*/
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Registration'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Left',
        data: <?php echo json_encode($left_final); ?>
    }, {
        name: 'Right',
        data: <?php echo json_encode($right_final); ?>
    }]
});

          
      
</script>

<script>
$(document).ready(function(){
    $('.highcharts-credits').remove();
});
</script>
  
  </body>
</html>