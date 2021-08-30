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
<html>

<head>
    <title>CouponDeck</title>
    <link rel="icon" href="images/logo.ico" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '303511618102911');
    fbq('track', 'PageView');

    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=303511618102911&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->


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

.blinking{
    animation:blinkingText 1.2s infinite;
    font-weight: bold;
    font-size: 15px;
}
@keyframes blinkingText{
    0%{     color: white;    }
    49%{    color: white; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: white;    }
}


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

   .grid_frame {
        max-width: 100%;
       margin-left: 0px;
       margin-right: 0px;
   }

</style>
</head>
<body style="background: #f7f7f7;" class="gray"  onselectstart="return false" oncopy="return false" oncut="return false" onpaste="return false"><!--<div class="alert_w_p_u"></div>-->
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
          <div class="grid_frame" style="margin-left: -175px;">
              <div class="container_grid clearfix">
                  <div class="grid_12">
                      <div class="header-content clearfix">


                          <nav class="main-nav">
                              <ul id="main-menu" class="nav nav-horizontal clearfix">
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
                                      <a href="contact.php">Contact Us</a>
                                  </li>

                                  <li class="has-sub" style="background: rgb(0 0 0 / 0%); color: white; border-radius: 5px;">
                                      <a style="color: black;">Region</a>
                                      <ul class="sub-menu" style="background: skyblue; border-radius: 25px;">
                                        <?php if(!empty($activeRegion['results'])){
                                                foreach($activeRegion['results'] as $index){
                                                    if($index['code'] == $region){?>
                                          <li><a href="offers.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                          <?php }else{?>
                                            <li><a href="offers.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                          <?php }}}?>
                                      </ul>
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
                                      <a href="login.php" class="btn btn-green type-login btn-login">Login</a>
                                  </li>
                                  <?php } ?> -->


                                  </li>
                                </ul>
                              <a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu"></a>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>

      </header><!--end: header.mod-header -->

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -70px; background:#f7f7f7;"><path fill="#e0e0e0" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,186.7C384,181,480,235,576,245.3C672,256,768,224,864,224C960,224,1056,256,1152,261.3C1248,267,1344,245,1392,234.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
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
                        <a href="login.php" class="btn btn-green type-login btn-login" >Login</a>
                    </li>
                    <?php } ?> -->
                    <!-- <li class="has-sub">
                        <a>Change Region</a>
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
        <br>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="layout-2cols clearfix">
                    <div class="grid_8 content">
                        <div class="mod-coupons-code">
                            <div class="wrap-list">
                                <p style="text-color:black; font-weight:bold; font-size: 2em; margin-left: 115px;margin-top: -10px;">&nbsp Offers <?php echo ($brand != '')? ' : '.$brand : ' : All';?> &nbsp<br></p>
                                <?php if(!empty($apiData)){
                                  $i = 1;
                                  foreach($apiData as $index){
                                ?>
                                    <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a class="ver_container"><img src="<?php echo $index['logo'];?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body offerdiv">
                                        <p class="rs save-price" ><a href="<?php echo $index['preview_url'];?>" class="offer_title"><?php echo $index['title'];?></a></p>
                                        <p class="rs coupon-desc" class="offer_desc"><?php echo $index['description_lang'];?></p>

                                        <div>
                                         <center><a href="#popup<?php echo $i;?>" class="offerpopup" style="font-weight:bold; float:left;margin-left: 0px;">Learn More!</a>
                                                  <a href="<?php echo $index['preview_url'];?>" target="_blank" class="btn btn-green type-login btn-login" style="font-size:0.89rem;float:right;margin-right: 50px;padding: 8px;">Visit Site</a></center>
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


                                    </div>
                                </div>
                                <?php $i++;} } ?>

                            </div>

                        </div><!--end: .mod-coupons-code -->
                    </div>
                    <div class="grid_4 sidebar">
                        <!--end: .mod-search -->
                        <div class="mod-list-store block">
                          <?php
                              if(isset($_GET['brand'])){
                                $display = 'Similar Brands';
                                $rediect_url = 'offers.php?brand=';
                              }else if(isset($_GET['category'])){
                                $display = 'Other Categories';
                                $rediect_url =  'offers.php?category=';
                              }else if(isset($_GET['Hot Offers'])){
                                $display = 'Hot Offers';
                                $rediect_url = 'offers.php?hotoffers=';
                              }else{
                                $display = 'Other Categories';
                                $rediect_url = 'offers.php?brand=';
                              }
                          ?>
                          <p style="text-color:black; font-weight:bold; font-size: 2em; margin-left: 0px;margin-top: -10px;"><?= $display; ?></p>
                          <div class="block-content">
                              <div class="wrap-list-store clearfix">
                                  <!-- <a class="brand-logo" href="#" >
                                      <span class="wrap-logo">
                                          <span class="center-img">
                                              <span class="ver_hold"></span>
                                              <span class="ver_container"><img src="images/br/smg.png" alt="$BRAND_NAME"></span>
                                          </span>
                                      </span>
                                  </a> -->

                                  <?php if(!empty($othersData)){
                                   $i = 0;
                                    foreach($othersData as $index => $list){
                                        if($i < 6){
                                          $display_url = $rediect_url.$index ; ?>
                                        <a class="brand-logo" href="<?php echo $display_url; ?>" >
                                            <span class="wrap-logo">
                                                <span class="center-img">
                                                    <span class="ver_hold"></span>
                                                    <span class="ver_container"><img src="<?php echo $list;?>" alt="$BRAND_NAME"></span>
                                                </span>
                                            </span>
                                        </a>
                                <?php $i++;}}}?>
                              </div>
                          </div>
                      </div><!--end: .mod-list-store -->
                        <div class="mod-simple-coupon block">


                    </div>
                </div>
            </div>
        </div>
        <br>
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

        				<div>

        					<p style="font-size:1.89em; font-weight:bold;letter-spacing: 0.05em;">Earn Money</p><br>
                  <p style="font-size:1em;letter-spacing: 0.1em;">Just by completing Simple Tasks</p>
        				</div>
        			</div>
        			<div class="footer-right">
        				<p class="footer-company-about">

        				<div>

        				  <a href="https://play.google.com/store/apps/details?id=mTrack.droid.pocketpennyapp" target="_blank">
                    <img src="gp.png" width="60%" style="margin-left: 50px;margin-top: 20px;">
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
