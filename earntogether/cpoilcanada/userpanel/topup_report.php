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
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
$(function() {
  var pickerOpts = {
          dateFormat: $.datepicker.ATOM
    };  
$( "#datepicker" ).datepicker(pickerOpts);
});

$(function() {
  var pickerOpts = {
          dateFormat: $.datepicker.ATOM
    }; 
$( "#datepicker1" ).datepicker(pickerOpts);
});
</script>
<!-- Main content starts -->
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
function ValidateData(form)
{
 var chks = document.getElementsByName('list[]');
 var hasChecked = false;
 for (var i = 0; i < chks.length; i++)
 {
  if(chks[i].checked)
  {
   hasChecked = true;
   break;
  }
 }
 if (hasChecked == false)
 {
  alert("Please select at least one Request.");
  return false;
 }
} 
function Check(chk)
{
 var chk = document.getElementsByName('list[]');
 if(document.myform.Check_All.value=="Check All")
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = true ;
  document.myform.Check_All.value="UnCheck All";
 }
 else
 {
  for (i = 0; i < chk.length; i++)
  chk[i].checked = false ;
  document.myform.Check_All.value="Check All";
 }
}
</script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script>
    function mtcn(admin_remark1,userId,Id)
    {

        if(admin_remark1!='' && admin_remark1!=false)
        {
            $.ajax({
                url:'../ajax/ajax_awb.php',
                type:'post',
                data:{admin_remark1:admin_remark1,userId:userId,id:Id,funtion:'mtcn'},
                success:function(data)
                {
                    
                    if(data==2)
                    {
                            alert("Successfully Updated Remark");
                            location.reload();
                    }
                    else if(data==3)
                    {
                        alert("Due to some Error Occur");
                    }
                }
                
                
                
            });
        }
        
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


          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <header class="panel-heading">
                  <h4 class="panel-title">Topup Report</h4>
                </header>
                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th style="text-align:center;">S.no.</th>
                              <th style="text-align:center;">Plan Type</th>
                              <th style="text-align:center;">Plan Name</th>
                              <th style="text-align:center;">PV</th>
                              <th style="text-align:center;">RM/DENO</th>
                              <th style="text-align:center;">Mobile No</th>
                              <th style="text-align:center;">Username</th>
                              <th style="text-align:center;">Apply Date</th>
                              <th style="text-align:center;">Transaction Number</th>
                              <th style="text-align:center;">Status</th>

                        
                      </tr>
                    </thead>
                    <tbody>
      <?php 
        if(isset($_POST['show']))
       {
          $start_date=substr($_POST['start_date'],2,100);
         $end_date=substr($_POST['end_date'],2,100);
        
          $args_banners_week = $mxDb->get_information('contact_reload', '*', "where user_id=$userid  and (posted_date between '$start_date' and '$end_date') order by id desc ",false, 'assoc');
       }
       else
       {
       // get best offer banners 
        $args_banners_week = $mxDb->get_information('contact_reload', '*', "where user_id=$userid order by id desc ",false, 'assoc');
       }
        /* ====== show records ======== */
        if($args_banners_week):
          $s_nos = 1;
        
        
        
          foreach($args_banners_week as $banners):
        
        
          
              ?>               
                     <tr style="text-align:center;">
                  <td><?php echo $s_nos; ?></td>
                  <td><?php echo $banners['plan_type']; ?></td>
                  <td><?php echo $banners['plan_name']; ?></td>
                  <td> <?php echo $banners['amount']; ?></td>
                   <?php $red1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where name='".$banners['plan_name']."' and type='".$banners['plan_type']."'"));?>
                  <?php $red=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from reload_pv where pid='".$red1['id']."' and pv='".$banners['amount']."'"));?>
                    <td> <?php echo $red['rm']; ?></td>
                   <td> <?php echo $banners['mobile']; ?></td>
                  
                   
                     
                      <?php $red2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where user_id='".$banners['user_id']."'"));?>
                       <td><?php echo $red2['username']; ?></td>
                        <td><?php echo $banners['posted_date']; ?></td>
                           
                               <td><?php echo $banners['transaction_no'];?></td>
                                
                                 <td>
                                  
                                   <?php if($banners['meter']=='0') { echo "Approved"; }
                                   elseif($banners['meter']=='1') { echo "Cancelled"; }
                                   else { echo "Pending"; } ?>
                                  
                                </select></td>
                  
                 <?php @$total_amount=$total_amount+$banners['amount'];?>
                 
                </tr>
                <?php $s_nos++;
          endforeach;
        endif;
        ?>
                
                     
                    </tbody>
                  </table>

<div style="text-align: center;"><b>Total PV = <?php echo @$total_amount;?></b> </div>
                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

         <div class="col-md-12 text-center">

 <!-- <a href="bh_export_sponser_income.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>  -->  


          </div>


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