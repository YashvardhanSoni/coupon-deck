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
                                            <li><a href="belarus-coupon.php">Belarus Offers </a></li>
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
                            <li><a href="belarus-coupon.php">Belarus Offers </a></li>
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
        <div class="top-area">
            <div class="mod-head-slide">
                <div class="grid_frame">
                    <div class="wrap-slide">
                        <p class="ta-c"><img src="images/ajax-loader.gif" alt="loading"></p>
                        <div id="sys_head_slide" class="head-slide flexslider">
                            <ul class="slides">
                                <li>
                                    <a href="https://www.amazon.in/b?ie=UTF8&node=15307611031"><img src="images/ex/01_banner.jpg" alt="Amazon Youth Offer"/></a>
                                </li>
                                <li>
                                    <a href="https://www.flipkart.com/fashion-trends-offers-store"><img src="images/ex/02_banner.jpg" alt="Flipkart Offer"/></a>
                                </li>
                                <li>
                                    <a href="https://www.oyorooms.com/"><img src="images/ex/03_banner.jpg" alt="OYO Offer"/></a>
                                </li>
                                <li>
                                    <a href="https://www.amazon.in/"><img src="images/ex/04_banner.jpg" alt="Amazon Offer"/></a>
                                </li>
                                <li>
                                    <a href="https://www.myntra.com/?utm_source=perf_google_search_brand&utm_medium=perf_google_search_brand&utm_campaign=Search%20-%20Myntra%20Brand%20(India)&gclid=Cj0KCQjw2NyFBhDoARIsAMtHtZ55y7wM9w9NnfdNW0I0hWgTtGv5xdTaI43VYNd-kNCqPfB5dhEIHgkaAvjnEALw_wcB"><img src="images/ex/05_banner.jpg" alt="Myntra Offer"/></a>
                                </li>
                                <li>
                                    <a href="https://www.myntra.com/?utm_source=perf_google_search_brand&utm_medium=perf_google_search_brand&utm_campaign=Search%20-%20Myntra%20Brand%20(India)&gclid=Cj0KCQjw2NyFBhDoARIsAMtHtZ55y7wM9w9NnfdNW0I0hWgTtGv5xdTaI43VYNd-kNCqPfB5dhEIHgkaAvjnEALw_wcB"><img src="images/ex/06_banner.jpg" alt="Myntra Offer"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="mod-grp-coupon block clearfix">
                    <div class="grid_12">
                        <h3 class="title-block has-link">
                            New Coupons
                            <a href="coupon.php" class="link-right">See all <i class="pick-right"></i></a>
                        </h3>
                    </div>
                    <div class="block-content list-coupon clearfix">
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/skin.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">SkinKraft</div>
                              <div class="coupon-desc">Find Products for skin at Skinkraft </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup1">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="SK150" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=171">Redirect to Offer Site</a></center>
                          </div>

                          </div><!--end: .coupon-item -->
                          <div class="coupon-item grid_3">
                              <div class="coupon-content">
                                  <div class="img-thumb-center">
                                      <div class="wrap-img-thumb">
                                          <span class="ver_hold"></span>
                                          <a href="#" class="ver_container"><img src="images/br/flower.png" alt="$COUPON_TITLE"></a>
                                      </div>
                                  </div>
                                  <div class="coupon-price"></div>
                                  <div class="coupon-brand">Floweraura</div>
                                  <div class="coupon-desc">Find Products at Floweraura </div>
                                  <div class="time-left">Valid Till --------</div>
                                  <!--Learn More Code Start Here-->
                                                                   <div>
                                                                    <center><a href="#popup2">Learn More!</a></center>
                                                                   </div>
                                 <!--Learn More Code End Here-->
                                  <center><input type="text" value="FWA70" id="myInput" style="text-align:center;" disabled>
                                 <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                  <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=174">Redirect to Offer Site</a></center>
                              </div>
                          </div><!--end: .coupon-item -->
                          <div class="coupon-item grid_3">
                              <div class="coupon-content">
                                  <div class="img-thumb-center">
                                      <div class="wrap-img-thumb">
                                          <span class="ver_hold"></span>
                                          <a href="#" class="ver_container"><img src="images/br/smg.png" alt="$COUPON_TITLE"></a>
                                      </div>
                                  </div>
                                  <div class="coupon-price"></div>
                                  <div class="coupon-brand">Samsung</div>
                                  <div class="coupon-desc">Find all electronic Products at Samsung </div>
                                  <div class="time-left">Valid Till --------</div>
                                  <!--Learn More Code Start Here-->
                                                                   <div>
                                                                    <center><a href="#popup3">Learn More!</a></center>
                                                                   </div>
                                 <!--Learn More Code End Here-->
                                  <center><input type="text" value="SMSG100" id="myInput" style="text-align:center;" disabled>
                                 <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                  <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=173">Redirect to Offer Site</a></center>
                              </div>

                          </div><!--end: .coupon-item -->
                          <div class="coupon-item grid_3">
                              <div class="coupon-content">
                                  <div class="img-thumb-center">
                                      <div class="wrap-img-thumb">
                                          <span class="ver_hold"></span>
                                          <a href="#" class="ver_container"><img src="images/br/reebok.png" alt="$COUPON_TITLE"></a>
                                      </div>
                                  </div>
                                  <div class="coupon-price"></div>
                                  <div class="coupon-brand">Reebok</div>
                                  <div class="coupon-desc">Find all Sports Products at Reebok </div>
                                  <div class="time-left">Valid Till --------</div>
                                  <!--Learn More Code Start Here-->
                                                                   <div>
                                                                    <center><a href="#popup4">Learn More!</a></center>
                                                                   </div>
                                 <!--Learn More Code End Here-->
                                  <center><input type="text" value="RBK100" id="myInput" style="text-align:center;" disabled>
                                 <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                                  <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=172">Redirect to Offer Site</a></center>
                              </div>

                          </div><!--end: .coupon-item -->
                    </div>
                </div><!--end block: New Coupons-->
                <div class="mod-grp-coupon block clearfix">
                    <div class="grid_12">
                        <h3 class="title-block has-link">
                            Featured Coupons
                            <a href="coupon.php" class="link-right">See all <i class="pick-right"></i></a>
                        </h3>
                    </div>
                    <div class="block-content list-coupon clearfix">
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/shopclues.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">Shopclues</div>
                              <div class="coupon-desc">Find all Products at Shopclues </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup5">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="SHPC40" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=178">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/myntra new logo.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">Myntra</div>
                              <div class="coupon-desc">Find all Products at Myntra </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup6">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="MYN1" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=215&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4&sub8=sub8">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/mfine.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">MFine App</div>
                              <div class="coupon-desc">Find all Health Products at MFine </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup7">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="MFIN1" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=216&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4&sub8=sub8">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/testbook 2.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">Testbook</div>
                              <div class="coupon-desc">Find all Products at Testbook </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup8">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="TSTB1" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=217&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4&sub8=sub8">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/Nira Finance.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">Nira Finance</div>
                              <div class="coupon-desc">Find all Products at Nira Finance </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup9">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="NIR1" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=218&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4&sub8=sub8">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/ab.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">alt Balaji</div>
                              <div class="coupon-desc">Find all Products at Alt Balaji </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup10">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="ALT1" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=219&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4&sub8=sub8">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/New chic.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">NewChic</div>
                              <div class="coupon-desc">Find all Products at NewChic </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup11">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="NWC199" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=181">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/nvpn.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">Nord VPN</div>
                              <div class="coupon-desc">Find all Products at NordVPN </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup12">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="NVP99" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=179">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                      <div class="coupon-item grid_3">
                          <div class="coupon-content">
                              <div class="img-thumb-center">
                                  <div class="wrap-img-thumb">
                                      <span class="ver_hold"></span>
                                      <a href="#" class="ver_container"><img src="images/br/xt.png" alt="$COUPON_TITLE"></a>
                                  </div>
                              </div>
                              <div class="coupon-price"></div>
                              <div class="coupon-brand">Xtrade</div>
                              <div class="coupon-desc">Find all Products at Xtrade </div>
                              <div class="time-left">Valid Till --------</div>
                              <!--Learn More Code Start Here-->
                                                               <div>
                                                                <center><a href="#popup13">Learn More!</a></center>
                                                               </div>
                             <!--Learn More Code End Here-->
                              <center><input type="text" value="XTD50" id="myInput" style="text-align:center;" disabled>
                             <br> <button onclick="myFunction()" class="btn btn-blue btn-take-coupon">Copy Coupon Code</button>
                              <a href="https://www.trackingmtrack.co.in/click?pid=22&offer_id=184&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4&sub8=sub8">Redirect to Offer Site</a></center>
                          </div>

                      </div><!--end: .coupon-item -->
                    </div>
                    <a class="grid_6 btn btn-orange btn-load-more" href="coupon.php">Load more coupon</a>
                </div><!--end block: Featured Coupons-->


                <div id="popup1" class="overlay">
                <div class="popup">
                  <center><h2>OFFER DESCRIPTION- 1</h2></center>
                  <a class="close" href="#">&times;</a>
                  <div class="content">
                    SkinKraft <br>
                    <b>Offer details:</b><br>
                    <b>Minimum shopping amount:</b> Rs.1500 <br>
                    <b>Redeemable by:</b>	Both new & old users<br>
                    <b>Usable on:</b>Web and App<br>
                    <b>Transaction method:</b>	Visa Cards<br>


                  </div>
                </div>
                </div>

                <div id="popup2" class="overlay">
                  <div class="popup">
                    <center><h2>OFFER DESCRIPTION- 2</h2></center>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                      Floweraura <br>
                      <b>Offer details:</b><br>
                      <b>Minimum shopping amount:</b> Rs.2000 <br>
                      <b>Redeemable by:</b>	Both new & old users<br>
                      <b>Usable on:</b>Web and App<br>
                      <b>Transaction method:</b>	Visa Cards<br>

                  </div>
                </div>
              </div>

              <div id="popup3" class="overlay">
              <div class="popup">
                <center><h2>OFFER DESCRIPTION- 3</h2></center>
                <a class="close" href="#">&times;</a>
                <div class="content">
                  Samsung <br>
                  <b>Offer details:</b><br>
                  <b>Minimum shopping amount:</b> Rs.7999 <br>
                  <b>Redeemable by:</b>	Both new & old users<br>
                  <b>Usable on:</b>Web and App<br>
                  <b>Transaction method:</b>	Visa Cards<br>

                </div>
              </div>
            </div>

            <div id="popup4" class="overlay">
            <div class="popup">
              <center><h2>OFFER DESCRIPTION- 4</h2></center>
              <a class="close" href="#">&times;</a>
              <div class="content">
                Reebok <br>
                <b>Offer details:</b><br>
                <b>Minimum shopping amount:</b> Rs.2000 <br>
                <b>Redeemable by:</b>	Both new & old users<br>
                <b>Usable on:</b>Web and App<br>
                <b>Transaction method:</b>	Visa Cards<br>

              </div>
            </div>
          </div>

          <div id="popup5" class="overlay">
            <div class="popup">
              <center><h2>OFFER DESCRIPTION- 4</h2></center>
              <a class="close" href="#">&times;</a>
              <div class="content">
                Shopclues <br>
                <b>Offer details:</b><br>
                <b>Minimum shopping amount:</b> Rs.3000 <br>
                <b>Redeemable by:</b>	Both new & old users<br>
                <b>Usable on:</b>Web and App<br>
                <b>Transaction method:</b>	Visa Cards<br>

            </div>
          </div>
        </div>

        <div id="popup6" class="overlay">
          <div class="popup">
            <center><h2>OFFER DESCRIPTION- 6</h2></center>
            <a class="close" href="#">&times;</a>
            <div class="content">
              Myntra <br>
              <b>Offer details:</b><br>
              <b>Minimum shopping amount:</b> --- <br>
              <b>Redeemable by:</b>	Both new & old users<br>
              <b>Usable on:</b>App<br>
              <b>Transaction method:</b>	Visa Cards<br>

          </div>
        </div>
      </div>

      <div id="popup7" class="overlay">
        <div class="popup">
          <center><h2>OFFER DESCRIPTION- 7</h2></center>
          <a class="close" href="#">&times;</a>
          <div class="content">
            MFine App <br>
            <b>Offer details:</b><br>
            <b>Minimum shopping amount:</b> --- <br>
            <b>Redeemable by:</b>	Both new & old users<br>
            <b>Usable on:</b>App<br>
            <b>Transaction method:</b>	Visa Cards<br>

        </div>
      </div>
    </div>

    <div id="popup8" class="overlay">
      <div class="popup">
        <center><h2>OFFER DESCRIPTION- 8</h2></center>
        <a class="close" href="#">&times;</a>
        <div class="content">
          Testbook <br>
          <b>Offer details:</b><br>
          <b>Minimum shopping amount:</b> --- <br>
          <b>Redeemable by:</b>	Both new & old users<br>
          <b>Usable on:</b>App<br>
          <b>Transaction method:</b>	Visa Cards<br>

      </div>
    </div>
  </div>

  <div id="popup9" class="overlay">
    <div class="popup">
      <center><h2>OFFER DESCRIPTION- 9</h2></center>
      <a class="close" href="#">&times;</a>
      <div class="content">
        NIRA Finance <br>
        <b>Offer details:</b><br>
        <b>Minimum shopping amount:</b> --- <br>
        <b>Redeemable by:</b>	Both new & old users<br>
        <b>Usable on:</b>App<br>
        <b>Transaction method:</b>	Visa Cards<br>

    </div>
  </div>
