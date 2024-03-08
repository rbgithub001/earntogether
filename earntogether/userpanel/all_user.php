<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
      <?php include("includes/tittle.php");?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        

        <!-- App css -->
       <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/core.css" rel="stylesheet" type="text/css" />
        <link href="css/components.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.css" rel="stylesheet" type="text/css" />
        <link href="css/pages.css" rel="stylesheet" type="text/css" />
        <link href="css/menu.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php  include("includes/topbar.php"); ?>

            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
           <?php  include("includes/sidebar.php"); ?>
            <!-- Left Sidebar End -->
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                      <br/>
                        <!-- end row -->

                      <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <h4 class="m-t-0 header-title"><b>All User</b></h4> 
                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                         <thead>
                      <tr>
                         <th style="color:#6ABF4B;">#</th>
                         <th style="color:#6ABF4B;">User ID</th>
                         <th style="color:#6ABF4B;">username</th>
                         <th style="color:#6ABF4B;">email</th>
                         <th style="color:#6ABF4B;">Phone</th>
     
                      </tr>
                    </thead>
                                
                                        <tbody>
                     
                     <?php
                      $i=1;
                      $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration where ref_id='$userid'  order by id desc");
                      while($data1=mysqli_fetch_array($data))
                      {
                     ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $data1['user_id'];?></td>
                        <td><?php echo $data1['username'];?></td>
                        <td><?php echo $data1['email'];?></td>
                        <td><?php echo $data1['telephone'];?></td>
                         
                      </tr>

                      <?php $i++;} ?>
                     
                    </tbody>
                 
                                    </table>
                                </div>
                            </div>
                        </div>


                       
                        <!-- end row -->

                    </div> <!-- container -->

            <!-- content -->

              <?php  include("includes/footer.php"); ?>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/jquery.slimscroll.js"></script>

        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>

        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.bootstrap.min.js"></script>
        <script src="js/jszip.min.js"></script>
        <script src="js/pdfmake.min.js"></script>
        <script src="js/vfs_fonts.js"></script>
        <script src="js/buttons.php5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>
        <script src="js/dataTables.fixedHeader.min.js"></script>
        <script src="js/dataTables.keyTable.min.js"></script>
        <script src="js/dataTables.responsive.min.js"></script>
        <script src="js/responsive.bootstrap.min.js"></script>
        <script src="js/dataTables.scroller.min.js"></script>
        <script src="js/dataTables.colVis.js"></script>
        <script src="js/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="js/jquery.datatables.init.js"></script>

        <!-- App js -->
        <script src="js/jquery.core.js"></script>
        <script src="js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>


    </body>
</html>