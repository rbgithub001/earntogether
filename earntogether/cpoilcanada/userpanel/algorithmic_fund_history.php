<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <?php include("title.php");?>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <style type="text/css">
    #example2{
      margin-bottom: 20px;
    }
    .panel-primary{
      padding: 15px;
    }
    .m-b{
      margin-bottom: 25px;
    }
    </style>
  </head>

  <body class="">

    <div class="animsition">  
    
    <?php include("sidebar.php");?>
      <main id="playground">
 
      
         <?php include("top.php");?>
        <!-- PAGE TITLE -->
        <section id="example2">
          <div class="row">
            <div class="col-md-8">
              <!-- <h1>My Used E Pins</h1> -->
              <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            </div>

            <div class="col-md-4" style="float:right;">

             <ol class="breadcrumb pull-right no-margin-bottom">
                <li><a href="#">Algorithmic</a></li>
                <li><a href="#">My Algorithmic List</a></li>
              </ol>

            </div>
          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">My Fresh Algorithmic</h4>

                <div class="panel-body">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Sender Id</th>
                        <th>Amount</th>
                    <!--     <th>BTC(Amount)</th> -->
                        <th>Create Date</th>
                        <th>Code Status</th>
                        <!-- <th>Admin Status</th>
                       <th>Algorithmic Status</th> -->
                        <th>View Code</th>
                        <th>Action</th>
                        <!--<th>Transfer</th>-->
                       
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $i=1;

                    /* $data = mysqli_query($GLOBALS["___mysqli_ston"],"select p.user,p.usd,p.amount,p.status,q.crt_date,q.created_by_user,q.status,q.pin_no from pin_paymentproof as p join pins as q on p.user=q.receiver_id where p.user='".$userid."'");*/
                   $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from pins where receiver_id='$userid'   order by id desc");

                /*   select p.user,p.usd,p.amount,p.status,q.crt_date,q.created_by_user,q.status,q.pin_no from pin_paymentproof as p left join pins as q on p.user=q.receiver_id where p.user='6021837'

*/
                     /*$data = mysqli_query($GLOBALS["___mysqli_ston"],"select p.user,p.usd,p.amount,p.status,q.crt_date,q.created_by_user,q.status,q.pin_no from pin_paymentproof as p left join pins as q on p.user=q.receiver_id where p.user='$userid'");*/

                 //     $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from pin_paymentproof where user='$userid' order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                       $data_pin=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from pins where pin_no='".$data1['pin_no']."' order by id desc"));

                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['sender_id'];?></td>
                      <!--    <td><?php echo $data1['usd'];?></td> -->
                         <td><?php echo $data1['amount'];?></td>
                          <td><?php echo $data_pin['crt_date'];?></td>
                       <!--    <td><?php echo $data_pin['created_by_user'];?></td> -->
                          <!-- <td>Fresh</td> -->
                          <!-- <td><?php if($data1['status']==1) { echo 'Approved';}else{ echo 'Pending';}?></td> -->
                          <td><?php if($data_pin['status']==1) { echo 'Used';}else{ echo 'Fresh';}?></td> 
                        
                        <!--   <?php if($data1['status']=='Pending'){?> -->

                            <td></td><td></td>
                            
                          
                          <!--   <?php }else{?> -->
                              <td><input type="button" name="view" value="view code" id="<?php echo $data_pin["pin_no"]; ?>" class="btn btn-info view_data" /></td>  
                              <?php if($data_pin['status']==0){?>
                              <td><a href="pin_transfer.php?pins=<?php echo $data_pin["pin_no"]; ?>" class='btn btn-primary'>Transfer To Other User</a></td>
                            <?php }else{ ?>
                              <td><span style="color: red;">Not Allowed </span></td>
                            <?php }?>

                        <!--     <?php } ?> -->

                      
                          <!--<td><a href="transfer-epin.php?pin=<?php echo $data1['pin_no'];?>">Click Here</a></td>-->
                      </tr>


                            <!---pop up modal code-->

                                <!--pop modal code end--> 

                      <?php $i++;} ?>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

                        <div id="dataModal" class="modal fade" data-backdrop="static" data-keyboard="false">  
                          <div class="modal-dialog">  
                               <div class="modal-content">  
                                    <div class="modal-header">  
                                         <button type="button" class="close" data-dismiss="modal" style="color:black;font-size: 24px;">&times;</button>
                                         <!-- <h4 class="modal-title" style="text-align: center;font-family: monospace; color: black;">Unused Algorithmic Code</h4>  --> 
                                    </div>  
                                    <div class="modal-body" id="employee_detail">  
                                    </div>  
<!--                                     <div class="modal-footer">  
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                    </div> -->
                               </div>  
                          </div>  
                     </div>  


                    <script type="text/javascript">
                      $(document).ready(function(){  
                        $('.view_data').click(function(){  
                             var pin_id = $(this).attr("id");  

                             $.ajax({  
                                  url:"select_req_pin.php",  
                                  method:"post",  
                                  data:{pin_id:pin_id},  
                                  success:function(data){  
                                       $('#employee_detail').html(data);  
                                       $('#dataModal').modal("show");  
                                  }  
                             });  
                        });  
                   });  
 
                    </script>
                     <script>
                     document.getElementById("btnCopy").addEventListener("click", function(){
                       var copyText = document.getElementById("myText");
                       copyText.select();
                       document.execCommand("Copy");
                       alert("Copied Algorithmic Code!");
                     });
                    </script>
                    </tbody>
                  </table>

                </div>
              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->

  <!--       <div class="col-md-12 text-center">

 <a href="bh_export_fresh_epin.php?userid=<?=$userid;?>"><input type="submit" name="update" value="Export in CSV" class="btn btn-primary"></a>   


          </div>
 -->




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