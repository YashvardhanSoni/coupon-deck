<?php
session_start();
require __DIR__.'/apiController.php';
require __DIR__.'/helper/common.php';
$region = '';
$change_region = '';
$brand = '';

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
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
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

$activeRegion = activeRegion($method, $url);
// $activeBrands = activeBrands($method, $url);
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
	<title>Coupon Details</title>
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
			<section class="banner banner3 bg-full overlay" style="background-image: url('coupon.jpg');">
				<div class="holder">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>Coupon Single</h1>
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
							<!-- content of the page -->
							<article id="content">
								<!-- post detail of the page -->
								<?php if(!empty($apiData)){
                                  $i = 1;
                                  foreach($apiData as $index){
                                ?>
								<div class="post-detail style2" id="popup<?php echo $i;?>">
									<div class="img-holder">
										<img src="<?php echo $index['logo'];?>" alt="image description" class="img-responsive">
									</div>
									<div class="txt-holder">
										<header class="header">
											<!-- <div class="coupon-logo">
												<img src="http://placehold.it/100x50" alt="Red Cart" class="img-responsive">
											</div> -->
											<div class="align-left">
												<h3 class="heading3"><?php echo $index['title'];?></h3>
												<ul class="list-unstyled list-show">
													<li><a><i class="icon icon-smile"></i> Verified</a></li>
												</ul>
											</div>
										</header>
										<p><i><?php echo $index['description_lang'];?></i></p>
										<!-- <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
										<footer class="footer">
											<a href="<?php echo $index['preview_url'];?>" target="_blank" class="btn-primary text-center text-uppercase">Visit Site</a>
											
										</footer>
									</div>
								</div>
								<?php $i++;} } ?>
							</article>
							<!-- sidebar of the page -->
							<aside id="sidebar">
								<!-- Widget of the page -->
								<section class="widget search-widget">
									<form action="#" class="search-form">
										<fieldset>
											<input type="search" class="form-control" placeholder="Enter Keyword">
											<button type="submit" class="sub-btn text-center text-uppercase">GO</button>
										</fieldset>
									</form>
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
												<a href="#"><img src="http://placehold.it/75x75" alt="image description" class="img-responsive"></a>
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
												<a href="#"><img src="http://placehold.it/75x75" alt="image description" class="img-responsive"></a>
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
												<a href="#"><img src="http://placehold.it/75x75" alt="image description" class="img-responsive"></a>
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
								<section class="widget tags-widget">
									<h3 class="heading4">Popular Tags</h3>
									<ul class="list-unstyled tags-list text-center">
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Watches</a></li>
										<li><a href="#">Sports</a></li>
										<li><a href="#">Beauty &amp; Fitness</a></li>
										<li><a href="#">Fashion</a></li>
									</ul>
								</section>
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