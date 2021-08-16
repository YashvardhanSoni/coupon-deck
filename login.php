<?php

    session_start();
    if (isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: index.php');
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


<html>

<head>
  <title>Login</title>
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


  <link rel="icon" href="images/logo.ico" type="image/icon type">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
    /* background-image: url('fttr.jpg');
    background-repeat: no-repeat;
    background-size: cover; */
}
h1 {
    font-family: 'Passion One';
    font-size: 2rem;
    text-transform: uppercase;
}
label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Lato';
}
input {
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
    border-radius: 25px;
    outline:none;
}
form {
    margin: 25px auto;
    padding: 20px;
    width: 500px;
}
div.form-element {
    margin: 20px 0;
}
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}
p.success,
p.error {
    color: white;
    font-family: lato;
    background: yellowgreen;
    display: inline-block;
    padding: 2px 10px;
}
p.error {
    background: orangered;
}


input[type=button]{
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}

input[type=text]{

    border: none;
    background: lightgrey;
}
input[type=password]{

    border: none;
    background: lightgrey;

}
button[type=submit]{
  border-radius: 25px;
  background: orange;
}

.form_align{ }

@media screen and (max-width: 390px){
.form_align{
  margin-top: 50%;
}
}


</style>
<div class="form_align">
</head>
<h4 align="center" style="font-size:3.0vw; padding: 25px;"><span style="color:orange;"><b>Welcome Back!</span><br><span style="color:rgba(5,167,201,1);"><b>Sign in</span></b></h4>
<h1 id="logo" class="rs">
<a href="index.html">
<img src="images/logo.png" alt="CouponDeck"/>
</a>
</h1>
<form autocomplete="off" method="post" action="" name="signin-form">
  <div class="form-element">
    <i class="fa fa-user icon"></i>
    <input autocomplete="off" type="text" name="username" pattern="[a-zA-Z0-9]+"  placeholder="Username"  required />
  </div>
  <div class="form-element">
    <i class="fa fa-key icon"></i>
    <input autocomplete="off" type="password" name="password"  placeholder="Password"  required />
  </div>
  <button type="submit" name="login" value="login">Sign In</button>
  <br><br><a align="left" href="register.php" style="color:orange;">New User, Register Here</a>
</form>
</div>