</div>

<div id="popup10" class="overlay">
  <div class="popup">
    <center><h2>OFFER DESCRIPTION- 10</h2></center>
    <a class="close" href="#">&times;</a>
    <div class="content">
      ALT Balaji <br>
      <b>Offer details:</b><br>
      <b>Minimum shopping amount:</b> --- <br>
      <b>Redeemable by:</b>	Both new & old users<br>
      <b>Usable on:</b>App<br>
      <b>Transaction method:</b>	Visa Cards<br>

  </div>
</div>
</div>

<div id="popup11" class="overlay">
  <div class="popup">
    <center><h2>OFFER DESCRIPTION- 11</h2></center>
    <a class="close" href="#">&times;</a>
    <div class="content">
      NewChic <br>
      <b>Offer details:</b><br>
      <b>Minimum shopping amount:</b> Rs. 499 <br>
      <b>Redeemable by:</b>	Both new & old users<br>
      <b>Usable on:</b>App<br>
      <b>Transaction method:</b>	Visa Cards<br>

  </div>
</div>
</div>

<div id="popup12" class="overlay">
  <div class="popup">
    <center><h2>OFFER DESCRIPTION- 12</h2></center>
    <a class="close" href="#">&times;</a>
    <div class="content">
      NordVPN <br>
      <b>Offer details:</b><br>
      <b>Minimum shopping amount:</b> Rs. 499 <br>
      <b>Redeemable by:</b>	Both new & old users<br>
      <b>Usable on:</b>App<br>
      <b>Transaction method:</b>	Visa Cards<br>

  </div>
</div>
</div>
<div id="popup13" class="overlay">
  <div class="popup">
    <center><h2>OFFER DESCRIPTION- 13</h2></center>
    <a class="close" href="#">&times;</a>
    <div class="content">
      Xtrade <br>
      <b>Offer details:</b><br>
      <b>Minimum shopping amount:</b> 100 USD <br>
      <b>Redeemable by:</b>	Both new & old users<br>
      <b>Usable on:</b>App<br>
      <b>Transaction method:</b>	Visa Cards<br>

  </div>
</div>
</div>


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
                                <img src="images/logo-gray.png" alt="MMIPL"/>
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
                            <center><a href="index.php">Home</a>
                            <a href="#">Contact</a></center>
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
