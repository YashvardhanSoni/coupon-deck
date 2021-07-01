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
    .slides img{
        border-radius: 0px;
    }
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

   .button {
     font-size: 1em;
     padding: 10px;
     color: #fff;
     border: 2px solid #06D85F;
     border-radius: 20px/50px;
     text-decoration: none;
     cursor: pointer;
     transition: all 0.3s ease-out;
   }
   .button:hover {
     background: #06D85F;
   }

   .overlay {
     position: fixed;
     top: 0;
     bottom: 0;
     left: 0;
     right: 0;
     background: rgba(0, 0, 0, 0.7);
     transition: opacity 500ms;
     visibility: hidden;
     opacity: 0;
   }
   .overlay:target {
     visibility: visible;
     opacity: 1;
   }

   .popup {
     margin: 70px auto;
     padding: 20px;
     background: #fff;
     border-radius: 5px;
     width: 30%;
     position: relative;
     transition: all 1s ease-in-out;
   }

   .popup h2 {
     margin-top: 0;
     color: #333;
     font-family: Tahoma, Arial, sans-serif;
   }
   .popup .close {
     position: absolute;
     top: 20px;
     right: 30px;
     transition: all 200ms;
     font-size: 30px;
     font-weight: bold;
     text-decoration: none;
     color: #333;
   }
   .popup .close:hover {
     color: #06D85F;
   }
   .popup .content {
     max-height: 30%;
     overflow: auto;
   }

   @media screen and (max-width: 700px){
     .box{
       width: 70%;
     }
     .popup{
       width: 70%;
     }
   }

