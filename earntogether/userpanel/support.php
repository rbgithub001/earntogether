<?php include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include("title.php");?>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='css/material-design-iconic-font.min.css' rel='stylesheet' type='text/css'/>

     <link href='css/_misc2.css' rel='stylesheet' type='text/css'/>
     <link href="css/turbo.css" rel="stylesheet" />
      <link href="css/mixins.css" rel="stylesheet" />
    
    <link href='css/verticalbargraph.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">
    <div class="animsition">  
    
    <?php include("sidebar.php");?>


      <main id="playground">

            
      
         <?php include("top.php");?>
   


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8" style="float:none;color:#900;text-align: center;font-size: 16px;">
            <!--<h1>Downline Member Report</h1>-->
            <!--<p><a href="#" target="_blank" class="btn btn-danger btn-sm">DataTables documentation</a></p>-->
            <?php echo @$_GET['msg'];?>
          </div>

          <!--<div class="col-md-4">

            <ol class="breadcrumb pull-right no-margin-bottom">
              <li><a href="#">Team Report</a></li>
              <li><a href="#">Total Downline Member Report</a></li>
             
            </ol>

          </div>-->
        </section> <!-- / PAGE TITLE -->

        <div class="col-lg-12 center-block" >
                    
                </div>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

              <section class="panel panel-primary">
                <h4 class="m-t-none text-primary-lt font-thin-bold inline font-semi-bold">RAISE TICKET</h4>
				
                <div class="panel-body">
    <form action="raiseticket_func.php" method="post" class="form_container left_label">

								<div class="form-group">
									<label class="field_title">Category </label>
									<div class="form_input">
										<select data-placeholder="Category" class="form-control" id="exampleInputAddress" tabindex="13" name="category">
											<optgroup label="Select Category">
											<option>Financial</option>
											<option>Technical</option>
											<option>General </option>
											<option>Product </option>
                      <option>Others </option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="field_title">Subject</label>
									<div class="form_input">
										<input name="filed01" type="text" tabindex="1" class="form-control" id="exampleInputAddress" />
									</div>
								</div>
								<div class="form-group">
									<label class="field_title">Message </label>
									<div class="form_input">
										<textarea name="filed06" class="form-control" id="exampleInputAddress" cols="50" rows="5" tabindex="5" ></textarea>
									</div>
								</div>
								<div class="form_grid_12">
									<div class="form_input">
										<button type="submit" class="btn btn-primary">Submit</button>
										<!--<a href="support.php"><button type="button" class="btn btn-primary">Back</button></a>-->
									</div>
								</div>
						</form>
						</div>
						

              </section>
            

            </div> <!-- /col-md-6 -->

  

          </div>

      
        </div> <!-- / container-fluid -->


         

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