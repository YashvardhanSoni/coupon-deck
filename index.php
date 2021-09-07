<?php
session_start();
require __DIR__.'/helper/common.php';
require __DIR__.'/apiController.php';
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
$activeBrands = activeBrands($method, $url);
$activeCategories = activeCategories($method, $url);
$hotOffers = hotOffers($method, $url);
?>

<!DOCTYPE html>
<html>

<head>
    <title>CouponDeck</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
    <link rel="icon" href="images/logo.ico" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />

    <!--Offer Conversion: coupondeck -->
    <img src="https://www.trackingmtrack.co.in/success.jpg?offer_id=314&afstatus=1" height="1" width="1" alt=""/>
    <!-- End Offer Conversion -->

    

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

    body{
      background: #f7f7f7;
    }
    .gray .mod-header {
    background-color: #e0e0e0;
    padding-top: 46px;
    padding-bottom: 0px;
    }

   .header-content clearfix{
       background-color: aqua;
   }


   .box {
     width: 40%;
     margin: 0 auto;
     background: #f7f7f7;
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
     background-color: white;
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
     background-color: #f7f7f7;
     width: 70%;
     float:none;
     display: table-cell;
     border-radius:0px;
     }
 .box3{
     background-color: white;
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

   .overlaycat {
     position: absolute;
     bottom: 40px;
     background: rgb(0, 0, 0);
     background: rgba(0, 0, 0, 0.5); /* Black see-through */
     color: #f1f1f1;
     width: 89%;
     transition: .5s ease;
     opacity:0;
     color: white;
     font-size: 2.0em;
     padding: 15px;
     text-align: center;
}

.wrap-img-thumb:hover .overlaycat {
  opacity: 0.5;
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
                        <div class="header-content clearfix" style="padding-right: 60px;">


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
                                            <li><a href="index.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                            <?php }else{?>
                                              <li><a href="index.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                            <?php }}}?>
                                        </ul>
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


                                    </li>
                                  </ul>
                                <a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu" style="margin: -45px -37px 0 0;"></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header><!--end: header.mod-header -->

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -125px; background:#f7f7f7;"><path fill="#e0e0e0" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,186.7C384,181,480,235,576,245.3C672,256,768,224,864,224C960,224,1056,256,1152,261.3C1248,267,1344,245,1392,234.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

        <p style=" font-family: Galada, cursive;
        font-size: 149px;
        font-weight: 100;
        color: rgba(5, 167, 201, 1);
        text-transform: none;
        font-style: normal;
        margin-top: 1px;
        text-align: center;
        text-decoration: none;
        line-height: 1em;
        transform: rotate(355deg);
        letter-spacing: 1px;">Buy More</p>

        <p style=" font-family: Arsenal, sans-serif;
        font-size: 80px;
        font-weight: 100;
        color: #ee9f09;
        margin-top: -150px;
        text-transform: none;
        font-style: normal;
        text-align: center;
        text-decoration: none;
        line-height: 1em;
        letter-spacing: 1px;">Spend Less</p>


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
        <!-- Google Advertisement -->
        <!-- <center>
          <div id="banner-ad" style="width: 100% auto; height: 100px;">
            <script>
              googletag.cmd.push(function() { googletag.display('banner-ad'); });
            </script>
          </div>
        </center> -->
        <!-- End_Google Advertisement -->


        <div class="box2">
            <div class="text gridtable" style="padding-top: 10px;">
              <p style="text-color:black; font-weight:bold; font-size: 2em; margin-left: 25px;margin-top: -30px;">Brands</p>
            <?php if(!empty($activeBrands)){
              $i = 0;
                    foreach($activeBrands as $index){
                      if($i < 4){?>
                        <div class="coupon-item grid_3">
                            <div class="coupon-content">
                                <div class="img-thumb-center">
                                    <div class="wrap-img-thumb">
                                        <span class="ver_hold"></span>
                                        <a href="offers.php?brand=<?php echo $index['title'];?>" class="ver_container"><img src="<?php echo $index['logo'];?>" alt="<?php echo $index['title'];?>"></a>
                                    </div>
                                </div>

                            </div>

                        </div><!--end: .coupon-item -->
                <?php $i++;}}}?>
            </div>

        </div>
        <center>
          <form action="ind_brand.php" style="background:#f7f7f7;">
            <input class="btn btn-green type-login btn-login" style="padding:10px 40px 10px 40px ;" type="submit" value="View all Brands" />
          </form>
        </center>
<br>

<div class="box2">
    <div class="text gridtable" style="padding-top: 10px;">
      <p style="text-color:black; font-weight:bold; font-size: 2em; margin-left: 25px;">Category</p>
    <?php if(!empty($activeCategories)){
      $i = 0;
            foreach($activeCategories as $index => $list){
              if($i < 4){?>
                <div class="coupon-item grid_3">
                    <div class="coupon-content">
                        <div class="img-thumb-center">
                            <div class="wrap-img-thumb">
                                <span class="ver_hold"></span>
                                <a href="offers.php?category=<?php echo $index;?>" class="ver_container"><img src="<?php echo $list;?>" width="177px" height="185px" alt="<?php echo $index;?>">
                                  <center><div class="overlaycat"><p style="color:white; font-weight:bold;"><?php echo $index;?></p></div></center>
                                </a>
                            </div>
                        </div>

                    </div>

                </div><!--end: .coupon-item -->
        <?php $i++;}}}?>
    </div>

</div>
<center>
  <form action="category.php" style="background:#f7f7f7;">
    <input class="btn btn-green type-login btn-login" style="padding:10px 40px 10px 40px ;" type="submit" value="View all Categories" />
  </form>
</center>

<br>
<div class="box2">
            <div class="text gridtable" style="padding-top: 10px;">
              <p style="text-color:black; font-weight:bold; font-size: 2em; margin-left: 25px;margin-top: -30px;">Hot Offers</p>
            <?php if(!empty($hotOffers)){
              $i = 0;
                    foreach($hotOffers as $index => $list){
                      if($i < 4){?>
                        <div class="coupon-item grid_3">
                            <div class="coupon-content">
                                <div class="img-thumb-center">
                                    <div class="wrap-img-thumb">
                                        <span class="ver_hold"></span>
                                        <a href="offers.php?hotoffers=<?php echo $index;?>" class="ver_container"><img src="<?php echo $list;?>" alt="<?php echo $index;?>"></a>
                                    </div>
                                </div>

                            </div>

                        </div><!--end: .coupon-item -->
                <?php $i++;}}}?>
            </div>

        </div>
        <center>
          <form action="ind_hotOffers.php" style="background:#f7f7f7;">
            <input class="btn btn-green type-login btn-login" style="padding:10px 40px 10px 40px ;" type="submit" value="View all Hot Offers" />
          </form>
        </center>
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
