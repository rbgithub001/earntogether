<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
  

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Welcome</title>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,700" rel="stylesheet">
    <!--Font icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/fonts/themify/style.min.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/flipclock/flipclock.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/swiper/css/swiper.min.css">
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/demo.min.css">
    <!-- END CRYPTO CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/template-3d-graphics.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
	<style>
		.accordion .fa{
			margin-top: 0.3rem;
			float:right;
		}
		.btn {
			color: #fff;
			width:100%;
			text-align:left;
		}
		.btn:hover {
			text-decoration:none;
			color:#fff;
		}
		.accord{
			background: #194089;
			border-radius: 50px;
			color: #fff;
			margin-bottom: 10px;
		}
	</style>
	
  </head>
  <body class=" 1-column   inner-page template-3g-graphics" data-menu-open="hover" data-menu="">
    <!-- Preloader | Comment below code if you don't want preloader-->
<div id="loader-wrapper">
    <svg viewbox=" 0 0 512 512" id="loader">
        <linearGradient id="loaderLinearColors" x1="0" y1="0" x2="1" y2="1">
            <stop offset="5%" stop-color="#28bcfd"></stop>
            <stop offset="100%" stop-color="#1d78ff"></stop>
        </linearGradient>        
        <g>
            <circle cx="256" cy="256" r="150" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <g>
            <circle cx="256" cy="256" r="125" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <g>
            <circle cx="256" cy="256" r="100" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <g>
            <circle cx="256" cy="256" r="75" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <circle cx="256" cy="256" r="60" fill="url(#loaderImage)" stroke="none" stroke-width="0" />

        <!-- Change the preloader logo here -->
        <defs>
            <pattern id="loaderImage" height="100%" width="100%" patternContentUnits="objectBoundingBox">
                <image href="theme-assets/images-counter/loader-logo.png" preserveAspectRatio="none" width="1" height="1"></image>
            </pattern>
        </defs>
    </svg>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!--/ Preloader -->

    <!-- /////////////////////////////////// HEADER /////////////////////////////////////-->

    <!-- Header Start-->
    <?php include("includes/header.php"); ?>
    <!-- /Header End-->

    <!-- //////////////////////////////////// CONTAINER ////////////////////////////////////-->
    <div class="content-wrapper">
      <div class="content-body">
        <main><!-- Blog Area -->
<section class="blog-area" id="head-area">
	<div class="blog-head" data-midnight="white">
		<div class="blog-head-content">
			<img src="theme-assets/images/blockchain.png" alt="Blog 1">
		</div>
	</div>
	<div class="container blog-container">
		<!-- Blog listing page -->
		<div class="post-listing">
			<!-- Breadcrumb -->
			<div class="breadcrumb">
				<a href="index.php">Home</a> / 
				<a class="current">Legal</a>
			</div>
			<!--/ Breadcrumb -->
			<div class="row">
				<!-- Blog Content area -->
				<div class="col-md-6">
					<div class="card square">
						<div class="card-body">
							<h2>SYNDICATE ROOM LTD</h2>
							<p>Company number <strong>(07697935)</strong></p>
							<p>Registered Office Address</p>
							<p><strong>Wellington House, East Road, Cambridge, England, CB1 1BH</strong></p>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="card square">
						<div class="card-body">
							<p><img src="images/legal2.jpg" class="img-fluid" alt="" /></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ Blog listing page -->
	</div>
</section>
<!--/ Blog Area -->
        </main>
      </div>
    </div>
    <!-- //////////////////////////////////// FOOTER ////////////////////////////////////-->

	<?php include("includes/footer.php"); ?>

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="theme-assets/vendors/flipclock/flipclock.min.js"></script>
    <script src="theme-assets/vendors/swiper/js/swiper.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME JS-->
    <script src="theme-assets/js/theme.min.js"></script>
    <script src="theme-assets/js/sales-notification.js"></script>
    <script src="theme-assets/js/scripts/demo.min.js"></script>
    <!-- END CRYPTO JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
	<script>
		$(document).ready(function(){
			// Add minus icon for collapse element which is open by default
			$(".collapse.show").each(function(){
				$(this).prev(".accord").find(".fa").addClass("fa-minus").removeClass("fa-plus");
			});
			
			// Toggle plus minus icon on show hide of collapse element
			$(".collapse").on('show.bs.collapse', function(){
				$(this).prev(".accord").find(".fa").removeClass("fa-plus").addClass("fa-minus");
			}).on('hide.bs.collapse', function(){
				$(this).prev(".accord").find(".fa").removeClass("fa-minus").addClass("fa-plus");
			});
		});
	</script>
  </body>
</html>