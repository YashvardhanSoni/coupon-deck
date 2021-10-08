<?php
session_start();
require __DIR__.'/apiController.php';
require __DIR__.'/helper/common.php';
$region = '';

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
$apiData = getOffersList($method, $url);
$activeRegion = activeRegion($method, $url);
$activeCategories = activeCategories($method, $url);
$activeBrands = activeBrands($method, $url);
$othersData = activeCategories($method, $url);
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
	<title>Brands</title>
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
									<select id="category">
										<option value="0">Select Category</option>
										<?php foreach($othersData as $index => $values){?>
											<option value="<?php echo $index?>"><?php echo $index?></option>
										<?php } ?>
									</select>
									<input type="search" class="form-control" id="search_value" placeholder="Enter Keyword . . .">
									<button type="submit" id="search_btn" class="sub-btn"><i class="icon-search"></i></button>
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
			<section class="banner banner3 bg-full overlay" style="background-image: url('brands.jpg');">
				<div class="holder">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>Stores</h1>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- twocolumns of the page -->
			<div class="twocolumns pad-top-lg pad-bottom-lg">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- Content of the page -->
							<article id="content">
								<!-- header of the page -->
								<header class="header">
									<h3 class="heading2">Store List</h3>
									<!-- <ul class="list-unstyled abc-list">
										<li><a href="#">A</a></li>
										<li><a href="#">B</a></li>
										<li><a href="#">C</a></li>
										<li><a href="#">D</a></li>
										<li><a href="#">E</a></li>
										<li><a href="#">F</a></li>
										<li><a href="#">G</a></li>
										<li><a href="#">H</a></li>
										<li><a href="#">I</a></li>
										<li><a href="#">J</a></li>
										<li><a href="#">K</a></li>
									</ul> -->
								</header>
								<!-- holder of the page -->
								<div class="holder">
									<!-- <div class="header-holder">
										<span class="txt pull-left text-uppercase">A</span>
										<a href="#" class="store-txt pull-right">4 Stores Available</a>
									</div> -->
									<ul class="list-unstyled store-logo" id="offer_holder">
									<?php if(!empty($activeBrands)){
            							foreach($activeBrands as $index){ ?>
										<li><p><b><?php echo $index['title'];?></b></p><a href="coupon1.php?brand=<?php echo $index['title'];?>"><img src="<?php echo $index['logo'];?>" style="padding:25px;" alt="<?php echo $index['title'];?>" class="img-responsive"></a></li>
									<?php }}?>
										<!-- <li><a href="#"><img src="http://placehold.it/100x50" alt="RedCart" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/100x50" alt="RedCart" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/100x50" alt="RedCart" class="img-responsive"></a></li> -->
									</ul>
								</div>
								<input type="hidden" id="pageid" value="brands">
								
							</article>
							<!-- Sidebar of the page -->
							<aside id="sidebar">
								<!-- Widget of the page -->
								<section class="widget coupon-submit-widget overlay bg-full text-center" style="background-image: url(http://placehold.it/270x205);">
									<span class="icon"><i class="icon-speaker"></i></span>
									<strong class="title text-uppercase">Submit Your Coupon</strong>
									<a href="#" class="btn-primary text-center text-uppercase">Submit now</a>
								</section>
								<!-- Widget of the page -->
								<section class="widget category-widget">
									<h3 class="heading4">Blog Categories</h3>
									<ul class="list-unstyled category-list">
										<li><a href="#"><span class="pull-left">All Categories</span><span class="pull-right">(10)</span></a></li>
										<li><a href="#"><span class="pull-left">Beauty</span><span class="pull-right">(07)</span></a></li>
										<li><a href="#"><span class="pull-left">Health</span><span class="pull-right">(15)</span></a></li>
										<li><a href="#"><span class="pull-left">Fitness</span><span class="pull-right">(13)</span></a></li>
										<li><a href="#"><span class="pull-left">Watches</span><span class="pull-right">(05)</span></a></li>
									</ul>
								</section>
								<!-- Widget of the page -->
								<section class="widget popular-widget">
									<h3 class="heading4">Popular Stores</h3>
									<ul class="list-unstyled popular-list">
										<li><a href="#"><img src="http://placehold.it/85x85" alt="image description" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/85x85" alt="image description" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/85x85" alt="image description" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/85x85" alt="image description" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/85x85" alt="image description" class="img-responsive"></a></li>
										<li><a href="#"><img src="http://placehold.it/85x85" alt="image description" class="img-responsive"></a></li>
										<li><a href="#" class="text-uppercase">View All Stores</a></li>
									</ul>
								</section>
								<!-- Widget of the page -->
								<section class="widget news-widget">
									<h3 class="heading4">Latest News</h3>
									<ul class="list-unstyled latest-news-list">
										<li>
											<div class="img-holder round">
												<a href="#"><img src="http://placehold.it/70x70" alt="image description" class="img-responsive"></a>
											</div>
											<div class="txt-holder">
												<h3><a href="#">Veritatis Euas Arch Beatae Vitae</a></h3>
												<ul class="list-unstyled news-nav">
													<li>By <a href="#">Admin</a></li>
													<li>|</li>
													<li><time datetime="2017-02-03 20:00">Sep 07, 2017</time></li>
												</ul>
											</div>
										</li>
										<li>
											<div class="img-holder round">
												<a href="#"><img src="http://placehold.it/70x70" alt="image description" class="img-responsive"></a>
											</div>
											<div class="txt-holder">
												<h3><a href="#">Numquam Eius Modi Tempora Incid</a></h3>
												<ul class="list-unstyled news-nav">
													<li>By <a href="#">Admin</a></li>
													<li>|</li>
													<li><time datetime="2017-02-03 20:00">Sep 07, 2017</time></li>
												</ul>
											</div>
										</li>
										<li>
											<div class="img-holder round">
												<a href="#"><img src="http://placehold.it/70x70" alt="image description" class="img-responsive"></a>
											</div>
											<div class="txt-holder">
												<h3><a href="#">Vel Illum Qui Dolore Eum Fugiat</a></h3>
												<ul class="list-unstyled news-nav">
													<li>By <a href="#">Admin</a></li>
													<li>|</li>
													<li><time datetime="2017-02-03 20:00">Sep 07, 2017</time></li>
												</ul>
											</div>
										</li>
									</ul>
								</section>
								<!-- Widget of the page -->
								
							</aside>
						</div>
					</div>
				</div>
			</div>
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
								<li><a href="coupon1.php?category=<?php echo $index;?>"><?php echo $index;?></a></li>
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
	<script src="js/custom.js"></script>

</body>
</html>