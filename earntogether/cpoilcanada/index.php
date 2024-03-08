<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Title -->
<title>Centre Professionnel Oeil d'Experts</title>
<!-- Favicon -->
<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />

    <style>
/** Home 8 Carousel */
.bs_carousel_bg {
  -webkit-background-size: cover;
  background-size: cover !important;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  background-repeat: no-repeat !important;
  overflow:hidden;
  overflow: hidden;
  background-size: cover;
  background-position: center center;
  
}
.bs_carousel .bs_carousel_bg:after {
  background-color: rgba(0, 0, 0, 0.5);
  bottom: 0;
  content: " ";
  display: block;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1;
  overflow:hidden;
  
}
.bs_carousel,
.bs_carousel .carousel-inner,
.bs_carousel .carousel-item {
  height: 100%;
}
.bs_carousel_prices {
  position: absolute;
  width: 50%;
  bottom: 15px;
  left: 0;
  height: 90px;
  z-index: 2;
  transform: scale(0, 1);
  -webkit-transition: transform .6s ease-in-out;
  -o-transition: transform .6s ease-in-out;
  transition: transform .6s ease-in-out;
  transform-origin: top right;
}
.bs_carousel_prices.pprty-price-active {
  transform: scale(1, 1);
}
.bs_carousel_prices .carousel-item {
  background-color: #000000;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.bs_carousel_prices .carousel-item .pprty-price {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: #ffffff;
  font-size: 28px;
  line-height: 28px;
  height: 28px;
  overflow: hidden;
  left: calc((100% * 2 - 1140px) / 2 + 15px);
}
.bs_carousel_prices .carousel-item .pprty-price > span {
  display: block;
  transform: translateY(100%);
  -webkit-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}
.bs_carousel_prices.pprty-price-active .carousel-item.active .pprty-price > span {
  transform: translateY(0);
}
.bs_carousel_prices.pprty-price-active.pprty-first-time .carousel-item.active .pprty-price > span {
  -webkit-transition-delay: .6s;
  transition-delay: .6s;
}
.bs_carousel_prices .property-carousel-ticker {
  position: absolute;
  left: 210px;
  top: 50%;
  color: #ffffff;
  white-space: nowrap;
  font-weight: 700;
  opacity: 0;
  -webkit-transition: opacity .2s ease-in-out;
  -o-transition: opacity .2s ease-in-out;
  transition: opacity .2s ease-in-out;
}
.bs_carousel_prices.pprty-price-active .property-carousel-ticker {
  opacity: 1;
}
.bs_carousel_prices.pprty-price-active.pprty-first-time .property-carousel-ticker {
  -webkit-transition-delay: .6s;
  transition-delay: .6s;
}
.bs_carousel_prices .property-carousel-ticker > div {
  display: inline-block;
  line-height: 25px;
  vertical-align: bottom;
}
.bs_carousel_prices .property-carousel-ticker .property-carousel-ticker-counter {
  overflow: hidden;
  height: 24px;
}
.bs_carousel_prices .property-carousel-ticker .property-carousel-ticker-counter > span {
  display: block;
  font-size: 24px;
  -webkit-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}
.bs_carousel_prices .carousel-item:after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.6);
  transform: scale(0, 1);
  transform-origin: 0% 50%;
  -webkit-transition: all 6.4s linear;
  -o-transition: all 6.4s linear;
  transition: all 6.4s linear;
}
.bs_carousel_prices.pprty-price-active .carousel-item.active:after {
  transform: scale(1, 1);
}
.bs_carousel_prices.pprty-price-active.pprty-first-time .carousel-item.active:after {
  -webkit-transition-delay: .6s;
  transition-delay: .6s;
}
.bs_carousel .property-carousel-controls {
  background-color: #ffffff;
  border-radius: 0 8px 0 0;
  bottom: 0;
  height: 90px;
  left: 0;
  line-height: 90px;
  overflow: hidden;
  position: absolute;
  text-align: center;
  width: 180px;
  z-index: 99;
}
.bs_carousel .property-carousel-controls a {
  background-color: #ffffff;
  color: #024eb9;
  cursor: pointer;
  display: block;
  height: 90px;
  position: absolute;
  width: 90px;
}
.bs_carousel .property-carousel-controls a:hover{
  color: #105ec8;
}
.bs_carousel .property-carousel-controls a span{
  font-size: 23px;
}
.bs_carousel .property-carousel-controls a.property-carousel-control-prev {
  top: 0;
  left: 0;
}
.bs_carousel .property-carousel-controls a.property-carousel-control-next {
  top: 0;
  right: 0;
}
@keyframes arrowPCLeft { 
    0% {
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
    }
    25% {
        opacity: 0;
        -webkit-transform: translate(-30%, -50%);
        transform: translate(-30%, -50%);
    }
    50% {
        opacity: 0;
        -webkit-transform: translate(20%, -50%);
        transform: translate(20%, -50%);
    }
    100% {
        opacity: 1;
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
    }
}
@keyframes arrowPCRight { 
    0% {
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
    }
    25% {
        opacity: 0;
        -webkit-transform: translate(30%, -50%);
        transform: translate(30%, -50%);
    }
    50% {
        opacity: 0;
        -webkit-transform: translate(-30%, -50%);
        transform: translate(-30%, -50%);
    }
    100% {
        opacity: 1;
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
    }
}
.bs_carousel .property-carousel-controls a.property-carousel-control-prev:hover svg {
  -webkit-animation: arrowPCLeft 0.4s ease-in-out;
  -moz-animation: arrowPCLeft 0.4s ease-in-out;
  animation: arrowPCLeft 0.4s ease-in-out;
}
.bs_carousel .property-carousel-controls a.property-carousel-control-next:hover svg {
  -webkit-animation: arrowPCRight 0.4s ease-in-out;
  -moz-animation: arrowPCRight 0.4s ease-in-out;
  animation: arrowPCRight 0.4s ease-in-out;
}
.bs_carousel .carousel-item .bs-caption {
  /*color: #ffffff;*/
  left: 0;
  position: absolute;
  right: 0;
  top: 54%;
  transform: translateY(calc(-50% - 70px));
  z-index: 2;
}
.bs_carousel .main_title {
  color: #ffffff;
  font-family: "Nunito";
  font-size: 55px;
  font-weight: bold;
  line-height: 1.2;
  margin-bottom: 15px;
  margin-top: 120px;
  opacity: 0;
  -webkit-transform: translateY(20px);
  -moz-transform: translateY(20px);
  -o-transform: translateY(20px);
  transform: translateY(20px);
  -webkit-transition: all .6s ease-in-out;
  -moz-transition: all .6s ease-in-out;
  -o-transition: all .6s ease-in-out;
  transition: all .6s ease-in-out;
}
.bs_carousel .carousel-item.active .main_title {
  opacity: 1;
  transform: translateY(0);
}
.bs_carousel .parag {
  font-size: 18px;
  font-family: "Nunito";
  color: #ffffff;
  line-height: 1.2;
  margin-bottom: 0;
  opacity: 0;
  -webkit-transform: translateY(20px);
  -moz-transform: translateY(20px);
  -o-transform: translateY(20px);
  transform: translateY(20px);
  -webkit-transition: all .9s ease-in-out;
  -moz-transition: all .9s ease-in-out;
  -o-transition: all .9s ease-in-out;
  transition: all .9s ease-in-out;
}
.bs_carousel .carousel-item.active .parag {
  opacity: 1;
  transform: translateY(0);
}
</style>

