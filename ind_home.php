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
    <title>CouponDeck</title>
    <link rel="icon" href="images/logo.ico" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/font.css"/>
    <link rel="stylesheet" href="css/font-awesome.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <!--css plugin-->
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link rel="stylesheet" href="css/jquery.nouislider.css"/>


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

    <!-- Google Ad -->
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
    <script>
      window.googletag = window.googletag || {cmd: []};
      var personalizedAdsDisabled = 1;

      googletag.cmd.push(function() {
        // Personalized ad serving is enabled by default. Set "request
        // non-personalized ads" to 1 to disable.
        //
        // To ensure personalization is disabled for all ad requests, place this
        // call before any calls to enableServices or display.
        googletag.pubads().setRequestNonPersonalizedAds(personalizedAdsDisabled);

        googletag
            .defineSlot('/6355419/Travel/Europe/France',[728, 90], 'banner-ad')
            .addService(googletag.pubads());
        googletag.enableServices();
      });
    </script>
    <!-- end Google ad -->
<style>

   .header-content clearfix{
       background-color: aqua;
   }


   .box {
     width: 40%;
     margin: 0 auto;
     background: rgba(255,255,255,0.2);
     padding: 35px;
     border: 2px solid #fff;
     border-radius: 20px/50px;
     background-clip: padding-box;
     text-align: center;
   }
   input[type=submit]{
     border-radius: 25px;
     background: orange;
     padding: 0px 25px 0px 25px;
   }

   .core {width: 100%; display: table;}

 .box1{
     background-color: gray;
     width: 15%;
     float:none;
     display: table-cell;
     border-radius:0px;
     height: 100px;
     vertical-align: middle;
     text-align: center;
     color: white;
     }

 .box2{
     background-color: white;
     width: 70%;
     float:none;
     display: table-cell;
     border-radius:0px;
     }
 .box3{
     background-color: gray;
     width: 15%;
     float:none;
     display: table-cell;
     border-radius:0px;
     vertical-align: middle;
     text-align: center;
     color: white;
     }

     .gridtable {
     width: 100%;
   }
   @media screen and (max-width:320px) {
     .gridtable, .gridtable thead, .gridtable tbody {
       display: block;
       width: 100%;
     }
     .gridtable tr {
       display: grid;
       width: 100%;
       grid-template-columns: auto auto auto;
     }
     /* .core {
    display: flex;
    flex-direction: column-reverse;
    margin-left:50px;
  } */
   }

</style>
</head>
<body class="gray"  onselectstart="return false" oncopy="return false" oncut="return false" onpaste="return false"><!--<div class="alert_w_p_u"></div>-->
<!-- Pre-Loader -->
    <div id="pre-loader"></div>
