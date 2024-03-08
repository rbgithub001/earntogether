<?php
	include("../lib/config.php");
//	$_SESSION['userid']=$_POST['userid'];
	//check we have username post var
	
	if(isset($_POST["userid"]))
	{
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die();
	}   
	
	//try connect to db
	//trim and lowercase username
	$userid =  strtolower(trim($_POST["userid"])); 
	//sanitize username
	$userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	//check username in db
    //	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$userid' or username='$userid') and  user_status='0' and user_rank_name='Paid Member')");
	$results = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_registration WHERE ((user_id='$userid' or username='$userid') and  user_status='0')");
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	$row_ref=mysqli_fetch_array($results);
	
	$fullname=$row_ref['first_name'].' '.$row_ref['last_name'];
	
	
	//if value is more than 0, username is not available
	if(!$username_exist) {
	echo "<p style='color:red;'>"."  User Not Available ! "."</p>";
	}else{
	$resultspers = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_rank_list WHERE id='".$row_ref['rank']."' "));
    $level_per= $resultspers['level_per'];
      $level_name= $resultspers['name'];
	$plot_level_per=    $resultspers['plot_level_per'];
	    //echo "<p style='color:green;margin-left: 18%;'>$fullname ($level_name) </p>";
	    echo "<p style='color:green;margin-left: 18%;'>$fullname</p>";
	    echo '<input type ="hidden" value="'.$level_per.'" name="perc" id="perc">
	    <input type ="hidden" value="'.$plot_level_per.'" name="plot_perc" id="plot_perc">
 <div class="form-group" id="contacts">
<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Contacts</label><div class="col-lg-10" id="contacts"><select class="form-control" name="contacts"  required><option value="">Select any one</option><option value="none">--None--</option>';
	    $resos2ss=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `customers` where ref_id='".$row_ref['user_id']."'");
      while($cnrrank = mysqli_fetch_array($resos2ss)){ ?>
      <option value="<?php echo $cnrrank['user_id']?>">  <?php echo $cnrrank['first_name'].' '.$cnrrank['last_name']?></option>
      <?php        } 
      echo '</select></div></div>
</div>';


    }
    
}
?>
<script>
$(document).ready(function(){
    $("#contacts").change(function(){
         
        var selectedval = $("#contacts option:selected").val();
       // alert(selectedval);
        if(selectedval=='none'){
            $("#showdiv").show();
            $("#showprojectdiv").show();
            $("#showpbtn").show();
            $("#showpbtnproject").hide();
            
            // $('#showpbtnproject').removeAttr("type").attr("type", "submit");
            //  $('#showpbtn').addAttr("type").attr("type", "submit");
            
            
        }else if(selectedval!='' && selectedval!='none'){
            $("#showdiv").hide();
            $("#showprojectdiv").show();
             $("#showpbtn").show();
             $('#showpbtn').removeAttr("type").attr("type", "submit");
             $("#showpbtnproject").show();
            $('#showpbtnproject').addAttr("type").attr("type", "submit");
       }else{
            $("#showdiv").hide();
             $("#showpbtn").show();
            $("#showprojectdiv").hide();
             $('#showpbtnproject').addAttr("type").attr("type", "submit");
             $('#showprojectdiv').removeAttr("type").attr("type", "submit");
             $('#showdiv').removeAttr("type").attr("type", "submit");
             $("#showpbtnproject").show();
             
             
             
      }
        // $.ajax({
        //     type: "POST",
        //     url: "process-request.php",
        //     data: { country : selectedCountry } 
        // }).done(function(data){
        //     $("#response").html(data);
        // });
    });
});
</script>

