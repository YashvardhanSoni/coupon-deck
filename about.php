<?php
session_start();
require __DIR__.'/helper/common.php';
require __DIR__.'/apiController.php';
$region = '';
$brand = '';
$category='';
$change_region = '';


if(isset($_GET['region']) && $_GET['region'] != ''){
    $change_region = $_GET['region'];
    $_SESSION['region'] = $change_region;
    if(isset($_SESSION['user_id'])){
        updateUserRegion($change_region, $_SESSION['user_id']);
    }
}
if(isset($_SESSION) && !empty($_SESSION['region'])){
    $region = $_SESSION['region'];
}
$method = 'GET';
if($region != ''){
    $url = 'https://api-mtrack.affise.com/3.0/partner/offers?api-key=9a5057e1103b54ea0bb5f4f16cbe1a62&countries[]='.$region;
}else{
    $url = 'https://api-mtrack.affise.com/3.0/partner/offers?api-key=9a5057e1103b54ea0bb5f4f16cbe1a62';
}

if(isset($_GET['brand']) && $_GET['brand'] != ''){
	$brand = $_GET['brand'];
	$category = getCategoryName($url, '', $brand);
	$apiData = getOffersList($method, $url, $brand, '');
	$othersData = activeBrands($method, $url, $category, $brand);
  
  }else if(isset($_GET['hotoffers']) && $_GET['hotoffers'] != ''){
	$hotoffers = $_GET['hotoffers'];
	$apiData = getOffersList($method, $url, '', '', $hotoffers);
	$othersData = hotOffers($method, $url);
  
  }else{
	$category = getCategoryName($url, $category, '');
	$apiData = getOffersList($method, $url, '', $category);
	$othersData = activeCategories($method, $url);
  }

$apiData = getOffersList($method, $url);
$activeRegion = activeRegion($method, $url);
$activeBrands = activeBrands($method, $url);
$activeCategories = activeCategories($method, $url);
$hotOffers = hotOffers($method, $url);
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Icon -->
	<link rel="icon" href="logo.ico" type="image/icon">
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the description -->
	<meta name="description" content="Coupmy-Coupons, Affiliates, Offers, Deals, Discounts &amp; Marketplace HTML Template">
	<!-- set the Keyword -->
	<meta name="keywords" content="">
	<meta name="author" content="Coupmy-Coupons, Affiliates, Offers, Deals, Discounts &amp; Marketplace HTML Template">
	<title>About us</title>
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CPoppins:300,400,500,600,900%7CLily+Script+One" rel="stylesheet">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/plugins.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/icofont.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="style.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/colors.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- include the site stylesheet -->
	<style class="color_css"></style>
