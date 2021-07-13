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
                                            <li><a href="indonesia-coupon.php">Indonesia Offers </a></li>
                                            <li><a href="saudiarab-coupon.php">Saudi Arab Offers </a></li>
                                            <li><a href="thailand-coupon.php">Thailand Offers </a></li>
                                            <li><a href="vietnam-coupon.php">Vietnam Offers </a></li>
                                            <li><a href="malaysia-coupon.php">Malaysia Offers </a></li>
                                            <li><a href="russia-coupon.php">Russia Offers </a></li>
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
                            <li><a href="indonesia-coupon.php">Indonesia Offers </a></li>
                            <li><a href="saudiarab-coupon.php">Saudi Arab Offers </a></li>
                            <li><a href="thailand-coupon.php">Thailand Offers </a></li>
                            <li><a href="vietnam-coupon.php">Vietnam Offers </a></li>
                            <li><a href="malaysia-coupon.php">Malaysia Offers </a></li>
                            <li><a href="russia-coupon.php">Russia Offers </a></li>
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
                        <h2 class="page-title"><h1><b>Coupon Category</b></h1></h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="layout-2cols clearfix">
                    <div class="grid_8 content">
                        <div class="mod-coupons-code">
                            <div class="wrap-list">
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-06.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Offer percentage and offer name</a></p>
                                        <p class="rs coupon-desc">offer description and date of validity</p>
                                        <div class="bottom-action">
                                        <br><input type="text" value="Coupon Code" id="myInput" style="text-align:center;"><br>
                                        <br><button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button><br>
                                        <br><a href="">Redirect to Offer Site</a></center>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-01.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 10% Off a New Hotel Booking at Participating Price Match Guarantee Hotels</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">12 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">2 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-02.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 20%-50% Off All Vitamin World Brand Items</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">16 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">0 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-04.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 10% Off a New Hotel Booking at Participating Price Match Guarantee Hotels</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">21 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">12 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-05.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 20%-50% Off All Vitamin World Brand Items</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">321 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">5 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-06.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 10% Off a New Hotel Booking at Participating Price Match Guarantee Hotels</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">34 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">8 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-04.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 20%-50% Off All Vitamin World Brand Items</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">59 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">21 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-02.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 10% Off a New Hotel Booking at Participating Price Match Guarantee Hotels</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">63 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">10 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/ex/04-01.jpg" alt="$BRAND_NAME"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Save 10% Off a New Hotel Booking at Participating Price Match Guarantee Hotels</a></p>
                                        <p class="rs coupon-desc">Must book by 11:59PM CT on 11/17/13. Travel completed by 3/30/14.</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% work</span>
                                                <span>
                                                    <span class="lbl-vote">63 <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote">10 <i class="icon iSubVote"></i></span>
                                                </span>
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="#">VIEW <span>COUPON</span> CODE</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
                            </div>

                        </div><!--end: .mod-coupons-code -->
                    </div>
                    <div class="grid_4 sidebar">
                        <!--end: .mod-search -->
                        <div class="mod-list-store block">
                          <h3 class="title-block">Popular store</h3>
                          <div class="block-content">
                              <div class="wrap-list-store clearfix">
                                  <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/smg.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a>

                                  <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/ab.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a>

                                  <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/amazon.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a>

                                  <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/nvpn.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a>

                                  <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/ab.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a>

                                  <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/rizzle.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a>
                              </div>
                          </div>
                      </div><!--end: .mod-list-store -->
                        <div class="mod-simple-coupon block">
                          
                    </div>
                </div>
            </div>
        </div>
        <footer class="mod-footer">
            <div class="footer-top">
                <div class="grid_frame">
                    <div class="container_grid clearfix">
                        <div class="grid_3">
                            <div class="company-info">
                                <img src="images/logo-gray.png" alt="CouponDeck"/>
                                <p class="rs">Corporate Office: MMIPL, Noida, Uttar Pradesh.</p>
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
                        <div class="grid_3">

                        </div><!--end: blog-recent -->
                    </div>
                </div>
            </div><!--end: .foot-top-->
            <div class="foot-copyright">
                <div class="grid_frame">
                    <div class="container_grid clearfix">
                        <div class="left-link">
                            <a href="index.html">Home</a>
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
