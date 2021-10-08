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
	<meta name="description" content="CouponDeck-Coupons, Affiliates, Offers, Deals, Discounts &amp; Marketplace HTML Template">
	<!-- set the Keyword -->
	<meta name="keywords" content="">
	<meta name="author" content="CouponDeck-Coupons, Affiliates, Offers, Deals, Discounts &amp; Marketplace HTML Template">
	<title>CouponDeck-Coupons, Affiliates, Offers, Deals, Discounts &amp; Marketplace HTML Template</title>
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
			<section class="banner bg-full overlay" style="background-image: url(bg.jpg);">
				<div class="holder">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-left">
								<h1 class="text-uppercase">It looks like it's <br class="hidden-xs">been furnished <br class="hidden-xs">by <span class="clr">discount</span> <br class="hidden-xs">stores.</h1>
								<form action="#" class="search-form lg-round">
									<fieldset>
										<label for="search"><i class="icon icon-search"></i></label>
										<input type="search" class="form-control" id="search" placeholder="Search coupons & deals">
										<button type="submit" class="btn-icon"><i class="icon-right-arrow"></i></button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- latest coupon of the page -->
			<section class="latest-coupon container pad-top-lg pad-bottom-md">
				<div class="row">
					<header class="col-xs-12 text-center header">
						<h2 class="heading">Latest Coupon Codes &amp; Deals</h2>
					</header>
				</div>
				<div class="row">
				<?php if(!empty($hotOffers)){
              		$i = 0;
                    foreach($hotOffers as $index ){
						$desc = getFirstPara($index['description_lang']);
                      if($i < 4){?>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<!-- coupon box of the page -->
						<div class="coupon-box mar-bottom-xs"  style="min-height:450px;">
							<div class="img-holder">
								<img src="<?php echo $index['logo'];?>" alt="<?php echo $index['id'];?>" style="padding:20px;"  height="190px" width="260" class="img-resposnive">
							</div>
							<div class="txt-holder">
								<strong class="heading6">Name: <?php echo $index['title'];?></strong>
								<p><strong class="heading6"> </strong><?php echo $desc;?></p>
								<!-- <ul class="list-unstyled list-show">
									<li><a href="#"><i class="icon icon-smile"></i> Verified</a></li>
									<li><a href="#"><i class="icon icon-user"></i> Used</a></li>
								</ul> -->
								<a href="coupon1.php?hotoffers=<?php echo $index['id'];?>" class="btn-primary md-round text-center text-uppercase">View Offer</a>
								<!-- <time class="time text-center" datetime="2017-02-03 20:00">Expires On : 03 Sep, 2017</time> -->
							</div>
						</div>
					</div>
					<?php $i++;}}}?>
					
				</div>
			</section>
			<!-- store sec of the page -->
			<section class="store-sec bg-grey pad-top-lg pad-bottom-lg">
				<div class="container">
					<div class="row">
					
						<header class="col-xs-12 text-center header">
							<h3 class="heading">More Than <span class="clr">3000+ Stores</span> In One Place!</h3>
							<p>Search your favourite store &amp; get many deals</p>
						</header>
					</div>
					
					<div class="row">
					
						<div class="col-xs-12">
						
							<ul class="list-unstyled store-logo">
							<?php if(!empty($activeBrands)){
              			$i = 0;
                    	foreach($activeBrands as $index){
                      	if($i < 10){?>
								<li><a href="coupon1.php?brand=<?php echo $index['title'];?>"><img src="<?php echo $index['logo'];?>" style="padding:20px;" width="150" height="65" alt="<?php echo $index['title'];?>" class="img-responsive"></a></li>
								<?php $i++; }}}?>	
							</ul>
							<div class="text-center">
								<a href="store.php" class="btn-primary text-center text-uppercase md-round">Visit all stores</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- feature sec of the page -->
			<section class="feature-sec container pad-top-lg pad-bottom-md">
				<div class="row">
					<header class="col-xs-12 text-center header">
						<h4 class="heading">CouponDeck Featured Category</h4>
						<p>Explore the popular categories in CouponDeck</p>
					</header>
				</div>
				<div class="row">
				<?php if(!empty($activeCategories)){
            		foreach($activeCategories as $index => $list){ ?>
					<div class="col-xs-12 col-sm-4">
						<!-- Feature Box of the page -->
						 <div class="feature-box">
							<span class="icon round text-center"><span class="border round"><i class="icon-restaurant"></i></span></span>
							<div class="img-holder overlay">
							<img src="<?php echo $list;?>" alt="<?php echo $index;?>" class="img-responsive">
								<div class="over text-center">
									<h2 class="heading2"><?php echo $index;?></h2>
								</div>
							</div>
							<a href="coupon1.php?category=<?php echo $index;?>" class="btn-primary text-center text-uppercase">
                                See Offers
                            </a>
						</div>
					</div>
					<?php }}?>
					
			</section>
			<!-- call out sec of the page -->
			<section class="callout-sec pad-top-sm pad-bottom-sm">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-lg-offset-1">
							<h3>Want To List Your Store In Our <strong>CouponDeck!</strong></h3>
						</div>
						<div class="col-xs-12 col-sm-3">
							<a href="#" class="btn-primary text-center text-uppercase md-round">Register Now</a>
						</div>
					</div>
				</div>
			</section>
			<!-- offer sec of the page -->
			<section class="offer-sec container pad-top-lg pad-bottom-md">
				<div class="row">
					<header class="col-xs-12 text-center header">
						<h2 class="heading">Today’s Best Offers And Coupons</h2>
						<!-- <ul class="list-unstyled filter-list">
							<li class="active"><a href="#" data-filter=".health">Medical</a></li>
							<li><a href="#" data-filter=".kitchen">Food &amp; Drink</a></li>
							<li><a href="#" data-filter=".res">Shopping</a></li>
							
						</ul> -->
					</header>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<!-- offer holder of the page -->
						<div class="offer-holder" id="offer_holder">
							<!-- col of the page -->
							<?php if(!empty($apiData)){
 								$i = 0;
								 foreach($apiData as $index){
									 $desc = getFirstPara($index['description_lang']);
             					 if($i < 6){?>
							<div class="col mar-bottom-xs health">
								<div class="header">
									<div class="c-logo" style="width: 200px; min-height: 125px; float: left; margin: 0 0px 0 0;"><img src="<?php echo $index['logo'];?>" alt="logo" class="img-responsive"></div>
									<!-- <span class="offer">25% Off</span> -->
								</div>
								<strong class="heading6">Name: <?php echo $index['title'];?></strong>
								<p><strong class="heading6"> </strong><?php echo $desc;?></p>
								<div class="text-center">
									<a href="<?php echo $index['preview_url'];?>" class="btn-primary text-center text-uppercase md-round">Visit Site</a>
									<!-- <time class="time" datetime="2017-02-03 20:00">Expires On : 29 Oct, 2017</time> -->
								</div>
							</div>
							<?php $i++;}}}?>
							
							
							
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" id="pageid" value="index">
			</section>
			<!-- app sec of the page -->
			<section class="app-sec pad-top-lg">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-5">
							<div class="img-holder">
								<img src="ppy.png" alt="image description" class="img-responsive">
							</div>
						</div>
						<div class="col-xs-12 col-sm-7">
							<div class="txt-holder">
								<h3 class="heading">Download Our PocketPenny App Now!</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
								<div class="btn-holder">
									<a href="https://play.google.com/store/apps/details?id=mTrack.droid.pocketpennyapp" target="_blank" class="pull-left"><img src="images/g-btn.png" alt="image description" class="img-resposnive"></a>
									<!-- <a href="#" class="pull-left"><img src="images/app-btn.png" alt="image description" class="img-resposnive"></a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- blog sec of the page -->
			<section class="blog-sec container pad-top-lg pad-bottom-md">
				<div class="row">
					<div class="header col-xs-12 header text-center">
						<h3 class="heading">Latest Updates From CouponDeck</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<!-- blog holder of the page -->
						<div class="blog-holder mar-bottom-xs">
							<div class="img-holder">
								<a href="benefits_of_discount_coupon.php"><img src="blog/blog1s.jpg" alt="image description" class="img-resposnive"></a>
								<time class="time text-center" datetime="2021-09-15 20:00">15 <span class="txt">Sep</span></time>
							</div>
							<h4 class="heading3"><a href="benefits_of_discount_coupon.php">Benefits of A Discount Coupon for Online Shopping</a></h4>
							<p>Discount coupons are getting popular in today's time among seasonal and regular shoppers out there.</p>
							<a href="benefits_of_discount_coupon.php" class="btn-primary text-center text-uppercase">read more</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<!-- blog holder of the page -->
						<div class="blog-holder mar-bottom-xs">
							<div class="img-holder">
								<a href="discount_coupons.php"><img src="blog/blog2s.jpg" alt="image description" class="img-resposnive"></a>
								<time class="time text-center" datetime="2021-09-16 20:00">16 <span class="txt">Sep</span></time>
							</div>
							<h4 class="heading3"><a href="discount_coupons.php">Discount Coupons: The Best Deals for your Online Shopping</a></h4>
							<p>In today’s time, whenever you obtain discount coupons and approach online shopping platforms,</p>
							<a href="discount_coupons.php" class="btn-primary text-center text-uppercase">read more</a>
						</div>
					</div>
					
			</section>
			<!-- subscribe sec of the page -->
			<section class="subscribe-sec bg-full" style="background-image: url('news.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 text-center">
							<h5>Subscribe To Our Newsletter</h5>
						</div>
						<div class="col-xs-12 col-sm-6">
							<form action="#" class="subscribe-form">
								<fieldset>
									<input type="email" class="form-control" placeholder="Email Address">
									<button type="submit" class="sub-btn"><i class="icon-airoplane"></i></button>
								</fieldset>
							</form>
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