</head>
<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- header of the page -->
		<header id="header">
			<!-- header top of the page -->
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<span class="txt">Welcome to CouponDeck</span>
							<ul class="align-left list-unstyled">
								<li><a href="mailto:support@coupondeck.co.in">Support</a></li>
								<?php
                                    	if (isset($_SESSION['username'])){
                                    ?>
                                    <li>
                                        <a>
                                          <?php
                                          echo 'Not '.$_SESSION['username'].' ?';
                                          }
                                          ?>
                                        </a>  
									<?php
                                        if (isset($_SESSION['username'])){
                                    ?>
                                    <li>
										<a href="logout.php">Logout</a></li>
                                    </li>
                                    <?php } ?>
                                    <?php
										if (!isset($_SESSION['username'])){
                                    ?>
								<li><a href="login.php"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<?php } ?>
								<li><a href="register.php"><i class="fa fa-user"></i> Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- header holder of the page -->
			<div class="header-holder container">
				<div class="row">
					<div class="col-xs-12">
						<div class="logo">
							<a href="index.php"><img src="images/logo.png" alt="CouponDeck" class="img-responsive"></a>
						</div>
						<div class="search-cart">
							<form action="#" class="search-form">
								<fieldset>
									<select>
										<option value="0">Select Category</option>
										<option value="1">Select Category</option>
										<option value="2">Select Category</option>
									</select>
									<input type="search" class="form-control" placeholder="Enter Keyword . . .">
									<button type="submit" class="sub-btn"><i class="icon-search"></i></button>
								</fieldset>
							</form>
							<!-- <a href="#" class="cart"><i class="icon-cart"></i> <span class="num round">2</span></a> -->
						</div>
					</div>
				</div>
			</div>
			<!-- nav holder of the page -->
			<div class="nav-holder">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<a href="#" class="nav-opener text-center hidden visible-sm visible-xs"><i class="fa fa-bars"></i></a>
							<!-- nav of the page -->
							<nav id="nav">
								<ul class="list-unstyled">
									<li class="active">
										<a href="index.php">Home</a>
									</li>
									<li>
										<a href="brands.php">Brands</a>
									</li>
									<li><a href="category.php">Category</a></li>
									<li>
									<a href="coupon1.php">Coupon</a>
									</li>
									<li>
										<a href="#">More</a>
										<ul class="drop-down list-unstyled">
											<li><a href="blog.php">Blog</a></li>
											<li><a href="about.php">About Us</a></li>
											<li><a href="contact.php">Contact Us</a></li>
										</ul>
									</li>
									
								</ul>
							</nav>
							<a href="submit-coupon.html" class="btn-primary text-center text-uppercase">Submit Coupon</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header of the page end -->
		<!-- main of the page -->
		<main id="main">
			<!-- banner of the page -->
			<section class="banner banner3 bg-full overlay" style="background-image: url('abt.jpg');">
				<div class="holder">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>About Us</h1>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- abt sec of the page -->
			<section class="abt-sec container pad-top-lg pad-bottom-lg">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="img-holder" style="vertical-align:middle;">
							<img src="images/logo.png" alt="image description" class="img-responsive">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="abt-txt">
							<strong class="title text-uppercase">Who We are</strong>
							<h3 class="heading">About CouponDeck</h3>
							<p>
								While buying from an online store rather than a physical one, you can use discount coupons. People are price conscious and its natural because of the economic comedown. 
							  It will give you the best way to save money while shopping online.
							You can visit the coupon deck website directly to see what deals and special promotions are happening right now.
							A few places you can find discounts include Amazon, Myntra, Flipkart, Ustraa, Wow Skin, Ajio, Samsung etc. 
							So you can buy more items, save more money, come across rare deals and benefit with seasonal offers by visiting our coupon deck website.
							</p>
							<a href="contact.html" class="btn-primary text-center text-uppercase md-round">Contact Us</a>
						</div>
					</div>
				</div>
			</section>
			<!-- service sec of the page -->
			<section class="service-sec style2 container pad-bottom-md">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<!-- service of the page -->
						<div class="service mar-bottom-xs">
							<span class="icon"><i class="icon-responsive"></i></span>
							<h3 class="heading5">Who we are</h3>
							Coupon Deck is one of the best places to find Latest Coupons & Offers for Online Shopping Sites in India.</p>
							<a href="https://mitraksh.in/#" class="read-more text-uppercase">Learn More</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<!-- service of the page -->
						<div class="service mar-bottom-xs">
							<span class="icon"><i class="icon-reload"></i></span>
							<h3 class="heading5">What we do</h3>
							Coupon Deck will help you get the right Coupon Codes, Promo Codes & Deals for 2021.
							We can find various coupons and offers in categories like Health, Food, Shopping, Electronics, Fashion etc. and many more.</p>
							<a href="https://mitraksh.in/#" class="read-more text-uppercase">Learn More</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<!-- service of the page -->
						<div class="service mar-bottom-xs">
							<span class="icon"><i class="icon-comments"></i></span>
							<h3 class="heading5">How we do</h3>
							Shop your favourite brand products at cheapest rates with our discount coupons. Coupon Deck offers discount coupons for grocery shopping as well.
							Get your Coupon code now and enjoy shopping with Coupon Deck.​</p>
							<a href="https://mitraksh.in/#" class="read-more text-uppercase">Learn More</a>
						</div>
					</div>
				</div>
			</section>
			<!-- counter sec of the page -->
			<!-- <section class="counter-sec bg-full overlay pad-top-sm pad-bottom-xs" style="background-image: url(http://placehold.it/1920x305);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-3 text-center mar-bottom-xs">
							<span class="icon"><i class="icon-user2"></i></span>
							<strong class="counter">300</strong>
							<span class="sub-title">Users Registered</span>
						</div>
						<div class="col-xs-12 col-sm-3 text-center mar-bottom-xs">
							<span class="icon"><i class="icon-scissors"></i></span>
							<strong class="counter">2900</strong>
							<span class="sub-title">Coupons Used Last Month</span>
						</div>
						<div class="col-xs-12 col-sm-3 text-center mar-bottom-xs">
							<span class="icon"><i class="icon-add"></i></span>
							<strong class="counter">150</strong>
							<span class="sub-title">Coupons Added</span>
						</div>
						<div class="col-xs-12 col-sm-3 text-center mar-bottom-xs">
							<span class="icon"><i class="icon-store"></i></span>
							<strong class="counter">3500</strong>
							<span class="sub-title">Stores In Coupay</span>
						</div>
					</div>
				</div>
			</section> -->
			<!-- team sec of the page -->
			<section class="team-sec container pad-top-lg pad-bottom-md">
				<div class="row">
					<header class="col-xs-12 text-center header">
						<h4 class="heading">Meet Our Great Team</h4>
					</header>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 mar-bottom-xs">
						<!-- team of the page -->
						<div class="team">
							<div class="img-holder">
								<img src="img/icons/employee.png" alt="image description" class="img-responsive">
								<!-- <div class="over">
									<ul class="list-unstyled socail-network">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
							<strong class="heading4">Mithlesh Sharma</strong>
							<span class="sub-title">CEO &amp; Founder</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mar-bottom-xs">
						<!-- team of the page -->
						<div class="team">
							<div class="img-holder">
								<img src="img/icons/employee.png" alt="image description" class="img-responsive">
								<!-- <div class="over">
									<ul class="list-unstyled socail-network">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
							<strong class="heading4">Shivam</strong>
							<span class="sub-title">Co-Founder</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mar-bottom-xs">
						<!-- team of the page -->
						<div class="team">
							<div class="img-holder">
								<img src="img/icons/employee.png" alt="image description" class="img-responsive">
								<!-- <div class="over">
									<ul class="list-unstyled socail-network">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
							<strong class="heading4">Yashvardhan Soni</strong>
							<span class="sub-title">Support</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mar-bottom-xs">
						<!-- team of the page -->
						<div class="team">
							<div class="img-holder">
								<img src="img/icons/employee.png" alt="image description" class="img-responsive">
								<!-- <div class="over">
									<ul class="list-unstyled socail-network">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
							<strong class="heading4">Anushka</strong>
							<span class="sub-title">Marketing</span>
						</div>
					</div>
				</div>
			</section>
			<!-- testimonail sec of the page -->
			<section class="testimonail-sec overlay bg-full pad-top-lg pad-bottom-lg" style="background-image: url('wfc.jpg');">
				<div class="container">
					<div class="row">
						<header class="header col-xs-12 text-center">
							<h2 class="heading">Words From Our Customers</h2>
						</header>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<!-- testimonail slider of the page -->
							<div class="testimonail-slider">
								<!-- slide of the page -->
								<blockquote class="slide md-round">
									<q>“ CouponDeck is awesome platform to find various offers and coupons WorldWide. ”</q>
									<cite>
										<!-- <span class="img-holder round">
											<img src="http://placehold.it/70x70" alt="image description" class="img-responsive">
										</span> -->
										<span class="align-left">
											<strong>User</strong>
											<span class="sub-title">Happy Customer</span>
										</span>
									</cite>
								</blockquote>
								<!-- slide of the page -->
								<blockquote class="slide md-round">
								<q>“ CouponDeck is awesome platform to find various offers and coupons WorldWide. ”</q>
									<cite>
										<!-- <span class="img-holder round">
											<img src="http://placehold.it/70x70" alt="image description" class="img-responsive">
										</span> -->
										<span class="align-left">
											<strong>User</strong>
											<span class="sub-title">Happy Customer</span>
										</span>
									</cite>
								</blockquote>
								<!-- slide of the page -->
								<blockquote class="slide md-round">
								<q>“ CouponDeck is awesome platform to find various offers and coupons WorldWide. ”</q>
									<cite>
										<!-- <span class="img-holder round">
											<img src="http://placehold.it/70x70" alt="image description" class="img-responsive">
										</span> -->
										<span class="align-left">
											<strong>User</strong>
											<span class="sub-title">Happy Customer</span>
										</span>
									</cite>
								</blockquote>
								<!-- slide of the page -->
								<blockquote class="slide md-round">
								<q>“ CouponDeck is awesome platform to find various offers and coupons WorldWide. ”</q>
									<cite>
										<!-- <span class="img-holder round">
											<img src="http://placehold.it/70x70" alt="image description" class="img-responsive">
										</span> -->
										<span class="align-left">
											<strong>User</strong>
											<span class="sub-title">Happy Customer</span>
										</span>
									</cite>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- brand sec of the page -->
			<section class="brand-sec container pad-top-lg pad-bottom-md">
				<div class="row">
					<header class="col-xs-12 header text-center">
						<h2 class="heading">Our Trusted Brands</h2>
					</header>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<ul class="list-unstyled brand-list">
						<?php if(!empty($activeBrands)){
              			$i = 0;
                    	foreach($activeBrands as $index){
                      	if($i < 10){?>
							<li><a href="coupon1.php?brand=<?php echo $index['title'];?>"><img src="<?php echo $index['logo'];?>" style="padding:35px;" alt="<?php echo $index['title'];?>" class="img-responsive"></a></li>
							<?php $i++; }}}?>
						</ul>
						<div class="text-center">
								<a href="brands.php" class="btn-primary text-center text-uppercase md-round">Visit all stores</a>
							</div>
					</div>
				</div>
			</section>
		</main>
		<!-- main of the page end -->
		<!-- footer of the page -->
		<footer id="footer">
			<!-- footer holder of the page -->
			<div class="footer-holder container">
				<div class="row">
					<div class="col-xs-12">
						<div class="col1">
							<h3 class="text-uppercase">Contact CouponDeck</h3>
							<ul class="list-unstyled contact-list">
								<li>
									<span class="icon icon-location"></span>
									<address>A - 153, BLOCK - A ANSAL TOWN SHAMSHABAD ROAD Agra-283125 Uttar Pradesh</address>
								</li>
								<li>
									<span class="icon icon-phone"></span>
									<span class="tel"><a href="tel:919540291981">+91-9540291981</a></span>
								</li>
								<li>
									<span class="icon icon-email"></span>
									<span class="mail"><a href="mailto:support@coupondeck.co.in">support@coupondeck.co.in</a></span>
								</li>
							</ul>
						</div>
						<div class="col2">
							<h3 class="text-uppercase">Quick Links</h3>
							<ul class="list-unstyled f-nav">
								<li><a href="about.php">About Us</a></li>
								<li><a href="coupon1.php">Coupons</a></li>
								<li><a href="blog.php">Latest News</a></li>
								<li><a href="mailto:support@coupondeck.co.in">Support</a></li>
								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
						<div class="col3">
							<h3 class="text-uppercase">Categories</h3>
							<ul class="list-unstyled tags">
							<?php if(!empty($activeCategories)){
            					foreach($activeCategories as $index => $list){ ?>
								<li><a href="offers.php?category=<?php echo $index;?>"><?php echo $index;?></a></li>
								<?php }}?>
							</ul>
							<h3 class="text-uppercase">Follow us</h3>
							<ul class="list-unstyled socail-network">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
						<div class="col4">
							<h3 class="text-uppercase">Recent Tweets</h3>
							<ul class="list-unstyled recent-tweet">
								<li>
									<span class="icon"><i class="fa fa-twitter"></i></span>
									<div class="txt-holder">
										<p><a href="https://twitter.com/CDeck21">@CDeck21</a> Coupondeck provides one of the best brands coupons for online shopping in India offering online shoppers more offers, deals and discounts whether it may be shopping from online brands. </p>
										<time datetime="2021-09-24 20:00" class="time">Posted on 24 Sep 2021</time>
									</div>
								</li>
								<li>
									<span class="icon"><i class="fa fa-twitter"></i></span>
									<div class="txt-holder">
										<p><a href="https://twitter.com/CDeck21">@CDeck21</a> Whenever you do online shopping make sure you are getting the best deals and offers on all of your shopping products. Hurry up and get your discount coupons right now by visiting our website. </p>
										<time datetime="2021-09-17 20:00" class="time">Posted on 17 Sep 2021</time>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- footer area of the page -->
			<div class="footer-area">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-5">
							<p>© 2021 CouponDeck-All rights reserved</p>
						</div>
						<div class="col-xs-12 col-sm-7">
							<ul class="list-unstyled footer-nav">
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms&amp;Conditions</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer of the page end -->
		<span id="back-top" class="text-center md-round fa fa-angle-up"></span>
		<!-- loader of the page -->
		<div id="loader" class="loader-holder">
			<div class="block"><img src="images/svg/bars.svg" width="60" alt="loader"></div>
		</div>
	</div>
	<!-- main container of all the page elements end -->
	<!-- include jQuery -->
	<script src="js/jquery.js"></script>
	<!-- include jQuery -->
	<script src="js/plugins.js"></script>
	<!-- include jQuery -->
	<script src="js/jquery.main.js"></script>
	<div id="style-changer" data-src="style-changer.html"></div>
</body>
</html>