</head>
<body>
<div class="wrapper">
	<!--<div class="preloader"></div>-->

	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one home5 navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="images/logo.png" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="images/logo.png" alt="header-logo2.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		      
		        <ul id="respMenu" class=" text-left" data-menu-style="horizontal">
		            <li>
		                <a href="index.php"><span class="title">Welcome</span></a>
		                <!-- Level Two-->
		              
		            </li>
		            <li>
	                <a href="#"><span class="title">Immigration</span></a>
	                <span class="chevron-icon"><i class="fas fa-chevron-down"></i></span>
	                <!-- Level Two-->
                	<ul class="sub-menu">
                	    <li><a href="#">Permanent status</a></li>
                	    <li><a href="#">Temporary status</a></li>
                	</ul>
	                	
		            </li>
		           <li>
		                <a href="#"><span class="title">FAQs</span></a>
		               
		            </li>
		            <li>
		                <a href="#"><span class="title">Services</span></a>
		            
		            </li>
		            <li>
		                <a href="#"><span class="title">Offers</span></a>
		               <span class="chevron-icon"><i class="fas fa-chevron-down"></i></span>
		           <ul class="sub-menu">
                	    <li><a href="#">Agent</a></li>
                	    <li><a href="#">Forgot Password</a></li>
                	</ul>
		           
		            </li>
		            <li class="last">
		                <a href="#"><span class="title">Contact Us</span></a>
		            </li>
	                <!-- <li class="list-inline-item add_listing home5 float-right"><a href="#"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li> -->
	               
		        </ul>
		        
		        <ul class="login-list">
		             <li class="list-inline-item list_s float-right">
	                	<a href="userpanel/login.php" class="btn flaticon-user"> <span class="dn-lg">Login</span></a>
	                </li>
					<li class="list-inline-item list_s float-right">
	                	<a href="userpanel/register.php" class="btn flaticon-user"> <span class="dn-lg">Register</span></a>
	                </li>
		        </ul>
		        
		    </nav>
		</div>
	</header>
	<!-- Modal -->
	<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body container pb20">
		      		<div class="row">
		      			<div class="col-lg-12">
				    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
							  	<li class="nav-item">
							    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
							  	</li>
							  	<li class="nav-item">
							    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
							  	</li>
							</ul>
		      			</div>
		      		</div>
					<div class="tab-content container" id="myTabContent">
					  	<div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="login_thumb">
					  				<img class="img-fluid w100" src="images/resource/login.jpg" alt="login.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="login_form">
									<form action="#">
										<div class="heading">
											<h4>Login</h4>
										</div>
										<div class="row mt25">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										<div class="input-group mb-2 mr-sm-2">
										    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="User Name Or Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
										<div class="input-group form-group">
									    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="exampleCheck1">
											<label class="custom-control-label" for="exampleCheck1">Remember me</label>
											<a class="btn-fpswd float-right" href="#">Lost your password?</a>
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
										<p class="text-center">Don't have an account? <a class="text-thm" href="#">Register</a></p>
									</form>
								</div>
					  		</div>
					  	</div>
					  	<div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="regstr_thumb">
					  				<img class="img-fluid w100" src="images/resource/regstr.jpg" alt="regstr.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="sign_up_form">
									<div class="heading">
										<h4>Register</h4>
									</div>
									<form action="#">
										<div class="row">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-block btn-fb"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-block btn-googl"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										<div class="form-group input-group">
										    <input type="text" class="form-control" id="exampleInputName" placeholder="User Name">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Re-enter password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group ui_kit_select_search mb0">
											<select class="selectpicker" data-live-search="true" data-width="100%">
												<option data-tokens="SelectRole">Single User</option>
												<option data-tokens="Agent/Agency">Agent</option>
												<option data-tokens="SingleUser">Multi User</option>
											</select>
										</div>
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="exampleCheck2">
											<label class="custom-control-label" for="exampleCheck2">I have read and accept the Terms and Privacy Policy?</label>
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
										<p class="text-center">Already have an account? <a class="text-thm" href="#">Log In</a></p>
									</form>
								</div>
					  		</div>
					  	</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="d-flex justify-content-between">
					<a class="mobile-menu-trigger" href="#menu"><img src="images/dark-nav-icon.svg" alt=""></a>
					<a class="nav_logo_img" href="index.html"><img class="img-fluid" src="images/logo.png" alt="header-logo2.png"></a>
					<a class="mobile-menu-reg-link" href="#"><span class="flaticon-user"></span></a>
				</div>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><span>Welcome</span>
	              
				</li>
				
				<li><span>Immigration</span>
					<ul>
		                    <li>
		                        <a href="#">Permanent status</a>
		                      <!--  <ul>-->
				                    <!--<li><a href="">Sirkoni</a>-->
				                    <!--<ul>-->
    				                <!--    <li><a href="">Agricultural/Farm Land</a></li>-->
		                      <!--      </ul>-->
				                    <!--</li>-->
				                    <!--<li><a href="">Shahganj</a>-->
    				                <!--    <ul>-->
        				            <!--        <li><a href="">Agricultural/Farm Land</a>-->
        				            <!--        </li>-->
        				            <!--        <li><a href="">Residential Plot</a></li>-->
    		                  <!--          </ul>-->
		                      <!--      </li>-->
				                    <!--<li><a href="">Olandganj</a>-->
				                    <!--    <ul>-->
        				            <!--        <li><a href="">Agricultural/Farm Land</a>-->
        				            <!--        </li>-->
    		                  <!--          </ul>-->
    		                  <!--     </li>-->
				                    <!--<li><a href="">Kheta Sarai</a>-->
				                    <!--<ul>-->
				                    <!--     <li><a href="">Agricultural/Farm Land</a>-->
        				            <!--        </li>-->
    		                  <!--          </ul></li>-->
				                    
		                      <!--  </ul>-->
		                    </li>
		                    
		                    
		                    <li>
		                        <a href="#">Temporary status</a>
		                        <!-- Level Three-->
		                      <!--  <ul>-->
		                      <!--      <li><a href="">Loni</a>-->
		                      <!--      <ul>-->
		                      <!--      <li><a href="">Residential Plot</a></li> -->
		                      <!--  </ul>-->
		                      <!--</li> -->
		                      <!--  </ul>-->
		                    </li>
                           
		                </ul>
				</li>
				<li><span>FAQs</span>
				
				</li>
				
				<li><span>Services</span></li>
				
				<li><span>Offers</span>
				
				<ul>
		        <li>
                    <a href="#">Agent</a>
				</li>
		        <li>
                    <a href="#">Forgort Password</a>
				</li>
				</ul>
				
				</li>
				
				<li><a href="#">Contact Us</a></li>
				<li><a href="userpanel/login.php"><span class="flaticon-user"></span> Login</a></li>
				<li><a href="userpanel/register.php"><span class="flaticon-edit"></span> Register</a></li>
				<!--<li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>-->
			</ul>
		</nav>
	</div>

	<section class="p0">
		<div class="container-fluid p0">
            <div class="home8-slider vh-100">
                <div id="demo" id="bs_carousel" class="carousel slide bs_carousel" data-ride="carousel" data-pause="false" >
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-slide="0" data-bs-interval="10000">
                            <div class="bs_carousel_bg" style="background: url(images/home/banner-3.jpg);
                                background-size: cover !important;
    object-fit: cover;
    background-position: center center;"></div>
                            <div class="bs-caption">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
					<div class="home_content home5">
						<div class="home-text home5">
							<!--<h2 class="fz55">WE ARE COMMITTED TO HIGH STANDARDS OF EXCELLENCE AND INTEGRITY</h2>-->
							<h2 class="fz55">PROGRAMME D'IMMIGRATION AU CANADA</h2>
							<p class="discounts_para fz18 color-white">Centre Professionnel Oeil d'Experts Builders And Developers Pvt Ltd</p>
							<!--<h4>What are you looking for?</h4>-->
							<!--<ul class="mb0">-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-house"></span></div>-->
							<!--			<p>Modern Villa</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-house-1"></span></div>-->
							<!--			<p>Family House</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-house-2"></span></div>-->
							<!--			<p>Town House</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-building"></span></div>-->
							<!--			<p>Apartment</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--</ul>-->
						</div>
					</div>
				</div>
    <!--            <div class="col-lg-5">-->
				<!--	<div class="home_content home5 style2">-->
				<!--		<div class="home1-advnc-search home5">-->
				<!--			<form class="home5_advanced_search_form">-->
				<!--			    <div class="form-group">-->
				<!--			    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Enter keyword...">-->
				<!--			    </div>-->
				<!--				<div class="form-group">-->
				<!--					<div class="search_option_two">-->
				<!--						<div class="candidate_revew_select">-->
				<!--							<select class="selectpicker w100 show-tick">-->
				<!--								<option>Property Type</option>-->
				<!--								<option>Apartment</option>-->
				<!--								<option>Bungalow</option>-->
				<!--								<option>Condo</option>-->
				<!--								<option>House</option>-->
				<!--								<option>Land</option>-->
				<!--								<option>Single Family</option>-->
				<!--							</select>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--			    <div class="form-group df">-->
				<!--			    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">-->
				<!--			    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>-->
				<!--			    </div>-->
				<!--				<div class="form-group">-->
				<!--					<div class="small_dropdown2 home5">-->
				<!--					    <div id="prncgs" class="btn dd_btn">-->
				<!--					    	<span>Price</span>-->
				<!--					    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>-->
				<!--					    </div>-->
				<!--					  	<div class="dd_content2 home5">-->
				<!--						    <div class="pricing_acontent">-->
				<!--						    	<span id="slider-range-value1"></span>-->
				<!--								<span class="mt0" id="slider-range-value2"></span>-->
				<!--							    <div id="slider"></div>-->
				<!--								 <input type="text" class="amount" placeholder="$52,239"> -->
				<!--								<input type="text" class="amount2" placeholder="$985,14">-->
				<!--								<div class="slider-range"></div> -->
				<!--						    </div>-->
				<!--					  	</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="form-group custome_fields_520">-->
				<!--					<div class="navbered">-->
				<!--					  	<div class="mega-dropdown home5">-->
				<!--						    <span id="show_advbtn" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>-->
				<!--						    <div class="dropdown-content">-->
				<!--						      	<div class="row p15">-->
				<!--						      		<div class="col-lg-12">-->
				<!--						      			<h4 class="text-thm3">Amenities</h4>-->
				<!--						      		</div>-->
				<!--							        <div class="col-xxs-6 col-sm col-lg col-xl">-->
				<!--						                <ul class="ui_kit_checkbox selectable-list">-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck1">-->
				<!--													<label class="custom-control-label" for="customCheck1">Air Conditioning</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck2">-->
				<!--													<label class="custom-control-label" for="customCheck2">Lawn</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck3">-->
				<!--													<label class="custom-control-label" for="customCheck3">Swimming Pool</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck7">-->
				<!--													<label class="custom-control-label" for="customCheck7">Dryer</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck8">-->
				<!--													<label class="custom-control-label" for="customCheck8">Outdoor Shower</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck9">-->
				<!--													<label class="custom-control-label" for="customCheck9">Washer</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck13">-->
				<!--													<label class="custom-control-label" for="customCheck13">Laundry</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck15">-->
				<!--													<label class="custom-control-label" for="customCheck15">Window Coverings</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                </ul>-->
				<!--							        </div>-->
				<!--							        <div class="col-xxs-6 col-sm col-lg col-xl">-->
				<!--						                <ul class="ui_kit_checkbox selectable-list">-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck4">-->
				<!--													<label class="custom-control-label" for="customCheck4">Barbeque</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck5">-->
				<!--													<label class="custom-control-label" for="customCheck5">Microwave</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck6">-->
				<!--													<label class="custom-control-label" for="customCheck6">TV Cable</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck10">-->
				<!--													<label class="custom-control-label" for="customCheck10">Gym</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck11">-->
				<!--													<label class="custom-control-label" for="customCheck11">Refrigerator</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck12">-->
				<!--													<label class="custom-control-label" for="customCheck12">WiFi</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck14">-->
				<!--													<label class="custom-control-label" for="customCheck14">Sauna</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                </ul>-->
				<!--							        </div>-->
				<!--						      	</div>-->
				<!--						      	<div class="row p15 pt0-xsd">-->
				<!--						      		<div class="col-xl-12">-->
				<!--						      			<ul class="apeartment_area_list home5 mb0">-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Bathrooms</option>-->
				<!--														<option>1</option>-->
				<!--														<option>2</option>-->
				<!--														<option>3</option>-->
				<!--														<option>4</option>-->
				<!--														<option>5</option>-->
				<!--														<option>6</option>-->
				<!--														<option>7</option>-->
				<!--														<option>8</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Bedrooms</option>-->
				<!--														<option>1</option>-->
				<!--														<option>2</option>-->
				<!--														<option>3</option>-->
				<!--														<option>4</option>-->
				<!--														<option>5</option>-->
				<!--														<option>6</option>-->
				<!--														<option>7</option>-->
				<!--														<option>8</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Year built</option>-->
				<!--														<option>2013</option>-->
				<!--														<option>2014</option>-->
				<!--														<option>2015</option>-->
				<!--														<option>2016</option>-->
				<!--														<option>2017</option>-->
				<!--														<option>2018</option>-->
				<!--														<option>2019</option>-->
				<!--														<option>2020</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Built-up Area</option>-->
				<!--														<option>Adana</option>-->
				<!--														<option>Ankara</option>-->
				<!--														<option>Antalya</option>-->
				<!--														<option>Bursa</option>-->
				<!--														<option>Bodrum</option>-->
				<!--														<option>Gaziantep</option>-->
				<!--														<option>İstanbul</option>-->
				<!--														<option>İzmir</option>-->
				<!--														<option>Konya</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      			</ul>-->
				<!--						      		</div>-->
				<!--						      		<div class="col-xl-12">-->
				<!--						      			<div class="mega_dropdown_content_closer">-->
				<!--							      			<h5 class="text-thm text-center mt15"><span id="hide_advbtn" class="curp">Hide</span></h5>-->
				<!--						      			</div>-->
				<!--						      		</div>-->
				<!--						      	</div>-->
				<!--						    </div>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="search_option_button home5">-->
				<!--				    <button type="submit" class="btn btn-block">Search</button>-->
				<!--				</div>-->
				<!--			</form>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="carousel-item" data-slide="1">
                            <div class="bs_carousel_bg" style="background: url(images/home/banner-2.jpg);     background-size: cover !important;
    object-fit: cover;
    background-position: center center;"></div>
                            <div class="bs-caption">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
					<div class="home_content home5">
						<div class="home-text home5">
							<!--<h2 class="fz55">Let's Allocate You To A Better Location</h2>-->
							<h2 class="fz55">PROGRAMME D'IMMIGRATION AU CANADA</h2>
							<p class="discounts_para fz18 color-white">Centre Professionnel Oeil d'Experts Builders And Developers Pvt Ltd</p>
							<!--<h4>What are you looking for?</h4>-->
							<!--<ul class="mb0">-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-house"></span></div>-->
							<!--			<p>Modern Villa</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-house-1"></span></div>-->
							<!--			<p>Family House</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-house-2"></span></div>-->
							<!--			<p>Town House</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--	<li class="list-inline-item">-->
							<!--		<div class="icon_home5">-->
							<!--			<div class="icon"><span class="flaticon-building"></span></div>-->
							<!--			<p>Apartment</p>-->
							<!--		</div>-->
							<!--	</li>-->
							<!--</ul>-->
						</div>
					</div>
				</div>
    <!--            <div class="col-lg-5">-->
				<!--	<div class="home_content home5 style2">-->
				<!--		<div class="home1-advnc-search home5">-->
				<!--			<form class="home5_advanced_search_form">-->
				<!--			    <div class="form-group">-->
				<!--			    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Enter keyword...">-->
				<!--			    </div>-->
				<!--				<div class="form-group">-->
				<!--					<div class="search_option_two">-->
				<!--						<div class="candidate_revew_select">-->
				<!--							<select class="selectpicker w100 show-tick">-->
				<!--								<option>Property Type</option>-->
				<!--								<option>Apartment</option>-->
				<!--								<option>Bungalow</option>-->
				<!--								<option>Condo</option>-->
				<!--								<option>House</option>-->
				<!--								<option>Land</option>-->
				<!--								<option>Single Family</option>-->
				<!--							</select>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--			    <div class="form-group df">-->
				<!--			    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">-->
				<!--			    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>-->
				<!--			    </div>-->
				<!--				<div class="form-group">-->
				<!--					<div class="small_dropdown2 home5">-->
				<!--					    <div id="prncgs" class="btn dd_btn">-->
				<!--					    	<span>Price</span>-->
				<!--					    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>-->
				<!--					    </div>-->
				<!--					  	<div class="dd_content2 home5">-->
				<!--						    <div class="pricing_acontent">-->
				<!--						    	<span id="slider-range-value1"></span>-->
				<!--								<span class="mt0" id="slider-range-value2"></span>-->
				<!--							    <div id="slider"></div>-->
				<!--								 <input type="text" class="amount" placeholder="$52,239"> -->
				<!--								<input type="text" class="amount2" placeholder="$985,14">-->
				<!--								<div class="slider-range"></div> -->-->
				<!--						    </div>-->
				<!--					  	</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="form-group custome_fields_520">-->
				<!--					<div class="navbered">-->
				<!--					  	<div class="mega-dropdown home5">-->
				<!--						    <span id="show_advbtn" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>-->
				<!--						    <div class="dropdown-content">-->
				<!--						      	<div class="row p15">-->
				<!--						      		<div class="col-lg-12">-->
				<!--						      			<h4 class="text-thm3">Amenities</h4>-->
				<!--						      		</div>-->
				<!--							        <div class="col-xxs-6 col-sm col-lg col-xl">-->
				<!--						                <ul class="ui_kit_checkbox selectable-list">-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck1">-->
				<!--													<label class="custom-control-label" for="customCheck1">Air Conditioning</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck2">-->
				<!--													<label class="custom-control-label" for="customCheck2">Lawn</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck3">-->
				<!--													<label class="custom-control-label" for="customCheck3">Swimming Pool</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck7">-->
				<!--													<label class="custom-control-label" for="customCheck7">Dryer</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck8">-->
				<!--													<label class="custom-control-label" for="customCheck8">Outdoor Shower</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck9">-->
				<!--													<label class="custom-control-label" for="customCheck9">Washer</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck13">-->
				<!--													<label class="custom-control-label" for="customCheck13">Laundry</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck15">-->
				<!--													<label class="custom-control-label" for="customCheck15">Window Coverings</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                </ul>-->
				<!--							        </div>-->
				<!--							        <div class="col-xxs-6 col-sm col-lg col-xl">-->
				<!--						                <ul class="ui_kit_checkbox selectable-list">-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck4">-->
				<!--													<label class="custom-control-label" for="customCheck4">Barbeque</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck5">-->
				<!--													<label class="custom-control-label" for="customCheck5">Microwave</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck6">-->
				<!--													<label class="custom-control-label" for="customCheck6">TV Cable</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck10">-->
				<!--													<label class="custom-control-label" for="customCheck10">Gym</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck11">-->
				<!--													<label class="custom-control-label" for="customCheck11">Refrigerator</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck12">-->
				<!--													<label class="custom-control-label" for="customCheck12">WiFi</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                	<li>-->
				<!--												<div class="custom-control custom-checkbox">-->
				<!--													<input type="checkbox" class="custom-control-input" id="customCheck14">-->
				<!--													<label class="custom-control-label" for="customCheck14">Sauna</label>-->
				<!--												</div>-->
				<!--						                	</li>-->
				<!--						                </ul>-->
				<!--							        </div>-->
				<!--						      	</div>-->
				<!--						      	<div class="row p15 pt0-xsd">-->
				<!--						      		<div class="col-xl-12">-->
				<!--						      			<ul class="apeartment_area_list home5 mb0">-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Bathrooms</option>-->
				<!--														<option>1</option>-->
				<!--														<option>2</option>-->
				<!--														<option>3</option>-->
				<!--														<option>4</option>-->
				<!--														<option>5</option>-->
				<!--														<option>6</option>-->
				<!--														<option>7</option>-->
				<!--														<option>8</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Bedrooms</option>-->
				<!--														<option>1</option>-->
				<!--														<option>2</option>-->
				<!--														<option>3</option>-->
				<!--														<option>4</option>-->
				<!--														<option>5</option>-->
				<!--														<option>6</option>-->
				<!--														<option>7</option>-->
				<!--														<option>8</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Year built</option>-->
				<!--														<option>2013</option>-->
				<!--														<option>2014</option>-->
				<!--														<option>2015</option>-->
				<!--														<option>2016</option>-->
				<!--														<option>2017</option>-->
				<!--														<option>2018</option>-->
				<!--														<option>2019</option>-->
				<!--														<option>2020</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      				<li class="list-inline-item mb10">-->
				<!--												<div class="candidate_revew_select">-->
				<!--													<select class="selectpicker w100 show-tick">-->
				<!--														<option>Built-up Area</option>-->
				<!--														<option>Adana</option>-->
				<!--														<option>Ankara</option>-->
				<!--														<option>Antalya</option>-->
				<!--														<option>Bursa</option>-->
				<!--														<option>Bodrum</option>-->
				<!--														<option>Gaziantep</option>-->
				<!--														<option>İstanbul</option>-->
				<!--														<option>İzmir</option>-->
				<!--														<option>Konya</option>-->
				<!--													</select>-->
				<!--												</div>-->
				<!--						      				</li>-->
				<!--						      			</ul>-->
				<!--						      		</div>-->
				<!--						      		<div class="col-xl-12">-->
				<!--						      			<div class="mega_dropdown_content_closer">-->
				<!--							      			<h5 class="text-thm text-center mt15"><span id="hide_advbtn" class="curp">Hide</span></h5>-->
				<!--						      			</div>-->
				<!--						      		</div>-->
				<!--						      	</div>-->
				<!--						    </div>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="search_option_button home5">-->
				<!--				    <button type="submit" class="btn btn-block">Search</button>-->
				<!--				</div>-->
				<!--			</form>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    
                    </div>
                   
                    <div class="property-carousel-controls">
                        <a class="property-carousel-control-prev"  href="#demo" data-slide="prev">
                            <span class="flaticon-left-arrow carousel-control-prev-icon"></span>
                        </a>
                        <a class="property-carousel-control-next"  href="#demo" data-slide="next">
                            <span class="flaticon-right-arrow carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <!--<div class="carousel slide bs_carousel_prices" data-ride="carousel" data-pause="false" data-interval="false">-->
                <!--    <div class="carousel-inner"></div>-->
                <!--    <div class="property-carousel-ticker">-->
                <!--        <div class="property-carousel-ticker-counter"></div>-->
                <!--        <div class="property-carousel-ticker-divider">&nbsp;&nbsp;/&nbsp;&nbsp;</div>-->
                <!--        <div class="property-carousel-ticker-total"></div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
		</div>
	</section>




