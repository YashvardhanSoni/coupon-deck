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
    <title>Reviews</title>
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


.testimonials{
  padding: 40px 0;
  background: #f1f1f1;
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
  flex: 33.33%;
  max-width: 33.33%;
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
  border-radius: 50%;
}
.name{
  font-size: 20px;
  text-transform: uppercase;
  margin: 20px 0;
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
        <div style="background: orange; font-family: Times new roman; color: white;">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title"><h1><b><CENTER><span style="text-decoration: line-through;">&nbsp&nbsp&nbsp&nbsp</span> Reviews <span style="text-decoration: line-through;">&nbsp&nbsp&nbsp&nbsp</span></CENTER></b></h1></h2>
                    </div>
                </div>
            </div>
        </div>
<div class="bg">
  <div class="testimonials">
    <div class="inner">

      <div class="row">
        <div class="col">
          <div class="testimonial">
            <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>

            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div>

        <div class="col">
          <div class="testimonial">
            <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>

            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div>

        <div class="col">
          <div class="testimonial">
            <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>

            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="testimonial">
            <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>

            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div>

        <div class="col">
          <div class="testimonial">
          <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>

            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div>

        <div class="col">
          <div class="testimonial">
            <img src="https://img.icons8.com/material-rounded/96/000000/user-male-circle.png"/>
            <div class="name">User Name</div>

            <p>
              CouponDeck is awesome platform to find various offers and coupons WorldWide.
            </p>
          </div>
        </div>
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
