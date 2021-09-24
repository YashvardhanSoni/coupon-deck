<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     $_SESSION['msg'] = "You have to log in first";
//     header('location: login.php');
// }
// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['username']);
//     header("location: login.php");
//
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.ico" type="image/icon">
    <meta charset="utf-8">




    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/font.css"/>
    <link rel="stylesheet" href="css/font-awesome.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <!--css plugin-->
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link rel="stylesheet" href="css/jquery.nouislider.css"/>
    <link rel="stylesheet" href="css/jquery.popupcommon.css"/>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/style-dark.css">
    <link rel="stylesheet" href="css/style-gray.css">
    <!--[if IE 9]>
    <link rel="stylesheet" href="css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/>
    <![endif]-->

    <link rel="stylesheet" href="css/res-menu.css"/>
    <link rel="stylesheet" href="css/responsive.css"/>
    <!--[if lte IE 8]>
        <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
    <style>
    body, html {
    height: 100%;
    margin: 0;
  }

  .bg {
    /* The image used */
    background-image: url("ct.png");

    /* Full height */
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .button {
  margin-left: 20px;
  margin-top: 20px;
  border-radius: 40px;
    position: relative;
    background-color: orange;
    border: none;
    font-size: 15px;
    color: white;
    padding: 10px;
    padding-left: 5px;
    width: 200px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
  }
  #con_info, #social_info{
    color:white;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;font-size: 1.05em;
  }
  @media only screen and (max-width: 600px) {
  .bg {
    background-image: url("ctr.jpg");
  }
  .button{
    margin-left: 65px;
    margin-top: 20px;
  }
  #con_info, #social_info{
    color:white;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;text-align: center;font-size: 1.05em;
  }
}


.testimonials{
  padding: 0px 0;
  background: #f7f7f7;
  color: #434343;
  text-align: center;
}
.inner{
  max-width: 1200px;
  margin: auto;
  overflow: hidden;
  padding: 0 20px;
}

.border{
  width: 160px;
  height: 5px;
  background: #6ab04c;
  margin: 26px auto;
}

