<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: ind_home.php');
    }
    include('config.php');
    require __DIR__.'/helper/common.php';
    $region = activeCountries();
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $review = $_POST['review'];
        $region = $_POST['region'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!<br>The Page will now Reload in <b>few sec</b>..</p>';
              header("refresh: 2; url = register.php");
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email,region) VALUES (:username,:password,:email,:region)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password", $password, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("region", $region, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
                header('location: index.php');
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo $result['password'];
        echo (password_verify($password, $result['password']));

        if (!$result) {
            echo '<p class="error">Username/Password is wrong!</p>' ;
        } else {
            if ($password == $result['password']) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['region'] = $result['region'];
                session_set_cookie_params(0);
                header("Location: ind_home.php");
            } else {
                echo '<p class="error">Username/Password is wrong!</p>';
            }
        }
    }

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="bootstrap.css"/>
      <link rel="icon" href="images/logo.ico" type="image/icon type">
      <link rel="stylesheet" href="bootstrap.min.css"/>
      <link rel="stylesheet" href="css/dropdown.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Welcome to Coupon Deck!</title>
    <style>
    /*Trigger Button*/
    .login-trigger {
      font-weight: bold;
      color: #fff;
      background: linear-gradient(to bottom right, #B05574, #F87E7B);
      padding: 9px 20px;
      border-radius: 30px;
      position: relative;
      top: 50%;
    }
    /*Modal*/
    h4 {
      font-weight: bold;
      color: #fff;
    }
    .close {
      color: #fff;
      transform: scale(1.2)
    }
    .modal-content {
      -webkit-transform: translate(50%,-50%);
      transform: translate(-50%,50%);
      position: absolute;
      top: 50%;
      left: 50%;
      font-weight: bold;
      background: #035465;
      border-radius: 5px 50px 5px 50px;
    }
    .form-control {
      margin: 1em 0;
    }
    .form-control:hover, .form-control:focus {
      box-shadow: none;
      border-color: #fff;
    }
    .username, .password {
      border: none;
      border-radius: 0;
      box-shadow: none;
      border-bottom: 2px solid #eee;
      padding-left: 0;
      font-weight: normal;
      background: transparent;
    }
    .form-control::-webkit-input-placeholder {
      color: #eee;
    }
    .form-control:focus::-webkit-input-placeholder {
      font-weight: bold;
      color: #fff;
    }
    .login {
      padding: 6px 20px;
      border-radius: 20px;
      background: none;
      border: 2px solid #FAB87F;
      color: #FAB87F;
      font-weight: bold;
      transition: all .5s;
      margin-top: 1em;
    }
    .login:hover {
      background: #FAB87F;
      color: #fff;
    }


.login-button {
    margin-bottom:10px;
  }
  body {
    background-image: url('bg.jpg');
    background-repeat: repeat;
    background-size: cover;
    font-family: roboto;
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: 1s ease;
    background-color: transparent;
  }


.icon {
  font-size: 100px;
  position: absolute;

  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.footer {
    background: #05a7c9;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    /* height: 20%; */
    background-repeat: no-repeat;
    background-size: cover;
}

.cd{

            float:left;
             background:transparent;
             width:40%;
             height:100%;
             border: transparent;
             box-shadow: 2px 0px 16px 13px #dee2e6;
             outline: none;
}
.cdl{
                float:left;
                background:transparent;
                width:30%;
                height:100%;
}
.cdr{
                float:right;
                background:transparent;
                width:30%;
                height:100%;
            }

#con_info{
  color:white;line-height: 2.6;font-weight:normal;margin-left:20px;margin-right: 20px;font-size: 0.8em; padding: 20px 50px 10px 10px; line-height: 2.0em;
}
#social_info{
  color:white;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;font-size: 1.05em; padding: 30px 50px 50px 30px;
}

  @media only screen and (max-width: 600px) {
  .cdl {
    visibility: hidden;
    display:none;
  }
  .cdr{
    /* visibility: hidden;
    display:none; */
  }
  .cd{
    visibility: hidden;
    display:none;
  }
  #con_info{
    color:white;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;text-align: center;font-size: 1.05em;
  }
  #social_info{
    color:white;line-height: 2.6;font-weight: bold;margin-left:20px;margin-right: 20px;font-size: 1.05em; padding: 30px 50px 50px 30px;
  }
  .footer{
    height: auto;
    flex-direction: column;
  }
}