</style>
</head>
<body class="gray"  onselectstart="return false" oncopy="return false" oncut="return false" onpaste="return false"><!--<div class="alert_w_p_u"></div>-->

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
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="coupon.php">Coupons</a>
                                    </li>
                                    <li class="has-sub">
                                        <a>Coupons Category</a>
                                        <ul class="sub-menu">
                                            <li><a href="category-fashion.php">Fashion </a></li>
                                            <li><a href="category-electronics.php">Electronics </a></li>
                                            <li><a href="coupon-category.php">Furniture </a></li>
                                            <li><a href="coupon-category.php">Grocery </a></li>
                                            <li><a href="coupon-category.php">Household </a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a>Regional Offers</a>
                                        <ul class="sub-menu">
                                            <li><a href="india-coupon.php">Indian Offers </a></li>
                                            <li><a href="uae-coupon.php">UAE Offers </a></li>
                                            <li><a href="singapore-coupon.php">Singapore Offers </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="brand-list.php">Brands</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact Us</a>
                                    </li>
                                    <!-- <li>
                                      <a id="sys_head_login" class="btn btn-green type-login btn-login" href="login.php"></a>
                                    </li> -->
                                    <?php
                                      if (isset($_SESSION['username'])){
                                        ?>
                                    <li class="has-sub">
                                        <a href="coupon-code-2.php" class="btn btn-green type-login btn-login">
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
                                        <a href="login.php" class="btn btn-green type-login btn-login">Login</a>
                                    </li>
                                    <?php } ?>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="coupon.php">Coupons</a></li>
                    <li class="has-sub">
                        <a>Coupons Category</a>
                        <ul class="sub-menu">
                            <li><a href="category-fashion.php">Fashion </a></li>
                            <li><a href="category-electronics.php">Electronics </a></li>
                            <li><a href="coupon-category.php">Furniture </a></li>
                            <li><a href="coupon-category.php">Grocery </a></li>
                            <li><a href="coupon-category.php">Household </a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a>Regional Offers</a>
                        <ul class="sub-menu">
                            <li><a href="india-coupon.php">Indian Offers </a></li>
                            <li><a href="uae-coupon.php">UAE Offers </a></li>
                            <li><a href="singapore-coupon.php">Singapore Offers </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="brand-list.php">Brands</a>

                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <?php
                      if (isset($_SESSION['username'])){
                        ?>
                    <li class="has-sub">
                        <a href="coupon-code-2.php" class="btn btn-green type-login btn-login">
                          Welcome
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
                        <a href="login.php" class="btn btn-green type-login btn-login">Login</a>
                    </li>
                    <?php } ?>
                  </ul>

            </div>
        </nav><!--end: .mp-menu -->
        <div style="background: linear-gradient(90deg, rgba(0,255,68,1) 0%, rgba(0,0,0,1) 50%, rgba(0,0,0,1) 100%); font-family: Times new roman; color: white;">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title"><h1><b>Coupons are waiting for you!</b></h1></h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="mod-grp-coupon block clearfix tabbable">
                    <div class="grid_12">
                        <h3 class="title-block">
                            <span class="wrap-tab">
                                <span class="lbl-tab active">Indian Coupons</span>

                            </span>
                        </h3>
                    </div>
                    <div class="block-content list-coupon clearfix">
                        <div class="tab-content">
                            <div class="tab-content-item active">

                            <!-- Featured Coupons Start Here -->
                            </div>
                            <div class="coupon-item grid_3">
                                <div class="coupon-content">
                                    <div class="img-thumb-center">
                                        <div class="wrap-img-thumb">
                                            <span class="ver_hold"></span>
                                            <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                        </div>
                                    </div>
                                    <div class="coupon-price">INR 150 Off</div>
                                    <div class="coupon-brand">Flipkart</div>
                                    <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                    <div class="time-left">Valid Till June 5, 2021</div>
                                    <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                   <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                    <a href="">Redirect to Offer Site</a></center>
                                </div>
                                <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                                <div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/01_02.png" alt="$COUPON_TITLE"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">INR 150 Off</div>
                                        <div class="coupon-brand">Flipkart</div>
                                        <div class="coupon-desc">Find Products for All Major Brands at Flipkart.com </div>
                                        <div class="time-left">Valid Till June 5, 2021</div>
                                        <center><input type="text" value="Coupon Code" id="myInput" style="text-align:center;">
                                       <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                        <a href="">Redirect to Offer Site</a></center>
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
                            </div>
                        </div>
                    </div>

                </div><!--end block: Featured Coupons-->

                <div class="mod-brands block clearfix">
                    <div class="grid_12">
                        <h3 class="title-block has-link">
                            POPULAR BRANDS
                            <a href="brand-list.php" class="link-right">See all <i class="pick-right"></i></a>
                        </h3>
                    </div>
                    <div class="block-content list-brand clearfix">
                        <div class="brand-item grid_4">
                            <div class="brand-content">
                                <div class="brand-logo">
                                    <div class="wrap-img-logo">
                                        <span class="ver_hold"></span>
                                        <img src="images/br/amazonupi.png" alt="$BRAND_TITLE">
                                    </div>
                                </div>
                            </div>
                        </div><!--end: .brand-item -->
                        <div class="brand-item grid_4">
                            <div class="brand-content">
                                <div class="brand-logo">
                                    <div class="wrap-img-logo">
                                        <span class="ver_hold"></span>
                                        <img src="images/br/Sharechat.png" alt="$BRAND_TITLE">
                                    </div>
                                </div>
                            </div>
                        </div><!--end: .brand-item -->
                        <div class="brand-item grid_4">
                            <div class="brand-content">
                                <div class="brand-logo">
                                    <div class="wrap-img-logo">
                                        <span class="ver_hold"></span>
                                        <img src="images/br/MOJ.png" alt="$BRAND_TITLE">
                                    </div>
                                </div>
                            </div>
                        </div><!--end: .brand-item -->
                        <div class="brand-item grid_4">
                            <div class="brand-content">
                                <div class="brand-logo">
                                    <div class="wrap-img-logo">
                                        <span class="ver_hold"></span>
                                        <img src="images/br/Gaana.png" alt="$BRAND_TITLE">
                                    </div>
                                </div>
                            </div>
                        </div><!--end: .brand-item -->
                        <div class="brand-item grid_4">
                            <div class="brand-content">
                                <div class="brand-logo">
                                    <div class="wrap-img-logo">
                                        <span class="ver_hold"></span>
                                        <img src="images/br/rizzle.png" alt="$BRAND_TITLE">
                                    </div>
                                </div>
                            </div>
                        </div><!--end: .brand-item -->
                        <div class="brand-item grid_4">
                            <div class="brand-content">
                                <div class="brand-logo">
                                    <div class="wrap-img-logo">
                                        <span class="ver_hold"></span>
                                        <img src="images/br/zee 5.png" alt="$BRAND_TITLE">
                                    </div>
                                </div>
                            </div>
                        </div><!--end: .brand-item -->
                    </div>
                </div><!--end: .mod-brand -->
            </div>
        </div>
        <footer class="mod-footer">
            <div class="footer-top">
                <div class="grid_frame">
                    <div class="container_grid clearfix">
                        <div class="grid_3">
                            <div class="company-info">
                                <img src="images/logo-gray.png" alt="CouponDay"/>
                                <p class="rs">MMIPL, Noida, Uttar Pradesh.</p>
                                <p class="rs">
                                    Advertising Company. <br />
                                    In UP.
                                </p>
                            </div>
                        </div>
                        <div class="grid_3">
                            <div class="block social-link">
                                <h3 class="title-block">Follow us</h3>
                                <div class="block-content">
                                    <ul class="rs">
                                        <li>
                                            <i class="fa fa-facebook-square fa-2x"></i>
                                            <a href="#" target="#">Our Facebook page</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-twitter-square fa-2x"></i>
                                            <a href="#" target="#">Follow our Tweets</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div><!--end: Follow us -->
                        <div class="grid_3">
                            <div class="block map">
                                <h3 class="title-block">Meet Us</h3>
                                <div class="block-content">
                                    <div>
                                        <div >
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.1189388265193!2d77.37060631445645!3d28.626197191119783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce54de4dc2f2d%3A0xa4a968baca30d045!2sIThum%20Tower%20B%20-%20Lift%20Entry!5e0!3m2!1sen!2sin!4v1621924991757!5m2!1sen!2sin" width="100%" height="100% style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end: Map -->

                    </div>
                </div>
            </div><!--end: .foot-top-->
            <div class="foot-copyright">
                <div class="grid_frame">
                    <div class="container_grid clearfix">
                        <div class="left-link">
                            <a href="index.php">Home</a>
                            <a href="#">Contact</a>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/jquery.nouislider.js"></script>
<script type="text/javascript" src="js/jquery.popupcommon.js"></script>
<script type="text/javascript" src="js/html5lightbox.js"></script>

<!--//js for responsive menu-->
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/mlpushmenu.js"></script>

<script type="text/javascript" src="js/script.js"></script>


<script type="text/javascript" src="js/copy_text.js"></script>

<!--[if lte IE 9]>
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<script type="text/javascript" src="js/create.placeholder.js"></script>
<![endif]-->

<!--[if lte IE 8]>
<script type="text/javascript" src="js/ie8.js"></script>
<![endif]-->
</body>

</html>