<!--new slider-->
<!--<div id="demo" class="carousel slide" data-ride="carousel">-->

  <!-- Indicators -->
<!--  <ul class="carousel-indicators">-->
<!--    <li data-target="#demo" data-slide-to="0" class="active"></li>-->
<!--    <li data-target="#demo" data-slide-to="1"></li>-->
<!--    <li data-target="#demo" data-slide-to="2"></li>-->
<!--  </ul>-->

  <!-- The slideshow -->
<!--  <div class="carousel-inner">-->
<!--    <div class="carousel-item active">-->
<!--      <img src="la.jpg" alt="Los Angeles">-->
<!--    </div>-->
<!--    <div class="carousel-item">-->
<!--      <img src="chicago.jpg" alt="Chicago">-->
<!--    </div>-->
<!--    <div class="carousel-item">-->
<!--      <img src="ny.jpg" alt="New York">-->
<!--    </div>-->
<!--  </div>-->

  <!-- Left and right controls -->
<!--  <a class="carousel-control-prev" href="#demo" data-slide="prev">-->
<!--    <span class="carousel-control-prev-icon"></span>-->
<!--  </a>-->
<!--  <a class="carousel-control-next" href="#demo" data-slide="next">-->
<!--    <span class="carousel-control-next-icon"></span>-->
<!--  </a>-->

