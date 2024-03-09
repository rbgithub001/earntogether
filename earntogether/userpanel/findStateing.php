<?php $country=$_GET['platform'];
//include('../includes/all_func.php');
include('../lib/config.php');
?>

                 
	<div>
									<label class="field_title">Amount</label>
									<div class="form_input">
						<select name="amount" id="amount"  style="width:530px; border:1px solid #ebebeb; padding:5px;"required>

                     
                     <?php $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM reload_pv WHERE pid='$country'");
while($result=mysqli_fetch_array($query)){ ?>

                          <option value="<?php echo $result['pv'];?>"><?php echo $result['pv'];?> PV</option>
                          <?php } ?>
                      
   
				

                      </select>
									</div>
								</div>
                                
                                <?php if($country==15)
								{ ?>
                                
                                  <label class="field_title">Enter Meter No <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="number" name="meter" value="" required style="width:400px;border:2px solid #ebebeb;">

                    </div>
				<?php } else {} ?>