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
				<a class="current">FAQ</a>
			</div>
			<!--/ Breadcrumb -->
			<div class="row">
				<!-- Blog Content area -->
				<div class="col-md-12 col-lg-12">
					
					<!-- Blog Post-->
					<div class="card square">
						<div class="card-body">
							<div class="accordion" id="accordionExample">
								<div class="accord" id="headingOne">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i> 1. How to register?</button>									
									</h2>
								</div>
								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<p>Click the Register, fill in all the fields and click the "register" button. Indicate the current mail and remember the password. Data recovery is not possible! If you already have an account, then click the Login button and log in.</p>
									</div>
								</div>
							
								<div class="accord" id="headingTwo">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i> 2. How long is the contract?</button>
									</h2>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										<p>When you replenishing account, you enter into an agreement with the company for 24 months. Each subsequent replenishment extends the duration of the contract for the same period.</p>
									</div>
								</div>
							
								<div class="accord" id="headingThree">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i> 3.  Can I change my password or mail?</button>                     
									</h2>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<p>Your referral link is tied to mail, therefore it cannot be changed. You can change the password on the site in the "Profile" section in your account. Password reset for e-mail is not possible!</p>
									</div>
								</div>
								
								<div class="accord" id="heading4">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4"><i class="fa fa-plus"></i> 4.  What is the minimum amount to withdraw money?</button>                     
									</h2>
								</div>
								<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
									<div class="card-body">
										<p>Minimum amount required to withdraw money: 0.005 btc Ethereum: 0.04 eth. Litecoin:- 4.0 ltc</p>
										<p>You can submit an application for withdrawal on the page "Withdrawal".</p>
									</div>
								</div>
								
								<div class="accord" id="heading5">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5"><i class="fa fa-plus"></i> 5.  What is the minimum deposit amount?</button>                     
									</h2>
								</div>
								<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
									<div class="card-body">
										<p>The minimum deposit amount is 100 USD in btc / eth/ltc.</p>
										<p>To purchase power, go to the "dashboard and then to the investment section" page in your account.</p>
									</div>
								</div>
								
								<div class="accord" id="heading6">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6"><i class="fa fa-plus"></i> 6. Where to see the withdrawal confirmation?</button>                     
									</h2>
								</div>
								<div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
									<div class="card-body">
										<p>All your requests for withdrawal of funds are displayed in your account, in the section History of operations</p>
									</div>
								</div>
								
								<div class="accord" id="heading7">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7"><i class="fa fa-plus"></i> 7.  How to withdraw money and how long does it take?</button>                     
									</h2>
								</div>
								<div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
									<div class="card-body">
										<p>Crediting funds usually takes from 10 minutes to 24 hours. To carry out the operation, you need to fill out an application on the "Withdrawal" page. Fill in all the necessary fields, where in the "wallet number" field, indicate the number of your wallet to which you want to transfer. The wallet number must necessarily correspond to the currency that you specified in the withdrawal method. For example, if you specified Bitcoin in the withdrawal method, then you must enter the Bitcoin number of the wallet. For ethereum you must use ethereum wallet and for litecoin you must use litecoin wallet.</p>
										
										<h4>Refferal bonus</h4>
										
										<p>2 types-direct refferal bonus from 5-10% according to plan you have purchased.</p>
										
										<h4>Binary Commission</h4>
										
										<p>Bitcoin Syndicate has a 15 level referral program. You receive 5-10 % commissions from first-level referrals(depending upon plan you have purchased), i.e., those who have invested in Bitcoin Syndicate through your direct referral link. You receive 4-9%  commissions from second-level referrals, i.e., those who have invested in Bitcoin Syndicate through the first referral’s link. And you receive 3-8% commissions from third-level referrals, and so on.</p>
										
										<p>The referral program is ideal for those who don’t want to invest. You can simply share the link, advertise it, and enjoy the earnings from your first-level, second-level, and third-level referrals and up to 15 levels</p>
										
										<h4>Our Security Features</h4>
										
										<p>Bitcoin Syndicate values physical and online security above all else. Our mining rooms have live cameras that ensure your safety. We also use top-of-the-line security standards to ensure your online assets remain secure.</p>
										
										<h4>Safety</h4>
										
										<p>We use state-of-the-art technologies and live video cameras to ensure safety.</p>
										
										<h4>Expert Team</h4>
										
										<p>We use state-of-the-art technologies and live video cameras to ensure safety.</p>
										
										<h4>Mining Facility</h4>
										
										<p>Back when we first started out in 2013, Bitcoin Syndicate provided high-end hotels and mining facilities in Siberia. We provided mining equipment and facilities for clients who wanted us to host their miners. However, as the mining industry grew, so did Bitcoin Syndicate. In addition to hosting services, we started offering cloud mining for novice and expert users.</p>
										
										<p>In 2020, Bitcoin Syndicate opened its doors to novice and professional miners from across the globe. We now provide cloud mining services to novice and expert users alike.</p>
										
										<p>Bitcoin Syndicate provides some of the most advanced and high-tech mining facilities that guarantee 99.9% uptime, powered by clean yet cheap Siberian hydropower. We provide the mining equipment, high-tech facilities, and on-site specialists and assistants to ensure you can focus on mining undisturbed.</p>
									</div>
								</div>
								
								<div class="accord" id="heading8">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8"><i class="fa fa-plus"></i> 8. Can I purchase multiple hashes or Mining contracts?</button>                     
									</h2>
								</div>
								<div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordionExample">
									<div class="card-body">
										<p>Yes, you can purchase as many mining contracts and hashes as you want from the same account. However, all of your Bitcoin Syndicate contracts will remain active throughout their expiration period, which is a minimum of 24 months</p>
									</div>
								</div>
								
								<div class="accord" id="heading9">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9"><i class="fa fa-plus"></i> 9.  What's the minimum contract I can purchase?</button>                     
									</h2>
								</div>
								<div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordionExample">
									<div class="card-body">
										<p>You can pay for the mining contract through Bitcoin,Ethereum, or Litecoin. However, the value of the amount shouldn’t be lower than the equivalent of US$100.</p>
										<p>As such, 100$ is the minimum contract value.</p>
									</div>
								</div>
								
								<div class="accord" id="heading10">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10"><i class="fa fa-plus"></i> 10. How does cryptocurrency mining work on your platform?</button>                     
									</h2>
								</div>
								<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionExample">
									<div class="card-body">
										<p>It's pretty quick and easy. As soon as we receive a payment for your order, your contract will be added to your profile.</p>
									</div>
								</div>
								
								<div class="accord" id="heading11">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11"><i class="fa fa-plus"></i> 11. When you are paying one-time payment, you are receiving hashpower according to your contract terms and duration</button>                     
									</h2>
								</div>
								<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionExample">
									<div class="card-body">
										
									</div>
								</div>
								
								<div class="accord" id="heading12">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12"><i class="fa fa-plus"></i> 12.  What does 100% uptime guarantee mean?</button>                     
									</h2>
								</div>
								<div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionExample">
									<div class="card-body">
										<p>If you were an individual miner there would be always a possibility that your mining hardware could crash, slow down or completely break. Using our platform you will never face any issues like these.</p>
									</div>
								</div>
								
								<div class="accord" id="heading13">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse13"><i class="fa fa-plus"></i> 13.  Do you have any maintenance fee?</button>                     
									</h2>
								</div>
								<div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample">
									<div class="card-body">
										<p>No, we do not charge any additional fees. You can use a profit calculator on our homepage to see the exact profit that you will receive.</p>
									</div>
								</div>
								
								<div class="accord" id="heading14">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse14"><i class="fa fa-plus"></i> 14.  How often will I receive my coins? What is the minimum withdrawal amount?</button>
									</h2>
								</div>
								<div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordionExample">
									<div class="card-body">
										<p>Newly mined coins are credited to your balance once per day (every 24 hours) for the previous mining day.</p>
										<p>You can request a withdrawal any time when you reach minimum withdrawal threshold</p>
									</div>
								</div>
								
								<div class="accord" id="heading15">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse15"><i class="fa fa-plus"></i> 15. When does mining start?</button>
									</h2>
								</div>
								<div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample">
									<div class="card-body">
										<p>Mining starts automatically after the deposit is added to your account. Mined coins are credited automatically to the customer's balance once a day for the previous mining day.</p>
									</div>
								</div>
								
								<div class="accord" id="heading16">
									<h2 class="mb-0">
										<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse16"><i class="fa fa-plus"></i> 16. What would I do if I paid the money for the contract but it wasn't activated?</button>
									</h2>
								</div>
								<div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordionExample">
									<div class="card-body">
										<p>Your contract will be activated after 3 confirmations of the cryptocurrency network. If you still have any issues please contact our support via Help Center.</p>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<!--/ Blog Post-->
					<!-- Blog Post-->
				</div>
				<!--/ Sidebar area -->
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