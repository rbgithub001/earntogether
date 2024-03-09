<?php ob_start();define('ABSPATH','../lib/'); include('header.php');  include('pagination/pagination.php');
// get main cateogries

?>
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
<div class="content"> 
  <!-- Sidebar -->
  <?php include('nav.php'); ?>
  <!-- Sidebar ends --> 
  <!-- Main bar -->
  <div class="mainbar"> 
    
    <!-- Page heading -->
    <div class="page-head">
      <h2 class="pull-left">Reload Section</h2>
      <div class="clearfix"></div>
      <!-- Breadcrumb -->
      <div class="bread-crumb"> <a href="index.php"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider --> 
        <span class="divider">/</span> <a href="#" class="bread-current">Reload Section</a> </div>
      <div class="clearfix"></div>
    </div>
    <!-- Page heading ends --> 
    <!-- Matter -->
    <div class="matter">
      <div class="container"> 
        <!-- Today status. jQuery Sparkline plugin used. -->
        <div class="row">
          <div class="col-md-12">
        
        	<?php
				if(isset($_GET['msg'])):
					if($_GET['msg']=='ist'):?>
                    <div style="padding:5px; color:#063; font-weight:bold;"><?php echo "Successfully Updated Data  !"; ?></div>
              <?php else: ?>
                    <div style="padding:5px; color:#F00; font-weight:bold;"><?php echo "Sorry Unable to Send !"; ?></div>	
			<?php
					endif;
				endif;
			?>
        
            
          </div>
        </div>
        
        <div class="widget">
             <div class="widget-head">
                <div class="pull-left">Search </div>
                <div class="widget-icons pull-right"> <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> <a href="#" class="wsettings"><i class="fa fa-wrench"></i></a> <a href="#" class="wclose"><i class="fa fa-times"></i></a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="widget-content">
            	  <div class="padd">
                  <form action="" class="validate" id='form1' method="post" name="search">
                  <input type="hidden" name="action" value="search" />
                    <fieldset>
                     
                      <div class="form-group main-wrapper">
                        <div class="left-box">
                          <label for="name"> Start Date</label>
                          <input type="text"  id="datepicker" name="start_date" placeholder="YYYY-MM-DD" />
                        </div>
                        
                      
                        <div class="left-box">
                          <label for="name"> End Date</label>
                          <input type="text"  id="datepicker1" name="end_date" placeholder="YYYY-MM-DD"/>
                        </div>
                        
                      
                     
                        <div class="left-box">
                         <br>
                          <button class="btn btn-danger side"  type="submit" id="button" name="show" >Submit</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
        <div class="widget">
          <div class="widget-head">
            <div class="pull-left">Reload Section&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="export-reload-user.php">Export List</a></div>
            <div class="widget-icons pull-right">  </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget-content">
          <form name="myform" onSubmit="return ValidateData(this);" method="post" action="">
  <input type="hidden" name="token_id" value="<?php echo token; ?>" /> 
            <table class="table table-striped table-bordered table-hover">
              <thead>
              
					
                            <input type="hidden" name="rand" value="<?php echo $_SESSION['rand'];?>"/>
					 
                <tr>
                  <th>S.no.</th>
                  <th>Plan Type</th>
                  <th>Plan Name</th>
                  <th>PV</th>
                   <th>RM/DENO</th>
                    <th>Mobile No</th>
                     
                          <th>Username</th>
                    <th>Apply Date</th>
                    <th>Transaction Number</th>
                     <th>Meter</th>
                 
                
                </tr>
              </thead>
              <tbody>
              <?php 
			  if(isset($_POST['show']))
			 {
				  $start_date=substr($_POST['start_date'],2,100);
				 $end_date=substr($_POST['end_date'],2,100);
				
				  $args_banners_week = $mxDb->get_information('contact_reload', '*', "where 1=1  and (posted_date between '$start_date' and '$end_date') order by id desc ",false, 'assoc');
			 }
			 else
			 {
			 // get best offer banners 
			  $args_banners_week = $mxDb->get_information('contact_reload', '*', "where 1=1 order by id desc ",false, 'assoc');
			 }
			  /* ====== show records ======== */
			  if($args_banners_week):
			  	$s_nos = 1;
				
				
				
			  	foreach($args_banners_week as $banners):
				
				
					
              ?>
              
                <tr>
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
                                <td><?php echo $banners['meter'];?></td>
                  
                 <?php @$total_amount=$total_amount+$banners['amount'];?>
                 
                </tr>
                <?php $s_nos++;
					endforeach;
				endif;
				?>
                <tr><td  colspan="13">Total PV  <?php echo @$total_amount;?> </td></tr>
                  
						
                        
              </tbody>
            </table>
            
            </form>
            
          </div>
        </div>
      
     
      
           <div class="clearfix"></div>
        
          
                            <!--editor code starts here use with ckfinder-->
           
      
      <!-- Today status ends --> 
      
      <!-- Dashboard Graph starts --> 
      
      <!-- Dashboard graph ends --> 
      <!-- Chats, File upload and Recent Comments --> 
    </div>
  </div>
  <!-- Matter ends --> 
</div>
<!-- Mainbar ends --> 
<!-- Mainbar ends -->
<div class="clearfix"></div>
</div>
<!-- Content ends -->
<?php include('footer.php'); ?>
