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


if(isset($_POST['submit']))
{


$ser = $_POST['services'];


 $q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into vender_services set service_name = '$ser', date = NOW() ");
 
 
 if($q1) {
     
     echo "successfully";
 } else {
     
     echo "error";
 }



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
    <header class="text-center">
      
      <span style="color:green;"><?php echo @$_GET['msg'];?></span>
    </header>
                       
    <div class="container log-row">
        <section class="panel">
            
            <div class="panel-body">
                
                <form  method="post"  action="" >
                  
                    <div class="form-group col-sm-12"> 
                        <div class="col-sm-6 mar-t-b">
                            <label for="exampleInputEmail1">Add Services</label>
                            <input type="text" class="form-control" placeholder="Enter service" name="services">
                        </div>
                    </div>
                   
                    <div class="form-group col-sm-12" style="margin-top: 20px; margin-right: 30px; display:flex;"> 
                            
                            <button class="btn btn-success  text-right" type="submit" name="submit">Add Services</button>
                    </div>  
                </form>
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
                var fieldHTML = '<div class="col-sm-4 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Our service</label><select class="form-control" style="width: 100%;" name="service[]"><option  value="">select services type</option><option  value="cloths type service">Cloths Type Service</option><option  value="books type service">Books type Service</option><option  value="fruits type service">Fruits type Service</option><option  value="food type service">Food Type Service</option></select></div><div class="col-sm-4 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1">Title</label><input type="text" class="form-control" placeholder="Title" name="title[]" style="width: 100%;"> </div><div class="col-sm-4 mar-t-b" style="margin-top:10px;"><label for="exampleInputEmail1" style="margin-top:22px;">Discription</label> <textarea id="discription" name="discription[]" rows="4" cols="50" style="width:200px; height:42px; margin-top: 22px;"> </textarea></div>';
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
        owl.reinit();
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
</body>
</html>