<!--</div>-->


<!--why choose us section-->

	<section id="why-chose" class="whychose_us pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Our Services</h2>
						<p>We provide full service at every step.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-lg-3 col-xl-3">
					<div class="why_chose_us style2">
						<div class="icon">
							<!--<span class="flaticon-high-five"></span>-->
							<img src="images/errow-plan.png" />
							
						</div>
						<div class="details">
							<h4>Express Entry</h4>
							<p>Skilled Worker Class (Federal) Skilled Trades Class (Federal), Canadian Experience Class</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-lg-3 col-xl-3">
					<div class="why_chose_us style2">
						<div class="icon">
						    <img src="images/love.png" />
							<!--<span class="flaticon-profit"></span>-->
						</div>
						<div class="details">
						<!--<h4>Parrainer un conjoint, enfant</h4>-->
						<h4>Sponsor a spouse, child </h4>
					    <p>Learn how to sponsor your loved one for Canadian immigration.</p>
						</div>
					</div>
				</div>
				
				
					<div class="col-md-3 col-lg-3 col-xl-3">
					<div class="why_chose_us style2">
						<div class="icon">
							<span class="flaticon-user"></span>
						</div>
						<div class="details">
							<h4>Self-employed visa</h4>
						    <p>Canada is looking for people who will contribute to the cultural, artistic and sporting development of the country as well as people with experience in agricultural management.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-lg-3 col-xl-3">
					<div class="why_chose_us style2">
						<div class="icon">
						    <img src="images/mail-icon.png" />
							<!--<span class="flaticon-profit"></span>-->
						</div>
						<div class="details">
						<h4>Sponsor a parent, grandparent</h4>
						<p>Be part of the thousands of families that Oeil d'Experts has brought together in Canada.</p>
						</div>
					</div>
				</div>
					
				
				
			</div>
		</div>
	</section>



	<!-- Feature Properties -->
	<section id="feature-property" class="feature-property">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a href="#feature-property">
				    	<div class="mouse_scroll home5">
			        		<div class="icon">
					    		<h4>Scroll Down</h4>
					    		<p>to discover more</p>
			        		</div>
			        		<div class="thumb">
			        			<img src="images/resource/mouse.png" alt="mouse.png">
			        		</div>
				    	</div>
				    </a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Visas de résident temporaire (visiteur)</h2>
						<!--<p>CREATING LASTING IMPRESSIONS THROUGH-->
						<!--	INTERIOR DESIGN..</p>-->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xl-4">
					<div class="properti_city home5">
						<div class="thumb"><img class="img-fluid w100" src="images/property/delhi-buldings.jpeg" alt="pc1.jpg"></div>
						<div class="overlay">
							<div class="details">
								<div class="left"><h4>Delhi</h4></div>
								<p>24 Properties</p>
							</div>
						</div>
					</div>
				</div>
			
				<div class="col-lg-8 col-xl-8">
					<!--<div class="properti_city home5">-->
					<!--	<div class="thumb">-->
					<!--	    <img class="img-fluid w100" src="images/property/Noidancrdelhiskyline.jpg" alt="pc2.jpg">-->
					<!--	    </div>-->
					<!--	<div class="overlay">-->
					<!--		<div class="details">-->
					<!--			<div class="left"><h4>Noida</h4></div>-->
					<!--			<p>dgjdjfg ldfjglkdfgsdf</p>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					
					
					
					
					<!--welcome slider section start-->
					
						<div class="welcome_slider">
						<div class="item">
						    <div class="thumb">
						    <img class="img-fluid w100" src="images/property/Noidancrdelhiskyline.jpg" alt="pc2.jpg">
						</div>
						
						<!--<div class="overlay">-->
						<!--	<div class="details">-->
						<!--		<div class="left"><h4>Delhi</h4></div>-->
						<!--		<p>24 Properties</p>-->
						<!--	</div>-->
						<!--</div>-->
						</div>
					
						<div class="item">
						    <img class="img-fluid w100" src="images/property/Noidancrdelhiskyline.jpg" alt="pc2.jpg">
						
						</div>
					
					
					
					</div>
					
					
					<!--welcome slider section end-->
					
					
					
					
					
				</div>
			
				<div class="col-lg-8 col-xl-8">
					<div class="properti_city home5">
						<div class="thumb"><img class="img-fluid w100" src="images/property/pc3.jpg" alt="pc3.jpg"></div>
						<div class="overlay">
							<div class="details">
								<div class="left"><h4>Lucknow</h4></div>
								<p>89 Properties</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="properti_city home5">
						<div class="thumb"><img class="img-fluid w100" src="images/property/pc4.jpg" alt="pc4.jpg"></div>
						<div class="overlay">
							<div class="details">
								<div class="left"><h4>Greater Noida</h4></div>
								<p>47 Properties</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Our Testimonials -->
	<section id="our-testimonials" class="our-testimonial home5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2 class="color-white">Testimonials</h2>
						<p class="color-white">Here could be a nice sub title</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="testimonial_grid_slider">
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="images/testimonial/1.png" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Raj </h4>
									<p>CEO</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="images/testimonial/2.png" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Satyendra Kumar</h4>
									<p>CTO</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="images/testimonial/3.png" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Manoj Kumar</h4>
									<p>CTO</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="images/testimonial/1.png" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Raj</h4>
									<p>CTO</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="images/testimonial/2.png" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Satyendra Kumar</h4>
									<p>CTO</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Property Cities -->
