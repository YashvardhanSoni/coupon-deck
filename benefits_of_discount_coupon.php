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
	<title>Benefits of A Discount Coupon</title>
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
										<option value="">Select Category</option>
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
			<section class="banner banner3 bg-full overlay" style="background-image: url('news.jpg');">
				<div class="holder">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>Benefits of A Discount Coupon for Online Shopping</h1>
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
								<div class="post-detail">
									
									<div class="txt-holder">
										<!-- <ul class="list-unstyled social-network">
											<li>Share</li>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										</ul> -->
										<h4 class="heading3"><big>Benefits of A Discount Coupon for Online Shopping</big></h4>
										<p>Discount coupons are getting popular in today's time among seasonal and regular shoppers out there. While buying from an online store rather than a physical one, you can use them.
             								People are price-conscious, and it is natural because of the economic comedown. <b>Discount coupons for online shopping</b> are available with every online shopping platform. They come with numerous advantages. So, are you interested in knowing what discount coupons could bring you? If yes, then in this article, we are going to talk about some benefits of a discount coupon. Undoubtedly, you will love to hear about them.</p>
										<!-- <blockquote class="quote">
											<q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</q>
										</blockquote> -->
										<!-- <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p> -->
										<h4 class="heading3">Top Benefits Of A Discount Coupon</h4>
										<p><b>1. You Can Buy More Items</b></p>
										<div class="img-holder">
											<img src="blog/blog1b.jpg" alt="image description" class="img-responsive">
										</div>
										<p>There are <span><b>coupon selling websites</b></span> that allow you to make the most out of online shopping. Many items you cannot buy at regular prices can be purchased with the help of these websites.  Shopping coupons are active for a limited period. For your long-shelf products, like soaps, shampoos and other cosmetics, you can use them. Browse the internet, and you will find the best offers with rebates. It will help you save a lot while purchasing.</p>
										<p><b>2. Save More Money</b></p>
										<p>When you realize a significant price reduction, you get an opportunity to save time, as well as money. You save time with these coupons because these offers stay for a few days. If you get the best brand offers together with discounts in India, you do much better shopping. Even a 10% discount is enough when the topmost online retailers allow them. Online shoppers should not overlook discount coupons at all. Neglecting them will let buyers miss out on some of the excellent offers open at reasonable prices</p>
										<p><b>3. You Come Across Rare Deals</b></p>
										<div class="img-holder">
											<img src="blog/blog1ba.jpg" alt="image description" class="img-responsive">
										</div>
										<p>If you visit an online shopping platform without a discount coupon, you fail to reach exceptional deals. But you may find coupon codes working for many things. For example, some shopping coupons can act as your multi-purpose ticket to choose from more than one item. You may not get such an opportunity as a regular customer. Therefore, shop more to receive the best deals in a short time. Following the boom in the online business, you can easily explore what lies behind the doors as an opportunity.</p>
										<p><b>4. Benefit With Seasonal Offers</b></p>
										<p>You indeed get closer to the best seasonal offers while visiting the websites that are offering rebates. Many tourism companies partner with online shopping platforms to reach people. Select from a range of shopping offers, and you will end up receiving coupons for many holiday packages apart from the <b>best shopping deals with discount coupons in India.</b>. The top retailers forever offer all that you are looking for. Make sure you grab deals when they get added.</p>
										<p><b>Final Thoughts</b></p>
										<p>So, these are the benefits of a discount coupon. Shoppers in India can come across the most suitable <b>coupon deals website for online shopping</b> as there are hundreds of platforms competing to give their best. Discount coupons really influence both buyers and business owners. Finally, I would like to say that you should look for a platform and coupons worthy of acquiring. Then only you will get an outstanding shopping experience.</p>
										
										<center><button onclick="goBack()" formtarget="_blank" class="myBtn" style="border: none;border-radius: 5px;background: transparent;color: orange;font-weight: bold;">Go Back</button></center>
										
										<script>
										function goBack() {
										window.history.back();
										}
										</script>

										<!-- <ul class="list-unstyled tags-list text-uppercase">
											<li><a href="#">Tags</a></li>
											<li><a href="#">Coupons</a></li>
											<li><a href="#">Discount</a></li>
										</ul> -->
									</div>
								</div>
								<!-- Comments block of the page -->
								<!-- <div class="comments-block">
									<h4 class="heading2">Comments</h4>
									<article class="commment-area">
										<a href="#" class="img"><img src="http://placehold.it/80x80" alt="image description" class="img-responsive"></a>
										<div class="txt-holder">
											<div class="header">
												<h3><a href="#">Micheal</a></h3>
												<time datetime="2018-01-01">Sep 13, 2018</time>
											</div>
											<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore verit.</p>
										</div>
									</article> -->
									<!-- comment one level of the page -->
									<!-- <div class="commment-onelevel">
										<article class="commment-area">
											<a href="#" class="img"><img src="http://placehold.it/80x80" alt="image description" class="img-responsive"></a>
											<div class="txt-holder">
												<div class="header">
													<h3><a href="#">David</a></h3>
													<time datetime="2018-01-01">Sep 13, 2018</time>
												</div>
												<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus doloremque laudantium totam rem aperiam eaque.</p>
											</div>
										</article>
									</div> -->
									<!-- comment area of the page -->
									<!-- <article class="commment-area">
										<a href="#" class="img"><img src="http://placehold.it/80x80" alt="image description" class="img-responsive"></a>
										<div class="txt-holder">
											<div class="header">
												<h3><a href="#">Whity</a></h3>
												<time datetime="2018-01-01">Sep 12, 2018</time>
											</div>
											<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore verit.</p>
										</div>
									</article>
								</div> -->
								<!-- Comments form of the page -->
								<!-- <div class="comments-form">
									<h4 class="heading2">Leave Your Comments</h4>
									<form action="#" class="leave-form">
										<fieldset>
											<div class="form-group">
												<div class="col">
													<input type="text" class="form-control" placeholder="Your Name *">
												</div>
												<div class="col">
													<input type="email" class="form-control" placeholder="Email Address *">
												</div>
											</div>
											<textarea placeholder="Your Comment *"></textarea>
											<button type="submit" class="btn-primary text-center text-uppercase">Post Comment</button>
										</fieldset>
									</form>
								</div> -->
							</article>
							<!-- sidebar of the page -->
							<aside id="sidebar">
								<!-- Widget of the page -->
								<section class="widget coupon-submit-widget overlay bg-full text-center" style="background-image: url(http://placehold.it/270x205);">
									<span class="icon"><i class="icon-speaker"></i></span>
									<strong class="title text-uppercase">Submit Your Coupon</strong>
									<a href="#" class="btn-primary text-center text-uppercase">Submit now</a>
								</section>
								<!-- Widget of the page -->
								<section class="widget category-widget">
									<h3 class="heading4">Offer Categories</h3>
									<ul class="list-unstyled category-list">
									<?php if(!empty($activeCategories)){
            						foreach($activeCategories as $index => $list){ ?>
										<li><a href="coupon1.php?category=<?php echo $index;?>"><span class="pull-left"><?php echo $index;?></span></a></li>
										<?php }}?>
									</ul>
								</section>
								<!-- Widget of the page -->
								<section class="widget popular-widget">
									<h3 class="heading4">Popular Stores</h3>
									<ul class="list-unstyled popular-list">
									<?php if(!empty($activeBrands)){
										$i = 0;
										foreach($activeBrands as $index){
										if($i < 6){?>
										<li><a href="coupon-detail.php?brand=<?php echo $index['title'];?>" target="_blank"><img src="<?php echo $index['logo'];?>" width="85" height="85" alt="image description" class="img-responsive"></a></li>
										<?php $i++; }}}?>
										<li><a href="brands.php" class="text-uppercase">View All Stores</a></li>
									</ul>
								</section>
								<!-- Widget of the page -->
								<section class="widget news-widget">
									<h3 class="heading4">Latest News</h3>
									<ul class="list-unstyled latest-news-list">
										<li>
											<div class="img-holder round">
												<a href="benefits_of_discount_coupon.php" target="_blank"><img src="blog/blog1s.jpg" width="70" height="70" alt="image description" class="img-responsive"></a>
											</div>
											<div class="txt-holder">
												<h3><a href="benefits_of_discount_coupon.php" target="_blank">Benefits of A Discount Coupon for Online Shopping</a></h3>
												<ul class="list-unstyled news-nav">
													<li>By <a>Admin</a></li>
													<li>|</li>
													<li><time datetime="2021-09-15 20:00">Sep 15, 2021</time></li>
												</ul>
											</div>
										</li>
										<li>
											<div class="img-holder round">
												<a href="discount_coupons.php" target="_blank"><img src="blog/blog2s.jpg" width="70" height="70" alt="image description" class="img-responsive"></a>
											</div>
											<div class="txt-holder">
												<h3><a href="discount_coupons.php" target="_blank">Discount Coupons: The Best Deals for your Online Shopping</a></h3>
												<ul class="list-unstyled news-nav">
													<li>By <a>Admin</a></li>
													<li>|</li>
													<li><time datetime="2021-09-16 20:00">Sep 16, 2021</time></li>
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
							<h3 class="text-uppercase">Quick Link</h3>
							<ul class="list-unstyled tags">
							<li><a href="index.php">Home</a></li>
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