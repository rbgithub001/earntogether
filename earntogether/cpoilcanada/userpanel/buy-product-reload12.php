<?php 
ob_start();
error_reporting(0);
include('../includes/all_func.php');
include("function.php");
include("header.php"); 


?><script language="javascript" type="text/javascript">

function getXMLHTTP() { //fuction to return the xml http object

		var xmlhttp=false;	

		try{

			xmlhttp=new XMLHttpRequest();

		}

		catch(e)	{		

			try{			

				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

			}

			catch(e){

				try{

				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

				}

				catch(e1){

					xmlhttp=false;

				}

			}

		}

		 	

		return xmlhttp;

    }

	



function getState(countryId) {		

		

		var strURL="findStateing.php?platform="+countryId;

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('statediv').innerHTML=req.responseText;

												

					} else {

						alert("Problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}		

	}



	

	

	

	

	

</script>
<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" data-position="right" data-step="1" data-intro="<strong>Fixed Sidebar</strong> <br/> It adjust to your needs." >
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
                      <?php include("left_menu.php"); ?>
        </div>
        <!--<div class="text-right collapse-button" style="padding:7px 9px;">
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>-->
			</div>
		</div>
        
		<div class="container-fluid" id="pcont">    
            <div class="page-head">               
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i> <a href="#">Product</a></li>
                <li><a href="#">Buy Product</a></li>
              </ol>
            </div>
            <div class="cl-mcont">
			<div class="row">
				<div class="col-md-12">
              <style>
    /**/
/* font */
/**/
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400,700);


/**/
/* defaults */
/**/
.sky-tabs,
.sky-tabs * {
	margin: 0;
	padding: 0;
	outline: none;
	border: 0;
	background: none;
}
.sky-tabs {
	position: relative;
	font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
	font-size: 0;
	text-align: left;
	color: #666;
}
.sky-tabs > input {
	position: absolute;
	display: none;
}
.sky-tabs > label {
	position: relative;
	z-index: 1;
	display: inline-block;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	padding: 1px;
	padding-top: 0;
	padding-left: 0;
	font-size: 13px;
	line-height: 45px;
	cursor: pointer;
}
.sky-tabs > label.inverse {
	float: right;
	padding-right: 0;
	padding-left: 1px;
}
.sky-tabs > label.disabled {
	cursor: default;
}
.sky-tabs > label span {
	display: block;
	padding: 5px;
	background: rgba(255,255,255,0.9);
}
.sky-tabs > label span span {
	padding: 0 20px;
	background: transparent;
	transition: background 0.4s, color 0.4s;
	-o-transition: background 0.4s, color 0.4s;
	-ms-transition: background 0.4s, color 0.4s;
	-moz-transition: background 0.4s, color 0.4s;
	-webkit-transition: background 0.4s, color 0.4s;	
}
.sky-tabs > label:hover span span {
	background: #2da5da;
	color: #fff;	
}
.sky-tabs > label.disabled span span {
	background: transparent;
	color: inherit;
}
.sky-tabs > input:checked + label {
	cursor: default;
}
.sky-tabs > input:checked + label span span {
	background: #2da5da;
	color: #fff;
}
.sky-tabs > .switcher {
	display: none;
}
.sky-tabs > .switcher a {
	display: block;
	margin: 0 -20px;
	padding: 0 20px;
	text-decoration: none;
	color: inherit;
}
.sky-tabs > ul {
	list-style: none;
	position: relative;
	display: block;
	font-size: 13px;
}
.sky-tabs > ul > li {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	overflow: auto;
	padding: 20px 25px 25px;
	background: rgba(255,255,255,0.9);
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	opacity: 0;
	-o-transform-origin: 0% 0%;
	-ms-transform-origin: 0% 0%;
	-moz-transform-origin: 0% 0%;
	-webkit-transform-origin: 0% 0%;
	-o-transition: opacity 0.8s, -o-transform 0.8s;	
	-ms-transition: opacity 0.8s, -ms-transform 0.8s;	
	-moz-transition: opacity 0.8s, -moz-transform 0.8s;	
	-webkit-transition: opacity 0.8s, -webkit-transform 0.8s;
}
.sky-tabs > .sky-tab-content-1:checked ~ ul > .sky-tab-content-1,
.sky-tabs > .sky-tab-content-2:checked ~ ul > .sky-tab-content-2,
.sky-tabs > .sky-tab-content-3:checked ~ ul > .sky-tab-content-3,
.sky-tabs > .sky-tab-content-4:checked ~ ul > .sky-tab-content-4,
.sky-tabs > .sky-tab-content-5:checked ~ ul > .sky-tab-content-5,
.sky-tabs > .sky-tab-content-6:checked ~ ul > .sky-tab-content-6,
.sky-tabs > .sky-tab-content-7:checked ~ ul > .sky-tab-content-7,
.sky-tabs > .sky-tab-content-8:checked ~ ul > .sky-tab-content-8,
.sky-tabs > .sky-tab-content-9:checked ~ ul > .sky-tab-content-9 {
	position: relative;
	z-index: 1;
	opacity: 1;
}