<!--
	<section id="property-city" class="property-city pb30 bg-ptrn1">
		<div class="container ovh">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center mb40">
						<h2>Featured Properties</h2>
					
					</div>
				</div>
				<div class="col-lg-12">
					<div class="feature_property_slider">
						<div class="item">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Rent</a></li>
											<li class="list-inline-item"><a href="#">Featured</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Estate Phase 1</p>
										<h4>ALMOND</h4>
										<p><span class="flaticon-placeholder"></span> A blend of modern architecture, aesthetical landscape with a touch of Modern Technology </p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: 4</a></li>
											<li class="list-inline-item"><a href="#">Baths: 2</a></li>
											<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">6 months ago</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/property/fp2.jpg" alt="fp2.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Rent</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Estate Phase 2</p>
										<h4>ALMOND</h4>
										<p><span class="flaticon-placeholder"></span>Over 40 acres of dry land with residential, commercial and green zones.</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: 4</a></li>
											<li class="list-inline-item"><a href="#">Baths: 2</a></li>
											<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">2 years ago</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Sale</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Estate</p>
										<h4>OAK</h4>
										<p><span class="flaticon-placeholder"></span>This estate is just a few minutes away from the Major developments in Ibeju lekki.</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: 4</a></li>
											<li class="list-inline-item"><a href="#">Baths: 2</a></li>
											<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">1 years ago</div>
									</div>
								</div>
							</div>
						</div>
							<div class="item">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Rent</a></li>
											<li class="list-inline-item"><a href="#">Featured</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
										
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Estate Phase 1</p>
										<h4>ALMOND</h4>
										<p><span class="flaticon-placeholder"></span> A blend of modern architecture, aesthetical landscape with a touch of Modern Technology </p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: 4</a></li>
											<li class="list-inline-item"><a href="#">Baths: 2</a></li>
											<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">6 months ago</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Sale</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
										
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Estate</p>
										<h4>OAK </h4>
										<p><span class="flaticon-placeholder"></span>This estate is just a few minutes away from the Major developments in Ibeju lekki.</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: 4</a></li>
											<li class="list-inline-item"><a href="#">Baths: 2</a></li>
											<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">1 years ago</div>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="item">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Rent</a></li>
											<li class="list-inline-item"><a href="#">Featured</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
										
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Estate Phase 1</p>
										<h4>ALMOND </h4>
										<p><span class="flaticon-placeholder"></span> A blend of modern architecture, aesthetical landscape with a touch of Modern Technology </p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: 4</a></li>
											<li class="list-inline-item"><a href="#">Baths: 2</a></li>
											<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">6 months ago</div>
									</div>
								</div>
							</div>
						</div>
				
					</div>
				</div>
			</div>
		</div>
	</section>
