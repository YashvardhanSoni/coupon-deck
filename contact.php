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
    <title>Contact US</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
    body, html {
    height: 100%;
    margin: 0;
  }

  .bg {
    /* The image used */
    background:#f7f7f7;

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
    color:black;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;font-size: 1.05em;
  }
  @media only screen and (max-width: 600px) {
  .bg {
    background:#f7f7f7;
  }
  .button{
    margin-left: 65px;
    margin-top: 20px;
  }
  #con_info, #social_info{
    color:black;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;text-align: center;font-size: 1.05em;
  }
}

    </style>
</head>
<body class="gray"  onselectstart="return false" oncopy="return false" oncut="return false" onpaste="return false"><!--<div class="alert_w_p_u"></div>-->

  <div class="container-page" style="background: #f7f7f7;">
  <div class="mp-pusher" id="mp-pusher">
      <header class="mod-header">
          <div class="grid_frame">
              <div class="container_grid clearfix">
                  <div class="grid_12">
                      <div class="header-content clearfix" style="padding-right:90px;">


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
                                      <a href="ind_home.php">Home</a>
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

                                  <?php
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
                                  <?php } ?>

                                    <!-- <li class="has-sub" style="background: rgb(0 0 0 / 0%); color: white; border-radius: 5px;">
                                        <a style="color: black;">Region</a>
                                        <ul class="sub-menu" style="background: skyblue; border-radius: 25px;">
                                          <?php if(!empty($activeRegion['results'])){
                                                  foreach($activeRegion['results'] as $index){
                                                      if($index['code'] == $region){?>
                                            <li><a href="ind_home.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
                                            <?php }else{?>
                                              <li><a href="ind_home.php?region=<?php echo $index['code'];?>" style="background: skyblue; border-radius: 25px;"><?php echo $index['country'];?></a></li>
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
                    <a href="ind_home.php">Home</a>
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
                      <a href="index.php" class="btn btn-green type-login btn-login" >Login</a>
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
      <!-- <div style="background: #f7f7f7; text-color:black; font-weight:bold; font-size: 1em;">
          <div class="grid_frame">
              <div class="container_grid clearfix">

              </div>
          </div>
      </div> -->
<div class="bg" style="margin-left: 80px; line-height:1;">
<p id="con_info">
  <div class="grid_12">
    <h1 class="page-title" style="padding-top:0px;font-size:3em;"><b>CONTACT US</b></h1><br>
    <br>
  </div>

<img src="pin.png" style="width: 15px;padding-left: 20px;">&nbsp; 1131, Tower A, The-iThum, Sector-62, Noida , UP
<br>
<br>
<img src="phone.png" style="width: 15px;padding-left: 20px;">&nbsp; +91-9540291981

<br>
<br>
<img src="mail.png" style="width: 15px;padding-left: 20px;">&nbsp; support@coupondeck.co.in

<span style="float:right; margin-right: 110px;">
<img src="fb.png" style="width: 40px;">&nbsp&nbsp&nbsp
<img src="lin.png" style="width: 40px;">
</span>
<br>

</p>

<!-- <p id="social_info"></p> -->



<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14008.476314600606!2d77.372795!3d28.626193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa4a968baca30d045!2sIThum%20Tower%20B%20-%20Lift%20Entry!5e0!3m2!1sen!2sin!4v1627282968605!5m2!1sen!2sin" width="100%" height="250" style="border:0; margin-bottom:-5px; bottom:0;" allowfullscreen="" loading="lazy"></iframe> -->
</div>


<div><img src="tp.png" width="100%" height="auto"></div>
<br><br>

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
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
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