/**/
/* positions */
/**/
.sky-tabs-pos-top-center {
	text-align: center;
}
.sky-tabs-pos-top-right {
	text-align: right;
}
.sky-tabs-pos-top-right > label {
	padding-right: 0;
	padding-left: 1px;
}
.sky-tabs-pos-top-justify > label {
	padding-right: 0;
	padding-left: 1px;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-2 > label {
	width: 50%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-3 > label {
	width: 33.33%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-4 > label {
	width: 25%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-5 > label {
	width: 20%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-6 > label {
	width: 16.66%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-7 > label {
	width: 14.28%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-8 > label {
	width: 12.5%;
}
.sky-tabs-pos-top-justify.sky-tabs-amount-9 > label {
	width: 11.11%;
}
.sky-tabs-pos-top-justify > input:first-child + label {
	padding-left: 0;
}
.sky-tabs-pos-left > label,
.sky-tabs-pos-right > label {
	display: block;
	width: 25%;
	float: left;
	clear: left;
	margin-right: 0;
}
.sky-tabs-pos-right > label {
	float: right;
	clear: right;
}
.sky-tabs-pos-left > ul {
	margin-left: 25%;
}
.sky-tabs-pos-right > ul {
	margin-right: 25%;
}
.sky-tabs-pos-right > label {
	padding-right: 0;
	padding-left: 1px;
}
.sky-tabs-pos-top-center > ul > li,
.sky-tabs-pos-top-justify > ul > li {
	-o-transform-origin: 50% 0%;
	-ms-transform-origin: 50% 0%;
	-moz-transform-origin: 50% 0%;
	-webkit-transform-origin: 50% 0%;
}
.sky-tabs-pos-right > ul > li,
.sky-tabs-pos-top-right > ul > li {
	-o-transform-origin: 100% 0%;
	-ms-transform-origin: 100% 0%;
	-moz-transform-origin: 100% 0%;
	-webkit-transform-origin: 100% 0%;
}


/**/
/* animations */
/**/
.sky-tabs-anim-slide-up > ul > li {
	-o-transform: translateY(-15%);
	-ms-transform: translateY(-15%);
	-moz-transform: translateY(-15%);
	-webkit-transform: translateY(-15%);
}
.sky-tabs-anim-slide-right > ul > li {
	-o-transform: translateX(15%);
	-ms-transform: translateX(15%);
	-moz-transform: translateX(15%);
	-webkit-transform: translateX(15%);
}
.sky-tabs-anim-slide-down > ul > li {
	-o-transform: translateY(15%);
	-ms-transform: translateY(15%);
	-moz-transform: translateY(15%);
	-webkit-transform: translateY(15%);
}
.sky-tabs-anim-slide-left > ul > li {
	-o-transform: translateX(-15%);
	-ms-transform: translateX(-15%);
	-moz-transform: translateX(-15%);
	-webkit-transform: translateX(-15%);
}
.sky-tabs-anim-slide-up-left > ul > li {
	-o-transform: translate(-15%,-15%);
	-ms-transform: translate(-15%,-15%);
	-moz-transform: translate(-15%,-15%);
	-webkit-transform: translate(-15%,-15%);
}
.sky-tabs-anim-slide-up-right > ul > li {
	-o-transform: translate(15%,-15%);
	-ms-transform: translate(15%,-15%);
	-moz-transform: translate(15%,-15%);
	-webkit-transform: translate(15%,-15%);	
}
.sky-tabs-anim-slide-down-right > ul > li {
	-o-transform: translate(15%,15%);
	-ms-transform: translate(15%,15%);
	-moz-transform: translate(15%,15%);
	-webkit-transform: translate(15%,15%);	
}
.sky-tabs-anim-slide-down-left > ul > li {
	-o-transform: translate(-15%,15%);
	-ms-transform: translate(-15%,15%);
	-moz-transform: translate(-15%,15%);
	-webkit-transform: translate(-15%,15%);	
}
.sky-tabs > .sky-tab-content-1:checked ~ ul > .sky-tab-content-1,
.sky-tabs > .sky-tab-content-2:checked ~ ul > .sky-tab-content-2,
.sky-tabs > .sky-tab-content-3:checked ~ ul > .sky-tab-content-3,
.sky-tabs > .sky-tab-content-4:checked ~ ul > .sky-tab-content-4,
.sky-tabs > .sky-tab-content-5:checked ~ ul > .sky-tab-content-5,
.sky-tabs > .sky-tab-content-6:checked ~ ul > .sky-tab-content-6,
.sky-tabs > .sky-tab-content-7:checked ~ ul > .sky-tab-content-7,
.sky-tabs > .sky-tab-content-8:checked ~ ul > .sky-tab-content-8,
.sky-tabs > .sky-tab-content-9:checked ~ ul > .sky-tab-content-9 {
	-o-transform: translate(0,0);
	-ms-transform: translate(0,0);
	-moz-transform: translate(0,0);
	-webkit-transform: translate(0,0);
}

.sky-tabs-anim-scale > ul > li {
	-o-transform: scale(0.1,0.1);
	-ms-transform: scale(0.1,0.1);
	-moz-transform: scale(0.1,0.1);
	-webkit-transform: scale(0.1,0.1);
}
.sky-tabs-anim-scale > .sky-tab-content-1:checked ~ ul > .sky-tab-content-1,
.sky-tabs-anim-scale > .sky-tab-content-2:checked ~ ul > .sky-tab-content-2,
.sky-tabs-anim-scale > .sky-tab-content-3:checked ~ ul > .sky-tab-content-3,
.sky-tabs-anim-scale > .sky-tab-content-4:checked ~ ul > .sky-tab-content-4,
.sky-tabs-anim-scale > .sky-tab-content-5:checked ~ ul > .sky-tab-content-5,
.sky-tabs-anim-scale > .sky-tab-content-6:checked ~ ul > .sky-tab-content-6,
.sky-tabs-anim-scale > .sky-tab-content-7:checked ~ ul > .sky-tab-content-7,
.sky-tabs-anim-scale > .sky-tab-content-8:checked ~ ul > .sky-tab-content-8,
.sky-tabs-anim-scale > .sky-tab-content-9:checked ~ ul > .sky-tab-content-9 {
	-o-transform: scale(1,1);
	-ms-transform: scale(1,1);
	-moz-transform: scale(1,1);
	-webkit-transform: scale(1,1);
}

.sky-tabs-anim-rotate > ul > li {
	-o-transform: rotate(90deg);
	-ms-transform: rotate(90deg);
	-moz-transform: rotate(90deg);
	-webkit-transform: rotate(90deg);
}
.sky-tabs-anim-rotate.sky-tabs-pos-right > ul > li,
.sky-tabs-anim-rotate.sky-tabs-pos-top-right > ul > li {
	-o-transform: rotate(-90deg);
	-ms-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	-webkit-transform: rotate(-90deg);
}
.sky-tabs-anim-rotate > .sky-tab-content-1:checked ~ ul > .sky-tab-content-1,
.sky-tabs-anim-rotate > .sky-tab-content-2:checked ~ ul > .sky-tab-content-2,
.sky-tabs-anim-rotate > .sky-tab-content-3:checked ~ ul > .sky-tab-content-3,
.sky-tabs-anim-rotate > .sky-tab-content-4:checked ~ ul > .sky-tab-content-4,
.sky-tabs-anim-rotate > .sky-tab-content-5:checked ~ ul > .sky-tab-content-5,
.sky-tabs-anim-rotate > .sky-tab-content-6:checked ~ ul > .sky-tab-content-6,
.sky-tabs-anim-rotate > .sky-tab-content-7:checked ~ ul > .sky-tab-content-7,
.sky-tabs-anim-rotate > .sky-tab-content-8:checked ~ ul > .sky-tab-content-8,
.sky-tabs-anim-rotate > .sky-tab-content-9:checked ~ ul > .sky-tab-content-9 {
	-o-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-webkit-transform: rotate(0deg);
}

.sky-tabs-anim-flip > ul {
	perspective: 2000px;
	-o-perspective: 2000px;
	-ms-perspective: 2000px;
	-moz-perspective: 2000px;
	-webkit-perspective: 2000px;
	perspective-origin: 50% 50%;
	-o-perspective-origin: 50% 50%;
	-ms-perspective-origin: 50% 50%;
	-moz-perspective-origin: 50% 50%;
	-webkit-perspective-origin: 50% 50%;
}

.sky-tabs-anim-flip > ul > li {
	-o-transform: rotateX(-90deg);
	-ms-transform: rotateX(-90deg);
	-moz-transform: rotateX(-90deg);
	-webkit-transform: rotateX(-90deg);
}
.sky-tabs-anim-flip.sky-tabs-pos-left > ul > li {
	-o-transform: rotateY(90deg);
	-ms-transform: rotateY(90deg);
	-moz-transform: rotateY(90deg);
	-webkit-transform: rotateY(90deg);	
}
.sky-tabs-anim-flip.sky-tabs-pos-right > ul > li {

	-o-transform: rotateY(-90deg);
	-ms-transform: rotateY(-90deg);
	-moz-transform: rotateY(-90deg);
	-webkit-transform: rotateY(-90deg);
}
.sky-tabs-anim-flip > .sky-tab-content-1:checked ~ ul > .sky-tab-content-1,
.sky-tabs-anim-flip > .sky-tab-content-2:checked ~ ul > .sky-tab-content-2,
.sky-tabs-anim-flip > .sky-tab-content-3:checked ~ ul > .sky-tab-content-3,
.sky-tabs-anim-flip > .sky-tab-content-4:checked ~ ul > .sky-tab-content-4,
.sky-tabs-anim-flip > .sky-tab-content-5:checked ~ ul > .sky-tab-content-5,
.sky-tabs-anim-flip > .sky-tab-content-6:checked ~ ul > .sky-tab-content-6,
.sky-tabs-anim-flip > .sky-tab-content-7:checked ~ ul > .sky-tab-content-7,
.sky-tabs-anim-flip > .sky-tab-content-8:checked ~ ul > .sky-tab-content-8,
.sky-tabs-anim-flip > .sky-tab-content-9:checked ~ ul > .sky-tab-content-9 {
	-o-transform: rotateX(0deg);
	-ms-transform: rotateX(0deg);
	-moz-transform: rotateX(0deg);
	-webkit-transform: rotateX(0deg);
	-o-transition-delay: 0.2s;
	-ms-transition-delay: 0.2s;
	-moz-transition-delay: 0.2s;
	-webkit-transition-delay: 0.2s;
}


/**/
/* grid system */
/**/
.sky-tabs .grid-row {
	margin-top: 20px;
}
.sky-tabs .grid-row:after {
	content: '';
	display: table;
	clear: both;
}
.sky-tabs .grid-row:first-child {
	margin-top: 0;
}
.sky-tabs .grid-col {
	display: block;
	float: left;
	width: 100%;
	margin-left: 2%;
}
.sky-tabs .grid-col:first-child {
	margin-left: 0;
}
.sky-tabs .grid-col .inner {
	padding: 10px 0;
	border-radius: 5px;
	background: rgba(0,0,0,0.1);
	text-align: center;
}
.sky-tabs .grid-col-1 {
	width: 6.5%;
}
.sky-tabs .grid-col-2 {
	width: 15%;
}
.sky-tabs .grid-col-3 {
	width: 23.5%;
}
.sky-tabs .grid-col-4 {
	width: 32%;
}
.sky-tabs .grid-col-5 {
	width: 40.5%;
}
.sky-tabs .grid-col-6 {
	width: 49%;
}
.sky-tabs .grid-col-7 {
	width: 57.5%;
}
.sky-tabs .grid-col-8 {
	width: 66%;
}
.sky-tabs .grid-col-9 {
	width: 74.5%;
}
.sky-tabs .grid-col-10 {
	width: 83%;
}
.sky-tabs .grid-col-11 {

	width: 91.5%;
}
.sky-tabs .grid-col-offset-1,
.sky-tabs .grid-col-offset-1:first-child {
	margin-left: 8.5%;
}
.sky-tabs .grid-col-offset-2,
.sky-tabs .grid-col-offset-2:first-child {
	margin-left: 17%;
}
.sky-tabs .grid-col-offset-3,
.sky-tabs .grid-col-offset-3:first-child {
	margin-left: 25.5%;
}
.sky-tabs .grid-col-offset-4,
.sky-tabs .grid-col-offset-4:first-child {
	margin-left: 34%;
}
.sky-tabs .grid-col-offset-5,
.sky-tabs .grid-col-offset-5:first-child {
	margin-left: 42.5%;
}
.sky-tabs .grid-col-offset-6,
.sky-tabs .grid-col-offset-6:first-child {
	margin-left: 51%;
}
.sky-tabs .grid-col-offset-7,
.sky-tabs .grid-col-offset-7:first-child {
	margin-left: 59.5%;
}
.sky-tabs .grid-col-offset-8,
.sky-tabs .grid-col-offset-8:first-child {
	margin-left: 68%;
}
.sky-tabs .grid-col-offset-9,
.sky-tabs .grid-col-offset-9:first-child {
	margin-left: 76.5%;
}
.sky-tabs .grid-col-offset-10,
.sky-tabs .grid-col-offset-10:first-child {
	margin-left: 85%;
}
.sky-tabs .grid-col-offset-11,
.sky-tabs .grid-col-offset-11:first-child {
	margin-left: 93.5%;
}


/**/
/* typography */
/**/
.sky-tabs .typography h1,
.sky-tabs .typography h2,
.sky-tabs .typography h3,
.sky-tabs .typography h4,
.sky-tabs .typography h5,
.sky-tabs .typography h6 {
	margin: 40px 0 0 0;
	padding: 0;
	text-align: left;
	color: #333;
}
.sky-tabs .typography h1 {
	font-size: 40px;
	line-height: 50px;
	font-weight: 300;
}
.sky-tabs .typography h2 {
	font-size: 34px;
	line-height: 44px;
	font-weight: 300;
}
.sky-tabs .typography h3 {
	font-size: 28px;
	line-height: 36px;
	font-weight: 300;
}
.sky-tabs .typography h4 {
	font-size: 22px;
	line-height: 30px;
	font-weight: 400;
}
.sky-tabs .typography h5 {
	font-size: 16px;
	line-height: 23px;
	font-weight: 400;
	text-transform: uppercase;
}
.sky-tabs .typography h6 {
	font-size: 14px;
	line-height: 20px;
	font-weight: 400;
	text-transform: uppercase;
}
.sky-tabs .typography p {
	margin: 20px 0 0 0;

	padding: 0;

	line-height: 20px;
	text-align: left;
}
.sky-tabs .typography ul,
.sky-tabs .typography ol {
	list-style: none;
	margin: 20px 0 0 0;
	padding: 0;
	line-height: 20px;
}
.sky-tabs .typography li {
	position: relative;
	margin-top: 5px;
	padding-left: 20px;
}
.sky-tabs .typography li ul,
.sky-tabs .typography li ol {
	margin-top: 5px;
}
.sky-tabs .typography ul li:before {
	content: '';
	position: absolute;
	top: 8px;
	left: 0;
	width: 4px;
	height: 4px;
	background: #333;
}
.sky-tabs .typography ol {
	counter-reset: list1;
}
.sky-tabs .typography ol > li:before {
	counter-increment:list1;
	content: counter(list1)'.';
	position: absolute;
	top: 0;
	left: 0;
	color: #333;
}
.sky-tabs .typography a {
	text-decoration: underline;
	color: #2da5da;
}
.sky-tabs .typography a:hover {
	text-decoration: none;
}
.sky-tabs .typography .pic {
	padding: 4px;
	border: 1px dotted #ccc;
}
.sky-tabs .typography .pic img {
	display: block;
}
.sky-tabs .typography .pic-right {
	float: right;
	margin: 0 0 10px 20px;
}
.sky-tabs .typography .link {
	text-decoration: underline;
	color: #2da5da;
	cursor: pointer;
}
.sky-tabs .typography .link:hover {
	text-decoration: none;
}
.sky-tabs .typography h1:first-child,
.sky-tabs .typography h2:first-child,
.sky-tabs .typography h3:first-child,
.sky-tabs .typography h4:first-child,
.sky-tabs .typography h5:first-child,
.sky-tabs .typography h6:first-child,
.sky-tabs .typography p:first-child {
	margin-top: 0;
}
.sky-tabs .typography .text-center {
	text-align: center;
}
.sky-tabs .typography .text-right {
	text-align: right;
}


/**/
/* icons */
/**/
.sky-tabs > label .fa {
	display: block;
	float: left;
	width: 18px;
	margin: 0 12px 0 -6px;
  font-family: FontAwesome;
  font-style: normal;
  font-size: 16px;
  line-height: 45px;
  text-align: center;
  -webkit-font-smoothing: antialiased;
}


/**/
/* pad */
/**/
@media screen and (max-width: 1000px) {
	.sky-tabs > label span span {
		padding: 0 15px;

	}
	.sky-tabs > label .fa {
		margin-right: 10px;
		margin-left: -5px;
	}
}


/**/
/* phone */
/**/
@media screen and (max-width: 767px) {
	
	.sky-tabs .grid-col,
	.sky-tabs .grid-col:first-child {
		float: none;
		width: 100%;
		margin: 20px 0 0 0;
	}
	
	.sky-tabs-response-to-stack > label {
		display: block;
		width: 100%;
		padding-right: 0;
		padding-left: 0;
		text-align: left;
	}
	.sky-tabs-response-to-stack > ul {
		margin-top: 0;
		margin-right: 0;
		margin-left: 0;
	}
	.sky-tabs-response-to-stack > ul > li {
		-o-transform-origin: 50% 0%;
		-ms-transform-origin: 50% 0%;
		-moz-transform-origin: 50% 0%;
		-webkit-transform-origin: 50% 0%;
	}
	.sky-tabs-response-to-stack.sky-tabs-anim-flip > ul > li {
		-webkit-transform: rotateX(-90deg);
	}
	
	.sky-tabs-response-to-icons > label {
		font-size: 0;
	}
	.sky-tabs-response-to-icons > label .fa {
		width: 45px;
		margin: 0;
		font-size: 16px;
	}
	.sky-tabs-response-to-icons > label span span {
		padding: 0;
	}
	.sky-tabs-response-to-icons.sky-tabs-pos-left > label,
	.sky-tabs-response-to-icons.sky-tabs-pos-right > label {
		width: 56px;
	}
	.sky-tabs-response-to-icons.sky-tabs-pos-left > ul {
		margin-left: 56px;
	}
	.sky-tabs-response-to-icons.sky-tabs-pos-right > ul {
		margin-right: 56px;
	}
	
	.sky-tabs-response-to-switcher > label {
		display: none;
		width: 100%;
		padding-right: 0;
		padding-left: 0;
		text-align: left;
	}
	.sky-tabs-response-to-switcher > .switcher {
		display: block;
	}
	.sky-tabs-response-to-switcher:hover > label {
		display: block;
	}
	.sky-tabs-response-to-switcher:hover > .switcher {
		display: none;
	}
	.sky-tabs-response-to-switcher > ul {
		margin-top: 0;
		margin-right: 0;
		margin-left: 0;
	}
	.sky-tabs-response-to-switcher > ul > li {
		-o-transform-origin: 50% 0%;
		-ms-transform-origin: 50% 0%;
		-moz-transform-origin: 50% 0%;
		-webkit-transform-origin: 50% 0%;
	}
	.sky-tabs-response-to-switcher.sky-tabs-anim-flip > ul > li {
		-webkit-transform: rotateX(-90deg);
	}
}

.form_container ul{ list-style:none; margin:10px 0;}
.form_container ul li{ list-style:none;}
.form_input{ margin:5px 0;}
.form_input select, .form_input input[type="text"],.form_input textarea{ padding:5px; border:1px solid #ccc; border-radius:5px; width:40%;}
.btn {
  border-color: #CCCCCC;
  border-radius: 0;
  -webkit-border-radius: 0;
  outline: none;
  margin-bottom: 4px !important;
  margin-left: 4px;
  font-size: 13px;
  padding: 7px 11px;
}
.btn-primary {
  color: #fff;
  background-color: #428bca;
  border-color: #357ebd;
}
.btn-primary, .btn-primary:focus {
  background-color: #4D90FD;
  border-color: #3680BF;
}
    </style>
    <div class="body">
		<div align="center" style="color:#900;font-size:20px;font-weight:bold;"><?php echo @$_GET['msg'];?>
      <?php if($_GET['msg']=='Thank You! for your purchase. Your request is in process')
      {
      	print_r("<br/>");print_r("<br/>");
        echo "Note : Due to many layers of processes, the reload may take up to 2 hours to complete. Please allow the time needed to reload. If the reload is not complete within 2 hours, please contact support.";print_r("<br/>");
      }
?>
		</div>
			<!-- tabs -->
			<div class="sky-tabs sky-tabs-pos-top-left sky-tabs-anim-flip sky-tabs-response-to-icons">
				<input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
				<label for="sky-tab1"><span><span><i class="fa fa-bolt"></i>Buy Product</span></span></label>
				
				
				
				<ul>
					<li class="sky-tab-content-1">					
						<div class="typography">
							

	<form  method="post" class="form_container left_label" name="profile" action="product_buy_code1.php" >
							
                            	<div style="width:100%; float:left; text-align:center;">
								<?php $rel=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from cp3 where user_id='$id'"));?> 
								<div>

   <label class="field_title">Present Reload Point : <font color="#FF0000" size="2">  <?php echo number_format($rel['amount'],2);?> PV</font></label>
<br/><br/> <a href="#" style="text-decoration:none;color:#900;font-size:18px;font-weight:bold;">Please process same reload with a difference of 30 minutes</a><br/>Tune talk is having service interruption please dont reload for that until next signal<br/>
                  

									<label class="field_title">Select Product</label>
									<div class="form_input">
						<select name="product" id="countryId"  onChange="getState(this.value)" style="width:530px; border:1px solid #ebebeb; padding:5px;"required>
 <option disabled="" selected="selected">Select Product</option> 
                      
                      <option disabled="">----------------------------------Telco Malaysia Prepaid------------------------------</option> 
                        

                       <?php 

						  $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where type='Prepaid'");

						  while($queryf1=mysqli_fetch_array($fquery))

						  {

						  ?>

                          <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?></option>

                          <?php } ?>
   <!-- <option disabled="">-------------------------------Telco Malaysia Postpaid------------------------------------</option> 
                       <?php 

						  $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where type='Postpaid'");

						  while($queryf1=mysqli_fetch_array($fquery))

						  {

						  ?>

                          <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?></option>

                          <?php } ?>-->

    <option disabled="">--------------------Telco International Air Time-----------------</option> 
 <?php 

						  $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where type='International Air Time' and id=14 || id=15");

						  while($queryf1=mysqli_fetch_array($fquery))

						  {

						  ?>

                          <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?></option>

                          <?php } ?>
				

                      </select>
									</div>
								</div>
                               

               <div id="statediv">

                     

                      <select style="display:none" name="amount"><option value="">Select</option></select>

                     </div>				

                     <label class="field_title">Enter Mobile Number <a href="#" style="text-decoration:none;color:#900;font-size:14px;font-weight:bold;">(without country code)</a> <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="number" name="mobile" value="" required style="width:400px;border:2px solid #ebebeb;">

                    </div>

                     <label class="field_title">Confirm Mobile Number <a href="#" style="text-decoration:none;color:#900;font-size:14px;font-weight:bold;">(without country code)</a> <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="number" name="cmobile" value="" required style="width:400px;border:2px solid #ebebeb;">

                    </div>
                    
                    
                    <label class="field_title">Enter Your Transaction Password <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="password" name="password" value="" required style="width:400px;border:1px solid #ebebeb; padding:5px;">

                    </div>
                    
                    	
                           
								<div class="form_grid_12">
									<div class="form_input">
										<input type="submit" name="submit" value="Buy Now"  class="btn btn-primary">
										
									</div>
								</div>
                                
                                </div>

						</form>
						</div>
					</li>
					
				</ul>
			</div>
			<!--/ tabs -->
			
		</div>
	</div></div>
    
            </div>
            </div>
                
              </div>
              
		</div> 
		
	</div>
						

	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="js/general.js"></script>
  	<script src="js/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.nestable.js"></script>
	<script type="text/javascript" src="js/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/select2.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.gritter.js"></script>
	<script type="text/javascript" src="js/icheck.min.js"></script>
     <script type="text/javascript" src="js/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="js/bootstrap3-wysihtml5.all.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      App.init();
      
      $('#some-textarea').wysihtml5({"stylesheets": ["js/bootstrap.wysihtml5/styles/email-editor.css"]});
      
    });
  </script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="js/voice-commands.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/jquery.flot.labels.js"></script>
</body>
</html>
