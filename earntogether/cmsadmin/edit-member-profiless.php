<?php
include("../lib/config.php");
include("pagignation.php");


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

 
?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <?php include("header.php");?>

    <!--easy pie chart-->
    <link href="css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="css/jquery-jvectormap-1.1.1.css">

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
   
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

  

    
</head>

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

                <div class="row">

                  

                </div><br />

                <div class="row">
                    <!-- <div class="col-sm-12 text-right">-->

                    <!--    <a href="export_member_list1.php" class="btn btn-success">Export in excel</a>-->

                    <!--</div>-->

                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 Update Member Profile

                              
      
                                <span class="tools pull-right">
                                     
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>

                              </br>
    
  
                           <div>

                              <div class="table-responsive">
                                  <form name="widget" method="post"  action="">
                                   <div class="search-name" style="float: right; margin-bottom:20px;"> <strong> Search Here</strong> <strong>:</strong>
        <input type="text" name="search" class="input" maxlength="200" value="<?=$search;?>" />
        <input type="submit" name="submit" value="submit" class="btn btn-success" />
      </div>
      </form>

                        <table border="1px" class="table table-bordered table-hover role" style="background:#FFF; border-color:#000;">
                          <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">
                                    S.No
                                </th>
                                <th style="text-align:center;">
                                    User ID
                                </th>
                              
                               
                                <th style="text-align:center;">
                                    Username
                                </th>
                                <th style="text-align:center;">
                                    Full Name
                                </th>
                                 <th style="text-align:center;">
                                    User Rank
                                </th>
                                <th style="text-align:center;">
                                    Sponsor ID
                                </th> 
                               <th style="text-align:center;">
                                   Phone No
                                </th>
                             
                             
                                <th style="text-align:center;">
                                    Registration Date
                                </th>
                               <th style="text-align:center;">
                                    Edit Profile
                                </th>
                                   <!--<th style="text-align:center;">
                                    Login Status
                                </th>-->

                              <!--  <th style="text-align:center;">
                                    Silver R D Club Status
                                </th>

                                <th style="text-align:center;">
                                    Gold R D Club Status
                                </th>

                                <th style="text-align:center;">
                                    Platinum R D Club Status
                                </th>-->
                                 
                                 
                                <!--<th style="text-align:center;">-->
                                <!--    Edit-->
                                <!--</th>-->
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $search=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_REQUEST['search']));
                             $config_query_count="SELECT count(id) as counter from user_registration ";
                              $config_query_record="SELECT * from user_registration ";

                          		if($search!='')
                          		{
                             // echo $search;die;

                          			//$config_query=" WHERE ( LIKE '%".$search."%'  || telephone LIKE '%".$search."%'  || user_id LIKE '%".$search."%'  || ref_id LIKE '%".$search."%' || username LIKE '%".$search."%' || first_name  LIKE '%".$search."%' || registration_date LIKE '%".$search."%' ||  last_name LIKE '%".$search."%'  ||  user_rank_name LIKE '%".$search."%')";
                          			$config_query=" WHERE (username LIKE '%".$search."%' || user_id LIKE '%".$search."%' || registration_date LIKE '%".$search."%')";	             
                          		}
                          		
                          	
                              	$config_query.=" order by id ASC";
                              	$config_query_count.= $config_query;	
                              	$config_query_record.= $config_query;	
                              	//echo $config_query_record;die;
                              	$res_config_count=mysqli_query($GLOBALS["___mysqli_ston"],$config_query_count);
                              	$num_rec= mysqli_fetch_array($res_config_count);
                                  $num=$num_rec['counter'];
                                  
                                       
                                  $per_page=10;
                              		$values = new Paging();
                              		$valu=$values->getpage_data($num, $per_page);
                              		$val=explode("~",$valu);
                              		$cur=$val[0];
                              		$start=$val[1];
                              		$max_pages=$val[2];
                              		$config_query_record.=" LIMIT $start, $per_page " ;
                          	
                              	 $data=mysqli_query($GLOBALS["___mysqli_ston"],$config_query_record);
                               // echo 'ssssssssss'.mysqli_info($GLOBALS["___mysqli_ston"]);
                              		if($num>0)
                                      {	
                                           $row = 0;
                                           if($_REQUEST['startp']!='' || $_REQUEST['startp']!=0){
                                              $row = 0;
                                              $allcount = $num;

                                              $val = $row + $_REQUEST['startp'];
                                              if( $val < $allcount ){
                                                  $row = $val;
                                              }
                                          }
                                          if($start!='0')
                                          {
                                              $row = $start;
                                              $allcount = $num;

                                              $val =  $start;
                                              if( $val < $allcount ){
                                                  $row = $val;
                                              }
                                          }
                                          
                                         $sno = $row + 1;
                                        while($row_config=mysqli_fetch_array($data))
                          				{
                          			     ?>
               <tr style="text-align:center;">
                                <td>
                                    <?php echo $sno;?>
                                </td>
                                <td>
                                     <a href="jumpto_member_office.php?id=<?php echo $row_config['user_id'];?>" target="_blank"><?php echo $row_config['user_id'];?></a>
                                </td>
                              
                              <td>
                                    <?php echo $row_config['username'];?>
                                </td>
                                <td>
                                    <?php echo $row_config['first_name']." ".$row_config['last_name'];?>
                                </td>
                                 <td>
                                    <?php echo $row_config['user_rank_name'];?>
                                </td>
                                <td>
                                     <?php echo $row_config['ref_id'];?>
                                </td> 
                                 <td>
                                     <?php echo $row_config['telephone'];?>
                                </td>
                                
                               
                              
                                <td>
                                     <?php echo $row_config['registration_date'];?>
                                </td>
                                <!--<td>-->
                                <!--     <?php echo $row_config['activation_date'];?>-->
                                <!--</td>-->
                                <td>
                                     <a href="edit_member_profile.php?id=<?php echo $row_config['id'];?>">Edit</a>
                                </td>
                                 <!--<td>           
                                      <select onchange="window.location.href = this.value" name="select">
                                       <option value="update-issued8.php?user=<?php echo $row_config['user_id'];?>&status=0"  <?php if($row_config['user_status']=='0'){ echo "selected";}?>>Active</option>
                                       <option value="update-issued8.php?user=<?php echo $row_config['user_id'];?>&status=1" <?php if($row_config['user_status']=='1'){ echo "selected";}?>>Blocked</option>
                                      </select>
                                  </td>--> 
                            </tr>
           
                          <tbody>
                            <?php
                            
                                        $sno ++;
                    			      }
                    			      
                    			       // $_SESSION['start_page']=$i;    
                    			       ?>
                    			         <input type="hidden" name="row" value="<?php echo $row; ?>">
                    			          <input type="hidden" name="allcount" value="<?php echo $num; ?>">
                    			       <?
                    					$p="search=".$search;
                    					$getpaging = new Paging();
                    					$getpage=$getpaging->get_paging($num, $start, $cur, $max_pages, $p, $per_page);
                    				} 
                                    else
                    				{
                    					
                    					?>
                                <tr>
                                  <td align="center" colspan="12"><font color="#FF0000">Sorry no data found !</font></td>
                                </tr>
                                <?
                    					
                    					}
                                    
                                
                              ?>       
                      
                            </tbody>
                          </table>
                        </div>
                      </div>
                          
                    </section>

                  </div>

                </div>

            </div>
            <!--body wrapper end-->


            <!--footer section start-->
             <!--footer section start-->
          <?php include("footer.php");?>
            <!--footer section end-->


       
        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

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


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>

</body>
</html>