-->



	<!-- Our Blog -->
	<!--
	<section class="our-blog bg-ptrn2 pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>OUR LATEST PROJECTS</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="for_blog feat_property">
						<div class="thumb">
							<img class="img-whp" src="images/blog/v2-2 (3).jpg" alt="bh1.jpg">
						</div>
						<div class="details">
							<div class="tc_content">
								<p class="text-thm">Lucknow</p>
								<h4>Property For Sale In Lucknow</h4>
							</div>
							<div class="fp_footer">
								<ul class="fp_meta float-left mb0">
									<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
									<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
								</ul>
								<a class="fp_pdate float-right" href="#">7 August 2019</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="for_blog feat_property">
						<div class="thumb">
							<img class="img-whp" src="images/blog/bh2.jpg" alt="bh2.jpg">
						</div>
						<div class="details">
							<div class="tc_content">
								<p class="text-thm">Noida</p>
								<h4>Property For Sale In Noida</h4>
							</div>
							<div class="fp_footer">
								<ul class="fp_meta float-left mb0">
									<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
									<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
								</ul>
								<a class="fp_pdate float-right" href="#">7 August 2019</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="for_blog feat_property">
						<div class="thumb">
							<img class="img-whp" src="images/blog/bh3.jpg" alt="bh3.jpg">
						</div>
						<div class="details">
							<div class="tc_content">
								<p class="text-thm">Delhi</p>
								<h4>Property For Sale In Delhi</h4>
							</div>
							<div class="fp_footer">
								<ul class="fp_meta float-left mb0">
									<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
									<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
								</ul>
								<a class="fp_pdate float-right" href="#">7 August 2019</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    -->


	<!-- Our Partners -->
