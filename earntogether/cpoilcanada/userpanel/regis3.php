<?php
	include("../lib/config.php");
	$_SESSION['sponsorid']=$_POST['sponsorid'];
	//check we have username post var
	if(isset($_POST["sponsorid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	//try connect to db
	//trim and lowercase username
	$sponsorid =  strtolower(trim($_POST["sponsorid"])); 
	//sanitize username
	$sponsorid = filter_var($sponsorid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
    //	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' or username='$sponsorid') and  user_status='0' and user_rank_name='Paid Member')");
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$sponsorid' or username='$sponsorid') and  user_status='0')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_array($results);
	
	//if value is more than 0, username is not available
	
	if(!$username_exist) {
	echo "<p style='color:red;'>"."  Sponsor Not Available ! "."</p>";
	}else{
	    
	 //   echo $row_ref['user_id'];
	echo "<p style='color:green'>".  $row_ref['first_name']." ".$row_ref['last_name']." is your sponsor !</p>";
	}
	
	
	
// 	echo '  <div class="form-group"><div class="row"><div class="col-sm-12">
//       <select class="form-control" name="rank" id="checksponserrank" style="display:none" required>
//       <option value="">--select rank--</option>';
//       $resos2ss=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `user_rank_list` where id>'".$row_ref['user_plan']."'");
//       while($cnrrank = mysqli_fetch_array($resos2ss)){ 
      ?>
      <!--<option value="<?php echo $cnrrank['id']?>">  <?php echo $cnrrank['name']?></option>-->
      
      <?php 
          
    //   } 
    //   echo '</select></div></div></div>';
	

	//close db connection
	}
?>