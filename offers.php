<?php
session_start();
require __DIR__.'/apiController.php';
$method = 'GET';
$url = 'https://api-mtrack.affise.com/3.0/offers?API-Key=9a5057e1103b54ea0bb5f4f16cbe1a62';
$apiData = getOffersList($method, $url);
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



     transition: opacity 500ms;
     visibility: hidden;
     opacity: 0;
     z-index: 1;
   }
   .overlay:target {
     visibility: visible;
     opacity: 1;
   }

   .popup {
     vertical-align: middle;
     margin: 70px auto;
     padding: 20px;
     color: white;
     border-radius: 5px;
     width: 30%;
     position: relative;
     transition: all 1s ease-in-out;
     font-weight: bold;
     background: linear-gradient(to bottom right,#F87E7B,#B05574);
     border-radius: 5px 50px 5px 50px;
     display: block;
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
     color: white;
   }
   .popup .close:hover {
     color: red;
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
                                        <a href="ind_home.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="ind_brand.php">Brands</a>
                                    </li>
                                    <li>
                                        <a href="Offers.php">Offers</a>
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

                                      <li class="has-sub" style="background: rgba(5,167,201,1); color: white; border-radius: 25px;">
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
                                      </li>
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
                        <a href="Offers.php">Offers</a>
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
                    <li class="has-sub">
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
                    </li>
                  </ul>

            </div>
        </nav><!--end: .mp-menu -->
        <br>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="layout-2cols clearfix">
                    <div class="grid_8 content">
                        <div class="mod-coupons-code">
                            <div class="wrap-list">
                                <h1><a style="background-color:rgba(5,167,201,1); color:white; border-radius:25px; text-decoration: none;">&nbsp Offers &nbsp<br></a></h1>
                                <?php if(!empty($apiData)){
                                  $i = 1;
                                  foreach($apiData as $index){
                                ?>
                                    <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="<?php echo $index['logo'];?>" alt="Amazon"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body offerdiv">
                                        <p class="rs save-price" ><a href="<?php echo $index['preview_url'];?>" class="offer_title"><?php echo $index['title'];?></a></p>
                                        <p class="rs coupon-desc" class="offer_desc"><?php echo $index['description_lang'];?></p>

                                        <div>
                                         <center><a href="#popup<?php echo $i;?>" class="offerpopup">Learn More!</a></center>

                                        </div>

                                        <div id="popup<?php echo $i;?>" class="overlay">
                                        <div class="popup"
                                        aria-modal="true">
                                          <center><h2>OFFER<br>DESCRIPTION</h2></center>
                                          <a class="close" href="#">&times;</a>
                                          <div class="content">
                                          <?php echo $index['title'];?> <br>
                                            <b>Offer details: </b><br>
                                            <?php echo $index['description_lang'];?>
                                          </div>
                                        </div>
                                        </div>

                                        <div class="bottom-action">
                                        <br><br><br><a href="<?php echo $index['preview_url'];?>" target="_blank">Redirect to Offer Site</a></center>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++;} } ?>

                            </div>

                        </div><!--end: .mod-coupons-code -->
                    </div>
                    <div class="grid_4 sidebar">
                        <!--end: .mod-search -->
                        <div class="mod-list-store block">
                          <h1><a href="" style="background-color:rgba(5,167,201,1); color:white; border-radius:25px;">&nbsp Popular Brands &nbsp</a></h1>
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
        <br>
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
        					MMIPL is a premium Ad-network connected globally with Direct Apps and Ad-Tech client's.</p>
        				<!-- <div class="footer-icons">
        					<a href="#"><i class="fa fa-facebook"></i></a>
        				  <a href="#"><i class="fa fa-linkedin"></i></a>
        				</div> -->
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