<!--	<section id="our-partners" class="our-partners">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Our Partners</h2>
						<p>We only work with the best companies around the globe</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4 col-6">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/1.png" alt="1.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-6">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/2.png" alt="2.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-6">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/3.png" alt="3.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-6">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/4.png" alt="4.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-6">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/5.png" alt="5.png">
					</div>
				</div>
			</div>
		</div>
	</section>
	-->

	<!-- Start Partners -->
<!--	<section class="start-partners home5 pt50 pb50">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="start_partner tac-smd">
						<h2>Become a Real Estate Agent</h2>
						<p>We only work with the best companies around the globe</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="parner_reg_btn home5 text-right tac-smd">
						<a class="btn" href="#">Register Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
-->
	<!-- Our Footer -->
	<section class="footer_one home5">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
					<div class="footer_about_widget home5">
					<a href="#">
					    <img src="images/logo.png" />
                    </a>
					    <!--<h4>About</h4>-->
						<p>We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_qlink_widget home5">
						<h4>Quick Links</h4>
						<ul class="list-unstyled">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Terms & Conditions</a></li>
							<li><a href="#">User’s Guide</a></li>
							<li><a href="#">Support Center</a></li>
							<li><a href="#">Press Info</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_contact_widget home5">
						<h4>Contact Us</h4>
						
					
					
						<ul class="list-unstyled">
							<li><a href="#"><span style="padding-right: 5px;"><i class="fa fa-envelope"></i></span>support@oeilexperts.com</a></li>
							<li><a href="#"><span style="padding-right: 5px;"><i class="fa fa-phone"></i></span>+ 257 79637735</a></li>
						</ul>
						
					<div style="display:flex"><span style="padding-right: 5px; color:#fff;"><i class="fa fa-home"></i></span><p style="color: #fff;">Bujumbura - Burundi ,Av De La Revolution Building Premium House 3 Étage Bureau N° 310</p></div>
					
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_social_widget home5">
						<h4>Follow us</h4>
						<ul class="mb30">
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
							<!--<li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>-->
							<!--<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>-->
						</ul>
						<h4>Subscribe</h4>
						<form class="footer_mailchimp_form home5">
						 	<div class="form-row align-items-center">
							    <div class="col-auto">
							    	<input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email">
							    </div>
							    <div class="col-auto">
							    	<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-angle-right"></i></button>
							    </div>
						  	</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_middle_area home5 pt30 pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-6">
					<div class="footer_menu_widget home5">
						<ul>
							<li class="list-inline-item"><a href="#">Welcome</a></li>
							<li class="list-inline-item"><a href="#">Immigration</a></li>
							<li class="list-inline-item"><a href="#">Services</a></li>
							<li class="list-inline-item"><a href="#">Blog</a></li>
							<li class="list-inline-item"><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-xl-6">
					<div class="copyright-widget home5 text-right">
						<p>© 2023 Centre Professionnel Oeil d'Experts.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/isotop.js"></script>
<script type="text/javascript" src="js/snackbar.min.js"></script>
<script type="text/javascript" src="js/simplebar.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery.counterup.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/pricing-slider.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="js/script.js"></script>
</body>

</html>