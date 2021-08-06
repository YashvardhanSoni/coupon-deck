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
        <div style="background: orange; font-family: Times new roman; color: white;">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title"><h1><b><CENTER><span style="text-decoration: line-through;">&nbsp&nbsp&nbsp&nbsp</span> CONTACT US <span style="text-decoration: line-through;">&nbsp&nbsp&nbsp&nbsp</span></CENTER></b></h1></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg">

<button class="button" value="Contact Info" name="address" style=""><i class="fa fa-user icon"></i> Contact Info</button>

<p id="con_info">
Address: The ithum, Tower A, 1131, Noida, UP
<br>
Telephone: 9643117230
<br>
E-Mail: info@mitraksh.in
<br>
</p>

<!-- <button class="button" value="Contact Info" name="address" >Follow Us :</button>

<p id="social_info">
<i class="fab fa-facebook" style="font-size: 2em;"></i>&nbsp&nbsp&nbsp
<i class="fab fa-linkedin" style="font-size: 2em;"></i>
</p> -->

<br><br><br><br>
<br><br>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14008.476314600606!2d77.372795!3d28.626193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa4a968baca30d045!2sIThum%20Tower%20B%20-%20Lift%20Entry!5e0!3m2!1sen!2sin!4v1627282968605!5m2!1sen!2sin" width="100%" height="250" style="border:0; margin-bottom:-5px; bottom:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

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
