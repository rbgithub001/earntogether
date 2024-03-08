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

if($_POST[submits])
{

    //$page_flag=0;

    $frm=$_REQUEST['from'];
    $til=$_REQUEST['to'];

    $dfrom=explode("/",$frm);

    $fdate=$dfrom[2]."-".$dfrom[0]."-".$dfrom[1]; 

    $dednd=explode("/",$til);
    $edate=$dednd[2]."-".$dednd[0]."-".$dednd[1];



    $username=$_REQUEST['id'];  



    if($username!=''){
    
        $query123=" where user_id='$username'";  
    
    }
  
    if($frm!='' && $til!=''){
        $query123="where  registration_date>='$fdate' and   registration_date<='$edate' ";  
    }
    //$query123=" and p_date>='$date1' and   p_date<='$date2' ";  
}   

?>


<?php
if(isset($_POST['submit'])){
    
}

?>

<!DOCTYPE html>
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
    <style type="text/css">
      h2.form-heading {

    font-size: 27px;
    text-align: center;
    margin: -37px 8px 37px 0;
  }
  .form-control {
    border: 1px solid #8e8585;
    width: 85%;
  }
   
    </style>
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

     <script>
function coderHakan()
{
var sayfa = window.open('','','width=500,height=500');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('printArea').innerHTML);
sayfa.document.close();
sayfa.print();
}
</script>
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

                    <!--<div class="col-sm-12 text-right">

                        <a href="export_member_list.php" class="btn btn-success">export in excel</a>

                    </div>-->

                </div><br />

                <div class="row">
                    <div class="col-sm-12">
                        <div class="login-logo">
                    
                        </div> 
                                 
                        <div class="log-row">
                            <section class="panel">
                                <header class="text-center ">
                                    <h3 class="main-head"> Vendor Registration Form </h3>
                                    <span style="color:green;"><?php echo @$_GET['msg'];?></span>
                                </header>
                                <div class="panel-body">
                                    <form name="registration" method="post"  method="post" action="../post-action.php"  onsubmit="return validates1()"enctype='multipart/form-data' >
                                        <input type="hidden" name="action" value="Poc_Registration">
                        
                                        <!--<div class="col-sm-12 mar-t-b">
                                          <input type="text" class="form-control" placeholder="Enter Sponsor Id" name="sponsorid" id="sponsorid" autofocus required="" autocomplete="off">
                                          <span id="checkuser_sponsorid"></span>
                                        </div><br><br><br>-->
                                        <!-- <div class="col-sm-6 mar-t-b">
                                             <input type="file" class="form-control" placeholder="Profile Upload" name="file" required="">
                                                            
                                            </div>
                                        -->
                                        <div class="form-group col-sm-12">
                                            
                                             <div class="col-sm-6 mar-t-b">
                                                 <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" placeholder="Username" name="username" id="username11" autofocus required="">
                                                <span id="checkuser"></span>
                                            </div>
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Password</label>
                                              <input type="password" class="form-control" placeholder="Password" name="password" >
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                        
                                            <div class="col-sm-12 mar-t-b">
                                                <label for="exampleInputEmail1">About Company</label>
                                                <textarea id="discription1" class="form-control" name="discription_one" cols="5" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            
                                            <!-- <div class="col-sm-6 mar-t-b">
                                                <select class="form-control" required name="stock_point">
                                                      <option value="">Seect Stock Point</option>
                                                      <?php 
                                                                   $q1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM poc_registration WHERE franchise_satus='1'");
                                                                   while($st=mysqli_fetch_array($q1)){
                                                              ?>
                                                              <option value="<?php echo $st['user_id'];?>">[User ID:<?php echo $st['user_id'];?>]<?php echo $st['username'];?></option>
                                                            <?php }?>
                                                    
                                                      
                                                </select>
                                            </div> -->
                                            <input type="hidden" class="form-control" name="franchise_category" autofocus value="Normal Franchise">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <div class="col-sm-12 mar-t-b"><h4><strong>Company Profile</strong></h4></div>
                                       </div>
                                        <div class="form-group col-sm-12">
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Company Registration Number</label>
                                              <input type="text" class="form-control" placeholder="Company Registration Number" name="company_reg_no" >
                                            </div>
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Company Name/Business Name</label>
                                                <input type="text" class="form-control" placeholder="Company Name" name="firstname" >
                                            </div>
                                            <!--<div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Last Name</label>
                                              <input type="text" class="form-control" placeholder="Last Name" name="lastname" >
                                            </div>-->
                                        </div>    
                                        <div class="form-group col-sm-12">           
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" >
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">Country</label>
                                                <select class="form-control" name="country" id="country"  required>
                                                     <option value="">--select country--</option>
                                                    <?php 
                                                     $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `country`");
                                                    while($cnrty = mysqli_fetch_array($resos2)){ ?>
                                                        <option value="<?php echo $cnrty['name']?>" data="<?php echo $cnrty['phonecode'] ?>">  <?php echo $cnrty['name']?>(<?php echo $cnrty['phonecode']?>)</option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                             <!--<div class="col-sm-2 mar-t-b">
                                                <label for="exampleInputEmail1">Country Code</label>
                                            
                                                   <select class="form-control" name="phonecode" id="phonecode" required>
                                                    <option value="">--select country code--</option>-->
                                                    <?php 
                                                    // $phonecodes=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `country`");
                                                   // while($phonecodess = mysqli_fetch_array($phonecodes)){ ?>
                                                      <!--  <option value="<?php echo $cnrty['phonecode']?>"><?php echo $cnrty['name']?>(<?php echo $cnrty['phonecode']?>)</option>-->
                                                    <?php //}
                                                    ?>
                                                 <!--  </select>
                                            </div>-->
                                           
                                            
                                        </div>    
                                        <div class="form-group col-sm-12">  
                                           
                                            
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">State</label>
                                                    <input type="text" class="form-control" placeholder="State" name="state" autofocus required="">
                                                    <!--   <select class="form-control" name="state" id="main_state">
                                                         <option value="">--select state--</option> 
                                                         
                                                      <?php 
                                                           $q1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM states WHERE country_id='101'");
                                                          /* $st=mysqli_fetch_array($q1);
                                                           print_r($st);*/
                                                           while($st=mysqli_fetch_array($q1)){
                                                      ?>
                                                      <option value="<?php echo $st['name'];?>"<?php if($f['state']==$st['name']){ echo "selected='selected'";}?> main_st="<?php echo $st['id']?>"><?php echo $st['name'];?></option>
                                                    <?php 
                                                    
                                                    }?>
                                                    </select>-->
                                            </div>
                                            
                                             <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">City</label>
                                                <input type="text" class="form-control" placeholder="City/Town" name="city" >
                                           </div>
                                            
                                            
                                        </div>
                                        <div class="form-group col-sm-12">  
                                           
                                           
                                          <div class="col-sm-6 mar-t-b">
                                              <label for="exampleInputEmail1">Full Address</label>
                                          <input type="text" class="form-control" placeholder="Address" name="address" >
                                           </div>
                                           
                                           <div class="col-sm-2 mar-t-b">
                                                <label for="exampleInputEmail1">Country Code</label>
                                               <input type="text" name="phonecode" id="phonecode" class="form-control" required readonly>
                                           </div>
                                           
                                            <div class="col-sm-4 mar-t-b">
                                                <label for="exampleInputEmail1">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Phone Number" id="number" name="phone" >
                                                <span id="epan" style="color:#FF0000;"></span>
                                           </div>
                                        </div>
                                        <div class="form-group col-sm-12"> 
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Landmark</label>
                                                <input type="text" class="form-control" placeholder="Landmark" name="lendmark" >
                                            </div>
                                            
                                           
                                            
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Product Gallery</label>
                                                <input type="file" class="form-control" multiple class="form-control" placeholder="" name="file[]" id="file" autofocus required="" >
                                            </div>
                                            
                                        </div>
                                        <div class="form-group col-sm-12"> 
                                            <div class="col-sm-6 mar-t-b">
                                               <label for="exampleInputEmail1">Brand Logo</label>
                                                <input type="file" class="form-control" class="form-control" name="cmp_logo" id="file1"  required="" >
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-md-12 group" style="padding-left:30px;" id="repeatCols" >
                                            <div class="row">
                                                <div class="col-sm-3 mar-t-b" style="margin-top:10px;">
                                                    <label for="exampleInputEmail1">Our service</label>
                                                    <select class="form-control" style="width: 100%;" name="service[]">
                                                    <option value="">Select Services</option>
                                                          <?php 
                                                     $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `vender_services`");
                                                    while($cnrty = mysqli_fetch_array($resos2)){ ?>
                                                        <option value="<?php echo $cnrty['id']?>" ><?php echo $cnrty['service_name']?></option>
                                                    <?php }
                                                    ?>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 mar-t-b" style="margin-top:10px;">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="text" class="form-control" placeholder="Title" name="title[]" style="width: 100%;">
                                                </div>
                                                <div class="col-sm-6 mar-t-b" style="margin-top:10px;">
                                                    <label for="exampleInputEmail1">Discription</label>
                                                    <textarea id="discription" name="discription[]" rows="1" class="form-control"></textarea>
                                                </div>
                                             </div>
                                        </div>
                                        <div class="form-group col-sm-6" style="margin-top: 20px; margin-left: 15px; display:flex;justify-content: space-between;"> 
                                            <a class="add_button btn btn-primary" href="javascript:void(0);">Add New</a>
                                        </div> 
                                        <div class="form-group col-sm-12">
                                            <h3>Commission Details</h3>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Commission Percent</label>
                                                <input type="number" class="form-control" class="form-control" name="commission_percent" id="commission_percent"  required >
                                            </div>
                                            <div class="col-sm-6 mar-t-b">
                                                <label for="exampleInputEmail1">Credit Limit</label>
                                                <input type="number" class="form-control" class="form-control" name="credit_limit" id="credit_limit"  required >
                                            </div>
                                       </div>
                                        <div style="text-align: center; width:100%;">
                                            <div class="form-group col-sm-6" style="margin-top: 20px; margin-left: 15px; display:flex;justify-content: space-between;"> 
                                                    <button class="btn btn-success  text-right"  type="submit" name="submit" style="padding: 8px 10px!important;">Submit</button>
                                            </div>     
                                        </div>
                                     
                                    </form>
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

<script type="text/javascript">
         $(document).ready(function(){
               $('#main_state').on('change',function(){
                   
                   var s_id=$('option:selected',this).attr('main_st');
                  $.ajax({
                       url : 'city-resp.php',
                       type : 'POST',
                       data :{'s_id':s_id},
                       success:function(data){
                        // console.log(data);
                            $('#main_city').html(data);
                       }
                  });


               })
         });
          
       </script>
       
         <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.group'); //Input field wrapper
        //var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
         
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(e){
            e.preventDefault();
            //Check maximum number of input fields
            if(x < maxField){ 
                var fieldHTML = '<div class="row"><div class="col-sm-3 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Our service</label><select class="form-control" style="width: 100%;" name="service[]"><?php $resos2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `vender_services`"); while($cnrty = mysqli_fetch_array($resos2)){ ?><option value="<?php echo $cnrty['id']?>" ><?php echo $cnrty['service_name']?></option> <?php }?></select></div><div class="col-sm-3 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Title</label><input type="text" class="form-control" placeholder="Title" name="title[]" style="width: 100%;"> </div><div class="col-sm-5 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Discription</label><textarea id="discription" name="discription[]" rows="1" class="form-control"></textarea> </div></div>';
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
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
        //owl.reinit();
    });

</script>


</script>
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" type="text/css" 
              href="css/jquery-ui-1.10.4.custom.min.css"/>
       <script type="text/javascript">
     $(document).ready(function() {
    $("#username11").keyup(function (e) {
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    var username = $(this).val();
    if(username.length < 1){$("#checkuser").html('');return;}
    if(username.length >= 1){
    
    $.post('regis2.php', {'username':username}, function(data) {
    $("#checkuser").html(data);
    });
    }
    }); 
    });
       </script>
  <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
        $("#bdate1").datepicker({
            changeMonth:true,
        changeYear:true
        });
  });
       </script>
       
       <script>
                $(document).ready(function(){
                  $("#sponsorid").blur(function(){
                  var idd = $("#sponsorid").val();
                  $.ajax({
                      type:"POST",
                      url:"check-sponsorid.php",
                      data:{"siddd":idd},
                      success: function(result){
                      $("#checkuser_sponsorid").html(result);
                      if(idd==''){
                           $("#checkuser_sponsorid").html('');
                      }
                }});
            });
     });