input[type=text]{

    border: none;
    background: white;
    color:black;
    border-radius: 25px;
}
input[type=password]{

    border: none;
    color:black;
    background: white;
    border-radius: 25px;

}
input[type=email]{

    border: none;
    color:black;
    background: white;
    border-radius: 25px;

}
button[type=submit]{
  border-radius: 25px;
  background: orange;
  outline:none;
}
input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'roboto';
    padding: 10px;
    border-radius: 25px;
    outline:none;
}
</style>
</head>
<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

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
  <header style="background-color:#f7f7f7;">
    <span><img src="cd_blank.png" width="250px" style="padding: 20px 20px 20px 20px;"></span>
    <span style="float:right;padding: 10px 15px 10px 10px; margin-top:38px;"><a style="background:none; text-decoration:none; color:black; font-weight:bold;font-size: 1.5em;" class="login-trigger" href="#" data-target="#login" data-toggle="modal"> <img src="user-dark.png" width="30px" style="margin-top: -15px;"> &nbspSign In</a></span>
  </header>
  <div style="width:100%; height: 130px; background:orange;">
    <center>
      <p style="color:white;vertical-align:middle;padding-top: 25px;font-weight:bold;font-size: 1.5em;">Join Our Site</p>

      <button style="font-size:24px; border-radius:25px; background:#f7f7f7;color:orange; border-color: transparent;margin-top: -10px; padding-right: 25px;padding-left: 25px;" href="#" data-target="#video" data-toggle="modal"><i class="fa fa-play"></i>&nbsp; Watch Video</button>
    </center>
  </div>


  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-body">
          <center>
          <h4>Sign In</h4>
          <form autocomplete="off" method="post" action="" name="signin-form">
            <input autocomplete="off" style="border-color: white;color: white;border-style: solid;background-color:transparent; padding-left: 10px;" type="text" name="username" class="username form-control" pattern="[a-zA-Z0-9]+" placeholder="Username"/>
            <input autocomplete="off" style="border-color: white;color: white;border-style: solid;background-color:transparent; padding-left: 10px;" type="password" name="password" class="password form-control" placeholder="Password"/>
            <button  class="btn login" type="submit" name="login" value="login" style="color: black;" />Sign In</button>
            <!-- <br>
          <br><a align="left" href="register.php" style="color:white;">New User, Register Here</a> -->
          </form>
        </center>
        </div>
      </div>
    </div>
  </div>


  <div id="video" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content" style="background:transparent;border-color:transparent;margin-left: -50px;">
        <div class="modal-body">
          <center>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Pvzn6YlZVQk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/FJhbOgZwjzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
          <!-- <iframe width="540" height="320" src="https://www.youtube.com/embed/MUnk6NuVPQQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
        </center>
        </div>
      </div>

    </div>
  </div>
  <div id = "boxes" style="height: 100%;margin-top: 80px;margin-bottom: 80px;">
    <div class="cdl"style="margin-left: 15%;background:orange;width: 35%;">

      <p style="margin-top:150px;margin-right:60px;margin-left:60px;">

    <span style=" font-family: Roboto, sans-serif;
                  font-size: 4em;
                  font-weight: bold;
                  color: rgba(255, 255, 255, 1);
                  text-transform: none;
                  font-style: italic;
                  text-decoration: none;
                  line-height: 1em;
                  letter-spacing: 0.5px;">
                  WE OFFER DISCOUNT COUPONS
    </span>
        <br><br>

    <span style=" font-family: Roboto, sans-serif;
                  font-size: 2em;
                  font-weight: bold;
                  color: rgba(255, 255, 255, 1);
                  text-transform: none;
                  font-style: italic;
                  text-decoration: none;
                  line-height: 1em;
                  letter-spacing: 0.5px;">
                  SO YOU CAN BUY MORE WITH YOUR BUDGET
    </span>
      </p>
    </div>

<div class="cdr"style="margin-right: 15%;background:#f7f7f7;width: 35%;padding: 63px 50px 25px 50px;">


    <p align="right" style=" font-family: Roboto, sans-serif;
    margin-right: 30px;
    font-size: 2em;
    font-weight: bold;
    color: orange;
    text-transform: none;
    font-style: italic;
    text-decoration: none;
    line-height: 1em;
    letter-spacing: 0.5px;">
    Sign Up
  </p>
  <br>

  <form autocomplete="off" method="post" action="" name="signup-form">
    <center>
  <div class="form-element">
    <br>
  <img src="user.png" width="30px">&nbsp;
  <input style="box-shadow: 0px 5px 7px 0px rgb(211 211 211);" autocomplete="off" type="text" name="username" pattern="[a-zA-Z0-9]+"  placeholder="Username" required />
  </div>
  <div class="form-element"><br>
  <img src="email.png" width="30px">&nbsp;
  <input style="box-shadow: 0px 5px 7px 0px rgb(211 211 211);" autocomplete="off" type="email" name="email"  placeholder="Email" required />
  </div>
  <div class="form-element"><br>
    <img src="key.png" width="30px">&nbsp;
  <input style="box-shadow: 0px 5px 7px 0px rgb(211 211 211);" autocomplete="off" type="password" name="password"  placeholder="Password" required />
  </div>
  <div class="form-element"><br>
    <img src="maps.png" width="30px">&nbsp;
      <select name="region" id="region" style="height: 50px;
    width: 307px;;border: none;
      background: white;
      border-radius: 25px;box-shadow: 0px 5px 7px 0px rgb(211 211 211); font-family: roboto;
    font-size: 1.5em;">
          <option value="">Select Region</option>
          <?php if(!empty($region['results'])){
              foreach($region['results'] as $index){ ?>
              <option value="<?php echo $index['code']; ?>"><?php echo $index['country']; ?></option>
          <?php   } } ?>
      </select>
  </div><br>
  <span style="float:right;"><button type="submit" name="register" value="register" style="margin-right: 35px;
    height: 50px;
    width: 150px;
    font-size: 1.5em;
    font-weight: bold;
    font-family: roboto;
    outline: none;
    border: none;
    ">Submit</button></span>
</center>
  </form>

</div>
</div>
<div class="footer"style="position: relative;">
 <span style="float:right">

  <p id="con_info">
  <big><strong>CONTACT US</strong></big><br>
  <i class="fa fa-map-marker"></i>&nbsp;  1131, Tower A, The-iThum, Sector-62, Noida , UP
  <br>
  <i class="fa fa-phone"></i>&nbsp; +91-9540291981
  <br>
  <i class="fa fa-envelope"></i>&nbsp; support@coupondeck.co.in
  <br>
</p></span>

  <div><p id="social_info">
    <img src="mmipl.png"> &nbsp; <span><B>MITRAKSH MEDIA</B> India Pvt. Ltd.</span>

  <!-- <p id="social_info">
  <i class="fab fa-facebook" style="font-size: 2em;"></i>&nbsp&nbsp&nbsp
  <i class="fab fa-linkedin" style="font-size: 2em;"></i>
  </p> -->
</div>
</div>