.row{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
.col{
  flex: 100%;
  max-width: 100%;
  box-sizing: border-box;
  padding: 15px;
}
.testimonial{
  background: #fff;
  padding: 30px;
}
.testimonial img{
  width: 100px;
  height: 100px;
}
.name{
  font-size: 20px;
  text-transform: uppercase;
  margin: 20px 0;
  line-height: 1;
}
.stars{
  color: #6ab04c;
  margin-bottom: 20px;
}


@media screen and (max-width:960px) {
.col{
  flex: 100%;
  max-width: 80%;
}
}

@media screen and (max-width:600px) {
.col{
  flex: 100%;
  max-width: 100%;
}
}

    </style>
</head>
<body class="gray"  onselectstart="return false" oncopy="return false" oncut="return false" onpaste="return false"><!--<div class="alert_w_p_u"></div>-->

  <!-- #region Jssor Slider Begin -->
  <!-- Generator: Jssor Slider Composer -->
  <!-- Source: https://www.jssor.com/demos/banner-rotator.slider/=edit -->
  <script src="js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      window.jssor_1_slider_init = function() {

          var jssor_1_SlideshowTransitions = [
            {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
            {$Duration:500,$Delay:40,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
            {$Duration:1000,x:-0.2,$Delay:20,$Cols:16,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
            {$Duration:1600,y:-1,$Delay:40,$Cols:24,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
            {$Duration:1200,x:0.2,y:-0.1,$Delay:16,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}},
            {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}},
            {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}}
          ];

          var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
              $Class: $JssorSlideshowRunner$,
              $Transitions: jssor_1_SlideshowTransitions,
              $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
              $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
              $Class: $JssorBulletNavigator$,
              $SpacingX: 16,
              $SpacingY: 16
            }
          };

          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

          /*#region responsive code begin*/

          var MAX_WIDTH = 980;

          function ScaleSlider() {
              var containerElement = jssor_1_slider.$Elmt.parentNode;
              var containerWidth = containerElement.clientWidth;

              if (containerWidth) {

                  var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                  jssor_1_slider.$ScaleWidth(expectedWidth);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }

          ScaleSlider();

          $Jssor$.$AddEvent(window, "load", ScaleSlider);
          $Jssor$.$AddEvent(window, "resize", ScaleSlider);
          $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
          /*#endregion responsive code end*/
      };
  </script>
  <style>
      /*jssor slider loading skin spin css*/
      .jssorl-009-spin img {
          animation-name: jssorl-009-spin;
          animation-duration: 1.6s;
          animation-iteration-count: infinite;
          animation-timing-function: linear;
      }

      @keyframes jssorl-009-spin {
          from { transform: rotate(0deg); }
          to { transform: rotate(360deg); }
      }

      /*jssor slider bullet skin 053 css*/
      .jssorb053 .i {position:absolute;cursor:pointer;}
      .jssorb053 .i .b {fill:#fff;fill-opacity:0.3;}
      .jssorb053 .i:hover .b {fill-opacity:.7;}
      .jssorb053 .iav .b {fill-opacity: 1;}
      .jssorb053 .i.idn {opacity:.3;}

      /*jssor slider arrow skin 093 css*/
      .jssora093 {display:block;position:absolute;cursor:pointer;}
      .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
      .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
      .jssora093:hover {opacity:.8;}
      .jssora093.jssora093dn {opacity:.6;}
      .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
  </style>

      <div class="container-page" style="background: #f7f7f7;">
      <div class="mp-pusher" id="mp-pusher">
          <header class="mod-header">
              <div class="grid_frame">
                  <div class="container_grid clearfix">
                      <div class="grid_12">
                          <div class="header-content clearfix">


                              <nav class="main-nav">
                                  <ul id="main-menu" class="nav nav-horizontal clearfix" style="padding-right: 60px;">
                                    <!-- <li style="background:transparent;"> -->
                                      <div id="logo">
                                              <img style= "margin-top:-20px; width: 150px; height: auto; background:transparent;" src="cd.png" alt="CouponDeck"/>
                                      </div>
                                    <!-- </li> -->
                                    <li>
                                      <form action="/action_page.php">
                                        <input type="text" placeholder="" name="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                      </form>
                                    </li>
                                      <li>
                                          <a href="index.php">Home</a>
                                      </li>
                                      <li>
                                          <a href="ind_brand.php">Brands</a>
                                      </li>
                                      <li>
                                        <a href="category.php">Categories</a>
                                      </li>
                                      <li>
                                          <a href="offers.php">Offers</a>
                                      </li>
                                      <li>
                                          <a href="reviews.php">Reviews</a>
                                      </li>
                                      <li>
                                        <a href="blog.php">Blog</a>
                                      </li>
                                      <li>
                                          <a href="contact.php">Contact Us</a>
                                      </li>

                                      <!-- <?php
                                        if (isset($_SESSION['username'])){
                                          ?>
                                      <li class="has-sub">
                                          <a class="btn btn-green type-login btn-login"style="margin-top: -5px;">
                                            <?php
                                            echo $_SESSION['username'];
                                            }
                                            ?>
                                          </a>  <?php
                                              if (isset($_SESSION['username'])){
                                                ?>
                                          <ul class="sub-menu">
                                              <li><a href="logout.php">Logout</a></li>
                                          </ul>

                                      </li>
                                      <?php } ?>
                                      <?php
                                        if (!isset($_SESSION['username'])){
                                          ?>

                                      <li>
                                          <a href="index.php" class="btn btn-green type-login btn-login"style="margin-top: -5px;">Login</a>
                                      </li>
                                      <?php } ?> -->

                                        <!-- <li class="has-sub" style="background: rgb(0 0 0 / 0%); color: white; border-radius: 5px;">
                                            <a style="color: black;">Region</a>
                                            <ul class="sub-menu" style="background: skyblue; border-radius: 25px;">
                                              <?php if(!empty($activeRegion['results'])){
                                                      foreach($activeRegion['results'] as $index){
                                                          if($index['code'] == $region){?>
                                                <li><a href="index.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                                <?php }else{?>
                                                  <li><a href="index.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                                <?php }}}?>
                                            </ul>
                                        </li> -->
                                      </li>
                                    </ul>
                                  <a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu"></a>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>

          </header><!--end: header.mod-header -->

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -125px; background:#f7f7f7;"><path fill="#e0e0e0" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,186.7C384,181,480,235,576,245.3C672,256,768,224,864,224C960,224,1056,256,1152,261.3C1248,267,1344,245,1392,234.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>




          <nav id="mp-menu" class="mp-menu alternate-menu">
              <div class="mp-level">
                  <h2>Menu</h2>
                  <ul>
                      <li>
                        <a href="index.php">Home</a>
                      </li>
                      <li>
                        <a href="ind_brand.php">Brands</a>
                      </li>
                      <li>
                        <a href="category.php">Categories</a>
                      </li>
                      <li>
                          <a href="offers.php">Offers</a>
                      </li>
                      <li>
                        <a href="reviews.php">Reviews</a>
                      </li>
                      <li>
                        <a href="blog.php">Blog</a>
                      </li>
                      <li>
                        <a href="contact.php">Contact Us</a>
                      </li>

                      <!-- <?php
                        if (isset($_SESSION['username'])){
                          ?>
                      <li class="has-sub">
                          <a class="btn btn-green type-login btn-login">
                            <?php
                            echo $_SESSION['username'];
                            }
                            ?>
                          </a>  <?php
                              if (isset($_SESSION['username'])){
                                ?>
                          <ul class="sub-menu">
                              <li><a href="logout.php">Logout</a></li>
                          </ul>

                      </li>
                      <?php } ?>
                      <?php
                        if (!isset($_SESSION['username'])){
                          ?>
                      <li>
                          <a href="index.php" class="btn btn-green type-login btn-login" >Login</a>
                      </li>
                      <?php } ?> -->
                      <!-- <li class="has-sub">
                          <a>Change<br>Region</a>
                          <ul class="sub-menu">
                              <li><a href="index.php">India</a></li>
                              <li><a href="uae_home.php">UAE </a></li>
                              <li><a href="singapore_home.php">Singapore</a></li>
                              <li><a href="indonesia_home.php">Indonesia</a></li>
                              <li><a href="saudiarab_home.php">Saudi Arab</a></li>
                              <li><a href="thailand_home.php">Thailand</a></li>
                              <li><a href="vietnam_home.php">Vietnam</a></li>
                              <li><a href="malaysia_home.php">Malaysia</a></li>
                              <li><a href="russia_home.php">Russia</a></li>
                              <li><a href="belarus_home.php">Belarus</a></li>
                          </ul>
                      </li> -->
                    </ul>

              </div>
          </nav><!--end: .mp-menu -->

        <div style="background: #f7f7f7; text-color:black; font-weight:bold; font-size: 1em;">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h1 class="page-title" style="padding-top:1px;"><b>Blog</b></h1>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
<div class="bg">
  <div class="testimonials">
    <div class="inner">
      <div class="row">
        <div class="col card">
          <div class="testimonial">
            <img src="coupon.png"/>
            <div class="name"><h1>Benefits of A Discount Coupon for Online Shopping</h1></div>
            <p style="text-align:justify; font-size:1rem;">
              Discount coupons are getting popular in today's time among seasonal and regular shoppers out there. While buying from an online store rather than a physical one, you can use them.
              People are price-conscious, and it is natural because of the economic comedown. <b>Discount coupons for online shopping</b> are available with every online shopping platform. They come with numerous advantages. So, are you interested in knowing what discount coupons could bring you? If yes, then in this article, we are going to talk about some benefits of a discount coupon. Undoubtedly, you will love to hear about them.
              <br><br><span style="font-size:2rem;"><b>Top Benefits Of A Discount Coupon</b></span>
              <br><br><span style="font-size:1rem;"><b>1. You Can Buy More Items</b></span><br><br>
              <img src="img/blog/blog (1).jpg" style="width: 100%;height: 100%;">
              <br><br>There are <span><b>coupon selling websites</b></span> that allow you to make the most out of online shopping. Many items you cannot buy at regular prices can be purchased with the help of these websites.  Shopping coupons are active for a limited period. For your long-shelf products, like soaps, shampoos and other cosmetics, you can use them. Browse the internet, and you will find the best offers with rebates. It will help you save a lot while purchasing.
              <br><br><span style="font-size:1rem;"><b>2. Save More Money</b></span>
              <br><br>When you realize a significant price reduction, you get an opportunity to save time, as well as money. You save time with these coupons because these offers stay for a few days. If you get the best brand offers together with discounts in India, you do much better shopping. Even a 10% discount is enough when the topmost online retailers allow them. Online shoppers should not overlook discount coupons at all. Neglecting them will let buyers miss out on some of the excellent offers open at reasonable prices
              <br><br><span style="font-size:1rem;"><b>3. You Come Across Rare Deals</b></span><br><br>
              <img src="img/blog/blog (3).jpg" style="width: 100%;height: 100%;">
              <br><br>If you visit an online shopping platform without a discount coupon, you fail to reach exceptional deals. But you may find coupon codes working for many things. For example, some shopping coupons can act as your multi-purpose ticket to choose from more than one item. You may not get such an opportunity as a regular customer. Therefore, shop more to receive the best deals in a short time. Following the boom in the online business, you can easily explore what lies behind the doors as an opportunity.
              <br><br><span style="font-size:1rem;"><b>4. Benefit With Seasonal Offers</b></span>
              <br><br>You indeed get closer to the best seasonal offers while visiting the websites that are offering rebates. Many tourism companies partner with online shopping platforms to reach people. Select from a range of shopping offers, and you will end up receiving coupons for many holiday packages apart from the <b>best shopping deals with discount coupons in India.</b>. The top retailers forever offer all that you are looking for. Make sure you grab deals when they get added.
              <br><br><span style="font-size:1rem;"><b>Final Thoughts</b></span><br><br>
              So, these are the benefits of a discount coupon. Shoppers in India can come across the most suitable <b>coupon deals website for online shopping</b> as there are hundreds of platforms competing to give their best. Discount coupons really influence both buyers and business owners. Finally, I would like to say that you should look for a platform and coupons worthy of acquiring. Then only you will get an outstanding shopping experience.
        </span>
            </p>
            <br>
                            <center><button onclick="window.location.href = 'blog.php';" formtarget="_blank" class="myBtn" style="border: none;border-radius: 5px;background: transparent;color: orange;font-weight: bold;">Go Back</button></center>
          </div>
        </div>


        <!-- <div class="col">
          <div class="testimonial">
            <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>
            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>

<br>
<br>
<div id="jssor_1" style="position:relative;margin:0 auto 25px;top:-25px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
        <div>
            <img data-u="image" src="img/011.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/012.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/013.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/014.jpg" />
        </div>

    </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">responsive slider</a>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:12px;height:12px;">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>
<script type="text/javascript">jssor_1_slider_init();
</script>
<!-- #endregion Jssor Slider End -->

<footer class="footer-distributed">

			<div class="footer-left">
          <img src="pp.png" width="100%" height="100%" style="margin-left: 0px;margin-top: 0px; width: 70%; ">





			</div>

			<div class="footer-center"style="margin-top: 25px;">

				<div style="margin-top: 15px;">

					<p style="font-size:1.89em; font-weight:bold;letter-spacing: 0.05em;">Earn Money</p><br>
          <p style="font-size:1em;letter-spacing: 0.1em;">Just by completing Simple Tasks</p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">

				<div>

				  <a href="https://play.google.com/store/apps/details?id=mTrack.droid.pocketpennyapp" target="_blank">
            <img src="gp.png" width="60%" style="margin-left: 50px;margin-top: 35px;">
          </a>
				</div>
			</div>
		</footer>


    </div>
</div>

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/jquery.nouislider.js"></script>

<script type="text/javascript" src="js/html5lightbox.js"></script>
<!--//js for responsive menu-->
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/mlpushmenu.js"></script>

<script type="text/javascript" src="js/script.js"></script>

<script type="text/javascript" src="js/copy_text.js"></script>

<!-- Pre-Loader -->
<script>
    var loader = document.getElementById("pre-loader");
    window.addEventListener("load", function(){
        loader.style.display="none";
    })
</script>
<!-- Pre-Loader End -->

</body>
</html>
