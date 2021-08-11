<?php

    session_start();
    if (isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: New_index.php');
    }
    include('config.php');
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
      background: linear-gradient(to bottom right,#F87E7B,#B05574);
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
    #footer {
   position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   background-image: "C:\xampp\htdocs\mmipl\images\ex\fbanner.jpg";
   color: white;
   height:0px;
   text-align: center;
}
#footer img{
  max-width: 100%;
background-size:100% auto;
}
.login-button {
    margin-bottom:10px;
  }
  body {
    background-image: url('bg.png');
    background-repeat: no-repeat;
    background-size: cover;
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
  #footer:hover .overlay {
  opacity: 1;
}

.icon {
  font-size: 100px;
  position: absolute;

  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
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


    <br><br><h3 align="center" style="font-size:4.8vw;"><b>Welcome To<br><span style="color:rgba(5,167,201,1);">Coupon</span> <span style="color: orange;">Deck</span></b></h3>
    <center><br>
      <a style="background:LimeGreen; text-color: white; text-decoration: none;" class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a>
        <br><br><a align="left" href="register.php" target="_blank" style="color:black;"><b>New User, Register Here</b></a>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-body">

        <h4>Login</h4>
        <form autocomplete="off" method="post" action="" name="signin-form">
          <input autocomplete="off" style="background-color:transparent; padding-left: 10px;" type="text" name="username" class="username form-control" pattern="[a-zA-Z0-9]+" placeholder="Username"/>
          <input autocomplete="off" style="background-color:transparent; padding-left: 10px;" type="password" name="password" class="password form-control" placeholder="password"/>
          <button  class="btn login" type="submit" name="login" value="login" />Login</button>
          <br>
        <br><a align="left" href="register.php" style="color:white;">New User, Register Here</a>
        </form>
      </div>
    </div>
  </div>
</div>
    </center>
<br><br>
    <div id="footer" style="color:#1c5b6b;">
      <img src="fbanner1.jpeg" >

    </div>
