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

 
?><!DOCTYPE html>
<html lang="en">
<head>
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
    <style>
            .orange-brd{
                border:1px solid #f9a001 !important;
                background:#f9a001;
            }
            .blue-brd{
                border:1px solid #26c9ff !important;
                background:#26c9ff;
            }
           .tree{
          padding-left: 60px;
          width: 1000px;
          overflow-x:scroll;
          height: 600px;
        }
        .tree li a{
            width:auto; height:auto;
        }
        .flyout td a {
            padding: 5px 5px;
        }
        </style>  
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
                    <div class="col-sm-12 text-right">
                        <!--    <a href="export-opa-income-reports.php" class="btn btn-success">Export in excel</a> -->
                        
                    </div>
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                 All members Tree
                            </header>

                              </br>
    
  
                           <div>

                              <div class="table-responsive">
                                  <form name="usersearch" method="get" action="">
                                   <div class="search-name" style="float: left;margin-bottom:20px;position: relative;left: 80px;"> <strong> Search with member ID to see downline</strong> <strong>:</strong>
                                    <input type="text" name="id" class="input" maxlength="200" value="<?=$search;?>" />
                                    <input type="submit" name="submit"  value="submit" class="btn btn-success" />
                                  </div>
                                  </form>

                        <div class="">

                        <br/>
                        <!-- end row -->
                        <?php $id=$_GET['id'];
                        if($id!='')
                        {
                          $ids=$id;
                        }
                        else
                        {
                          $ids=$f['user_id'];
                        }
                          $x=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM user_registration WHERE user_id='".$ids."'"));
                          ?>
                        <div class="col-lg-12">
                                
                                <div class="card-box" style="overflow-x: scroll">

                                    <h4 class="m-t-0"><b>Direct Member Tree</b></h4>
                                    
                                     <!--<div class="col-lg-12 text-right ">-->
                                     <!--                       <div class="names">-->
                                                                <!--<ul>-->
                                                                  <!--<li><img src="images/member.png" width="50" alt=""> <b>Empty</b></li>-->
                                     <!--                             <img src="../userpanel/images/male.jpg" width="50" alt=""> <b>Affiliate User</b>-->
                                     <!--                            <img src="../userpanel/images/male.jpg" width="50" alt=""> <b>Free User</b>-->
                                                                  
                                                                <!--</ul>-->
                                     <!--                       </div>-->
                                     <!--                     </div>-->

                                    <div class="tree" style="min-height: 400px;width: 15000px !important;" >
                                        
                                        <ul>
                                            <li>
                                                <a href="#"  class="tooltip1 orange-brd">
                                           <?php
                                            $data111=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='".$x['user_plan']."'"));
                                            /*if($x['sex']=='Male'){?>
                                            <img src="images/male-av.png" alt="" style="width: 50px;height: 50px;"/><br />  
                                            <?php 
                                            }
                                            elseif ($x['sex']=='Female')
                                            {
                                            ?>
                                            <img src="images/meb-3.png" alt="" style="width: 50px;height: 50px;"/><br />  
                                            <?php
                                            }
                                            else
                                            {?>
                                            <img src="images/male-av.png" alt="" style="width: 50px;height: 50px;"/><br />  
                                            <?php
                                            }*/
                                            if($x['user_rank_name']=='Affiliate'){
                                                ?>
                                            <img src="../userpanel/images/business-man.svg" alt="" style="height: 60px;"/><br />  
                                            <?php
                                            }
                                            else
                                            {?>
                                            <img src="../userpanel/images/business-man.svg" alt="" style="height: 60px;"/><br /> 
                                            <?php }
                                            ?><br/>
                                            Name : <?php echo $x['first_name'].' '.$x['last_name'];?><br/>
                                            Username : <?php echo $x['username'];?><br/>
                                            D.O.J : <?php echo $x['registration_date'];?><br/>


                                                <span>
                                        <!--<img class="callout" src="images/member.png">-->
                                    <div class="flyout">
                                        <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                            <tbody>
                                                <tr>
                                                    <td align="left">User ID</td>
                                                    <td align="left"><?= $x['user_id']?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">User Name</td>
                                                    <td align="left"><?= $x['username']?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">Full Name</td>
                                                    <td align="left"><?= $x['first_name'].' '.$x['last_name']?></td>
                                                </tr>

                                                <tr>
                                                    <td align="left">Sponsor  ID</td>
                                                    <td align="left"><?= $x['ref_id']?></td>
                                                </tr>

                                                <tr>
                                                    <td align="left">D.O.J</td>
                                                    <td align="left"><?= $x['registration_date']?></td>
                                                </tr>
                                                 
                                            </tbody>
                                        </table>
                                        </div>
                                    </span>


                                    </a>
                                                <ul>
                                                <?php $der=mysqli_query($GLOBALS["___mysqli_ston"],"select sex,first_name,last_name,user_id,ref_id,username,group_type,user_rank_name,registration_date,user_plan from user_registration where ref_id='$ids'"); 
                                                $i=1;
                                                while($der1=mysqli_fetch_array($der)) { ?>
                                                    <li>
                                                   <?php   if ($der1['group_type']==1) {?>  
                                                        <a href="all-members-tree.php?id=<?php echo $der1['user_id'];?>" class="tooltip1" style="border: 1px solid #898072 !important;background: #f6c668;">
                                                            <?php }else{ ?>
                                                           <a href="all-members-tree.php?id=<?php echo $der1['user_id'];?>" class="tooltip1" style="border: 1px solid #898072 !important;background: #e5ff93;">  
                                                            <?php } ?>
                                                       <?php   
                                                $data1111=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from status_maintenance where id='".$der1['user_plan']."'"));
                                                                                                       /* if($der1['sex']=='Male'){?>
                                                <img src="images/meb-3.png" alt="" style="width: 50px;height: 50px;" /><br />  
                                                <?php 
                                                }
                                                elseif ($der1['sex']=='Female')
                                                {
                                                ?>
                                                <img src="images/meb-3.png" alt="" style="width: 50px;height: 50px;"/><br />  
                                                <?php
                                                }
                                                else
                                                {?>
                                                <img src="images/meb-3.png" alt="" style="width: 50px;height: 50px;"/><br />  
                                                <?php
                                                }*/
                                                
                                                
                                                
                                                // this code is affiliate user and free user show images 
                                                if($der1['user_rank_name']=='Affiliate'){
                                                    ?>
                                                <img src="../userpanel/images/business-man.svg" alt="" style="height: 60px;"/><br />  
                                                <?php
                                                }
                                                else
                                                {?>
                                                <img src="../userpanel/images/business-man.svg" alt="" style="height: 60px;"/><br /> 
                                                <?php }?>
                                                     <br/>                                             
                                            Name : <?php echo $der1['first_name'].' '.$der1['last_name'];?><br/>
                                            Username : <?php echo $der1['username'];?><br/>
                                            D.O.J : <?php echo $der1['registration_date'];?><br/>
                                            
                                            
                                            <span>
                                        <img class="callout" src="../userpanel/images/business-man.svg"  style="height: 60px;">
                                    <div class="flyout">
                                        <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                            <tbody>
                                                <tr>
                                                    <td align="left">User ID</td>
                                                    <td align="left">
                                                        <a href="javascript:void(0)" style="border:none;" id="myInput<?= $i?>"><?= $der1['user_id']?></a>
                                                        <a href="javascript:void(0)" style="float: right;background-color: #99a8bb;"  onclick="myFunction(<?= $i;?>)" class="btn btn-info">Copy ID</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left">User Name</td>
                                                    <td align="left"><?= $der1['username']?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">Full Name</td>
                                                    <td align="left"><?= $der1['first_name'].' '.$der1['last_name']?></td>
                                                </tr>

                                                <tr>
                                                    <td align="left">Sponsor  ID</td>
                                                    <td align="left"><?= $der1['ref_id']?></td>
                                                </tr>

                                                <tr>
                                                    <td align="left">D.O.J</td>
                                                    <td align="left"><?= $der1['registration_date']?></td>
                                                </tr>
                                                  

                                               
                                            </tbody>
                                        </table>
                                        </div>
                                    </span>


</a>
                                                    </li>
                                                    
                                                    <?php 
                                                    $i++;
                                                    } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>

                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- End Tree Structure -->
                        </div>
                      </div>
                          
                    </section>

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


 <script type="text/javascript">
/*$( document ).ready(function() {
$('#employee_grid').DataTable({
         "bProcessing": true,
         "serverSide": true,        
  "pageLength": 20,
         "ajax":{
            url :"response.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
          }
        });   

      
});
*/

</script>
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

<!--Data Table-->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.tableTools.min.js"></script>
<script src="js/bootstrap-dataTable.js"></script>
<script src="js/dataTables.colVis.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/dataTables.scroller.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<!--data table init-->
<script src="js/data-table-init.js"></script>

<!--common scripts for all pages-->

<script src="js/scripts.js"></script>




<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js">
</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
       


</body>
</html>