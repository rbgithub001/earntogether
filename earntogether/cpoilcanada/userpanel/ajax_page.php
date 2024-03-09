<?php include("../lib/config.php"); ?>


<?php if(isset($_POST['tab_type'])) {
  
  $type = $_POST['tab_type'];
  
} 
    
    ?>



                    <div class="container">
                        <div class="row">
             
                                  <?php 
                                    $n=1;
                                    $data=mysqli_query($GLOBALS["___mysqli_ston"],"select * from poc_register_details where catogory = '$type' ");
                                     while($data1=mysqli_fetch_array($data)){ 
                                         ?>
                    
                               <div class="col-md-4">
                                    <div class="single_vendorCard">
                                      <div class="img_details">
                                            <div class="vendor_img">
                                               <div id="carousel<?php echo $n; ?>-example-generic" class="carousel slide" data-ride="carousel">
            
                                                  <!-- Wrapper for slides -->
                                                 <div class="carousel-inner" role="listbox">
                                                        <?php 
                                                 
                                                   $cc = count(explode(",",$data1['file']));
                                                   $r=$data1['file'];
                                                  
                                                   $p=explode(",",$r);
                                                  
                                                   for($i=0; $i < $cc; $i++) {
                                                  ?>
                                                  <div class="item <?php if($i == 0) { echo "active"; } ?>">
                                                      <img src='../uploads/<?php echo $p[$i]; ?>'  alt="...">
                                                    </div>
                                                    
                                                   <?php } ?>  
                                                    
                                                 <!--   <div class="item">
                                                      <img src="https://flyjazz.ca/wp-content/uploads/2017/01/dummy-user.jpg" alt="...">
                                                    </div>
                                                  </div>-->
                                                
                                                   Controls 
                                                  <a class="left carousel-control" href="#carousel<?php echo $n; ?>-example-generic" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                  </a>
                                                  <a class="right carousel-control" href="#carousel<?php echo $n; ?>-example-generic" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                  </a>
                                                </div>
                                                <!--<img class="img-responsive" src="https://flyjazz.ca/wp-content/uploads/2017/01/dummy-user.jpg" alt="" />-->
                                            </div>
                                            <div class="vendor_details">
                                                <div class="single_details">
                                                    <h5>Category Name</h5>
                                                    <h5><?php echo $data1['catogory'];?></h5>
                                                </div>
                                                  <div class="single_details">
                                                    <h5>Title</h5>
                                                    <h5><?php echo $data1['title'];?></h5>
                                                </div>
                                                <div class="single_details">
                                                    <h5>Description</h5>
                                                    <h5><?php echo $data1['description'];?></h5>
                                                </div>
                                              
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                                    <?php $n++;} ?>
                            </div>
                    </div>
              