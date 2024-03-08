<?php
$user_id=$_SESSION['user_id'];

$privileage = array();
//$args_privileage=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin_privileges where admin_id='".$user_id."'"));
 $where_privileage = " where admin_id='".$user_id."'";
  // get privileage
 $args_privileage = $mxDb->get_information('admin_privileges', 'privilege_page', $where_privileage, false, 'assoc');
//print_r( $args_privileage);die;
    if( $args_privileage )
        {
           foreach( $args_privileage as $privil ){

               $privileage[] = $privil['privilege_page'];

           }
       }

?>
<div class="sidebar-left">
<div class="sidebar-left-info">
                <!-- visible small devices start-->
                <div class=" search-field">  </div>
                <!-- visible small devices end-->

                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked side-navigation">
                   <!-- <li>
                        <h3 class="navigation-title">Navigation</h3>
                    </li>-->
                    <li class=""><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="add-user.php" target="_blank"><i class="fa fa-home"></i> <span>New Registration</span></a></li>
                    <li class=""><a href="../userpanel/login.php"><i class="fa fa-home"></i> <span>User Login</span></a></li>
                    <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Member Management</span></a>
                        <ul class="child-list">
                    <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='1'");
                    while($menu=mysqli_fetch_array($men)){ ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                    <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>  
                    <!--<li><a href="edit-member-profiless.php">Edit Members Profile</a></li>-->
                    
                    <!--<li><a href="add-user.php">Add New Member</a></li>-->
                 <!--   <li><a href="user_registration.php">Add New Member</a></li>-->
                    <li><a href="all-members-tree.php">All members Genealogy</a></li>
                    <li><a href="password-tracker.php">Password Tracker</a></li>
                    <li><a href="prospect-list.php">Prospect List</a></li>
                    <li><a href="customers-list.php">Customers List</a></li>
                    <!--<li><a href="direct-member-reports.php">Direct Member Report</a></li>-->
                    <!--<li><a href="downline-member-reports.php">Downline Member Report</a></li>-->
                        </ul>
                    </li>

                  <!--  <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Vendor Management</span></a>
                        <ul class="child-list">
                            <li><a href="poc_registration.php">Add New Vendor</a></li>
                            <li><a href="poc_member_list.php">Vendor List</a></li>
                            
                              <li><a href="our-vender-list.php">Our Vendors</a></li>
                                <li><a href="service-vender.php">Add New Service</a></li>
                                <li><a href="vendor_eshop_invoices.php">Vendor Invoices</a></li>
                                <li><a href="vendorwise-commission.php">Vendor Sales Report</a></li>
                             
                                <li><a href="dues-request-report.php">Vendor Payment Request Report</a></li>
                                <li><a href="#">Vendor Due Report</a></li>
                        </ul>
                    </li>-->
                     <?php if ($_SESSION['user_id']=='123456') {   ?>
                    <li><a href="vendorwise-extra-commission.php"><i class="fa fa-laptop"></i> <span>Admin Revenue Report</span></a></li>
                    <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Commission Management</span></a>
                        <ul class="child-list">
                            <li><a href="edit-vendor-commission.php">Manage Commission</a></li>
                            <li><a href="billing-release-commission.php">Review Commission Reports</a></li>
                            <!--<li><a href="billing-pending-commission.php">Hold Commission Reports</a></li>-->
                            
                            
                            
                        </ul>
                    </li>
                    <?php } ?>
                <!--   <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Manage Commission</span></a>
                        <ul class="child-list">
                             <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='13'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?> 
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>  
 
                     </ul>
                    </li>-->
                    <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Reports Management</span></a>
                        <ul class="child-list">
                    <?php /* $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='3'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } */ ?> 
                    <!--<li><a href="direct-member-reports.php">Direct Member Report</a></li>
                    <li><a href="downline-member-reports.php">Downline Member Report</a></li>-->
                    <!--<li><a href="recent-transaction-reports.php">Recent Transaction Report</a></li>-->
                    <!--<li><a href="member-package-reports.php">Member Package Report</a></li>-->
                    
                    <li><a href="self-income-report.php">Self Commission Report</a></li>
                    <li><a href="unilevel-income.php">Level Commission Report</a></li>
                    <!--<li><a href="direct-income.php">Direct Commission Report</a></li>-->
                    <!--<li><a href="reward-income.php">Reward Income</a></li>-->
                    <!--<li><a href="level-bonus-reports112-paid.php">Paid Level Bonus Report</a></li>-->
                    <!--<li><a href="level-bonus-reports112.php">Unpaid Level Bonus Report</a></li>-->
                    
                 <!--   <li><a href="cofounder-income-reports-paid.php">Paid Co-founder Income Report</a></li>
                    
                    
                    
                    <li><a href="cofounder-income-reports.php">Unpaid Co-founder Income Report</a></li>-->
                    
                    
                    <!--<li><a href="reffral-income-reports1.php">Reffral Income Report</a></li>
                    <li><a href="sponsord-income-reports.php">Sponsor Income Report</a></li>
                    <li><a href="bonus-onrank-reports.php">Bonus On Rank Report</a></li>
                    <li><a href="royalty-achiverslist.php">Rank Achiever List</a></li>
                    <li><a href="royalty-bonusreport.php">Royalty Bonus Report</a></li>-->
                    <!--<li><a href="matching-income-reports.php">Matching Bonus Report</a></li>-->
                    <!--<li><a href="residual-income-reports1.php">Residual Income Report</a></li>
                    <li><a href="recruiting-income-reports1.php">Recruiting Income Report</a></li>-->
                    
                        </ul>
                    </li>
                    
                      
                    <!--<li><a href="rank-bonus-achiver-list.php"><i class="fa fa-laptop"></i> <span>Royality Income Achiever List</span></a></li>-->
                  

                <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>KYC Management</span></a>
                        <ul class="child-list">
                        <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='14'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>
                        </ul>
                    </li> 

        <!--<li class="menu-list">-->
        <!--                <a href="#"><i class="fa fa-laptop"></i>  <span>Investment Management</span></a>-->
        <!--              <ul class="child-list">-->
                             <?php //$men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='15'");
        //           while($menu=mysqli_fetch_array($men))-->
        //           {
                 ?>  
        <!--            <?php //$link=$menu['link'];?>  -->
        <!--            <?php //if(in_array($link,$privileage)):?>-->
        <!--                    <li><a href="<?php //echo $menu['link'];?>"><?php //echo $menu['sub_cat_name'];?></a></li>-->
                   <?php //endif; ?>  <?php // } ?>
        <!--                </ul>-->
        <!--            </li>-->

                    <!--<li class="menu-list">-->
                    <!--    <a href="#"><i class="fa fa-laptop"></i>  <span>Wallet Management</span></a>-->
                    <!--    <ul class="child-list">-->
                          
                             
                    <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='4'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <!--<li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>-->
                    <?php endif; ?>  <?php  } ?>       
                    <!--    </ul>-->
                    <!--</li>-->
 
                   <!--  <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Algorithmic Management</span></a>
                        <ul class="child-list">
                            
                    <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `sub_admin_sub_category` WHERE cat_id='16'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>       
                        </ul>
                    </li> -->
                    <!--
                <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Investment Management</span></a>
                      <ul class="child-list" style="display: none;">
                                
                      
                                                <li><a href="pending-user-request.php">Pending Investment Request</a></li>
                                                <li><a href="approved-user-request.php">Approved Investment Request</a></li>

                                                <li><a href="rejected-user-request.php">Rejected Investment Request</a></li>
                                              </ul>
                    </li>-->
                  <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Payout Management</span></a>
                        <ul class="child-list">
                            
                          <li><a href="open-payout.php">Open Payout List</a></li>
                          <li><a href="close-payout.php">Close Payout List</a></li>
                            
                          <!--<li><a href="open-monthly-closing.php">Generate Payout List</a></li>-->
                          <!--<li><a href="all-open-monthly-closing.php">All Payout List</a></li>-->
                          <!--<li><a href="monthly-business-report.php">Members Closing Report</a></li>-->
                          
                    <?php// $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='5'");
                   // while($menu=mysqli_fetch_array($men))
                  //  {
                    ?>  
                    <?php //$link=$menu['link'];?>  
                    <?php // if(in_array($link,$privileage)):?>
                            <!--<li><a href="<?php // echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>-->
                    <?php //endif; ?>  <?php // } ?>       
                        </ul>
                    </li>
                    
                    <!-- <li class="menu-list"><a href="#"><i class="fa fa-bar-chart-o"></i> <span>Withdrawal Management </span></a>-->
                    <!--    <ul class="child-list">-->
                    <!--        <li><a href="open-withdrawal-request-new.php"> Open Withdrawal Request</a></li>-->
                    <!--        <li><a href="close-withdrawal-request-new.php"> Close Withdrawal Request</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    
                    



                    <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Query Tickets Management</span></a>
                        <ul class="child-list">
                    <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='6'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>  

                    
                        </ul>
                         
                    </li>

 
                    <!--  <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Voucher Management</span></a>
                        <ul class="child-list">
                            
                    <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `sub_admin_sub_category` WHERE cat_id='16'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>       
                        </ul>
                    </li>
 -->

                    <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>Settings Management</span></a>
                        <ul class="child-list">
                    <?php $men=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sub_admin_sub_category where cat_id='8'");
                    while($menu=mysqli_fetch_array($men))
                    {
                    ?>  
                    <?php $link=$menu['link'];?>  
                    <?php if(in_array($link,$privileage)):?>
                            <li><a href="<?php echo $menu['link'];?>"><?php echo $menu['sub_cat_name'];?></a></li>
                    <?php endif; ?>  <?php  } ?>  
                 
                         
                   
                        </ul>
                    </li>
                    <!-- <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Plot Management</span></a>-->
                    <!--    <ul class="child-list">-->
                    <!--      <li><a href="manage-product.php"> Manage Plot Details</a></li>-->
                          <!-- <li><a href="manage-category.php"> Manage Main Category</a></li>
                    <!--        <li><a href="manage-sub-category.php"> Manage Sub Category</a></li>-->
                    <!--         <li><a href="manage-sub-sub-category.php"> Manage Sub Sub Category</a></li>-->
                    <!--    </ul>-->
                    <!--</li> -->
                    
                    
                     <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Service Management</span></a>
                        <ul class="child-list">
                            <li><a href="manage-category.php"> Manage Service Type</a></li>
                            <!--<li><a href="manage-projects.php"> Manage Projects</a></li>-->
                            <li><a href="manage-property.php"> Manage Service Details</a></li>
                            <!--<li><a href="manage-size-price-property.php"> Manage Property Size/Price</a></li>-->
                            <!--<li><a href="property-billing.php"> Billing</a></li>-->
                            <!--<li><a href="property-billing-history.php"> Billing Reports</a></li>-->
                    

                          <!--<li><a href="manage-product.php"> Manage Plot Details</a></li>-->
                          <!-- 
                            <li><a href="manage-sub-category.php"> Manage Sub Category</a></li>
                             <li><a href="manage-sub-sub-category.php"> Manage Sub Sub Category</a></li>-->
                        </ul>
                    </li> 
                    
                     <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span> Billing Management</span></a>
                        <ul class="child-list">
                           
                            <li><a href="property-billing.php">Create Billing</a></li>
                            <li><a href="property-billing-history.php">All Billing Reports</a></li>
                            
                          <!--<li><a href="manage-product.php"> Manage Plot Details</a></li>-->
                          <!-- 
                            <li><a href="manage-sub-category.php"> Manage Sub Category</a></li>
                             <li><a href="manage-sub-sub-category.php"> Manage Sub Sub Category</a></li>-->
                        </ul>
                    </li> 
                    
                    <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Loyalty Program Management</span></a>
                        <ul class="child-list">
                            <li><a href="manage-loyalty-category.php">Manage Category</a></li>
                            <li><a href="property-billing-history.php">All Billing Reports</a></li>
                            
                        </ul>
                    </li> 
                    
                    <li><a href="official-announcement.php"><i class="fa fa-laptop"></i> <span> official announcement</span></a></li>
                    <?php if ($_SESSION['user_id']=='123456') {   ?>

                       <li><a href="sub-admin-manage.php"><i class="fa fa-laptop"></i> <span>Sub Admin Management</span></a></li> 
                   <?php } ?>

                </ul>
                <!--sidebar nav end-->


            </div>
        </div>