<!-- Pre-Loader End -->
    <div class="container-page">
    <div class="mp-pusher" id="mp-pusher">
        <header class="mod-header">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <div class="header-content clearfix">
                            <h1 id="logo" class="rs">
                                <a href="index.php">
                                    <img src="images/logo.png" alt="CouponDeck"/>
                                </a>
                            </h1>

                            <nav class="main-nav">
                                <ul id="main-menu" class="nav nav-horizontal clearfix">
                                    <li class="active">
                                        <a href="ind_home.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="ind_brand.php">Brands</a>
                                    </li>
                                    <li>
                                        <a href="offers.php">Offers</a>
                                    </li>
                                    <li>
                                        <a href="reviews.php">Reviews</a>
                                    </li>

                                    <li>
                                        <a href="contact.php">Contact Us</a>
                                    </li>

                                    <?php
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
                                        <a href="login.php" class="btn btn-green type-login btn-login" style="border-radius:25px;">Login</a>
                                    </li>
                                    <?php } ?>

                                      <!-- <li class="has-sub" style="background: rgba(5,167,201,1); color: white; border-radius: 25px;">
                                          <a style="color: white;">Change<br>Region</a>
                                          <ul class="sub-menu" style="background: skyblue; border-radius: 25px;">
                                              <li><a href="ind_home.php" style="background: skyblue; border-radius: 25px;">India</a></li>
                                              <li><a href="uae_home.php" style="background: skyblue; border-radius: 25px;">UAE </a></li>
                                              <li><a href="singapore_home.php" style="background: skyblue; border-radius: 25px;">Singapore</a></li>
                                              <li><a href="indonesia_home.php" style="background: skyblue; border-radius: 25px;">Indonesia</a></li>
                                              <li><a href="saudiarab_home.php" style="background: skyblue; border-radius: 25px;">Saudi Arab</a></li>
                                              <li><a href="thailand_home.php" style="background: skyblue; border-radius: 25px;">Thailand</a></li>
                                              <li><a href="vietnam_home.php" style="background: skyblue; border-radius: 25px;">Vietnam</a></li>
                                              <li><a href="malaysia_home.php" style="background: skyblue; border-radius: 25px;">Malaysia</a></li>
                                              <li><a href="russia_home.php" style="background: skyblue; border-radius: 25px;">Russia</a></li>
                                              <li><a href="belarus_home.php" style="background: skyblue; border-radius: 25px;">Belarus</a></li>
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
        <nav id="mp-menu" class="mp-menu alternate-menu">
            <div class="mp-level">
                <h2>Menu</h2>
                <ul>
                    <li>
                      <a href="ind_home.php">Home</a>
                    </li>
                    <li>
                      <a href="ind_brand.php">Brands</a>
                    </li>
                    <li>
                        <a href="offers.php">Offers</a>
                    </li>
                    <li>
                      <a href="reviews.php">Reviews</a>
                    </li>
                    <li>
                      <a href="contact.php">Contact Us</a>
                    </li>

                    <?php
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
                        <a href="login.php" class="btn btn-green type-login btn-login" >Login</a>
                    </li>
                    <?php } ?>
                    <!-- <li class="has-sub">
                        <a>Change<br>Region</a>
                        <ul class="sub-menu">
                            <li><a href="ind_home.php">India</a></li>
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
        <!-- Google Advertisement -->
        <!-- <center>
          <div id="banner-ad" style="width: 100% auto; height: 100px;">
            <script>
              googletag.cmd.push(function() { googletag.display('banner-ad'); });
            </script>
          </div>
        </center> -->
        <!-- End_Google Advertisement -->


<div class="core">
<div class="box1">
    <div class="text">Ad: Left Side</div>
</div>


<div class="box2">
    <div class="text gridtable" style="padding-top: 10px;">
      <div class="coupon-item grid_3">
          <div class="coupon-content">
              <div class="img-thumb-center">
                  <div class="wrap-img-thumb">
                      <span class="ver_hold"></span>
                      <a href="#" class="ver_container"><img src="images/br/amazon.png" alt="$COUPON_TITLE"></a>
                  </div>
              </div>

          </div>

      </div><!--end: .coupon-item -->
      <div class="coupon-item grid_3">
          <div class="coupon-content">
              <div class="img-thumb-center">
                  <div class="wrap-img-thumb">
                      <span class="ver_hold"></span>
                      <a href="#" class="ver_container"><img src="images/br/rizzle.png" alt="$COUPON_TITLE"></a>
                  </div>
              </div>

          </div>

      </div><!--end: .coupon-item -->
      <div class="coupon-item grid_3">
          <div class="coupon-content">
              <div class="img-thumb-center">
                  <div class="wrap-img-thumb">
                      <span class="ver_hold"></span>
                      <a href="#" class="ver_container"><img src="images/br/moj.png" alt="$COUPON_TITLE"></a>
                  </div>
              </div>

          </div>

      </div><!--end: .coupon-item -->
      <div class="coupon-item grid_3">
          <div class="coupon-content">
              <div class="img-thumb-center">
                  <div class="wrap-img-thumb">
                      <span class="ver_hold"></span>
                      <a href="#" class="ver_container"><img src="images/br/zee 5.png" alt="$COUPON_TITLE"></a>
                  </div>
              </div>

          </div>

      </div><!--end: .coupon-item -->
    </div>
    <center>
      <form action="offers.php" style="background:white;">
        <input class="btn btn-green type-login btn-login" style="padding:10px 40px 10px 40px ;" type="submit" value="View all Offers" />
      </form>
    </center>
</div>


<div class="box3">
    <div class="text">Ad: Right Side</div>
</div>
</div>
<br><br>
<footer class="footer-distributed">

			<div class="footer-left">
          <img src="images/logo-gray.png">


				<p class="footer-links">
					<a href="ind_home.php">Home</a>
					|
					<a href="contact.php">Contact</a>
				</p>


			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span> The ithum, Tower A, 1131,</span>
						Noida, UP</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+91 9643117230</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:info@mitraksh.in">info@mitraksh.in</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About Us</span>
					We are an Advertising Company.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
				  <a href="#"><i class="fa fa-linkedin"></i></a>
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
