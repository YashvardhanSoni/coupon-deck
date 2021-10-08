<?php
session_start();
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
	<title>Discount Coupons: The Best Deals</title>
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
								<h1>Discount Coupons: The Best Deals for your Online Shopping</h1>
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
										<h4 class="heading3"><big>Discount Coupons: The Best Deals for your Online Shopping</big></h4>
										<p>In today’s time, whenever you obtain discount coupons and approach online shopping platforms, you make the most out of the opportunities.
            								Everyone loves to shop online. Hence, shoppers come across a plethora of discounts by showing more and more interaction. Yes, the best deals you get have a relation with these coupons. You cannot have your luck go big many times by shopping without them. To reach the best deals, you should know about <b>discount coupons for online shopping.</b> In this article, I will tell you how you can find them while looking for a platform.</p>
										<!-- <blockquote class="quote">
											<q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</q>
										</blockquote> -->
										<!-- <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p> -->
										<h4 class="heading3">Finding Discount Coupons For The Best Deals</h4>
										<p>The first thing you can do while shopping online is to look for a discount-offering platform. Now, because there are hundreds of sites, it is challenging to reach the <b>best site for discount coupons in India.</b> What can you do about that? Are there independent reviews available so that you do not break more sweat? Yes! Google has all the honest opinions regarding any class of business. Online shoppers can browse through many reviews for every type of offer they want. Besides Google, there exist several talks on honest coupon review websites. Do your homework! Search for them!</p>
										<div class="img-holder">
											<img src="blog/blog2bb.jpg" alt="image description" class="img-responsive">
										</div>
										<p>On the next side, platform owners attract thousands of customers while providing promotional codes. Many times as a shopper, you expect promo codes and discounts. The best dealers award you with discount offers because they want to boost their business. Even if hundreds of customers approach a day, it is a significant achievement. However, one challenge exists on the way. During the initial phases, platform owners may fail to offer the best online deals. But with time, they do..</p>
										<div class="img-holder">
											<img src="blog/blog2b.jpg" alt="image description" class="img-responsive">
										</div>
										<p>Best brand coupons for online shopping in India</b> could come in many shapes and sizes. Online shopping platforms here compete with each other. You remain in power to pull deals. If your research on reviews goes nice, you are closer to the most satisfying offers having promo codes. A crucial thing to note is that having patience is necessary if you are not successfully analyzing these sites. Do not hurry! Take your time! Lacking patience takes you to many useless online shopping platforms. No customer dreams ending up there for sure.</p>
										<div class="img-holder">
											<img src="blog/blog2ba.jpg" alt="image description" class="img-responsive">
										</div>
										<h4 class="heading3">Conclusion</h4>
										<p>With every promotional code with the best discount comes the best online shopping deal. I have explained how you can easily analyze discount coupons for online shopping. At first, you may look for simplicity, but that is not going to work while being an online shopper in India. Some people buy credit cards for cashback. That isn't recommended because the value you get is not more than the charges you pay. Follow the steps given! Reach the results! Then any <b>coupon code for online shopping in India</b> can bring a feeling of worthiness to you. Finally, make sure you grab excellent coupons. It will boost your savings with the best deal.</p>
										
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