</script>
<script type="text/javascript">
         $(document).ready(function(){
               $('#main_state').on('change',function(){
                   
                   var s_id=$('option:selected',this).attr('main_st');
                  $.ajax({
                       url : 'city-resp.php',
                       type : 'POST',
                       data :{'s_id':s_id},
                       success:function(data){
                        // console.log(data);
                            $('#main_city').html(data);
                       }
                  });


               })
         });
          
       </script>
       
       <script type="text/javascript">
 
 $(document).ready(function() {
    $("#number").blur(function (e) {
 var regExp = /[0-9]{10}/; 
 var txtpan = $(this).val(); 

 if (txtpan.length == 10 ) { 
  if( txtpan.match(regExp) ){ 
 
   $("#epan").html('Mobile match found');
  }
  else {
  
   $("#epan").html('Not a valid Mobile number');
   event.preventDefault(); 
   $("#number").val('');
  } 
 } 
 else { 
      
       $("#epan").html('Please enter 10 digits for a valid Mobile number');
       $("#number").val('');
       event.preventDefault(); 
 } 
});
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#country").on('change',function(e) {
var value =$(this).find(':selected').attr('data');
document.getElementById("phonecode").value = value;
//$('#phonecode').html("<option value="+value+">"+value+"</option>");
});
});
</script>

</body>
</html>